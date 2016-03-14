<?
//prevent non-administrative users from accessing this page
include('includes/secure.php');
include('includes/config.php');
//show existing users table
$sql = $dbpdo->prepare("SELECT * FROM `custom_listings` ORDER BY `id` DESC");
$sql->execute();
$num_rows = $sql->rowCount();
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li class="active">View Custom Listings</li>
  </ul>
  <div class="well well-small">
    <h1>View Custom Listings</h1>
    <legend></legend>
    <? switch($status)
	{
		case "deleted":
		?>
    <p class="alert alert-success">Custom Listing removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Custom Listing disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Custom Listing enabled successfully!</p>
    <?
        break;
	}
	
	if($num_rows > 0)
	{
		$count = 1;
		?>
    <table class="table table-striped table-bordered">
      <p>Number of Custom Listings in database:
        <?=$num_rows;?>
      </p>
      <legend></legend>
      <p><a href="add.php?type=custom_listing" class="btn btn-success">Add Custom Listing &raquo;</a></p>
      <thead>
        <tr>
          <th>MLS #</th>
          <th>Status</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
	    <? 
		while($row = $sql->fetch())
		{
	    extract($row);
	    $row_deleted = ($row['active'] == 2) ? "class=error" : "";
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
        <tr id="custom_listing_<?=$count;?>" <?=$row_deleted;?>>
          <td><a href="<?=$base_url;?>/showmls.php?id=<?=$listing_id;?>&mlssearch=1"><?=$listing_id;?></a></td>
          <td id="custom_listing_<?=$count;?>_status"><?=$active;?></td>
          <td><div class="btn-group"> <a class="btn btn-mini btn-primary" href="edit.php?type=custom_listing&id=<?=$id;?>"><i class="icon-edit icon-white"></i> Edit</a> <a class="btn btn-mini btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="edit.php?type=custom_listing&id=<?=$id;?>"><i class="icon-pencil"></i> Edit</a></li>
                <li><a href="javascript:disable_custom_listing('<?=$id;?>','<?=$count;?>');"><i class="icon-ban-circle"></i> Disable</a></li>
                <li><a href="javascript:enable_custom_listing('<?=$id;?>','<?=$count;?>');"><i class="icon-ok-circle"></i> Enable</a></li>
                <li><a href="javascript:delete_custom_listing('<?=$id;?>','<?=$count;?>');"><i class="icon-trash"></i> Delete</a></li>
              </ul>
            </div></td>
        </tr>
        <?
        $count++;
        }
        ?>
      </tbody>
    </table>
    <? }
	else {
		//else table is empty 
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no Custom Listings in the database.</p>
    <p><a href="add.php?type=custom_listing" class="btn btn-success">Add Custom Listing &raquo;</a></p>
    <? } ?>
  </div>
</div>