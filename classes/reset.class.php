<?php

class Reset extends Dbh
{
    protected function setReset($email)
    {
        include_once '../config/app.php';
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            redirect("Something went wrong! Try again later", 'forgot-password.php');
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $token = bin2hex(random_bytes(16));
            $token_hash = hash("sha256", $token);
            $sql = "UPDATE users SET reset_hash=? WHERE email=?";
            $stmt = $this->connect()->prepare($sql);

            if (!$stmt->execute(array($token_hash, $email))) {
                $stmt = null;
                redirect("Something went wrong! Try again later", 'forgot-password.php');
                exit();
            }

            

            $mail = require  "../config/mailer.php";

            $mail->setFrom("oselibas@gmail.com");
            $mail->addAddress($email, $username);
            $mail->Subject = "RESET YOUR CRIBSLOT ACCOUNT PASSWORD";
            $mail->Body = <<<END
        
                Click <a href="http://localhost/cribslot/forgot-password.php?token=$token">this link</a> to reset your account password.

            END;

            try {
                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
                exit();
            }
            redirect("Check your email!", "forgot-password.php");
        }

        
    }

    protected function getResetToken($token){
        $sql = "SELECT * FROM users WHERE reset_hash = ?";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($token))){
            redirect("Something went wrong. Please try again", "forgot-password.php");
            exit();
        }

        if($stmt->rowCount() == 0){
            redirect("Create an account first", "signup.php");
            exit();
        }
        if($user = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            return $user;
        }
        else{
            return null;
        }
        $stmt = null;
    }

    protected function PrepNewPwd($email){
        $sql = "UPDATE users SET reset_hash=? WHERE email=?";
        $stmt = $this->connect()->prepare($sql);
        $active = NULL;
        if(!$stmt->execute(array($active, $email))){
            $stmt = null;
            redirect("Something went wrong! Try again", "forgot-password.php");
            exit();
        }

        $stmt = null;
        redirect("Set your new password!", "forgot-password.php?reset=reset-password&email=".$email);
    }

    protected function SetNewPwd($pwd, $email){
        include_once '../config/app.php';
        $sql = "SELECT * FROM users WHERE email=?";
        
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute(array($email))){
            $stmt = null;
            redirect("Something went wrong! Try again", "forgot-password.php?reset");
            exit();
        }
        if($stmt->rowCount() > 0){
            $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $clear = $info[0]['reset_hash'];
            if($clear === NULL){
                $sql = "UPDATE users SET pwd=? WHERE email=?";
                $stmt = $this->connect()->prepare($sql);
                if(!$stmt->execute(array($pwd, $email))){
                    $stmt = null;
                    redirect("Something went wrong! Try again", "forgot-password.php?reset");
                    exit();
                }
                $stmt = null;
                redirect("Password reset successfully! Login Now!", "login.php");
                exit();
            }else{
                $stmt = null;
                redirect('Could not set your password', 'forgot-password.php?reset=reset-password&email='.$email);
                exit();
            }
        }else{
            $stmt = null;
            redirect('Could not set your password,Try again!', 'forgot-password.php?reset=reset-password&email='.$email);
            exit();
        }
        
    }
}
