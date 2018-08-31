<?php 
include 'app-header.php';
$page_id="myOrders";
$page_top_id="";
?>

  
<div class="container">
  <h3 class="text-center">My Orders</h3>
  
  <table id="userTable" class="table table-condensed table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Ordered On</th>
        <th>Status</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'DataAccessLayer.php';
    $user_id=$_SESSION["app_user_id"];
    $orders=getUserOrders($user_id);
    for ($i=0;$i<count($orders);$i++)
    {
    
      
    
        echo "<tr><td>" . $orders[$i]['order_time'] . "</td><td>" . $orders[$i]['order_status']. "</td><td><a href='view-order.php?id=" . $orders[$i]['order_id'] . "'>View</a></tr>";
        
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