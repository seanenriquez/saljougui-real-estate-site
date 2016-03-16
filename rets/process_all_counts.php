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

// load cities from db
$sql = "SELECT city FROM city_information
        ORDER BY city ASC";
        
$cities = mysql_query($sql) or die(mysql_error() . $sql);

// loop all cities
while ($row = mysql_fetch_assoc($cities)) {
  
  echo "\r\nprocessing rental counts for the city of $row[city]...";
  
  getAllSubdivCounts(trim($row['city']));
  
  getAllCityCounts(trim($row['city']));
  
  getSaleCityBedsCounts(trim($row['city']));
  
  getSaleCityStyleCounts(trim($row['city']));
  
  getRentalCityStyleCounts(trim($row['city']));
  
  getRentalCityAnnualCounts(trim($row['city']));
  
  getRentalCitySeasonalCounts(trim($row['city']));
  
  getRentalCityUnfurnPetCounts(trim($row['city']));
  
  getRentalCityFurnPetCounts(trim($row['city']));
  
}


function getAllSubdivCounts ($city) {
 
 echo "\r\n\tBEGIN processing subdivision counts ..."."\r\n";
    
  $sql = "SELECT subdivision_area_name FROM community_area_information
        WHERE city = '".trim($city)."'
        ORDER BY subdivision_area_name ASC";

  $subdiv = mysql_query($sql) or die(mysql_error() . $sql);

  // loop all subdivs
  while ($row_sub = mysql_fetch_assoc($subdiv)) {

    $sql = "SELECT count(*) as sd_count FROM master_rets_table
            WHERE subdivision REGEXP '".trim($row_sub['subdivision_area_name'])."'
            AND city = '".trim($city)."'
            AND property_type != 'rental' ";     
            
    $counts = mysql_query($sql) or die(mysql_error() . $sql);    

    $row_counts = mysql_fetch_assoc($counts);

    // update table with counts
    $sql= "UPDATE community_area_information set current_hits = $row_counts[sd_count] where city = '".trim($city)."' and subdivision_area_name = '".trim($row_sub['subdivision_area_name'])."'"; 
    mysql_query($sql) or die(mysql_error() . $sql);

    $sql = "SELECT count(*) as sd_count FROM master_rets_table
            WHERE subdivision REGEXP '".trim($row_sub['subdivision_area_name'])."' 
            AND city = '".trim($city)."'
            AND property_type = 'rental' ";     
            
    $counts = mysql_query($sql) or die(mysql_error() . $sql);    

    $row_counts = mysql_fetch_assoc($counts);

    // update table with counts
    $sql= "UPDATE community_area_information set current_rental_hits = $row_counts[sd_count] where city = '".trim($city)."' and subdivision_area_name = '".trim($row_sub['subdivision_area_name'])."'"; 
    mysql_query($sql) or die(mysql_error() . $sql);
        
  }

  echo "\tEND processing subdivision counts..."."\n";
    
}


function getAllCityCounts ($city) {
  
  // start with sale counts
  $sql = "SELECT count(*) as city_count FROM master_rets_table
              WHERE city = '".trim($city)."'
              AND property_type != 'rental' ";     
              
  $counts = mysql_query($sql) or die(mysql_error() . $sql);    
  $row_counts = mysql_fetch_assoc($counts);
  
  // update table with sale counts
  $sql= "UPDATE city_information set current_hits = $row_counts[city_count] where city = '".trim($city)."'"; 
  mysql_query($sql) or die(mysql_error() . $sql); 
  
  //
  // now get rental counts
  //
  $sql = "SELECT count(*) as city_count FROM master_rets_table
              WHERE city = '".trim($city)."'
              AND property_type = 'rental' ";     
              
  $counts = mysql_query($sql) or die(mysql_error() . $sql);    
  $row_counts = mysql_fetch_assoc($counts);
  
  // update table with rental counts
  $sql= "UPDATE city_information set current_rental_hits = $row_counts[city_count] where city = '".trim($city)."'"; 
  mysql_query($sql) or die(mysql_error() . $sql); 
  
}

