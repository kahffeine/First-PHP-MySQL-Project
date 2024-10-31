<?php
require_once('files/functions.php');
/*Login Backend*/


$email = trim($_POST['email']);
$password = trim($_POST['password']);


/*Redirecting users and adms to their specific page*/
if ( login_user($email,$password) ){
    $select = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

        if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

            if ($row["user_type"] == 'Admin') {
                login_user($email,$password);
                echo"<script> location.replace('admin/main-products.php'); </script>";

            } else {
                login_user($email,$password);
                echo"<script> location.replace('index.php'); </script>";
            }
        }

    alert('success','Account logged in successfully.');
    die();

} else {
    
    alert('danger','You entered wrong username or password.');
    echo"<script> location.replace('login.php'); </script>";
    die();
}

