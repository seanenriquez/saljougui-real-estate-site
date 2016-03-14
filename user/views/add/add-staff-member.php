<div class="span9">
<ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=staff">Agents </a><span class="divider">/</span></li>
    <li class="active">Add Agent</li>
  </ul>
  <div class="well well-small">

    <h1>Add Agent</h1>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=staff';?>" method="post" id="add-staff-member-form">
      <input type="hidden" name="post_action" value="add_staff">
       <legend>
         <?php if($update_status)
	         {
		        switch($update_status)
		        {
			      case "updated":
			      ?>
                  <p class="alert alert-success">Agent added successfully!</p>
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
      
      <label>First Name</label>
      <input type="text" name="first_name" placeholder="John Q.">
      <label>Last Name</label>
      <input type="text" name="last_name" placeholder="Agent">
      <label>Email</label>
      <input type="email" name="email" placeholder="agent@tsgfl.com">
      <label>Phone</label>
      <input type="tel" name="phone" placeholder="555-123-4567">
      <label for="">Address</label>
      <input type="text" name="address" id="address" placeholder="1234 My Street, Melbourne, FL 32904" />
      <label>Website</label>
      <input type="text" name="website" id="website" placeholder="http://agent.thgfl.com" />
      <label for="">Active Rain</label>
      <input type="text" name="activerain" id="activerain" placeholder="http://activerain.com/agent" />
      <label for="">Facebook</label>
      <input type="text" name="facebook" id="facebook" placeholder="https://www.facebook.com/agent" />
      <label for="">Twitter</label>
      <input type="text" name="twitter" id="twitter" placeholder="https://www.twitter.com/agent" />
      <label for="">Linked In</label>
      <input type="text" name="linkedin" id="linkedin" placeholder="https://www.linkedin.com/in/agent" />
      
      <legend>Bio</legend>
      <textarea name="bio" id="bio" cols="30" rows="10"></textarea>
      
      <div class="clear">&nbsp;</div>
      
      <legend>Agent Testimonial</legend>
      <textarea name="testimonial" id="testimonial"></textarea>
      
      <div class="clear">&nbsp;</div>
      <button type="submit" class="btn btn-success">Save</button>
      <a href="<?=$panel_url;?>/view.php?type=staff" class="btn btn-inverse">Cancel</a>
      
    </form>

  </div>
</div>