<?php                                                                                     
error_reporting(E_ERROR);
date_default_timezone_set("America/New_York");
//set_time_limit(0);
$send_notification_email = true;
//require('config_imageDL.php') ;
require('flexmls/config.php');
include('database.php');
// include('../includes/global.php');


$rets_name="LASVEGASLUXEREALTY.COM" ;
$site_root_dir = "/home/admin/web/dev.webwarephpdevelopment.com/public_html/mls/" ;

$listingId = $argv[1];

// site root
// $site_root_dir = '/var/www/vhosts/brevardauctions.com/httpdocs/';
// image dir
$base_photo_image_dir = $site_root_dir . 'photos/';
$base_hires_image_dir = $site_root_dir . 'hires/';
$base_thumbs_image_dir = $site_root_dir . 'thumb/';


// set this to true to force image download from links (backdoor)
$forceDl=false;
// set this to true to pull HiRes image download from server
$hiRes=false;
// set this to true to force HiRes image download from links (backdoor)  
// NOT USED YET - marke
$hiResForceDl=false;

// PHPRETS
include('phrets2.php');
$rets = new phRETS;
// set initial paramerts
$rets->SetParam('disable_follow_location', true);
$rets->SetParam('cookie_file', 'cookie.txt');

$rets->Connect($rets_config['FLEXMLS']['login_url'],$rets_config['FLEXMLS']['username'], $rets_config['FLEXMLS']['password'] );

if ($listingId){
	get_single_image_set($listingId,$rets);
	exit;  
}

if ($send_notification_email) {
	// put mail() stuff here...	
}  


// loop thru each configurate element in array and process da shit...
foreach ($rets_config as $key => $value) {
	begin_rets_image_update($rets, $key, $value);
} 

if ($send_notification_email) {
	// put mail() stuff here...
} 


function begin_rets_image_update($rets_object, $rets_name, $rets_config) {

	echo "Starting $rets_name image download..." . PHP_EOL;

	// ok.. create update time table if needed
	makeTable();

	// pull listing_ids for all properties without update flag being set...    
	$rets_results = mysql_query(
		"SELECT * FROM master_rets_table_update where photo_timestamp >= (select end_time from photo_dl_info order by id DESC limit 1) 
			AND photo_count > 0
			AND property_status IN  ( 'Contingent Offer', 'Active-Exclusive Right' )
			ORDER BY photo_timestamp DESC"
		);
			 
	$totRows = mysql_num_rows($rets_results);
	$curRow=0;
	
	echo "Found $totRows properties for image download." . PHP_EOL;

	// get images
	if ($totRows > 0) {

		// update photo_dl table with start into ONLY if we have records to process
		$startInsert = mysql_query("INSERT INTO photo_dl_info set start_time = now()");
		if (!$startInsert) {
			throw new Exception("RETS_UPDATE_IMAGES.PHP - unable to insert start time record...terminating process");
		}
		else {
			$timeRecId = mysql_insert_id();
		}
		
		$first = true;

		while ($row = mysql_fetch_assoc($rets_results)) {
			
			if ($first) {
				$end_time = $row['photo_timestamp'];
				$first = false;
			}

			get_images($row['sysid'], $row['photo_count'], $row['sysid'], $rets_object, $rets_config);

			// stuff to keep track of and display percent done
			$curRow++;
			$perDone = number_format($curRow/$totRows*100,1,'.','');
			echo "[$perDone% Done]". PHP_EOL;

		} 

		// update timestamp only if we processed some records
		$sql= "UPDATE photo_dl_info set end_time = '$end_time' where id = $timeRecId";
		$endUpdate = mysql_query($sql);
		
		if (!$endUpdate) {
			throw new Exception("RETS_UPDATE_IMAGES.PHP - unable to update end time record...SQL = $sql ");
		}
		else {
			$endTime = date("Y-m-d H:i:s"); 
			echo "PHOTO DOWNLOADER SUCESSFUL END at $endTime". PHP_EOL;
		}
	} 

	echo "Ending master_rets_table_update for $rets_name image download [$totRows DLed]...ok" . PHP_EOL;
} //end begin_rets()


