<?php
//Global Panel Settings
include('includes/panel-settings.php');
//login stuff
include('includes/login.funcs.php');

if(isset($_POST['login']))
{
	extract($_POST);
	$login = new Login($email, $password);
	$logged_in = $login->DoLogin($email, $password);
}

	//check for login status, if not logged in, redirect to login form
	include('includes/logincheck.php');

//Page Setup
$title = "Home ";
$page_name = "overview";
include('includes/header.php');

?>

  <body>
  <?php include('includes/top-nav.php');?>
  <div class="container-fluid">
    <div class="row-fluid">
      <?php //include the navigation sidebar
			  include('includes/sidebar.php');
      ?>
      <div class="span9">
        <div class="hero-unit">
          <h1>Welcome!</h1>
          <p> We are constantly adding features and improving on the core functions. If you feel something is broken please submit a support ticket and we will kindly respond within 24-48 hours or less.</p>
          <p><a href="<?=$support_url;?>" target="_blank" class="btn btn-primary btn-large">Get Support &raquo;</a></p>
        </div>
      </div>
    </div>
    <hr>
    <?php include('includes/footer.php');?>
  </div>
  <?php include('includes/bottom-scripts.php');?>
  </body>
  
</html>