<?php
require_once('../files/functions.php');
require_once('../files/admin-header.php');
/*Admin Profile Page*/
?>

<main class="container">

<div class="container-fluid d-flex justify-content-center p-3">
        <h1 id="fonttxt1">Admin Profile</h1>
</div>

<table class="table table-striped-columns" id="fonttxt2">
    <thead>
        <tr>
            <th scope="col" id="fonttxt1"><h4>Contact Info</h4></th>
        </tr>
    </thead>
            
    <tbody>
        <tr>
            <td>
                <p id="fonttxt2"><?php echo $_SESSION['user']['first_name'];?> <?php echo $_SESSION['user']['last_name'];?></p>
                <p id="fonttxt2"><?php echo $_SESSION['user']['email'];?></p>
                <p id="fonttxt2"><?php echo $_SESSION['user']['phone_number'];?></p>
            </td>
        </tr>
    </tbody>

</table>

<div class="row p-2">
    <div class="col" id="containerx">
        <h4 id="fonttxt1">User view</h4>
        <p>Check how users see the page</p>
        <a href="../index.php">
            <button class="btn btn-outline-dark" type="button">User mainpage</button>
        </a>
    </div>
</div>
      
</main>

<?php
require_once('../files/footer.php');
?>