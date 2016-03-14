<?
//Global Panel Settings
include('includes/panel-settings.php');
include('includes/config.php');
include('includes/secure.php');

$type = isset($_REQUEST['req_type']) ? $_REQUEST['req_type'] : false;

switch($type)
{
	case "delete_gallery_image":
		$ajaxOut = _delete_gallery_image();
	break;
	
	case "delete_gallery":
		$ajaxOut = _delete_gallery();
	break;
	
	case "delete_partner":
		$ajaxOut = _delete_partner();
	break;
	
	case "delete_page":
		$ajaxOut = _delete_page();
	break;
	
	case "delete_logs":
		$ajaxOut = _clear_logs();
	break;
	
	case "delete_staff":
		$ajaxOut = _delete_staff();
	break;
	
	case "delete_builder":
		$ajaxOut = _delete_builder();
	break;
	
	case "delete_custom_listing":
		$ajaxOut = _delete_custom_listing();
	break;
	
	case "delete_partner":
		$ajaxOut = _delete_partner();
	break;
	
	case "remove_log_entry":
		$ajaxOut = _remove_log_entry();
	break;
	
	case "disable_gallery":
		$ajaxOut = _disable_gallery();
	break;
	
	case "disable_custom_listing":
		$ajaxOut = _disable_custom_listing();
	break;
	
	case "enable_custom_listing":
		$ajaxOut = _enable_custom_listing();
	break;
	
	case "mark_gallery_private":
		$ajaxOut = _mark_gallery_private();
	break;
	
	case "mark_gallery_public":
		$ajaxOut = _mark_gallery_public();
	break;
	
	case "enable_gallery":
		$ajaxOut = _enable_gallery();
	break;
	
	default:
	$ajaxOut = 'Invalid Request';
	break;
	
}
echo $ajaxOut;



/**
 * _delete_gallery_image function.
 * Removes an image from a gallery via the admin panel via ajax request
 * @access private
 * @return void
 */
function _delete_gallery_image()
{
	$filename = isset($_REQUEST['file_name']) ? $_REQUEST['file_name'] : false;
	$gallery_id = isset($_REQUEST['gallery_id']) ? (int)$_REQUEST['gallery_id'] : false;
	
	if($filename != false && $gallery_id != false)
	{
		if(unlink("/var/www/vhosts//httpdocs/images/galleries/$gallery_id/$filename"))
		{
			global $db;
			
			$sql = $dbpdo->prepare("DELETE FROM `gallery_images` WHERE `filename` = :file_name AND `gallery_id` = :gallery_id");
			
			$data = array(
			'file_name' => $filename,
			'gallery_id' => $gallery_id
			);
			$sql->execute($data);
			return "pass";
		}
		else
		{
			return false;
		}
	
	}
	else
	{
		return false;
	}
		
}



/**
 * _delete_gallery function.
 * Removes a gallery from the galleries table via ajax request
 * @access private
 * @return void
 */
