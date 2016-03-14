<?php

class Login
 {
	
	public function DoLogin($email, $password)
	//Checks the username/password submitted via the login form
 	{
    GLOBAL $dbhost,$dbname,$dbuser,$dbpass;

		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password') AND status = 1";
		$result = mysql_query($sql) or die(mysql_error());
		$num_rows = mysql_num_rows($result);
		
		if (!$result)
		{
			return false;
		}
		
		while($row = mysql_fetch_array($result))
		{
			$_SESSION["ADMIN"] = 0;
			
			#if ($row['GroupNumber'] == 2)
			#{
			#	$_SESSION["ADMIN"] = 1;
			#}
			
			$_SESSION["LOGGEDIN"] = 1;
			$_SESSION["USERID"] = $row['id'];
			$_SESSION["FNAME"] = $row['first_name'];
			$_SESSION["LNAME"] = $row['last_name'];
			$_SESSION["USER_EMAIL"] = $row['email'];
			$_SESSION["USER_TYPE"] = $row['user_type'];
			$user_id = $_SESSION['USERID'];
			$user_ip = $_SERVER['REMOTE_ADDR'];
			$sql2 = "INSERT INTO ip_logs SET action = 'Logged In', user_id = '$user_id', ip_address = '$user_ip'";
		$result2 = mysql_query($sql2) or die(mysql_error());
		}
		
		return mysql_num_rows($result);

 	}//End DoLogin()

    
 }


?>