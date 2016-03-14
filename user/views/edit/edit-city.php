<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
//prevent non-administrative users from accessing this page
include('includes/secure.php');
//show existing pages table
$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $con) or die(mysql_error());
$sql = "SELECT * FROM `city_information` WHERE id = '$id'";
$result = mysql_query($sql) or die(mysql_error());
$num_rows = mysql_num_rows($result);

$citysql = "SELECT distinct community_area_information.city 
FROM community_area_information 
ORDER BY community_area_information.city asc";
$cities = mysql_query($citysql) or die(mysql_error());

if($num_rows > 0)
{
  // Get Files
  $sql_file = "SELECT * FROM `cities_files` WHERE `cities_id` = '$id'";
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

$agentsql = "SELECT *
FROM staff 
ORDER BY first_name ASC";
$agents = mysql_query($agentsql) or die(mysql_error());

?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="view.php?type=city">Cities</a> <span class="divider">/</span></li>
    <li class="active">Edit City</li>
  </ul>
  <div class="well well-small">
    <h1>Edit City</h1>
    <legend></legend>
    <?php switch($status) {

      case "updated":
        ?>
        <p class="alert alert-success">City updated successfully!</p>
        <?php
        break;        
      case "deleted":
        ?>
        <p class="alert alert-success">City removed successfully!</p>
        <?php
        break;	        
      case "disabled":
        ?>
        <p class="alert alert-success">City disabled successfully!</p>
        <?php
        break;	        
      case "enabled":
        ?>
        <p class="alert alert-success">City enabled successfully!</p>
        <?php
        break;	        
      case "deleted_image":
        ?>
        <p class="alert alert-success">Image deleted successfully!</p>
        <?php
        break;
    }
    ?>

    <?php
    if($num_rows <> 0)
    {
      $count = 1;

      while($row = mysql_fetch_array($result)):
        extract($row);
        //loop through the Cities  table
        ?>
        <form action="<?=$_SERVER['PHP_SELF'];?>?type=city&id=<?=$id;?>" method="post" name="edit-city-form">
          <input type="hidden" name="post_action" value="update_city">
          <input type="hidden" name="id" value="<?=$id;?>">
          <label>City</label>
          <input type="text" name="city" value="<?=$city;?>">  
          <label>City Headline</label>
          <input type="text" name="headline" class="input-xxlarge" value="<?=$headline;?>">  
          
          <label>City Agent</label>
          <select name="agent_id">    
            <?php while($rowAgent = mysql_fetch_array($agents)){ ?>
              <option value="<?= $rowAgent['id']?>" <?= ($rowAgent['id']==$agent_id?"selected":"") ?>><?= $rowAgent['first_name']?></option>
            <?php } ?>
          </select>   

          <label>City Page Description</label>
          <textarea name="content"><?=$content;?></textarea>
          <br>

          <label>Page Link</label>
          <input type="text" name="additional_info_link" value="<?=$additional_info_link;?>">  
          <label>City SEO Keywords</label>
          <input type="text" name="keywords" class="input-xxlarge" value="<?=$keywords;?>">

          <br>
          <label>YouTube Video ID</label>
          <input type="text" name="youtube_id" value="<?=$youtube_id;?>">
          <label>YouTube Video SEO Title</label>
          <input type="text" name="youtube_keywords" class="input-xxlarge" value="<?=$youtube_keywords;?>">      
          <label>YouTube Video SEO Description</label>
          <input type="text" name="youtube_desc" class="input-xxlarge" value="<?=$youtube_desc;?>">

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
                          <td><a href="/files/cities/images/<?php echo $img['file_name'];?>" rel="lightbox[sub_images]"><img src="/files/cities/images/<?php echo $img['file_name'];?>" width="75" /></td>
                          <td><?php echo $img['file_name'];?></td>
                          <td><a onClick="var remove = confirm('Delete Image?'); if(remove) window.location='delete-image.php?action=delete&id=<?=$img['id'];?>&file_name=<?=$img['file_name']?>&cities_id=<?=$id;?>;'" href="#"><i class="icon-trash"></i> Delete</a></td>
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
                          <td><a href="/files/cities/documents/<?php echo $doc['file_name'];?>" target="_blank"><?php echo $doc['file_name'];?></a></td>
                          <td><a onClick="var remove = confirm('Delete Document?'); if(remove) window.location='delete-document.php?action=delete&id=<?=$doc['id'];?>&file_name=<?=$doc['file_name'];?>&cities_id=<?=$id;?>'" href="#"><i class="icon-trash"></i> Delete</a></td>
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
                  endpoint: 'uploadfile.php?type=cities_image'
                },
                callbacks: {
                  onComplete: function(id, filename, res)
                  {
                    if (res.success)
                    {
                      var image = '<a href="/files/cities/images/'+res.url+'" rel="lightbox[sub_images]"><img src="/files/cities/images/'+res.url+'" width="75" /> - '+res.url+'</a>';
                      $('#subdivision_images').append('<tr><td>'+image+'</td><td>'+res.url+'</td><td></td></tr>');

                      // Database Update
                      var post_data = {};
                      post_data['file_name'] = filename;
                      post_data['cities_id'] = '<?=$id;?>';
                      post_data['file_type'] = '1';

                      $.ajax({
                        url: "cities_update.php",
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
                  endpoint: 'uploadfile.php?type=cities_image'
                },
                callbacks: {
                  onComplete: function(id, filename, res)
                  {
                    if (res.success)
                    {
                      var new_link = '<a href="/files/cities/documents/'+filename+'" target="_blank">'+filename+'</a>';
                      $('#subdivision_documents').append('<tr><td>'+new_link+'</td><td></td></tr>');

                      // Database Update
                      var post_data = {};
                      post_data['file_name'] = filename;
                      post_data['cities_id'] = '<?=$id;?>';
                      post_data['file_type'] = '2';

                      $.ajax({
                        url: "cities_update.php",
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
            <button type="submit" class="btn btn-primary">Save City</button>
          <a href="view.php?type=city" class="btn btn-inverse">Cancel</a> </div>
        </form>
        <?php $count++; ?>
        <?php endwhile;?>
      <?php }
    else {
      //else table is empty
      ?>
      <p class="alert alert-danger"><strong>NOTICE!</strong> There are no City in the database.</p>
      <p><a href="add.php?type=city" class="btn btn-success">Add City &raquo;</a></p>
      <?php } ?>
  </div>
</div>
<?php
mysql_close($con);