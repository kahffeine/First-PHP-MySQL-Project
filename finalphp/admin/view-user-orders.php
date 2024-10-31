<?php
require_once('../files/functions.php');
require_once('../files/admin-header.php');
require_once('../files/control-panel.php');
/*View User's Orders (View Order History)*/

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql_query = $conn->query("SELECT * FROM orders WHERE user_id = '$id'");
  if(mysqli_num_rows($sql_query) > 0) {
?>

<main class="container mb-5">
  <div class="row p-2 ">
    <div class="col" id="containerx">

    <?php $userName = $conn->query("SELECT * FROM users WHERE id = '$id'");
    while ($getName=$userName-> fetch_assoc()) {?>
    <h4 id="fonttxt1"><?php echo $getName['first_name'];?> <?php echo $getName['last_name'];?></h4>
    <?php }?>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">Books</th>
          <th scope="col">Authors</th>
          <th scope="col">Total</th>
        </tr>
      </thead>

      <tbody>
      <?php while ($users=$sql_query-> fetch_assoc()) {?>

        <tr>
          <th scope="row"><?php echo $users['products']; ?></th>
          <td><?php echo $users['authors']; ?></td>
          <td>$<?php echo number_format($users['price'],2); ?></td>
        </tr>

      <?php }?>
      </tbody>

      </table>
      <?php }else{ ?>
        <div class="container-fluid d-flex justify-content-center mt-3">
          <div class="row">
            <div class="col text-center m-5">
              <h1 id="fonttxt1">No orders for this user</h1>
              <p id="fonttxt2">This user never made any purchase with us!</p>
              <img class="finishimg" src="imagens/sad.png" alt="" class="m-3">
              <div class="d-flex justify-content-center">
                <a href="manage-users.php">
                  <button class="btn btn-outline-dark m-1">Go back</button>
                </a>                   
              </div>
            </div>
          </div>
        </div>
      <?php  } }?>
    </div>
  </div>
</main>




<?php
require_once('../files/footer.php');
?>