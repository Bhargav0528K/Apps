<?php 
include 'admin-header.php';
$page_id="currentOrders";
$page_top_id="orders";
?>

  
<div class="container">
  <h3 class="text-center">Current Orders</h3>
  
  <table id="userTable" class="table table-condensed table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Customer Name</th>
        <th>Order Time</th>
        <th>Status</th>
        <th>View / Change Status</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'DataAccessLayer.php';
    $orders=getCurrentOrders();
    for ($i=0;$i<count($orders);$i++)
    {
    
        $user_id= $orders[$i]['user_id'];
        $user=getUserDetails($user_id);
    
        echo "<tr><td><a href='view-user.php?id=" . $user['user_id'] . "'>" . $user['name'] . "</a></td><td>" . $orders[$i]['order_time'] . "</td><td>" . $orders[$i]['order_status']. "</td><td><a href='view-order.php?id=" . $orders[$i]['order_id'] . "'>View</a> / ";
        if($orders[$i]['order_status']=='Ordered')
            echo "<a href='mark-prepared.php?id=" .  $orders[$i]['order_id'] . "'>Mark Prepared</a></td></tr>";
        else if($orders[$i]['order_status']=='Prepared')
            echo "<a href='mark-delivered.php?id=" .  $orders[$i]['order_id']. "'>Mark Delivered</a></td></tr>";
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