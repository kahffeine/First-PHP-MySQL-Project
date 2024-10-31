<?php
require_once('../files/functions.php');

/*Submit New Sub-categories*/
if (isset($_POST['submit'])) {
    $sub_category_name = $_POST['subcat'];

    $sql = "SELECT * FROM sub_categories1 WHERE subcat = '{$sub_category_name}'";
    $res = $conn->query($sql);

    if (empty($_POST['subcat'])) {
        echo "<script>alert('Sub-category creation failed, Please name the category.');</script>";
        return false;
    }


    if (isset($_POST['submit'])) {
        $mainCat = $_POST['maincat'];

        if (empty($mainCat)){
            echo "<script>alert('Sub-category creation failed, Please choose a main category!');</script>";
            return false;
        }

        if (!empty($mainCat)) {
            $query = "INSERT INTO sub_categories1 (maincat_id, subcat) VALUES('$mainCat', '$sub_category_name');";
            $result = $conn->query($query);
            if ($result) {
                echo "<script>alert('Sub-category created successfully');</script>";
                return true;
            }
        }
    }
}

/*Remove Existent Sub-categories*/
if(isset($_GET['remove'])) {
    $id = intval($_GET['remove']);
    $sql_query = $conn->query("SELECT * FROM sub_categories1 WHERE id = '$id'") or die($conn->error);
    $sub_categories = $sql_query->fetch_assoc();
        $good = $conn->query("DELETE FROM sub_categories1 WHERE id = '$id'") or die($conn->error);
        if ($good) {
            echo "<script>alert('Sub-category removed successfully!');</script>";
            echo"<script> location.replace('sub-categories.php'); </script>";
            return false;
        }
}

/*Update Existent Sub-categories*/
if (isset($_POST['update'])) {
    $sub_category_name = $_POST['sub_cat_name'];
    $sub_cat_id = $_POST['subcat_id'];
    $mainCat = $_POST['maincat'];

    $sql = "SELECT * FROM sub_categories1 WHERE subcat = '{$sub_category_name}'";
    $res = $conn->query($sql);

    if (empty($_POST['sub_cat_name'])) {
        echo "<script>alert('Category creation failed, Please name the category.');</script>";
        return false;
    }
        if (!empty($mainCat)) {
            $query = "UPDATE sub_categories1 SET subcat = '$sub_category_name', id = '$sub_cat_id', maincat_id = '$mainCat' WHERE id='$sub_cat_id';";
            $result = $conn->query($query);
            if ($result) {
                echo "<script>alert('Sub-category updated successfully!');</script>";
                echo"<script> location.replace('sub-categories.php'); </script>"; 
                return true;
            }
        }
    }

