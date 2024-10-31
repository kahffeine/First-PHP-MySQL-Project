<?php
require_once('files/functions.php');
login_first();
require_once('files/header.php');
/*Categories Page*/
?>

<div class="container d-flex justify-content-center">
    <div class="row p-4">
        <h2 id="fonttxt1">Categories</h2>
    </div>
</div>
    
<div class="container d-flex">
    <div class="row">

    <?php
    $sql_query = $conn->query("SELECT * FROM categories1") or die($conn->error);
    while ($categories = $sql_query->fetch_assoc()) {
    ?>

    <div class="col">
        <a href="sub-category.php?id=<?php echo $categories['id'];?>" class="text-decoration-none text-dark">
            <div class="category-box d-flex justify-content-center">
                <div class="category-inner-box position-relative text-center">
                    <img src="uploads/categories/<?php echo $categories['img_path']; ?>" alt="img 1" class="img-fluid"> 
                    <div class="category-info">
                        <div class="category-name">
                            <h3 id="fonttxt1"><?php echo $categories['cat_name']; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <?php } ?>

    </div>
</div>
    


<?php
require_once('files/footer.php');
?>