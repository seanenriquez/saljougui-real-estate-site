<?php
require('database.php');
include('simpleImage.php');        


$width = 400;
// $height = 150;

$base_dir  = "/home/admin/web/dev.webwarephpdevelopment.com/public_html";
$origin_dir = '/mls/photos/';
$full_origin_dir = $base_dir.$origin_dir;

// $photoFiles = array_diff(scandir($full_origin_dir), array('..', '.'));
$photoFiles = glob($full_origin_dir."*-1.jpg");
$totPics = count($photoFiles);
$cntPics = 0;
// $thumbDir =  $dir."/".$height."-".$width."/";
$thumb_dir = '/mls/thumbs/';

$full_thumb_dir = $base_dir.$thumb_dir;

if (!file_exists($full_thumb_dir)) {
  if (!mkdir($full_thumb_dir, 0755)) {
    throw new Exception("createThumbs.php - cannot create new directory for thumbs...") ;
  }
}

$image = new SimpleImage();
$perDoneOld="0.0";

foreach ($photoFiles as $photo) {

    $path_parts = pathinfo($photo);

    $image->load($photo);

    $wid =  $image->getWidth();
    
    echo  "$photo:  ($wid)\n";
    
    if ($wid > 1200) {
    	 
    	 echo  "$photo:  ($wid)\n";
      // updateMasterRets(substr($path_parts['filename'],0,-2));
		 
    }

    $image->resizeToWidth($width);    
    $image->save($full_thumb_dir.$path_parts['basename']);       

    $perDone = number_format(($cntPics++/$totPics)*100,1,'.','');

    if ($perDone>=$perDoneOld) {
      
      echo "[$perDone% Done]". PHP_EOL;
      $perDoneOld+="0.5";
    
    }
}

function updateMasterRets($listingId) {
  
  $sql= "UPDATE master_rets_table_update set index_photo = 1 where listing_id = '$listingId'"; 
  mysql_query($sql) or die(mysql_error() . $sql); 
  
}
?>

