<?
//Global Panel Settings
include('includes/panel-settings.php');
//get user id
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
//Page Setup
$title = "Delete User: $id";
$page_name = "delete-user";
//check for $_POST data
$update_status = 0;
$action = isset($_GET['action']) ? $_GET['action'] : NULL;
if($action && $id)
{
	switch($action)
	{
		case "admin":
		//update user info in users table
		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "UPDATE `users` SET `user_type` = '1' WHERE `id` = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		if($result)
		{
			$update_status = "updated";
			header("Location: view.php?type=users");
		}
		else
		{
			$update_status = "error";
		}
		
		break;
		
		case "disable":
		//update user info in users table
		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "UPDATE users SET `status` = 2 WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		if($result)
		{
			$update_status = "deleted";
			header("Location: view.php?type=users&status=disabled");
		}
		else
		{
			$update_status = "error";
		}
		
		break;
		
		case "enable":
		//update user info in users table
		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "UPDATE users SET `status` = 1 WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		if($result)
		{
			$update_status = "deleted";
			header("Location: view.php?type=users&status=enabled");
		}
		else
		{
			$update_status = "error";
		}
		
		break;
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