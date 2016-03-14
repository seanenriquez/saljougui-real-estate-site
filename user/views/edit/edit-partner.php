<?
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
$sql = $dbpdo->prepare("SELECT * FROM `partners` WHERE `id` = :partner_id");
$data = array(
'partner_id' => $id
);
$sql->execute($data);
$num_rows = $sql->rowCount();
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=partners">Partners</a> <span class="divider">/</span></li>
    <li class="active">Edit Partner</li>
  </ul>
  <div class="well well-small">
    <h1>Edit Partner</h1>
    <legend></legend>
    <? switch($status)
	{
		case "updated":
		?>
		<p class="alert alert-success">Partner updated successfully!</p>
    	<?
        break;
		
		case "deleted":
		?>
		<p class="alert alert-success">Partner removed successfully!</p>
    	<?
        break;
		
		case "disabled":
		?>
		<p class="alert alert-success">Partner disabled successfully!</p>
    	<?
        break;
		
		case "enabled":
		?>
		<p class="alert alert-success">Partner enabled successfully!</p>
    	<?
        break;
	}
	
	if($num_rows <> 0)
	{
	
	$count = 1;
	 
    while($row = $sql->fetch())
    {
	    extract($row);
	    //loop through the pages table
	    switch($active)
		{
			case 1:
			$active = "Enabled";
			break;
			
			case 2:
			$active = "Disabled";
			break;
		}
		?>
	    <form action="<?=$_SERVER['PHP_SELF'];?>?type=partner&id=<?=$id;?>" method="post" name="edit-partner-form">
	      <input type="hidden" name="post_action" value="update_partner">
	      <input type="hidden" name="id" value="<?=$id;?>">
	      <label for="">Status</label>
	      <select name="active">
	        <?=showOptionsDrop($active_arr, $active);?>
	      </select>
	      <label>Partner Name</label>
	      <input type="text" name="partner_name" value="<?=$partner_name;?>">
	      <label for="">Partner URL</label>
	      <input type="text" name="partner_url" id="partner_url" value="<?=$partner_url;?>" />
	      <div class="clear">&nbsp;</div>
	      
	      <div id="bootstrapped-fine-uploader"></div>
	           <script src="<?=$assets;?>/js/jquery.fineuploader-3.0.js"></script>
	      <script>
	        function createUploader() {
	          var uploader = new qq.FineUploader({
	            element: document.getElementById('bootstrapped-fine-uploader'),
	            request: {
	              endpoint: '<?=$panel_url;?>/uploadfile.php?type=partner_image&partner_id=<?=$id;?>'
	            },
	              callbacks: {
	                  onComplete: function(id, filename, res)
	                  {
	                      if (res.success)
	                      {
	                          var image = $('<img>').attr({src: '/images/partners/<?=$id;?>/'+res.url, class: 'img img-polaroid pull-left', width: '100px'});
	      					var hidden_img_field = $('<input>').attr({value: filename, type: 'hidden', name: 'file_name'});
	      					hidden_img_field.appendTo('#edit-partner-form');
	                          image.prependTo('#bootstrapped-fine-uploader');
	                          
	                          
	                          // Database Update
	      					var post_data = {};
	      					post_data['filename'] = res.url;
	      					post_data['partner_id'] = '<?=$id;?>';
	      					
	      					$.ajax({
	      							url: "update_partner_image.php",
	      							type: "POST",
	      							data: post_data,
	      							success: function(data)
	      							{
	      									//alert() or some shit										
	      							} // end Success Function
	      						
	      						}); // End AJAX Request
	                          
	                      }
	                      
	                  } 
	              },
	            text: {
	              uploadButton: '<i class="icon-upload icon-white"></i> Add Image(s)'
	            },
	            template: '<div class="qq-uploader span9">' +
	                        '<pre class="qq-upload-drop-area span12"><span>{dragZoneText}</span></pre>' +
	                        '<div class="qq-upload-button btn btn-success">{uploadButtonText}</div>' +
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
	      
	      <div class="form-actions">
	        <button type="submit" class="btn btn-primary">Save Partner</button>
	        <a href="<?=$panel_url;?>/view.php?type=partners" class="btn btn-inverse">Cancel</a> </div>
	    </form>
	    <?
    	$count++;
    	}
    }
	else
	{
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no Partners in the database.</p>
    <p><a href="add.php?type=partner" class="btn btn-success">Add Partner &raquo;</a></p>
    <?
    }
    ?>
  </div>
</div>