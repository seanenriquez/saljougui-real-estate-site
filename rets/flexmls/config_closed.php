<?php
// Field Map because someone at the rets place is on crack
include('field_map.php');

// Login Information
$rets_config['FLEXMLS']['name'] = 'FLEXMLS';
$rets_config['FLEXMLS']['login_url'] = 'http://retsgw.flexmls.com:80/rets2_1/Login';
$rets_config['FLEXMLS']['username'] = 'fl.rets.stevenshattow';
$rets_config['FLEXMLS']['password'] = 'blurt-y17';
$rets_config['FLEXMLS']['user_agent'] = 'Webware RETS';

// Image Setup
//$rets_config['FLEXMLS']['image_directory'] = $base_image.'flexmls/';
//$rets_config['FLEXMLS']['image_type'] = 'HiRes';

// Query and Database Settings
$rets_config['FLEXMLS']['query_limit'] = '5000';
$rets_config['FLEXMLS']['server_query_limit'] = '25000';
$rets_config['FLEXMLS']['table_prefix'] = 'flexmls';
$rets_config['FLEXMLS']['field_map'] = $flexmls_fields;
$rets_config['FLEXMLS']['listing_id_field'] = 'LIST_105';
$rets_config['FLEXMLS']['master_update_script'] = 'flexmls_master_update';

// set dates for time-chunk retreivals
$start_date = date('Y-m-d',strtotime('-2 months'));
// have to subtract one day so querys dont pick up same data
$start_date2 = date('Y-m-d',strtotime('-2 months -1 day'));

$mid_date = date('Y-m-d',strtotime('-4 months'));
$mid_date2 = date('Y-m-d',strtotime('-4 months -1 day'));

$mid2_date = date('Y-m-d',strtotime('-6 months'));
$mid2_date2 = date('Y-m-d',strtotime('-6 months -1 day'));

$mid3_date = date('Y-m-d',strtotime('-8 months'));
$mid3_date2 = date('Y-m-d',strtotime('-8 months -1 day'));

$mid4_date = date('Y-m-d',strtotime('-10 months'));
$mid4_date2 = date('Y-m-d',strtotime('-10 months -1 day'));

$mid5_date = date('Y-m-d',strtotime('-10 months'));
$mid5_date2 = date('Y-m-d',strtotime('-10 months -1 day'));

$mid6_date = date('Y-m-d',strtotime('-12 months'));
$mid6_date2 = date('Y-m-d',strtotime('-12 months -1 day'));

$mid7_date = date('Y-m-d',strtotime('-14 months'));
$mid7_date2 = date('Y-m-d',strtotime('-14 months -1 day'));

// the last chunk gets 6 months instead of 3 because probably less listings back then
$last_date = date('Y-m-d',strtotime('-22 months'));


/*
$rets_config['FLEXMLS']['data']['agent'] = array(
"resource" => "Agent",
"create_table" => true,
"class" => "Agent",
"keyfield" => "LIST_0",
"query" => "(STATUS=A)");

$rets_config['FLEXMLS']['data']['office'] = array(
"resource" => "Office",
"create_table" => true,
"class" => "Office",
"keyfield" => "LIST_0",
"query" => "(STATUS=A)");

*/

// Property Type ( Class Query )
/*
$rets_config['FLEXMLS']['data']['agent'] = array(
"resource" => "Agent",
"class" => "Agent",
"query" => "(STATUS=1)");

$rets_config['FLEXMLS']['data']['office'] = array(
"resource" => "Office",
"class" => "Office",
"query" => "(STATUS=1)");
*/
//TODO: setup query date so it's not hard coded (LIST_132)


$rets_config['FLEXMLS']['data']['residential_first'] = array(
  "resource" => "Property",
  "create_table" => true,
  "class" => "A",
  "keyfield" => "LIST_1",
  "query" => "(LIST_12=".$start_date."T00:00:00+),(LIST_15=|12LL26N0CIFT)"
);

$rets_config['FLEXMLS']['data']['residential_mid'] = array(
  "resource" => "Property",
  "create_table" => false,
  "class" => "A",
  "keyfield" => "LIST_1",
  "query" => "(LIST_12=".$start_date2."T00:00:00-),(LIST_12=".$mid_date."T00:00:00+),(LIST_15=|12LL26N0CIFT)"
);

$rets_config['FLEXMLS']['data']['residential_mid2'] = array(
  "resource" => "Property",
  "create_table" => false,
  "class" => "A",
  "keyfield" => "LIST_1",
  "query" => "(LIST_12=".$mid_date2."T00:00:00-),(LIST_12=".$mid2_date."T00:00:00+),(LIST_15=|12LL26N0CIFT)"
);

$rets_config['FLEXMLS']['data']['residential_mid3'] = array(
  "resource" => "Property",
  "create_table" => false,
  "class" => "A",
  "keyfield" => "LIST_1",
  "query" => "(LIST_12=".$mid2_date2."T00:00:00-),(LIST_12=".$mid3_date."T00:00:00+),(LIST_15=|12LL26N0CIFT)"
);

$rets_config['FLEXMLS']['data']['residential_mid4'] = array(
  "resource" => "Property",
  "create_table" => false,
  "class" => "A",
  "keyfield" => "LIST_1",
  "query" => "(LIST_12=".$mid3_date2."T00:00:00-),(LIST_12=".$mid4_date."T00:00:00+),(LIST_15=|12LL26N0CIFT)"
);

$rets_config['FLEXMLS']['data']['residential_mid5'] = array(
  "resource" => "Property",
  "create_table" => false,
  "class" => "A",
  "keyfield" => "LIST_1",
  "query" => "(LIST_12=".$mid4_date2."T00:00:00-),(LIST_12=".$mid5_date."T00:00:00+),(LIST_15=|12LL26N0CIFT)"
);

$rets_config['FLEXMLS']['data']['residential_mid6'] = array(
  "resource" => "Property",
  "create_table" => false,
  "class" => "A",
  "keyfield" => "LIST_1",
  "query" => "(LIST_12=".$mid5_date2."T00:00:00-),(LIST_12=".$mid6_date."T00:00:00+),(LIST_15=|12LL26N0CIFT)"
);

$rets_config['FLEXMLS']['data']['residential_mid7'] = array(
  "resource" => "Property",
  "create_table" => false,
  "class" => "A",
  "keyfield" => "LIST_1",
  "query" => "(LIST_12=".$mid6_date2."T00:00:00-),(LIST_12=".$mid7_date."T00:00:00+),(LIST_15=|12LL26N0CIFT)");

$rets_config['FLEXMLS']['data']['residential_last'] = array(
  "resource" => "Property",
  "create_table" => false,
  "class" => "A",
  "keyfield" => "LIST_1",
  "query" => "(LIST_12=".$mid7_date2."T00:00:00-),(LIST_12=".$last_date."T00:00:00+),(LIST_15=|12LL26N0CIFT)");

/////////////////////////////////////////////////////////////////////////////////////////////////
//  end of time-chunked residential data download
/////////////////////////////////////////////////////////////////////////////////////////////////

/*
$rets_config['FLEXMLS']['data']['vacantland'] = array(
  "resource" => "Property",
  "create_table" => true,
  "class" => "C",
  "keyfield" => "LIST_1",
  "query" => "(LIST_132=2011-01-01T00:00:00+),(LIST_15=|12LL26N0CIFT)");




$rets_config['FLEXMLS']['data']['rental'] = array(
  "resource" => "Property",
  "class" => "F",
  "create_table" => true,
  "keyfield" => "LIST_1",
  "query" => "(LIST_132=2011-01-01T00:00:00+),(LIST_15=|12LL26N0CIFT)");
  
*/

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
    case 'residential_last':
      flexmls_updateResidential();
      break;

    // B
    case 'multifamily':
      flexmls_updateMultifamily();
      break;

    // C
    case 'vacantland':
      flexmls_updateVacantland();
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

  }
}


