<?
//Global Panel Settings
include('includes/panel-settings.php');
//get user id
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
//Page Setup
$title = "Delete City: $id";
$page_name = "delete-city";
//check for $_POST data
$update_status = 0;
$action = isset($_GET['action']) ? $_GET['action'] : NULL;
if($action && $id)
{
	switch($action)
	{
		case "delete":
		//delete subdivision
		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "DELETE FROM `city_information` WHERE `id` = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		if($result)
		{
			$update_status = "deleted";
			header("Location: view.php?type=city&status=deleted");
		}
		else
		{
			$update_status = "error";
		}
		
		break;
		
		case "disable":
		//disable subdivision
		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "UPDATE city_information SET `active` = 0 WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		if($result)
		{
			$update_status = "disabled";
			header("Location: view.php?type=city&status=disabled");
		}
		else
		{
			$update_status = "error";
		}
		
		break;
		
		case "enable":
		//enable subdivision
		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "UPDATE city_information SET `active` = 1 WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		if($result)
		{
			$update_status = "enabled";
			header("Location: view.php?type=city&status=enabled");
		}
		else
		{
			$update_status = "error";
		}		
	}
}
include('includes/header.php');
?>

<body>
<? include('includes/top-nav.php');?>
<div class="container-fluid">
  <div class="row-fluid">
    <? //include the navigation sidebar
			include('includes/sidebar.php');

		?>

  </div>
  
  <hr>
  <? include('includes/footer.php');?>
</div>
<? include('includes/bottom-scripts.php');?>
</body>
</html>
