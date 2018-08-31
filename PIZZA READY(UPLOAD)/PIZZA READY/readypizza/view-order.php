<?php 
include 'app-header.php';
$page_id="myOrders";
$page_top_id="";
$order_id=0;
if($_GET['id']!='')
{
    $order_id=$_GET["id"];
}

else
{
    header('Location: my-orders.php');
    exit();
}
?>

  
<div class="container">
  <h3 class="text-center">View Order</h3>
  
  <table id="userTable" class="table table-condensed table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Item Name</th>
        <th>Item Size</th>
        <th>Item Qty</th>
        <th>Item Amount</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'DataAccessLayer.php';
    $items=getOrderItems($order_id);
    for ($i=0;$i<count($items);$i++)
    {
    
    
        echo "<tr><td>" . $items[$i]['item_name'] . "</td><td>" . $items[$i]['item_size'] . "</td><td>" . $items[$i]['item_qty'] . "</td><td>" . $items[$i]['item_amt'] . "</td></tr>";
    }    
    ?>    
    </tbody>
  </table>
  
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#userTable').DataTable();
} );
</script>

<?php 
include 'app-footer.php';
?>