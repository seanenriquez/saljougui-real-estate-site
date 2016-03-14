<?
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
//show existing pages table
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM faq_category WHERE id = '$id'";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=faq_category">FAQ Categories</a> <span class="divider">/</span></li>
    <li class="active">Edit FAQ Category</li>
  </ul>
  <div class="well well-small">
    <h1>Edit FAQ Category</h1>
    <legend></legend>
    <? switch($status)
	{
		case "updated":
		?>
    <p class="alert alert-success">Category updated successfully!</p>
    <?
        break;
		
		case "deleted":
		?>
    <p class="alert alert-success">Category removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Category disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Category enabled successfully!</p>
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
	?>
    <form action="<?=$_SERVER['PHP_SELF'];?>?type=faq_category&id=<?=$id;?>" method="post" name="edit-faq_category-form">
      <input type="hidden" name="post_action" value="update_faq_category">
      <input type="hidden" name="id" value="<?=$id;?>">
      <label>Category</label>
      <input name="category" id="category" type="text" class="input-xxlarge" value="<?=strip_tags($category);?>">
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save FAQ Category</button>
        <a href="<?=$panel_url;?>/view.php?type=faq_category" class="btn btn-inverse">Cancel</a> </div>
    </form>
    <? $count++; ?>
    <? endwhile;?>
    <? }
	else {
		//else table is empty
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no FAQ categories in the database.</p>
    <p><a href="add.php?type=faq_category" class="btn btn-success">Add FAQ Category &raquo;</a></p>
    <? } ?>
  </div>
</div>
<?
	mysql_close($con);