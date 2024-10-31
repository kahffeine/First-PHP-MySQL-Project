<?php
require_once('files/functions.php');
login_first();
require_once('files/header.php');
/*See books that are currently under a Category/Sub-Category*/

if(isset($_GET['category'])){
$category = $_GET['category'];
$products = $conn->query("SELECT * FROM products WHERE subcat = '$category'");
    
if(mysqli_num_rows($products) > 0) {
     $data = mysqli_fetch_array($products);

?>

<main class="container">
    <div class="container d-flex justify-content-center">
        <div class="row pt-4">
            <h2 id="fonttxt1"><?php echo $data ['subcat']; ?> </h2>
        </div>
    </div>

    <div class="container my-5 justify-content-center">
        <div class="row">

        <?php
        $sql_query = $conn->query("SELECT * FROM products WHERE subcat = '$category'") or die($conn->error);
        while ($data = $sql_query->fetch_assoc()) { 
        ?>

            <div class="col">
                <div class="product-box d-flex justify-content-center">
                    <div class="product-inner-box position-relative text-center">
                        <a href="book.php?id=<?=$data['id'];?>" class="text-decoration-none text-dark" class="product">
                            <div class="m-2">
                                <img src="uploads/products/<?php echo $data['path']; ?>" alt="<?php echo $data['book_name']; ?>" class="img-thumbnail">
                            </div>

                            <div class="product-name">
                                <h4 id="fonttxt1" class="d-inline-block text-truncate" style="max-width: 200px;"><?php echo $data['book_name']; ?></h4>
                            </div>
                            
                            <div class="product-price d-flex">
                                <p class="me-4 d-inline-block text-truncate" style="max-width: 200px;"><?php echo $data['author_name']; ?></p>
                                <b>Price:</b><span class="ms-1">€<?php echo number_format($data['price'],2); ?></span>
                            </div>
                        </a>

                        <div class="cart-btn shadow-sm">
                            <form method="POST" enctype="multipart/form-data" class="row ">
                                <input type="hidden" name="user" value="<?php echo $_SESSION['user']['id'];?>"> 
                                <input type="hidden" name="path" value="<?php echo $data['path']; ?>">
                                <input type="hidden" name="price" value="<?php echo $data['price']; ?>">
                                <input type="hidden" name="productid" value="<?php echo $data['id']; ?>">
                                <input type="hidden" name="product" value="<?php echo $data['book_name']; ?>">
                                <input type="hidden" name="author" value="<?php echo $data['author_name']; ?>">
                                <button class="btn btn-white" type="submit" name="add-to-cart"><i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="bg-dark" class="bi bi-cart3" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" /></svg></i> 
                                    Add to cart
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>    
<?php } }else{ ?>
    <div class="container-fluid d-flex justify-content-center mt-3">
        <div class="row">
            <div class="col text-center m-2">
                <h1 id="fonttxt1">No products here... YET</h1>
                <p id="fonttxt2">This Sub-Category is currently empty!</p>
                <p id="fonttxt2">Please check a different Sub-Category!</p>
                <img class="finishimg" src="imagens/sad.png" alt="" class="m-3">
                <div class="d-flex justify-content-center">
                    <a href="categories.php">
                        <button class="btn btn-outline-dark m-1" type="submit">Find books</button>
                    </a>                   
                </div>
            </div>
        </div>
    </div>
<?php }} ?>
        </div>
    </div>
</main>


<?php
require_once('cart-backend.php');
require_once('files/footer.php');
?>