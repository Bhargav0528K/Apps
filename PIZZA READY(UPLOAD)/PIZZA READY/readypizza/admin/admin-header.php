<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
if( !isset($_SESSION["user_id"]) ){
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
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
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li id="home"><a href="index.php">Home</a></li>
        <li id="users" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Users <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="addUser"><a href="add-user.php">Add User</a></li>
            <li id="viewEditUsers"><a href="view-edit-users.php">View/Edit Users</a></li>
          </ul>

        </li>
        <li id="pizzas" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pizzas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="addPizza"><a href="add-pizza.php">Add Pizza</a></li>
             <li id="viewEditPizzas"><a href="view-edit-pizzas.php">View/Edit Pizzas</a></li>
          </ul>
        </li>
	<li id="toppings" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Toppings <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="addTopping"><a href="add-topping.php">Add Topping</a></li>
             <li id="viewEditToppings"><a href="view-edit-toppings.php">View/Edit Toppings</a></li>
          </ul>
        </li>

<li id="orders" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="currentOrders"><a href="current-orders.php">Current Orders</a></li>
             <li id="pastOrders"><a href="past-orders.php">Past Orders</a></li>
          </ul>
        </li>

        <li id="reports" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports<span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li id="mostOrderedItems"><a href="most-ordered-items.php">Most Ordered Items</a></li>
             <li id="mostOrderedDays"><a href="most-ordered-days.php">Most Ordered Days</a></li>
             <li id="avgTime"><a href="average-time.php">Average Time</a></li>

          </ul>
        </li>
       
         

      </ul>
      <ul class="nav navbar-nav navbar-right">
                <li id="logout"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
