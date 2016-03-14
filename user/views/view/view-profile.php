<?
$user_id = $_SESSION["USERID"];
		$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
		mysql_select_db($dbname, $con) or die(mysql_error());
		$sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
		$result = mysql_query($sql) or die(mysql_error());
		$num_rows = mysql_num_rows($result);
		?>
    <div class="span9">
      <ul class="breadcrumb">
        <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
        <li class="active">My Profile</li>
      </ul>
      <div class="well well-small">
        <h1>My Profile</h1>
        <legend>Account Information</legend>
        <?
		
		if($num_rows <> 0)
		{
			?>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Account Type</th>
            </tr>
          </thead>
          <tbody>
            <? while($row = mysql_fetch_array($result)):?>
            <? extract($row);?>
            <? switch ($user_type)
			{
				case 1:
					$user_type_nice = "Administrator";
				break;
				
				case 2:
					$user_type_nice = "Free Member";
				break;
				
				case 3:
					$user_type_nice = "Paid Member";
				break;
				
				default:
					$user_type_nice = "Standard";
				break;
			}
			
            //!display current user profile data
             ?>
            <tr>
              <td><?=$last_name;?>, <?=$first_name;?></td>
              <td><?=$email;?></td>
              <td><?=$phone;?></td>
              <td><?=$user_type_nice;?></td>
            </tr>
            <? endwhile;?>
          </tbody>
        </table>
        <? switch($user_type)
        {
        	//Admin
        	case 1:
        	?>
        <span class="label label-success">You are an administrative user.</span>
        <?
        	break;
        	
        	//Free Member
        	case 2:
        	?>
            <span class="label label-success">You have a FREE membership</span>
        <p class="alert alert-info"><a href="#" class="btn btn-primary">Upgrade</a></p>
        <?
        	break;
        	
        	//Paid Member
        	case 3:
        	?>
        <span class="label label-success">You have an active PAID membership.</span>
        <?
        	break;
        	
        }
		}
		else {
			 //table is empty
			 ?>
        <p class="alert alert-danger"><strong>NOTICE!</strong> There are no users in the database.</p>
        <? } ?>
      </div>
    </div>
    <?
		mysql_close($con);