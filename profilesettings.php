<?php
    include('config/app.php');
    include("classes/dbh.class.php");
    include("classes/userdash.class.php");
    include("classes/dashview.class.php");
    $profile_info = new DashView();
    $dob = $profile_info->fetchDob($_SESSION['auth_user']['user_id']);

    include("includes/header.inc.php");
    include("includes/navbar.inc.php");
?>
<div class="py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4>Profile Settings</h4>
                    <?php include "message.php"; ?>
                </div>
                <div class="card-body">
                    <form action="includes/profilesettings.inc.php" method="POST">
                        <div class="form-group mb-3">
                            <label>First Name</label>
                            <input type="text" name="firstname" placeholder="Enter your first name" value="<?php $profile_info->fetchFirstName($_GET['userid']); ?>" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Last Name</label>
                            <input type="text" name="lastname" placeholder="Enter your last name" value="<?php $profile_info->fetchLastName($_GET['userid']); ?>" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label>Date of Birth</label>
                            <div class="input-group">
                                <span class="input-group-text" id="dob-addon">Year</span>
                                <input type="text" name="year" placeholder="YYYY" aria-describedby="dob-addon" value="<?php echo $dob['year']; ?>" class="form-control">
                                <span class="input-group-text">Month</span>
                                <input type="text" name="month" class="form-control" id="dob-month" placeholder="MM" value="<?php echo $dob['month']; ?>" class="form-control">
                                <span class="input-group-text">Day</span>
                                <input type="text" name="day" class="form-control" id="dob-day" placeholder="DD" value="<?php echo $dob['day']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#" class="theme-toggle">
    <i class="fa-regular fa-moon"></i>
    <i class="fa-regular fa-sun"></i>
</a>
<?php
    include("includes/footer.inc.php");
?>