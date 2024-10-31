<?php
require_once('files/functions.php');
/*User Header Page*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>The Book Nook</title>
    <link rel="icon" type="image/png" href="icons/book.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <meta name="keywords" content="books, store, header" />
    <meta name="description" content="The header from a bookstore" />
    <meta name="author" name="Karen Martins" />
    <!--Bootstrap-->  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--CSS-->   
    <link rel="stylesheet" type="text/css" href="style.css" />
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Darumadrop+One&family=Kosugi+Maru&display=swap" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div id="bottombar" class="container-fluid">
        <a class="navbar-brand" id="fonttxt1" href="<?= url('') ?>">The Booknook</a>
        <form class="d-flex">
        <div id="box1" class="navbar-nav">
            <?php if(is_logged_in()) { ?>
            <a class="nav-link d-flex"

                <?php 
                    /*If the person trying to Sign Sn is not an ADM redirect to User page*/
                    If ( $_SESSION['user']['user_type'] != 'Admin'){ 
                ?>
                    href="user-perfil.php" 
                <?php 
                    /*If the person trying to Sign In is an ADM redirect to ADM page*/
                    }else{ 
                ?>
                    href="admin/admin-perfil.php?id=<?php echo $_SESSION['user']['id'];?>" 
                <?php } ?>

            role="button" title="Account"alt="Account">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#F4F2EC"
                class="bi bi-person-circle m-2" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                <span class="d-none d-sm-block link-light m-2" id="fonttxt1"><?= $_SESSION['user']['first_name'] ?></span>
            </a>

            <?php
                /*If there is no one signed in show Sign Up Button instead of Profile Button*/ 
                } else { 
            ?>
            <a class="nav-link d-flex" href="signup.php"role="button" title="Account"alt="Account">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#F4F2EC"
                    class="bi bi-person-circle m-2" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                <span class="d-none d-sm-block link-light m-2" id="fonttxt1">Signup</span>
            </a>
        <?php } ?>
            

        </div>

        <?php
            /*If there is someone signed in show Shopping Cart*/ 
            if(is_logged_in()) { 
        ?>

            <div id="box1" class="navbar-nav">
                <a class="nav-link d-flex" href="cart.php?id=<?=$_SESSION['user']['id'];?>" title="Shopping Cart" alt="Shopping Cart">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#F4F2EC"
                    class="bi bi-cart3 m-2" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <p>
                        <?php
                        $cartHeader = $_SESSION['user']['id'];
                        $select_rows = mysqli_query($conn, "SELECT * FROM shopping_cart WHERE user_id = '$cartHeader' " );
                        $row_count = mysqli_num_rows($select_rows);
                        echo $row_count; 
                        ?>
                    </p>
                    <span class="d-none d-sm-block link-light m-2" id="fonttxt1">My cart</span>
                </a>
            </div>

        <?php } ?>
        
            <div id="box1" class="navbar-nav">
                <?php
                    /*If there is someone Signed In show Log Out Button*/ 
                    if(is_logged_in()) { 
                ?>

                <a class="nav-link d-flex" href="logout.php" title="Logout" alt="Logout button">
                    <img src="icons/logout.svg" width="24" height="24" fill="#F4F2EC" class="m-2">
                    <span class="d-none d-sm-block link-light m-2" id="fonttxt1">Log out</span>
                </a>

                <?php
                    /*If there is no one Signed in show Login button*/  
                    } else { 
                ?>

                <a class="nav-link d-flex" href="login.php" title="Logout" alt="Logout button">
                    <img src="icons/logout.svg" width="24" height="24" fill="#F4F2EC" class="m-2">
                    <span class="d-none d-sm-block link-light m-2" id="fonttxt1">Login</span>
                </a>

                <?php } ?>

            </div>
        </form>
    </div>
</nav>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid justify-content-center">
        <div class="row">  
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-lg-1">
                    <li class="nav-item me-lg-5">
                        <a class="nav-link" href="<?= url('') ?>">Home</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <a class="nav-link" href="aboutus.php">About us</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <a class="nav-link" href="contact.php">Contacts</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <a class="nav-link" href="categories.php">Categories</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <a class="nav-link" href="allbooks.php">Catalogue</a>
                    </li>
                </ul>
            </div>
        </div>  
    </div>
</nav>



<?php
    /*Display customized message to Users*/ 
    if(isset($_SESSION['alert'])){
?>

<div class="container pt-3">
    <div class="alert alert-<?= $_SESSION['alert']['type']?>">
        <?= $_SESSION['alert']['message'] ?>
    </div>
</div>

<?php unset($_SESSION['alert']); } ?>

