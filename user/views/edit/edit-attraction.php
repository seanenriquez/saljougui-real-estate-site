<?
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
include('includes/config.php');
$sql = $dbpdo->prepare("SELECT * FROM `attractions` WHERE `id` = :attaction_id");
$data = array(
'attaction_id' => $id
);
$sql->execute($data);

$num_rows = $sql->rowCount();
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=attractions">Attractions</a> <span class="divider">/</span></li>
    <li class="active">Edit Attraction</li>
  </ul>
  <div class="well well-small">
    <h1>Edit Attraction</h1>
    <legend></legend>
    <? switch($status)
	{
		case "updated":
		?>
    <p class="alert alert-success">Attraction updated successfully!</p>
    <?
        break;
		
		case "deleted":
		?>
    <p class="alert alert-success">Attraction removed successfully!</p>
    <?
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Attraction disabled successfully!</p>
    <?
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Attraction enabled successfully!</p>
    <?
        break;
	}
	
	if($num_rows <> 0)
	{
		$count = 1;
		?>
    <? 
    while($row = $sql->fetch())
    {
    extract($row);
	?>
    <form action="<?=$_SERVER['PHP_SELF'];?>?type=attractions&id=<?=$id;?>" method="post" name="edit-attraction-form" id="edit-attraction-form">
      <input type="hidden" name="post_action" value="update_attraction">
      <input type="hidden" name="id" value="<?=$id;?>">
      <input type="hidden" name="file_name" value="<?=$file_name;?>">
      <label>Attraction</label>
      <input type="text" name="title" id="title" class="input-xxlarge" value="<?=$title;?>" required>
      <label>Description</label>
      <input type="text" name="description" id="description" class="input-xxlarge" value="<?=$description;?>">
      <label>YouTube ID</label>
      <input type="text" name="youtube_id" id="youtube_id" class="input-xxlarge" value="<?=$youtube_id;?>">
      <label>Attraction Information</label>
      <textarea name="content"><?=$content;?>
</textarea>
      <? if (!empty($file_name) && file_exists($_SERVER['DOCUMENT_ROOT'].'/files/'.$file_name)) : ?>
      <div class="clear">&nbsp;</div>
      <span class="badge badge-warning">File already exists for this event!</span>
      <div class="clear">&nbsp;</div>
      <img src="http://<?=$_SERVER['HTTP_HOST'].'/files/'.$file_name;?>" class="img img-polaroid" id="event_image">
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
					var hidden_img_field = $('<input>').attr({value: filename, type: 'hidden', name: 'file_name'});
					
					hidden_img_field.appendTo('#edit-attraction-form');
					oldImage = $('#attraction_image').replaceWith(image);
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
        <button type="submit" class="btn btn-primary">Save Attraction</button>
        <a href="<?=$panel_url;?>/view.php?type=attractions" class="btn btn-inverse">Cancel</a> </div>
    </form>
    <?
    $count++;
    }
    }
	else
	{
		//else table is empty
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no attractions in the database.</p>
    <p><a href="add.php?type=attractions" class="btn btn-success">Add Attraction &raquo;</a></p>
    <?
    }
    ?>
  </div>
</div>