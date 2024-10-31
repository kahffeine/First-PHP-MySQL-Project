<?php
require_once('files/header.php');
/*Contact Page*/
?>

<div class="container p-5" id="fonttxt2">
    <h3 id="fonttxt1">How can we help?</h3>
    <p>Tell us what you think about our bookstore! Your opinion is very important to us, and we would love to hear it!</p>
    <form action="" class="row ">
        <div class="col-md-6">
            <label class="form-label">First Name</label>
            <input type="email" class="form-control" disabled>
        </div>

        <div class="col-md-6">
            <label class="form-label">Last Name</label>
            <input type="password" class="form-control" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Your e-mail here!" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled></textarea>
        </div>
            
        <div class="text-end">
            <button type="button" class="btn btn-outline-dark" disabled>Send it!</button>
        </div>
    </form> 
</div>

<div class="container px-5">
    <h4 id="fonttxt1">Contacts</h4>
    <ul class="list-unstyled ms-3" id="fonttxt2">
        <li>Address: 122 Writers Avenue 456-789-101 Readers, WR 12345 123-456-7890</li>
        <li>Zipcode: 12345</li>
        <li>E-mail: booknook@gmail.com</li>
        <li><b>Telephone Number: +123 456-789-101</b></li>
        <li><b>Mobile Number: +123 987-654-321</b></li>
    </ul>    
</div>

<?php
require_once('files/footer.php');
?>