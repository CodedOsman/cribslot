<?php

class Assets extends Dbh{

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
    //method fetches sub assets referencing the main assets table using the main asset id
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
    // method adds new assets to the database
    protected function setAssetInfo($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $date_added, $asset_address, $listed, $number_of_rooms, $number_of_floors, $floor_area, $owner_id){
        $sql = "INSERT INTO assets (asset_name, asset_category_id, asset_type_id, number_of_subs, asset_img, asset_video, asset_description, asset_country, date_added, asset_address, listed, number_of_rooms, number_of_floors, floor_area, owner_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute(array($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $date_added, $asset_address, $listed, $number_of_rooms, $number_of_floors, $floor_area, $owner_id))){
            $stmt = null;
            redirect("Something went wrong! Please try again later.", "dashboard.php?dashboard=");
            exit();
        }
    }
    
    //method adds new sub assets to the database
    protected function setSubAsset($main_asset_id, $owner_id, $floor, $number_of_rooms, $room_number, $sub_asset_image, $sub_asset_video, $floor_size, $listed, $date_added){
        $sql = "INSERT INTO asset_subs (main_asset_id, floor, number_of_rooms, room_number, sub_asset_image, sub_asset_video, floor_size, listed, date_added) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        
        if(!$stmt->execute(array($main_asset_id, $owner_id, $floor, $number_of_rooms, $room_number, $sub_asset_image, $sub_asset_video, $floor_size, $listed, $date_added))){
            $stmt = null;
            redirect("Something went wrong! Please try again later.", "dashboard.php?dashboard=");
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