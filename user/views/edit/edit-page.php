<?
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
//show existing pages table
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM pages WHERE id = '$id'";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=pages">Pages</a> <span class="divider">/</span></li>
    <li class="active">Edit Page</li>
  </ul>
  <div class="well well-small">
    <h1>Edit Page</h1>
    <legend></legend>
    <? switch($status)
	{
		case "updated":
		?>
    <p class="alert alert-success">Page updated successfully!</p>
    <?
        break;
		
		case "deleted":
		?>
    <p class="alert alert-success">Page removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Page disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Page enabled successfully!</p>
    <?
        break;
	}
	
	if($num_rows <> 0)
	{
		$count = 1;
		?>
    <? 
    while($row = mysql_fetch_array($result)):
    extract($row);
    //loop through the pages table
    switch($active)
		{
			case 1:
			$active = "Enabled";
			break;
			
			case 2:
			$active = "Disabled";
			break;
		}
		?>
    <p>Editing page:
      <?=$page_name;?>
    </p>

    <form action="<?=$_SERVER['PHP_SELF'];?>?type=page&id=<?=$id;?>" method="post" name="edit-page-form">
      <input type="hidden" name="post_action" value="update_page">
      <input type="hidden" name="id" value="<?=$id;?>">
      <select name="active">
        <?=showOptionsDrop($active_arr, $active);?>
      </select>
      <label>Page Name</label>
      <input type="text" name="page_name" value="<?=$page_name;?>">
      <label>Page Title</label>
      <input type="text" name="page_title" value="<?=$page_title;?>">
      <label>Meta Description</label>
      <input type="text" name="page_description" value="<?=$page_description;?>">
      <label>Meta Keywords</label>
      <input type="text" name="page_keywords" value="<?=$page_keywords;?>">
      <label>Page Content</label>
      <textarea name="page_text" style="height:400px;"><?=$page_text;?>
</textarea>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Page</button>
        <a href="<?=$panel_url;?>/view.php?type=pages" class="btn btn-inverse">Cancel</a> </div>
    </form>
    <? $count++; ?>
    <? endwhile;?>
    <? }
	else {
		//else table is empty
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no pages in the database.</p>
    <p><a href="add.php?type=users" class="btn btn-success">Add User &raquo;</a></p>
    <? } ?>
  </div>
</div>
<?
	mysql_close($con);