<?
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
//show existing pages table


$sql = $dbpdo->prepare("SELECT * FROM `blog_category` WHERE `id` = :blog_category_id");
$data = array(
'blog_category_id' => $id
);
$sql->execute($data);
$num_rows = $sql->rowCount();
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=blog_category">Blog Category</a> <span class="divider">/</span></li>
    <li class="active">Edit Blog Category</li>
  </ul>
  <div class="well well-small">
    <h1>Edit Blog Category</h1>
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
    while($row = $sql->fetch())
    {
    extract($row);
	?>
	<form action="<?=$_SERVER['PHP_SELF'];?>?type=blog_category&id=<?=$id;?>" method="post" name="edit-blog_category-form">
      <input type="hidden" name="post_action" value="update_blog_category">
      <input type="hidden" name="id" value="<?=$id;?>">
      <label>Category</label>
      <input name="category" id="category" type="text" class="input-xxlarge" value="<?=strip_tags($category);?>">
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Blog Category</button>
        <a href="<?=$panel_url;?>/view.php?type=blog_category" class="btn btn-inverse">Cancel</a> </div>
    </form>
    <?
    $count++;
    }
    }
	else {
		//else table is empty
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no blog categories in the database.</p>
    <p><a href="add.php?type=blog_category" class="btn btn-success">Add Blog Category &raquo;</a></p>
    <? } ?>
  </div>
</div>