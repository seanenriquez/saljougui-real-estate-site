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
$rets_config['FLEXMLS']['login_url'] = 'http://glvar.apps.retsiq.com/rets/login';
$rets_config['FLEXMLS']['username'] = 'webw';
$rets_config['FLEXMLS']['password'] = 'glvar212';
$rets_config['FLEXMLS']['user_agent'] = 'Webware RETS';

// Image Setup
//$rets_config['FLEXMLS']['image_directory'] = $base_image.'flexmls/';
//$rets_config['FLEXMLS']['image_type'] = 'HiRes';

// Query and Database Settings
$rets_config['FLEXMLS']['query_limit'] = '20000';
$rets_config['FLEXMLS']['server_query_limit'] = '25000';
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
*/

$rets_config['FLEXMLS']['data']['residential'] = array(
  "resource" => "Property",
  "create_table" => true,
  "class" => "1",
  "keyfield" => "sysid",
  // "query" => "(1=|RES),(242=|ER,EA,AU,C)"
  "query" => "(242=|ER,C)"
  );

  $rets_config['FLEXMLS']['data']['rental'] = array(
  "resource" => "Property",
  "create_table" => true,
  "class" => "9",
  "keyfield" => "sysid",
  "query" => "(1=RNT)"
  );
  
  $rets_config['FLEXMLS']['data']['hirise'] = array(
  "resource" => "Property",
  "create_table" => true,
  "class" => "16",
  "keyfield" => "sysid",
  "query" => "(1=VER)"
  );



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


