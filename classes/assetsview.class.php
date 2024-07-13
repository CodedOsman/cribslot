<?php

class AssetView extends Assets{
    
    public function defaultCategories(){
        $assetname = $this->getCategoriesName();

        return $assetname;
    }

    public function defaultTypes(){
        $typename = $this->getTypesName();

        return $typename;
    }

    public function mainAssetID($assetname, $userid){
        $main_asset_id = $this->getAssetInfo($assetname, $userid);

        return $main_asset_id[0]['asset_id'];
    }

    public function fetchMainAssets($userid){
        $assetData = $this->getAssetInfo($userid);

        return $assetData;
    }

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
