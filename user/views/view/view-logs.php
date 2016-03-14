<?
$user_id = $_SESSION["USERID"];
//prevent non-administrative users from accessing this page
include('includes/secure.php');
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM `ip_logs` ORDER BY `id` DESC";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Logs</li>
  </ul>
  <div class="well well-small">
    <h1>System Logs</h1>
    <legend>Log File Data</legend>
    <p><a href="#" onClick="var remove = confirm('Clear logs?'); if(remove) window.location='view.php?type=logs&action=clear-logs'" class="btn btn-danger">Clear Logs</a></p>
    <?
	$count = 1;
	if($num_rows <> 0)
	{
		?>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Action</th>
          <th>User</th>
          <th>IP Address</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <? while($row = mysql_fetch_array($result)):?>
        <? extract($row);?>
        <? //loop through the log table ?>
        <tr>
          <td><?=$count;?></td>
          <td><?=$action;?></td>
          <td><?=getUserById($user_id);?></td>
          <td><a href="http://www.abuseipdb.com/check/<?=$ip_address;?>" target="_blank"><?=$ip_address;?></a></td>
          <td><?=date("F j, Y g:i a", strtotime($login_date));?></td>
        </tr>
        <? $count++; ?>
        <? endwhile;?>
      </tbody>
    </table>
    <? }
	else {
	
	//else table is empty
	
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> The log file is empty!</p>
    <? } ?>
  </div>
</div>
<?
	mysql_close($con);