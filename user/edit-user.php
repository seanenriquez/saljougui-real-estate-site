<?
//Global Panel Settings
include('includes/panel-settings.php');
//get user id
$id = isset($_GET['id']) ? $_GET['id'] : NULL;
$user_id = $_SESSION['USERID'];
if($id !== $_SESSION['USERID'])
{
	if($_SESSION["USER_TYPE"] !== '1')
	{
		header("Location: view.php?type=profile");
	}
}
//Page Setup
$title = "EDIT USER";
$page_name = "edit-user";
//check for $_POST data
$update_status = 0;
$action = isset($_POST['post_action']) ? $_POST['post_action'] : NULL;

if($action && $id)
{
	switch($action)
	{
		case "update_user":
			extract($_POST);
			$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
			mysql_select_db($dbname, $con) or die(mysql_error());
			//!Update User Table
			$sql = "UPDATE users SET `username` = '$username', `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email', `password` = md5('$password') WHERE id = '$id'";
			$result = mysql_query($sql) or die(mysql_error());
			$update_status = isset($result) ? "updated" : "error";
		break;
	}
}
include('includes/header.php');
?>

<body>
<? include('includes/top-nav.php');?>
<div class="container-fluid">
  <div class="row-fluid">
    <? 
    	//include the navigation sidebar
		include('includes/sidebar.php');

		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		
		$sql = "SELECT * FROM users WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$num_rows = mysql_num_rows($result);
		?>
    <div class="span9">
      <ul class="breadcrumb">
        <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
        <li><a href="<?=$panel_url;?>/view.php?type=users">Users</a> <span class="divider">/</span></li>
        <li class="active">Edit User</li>
      </ul>
      <div class="well well-small">
        <? if($num_rows <> 0)
		{
			?>
        <? while($row = mysql_fetch_array($result)):?>
        <? extract($row);?>
        <? //loop through the user table ?>
        <h1>Edit User -
          <?=$last_name . ', ' . $first_name;?>
        </h1>
        <? if($update_status)
		{
			switch($update_status)
			{
				case "updated":
				?>
                <p class="alert alert-success">User updated successfully!</p>
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
		?>
        <form action="" method="post" id="edit-user-form">
        <input type="hidden" name="post_action" value="update_user">
          <input type="hidden" name="id" value="<?=$id;?>">
          <label>Username</label>
          <input type="text" name="username" value="<?=$username;?>">
          <label>First Name</label>
          <input type="text" name="first_name" value="<?=$first_name;?>">
          <label>Last Name</label>
          <input type="text" name="last_name" value="<?=$last_name;?>">
          <label>Email</label>
          <input type="email" name="email" value="<?=$email;?>">
          <label>Password</label>
          <input type="password" name="password" value="<?=$password;?>">
          <legend></legend>
          <button type="submit" class="btn btn-success">Save</button>
          <a href="view.php?type=users" class="btn btn-inverse">Cancel</a>
          
          <?
          if ($_SESSION['USER_TYPE'] == 1)
		  {
			  ?><a href="#" onClick="var remove = confirm('Delete User?'); if(remove) window.location='delete-user.php?action=delete&id=<?=$id;?>'" class="btn btn-danger pull-right">Delete</a><? } ?>
        </form>
        <? endwhile;?>
        <? }
?>
      </div>
    </div>
    <?
		mysql_close($con);
		?>
  </div>
  
  <hr>
  <? include('includes/footer.php');?>
</div>
<? include('includes/bottom-scripts.php');?>
</body>
</html>
