<?php
require_once('files/functions.php');
login_first();
require_once('files/header.php');
/*Shopping Cart*/

if(isset($_GET['id'])){
$id = $_GET['id'];
$cartpage = getByID("users", $id);

/*Make sure users doesn't access other users' shopping cart*/
If ( $_SESSION['user']['id'] != $id ){ 
    alert('warning','You do not have access to this section.');
    echo "<script> location.replace('cart.php?id=",$_SESSION['user']['id'],"');</script>";
    } 

/*Gather User Orders*/
if(mysqli_num_rows($cartpage) > 0) {
$cartproducts = mysqli_fetch_array($cartpage);
$sql_query = $conn->query("SELECT * FROM shopping_cart WHERE user_id = '$id'");

/*If no products are found*/
if ($sql_query->num_rows == 0) { 

?>

<div class="container-fluid d-flex justify-content-center mt-3">
    <div class="row">
        <div class="col text-center m-2">
            <h1 id="fonttxt1">Shopping cart</h1>
            <p id="fonttxt2">Your shopping cart is currently empty!</p>
            <p id="fonttxt2">Find the right book for you !</p>
            <img class="finishimg" src="imagens/sad.png" alt="" class="m-3">
            <div class="d-flex justify-content-center">
                <a href="allbooks.php">
                    <button class="btn btn-outline-dark m-1" type="submit">Find books</button>
                </a>                   
            </div>
        </div>
    </div>
</div>

<?php
/*If products are found*/
}else{
$total = 0;
?>

<div class="container-fluid d-flex justify-content-center mt-3">
    <h1 id="fonttxt1">Shopping Cart</h1>
</div>

<div class="container-fluid d-lg-flex justify-content-center mt-4">

    <div class="container">     
        <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Author Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
              </tr>
            </thead>
<?php
while ($cart = $sql_query->fetch_assoc()) { 
?>  
            <tbody>
            <tr>
                <th scope="row">
                    <div class="cart-box">
                        <img src="uploads/products/<?php echo $cart['path'];?>" alt="img 1" class="img-fluid">
                    </div>
                </th>
                <td><?php echo $cart['product']; ?></td>
                <td><?php echo $cart['author'] ; ?></td>

                <td>
                    <form action="" method="post">
                    <div class="input-group">
                        <input type="hidden" name="update-qt-id" value="<?php echo $cart['id']; ?>">
                        <input type="text" maxlength="2" style="width: 50px" class="form-control" name="update-qt" value="<?php echo $cart['quantity'];?>" aria-describedby="button-addon2">
                        <button class="btn btn-outline-dark" type="submit" id="button-addon2" value="Update" name="update-qt-btn">Update</button>
                    </div>
    

                        </div>
                    </form>
                </td>
        
                <td>€<?php echo number_format($cart['price'] * $cart['quantity'],2); ?></td>
                <td><a class="btn btn-warning btn-block p-2" href="cart.php?remove=<?php echo $cart['id'];?>">Remove</a></td>
            </tr>
<?php 
$total = $total + $cart['price'] * $cart['quantity'];
}
?>
            <form method="POST" enctype="multipart/form-data" class="row ">
            <input type="hidden" name="user" value="<?php echo $_SESSION['user']['id'];?>">
            <input type="hidden" name="price" value="<?php echo $total;?>">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th scope="col" id="fonttxt1"><h2>Total</h2></th>
                <td>€<?php echo number_format($total,2); ?></td>
                <td>
                    <button type="submit" name="checkout" class="btn btn-warning btn-block p-2">
                        Checkout!
                    </button>
                </td>
            </tr>
            </form>
            </tbody>
        </table>
    </div>
<?php }}}?>
</div>



<?php
require_once('cart-backend.php');
require_once('files/footer.php');
?>