<div class="row">
    <div class="col-12 col-md-3 d-flex border-0"><!-- Options card starts -->
        <div class="card flex-fill border-0 illustration">
            <div class="card-header">
                <h6 class="card-subtitle text-muted">
                    Settings Options
                </h6>
            </div>
            <div class="card-body justify-content-center  align-items-center">
                <div class="mb-3" style='text-align:center;'>
                    <form action="includes/profilesettings.inc.php" method="POST" id="form" enctype="multipart/form-data">
                        <div class="upload">
                            <img src="assets/images/profile_picture.png" wdith=125px height=125px class="img-responsive img-fluid rounded"/>
                            <div class="round">
                                <input type="file" name="img" id="img" accept=".jpg, .jpeg, .png">
                                <i class="fa-solid fa-camera"></i>
                            </div>
                        </div>
                    </form>
                </div>
                <h4 style="text-align:center;">
                    <?php echo $profile_info->fetchUserName($_SESSION['auth_user']['user_id']); ?>
                    <a href="">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </h4>
                <p class="text-muted" style="text-align:center;">
                    <?php echo $profile_info->fetchEmail($_SESSION['auth_user']['user_id']); ?>
                </p>
                

                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="dashboard.php?profile" class="sidebar-link text-secondary">Profile</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="dashboard.php?change_password" class="sidebar-link text-secondary">Change Password</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link text-secondary">Delete Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- Options card ends -->

    <div class="col-12 col-md-8 d-flex border-0"><!-- Settings card starts -->
        <div class="card flex-fill border-0">
            <div class="card-header">
                <h4 class="card-title">
                    Update Profile Info
                </h4>
                <?php include "message.php"; ?>
            </div>
            <div class="card-body justify-content-center">
                <h5 class="text-muted"><?php include 'message.php'; ?></h5>
                <?php if(isset($_GET['change_password'])) : ?>
                <!-- change password form start -->
                <form action="includes/profilesettings.inc.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <input type="password" name="oldPwd" class="form-control" placeholder="Old Password">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="newPwd" class="form-control" placeholder="New Password">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="cnewPwd" class="form-control" placeholder="Confirm New Password">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="change_pass" class="btn btn-primary">Save</button>
                    </div>
                </form>
                <!-- change password form ends -->
                <?php else : ?>
                <!-- profile info form start -->
                <form action="includes/profilesettings.inc.php" method="POST">
                    <div class="form-group mb-3">
                        <label>First Name</label>
                        <input type="text" name="firstname" placeholder="Enter your first name" value="<?php $profile_info->fetchFirstName($_SESSION['auth_user']['user_id']); ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Last Name</label>
                        <input type="text" name="lastname" placeholder="Enter your last name" value="<?php $profile_info->fetchLastName($_SESSION['auth_user']['user_id']); ?>" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Contact</label>
                        <small class="text-muted text-wrap">Enter your country code first Eg. 2332401234567</small>
                        <input type="text" name="contact" placeholder="Eg.. 2332401234567" value="<?php echo $profile_info->fetchContact($_SESSION['auth_user']['user_id']); ?>" class="form-control">
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
                </form><!-- profile info form ends -->
                <?php endif; ?>
            </div>
        </div>
    </div><!-- Settings card ends -->
</div>

