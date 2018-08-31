<?php 
include 'admin-header.php';
$page_id="viewEditUsers";
$page_top_id="users";
?>

  
<div class="container">
  <h3 class="text-center">All Users</h3>
  
  <table id="userTable" class="table table-condensed table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Phone</th>
        <th>State</th>
        <th>View / Edit / (En/Dis)able</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'DataAccessLayer.php';
    $users=getUsers();
    for ($i=0;$i<count($users);$i++)
    {
        echo "<tr><td>" . $users[$i]['username'] . "</td><td>" . $users[$i]['name'] . "</td><td>" . $users[$i]['phone'] . "</td><td>" . $users[$i]['state'] . "</td><td><a href='view-user.php?id=" . $users[$i]['user_id'] . "'>View</a> / <a href='edit-user.php?id=" . $users[$i]['user_id'] . "'>Edit</a> /";
        if($users[$i]['state']=='Disabled')
            echo "<a href='Enable-user.php?id=" . $users[$i]['user_id'] . "'>Enable</a></td></tr>";
        else
            echo "<a href='Disable-user.php?id=" . $users[$i]['user_id'] . "'>Disable</a></td></tr>";
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