function getSaleCityBedsCounts ($city) {
  
  $data = array ("tier1" => array(75,100),
                  "tier2" => array(100,125),
                  "tier3" => array(125,150),
                  "tier4" => array(150,175),
                  "tier5" => array(175,200),
                   "tier6" => array(200,225),
                    "tier7" => array(225,250),
                     "tier8" => array(250,275),
                     "tier9" => array(275,300),
                     "tier10" => array(300,350),
                     "tier11" => array(350,400),
                     "tier12" => array(400,450),
                     "tier13" => array(450,500),
                     "tier14" => array(500,600),
                     "tier15" => array(600,750),
                     "tier16" => array(750,1000),                                
                     "tier17" => array(1000,20000));
                
  $i=1;    
   
  foreach ($data as $tier) {
    
    for ($beds=2;$beds<=5;$beds++) {
      
      $bedslo=$beds-1;if ($beds == 5) $beds=20;
      
      $pricelo=$tier[0]*1000;$pricehi=$tier[1]*1000;
      
      $sql = "SELECT count(*) as city_count FROM master_rets_table
                WHERE city = '".trim($city)."'
                AND listing_price >= $pricelo AND listing_price <= $pricehi
                AND bedrooms >= $bedslo AND bedrooms <= $beds
                AND property_type = 'residential'";     
                
      $counts = mysql_query($sql) or die(mysql_error() . $sql);    
      $row_counts = mysql_fetch_assoc($counts);
      
      $tierTag = "tier".$i;
      
      // update table with counts
      $sql= "INSERT INTO beds_sales set $tierTag = $row_counts[city_count], beds = $bedslo, city = '".trim($city)."' ON DUPLICATE KEY UPDATE $tierTag = $row_counts[city_count] "; 
              
      mysql_query($sql) or die(mysql_error() . $sql);     
      
    }
    
    $i++;
    
  }
  
}


function getSaleCityStyleCounts ($city) {  
  
  $data = array ("tier1" => array(75,100),
                  "tier2" => array(100,125),
                  "tier3" => array(125,150),
                  "tier4" => array(150,175),
                  "tier5" => array(175,200),
                   "tier6" => array(200,225),
                    "tier7" => array(225,250),
                     "tier8" => array(250,275),
                     "tier9" => array(275,300),
                     "tier10" => array(300,350),
                     "tier11" => array(350,400),
                     "tier12" => array(400,450),
                     "tier13" => array(450,500),
                     "tier14" => array(500,600),
                     "tier15" => array(600,750),
                     "tier16" => array(750,1000),                                
                     "tier17" => array(1000,20000));
                
  $i=1;    
  
  $aStyle = array("Single Family Detach","Condo/Coop","Townhouse|Villa","Townhouse","Villa");   
  $aStyle = array("Single Family Detach","Condo/Coop","Townhouse|Villa"); 
  

   
  foreach ($data as $tier) {
    
    foreach ($aStyle as $subType) {
      
       $pricelo=$tier[0]*1000;$pricehi=$tier[1]*1000;
      

      $sql = "SELECT count(*) as city_count FROM master_rets_table
                WHERE city = '".trim($city)."'
                AND listing_price >= $pricelo AND listing_price <= $pricehi
                AND property_sub_type REGEXP '$subType' 
                AND property_type = 'residential'";     
                
      $counts = mysql_query($sql) or die(mysql_error() . $sql);    
      $row_counts = mysql_fetch_assoc($counts);
      
      $tierTag = "tier".$i;
      
      // update table with counts
      $sql= "INSERT INTO style_sales set $tierTag = $row_counts[city_count], style = '$subType', city = '".trim($city)."' ON DUPLICATE KEY UPDATE $tierTag = $row_counts[city_count] "; 
              
      mysql_query($sql) or die(mysql_error() . $sql);     
      
    }
    
    $i++;
    
  }
  
}


