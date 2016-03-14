<?
//prevent non-administrative users from accessing this page
include('includes/secure.php');
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM `events` order by `id` asc";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li class="active">View Events</li>
  </ul>
  <div class="well well-small">
    <h1>View Events</h1>
    <legend></legend>
    <? switch($status)
	{
		case "deleted":
		?>
    <p class="alert alert-success">Event removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Event disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Event enabled successfully!</p>
    <?
        break;
	}
	
	if($num_rows <> 0)
	{
		$count = 1;
		?>
    <table class="table table-striped table-bordered">
      <p>Number of Event in database:
        <?=$num_rows;?>
      </p>
      <legend></legend>
      <p><a href="add.php?type=events" class="btn btn-success">Add Event &raquo;</a></p>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Date</th>
          <th>Desc</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <? while($row = mysql_fetch_array($result)):?>
        <? extract($row);?>
        <? //loop through the Partners table ?>
        <tr>
          <td><?=$count;?></td>
          <td><?=$event_name;?></td>
          <td><?=$event_date;?></td>
          <td><?=$event_description;?></td>
          <td><div class="btn-group"> <a class="btn btn-mini btn-primary" href="edit.php?type=events&id=<?=$id;?>"><i class="icon-edit icon-white"></i> Edit</a> <a class="btn btn-mini btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="edit.php?type=events&id=<?=$id;?>"><i class="icon-pencil"></i> Edit</a></li>
                <li><a href="#" onClick="var remove=confirm('Delete Event?'); if(remove) window.location='delete-event.php?action=delete&id=<?=$id;?>'"><i class="icon-trash"></i> Delete</a></li>
              </ul>
            </div>
          </td>
        </tr>
        <? $count++; ?>
        <? endwhile;?>
      </tbody>
    </table>
    <? }
	else {
		//else table is empty 
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no Events in the database.</p>
    <p><a href="add.php?type=events" class="btn btn-success">Add Event &raquo;</a></p>
    <? } ?>
  </div>
</div>
<?
	mysql_close($con);