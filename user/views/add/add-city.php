<?php
$agentsql = "SELECT *
FROM staff 
ORDER BY first_name ASC";
$agents = mysql_query($agentsql) or die(mysql_error());

?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="/user">Home</a> <span class="divider">/</span></li>
    <li><a href="view.php?type=city">Cities</a><span class="divider">/</span></li>
    <li class="active">Add City</li>
  </ul>
  <div class="well well-small">

    <h1>Add City</h1>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=city';?>" method="post" id="add-city-form">
      <input type="hidden" name="post_action" value="add_city">
      <legend>
        <?php if($update_status)
        {
          switch($update_status)
          {
            case "added":
              ?>
              <p class="alert alert-success">City added successfully!</p>
              <?php
              break;

            case "error":
              ?>
              <p class="alert alert-danger">There was an error updating the database. Please try again.</p>
              <?php
              break;

            default:
              //should not be here
              break;
          }
        }
      ?></legend>

      <label>City</label> 
      <input type="text" name="city" class="input-xxlarge" >  
      
      <label>City Headline</label>  
      <input type="text" name="headline" class="input-xxlarge" >  
      
      <label>City Agent</label>
        <select name="agent_id">    
        <?php while($rowAgent = mysql_fetch_array($agents)){ ?>
          <option value="<?= $rowAgent['id']?>" ><?= $rowAgent['first_name']?></option>
        <?php } ?>
        </select>              

      <label>Page Link</label>
      <input type="text" name="additional_info_link" class="input-xxlarge" >  
      <label>SEO Keywords</label>
      <input type="text" name="keywords" class="input-xxlarge" >
      <label>City Description</label>
      <textarea name="content"></textarea>
      <br>
      <br>
      <label>YouTube Video ID</label>
      <input type="text" name="youtube_id" class="input-xxlarge">
      <label>YouTube Video SEO Title</label>
      <input type="text" name="youtube_keywords" class="input-xxlarge" >      
      <label>YouTube Video SEO Description</label>
      <input type="text" name="youtube_desc" class="input-xxlarge" >

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
              <tbody id="city_images">
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
              <tbody id="cities_documents">
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

              onComplete: function(id, filename, res) {

                if (res.success) {
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
      <button type="submit" class="btn btn-success">Add City</button>
      <a href="view.php?type=city" class="btn btn-inverse">Cancel</a>
    </form>

  </div>
</div>