function getRentalCityStyleCounts ($city) {
  
  $data = array ("tier1" => array(800,1300),
                  "tier2" => array(1300,1700),
                  "tier3" => array(1700,2500),
                  "tier4" => array(2500,3500),
                  "tier5" => array(3500,5000),
                  "tier6" => array(5000,15000));
          
  $i=1;    
  
  $aStyle = array("Single Family Detach","Condo/Coop","Townhouse|Villa","Townhouse","Villa");     
    $aStyle = array("Single Family Detach","Condo/Coop","Townhouse|Villa"); 
   
  foreach ($data as $tier) {
    
    foreach ($aStyle as $subType) {
      
      $bedslo=$beds-1;

      if ($beds == 5) $beds=10;

      $sql = "SELECT count(*) as city_count FROM master_rets_table
                WHERE city = '".trim($city)."'
                AND listing_price >= $tier[0] AND listing_price <= $tier[1]
                AND property_sub_type REGEXP '$subType' 
                AND property_type = 'rental'";     
                
      $counts = mysql_query($sql) or die(mysql_error() . $sql);    
      $row_counts = mysql_fetch_assoc($counts);
      
      $tierTag = "tier".$i;
      
      // update table with counts
      $sql= "INSERT INTO style_rentals set $tierTag = $row_counts[city_count], style = '$subType', city = '".trim($city)."' ON DUPLICATE KEY UPDATE $tierTag = $row_counts[city_count] "; 
              
      mysql_query($sql) or die(mysql_error() . $sql);     
      
    }
    
    $i++;
    
  }
  
}


function getRentalCityAnnualCounts ($city) {
   
  $data = array ("tier1" => array(800,1300),
                  "tier2" => array(1300,1700),
                  "tier3" => array(1700,2500),
                  "tier4" => array(2500,3500),
                  "tier5" => array(3500,5000),
                  "tier6" => array(5000,15000));
          
  $i=1;       
   
  foreach ($data as $tier) {
    
    for ($beds=2;$beds<=5;$beds++) {
      
      $bedslo=$beds-1;

      if ($beds == 5) $beds=10;

      $sql = "SELECT count(*) as city_count FROM master_rets_table
                WHERE city = '".trim($city)."'
                AND listing_price >= $tier[0] AND listing_price <= $tier[1]
                AND bedrooms >= $bedslo AND bedrooms <= $beds
                AND property_type = 'rental'";     
                
      $counts = mysql_query($sql) or die(mysql_error() . $sql);    
      $row_counts = mysql_fetch_assoc($counts);
      
      $tierTag = "tier".$i;
      
      // update table with counts
      $sql= "INSERT INTO annual_rentals set $tierTag = $row_counts[city_count], beds = $bedslo, city = '".trim($city)."' ON DUPLICATE KEY UPDATE $tierTag = $row_counts[city_count] "; 
              
      mysql_query($sql) or die(mysql_error() . $sql);     
      
    }
    
    $i++;
    
  }
  
  $sql = "SELECT count(*) as city_count FROM master_rets_table
              WHERE city = '".trim($city)."' 
              AND property_type = 'rental'";     
              
  $counts = mysql_query($sql) or die(mysql_error() . $sql);    
  $row_counts = mysql_fetch_assoc($counts);
  
  // update table with counts
  $sql= "UPDATE city_information set current_rental_hits = $row_counts[city_count] where city = '".trim($city)."'"; 
  mysql_query($sql) or die(mysql_error() . $sql); 
  
}


