<?php
require_once('../files/functions.php');
require_once('../files/admin-header.php');
require_once('../files/control-panel.php');
require_once('product-backend.php');
/*Product Details Page (View Product Details and Edit/Remove Products)*/

if(isset($_GET['id'])){
$id = $_GET['id'];
$productpage = getByID("products", $id);
    
if(mysqli_num_rows($productpage) > 0) {
$products = mysqli_fetch_array($productpage);
?>

<div class="container d-sm-flex">
    <div class="imgside m-4">
        <img src="../uploads/products/<?= $products['path']?>" alt="img 1" class="img-fluid">
    </div>
    <div class="container d-flex" id="fonttxt2">
        <div class="container m-4">
            <div class="product-name">
                <h3 id="fonttxt1"><?= $products['book_name']?></h3>
                <p><b><?= $products['author_name']?></b></p>
            </div>

            <div class="product-price m-4">
                <h2><b>€<?= $products['price']?></b></span></h2>
            </div>

            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active text-dark" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>   
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>
                        <?= $products['details']?>
                    </p>
                </div>
            </div>

            <div class="text-end">
                <a href="product-details.php?remove=<?php echo $products['id'];?>">
                    <button type="button" class="btn btn-dark">Remove</button>
                </a>

                <a href="edit-product-page.php?id=<?php echo $products['id'];?>">
                    <button type="submit" name="submit" class="btn btn-warning">Edit</button>
                </a>
            </div>
        </div>
    </div>
</div>

<?php
    }else{
    echo "<script>alert('Product not found.');</script>";
    echo"<script> location.replace('main-products.php'); </script>";
    }
    } else {
    echo "<script>alert('ID missing from URL.');</script>";
    echo"<script> location.replace('main-products.php'); </script>";
    }     

require_once('../files/footer.php');
?>
