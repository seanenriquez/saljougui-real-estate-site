<div class="span9">
<ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=pages">Pages</a><span class="divider">/</span></li>
    <li class="active">Add Page</li>
  </ul>
  <div class="well well-small">

    <h1>Add Page</h1>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=page';?>" method="post" id="edit-user-form">
    <input type="hidden" name="post_action" value="add_page">
     <legend><? if($update_status)
	{
		switch($update_status)
		{
			case "added":
			?>
            <p class="alert alert-success">Page added successfully!</p>
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
    <label>Status</label>
    <select name="active">
    <option value="1" selected>Enabled</option>
    <option value="2">Disabled</option>
    </select>
      <label>Page Name</label>
      <input type="text" name="page_name" placeholder="My Page">
      <label>Page Title</label>
      <input type="text" name="page_title" placeholder="My Page Title">
      <label>Meta Description</label>
      <input type="text" name="page_description" placeholder="My Page Description">
      <label>Meta Keywords</label>
      <input type="text" name="page_keywords" placeholder="Keywords">
      <label>Page Text</label>
      <textarea name="page_text"></textarea>
      <legend></legend>
      <button type="submit" class="btn btn-success">Add Page</button>
      <a href="<?=$panel_url;?>/view.php?type=pages" class="btn btn-inverse">Cancel</a>
    </form>

  </div>
</div>