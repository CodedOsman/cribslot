<?php
include "../config/app.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['save'])){
        $userid = $_SESSION['auth_user']['user_id'];
        $username = $_SESSION['auth_user']['user_id'];
        $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES, 'UTF-8');
        $lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES, 'UTF-8');
        $gender = htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF-8');
        $contact = htmlspecialchars($_POST['contact'], ENT_QUOTES, 'UTF-8');
        $year = htmlspecialchars($_POST['year'], ENT_QUOTES, 'UTF-8');
        $month = htmlspecialchars($_POST['month'], ENT_QUOTES, 'UTF-8');
        $day = htmlspecialchars($_POST['day'], ENT_QUOTES, 'UTF-8');
        $dob = $year.'-'.$month.'-'.$day;
    

        //Instantiating classes to load out rest of information for processing
        include '../classes/dbh.class.php';
        include '../classes/userdash.class.php';
        include '../classes/userdash-contr.class.php';

        $update = new UserDashContr($userid, $username);
        # logic to rename folder when username is updated
    
        #$oldfolder = "../profiles/".$username.$userid;
        #$newfolder = "../profiles/".$username.$userid;
        /*
        if(rename($oldfolder, $newfolder)){
            //update the databse with the new username
        }else{
            //echo could not update username
        }
        */
        $update->updateProfileInfo($firstname, $lastname, $gender, $contact, $dob);

        redirect("Profile updated successfully", "dashboard.php?dashboard=");
    }

    if(isset($_POST['change_pass'])){
        #logic to change password
        $userid = $_SESSION['auth_user']['user_id'];
        $username = $_SESSION['auth_user']['username'];
        $oldPwd = htmlspecialchars($_POST['oldPwd'], ENT_QUOTES, 'UTF-8');
        $newPwd = htmlspecialchars($_POST['newPwd'], ENT_QUOTES, 'UTF-8');
        $cnewPwd = htmlspecialchars($_POST['cnewPwd'], ENT_QUOTES, 'UTF-8');

        //Instantiating controller classes and model class
        include '../classes/dbh.class.php';
        include '../classes/userdash.class.php';
        include '../classes/userdash-contr.class.php';

        //Initiate controller
        $update = new UserDashContr($userid, $username);
        //call update password function
        $update->updatePwd($oldPwd, $newPwd, $cnewPwd);
        redirect("Password updated successfully!", "dashboard.php?change_password=success");
    }

    if(isset($_FILES['img']['name'])){
        #logic to upload photo
        $dp = $_FILES['img']['name'];
        $tempName = $_FILES['img']['temp_name'];
        $fileError = $_FILES['img']['error'];
        $fileSize = $_FILES['img']['size'];
        $fileExt = explode('.', $dp);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png', 'gif');
        $userid = $_SESSION['auth_user']['user_id'];
        $username = $_SESSION['auth_user']['username'];

        include '../classes/dbh.class.php';
        include '../classes/userdash.class.php';
        include '../classes/userdash-contr.class.php';

        $update = new UserDashContr($userid, $username);

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 12000000){
                    $image = 'profile_pic'.$fileActualExt;
                    $destination = 'profiles/'.$username.$userid.'/dps';
                }
            }else{
                redirect("File size too large!", "dashboard.php?profile");
                exit();
            }
        }else{
            redirect("Invalid file type!", "dashboard.php?profile");
        }

        #check if folder exists, if not create folder
        if(!isdir($destination)){
            if(mkdir($destination, 0775, true)){
                mkdir('profiles/'.$username.$userid.'/assets');
            }
        }

        #populate databse column
        $update->updateProfilePhoto($tempName);
        
        #move photo to the directory
        move_uploaded_file($tempName,$destination);
    }
}