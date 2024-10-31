<?php
require_once('files/functions.php');
/*Create new users backend*/

$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password_1 = trim($_POST['password_1']);
$phone_number = trim($_POST['phone_number']);
$last_name = trim($_POST['last_name']);
$first_name = trim($_POST['first_name']);
$user_type = trim($_POST['user_type']);

if ($password != $password_1) {
    alert('danger','Passwords did not match.');
    echo"<script> location.replace('signup.php'); </script>";
    die();
}


$sql = "SELECT * FROM users WHERE email = '{$email}'";
$res = $conn->query($sql);

if(empty($_POST['first_name'])){
    alert('danger','All fields are required');
    echo"<script> location.replace('signup.php'); </script>";
    die;
}

if(empty($_POST['last_name'])){
    alert('danger','All fields are required');
    echo"<script> location.replace('signup.php'); </script>";
    die;
}

if(empty($_POST['phone_number'])){
    alert('danger','All fields are required');
    echo"<script> location.replace('signup.php'); </script>";
    die;
}

if(empty($_POST['password'])){
    alert('danger','All fields are required');
    echo"<script> location.replace('signup.php'); </script>";
    die;
}

if(empty($_POST['email'])){
    alert('danger','All fields are required');
    echo"<script> location.replace('signup.php'); </script>";
    die;
}

if($res->num_rows > 0){
    alert('danger','User with same email address already exist.');
    echo"<script> location.replace('signup.php'); </script>";
    die();
}

$password = password_hash($password,PASSWORD_DEFAULT);
$created = time ();

$sql = "INSERT INTO users (
            first_name,
            last_name,
            phone_number,
            password,
            email,
            user_type,
            created     
) VALUES (
    '{$first_name}',
    '{$last_name}',
    '{$phone_number}',
    '{$password}',
    '{$email}',
    '{$user_type}',
    '{$created}'
)";

if ($conn->query($sql)) {
    login_user($email,$password);
    alert('success','Account created successfully.');
    echo"<script> location.replace('index.php'); </script>";
    die();
} else {
    alert('danger','Failed to create account.');
    echo"<script> location.replace('signup.php'); </script>";
    die();
}





