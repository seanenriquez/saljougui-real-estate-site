<?php
$citysql = "SELECT distinct city FROM master_rets_table order by city asc";
$cities = mysql_query($citysql) or die(mysql_error());
?>
<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=subdivisions">Communities</a><span class="divider">/</span></li>
    <li class="active">Add Community</li>
  </ul>
  <div class="well well-small">

    <h1>Add Community</h1>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=community';?>" method="post" id="add-subdivision-form">
      <input type="hidden" name="post_action" value="add_subdivision">
      <legend>
        <?php if($update_status)
        {
          switch($update_status)
          {
            case "added":
              ?>
              <p class="alert alert-success">Community added successfully!</p>
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
      ?>
      </legend>

      <label>City</label>
      <select name="city">
        <?php while($rowCity = mysql_fetch_array($cities)){ ?>
          <option value="<?= $rowCity['city']?>"><?= $rowCity['city']?></option>
          <?php } ?>
      </select>

      <label>Community Name</label>
      <input type="text" name="subdivision_area_name" value="<?=$subdivision_area_name;?>">
      <label>Community Headline</label>
      <input type="text" name="headline" class="input-xxlarge" value="<?=$headline;?>">
      <label>Page Link</label>
      <input type="text" name="additional_info_link" value="<?=$additional_info_link;?>">  
      <label>SEO Keywords</label>
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
      <button type="submit" class="btn btn-success">Add Community</button>
      <a href="<?=$panel_url;?>/view.php?type=subdivisions" class="btn btn-inverse">Cancel</a>
    </form>

  </div>
</div>