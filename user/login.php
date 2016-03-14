<?php
//Global Panel Settings
include('includes/panel-settings.php');
//Page Setup
$title = "Login";
$page_name = "Login";
//check for action
$action = isset($_GET['action']) ? $_GET['action'] : NULL;
//include the header
include('includes/header.php');
?>

<body>
<?php include('includes/top-nav.php');?>
<div class="container-fluid">
  <div class="row-fluid">
    <?php include('includes/sidebar.php');?>
    <div class="span9">
      <div class="well well-small">
        <h1>User Login</h1>
        <legend></legend>
		<form class="form-horizontal" action="index.php" method="post">
			<input type="hidden" name="login" value="1">
			<div class="control-group">
				<label class="control-label" for="email">Email</label>
				<div class="controls">
					<input type="email" id="email" placeholder="Email" name="email" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="password">Password</label>
				<div class="controls">
					<input type="password" id="password" placeholder="Password" name="password" required>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-success">Sign in</button>
				</div>
			</div>
		</form>
      </div>
    </div>
  </div>
  <hr>
  <?php include('includes/footer.php');?>
</div>
<?php include('includes/bottom-scripts.php');?>
</body>
</html>
