<?
//Global Panel Settings
include('includes/panel-settings.php');
//get user id
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
$filename = isset($_GET['file_name']) ? $_GET['file_name'] : NULL;
$subdivision_id = isset($_GET['subdivision_id']) ? $_GET['subdivision_id'] : NULL;
$cities_id = isset($_GET['cities_id']) ? $_GET['cities_id'] : NULL;

//Page Setup
$title = "Delete Image: $id";
$page_name = "delete-image";
//check for $_POST data
$update_status = 0;
$action = isset($_GET['action']) ? $_GET['action'] : NULL;
if($action && $id)
{
	switch($action)
	{
		case "delete":
		//delete image
      if ($subdivision_id!=NULL) {
		    $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		    mysql_select_db($dbname, $con) or die(mysql_error());
		    $sql = "DELETE FROM `community_area_files` WHERE `id` = '$id'";
		    $result = mysql_query($sql) or die(mysql_error());
		    if($result)
		    {
			    unlink($_SERVER['DOCUMENT_ROOT'].'/files/subdivisions_areas/images/'.$filename);
			    $update_status = "deleted_image";
			    header("Location: edit.php?type=community&id=$subdivision_id&status=$update_status");
		    }
		    else
		    {
			    $update_status = "error";
		    }
		    
      }
      if ($cities_id!=NULL) {
        $con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
        mysql_select_db($dbname, $con) or die(mysql_error());
        $sql = "DELETE FROM `cities_files` WHERE `id` = '$id'";
        $result = mysql_query($sql) or die(mysql_error());
        if($result)
        {
          unlink($_SERVER['DOCUMENT_ROOT'].'/files/cities/images/'.$filename);
          $update_status = "deleted_image";
          header("Location: edit.php?type=city&id=$cities_id&status=$update_status");
        }
        else
        {
          $update_status = "error";
        }
        
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
