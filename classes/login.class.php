<?php

class Login extends Dbh{

    //method to retreive user from database
    protected function getUser($email, $pwd){
        //statement to select password matching the given email
        $sql = "SELECT pwd FROM users WHERE username=? OR email=?";
        $stmt = $this->connect()->prepare($sql);
        //check if there is any result from the given data
        if(!$stmt->execute(array($email, $email))) {
            $stmt  = null;
            redirect("Something went wrong! Please try again.", "login.php");
            exit();
        }
        //validating the queried result
        if($stmt->rowCount() == 0){
            $stmt = null;
            redirect("User does not exist! Create an account", "login.php");
            exit();
        }
        //storing the fetched password into a variable
        $pwdhashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //verifying the hashed password with the given password
        $checkPwd = password_verify($pwd, $pwdhashed[0]["pwd"]);
        if($checkPwd == false){
            $stmt = null;
            redirect("Invalid password! Please check and try again.", "login.php");
            exit();
        }
        //selecting user data from database if password verified with the email/username
        elseif($checkPwd == true){
            $sql = "SELECT * FROM users WHERE username=? OR email=?";
            $stmt = $this->connect()->prepare($sql);

            if(!$stmt->execute(array($email, $email))){
                $stmt = null;
                redirect("Something went wrong! Please try again.", "login.php");
                exit();
            }
            //getting queried results
            if($stmt->rowCount() == 0){
                $stmt = null;
                redirect("Check your email and activate before login", "login.php");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //pass user data for session authentication
            // starting session for login
            session_start();
            $this->userAuthentication($user);
        }

        $stmt = null;
    }
    // method that stores session data of user after loggin in
    protected function userAuthentication($user){
        $_SESSION['authenticated'] = true;
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['auth_user'] = [
            'user_id' => $user[0]['userid'],
            'user_name' => $user[0]['username'],
            'user_email' => $user[0]['email'],
        ];
    }
}