<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
$invalid_login="none";
$username=$_POST["username"];
$password=$_POST["password"];
if($username!="")
{
  include 'DataAccessLayer.php';
  $user_id=userLogin($username,$password);
  if($user_id>0)
  {
    $_SESSION["app_user_id"]=$user_id;
    header("location:home.php");
      exit();
  }
  else
  {
    $invalid_login = "block";
  }
}
include 'app-login-header.php';
$page_id="home";
$page_top_id="";

?>

<style>
body{
  background: url(images/pizzaback.jpg);

}
.jumbotron{
      min-height: 420px;
    opacity: 0.9;
}
</style>
  
<div class="container">  
 <!-- <img src="images/Administrator.png" class="col-sm-offset-1  col-sm-5">-->
  <div class="jumbotron col-sm-6 col-sm-offset-3" style="min-height:420px">
  <h3 class="text-center">Ready Pizza</h3>
  <p  class="text-center">Welcome To The User Panel</p><br>
  <form class="form-horizontal" role="form" method="post" action="login.php">
  <div class="form-group">
    <label class="control-label col-sm-3" for="username">Username:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="username" required="required" name="username" placeholder="Enter username">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="password">Password:</label>
    <div class="col-sm-9"> 
      <input type="password" class="form-control" id="password" required="required" name="password" placeholder="Enter password">
    </div>
  </div>
  <div id="invalidLogin" class="alert alert-danger fade in col-sm-offset-3" style="display:<?php echo $invalid_login ?>">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Invalid Login!</strong> Please try again!.
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-3">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
</div>

</div>
<script type="text/javascript">
	setTimeout(function(){$("#invalidLogin").alert("close");},10000);
</script>

<?php 
include 'app-login-footer.php';
?>