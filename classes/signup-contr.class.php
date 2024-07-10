<?php
include("../config/app.php");

class SignupContr extends Signup{
    private $username;
    private $email;
    private $pwd;
    private $pwdRepeat;
    // constructor
    public function __construct($username, $email, $pwd, $pwdRepeat){
        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }
    //method to throw back error messages and add user to database after validation
    public function signupUser(){
        if($this->emptyInput() == false){
            // echo empty Input
            redirect("Empty field(s)! Please fill all fields.", "signup.php");
            //header("Location: ../index.php?error=emptyinputs;username=");
            exit();
        }
        if($this->invalidUsername() == false){
            // echo invlaid username
            redirect("Invalid Username!", "signup.php");
            exit();
        }
        if($this->invalidEmail() == false){
            // echo invalid email
            redirect("Invalid email! Provide a valid email address", "signup.php");
            exit();
        }
        if($this->pwdMatch() == false){
            // echo password-do-not-mathc
            redirect("Passwords do not match!", "signup.php");
            exit();
        }
        if($this->emailTaken() == false){
            // echo username-or-email-already-exist
            redirect("Email or Username already exist!", "signup.php");
            exit();
        }
        // add user to database
        $this->setUser($this->username, $this->email, $this->pwd);
    }
    // Empty field error handler
    private function emptyInput(){
        $result;
        if(empty($this->username) || empty($this->email) || empty($this->pwd) || empty($this->pwdRepeat)){
            $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }
    // Name Error handler
    private function invalidUsername(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }
    // Email validation error handler
    private function invalidEmail(){
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }
    // Password match error handler
    private function pwdMatch(){
        $result;
        if ($this->pwd !== $this->pwdRepeat){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
    // Error handler for already existing username or email
    private function emailTaken(){
        $result;
        if (!$this->checkUser($this->username, $this->email)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    public function fetchUserId($username){
        $userid = $this->getUserID($username);
        return $userid[0]['userid'];
    }
}