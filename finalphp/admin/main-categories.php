<?php
require_once('../files/functions.php');
require_once('../files/admin-header.php');
require_once('../files/control-panel.php');
require_once('category-backend.php');
/*Category Page (View and Add)*/
?>

<main class="container">

<div class="container p-5 border" id="fonttxt2">
    <h3 id="fonttxt1">Add a new category!</h3>

    <form method="POST" enctype="multipart/form-data" class="row">
        <div class="col-mb-3">
            <input name="cat_name" maxlength="50" type="text" class="form-control" placeholder="Add categories">
        </div>

        <div class="form-text">Maximun 50 characters.</div>

        <div class="col-mb-3 pt-3">
            <label for="">Image</label>
            <input name="image" type="file" class="form-control" id="inputGroupFile02">
        </div>

        <div class="form-text">Jpg and png files only</div>

        <div class="text-end pt-2">
            <input name="submit" type="submit" class="btn btn-warning" value="Add category !!">
        </div>
    </form>

</div>

<div class="row p-2">
    <div class="col" id="containerx">
        <h4 id="fonttxt1">My categories</h4>
            
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Category name</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>

            <?php
            $sql_query = $conn->query("SELECT * FROM categories1") or die($conn->error);
            while ($categories = $sql_query->fetch_assoc()) {
            ?>
                <tr>
                    <th scope="row">
                        <div class="cart-box m-2">    
                            <img src="../uploads/categories/<?php echo $categories['img_path']; ?>" class="img-fluid">
                        </div>
                    </th>

                    <td>
                        <?php echo $categories['cat_name']; ?>
                    </td>

                    <td><a href="edit-category-page.php?id=<?php echo $categories['id'];?>">Edit</a></td>
                    <td><a href="main-categories.php?remove=<?php echo $categories['id'];?>">Remove</a></td>
                </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>
</div>

</main>

<?php
require_once('../files/footer.php');
?>