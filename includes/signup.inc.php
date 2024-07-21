<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //taking user data to register user
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UTF-8');
    $pwdRepeat = htmlspecialchars($_POST["pwdRepeat"], ENT_QUOTES, 'UTF-8');

    //instantiate SigupContr class
    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signup-contr.class.php";
    $signup = new SignupContr($username, $email, $pwd, $pwdRepeat);

    //running error handlers and user signup
    $signup->signupUser();
    //fetch the userid to populate the profile table
    $userid = $signup->fetchUserId($username);

    //instantiate userdashInforcontr
    include "../classes/userdash.class.php";
    include "../classes/userdash-contr.class.php";
    $profileInfo = new UserDashContr($userid,$username);
    $profileInfo->defaultProfileInfo();

    //make directory to keep user's files
    mkdir("../profiles/".$username.$userid, 0777);
    mkdir("../profiles/".$username.$userid."/dps", 0777);
    mkdir("../profiles/".$username.$userid."/assets", 0777);
    mkdir("../profiles/".$username.$userid."/assets/photos", 0777);
    mkdir("../profiles/".$username.$userid."/assets/videos", 0777);
    mkdir("../profiles/".$username.$userid."/clients", 0777);

    //heading to the front page
    redirect("Account created successfully! Activate your email to login", "signup.php");
    //header("Location:../index.php?signup=Success");
}