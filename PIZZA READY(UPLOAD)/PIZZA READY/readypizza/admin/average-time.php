<?php 
include 'admin-header.php';
$page_id="avgTime";
$page_top_id="reports";
?>

  
<div class="container">
  <h3 class="text-center">Average Time</h3>
  
  <table id="userTable" class="table table-condensed table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Date</th>
        <th>Avg Preparation Time</th>
        <th>Avg Delivery Time</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'DataAccessLayer.php';
    $avgtimes=getAvgTime();
    for ($i=0;$i<count($avgtimes);$i++)
    {   
    
        echo "<tr><td>" . $avgtimes[$i]['order_date'] . "</td><td>" . $avgtimes[$i]['avgprep'] . " mins</td><td>" . $avgtimes[$i]['avgdel'] . " mins</td></tr>";
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