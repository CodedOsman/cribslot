<?php
include("../config/app.php");

session_unset();
session_destroy();

//going back to front ppage
redirect("You are logged out!", "index.php");