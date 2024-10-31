<?php
require_once('../files/functions.php');
require_once('../files/admin-header.php');
require_once('../files/control-panel.php');
/*Manage Users Page (Delete Users, View Orders and User Details)*/
?>


<main class="container">
  <div class="row p-2 ">
    <div class="col" id="containerx">
      <h4 id="fonttxt1">Users</h4>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">User type</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>

        <tbody>

        <?php 
        $sql_query = $conn -> query("SELECT * FROM users") or die($conn->error); 
        while ($users=  $sql_query-> fetch_assoc()) {
        ?>

          <tr>
            <th scope="row"><?php echo $users ['id']; ?></th>
            <td><?php echo $users ['first_name']; ?></td>
            <td><?php echo $users ['last_name']; ?></td>
            <td><?php echo $users ['phone_number']; ?></td>
            <td><?php echo $users ['email']; ?></td>
            <td><?php echo $users ['user_type']; ?></td>
            <td><a href="view-user-orders.php?id=<?php echo $users['id'];?>">Orders</a></td>
            <td><a href="manage-users.php?remove=<?php echo $users['id'];?>">Remove</a></td>
          </tr>

        <?php } ?>

        </tbody>

      </table>
    </div>
  </div>
</main>

<?php
require_once('../files/footer.php');

if(isset($_GET['remove'])) {
  $id = intval($_GET['remove']);
  $sql_query = $conn->query("SELECT * FROM users WHERE id = '$id'") or die($conn->error);
  $users = $sql_query->fetch_assoc();
      $good = $conn->query("DELETE FROM users WHERE id = '$id'") or die($conn->error);
      if ($good) {
          echo "<script>alert('User removed successfully!');</script>";
          echo"<script> location.replace('manage-users.php'); </script>";
  }
}
?>