<?php
    include('config/app.php');

    include("includes/header.inc.php");
?>
<div class="wrapper main">
        <main>
            <?php include("includes/navbar.inc.php"); ?>
            <div class="carousel slide" id="myCarousel" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"  aria-current="true" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"  aria-current="true" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3"  aria-current="true" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/images/(14).jpg" alt="Slide 1" class="img-responsive d-block w-100">
                        <div class="carousel-caption">
                            <h5>First Slide</h5>
                            <p>Some long notes</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/(34).jpg" alt="Slide 2" class="img-responsive d-block w-100">
                        <div class="carousel-caption">
                            <h5>Second Slide</h5>
                            <p>Some long notes</p>
                            <p><a href="#" class="btn btn-warning mt-3">Learn More</a></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/(34).jpg" alt="Slide 3" class="img-responsive d-block w-100">
                        <div class="carousel-caption">
                            <h5>Third Slide</h5>
                            <p>Some long notes</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/(34).jpg" alt="Slide 4" class="img-responsive d-block w-100">
                        <div class="carousel-caption">
                            <h5>Fourth Slide</h5>
                            <p>Some long notes</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
           
        </main>
        <a href="#" class="theme-toggle">
            <i class="fa-regular fa-moon"></i>
            <i class="fa-regular fa-sun"></i>
        </a>
</div>
<?php
    include("includes/footer.inc.php");
?>