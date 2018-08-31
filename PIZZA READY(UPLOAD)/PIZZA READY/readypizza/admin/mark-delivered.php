<?php 
$order_id=$_GET["id"];

if($order_id!="")
{ 
    include 'DataAccessLayer.php';
    $message=updateOrderDelivered($order_id);
}

header('Location: current-orders.php');
?>
