<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
if( !isset($_SESSION["app_user_id"]) ){
    header("location:login.php");
    exit();
}
else{
//header("location:../GateRoom.php");
//exit();
}

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ready Pizza</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.8/css/dataTables.bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
  <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js"></script>
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
        <li id="order-online"><a href="order-online.php">Order Online</a></li>
        <li id="myOrders"><a href="my-orders.php">My Orders</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li id="myAccount"><a href="my-account.php"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
        <li id="logout"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
