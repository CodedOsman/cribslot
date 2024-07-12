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

    public function mainAssetID(){
        $main_asset_id = $this->getAssetInfo();
    }
    
}
