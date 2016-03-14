<?php
//prevent non-administrative users from accessing this page
include('includes/secure.php');
include('includes/config.php');
$sql = $dbpdo->prepare("SELECT * FROM `staff` ORDER BY `last_name`,`first_name` ASC");
$sql->execute();
$num_rows = $sql->rowCount();
?>

<div class="span9">
  <ul class="breadcrumb">
    <li><a href="<?=$panel_url;?>">Home</a> <span class="divider">/</span></li>
    <li class="active">View Staff</li>
  </ul>
  <div class="well well-small">
    <h1>View Staff</h1>

    <?php switch($status)
    {
      case "deleted":
        ?>
        <p class="alert alert-success">Staff member removed successfully!</p>
        <?php
        break;

      case "disabled":
        ?>
        <p class="alert alert-success">Staff member disabled successfully!</p>
        <?php
        break;

      case "enabled":
        ?>
        <p class="alert alert-success">Staff member enabled successfully!</p>
        <?php
        break;
    }

    if($num_rows <> 0)
    {
      $count = 1;
      ?>
      <table class="table table-striped table-bordered">
        <p>Number of Staff members in database:
          <?=$num_rows;?>
        </p>
        <legend></legend>
        <p><a href="add.php?type=staff" class="btn btn-success">Add Staff &raquo;</a></p>
        <thead>
          <tr>
            <th>Pic</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($row = $sql->fetch())
            {
              extract($row);
              if(file_exists($_SERVER['DOCUMENT_ROOT'].'/images/staff/'.$profile_pic))
              {
                $agent_img = '/images/staff/'.$profile_pic;
              }
              else
              {
                $agent_img = 'images/staff/no_pic.gif';
              }
              ?>
              <tr id="staff_<?=$count;?>">
                <td><img src="<?=$agent_img;?>" style="max-width:50px;" /></td>
                <td><?=$last_name . ', ' . $first_name;?></td>
                <td><a href="mailto:<?=$email;?>" title="Send <?=$first_name;?> an email">
                    <?=$email;?>
                  </a></td>
                <td><?=$phone;?></td>
               
                <td><div class="btn-group"> <a class="btn btn-mini btn-primary" href="edit.php?type=staff&id=<?=$id;?>"><i class="icon-edit icon-white"></i> Edit</a> <a class="btn btn-mini btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="edit.php?type=staff&id=<?=$id;?>"><i class="icon-pencil"></i> Edit</a></li>
                      <li><a href="javascript:delete_staff('<?=$id;?>','<?=$count;?>');"><i class="icon-trash"></i> Delete</a></li>
                    </ul>
                  </div></td>
              </tr>
              <?php
              $count++;
            }
          ?>
        </tbody>
      </table>
      <?php
    }
    else
    {
      ?>
      <p class="alert alert-danger"><strong>NOTICE!</strong> There are no staff members in the database.</p>
      <p><a href="add.php?type=staff" class="btn btn-success">Add Staff Member &raquo;</a></p>
      <?php
    }
    ?>
  </div>
</div>