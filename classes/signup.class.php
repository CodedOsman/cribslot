<?php

class Signup extends Dbh{

    //method to add user to database
    protected function setUser($username, $email, $pwd){
        $sql = "INSERT INTO users(username, email, pwd, activate) VALUES (?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(16));
        $token_hash = hash("sha256", $token);
        if(!$stmt->execute(array($username, $email, $hashedPwd, $token_hash))) {
            $stmt  = null;
            redirect("Something went wrong. Please try again", "signup.php");
            //header("location: ../index.php?error=stmtfailed");
            exit();
        }
        #$url = base_url('activate-account.php?token='.$token);
        #echo $url;
        $mail = require  "../config/mailer.php";

        $mail->setFrom("oselibas@gmail.com");
        $mail->addAddress($email, $username);
        $mail->Subject = "ACTIVATE YOUR CRIBSLOT ACCOUNT";
        $mail->Body = <<<END
        
        Click <a href="http://localhost/cribslot/activate-account.php?token=$token">here</a> to activate your account.

        END;

        try{
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
            exit();
        }

        $stmt = null;
    }

    // method fetches activation token
    protected function getToken($token){
        $sql = "SELECT * FROM users WHERE activate =?";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($token))){
            redirect("Something went wrong. Please try again", "signup.php");
            exit();
        }

        if($stmt->rowCount() == 0){
            redirect("Create an account first", "signup.php");
            exit();
        }
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
        $stmt = null;
    }

    //method activates user account
    protected function Activate($userid){
        $sql = "UPDATE users SET activate=? WHERE userid =?";
        $stmt = $this->connect()->prepare($sql);
        $active = NULL;
        if(!$stmt->execute(array($active, $userid))){
            $stmt = null;
            redirect("Could not activate email!", "signup.php");
        }

        $stmt = null;
        redirect("You can login now!", "login.php");
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