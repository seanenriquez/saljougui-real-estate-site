<?php
// Field Map because someone at the rets place is on crack
//include('field_map.php');

// Login Information
$rets_config['FLEXMLS']['name'] = 'FLEXMLS';
$rets_config['FLEXMLS']['login_url'] = 'http://retsgw.flexmls.com:80/rets2_1/Login';
$rets_config['FLEXMLS']['username'] = 'fl.rets.stevenshattow';
$rets_config['FLEXMLS']['password'] = 'blurt-y17';
$rets_config['FLEXMLS']['user_agent'] = 'Webware RETS';

$rets_config['FLEXMLS']['name'] = 'FLEXMLS';
$rets_config['FLEXMLS']['login_url'] = 'http://rets.las.mlsmatrix.com/rets/login.ashx';
$rets_config['FLEXMLS']['username'] = 'webw';
$rets_config['FLEXMLS']['password'] = 'glvar212';
$rets_config['FLEXMLS']['user_agent'] = 'Webware RETS';

// Image Setup
//$rets_config['FLEXMLS']['image_directory'] = $base_image.'flexmls/';
//$rets_config['FLEXMLS']['image_type'] = 'HiRes';

// Query and Database Settings
$rets_config['FLEXMLS']['query_limit'] = '200000';
$rets_config['FLEXMLS']['server_query_limit'] = '2500000';
$rets_config['FLEXMLS']['table_prefix'] = 'glvar';
$rets_config['FLEXMLS']['field_map'] = $flexmls_fields;
$rets_config['FLEXMLS']['listing_id_field'] = 'LIST_105';
$rets_config['FLEXMLS']['master_update_script'] = 'flexmls_master_update';


// $rets_config['FLEXMLS']['data']['rental'] = array(
//  "resource" => "Property",
//  "class" => "F",
//  "create_table" => true,
//  "keyfield" => "LIST_1",
//  "query" => "(138=2012-01-01T00:00:00+),(LIST_15=|12MKV6FH8HUD,PWC_15429SGZYQIT)");

//TODO: setup query date so it's not hard coded (LIST_132)

/*$rets_config['FLEXMLS']['data']['multifamily'] = array(
"resource" => "Property",
"create_table" => true,
"class" => "B",
"keyfield" => "LIST_1",
"query" => "(LIST_132=2011-01-01T00:00:00+),(LIST_15=|12MKUJQH3QE8,PWC_15429SGZYQIT,12LL26N0CIFT)");


$rets_config['FLEXMLS']['data']['residential'] = array(
"resource" => "Property",
"create_table" => true,
"class" => "Listing",
"keyfield" => "matrix_unique_id ",
// "query" => "(1=|RES),(242=|ER,EA,AU,C)"
"query" => "(Status=|EA,A)"
);                                                               
*/    
$rets_config['FLEXMLS']['data']['room'] = array(
    "resource" => "PropertySubTable",
    "create_table" => true,
    "class" => "Room",
    "keyfield" => "Matrix_Unique_ID",
    "query" => ""
);
/*

$rets_config['FLEXMLS']['data']['rental'] = array(
"resource" => "Property",
"create_table" => true,
"class" => "9",
"keyfield" => "sysid",
"query" => "(1=RNT)"
);
*/
/////////////////////////////////////////////////////////////////////////////////////////////////
//  end of time-chunked residential data download
/////////////////////////////////////////////////////////////////////////////////////////////////

function hasNumber ($str) {

    if (preg_match('#[0-9]#',$str))
        return true;
    else
        return false;
}

/**
* flexmls_master_update function.
* Runs the corresponding updater for $property_type ie. "Residential", "Commercial" etc.
* @access public
* @param mixed $property_type
* @return void
*/
function flexmls_master_update($property_type) {

    switch($property_type) {

        // A
        case 'residential':
            flexmls_updateResidential();
            break;

            // B
        case 'multifamily':
            // flexmls_updateMultifamily();
            break;

            // C
        case 'vacantland':
            //   flexmls_updateVacantland();
            break;

            // D
        case 'business':
            // flexmls_updateBusiness();
            break;

            // E
        case 'commercial':
            //flexmls_updateCommercial();
            break;

            // F
        case 'rental':
            flexmls_updateRental();
            break;      

        case 'hirise':
            flexmls_updateHirise();
            break;

    }
}

function flexmls_updateRooms() {
    
    // delete all old records in master table...
    $clean_up = mysql_query("DELETE FROM `propertysubtype_room` ");

    // now grab all the new records...
    $rets_results = mysql_query("SELECT Matrix_Unique_Id from `glvar_property_listing`");        // TODO:  make this dynamic
    $totRow=mysql_num_rows($rets_results);
    $cntRow=0;
    echo "Updating rooms into master_rets_table_update [$totRows]..."."\n";
    if( $totRow > 0)
    {
        // process the new rows
        while($row = mysql_fetch_array($rets_results))
        {

            // Run Query
            $results = mysql_query($sql) or die(mysql_error().$sql);
            $cntRow++;

            if (($cntRow % 50) == 0) {
                $pctDone= number_format($cntRow/$totRow*100,1);
                echo "Working [$pctDone%]..."."\n";
            }
        }
        echo "Update RESIDENTIAL properties DONE...ok"."\n\n";
    }

}


function padBlanks($inStg){
    return str_replace(" ","_",$inStg);
}

