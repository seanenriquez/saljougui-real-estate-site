<?php

include("utils.php");

$city = fixDashes($_POST['area']);

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die(mysql_error());

$sql = "SELECT subdivision_area_name as county FROM community_area_information WHERE city = '{$city}' ORDER BY subdivision_area_name ASC";
$sql_r = mysqli_query($con,$sql);

$counties = array();
while($row = mysqli_fetch_array($sql_r)){
	$communities[] = $row;
}

echo json_encode($communities);