<?php

class Signup extends Dbh{

    //method to add user to database
    protected function setUser($username, $email, $pwd){
        $sql = "INSERT INTO users(username, email, pwd) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $email, $hashedPwd))) {
            $stmt  = null;
            redirect("Something went wrong. Please try again", "signup.php");
            //header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    // validate user input if exists in database
    protected function checkUser($username, $email){
        $sql = "SELECT username FROM users WHERE username = ? OR email = ?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($username, $email))) {
            $stmt  = null;
            redirect("Something went wrong. Please try again", "signup.php");
            //header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $resultCheck;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

    protected function getUserID($username){
        $sql = "SELECT userid FROM users WHERE username = ?";
        $stmt = $this->connect()->prepare($sql);
        //checking if user has infomation to view profile
        if(!$stmt->execute(array($username))){
            $stmt = null;
            redirect("Something went wrong! Please try again later.", "index.php");
            exit();
        }
        //if data not found, redirect user to update profile
        if($stmt->rowCount() == 0){
            $stmt = null;
            redirect("Profile not found! Please try again later.", "index.php");
            exit();
        }
        // if the data is found reference to data
        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profileData;
    }


}