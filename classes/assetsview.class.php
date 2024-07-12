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

    
    
}
