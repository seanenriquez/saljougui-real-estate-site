<?
	//prevent non-administrative users from accessing this page
	include('includes/secure.php');
	$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
	mysql_select_db($dbname, $con) or die(mysql_error());
	$sql = "SELECT * FROM `users` order by `username` ASC";
	$result = mysql_query($sql) or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li class="active">View Users</li>
  </ul>
  <div class="well well-small">
    <h1>View Users</h1>
    <legend></legend>
    <? switch($status)
	{
		case "deleted":
		?>
    <p class="alert alert-success">User removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">User disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">User enabled successfully!</p>
    <?
        break;
	}
	
	if($num_rows <> 0)
	{
		$count = 1;
		?>
    <table class="table table-striped table-bordered">
      <p>Number of users in database:
        <?=$num_rows;?>
      </p>
      <legend></legend>
      <p><a href="add.php?type=users" class="btn btn-success">Add User &raquo;</a></p>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Username</th>
          <th>State</th>
          <th>Email</th>
          <th>Type</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <? while($row = mysql_fetch_array($result)):?>
        <? extract($row);?>
        <? //loop through the user table ?>
        <? $row_deleted = ($row['status'] == 2) ? "class=error" : ""; ?>
        <? switch($user_type)
        {
          
          //Administrator
          case 1:
          $user_type = "Admin";
          break;
          
          case 2:
          $user_type = "Free";
          break;
          
          case 3:
          $user_type = "Paid";
          break;
          
          case 4:
          $user_type = "SuperAdmin";
          break;
          
        }
        ?>
        <tr <?=$row_deleted;?>>
          <td><?=$count;?></td>
          <td><?=$last_name . ', ' . $first_name;?></td>
          <td><?=$username;?></td>
          <td><?=$user_state;?></td>
          <td><a href="mailto:<?=$email;?>" title="Send <?=$first_name;?> an email">
            <?=$email;?>
            </a></td>
          <td><?=$phone;?></td>
          <td><?=$user_type;?></td>
          <td><div class="btn-group"> <a class="btn btn-mini btn-primary" href="edit-user.php?id=<?=$id;?>"><i class="icon-edit icon-white"></i> Select</a> <a class="btn btn-mini btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="edit-user.php?id=<?=$id;?>"><i class="icon-pencil"></i> Edit</a></li>
                <li><a href="make-admin.php?action=admin&id=<?=$id;?>"><i class="icon-ok-circle"></i> Make Admin</a></li>
                <li><a href="delete-user.php?action=disable&id=<?=$id;?>"><i class="icon-ban-circle"></i> Disable</a></li>
                <li><a href="delete-user.php?action=enable&id=<?=$id;?>"><i class="icon-ok-circle"></i> Enable</a></li>
                <li><a onClick="var remove = confirm('Delete User?'); if(remove) window.location='delete-user.php?action=delete&id=<?=$id;?>'" href="#"><i class="icon-trash"></i> Delete</a></li>
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
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no users in the database.</p>
    <p><a href="add.php?type=users" class="btn btn-success">Add User &raquo;</a></p>
    <? } ?>
  </div>
</div>
<?
	mysql_close($con);