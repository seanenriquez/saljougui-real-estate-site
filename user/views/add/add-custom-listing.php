<div class="span9">
<ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=custom_listings">Custom Listings</a><span class="divider">/</span></li>
    <li class="active">Add Custom Listing</li>
  </ul>
  <div class="well well-small">

    <h1>Add Custom Listing</h1>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=custom_listing';?>" method="post" id="add-custom-listing-form">
    <input type="hidden" name="post_action" value="add_custom_listing">
     <legend><?php if($update_status)
	{
		switch($update_status)
		{
			case "added":
			?>
            <p class="alert alert-success">Custom Listing added successfully!</p>
            <?php
			break;
			
			case "error":
			?>
            <p class="alert alert-danger">There was an error updating the database. Please try again.</p>
            <?php
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
      <label>MLS #</label>
      <input type="text" name="listing_id" placeholder="RX-1004532">
      
      <button type="submit" class="btn btn-success">Add Custom Listing</button>
      <a href="<?=$panel_url;?>/view.php?type=custom_listings" class="btn btn-inverse">Cancel</a>
    </form>

  </div>
</div>