/**
* get_images function.
* Grabs new images for each mls listing id
* @access public
* @param string $listing_id This is the MLS number that builds folder names. (listing_id)
* @param mixed $rets_key The key used to retrive the Photos. (rets_key)
* @param mixed $rets_object
* @param mixed $rets_config
* @return void
*/
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
		} 
		else {
			chmod($dir, 0777);
			echo "Successfully created $dir " . PHP_EOL;
		}
	} //!file_exists($dir)

	// debug stuff...
	echo "Getting Photo Objects for Listing ID $listing_id " . PHP_EOL;
	$object_types = $rets_object->GetMetadataObjects("Property");
	foreach ($object_types as $type) {
		//    echo "+ Object {$type['ObjectType']} described as " . $type['Description'] . "\n";
	}
	// end debug stuff


	if (!$hiRes) {
		// gather all possible photo objects for later processing...
		$photos = $rets_object->GetObject('Property', "Photo", (string) $rets_key, "*",0);
		$photosLinks = $rets_object->GetObject('Property', "Photo",  $rets_key, "*", 1);
		// ..and get "backdoor" links in case we need to force downloads
		// $photosLinks = $rets_object->GetObject('Property', "Photo", (string) $rets_key,"*",1);
	}


	if ($hiRes) {

		$photos[0]['Success'] == false;
		$photosLinks = $rets_object->GetObject('Property', "Photo",  $rets_key, "*", 0);
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

					// throw a party...we sucessfully saved a image!
					$image_count++;
					echo "FL writing image " . $picFname .  " [ $width x $height ]... Ok".PHP_EOL;
					stampThumb($listing_id . '-' . $photoLink['Object-ID'] . '.jpg',400);

				}    
			}          


			$totPhotos = count($photosLinks);
			if ($image_count == $totPhotos) {

				echo "FORCED LINK image DL count ok [$image_count]...updating database for listing_id $listing_id..." . PHP_EOL;

				// not using this method anymore...using timestamp stuff - me
				// $update_photo_update = mysql_query("UPDATE `master_rets_table` SET `photo_update` = 1 WHERE `listing_id` = '$listing_id' AND `rets_system` = '{$rets_config['name']}' ") or die(mysql_error());

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

					stampThumb($listing_id . '-' . $photoLink['Object-ID'] . '.jpg',400);

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

				// not using this method anymore...using timestamp stuff - me
				//echo "Updating database for listing_id $listing_id..." . PHP_EOL;
				//$update_photo_update = mysql_query("UPDATE `master_rets_table` SET `photo_update` = 1 WHERE `listing_id` = '$listing_id' AND `rets_system` = '{$rets_config['name']}' ") or die(mysql_error());
			}
		} 
	}

	if ($write_error == false) {


		/*
		echo "Updating Master Table. $image_count images retrieved. " . PHP_EOL;
		$sql = "UPDATE `master_rets_table` SET `photo_update` = '1', `photo_count` = $image_count WHERE `listing_id` = '$listing_id' AND `rets_system` = 'INNOMLS' ";
		$update_results = mysql_query($sql);
		if (!$update_results) {
		throw new Exception("RETS_UPDATE_IMAGES ERROR: updating master_rets_table FAIL::$sql") ;
		}   */
	} //$write_error == false

	return true;

} //end get_image()


//
// this function is a lame attempt at trying to not download the same images that are already in image dir...me
// DEPRICATED:  not using anymore
//
function fixDBPhotoRecs() {

	// Get MLS Records"
	$mls_r = mysql_query("SELECT `rets_system`, `listing_id`, `photo_count`, photo_update FROM `master_rets_table_update` where photo_update=0 order by listing_id DESC");

	// Record Count Check
	if(mysql_num_rows($mls_r) == 0)
	{
		echo 'No records found in master_rets_table_update where photo_update=0.'.PHP_EOL;
		return;
	}

	// Start checking counts
	$ls=$eq=$mr=0;
	while($row = mysql_fetch_assoc($mls_r)){

		// Get Image count from Directory
		$dir_image_count = check_directory_count($row['listing_id'],$row['rets_system']);

		if($dir_image_count < $row['photo_count'])
		{
			echo "Listing: {$row['listing_id']} from {$row['rets_system']} - - current image count [$dir_image_count] < database image count [$row[photo_count]]...???<br>".PHP_EOL;
			$ls++;
			// Update Photo Update Column so images can be downloaded
			// $update_r = mysql_query("UPDATE `master_rets_table` SET `photo_update` = '0' WHERE `listing_id` = '{$row['listing_id']}' AND `rets_system` = '{$row['rets_system']}'");
		}
		else if($dir_image_count == $row['photo_count']) {
			echo "Listing: {$row['listing_id']} from {$row['rets_system']} - current image count ($dir_image_count) = database image count...turning update off for mls# $row[listing_id]<br>".PHP_EOL; 
			$update_r = mysql_query("UPDATE `master_rets_table_update` SET `photo_update` = '1' WHERE `listing_id` = '{$row['listing_id']}' AND `rets_system` = '{$row['rets_system']}'");
			$eq++;     
		} else if($dir_image_count > $row['photo_count']) { 
			echo "Listing: {$row['listing_id']} from {$row['rets_system']} - - current image count [$dir_image_count] > database image count [$row[photo_count]]...???<br>".PHP_EOL;
			$mr++;
		}

	}

	echo "Ending Image Check..less count=$ls equal count=$eq more count=$mr".PHP_EOL;


}

