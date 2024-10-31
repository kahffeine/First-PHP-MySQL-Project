<?php
require_once('../files/functions.php');
admlogin_first();
/*ADM Header Page*/
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
    <!--Bootstrap JavaScript and CSS-->   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--CSS-->   
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <!--Fonts-->   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Darumadrop+One&family=Kosugi+Maru&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div id="bottombar" class="container-fluid">
            <a class="navbar-brand" id="fonttxt1">The Booknook</a>
            <form class="d-flex">
            <!--Access ADM Profile -->        
            <div id="box1" class="navbar-nav">
                <a class="nav-link d-flex" href="admin-perfil.php?id=<?php echo $_SESSION['user']['id'];?>" role="button" title="Account"alt="Account">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#F4F2EC"
                        class="bi bi-person-circle m-2" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                    <span class="d-none d-sm-block link-light m-2" id="fonttxt1"><?= $_SESSION['user']['first_name']  ?></span>
                </a>
            </div>

            <div id="box1" class="navbar-nav">
            <!--Access ADM Control Panel-->   
                <a class="nav-link d-flex" href="manage-users.php" title="Control" alt="Control Panel">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" fill="#F4F2EC" class="m-2" viewBox="0 0 50 50">
                    <path d="M47.16,21.221l-5.91-0.966c-0.346-1.186-0.819-2.326-1.411-3.405l3.45-4.917c0.279-0.397,0.231-0.938-0.112-1.282 l-3.889-3.887c-0.347-0.346-0.893-0.391-1.291-0.104l-4.843,3.481c-1.089-0.602-2.239-1.08-3.432-1.427l-1.031-5.886 C28.607,2.35,28.192,2,27.706,2h-5.5c-0.49,0-0.908,0.355-0.987,0.839l-0.956,5.854c-1.2,0.345-2.352,0.818-3.437,1.412l-4.83-3.45 c-0.399-0.285-0.942-0.239-1.289,0.106L6.82,10.648c-0.343,0.343-0.391,0.883-0.112,1.28l3.399,4.863 c-0.605,1.095-1.087,2.254-1.438,3.46l-5.831,0.971c-0.482,0.08-0.836,0.498-0.836,0.986v5.5c0,0.485,0.348,0.9,0.825,0.985 l5.831,1.034c0.349,1.203,0.831,2.362,1.438,3.46l-3.441,4.813c-0.284,0.397-0.239,0.942,0.106,1.289l3.888,3.891 c0.343,0.343,0.884,0.391,1.281,0.112l4.87-3.411c1.093,0.601,2.248,1.078,3.445,1.424l0.976,5.861C21.3,47.647,21.717,48,22.206,48 h5.5c0.485,0,0.9-0.348,0.984-0.825l1.045-5.89c1.199-0.353,2.348-0.833,3.43-1.435l4.905,3.441 c0.398,0.281,0.938,0.232,1.282-0.111l3.888-3.891c0.346-0.347,0.391-0.894,0.104-1.292l-3.498-4.857 c0.593-1.08,1.064-2.222,1.407-3.408l5.918-1.039c0.479-0.084,0.827-0.5,0.827-0.985v-5.5C47.999,21.718,47.644,21.3,47.16,21.221z M25,32c-3.866,0-7-3.134-7-7c0-3.866,3.134-7,7-7s7,3.134,7,7C32,28.866,28.866,32,25,32z"></path>
                    </svg>
                    <span class="d-none d-sm-block link-light m-2" id="fonttxt1">Control Panel</span>
                </a>
            </div>

            <div id="box1" class="navbar-nav">

            <!--Logout--> 
            <?php if(is_logged_in()) { ?>

            <a class="nav-link d-flex" href="../logout.php" title="Logout" alt="Logout button">
                <img src="../icons/logout.svg" width="24" height="24" fill="#F4F2EC" class="m-2">
                <span class="d-none d-sm-block link-light m-2" id="fonttxt1">Log out</span>
            </a>

            <?php } ?>

            </div>

            </form>
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