<?php 
include 'admin-header.php';
$page_id="mostOrderedItems";
$page_top_id="reports";
?>

  
<div class="container">
  <h3 class="text-center">Most Ordered Items</h3>
  
  <table id="userTable" class="table table-condensed table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Item Name</th>
        <th>Item Size</th>
        <th>Qty Ordered</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'DataAccessLayer.php';
    $ordereditems=getMostOrderedItems();
    for ($i=0;$i<count($ordereditems);$i++)
    {   
    
        echo "<tr><td>" . $ordereditems[$i]['item_name'] . "</td><td>" . $ordereditems[$i]['item_size'] . "</td><td>" . $ordereditems[$i]['sumqty'] . "</td></tr>";
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