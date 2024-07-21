<?php
include('config/app.php');
if(isset($_SESSION['authenticated'])){
    include("classes/dbh.class.php");
    include("classes/userdash.class.php");
    include("classes/dashview.class.php");

    $profile_info = new DashView();
    $userid = $_SESSION['auth_user']['user_id'];
    $username = $profile_info->fetchUserName($userid);
    $dob = $profile_info->fetchDob($userid);
    $dp = $profile_info->fetchdp($userid);
    $path = 'profiles/' . $username . $userid . '/dps';
    $profile_photo = $path . '/' . $dp;
}


include("includes/header.inc.php");
?>
<div class="wrapper main">
    <main>
        <?php include("includes/navbar.inc.php"); ?>
        <div class="carousel slide mb-5" id="myCarousel" data-bs-ride="carousel">
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
                        <h5>Manage your assets on the go!</h5>
                        <p><a href="signup.php" class="btn btn-warning mt-3">Join Cribslot Now!</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/(34).jpg" alt="Slide 2" class="img-responsive d-block w-100">
                    <div class="carousel-caption">
                        <h5>Assets  History</h5>
                        <p>A centralized system to keep track of all your asset engagements</p>
                        <p><a href="signup.php" class="btn btn-warning mt-3">Join Cribslot Now!</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/(34).jpg" alt="Slide 3" class="img-responsive d-block w-100">
                    <div class="carousel-caption">
                        <h5>Lease Agreements in one place</h5>
                        <p>Know which of your assets in under lease and keep track of lease expiries</p>
                        <p><a href="signup.php" class="btn btn-warning mt-3">Join Cribslot Now!</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/(34).jpg" alt="Slide 4" class="img-responsive d-block w-100">
                    <div class="carousel-caption">
                        <h5>Let us take off your burden!</h5>
                        <p><a href="signup.php" class="btn btn-warning mt-3">Join Cribslot Now!</a></p>
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
                            <img src="assets/images/shutterstock_88694731.0.jpg" alt="" class="img-fluid img-responsive">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-12 ps-lg-5 md-5">
                        <h2>What we offer</h2>
                        <p>Cribslot provides you an intuitive centralized platform to manage all your properties with ease. 
                            Our platform provides you with a leasing system to keep track of all your properties under lease, know which client you have in what property as well as know which lease is near expiry.
                            A platform where you can easily recall you client's details for easy referencing and communication.
                        </p>
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
                            <h2>Our Key Features</h2>
                            <p>Discover the essential features that make our Asset Management System a powerful tool for managing property, client, and lease records. Designed for efficiency and ease of use, our system ensures that all your asset management needs are met with precision and reliability.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card text-white text-center bg-dark pb-2">
                            <div class="card-body">
                                <h3 class="card-title">Property Records</h3>
                                <p class="lead">Easily manage and access comprehensive property records. Keep track of property details, ownership history, and related documents all in one place to ensure accurate and up-to-date information.</p>
                                <button class="btn btn-warning text-dark">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card text-white text-center bg-dark pb-2">
                            <div class="card-body">
                                <h3 class="card-title">Client Records</h3>
                                <p class="lead">Maintain detailed records of your clients with our intuitive client management system. Track client interactions, manage contact information, and ensure personalized service with ease.</p>
                                <button class="btn btn-warning text-dark">Learn More</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="card text-white text-center bg-dark pb-2">
                            <div class="card-body">
                                <h3 class="card-title">Lease Records</h3>
                                <p class="lead">Streamline lease management with our robust lease record system. Track lease agreements, monitor renewals, and manage lease-related documents efficiently to ensure compliance and organization.</p>
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
                            <p>Have a message for us? Feel free to reach out to us</p>
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
                                            <input type="text" class="form-control" placeholder="Your email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Message subject">
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