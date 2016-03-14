<?
//prevent non-administrative users from accessing this page
include('includes/secure.php');
//show existing FAQ table
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM faqs order by id asc";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li class="active">View FAQS</li>
  </ul>
  <div class="well well-small">
    <h1>View FAQS</h1>
    <legend></legend>
    <? switch($status)
	{
		case "deleted":
		?>
    <p class="alert alert-success">FAQ removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">FAQ disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">FAQ enabled successfully!</p>
    <?
        break;
	}
	
	if($num_rows <> 0)
	{
		$count = 1;
		?>
    <table class="table table-striped table-bordered">
      <p>Number of FAQS in database:
        <?=$num_rows;?>
      </p>
      <legend></legend>
      <p><a href="<?=$panel_url;?>/add.php?type=faq" class="btn btn-success">Add FAQ &raquo;</a></p>
      <thead>
        <tr>
          <th>#</th>
          <th>Question</th>
          <th>Answer</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <? while($row = mysql_fetch_array($result)):?>
        <? extract($row);
        $question = strip_tags(stripslashes($question));
        $answer = substr(strip_tags(stripslashes($answer)),0,50) . '...';
        ?>
        <tr>
          <td><?=$count;?></td>
          <td><a href="<?=$panel_url;?>/edit.php?type=faq&id=<?=$id;?>">
            <?=$question;?>
            </a></td>
          <td><?=$answer;?></td>
          <td><div class="btn-group"> <a class="btn btn-mini btn-primary" href="edit.php?type=faq&id=<?=$id;?>"><i class="icon-edit icon-white"></i> Edit</a> <a class="btn btn-mini btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=$panel_url;?>/edit.php?type=faq&id=<?=$id;?>"><i class="icon-pencil"></i> Edit</a></li>
                <li><a href="#" onClick="var remove = confirm('Delete FAQ?'); if(remove) window.location='<?=$panel_url;?>/delete-faq.php?action=delete&id=<?=$id;?>'"><i class="icon-trash"></i> Delete</a></li>
              </ul>
            </div></td>
        </tr>
        <? $count++; ?>
        <? endwhile;?>
      </tbody>
    </table>
    <? }
	else {
		?>
    <? //else table is empty ?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no FAQS in the database.</p>
    <p><a href="<?=$panel_url;?>/add.php?type=faq" class="btn btn-success">Add FAQ &raquo;</a></p>
    <? } ?>
  </div>
</div>
<?
	mysql_close($con);