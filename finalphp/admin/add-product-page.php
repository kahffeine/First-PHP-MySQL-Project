<?php
require_once('../files/functions.php');
require_once('../files/admin-header.php');
require_once('../files/control-panel.php');
require_once('product-backend.php');
/*Add Products Page*/
?>

<div class="container p-5" id="fonttxt2">
    <h3 id="fonttxt1">Add a new product!</h3>
    <form method="POST" enctype="multipart/form-data" class="row ">            
        <div class="col-md-6 mb-3">
            <label class="form-label">Book Name</label>
            <input type="text" maxlength="255" name="book_name" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="col-md-6">
            <label class="form-label">Category</label>

            <select name="maincat" class="form-select" aria-label="Default select example">
                <option selected></option>

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
            <input type="text" maxlength="15" name="author_name" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
            
        <div class="col-md-6">
            <label class="form-label">Sub-category</label>
            <select name="subcat" class="form-select" aria-label="Default select example">
                <option selected></option>

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
            <input maxlength="2" type="text" name="price" class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label"> Product photo</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile02">
        </div>

        <div class="mb-3">
            <label class="form-label">Details</label>
            <textarea type="text" name="details" maxlength="255" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

            
        <div class="text-end">
            <a href="admin-products.php">
                <button type="button" class="btn btn-dark">See all books</button>
            </a>
            <button type="submit" name="submit" class="btn btn-warning">Add new products !!</button>
        </div>
    </form> 
</div>

<?php
    require_once('../files/footer.php');
?>