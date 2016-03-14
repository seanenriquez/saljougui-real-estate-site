<div class="span9">
<ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=builders">Builders</a><span class="divider">/</span></li>
    <li class="active">Add Builders</li>
  </ul>
  <div class="well well-small">

    <h1>Add Builder</h1>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=builder';?>" method="post" id="add-builder-form">
    <input type="hidden" name="post_action" value="add_builder">
     <legend><? if($update_status)
	{
		switch($update_status)
		{
			case "added":
			?>
            <p class="alert alert-success">Builder added successfully!</p>
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
      <label>Builder Name</label>
      <input type="text" name="title" id="title" class="input-xxlarge" placeholder="Builder Name Here...">
      <label>Description</label>
      <input type="text" name="description" id="description" class="input-xxlarge" placeholder="Description here...">
      <label>YouTube ID</label>
      <input type="text" name="youtube_id" id="youtube_id">
      <label>Builder Information</label>
      <textarea name="content"></textarea>
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
                    var image = $('<img>').attr({src: '/files/'+res.url});
					var hidden_img_field = $('<input>').attr({value: res.url, type: 'hidden', name: 'file_name'});
					hidden_img_field.appendTo('#add-builder-form');
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
      <button type="submit" name="submit" id="submit" class="btn btn-success">Add Builder</button>
      <a href="<?=$panel_url;?>/view.php?type=builder" class="btn btn-inverse">Cancel</a>
    </form>

  </div>
</div>