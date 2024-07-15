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
        $main_asset_id = $this->getAssetInfo($assetname, $userid);

        return $main_asset_id[0]['asset_id'];
    }
    // method populates main assets table in the assets dashboard
    public function fetchMainAssets($userid){
        $assetData = $this->getAssetInfo($userid);

        return $assetData;
    }
    // method populates update main asset form
    public function fetchMainAsset($assetid){
        $assetData = $this->getAssetmain($assetid);

        return $assetData;
    }
    // method populates sub asset update form
    public function fetchSubAsset($assetid){
        $assetData = $this->getAssetmain($assetid);

        return $assetData;
    }
    // method populates sub asset table in the assets dashboard
    public function fetchSubAssets($userid){
        $subAssetData = $this->getSubAssetsInfo($userid);

        return $subAssetData;
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
