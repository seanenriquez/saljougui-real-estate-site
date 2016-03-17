<?php

set_time_limit(0);
$send_notification_email = true;
date_default_timezone_set("America/New_York");
error_reporting(E_ERROR);

require('flexmls/config.php');
include('database.php');
//require('config_imageDL.php') ;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//  CONFIG OPTIONS
//
$rets_name="palmbeach1.com";
$rets_from="retsupdater@palmbeach1.com";
$mls_photo_dir = '../mls/photos/';
$mls_thumb_dir = 'thumb/';
// set this to true to force image download from links instead of using photo array - FLEXMLS advises this is best way
$forceDl=true;
// set this to true to pull HiRes images from server
$hiRes=true;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// $site_root_dir = '/var/www/vhosts/brevardauctions.com/httpdocs/';  - not doing it this way on this system - marke
$site_root_dir = dirname(__FILE__);
$base_image_dir = $site_root_dir .DIRECTORY_SEPARATOR.$mls_photo_dir;


fixDBPhotoRecs();
exit(0);


//
// this function is a lame attempt at trying to not download the same images that are already in image dir...me
// DEPRICATED:  not using anymore
//
function fixDBPhotoRecs() {

    // Get MLS Records"
  $mls_r = mysql_query("SELECT `rets_system`, `listing_id`, `photo_count`, photo_update FROM `master_rets_table` where photo_update=0 order by listing_date ASC");

  // Record Count Check
  if(mysql_num_rows($mls_r) == 0)
  {
      echo 'No records found in master_rets_table where photo_update=0.'.PHP_EOL;
      return;
  }

  // Start checking counts
  $ls=$eq=$mr=0;
  while($row = mysql_fetch_assoc($mls_r)){

      // Get Image count from Directory
      $dir_image_count = check_directory_count($row['listing_id'],$row['rets_system']);

      if($dir_image_count < $row['photo_count']) {

          echo "Listing: {$row['listing_id']} from {$row['rets_system']} - - current image count [$dir_image_count] < database image count [$row[photo_count]]...ATTEMPTING FIX".PHP_EOL;
          $ls++;
          // Update Photo Update Column so images can be downloaded
          $update_r = mysql_query("UPDATE `master_rets_table` SET `photo_update` = '0' WHERE `listing_id` = '{$row['listing_id']}' AND `rets_system` = '{$row['rets_system']}'");
          exec("php rets_update_images.php $row[listing_id]");

          // check again after attempted fix..
           $dir_image_count = check_directory_count($row['listing_id'],$row['rets_system']);
           if($dir_image_count == $row['photo_count']) {

             echo "...FIXED!".PHP_EOL;
             mysql_query("UPDATE `master_rets_table` SET `photo_update` = '1' WHERE `listing_id` = '{$row['listing_id']}' AND `rets_system` = '{$row['rets_system']}'");

           }
           else {
					  	echo "...UNABLE TO DOWNLOAD IMAGES - SKIPPING!".PHP_EOL;
           }
      }
      else if($dir_image_count == $row['photo_count']) {

          echo "Listing: {$row['listing_id']} from {$row['rets_system']} - current image count ($dir_image_count) = DB image count...SETTING FLAG".PHP_EOL;
          $update_r = mysql_query("UPDATE `master_rets_table` SET `photo_update` = '1' WHERE `listing_id` = '{$row['listing_id']}' AND `rets_system` = '{$row['rets_system']}'");
          $eq++;

      } else if($dir_image_count > $row['photo_count']) {

          echo "Listing: {$row['listing_id']} from {$row['rets_system']} - - current image count [$dir_image_count] > database image count [$row[photo_count]]...".PHP_EOL;
          mysql_query("UPDATE `master_rets_table` SET `photo_update` = '2' WHERE `listing_id` = '{$row['listing_id']}' AND `rets_system` = '{$row['rets_system']}'");
          $mr++;
      }
  }

  echo "Ending Image Check..less count=$ls equal count=$eq more count=$mr".PHP_EOL;
}

/**
 * Loops through the MLS Listing's image directory for a count
 */
function check_directory_count($listing_id,$rets_system) {
  GLOBAL $base_image_dir;

    $image_count = 0;
    $images = array();

    // fix the fact the glob sometimes doens't return an array type...
    $fnArray1 = glob($base_image_dir.$listing_id."-??.jpg");
    if ($fnArray1==false) {
      $fnArray1 = array();
    }

    $fnArray2 = glob($base_image_dir.$listing_id."-?.jpg");
    if ($fnArray2==false) {
      $fnArray2 = array();
    }

    // added for props with over 100 images...sigh..agents need to chill with that shit - marke
    $fnArray3 = glob($base_image_dir.$listing_id."-???.jpg");
    if ($fnArray3==false) {
      $fnArray3 = array();
    }

  	// merge the arrays and get count
    $images1 = array_merge($fnArray2 , $fnArray3 );
    $images = array_merge($fnArray1 , $images1 );
    $image_count = count($images);

    return $image_count;

}
?>
