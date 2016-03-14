<div class="span9">
<ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=partners">Partners</a><span class="divider">/</span></li>
    <li class="active">Add Partner</li>
  </ul>
  <div class="well well-small">

    <h1>Add Partner</h1>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=partner';?>" method="post" id="add-partner-form">
    <input type="hidden" name="post_action" value="add_partner">
     <legend><? if($update_status)
	{
		switch($update_status)
		{
			case "added":
			?>
            	<p class="alert alert-success">Partner added successfully!</p>
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
      <label>Partner Name</label>
      <input type="text" name="partner_name" placeholder="Some Partner">
      <label>Partner URL</label>
      <input type="text" name="partner_url" id="partner_url" placeholder="http://" />
      <legend></legend>
      <button type="submit" class="btn btn-success">Add Partner</button>
      <a href="<?=$panel_url;?>/view.php?type=partners" class="btn btn-inverse">Cancel</a>
    </form>

  </div>
</div>