<?php
require_once('files/header.php');
/*Sign up page*/
?>

<main class="container">
    <div class="row p-5">
        <div class="col" id="containerx">
            <h4 id="fonttxt1">Sign up!</h4>
            <form method="post" action="signup-backend.php" class="row g-3" id="fonttxt2">
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_1" class="form-control">
                </div>
                
                <input type="hidden" name="user_type" value="Customer">
                
                <hr class="mt-5">

                <div class="text-end pt-4">
                    <button class="btn btn-outline-dark" type="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</main>


<?php
require_once('files/footer.php');
?>