function getRentalCitySeasonalCounts ($city) {
  
  $data = array ("tier1" => array(800,1300),
                  "tier2" => array(1300,1700),
                  "tier3" => array(1700,2500),
                  "tier4" => array(2500,3500),
                  "tier5" => array(3500,5000),
                  "tier6" => array(5000,15000));
          
  $i=1;       
   
  foreach ($data as $tier) {
    
    for ($beds=2;$beds<=5;$beds++) {
      
      $bedslo=$beds-1;

      if ($beds == 5) $beds=10;

      $sql = "SELECT count(*) as city_count FROM master_rets_table
                WHERE city = '".trim($city)."'
                AND furn_sea_rent >= $tier[0] AND furn_sea_rent <= $tier[1]
                AND bedrooms >= $bedslo AND bedrooms <= $beds
                AND property_type = 'rental'";     
                
      $counts = mysql_query($sql) or die(mysql_error() . $sql);    
      $row_counts = mysql_fetch_assoc($counts);
      
      $tierTag = "tier".$i;
      
      // update table with counts
      $sql= "INSERT INTO seasonal_rentals set $tierTag = $row_counts[city_count], beds = $bedslo, city = '".trim($city)."' ON DUPLICATE KEY UPDATE $tierTag = $row_counts[city_count] "; 
              
      mysql_query($sql) or die(mysql_error() . $sql);     
      
    }
    
    $i++;
    
  }
  
}


function getRentalCityUnfurnPetCounts ($city) {
  
  $data = array ("tier1" => array(800,1300),
                  "tier2" => array(1300,1700),
                  "tier3" => array(1700,2500),
                  "tier4" => array(2500,3500),
                  "tier5" => array(3500,5000),
                  "tier6" => array(5000,15000));
          
  $i=1;       
   
  foreach ($data as $tier) {
    
    for ($beds=2;$beds<=5;$beds++) {
      
      $bedslo=$beds-1;

      if ($beds == 5) $beds=10;

      $sql = "SELECT count(*) as city_count FROM master_rets_table
                WHERE city = '".trim($city)."'
                AND (listing_price >= $tier[0] AND listing_price <= $tier[1])
                and pets != 'no'
                AND bedrooms >= $bedslo AND bedrooms <= $beds
                AND property_type = 'rental'";     
                
      $counts = mysql_query($sql) or die(mysql_error() . $sql);    
      $row_counts = mysql_fetch_assoc($counts);
      
      $tierTag = "tier".$i;
      
      // update table with counts
      $sql= "INSERT INTO pet_unfurn_rentals set $tierTag = $row_counts[city_count], beds = $bedslo, city = '".trim($city)."' ON DUPLICATE KEY UPDATE $tierTag = $row_counts[city_count] "; 
              
      mysql_query($sql) or die(mysql_error() . $sql);     
      
    }
    
    $i++;
    
  }
}

function getRentalCityFurnPetCounts ($city) {
  
  $data = array ("tier1" => array(800,1300),
                  "tier2" => array(1300,1700),
                  "tier3" => array(1700,2500),
                  "tier4" => array(2500,3500),
                  "tier5" => array(3500,5000),
                  "tier6" => array(5000,15000));
          
  $i=1;       
   
  foreach ($data as $tier) {
    
    for ($beds=2;$beds<=5;$beds++) {
      
      $bedslo=$beds-1;

      if ($beds == 5) $beds=10;

      $sql = "SELECT count(*) as city_count FROM master_rets_table
                WHERE city = '".trim($city)."'
                AND furn_ann_rent >= $tier[0] AND furn_ann_rent <= $tier[1]
                and pets != 'no'
                AND bedrooms >= $bedslo AND bedrooms <= $beds
                AND property_type = 'rental'";     
                
      $counts = mysql_query($sql) or die(mysql_error() . $sql);    
      $row_counts = mysql_fetch_assoc($counts);
      
      $tierTag = "tier".$i;
      
      // update table with counts
      $sql= "INSERT INTO pet_furn_rentals set $tierTag = $row_counts[city_count], beds = $bedslo, city = '".trim($city)."' ON DUPLICATE KEY UPDATE $tierTag = $row_counts[city_count] "; 
              
      mysql_query($sql) or die(mysql_error() . $sql);     
      
    }
    
    $i++;
    
  }
  
}
?>
