<?php 
include 'admin-header.php';
$page_id="viewEditToppings";
$page_top_id="toppings";
?>

  
<div class="container">
  <h3 class="text-center">All Toppings</h3>
  
  <table id="toppingTable" class="table table-condensed table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Topping Name</th>
        <th>Price</th>
        <th>View / Edit  / Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'DataAccessLayer.php';
    $toppings=getToppings();
    for ($i=0;$i<count($toppings);$i++)
    {
        echo "<tr><td>" . $toppings[$i]['topping_name'] . "</td><td>" . $toppings[$i]['topping_price'] . "</td><td><a href='view-topping.php?id=" . $toppings[$i]['topping_id'] . "'>View</a> / <a href='edit-topping.php?id=" . $toppings[$i]['topping_id'] . "'>Edit</a> / <a href='delete-topping.php?id=" . $toppings[$i]['topping_id'] . "'>Delete</a></td></tr>";
        
    }    
    ?>    
    </tbody>
  </table>
  
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#toppingTable').DataTable();
} );
</script>

<?php 
include 'admin-footer.php';
?>