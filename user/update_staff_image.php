<?php
//Global Panel Settings
include('includes/panel-settings.php');
include('includes/config.php');

extract($_POST);

$sql = $dbpdo->prepare("UPDATE `staff` SET `profile_pic` = :file_name WHERE `id` = :staff_id");

$data = array(
'file_name' => $file_name,
'staff_id' => (int)$staff_id
);

$sql->execute($data);

$num_rows = $sql->rowCount();

if($num_rows > 0)
{
	echo '1';
}
else
{
	echo '0';
}