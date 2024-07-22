<?php
include 'config/app.php';
include 'classes/dbh.class.php';
include 'classes/userdash.class.php';
include 'classes/userdash-contr.class.php';


$userid = $_GET['id'];
$username = $_GET['username'];

$user = new UserDashContr($userid, $username);
$user->deleteUser($userid);
