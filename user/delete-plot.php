<?
//Global Panel Settings
include('includes/panel-settings.php');
//get user id
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
//Page Setup
$title = "Delete Plot: $id";
$page_name = "delete-plot";
//check for $_POST data
$update_status = 0;
$action = isset($_GET['action']) ? $_GET['action'] : NULL;
$chart_id = isset($_GET['chart_id']) ? (int)$_GET['chart_id'] : null;
if($action && $id)
{
	switch($action)
	{
		case "delete":
		//update faq info in faqs table
		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "DELETE FROM `chart_data` WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		if($result)
		{
			$update_status = "deleted";
			header("Location: view.php?type=chart_data&id=$chart_id&status=deleted");
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
