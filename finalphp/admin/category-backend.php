<?php
require_once('../files/functions.php');

/*Submit New Categories*/
if (isset($_POST['submit'])) {
    $category_name = $_POST['cat_name'];

    $sql = "SELECT * FROM categories1 WHERE cat_name = '{$category_name}'";
    $res = $conn->query($sql);

    if (empty($_POST['cat_name'])) {
        echo "<script>alert('Category creation failed, Please name the category.');</script>";
        return false;
    }

    if ($res->num_rows > 0) {
        echo "<script>alert('Category already exists.');</script>";
        return false;
    }

    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];

    $imageFormat = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ($imageFormat != 'jpg' && $imageFormat != 'png') {
        echo "<script>alert('Please select a valid image.');</script>";
        return false;
        
    }else{

    move_uploaded_file($tempname, '../uploads/categories/'.$filename);
    
    $sql="insert into categories1 (cat_name, img_path) values ('$category_name', '$filename')";
    $result=mysqli_query($conn,$sql);

        if($result) {
            echo "<script>alert('Category created successfully!');</script>";
            echo"<script> location.replace('main-categories.php'); </script>";
        }else{
            echo "<script>alert('Unable to create category.');</script>";
        }
    }
} 

/*Remove Existent Categories*/
if(isset($_GET['remove'])) {

    $id = intval($_GET['remove']);
   
    $getdata=("SELECT * from categories1 WHERE id='$id'");
    $dataresult=mysqli_query($conn,$getdata);
    $data=mysqli_fetch_array($dataresult);

    $sql=("DELETE FROM categories1 WHERE id = '$id'");
    $result = mysqli_query($conn,$sql);
    if($result){
        $path='../uploads/categories/'.$data['img_path'];
        if(!unlink($path)) {
            echo "<script>alert('Unable to remove category image from database.');</script>";
        }else{
        echo "<script>alert('Category removed successfully!');</script>";
        echo"<script> location.replace('main-categories.php'); </script>";}
    }

}

/*Update Existent Categories*/
if(isset($_POST['update'])) {
    $id = intval($_GET['id']);
    $category_name = $_POST['cat_name'];

    $getdata=("SELECT * from categories1 WHERE id='$id'");
    $dataresult=mysqli_query($conn,$getdata);
    $data=mysqli_fetch_array($dataresult);
    $path='../uploads/categories/'.$data['img_path'];

    if($_FILES['image']['name'] != ""){

        $filename = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];

        $imageFormat = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if ($imageFormat != 'jpg' && $imageFormat != 'png') {
            echo "<script>alert('Please select a valid image.');</script>";
            return false;
            
            }else{
            unlink($path);
            move_uploaded_file($tempname, '../uploads/categories/'.$filename);
            }

    }else{
        $filename = $_POST['oldimage'];
    }

    $sql="UPDATE categories1 SET cat_name = '$category_name', img_path = '$filename' WHERE id='$id';";
    $result=mysqli_query($conn,$sql);

    if($result) {
        echo "<script>alert('Category updated successfully!');</script>";
        echo"<script> location.replace('main-categories.php'); </script>";
    }else{
        echo "<script>alert('Unable to update category.');</script>";
    }
}