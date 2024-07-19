<?php

class AssetContr extends Assets {
    private $owner_id;

    private function __construct($owner_id){
        $this->owner_id = $owner_id;
    }


    public function addAsset($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $asset_address, $number_of_rooms, $number_of_floors, $floor_area){
        //check for errors then populate database 
        if($this->emptyInput($asset_img) == false){
            redirect("Please add an image for this asset", "dashboard.php?assets=upload-main-asset");
            exit();
        }
        if($this->emptyInput($asset_video) == false){
            redirect("Please add a video for this asset", "dashboard.php?assets=upload-main-asset");
            exit();
        }
        if($this->emptyInput($asset_description) == false){
            redirect("Please decribe this asset", "dashboard.php?assets=upload-main-asset");
            exit();
        }
        if($this->emptyInput($asset_country) == false){
            redirect("Please add an image for this asset", "dashboard.php?assets=upload-main-asset");
            exit();
        }
        if($this->emptyInput($asset_address) == false){
            redirect("Please add an address for this asset", "dashboard.php?assets=upload-main-asset");
            exit();
        }
        $this->setAssetInfo($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $asset_address, $number_of_rooms, $number_of_floors, $floor_area, $this->owner_id);
        redirect("Asset added successfully", "dashboard.php?assets=upload-main-asset");
    }

    public function updateMainAsset($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $asset_address, $number_of_rooms,$number_of_floors, $floor_size, $asset_id){
        //check for errors then update data in database
        if($this->emptyInput($asset_img) == false){
            redirect("Please add an image for this asset", "dashboard.php?assets=update-main-asset");
            exit();
        }
        if($this->emptyInput($asset_video) == false){
            redirect("Please add a video for this asset", "dashboard.php?assets=update-main-asset");
            exit();
        }
        if($this->emptyInput($asset_description) == false){
            redirect("Please decribe this asset", "dashboard.php?assets=update-main-asset");
            exit();
        }
        if($this->emptyInput($asset_country) == false){
            redirect("Please add an image for this asset", "dashboard.php?assets=update-main-asset");
            exit();
        }
        if($this->emptyInput($asset_address) == false){
            redirect("Please add an address for this asset", "dashboard.php?assets=update-main-asset");
            exit();
        }
        $this->updateMain($asset_name, $asset_category_id, $asset_type_id, $number_of_subs, $asset_img, $asset_video, $asset_description, $asset_country, $asset_address, $number_of_rooms, $number_of_floors, $floor_size, $asset_id);
        redirect("Asset updated successfully", "dashboard.php?assets=update-main-asset");
    }


    public function addSubAsset($asset_name, $type_id, $main_asset_id, $floor, $number_of_rooms, $room_number, $description, $country, $address, $sub_asset_image, $sub_asset_video, $floor_size){
        //check for errors then populate database
        if($this->emptyInput($sub_asset_image) == false){
            redirect("Please add an image for this asset", "dashboard.php?assets=upload-sub-asset");
            exit();
        }
        if($this->emptyInput($sub_asset_video) == false){
            redirect("Please add a video for this asset", "dashboard.php?assets=upload-sub-asset");
            exit();
        }
        if($this->emptyInput($description) == false){
            redirect("Please decribe this asset", "dashboard.php?assets=upload-sub-asset");
            exit();
        }
        if($this->emptyInput($country) == false){
            redirect("Please add an image for this asset", "dashboard.php?assets=upload-sub-asset");
            exit();
        }
        if($this->emptyInput($address) == false){
            redirect("Please add an address for this asset", "dashboard.php?assets=upload-sub-asset");
            exit();
        }
        $this->setSubAsset($asset_name, $type_id, $main_asset_id, $this->owner_id, $floor, $number_of_rooms, $room_number, $description, $country, $address, $sub_asset_image, $sub_asset_video, $floor_size);
        redirect("Asset updated successfully", "dashboard.php?assets=upload-sub-asset");
    }

    public function updateSubAsset($sub_name, $type_id, $main_asset_id, $floor, $number_of_rooms, $room_number, $sub_description, $country, $sub_address, $asset_image, $asset_video, $floor_size, $sub_id){
        
        if($this->emptyInput($asset_image) == false){
            redirect("Please add an image for this asset", "dashboard.php?assets=update-sub-asset");
            exit();
        }
        if($this->emptyInput($asset_video) == false){
            redirect("Please add a video for this asset", "dashboard.php?assets=update-sub-asset");
            exit();
        }
        if($this->emptyInput($sub_description) == false){
            redirect("Please decribe this asset", "dashboard.php?assets=update-sub-asset");
            exit();
        }
        if($this->emptyInput($country) == false){
            redirect("Please add an image for this asset", "dashboard.php?assets=update-sub-asset");
            exit();
        }
        if($this->emptyInput($sub_address) == false){
            redirect("Please add an address for this asset", "dashboard.php?assets=update-sub-asset");
            exit();
        }
        $this->updateSub($sub_name, $type_id, $main_asset_id, $floor, $number_of_rooms, $room_number, $sub_description, $country, $sub_address, $asset_image, $asset_video, $floor_size, $sub_id);
        redirect("Asset updated successfully", "dashboard.php?assets=update-sub-asset");
    }


    private function emptyInput($input){
        if(empty($input)){
            $result = false;
        }else{
            $result = true;
        }

    }
} 
