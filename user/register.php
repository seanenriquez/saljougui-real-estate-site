<?
$allow_registration = true;

if($allow_registration == true)
{
//Global Panel Settings
include('includes/panel-settings.php');
//Page Setup
$title = "Account Registration ";
$page_name = "Register";
$registration_error = false;
$registration_success = false;
$fname = '';
$lname = '';
$email = '';
$password = '';
if(isset($_POST['register']) && $_POST['register'] == 1)
{

	/* 	Process Registration Form */
	$msg = "New User Registration \n";
	
	//extract $_POST
	extract($_POST);
	
	//clean $_POST	
	foreach($_POST as $key => $value)
	{
		$$key = escapevars($value);
		
		$msg .= $$key . "\n";
	}

	/* 	Check for user email already in database, etc */
	
	$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
	mysql_select_db($dbname, $con) or die(mysql_error());
	$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
	$result = mysql_query($sql) or die(mysql_error());
	
	$user_exists = (mysql_num_rows($result) > 0) ? true : false;
	
	if($user_exists)
	{
		/* 		User already in database, throw error */
		$registration_error = "There is already an account registered with this email address!";
	}
	else
	{
		/* New user, continue with registration process */
		$registration_error = false;	
		
		$sql = "INSERT INTO `users` SET `email` = '$email', `first_name` = '$fname', `last_name` = '$lname', `user_type` = '2', `password` = '$password', `status` = '1'";
		
		mysql_query($sql) or die(mysql_error());
		
		if(mysql_affected_rows())
		{
			/* database insert success, notify admin of new registration */
			logAction(mysql_insert_id(), "Registered");
			/* Set headers for mail */
			$headers = 'From: webmaster@hedoevents.com' . "\r\n" .
					    'Reply-To: webmaster@hedoevents.com' . "\r\n" .
					    'Return-Path: webmaster@hedoevents.com' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();
					    
			/* Email the user */
			$success_msg = "Thank you for registering! Your Membership is now active. Please login to continue at https://www.hedoevents.com/user/";
			
			mail($email, "Hedo Events Membership", $success_msg, $headers);
		}
		
		$registration_success = "Account setup! Please check your email for confirmation.";
	}
	/* 	Close DB connection */
	mysql_close($con);		
}

include('includes/header.php');
?>

<body>
<? include('includes/top-nav.php');?>
<div class="container-fluid">
  <div class="row-fluid">
    <? //include the navigation sidebar
		include('includes/sidebar.php');
	?>
    <div class="span9">
      <ul class="breadcrumb">
        <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
        <li class="active">Register</li>
      </ul>
      <div class="well well-small">
        <h1>Account Registration</h1>
        <legend></legend>
<? if($registration_error){ ?>
<p class="alert alert-error"><strong><?=$registration_error;?></strong></p>
<? }

if($registration_success){ ?>
<p class="alert alert-success"><strong><?=$registration_success;?></strong></p>
<? }
else { ?>
        <form class="form-horizontal" action="register.php" method="post">
        <input type="hidden" name="register" value="1">
  <div class="control-group">
    <label class="control-label" for="fname">First Name</label>
    <div class="controls">
      <input type="text" id="fname" placeholder="John" name="fname" required value="<?=$fname;?>">
	</div>
  </div>
  <div class="control-group">
    <label class="control-label" for="lname">Last Name</label>
    <div class="controls">
      <input type="text" id="lname" placeholder="Trader" name="lname" required value="<?=$lname;?>">
	</div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="email" id="inputEmail" placeholder="Email" name="email" required value="<?=$email;?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="password">Password</label>
    <div class="controls">
      <input type="password" id="password" placeholder="Password" name="password" required value="<?=$password;?>">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" name="submit" id="submit" class="btn btn-success">Register</button>
    </div>
  </div>
</form>
<? } ?>
      </div>
    </div>
  </div>
  <hr>
  <? include('includes/footer.php');?>
</div>
<? include('includes/bottom-scripts.php');?>
</body>
</html>

<? }
else
{
	//registration is closed, redirect to logout to prevent anything bad from happening :)
	header("Location: logout.php");
}
?>