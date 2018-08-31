<?php 
$order_id=$_GET["id"];

if($order_id!="")
{ 
    include 'DataAccessLayer.php';
    $message=updateOrderPrepared($order_id);
}

header('Location: current-orders.php');
?>