function _delete_gallery()
{
	$gallery_id = isset($_REQUEST['gallery_id']) ? (int)$_REQUEST['gallery_id'] : false;
	
	if($gallery_id != false)
	{
		global $dbpdo;
		
		$sql = $dbpdo->prepare("DELETE FROM `galleries` WHERE `id` = :gallery_id");
		
		$data = array(
		'gallery_id' => (int)$gallery_id
		);
		
		if($sql->execute($data))
		{
			return "pass";
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
		
}



/**
 * _clear_logs function.
 * Clears the ip_logs table via ajax request
 * @access private
 * @return void
 */
function _clear_logs()
{
	global $dbpdo;
	
	$sql = $dbpdo->prepare("TRUNCATE `ip_logs`");
	
	if($sql->execute())
	{
		return "pass";
	}
	else
	{
		return false;
	}
	
	return false;
}



/**
 * _delete_page function.
 * Deletes a page from the pages table via ajax request
 * @access private
 * @return void
 */
function _delete_page()
{
	global $dbpdo;
	
	$sql = $dbpdo->prepare("DELETE FROM `pages` WHERE `id` = :page_id");
	
	$data = array(
	'page_id' => (int)$_REQUEST['page_id']
	);
	
	if($sql->execute($data))
	{
		logAction($_SESSION['USERID'], "Removed page id #" . $data['page_id']);
		return "pass";
	}
	else
	{
		return false;
	}


	return false;
}


/**
 * _delete_staff function.
 * Removes a staff member from the db
 * @access private
 * @return void
 */
function _delete_staff()
{
	global $dbpdo;
	
	$sql = $dbpdo->prepare("DELETE FROM `staff` WHERE `id` = :staff_id");
	
	$data = array(
	'staff_id' => (int)$_REQUEST['staff_id']
	);
	
	if($sql->execute($data))
	{
		return "pass";
	}
	else
	{
		return false;
	}

	return false;
}


/**
 * _delete_builder function.
 * Removes a builder from the db
 * @access private
 * @return void
 */
function _delete_builder()
{
	global $dbpdo;
	
	$sql = $dbpdo->prepare("DELETE FROM `local_builders` WHERE `id` = :builder_id");
	
	$data = array(
	'builder_id' => (int)$_REQUEST['builder_id']
	);
	
	if($sql->execute($data))
	{
		return "pass";
	}
	else
	{
		return false;
	}

	return false;
}


/**
 * _delete_custom_listing function.
 * Removes a custom listing from the custom_listings table via ajax request
 * @access private
 * @return void
 */
function _delete_custom_listing()
{
	global $dbpdo;
	
	$sql = $dbpdo->prepare("DELETE FROM `custom_listings` WHERE `id` = :custom_listing_id");
	
	$data = array(
	'custom_listing_id' => (int)$_REQUEST['custom_listing_id']
	);
	
	if($sql->execute($data))
	{
		return "pass";
	}
	else
	{
		return false;
	}
	
	return false;
}


/**
 * _delete_partner function.
 * Removes a partner from the partners table via ajax request
 * @access private
 * @return void
 */
function _delete_partner()
{
	global $db;
	
	$sql = $db->prepare("DELETE FROM `partners` WHERE `id` = :partner_id");
	
	$data = array(
	'partner_id' => (int)$_REQUEST['partner_id']
	);
	
	if($sql->execute($data))
	{
		return "pass";
	}
	else
	{
		return false;
	}
	
	return false;
}

/**
 * _remove_log_entry function.
 * Removes an entry from the ip_logs table by log_id via ajax request
 * @access private
 * @return void
 */
function _remove_log_entry()
{
	global $dbpdo;
	
	$sql = $dbpdo->prepare("DELETE FROM `ip_logs` WHERE `id` = :log_id");
	
	$data = array(
	'log_id' => (int)$_REQUEST['log_id']
	);
	
	if($sql->execute($data))
	{
		return "pass";
	}	
	else
	{
		return false;
	}
	
	return false;
}


/**
 * _disable_gallery function.
 * Disables a gallery by gallery_id via ajax request
 * @access private
 * @return void
 */
function _disable_gallery()
{
	global $dbpdo;
	
	$sql = $dbpdo->prepare("UPDATE `galleries` SET `status` = 2 WHERE `id` = :gallery_id");
	
	$data = array(
	':gallery_id' => (int)$_REQUEST['gallery_id']
	);
	
	if($sql->execute($data))
	{
		return "pass";
	}	
	else
	{
		return false;
	}
	
	return false;
}


/**
 * _enable_gallery function.
 * Enables a gallery by gallery_id via ajax request
 * @access private
 * @return void
 */
function _enable_gallery()
{
	global $dbpdo;
	
	$sql = $dbpdo->prepare("UPDATE `galleries` SET `status` = 1 WHERE `id` = :gallery_id");
	
	$data = array(
	'gallery_id' => (int)$_REQUEST['gallery_id']
	);
	
	if($sql->execute($data))
	{
		return "pass";
	}	
	else
	{
		return false;
	}
	
	return false;
}



/**
 * _mark_gallery_private function.
 * Marks a gallery private so only logged in users can view it
 * @access private
 * @return void
 */
function _mark_gallery_private()
{
	global $dbpdo;
	
	$sql = $dbpdo->prepare("UPDATE `galleries` SET `private` = 1 WHERE `id` = :gallery_id");
	
	$data = array(
	'gallery_id' => (int)$_REQUEST['gallery_id']
	);
	
	if($sql->execute($data))
	{
		return "pass";
	}	
	else
	{
		return false;
	}
	
	return false;
}


/**
 * _mark_gallery_public function.
 * Marks a gallery public so anyone can view it
 * @access private
 * @return void
 */
function _mark_gallery_public()
{
	global $dbpdo;
	
	$sql = $dbpdo->prepare("UPDATE `galleries` SET `private` = 0 WHERE `id` = :gallery_id");
	
	$data = array(
	'gallery_id' => (int)$_REQUEST['gallery_id']
	);
	
	if($sql->execute($data))
	{
		return "pass";
	}	
	else
	{
		return false;
	}
	
	return false;
}


/**
 * _enable_custom_listing function.
 * Enables a custom listing via ajax request
 * @access private
 * @return void
 */
function _enable_custom_listing()
{
	global $dbpdo;
	
	$sql = $dbpdo->prepare("UPDATE `custom_listings` SET `active` = 1 WHERE `id` = :custom_listing_id");
	
	$data = array(
	'custom_listing_id' => (int)$_REQUEST['custom_listing_id']
	);
	
	if($sql->execute($data))
	{
		return "pass";
	}	
	else
	{
		return false;
	}
	
	return false;
}


/**
 * _disable_custom_listing function.
 * Disables a custom listing via ajax request
 * @access private
 * @return void
 */
function _disable_custom_listing()
{
	global $dbpdo;
	
	$sql = $dbpdo->prepare("UPDATE `custom_listings` SET `active` = 2 WHERE `id` = :custom_listing_id");
	
	$data = array(
	'custom_listing_id' => (int)$_REQUEST['custom_listing_id']
	);
	
	if($sql->execute($data))
	{
		return "pass";
	}	
	else
	{
		return false;
	}
	
	return false;
}