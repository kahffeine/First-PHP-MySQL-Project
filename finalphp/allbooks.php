<?php
require_once('files/functions.php');
login_first();
require_once('files/header.php');
/*Catalogue Page with all books and search box*/

$sql_query = $conn->query("SELECT * FROM products");
?>

<main>
    <div class="container d-flex justify-content-center">
        <div class="row p-4">
            <h2 id="fonttxt1">Find your Book</h2>
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
                <a href="book.php?id=<?=$products['id'];?>" class="text-decoration-none text-dark" class="product">
                    <div class="product-box d-flex justify-content-center">
                        <div class="product-inner-box position-relative text-center">
                            <div class="m-2">
                                <img src="uploads/products/<?php echo $products['path']; ?>" alt="<?php echo $products['book_name']; ?>" class="img-fluid">
                            </div>
                        
                            <div class="product-name">
                                <h4 id="fonttxt1" class="d-inline-block text-truncate" style="max-width: 200px;"><?php echo $products['book_name']; ?></h4>
                            </div>
                            
                            <div class="product-price d-flex" >
                                <p class="me-4 d-inline-block text-truncate" style="max-width: 200px;"><?php echo $products['author_name']; ?></p>

                                <b>Price:</b><span class="ms-1">€<?php echo number_format($products['price'],2); ?></span>
                            </div>
                            
                            <div class="cart-btn shadow-sm">
                                <form method="POST" enctype="multipart/form-data" class="row ">
                                    <input type="hidden" name="user" value="<?php echo $_SESSION['user']['id'];?>"> 
                                    <input type="hidden" name="path" value="<?php echo $products['path']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $products['price']; ?>">
                                    <input type="hidden" name="productid" value="<?php echo $products['id']; ?>">
                                    <input type="hidden" name="product" value="<?php echo $products['book_name']; ?>">
                                    <input type="hidden" name="author" value="<?php echo $products['author_name']; ?>">

                                    <button class="btn btn-white" type="submit" name="add-to-cart"><i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    class="bi bi-cart3" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg></i> Add to cart</button>
                                </form>                   
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
                    <div class="row m-5">
                        <h2 id="fonttxt1">Unable to find book !</h2>
                    </div>
            </div>

        <?php 
        } else {
        /*Display found data*/
        while ($products = $sql_query->fetch_assoc()) {
        ?>
                <div class="col">
                    <a href="book.php?id=<?=$products['id'];?>" class="text-decoration-none text-dark" class="product">
                        <div class="product-box d-flex justify-content-center">
                            <div class="product-inner-box position-relative text-center">
                                <div class="m-2">
                                    <img src="uploads/products/<?php echo $products['path']; ?>" alt="<?php echo $products['book_name']; ?>" class="img-fluid">
                                </div>
                            
                                <div class="product-name">
                                    <h4 id="fonttxt1" class="d-inline-block text-truncate" style="max-width: 200px;"><?php echo $products['book_name']; ?></h4>
                                </div>
                                
                                <div class="product-price d-flex">
                                <p class="me-4 d-inline-block text-truncate" style="max-width: 200px;"><?php echo $products['author_name']; ?></p>
                                <b>Price:</b><span class="ms-1">€<?php echo number_format($products['price'],2); ?></span>
                                </div>

                                <div class="cart-btn shadow-lg m-2">
                                    <form method="POST" enctype="multipart/form-data" class="row ">
                                        <input type="hidden" name="user" value="<?php echo $_SESSION['user']['id'];?>"> 
                                        <input type="hidden" name="path" value="<?php echo $products['path']; ?>">
                                        <input type="hidden" name="price" value="<?php echo $products['price']; ?>">
                                        <input type="hidden" name="productid" value="<?php echo $products['id']; ?>">
                                        <input type="hidden" name="product" value="<?php echo $products['book_name']; ?>">
                                        <input type="hidden" name="author" value="<?php echo $products['author_name']; ?>">
                                        <button class="btn btn-white" type="submit" name="add-to-cart"><i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            class="bi bi-cart3" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </svg></i> Add to cart</button>
                                    </form>                   
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
require_once('cart-backend.php');
require_once('files/footer.php');
?>