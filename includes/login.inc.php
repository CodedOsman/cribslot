<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //taking user data to register use
    if (isset($_POST['login'])) {
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

    if(isset($_POST['reset'])){
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');

        include '../classes/dbh.class.php';
        include '../classes/reset.class.php';
        include '../classes/reset-contr.class.php';

        $reset = new resetContr();

        $reset->sendReset($email);
    }

    if(isset($_POST['setNew'])){
        $newPwd = htmlspecialchars($_POST['newPwd'], ENT_QUOTES, 'UTF-8');
        $cnewPwd = htmlspecialchars($_POST['cNewPwd'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');

        include '../classes/dbh.class.php';
        include '../classes/reset.class.php';
        include '../classes/reset-contr.class.php';

        $reset = new resetContr();

        $reset->resetPwd($newPwd, $cnewPwd, $email);
    }
}
