<?
	//Global Panel Settings
	include('includes/panel-settings.php');
	$user_id = $_SESSION['USERID'];
	$user_ip = $_SERVER['REMOTE_ADDR'];
	$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
	mysql_select_db($dbname, $con) or die(mysql_error());
	$sql = "INSERT INTO ip_logs SET action = 'Logged Out', user_id = '$user_id', ip_address = '$user_ip'";
	$result = mysql_query($sql) or die(mysql_error());
	session_destroy();
	header("Location: index.php");
?>
