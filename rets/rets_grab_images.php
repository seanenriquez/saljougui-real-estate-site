<?php
error_reporting(E_ERROR);
date_default_timezone_set("America/New_York");
//set_time_limit(0);
$send_notification_email = true;
//require('config_imageDL.php') ;
require('flexmls/config.php');
include('../includes/global.php');

include('database.php');


$rets_name="PALMBEACH1.COM" ;

//$listingId = $argv[1];

// site root
// $site_root_dir = '/var/www/vhosts/brevardauctions.com/httpdocs/';
// image dir
$base_photo_image_dir = $site_root_dir . 'photos/';
$base_hires_image_dir = $site_root_dir . 'hires/';


// set this to true to force image download from links (backdoor)
$forceDl=true;
// set this to true to pull HiRes image download from server
$hiRes=true;
// set this to true to force HiRes image download from links (backdoor)
// NOT USED YET - marke
$hiResForceDl=false;

// PHPRETS
include('phrets.php');
$rets = new phRETS;
// set initial paramerts
$rets->SetParam('disable_follow_location', true);
$rets->SetParam('cookie_file', 'cookie.txt');
$rets->AddHeader("User-Agent",$rets_config['FLEXMLS']['user_agent']);

$rets->Connect($rets_config['FLEXMLS']['login_url'],$rets_config['FLEXMLS']['username'], $rets_config['FLEXMLS']['password'] );

/** RETS config file(s) **/

 $sql = "select listing_id from master_rets_table where property_type = 'residental' and photo_count>0";
 $rets_results = mysql_query($sql);
  while ($row = mysql_fetch_assoc($rets_results)) {
   // ok...no record exists for the image, so we can safely delete the image set..
   get_single_image_set($row['listing_id'],$rets);

 }

exit(0);


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

function get_images($listing_id, $photo_count, $rets_key, $rets_object, $rets_config) {

  global $base_photo_image_dir,$base_hires_image_dir,$hiRes;

  // Image Directory
  /* $dir = $base_image.$rets_config['image_directory'].$listing_id.'/'; */
  if (!$hiRes)
    $dir = $base_photo_image_dir;
  else
    $dir = $base_hires_image_dir;

  // Check for image and create directory if needed
  if (!file_exists($dir)) {

    echo "Creating DIR $dir " . PHP_EOL;

    if (!mkdir($dir, 0777, true)) {
      throw new Exception("RETS_UPDATE_IMAGES.PHP - Fatel Error::Cannot Create Directory $dir...terminating.") ;
    } //!mkdir($dir, 0777, true)
    else {
      chmod($dir, 0777);
      echo "Successfully created $dir " . PHP_EOL;
    }
  } //!file_exists($dir)

  // debug stuff...
  echo "Getting Photo Objects for Listing ID $listing_id " . PHP_EOL;

  if ($hiRes) {
    $photos[0]['Success'] == false;
    $photosLinks = $rets_object->GetObject('Property', "hires", (string) $rets_key,"*",1);
  }

  $write_error = false;
  $image_count = 0;

  echo "START Getting New Images..." . PHP_EOL;

  // even if we are "forcing" download, double check the photo array
  if ($GLOBALS['forceDl'] ) {

    // check photo array for the data
    if (!$photos[0]['Success']) {

      // clean up images
      delete_images($rets_key);

      // nope...so hit the backdoor links
      foreach ($photosLinks as $photoLink) {

        // get photo data from link and build filename
        $picData = file_get_contents($photoLink['Location']) ;
        $image = imagecreatefromstring($picData);
        $width = imagesx($image);
        $height = imagesy($image);

        $picFname = $dir . $listing_id . '-' . $photoLink['Object-ID'] . '.jpg';

        if (file_put_contents($picFname, $picData) == false) {
         // barf...
          echo "Could not write the file " . $picFname . "<br>".PHP_EOL;
          $write_error = true;
          break;
        }
        else {

          $image_count++;
          echo "FL writing image " . $picFname .  " [ $width x $height ]... Ok".PHP_EOL;

        }
     }
     $totPhotos = count($photosLinks);
     if ($image_count == $totPhotos) {

       echo "FORCED LINK image DL count ok [$image_count]...updating database for listing_id $listing_id..." . PHP_EOL;

     }
     else {
       echo "FORCED LINK image DL count FAIL for listing_id $listing_id [$image_count] not equal [$totPhotos]" . PHP_EOL;

     }
   }
   else {

     // we got the photos in the array..w00t
     foreach ($photos as $photo) {

       $picFname = $dir . $listing_id . '-' . $photo['Object-ID'] . '.jpg';

       $image = imagecreatefromstring($photo['Data']);
       $width = imagesx($image);
       $height = imagesy($image);

       if (file_put_contents($picFname, $photo['Data']) == false) {

         echo "Could not write the file " . $picFname . PHP_EOL;
         $write_error = true;
         break;

       }
       else {
         $image_count++;
         echo "FP writing image " . $picFname .  "  [ $widthx$ x $height ]...Ok".PHP_EOL;

       }
     }

     $totPhotos = count($photos);
     if ($image_count == $totPhotos) {
       echo "FORCED PHOTO images DL $listing_id count [$image_count] OK ..." . PHP_EOL;
        // not using this method anymore...using timestamp stuff - me
       // $update_photo_update = mysql_query("UPDATE `master_rets_table` SET `photo_update` = 1 WHERE `listing_id` = '$listing_id' AND `rets_system` = '{$rets_config['name']}' ") or die(mysql_error());
     }
     else {
       echo "FORCED PHOTO image DL count FAIL for listing_id $listing_id [$image_count] not equal [$totPhotos]" . PHP_EOL;

     }

   }
 }
 // ok...not forcing download so all we do is check photo array.
 else {

   foreach ($photos as $photo) {

     $image_count++;
     $picFname = $dir . $listing_id . '-' . $photo['Object-ID'] . '.jpg';

     if (file_put_contents($picFname, $photo['Data']) == false) {

       echo "Could not write the file " . $picFname . PHP_EOL;
       $write_error = true;
       break;

     }
     else {

       echo "Writing image" . $picFname .  " Ok".PHP_EOL;

     }
   }
 }

 return true;

} //end get_image()

function delete_images($listing_id) {

   GLOBAL $base_hires_image_dir;
   GLOBAL $rets_config;

  // Base Images Directory
  // $init_image = $base_image.$listing_id.".jpg";
  $image_count = 0;
  $images = array();
  $dir = $base_hires_image_dir.$rets_config['image_directory'];

  // fix the fact the glob sometimes doens't return an array type...sigh
  $fnArray1 = glob($dir.$listing_id."-??.jpg"); if (!$fnArray1) $fnArray1 = array();
  $fnArray2 = glob($dir.$listing_id."-?.jpg"); if (!$fnArray2) $fnArray2 = array();

  // create one array from the two...
  $images = array_merge($fnArray1 , $fnArray2 );

  // handy way to delete all files in an array...
  echo "Deleting old image set for MLS Id# $listing_id...";
  array_map( "unlink", $images );
  echo "...ok"."\n";

}