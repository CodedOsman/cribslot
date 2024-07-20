<?php
include '../config/app.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['add_client'])){
        $ownerid = htmlspecialchars($_POST['ownerid'], ENT_QUOTES, 'UTF-8');
        $client_type = htmlspecialchars($_POST['client_type'], ENT_QUOTES, 'UTF-8');
        $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES, 'UTF-8');
        $firstname = htmlspecialchars($_POST['lastname'], ENT_QUOTES, 'UTF-8');
        $gender = htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES, 'UTF-8');
        $assetid = htmlspecialchars($_POST['asset_id'], ENT_QUOTES, 'UTF-8');
        $status = htmlspecialchars($_POST['client_status'], ENT_QUOTES, 'UTF-8');
        $occupation = htmlspecialchars($_POST['occupation'], ENT_QUOTES, 'UTF-8');
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        //handle file
        $clientphoto = $_FILES['client_image'];
        $photo = $clientphoto['name'];
        $tempName = $clientphoto['tmp_name'];
        $fileError = $clientphoto['error'];
        $fileSize = $clientphoto['size'];
        $fileExt = explode('.', $photo);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        include '../classes/dbh.class.php';
        include '../classes/clients.class.php';
        include '../classes/client-contr.class.php';

        $client = new ClientContr($ownerid);

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 12000000){
                    $image = 'client' . uniqid("", true) . '.' . $fileActualExt;
                    $path = '../profiles/' . $username . $ownerid . '/clients';
                    $destination = $path . '/' . $image;
                    #check if path exists
                    if(is_dir(dirname($path))){
                        #check if file was moved
                        if(move_uploaded_file($tempName, $destination)){
                            #populate database with the uploaded image
                            $client->addClientInfo($client_type, $first_name, $last_name, $image, $gender, $email, $contact, $asset_id, $client_status, $occupation);
                        }else{
                            redirect("Could not update profile photo!", "dashboard.php?clients=add-client");
                            exit();
                        }
                    }else{
                        redirect("Could not locate path!", "dashboard.php?clients=add-client");
                        exit();
                    }
                }else{
                    redirect("File size too large!", "dashboard.php?clients=add-client");
                    exit();
                }
            }else{
                redirect("There was an error uploading your image file!", "dashboard.php?clients=add-client");
                exit();
            }
        }else{
            redirect("Invalid file type!", "dashboard.php?clients=add-client");
        }
    }

    if(isset($_POST['update_client'])){
        $ownerid = htmlspecialchars($_POST['ownerid'], ENT_QUOTES, 'UTF-8');
        $client_type = htmlspecialchars($_POST['client_type'], ENT_QUOTES, 'UTF-8');
        $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES, 'UTF-8');
        $firstname = htmlspecialchars($_POST['lastname'], ENT_QUOTES, 'UTF-8');
        $gender = htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES, 'UTF-8');
        $assetid = htmlspecialchars($_POST['asset_id'], ENT_QUOTES, 'UTF-8');
        $status = htmlspecialchars($_POST['client_status'], ENT_QUOTES, 'UTF-8');
        $occupation = htmlspecialchars($_POST['occupation'], ENT_QUOTES, 'UTF-8');
        $clientphoto = $_FILES['client_image'];
        $photo = $_FILES['name'];
        $tempName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];
        $fileExt = explode('.', $dp);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png', 'gif');
        $userid = $_SESSION['auth_user']['user_id'];
        $username = $_SESSION['auth_user']['user_name'];

        include '..classes/dbh.class.php';
        include '..classes/clients.class.php';
        include '..classes/clients-contr.class.php';

        $client = new ClientContr($ownerid);

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 12000000){
                    $image = 'client' . uniqid("", true) . '.' . $fileActualExt;
                    $path = '../profiles/' . $username . $userid . '/clients';
                    $destination = $path . '/' . $image;
                    #check if path exists
                    if(is_dir(dirname($path))){
                        #check if file was moved
                        if(move_uploaded_file($tempName, $destination)){
                            #populate database with the uploaded image
                            $client->addClientInfo($client_type, $first_name, $last_name, $image, $gender, $email, $contact, $asset_id, $client_status, $occupation);
                        }else{
                            redirect("Could not update profile photo!", "dashboard.php?clients=update-client");
                            exit();
                        }
                    }else{
                        redirect("Could not locate path!", "dashboard.php?clients=update-client");
                        exit();
                    }
                }
            }else{
                redirect("File size too large!", "dashboard.php?clients=update-client");
                exit();
            }
        }else{
            redirect("Invalid file type!", "dashboard.php?clients=update-client");
        }
    }
}