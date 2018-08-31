<?php 
include 'admin-header.php';
$page_id="addPizza";
$page_top_id="pizzas";

$message="";
$display_message="none";
$message_type="alert-danger";
$pizza_name=$_POST["pizza_name"];
$pizza_image=$_POST["pizza_image"];
$pizza_regularprice=$_POST["pizza_regularprice"];
$pizza_mediumprice=$_POST["pizza_mediumprice"];
$pizza_largeprice=$_POST["pizza_largeprice"];


if($pizza_name!="")
{
  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["pizza_image"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  move_uploaded_file($_FILES["pizza_image"]["tmp_name"], $target_file);

  $display_message="block";
	include 'DataAccessLayer.php';
	$message=addPizza($pizza_name,$target_file,$pizza_regularprice,$pizza_mediumprice,$pizza_largeprice);
	if($message=="SUCCESS")
	{
		$message="<strong>SUCCESS!</strong> Pizza added to the system!";
    $message_type="alert-success";
	}
	else
	{
		$message="<strong>FAILURE!</strong> " . $message . "!";
	}
}
?>

  
<div class="container">
  <div class="container">  
 <!-- <img src="images/Administrator.png" class="col-sm-offset-1  col-sm-5">-->
  <div class="col-sm-6 col-sm-offset-3" style="min-height:420px">
  <h3 class="text-center">Add Pizza</h3><br>
  <form id="addPizzaForm" class="form-horizontal" role="form" method="post" action="add-pizza.php" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-4" for="pizza_name">Pizza Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="pizza_name" name="pizza_name" placeholder="Enter Pizza Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="pizza_image">Pizza Image:</label>
    <div class="col-sm-8">
      <input type="file" class="form-control" id="pizza_image" name="pizza_image" placeholder="Enter Image">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="pizza_regularprice">Regular Price:</label>
    <div class="col-sm-8">
      <input type="number" step="0.01" min="0"  class="form-control" id="pizza_regularprice" required="required" name="pizza_regularprice" placeholder="Enter Regular Price">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="pizza_mediumprice">Medium Price:</label>
    <div class="col-sm-8">
      <input type="number" step="0.01" min="0" class="form-control" id="pizza_mediumprice" required="required" name="pizza_mediumprice" placeholder="Enter Medium Price">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="pizza_Largeprice">Large Price:</label>
    <div class="col-sm-8">
      <input type="number" step="0.01" min="0" class="form-control" id="pizza_largeprice" required="required" name="pizza_largeprice" placeholder="Enter Large Price">
    </div>
  </div>
  
  <div id="invalidLogin" class="alert <?php echo $message_type ?> fade in col-sm-offset-4" style="display:<?php echo $display_message ?>">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php echo $message ?>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-3">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
</div>
</div>


<?php 
include 'admin-footer.php';
?>
