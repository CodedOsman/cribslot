<?php
    include('config/app.php');

    include("includes/header.inc.php");
?>
<div class="main">
    <?php include("includes/navbar.inc.php"); ?>
    <div class="py-5">
        <div class="container">
            <?php include('message.php'); ?>
            <h5>Home Page!</h5>
        </div>
    </div>
    <div class="row">
        <!-- Sidebar options -->
        <div class="col-md-2 ms-auto side bg-light">
            <h5 class="text-center">Categories</h5>
            <a href="#">Commercial Properties</a>
            <a href="#">Residential Properties</a>
        </div>
        <!-- Carousel -->
        <div class="carousel col-md-6 slide" id="CarouselRide" data-bs-ride="carousel">
            <ol class="carousel-indicators"><!-- Carousel Indicators -->
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol><!-- Carousel Indicators End -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/property1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/property2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/property3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#CarouselRide" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#CarouselRide" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div><!-- Carousel End -->

        <div class="col-2 me-auto">
            <div class="card text-center bg-warning">
                <div class="card-body">
                    <h5 class="card-title">CLEARANCE SALE</h5>
                    <p class="card-text">UP TO 60% OFF</p>
                </div>
            </div>
        </div>

    </div>
    <a href="#" class="theme-toggle">
        <i class="fa-regular fa-moon"></i>
        <i class="fa-regular fa-sun"></i>
    </a>
</div>
<?php
    include("includes/footer.inc.php");
?>