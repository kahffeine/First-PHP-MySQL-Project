<?php
require_once('files/header.php');
if_logged_in();
/*Login Page*/
?>

<main class="container">
<div class="row p-5">
    <div class="col" id="containerx">
        <h4 id="fonttxt1">Log in!</h4>

        <div class="container" id="fonttxt2">
            <form action="login-backend.php" method="post">
                <div class="row">
                    <label class="form-label">Email</label>
                    <div class="col">
                        <input name="email" type="email" class="form-control" placeholder="ex: email@hotmail.com">
                    </div>
                </div>
                <div class="row">
                    <label class="form-label">Password</label>
                    <div class="col">
                        <input name="password" type="password" class="form-control">
                    </div>
                </div>

                <hr class="mt-2">

                <div class="text-end pt-4">
                    <button class="btn btn-dark" type="submit" name="login">Sign In</button>
                    <a href="signup.php" class="btn btn-outline-dark" role="button" aria-pressed="true">Create an
                        Account</a>
                </div>
            </form>
        </div>
    </div>
</div>
</main>

<?php
require_once('files/footer.php');
?>