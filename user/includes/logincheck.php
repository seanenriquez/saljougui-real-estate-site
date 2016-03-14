<?php 
/* This file checks for a logged in session, if no session is found redirect user to login.php */
if (!isset($_SESSION["LOGGEDIN"]))
	{
		header("Location: login.php");
	}
	?>