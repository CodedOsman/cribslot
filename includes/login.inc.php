<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //taking user data to register use
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, 'UTF-8');

    //instantiate LoginContr class
    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.class.php";
    $login = new LoginContr($email, $pwd);

    //running error handlers and user signup
    $login->loginUser();
    //heading to the front page
    redirect("Login Sucessfull!", "dashboard.php?dashboard=");
    //header("Location:../index.php?login=success");
}