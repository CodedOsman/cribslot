<?php
include 'config/app.php';
$token = $_GET['token'];
$token_hash = hash("sha256", $token);

include 'classes/dbh.class.php';
include 'classes/signup.class.php';
include 'classes/signupview.class.php';

$signup = new SignupView();
$user = $signup->fetchToken($token_hash);

if($user === null){
    die('Token not found');
}

$signup->GoActivate($user[0]['userid']);

