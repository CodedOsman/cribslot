<?php

class UserDash extends Dbh{

    protected function getProfileInfo($userid){
        $sql = "SELECT * FROM profiles WHERE user_id=?";
        $stmt = $this->connect()->prepare($sql);
        //checking if user has infomation to view profile
        if(!$stmt->execute(array($userid))){
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

    protected function getUsername($userid){
        $sql = "SELECT username FROM users WHERE userid=?";
        $stmt = $this->connect()->prepare($sql);
        //checking if user has infomation to view profile
        if(!$stmt->execute(array($userid))){
            $stmt = null;
            redirect("Something went wrong! Please try again later.", "index.php");
            exit();
        }
        //if data not found, redirect user to update profile
        if($stmt->rowCount() == 0){
            $stmt = null;
            redirect("User not found! Please try again later.", "index.php");
            exit();
        }
        // if the data is found reference to data
        $userName = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $userName;
    }

    protected function getEmail($userid){
        $sql = "SELECT email FROM users WHERE userid=?";
        $stmt = $this->connect()->prepare($sql);
        //checking if user has infomation to view profile
        if(!$stmt->execute(array($userid))){
            $stmt = null;
            redirect("Something went wrong! Please try again later.", "index.php");
            exit();
        }
        //if data not found, redirect user to update profile
        if($stmt->rowCount() == 0){
            $stmt = null;
            redirect("User not found! Please try again later.", "index.php");
            exit();
        }
        // if the data is found reference to data
        $userEmail = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $userEmail;
    }

    protected function setNewProfileInfo($first_name, $last_name, $gender, $contact, $dob, $userid){
        $sql = "UPDATE profiles SET firstname=?, lastname=?, gender=?, contact=?, dob=? WHERE user_id=?";
        $stmt = $this->connect()->prepare($sql);
        //checking if user has infomation to view profile
        if(!$stmt->execute(array($first_name, $last_name, $gender, $contact, $dob, $userid))){
            $stmt = null;
            redirect("Something went wrong! Please try again later.", "dashboard.php?profile");
            exit();
        }
        
        $stmt = null;
        redirect("Profile update successfully!", "dashboard.php?profile");
    }

    protected function setProfilePhoto($photo, $userid){
        $dp_column = $this->getProfileInfo($userid);
        
        $sql = "UPDATE profiles SET dp=? WHERE user_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($photo, $userid))){
            $stmt = null;
            redirect("Something went wrong! Please try again", "dashboard.php?profile");
        }
        $stmt = null;
        redirect("Profile photo updated successfully!", "dashboard.php?profile");
    }

    protected function setProfileInfo($first_name, $last_name, $gender, $contact, $dob, $userid){
        $sql = "INSERT INTO profiles (firstname,lastname,gender,contact,dob,user_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        //checking if user has infomation to view profile
        if(!$stmt->execute(array($first_name, $last_name, $gender, $contact, $dob, $userid))){
            $stmt = null;
            redirect("Something went wrong! Please try again later.", "dashboard.php?profile");
            exit();
        }
        

        $stmt = null;
    }

    protected function deleteProfile($userid){
        $sql = "SELECT * FROM profiles WHERE profile_id=?";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($userid))){
            $stmt = null;
            redirect("Could not delete account!", "dashboard.php?profile");
            exit();
        }

        if($stmt->rowCount() > 0){
            $sql = "DELETE FROM profiles WHERE profile_id = ?";
            $stmt = $this->connect()->prepare($sql);
            if(!$stmt->execute(array($userid))){
                $stmt = null;
                redirect("Could not delete account!", "dashboard.php?profile");
                exit();
            }

            $stmt = null;
            return true;
        }else{
            $stmt = null;
            return false;
        }
        
    }
    protected function deleteMainAssets($userid){
        $sql = "SELECT * FROM assets WHERE owner_id = ?";
        
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($userid))){
            $stmt = null;
            redirect("Could not delete account!", "dashboard.php?profile");
            exit();
        }

        if($stmt->rowCount() > 0){
            $sql = "DELETE FROM assets WHERE owner_id = ?";
            $stmt = $this->connect()->prepare($sql);
            if(!$stmt->execute(array($userid))){
                $stmt = null;
                redirect("Could not delete account!", "dashboard.php?profile");
                exit();
            }

            $stmt = null;
            return true;
        }else{
            $stmt = null;
            return false;
        }
    }
    protected function deleteSubAssets($userid){
        $sql = "SELECT * FROM asset_subs WHERE owner_id = ?";
        
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($userid))){
            $stmt = null;
            redirect("Could not delete account!", "dashboard.php?profile");
            exit();
        }

        if($stmt->rowCount() > 0){
            $sql = "DELETE FROM asset_subs WHERE owner_id = ?";
            $stmt = $this->connect()->prepare($sql);
            if(!$stmt->execute(array($userid))){
                $stmt = null;
                redirect("Could not delete account!", "dashboard.php?profile");
                exit();
            }
            $stmt = null;
            return true;
        }else{
            $stmt = null;
            return false;
        }
    }
    protected function deleteClients($userid){
        $sql = "SELECT * FROM clients WHERE owner_id = ?";
        
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($userid))){
            $stmt = null;
            redirect("Could not delete account!", "dashboard.php?profile");
            exit();
        }

        if($stmt->rowCount() > 0){
            $sql = "DELETE FROM clients WHERE owner_id = ?";
            $stmt = $this->connect()->prepare($sql);
            if(!$stmt->execute(array($userid))){
                $stmt = null;
                redirect("Could not delete account!", "dashboard.php?profile");
                exit();
            }

            $stmt = null;
            return true;
        }else{
            $stmt = null;
            return false;
        }
    }
    protected function deleteUser($userid){
        $sql = "SELECT * FROM users WHERE userid = ?";
        
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($userid))){
            $stmt = null;
            redirect("Could not delete account!", "dashboard.php?profile");
            exit();
        }

        if($stmt->rowCount() > 0){
            $sql = "DELETE FROM users WHERE userid = ?";
            $stmt = $this->connect()->prepare($sql);
            if(!$stmt->execute(array($userid))){
                $stmt = null;
                redirect("Could not delete account!", "dashboard.php?profile");
                exit();
            }
        }else{
            $stmt = null;
            return false;
        }
    }

    protected function setPassword($old_pwd, $new_pwd, $userid){
        $sql = "SELECT pwd FROM users WHERE userid=?";
        $stmt = $this->connect()->prepare($sql);

        //check if there is a result for the user
        if(!$stmt->execute(array($userid))){
            $stmt = null;
            redirect("Something went wrong! Please try again.", "dashboard.php?change_password=error");
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
        $checkPwd = password_verify($old_pwd, $pwdhashed[0]["pwd"]);
        if($checkPwd == false){
            $stmt = null;
            redirect("Invalid password! Please check and try again.", "dashboard.php?change_password=password_error");
            exit();
        }
        //selecting user data from database if password verified with the email/username
        elseif($checkPwd == true){
            // hash new password
            $newpwdHashed = password_hash($new_pwd, PASSWORD_DEFAULT);
            //prepare update query
            $sql = "UPDATE users SET pwd=? WHERE userid=?";
            $stmt = $this->connect()->prepare($sql);

            if(!$stmt->execute(array($newpwdHashed, $userid))){
                $stmt = null;
                redirect("Something went wrong! Please try again.", "dashboard.php?change_password=final_error");
                exit();
            }
            
            $stmt = null;
            
        }
    }

}