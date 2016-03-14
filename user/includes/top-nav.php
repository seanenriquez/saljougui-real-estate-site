<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="<?=$panel_url;?>">
		<?=$client_name;?>
		<?=$panel_name;?>
		</a>
		<div class="nav-collapse collapse">
		<?
		if(isset($_SESSION['LOGGEDIN']))
		{
		//User is Logged In
		?>
		<p class="navbar-text pull-right">Logged in as <a href="view.php?type=profile" class="navbar-link">
		<?=$_SESSION['FNAME'] . ' ' . $_SESSION['LNAME'];?>
		</a>
		</p>
		<ul class="nav">
			<li><a href="<?=$panel_url;?>"><i class="icon-home"></i> Home</a></li>
			<li><a href="<?=$panel_url;?>/logout.php"><i class="icon-off"></i> Logout</a></li>
		</ul>
		<?
		}
		else
		{
		//Not Logged In
		?>
		<ul class="nav">
			<li><a href="<?=$panel_url;?>/login.php"><i class="icon-home"></i> Login</a></li>
		</ul>
		<? } ?>
		</div>
		</div>
	</div>
</div>
