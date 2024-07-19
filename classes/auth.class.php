<?php

class Authentication{
    public function __construct()
    {
        $this->checkIslogged();
    }

    private function checkIslogged(){
        if(!isset($_SESSION['authenticated'])){
            redirect("You need to login first!", "login.php");
            return false;
            exit();
        }else{
            return true;
        }
    }
}

$authenticated = new Authentication;