/**
* Loops through the MLS Listing's image directory for a count
*/
function check_directory_count($listing_id,$rets_system)
{

	GLOBAL $base_image_dir;
	// Base Images Directory
	// $init_image = $base_image.$listing_id.".jpg";
	$image_count = 0;
	$images = array();


	// fix the fact the glob sometimes doens't return an array type...sigh
	$fnArray1 = glob($base_image_dir.$listing_id."-??.jpg");
	if ($fnArray1==false) {
		$fnArray1 = array();
	}

	$fnArray2 = glob($base_image_dir.$listing_id."-?.jpg");
	if ($fnArray2==false) {
		$fnArray2 = array();
	}

	// Check that the directory even exisits
	$images = array_merge($fnArray1 , $fnArray2 );
	$image_count = count($images);

	if ($image_count > 0)  {
		// debug:: echo "image count $image_count" ;
	}

	//sort($images, SORT_NUMERIC);

	return $image_count;

}

function makeTable(){

	$chkTbl=mysql_query("CREATE TABLE IF NOT EXISTS photo_dl_info (
		id int(11) NOT NULL AUTO_INCREMENT,
		start_time timestamp NULL DEFAULT NULL,
		end_time timestamp NULL DEFAULT NULL,
		PRIMARY KEY (id))
	ENGINE = MYISAM;"); 

	// if sucessful init table with one "old" record
	$rowCnt=mysql_query("select * from photo_dl_info");
	if (mysql_num_rows($rowCnt)==0) {
		$initTbl=mysql_query("INSERT INTO photo_dl_info set start_time = '1900-01-01';");
	}

}

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

function get_single_image_set($listing_id,$rets_object) {

	require_once("colors.class.php");
	$colors = new Colors();

	$rets_results = mysql_query("select * from `master_rets_table_update` WHERE  listing_id = '$listing_id';");
	$totRows = mysql_num_rows($rets_results);
	$curRow=0;

	// get images
	if ($totRows > 0) {

		while ($row = mysql_fetch_assoc($rets_results)) {

			get_images($row['listing_id'], $row['photo_count'], $row['rets_key'], $rets_object, null);

		} 

		echo $colors->getColoredString("INDIVIDUAL PHOTO DOWNLOADER SUCESSFUL END for MLS ID: $listing_id.", "yelllow",null) . "\n";

	}
}

function stampThumb($mls,$width) {

	return;  // dont do for now

	require_once('simpleImage.php');

	GLOBAL $base_hires_image_dir;
	GLOBAL $base_thumbs_image_dir;
	GLOBAL $rets_config;

	if (!file_exists($base_thumbs_image_dir)) {
		if (mkdir($base_thumbs_image_dir, 0755)) {
		}
		else {
			throw new Exception("stampThumb.php - cannot create new directory for thumbs...") ;
		}
	}

	$image = new SimpleImage();

	$image->load($base_hires_image_dir.$mls);

	if ($image->getWidth()>$width)
		$image->resizeToWidth($width);

	$image->save($base_thumbs_image_dir.$mls);
	echo "StampThumb :: writing image " . $base_thumbs_image_dir.$mls .  "  ...Ok".PHP_EOL;

}
