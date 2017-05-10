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

/*ets_config['FLEXMLS']['data']['multifamily'] = array(
  "resource" => "Property",
  "create_table" => true,
  "class" => "B",
  "keyfield" => "LIST_1",
  "query" => "(LIST_132=2011-01-01T00:00:00+),(LIST_15=|12MKUJQH3QE8,PWC_15429SGZYQIT,12LL26N0CIFT)");

  */
$rets_config['FLEXMLS']['data']['residential'] = array(
  "resource" => "Property",
  "create_table" => true,
  "class" => "Listing",
  "keyfield" => "matrix_unique_id ",
  // "query" => "(1=|RES),(242=|ER,EA,AU,C)"
  "query" => "(Status=|EA,A)"
  );                                                               

  /*
  $rets_config['FLEXMLS']['data']['room'] = array(
  "resource" => "PropertySubTable",
  "create_table" => true,
  "class" => "Room",
  "keyfield" => "matrix_unique_id ",
  "query" => ""
  );
      

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
      flexmls_updateAll();
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
function flexmls_updateAll()
{
  // delete all old records in master table...
  $clean_up = mysql_query("DELETE FROM `master_rets_table_update` ");

  // now grab all the new records...
  $rets_results = mysql_query("SELECT * from `glvar_property_listing` ");        // TODO:  make this dynamic
  $totRow=mysql_num_rows($rets_results);
  $cntRow=0;
  echo "Updating All properties into master_rets_table_update [$totRows]..."."\n";
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
        property_type= '".mysql_real_escape_string($row['Property_Type'])."',
        listing_id = '".mysql_real_escape_string($row['MLS_Number'])."',
        
        rets_key = '".mysql_real_escape_string($row['MLS_Number'])."',
        sysid = '".mysql_real_escape_string($row['Matrix_Unique_ID'])."',
        photo_timestamp = '".mysql_real_escape_string($row['Photo_Modification_Timestamp'])."',
        photo_count = '".mysql_real_escape_string($row['Photo_Count'])."',     
        agent_id = '".mysql_real_escape_string($row['List_Agent_MLSID'])."',
		
        street_number = '".mysql_real_escape_string($row['Street_Number'])."',
        street_name = '".mysql_real_escape_string($row['Street_Name'])."',
        street_dir = '".mysql_real_escape_string($row['Street_Dir_Prefix'])."',
        city = '".mysql_real_escape_string($row['City'])."',
        state_province = '".mysql_real_escape_string($row['State_Or_Province'])."',
        postal_code = '".mysql_real_escape_string($row['Postal_Code'])."',
        property_sub_type = '".mysql_real_escape_string($row['Property_Sub_Type'])."',
        sqft_living = '".mysql_real_escape_string($row['Approx_Total_Liv_Area'])."',
        sqft_tot = '".mysql_real_escape_string($row['Sq_Ft_Total'])."',
		
        bedrooms = '".mysql_real_escape_string($row['Bedrooms_Total_Possible_Num'])."',
        bathrooms = '".mysql_real_escape_string($row['Baths_Total'])."',
        listing_price = '".mysql_real_escape_string($row['List_Price'])."',
        floor = '".mysql_real_escape_string($row['Flooring_Description'])."',
        listing_date = '".$row['Listing_Contract_Date']."',
        listing_entry_timestamp = '".mysql_real_escape_string($row['Listing_Contract_Date'])."',
        listing_area = '".mysql_real_escape_string($row['Area'])."',             
        year_built = '".mysql_real_escape_string($row['Year_Built'])."',
        exterior_features = '".mysql_real_escape_string($row['Exterior_Description'])."',
        interior_features = '".mysql_real_escape_string($row['Interior'])."',
        pool_features = '".mysql_real_escape_string($row['Pool_Description'])."', 
        private_pool = '".mysql_real_escape_string($row['PvPool_203'])."',
        utilities = '".mysql_real_escape_string($row['Utility_Information'])."',
        equipment_appliances = '".mysql_real_escape_string($row['Other_Appliance_Description'])."',
        parking = '".mysql_real_escape_string($row['Parking_Description'])."',
        construction = '".mysql_real_escape_string($row['Construction_Description'])."',
        roof_type = '".mysql_real_escape_string($row['Roof_Description'])."',
		
        fireplace = '".mysql_real_escape_string($row['Fireplace'])."',     
        county = '".mysql_real_escape_string($row['County_Or_Parish'])."',
        gated_community = '".mysql_real_escape_string($row['Gated_YN'])."',
        furnishing = '".mysql_real_escape_string($row['Furnishings_Description'])."',
        tax_amount = '".mysql_real_escape_string($row['Annual_Property_Taxes'])."',
        subdivision = '".mysql_real_escape_string($row['Subdivision_Name'])."',
        property_status = '".mysql_real_escape_string($row['Status'])."',
        home_view = '".mysql_real_escape_string($row['Views'])."',
        garage = '".mysql_real_escape_string($row['Garage'])."',
        short_sale = '".mysql_real_escape_string($row['Short_Sale'])."',
        dining_area = '".mysql_real_escape_string($row['Dining_Room_Description_276'])."',
        heating = '".mysql_real_escape_string($row['Heating_Description'])."',
        halfbaths =  '".mysql_real_escape_string($row['Baths_Half'])."',
        cooling =  '".mysql_real_escape_string($row['Cooling_Description'])."',
        zoning = '".mysql_real_escape_string($row['Zoning'])."',
        lot_desc = '".mysql_real_escape_string($row['Lot_Description'])."',
        master_bedbath =  '".mysql_real_escape_string($row['Master_Bedroom_Description_281'])."',
        rooms = '".mysql_real_escape_string($row['Room_Count'])."',  
        tax_places =  '".mysql_real_escape_string($row['Tax_District'])."',
        unit_desc = '".mysql_real_escape_string($row['Unit_Description'])."',                       
        elem_school =  '".mysql_real_escape_string($row['Elementary_School_K-2_2377'])."',
        middle_school =  '".mysql_real_escape_string($row['Jr_High_School'])."',
        high_school =  '".mysql_real_escape_string($row['High_School'])."',
        bank_owned =  '".mysql_real_escape_string($row['Repo_Reo_YN'])."',
        virtual_tour = '".mysql_real_escape_string($row['Virtual_Tour_Link'])."',
        listing_office_name = '".mysql_real_escape_string($row['List_Office_Name'])."',
        listing_office_phone = '".mysql_real_escape_string($row['List_Office_Phone'])."',
        listing_office_address = '".mysql_real_escape_string($row['Public_Address_2861'])."',
        listing_office_email = '".mysql_real_escape_string($row['Email_2385'])."',
        lot_sqft = '".mysql_real_escape_string($row['Lot_Sqft'])."',
        lot_acres = '".mysql_real_escape_string($row['Num_Acres'])."',
        hoa = '".mysql_real_escape_string($row['Association_Name'])."',  
        dwelling_view = '".mysql_real_escape_string($row['House_Views'])."',
        over_55 = '".mysql_real_escape_string($row['Age_Restricted_Community_YN'])."',
        water_type = '".mysql_real_escape_string($row['Water'])."',
        fireplace_desc = '".mysql_real_escape_string($row['Fireplace_Description'])."',
        fence_type = '".mysql_real_escape_string($row['Fence_Type'])."',
        landscape_desc = '".mysql_real_escape_string($row['Landscape_Description'])."',
        sid_lid_yn  = '".mysql_real_escape_string($row['SIDLIDYN'])."',
        assessment_amount_type  = '".mysql_real_escape_string($row['Assessment_Amount_Type_2465'])."',
        3_4_bath  = '".mysql_real_escape_string($row['3/4_Baths_60'])."',
        full_bath  = '".mysql_real_escape_string($row['Baths_Full'])."',
        bath_down_desc  = '".mysql_real_escape_string($row['Bath_Downstairs_Description'])."',
        sale_bonus = '".mysql_real_escape_string($row['Sale_Office_Bonus_YN'])."',
        builder_manu = '".mysql_real_escape_string($row['Builder'])."',
        built_desc = '".mysql_real_escape_string($row['Built_Description'])."',
        carport = '".mysql_real_escape_string($row['Carports'])."',
        carport_desc = '".mysql_real_escape_string($row['Carport_Description'])."',
        accept_date = '".mysql_real_escape_string($row['Acceptance_Date_85'])."',
        cooling_fuel = '".mysql_real_escape_string($row['Cooling_Fuel'])."',
        2nd_bed_dim =  '".mysql_real_escape_string($row['2nd_Bedroom_Dimensions_89'])."',
        3rd_bed_dim = '".mysql_real_escape_string($row['3rd_Bedroom_Dimensions_90'])."',
        4th_bed_dim = '".mysql_real_escape_string($row['4th_Bedroom_Dimensions_91'])."',
        5th_bed_dim  = '".mysql_real_escape_string($row['5th_Bedroom_Dimensions_94'])."',
        fam_room_dim  = '".mysql_real_escape_string($row['Family_Room_Dimensions_93'])."',
        live_room_dim = '".mysql_real_escape_string($row['Living_Room_Dimensions_95'])."',
        master_bed_dim = '".mysql_real_escape_string($row['Master_Bedroom_Dimensions_96'])."',
        dom = '".mysql_real_escape_string($row['DOM'])."',
        earnest_depo = '".mysql_real_escape_string($row['Earnest_Deposit'])."',
        assessment_yn = '".mysql_real_escape_string($row['Assessment_YN'])."',
        conv_garage_yn = '".mysql_real_escape_string($row['Converted_Garage_YN'])."',
        ground_mount_yn = '".mysql_real_escape_string($row['Ground_Mounted_YN'])."',
        internet_yn  = '".mysql_real_escape_string($row['Internet_YN'])."',
        land_use = '".mysql_real_escape_string($row['Land_Use'])."',
        sewer  = '".mysql_real_escape_string($row['Sewer'])."',
        last_trans_code = '".mysql_real_escape_string($row['Last_Transaction_Code_134'])."',
        last_trans_date = '".mysql_real_escape_string($row['Last_Transaction_Date_135'])."',
        listing_office_code = '".mysql_real_escape_string($row['List_Agent_MUI'])."',
        community_name = '".mysql_real_escape_string($row['Community_Name'])."',
        metro_map_coor = '".mysql_real_escape_string($row['Metro_Map_Coor_XP'])."',
        metro_map_page = '".mysql_real_escape_string($row['Metro_Map_Page_XP'])."',
        original_list_price = '".mysql_real_escape_string($row['Original_List_Price'])."',
        owner_licensee = '".mysql_real_escape_string($row['Owner_Licensee'])."',
        parcel_num = '".mysql_real_escape_string($row['Parcel_Number'])."',
        pool_length = '".mysql_real_escape_string($row['Pool_Length'])."',
        pool_width = '".mysql_real_escape_string($row['Pool_Width'])."',
        power_on_off = '".mysql_real_escape_string($row['Poweronor_Off'])."',
        previous_price = '".mysql_real_escape_string($row['Last_List_Price'])."',
        property_cond = '".mysql_real_escape_string($row['Property_Condition'])."',
        legal_loc_range = '".mysql_real_escape_string($row['Legal_Location_Range_204'])."',
        realtor_yn = '".mysql_real_escape_string($row['Realtor_YN'])."',
        existing_rent = '".mysql_real_escape_string($row['Existing_Rent'])."',
        buyer_broker = '".mysql_real_escape_string($row['Buyer_Broker_211'])."',
        yr_round_school = '".mysql_real_escape_string($row['Year_Round_School_216'])."',
        legal_loc_section = '".mysql_real_escape_string($row['Legal_Location_Section_217'])."',
        sid_lid_balance = '".mysql_real_escape_string($row['SIDLID_Balance'])."',
        amount_owner_carry = '".mysql_real_escape_string($row['Owner_Will_Carry'])."',
        loft_num = '".mysql_real_escape_string($row['Num_Loft'])."',
        sold_term = '".mysql_real_escape_string($row['Sold_Term'])."',
        sold_price = '".mysql_real_escape_string($row['Sold_Price_235'])."',
        pv_spa_yn = '".mysql_real_escape_string($row['Spa'])."',
        spa_desc = '".mysql_real_escape_string($row['Spa_Description'])."',
        approx_liv_area = '".mysql_real_escape_string($row['Approx_Total_Liv_Area'])."',
        legal_loc_town = '".mysql_real_escape_string($row['Township'])."',
        washer_dryer_loc = '".mysql_real_escape_string($row['Washer_Dryer_Location'])."',
        property_desc = '".mysql_real_escape_string($row['Property_Description'])."',
        garage_desc = '".mysql_real_escape_string($row['Garage_Description'])."',
        traffic_directions = '".mysql_real_escape_string($row['Directions'])."',
        kitchen_desc = '".mysql_real_escape_string($row['Kitchen_Countertops'])."',
        live_room_desc = '".mysql_real_escape_string($row['Living_Room_Description_279'])."',
        master_bath_desc = '".mysql_real_escape_string($row['Master_Bath_Desc_280'])."',
        2nd_bed_desc = '".mysql_real_escape_string($row['2nd_Bedroom_Description_282'])."',
        3rd_bed_desc = '".mysql_real_escape_string($row['3rd_Bedroom_Description_283'])."',
        4th_bed_desc = '".mysql_real_escape_string($row['4th_Bedroom_Description_284'])."',
        possession_desc = '".mysql_real_escape_string($row['Possession_Description_285'])."',
        financing = '".mysql_real_escape_string($row['Financing_Considered'])."',
        show_additional = '".mysql_real_escape_string($row['Show_(Additional)_288'])."',
        oven_desc = '".mysql_real_escape_string($row['Oven_Description'])."',
        ranching = '".mysql_real_escape_string($row['Equestrian_Description'])."',
        misc_desc = '".mysql_real_escape_string($row['Miscellaneous_Description'])."',
        heating_fuel = '".mysql_real_escape_string($row['Heating_Fuel'])."',
        list_price_sqft = '".mysql_real_escape_string($row['RATIO_Current_Price_By_SQFT'])."',
        unit_num = '".mysql_real_escape_string($row['Unit_Number'])."',
        bath_dwnstair_yn = '".mysql_real_escape_string($row['Bath_Down_YN'])."',
        bed_dwnstair_yn = '".mysql_real_escape_string($row['Bedroom_Downstairs_YN'])."',
        building_desc = '".mysql_real_escape_string($row['Building_Description'])."',
        building_num = '".mysql_real_escape_string($row['Building_Number'])."',
        court_approv_yn = '".mysql_real_escape_string($row['Court_Approval'])."',
        fireplace_loc = '".mysql_real_escape_string($row['Fireplace_Location'])."',
        furnishing_desc = '".mysql_real_escape_string($row[''])."',
        great_room_yn = '".mysql_real_escape_string($row[''])."',
        great_room_dim = '".mysql_real_escape_string($row[''])."',
        great_room_desc = '".mysql_real_escape_string($row[''])."',
        inc_washer_yn = '".mysql_real_escape_string($row['Washer_Dryer_Included'])."',
        inc_dryer_yn = '".mysql_real_escape_string($row['Dryer_Included'])."',
        litigation = '".mysql_real_escape_string($row['Litigation'])."',
        ownership = '".mysql_real_escape_string($row['Ownership'])."',
        den_dim = '".mysql_real_escape_string($row['DEN_Dim_2511'])."',
        loft_dim = '".mysql_real_escape_string($row['LOFT_Dim_2513'])."',
        loft_desc = '".mysql_real_escape_string($row['Loft_Description_2539'])."',
        studio_yn = '".mysql_real_escape_string($row['Studio_YN'])."',
        public_address_yn = '".mysql_real_escape_string($row['Public_Address_YN'])."',
        public_address = '".mysql_real_escape_string($row['Public_Address'])."',
        commentary_yn = '".mysql_real_escape_string($row['CommentaryY/N_2859'])."',
        accessibility_desc = '".mysql_real_escape_string($row['Accessibility_Features_2925'])."',
        water_heat_desc = '".mysql_real_escape_string($row['Water_Heater_Description'])."',
        dishwasher_inc = '".mysql_real_escape_string($row['Dishwasher_YN'])."',
        disposal_inc = '".mysql_real_escape_string($row['Disposal_YN'])."',
        fridge_inc = '".mysql_real_escape_string($row['Refrigerator_YN'])."',

        hoa_dues = '".mysql_real_escape_string($row['Association_Fee_1'])."',
        hoa_dues_term = '".mysql_real_escape_string($row['Association_Fee_1_MQYN'])."',

        street_suffix = '".mysql_real_escape_string($row['Street_Suffix'])."',
        additional_rooms = '".mysql_real_escape_string($row['additional_rooms'])."',
        ada_info = '".mysql_real_escape_string($row['Accessibility_Features'])."',
        maint_fee_inc =  '".mysql_real_escape_string($row['Maintenance'])."',
        interior_improvements = '".mysql_real_escape_string($row['interior_improvements'])."',                         
        listing_office_url = '".mysql_real_escape_string($row['listing_office_url'])."',
        expenses = '".mysql_real_escape_string($row['expenses'])."',
        exterior_finish = '".mysql_real_escape_string($row['siding'])."',
        home_warranty = '".mysql_real_escape_string($row['home_warranty'])."',
        tax_year = '".mysql_real_escape_string($row['tax_year'])."',
        security = '".mysql_real_escape_string($row['security'])."',
        boat_services = '".mysql_real_escape_string($row['boat_services'])."',
        membership =  '".mysql_real_escape_string($row['membership'])."',
        restrictions =  '".mysql_real_escape_string($row['restrictions'])."',
        terms =  '".mysql_real_escape_string($row['Terms_Owner_Will_Carry'])."',
        water_footage = '".mysql_real_escape_string($row['waterfront_footage'])."',
        terms_considered =  '".mysql_real_escape_string($row['terms_considered'])."',
        waterfront = '".mysql_real_escape_string($row['water_type'])."',
        amenities = '".mysql_real_escape_string($row['Services_Available_On_Site'])."',
        listing_status = '".mysql_real_escape_string($row['Status'])."',  
        split_yn = '".mysql_real_escape_string($row['split_yn'])."',
        pool = '".mysql_real_escape_string($row['Pv_Pool'])."',
        remarks = '".mysql_real_escape_string($row['Public_Remarks'])."',
        pets =  '".mysql_real_escape_string($row['Pets_Allowed'])."',        
        design =  '".mysql_real_escape_string($row['design'])."',
        home_style = '".mysql_real_escape_string($row['Style'])."',
        floor_num = '".mysql_real_escape_string($row['Elevator_Floor_Num'])."',
        house_faces = '".mysql_real_escape_string($row['House_Faces'])."',

        last_change_type = '".mysql_real_escape_string($row['Last_Change_Type'])."',
        last_change_date = '".mysql_real_escape_string($row['Last_Change_Timestamp'])."',
        last_status = '".mysql_real_escape_string($row['Last_Status'])."',
        3_4_bath = '".mysql_real_escape_string($row['Three_Qtr_Baths'])."',
	  
        active_DOM = '".mysql_real_escape_string($row['DOM'])."'

        ";
            //if hoa dues + hoa dues term is wrong, fix.
            // line 244-349 are all added by me


      }
      
      $sql = strtr($sql, array(
          "\r\n" => "",
          "\r" => "",
          "\n" => "",
          "\t" => " "));
    
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

