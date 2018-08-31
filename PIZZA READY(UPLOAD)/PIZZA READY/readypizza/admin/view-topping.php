<?php 
include 'admin-header.php';
$page_id="viewEditToppings";
$page_top_id="toppings";

include 'DataAccessLayer.php';
$message="";
$display_message="none";
$message_type="alert-danger";


if($_GET['id']!='')
{
    $topping_id=$_GET["id"];
    $topping=getToppingDetails($topping_id);
    $topping_name=$topping["topping_name"];
    $topping_price=$topping["topping_price"];
}

else
{
    header('Location: view-edit-toppings.php');
    exit();
}



?>

  
<div class="container">
  <div class="container">  
 <!-- <img src="images/Administrator.png" class="col-sm-offset-1  col-sm-5">-->
  <div class="col-sm-6 col-sm-offset-3" style="min-height:420px">
  <h3 class="text-center">View Topping</h3><br>
  <form id="editToppingForm" class="form-horizontal" role="form" method="get" action="edit-topping.php">
  <div class="form-group">
    <label class="control-label col-sm-4" for="topping_name">Topping Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="topping_name" name="topping_name" placeholder="Enter Topping Name"  readonly="readonly" value="<?php echo $topping_name; ?>">
    </div>
  </div>
 
  <div class="form-group">
    <label class="control-label col-sm-4" for="topping_price">Price:</label>
    <div class="col-sm-8">
      <input type="number" step="0.01" min="0"  class="form-control" id="topping_price" required="required" name="topping_price" placeholder="Enter Price"  readonly="readonly" value="<?php echo $topping_price; ?>">
    </div>
  </div>
  

  
   <input type="text" hidden="true" id="id" name="id" value="<?php echo $topping_id; ?>"/>
  <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in col-sm-offset-4" style="display:<?php echo $display_message ?>">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php echo $message ?>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-3">
      <button type="submit" class="btn btn-default">Edit Topping</button>
    </div>
  </div>
</form>
</div>
</div>


<?php 
include 'admin-footer.php';
?>
