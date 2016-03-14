<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
include('includes/config.php');
$sql = $dbpdo->prepare("SELECT * FROM `staff` WHERE `id` = :staff_id");
$data = array(
'staff_id' => $id
);
$sql->execute($data);
$num_rows = $sql->rowCount();
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=staff">Staff Members</a> <span class="divider">/</span></li>
    <li class="active">Edit Staff Member</li>
  </ul>
  <div class="well well-small">
    <h1>Edit Staff Member</h1>
    <legend></legend>
    <?php switch($status)
	{
		case "updated":
		?>
    <p class="alert alert-success">Staff Member updated successfully!</p>
    <?php
        break;
		
		case "deleted":
		?>
    <p class="alert alert-success">Staff Member removed successfully!</p>
    <?php
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Staff Member disabled successfully!</p>
    <?php
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Staff Member enabled successfully!</p>
    <?php
        break;
	}
	
	if($num_rows <> 0)
	{
	$count = 1;
    while($row = $sql->fetch())
    {
    extract($row);
    ?>
    <form action="<?=$_SERVER['PHP_SELF'];?>?type=staff&id=<?=$id;?>" method="post" name="edit-staff-form">
      <input type="hidden" name="post_action" value="update_staff">
      <input type="hidden" name="id" value="<?=$id;?>">
      <label>First Name</label>
      <input type="text" name="first_name" value="<?=$first_name;?>">
      <label>Last Name</label>
      <input type="text" name="last_name" value="<?=$last_name;?>">
      <label>Email</label>
      <input type="email" name="email" value="<?=$email;?>">
      <label>Phone</label>
      <input type="tel" name="phone" value="<?=$phone;?>">
      <label for="">Address</label>
      <input type="text" name="address" id="address" value="<?=$address;?>" />
      <label>Website</label>
      <input type="text" name="website" id="website" value="<?=$website;?>" />
      <label for="">Active Rain</label>
      <input type="text" name="activerain" id="activerain" value="<?=$activerain;?>" />
      <label for="">Facebook</label>
      <input type="text" name="facebook" id="facebook" value="<?=$facebook;?>" />
      <label for="">Twitter</label>
      <input type="text" name="twitter" id="twitter" value="<?=$twitter;?>" />
      <label for="">Linked In</label>
      <input type="text" name="linkedin" id="linkedin" value="<?=$linkedin;?>" />
      <legend>Bio</legend>
      <textarea name="bio" id="bio" cols="30" rows="10"><?=stripslashes($bio);?></textarea>
      
      <div class="clear">&nbsp;</div>
      
      <legend>Agent Testimonial</legend>
      <textarea name="testimonial" id="testimonial"><?=stripslashes($testimonial);?></textarea>
      
      <div class="clear">&nbsp;</div>
      
      <?php
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/images/staff/' . $profile_pic)) {
	    ?>
	        <img src="http://<?=$_SERVER['HTTP_HOST'];?>/images/staff/<?=$profile_pic;?>" class="img img-polaroid" style="max-width:200px;" />  
	        <div class="clear">&nbsp;</div>  
	    <?php
        } else {
      ?>
          <img src="http://<?=$_SERVER['HTTP_HOST'];?>/images/staff/nopic.gif" class="img img-polaroid" style="max-width:200px;" />  
          <div class="clear">&nbsp;</div>  
          
      <?php }  ?>
      <div id="bootstrapped-fine-uploader"></div>
           
      <script src="<?=$assets;?>/js/jquery.fineuploader-3.0.js"></script>
      
      <script>
        function createUploader() {
          var uploader = new qq.FineUploader({
            element: document.getElementById('bootstrapped-fine-uploader'),
            request: {
              endpoint: '<?=$panel_url;?>/uploadfile.php?type=staff_pic&staff_id=<?=$id;?>'
            },
              callbacks: {
                  onComplete: function(id, filename, res)
                  {
                      if (res.success)
                      {
                          var image = $('<img>').attr({src: '/images/staff/'+res.url, class: 'img img-polaroid'});
      					var hidden_img_field = $('<input>').attr({value: filename, type: 'hidden', name: 'profile_pic'});
      					hidden_img_field.appendTo('#edit-staff-form');
                          image.prependTo('#bootstrapped-fine-uploader');
                          
                          
                          // Database Update
      					var post_data = {};
      					post_data['file_name'] = res.url;
      					post_data['staff_id'] = '<?=$id;?>';
      					
      					$.ajax({
      							url: "update_staff_image.php",
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
              uploadButton: '<i class="icon-upload icon-white"></i> Upload Pic'
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
      
      <div class="clear">&nbsp;</div>
      
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?=$panel_url;?>/view.php?type=staff" class="btn btn-inverse">Cancel</a> </div>
    </form>
    <?php
    $count++;
    }
    }
	else
	{
		//else table is empty
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no staff members in the database.</p>
    <p><a href="add.php?type=staff" class="btn btn-success">Add Staff &raquo;</a></p>
    <?php
    }
    ?>
  </div>
</div>
<?php
	mysql_close($con);