<?php
if(isset($_SESSION['message'])){
    echo "<span class='alert'>".$_SESSION['message']."<span>";
    unset($_SESSION['message']);
}