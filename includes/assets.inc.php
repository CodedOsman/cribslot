<?php
include_once("../config/app.php");


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['add_main'])){
        $asset_name = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $category = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $type = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $number_of_subs = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $asset_img = $_FILES['asset_img']['name'];
        $asset_video = $_FILES['asset_video']['name'];
        $asset_description = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $asset_country = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $date_added = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $asset_address = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $listed = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $number_of_rooms = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $number_of_floors = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $floor_area = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
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
                redirect("Image file size too large!", "dashboard.php?profile");
                exit();
            }
        }else{
            redirect("Invalid file type!", "dashboard.php?profile");
        }

        if(in_array($vidActualExt, $allowed)){
            if($vidError === 0){
                if($vidSize < 40000000){
                    $image = $vidtempName.$fileActualExt;
                    $viddestination = 'profiles/'.$username.$userid.'/assets/videos';
                }
            }else{
                redirect("Video file size too large!", "dashboard.php?profile");
                exit();
            }
        }else{
            redirect("Invalid video type!", "dashboard.php?profile");
        }
        
        //check if folders exist
        if(!isdir($destination)){
            mkdir($destination, 0777, true);
        }
        if(!isdir($viddestination)){
            mkdir($viddestination);
        }

        include "../classes/dbh.class.php";
        include "../classes/assets.class.php";
        include "../classes/assets-contr.class.php";
        $cat = new AssetContr($owner_id);

        #adding asset to assets data table
        $category_id = $cat->fetchCategoryID($category);
        $type_id = $cat->fetchTypesID($type);
        $cat->addAsset($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $tempName, $vidtempName, $asset_description, $asset_country, $date_added, $asset_address, $listed, $number_of_rooms, $number_of_floors, $floor_area, $owner_id);
        
    }
    

    if(isset($_POST['update_main'])){
        $asset_name = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $category = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $type = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $number_of_subs = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $asset_img = $_FILES['asset_img']['name'];
        $asset_video = $_FILES['asset_video']['name'];
        $asset_description = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $asset_country = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $date_added = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $asset_address = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $listed = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $number_of_rooms = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $number_of_floors = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $floor_area = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $owner_id = $_SESSION['auth_user']['user_id'];


        include "../classes/dbh.class.php";
        include "../classes/assets.class.php";
        include "../classes/assets-contr.class.php";
        $cat = new AssetContr($owner_id);
        
        #adding asset to assets data table
        $category_id = $cat->fetchCategoryID($category);
        $type_id = $cat->fetchTypesID($type);
        $cat->addAsset($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $date_added, $asset_address, $listed, $number_of_rooms, $number_of_floors, $floor_area, $owner_id);
        
    }

    if(isset($_POST['add_sub'])){
        $main_asset_id = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $floor = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $number_of_rooms = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $room_number = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $sub_asset_img = $_FILES['asset_img']['name'];
        $sub_asset_video = $_FILES['asset_video']['name']; 
        $floor_size = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $listed = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $date_added; 

        include "../classes/dbh.class.php";
        include "../classes/assets.class.php";
        include "../classes/assets-contr.class.php";
        $cat = new AssetContr($owner_id);

        #adding asset to assets data table
        
        $cat->addSubAsset($main_asset_id, $floor, $number_of_rooms, $room_number, $sub_asset_image, $sub_asset_video, $floor_size, $listed, $date_added);
        
    }

    if(isset($_POST['update_sub'])){
        $main_asset_id = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $floor = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $number_of_rooms = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8');
        $room_number = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $sub_asset_img = $_FILES['asset_img']['name'];
        $sub_asset_video = $_FILES['asset_video']['name'];
        $floor_size = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $listed = htmlspecialchars($_POST[''], ENT_QUOTES, 'UTF-8'); 
        $date_added; 

        include "../classes/dbh.class.php";
        include "../classes/assets.class.php";
        include "../classes/assets-contr.class.php";
        $cat = new AssetContr($owner_id);

        #adding asset to assets data table
        
        $cat->updateSubAsset($main_asset_id, $floor, $number_of_rooms, $room_number, $sub_asset_image, $sub_asset_video, $floor_size, $listed, $date_added);
        
    }
}
