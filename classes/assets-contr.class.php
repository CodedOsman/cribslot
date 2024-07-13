<?php

class AssetContr extends Assets {
    private $owner_id;

    private function __construc($owner_id){
        $this->owner_id = $owner_id;
    }


    public function addAsset($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $date_added, $asset_address, $listed, $number_of_rooms, $number_of_floors, $floor_area, $owner_id){
        //check for errors then populate database 
        $this->setAssetInfo($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $date_added, $asset_address, $listed, $number_of_rooms, $number_of_floors, $floor_area, $this->owner_id);
    }

    public function updateAsset(){
        //check for errors then update data in database
        $this->updateAssetInfo();
    }


    public function addSubAsset($main_asset_id, $floor, $number_of_rooms, $room_number, $sub_asset_image, $sub_asset_video, $floor_size, $listed, $date_added){
        //check for errors then populate database
        $this->setSubAsset($main_asset_id, $floor, $number_of_rooms, $room_number, $sub_asset_image, $sub_asset_video, $floor_size, $listed, $date_added);
    }

    public function updateSubAsset(){

    }

    public function fetchCategories(){
        //method to fetch main asset id
        $category_name = $this->getCategoriesName();

        return $category_name;
    }

    public function fetchCategoryID($category_name){
        $category_id = $this->getCategoriesID($category_name);

        return $category_id;
    }

    public function fetchTypesID($type_name){
        $type_id = $this->getTypesID($type_name);

        return $type_id;
    }


} 
