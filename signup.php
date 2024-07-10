<?php
    include("config/app.php");
    
    include("includes/header.inc.php");
?>
<div class="main">
<?php include("includes/navbar.inc.php");?>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row border rounded-5 p-3 bg-white shadow"> <!-- Signup container -->
        <div class="col-md-6 rounded-5 d-flex justify-content-center align-items-center flex-column left-box" style="background:#103cbe;"><!-- left box starts -->
            <div class="featured-image mb-3">
                <img src="<?php base_url('assets/images/login_image.jpg'); ?>" class="img-fluid" style="width:250px;"alt="featured image">
            </div>
            <p class="text-white fs-2">Be verified</p>
            <small class="text-white text-wrap text-center">Join the community of the future</small> 
        </div><!-- Left box ends-->
        <div class="col-md-6 right-box"><!-- Right box starts-->
            <div class="row align-items-center">
                <div class="header-text">
                    <h2>Join CribsLot Today!</h2>
                    <?php include "message.php"; ?>
                </div>
                <form action="includes/signup.inc.php" method="POST"><!-- sign up form starts -->
                    <div class="input-group mb-3">
                        <input type="text" name="username" placeholder="Enter your preferred username" class="form-control form-control-lg bg-light fs-6">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="email" placeholder="Enter your email" class="form-control form-control-lg bg-light fs-6">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pwd" placeholder="Enter your password" class="form-control form-control-lg bg-light fs-6">
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" name="pwdRepeat" placeholder="Confirm your password" class="form-control form-control-lg bg-light fs-6">
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="termsCheck">
                            <label for="termsCheck" class="form-check-label text-secondary">
                                <small>Accept Terms & Conditions</small>
                            </label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" name="register" class="btn btn-lg btn-primary w-100 fs-6">Register</button>
                    </div>
                    <div class="row">
                        <small>
                            Already have an account?
                            <a href="<?= base_url('signup.php')?>">Login</a> 
                        </small>
                    </div>
                </form><!-- sign up form ends -->
            </div>
        </div><!-- Right box ends-->
    </div><!-- signup container ends -->
    <!-- theme toggle effect -->
    <a href="#" class="theme-toggle">
        <i class="fa-regular fa-moon"></i>
        <i class="fa-regular fa-sun"></i>
    </a>
</div><!--Main container ends -->
</div>
<?php
include("includes/footer.inc.php");
?>