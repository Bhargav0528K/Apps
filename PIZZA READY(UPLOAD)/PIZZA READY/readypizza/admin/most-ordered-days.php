<?php 
include 'admin-header.php';
$page_id="mostOrderedDays";
$page_top_id="reports";
?>

  
<div class="container">
  <h3 class="text-center">Most Ordered Days</h3>
  
  <table id="userTable" class="table table-condensed table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Date</th>
        <th>Num of orders</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'DataAccessLayer.php';
    $ordereditems=getMostOrderedDays();
    for ($i=0;$i<count($ordereditems);$i++)
    {   
    
        echo "<tr><td>" . $ordereditems[$i]['order_date'] . "</td><td>" . $ordereditems[$i]['orders'] . "</td></tr>";
    }    
    ?>    
    </tbody>
  </table>
  
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#userTable').DataTable({
        "bSort": false
    });
} );
</script>

<?php 
include 'admin-footer.php';
?>