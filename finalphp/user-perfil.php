<?php
require_once('files/functions.php');
login_first();
require_once('files/header.php');
/*User Profile*/

$id = $_SESSION['user']['id'];
$sql_query = $conn->query("SELECT * FROM orders WHERE user_id = '$id'");
?>

<div class="container-fluid d-flex justify-content-center p-3">
    <h1 id="fonttxt1">User page</h1>
</div>

<main class="container">
    <div>
        <table class="table table-bordered table-striped" id="fonttxt2">
            <thead>
                <tr>
                    <th scope="col" id="fonttxt1"><h4>Contact Info</h4></th>
                </tr>
            </thead>

    <?php $userName = $conn->query("SELECT * FROM users WHERE id = '$id'");
    while ($getName=$userName-> fetch_assoc()) {?>

            <tbody>
                <tr>
                    <td>
                        <p id="fonttxt2"><?php echo $getName['first_name'];?> <?php echo $getName['last_name'];?></p>
                        <p id="fonttxt2"><?php echo $getName['email'];?></p>
                        <p id="fonttxt2"><?php echo $getName['phone_number'];?></p>
                    
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php }
    $sql_query = $conn->query("SELECT * FROM orders WHERE user_id = '$id'");
    if(mysqli_num_rows($sql_query) > 0) {
    ?>
        
    <div class="container-fluid d-flex justify-content-center mt-3">
        <h3 id="fonttxt1">My orders</h3>
    </div>
        

    </div>
        <div class="container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Title and Quantity</th>
                        <th scope="col">Price</th>
                        <th>Type</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

    <?php 
    while ($users=$sql_query-> fetch_assoc()) { 
    ?>

                <tr>
                    <td><?php echo $users['products']; ?></td>
                    <td>€<?php echo number_format($users['price'],2); ?></td>                   
                    <td>Pick up in store</td>
                    <td><a>
                        <button class="btn btn-outline-dark m-1 disabled">Cancel Order</button>
                    </a></td>
                </tr>

    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <?php }else{ ?>

    <div class="container-fluid d-flex justify-content-center mt-3">
        <div class="row">
            <div class="col text-center m-5">
                <h1 id="fonttxt1">No orders for this user</h1>
                <p id="fonttxt2">This user never made any purchase with us!</p>
                <img class="finishimg" src="imagens/sad.png" alt="" class="m-3">
            </div>
        </div>
    </div>

    <?php  } ?>

</main>


<?php
require_once('files/footer.php');
?>