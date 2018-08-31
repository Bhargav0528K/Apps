<?php 
error_reporting(E_ERROR | E_PARSE);
if(isset($_SESSION["app_user_id"]) ){
    header("location:home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
 <div class="container-fluid">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Ready Pizza</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li id="home"><a href="index.php">Home</a></li>	
        </ul>
         <ul class="nav navbar-nav navbar-right">
        <li id="login"><a href="login.php"><span class="glyphicon glyphicon-user"></span>Login</a></li>
        <li id="signup"><a href="register.php"><span class="glyphicon glyphicon-log-out"></span>Sign Up</a></li>
      </ul>
    </div>

  </div>
</nav>
