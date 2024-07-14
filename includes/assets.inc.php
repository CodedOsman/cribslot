<?php
include_once("../config/app.php");


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['add_main'])){
        $asset_name = htmlspecialchars($_POST['assetname'], ENT_QUOTES, 'UTF-8'); 
        $category_id = htmlspecialchars($_POST['category'], ENT_QUOTES, 'UTF-8'); 
        $type_id = htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8'); 
        $number_of_subs = htmlspecialchars($_POST['subs'], ENT_QUOTES, 'UTF-8'); 
        $asset_img = $_FILES['asset_img']['name'];
        $asset_video = $_FILES['asset_video']['name'];
        $asset_description = htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8');
        $asset_country = htmlspecialchars($_POST['country'], ENT_QUOTES, 'UTF-8');
        $date_added = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $asset_address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
        $listed = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $number_of_rooms = htmlspecialchars($_POST['rooms'], ENT_QUOTES, 'UTF-8');
        $number_of_floors = htmlspecialchars($_POST['floors'], ENT_QUOTES, 'UTF-8');
        $floor_area = htmlspecialchars($_POST['size'], ENT_QUOTES, 'UTF-8');
        $owner_id = $_SESSION['auth_user']['user_id'];
        //process the files received
        $tempName = $_FILES['asset_img']['temp_name'];
        $fileError = $_FILES['asset_img']['error'];
        $imageSize = $_FILES['asset_img']['size'];
        $fileExt = explode(".", $asset_img);
        $fileActualExt = strtolower(end($fileExt));
        $vidtempName = $_FILES['asset_video']['temp_name'];
        $vidError = $_FILES['asset_video']['error'];
        $vidSize = $_FILES['asset_video']['size'];
        $vidExt = explode('.', 'asset_video');
        $vidActualExt = strtolower(end($vidExt));
        $allowed = array('jpg', 'jepg', 'png', 'mp4', 'mov');
        //error handling of files
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 12000000){
                    $image = $tempName.$fileActualExt;
                    $destination = 'profiles/'.$username.$userid.'/assets/photos';
                }
            }else{
                redirect("Image file size too large!", "dashboard.php?assets=upload-main-asset");
                exit();
            }
        }else{
            redirect("Invalid file type!", "dashboard.php?assets=upload-main-asset");
        }

        if(in_array($vidActualExt, $allowed)){
            if($vidError === 0){
                if($vidSize < 40000000){
                    $image = $vidtempName.$fileActualExt;
                    $viddestination = 'profiles/'.$username.$userid.'/assets/videos';
                }
            }else{
                redirect("Video file size too large!", "dashboard.php?assets=upload-main-asset");
                exit();
            }
        }else{
            redirect("Invalid video type!", "dashboard.php?assets=upload-main-asset");
        }
        
        //check if folders exist
        if(!is_dir($destination)){
            mkdir($destination, 0777, true);
        }
        if(!is_dir($viddestination)){
            mkdir($viddestination);
        }

        if(move_uploaded_file($tempName, $destination)){
            move_uploaded_file($vidtempName, $viddestination);
        }else{
            redirect("Could not upload file", "dashboard.php?assets=upload-main-asset");
            exit();
        }

        include "../classes/dbh.class.php";
        include "../classes/assets.class.php";
        include "../classes/assets-contr.class.php";
        $cat = new AssetContr($owner_id);

        #adding asset to assets data table
        $cat->addAsset($asset_name, $catgory_id, $type_id, $number_of_subs, $tempName, $vidtempName, $asset_description, $asset_country, $date_added, $asset_address, $listed, $number_of_rooms, $number_of_floors, $floor_area);
        
    }
    // Adding sub asset
    if(isset($_POST['add_sub'])){
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
        $sub_asset_img = $_FILES['asset_img']['name'];
        $sub_asset_video = $_FILES['asset_video']['name']; 
        $floor_size = htmlspecialchars($_POST['size'], ENT_QUOTES, 'UTF-8');

        // Process the files recieved
        $tempName = $_FILES['asset_img']['temp_name'];
        $fileError = $_FILES['asset_img']['error'];
        $imageSize = $_FILES['asset_img']['size'];
        $fileExt = explode(".", $asset_img);
        $fileActualExt = strtolower(end($fileExt));
        $vidtempName = $_FILES['asset_video']['temp_name'];
        $vidError = $_FILES['asset_video']['error'];
        $vidSize = $_FILES['asset_video']['size'];
        $vidExt = explode('.', 'asset_video');
        $vidActualExt = strtolower(end($vidExt));
        $allowed = array('jpg', 'jepg', 'png', 'mp4', 'mov');
        //error handling of files
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 12000000){
                    $image = $tempName.$fileActualExt;
                    $destination = 'profiles/'.$username.$userid.'/assets/photos';
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
                    $video = $vidtempName.$fileActualExt;
                    $viddestination = 'profiles/'.$username.$userid.'/assets/videos';
                }
            }else{
                redirect("Video file size too large!", "dashboard.php?assets=upload-sub-asset");
                exit();
            }
        }else{
            redirect("Invalid video type!", "dashboard.php?assets=upload-sub-asset");
        }
        
        //check if folders exist
        if(!is_dir($destination)){
            mkdir($destination, 0777, true);
        } 
        if(!is_dir($viddestination)){
            mkdir($viddestination);
        }
        if(move_uploaded_file($tempName, $destination)){
            move_uploaded_file($vidtempName, $viddestination);
        }else{
            redirect("Could not upload file", "dashboard.php?assets=upload-sub-asset");
            exit();
        }

        include "../classes/dbh.class.php";
        include "../classes/assets.class.php";
        include "../classes/assets-contr.class.php";
        $cat = new AssetContr($owner_id);

        #adding asset to assets data table
        
        $cat->addSubAsset($asset_name, $type_id, $main_asset_id, $floor, $number_of_rooms, $room_number, $description, $country, $address, $image, $video, $floor_size);
        
    }
    

    if(isset($_POST['update_main'])){
        $main_id = htmlspecialchars($_POST['main_id'], ENT_QUOTES, 'UTF-8');
        $asset_name = htmlspecialchars($_POST['assetname'], ENT_QUOTES, 'UTF-8'); 
        $category_id = htmlspecialchars($_POST['category'], ENT_QUOTES, 'UTF-8'); 
        $type_id = htmlspecialchars($_POST['type'], ENT_QUOTES, 'UTF-8'); 
        $number_of_subs = htmlspecialchars($_POST['subs'], ENT_QUOTES, 'UTF-8'); 
        $asset_img = $_FILES['asset_img']['name'];
        $asset_video = $_FILES['asset_video']['name'];
        $asset_description = htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8');
        $asset_country = htmlspecialchars($_POST['country'], ENT_QUOTES, 'UTF-8');
        $date_added = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $asset_address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
        $listed = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $number_of_rooms = htmlspecialchars($_POST['rooms'], ENT_QUOTES, 'UTF-8');
        $number_of_floors = htmlspecialchars($_POST['floors'], ENT_QUOTES, 'UTF-8');
        $floor_area = htmlspecialchars($_POST['size'], ENT_QUOTES, 'UTF-8');
        $owner_id = $_SESSION['auth_user']['user_id'];
        //process the files received
        $tempName = $_FILES['asset_img']['temp_name'];
        $fileError = $_FILES['asset_img']['error'];
        $imageSize = $_FILES['asset_img']['size'];
        $fileExt = explode(".", $asset_img);
        $fileActualExt = strtolower(end($fileExt));
        $vidtempName = $_FILES['asset_video']['temp_name'];
        $vidError = $_FILES['asset_video']['error'];
        $vidSize = $_FILES['asset_video']['size'];
        $vidExt = explode('.', 'asset_video');
        $vidActualExt = strtolower(end($vidExt));
        $allowed = array('jpg', 'jepg', 'png', 'mp4', 'mov');
        //error handling of files
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 12000000){
                    $image = $tempName.$fileActualExt;
                    $destination = 'profiles/'.$username.$userid.'/assets/photos';
                }
            }else{
                redirect("Image file size too large!", "dashboard.php?assets=upload-main-asset");
                exit();
            }
        }else{
            redirect("Invalid file type!", "dashboard.php?assets=upload-main-asset");
        }

        if(in_array($vidActualExt, $allowed)){
            if($vidError === 0){
                if($vidSize < 40000000){
                    $image = $vidtempName.$fileActualExt;
                    $viddestination = 'profiles/'.$username.$userid.'/assets/videos';
                }
            }else{
                redirect("Video file size too large!", "dashboard.php?assets=upload-main-asset");
                exit();
            }
        }else{
            redirect("Invalid video type!", "dashboard.php?assets=upload-main-asset");
        }
        
        //check if folders exist
        if(!is_dir($destination)){
            mkdir($destination, 0777, true);
        }
        if(!is_dir($viddestination)){
            mkdir($viddestination);
        }

        if(move_uploaded_file($tempName, $destination)){
            move_uploaded_file($vidtempName, $viddestination);
        }else{
            redirect("Could not upload file", "dashboard.php?assets=upload-main-asset");
            exit();
        }

        include "../classes/dbh.class.php";
        include "../classes/assets.class.php";
        include "../classes/assets-contr.class.php";
        $cat = new AssetContr($owner_id);

        #adding asset to assets data table
        $cat->updateMainAsset($asset_name, $catgory_id, $type_id, $number_of_subs, $tempName, $vidtempName, $asset_description, $asset_country, $date_added, $asset_address, $listed, $number_of_rooms, $number_of_floors, $floor_area, $main_id);
        
    }


    if(isset($_POST['update_sub'])){
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
        $sub_asset_img = $_FILES['asset_img']['name'];
        $sub_asset_video = $_FILES['asset_video']['name']; 
        $floor_size = htmlspecialchars($_POST['size'], ENT_QUOTES, 'UTF-8');

        // Process the files recieved
        $tempName = $_FILES['asset_img']['temp_name'];
        $fileError = $_FILES['asset_img']['error'];
        $imageSize = $_FILES['asset_img']['size'];
        $fileExt = explode(".", $asset_img);
        $fileActualExt = strtolower(end($fileExt));
        $vidtempName = $_FILES['asset_video']['temp_name'];
        $vidError = $_FILES['asset_video']['error'];
        $vidSize = $_FILES['asset_video']['size'];
        $vidExt = explode('.', 'asset_video');
        $vidActualExt = strtolower(end($vidExt));
        $allowed = array('jpg', 'jepg', 'png', 'mp4', 'mov');
        //error handling of files
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 12000000){
                    $image = $tempName.$fileActualExt;
                    $destination = 'profiles/'.$username.$userid.'/assets/photos';
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
                    $video = $vidtempName.$fileActualExt;
                    $viddestination = 'profiles/'.$username.$userid.'/assets/videos';
                }
            }else{
                redirect("Video file size too large!", "dashboard.php?assets=upload-sub-asset");
                exit();
            }
        }else{
            redirect("Invalid video type!", "dashboard.php?assets=upload-sub-asset");
        }
        
        //check if folders exist
        if(!is_dir($destination)){
            mkdir($destination, 0777, true);
        } 
        if(!is_dir($viddestination)){
            mkdir($viddestination);
        }
        if(move_uploaded_file($tempName, $destination)){
            move_uploaded_file($vidtempName, $viddestination);
        }else{
            redirect("Could not upload file", "dashboard.php?assets=upload-sub-asset");
            exit();
        }

        include "../classes/dbh.class.php";
        include "../classes/assets.class.php";
        include "../classes/assets-contr.class.php";
        $cat = new AssetContr($owner_id);

        #adding asset to assets data table
        
        $cat->updateSubAsset($asset_name, $type_id, $main_asset_id, $floor, $number_of_rooms, $room_number, $description, $country, $address, $image, $video, $floor_size);
        
    }
}
