<?php 
$topping_id=$_GET["id"];

if($topping_id!="")
{ 
    include 'DataAccessLayer.php';
    $message=deleteTopping($topping_id);

}

header('Location: view-edit-toppings.php');
?>
