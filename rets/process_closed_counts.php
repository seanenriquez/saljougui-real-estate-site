<?php

//SET TIME LIMIT
@set_time_limit(0);
date_default_timezone_set("America/New_York");
error_reporting(E_ERROR);

/** START TIME */ 
$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$starttime = $mtime;
$start_time = date('G:ia');

require('database.php');

// filter out all the problematic properties with very low selling prices...
echo "Emptying dump table...\n\r";
$sql = "TRUNCATE `master_rets_table_closed_dump` ";
mysql_query($sql) or die(mysql_error() . $sql);

echo "Populating dump table with filtered properties...\n\r";
$sql = "INSERT INTO `master_rets_table_closed_dump` SELECT * FROM `master_rets_table_closed` where (close_price > listing_price * 0.5)";
mysql_query($sql) or die(mysql_error() . $sql);

// load cities from db
$sql = "SELECT city FROM city_information
ORDER BY city ASC";

$cities = mysql_query($sql) or die(mysql_error() . $sql);

// loop all cities
while ($row = mysql_fetch_assoc($cities)) {

	echo "\r\nSTART processing CLOSED counts for the city of $row[city]...";

	getAllCityCounts(trim($row['city']));

	getAllSubdivCounts(trim($row['city']));
	
	echo "\r\nEND processing CLOSED counts for the city of $row[city]...";

}


function getAllCityCounts ($city) {

	// start with sale counts
	$sql = "SELECT count(*) as closed_hits,
		avg(days_on_market) as avg_dom,
		avg(close_price) as avg_closed_price,
		max(close_price) as hi_closed_price,
		min(close_price) as lo_closed_price
		FROM `master_rets_table_closed_dump`
		WHERE city = '".trim($city)."' 
		AND (DATE_SUB(CURDATE(),INTERVAL 1 YEAR) <= close_date)";

	$counts = mysql_query($sql) or die(mysql_error() . $sql);    
	$row = mysql_fetch_assoc($counts);                                              

	// update table with sale counts
	$sql= "UPDATE city_information  
					SET closed_hits = $row[closed_hits], 
					avg_dom= $row[avg_dom], 
					avg_closed_price=$row[avg_closed_price], 
					hi_closed_price=$row[hi_closed_price],
					lo_closed_price=$row[lo_closed_price] 
					WHERE city = '".trim($city)."'"; 
					
	mysql_query($sql) or die(mysql_error() . $sql); 


}


function getAllSubdivCounts ($city) {

	

	$sql = "SELECT subdivision_area_name FROM community_area_information
	WHERE city = '".trim($city)."'
	ORDER BY subdivision_area_name ASC";

	$subdiv = mysql_query($sql) or die(mysql_error() . $sql);

	// loop all subdivs
	while ($row_sub = mysql_fetch_assoc($subdiv)) {
		
		// echo "\r\n\tProcessing CLOSED subdivision stats for $row_sub[subdivision_area_name] ..."."\r\n";

		$sql = "SELECT count(*) as closed_hits,
							avg(days_on_market) as avg_dom,
							avg(close_price) as avg_closed_price,
							max(close_price) as hi_closed_price,
							min(close_price) as lo_closed_price
		        FROM `master_rets_table_closed_dump`									
						WHERE subdivision REGEXP '".trim($row_sub['subdivision_area_name'])."'
						AND city = '".trim($city)."' 
						AND (DATE_SUB(CURDATE(),INTERVAL 1 YEAR) <= close_date)";
					   
		$counts = mysql_query($sql) or die(mysql_error() . $sql);    

		$row = mysql_fetch_assoc($counts);

		if ($row['closed_hits'] != 0) {
			
		// update table with counts
  		$sql= "UPDATE community_area_information 
			SET closed_hits = $row[closed_hits], 
			avg_dom= $row[avg_dom], 
			avg_closed_price=$row[avg_closed_price], 
			hi_closed_price=$row[hi_closed_price],
			lo_closed_price=$row[lo_closed_price] 					
			WHERE city = '".trim($city)."' 
			AND subdivision_area_name = '".trim($row_sub['subdivision_area_name'])."'"; 
						
		}
		else {
			
			$sql= "UPDATE community_area_information 
			SET closed_hits = 0, 
			avg_dom= 0, 
			avg_closed_price=0, 
			hi_closed_price=0,
			lo_closed_price=0 					
			WHERE city = '".trim($city)."' 
			AND subdivision_area_name = '".trim($row_sub['subdivision_area_name'])."'"; 
		
		}
		
		mysql_query($sql) or die(mysql_error() . $sql);

	

	}
	

}



?>
