<?
//prevent non-administrative users from accessing this page
include('includes/secure.php');
include('includes/config.php');

$sql = $dbpdo->prepare("SELECT * FROM `local_builders` ORDER BY `id` DESC");
$sql->execute();
$num_rows = $sql->rowCount();

?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li class="active">View Builders</li>
  </ul>
  <div class="well well-small">
    <h1>View Builders</h1>
    <legend></legend>
    <? switch($status)
	{
		case "deleted":
		?>
    <p class="alert alert-success">Builder removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Builder disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Builder enabled successfully!</p>
    <?
        break;
	}
	
	if($num_rows <> 0)
	{
		$count = 1;
		?>
    <table class="table table-striped table-bordered">
      <p>Number of Builder(s) in database:
        <?=$num_rows;?>
      </p>
      <legend></legend>
      <p><a href="add.php?type=builder" class="btn btn-success">Add Builder &raquo;</a></p>
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Desc</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <?
        while($row = $sql->fetch())
	    {
        extract($row);
        ?>
        <tr id="builder_<?=$count;?>">
          <td><?=$count;?></td>
          <td><?=$title;?></td>
          <td><?=$description;?></td>
          <td><div class="btn-group"> <a class="btn btn-mini btn-primary" href="edit.php?type=builder&id=<?=$id;?>"><i class="icon-edit icon-white"></i> Edit</a> <a class="btn btn-mini btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="edit.php?type=builder&id=<?=$id;?>"><i class="icon-pencil"></i> Edit</a></li>
                <li><a href="javascript:delete_builder('<?=$id;?>','<?=$count;?>');"><i class="icon-trash"></i> Delete</a></li>
              </ul>
            </div>
          </td>
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
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no Attractions in the database.</p>
    <p><a href="add.php?type=builder" class="btn btn-success">Add Builder &raquo;</a></p>
    <? } ?>
  </div>
</div>