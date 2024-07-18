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
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-current="true" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-current="true" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-current="true" aria-label="Slide 4"></button>
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
        </div><!-- Carousel ends here -->

        <!-- Section starts here -->
        <section id="about" class="about section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="about-img">
                            <img src="assets/images/shutterstock_88694731.0.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                        <h2>We Provide Best Quality</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa expedita, provident error quos vel assumenda quasi eveniet dignissimos explicabo ullam est eum laborum fuga, ratione fugit cumque quibusdam ea earum?</p>
                        <a href="#" class="btn btn-warning">Learn More</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="services section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header text-center p-5">
                            <h2>Our Services</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ea commodi est itaque eligendi modi, provident iusto delectus mollitia quas reiciendis! Consequuntur ad labore totam, molestiae itaque ex dolores repudiandae!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card text-white text-center bg-dark pb-2">
                            <div class="card-body">
                                <h3 class="card-title">Best Quality</h3>
                                <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate tempora obcaecati omnis dolorem officia officiis necessitatibus quia veniam iusto facere, praesentium odit ipsum reprehenderit repudiandae hic voluptates quae sapiente rerum.</p>
                                <button class="btn btn-warning text-dark">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card text-white text-center bg-dark pb-2">
                            <div class="card-body">
                                <h3 class="card-title">Best Quality</h3>
                                <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate tempora obcaecati omnis dolorem officia officiis necessitatibus quia veniam iusto facere, praesentium odit ipsum reprehenderit repudiandae hic voluptates quae sapiente rerum.</p>
                                <button class="btn btn-warning text-dark">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card text-white text-center bg-dark pb-2">
                            <div class="card-body">
                                <h3 class="card-title">Best Quality</h3>
                                <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate tempora obcaecati omnis dolorem officia officiis necessitatibus quia veniam iusto facere, praesentium odit ipsum reprehenderit repudiandae hic voluptates quae sapiente rerum.</p>
                                <button class="btn btn-warning text-dark">Learn More</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="portfolio" class="portfoli section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header text-center p-5">
                            <h2>Our Projects</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ea suscipit rerum dolores libero laudantium sequi molestiae at blanditiis. Magni saepe esse eligendi, eaque praesentium totam cumque voluptatum accusamus et!</p>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card text-center bg-white pb-2">
                            <div class="card-body text-dark">
                                <div class="img-area mb-4">
                                    <img src="assets/images/(66).jpg" alt="" class="img-fluid">
                                </div>
                                <h3 class="card-title">Building Make</h3>
                                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem laborum eum ratione minima optio, perspiciatis repudiandae quia amet voluptatem aliquid deleniti, maiores exercitationem alias! Saepe dolorem possimus nam beatae? Alias?</p>
                                <button class="btn bg-warning text-dark">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card text-center bg-white pb-2">
                            <div class="card-body text-dark">
                                <div class="img-area mb-4">
                                    <img src="assets/images/(66).jpg" alt="" class="img-fluid">
                                </div>
                                <h3 class="card-title">Building Make</h3>
                                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem laborum eum ratione minima optio, perspiciatis repudiandae quia amet voluptatem aliquid deleniti, maiores exercitationem alias! Saepe dolorem possimus nam beatae? Alias?</p>
                                <button class="btn bg-warning text-dark">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card text-center bg-white pb-2">
                            <div class="card-body text-dark">
                                <div class="img-area mb-4">
                                    <img src="assets/images/(66).jpg" alt="" class="img-fluid">
                                </div>
                                <h3 class="card-title">Building Make</h3>
                                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem laborum eum ratione minima optio, perspiciatis repudiandae quia amet voluptatem aliquid deleniti, maiores exercitationem alias! Saepe dolorem possimus nam beatae? Alias?</p>
                                <button class="btn bg-warning text-dark">Learn More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header text-center p-5">
                            <h2>Contact Us</h2>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga deleniti harum obcaecati aliquid vero tempora excepturi corporis culpa eaque. Sapiente omnis nobis facere voluptas! Soluta in et magni ab adipisci?</p>
                        </div>
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-md-12 p-0 pt-4 p4 pb-4">
                       <form action="#" class="p-4 m-auto">
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Your fullname">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Your fullname">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <textarea name="" rows="3" id="" class="form-control" placeholder="Your message"></textarea>
                                            
                                        </div>
                                    </div>

                                    <button class="btn btn-warning btn-lg btn-block mt-3">Send Now</button>
                                </div>
                       </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <a href="#" class="theme-toggle">
        <i class="fa-regular fa-moon"></i>
        <i class="fa-regular fa-sun"></i>
    </a>
</div>
<?php
include("includes/footer.inc.php");
?>