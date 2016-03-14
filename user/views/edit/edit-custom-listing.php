<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
$sql = $dbpdo->prepare("SELECT * FROM `custom_listings` WHERE `id` = :custom_listing_id");
$data = array(
'custom_listing_id' => $id
);
$sql->execute($data);
$num_rows = $sql->rowCount();
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=custom_listings">Custom Listings</a> <span class="divider">/</span></li>
    <li class="active">Edit Custom Listing</li>
  </ul>
  <div class="well well-small">
    <h1>Edit Custom Listing</h1>
    <legend></legend>
    <?php switch($status)
	{
		case "updated":
		?>
		<p class="alert alert-success">Custom Listing updated successfully!</p>
    	<?php
        break;
		
		case "deleted":
		?>
		<p class="alert alert-success">Custom Listing removed successfully!</p>
    	<?php
        break;
		
		case "disabled":
		?>
		<p class="alert alert-success">Custom Listing disabled successfully!</p>
    	<?php
        break;
		
		case "enabled":
		?>
		<p class="alert alert-success">Custom Listing enabled successfully!</p>
    	<?php
        break;
	}
	
	if($num_rows <> 0)
	{
	
	$count = 1;
	 
    while($row = $sql->fetch())
    {
	    extract($row);
	    //loop through the pages table
	    switch($active)
		{
			case 1:
			$active = "Enabled";
			break;
			
			case 2:
			$active = "Disabled";
			break;
		}
		?>
	    <form action="<?=$_SERVER['PHP_SELF'];?>?type=custom_listing&id=<?=$id;?>" method="post" name="edit-custom-listing-form">
	      <input type="hidden" name="post_action" value="update_custom_listing">
	      <input type="hidden" name="id" value="<?=$id;?>">
	      <label for="">Status</label>
	      <select name="active">
	        <?=showOptionsDrop($active_arr, $active);?>
	      </select>
	      <label>MLS #</label>
	      <input type="text" name="listing_id" value="<?=$listing_id;?>" >

	      <div class="clear">&nbsp;</div>
	     	      
	      <div class="form-actions">
	        <button type="submit" class="btn btn-primary">Save Listing</button>
	        <a href="<?=$panel_url;?>/view.php?type=custom_listings" class="btn btn-inverse">Cancel</a> </div>
	    </form>
	    <?php
    	  $count++;
    	}
    }
	else
	{
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no Custom Listings in the database.</p>
    <p><a href="add.php?type=custom_listing" class="btn btn-success">Add Custom Listing &raquo;</a></p>
    <?php
    }
    ?>
  </div>
</div>