/**
* flexmls_updateResidential function.
* Updates the flexmls_property_a table and the master_rets_table with Residential listing data from FLEXMLS
* @access public
* @return void
*/
function flexmls_updateResidential()
{
  // delete all old records in master table...
  $clean_up = mysql_query("DELETE FROM master_rets_table_closed where `property_type` = 'residential' ");
                                                                                                                 
  // now grab all the new records...
  $rets_results = mysql_query("SELECT * from flexmls_property_a_closed");
  $totRow=mysql_num_rows($rets_results);
  $cntRow=0;
  echo "Updating Residential properties into master_rets_table_closed [$totRows]..."."\n";
  if( $totRow > 0)
  {
    // process the new rows
    while($row = mysql_fetch_array($rets_results))
    {
      // Get State
      $row['state_or_province'] = getState($row['state_or_province'],$row['postal_code']);

      // Get County
      if(empty($row['county']))
      {
        $row['county'] = getCounty($row['postal_code'],$row['city']);
      }

      // always insert...
      $master_check =0;
      
      $datetime1 = new DateTime($row['listing_entry_timestamp']);
			$datetime2 = new DateTime($row['close_date']);
			$interval = $datetime1->diff($datetime2);
			// echo $interval->format('%a')."\n";

      if($master_check <= 0)
      {

        /** Insert new record into master table */
        $sql = "INSERT INTO `master_rets_table_closed` SET
        rets_system = 'FLEXMLS',
        agent_id = '".mysql_real_escape_string($row['agent_id'])."',
        rets_key = '".mysql_real_escape_string($row['listing_id'])."',
        listing_id = '".mysql_real_escape_string($row['listing_id'])."',
        street_number = '".mysql_real_escape_string($row['street_number'])."',
        street_name = '".mysql_real_escape_string($row['street_name'])."',
        street_dir = '".mysql_real_escape_string($row['street_dir'])."',
        street_suffix = '".mysql_real_escape_string($row['street_suffix'])."',
        city = '".mysql_real_escape_string($row['city'])."',
        state_province = '".mysql_real_escape_string($row['state_or_province'])."',
        postal_code = '".mysql_real_escape_string($row['postal_code'])."',
        property_type = 'Residential',
        property_sub_type = '".mysql_real_escape_string($row['property_sub_type_9'])."',
        dwelling_view = '".mysql_real_escape_string($row['home_view'])."',
        square_footage = '".mysql_real_escape_string($row['living_area'])."',
        bedrooms = '".mysql_real_escape_string($row['total_bedrooms'])."',
        bathrooms = '".mysql_real_escape_string($row['total_bathrooms'])."',
        remarks = '".mysql_real_escape_string($row['public_remarks'])."',
        listing_price = '".mysql_real_escape_string($row['list_price'])."',
        floor = '".mysql_real_escape_string($row['floor'])."',
        listing_date = '".$row['list_date']."',
        close_date = '".$row['close_date']."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['entry_timestamp'])."',
        listing_area = '".mysql_real_escape_string($row['listing_area'])."',
        year_built = '".mysql_real_escape_string($row['year_built'])."',
        exterior_features = '".mysql_real_escape_string($row['exterior_features'])."',
        interior_features = '".mysql_real_escape_string($row['interior_features'])."',
        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',
        
        pool = '".mysql_real_escape_string($row['pool'])."',
        pool_features = '".mysql_real_escape_string($row['pool_features'])."',
        private_pool = '".mysql_real_escape_string($row['pool_109'])."',
        
        utilities = '".mysql_real_escape_string($row['utilities'])."',
        equipment_appliances = '".mysql_real_escape_string($row['equipment_appliances'])."',
        waterfront = '".mysql_real_escape_string($row['water_type'])."',
        water_type = '".mysql_real_escape_string($row['view_description'])."',
        parking = '".mysql_real_escape_string($row['garage'])."',
        hoa = '".mysql_real_escape_string($row['LIST_59'])."',
        hoa_dues = '".mysql_real_escape_string($row['hoa_dues'])."',
        hoa_dues_term = '".mysql_real_escape_string($row['hoa_dues_term'])."',
        construction = '".mysql_real_escape_string($row['construction'])."',
        expenses = '".mysql_real_escape_string($row['expenses'])."',
        total_floors = '".mysql_real_escape_string($row['total_floors'])."',
        exterior_finish = '".mysql_real_escape_string($row['siding'])."',
        roof_type = '".mysql_real_escape_string($row['roof_type'])."',
        fireplace = '".mysql_real_escape_string($row['fireplace'])."',
        county = '".mysql_real_escape_string($row['county'])."',
        gated_community = '".mysql_real_escape_string($row['gated_community'])."',
        furnishing = '".mysql_real_escape_string($row['furnishing'])."',
        home_warranty = '".mysql_real_escape_string($row['home_warranty'])."',
        tax_year = '".mysql_real_escape_string($row['tax_year'])."',
        tax_amount = '".mysql_real_escape_string($row['taxes_75'])."',
        over_55 = '".mysql_real_escape_string($row['over_55'])."',
        subdivision = '".mysql_real_escape_string($row['subdivision'])."',
        property_status = '".mysql_real_escape_string($row['property_status'])."',
        home_style = '".mysql_real_escape_string($row['design'])."',
        home_view = '".mysql_real_escape_string($row['water_type'])."',
        additional_rooms = '".mysql_real_escape_string($row['additional_rooms'])."',

        garage = '".mysql_real_escape_string($row['garage'])."',
        short_sale = '".mysql_real_escape_string($row['short_sale_add'])."',
        amenities = '".mysql_real_escape_string($row['amenities'])."',
        security = '".mysql_real_escape_string($row['security'])."',
        dining_area = '".mysql_real_escape_string($row['dining_area'])."',
        heating = '".mysql_real_escape_string($row['heating'])."',
        water_footage = '".mysql_real_escape_string($row['waterfront_footage'])."',
        halfbaths =  '".mysql_real_escape_string($row['total_half_bathrooms'])."',
        cooling =  '".mysql_real_escape_string($row['cooling'])."',
        design =  '".mysql_real_escape_string($row['design'])."',
        pets =  '".mysql_real_escape_string($row['pets'])."',
        zoning = '".mysql_real_escape_string($row['zoning'])."',
        
        days_on_market =  '".$interval->format('%a')."',
        close_price =  '".mysql_real_escape_string($row['close_price'])."',
      
        ada_comp = '".mysql_real_escape_string($row['ada_comp'])."',
        boat_services = '".mysql_real_escape_string($row['boat_services'])."',
        lot_desc = '".mysql_real_escape_string($row['lot_desc'])."',
        maint_fee_inc =  '".mysql_real_escape_string($row['maint_fee_inc'])."',
        master_bedbath =  '".mysql_real_escape_string($row['master_bedbath'])."',
        membership =  '".mysql_real_escape_string($row['membership'])."',
        restrictions =  '".mysql_real_escape_string($row['restrictions'])."',
        rooms = '".mysql_real_escape_string($row['rooms'])."',   
        special_info =  '".mysql_real_escape_string($row['special_info'])."',
        tax_places =  '".mysql_real_escape_string($row['tax_places'])."',
        terms_considered =  '".mysql_real_escape_string($row['terms_considered'])."',
        unit_desc = '".mysql_real_escape_string($row['unit_desc'])."',                       

        elem_school =  '".mysql_real_escape_string($row['elem_school'])."',
        middle_school =  '".mysql_real_escape_string($row['middle_school'])."',
        high_school =  '".mysql_real_escape_string($row['high_school'])."',

        latitude = '".mysql_real_escape_string($row['latitude'])."',
        longitude = '".mysql_real_escape_string($row['longitude'])."',
        virtual_tour = '".mysql_real_escape_string($row['unbranded_virtual_tour'])."',
        photo_count = '".mysql_real_escape_string($row['picture_count'])."',
        photo_timestamp = '".mysql_real_escape_string($row['picture_timestamp'])."',
        listing_office_name = '".mysql_real_escape_string($row['listing_office_name'])."',
        listing_office_phone = '".mysql_real_escape_string($row['listing_office_phone'])."',
        listing_office_fax = '".mysql_real_escape_string($row['listing_office_fax'])."',
        listing_office_url = '".mysql_real_escape_string($row['listing_office_url'])."',
        listing_office_address = '".mysql_real_escape_string($row['listing_office_address'])."',
        listing_office_email = '".mysql_real_escape_string($row['listing_office_email'])."',
        lot_acres = '".mysql_real_escape_string($row['lot_acres'])."',
        split_yn = '".mysql_real_escape_string($row['split_yn'])."',
        listing_status = '".mysql_real_escape_string($row['listing_status'])."'";

      }
    

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

/**  bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb
* flexmls_updateMultifamily function.
* Updates the flexmls_property_b table and the master_rets_table with Multi-Family listing data from FLEXMLS
* @access public
* @return void
bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb */
function flexmls_updateMultifamily()
{
  // delete existing properties in master_table
  $clean_up = mysql_query("DELETE FROM `master_rets_table_closed` WHERE `property_type` = 'multifamily' ");

  // Check for New Records
  $rets_results = mysql_query("SELECT * from `flexmls_property_b` WHERE listing_status != 'Closed'");
  $totRow=mysql_num_rows($rets_results);
  $cntRow=0;
  echo "Updating Multifamily properties into master_rets_table_closed [$totRows]..."."\n";

  // Check for Rows
  if(mysql_num_rows($rets_results) > 0)
  {
    while($row = mysql_fetch_array($rets_results))
    {
      // Get State
      $row['state_or_province'] = getState($row['state_or_province'],$row['postal_code']);

      // Get County
      if(empty($row['county']))
      {
        $row['county'] = getCounty($row['postal_code'],$row['city']);
      }
      // Master Record Check
      //$master_check = mysql_query("SELECT * FROM `master_rets_table` WHERE listing_id = '".$row['listing_id']."' AND rets_system = 'FLEXMLS'");
      $master_check =0;

      // Insert or Update
      if(($master_check) <= 0)
      {

        /** Insert new record into master table */
        $sql = "INSERT INTO `master_rets_table_closed` SET
        rets_system = 'FLEXMLS',
        agent_id = '".mysql_real_escape_string($row['agent_id'])."',
        rets_key = '".mysql_real_escape_string($row['listing_id'])."',
        listing_id = '".mysql_real_escape_string($row['listing_id'])."',
        street_number = '".mysql_real_escape_string($row['street_number'])."',
        street_name = '".mysql_real_escape_string($row['street_name'])."',
        street_dir = '".mysql_real_escape_string($row['street_dir'])."',
        street_suffix = '".mysql_real_escape_string($row['street_suffix'])."',
        city = '".mysql_real_escape_string($row['city'])."',
        state_province = '".mysql_real_escape_string($row['state_or_province'])."',
        postal_code = '".mysql_real_escape_string($row['postal_code'])."',
        property_type = 'Multifamily',
        property_sub_type = '".mysql_real_escape_string($row['property_sub_type_9'])."',
        square_footage = '".mysql_real_escape_string($row['living_area'])."',
        bedrooms = '".mysql_real_escape_string($row['total_bedrooms'])."',
        bathrooms = '".mysql_real_escape_string($row['total_bathrooms'])."',
        remarks = '".mysql_real_escape_string($row['public_remarks'])."',
        listing_price = '".mysql_real_escape_string($row['list_price'])."',
        listing_date = '".$row['list_date']."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['entry_timestamp'])."',
        listing_area = '".mysql_real_escape_string($row['listing_area'])."',
        year_built = '".mysql_real_escape_string($row['year_built'])."',
        exterior_features = '".mysql_real_escape_string($row['GF20121206202429990607000000'])."',
        interior_features = '".mysql_real_escape_string($row['interior_features'])."',
        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',
        pool = '".mysql_real_escape_string($row['pool'])."',
        pool_features = '".mysql_real_escape_string($row['pool_features'])."',
        utilities = '".mysql_real_escape_string($row['GF20121206202432180006000000'])."',
        equipment_appliances = '".mysql_real_escape_string($row['GF20121211024909824726000000'])."',
        waterfront = '".mysql_real_escape_string($row['waterfront'])."',
        water_type = '".mysql_real_escape_string($row['GF20121206202432319685000000 '])."',
        floor = '".mysql_real_escape_string($row['GF20121206202430370061000000'])."',
        parking = '".mysql_real_escape_string($row['garage'])."',
        hoa = '".mysql_real_escape_string($row['hoa'])."',
        hoa_dues = '".mysql_real_escape_string($row['hoa_dues'])."',
        hoa_dues_term = '".mysql_real_escape_string($row['hoa_dues_term'])."',
        construction = '".mysql_real_escape_string($row['GF20121206202429699010000000'])."',
        expenses = '".mysql_real_escape_string($row['expenses'])."',
        total_floors = '".mysql_real_escape_string($row['total_floors'])."',
        exterior_finish = '".mysql_real_escape_string($row['siding'])."',
        roof_type = '".mysql_real_escape_string($row['GF20121206202431346706000000'])."',
        fireplace = '".mysql_real_escape_string($row['fireplace'])."',
        county = '".mysql_real_escape_string($row['county'])."',
        gated_community = '".mysql_real_escape_string($row['gated_community'])."',
        furnishing = '".mysql_real_escape_string($row['furnishing'])."',
        home_warranty = '".mysql_real_escape_string($row['home_warranty'])."',
        tax_year = '".mysql_real_escape_string($row['tax_year'])."',
        tax_amount = '".mysql_real_escape_string($row['taxes_75'])."',
        over_55 = '".mysql_real_escape_string($row['over_55'])."',
        subdivision = '".mysql_real_escape_string($row['subdivision'])."',
        property_status = '".mysql_real_escape_string($row['property_status'])."',
        home_style = '".mysql_real_escape_string($row['design'])."',
        home_view = '".mysql_real_escape_string($row['GF20121206202432253492000000'])."',
        additional_rooms = '".mysql_real_escape_string($row['additional_rooms'])."',

        garage = '".mysql_real_escape_string($row['GF20121211024929412648000000'])."',
        short_sale = '".mysql_real_escape_string($row['short_sale_add'])."',
        amenities = '".mysql_real_escape_string($row['GF20121206202431812853000000'])."',
        security = '".mysql_real_escape_string($row['security'])."',
        dining_area = '".mysql_real_escape_string($row['dining_area'])."',
        heating = '".mysql_real_escape_string($row['GF20121206202430480207000000'])."',
        water_footage = '".mysql_real_escape_string($row['waterfront_footage'])."',
        halfbaths =  '".mysql_real_escape_string($row['total_half_bathrooms'])."',
        cooling =  '".mysql_real_escape_string($row['GF20121206202429621266000000'])."',
        design =  '".mysql_real_escape_string($row['design'])."',
        avail =   '".mysql_real_escape_string($row['GF20121211025311002579000000'])."',
        tenant_pays = '".mysql_real_escape_string($row['GF20121211025246111452000000'])."',
        terms = '".mysql_real_escape_string($row['GF20121206202432075264000000'])."',
        pets =  '".mysql_real_escape_string($row['pets'])."',
        zoning = '".mysql_real_escape_string($row['zoning'])."',

        latitude = '".mysql_real_escape_string($row['latitude'])."',
        longitude = '".mysql_real_escape_string($row['longitude'])."',
        virtual_tour = '".mysql_real_escape_string($row['unbranded_virtual_tour'])."',
        photo_count = '".mysql_real_escape_string($row['picture_count'])."',
        photo_timestamp = '".mysql_real_escape_string($row['picture_timestamp'])."',
        listing_office_name = '".mysql_real_escape_string($row['listing_office_name'])."',
        listing_office_phone = '".mysql_real_escape_string($row['listing_office_phone'])."',
        listing_office_fax = '".mysql_real_escape_string($row['listing_office_fax'])."',
        listing_office_url = '".mysql_real_escape_string($row['listing_office_url'])."',
        listing_office_address = '".mysql_real_escape_string($row['listing_office_address'])."',
        listing_office_email = '".mysql_real_escape_string($row['listing_office_email'])."',
        lot_acres = '".mysql_real_escape_string($row['GF20121206202430654127000000'])."',
        split_yn = '".mysql_real_escape_string($row['split_yn'])."',
        listing_status = '".mysql_real_escape_string($row['listing_status'])."'";

      }


      // Run Query
      $sql = htmlspecialchars($sql);
      $results = mysql_query($sql) or die(mysql_error().$sql);
      $cntRow++;

      if (($cntRow % 50) == 0) {
        $pctDone= number_format($cntRow/$totRow*100,1);
        echo "Working [$pctDone%]..."."\n";
      }
    }
    echo "Update MULTIFAMILY properties DONE...ok"."\n\n";
  }

}

/** ccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc
* flexmls_updateVacantland function.
* Updates the flexmls_property_c table and the master_rets_table with Vacant Land listing data from FLEXMLS
* @access public
* @return void
ccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc */
function flexmls_updateVacantland()
{

  // clean up master table for fresh import
  $clean_up = mysql_query("DELETE FROM `master_rets_table_closed` WHERE `property_type` = 'vacantland';");

  // only get non-closed properties for master table
  $rets_results = mysql_query("SELECT * from `flexmls_property_c` WHERE listing_status != 'Closed'");
  $totRow=mysql_num_rows($rets_results);
  $cntRow=0;
  echo "inserting vacantland properties into master_rets_table_closed [$totRows]..."."\n";

  if(mysql_num_rows($rets_results) > 0)
  {
    while($row = mysql_fetch_array($rets_results))
    {

      // Get State
      $row['state_or_province'] = getState($row['state_or_province'],$row['postal_code']);

      // Get County
      if(empty($row['county']))
      {
        $row['county'] = getCounty($row['postal_code'],$row['city']);
      }

      // Master Record Check
      // $master_check = mysql_query("SELECT * FROM `master_rets_table` WHERE listing_id = '".$row['listing_id']."' AND rets_system = 'FLEXMLS'");
      $master_check = 0;

      // Insert or Update
      if(($master_check) <= 0)
      {

        /** Insert new record into master table */
        $sql = "INSERT INTO `master_rets_table_closed` SET
        rets_system = 'FLEXMLS',
        agent_id = '".mysql_real_escape_string($row['agent_id'])."',
        rets_key = '".mysql_real_escape_string($row['listing_id'])."',
        listing_id = '".mysql_real_escape_string($row['listing_id'])."',
        street_number = '".mysql_real_escape_string($row['street_number'])."',
        street_name = '".mysql_real_escape_string($row['street_name'])."',
        street_dir = '".mysql_real_escape_string($row['street_dir'])."',
        street_suffix = '".mysql_real_escape_string($row['street_suffix'])."',
        city = '".mysql_real_escape_string($row['city'])."',
        state_province = '".mysql_real_escape_string($row['state_or_province'])."',
        postal_code = '".mysql_real_escape_string($row['postal_code'])."',
        property_type = 'vacantland',
        property_sub_type = '".mysql_real_escape_string($row['property_sub_type_9'])."',
        square_footage = '".mysql_real_escape_string($row['living_area'])."',
        bedrooms = '".mysql_real_escape_string($row['total_bedrooms'])."',
        bathrooms = '".mysql_real_escape_string($row['total_bathrooms'])."',
        remarks = '".mysql_real_escape_string($row['public_remarks'])."',
        listing_price = '".mysql_real_escape_string($row['list_price'])."',
        listing_date = '".mysql_real_escape_string($row['list_date'])."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['entry_timestamp'])."',
        listing_area = '".mysql_real_escape_string($row['listing_area'])."',
        year_built = '".mysql_real_escape_string($row['year_built'])."',
        exterior_features = '".mysql_real_escape_string($row['exterior_features'])."',
        interior_features = '".mysql_real_escape_string($row['interior_features'])."',
        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',
        pool = '".mysql_real_escape_string($row['pool'])."',
        pool_features = '".mysql_real_escape_string($row['pool_features'])."',

        equipment_appliances = '".mysql_real_escape_string($row['equipment_appliances'])."',
        waterfront = '".mysql_real_escape_string($row['waterfront_108'])."',
        water_type = '".mysql_real_escape_string($row['water_type'])."',
        parking = '".mysql_real_escape_string($row['garage'])."',
        hoa = '".mysql_real_escape_string($row['hoa'])."',
        hoa_dues = '".mysql_real_escape_string($row['hoa_dues'])."',
        hoa_dues_term = '".mysql_real_escape_string($row['hoa_dues_term'])."',
        pets =  '".mysql_real_escape_string($row['pets'])."',
        construction = '".mysql_real_escape_string($row['construction'])."',
        expenses = '".mysql_real_escape_string($row['expenses'])."',
        floor = '".mysql_real_escape_string($row['floor'])."',
        total_floors = '".mysql_real_escape_string($row['total_floors'])."',
        exterior_finish = '".mysql_real_escape_string($row['siding'])."',
        roof_type = '".mysql_real_escape_string($row['roof_type'])."',
        fireplace = '".mysql_real_escape_string($row['fireplace'])."',
        county = '".mysql_real_escape_string($row['county'])."',
        gated_community = '".mysql_real_escape_string($row['gated_community'])."',
        furnishing = '".mysql_real_escape_string($row['furnishing'])."',
        home_warranty = '".mysql_real_escape_string($row['home_warranty'])."',
        tax_year = '".mysql_real_escape_string($row['tax_year'])."',
        tax_amount = '".mysql_real_escape_string($row['taxes_75'])."',
        over_55 = '".mysql_real_escape_string($row['over_55'])."',
        subdivision = '".mysql_real_escape_string($row['subdivision'])."',
        property_status = '".mysql_real_escape_string($row['property_status'])."',
        home_view = '".mysql_real_escape_string($row['views_view_description'])."',
        additional_rooms = '".mysql_real_escape_string($row['additional_rooms'])."',
        latitude = '".mysql_real_escape_string($row['latitude'])."',
        longitude = '".mysql_real_escape_string($row['longitude'])."',
        virtual_tour = '".mysql_real_escape_string($row['unbranded_virtual_tour'])."',
        zoning = '".mysql_real_escape_string($row['zoning'])."',
        photo_count = '".mysql_real_escape_string($row['picture_count'])."',
        photo_timestamp = '".mysql_real_escape_string($row['picture_timestamp'])."',
        listing_office_name = '".mysql_real_escape_string($row['listing_office_name'])."',
        listing_office_phone = '".mysql_real_escape_string($row['listing_office_phone'])."',
        listing_office_fax = '".mysql_real_escape_string($row['listing_office_fax'])."',
        listing_office_url = '".mysql_real_escape_string($row['listing_office_url'])."',
        listing_office_address = '".mysql_real_escape_string($row['listing_office_address'])."',
        listing_office_email = '".mysql_real_escape_string($row['listing_office_email'])."',
        lot_acres = '".mysql_real_escape_string($row['lot_acres'])."',

        short_sale = '".mysql_real_escape_string($row['short_sale'])."',
        home_style = '".mysql_real_escape_string($row['GF20121212011728862864000000'])."',
        utilities = '".mysql_real_escape_string($row['GF20121212012012374000000000'])."',
        terms = '".mysql_real_escape_string($row['GF20121206202841653258000000'])."',

        bank_owned = '".mysql_real_escape_string($row['reo_bank_owned'])."',
        development = '".mysql_real_escape_string($row['development'])."',
        frontage = '".mysql_real_escape_string($row['carport_spaces'])."',
        develop_status = '".mysql_real_escape_string($row['GF20121212011824746523000000'])."',
        tot_units = '".mysql_real_escape_string($row['total_unit'])."',
        improvements = '".mysql_real_escape_string($row['GF20121212011939214790000000'])."',
        loc = '".mysql_real_escape_string($row['GF20121212011743686236000000'])."',
        loc_desc = '".mysql_real_escape_string($row['GF20121206202840172334000000'])."',

        listing_status = '".mysql_real_escape_string($row['listing_status'])."'";

      }

      // Run Query
      $results = mysql_query($sql) or die(mysql_error().$sql);
      $cntRow++;

      if (($cntRow % 50) == 0) {
        $pctDone= number_format($cntRow/$totRow*100,1);
        echo "Working [$pctDone%]..."."\n";
      }
    }
    echo "Update VACANTLAND properties DONE...ok"."\n\n";
  }

}

/** ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
* flexmls_updateBusiness function.
* Updates the flexmls_property_d table and the master_rets_table with Business listing data from FLEXMLS
* @access public
* @return void
ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd */
function flexmls_updateBusiness()
{

  // Clean up records
  $clean_up = mysql_query("DELETE FROM `master_rets_table_closed` WHERE `property_type` = 'business';");

  // Check for New Records
  $rets_results = mysql_query("SELECT * from `flexmls_property_d` WHERE listing_status != 'Closed'");
  $totRow=mysql_num_rows($rets_results);
  $cntRow=0;
  echo "Updating Business properties into master_rets_table_closed [$totRows]..."."\n";


  // Check for Rows
  if(mysql_num_rows($rets_results) > 0){

    while($row = mysql_fetch_array($rets_results))
    {
      // Get State
      $row['state_or_province'] = getState($row['state_or_province'],$row['postal_code']);

      // Get County
      if(empty($row['county']))
      {
        $row['county'] = getCounty($row['postal_code'],$row['city']);
      }

      // Master Record Check
      // $master_check = mysql_query("SELECT * FROM `master_rets_table` WHERE listing_id = '".$row['listing_id']."' AND rets_system = 'FLEXMLS'");
      $master_check = 0;

      // Insert or Update
      if(($master_check) <= 0) {

        /** Insert new record into master table */
        $sql = "INSERT INTO `master_rets_table_closed` SET
        rets_system = 'FLEXMLS',
        agent_id = '".mysql_real_escape_string($row['agent_id'])."',
        rets_key = '".mysql_real_escape_string($row['listing_id'])."',
        listing_id = '".mysql_real_escape_string($row['listing_id'])."',
        street_number = '".mysql_real_escape_string($row['street_number'])."',
        street_name = '".mysql_real_escape_string($row['street_name'])."',
        street_dir = '".mysql_real_escape_string($row['street_dir'])."',
        street_suffix = '".mysql_real_escape_string($row['street_suffix'])."',
        city = '".mysql_real_escape_string($row['city'])."',
        state_province = '".mysql_real_escape_string($row['state_or_province'])."',
        postal_code = '".mysql_real_escape_string($row['postal_code'])."',
        property_type = 'business',
        property_sub_type = '".mysql_real_escape_string($row['property_sub_type_9'])."',
        square_footage = '".mysql_real_escape_string($row['living_area'])."',
        bedrooms = '".mysql_real_escape_string($row['total_bedrooms'])."',
        bathrooms = '".mysql_real_escape_string($row['total_bathrooms'])."',
        remarks = '".mysql_real_escape_string($row['public_remarks'])."',
        listing_price = '".mysql_real_escape_string($row['list_price'])."',
        listing_date = '".mysql_real_escape_string($row['list_date'])."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['entry_timestamp'])."',
        listing_area = '".mysql_real_escape_string($row['listing_area'])."',
        year_built = '".mysql_real_escape_string($row['year_built'])."',
        exterior_features = '".mysql_real_escape_string($row['exterior_features'])."',
        interior_features = '".mysql_real_escape_string($row['interior_features'])."',
        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',
        pool = '".mysql_real_escape_string($row['pool_109'])."',
        pool_features = '".mysql_real_escape_string($row['pool_features'])."',
        equipment_appliances = '".mysql_real_escape_string($row['equipment_appliances'])."',
        waterfront = '".mysql_real_escape_string($row['waterfront'])."',
        water_type = '".mysql_real_escape_string($row['water_type'])."',
        hoa_dues = '".mysql_real_escape_string($row['hoa_dues_amount'])."',
        hoa_dues_term = '".mysql_real_escape_string($row['hoa_dues_term'])."',
        construction = '".mysql_real_escape_string($row['GF20121206202913690592000000'])."',
        expenses = '".mysql_real_escape_string($row['GF20121209033225595741000000'])."',
        floor = '".mysql_real_escape_string($row['GF20121206202914212504000000'])."',
        total_floors = '".mysql_real_escape_string($row['total_floors'])."',
        exterior_finish = '".mysql_real_escape_string($row['siding'])."',

        fireplace = '".mysql_real_escape_string($row['fireplace'])."',
        county = '".mysql_real_escape_string($row['county'])."',
        gated_community = '".mysql_real_escape_string($row['gated_community'])."',

        furnishing = '".mysql_real_escape_string($row['furnishing'])."',
        home_warranty = '".mysql_real_escape_string($row['home_warranty'])."',
        tax_year = '".mysql_real_escape_string($row['LIST_122'])."',
        tax_amount = '".mysql_real_escape_string($row['taxes_75'])."',
        over_55 = '".mysql_real_escape_string($row['over_55'])."',
        subdivision = '".mysql_real_escape_string($row['subdivision'])."',
        property_status = '".mysql_real_escape_string($row['property_status'])."',
        home_view = '".mysql_real_escape_string($row['view_description'])."',
        additional_rooms = '".mysql_real_escape_string($row['additional_rooms'])."',
        latitude = '".mysql_real_escape_string($row['latitude'])."',
        longitude = '".mysql_real_escape_string($row['longitude'])."',
        virtual_tour = '".mysql_real_escape_string($row['unbranded_virtual_tour'])."',
        photo_count = '".mysql_real_escape_string($row['picture_count'])."',
        photo_timestamp = '".mysql_real_escape_string($row['picture_timestamp'])."',
        zoning = '".mysql_real_escape_string($row['zoning'])."',
        listing_office_name = '".mysql_real_escape_string($row['listing_office_name'])."',
        listing_office_phone = '".mysql_real_escape_string($row['listing_office_phone'])."',
        listing_office_fax = '".mysql_real_escape_string($row['listing_office_fax'])."',
        listing_office_url = '".mysql_real_escape_string($row['listing_office_url'])."',
        listing_office_address = '".mysql_real_escape_string($row['listing_office_address'])."',
        listing_office_email = '".mysql_real_escape_string($row['listing_office_email'])."',
        lot_acres = '".mysql_real_escape_string($row['lot_acres'])."',
        split_yn = '".mysql_real_escape_string($row['split_yn'])."',

        heating = '".mysql_real_escape_string($row['GF20121206202914323008000000'])."',
        cooling = '".mysql_real_escape_string($row['GF20121206202913609761000000'])."',
        terms = '".mysql_real_escape_string($row['GF20121206202915944331000000'])."',
        loc = '".mysql_real_escape_string($row['GF20121209033014363719000000'])."',
        parking = '".mysql_real_escape_string($row['GF20121206202914938674000000'])."',
        roof_type = '".mysql_real_escape_string($row['GF20121206202915149760000000'])."',
        security = '".mysql_real_escape_string($row['GF20121206202915449375000000'])."',
        home_style = '".mysql_real_escape_string($row['GF20121206202915944331000000'])."',
        utilities = '".mysql_real_escape_string($row['GF20121206202916054421000000'])."',

        bus_type= '".mysql_real_escape_string($row['hoa'])."',
        bus_name =  '".mysql_real_escape_string($row['pets'])."',
        bus_license = '".mysql_real_escape_string($row['GF20121209033813826417000000'])."',
        bus_inc = '".mysql_real_escape_string($row['GF20121206202915041661000000'])."',
        bus_info = '".mysql_real_escape_string($row['GF20121206202915832531000000'])."',
        bus_misc1 = '".mysql_real_escape_string($row['GF20121209033435812725000000'])."',
        bus_misc2 = '".mysql_real_escape_string($row['GF20121209033454571173000000'])."',
        list_pr_sqft =   '".mysql_real_escape_string($row['list_price_sqft'])."',
        renew_opt =  '".mysql_real_escape_string($row['pool_109'])."',
        training =   '".mysql_real_escape_string($row['reo_bank_owned'])."',
        lease_exp_date = '".mysql_real_escape_string($row['LIST_127'])."',
        num_emp = '".mysql_real_escape_string($row['FEAT20121227211732273682000000'])."',
        avail_docs = '".mysql_real_escape_string($row['GF20121209033308089362000000'])."',
        avail_info = '".mysql_real_escape_string($row['GF20121209033248961257000000'])."',
        fire_protect = '".mysql_real_escape_string($row['GF20121209033517950242000000'])."',
        owner = '".mysql_real_escape_string($row['GF20121209033414179386000000'])."',

        listing_status = '".mysql_real_escape_string($row['listing_status'])."'";

      }
      else {

        /** Update record into master table */
        $sql = "UPDATE `master_rets_table_closed` SET
        rets_system = 'FLEXMLS',
        agent_id = '".mysql_real_escape_string($row['agent_id'])."',
        rets_key = '".mysql_real_escape_string($row['listing_id'])."',
        street_number = '".mysql_real_escape_string($row['street_number'])."',
        street_name = '".mysql_real_escape_string($row['street_name'])."',
        street_dir = '".mysql_real_escape_string($row['street_dir'])."',
        street_suffix = '".mysql_real_escape_string($row['street_suffix'])."',
        city = '".mysql_real_escape_string($row['city'])."',
        state_province = '".mysql_real_escape_string($row['state_or_province'])."',
        postal_code = '".mysql_real_escape_string($row['postal_code'])."',
        property_type = 'business',
        property_sub_type = '".mysql_real_escape_string($row['property_sub_type_9'])."',
        square_footage = '".mysql_real_escape_string($row['living_area'])."',
        bedrooms = '".mysql_real_escape_string($row['total_bedrooms'])."',
        bathrooms = '".mysql_real_escape_string($row['total_bathrooms'])."',
        remarks = '".mysql_real_escape_string($row['public_remarks'])."',
        listing_price = '".mysql_real_escape_string($row['list_price'])."',
        listing_date = '".mysql_real_escape_string($row['list_date'])."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['entry_timestamp'])."',
        listing_area = '".mysql_real_escape_string($row['listing_area'])."',
        year_built = '".mysql_real_escape_string($row['year_built'])."',
        exterior_features = '".mysql_real_escape_string($row['exterior_features'])."',
        interior_features = '".mysql_real_escape_string($row['interior_features'])."',
        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',
        pool = '".mysql_real_escape_string($row['pool'])."',
        pool_features = '".mysql_real_escape_string($row['pool_features'])."',
        utilities = '".mysql_real_escape_string($row['utilities'])."',
        equipment_appliances = '".mysql_real_escape_string($row['equipment_appliances'])."',
        waterfront = '".mysql_real_escape_string($row['waterfront'])."',
        water_type = '".mysql_real_escape_string($row['water_type'])."',
        parking = '".mysql_real_escape_string($row['garage'])."',
        hoa = '".mysql_real_escape_string($row['hoa'])."',
        hoa_dues = '".mysql_real_escape_string($row['hoa_dues_amount'])."',
        hoa_dues_term = '".mysql_real_escape_string($row['hoa_dues_term'])."',
        construction = '".mysql_real_escape_string($row['construction'])."',
        expenses = '".mysql_real_escape_string($row['expenses'])."',
        floor = '".mysql_real_escape_string($row['floor'])."',
        total_floors = '".mysql_real_escape_string($row['total_floors'])."',
        exterior_finish = '".mysql_real_escape_string($row['siding'])."',
        roof_type = '".mysql_real_escape_string($row['roof_type'])."',
        fireplace = '".mysql_real_escape_string($row['fireplace'])."',
        county = '".mysql_real_escape_string($row['county'])."',
        gated_community = '".mysql_real_escape_string($row['gated_community'])."',
        furnishing = '".mysql_real_escape_string($row['furnishing'])."',
        home_warranty = '".mysql_real_escape_string($row['home_warranty'])."',
        tax_year = '".mysql_real_escape_string($row['tax_year'])."',
        tax_amount = '".mysql_real_escape_string($row['taxes_75'])."',
        over_55 = '".mysql_real_escape_string($row['over_55'])."',
        subdivision = '".mysql_real_escape_string($row['subdivision'])."',
        property_status = '".mysql_real_escape_string($row['property_status'])."',
        home_style = '".mysql_real_escape_string($row['design'])."',
        home_view = '".mysql_real_escape_string($row['view_description'])."',
        additional_rooms = '".mysql_real_escape_string($row['additional_rooms'])."',
        pets =  '".mysql_real_escape_string($row['pets'])."',
        latitude = '".mysql_real_escape_string($row['latitude'])."',
        longitude = '".mysql_real_escape_string($row['longitude'])."',
        virtual_tour = '".mysql_real_escape_string($row['unbranded_virtual_tour'])."',
        zoning = '".mysql_real_escape_string($row['zoning'])."',
        photo_count = '".mysql_real_escape_string($row['picture_count'])."',
        photo_timestamp = '".mysql_real_escape_string($row['picture_timestamp'])."',
        listing_office_name = '".mysql_real_escape_string($row['listing_office_name'])."',
        listing_office_phone = '".mysql_real_escape_string($row['listing_office_phone'])."',
        listing_office_fax = '".mysql_real_escape_string($row['listing_office_fax'])."',
        listing_office_url = '".mysql_real_escape_string($row['listing_office_url'])."',
        listing_office_address = '".mysql_real_escape_string($row['listing_office_address'])."',
        listing_office_email = '".mysql_real_escape_string($row['listing_office_email'])."',
        lot_acres = '".mysql_real_escape_string($row['lot_acres'])."',
        split_yn = '".mysql_real_escape_string($row['split_yn'])."',
        listing_status = '".mysql_real_escape_string($row['listing_status'])."'
        WHERE listing_id = '".mysql_real_escape_string($row['listing_id'])."' AND rets_system = 'FLEXMLS'";

      }

      // Run Query
      $results = mysql_query($sql) or die(mysql_error().$sql);
      $cntRow++;

      if (($cntRow % 50) == 0) {
        $pctDone= number_format($cntRow/$totRow*100,1);
        echo "Working [$pctDone%]..."."\n";
      }
    }

  }

}

/**   eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
* flexmls_updateCommercial function.
* Updates the flexmls_property_e table and the master_rets_table with Commercial listing data from FLEXMLS
* @access public
* @return void
* eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee */
function flexmls_updateCommercial()
{

  // Clean up records
  // $clean_up = mysql_query("DELETE FROM `master_rets_table` WHERE `rets_system` = 'FLEXMLS' AND `property_type` = 'commercial' AND `listing_id` NOT IN(SELECT `listing_id` FROM `flexmls_property_e`)");
  $clean_up = mysql_query("DELETE FROM `master_rets_table_closed` WHERE `property_type` = 'commercial';");

  // Check for New Records
  $rets_results = mysql_query("SELECT * from `flexmls_property_e` WHERE listing_status != 'Closed'");
  $totRow=mysql_num_rows($rets_results);
  $cntRow=0;
  echo "Updating Commercial properties into master_rets_table_closed $totRows Properties ]..."."\n";

  // Check for Rows
  if(mysql_num_rows($rets_results) > 0)
  {

    while($row = mysql_fetch_array($rets_results))
    {

      // Get State
      $row['state_or_province'] = getState($row['state_or_province'],$row['postal_code']);

      // Get County
      if(empty($row['county']))
      {
        $row['county'] = getCounty($row['postal_code'],$row['city']);
      }

      // Master Record Check
      // $master_check = mysql_query("SELECT * FROM `master_rets_table` WHERE listing_id = '".$row['listing_id']."' AND rets_system = 'FLEXMLS'");
      $master_check=0;

      // Insert or Update
      if(($master_check) <= 0)
      {

        /** Insert new record into master table */
        $sql = "	INSERT INTO `master_rets_table_closed` SET
        rets_system = 'FLEXMLS',
        agent_id = '".mysql_real_escape_string($row['agent_id'])."',
        rets_key = '".mysql_real_escape_string($row['listing_id'])."',
        listing_id = '".mysql_real_escape_string($row['listing_id'])."',
        street_number = '".mysql_real_escape_string($row['street_number'])."',
        street_name = '".mysql_real_escape_string($row['street_name'])."',
        street_dir = '".mysql_real_escape_string($row['street_dir'])."',
        street_suffix = '".mysql_real_escape_string($row['street_suffix'])."',
        city = '".mysql_real_escape_string($row['city'])."',
        state_province = '".mysql_real_escape_string($row['state_or_province'])."',
        postal_code = '".mysql_real_escape_string($row['postal_code'])."',
        property_type = 'commercial',
        property_sub_type = '".mysql_real_escape_string($row['property_sub_type_9'])."',
        square_footage = '".mysql_real_escape_string($row['living_area'])."',
        bedrooms = '".mysql_real_escape_string($row['total_bedrooms'])."',
        bathrooms = '".mysql_real_escape_string($row['total_bathrooms'])."',
        remarks = '".mysql_real_escape_string($row['public_remarks'])."',
        listing_price = '".mysql_real_escape_string($row['list_price'])."',
        listing_date = '".mysql_real_escape_string($row['list_date'])."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['entry_timestamp'])."',
        listing_area = '".mysql_real_escape_string($row['listing_area'])."',
        year_built = '".mysql_real_escape_string($row['year_built'])."',
        exterior_features = '".mysql_real_escape_string($row['exterior_features'])."',
        interior_features = '".$row['interior_features']."',
        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',
        pool = '".mysql_real_escape_string($row['pool'])."',
        pool_features = '".mysql_real_escape_string($row['pool_features'])."',
        equipment_appliances = '".mysql_real_escape_string($row['equipment_appliances'])."',
        waterfront = '".mysql_real_escape_string($row['LIST_108'])."',
        water_type = '".mysql_real_escape_string($row['water_type'])."',
        hoa = '".mysql_real_escape_string($row['hoa'])."',
        hoa_dues = '".mysql_real_escape_string($row['hoa_dues_amount'])."',
        hoa_dues_term = '".mysql_real_escape_string($row['hoa_dues_term'])."',
        construction = '".mysql_real_escape_string($row['construction'])."',
        expenses = '".mysql_real_escape_string($row['expenses'])."',
        floor = '".mysql_real_escape_string($row['GF20121206202935671233000000'])."',
        total_floors = '".mysql_real_escape_string($row['total_floors'])."',
        exterior_finish = '".mysql_real_escape_string($row['siding'])."',
        fireplace = '".mysql_real_escape_string($row['fireplace'])."',
        county = '".mysql_real_escape_string($row['county'])."',
        gated_community = '".mysql_real_escape_string($row['gated_community'])."',
        furnishing = '".mysql_real_escape_string($row['furnishing'])."',
        home_warranty = '".mysql_real_escape_string($row['home_warranty'])."',
        tax_year = '".mysql_real_escape_string($row['tax_year'])."',
        tax_amount = '".mysql_real_escape_string($row['taxes_75'])."',
        over_55 = '".mysql_real_escape_string($row['over_55'])."',
        subdivision = '".mysql_real_escape_string($row['subdivision'])."',
        property_status = '".mysql_real_escape_string($row['property_status'])."',
        home_view = '".mysql_real_escape_string($row['view_description'])."',
        additional_rooms = '".mysql_real_escape_string($row['additional_rooms'])."',
        pets =  '".mysql_real_escape_string($row['pets'])."',
        latitude = '".mysql_real_escape_string($row['latitude'])."',
        longitude = '".mysql_real_escape_string($row['longitude'])."',
        zoning = '".mysql_real_escape_string($row['zoning'])."',
        virtual_tour = '".mysql_real_escape_string($row['unbranded_virtual_tour'])."',
        photo_count = '".mysql_real_escape_string($row['picture_count'])."',
        photo_timestamp = '".mysql_real_escape_string($row['picture_timestamp'])."',

        heating = '".mysql_real_escape_string($row['GF20121206202935801841000000'])."',
        cooling = '".mysql_real_escape_string($row['GF20121206202935069920000000'])."',
        terms = '".mysql_real_escape_string($row['GF20121206202937431318000000'])."',
        loc = '".mysql_real_escape_string($row['GF20121210032004030746000000'])."',
        parking = '".mysql_real_escape_string($row['GF20121206202914938674000000'])."',
        roof_type = '".mysql_real_escape_string($row['GF20121206202936671897000000'])."',
        security = '".mysql_real_escape_string($row['GF20121206202936970585000000'])."',
        home_style = '".mysql_real_escape_string($row['GF20121206202915944331000000'])."',
        utilities = '".mysql_real_escape_string($row['GF20121206202937541928000000'])."',

        bus_type= '".mysql_real_escape_string($row['pool_109'])."',
        bus_name =  'N/A',
        bus_inc = '".mysql_real_escape_string($row['GF20121210032031601627000000'])."',
        bus_info = '".mysql_real_escape_string($row['GF20121206202937320302000000'])."',
        bus_misc1 = '".mysql_real_escape_string($row['GF20121210032127871857000000'])."',
        bus_misc2 = '".mysql_real_escape_string($row['GF20121210032143719113000000'])."',
        list_pr_sqft =   '".mysql_real_escape_string($row['list_price_sqft'])."',
        avail_docs = '".mysql_real_escape_string($row['GF20121210032048203667000000'])."',
        avail_info = '".mysql_real_escape_string($row['GF20121210032110757551000000'])."',
        fire_protect = '".mysql_real_escape_string($row['GF20121210032202398521000000'])."',

        listing_office_name = '".mysql_real_escape_string($row['listing_office_name'])."',
        listing_office_phone = '".mysql_real_escape_string($row['listing_office_phone'])."',
        listing_office_fax = '".mysql_real_escape_string($row['listing_office_fax'])."',
        listing_office_url = '".mysql_real_escape_string($row['listing_office_url'])."',
        listing_office_address = '".mysql_real_escape_string($row['listing_office_address'])."',
        listing_office_email = '".mysql_real_escape_string($row['listing_office_email'])."',
        lot_acres = '".mysql_real_escape_string($row['lot_size'])."',
        listing_status = '".mysql_real_escape_string($row['listing_status'])."'";


      }
      else
      {

        /** Update record into master table */
        $sql = "	UPDATE `master_rets_table_closed` SET
        rets_system = 'FLEXMLS',
        agent_id = '".mysql_real_escape_string($row['agent_id'])."',
        rets_key = '".mysql_real_escape_string($row['listing_id'])."',
        street_number = '".mysql_real_escape_string($row['street_number'])."',
        street_name = '".mysql_real_escape_string($row['street_name'])."',
        street_dir = '".mysql_real_escape_string($row['street_dir'])."',
        street_suffix = '".mysql_real_escape_string($row['street_suffix'])."',
        city = '".mysql_real_escape_string($row['city'])."',
        state_province = '".mysql_real_escape_string($row['state_or_province'])."',
        postal_code = '".mysql_real_escape_string($row['postal_code'])."',
        property_type = 'commercial',
        property_sub_type = '".mysql_real_escape_string($row['property_sub_type_9'])."',
        square_footage = '".mysql_real_escape_string($row['living_area'])."',
        bedrooms = '".mysql_real_escape_string($row['total_bedrooms'])."',
        bathrooms = '".mysql_real_escape_string($row['total_bathrooms'])."',
        remarks = '".mysql_real_escape_string($row['public_remarks'])."',
        listing_price = '".mysql_real_escape_string($row['list_price'])."',
        listing_date = '".mysql_real_escape_string($row['list_date'])."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['entry_timestamp'])."',
        listing_area = '".mysql_real_escape_string($row['listing_area'])."',
        year_built = '".mysql_real_escape_string($row['year_built'])."',
        exterior_features = '".mysql_real_escape_string($row['exterior_features'])."',
        interior_features = '".mysql_real_escape_string($row['interior_features'])."',
        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',
        pool = '".mysql_real_escape_string($row['pool'])."',
        pool_features = '".mysql_real_escape_string($row['pool_features'])."',
        utilities = '".mysql_real_escape_string($row['utilities'])."',
        equipment_appliances = '".mysql_real_escape_string($row['equipment_appliances'])."',
        waterfront = '".mysql_real_escape_string($row['waterfront'])."',
        water_type = '".mysql_real_escape_string($row['water_type'])."',
        parking = '".mysql_real_escape_string($row['garage'])."',
        hoa = '".mysql_real_escape_string($row['hoa'])."',
        hoa_dues = '".mysql_real_escape_string($row['hoa_dues_amount'])."',
        hoa_dues_term = '".mysql_real_escape_string($row['hoa_dues_term'])."',
        construction = '".mysql_real_escape_string($row['construction'])."',
        expenses = '".mysql_real_escape_string($row['expenses'])."',
        floor = '".mysql_real_escape_string($row['floor'])."',
        total_floors = '".mysql_real_escape_string($row['total_floors'])."',
        exterior_finish = '".mysql_real_escape_string($row['siding'])."',
        roof_type = '".mysql_real_escape_string($row['roof_type'])."',
        fireplace = '".mysql_real_escape_string($row['fireplace'])."',
        county = '".mysql_real_escape_string($row['county'])."',
        gated_community = '".mysql_real_escape_string($row['gated_community'])."',
        furnishing = '".mysql_real_escape_string($row['furnishing'])."',
        home_warranty = '".mysql_real_escape_string($row['home_warranty'])."',
        tax_year = '".mysql_real_escape_string($row['tax_year'])."',
        tax_amount = '".mysql_real_escape_string($row['taxes_75'])."',
        pets =  '".mysql_real_escape_string($row['pets'])."',
        over_55 = '".mysql_real_escape_string($row['over_55'])."',
        subdivision = '".mysql_real_escape_string($row['subdivision'])."',
        property_status = '".mysql_real_escape_string($row['property_status'])."',
        home_style = '".mysql_real_escape_string($row['design'])."',
        home_view = '".mysql_real_escape_string($row['view_description'])."',
        additional_rooms = '".mysql_real_escape_string($row['additional_rooms'])."',
        latitude = '".mysql_real_escape_string($row['latitude'])."',
        longitude = '".mysql_real_escape_string($row['longitude'])."',
        zoning = '".mysql_real_escape_string($row['zoning'])."',
        virtual_tour = '".mysql_real_escape_string($row['unbranded_virtual_tour'])."',
        photo_count = '".mysql_real_escape_string($row['picture_count'])."',
        photo_timestamp = '".mysql_real_escape_string($row['picture_timestamp'])."',
        listing_office_name = '".mysql_real_escape_string($row['listing_office_name'])."',
        listing_office_phone = '".mysql_real_escape_string($row['listing_office_phone'])."',
        listing_office_fax = '".mysql_real_escape_string($row['listing_office_fax'])."',
        listing_office_url = '".mysql_real_escape_string($row['listing_office_url'])."',
        listing_office_address = '".mysql_real_escape_string($row['listing_office_address'])."',
        listing_office_email = '".mysql_real_escape_string($row['listing_office_email'])."',
        lot_acres = '".mysql_real_escape_string($row['lot_size'])."',
        listing_status = '".mysql_real_escape_string($row['listing_status'])."'
        WHERE listing_id = '".mysql_real_escape_string($row['listing_id'])."' AND rets_system = 'FLEXMLS'";

      }

      // Run Query
      $results = mysql_query($sql) or die(mysql_error().$sql);
      $cntRow++;

      if (($cntRow % 50) == 0) {
        $pctDone= number_format($cntRow/$totRow*100,1);
        echo "Working [$pctDone%]..."."\n";
      }
    }
    echo "Update COMMERCIAL properties DONE...ok"."\n\n";
  }

}





/** fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
* flexmls_updateRental function.
* Updates the flexmls_property_f table and the master_rets_table with Rental listing data from FLEXMLS
* @access public
* @return void
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff */
function flexmls_updateRental()
{

  // Clean up records
  $clean_up = mysql_query("DELETE FROM `master_rets_table_closed` WHERE `property_type` = 'rental';");

  // Check for New Records
  $rets_results = mysql_query("SELECT * from `flexmls_property_f` WHERE listing_status != 'Closed' ");
  $totRow=mysql_num_rows($rets_results);
  $cntRow=0;
  echo "Updating Rental properties into master_rets_table_closed [$totRows]..."."\n";

  // Check for Rows
  if(mysql_num_rows($rets_results) > 0)
  {

    while($row = mysql_fetch_array($rets_results))
    {

      // Get State
      $row['state_or_province'] = getState($row['state_or_province'],$row['postal_code']);

      // Get County
      if(empty($row['county']))
      {
        $row['county'] = getCounty($row['postal_code'],$row['city']);
      }

      // Master Record Check
      // $master_check = mysql_query("SELECT * FROM `master_rets_table` WHERE listing_id = '".$row['listing_id']."' AND rets_system = 'FLEXMLS'");
      $master_check =0;

      // Insert or Update
      if(($master_check) <= 0)
      {

        /** Insert new record into master table */
        $sql = "INSERT INTO `master_rets_table_closed` SET
        rets_system = 'FLEXMLS',
        agent_id = '".mysql_real_escape_string($row['agent_id'])."',
        rets_key = '".mysql_real_escape_string($row['listing_id'])."',
        listing_id = '".mysql_real_escape_string($row['listing_id'])."',
        street_number = '".mysql_real_escape_string($row['street_number'])."',
        street_name = '".mysql_real_escape_string($row['street_name'])."',
        street_dir = '".mysql_real_escape_string($row['street_dir'])."',
        street_suffix = '".mysql_real_escape_string($row['street_suffix'])."',
        city = '".mysql_real_escape_string($row['city'])."',
        state_province = '".mysql_real_escape_string($row['state_or_province'])."',
        postal_code = '".mysql_real_escape_string($row['postal_code'])."',
        property_type = 'rental',
        property_sub_type = '".mysql_real_escape_string($row['property_sub_type_9'])."',

        square_footage = '".mysql_real_escape_string($row['living_area'])."',
        bedrooms = '".mysql_real_escape_string($row['total_bedrooms'])."',
        bathrooms = '".mysql_real_escape_string($row['total_bathrooms'])."',
        remarks = '".mysql_real_escape_string($row['public_remarks'])."',
        listing_price = '".mysql_real_escape_string($row['list_price'])."',
        listing_date = '".mysql_real_escape_string($row['list_date'])."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['entry_timestamp'])."',
        listing_area = '".mysql_real_escape_string($row['listing_area'])."',
        year_built = '".mysql_real_escape_string($row['year_built'])."',


        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',
        pool = '".mysql_real_escape_string($row['pool'])."',
        pool_features = '".mysql_real_escape_string($row['pool_features'])."',
        utilities = '".mysql_real_escape_string($row['utilities'])."',

        water_type = '".mysql_real_escape_string($row['water_type'])."',
        hoa = '".mysql_real_escape_string($row['hoa'])."',
        hoa_dues = '".mysql_real_escape_string($row['hoa_dues_amount'])."',
        hoa_dues_term = '".mysql_real_escape_string($row['hoa_dues_term'])."',
        pets =  '".mysql_real_escape_string($row['pets'])."',
        construction = '".mysql_real_escape_string($row['construction'])."',
        expenses = '".mysql_real_escape_string($row['expenses'])."',

        total_floors = '".mysql_real_escape_string($row['total_floors'])."',

        equipment_appliances = '".mysql_real_escape_string($row['GF20121206203002864650000000'])."',
        exterior_features = '".mysql_real_escape_string($row['GF20121206203002756811000000'])."',
        floor = '".mysql_real_escape_string($row['GF20121206203002977441000000'])."',
        interior_features = '".mysql_real_escape_string($row['GF20121206203003177597000000'])."',
        waterfront = '".mysql_real_escape_string($row['GF20121206203004910529000000'])."',
        dwelling_view = '".mysql_real_escape_string($row['GF20121206203004843709000000'])."',
        garage = '".mysql_real_escape_string($row['GF20121206203003854226000000'])."',
        parking = '".mysql_real_escape_string($row['GF20121206203003854226000000'])."',
        furn_ann_rent = '".mysql_real_escape_string($row['FEAT20121228204252432334000000'])."',
        furn_sea_rent = '".mysql_real_escape_string($row['FEAT20121228204318929526000000'])."',
        furn_offsea_rent = '".mysql_real_escape_string($row['FEAT20121228204340438095000000'])."',
        unfurn_ann_rent = '".mysql_real_escape_string($row['FEAT20121228204543063125000000'])."',
        unfurn_sea_rent = '".mysql_real_escape_string($row['FEAT20121228204525335245000000'])."',
        unfurn_offsea_rent = '".mysql_real_escape_string($row['FEAT20121228204453924199000000'])."',
        1st_deposit = '".mysql_real_escape_string($row['FEAT20121228204141894186000000'])."',
        last_deposit = '".mysql_real_escape_string($row['FEAT20121228204154327948000000  '])."',
        pet_fee = '".mysql_real_escape_string($row['FEAT20121228204213247044000000'])."',
        tenant_pays = '".mysql_real_escape_string($row['GF20121207033556924996000000'])."',
        rent_date_avail = '".mysql_real_escape_string($row['LIST_127'])."',
        app_fee = '".mysql_real_escape_string($row['LIST_121'])."',

        subdivision_amenities = '".mysql_real_escape_string($row['GF20121206203004466211000000'])."',
        rent_restrict = '".mysql_real_escape_string($row['GF20121206203004209266000000'])."',
        security = '".mysql_real_escape_string($row['GF20121206203004310572000000'])."',

        master_bedbath = '".mysql_real_escape_string($row['GF20130917171925858182000000'])."',
        heating = '".mysql_real_escape_string($row['GF20121206203003104396000000'])."',
        cooling = '".mysql_real_escape_string($row['GF20121206203002461896000000'])."',
        additional_rooms = '".mysql_real_escape_string($row['GF20121206203004130697000000'])."',
        home_style = '".mysql_real_escape_string($row['GF20121206203004740051000000'])."',
        prop_misc = '".mysql_real_escape_string($row['GF20121207034326840518000000'])."',
        furnishing = '".mysql_real_escape_string($row['GF20121206203003026714000000'])."',
        dock_boat_info = '".mysql_real_escape_string($row['GF20121206203002310888000000'])."',
        ada_info = '".mysql_real_escape_string($row['GF20130103182729732508000000'])."',

        exterior_finish = '".mysql_real_escape_string($row['siding'])."',
        roof_type = '".mysql_real_escape_string($row['roof_type'])."',
        fireplace = '".mysql_real_escape_string($row['fireplace'])."',
        county = '".mysql_real_escape_string($row['county'])."',
        gated_community = '".mysql_real_escape_string($row['gated_community'])."',
        home_warranty = '".mysql_real_escape_string($row['home_warranty'])."',
        tax_year = '".mysql_real_escape_string($row['tax_year'])."',
        tax_amount = '".mysql_real_escape_string($row['taxes_75'])."',
        over_55 = '".mysql_real_escape_string($row['over_55'])."',
        subdivision = '".mysql_real_escape_string($row['subdivision'])."',
        property_status = '".mysql_real_escape_string($row['property_status'])."',
        home_view = '".mysql_real_escape_string($row['view_description'])."',
        latitude = '".mysql_real_escape_string($row['latitude'])."',
        longitude = '".mysql_real_escape_string($row['longitude'])."',
        virtual_tour = '".mysql_real_escape_string($row['unbranded_virtual_tour'])."',
        photo_count = '".mysql_real_escape_string($row['picture_count'])."',
        photo_timestamp = '".mysql_real_escape_string($row['picture_timestamp'])."',
        listing_office_name = '".mysql_real_escape_string($row['listing_office_name'])."',
        listing_office_phone = '".mysql_real_escape_string($row['listing_office_phone'])."',
        listing_office_fax = '".mysql_real_escape_string($row['listing_office_fax'])."',
        listing_office_url = '".mysql_real_escape_string($row['listing_office_url'])."',
        listing_office_address = '".mysql_real_escape_string($row['listing_office_address'])."',
        listing_office_email = '".mysql_real_escape_string($row['listing_office_email'])."',
        lot_acres = '".mysql_real_escape_string($row['lot_acres'])."',
        split_yn = '".mysql_real_escape_string($row['split_yn'])."',
        listing_status = '".mysql_real_escape_string($row['listing_status'])."'";

      }
      else
      {

        /** Update record into master table */
        $sql = "UPDATE `master_rets_table_closed` SET
        rets_system = 'FLEXMLS',
        agent_id = '".mysql_real_escape_string($row['agent_id'])."',
        rets_key = '".mysql_real_escape_string($row['listing_id'])."',
        street_number = '".mysql_real_escape_string($row['street_number'])."',
        street_name = '".mysql_real_escape_string($row['street_name'])."',
        street_dir = '".mysql_real_escape_string($row['street_dir'])."',
        street_suffix = '".mysql_real_escape_string($row['street_suffix'])."',
        city = '".mysql_real_escape_string($row['city'])."',
        state_province = '".mysql_real_escape_string($row['state_or_province'])."',
        postal_code = '".mysql_real_escape_string($row['postal_code'])."',
        property_type = 'rental',
        property_sub_type = '".mysql_real_escape_string($row['property_sub_type_9'])."',
        dwelling_view = '".mysql_real_escape_string($row['rental_dwelling_view'])."',
        square_footage = '".mysql_real_escape_string($row['living_area'])."',
        bedrooms = '".mysql_real_escape_string($row['total_bedrooms'])."',
        bathrooms = '".mysql_real_escape_string($row['total_bathrooms'])."',
        remarks = '".mysql_real_escape_string($row['public_remarks'])."',

        listing_date = '".mysql_real_escape_string($row['list_date'])."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['entry_timestamp'])."',
        listing_area = '".mysql_real_escape_string($row['listing_area'])."',
        year_built = '".mysql_real_escape_string($row['year_built'])."',
        exterior_features = '".mysql_real_escape_string($row['exterior_features'])."',
        interior_features = '".mysql_real_escape_string($row['interior_features'])."',
        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',
        pool = '".mysql_real_escape_string($row['pool'])."',
        pool_features = '".mysql_real_escape_string($row['pool_features'])."',
        utilities = '".mysql_real_escape_string($row['utilities'])."',
        equipment_appliances = '".mysql_real_escape_string($row['equipment_appliances'])."',
        waterfront = '".mysql_real_escape_string($row['waterfront'])."',
        water_type = '".mysql_real_escape_string($row['water_type'])."',
        parking = '".mysql_real_escape_string($row['garage'])."',
        hoa = '".mysql_real_escape_string($row['hoa'])."',
        hoa_dues = '".mysql_real_escape_string($row['hoa_dues_amount'])."',
        hoa_dues_term = '".mysql_real_escape_string($row['hoa_dues_term'])."',
        pets =  '".mysql_real_escape_string($row['pets'])."',
        construction = '".mysql_real_escape_string($row['construction'])."',
        expenses = '".mysql_real_escape_string($row['expenses'])."',
        floor = '".mysql_real_escape_string($row['floor'])."',
        total_floors = '".mysql_real_escape_string($row['total_floors'])."',
        
        listing_price = '".mysql_real_escape_string($row['list_price'])."',

        furn_ann_rent = '".mysql_real_escape_string($row['FEAT20121228204252432334000000'])."',
        furn_sea_rent = '".mysql_real_escape_string($row['FEAT20121228204318929526000000'])."',
        furn_offsea_rent = '".mysql_real_escape_string($row['FEAT20121228204340438095000000'])."',
        
        unfurn_ann_rent = '".mysql_real_escape_string($row['FEAT20121228204543063125000000'])."',
        unfurn_sea_rent = '".mysql_real_escape_string($row['FEAT20121228204525335245000000'])."',
        unfurn_offsea_rent = '".mysql_real_escape_string($row['FEAT20121228204453924199000000'])."',
        
        1st_deposit = '".mysql_real_escape_string($row['FEAT20121228204141894186000000'])."',
        last_deposit = '".mysql_real_escape_string($row['FEAT20121228204154327948000000  '])."',
        pet_fee = '".mysql_real_escape_string($row['FEAT20121228204213247044000000'])."',
        tenant_pays = '".mysql_real_escape_string($row['GF20121207033556924996000000'])."',
        rent_date_avail = '".mysql_real_escape_string($row['LIST_127'])."',
        app_fee = '".mysql_real_escape_string($row['LIST_121'])."',
        subdivision_amenities = '".mysql_real_escape_string($row['GF20121206203004466211000000'])."',
        rent_restrict = '".mysql_real_escape_string($row['GF20121206203004209266000000'])."',


        exterior_finish = '".mysql_real_escape_string($row['siding'])."',
        roof_type = '".mysql_real_escape_string($row['roof_type'])."',
        fireplace = '".mysql_real_escape_string($row['fireplace'])."',
        county = '".mysql_real_escape_string($row['county'])."',
        gated_community = '".mysql_real_escape_string($row['gated_community'])."',
        furnishing = '".mysql_real_escape_string($row['furnishing'])."',
        home_warranty = '".mysql_real_escape_string($row['home_warranty'])."',
        tax_year = '".mysql_real_escape_string($row['tax_year'])."',
        tax_amount = '".mysql_real_escape_string($row['taxes_75'])."',
        over_55 = '".mysql_real_escape_string($row['over_55'])."',
        subdivision = '".mysql_real_escape_string($row['subdivision'])."',
        property_status = '".mysql_real_escape_string($row['property_status'])."',
        home_style = '".mysql_real_escape_string($row['design'])."',
        home_view = '".mysql_real_escape_string($row['view_description'])."',
        additional_rooms = '".mysql_real_escape_string($row['additional_rooms'])."',
        latitude = '".mysql_real_escape_string($row['latitude'])."',
        longitude = '".mysql_real_escape_string($row['longitude'])."',
        virtual_tour = '".mysql_real_escape_string($row['unbranded_virtual_tour'])."',
        photo_count = '".mysql_real_escape_string($row['picture_count'])."',
        photo_timestamp = '".mysql_real_escape_string($row['picture_timestamp'])."',
        listing_office_name = '".mysql_real_escape_string($row['listing_office_name'])."',
        listing_office_phone = '".mysql_real_escape_string($row['listing_office_phone'])."',
        listing_office_fax = '".mysql_real_escape_string($row['listing_office_fax'])."',
        listing_office_url = '".mysql_real_escape_string($row['listing_office_url'])."',
        listing_office_address = '".mysql_real_escape_string($row['listing_office_address'])."',
        listing_office_email = '".mysql_real_escape_string($row['listing_office_email'])."',
        lot_acres = '".mysql_real_escape_string($row['lot_acres'])."',
        listing_status = '".mysql_real_escape_string($row['listing_status'])."',
        split_yn = '".mysql_real_escape_string($row['split_yn'])."'
        WHERE listing_id = '".mysql_real_escape_string($row['listing_id'])."' AND rets_system = 'FLEXMLS'";

      }

      // Run Query
      $results = mysql_query($sql) or die(mysql_error().$sql);
      $cntRow++;

      if (($cntRow % 50) == 0) {
        $pctDone= number_format($cntRow/$totRow*100,1);
        echo "Working [$pctDone%]..."."\n";
      }
    }
    echo "Update RENTAL properties DONE...ok"."\n\n";
  }

}