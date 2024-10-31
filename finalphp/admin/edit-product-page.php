<?php
require_once('../files/functions.php');
require_once('../files/admin-header.php');
require_once('../files/control-panel.php');
require_once('product-backend.php');
/*Edit Products Page*/
?>

<div class="container p-5" id="fonttxt2">
    <h3 id="fonttxt1">Edit product!</h3>

    <?php 
        if(isset($_GET['id'])){

        $id = $_GET['id'];
        $product = getByID("products", $id);

        if(mysqli_num_rows($product) > 0) {
            $data = mysqli_fetch_array($product);
    ?>

    <div class="col-md-6 mb-3">
        <label for="">Current Image</label>
    </div>

    <div class="col-md-6 mb-3">
        <img src="../uploads/products/<?= $data['path'];?>" alt="Product image" height="70px" width="50px">
    </div>

    <form method="POST" enctype="multipart/form-data" class="row ">    
        <input type="hidden" name="product_id" value="<?= $data ['id']; ?>">
                
        <div class="col-md-6 mb-3">
            <label class="form-label">Book Name</label>
            <input type="text" maxlength="255" name="book_name" value="<?= $data ['book_name']; ?>" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="col-md-6">
        <label class="form-label">Category</label>

        <select name="maincat" class="form-select" aria-label="Default select example">
            <option selected><?= $data ['maincat']; ?></option>

            <?php $sql_query = $conn->query("SELECT * FROM categories1") or die($conn->error);
                while ($categories = $sql_query->fetch_assoc()) { ?>
                    <option>
                        <?php echo $categories['cat_name']; ?>
                    </option>
            <?php } ?>
        </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Author Name</label>
            <input type="text" maxlength="15" name="author_name" value="<?= $data ['author_name']; ?>" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
            
        <div class="col-md-6">
            <label class="form-label">Sub-category</label>
            <select name="subcat" class="form-select" aria-label="Default select example">
                <option selected><?= $data ['subcat']; ?></option>

                <?php $sql_query = $conn->query("SELECT * FROM sub_categories1") or die($conn->error);
                while ($sub_categories = $sql_query->fetch_assoc()) { ?>
                    <option>
                        <?php echo $sub_categories['subcat']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label"> Price</label>
            <input type="text" maxlength="2" name="price" value="<?= $data ['price']; ?>" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label"> Product photo</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile02">
            <input type="hidden" name="oldimage" value="<?= $data['path'];?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Details</label>
            <textarea type="text" maxlength="255" name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $data ['details']; ?></textarea>
        </div>

            
        <div class="text-end">
            <input name="update" type="submit" class="btn btn-warning" value="Save it!">                
        </div>
    </form> 
    <?php 
    }else{
        echo "<script>alert('Product not found.');</script>";
        echo"<script> location.replace('product-details.php'); </script>";
    }

    } else {
        echo "<script>alert('ID missing from URL.');</script>";
        echo"<script> location.replace('product-details.php'); </script>";
    } ?>

</div>



<?php 
require_once('../files/footer.php');
?>