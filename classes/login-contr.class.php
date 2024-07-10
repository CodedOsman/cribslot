<?php
include("../config/app.php");

class LoginContr extends Login{
    private $email;
    private $pwd;
    // constructor
    public function __construct($email, $pwd){
        $this->email = $email;
        $this->pwd = $pwd;
    }
    //method to throw back error messages and add user to database after validation
    public function loginUser(){
        if($this->emptyInput() == false){
            // echo empty Input
            redirect("Empty field(s)! Please fill all fields.", "login.php");
            exit();
        }
        // log user into system
        $this->getUser($this->email, $this->pwd);
    }
    // Empty field error handler
    private function emptyInput(){
        $result;
        if(empty($this->email) || empty($this->pwd)){
            $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }
}