<?php
require_once('files/functions.php');
login_first();
require_once('files/header.php');
/*After checkout page*/
?>

<div class="container-fluid d-flex justify-content-center mt-3">
    <div class="row">
        <div class="col text-center m-2">
            <h1 id="fonttxt1">Congratulations!</h1>
            <p id="fonttxt2">We successfully received your request</p>
            <p id="fonttxt2">You'll receive a message when your items are ready to pick up!</p>
            <img class="finishimg border" src="imagens/joy.png" alt="" class="m-3">
            <div class="d-flex justify-content-center">
                <a href="index.php">
                    <button class="btn btn-outline-dark m-1" type="submit">Go back to the Mainpage</button>
                </a>                   
            </div>
        </div>
    </div>
</div>

<?php
require_once('files/footer.php');
?>