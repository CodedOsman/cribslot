<?php
include("config/app.php");
if (isset($_SESSION['authenticated']) === true) {
    redirect("You are already logged in!", "index.php");
}

if (isset($_GET['token'])){
    $token = $_GET['token'];
    $hash_token = hash("sha256", $token);

    include 'classes/dbh.class.php';
    include 'classes/reset.class.php';
    include 'classes/reset-contr.class.php';

    $reset = new ResetContr();

    $user = $reset->getToken($hash_token);

    if($user === null){
        echo $hash_token;
        die('Token not found');
        
    }

    $prep = $reset->prepPwd($user[0]['email']);

}
include("includes/header.inc.php");

?>
<!-- Main container start -->
<div class="main">
    <?php include("includes/navbar.inc.php"); ?>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 shadow"> <!-- Login container -->
            <div class="col-md-6 rounded-5 d-flex justify-content-center align-items-center flex-column left-box" style="background:#103cbe;"><!-- left box starts -->
                <div class="featured-image mb-3">
                    <img src="<?php base_url('assets/images/login_image.png'); ?>" class="img-fluid" style="width:250px;" alt="featured image">
                </div>
                <p class="text-white fs-2">Be verified</p>
                <small class="text-white text-wrap text-center">Join the community of the future</small>
            </div><!-- Left box ends-->
            <div class="col-md-6 right-box"><!-- Right box starts-->
                <div class="row align-items-center">
                    <div class="header-text">
                        <?php if (isset($_GET['reset'])) : ?>
                            <h2>Reset your Password!</h2>
                        <?php else : ?>
                            <h2>Forgot Password?</h2>
                        <?php endif; ?>
                        <?php include "message.php"; ?>
                    </div>
                    <?php if (isset($_GET['reset'])) : ?>
                        <form action="includes/login.inc.php" method="POST" enctype="multipart/form-data"><!-- login form starts -->
                        <input type="text" name="email" value="<?php echo $_GET['email']; ?>" style="display:none" class="form-control form-control-lg fs-6">
                            <div class="input-group mb-3">
                                <input type="password" name="newPwd" id="pwd" placeholder="Enter your new password" class="form-control form-control-lg fs-6">
                                
                                <span class="input-group-text" id="pass_toggle">
                                    <i class="fas fa-eye" id="show_eye"></i>
                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                                
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="cNewPwd" id="cpwd" placeholder="Confirm your new password" class="form-control form-control-lg fs-6">
                                <span class="input-group-text" id="cpass_toggle">
                                    <i class="fas fa-eye" id="show_eye"></i>
                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>

                            <div class="input-group mb-3">
                                <button type="submit" name="setNew" class="btn btn-lg btn-primary w-100 fs-6">Reset Password</button>
                            </div>
                            <div class="row">
                                <small>
                                    Don't have an account?
                                    <a href="<?= base_url('signup.php'); ?>">Register Now</a>
                                </small>
                            </div>
                        </form><!-- login form ends -->
                    <?php else : ?>
                        <form action="includes/login.inc.php" method="POST"><!-- login form starts -->
                            <div class="input-group mb-3">
                                <input type="text" name="email" placeholder="Enter your email" class="form-control form-control-lg fs-6">
                            </div>
                            <div class="input-group mb-3">
                                <p class="text-muted text-warning">If your email is in our database, you will recieve a password reset link.</p>
                            </div>

                            <div class="input-group mb-3">
                                <button type="submit" name="reset" class="btn btn-lg btn-primary w-100 fs-6">Reset Password</button>
                            </div>
                            <div class="row">
                                <small>
                                    Don't have an account?
                                    <a href="<?= base_url('signup.php'); ?>">Register Now</a>
                                </small>
                            </div>
                        </form><!-- login form ends -->
                    <?php endif; ?>
                </div>
            </div><!-- Right box ends-->
        </div><!-- login container ends -->
        <a href="#" class="theme-toggle">
            <i class="fa-regular fa-moon"></i>
            <i class="fa-regular fa-sun"></i>
        </a>
    </div><!--Main container ends -->
</div>
<?php
include("includes/footer.inc.php");
?>