<?
//prevent non-administrative users from accessing this page
include('includes/secure.php');
//show existing community_area_information table
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM community_area_information order by city,subdivision_area_name asc";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);

?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li class="active">View Communities</li>
  </ul>
  <div class="well well-small">
    <h1>View Communities</h1>
    <legend></legend>
    <? switch($status)
	{
		case "deleted":
		?>
    <p class="alert alert-success">Community removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Community disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Community enabled successfully!</p>
    <?
        break;
	}
	
	if($num_rows <> 0)
	{
		$count = 1;
		?>
    <table class="table table-striped table-bordered">
      <p>Number of Communities in database:
        <?=$num_rows;?>
      </p>
      <legend></legend>
      <p><a href="<?=$panel_url;?>/add.php?type=community" class="btn btn-success">Add Community &raquo;</a></p>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>City</th>
          <th>Active</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <? while($row = mysql_fetch_array($result)):?>
        <? extract($row);
        $subdivision_area_name = strip_tags(addslashes($subdivision_area_name));
       
        ?>
        <tr>
          <td><?=$count;?></td>
          <td><a href="<?=$panel_url;?>/edit.php?type=community&id=<?=$id;?>">
            <?=$subdivision_area_name?>
            </a></td>
          <td><?=$city;?></td>
          <td><?php echo ($active == 1)? 'Yes' : 'No';?></td>
          <td><div class="btn-group"> <a class="btn btn-mini btn-primary" href="edit.php?type=community&id=<?=$id;?>"><i class="icon-edit icon-white"></i> Edit</a> <a class="btn btn-mini btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=$panel_url;?>/edit.php?type=community&id=<?=$id;?>"><i class="icon-pencil"></i> Edit</a></li>
                <li><a href="<?=$panel_url;?>/delete-community.php?action=enable&id=<?=$id;?>"><i class="icon-ok-circle"></i> Enable</a></li>
              	<li><a href="<?=$panel_url;?>/delete-community.php?action=disable&id=<?=$id;?>"><i class="icon-ban-circle"></i> Disable</a></li>
              	<li><a href="#" onClick="var remove = confirm('Delete Community?'); if(remove) window.location='<?=$panel_url;?>/delete-community.php?action=delete&id=<?=$id;?>'"><i class="icon-trash"></i> Delete</a></li>
              </ul>
            </div></td>
        </tr>
        <? $count++; ?>
        <? endwhile;?>
      </tbody>
    </table>
    <? }
	else {
		?>
    <? //else table is empty ?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no Communities in the database.</p>
    <p><a href="<?=$panel_url;?>/add.php?type=community" class="btn btn-success">Add Community &raquo;</a></p>
    <? } ?>
  </div>
</div>
<?
	mysql_close($con);