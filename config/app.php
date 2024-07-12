<?php
session_start();

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'cribslotdb');

define('SITE_URL', 'http://localhost/cribslot/');

function base_url($slug){
    echo SITE_URL.$slug;
}

function redirect($message,$page){
    $redirectTo = SITE_URL.$page;
    $_SESSION['message'] = "$message";
    header("Location:$redirectTo");
    exit();
}

function isLoggedIn(){
    if(isset($_SESSION['authenticated']) === true){
        redirect("You are already logged in", "login.php");
    }
}