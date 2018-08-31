<?php 
include 'admin-header.php';
$page_id="addUser";
$page_top_id="users";

$message="";
$display_message="none";
$message_type="alert-danger";
$username=$_POST["username"];
$password=$_POST["password"];
$email=$_POST["email"];

$address=$_POST["address"];

$confirm_password=$_POST["confirmPassword"];
$name=$_POST["name"];
$phone=$_POST["phone"];
if($username!="")
{
  $display_message="block";
	include 'DataAccessLayer.php';
	if($password!=$confirm_password)
	{
		$message="<strong>Paswords dont match!</strong> Please try again!";   
	}
	else
	{
	$message=addUser($username,$password,$name,$phone,$email,$address);
	if($message=="SUCCESS")
	{
		$message="<strong>SUCCESS!</strong> User added to the system!";
    $message_type="alert-success";
	}
	else
	{
		$message="<strong>FAILURE!</strong> " . $message . "!";
	}
}
}
?>

  
<div class="container">
  <div class="container">  
 <!-- <img src="images/Administrator.png" class="col-sm-offset-1  col-sm-5">-->
  <div class="col-sm-6 col-sm-offset-3" style="min-height:420px">
  <h3 class="text-center">Add User</h3><br>
  <form id="addUserForm" class="form-horizontal" role="form" method="post" action="add-user.php">
  <div class="form-group">
    <label class="control-label col-sm-4" for="name">Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="phone">Phone:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="username">Username:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="username" required="required" name="username" placeholder="Enter username">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="password">Password:</label>
    <div class="col-sm-8"> 
      <input type="password" class="form-control" id="password" required="required" name="password" placeholder="Enter password">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="password">Confirm Password:</label>
    <div class="col-sm-8"> 
      <input type="password" class="form-control" id="comfirmPassword" name="confirmPassword" required="required"  placeholder="Re-enter password">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="email">Email:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="email" required="required" name="email" placeholder="Enter email">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="address">Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address" required="required" name="address" placeholder="Enter address">
    </div>
  </div>
  <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in col-sm-offset-4" style="display:<?php echo $display_message ?>">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php echo $message ?>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-3">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
</div>
</div>


<?php 
include 'admin-footer.php';
?>
