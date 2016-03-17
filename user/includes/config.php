<?php
date_default_timezone_set("America/New_York");
/* This file holds the site config */
$debug = true; //set to true for error reporting, false to disable (live)

/*
*****************
*ERROR REPORTING*
*****************
*/
if($debug == true)
{
	error_reporting(E_ALL);
	
	if (!ini_get('display_errors')) {
	    ini_set('display_errors', '1');
	}
}

/*
*****************
*DATABASE CONFIG*
****************
*/
  
   
$dbhost = "localhost";
$dbname = "admin_lvluxe";
$dbuser = "admin_lvluxe";            
$dbpass = "CQTXTvwB6O";

try
{
  /* Try to connect to the DB */
  $dbpdo = new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbuser", "$dbpass", array(
      PDO::ATTR_PERSISTENT => true
  ));
}
catch(PDOException $e)
{
  /* if there is an error connecting echo the error */
  echo 'ERROR: ' . $e->getMessage();
}

$sql = $dbpdo->prepare("SELECT * FROM `settings` WHERE `id` = :panel_id LIMIT 1");

$data = array(
	'panel_id' => 1
);

$sql->execute($data);

$arr = $sql->errorInfo();

if($arr[0] != "00000")
{
	echo "ERROR: {$arr[2]}";
}