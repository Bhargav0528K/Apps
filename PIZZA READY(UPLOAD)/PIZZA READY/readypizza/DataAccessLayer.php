<?php
//Variables for connecting to your database.
//These variable values come from your hosting account.
$hostname = "localhost";
$db_username = "root";
$dbname = "readypizza";
$db_password = "";


mysql_connect($hostname, $db_username, $db_password) OR DIE ("Unable to
connect to database! Please try again later.");
mysql_select_db($dbname);


function adminLogin($username,$password){
    $query = sprintf("SELECT * FROM tbl_users WHERE type='admin' AND username='%s' AND password='%s'", safe($username), safe($password));
  $result = mysql_query($query);
  $num = mysql_num_rows ($result);
  if ($num==1) {
    $row = mysql_fetch_array($result);
    $user_id=$row['user_id'];
    return $user_id;
  } 
  else {
    return 0;
  }
}

function userLogin($username,$password){
  $query = sprintf("SELECT * FROM tbl_users WHERE type='user' AND state='Enabled' AND username='%s' AND password='%s'", safe($username), safe($password));
  $result = mysql_query($query);
  $num = mysql_num_rows ($result);
  if ($num==1) {
    $row = mysql_fetch_array($result);
    $user_id=$row['user_id'];
    return $user_id;
  } 
  else {
    return 0;
  }
}

function userExists($username){
  $query = sprintf("SELECT * FROM tbl_users WHERE type='user' AND username='%s'", safe($username));
  $result = mysql_query($query);
  $num = mysql_num_rows ($result);
  if ($num==1) {
    $row = mysql_fetch_array($result);
    $user_id=$row['user_id'];
    return $user_id;
  } 
  else {
    return 0;
  }
}

function getUserDetails($user_id){
  $query = sprintf("SELECT * FROM tbl_users WHERE user_id='%s'", $user_id);
  $result = mysql_query($query);
  $row = mysql_fetch_array($result);
  return $row;
}



function addUser($username,$password,$name,$phone,$email,$address){
  $query = sprintf("INSERT INTO tbl_users  (username, password, type, name, phone,state,email,address) VALUES ('%s','%s','user','%s','%s','Enabled','%s','%s')", $username,$password,$name,$phone,$email,$address);
  if (mysql_query($query)) {
    return "SUCCESS";
  }
  else {
    return mysql_error();
  }
}

function editUserDetails($user_id,$username,$password,$name,$phone,$email,$address){
  $query = sprintf("UPDATE tbl_users SET username='%s', password='%s', name='%s', phone='%s',email='%s', address='%s' WHERE type='user' and user_id='%s'", $username,$password,$name,$phone,$email,$address,$user_id);
  if (mysql_query($query)) {
    return "SUCCESS";
  }
  else {
    return mysql_error();
  }
}

function disableUser($user_id){
    $query = sprintf("UPDATE tbl_users SET state='Disabled' WHERE type='user' and user_id='%s'", $user_id);
  if (mysql_query($query)) {
    return "SUCCESS";
  }
  else {
    return mysql_error();
  }
}

function enableUser($user_id){
    $query = sprintf("UPDATE tbl_users SET state='Enabled' WHERE type='user' and user_id='%s'", $user_id);
    if (mysql_query($query)) {
    return "SUCCESS";
  }
  else {
    return mysql_error();
  }
}

function getUsers()
{
    $result = mysql_query("SELECT * FROM tbl_users  WHERE type='user'");
  $values = array();
  $i=0;
  while($row = mysql_fetch_array($result)) 
  {
    $values[] = $row;
  }
  return $values;
}

function addPizza($pizza_name,$pizza_image,$pizza_regularprice,$pizza_mediumprice,$pizza_largeprice){
  $query = sprintf("INSERT INTO tbl_pizzas  (pizza_name, pizza_image, pizza_regularprice, pizza_mediumprice, pizza_largeprice) VALUES ('%s','%s','%lf','%lf','%lf')", $pizza_name,$pizza_image,$pizza_regularprice,$pizza_mediumprice,$pizza_largeprice);
  if (mysql_query($query)) {
    return "SUCCESS";
  }
  else {
    return mysql_error();
  }
}

function editPizzaDetails($pizza_id,$pizza_name,$pizza_image,$pizza_regularprice,$pizza_mediumprice,$pizza_largeprice){
  $query = sprintf("UPDATE tbl_pizzas SET pizza_name='%s', pizza_image='%s', pizza_regularprice='%lf', pizza_mediumprice='%lf',pizza_largeprice='%lf' WHERE pizza_id=%d", $pizza_name,$pizza_image,$pizza_regularprice,$pizza_mediumprice,$pizza_largeprice,$pizza_id);
  if (mysql_query($query)) {
    return "SUCCESS";
  }
  else {
    return mysql_error();
  }
}

function getPizzaDetails($pizza_id){
  $query = sprintf("SELECT * FROM tbl_pizzas WHERE pizza_id=%d", $pizza_id);
  $result = mysql_query($query);
  $row = mysql_fetch_array($result);
  return $row;
}

function getPizzas()
{
    $result = mysql_query("SELECT * FROM tbl_pizzas");
  $values = array();
  $i=0;
  while($row = mysql_fetch_array($result)) 
  {
    $values[] = $row;
  }
  return $values;
}

function deletePizza($pizza_id){
  $query = sprintf("DELETE FROM tbl_pizzas WHERE  pizza_id= %d", $pizza_id);
  if (mysql_query($query)) {
    return "SUCCESS";
  }
  else {
    return mysql_error();
  }
}

function addTopping($topping_name,$topping_price){
  $query = sprintf("INSERT INTO tbl_toppings  (topping_name, topping_price) VALUES ('%s','%lf')", $topping_name,$topping_price);
  if (mysql_query($query)) {
    return "SUCCESS";
  }
  else {
    return mysql_error();
  }
}

function editToppingDetails($topping_id,$topping_name,$topping_price){
  $query = sprintf("UPDATE tbl_toppings SET topping_name='%s', topping_price='%lf' WHERE topping_id=%d", $topping_name,$topping_price,$topping_id);
  if (mysql_query($query)) {
    return "SUCCESS";
  }
  else {
    return mysql_error();
  }
}

function getToppingDetails($topping_id){
  $query = sprintf("SELECT * FROM tbl_toppings WHERE topping_id=%d", $topping_id);
  $result = mysql_query($query);
  $row = mysql_fetch_array($result);
  return $row;
}

function getToppings()
{
    $result = mysql_query("SELECT * FROM tbl_toppings");
  $values = array();
  $i=0;
  while($row = mysql_fetch_array($result)) 
  {
    $values[] = $row;
  }
  return $values;
}

function deleteTopping($topping_id){
  $query = sprintf("DELETE FROM tbl_toppings WHERE  topping_id= %d", $topping_id);
  if (mysql_query($query)) {
    return "SUCCESS";
  }
  else {
    return mysql_error();
  }
}

function addOrder($user_id){
  $query = sprintf("INSERT INTO tbl_orders  (user_id, order_time,order_status) VALUES (%d,now(),'Ordered')",$user_id);
  if (mysql_query($query)) {
    return mysql_insert_id();
  }
  else {
    return mysql_error();
  }
}

function addOrderItem($order_id,$item_name,$item_size,$item_qty,$item_amt){
  $query = sprintf("INSERT INTO tbl_orderitems  (order_id, item_name,item_size,item_qty,item_amt) VALUES (%d,'%s','%s','%s','%s')",$order_id,$item_name,$item_size,$item_qty,$item_amt);
  if (mysql_query($query)) {
    return mysql_insert_id();
  }
  else {
    return mysql_error();
  }
}


function getOrderItems($order_id)
{
  $result = mysql_query(sprintf("SELECT * FROM tbl_orderitems where order_id=%d",$order_id));
  $values = array();
  $i=0;
  while($row = mysql_fetch_array($result)) 
  {
    $values[] = $row;
  }
  return $values;
}

function getUserOrders($user_id)
{
  $result = mysql_query(sprintf("SELECT * FROM tbl_orders where user_id=%d",$user_id));
  $values = array();
  $i=0;
  while($row = mysql_fetch_array($result)) 
  {
    $values[] = $row;
  }
  return $values;
}


function safe($value){ 
   return mysql_real_escape_string($value); 
} 
?>