<?php
require('assets/fileupload.class.php');

$type = (isset($_GET['type'])) ? (string)$_GET['type'] : '';

header("Content-Type: application/json");

// list of valid extensions, ex. array("jpeg", "xml", "bmp")
$allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'mp4');
// max file size in bytes
//$sizeLimit = 10 * 1024 * 1024;
$sizeLimit = 2 * 1024 * 1024;

$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

switch($type)
{
	case "gallery_image":
		$gallery_id = (isset($_GET['gallery_id'])) ? (int)$_GET['gallery_id'] : '';
		
		$dir = $_SERVER['DOCUMENT_ROOT'] . '/images/galleries/' . $gallery_id;
		
		if(!is_dir($dir))
		{
			@mkdir($dir, 0777, true);
			#@chown($dir, 'hedoadmin');
			#@chgrp($dir, 'psacln');
		}
	
	break;
	
	case "staff_pic":
		$staff_id = (isset($_GET['staff_id'])) ? (int)$_GET['staff_id'] : '';
		// $dir = $_SERVER['DOCUMENT_ROOT'] . '/images/staff/' . $staff_id . '/';
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/images/staff/';
		
		if(!is_dir($dir))
		{
			@mkdir($dir, 0777, true);
			#@chown($dir, 'hedoadmin');
			#@chgrp($dir, 'psacln');
		}
		
	break;
	
	case "custom_listing_image":
		$custom_listing_id = isset($_GET['custom_listing_id']) ? (int)$_GET['custom_listing_id'] : '';	
		$dir = $_SERVER['DOCUMENT_ROOT'] . '/images/customlistings/' . $custom_listing_id;
		
		if(!is_dir($dir))
		{
			@mkdir($dir, 0777, true);
		}
		
	break;
	
	case "partner_image":
		$partner_id = isset($_GET['partner_id']) ? (int)$_GET['partner_id'] : '';	
		$dir = $_SERVER['DOCUMENT_ROOT'] . '/images/partners/' . $partner_id;
		
		if(!is_dir($dir))
		{
			@mkdir($dir, 0777, true);
		}
		
	break;
	
	case "community_image":
		$subdivision_area_id = isset($_GET['subdivision_area_id']) ? (int)$_GET['subdivision_area_id'] : '';	
		$dir = $_SERVER['DOCUMENT_ROOT'] . '/files/subdivisions_areas/images/';
		
		if(!is_dir($dir))
		{
			@mkdir($dir, 0777, true);
		}
		
	break;
  case "cities_image":
    $cities_id = isset($_GET['cities_id']) ? (int)$_GET['cities_id'] : '';  
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/files/cities/images/';
    
    if(!is_dir($dir))
    {
      @mkdir($dir, 0777, true);
    }
    
  break;
	
	default:
		$dir = $_SERVER['DOCUMENT_ROOT'] . '/files';
	break;
}

$result = $uploader->handleUpload($dir, FALSE, FALSE);

$result['url'] = $uploader->getUploadName();

echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
?>