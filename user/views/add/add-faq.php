<div class="span9">
<ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=faq">FAQS</a><span class="divider">/</span></li>
    <li class="active">Add FAQ</li>
  </ul>
  <div class="well well-small">

    <h1>Add FAQ</h1>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=faq';?>" method="post" id="add-faq-form">
    <input type="hidden" name="post_action" value="add_faq">
     <legend><? if($update_status)
	{
		switch($update_status)
		{
			case "added":
			?>
            <p class="alert alert-success">FAQ added successfully!</p>
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
      <label>Question</label>
      <input name="question" id="question" type="text" class="input-xxlarge">
      <label>Category</label>
      <select name="category_id">
      	<?php
			$con = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
			mysql_select_db($dbname, $con) or die(mysql_error());
			$sql = "SELECT * FROM faq_category";
			$result = mysql_query($sql) or die(mysql_error());
		?>
      	<option value="0">(Select Category)</option>
        <?php
			while($category = mysql_fetch_assoc($result)){
				echo '<option value="'.$category['id'].'">'.$category['category'].'</option>';
			}
		?>
      </select>
      <label>Answer</label>
      <textarea name="answer" style="height:400px;"></textarea>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Save FAQ</button>
        <a href="<?=$panel_url;?>/view.php?type=faq" class="btn btn-inverse">Cancel</a> </div>
    </form>

  </div>
</div>