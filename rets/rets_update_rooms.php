<?php
//SET TIME LIMIT
@set_time_limit(0);
date_default_timezone_set("America/New_York");
error_reporting(E_ERROR);

/** START TIME */ 
$db_map=array();
$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$starttime = $mtime;
$start_time = date('G:ia');

//mail("mrk.enriquez@gmail.com","FLEXMLS RETS UPDATE START for tsgfl.com","FLEXMLS RETS Update Started at $start_time", "FROM: rets@tsgfl.com");

/** Data Config **/
require('database.php');
require('flexmls/config_rooms.php');
include('simpleImage.php'); 

/** PHPRETS **/
require('phrets2.php');

/** Start RETS Data Download **/
foreach ($rets_config as $key => $config) {
    
	foreach($config['data'] as $data => $setting) {

		// flexmls_master_update("multifamily");
		//flexmls_master_update("residential");
		//flexmls_master_update("hirise");
		//   flexmls_master_update("rental"); 

		//exit();

		echo "Starting RETS download for {$config['name']} Data: {$data} into database $configDB[DB_NAME]..."."\n";

		/** Initialize PHRETS **/
		$rets = new phRETS;

		// Setup Basic Param.
		$rets->SetParam('disable_follow_location', true);
		$rets->SetParam('cookie_file',"/home/admin/web/dev.webwarephpdevelopment.com/public_html/rets/cookie.txt");
        exec("chmod 777 /home/admin/web/dev.webwarephpdevelopment.com/public_html/rets/cookie.txt");
		//$rets->AddHeader("User-Agent", $config['user_agent']);

		// Connect to RETS
		echo "Connecting to RETS Server..."."\n";
		if (!$rets->Connect($config['login_url'], $config['username'], $config['password'])) {
			throw new Exception("RETS_UPDATE.PHP - Unable to log in...probably can't write cookie.txt");
		}

		$serverInfo=$rets->GetServerInformation();

		/** Class and Property Config **/
		$class = $setting['class'];
		$resource = $setting['resource'];
		$keyfield = $setting['keyfield'];

		/** Offset Check **/
		echo "Offset Check..."."\n";
		$offset = offsetCheck($rets,$resource,$class,$setting['query'],$keyfield);

		if($offset)
		{
			echo "Offset Supported! "."\n";
			$rets->SetParam("offset_support", true);    // not really...
		}
		else
		{
			echo "Offset NOT Support. "."\n";
		}

		$rets->SetParam("offset_support", false);

		/** Build MYSQL Table **/   

		// only create tables if required...
		if ($setting['create_table']) {

			// Get Fields
			$fields = $rets->GetMetadataTable($resource, $class);

			// Create Table
			$table_name = str_replace(' ', '_', $config['table_prefix'] . '_' . strtolower($resource) . '_' . strtolower($class));
			create_table($table_name,$fields,$config);

		}

		/** Get RETS Data **/    
		$limit = $config['query_limit'];

		// Build Query Options
		$query_options = array( 
			'Limit' => $limit, 
			'Count' => 1
		);

		// Query RETS Server

		// this loop controls the number of months to import
        $rets_results = mysql_query("SELECT Matrix_Unique_Id from `glvar_property_listing` ORDER BY Listing_Contract_Date DESC ");        // TODO:  make this dynamic
        $totRow=mysql_num_rows($rets_results);
        $cntRow=0;
        echo "Updating rooms into master_rets_table_update [$totRows]..."."\n";
        
        if( $totRow > 0)
        {
        // process the new rows
            while($row = mysql_fetch_array($rets_results))  {

                $muid = $row['Matrix_Unique_Id'];
			    $query = "(listing_mui = ".$muid.")";      
                
			    echo "Running Query: $query on Resource: {$resource} and Class: {$class} with a Limit: {$limit}"."\n";

			    $search_query = $rets->SearchQuery( $resource,  $class,  $query, $query_options );
			    $totRecs=$rets->TotalRecordsFound();

			    // Check for Rows
			    if ($totRecs > 0) {

				    echo "Total rooms found: {$totRecs} for property id {$muid}"."\n";

					// Fetch Rows
					while ($listing = $rets->FetchRow($search_query)) {

						// Reset timeout
						@set_time_limit(0);

						// Build Query
						$query = 'INSERT INTO ' . $table_name . ' SET';

						// Loop through fields/data
						foreach ($listing as $field => $value)
						{
							// Check for Field Map
							// $field_map = $config['field_map'];
							// $field_map = $db_map;

							$field_name = mysql_real_escape_string((isset($db_map[$field])) ? $db_map[$field] : $field);

							$query .= ' `' . stripslashes($field_name) . '` = \'' . mysql_real_escape_string($value) . '\',';
						}

						// Finsih Building Query
						$query = rtrim($query, ',');
						$query .= ';';

						// Run Query
						mysql_query($query) or die(mysql_error() . $query);

					} // End Fetch Rows

			    }
			    else {

				    echo "No room records found for property "."\n";

			    } // End Total Row Check


			    /** Free SearchQuery Object. Should also free up resources **/
			    $rets->FreeResult($search_query);          

		    }

		    /** Disconnect from RETS server. Should free up resources **/
		    $rets->Disconnect();
		    echo "Disconnecting from RETS server..."."\n";

		    /** Update Master Table **/        
		    $update_script = $config['master_update_script'];
                    
            
		    if(function_exists($update_script))
		    {
			    // Update Master Table
			    // echo "Running Master Update: " . $config['master_update_script']."\n";
			    call_user_func_array($update_script,array($data));
		    }


	    }
    }

}

