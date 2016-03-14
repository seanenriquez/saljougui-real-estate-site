<?php
//Start the session
session_start();
date_default_timezone_set("America/New_York");
error_reporting(E_ALL ^ E_DEPRECATED);

if (!defined('BASE_DIR')) {
  define('BASE_DIR', $_SERVER['DOCUMENT_ROOT']);
}

$root_base_dir =  BASE_DIR;


define('ROOT_BASE_DIR', $root_base_dir);

   
$dbhost = "localhost";
$dbname = "admin_lvluxe";
$dbuser = "admin_lvluxe";            
$dbpass = "CQTXTvwB6O";

if ($root_base_dir[0] == "C") {
   
  $dbhost = "localhost";
  $dbname = "shattow";
  $dbuser = "root";            
  $dbpass = "";  
}



//Panel settings (client-by-client basis)
$panel_id = 1; //change for additonal panels
//grab panel settings from database

$con = mysql_connect($dbhost,$dbuser,$dbpass,$dbname) or die(mysql_error());
mysql_select_db($dbname, $con);

$sql = "SELECT * FROM settings WHERE id = '$panel_id'";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);
if($num_rows < 1 )
{
  header("Location: build.php");
}
else
{
  while($row = mysql_fetch_array($result))  {
	  //setup panel vars
	  $panel_name = $row['panel_name'];
	  $assets = $row['assets'];
	  $base_url = $row['base_url'];
	  $client_name = $row['client_name'];
	  $panel_url = $row['panel_url'];
	  $support_url = $row['support_url'];
  }
}

//Escapce the strings before putting them into the database.
function escapevars($var)
{
	 $var = str_replace(array("\xe2\x80\x98", "\xe2\x80\x99", "\xe2\x80\x9c", "\xe2\x80\x9d", "\xe2\x80\x93", "\xe2\x80\x94", "\xe2\x80\xa6"),array("'", "'", '"', '"', '-', '--', '...'),$var);
	 $var = str_replace(array(chr(145), chr(146), chr(147), chr(148), chr(150), chr(151), chr(133)),array("'", "'", '"', '"', '-', '--', '...'),$var);
	 //$var = strip_tags($var);
	 //$var = htmlentities($var);
	 $var = utf8_encode($var);
	 #$var = real_escape_string($var);
   return $var;
}

function showPage($name)
{
  $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
  mysql_select_db($dbname, $con) or die(mysql_error());
  $sql = "SELECT * FROM pages WHERE `page_name` = '$name'";
  $result = mysql_query($sql) or die(mysql_error());
  $num_rows = mysql_num_rows($result);

if($num_rows > 0)
{
	while($row = mysql_fetch_array($result))
	{
		if($row['active'] == 2)
		{
			header("Location: down.php");
		}
	echo $row['page_text'];
	}
}

}

function getUserById($user_id)
{
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysql_query($sql) or die(mysql_error());

if($result)
{
	$row = mysql_fetch_array($result);	
	return $row['first_name'] . ' ' . $row['last_name'];				
}

else
{
	return false;
}
}


function logAction($user_id, $action)
{
$user_ip = $_SERVER['REMOTE_ADDR'];
$sql = "INSERT INTO ip_logs SET `action` = '$action', `user_id` = '$user_id', `ip_address` = '$user_ip'";
$result = mysql_query($sql) or die(mysql_error());

if($result)
{
	return true;				
}

else
{
	return false;
}

}

function read_folder_directory($dir = "root_dir/dir") 
{ 
  $listDir = array(); 
  if($handler = opendir($dir)) { 
      while (($sub = readdir($handler)) !== FALSE) { 
          if ($sub != "." && $sub != ".." && $sub != "Thumb.db" && $sub != "Thumbs.db") { 
              if(is_file($dir."/".$sub)) { 
                  $listDir[] = $sub; 
              }elseif(is_dir($dir."/".$sub)){ 
                  $listDir[$sub] = read_folder_directory($dir."/".$sub); 
              } 
          } 
      } 
      closedir($handler); 
  } 
  return $listDir; 
} 

function bytes($a)
{
$unim = array("B","KB","MB","GB","TB","PB");
$c = 1;
while ($a>=1024)
{
$c++;
$a = $a/1024;
}
return number_format($a,($c ? 2 : 0),".",".")." ".$unim[$c];
}
?>