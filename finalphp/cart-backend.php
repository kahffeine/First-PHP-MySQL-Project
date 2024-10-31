<?php

/*Add Product To Cart*/
if (isset($_POST['add-to-cart'])) {
    $userID = $_POST ['user'];
    $productID = $_POST ['productid'];
    $image = $_POST['path'];
    $cartProduct = $_POST['product'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    $query = "INSERT INTO shopping_cart (path, user_id, product_id, product, author, quantity, price) VALUES('$image', '$userID', '$productID', '$cartProduct', '$author', '1', '$price');";
    $result = $conn->query($query);
    if ($result) {
        alert('success','Product Added to Cart!');
        echo"<script> location.replace('allbooks.php'); </script>";
        return true;
    }
}

/*Change Product Quantity*/
if(isset($_POST['update-qt-btn'])) {
    $update_value = $_POST['update-qt'];
    $update_id = $_POST['update-qt-id'];
    $update_qt_query = mysqli_query($conn, "UPDATE shopping_cart SET quantity = '$update_value' WHERE id = '$update_id' ");
    if($update_qt_query){
        alert('success','Product quantity updated!');
        echo "<script> location.replace('cart.php?id=",$_SESSION['user']['id'],"');</script>";
    }
}

/*Remove Product From Cart*/
if(isset($_GET['remove'])) {
    $id = intval($_GET['remove']);
    $sql_query = $conn->query("SELECT * FROM shopping_cart WHERE id = '$id'") or die($conn->error);
    $remove = $sql_query->fetch_assoc();
        $good = $conn->query("DELETE FROM shopping_cart WHERE id = '$id'") or die($conn->error);
        if ($good) {
            alert('success','Product removed from cart!');
            echo "<script> location.replace('cart.php?id=",$_SESSION['user']['id'],"');</script>";

            return false;
        }
}

/*Place Order on DB*/
if (isset($_POST['checkout'])) {
    $order_query = mysqli_query($conn, "SELECT * FROM shopping_cart WHERE user_id = $id") or die($conn->error);
    if(mysqli_num_rows($order_query) > 0){
    while ($orderCart = mysqli_fetch_assoc($order_query)) { 
            $order_products[] = $orderCart['product'] .' ('. $orderCart['quantity'] .')';
            $order_authors[] = $orderCart['author'];
        }
    }
    $total_products = implode(' / ' , $order_products);
    $total_authors = implode(' / ' , $order_authors);
    $userID = $_POST ['user'];
    $price = $_POST['price'];

    $query = "INSERT INTO orders (user_id, products, authors, price) 
    VALUES('$userID', '$total_products', '$total_authors', '$price');";
    $result = $conn->query($query);
    if ($result) {
        $clearCart = $conn->query("DELETE FROM shopping_cart WHERE user_id = '$id'") or die($conn->error);
        alert('success','Order placed successfully!');
        echo "<script> location.replace('finish.php');</script>";
        return true;
        }
}