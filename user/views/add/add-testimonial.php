<div class="span9">
<ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=testimonials">Testimonials</a><span class="divider">/</span></li>
    <li class="active">Add Testimonial</li>
  </ul>
  <div class="well well-small">

    <h1>Add Testimonial</h1>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=testimonials';?>" method="post" id="add-testimonial-form">
    <input type="hidden" name="post_action" value="add_testimonial">
     <legend><? if($update_status)
	{
		switch($update_status)
		{
			case "added":
			?>
            <p class="alert alert-success">Testimonial added successfully!</p>
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
      <label>Client Name</label>
      <input name="client_name" id="client_name" type="text" class="input-xxlarge">
      <label>Comments</label>
      <textarea name="comments" style="height:400px;"></textarea>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Testimonial</button>
        <a href="<?=$panel_url;?>/view.php?type=testimonials" class="btn btn-inverse">Cancel</a> </div>
    </form>

  </div>
</div>