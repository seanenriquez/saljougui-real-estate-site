<?
//prevent non-administrative users from accessing this page
include('includes/secure.php');
//show existing city_information table
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM city_information order by active,city asc";
//$sql = "SELECT distinct city FROM community_area_information where city <> '' ORDER BY city asc";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);

?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li class="active">View Cities</li>
  </ul>
  <div class="well well-small">
    <h1>View Cities</h1>
    <legend></legend>
    <? switch($status) {
        case "updated":
        ?>
          <p class="alert alert-success">City updated successfully!</p>
        <?
            break;
		    case "deleted":
		    ?>
          <p class="alert alert-success">City removed successfully!</p>
        <?
            break;
		    
		    case "disabled":
		    ?>
          <p class="alert alert-success">City disabled successfully!</p>
        <?
            break;
		    
		    case "enabled":
		    ?>
          <p class="alert alert-success">City enabled successfully!</p>
        <?
            break;
	    }
	
	    if($num_rows <> 0)
	    {
		    $count = 1;
		?>
    <table class="table table-striped table-bordered">
      <p>Number of Cities in database:
        <?=$num_rows;?>
      </p>
      <legend></legend>
      <!-- <p><a href="add.php?type=city" class="btn btn-success">Add City &raquo;</a></p>   -->
      <p><a href="add.php?type=city" class="btn btn-success">Add City &raquo;</a></p>
      <thead>
        <tr>
          <th>#</th>
          <th>City</th>
          <th>Active</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <? while($row = mysql_fetch_array($result)):?>
        <? 
          extract($row);
          $city = strip_tags(addslashes($city));
        ?>
        <tr>
          <td><?=$count;?></td>
          <td><a href="edit.php?type=city&id=<?=$id;?>"><?=$city?></a></td>
          <td><?php echo ($active == 1)? 'Yes' : 'No';?></td>
          <td>
            <div class="btn-group">
            
              <a class="btn btn-mini btn-primary" href="edit.php?type=city&id=<?=$id;?>">
                <i class="icon-edit icon-white"></i> Edit
              </a> 
              
              <a class="btn btn-mini btn-primary dropdown-toggle" data-toggle="dropdown" >
                <span class="caret"></span>
              </a>
   
              <ul class="dropdown-menu">
              <!--  <li><a href="edit.php?type=city&id=<?=$id;?>"><i class="icon-pencil"></i> Edit</a></li>  -->
              
                <li><a href="delete-city.php?action=enable&id=<?=$id;?>"><i class="icon-ok-circle"></i> Enable</a></li>
                <li><a href="delete-city.php?action=disable&id=<?=$id;?>"><i class="icon-ban-circle"></i> Disable</a></li>
                <li><a href="#" onClick="var remove = confirm('Delete City?'); if(remove) window.location='delete-city.php?action=delete&id=<?=$id;?>'"><i class="icon-trash"></i> Delete</a></li> 
              </ul>
            </div>
          </td>
        </tr>
          <? $count++; ?>
        <? endwhile;?>
      </tbody>
    </table>
    <? }
	else {
		?>
    <? //else table is empty ?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no Cities in the database.</p>
    <p><a href="add.php?type=city" class="btn btn-success">Add City &raquo;</a></p>
    <? } ?>
  </div>
</div>
<?php
	mysql_close($con);