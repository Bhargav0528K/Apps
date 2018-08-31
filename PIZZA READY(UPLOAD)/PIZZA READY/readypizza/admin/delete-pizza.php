<?php 
$pizza_id=$_GET["id"];

if($pizza_id!="")
{ 
    include 'DataAccessLayer.php';
    $message=deletePizza($pizza_id);

}

header('Location: view-edit-pizzas.php');
?>
