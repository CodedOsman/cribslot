<?php

class AssetView extends Assets{
    // method populates the select option with the supported asset categories
    public function defaultCategories(){
        $assetname = $this->getCategoriesName();

        return $assetname;
    }
    // method populates the select option with the supported asset types
    public function defaultTypes(){
        $typename = $this->getTypesName();

        return $typename;
    }
    // method gets just the id of a main asset
    public function mainAssetID($assetname, $userid){
        $main_asset_id = $this->getMainAssetID($assetname, $userid);

        return $main_asset_id[0]['asset_id'];
    }
    // method fetches all main assets of a particular user
    public function fetchMainAssets($userid){
        $assetData = $this->getAssetInfo($userid);

        return $assetData;
    }
    //method returns number of main assets of a particular user
    public function fetchMainAssetsCount($userid){
        $assetData = $this->getAssetInfo($userid);
        if($assetData == 0){
            return 0;
        }else{
            return count($assetData);
        }
        
    }
    // method fetches information of a particualar asset in the main assets table
    public function fetchMainAsset($assetid){
        $assetData = $this->getAssetmain($assetid);

        return $assetData;
    }
    // method fetches information of a particular sub asset 
    public function fetchSubAsset($assetid){
        $assetData = $this->getAssetSub($assetid);

        return $assetData;
    }
    // method fetches all sub assets of a particular user
    public function fetchSubAssets($userid){
        $subAssetData = $this->getSubAssetsInfo($userid);

        return $subAssetData;
    }
    //method returns number of sub assets of a particular user
    public function fetchSubAssetsCount($userid){
        $subAssetData = $this->getSubAssetsInfo($userid);
        if($subAssetData == 0){
            return 0;
        }else{
            return count($subAssetData);
        }
        
    }
    //method gets subs assets under a particular main asset
    public function fetchSubs($main_id){
        $subsData = $this->getSubs($main_id);

        return $subsData;
    }
    //method returns number of sub assets of a particular mian asset
    public function fetchSubsCount($main_id){
        $subsData = $this->getSubs($main_id);
        if ($subsData == 0){
            return 0;
        }else{
            return count($subsData);
        } 
        
    }
    public function fetchCategories($category_id){
        //method to fetch main asset id
        $category_name = $this->getCategoriesName($category_id);

        return $category_name;
    }

    public function fetchTypes($type_id){
        $types = $this->getTypesName($type_id);

        return $types;
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
