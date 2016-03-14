<div class="span9">
<ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=news">News Posts</a><span class="divider">/</span></li>
    <li class="active">Add News Post</li>
  </ul>
  <div class="well well-small">
    <h1>Add News Post</h1>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=news';?>" method="post" id="add-newspost-form">
    <input type="hidden" name="post_action" value="add_news_post">
     <legend><? if($update_status)
	{
		switch($update_status)
		{
			case "added":
			?>
            <p class="alert alert-success">News Post added successfully!</p>
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
	?></legend>
      <label>Title</label>
      <input name="title" id="title" type="text" class="input-xxlarge">
      <label>Short Description</label>
      <input name="short_description" type="text" class="input-xxlarge" />
      <label>Keywords</label>
      <input name="keywords" type="text" class="input-xxlarge" />
      <label>Category</label>
      <select name="category_id">
      	<?php
			$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
			mysql_select_db($dbname, $con) or die(mysql_error());
			$sql = "SELECT * FROM news_category";
			$result = mysql_query($sql) or die(mysql_error());
		?>
      	<option value="0">(Select Category)</option>
        <?php
			while($category = mysql_fetch_assoc($result)){
				echo '<option value="'.$category['id'].'">'.$category['category'].'</option>';
			}
		?>
      </select>
      <label>YouTube ID</label>
      <input name="youtube_id" type="text" />
      <label>Source Link</label>
      <input name="source_link" type="text" />
      <label>Content</label>
      <textarea name="content" style="height:400px;"></textarea>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Post</button>
        <a href="<?=$panel_url;?>/view.php?type=news" class="btn btn-inverse">Cancel</a> </div>
    </form>

  </div>
</div>