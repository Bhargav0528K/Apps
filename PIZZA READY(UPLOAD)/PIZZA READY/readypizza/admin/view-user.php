<?php 
include 'admin-header.php';
$page_id="addUser";
$page_top_id="users";

include 'DataAccessLayer.php';
$message="";
$display_message="none";
$message_type="alert-danger";


if($_GET['id']!='')
{
    $user_id=$_GET["id"];
    $user=getUserDetails($user_id);
    $username=$user['username'];
    $name=$user['name'];
    $phone=$user['phone'];
    $email=$user['email'];
    $address=$user['address'];
}

else
{
    header('Location: view-edit-users.php');
    exit();
}



?>

  
<div class="container">
  <div class="container">  
 <!-- <img src="images/Administrator.png" class="col-sm-offset-1  col-sm-5">-->
  <div class="col-sm-6 col-sm-offset-3" style="min-height:420px">
  <h3 class="text-center">View User</h3><br>
  <form id="addUserForm" class="form-horizontal" role="form" method="get" action="edit-user.php">
  <div class="form-group">
    <label class="control-label col-sm-4" for="name">Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="name" readonly="readonly" name="name" value="<?php echo $name; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="phone">Phone:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="phone"  readonly="readonly" name="phone" value="<?php echo $phone; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="email">Email:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="email"  readonly="readonly" name="email" value="<?php echo $email; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="phone">Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address"  readonly="readonly" name="address" value="<?php echo $address; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="username">Username:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="username"  readonly="readonly" required="required" name="username" value="<?php echo $username; ?>">
    </div>
  </div>

  
   <input type="text" hidden="true" id="id" name="id" value="<?php echo $user_id; ?>"/>
  <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in col-sm-offset-4" style="display:<?php echo $display_message ?>">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php echo $message ?>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-3">
      <button type="submit" class="btn btn-default">Edit User</button>
    </div>
  </div>
</form>
</div>
</div>


<?php 
include 'admin-footer.php';
?>
