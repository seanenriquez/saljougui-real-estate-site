<?
//prevent non-administrative users from accessing this page
include('includes/secure.php');
include('includes/config.php');
//show existing users table
$sql = $dbpdo->prepare("SELECT * FROM `partners` ORDER BY `partner_name` ASC");
$sql->execute();
$num_rows = $sql->rowCount();
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li class="active">View Partners</li>
  </ul>
  <div class="well well-small">
    <h1>View Partners</h1>
    <legend></legend>
    <? switch($status)
	{
		case "deleted":
		?>
    <p class="alert alert-success">Partner removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Partner disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Parnter enabled successfully!</p>
    <?
        break;
	}
	
	if($num_rows > 0)
	{
		$count = 1;
		?>
    <table class="table table-striped table-bordered">
      <p>Number of Partners in database:
        <?=$num_rows;?>
      </p>
      <legend></legend>
      <p><a href="add.php?type=partner" class="btn btn-success">Add Partner &raquo;</a></p>
      <thead>
        <tr>
          <th>#</th>
          <th>Image</th>
          <th>Name</th>
		  <th>URL</th>
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
        <tr id="partner_<?=$count;?>" <?=$row_deleted;?>>
          <td><?=$count;?></td>
          <td>
          <?
          if(!empty($partner_image) && isset($partner_image))
          {
	          ?>
	          <img src="<?=$base_url;?>/images/partners/<?=$id;?>/<?=$partner_image;?>" style="max-width:100px;" class="img img-polaroid" />
	          <?
          }
          ?>
          </td>
          <td><?=stripslashes($partner_name);?></td>
          <td><a href="<?=$partner_url;?>" target="_blank"><?=$partner_url;?></a></td>
          <td><div class="btn-group"> <a class="btn btn-mini btn-primary" href="edit.php?type=partner&id=<?=$id;?>"><i class="icon-edit icon-white"></i> Edit</a> <a class="btn btn-mini btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="edit.php?type=partner&id=<?=$id;?>"><i class="icon-pencil"></i> Edit</a></li>
                <li><a href="#" onClick="javascript:delete_partner('<?=$id;?>','<?=$count;?>');"><i class="icon-trash"></i> Delete</a></li>
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
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no Partners in the database.</p>
    <p><a href="add.php?type=partner" class="btn btn-success">Add Partner &raquo;</a></p>
    <? } ?>
  </div>
</div>