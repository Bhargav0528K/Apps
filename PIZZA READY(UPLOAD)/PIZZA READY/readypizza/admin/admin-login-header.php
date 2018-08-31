<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_SESSION["user_id"]) ){
    header("location:index.php");
    exit();
}
$invalid_login="none";
$username=$_POST["username"];
$password=$_POST["password"];
if($username!="")
{
	include 'DataAccessLayer.php';
	$user_id=adminLogin($username,$password);
	if($user_id>0)
	{
		$_SESSION["user_id"]=$user_id;
		header("location:index.php");
    	exit();
	}
	else
	{
		$invalid_login = "block";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
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
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li id="home"><a href="login.php">Home</a></li>
    </div>
  </div>
</nav>
