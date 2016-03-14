<?
//Global Panel Settings
include('includes/panel-settings.php');
//get user id
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
//Page Setup
$title = "EDIT FILE";
$page_name = "edit-file";
//check for $_POST data
$update_status = 0;
$action = isset($_POST['post_action']) ? $_POST['post_action'] : NULL;

if($action && $id)
{
	switch($action)
	{
		case "update_file":
		//update user info in users table
		extract($_POST);
		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "UPDATE uploads SET file_name = '$file_name', file_date = '$file_date', description = '$description' WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		if($result)
		{
			$update_status = "updated";
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

		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "SELECT * FROM uploads WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$num_rows = mysql_num_rows($result);
		?>
    <!--/span-->
    <div class="span9">
      <ul class="breadcrumb">
        <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
        <li><a href="<?=$panel_url;?>/view.php?type=files">Files</a> <span class="divider">/</span></li>
        <li class="active">Edit File</li>
      </ul>
      <div class="well well-small">
        <? if($num_rows <> 0)
		{
			?>
        <? while($row = mysql_fetch_array($result)):?>
        <? extract($row);?>
        <? //loop through the user table ?>
        <h1>Edit File</h1>
        <? if($update_status)
		{
			switch($update_status)
			{
				case "updated":
				?>
                <p class="alert alert-success">File updated successfully!</p>
                <?
				break;
				
				case "error":
				?>
                <p class="alert alert-danger">There was an error updating the database. Please try again.</p>
                <?
				break;
				
				default:
				//should not be here
				break;
			}
		}
		?>
        <form action="" method="post" id="edit-file-form">
        <input type="hidden" name="post_action" value="update_file">
          <input type="hidden" name="id" value="<?=$id;?>">
          <!--<legend>Legend</legend>-->
          <label>Filename</label>
          <input type="text" name="file_name" value="<?=$file_name;?>">
          <label>File Date</label>
          <input type="text" name="file_date" value="<?=$file_date;?>">
          <!--<span class="help-block">Example block-level help text here.</span>-->
          <label>Description</label>
          <textarea rows="5" cols="10" name="description"><?=$description;?></textarea>
          
          <legend></legend>
          <button type="submit" class="btn btn-success">Save</button>
          <a href="view.php?type=files" class="btn btn-inverse">Cancel</a>
          <a href="view.php?type=files&action=delete&filename=<?=$file_name;?>" class="btn btn-danger pull-right">Delete</a>
        </form>
        <? endwhile;?>
        <? }
?>
      </div>
      <!--/row--><!--/row--> 
    </div>
    <!--/span-->
    <?
		mysql_close($con);
		?>
  </div>
  <!--/row-->
  
  <hr>
  <? include('includes/footer.php');?>
</div>
<!--/.fluid-container-->
<? include('includes/bottom-scripts.php');?>
</body>
</html>
