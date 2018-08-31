<?php 
$user_id=$_GET["id"];

if($user_id!="")
{ 
    include 'DataAccessLayer.php';
    $message=disableUser($user_id);
}

header('Location: view-edit-users.php');
?>
