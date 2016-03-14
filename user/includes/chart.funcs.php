<?
/*Chart Functions*/
function getChartNameByID($id)
{
	global $dbhost, $dbname, $dbuser, $dbpass;
	$chart = 0;
	
	$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "SELECT * FROM `charts` WHERE id = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$num_rows = mysql_num_rows($result);
		if($num_rows < 1 )
		{
			$chart = 0;
		}
		else
		{
			while($row = mysql_fetch_array($result))
			{
				return $row['chart_name'];	
			}
			
		}
	return $chart;
}

function getPortfolioNameByID($id)
{
	global $dbhost, $dbname, $dbuser, $dbpass;
	$port = 0;
	
	$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "SELECT * FROM `portfolios` WHERE `id` = '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		$num_rows = mysql_num_rows($result);
		if($num_rows < 1 )
		{
			$port = 0;
		}
		else
		{
			while($row = mysql_fetch_array($result))
			{
				return $row['portfolio_name'];	
			}
			
		}
	return $port;
}
?>