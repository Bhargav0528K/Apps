<?php 
include 'admin-header.php';
$page_id="pastOrders";
$page_top_id="orders";
?>

  
<div class="container">
  <h3 class="text-center">Past Orders</h3>
  
  <table id="userTable" class="table table-condensed table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Customer Name</th>
        <th>Order Time</th>
        <th>Status</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'DataAccessLayer.php';
    $orders=getPastOrders();
    for ($i=0;$i<count($orders);$i++)
    {
    
        $user_id= $orders[$i]['user_id'];
        $user=getUserDetails($user_id);
    
        echo "<tr><td><a href='view-user.php?id=" . $user['user_id'] . "'>" . $user['name'] . "</a></td><td>" . $orders[$i]['order_time'] . "</td><td>" . $orders[$i]['order_status']. "</td><td><a href='view-order.php?id=" . $orders[$i]['order_id'] . "'>View</a></tr>";
        
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
include 'admin-footer.php';
?>