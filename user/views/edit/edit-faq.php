<?
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
//show existing pages table
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM faqs WHERE id = '$id'";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=faq">FAQS</a> <span class="divider">/</span></li>
    <li class="active">Edit FAQ</li>
  </ul>
  <div class="well well-small">
    <h1>Edit FAQ</h1>
    <legend></legend>
    <? switch($status)
	{
		case "updated":
		?>
    <p class="alert alert-success">FAQ updated successfully!</p>
    <?
        break;
		
		case "deleted":
		?>
    <p class="alert alert-success">FAQ removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">FAQ disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">FAQ enabled successfully!</p>
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
    $question = stripslashes($question);
    $answer = stripslashes($answer);
    //loop through the FAQS table
		?>
    <form action="<?=$_SERVER['PHP_SELF'];?>?type=faq&id=<?=$id;?>" method="post" name="edit-faq-form">
      <input type="hidden" name="post_action" value="update_faq">
      <input type="hidden" name="id" value="<?=$id;?>">
      <label>Question</label>
      <input name="question" id="question" type="text" class="input-xxlarge" value="<?=strip_tags($question);?>">
      <label>Category</label>
      <select name="category_id">
        <?php
			$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
			mysql_select_db($dbname, $con) or die(mysql_error());
			$sql = "SELECT * FROM faq_category";
			$result = mysql_query($sql) or die(mysql_error());
		?>
        <option value="0">(Select Category)</option>
        <?php while($category_item = mysql_fetch_assoc($result)):?>
        <option value="<?php echo $category_item['id'];?>" <?php echo ($category_item['id'] == $category_id)? 'selected="selected"' : '';?>><?php echo $category_item['category'];?></option>
        ;
		
        <?php endwhile;?>
      </select>
      <label>Answer</label>
      <textarea name="answer" style="height:400px;"><?=$answer;?>
</textarea>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save FAQ</button>
        <a href="<?=$panel_url;?>/view.php?type=faq" class="btn btn-inverse">Cancel</a> </div>
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