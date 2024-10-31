<?php
require_once('../files/functions.php');
require_once('../files/admin-header.php');
require_once('../files/control-panel.php');
require_once('sub-category-backend.php');
/*Sub-Category Page (View, Add, Edit and Remove Sub-Categories)*/
?>

<main class="container">
    <div class="container p-5 border" id="fonttxt2">
        <h3 id="fonttxt1">Add a new sub-category!</h3>

        <form method="POST" enctype="multipart/form-data" class="row">
            <div class="col-mb-3">
                <input name="subcat" type="text" class="form-control" maxlength="50" placeholder="Add sub-categories">
            </div>

            <div class="form-text">Maximun 50 characters.</div>

            <h5 class="mt-1" id="fonttxt1">Select main category!</h5>

            <div class=" col-mb-3 ">
                <select name="maincat" class="form-select" aria-label="Default select example">
                    <option selected></option>

                    <?php $sql_query = $conn->query("SELECT * FROM categories1") or die($conn->error);
                    while ($categories = $sql_query->fetch_assoc()) { ?>
                    <option>
                        <?php echo $categories['id'] ; ?> - <?php echo $categories['cat_name'] ; ?>
                    </option>
                        
                    <?php } ?>
                </select>
            </div>

            <div class="text-end pt-2">
                <input name="submit" type="submit" class="btn btn-warning" value="Add category !!">
            </div>
        </form>
    </div>

    <div class="row p-2">
        <div class="col" id="containerx">
            <h4 id="fonttxt1">My sub-categories</h4>
            <table class="table table-striped-columns text-center">
                <thead>
                    <tr>
                        <th scope="col">Sub-category name</th>
                        <th scope="col">Main category id</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    <?php
                    $sql_query = $conn->query("SELECT * FROM sub_categories1") or die($conn->error);
                    while ($sub_categories = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $sub_categories['subcat']; ?>
                        </th>

                        <td><?php echo $sub_categories['maincat_id']; ?></td>

                        <td><a href="edit-sub-category.php?id=<?php echo $sub_categories['id'];?>">Edit</a></td>
                
                        <td><a href="sub-categories.php?remove=<?php echo $sub_categories['id'];?>">Remove</a></td>
                    </tr>

                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php
require_once('../files/footer.php');
?>