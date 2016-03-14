<div class="span9">
<ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=faq_category">FAQ Categories</a><span class="divider">/</span></li>
    <li class="active">Add FAQ Category</li>
  </ul>
  <div class="well well-small">
    <h1>Add FAQ Category</h1>
<!-- Load jQuery -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=faq_category';?>" method="post" id="add-faq-category-form">
    <input type="hidden" name="post_action" value="add_faq_category">
     <legend><? if($update_status)
	{
		switch($update_status)
		{
			case "added":
			?>
            <p class="alert alert-success">FAQ Category added successfully!</p>
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
      <label>Category</label>
      <input name="category" id="category" type="text" class="input-xxlarge">
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Category</button>
        <a href="<?=$panel_url;?>/view.php?type=faq_category" class="btn btn-inverse">Cancel</a> </div>
    </form>

  </div>
</div>