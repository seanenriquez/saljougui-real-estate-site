<?
//prevent non-administrative users from accessing this page
include('includes/secure.php');
include('includes/config.php');
//show existing users table
$sql = $dbpdo->prepare("SELECT * FROM `pages` ORDER BY `page_name` ASC");
$sql->execute();
$num_rows = $sql->rowCount();
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li class="active">View Pages</li>
  </ul>
  <div class="well well-small">
    <h1>View Pages</h1>
    <legend></legend>
    <? switch($status)
	{
		case "deleted":
		?>
    <p class="alert alert-success">Page removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Page disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Page enabled successfully!</p>
    <?
        break;
	}
	
	if($num_rows > 0)
	{
		$count = 1;
		?>
    <table class="table table-striped table-bordered">
      <p>Number of pages in database:
        <?=$num_rows;?>
      </p>
      <legend></legend>
      <p><a href="add.php?type=page" class="btn btn-success">Add Page &raquo;</a></p>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Title</th>
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
        <tr <?=$row_deleted;?>>
          <td><?=$count;?></td>
          <td><a href="<?=$base_url;?>/getpage.php?id=<?=$id;?>" target="_blank"><?=$page_name;?></a></td>
          <td><?=$page_title;?></td>
          <td><?=$active;?></td>
          <td><div class="btn-group"> <a class="btn btn-mini btn-primary" href="edit.php?type=page&id=<?=$id;?>"><i class="icon-edit icon-white"></i> Edit</a> <a class="btn btn-mini btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="edit.php?type=page&id=<?=$id;?>"><i class="icon-pencil"></i> Edit</a></li>
                <li><a href="delete-page.php?action=disable&id=<?=$id;?>"><i class="icon-ban-circle"></i> Disable</a></li>
                <li><a href="delete-page.php?action=enable&id=<?=$id;?>"><i class="icon-ok-circle"></i> Enable</a></li>
                <li><a href="#" onClick="var remove = confirm('Delete Page?'); if(remove) window.location='delete-page.php?action=delete&id=<?=$id;?>'"><i class="icon-trash"></i> Delete</a></li>
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
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no pages in the database.</p>
    <p><a href="add.php?type=page" class="btn btn-success">Add Page &raquo;</a></p>
    <? } ?>
  </div>
</div>