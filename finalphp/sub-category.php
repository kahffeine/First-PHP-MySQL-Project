<?php
require_once('files/functions.php');
login_first();
require_once('files/header.php');
/*Sub-category page*/
                
if(isset($_GET['id'])){
$id = $_GET['id'];
$subcat = getByMainID("sub_categories1", $id);
$maincat = getByID("categories1", $id);
if(mysqli_num_rows($subcat) > 0) {
    $data = mysqli_fetch_array($subcat);
    $mcatdata = mysqli_fetch_array($maincat);
?>

<div class="container d-flex justify-content-center mt-3">
    <div class="row p-4">
        <h2 id="fonttxt1"><?php echo $mcatdata ['cat_name']; ?> Sub-Categories</h2>
    </div>
</div>
    
<div class="container d-flex flex-wrap mb-5">

<?php
 $sql_query = $conn->query("SELECT * FROM sub_categories1 WHERE maincat_id = '$id'") or die($conn->error);
while ($data = $sql_query->fetch_assoc()) { 
?>

    <div class="col mt-3">
        <a href="catalogue.php?category=<?php echo $data['subcat'];?>" class="text-decoration-none text-dark">
            <div class="sub-category-box pt-5">
                <div class="sub-category-inner-box position-relative text-center">
                    <div class="category-name">
                        <h3 style="font-size: 30px;" id="fonttxt1"><?php echo $data['subcat']; ?></h3>
                    </div>
                </div>
            </div>
        </a>
    </div>

<?php } }else{ ?>

    <div class="container-fluid d-flex justify-content-center mt-3">
        <div class="row">
            <div class="col text-center m-2">
                <h1 id="fonttxt1">No products here... YET</h1>
                <p id="fonttxt2">This category is currently empty!</p>
                <p id="fonttxt2">Please check a different Category!</p>
                <img class="finishimg" src="imagens/sad.png" alt="" class="m-3">
                <div class="d-flex justify-content-center">
                    <a href="categories.php">
                        <button class="btn btn-outline-dark m-1" type="submit">Find books</button>
                    </a>                   
                </div>
            </div>
        </div>
    </div>

<?php }}?>

</div>
    
<?php
require_once('files/footer.php');
?>