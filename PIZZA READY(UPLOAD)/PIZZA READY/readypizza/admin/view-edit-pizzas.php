<?php 
include 'admin-header.php';
$page_id="viewEditPizzas";
$page_top_id="pizzas";
?>

  
<div class="container">
  <h3 class="text-center">All Pizzas</h3>
  
  <table id="pizzaTable" class="table table-condensed table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Pizza Name</th>
        <th>Regular Price</th>
        <th>Medium Price</th>
        <th>Large Price</th>
        <th>View / Edit  / Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'DataAccessLayer.php';
    $pizzas=getPizzas();
    for ($i=0;$i<count($pizzas);$i++)
    {
        echo "<tr><td>" . $pizzas[$i]['pizza_name'] . "</td><td>" . $pizzas[$i]['pizza_regularprice'] . "</td><td>" . $pizzas[$i]['pizza_mediumprice'] . "</td><td>" . $pizzas[$i]['pizza_largeprice'] . "</td><td><a href='view-pizza.php?id=" . $pizzas[$i]['pizza_id'] . "'>View</a> / <a href='edit-pizza.php?id=" . $pizzas[$i]['pizza_id'] . "'>Edit</a> / <a href='delete-pizza.php?id=" . $pizzas[$i]['pizza_id'] . "'>Delete</a></td></tr>";
        
    }    
    ?>    
    </tbody>
  </table>
  
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#pizzaTable').DataTable();
} );
</script>

<?php 
include 'admin-footer.php';
?>