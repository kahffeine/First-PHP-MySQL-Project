<?php
require_once('files/header.php');
/*Library Homepage*/
?>

<!-- Carousel -->
<main>
<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="carousel-caption d-none d-md-block">
                <h5>New Arrivals</h5>
                <a href="allbooks.php">
                    <button class="btn btn-outline-light m-1">New books every week!</button>
                </a>
            </div>
            <img src="imagens/bookstore3.jpg" class="d-block w-100" alt="First Slide">
        </div>

        <div class="carousel-item">
            <div class="carousel-caption d-none d-md-block">
                <h5>Find the perfect book for you!</h5>
                <a href="categories.php">
                    <button class="btn btn-outline-light m-1">Find books!</button>
                </a>
            </div>
            <img src="imagens/homepage1.jpg" class="d-block w-100" alt="...">
        </div>

        <div class="carousel-item">
            <div class="carousel-caption d-none d-md-block">
                <h5>Get to know us!</h5>
                <a href="aboutus.php">
                    <button class="btn btn-outline-light m-1">More about us!</button>
                </a>
            </div>
            <img src="imagens/bookstore2.jpg" class="d-block w-100" alt="...">
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<!-- Bootstrap JavaScript -->
<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<div class="container d-flex justify-content-center p-5">
    <div class="row">
        <div class="col pb-4">
            <h2 class="text-center" id="fonttxt1">A category for every book!</h2>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col">
                <a href="sub-category.php?id=1" class="text-decoration-none text-dark">
                    <div class="quicklink-box d-flex justify-content-center">
                        <div class="quicklink-inner-box position-relative text-center">
                            <img src="uploads/categories/adventure-game.png" alt="img 1" class="img-fluid">
                            <h5 id="fonttxt2">Adventure</h5>
                        </div>     
                    </div>
                </a> 
            </div>

            <div class="col">
                <a href="categories.php" class="text-decoration-none text-dark">
                    <div class="quicklink-box d-flex justify-content-center">
                        <div class="quicklink-inner-box position-relative text-center">
                            <img src="uploads/categories/book.png" alt="img 1" class="img-fluid">
                            <h5 id="fonttxt2">All categories</h5>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col">
                <a href="sub-category.php?id=2" class="text-decoration-none text-dark">
                    <div class="quicklink-box d-flex justify-content-center">
                        <div class="quicklink-inner-box position-relative text-center">
                            <img src="uploads/categories/ufo.png" alt="img 1" class="img-fluid">
                            <h5 id="fonttxt2">Sci-fi</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-dark p-4">
    <div class="row p-2">
        <div class="col-lg-10 offset-md-1 text-center text-light">
            <h3 id="fonttxt1" class="p-3">The Booknook is a local independent bookstore!</h3>
            <img class="img-fluid border" style="width: 500px" src="imagens/bookstore4.jpg" alt="The Booknook">
            <h5 id="fonttxt1">Come visit us!</h5>
            <p> Hours: Everyday from <b>10am to 6pm</b> </p>
            <p><b> 
                122 Writers Avenue <br />
                Readers, WR 12345 <br />
                123-456-7890  
            </b></p>
        </div>
    </div>
</div>

<div class="container-fluid d-flex justify-content-center mt-3">
    <div class="row">
        <div class="col text-center m-2">
            <h1 id="fonttxt1">Tell us your opinion !</h1>
            <p id="fonttxt2">We from the booknook would love to hear about you!</p>
            <p id="fonttxt2">Feel free give suggestions !</p>
            <img class="finishimg border" src="imagens/mail.png" alt="" class="m-3">
            <div class="d-flex justify-content-center">
                <button class="btn btn-outline-dark m-1" type="submit" disabled>Send a message!</button>                
            </div>  
        </div>
    </div>
</div>
</main>

<?php
require_once('files/footer.php');
?>
