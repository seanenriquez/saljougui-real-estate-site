<?
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM testimonials WHERE id = '$id'";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=testimonials">Testimonials</a> <span class="divider">/</span></li>
    <li class="active">Edit Testimonials</li>
  </ul>
  <div class="well well-small">
    <h1>Edit Testimonials</h1>
    <legend></legend>
    <? switch($status)
	{
		case "updated":
		?>
    <p class="alert alert-success">Testimonial updated successfully!</p>
    <?
        break;
		
		case "deleted":
		?>
    <p class="alert alert-success">Testimonial removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Testimonial disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Testimonial enabled successfully!</p>
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
    $title = stripslashes($title);
    $comments = stripslashes($comments);
    //loop through the Testimonials table
		?>
    <form action="<?=$_SERVER['PHP_SELF'];?>?type=testimonials&id=<?=$id;?>" method="post" name="edit-testimonials-form">
      <input type="hidden" name="post_action" value="update_testimonial">
      <input type="hidden" name="id" value="<?=$id;?>">
      <label>Client Name</label>
      <input name="client_name" id="client_name" type="text" class="input-xxlarge" value="<?=strip_tags($client_name);?>">
      <label>Comments</label>
      <textarea name="comments" id="comments" style="height:400px;"><?=$comments;?>
</textarea>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Testimonial</button>
        <a href="<?=$panel_url;?>/view.php?type=testimonials" class="btn btn-inverse">Cancel</a> </div>
    </form>
    <? $count++; ?>
    <? endwhile;?>
    <? }
	else {
		//else table is empty
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no testimonials in the database.</p>
    <p><a href="add.php?type=testimonials" class="btn btn-success">Add Testimonial &raquo;</a></p>
    <? } ?>
  </div>
</div>
<?
	mysql_close($con);