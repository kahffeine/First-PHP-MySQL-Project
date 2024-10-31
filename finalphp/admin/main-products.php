<?php
require_once('../files/functions.php');
require_once('../files/admin-header.php');
require_once('../files/control-panel.php');
require_once('product-backend.php');
/*Products Page (Search, View and Edit)*/

$sql_query = $conn->query("SELECT * FROM products");
?>


<main class="container">

<div class="container d-flex justify-content-center">
    <div class="row p-4">
        <h2 id="fonttxt1">Find Book</h2>
    </div>
</div>

<div class="container col-sm-7 justify-content-center" id="fonttxt2">
    <form method="get" action="">
        <div class="input-group mb-2">
            <input type="text" maxlength="255" class="form-control" type="submit" name="search_data" value="<?php if(isset($_GET['search_data'])) echo $_GET['search_data'];?>" placeholder="Find your book!" aria-describedby="button-addon2">
            <button class="btn btn-outline-dark" id="button-addon2">Search!</button>
        </div>
    </form>
</div>

<div class="container my-5 justify-content-center">
    <div class="row">

    <?php
    /*If no search is made display all products*/
    if(!isset($_GET["search_data"])) {
    while ($products = $sql_query->fetch_assoc()) {
    ?>

        <div class="col">
            <a href="product-details.php?id=<?=$products['id'];?>" class="text-decoration-none text-dark" class="product">
                <div class="product-box justify-content-center text-center">
                    <div class="product-inner-box position-relative">

                        <div class="m-2">
                            <img src="../uploads/products/<?php echo $products['path']; ?>" alt="<?php echo $products['book_name']; ?>" class="img-fluid">
                        </div>
                    
                        <div class="product-name">
                            <h4 id="fonttxt1" class="text-truncate"><?php echo $products['book_name']; ?></h4>
                            <p class="text-center text-truncate"><b>Author: </b><?php echo $products['author_name']; ?></p>
                            <b>Price:</b><span>€<?php echo number_format($products['price'],2); ?></span>
                        </div>

                    </div>
                </div>
            </a>
        </div>

    <?php } } else {
        /*If a search is made gather data*/ 
        $search = $conn->real_escape_string($_GET['search_data']);
        $get_data = "SELECT *
        FROM products
        WHERE book_name LIKE '%$search%'
        OR author_name LIKE '%$search%'
        OR details LIKE '%$search%'";
        $sql_query = $conn->query($get_data);
            
        /*If no data is found*/
        if ($sql_query->num_rows == 0) {
    ?>

        <div class="container d-flex justify-content-center">
                <div class="row p-4">
                    <h2 id="fonttxt1">Unable to find book !</h2>
                </div>
        </div>

    <?php } else {
        /*Display found data*/
        while ($products = $sql_query->fetch_assoc()) {
    ?>

        <div class="col">
            <a href="product-details.php?id=<?=$products['id'];?>" class="text-decoration-none text-dark" class="product">
                <div class="product-box justify-content-center text-center">
                    <div class="product-inner-box position-relative">
                        <div class="m-2">
                            <img src="../uploads/products/<?php echo $products['path']; ?>" alt="<?php echo $products['book_name']; ?>" class="img-fluid">
                        </div>
                        
                        <div class="product-name">
                            <h4 id="fonttxt1" class="text-truncate"><?php echo $products['book_name']; ?></h4>
                            <p class="text-center text-truncate"><b>Author: </b><?php echo $products['author_name']; ?></p>
                            <b>Price:</b><span>€<?php echo number_format($products['price'],2); ?></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
    <?php
        }}}
    ?>

    </div>
</div>
</main>

<?php
require_once('../files/footer.php');
?>