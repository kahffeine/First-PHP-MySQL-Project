<?php
require_once('files/functions.php');
login_first();
require_once('files/header.php');
/*Book details page*/

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $productpage = getByID("products", $id);
        
    if(mysqli_num_rows($productpage) > 0) {
    $products = mysqli_fetch_array($productpage);
?>

<div class="container d-sm-flex">
    <div class="imgside m-4">
        <img src="uploads/products/<?= $products['path']?>" alt="img 1" class="img-fluid">
    </div>
    <div class="container d-flex" id="fonttxt2">
        <div class="container m-4">
            <div class="product-name">
                <h3 id="fonttxt1"><?= $products['book_name']?></h3>
                <p><b><?= $products['author_name']?></b></p>
            </div>

            <div class="product-price m-4">
                <h2>€<b><?php echo number_format($products['price'],2); ?></b></span></h2>
            </div>

            <div class="container d-flex" id="buttons1">
                <div class="cart-btn shadow-lg m-2">
                    <form method="POST" enctype="multipart/form-data" class="row ">
                        <input type="hidden" name="user" value="<?php echo $_SESSION['user']['id'];?>"> 
                        <input type="hidden" name="path" value="<?php echo $products['path']; ?>">
                        <input type="hidden" name="price" value="<?php echo $products['price']; ?>">
                        <input type="hidden" name="productid" value="<?php echo $products['id']; ?>">
                        <input type="hidden" name="product" value="<?php echo $products['book_name']; ?>">
                        <input type="hidden" name="author" value="<?php echo $products['author_name']; ?>">
                        <button class="btn btn-white" type="submit" name="add-to-cart"><i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            class="bi bi-cart3" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" /></svg></i> Add to cart
                        </button>
                    </form>                   
                </div>

                <div class="cart-btn shadow-lg m-2">
                    <button class="btn btn-white">
                        <a href="allbooks.php" class="text-decoration-none text-dark">Go back</a>
                    </button>
                </div>
            </div>

            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active text-dark" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>   
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p><?= $products['details']?></p>
                </div>
            </div>
        </div>
    </div>

    <?php
    }else{
    alert('danger','Product Not Found.');
    echo"<script> location.replace('allbooks.php'); </script>";
    }

    } else {
    alert('danger','ID Missing from URL.');
    echo"<script> location.replace('allbooks.php'); </script>";
    } 
    ?>

</div>   

<?php
require_once('cart-backend.php');
require_once('files/footer.php');
?>