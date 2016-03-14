<?
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
//show existing pages table
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM `blogs` WHERE `id` = '$id'";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=blog">Blog Posts</a> <span class="divider">/</span></li>
    <li class="active">Edit Blog Post</li>
  </ul>
  <div class="well well-small">
    <h1>Edit Blog Post</h1>
    <legend></legend>
    <? switch($status)
	{
		case "updated":
		?>
    <p class="alert alert-success">Blog Post updated successfully!</p>
    <?
        break;
		
		case "deleted":
		?>
    <p class="alert alert-success">Blog Post removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Blog Post disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Blog Post enabled successfully!</p>
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
    $content = stripslashes($content);
    //loop through the FAQS table
		?>
    
        <form action="<?=$_SERVER['PHP_SELF'];?>?type=blog&id=<?=$id;?>" method="post" name="edit-blog-form">
      <input type="hidden" name="post_action" value="update_blog_post">
      <input type="hidden" name="id" value="<?=$id;?>">
      <label>Title</label>
      <input name="title" id="title" type="text" class="input-xxlarge" value="<?=strip_tags($title);?>">
      <label>Short Description</label>
      <input name="short_description" type="text" class="input-xxlarge" value="<?=$short_description;?>" />
      <label>Keywords</label>
      <input name="keywords" type="text" class="input-xxlarge" value="<?=$keywords;?>" />
      <label>Category</label>
      <select name="category_id">
        <?php
			$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
			mysql_select_db($dbname, $con) or die(mysql_error());
			$sql = "SELECT * FROM blog_category";
			$result = mysql_query($sql) or die(mysql_error());
		?>
        <option value="0">(Select Category)</option>
        <?php while($category_item = mysql_fetch_assoc($result)):?>
        <option value="<?php echo $category_item['id'];?>" <?php echo ($category_item['id'] == $category_id)? 'selected="selected"' : '';?>><?php echo $category_item['category'];?></option>
        ;
		
        <?php endwhile;?>
      </select>
      <label>YouTube ID</label>
      <input name="youtube_id" type="text" value="<?=$youtube_id;?>" />
      <label>Source Link</label>
      <input name="source_link" type="text" value="<?=$source_link;?>" />
      <label>Content</label>
      <textarea name="content" id="content" style="height:400px;"><?=$content;?>
</textarea>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Post</button>
        <a href="<?=$panel_url;?>/view.php?type=blog" class="btn btn-inverse">Cancel</a> </div>
    </form>
    <? $count++; ?>
    <? endwhile;?>
    <? }
	else {
		//else table is empty
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no blog posts in the database.</p>
    <p><a href="add.php?type=users" class="btn btn-success">Add User &raquo;</a></p>
    <? } ?>
  </div>
</div>
<?
	mysql_close($con);