/**
* flexmls_updateResidential function.
* Updates the flexmls_property_a table and the master_rets_table with Residential listing data from FLEXMLS
* @access public
* @return void
*/
function flexmls_updateResidential()
{
  // delete all old records in master table...
  $clean_up = mysql_query("DELETE FROM `master_rets_table_update` where `property_type` = 'RES' ");

  // now grab all the new records...
  $rets_results = mysql_query("SELECT * from `glvar_property_1` ");        // TODO:  make this dynamic
  $totRow=mysql_num_rows($rets_results);
  $cntRow=0;
  echo "Updating Residential properties into master_rets_table_update [$totRows]..."."\n";
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

      if($master_check <= 0)
      {

        /** Insert new record into master table */
        $sql = "INSERT INTO `master_rets_table_update` SET       
        rets_system = 'GLVAR',
        property_type= 'RES',
        listing_id = '".mysql_real_escape_string($row['ML_#_163'])."',
        
        rets_key = '".mysql_real_escape_string($row['ML_#_163'])."',
        sysid = '".mysql_real_escape_string($row['sysid_sysid'])."',
        photo_timestamp = '".mysql_real_escape_string($row['Last_Image_Trans_Date_2238'])."',
        photo_count = '".mysql_real_escape_string($row['Images_129'])."',     
        agent_id = '".mysql_real_escape_string($row['List_Agent_Public_ID_143'])."',
        street_number = '".mysql_real_escape_string($row['Street_Number_244'])."',
        street_name = '".mysql_real_escape_string($row['Street_Name_243'])."',
        street_dir = '".mysql_real_escape_string($row['Directions_274'])."',
        city = '".mysql_real_escape_string($row['City/Town_2909'])."',
        state_province = '".mysql_real_escape_string($row['State_2963'])."',
        postal_code = '".mysql_real_escape_string($row['Zip_Code_10'])."',
        property_sub_type = '".mysql_real_escape_string($row['property_sub_type_9'])."',
        sqft_living = '".mysql_real_escape_string($row['Approx_Total_Liv_Area_2953'])."',
        sqft_tot = '".mysql_real_escape_string($row['Lot_Sqft_154'])."',
        bedrooms = '".mysql_real_escape_string($row['Bedrooms_68'])."',
        bathrooms = '".mysql_real_escape_string($row['Baths_Total_63'])."',
        listing_price = '".mysql_real_escape_string($row['List_Price_144'])."',
        floor = '".mysql_real_escape_string($row['Flooring_Description_293'])."',
        listing_date = '".$row['List_Date_138']."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['Entry_Date_104'])."',
        listing_area = '".mysql_real_escape_string($row['Area_37'])."',             
        year_built = '".mysql_real_escape_string($row['Year_Built_264'])."',
        exterior_features = '".mysql_real_escape_string($row['Exterior_Description_299'])."',
        interior_features = '".mysql_real_escape_string($row['Interior_Description_292'])."',
        pool_features = '".mysql_real_escape_string($row['Pool_Description_273'])."', 
        private_pool = '".mysql_real_escape_string($row['PvPool_203'])."',
        utilities = '".mysql_real_escape_string($row['Utility_Information_304'])."',
        equipment_appliances = '".mysql_real_escape_string($row['Other_Appliance_Description_290'])."',
        parking = '".mysql_real_escape_string($row['Parking_Description_2438'])."',
        construction = '".mysql_real_escape_string($row['Construction_Description_291'])."',
        roof_type = '".mysql_real_escape_string($row['Roof_Description_270'])."',
        fireplace = '".mysql_real_escape_string($row['Fireplaces_113'])."',     
        county = '".mysql_real_escape_string($row['County_Name_87'])."',
        gated_community = '".mysql_real_escape_string($row['Gated_Y/N_2946'])."',
        furnishing = '".mysql_real_escape_string($row['Furnishings_Description_2426'])."',
        tax_amount = '".mysql_real_escape_string($row['Annual_Property_Taxes_28'])."',
        subdivision = '".mysql_real_escape_string($row['Subdivision_Name_247'])."',
        property_status = '".mysql_real_escape_string($row['Status_242'])."',
        home_view = '".mysql_real_escape_string($row['House_Views_2450'])."',
        garage = '".mysql_real_escape_string($row['Garage_122'])."',
        short_sale = '".mysql_real_escape_string($row['Short_Sale_2369'])."',
        dining_area = '".mysql_real_escape_string($row['Dining_Room_Description_276'])."',
        heating = '".mysql_real_escape_string($row['Heating_Description_301'])."',
        halfbaths =  '".mysql_real_escape_string($row['Half_Baths_62'])."',
        cooling =  '".mysql_real_escape_string($row['Cooling_System_303'])."',
        zoning = '".mysql_real_escape_string($row['Zoning_266'])."',
        lot_desc = '".mysql_real_escape_string($row['Lot_Description_271'])."',
        master_bedbath =  '".mysql_real_escape_string($row['Master_Bedroom_Description_281'])."',
        rooms = '".mysql_real_escape_string($row['Bedrooms_(Total_Possible_#)_2379'])."',           
        tax_places =  '".mysql_real_escape_string($row['Tax_District_177'])."',
        unit_desc = '".mysql_real_escape_string($row['Unit_Description_2543'])."',                       
        elem_school =  '".mysql_real_escape_string($row['Elementary_School_K-2_2377'])."',
        middle_school =  '".mysql_real_escape_string($row['Jr_High_School_215'])."',
        high_school =  '".mysql_real_escape_string($row['High_School_214'])."',
        bank_owned =  '".mysql_real_escape_string($row['Repo/Reo_Y/N_2660'])."',
        virtual_tour = '".mysql_real_escape_string($row['Virtual_Tour_Link_2139'])."',
        listing_office_name = '".mysql_real_escape_string($row['LO_Name_171'])."',
        listing_office_phone = '".mysql_real_escape_string($row['LO_Phone_172'])."',
        listing_office_fax = '".mysql_real_escape_string($row['Fax_#_2383'])."',
        listing_office_address = '".mysql_real_escape_string($row['Public_Address_2861'])."',
        listing_office_email = '".mysql_real_escape_string($row['Email_2385'])."',
        lot_acres = '".mysql_real_escape_string($row['Approximate_Acreage_2'])."',
        hoa = '".mysql_real_escape_string($row['Association_Name_2779'])."',  
        dwelling_view = '".mysql_real_escape_string($row['House_Views_2450'])."',
        fireplace_type = '".mysql_real_escape_string($row['Fireplace_Description_294'])."',


        hoa_dues = '".mysql_real_escape_string($row['Association_Fee_1_39'])."',
        hoa_dues_term = '".mysql_real_escape_string($row['Association_Fee_1_-_M,Q,Y,N_127'])."',

        amenities = '".mysql_real_escape_string($row['amenities'])."',
        waterfront = '".mysql_real_escape_string($row['water_type'])."',
        water_type = '".mysql_real_escape_string($row['view_description'])."',
        street_suffix = '".mysql_real_escape_string($row['street_suffix'])."',
        additional_rooms = '".mysql_real_escape_string($row['additional_rooms'])."',
        water_footage = '".mysql_real_escape_string($row['waterfront_footage'])."',
        maint_fee_inc =  '".mysql_real_escape_string($row['maint_fee_inc'])."',
        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',                         
        pool = '".mysql_real_escape_string($row['pool'])."',
        listing_office_url = '".mysql_real_escape_string($row['listing_office_url'])."',
        expenses = '".mysql_real_escape_string($row['expenses'])."',
        remarks = '".mysql_real_escape_string($row['public_remarks'])."',
        exterior_finish = '".mysql_real_escape_string($row['siding'])."',
        home_warranty = '".mysql_real_escape_string($row['home_warranty'])."',
        tax_year = '".mysql_real_escape_string($row['tax_year'])."',
        over_55 = '".mysql_real_escape_string($row['over_55'])."',
        home_style = '".mysql_real_escape_string($row['design'])."',
        security = '".mysql_real_escape_string($row['security'])."',
        design =  '".mysql_real_escape_string($row['design'])."',
        pets =  '".mysql_real_escape_string($row['pets'])."',
        ada_comp = '".mysql_real_escape_string($row['ada_comp'])."',
        boat_services = '".mysql_real_escape_string($row['boat_services'])."',
        membership =  '".mysql_real_escape_string($row['membership'])."',
        restrictions =  '".mysql_real_escape_string($row['restrictions'])."',
        special_info =  '".mysql_real_escape_string($row['special_info'])."',
        latitude = '".mysql_real_escape_string($row['latitude'])."',
        longitude = '".mysql_real_escape_string($row['longitude'])."',
        terms_considered =  '".mysql_real_escape_string($row['terms_considered'])."',
        split_yn = '".mysql_real_escape_string($row['split_yn'])."',
        listing_status = '".mysql_real_escape_string($row['listing_status'])."'  
        ";
            //if hoa dues + hoa dues term is wrong, fix.



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

function flexmls_updateHirise()
{
  // delete all old records in master table...
  $clean_up = mysql_query("DELETE FROM `master_rets_table_update` where `property_type` = 'VER' ");

  // now grab all the new records...
  $rets_results = mysql_query("SELECT * from `glvar_property_16` ");        // TODO:  make this dynamic
  $totRow=mysql_num_rows($rets_results);
  $cntRow=0;
  echo "Updating Residential properties into master_rets_table_update [$totRows]..."."\n";
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

      if($master_check <= 0)
      {

        /** Insert new record into master table */
        $sql = "INSERT INTO `master_rets_table_update` SET
        
        rets_system = 'GLVAR',
        property_type= 'HIR',
    
        listing_id = '".mysql_real_escape_string($row['ML_#_163'])."', 
        
        rets_key = '".mysql_real_escape_string($row['ML_#_163'])."', 
        sysid = '".mysql_real_escape_string($row['sysid_sysid'])."', 
        photo_timestamp = '".mysql_real_escape_string($row['Last_Image_Trans_Date_2238'])."', 
        photo_count = '".mysql_real_escape_string($row['Images_129'])."',    
        agent_id = '".mysql_real_escape_string($row['List_Agent_Public_ID_143'])."',
        street_number = '".mysql_real_escape_string($row['Street_Number_244'])."',
        street_name = '".mysql_real_escape_string($row['Street_Name_243'])."',
        street_dir = '".mysql_real_escape_string($row['Directions_2705'])."', 
        city = '".mysql_real_escape_string($row['City/Town_2909'])."', 
        state_province = '".mysql_real_escape_string($row['State_2963'])."',
        postal_code = '".mysql_real_escape_string($row['Zip_Code_10'])."',
        property_sub_type = '".mysql_real_escape_string($row['property_sub_type_9'])."',
        sqft_living = '".mysql_real_escape_string($row['Approx_Liv_Area_2694'])."', 
        bedrooms = '".mysql_real_escape_string($row['Bedrooms_68'])."', 
        bathrooms = '".mysql_real_escape_string($row['Baths_Total_2690'])."', 
        listing_price = '".mysql_real_escape_string($row['List_Price_144'])."', 
        floor = '".mysql_real_escape_string($row['Flooring_2752  '])."',
        listing_date = '".$row['List_Date_138']."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['Entry_Date_104'])."',
        listing_area = '".mysql_real_escape_string($row['Area_37'])."',           
        year_built = '".mysql_real_escape_string($row['Year_Built_264'])."', 
        exterior_features = '".mysql_real_escape_string($row['Exterior_Unit_Description_2758'])."', 
        interior_features = '".mysql_real_escape_string($row['Interior_2751'])."', 
        private_pool = '".mysql_real_escape_string($row['Private_Pool_2696'])."', 
        utilities = '".mysql_real_escape_string($row['Utility_Information_304'])."', 
        parking = '".mysql_real_escape_string($row['Parking_Description_2701'])."', 
        fireplace = '".mysql_real_escape_string($row['Fireplace_2753'])."',  
        county = '".mysql_real_escape_string($row['County_Name_87'])."', 
        gated_community = '".mysql_real_escape_string($row['Gated_Y/N_2946'])."',
        furnishing = '".mysql_real_escape_string($row['Furnishings_Description_2735'])."', 
        tax_amount = '".mysql_real_escape_string($row['Annual_Property_Taxes_2801'])."',
        subdivision = '".mysql_real_escape_string($row['SUBDIVISION_NAME_2911'])."',
        property_status = '".mysql_real_escape_string($row['Status_242'])."',
        garage = '".mysql_real_escape_string($row['Parking_Space_ID_#_2704'])."', 
        short_sale = '".mysql_real_escape_string($row['Short_Sale_2369'])."', 
        dining_area = '".mysql_real_escape_string($row['Dining_Room_Description_2714'])."', 
        heating = '".mysql_real_escape_string($row['Heating_Description_2760'])."',
        halfbaths =  '".mysql_real_escape_string($row['Half_Baths_2691'])."', 
        cooling =  '".mysql_real_escape_string($row['Cooling_System_2764'])."', 
        lot_desc = '".mysql_real_escape_string($row['Loft_Description_2734'])."', 
        master_bedbath =  '".mysql_real_escape_string($row['Master_Bedroom_Description_2719'])."', 
        rooms = '".mysql_real_escape_string($row['Bedrooms_(Total_Possible_#)_2379'])."',        
        unit_desc = '".mysql_real_escape_string($row['Unit_Description_2692'])."',                   
        elem_school =  '".mysql_real_escape_string($row['Elementary_School_K-2_2679'])."',
        middle_school =  '".mysql_real_escape_string($row['Jr_High_School_2681'])."', 
        high_school =  '".mysql_real_escape_string($row['High_School_2680'])."', 
        bank_owned =  '".mysql_real_escape_string($row['Repo/Reo_Y/N_2843'])."',
        virtual_tour = '".mysql_real_escape_string($row['Virtual_Tour_Link_2139'])."',
        listing_office_name = '".mysql_real_escape_string($row['LO_Name_2813'])."',
        listing_office_phone = '".mysql_real_escape_string($row['LO_Phone_2814'])."',
        listing_office_fax = '".mysql_real_escape_string($row['Fax_#_2383'])."',
        listing_office_address = '".mysql_real_escape_string($row['Public_Address_2861'])."',
        listing_office_email = '".mysql_real_escape_string($row['Email_2385'])."',
        hoa = '".mysql_real_escape_string($row['Association_Name_2779'])."',  
        restrictions =  '".mysql_real_escape_string($row['Age_Restricted_Community_2673'])."', 
        fireplace_type = '".mysql_real_escape_string($row['Fireplace_Description_2754 '])."', 
        pool = '".mysql_real_escape_string($row['Unit_Pool_Indoor_2697'])."', 
        total_floors = '".mysql_real_escape_string($row['Total_Floors_2665'])."', 
        pets =  '".mysql_real_escape_string($row['Pets_Allowed_2789'])."', 
        
        dwelling_view = '".mysql_real_escape_string($row['Views_2757'])."', 
        
        security = '".mysql_real_escape_string($row['Security_2777'])."',    
        equipment_appliances = '".mysql_real_escape_string($row['Other_Appliances_2749'])."', 
        home_warranty = '".mysql_real_escape_string($row['Home_Protection_Plan_2759'])."',
        amenities = '".mysql_real_escape_string($row['Services_Available_On_Site_2776'])."',
        sqft_tot = '".mysql_real_escape_string($row['Approx_Liv_Area_2361'])."', 

        hoa_dues_term = '".mysql_real_escape_string($row['Association_Fee_1_-_M,Q,Y,N_2784'])."',
        hoa_dues = '".mysql_real_escape_string($row['Association_Fee_1_2783'])."',


        tax_year = '".mysql_real_escape_string($row['tax_year'])."',
        listing_status = '".mysql_real_escape_string($row['listing_status'])."',
        tax_places =  '".mysql_real_escape_string($row['tax_places'])."',
        additional_rooms = '".mysql_real_escape_string($row['additional_rooms'])."',
        membership =  '".mysql_real_escape_string($row['membership'])."',
        expenses = '".mysql_real_escape_string($row['expenses'])."',
        remarks = '".mysql_real_escape_string($row['public_remarks'])."',
        zoning = '".mysql_real_escape_string($row['zoning'])."',
        terms_considered =  '".mysql_real_escape_string($row['terms_considered'])."',
        split_yn = '".mysql_real_escape_string($row['split_yn'])."',
        roof_type = '".mysql_real_escape_string($row['roof'])."',
        construction = '".mysql_real_escape_string($row['construction'])."',
        pool_features = '".mysql_real_escape_string($row['pool_features'])."', 
        waterfront = '".mysql_real_escape_string($row['water_type'])."',
        water_type = '".mysql_real_escape_string($row['view_description'])."',
        street_suffix = '".mysql_real_escape_string($row['street_suffix'])."',
        water_footage = '".mysql_real_escape_string($row['waterfront_footage'])."',
        maint_fee_inc =  '".mysql_real_escape_string($row['maint_fee_inc'])."',
        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',                         
        exterior_finish = '".mysql_real_escape_string($row['siding'])."',
        over_55 = '".mysql_real_escape_string($row['over_55'])."',
        home_style = '".mysql_real_escape_string($row['design'])."',
        design =  '".mysql_real_escape_string($row['design'])."',
        ada_comp = '".mysql_real_escape_string($row['ada_comp'])."',
        boat_services = '".mysql_real_escape_string($row['boat_services'])."',
        special_info =  '".mysql_real_escape_string($row['special_info'])."',
        latitude = '".mysql_real_escape_string($row['latitude'])."',
        longitude = '".mysql_real_escape_string($row['longitude'])."',
        lot_acres = '".mysql_real_escape_string($row['lot_acres'])."'  
                                                                      
        ";
            // Notes:
            // Unsure if hoa dues + hoa dues term are correct. assumed that hoa dues was the amount they'd pay and hoa dues term was the frequencey of their payment
            // "sqft_tot" is under Approx_Liv_Area_2361, because highrises have no more square footage than their displayed amount under this. The List price per square foot multiplied by approx_live area will reach the list_price value.
            // diffrence between home_view and dwelling_view???
            //
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
  $clean_up = mysql_query("DELETE FROM `master_rets_table_update` WHERE `property_type` = 'multifamily' ");

  // Check for New Records
  $rets_results = mysql_query("SELECT * from `flexmls_property_b` WHERE listing_status != 'Closed'");
  $totRow=mysql_num_rows($rets_results);
  $cntRow=0;
  echo "Updating Multifamily properties into master_rets_table_update [$totRows]..."."\n";

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
        $sql = "INSERT INTO `master_rets_table_update` SET
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
        sqft_living = '".mysql_real_escape_string($row['sqft_living'])."',
        sqft_tot = '".mysql_real_escape_string($row['sqft_tot'])."',
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

/** fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
* flexmls_updateRental function.
* Updates the flexmls_property_f table and the master_rets_table with Rental listing data from FLEXMLS
* @access public
* @return void
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff */
function flexmls_updateRental()
{

  // Clean up records
  $clean_up = mysql_query("DELETE FROM `master_rets_table_update` WHERE `property_type` = 'rental';");

  // Check for New Records
  $rets_results = mysql_query("SELECT * from `flexmls_property_f` WHERE listing_status != 'Closed' ");
  $totRow=mysql_num_rows($rets_results);
  $cntRow=0;
  echo "Updating Rental properties into master_rets_table_update [$totRows]..."."\n";

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
        $sql = "INSERT INTO `master_rets_table_update` SET
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

        sqft_living = '".mysql_real_escape_string($row['sqft_living'])."',
        sqft_tot = '".mysql_real_escape_string($row['sqft_tot'])."',        
        bedrooms = '".mysql_real_escape_string($row['total_bedrooms'])."',
        bathrooms = '".mysql_real_escape_string($row['total_bathrooms'])."',
        remarks = '".mysql_real_escape_string($row['public_remarks'])."',
        listing_price = '".mysql_real_escape_string($row['list_price'])."',
        listing_date = '".mysql_real_escape_string($row['list_date'])."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['entry_timestamp'])."',
        listing_area = '".mysql_real_escape_string($row['listing_area'])."',
        year_built = '".mysql_real_escape_string($row['year_built'])."',

        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',
        pool = '".mysql_real_escape_string($row['pool_109'])."',
        pool_features = '".mysql_real_escape_string($row['pool_features'])."',
        waterfront = '".mysql_real_escape_string($row['waterfront_108'])."',
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

function padBlanks($inStg){
    return str_replace(" ","_",$inStg);
}