/** END TIME */
$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$endtime = $mtime;
$end_time = date('G:ia');
$totaltime = ($endtime - $starttime);
$timetocomplete = number_format($totaltime/60,2);
echo "RETS Update took ".$timetocomplete." minutes"."\n"."\n";

/**
* Helper Function to create MYSQL Table
*/
function create_table($table_name, $fields, $rets_config)
{
	global $db_map;

	// Clean duplicate field names.
	$clean_fields = array();
	foreach ($fields as $field)
	{

		// map Fields to external field name file...

		{        
			// mapping logic... 

			//$db_name =  mysql_real_escape_string(padBlanks($field['LongName']."_".$field['SystemName']));
            $db_name =  mysql_real_escape_string(padBlanks($field['LongName']));
			if ($field['MaximumLength']==0)  {
				$clean_fields[$db_name][0] = $field['DataType'];
				$clean_fields[$db_name][1] = -1;
			}
			else { 
				$clean_fields[$db_name][0] = $field['DataType'];
				$clean_fields[$db_name][1] = $field['MaximumLength'];               
			}

		} 

		$db_map[$field['SystemName']] = $db_name;

	}
	$fields = $clean_fields;
	// Create the table.

	mysql_query('DROP TABLE ' . $table_name . ';');

	$query = '';
	$query .= 'CREATE TABLE IF NOT EXISTS ' . $table_name . ' (';
	foreach ($fields as $field_name => $field_type) {

		$len = $field_type[1]+25;
		//$len =255;
		if (strpos($field_name, 'latitude') || strpos($field_name, 'longitude') || strpos($field_name, 'Latitude') || strpos($field_name, 'Longitude') || $field_name == 'latitude' || $field_name == 'longitude' || $field_name == 'Latitude' || $field_name == 'Longitude')
		{
			//fix data type for the longitude/latitude column
			$mysql_type = 'DECIMAL(10,6)';
		}
		else
		{
			switch ($field_type[0])
			{
				case 'Character':
					//$mysql_type = 'TEXT';
                    if ($len==1025) {    
                        $mysql_type = 'TEXT';       
                    }
                    else {
                        $mysql_type = 'VARCHAR('.$len.')';                       
                    }
 					break;
				case 'Int':
					$mysql_type = 'INTEGER';
					break;
				case 'Decimal':
					$mysql_type = 'DECIMAL(14,2)';
					break;
				case 'Date':
					$mysql_type = 'DATE';
					break;
				case 'DateTime':
					$mysql_type = 'DATETIME';
					break;
				default:
					$mysql_type = 'TEXT';
					break;
			}
		}
		$query .= ' `' . mysql_real_escape_string($field_name) . '` ' . $mysql_type . ',';
	}
	$query = rtrim($query, ',');
	$query .= ') ENGINE = MyISAM;';
	mysql_query($query) or die(mysql_error() . $query);
}

/**
* Decent check to see if server supports offsets.
*/
function offsetCheck($rets,$resource, $class, $query, $record_key_field)
{

	$total_count = 0;
	$key_count = array();

	$search1 = $rets->SearchQuery(
		$resource,
		$class,
		$query,
		array(
			'Limit' => 50,
			'Offset' => 1,
			'Select' => $record_key_field)
	);

	$rows1 = $rets->TotalRecordsFound($search1);				

	$search2 = $rets->SearchQuery(
		$resource,
		$class,
		$query,
		array(
			'Limit' => 50,
			'Offset' => 51,
			'Select' => $record_key_field
		)
	);

	$rows2 = $rets->TotalRecordsFound($search2); 

	if($rows1==$rows2) return true; else return false;

}
