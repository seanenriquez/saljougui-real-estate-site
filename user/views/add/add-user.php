<div class="span9">
<ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li><a href="<?=$panel_url;?>/view.php?type=users">Users</a><span class="divider">/</span></li>
    <li class="active">Add User</li>
  </ul>
  <div class="well well-small">

    <h1>Add User</h1>
    <form action="<?=$_SERVER['PHP_SELF'] . '?type=users';?>" method="post" id="add-user-form">
    <input type="hidden" name="post_action" value="add_user">
     <legend><? if($update_status)
	{
		switch($update_status)
		{
			case "updated":
			?>
            <p class="alert alert-success">User added successfully!</p>
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
      <label>First Name</label>
      <input type="text" name="first_name" placeholder="John Q.">
      <label>Last Name</label>
      <input type="text" name="last_name" placeholder="Realtor">
      <label>Email</label>
      <input type="email" name="email" placeholder="johnq@tsgfl.com">
      <label>Password</label>
      <input type="text" name="password" value="password">
      <label>Phone</label>
      <input type="tel" name="phone" placeholder="555-123-4567">
      <legend></legend>
      <button type="submit" class="btn btn-success">Add User</button>
      <a href="<?=$panel_url;?>/view.php?type=users" class="btn btn-inverse">Cancel</a>
    </form>

  </div>
</div>