<? 
//Global Panel Settings
include('includes/panel-settings.php');

//prevent non-administrative users from accessing this page
include('includes/secure.php');

//Page Setup
$title = "Panel Settings";
$page_name = "settings";
//check for $_POST data
$update_status = 0;
$id = 1;
$action = isset($_POST['post_action']) ? $_POST['post_action'] : NULL;

if($action)
{
	switch($action)
	{
		case "update_settings":
		//update panel settings
		extract($_POST);
		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "UPDATE settings SET panel_name = '$panel_name', assets = '$assets', base_url = '$base_url', panel_url = '$panel_url', support_url = '$support_url', client_name = '$client_name'  WHERE id = '$id'";
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
		$sql = "SELECT * FROM settings WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$num_rows = mysql_num_rows($result);
        ?>
    <!--/span-->
    <div class="span9">
      <ul class="breadcrumb">
        <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
        <li class="active">
          <?=$panel_name;?>
          Settings</li>
      </ul>
      <div class="well well-small">
        <? if($num_rows <> 0)
		{
		while($row = mysql_fetch_array($result)):
		
        extract($row);
		?>
        <h1>Edit Settings -
          <?=$panel_name;?>
        </h1>
        <? if($update_status)
		{
			switch($update_status)
			{
				case "updated":
				?>
        <p class="alert alert-success">Settings updated successfully!</p>
        <?
				break;
				
				case "error":
				?>
        <p class="alert alert-danger">There was an error updating settings for this panel. Please try again.</p>
        <?
				break;
				
				default:
				//should not be here
				break;
			}
		}
		?>
        
        <form action="" method="post" id="edit-user-form" class="form-horizontal">
        <legend>Panel</legend>
          <input type="hidden" name="post_action" value="update_settings">
          <input type="hidden" name="id" value="<?=$id;?>">
          <div class="control-group">
            <label class="control-label" for="panel_name">Panel Name</label>
            <div class="controls">
              <input type="text" name="panel_name" id="panel_name" value="<?=$panel_name;?>">
            </div>
          </div>
          <div class="control-group">
          <label class="control-label" for="assets">Panel Assets Folder</label>
          <div class="controls">
          <input type="text" name="assets" id="assets" value="<?=$assets;?>">
          </div>
          </div>
          <legend>URL's</legend>
          <div class="control-group">
            <label class="control-label" for="base_url">Base URL</label>
            <div class="controls">
              <input class="input-xlarge" type="text" name="base_url" id="base_url" value="<?=$base_url;?>">
            </div>
          </div>
          <div class="control-group">
          <label class="control-label" for="panel_url">Panel URL</label>
          <div class="controls">
          <input class="input-xlarge" type="text" name="panel_url" id="panel_url" value="<?=$panel_url;?>">
          </div>
          </div>
          <div class="control-group">
          <label class="control-label" for="support_url">Support URL</label>
          <div class="controls">
          <input class="input-xlarge" type="text" name="support_url" id="support_url" value="<?=$support_url;?>">
          </div>
          </div>
          <legend>Client</legend>
          <div class="control-group">
            <label class="control-label" for="client_name">Client Name</label>
            <div class="controls">
              <input type="text" name="client_name" id="client_name" value="<?=$client_name;?>"><span class="help-block">*Used in page title</span>
            </div>
          </div>
          <!--<span class="help-block">Example block-level help text here.</span>-->
          <legend></legend>
          <button type="submit" class="btn btn-success">Save</button>
          <a href="index.php" class="btn btn-inverse">Cancel</a>
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