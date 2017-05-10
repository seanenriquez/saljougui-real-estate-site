<?php
set_time_limit(0);
$send_notification_email = true;
date_default_timezone_set("America/New_York");
error_reporting(E_ERROR);

include('database.php');
include('preg_find.php');
include('../includes/global.php');

//require('config_imageDL.php') ;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//  CONFIG OPTIONS 
//  
$rets_name="lasvegasluxerealty.com";
$rets_from="mark@webwarephpdevelopment.com";

// set this to true to force image download from links instead of using photo array - FLEXMLS advises this is best way
$forceDl=true;
// set this to true to pull HiRes images from server
$hiRes=true;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// $site_root_dir = '/var/www/vhosts/brevardauctions.com/httpdocs/';  - not doing it this way on this system - marke

set_time_limit(0);

$files = preg_find('(.*)-1.jpg$/', $base_image_dir, PREG_FIND_SORTKEYS);

$delCnt=$keepCnt=0;

foreach($files as $file) {
  
 $mls = strrchr ( $file ,"/" );
 if ($mls[4]==1)
  $mls=substr($mls,1,11);
 else
  $mls=substr($mls,1,10);
  
 $sql = "select * from master_rets_table where listing_id = '$mls'";
 $mls_r = mysql_query($sql);
 if(mysql_num_rows($mls_r) == 0) {
   // ok...no record exists for the image, so we can safely delete the image set..
   delete_images($mls);
   echo "delete image set for MLS Id# $mls...\r\n";
   $delCnt++;
   
 } else {
   
   $keepCnt++;
   // echo "Keeping image set for MLS Id# $mls...\r\n";  
 }
 
  
}

echo "DELCNT = $delCnt\r\nKeepCNT = $keepCnt\r\n";
exit(0);

function delete_images($listing_id) {
    
   GLOBAL $base_image_dir;
   GLOBAL $rets_config;
   
  // Base Images Directory
  // $init_image = $base_image.$listing_id.".jpg";
  $image_count = 0;
  $images = array();
  $dir = $base_image_dir;

  // fix the fact the glob sometimes doens't return an array type...sigh
  $fnArray1 = glob($dir."/".$listing_id."-??.jpg"); if (!$fnArray1) $fnArray1 = array();
  $fnArray2 = glob($dir."/".$listing_id."-?.jpg"); if (!$fnArray2) $fnArray2 = array();

  // create one array from the two...
  $images = array_merge($fnArray1 , $fnArray2 );
  
  // handy way to delete all files in an array...
  echo "Deleting old image set for MLS Id# $listing_id...";
  array_map( "unlink", $images );
  echo "...ok"."\n";

}

function get_single_image_set($listing_id,$rets_object) {
     
  $rets_results = mysql_query("select * from `master_rets_table` WHERE  listing_id = '$listing_id';");
  $totRows = mysql_num_rows($rets_results);
  $curRow=0;
 
  // get images
  if ($totRows > 0) {
     
    while ($row = mysql_fetch_assoc($rets_results)) {
        
      get_images($row['listing_id'], $row['photo_count'], $row['rets_key'], $rets_object, null);
           
    } 
       
  }
}