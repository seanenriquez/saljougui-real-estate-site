<?
//Global Panel Settings
include('includes/panel-settings.php');
include('includes/config.php');

extract($_POST);

$sql = $db->prepare("UPDATE `partners` SET `partner_image` = :file_name WHERE `id` = :partner_id");

$data = array(
'file_name' => $filename,
'partner_id' => (int)$partner_id
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