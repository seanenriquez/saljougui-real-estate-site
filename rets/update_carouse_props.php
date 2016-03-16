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

//mail("mrk.enriquez@gmail.com","FLEXMLS RETS UPDATE START for tsgfl.com","FLEXMLS RETS Update Started at $start_time", "FROM: rets@tsgfl.com");

/** Data Config **/
require('database.php');

$sql = 'DELETE FROM custom_listings;';
mysql_query($sql) or die(mysql_error() . $sql);    

$sql = 'INSERT INTO custom_listings (listing_id) 
        SELECT listing_id from master_rets_table 
              WHERE property_type = "Residential" 
                AND city REGEXP "(palm beach gardens|jupiter|WEST PALM BEACH)" 
                AND listing_price > 800000
                AND listing_price <= 1500000
                AND index_photo = 1
              ORDER BY rand() DESC
              LIMIT 3';   
                    
mysql_query($sql) or die(mysql_error() . $sql);    
  
