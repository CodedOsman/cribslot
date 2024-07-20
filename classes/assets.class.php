<?php

class Assets extends Dbh{
    //method fetches all main assets of a particular user
    protected function getAssetInfo($userid){
        $sql = "SELECT * FROM assets WHERE owner_id=?";
        $stmt = $this->connect()->prepare($sql);
        //checking if user has assets in database
        if(!$stmt->execute(array($userid))){
            $stmt = null;
            redirect("Could not fetch assets! Please try again later.", "dashboard.php?dashboard=");
            exit();
        }

        //if data not found, redirect user to user dashboard
        if($stmt->rowCount() == 0){
            $stmt = null;
            return 0;
            exit();
        }
        // if the data is found reference to data
        $assetData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $assetData;
    }
    //method to fetch main asset id
    protected function getMainAssetID($assetname, $userid){
        $sql = "SELECT asset_id FROM assets WHERE asset_name=? AND owner_id=?";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($assetname, $userid))){
            $stmt = null;
            redirect("Something went wrong! Please try again", "dashboard.php?dashboard");
            exit();
        }

        $main_asset_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $main_asset_id;
    }
    //method fetches all sub assets of a particular user
    protected function getSubAssetsInfo($userid){
        $sql = "SELECT * FROM asset_subs WHERE owner_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($userid))){
            $stmt = null;
            redirect("Could not fetch assets! Try again later", "dashboard.php?dashboard=");
            exit();
        }
        
        //if data not found, redirect user to dashboard
        if($stmt->rowCount() == 0){
            $stmt = null;
            return 0;
            exit();
        }
        // if the data is found reference to data
        $subAssetData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $subAssetData;
    }

    //method fetches all subs of a particular asset
    protected function getSubs($mainid){
        $sql = "SELECT * FROM asset_subs WHERE main_asset_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($mainid))){
            $stmt = null;
            redirect("Could not fetch assets! Try again later", "dashboard.php?dashboard=");
            exit();
        }
        
        //if data not found, redirect user to dashboard
        if($stmt->rowCount() == 0){
            $stmt = null;
            return 0;
            exit();
        }
        // if the data is found reference to data
        $subAssetData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $subAssetData;
    }

    //method to fetch a single asset from main asset table
    protected function getAssetmain($assetid){
        $sql = "SELECT * FROM assets WHERE asset_id=?";
        $stmt = $this->connect()->prepare($sql);
        //checking if user has assets in database
        if(!$stmt->execute(array($assetid))){
            $stmt = null;
            redirect("Could not fetch assets! Please try again later.", "dashboard.php?dashboard=");
            exit();
        }

        //if data not found, redirect user to user dashboard
        if($stmt->rowCount() == 0){
            $stmt = null;
            return 0;
            exit();
        }
        // if the data is found reference to data
        $assetData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $assetData;
    }

    //method to fetch a single sub asset from  asset-subs table
    protected function getAssetSub($assetid){
        $sql = "SELECT * FROM asset_subs WHERE sub_id=?";
        $stmt = $this->connect()->prepare($sql);
        //checking if user has assets in database
        if(!$stmt->execute(array($assetid))){
            $stmt = null;
            redirect("Could not fetch assets! Please try again later.", "dashboard.php?dashboard=");
            exit();
        }

        //if data not found, redirect user to user dashboard
        if($stmt->rowCount() == 0){
            $stmt = null;
            return 0;
            exit();
        }
        // if the data is found reference to data
        $assetData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $assetData;
    }

    // method adds new assets to the database
    protected function setAssetInfo($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $asset_address, $number_of_rooms, $number_of_floors, $floor_area, $owner_id){
        $sql = "INSERT INTO assets (asset_name, asset_category_id, asset_type_id, number_of_subs, asset_img, asset_video, asset_description, asset_country, asset_address, number_of_rooms, number_of_floors, floor_area, owner_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute(array($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $asset_address, $number_of_rooms, $number_of_floors, $floor_area, $owner_id))){
            $stmt = null;
            redirect("Something went wrong! Please try again later.", "dashboard.php?assets=upload-main-asset");
            exit();
        }

        $stmt = null;
    }

    // method updates main assets
    protected function updateMain($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_description, $asset_country, $asset_address, $number_of_rooms,$number_of_floors,$floor_size, $asset_id){
        $sql = "UPDATE assets SET asset_name=?, asset_category_id=?, asset_type_id=?, number_of_subs=?, asset_description=?, asset_country=?, asset_address=?, number_of_rooms=?,number_of_floors=?,floor_area=? WHERE asset_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_description, $asset_country, $asset_address, $number_of_rooms,$number_of_floors,$floor_size, $asset_id))){
            $stmt = null;
            redirect("Something went wrong!", "dashboard.php?assets=update-main-asset&id=".$asset_id);
            exit();
        }

        $stmt = null;
    }
    // method update main asset photo
    protected function updateMainPhoto($photo, $asset_id){
        $sql = "UPDATE assets SET asset_img=? WHERE asset_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($photo, $asset_id))){
            $stmt = null;
            redirect('Could not update asset image', 'dashboard.php?assets=update-main-asset&id='.$asset_id);
            exit();
        }
    }

    // method update main asset photo
    protected function updateMainVideo($video, $asset_id){
        $sql = "UPDATE assets SET asset_video=? WHERE asset_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($video, $asset_id))){
            $stmt = null;
            redirect('Could not update asset video', 'dashboard.php?assets=update-main-asset&id='.$asset_id);
            exit();
        }
    }
    
    //method adds new sub assets to the database
    protected function setSubAsset($asset_name, $type_id, $main_asset_id, $owner_id, $floor, $number_of_rooms, $room_number, $description, $country, $address, $sub_asset_image, $sub_asset_video, $floor_size){
        $sql = "INSERT INTO asset_subs (sub_name, type_id, main_asset_id, owner_id, floor, number_of_rooms, room_number, sub_description, country, sub_address, asset_image, asset_video, floor_size) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute(array($asset_name, $type_id, $main_asset_id, $owner_id, $floor, $number_of_rooms, $room_number, $description, $country, $address, $sub_asset_image, $sub_asset_video, $floor_size))){
            $stmt = null;
            redirect("Something went wrong! Please try again later.", "dashboard.php?assets=upload-sub-asset");
            exit();
        }

        $stmt = null;
    }
    //method upates sub assets
    protected function updateSub($sub_name, $type_id, $main_asset_id, $floor, $number_of_rooms, $room_number, $sub_descrtiption, $country, $sub_address, $floor_size, $sub_id){
        $sql = "UPDATE asset_subs SET sub_name=?, type_id=?, main_asset_id=?, floor=?, number_of_rooms=?, room_number=?, sub_descrtiption=?, country=?, sub_address=?, floor_size=? WHERE sub_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($sub_name, $type_id, $main_asset_id, $floor, $number_of_rooms, $room_number, $sub_descrtiption, $country, $sub_address, $floor_size, $sub_id))){
            $stmt = null;
            redirect("Something went wrong! Please try again later.", "dashboard.php?assets=update-sub-asset?id=".$sub_id);
            exit();
        }

        $stmt = null;
    }

    // method update sub asset photo
    protected function updateSubPhoto($photo, $asset_id){
        $sql = "UPDATE asset_subs SET asset_iamge=? WHERE asset_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($photo, $asset_id))){
            $stmt = null;
            redirect('Could not update asset image', 'dashboard.php?assets=update-main-asset&id='.$asset_id);
            exit();
        }
    }

    // method update sub asset photo
    protected function updateSubVideo($video, $asset_id){
        $sql = "UPDATE asset_subs SET asset_video=? WHERE asset_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($video, $asset_id))){
            $stmt = null;
            redirect('Could not update asset video', 'dashboard.php?assets=update-main-asset&id='.$asset_id);
            exit();
        }
    }

    // method fetchs categories
    protected function getCategoriesID($category_name){
        $sql = "SELECT category_id FROM asset_categories WHERE category_name=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($category_name))){
            $stmt = null;
            redirect("Could not fetch categories! Try again later", "dashboard.php?dashboard=");
            exit();
        }
        
        //if data not found, redirect user to dashboard
        if($stmt->rowCount() == 0){
            $stmt = null;
            return 0;
            exit();
        }
        // if the data is found reference to data
        $categoryID = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $categoryID;
    }

    // method fetchs asset types
    protected function getTypesID($type_name){
        $sql = "SELECT type_id FROM asset_types WHERE type_name=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($type_name))){
            $stmt = null;
            redirect("Could not fetch asset types! Try again later", "dashboard.php?dashboard=");
            exit();
        }
        
        //if data not found, redirect user to dashboard
        if($stmt->rowCount() == 0){
            $stmt = null;
            return 0;
            exit();
        }
        // if the data is found reference to data
        $typesID = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $typesID;
    }

    protected function getTypesName(){
        $sql = "SELECT * FROM asset_types";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array())){
            $stmt = null;
            redirect("Could not fetch asset types! Try again later", "dashboard.php?dashboard=");
            exit();
        }
        
        //if data not found, redirect user to dashboard
        if($stmt->rowCount() == 0){
            $stmt = null;
            return 0;
            exit();
        }
        // if the data is found reference to data
        $typesName = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $typesName;
    }

    protected function getCategoriesName(){
        $sql = "SELECT * FROM asset_categories";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array())){
            $stmt = null;
            redirect("Could not fetch asset types! Try again later", "dashboard.php?dashboard=");
            exit();
        }
        
        //if data not found, redirect user to dashboard
        if($stmt->rowCount() == 0){
            $stmt = null;
            return 0;
            exit();
        }
        // if the data is found reference to data
        $categoriesName = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $categoriesName;
    }
}