<?php
require_once('../files/functions.php');
require_once('../files/admin-header.php');
require_once('../files/control-panel.php');
require_once('category-backend.php');
/*Add Categories Page*/
?>
<main class="container">
    <div class="container p-5 border" id="fonttxt2">
        <h3 id="fonttxt1">Edit category!</h3>
        <?php
            if(isset($_GET['id'])){

            $id = $_GET['id'];
            $maincat = getByID("categories1", $id);
                
            if(mysqli_num_rows($maincat) > 0) {
            $categories = mysqli_fetch_array($maincat);
        ?>
        <form method="POST" enctype="multipart/form-data" class="row">
        <input type="hidden" name="cat_id" value="<?= $categories ['id']; ?>">
            
            <div>
                <div class="col-md-6 mb-3">
                    <label for="">Current Image</label>
                </div>

                <div class="col-md-6 mb-3">
                    <img src="../uploads/categories/<?=$categories['img_path'];?>" alt="Product image" height="70px" width="75px">
                </div> 
            </div>

            <div class="col-mb-3">
                <input name="cat_name" maxlength="50" type="text" class="form-control" value="<?= $categories ['cat_name']; ?>">
            </div>

            <div class="form-text">Maximun 50 characters.</div>

            <div class="col-mb-3 pt-3">
                <label for="">Image</label>
                <input name="image" type="file" class="form-control" id="inputGroupFile02">
                <input type="hidden" name="oldimage" value="<?= $categories['img_path'];?>">
            </div>

            <div class="form-text">Jpg files only</div>

            <div class="text-end pt-2">
                <input name="update" type="submit" class="btn btn-warning" value="Save">
            </div>

        <?php
            }else{
                echo "<script>alert('Category not found.');</script>";
                echo"<script> location.replace('main-categories.php'); </script>";
            }

            } else {
                echo "<script>alert('ID missing from URL.');</script>";
                echo"<script> location.replace('main-categories.php'); </script>";
            } 
        ?>
        </form>
    </div>
</main>



<?php
require_once('../files/footer.php');
?>