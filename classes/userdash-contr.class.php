<?php
#include_once("../config/app.php");

class UserDashContr extends UserDash{

    private $userid;
    private $username;

    public function __construct($userid,$username){
        $this->userid = $userid;
        $this->username = $username;
    }

    public function defaultProfileInfo(){
        $first_name = $this->username;
        $last_name = "Last Name";
        $gender = "Prefer not to say";
        $contact = "2332401234567";
        $dob = "12-12-24";
        $this->setProfileInfo($first_name, $last_name, $gender, $contact, $dob, $this->userid);
    }

    public function updateProfileInfo($first_name, $last_name, $gender, $contact, $dob){
        //checking for errors
        if($this->empytInput($first_name, $last_name, $gender, $dob)){
            redirect("Empty fields! Fill all fields.", "settings.php");
            exit();
        }
        //update profile info
        $this->setNewProfileInfo($first_name, $last_name, $gender, $contact, $dob, $this->userid);
    }

    public function updateProfilePhoto($photo){
        
        $this->setProfilePhoto($photo, $this->userid);
    }

    public function deleteUser($userid){
        if($this->deleteProfile($userid)){
            if($this->deleteMainAssets($userid)){
                $this->deleteSubAssets($userid);
                $this->deleteClients($userid);
            }
            
            $this->deleteUser($userid);

            redirect("Account deleted! Create an account to use this platform", "login.php");
            exit();
        }else{
            redirect("Could not delete account 1", "dashboard.php?profile");
            exit();
        }
        
    }

    public function updatePwd($oldPwd, $newPwd, $cnewPwd){
        //check if passwords match
        if($this->pwdMatch($newPwd, $cnewPwd) == false){
            redirect("Passwords don't match!", "dashboard.php?change_password");
            exit();
        }
        //update password
        $this->setPassword($oldPwd, $newPwd, $this->userid);
    }
// error handlers
    private function empytInput($first_name, $last_name, $gender, $dob){
        if(empty($first_name) || empty($last_name) || empty($gender) || empty($dob)){
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    private function pwdMatch($newPwd, $cnewPwd){
        if ($newPwd !== $cnewPwd){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}