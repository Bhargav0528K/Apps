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

else if($_POST["username"]!='')
{
$user_id=$_POST["user_id"];
$username=$_POST["username"];
$password=$_POST["password"];
$confirm_password=$_POST["confirmPassword"];
$name=$_POST["name"];
$phone=$_POST["phone"];
$email=$_POST["email"];

$address=$_POST["address"];

if($username!="")
{
  $display_message="block";
    
    if($password!=$confirm_password)
	{
		$message="<strong>Paswords dont match!</strong> Please try again!";   
	}
	else
	{
	$message=editUserDetails($user_id,$username,$password,$name,$phone,$email,$address);
	if($message=="SUCCESS")
	{
		$message="<strong>SUCCESS!</strong> User updated in the system!";
    $message_type="alert-success";
	}
	else
	{
		$message="<strong>FAILURE!</strong> " . $message . "!";
	}
}
}
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
  <h3 class="text-center">Edit User</h3><br>
  <form id="addUserForm" class="form-horizontal" role="form" method="post" action="edit-user.php">
  <div class="form-group">
    <label class="control-label col-sm-4" for="name">Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="phone">Phone:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="email">Email:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="email"   name="email" value="<?php echo $email; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="phone">Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="address"  name="address" value="<?php echo $address; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="username">Username:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="username" required="required" name="username" value="<?php echo $username; ?>">
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
   <input type="text" hidden="true" id="user_id" name="user_id" value="<?php echo $user_id; ?>"/>
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
