<div class="span9">
<ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=events">Events</a><span class="divider">/</span></li>
    <li class="active">Add Events</li>
  </ul>
  <div class="well well-small">

    <h1>Add Event</h1>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=events';?>" method="post" id="add-event-form">
    <input type="hidden" name="post_action" value="add_event">
     <legend><? if($update_status)
	{
		switch($update_status)
		{
			case "added":
			?>
            <p class="alert alert-success">Event added successfully!</p>
            <?
			break;
			
			case "error":
			?>
            <p class="alert alert-danger">There was an error updating the database. Please try again.</p>
            <?
			break;
			
			default:
			//should not be here
			break;
		}
	}
	?></legend>
    <label>Event Date</label>
    <input type="date" name="event_date" id="event_date" required placeholder="yyyy-mm-dd">
    <label>Event Name</label>
      <input type="text" name="event_name" id="event_name" class="input-xxlarge" placeholder="Event Name">
      <label>Event Location</label>
      <input type="text" name="event_location" id="event_location" class="input-xxlarge" placeholder="Miami, FL">
      <label>Event Description</label>
      <input type="text" name="event_description" id="event_description" class="input-xxlarge" placeholder="Description here...">
      <label style="display:none">Event Price</label>
      <input style="display:none" type="text" name="event_price" id="event_price" class="input-xxlarge">
     <!-- <label>YouTube ID</label>
      <input type="text" name="event_youtube_id" id="event_youtube_id" class="input-xxlarge">-->
      <label>More Info</label>
      <textarea name="event_long_description"></textarea>
      <label>Upload Picture</label>
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
					hidden_img_field.appendTo('#add-event-form');
                    image.appendTo('#bootstrapped-fine-uploader');
                }
                
            } 
        },
      text: {
        uploadButton: '<i class="icon-upload icon-white"></i> Select File'
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
      <legend></legend>
      <button type="submit" name="submit" id="submit" class="btn btn-success">Add Event</button>
      <a href="<?=$panel_url;?>/view.php?type=events" class="btn btn-inverse">Cancel</a>
    </form>

  </div>
</div>