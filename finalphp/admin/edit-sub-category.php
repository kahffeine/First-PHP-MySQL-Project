<?php
require_once('../files/functions.php');
require_once('../files/admin-header.php');
require_once('../files/control-panel.php');
require_once('sub-category-backend.php');
/*Edit Sub-Category Page*/
?>

<div class="container p-5 border" id="fonttxt2">
    <h3 id="fonttxt1">Edit sub-category!</h3>

    <?php
    if(isset($_GET['id'])){

    $id = $_GET['id'];
    $subcat = getByID("sub_categories1", $id);

    if(mysqli_num_rows($subcat) > 0) {
        $data = mysqli_fetch_array($subcat);
    ?>

    <form method="POST" enctype="multipart/form-data" class="row">
        <input type="hidden" name="subcat_id" value="<?= $data['id']; ?>">

        <div class="col-mb-3">
            <input name="sub_cat_name" maxlength="50" value="<?= $data ['subcat'];?>" type="text" class="form-control">
        </div>

        <div class="form-text">Maximun 50 characters.</div>

        <h5 class="mt-1" id="fonttxt1">Select main category!</h5>

        <div class=" col-mb-3 ">
            <select name="maincat" class="form-select" aria-label="Default select example">
                <option selected><?php echo $data['maincat_id']; ?></option>

                <?php $sql_query = $conn->query("SELECT * FROM categories1") or die($conn->error);
                while ($categories = $sql_query->fetch_assoc()) { ?>

                <option>
                    <?php echo $categories['id'] ; ?> - <?php echo $categories['cat_name'] ; ?>
                </option>

                <?php } ?>
            </select>
        </div>

        <div class="text-end pt-2">
            <input name="update" type="submit" class="btn btn-warning" value="Update category !!">
        </div>

    </form>

    <?php
    }else{
        echo "<script>alert('Sub-category not found.');</script>";
        echo"<script> location.replace('sub-categories.php'); </script>";
        }
    
    } else {
        echo "<script>alert('ID missing from URL.');</script>";
        echo"<script> location.replace('sub-categories.php'); </script>";
    } 
    ?>

</div>

<?php
require_once('../files/footer.php');
?>