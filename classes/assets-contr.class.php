<?php

class AssetContr extends Assets {
    private $owner_id;

    private function __construct($owner_id){
        $this->owner_id = $owner_id;
    }


    public function addAsset($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $date_added, $asset_address, $listed, $number_of_rooms, $number_of_floors, $floor_area){
        //check for errors then populate database 
        $this->setAssetInfo($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $date_added, $asset_address, $listed, $number_of_rooms, $number_of_floors, $floor_area, $this->owner_id);
    }

    public function updateMainAsset($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $date_added, $asset_address, $listed, $number_of_rooms,$number_of_floors, $floor_size, $asset_id){
        //check for errors then update data in database
        $this->updateMain($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $date_added, $asset_address, $listed, $number_of_rooms, $number_of_floors, $floor_size, $asset_id);
    }


    public function addSubAsset($asset_name, $type_id, $main_asset_id, $floor, $number_of_rooms, $room_number, $description, $country, $address, $sub_asset_image, $sub_asset_video, $floor_size){
        //check for errors then populate database
        $this->setSubAsset($asset_name, $type_id, $main_asset_id, $this->owner_id, $floor, $number_of_rooms, $room_number, $description, $country, $address, $sub_asset_image, $sub_asset_video, $floor_size);
    }

    public function updateSubAsset($sub_name, $type_id, $main_asset_id, $floor, $number_of_rooms, $room_number, $sub_descrtiption, $country, $sub_address, $asset_image, $sset_video, $floor_size, $sub_id){
        $this->updateSub($sub_name, $type_id, $main_asset_id, $floor, $number_of_rooms, $room_number, $sub_descrtiption, $country, $sub_address, $asset_image, $sset_video, $floor_size, $sub_id);
    }



} 
