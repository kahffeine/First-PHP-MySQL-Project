<?php
require_once('../files/functions.php');

/*Submit New Products*/
if (isset($_POST['submit'])) {

    $book_name = $conn->real_escape_string($_POST['book_name']);
    $maincat = trim($_POST['maincat']);
    $author_name = $conn->real_escape_string($_POST['author_name']);
    $subcat = trim($_POST['subcat']);
    $price = ($_POST['price']);
    $details = $conn->real_escape_string($_POST['details']);
    
    $sql = "SELECT * FROM products WHERE book_name = '$book_name'";
    $res = $conn->query($sql);
    
    if (empty($_POST['book_name'])) {
        echo "<script>alert('Product creation failed, Please name the product.');</script>";
        return false;
    }

    if ($res->num_rows > 0) {
        echo "<script>alert('Product already exists.');</script>";
        return false;
    }

    if (empty($_POST['maincat'])) {
        echo "<script>alert('Product creation failed, Please choose a main category.');</script>";
        return false;
    }

    if (empty($_POST['author_name'])) {
        echo "<script>alert('Product creation failed, Please add author name.');</script>";
        return false;
    }

    if (empty($_POST['subcat'])) {
        echo "<script>alert('Product creation failed, Please choose a sub-category.');</script>";
        return false;
    }

    if (empty($_POST['price'])) {
        echo "<script>alert('Product creation failed, Please add a price.');</script>";
        return false;
    }

    if (empty($_POST['details'])) {
        echo "<script>alert('Product creation failed, Please add details');</script>";
        return false;
    }

    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];

    $imageFormat = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ($imageFormat != 'jpg' && $imageFormat != 'png') {
        echo "<script>alert('Please select a valid image.');</script>";
        return false;
        
    }else{

    move_uploaded_file($tempname, '../uploads/products/'.$filename);
    
    $sql="INSERT INTO products (
        book_name,
        maincat,
        author_name,
        subcat,
        price,
        details,
        path     
    ) VALUES (
    '{$book_name}',
    '{$maincat}',
    '{$author_name}',
    '{$subcat}',
    '{$price}',
    '{$details}',
    '{$filename}'
    )";

    $result=mysqli_query($conn,$sql);

        if($result) {
            echo "<script>alert('Product created successfully!');</script>";
            echo"<script> location.replace('main-products.php'); </script>";
        }else{
            echo "<script>alert('Unable to create product.');</script>";
        }
    }
}
 
/*Remove Products*/
if(isset($_GET['remove'])) {

    $id = intval($_GET['remove']);
   
    $getdata=("SELECT * from products WHERE id='$id'");
    $dataresult=mysqli_query($conn,$getdata);
    $data=mysqli_fetch_array($dataresult);

    $sql=("DELETE FROM products WHERE id = '$id'");
    $result = mysqli_query($conn,$sql);
    if($result){
        $path='../uploads/products/'.$data['path'];
        if(!unlink($path)) {
            echo "<script>alert('Unable to remove product image from database.');</script>";
        }else{
        echo "<script>alert('Product removed successfully!');</script>";
        echo"<script> location.replace('main-products.php'); </script>";}
    }

}

/*Update existent Products*/
if(isset($_POST['update'])) {
    $id = intval($_GET['id']);
    $book_name = $conn->real_escape_string($_POST['book_name']);
    $maincat = $conn->real_escape_string($_POST['maincat']);
    $author_name = $conn->real_escape_string($_POST['author_name']);
    $subcat = trim($_POST['subcat']);
    $price = trim($_POST['price']);
    $details = $conn->real_escape_string($_POST['details']);

    $getdata=("SELECT * from products WHERE id='$id'");
    $dataresult=mysqli_query($conn,$getdata);
    $data=mysqli_fetch_array($dataresult);
    $path='../uploads/products/'.$data['path'];



    if (empty($_POST['book_name'])) {
        echo "<script>alert('Product creation failed, Please name the product.');</script>";
        return false;
    }

    if (empty($_POST['maincat'])) {
        echo "<script>alert('Product creation failed, Please choose a main category.');</script>";
        return false;
    }

    if (empty($_POST['author_name'])) {
        echo "<script>alert('Product creation failed, Please add author name.');</script>";
        return false;
    }

    if (empty($_POST['subcat'])) {
        echo "<script>alert('Product creation failed, Please choose a sub-category.');</script>";
        return false;
    }

    if (empty($_POST['price'])) {
        echo "<script>alert('Product creation failed, Please add a price.');</script>";
        return false;
    }

    if (empty($_POST['details'])) {
        echo "<script>alert('Product creation failed, Please add details');</script>";
        return false;
    }

    if($_FILES['image']['name'] != ""){

        $filename = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];

        $imageFormat = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if ($imageFormat != 'jpg' && $imageFormat != 'png') {
            echo "<script>alert('Please select a valid image.');</script>";
            return false;
            
            }else{
            unlink($path);
            move_uploaded_file($tempname, '../uploads/products/'.$filename);
            }

    }else{
        $filename = $_POST['oldimage'];
    }

    $sql="UPDATE products SET 
        book_name = '$book_name',
        maincat = '$maincat',
        author_name = '$author_name',
        subcat = '$subcat',
        price = '$price',
        details = '$details',
        path = '$filename'
        WHERE id='$id';";
    
    $result=mysqli_query($conn,$sql);

    if($result) {
        echo "<script>alert('Product updated successfully!');</script>";
        echo"<script> location.replace('main-products.php'); </script>";
    }else{
        echo "<script>alert('Unable to update product.');</script>";
    }
}