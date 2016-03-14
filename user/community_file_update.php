<?
//Global Panel Settings
include('includes/panel-settings.php');

$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());

mysql_select_db($dbname, $con) or die(mysql_error());

extract($_POST);

//$file_name = mysql_real_escape_string($file_name);
$subdivision_area_id = mysql_real_escape_string($subdivision_area_id);
$file_type = mysql_real_escape_string($file_type);


$sql = "INSERT INTO `community_area_files` SET `file_name` = '$file_name', `subdivision_area_id` = '$subdivision_area_id', `file_type` = '$file_type'";

$result = mysql_query($sql) or die(mysql_error());

if($result){
	echo '1';
} else {
	echo '0';
}