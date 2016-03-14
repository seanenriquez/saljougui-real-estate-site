<?
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM `events` WHERE id = '$id'";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=events">Events</a> <span class="divider">/</span></li>
    <li class="active">Edit Event</li>
  </ul>
  <div class="well well-small">
    <h1>Edit Event</h1>
    <legend></legend>
    <? switch($status)
	{
		case "updated":
		?>
    <p class="alert alert-success">Event updated successfully!</p>
    <?
        break;
		
		case "deleted":
		?>
    <p class="alert alert-success">Event removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Event disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Event enabled successfully!</p>
    <?
        break;
	}
	
	if($num_rows <> 0)
	{
		$count = 1;
		?>
    <? 
    while($row = mysql_fetch_array($result)):
    extract($row);
	
    //loop through the Events table
		?>
      <form action="<?=$_SERVER['PHP_SELF'];?>?type=events&id=<?=$id;?>" method="post" name="edit-event-form" id="edit-event-form">
      <input type="hidden" name="post_action" value="update_event">
      <input type="hidden" name="id" value="<?=$id;?>">
      <input type="hidden" name="event_file_name" value="<?=$event_file_name;?>">
      <label>Event Date</label>
      <input type="date" name="event_date" id="event_date" required value="<?=$event_date;?>">
      <label>Event Name</label>
      <input type="text" name="event_name" id="event_name" class="input-xxlarge" value="<?=$event_name;?>" required>
      <label>Event Location</label>
      <input type="text" name="event_location" id="event_location" class="input-xxlarge" value="<?=$event_location;?>">
      <label style="display:none">Event Price</label>
      <input style="display:none" type="text" name="event_price" id="event_price" class="input-xxlarge" value="<?=$event_price;?>">
      <label>YouTube ID</label>
      <input type="text" name="event_youtube_id" id="event_youtube_id" class="input-xxlarge" value="<?=$event_youtube_id;?>">
      <label>Event Description</label>
      <textarea name="event_description"><?=$event_description;?>
</textarea>
      <label>Event Long Description</label>
      <textarea name="event_long_description"><?=$event_long_description;?>
</textarea>
      <? if (file_exists($_SERVER['DOCUMENT_ROOT'].'/files/'.$event_file_name)) : ?>
      <div class="clear">&nbsp;</div>
      <span class="badge badge-warning">File already exists for this event!</span>
      <div class="clear">&nbsp;</div>
      <img src="http://<?=$_SERVER['HTTP_HOST'].'/files/'.$event_file_name;?>" class="img img-polaroid" id="event_image">
      <? endif; ?>
      <div class="clear">&nbsp;</div>
      <div id="bootstrapped-fine-uploader"></div>
      <script src="<?=$assets;?>/js/jquery.fineuploader-3.0.js"></script> 
      <script>
  function createUploader() {
    var uploader = new qq.FineUploader({
      element: document.getElementById('bootstrapped-fine-uploader'),
      request: {
        endpoint: '<?=$panel_url;?>/uploadfile.php'
      },
        callbacks: {
            onComplete: function(id, filename, res)
            {
                if (res.success)
                {
                    var image = $('<img>').attr({src: '/files/'+filename});
					var hidden_img_field = $('<input>').attr({value: filename, type: 'hidden', name: 'event_file_name'});
					
					hidden_img_field.appendTo('#edit-event-form');
					oldImage = $('#event_image').replaceWith(image);
                    //image.appendTo('#bootstrapped-fine-uploader');
                }
                
            } 
        },
      text: {
        uploadButton: '<i class="icon-upload icon-white"></i> Select New Image'
      },
      template: '<div class="qq-uploader span9">' +
                  '<pre class="qq-upload-drop-area span12"><span>{dragZoneText}</span></pre>' +
                  '<div class="qq-upload-button btn btn-success" style="width: auto;">{uploadButtonText}</div>' +
                  '<ul class="qq-upload-list" style="margin-top: 10px; text-align: center;"></ul>' +
                '</div>',
      	classes: {
        success: 'alert alert-success',
        fail: 'alert alert-error'
      },
      debug: true
    });
  }
  window.onload = createUploader;
</script>
      <div class="clear">&nbsp;</div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Event</button>
        <a href="<?=$panel_url;?>/view.php?type=events" class="btn btn-inverse">Cancel</a> </div>
    </form>
    <? $count++; ?>
    <? endwhile;?>
    <? }
	else {
		//else table is empty
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no pages in the database.</p>
    <p><a href="add.php?type=users" class="btn btn-success">Add User &raquo;</a></p>
    <? } ?>
  </div>
</div>
<?
	mysql_close($con);