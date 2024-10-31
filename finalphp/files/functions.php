<?php
/*Functions and "Universal Codes"*/

/*Connect to Database and Start User Session*/
if (session_status () == PHP_SESSION_NONE) {
    session_start();
}

define('BASE_URL','http://localhost/finalphp');

 $conn = new mysqli('localhost','root','','finalphp'); 


/*Clean URL Function*/
function url($path = "/")
{
    return BASE_URL.$path;
}

/*Select all from an specific table where the ID matches with the URL ID*/
function getByID($table, $id){
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id'";
    return $query_run = mysqli_query($conn, $query);
    }

    function getByMainID($table, $id){
        global $conn;
        $query = "SELECT * FROM $table WHERE maincat_id='$id'";
        return $query_run = mysqli_query($conn, $query);
        }    

/*Make sure users are unable to access certain pages without being logged in*/
function login_first()
{
    if(!isset($_SESSION['user'])){
        alert('warning', 'Unauthorized access, Login before you proceed.');
        echo"<script> location.replace('login.php'); </script>";
        die();
    }
}

/*Make sure the adm is unable to access certain pages without being logged in and making sure the person trying to sign in is an ADM*/
function admlogin_first()
{
    if(!isset($_SESSION['user'])){
        alert('warning', 'Unauthorized access, Login before you proceed.');
        echo"<script> location.replace('../login.php'); </script>";
        die();
    }
    If ( $_SESSION['user']['user_type'] != 'Admin'){ 
        alert('warning','You do not have access to this section.');
        echo"<script> location.replace('../index.php'); </script>";
        } 
}

/*Log out from library*/
function logout()
{
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
    }
    alert('success','Logged out successfully!');
    echo"<script> location.replace('./index.php'); </script>";
}

/*Check if someone is already logged in*/
function is_logged_in()
{
    if(isset($_SESSION['user'])){
        return true;
    } else {
        return false;
    }
}

/*Make sure users that are already logged in are unable to access the login page*/
function if_logged_in()
{
    if(isset($_SESSION['user'])){
        alert('warning','You are already logged in.');
        echo"<script> location.replace('index.php'); </script>";
        return false;
    }
}

/*User customised message*/
function alert($type, $message){
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['message'] = $message;
}

/*Login Function*/
function login_user($email,$password)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE email = '{$email}'";
    $res = $conn->query($sql);
    
    if($res->num_rows < 1){
        return false;
    }

    $row = $res->fetch_assoc();

    if (!password_verify($password, $row['password'])) {
        return false;
    }

    $_SESSION['user'] = $row;

    return true;
}




