<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
//show existing pages table
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM `community_area_information` WHERE id = '$id'";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);

$citysql = "SELECT distinct city FROM master_rets_table order by city asc";
$cities = mysql_query($citysql) or die(mysql_error());

if($num_rows > 0)
{
	// Get Files
	$sql_file = "SELECT * FROM `community_area_files` WHERE `subdivision_area_id` = '$id'";
	$file_results = mysql_query($sql_file);
	$file_count = mysql_num_rows($file_results);
	
	// Get Each Type
	$images = array();
	$documents = array();
	if($file_count != 0)
	{			
		while($row = mysql_fetch_array($file_results))
		{
			if($row['file_type'] == '1')
			{
				$images[] = $row;
			}
			else
			{
				$documents[]= $row;
			}
		}
	}
}
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=communities">Communities</a> <span class="divider">/</span></li>
    <li class="active">Edit Community</li>
  </ul>
  <div class="well well-small">
    <h1>Edit Community</h1>
    <legend></legend>
    <?php switch($status)
	{
		case "updated":
		?>
    <p class="alert alert-success">Community updated successfully!</p>
    <?php
        break;
		
		case "deleted":
		?>
    <p class="alert alert-success">Community removed successfully!</p>
    <?php
        break;
		
		case "disabled":
		?>
    <p class="alert alert-success">Community disabled successfully!</p>
    <?php
        break;
		
		case "enabled":
		?>
    <p class="alert alert-success">Community enabled successfully!</p>
    <?php
        break;
		
		case "deleted_image":
		?>
    <p class="alert alert-success">Image deleted successfully!</p>
    <?php
        break;
	}
	
	if($num_rows <> 0)
	{
		$count = 1;
		?>
    <?php 
    while($row = mysql_fetch_array($result)):
    extract($row);
    //loop through the Communities table
		?>
    <form action="<?=$_SERVER['PHP_SELF'];?>?type=community&id=<?=$id;?>" method="post" name="edit-community-form">
      <input type="hidden" name="post_action" value="update_community">
      <input type="hidden" name="id" value="<?=$id;?>">
      <label>City</label>
      <select name="city">
        <?php while($rowCity = mysql_fetch_array($cities)){ ?>
          <option value="<?= $rowCity['city']?>" <?= $rowCity['city']==$city?"selected":"" ?> ><?= $rowCity['city']?></option>
        <?php } ?>
      </select>
      
      <label>Community Name</label>
      <input type="text" name="subdivision_area_name" value="<?=$subdivision_area_name;?>">
      <label>Community Headline</label>
      <input type="text" name="headline" class="input-xxlarge" value="<?=$headline;?>">
      <label>Page Link</label>
      <input type="text" name="additional_info_link" value="<?=$additional_info_link;?>">  
      <label>SEO Page Keywords</label>
      <input type="text" name="keywords" class="input-xxlarge" value="<?=$keywords;?>">
      <label>Community Description</label>
      <textarea name="content"><?=$content;?></textarea>
       <br>
      <label>Street Address</label>
      <input type="text" name="street_address" value="<?=$street_address;?>">
      <label>State</label>
      <input type="text" name="state" value="<?=$state;?>">
      <label>Zip</label>
      <input type="text" name="zip" value="<?=$zip;?>">
      <br>
      <br>
      <fieldset>
        <label>YouTube Video ID</label>
        <input type="text" name="youtube_id" value="<?=$youtube_id;?>">
        <label>YouTube Video SEO Title</label>
        <input type="text" name="youtube_keywords" class="input-xxlarge" value="<?=$youtube_keywords;?>">      
        <label>YouTube Video SEO Description</label>
        <input type="text" name="youtube_desc" class="input-xxlarge" value="<?=$youtube_desc;?>">
      </fieldset>

      <div style="clear:both">&nbsp;</div>
      
      <div class="rows">
        <div class="span5">
          <frameset>
          <legend>Images</legend>
          <table class="table">
          	<thead>
            	<tr>
                	<th>Thumb</th>
                    <th>Name</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="subdivision_images">
            	<?php if(!empty($images)):?>
           	 	<?php foreach($images as $img):?>
                <tr>
                	<td><a href="<?=$base_url;?>/files/subdivisions_areas/images/<?php echo $img['file_name'];?>" rel="lightbox[sub_images]"><img src="<?=$base_url;?>/files/subdivisions_areas/images/<?php echo $img['file_name'];?>" width="75" /></td>
            		<td><?php echo $img['file_name'];?></td>
                    <td><a onClick="var remove = confirm('Delete Image?'); if(remove) window.location='delete-image.php?action=delete&id=<?=$img['id'];?>&file_name=<?=$img['file_name']?>&subdivision_id=<?=$id;?>;'" href="#"><i class="icon-trash"></i> Delete</a></td>
                </tr>
				<?php endforeach;?>
                <?php endif;?>
            </tbody>
          </table>
          </frameset>
        </div>
        <div class="span5 offset1">
          <frameset>
          <legend>Documents</legend>
          <table class="table">
          	<thead>
            	<tr>
                    <th>Name</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="subdivision_documents">
            	<?php if(!empty($documents)):?>
           	 	<?php foreach($documents as $doc):?>
                <tr>
                	<td><a href="/files/subdivisions_areas/documents/<?php echo $doc['file_name'];?>" target="_blank"><?php echo $doc['file_name'];?></a></td>
                	<td><a onClick="var remove = confirm('Delete Document?'); if(remove) window.location='delete-document.php?action=delete&id=<?=$doc['id'];?>&file_name=<?=$doc['file_name'];?>&subdivision_id=<?=$id;?>'" href="#"><i class="icon-trash"></i> Delete</a></td>
                </tr>
				<?php endforeach;?>
                <?php endif;?>
            </tbody>
          </table>
          </frameset>
        </div>
      </div>
      <div id="bootstrapped-fine-uploader"></div>
      <div id="bootstrapped-document-uploader"></div>
      <script src="<?=$assets;?>/js/jquery.fineuploader-3.0.js"></script> 
      <script>
  function createUploader() {
	// Load Document Uploader
	createDocumentUploader();
    
	var uploader = new qq.FineUploader({
      element: document.getElementById('bootstrapped-fine-uploader'),
      request: {
        endpoint: '<?=$panel_url;?>/uploadfile.php?type=community_image'
      },
        callbacks: {
            onComplete: function(id, filename, res)
            {
                if (res.success)
                {
                    var image = '<a href="/files/subdivisions_areas/images/'+res.url+'" rel="lightbox[sub_images]"><img src="/files/subdivisions_areas/images/'+res.url+'" width="75" /> - '+res.url+'</a>';
					$('#subdivision_images').append('<tr><td>'+image+'</td><td>'+res.url+'</td><td></td></tr>');
					
					// Database Update
					var post_data = {};
					post_data['file_name'] = filename;
					post_data['subdivision_area_id'] = '<?=$id;?>';
					post_data['file_type'] = '1';
					
					$.ajax({
							url: "community_file_update.php",
							type: "POST",
							data: post_data,
							success: function(data)
							{
																			
							} // end Success Function
						
						}); // End AJAX Request
                }
                
            } 
        },
      text: {
        uploadButton: '<i class="icon-upload icon-white"></i> Add New Image'
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
  
  function createDocumentUploader() {
    var uploader = new qq.FineUploader({
      element: document.getElementById('bootstrapped-document-uploader'),
      request: {
        endpoint: '<?=$panel_url;?>/uploadfile.php?type=document'
      },
        callbacks: {
            onComplete: function(id, filename, res)
            {
                if (res.success)
                {
                    var new_link = '<a href="/files/subdivisions_areas/documents/'+filename+'" target="_blank">'+filename+'</a>';
					$('#subdivision_documents').append('<tr><td>'+new_link+'</td><td></td></tr>');
					
					// Database Update
					var post_data = {};
					post_data['file_name'] = filename;
					post_data['subdivision_area_id'] = '<?=$id;?>';
					post_data['file_type'] = '2';
					
					$.ajax({
							url: "community_file_update.php",
							type: "POST",
							data: post_data,
							success: function(data)
							{
																			
							} // end Success Function
						
						}); // End AJAX Request

                }
                
            } 
        },
      text: {
        uploadButton: '<i class="icon-upload icon-white"></i> Add New Document'
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
      <div style="clear:both">&nbsp;</div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save Community</button>
        <a href="<?=$panel_url;?>/view.php?type=communities" class="btn btn-inverse">Cancel</a> </div>
    </form>
    <?php $count++; ?>
    <?php endwhile;?>
    <?php }
	else {
		//else table is empty
	?>
    <p class="alert alert-danger"><strong>NOTICE!</strong> There are no Communities in the database.</p>
    <p><a href="add.php?type=community" class="btn btn-success">Add Community &raquo;</a></p>
    <?php } ?>
  </div>
</div>
<?php
	mysql_close($con);