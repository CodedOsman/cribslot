<?php
include_once("../config/app.php");


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['add_main'])){
        //take user inputs
        $asset_name = htmlspecialchars($_POST['assetname'], ENT_QUOTES, 'UTF-8');
        $category_id = htmlspecialchars($_POST['category'], ENT_QUOTES, 'UTF-8');
        $type_id = htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8');
        $number_of_subs = htmlspecialchars($_POST['subs'], ENT_QUOTES, 'UTF-8');
        $asset_img = $_FILES['asset_image'];
        $asset_video = $_FILES['asset_video'];
        $asset_description = htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8');
        $asset_country = htmlspecialchars($_POST['country'], ENT_QUOTES, 'UTF-8');
        $asset_address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
        $number_of_rooms = htmlspecialchars($_POST['rooms'], ENT_QUOTES, 'UTF-8');
        $number_of_floors = htmlspecialchars($_POST['floors'], ENT_QUOTES, 'UTF-8');
        $floor_area = htmlspecialchars($_POST['size'], ENT_QUOTES, 'UTF-8');
        $userid = $_POST['userid'];
        $username = $_POST['username'];
        // validate received image file
        $asset = $asset_img['name'];
        $tempName = $asset_img['tmp_name'];
        $fileError = $asset_img['error'];
        $imageSize = $asset_img['size'];
        $fileExt = explode('.', $asset);
        $fileActualExt = strtolower(end($fileExt));
        // validate received video file
        $assetV = $asset_video['name'];
        $vidtempName = $asset_video['tmp_name'];
        $vidError = $asset_video['error'];
        $vidSize = $asset_video['size'];
        $vidExt = explode('.', $assetV);
        $vidActualExt = strtolower(end($vidExt));
        $allowed = array('jpg', 'jpeg', 'png', 'gif', 'mp4', 'mov');
        // process image file
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($imageSize < 12000000) {
                    $image = uniqid('', true) . '.' . $fileActualExt;
                    $ipath = '../profiles/'.$username.$userid.'/assets/photos';
                    $destination = $ipath . '/' . $image;
                    if(!is_dir($ipath)){
                        mkdir($ipath, 0777, true);
                    }
                } else {
                    redirect("Image file size too large!", "dashboard.php?assets=upload-main-asset");
                    exit();
                }
            } else {
                redirect("There was an error uploading your image!", "dashboard.php?assets=upload-main-asset");
                exit();
            }
        } else {
            redirect("Invalid image file type!", "dashboard.php?assets=upload-main-asset");
            exit();
        }
        // process video file
        if (in_array($vidActualExt, $allowed)) {
            if ($vidError === 0) {
                if ($vidSize < 40000000) {
                    $video = uniqid('', true) . '.' . $vidActualExt;
                    $path = '../profiles/'.$username.$userid.'/assets/videos';
                    $viddestination = $path . '/' . $video;
                    if(!is_dir($path)){
                        mkdir($path, 0777, true);
                    }
                } else {
                    redirect("Video file size too large!", "dashboard.php?assets=upload-main-asset");
                    exit();
                }
            } else {
                redirect("There was an error uploading your video!", "dashboard.php?assets=upload-main-asset");
                exit();
            }
        } else {
            redirect("Invalid video file type!", "dashboard.php?assets=upload-main-asset");
            exit();
        }
        //move files to user folder
        if (move_uploaded_file($tempName, $destination)) {
            move_uploaded_file($vidtempName, $viddestination);
        } else {
            redirect("Could not upload file", "dashboard.php?assets=upload-main-asset");
            exit();
        }
        //instantiate classes and populate the database
        include "../classes/dbh.class.php";
        include "../classes/assets.class.php";
        include "../classes/assets-contr.class.php";
        $cat = new AssetContr($userid);

        $cat->addAsset($asset_name, $category_id, $type_id, $number_of_subs, $image, $video, $asset_description, $asset_country, $asset_address, $number_of_rooms, $number_of_floors, $floor_area);

    }
    // Adding sub asset
    if(isset($_POST['add_sub'])){
        $asset_name = htmlspecialchars($_POST['assetname'], ENT_QUOTES, 'UTF-8');
        $type_id = htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8');
        $main_asset_id = htmlspecialchars($_POST['main_asset'], ENT_QUOTES, 'UTF-8');
        $floor = htmlspecialchars($_POST['floor'], ENT_QUOTES, 'UTF-8');
        $number_of_rooms = htmlspecialchars($_POST['rooms'], ENT_QUOTES, 'UTF-8');
        $room_number = htmlspecialchars($_POST['roomnum'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8');
        $country = htmlspecialchars($_POST['country'], ENT_QUOTES, 'UTF-8'); 
        $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
        $sub_asset_img = $_FILES['asset_img'];
        $sub_asset_video = $_FILES['asset_video']; 
        $floor_size = htmlspecialchars($_POST['size'], ENT_QUOTES, 'UTF-8');
        $userid = $_POST['userid'];
        $username = $_POST['username'];

        // Process the files recieved
        $sub_img = $sub_asset_img['name'];
        $tempName = $sub_asset_img['tmp_name'];
        $fileError = $sub_asset_img['error'];
        $imageSize = $sub_asset_img['size'];
        $fileExt = explode(".", $sub_img);
        $fileActualExt = strtolower(end($fileExt));
        //handle video file
        $sub_vid = $sub_asset_video['name'];
        $vidtempName = $sub_asset_video['tmp_name'];
        $vidError = $sub_asset_video['error'];
        $vidSize = $sub_asset_video['size'];
        $vidExt = explode('.', $sub_vid);
        $vidActualExt = strtolower(end($vidExt));
        $allowed = array('jpg', 'jpeg', 'png', 'mp4', 'mov');
        //error handling of files
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 12000000){
                    $image = uniqid("", true).'.'.$fileActualExt;
                    $ipath = '../profiles/'.$username.$userid.'/assets/photos/';
                    $destination = $ipath . $image;
                }else{
                    redirect("Image file size too large!", "dashboard.php?assets=upload-sub-asset");
                    exit();
                }
            }else{
                redirect("There was an error uploading your image!", "dashboard.php?assets=upload-main-asset");
                exit();
            }
        }else{
            redirect("Invalid image file type!", "dashboard.php?assets=upload-sub-asset");
        }

        if(in_array($vidActualExt, $allowed)){
            if($vidError === 0){
                if($vidSize < 40000000){
                    $video = uniqid("", true).'.'.$fileActualExt;
                    $path = '../profiles/'.$username.$userid.'/assets/videos/';
                    $viddestination = $path . $video;
                }else{
                    redirect("Video file size too large!", "dashboard.php?assets=upload-sub-asset");
                    exit();
                }
            }else{
                redirect("There was an error uploading your video!", "dashboard.php?assets=upload-main-asset");
                exit();
            }
        }else{
            redirect("Invalid video type!", "dashboard.php?assets=upload-sub-asset");
        }
        
        //check if folders exist
        
        if(move_uploaded_file($tempName, $destination)){
            move_uploaded_file($vidtempName, $viddestination);
        }else{
            redirect("Could not upload file", "dashboard.php?assets=upload-sub-asset");
            exit();
        }

        include "../classes/dbh.class.php";
        include "../classes/assets.class.php";
        include "../classes/assets-contr.class.php";
        $cat = new AssetContr($userid);

        #adding asset to assets data table
        
        $cat->addSubAsset($asset_name, $type_id, $main_asset_id, $floor, $number_of_rooms, $room_number, $description, $country, $address, $image, $video, $floor_size);
        
    }
    

    if(isset($_POST['update_main'])){
        $main_id = htmlspecialchars($_POST['asset_id'], ENT_QUOTES, 'UTF-8');
        $asset_name = htmlspecialchars($_POST['assetname'], ENT_QUOTES, 'UTF-8'); 
        $category_id = htmlspecialchars($_POST['category'], ENT_QUOTES, 'UTF-8'); 
        $type_id = htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8'); 
        $number_of_subs = htmlspecialchars($_POST['subs'], ENT_QUOTES, 'UTF-8'); 
        $asset_img = $_FILES['asset_img'];
        $asset_video = $_FILES['asset_video'];
        $asset_description = htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8');
        $asset_country = htmlspecialchars($_POST['country'], ENT_QUOTES, 'UTF-8');
        $asset_address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
        $number_of_rooms = htmlspecialchars($_POST['rooms'], ENT_QUOTES, 'UTF-8');
        $number_of_floors = htmlspecialchars($_POST['floors'], ENT_QUOTES, 'UTF-8');
        $floor_area = htmlspecialchars($_POST['size'], ENT_QUOTES, 'UTF-8');
        $userid = $_POST['userid'];
        $username = $_POST['username'];
        //process the files received
        $asset = $asset_img['name'];
        $tempName = $asset_img['tmp_name'];
        $fileError = $asset_img['error'];
        $imageSize = $asset_img['size'];
        $fileExt = explode(".", $asset);
        $fileActualExt = strtolower(end($fileExt));
        //process the video file
        $assetV = $asset_video['name'];
        $vidtempName = $asset_video['tmp_name'];
        $vidError = $asset_video['error'];
        $vidSize = $asset_video['size'];
        $vidExt = explode('.', $assetV);
        $vidActualExt = strtolower(end($vidExt));
        $allowed = array('jpg', 'jpeg', 'png', 'mp4', 'mov');
        //error handling of files
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 12000000){
                    $image = uniqid("", true).'.'.$fileActualExt;
                    $ipath = '../profiles/'.$username.$userid.'/assets/photos/';
                    $destination = $ipath . $image;
                }else{
                    redirect("Video file size too large!", "dashboard.php?assets=upload-sub-asset");
                    exit();
                }
            }else{
                redirect("There was an error uploading your image!", "dashboard.php?assets=upload-main-asset");
                exit();
                
            }
        }else{
            redirect("Invalid file type!", "dashboard.php?assets=upload-main-asset");
        }

        if(in_array($vidActualExt, $allowed)){
            if($vidError === 0){
                if($vidSize < 40000000){
                    $video = uniqid('', true).$fileActualExt;
                    $path = '../profiles/'.$username.$userid.'/assets/videos/';
                    $viddestination = $path . $video;
                }else{
                    redirect("Video file size too large!", "dashboard.php?assets=upload-sub-asset");
                    exit();
                }
            }else{
                redirect("There was an error uploading your video!", "dashboard.php?assets=upload-main-asset");
                exit();
            }
        }else{
            redirect("Invalid video type!", "dashboard.php?assets=upload-main-asset");
        }
        
        //check if folders exist


        if(move_uploaded_file($tempName, $destination)){
            move_uploaded_file($vidtempName, $viddestination);
        }else{
            redirect("Could not upload file", "dashboard.php?assets=upload-main-asset");
            exit();
        }

        include "../classes/dbh.class.php";
        include "../classes/assets.class.php";
        include "../classes/assets-contr.class.php";
        $cat = new AssetContr($userid);

        #adding asset to assets data table
        $cat->updateMainAsset($asset_name, $catgory_id, $type_id, $number_of_subs, $image, $video, $asset_description, $asset_country, $asset_address, $number_of_rooms, $number_of_floors, $floor_area, $main_id);
        
    }


    if(isset($_POST['update_sub'])){
        $asset_id = htmlspecialchars($_POST['asset_id'], ENT_QUOTES, 'UTF-8');
        $asset_name = htmlspecialchars($_POST['assetname'], ENT_QUOTES, 'UTF-8');
        $type_id = htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8');
        $main_asset_id = htmlspecialchars($_POST['main_asset'], ENT_QUOTES, 'UTF-8');
        $owner_id = $_SESSION['auth_user']['user_id'];
        $floor = htmlspecialchars($_POST['floor'], ENT_QUOTES, 'UTF-8');
        $number_of_rooms = htmlspecialchars($_POST['rooms'], ENT_QUOTES, 'UTF-8');
        $room_number = htmlspecialchars($_POST['roomnum'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8');
        $country = htmlspecialchars($_POST['country'], ENT_QUOTES, 'UTF-8'); 
        $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
        $sub_asset_img = $_FILES['asset_img'];
        $sub_asset_video = $_FILES['asset_video']; 
        $floor_size = htmlspecialchars($_POST['size'], ENT_QUOTES, 'UTF-8');

        $userid = $_POST['userid'];
        $username = $_POST['username'];

        // Process the files recieved
        $sub_img = $sub_asset_img['name'];
        $tempName = $sub_asset_img['tmp_name'];
        $fileError = $sub_asset_img['error'];
        $imageSize = $sub_asset_img['size'];
        $fileExt = explode(".", $sub_img);
        $fileActualExt = strtolower(end($fileExt));
        //handle video file
        $subV = $sub_asset_video['name'];
        $vidtempName = $sub_asset_video['tmp_name'];
        $vidError = $sub_asset_video['error'];
        $vidSize = $sub_asset_video['size'];
        $vidExt = explode('.', $subV);
        $vidActualExt = strtolower(end($vidExt));
        $allowed = array('jpg', 'jpeg', 'png', 'mp4', 'mov');
        //error handling of files
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 12000000){
                    $image = $tempName.$fileActualExt;
                    $ipath = '../profiles/'.$username.$userid.'/assets/photos/';
                    $destination = $ipath . $image;
                }
            }else{
                redirect("Image file size too large!", "dashboard.php?assets=upload-sub-asset");
                exit();
            }
        }else{
            redirect("Invalid file type!", "dashboard.php?assets=upload-sub-asset");
        }

        if(in_array($vidActualExt, $allowed)){
            if($vidError === 0){
                if($vidSize < 40000000){
                    $video = uniqid('', true).$fileActualExt;
                    $path = '../profiles/'.$username.$userid.'/assets/videos/';
                    $viddestination = $path . $video;
                }else{
                    redirect("Video file size too large!", "dashboard.php?assets=upload-sub-asset");
                    exit();
                }
            }else{
                redirect("There was an error uploading your video!", "dashboard.php?assets=upload-sub-asset");
                exit();
            }
        }else{
            redirect("Invalid video type!", "dashboard.php?assets=upload-sub-asset");
        }
        
        //check if folders exist
        
        if(move_uploaded_file($tempName, $destination)){
            move_uploaded_file($vidtempName, $viddestination);
        }else{
            redirect("Could not upload file", "dashboard.php?assets=upload-sub-asset");
            exit();
        }

        include "../classes/dbh.class.php";
        include "../classes/assets.class.php";
        include "../classes/assets-contr.class.php";
        $cat = new AssetContr($userid);

        #adding asset to assets data table
        
        $cat->updateSubAsset($asset_name, $type_id, $main_asset_id, $floor, $number_of_rooms, $room_number, $description, $country, $address, $image, $video, $floor_size, $asset_id);
        
    }
}
