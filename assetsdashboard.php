
                <div class="row">
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0 illustration">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-6">
                                        <div class="p-3 m-1">
                                            <h4>Manage Assets</h4>
                                            <p class="mb-0">Assets Dashboard</p>
                                        </div>
                                    </div> 
                                    <div class="col-6 align-self-end text-end">
                                        <img src="assets/images/login_image.jpg" class="img-fluid illustration-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-2">
                                            Actions
                                        </h4>
                                        <div class="row">
                                            <div class="col-12 col-md-6 d-flex">
                                                <button class="btn btn-secondary btn-sm mb-2 text-dark">
                                                    <a href="dashboard.php?assets=upload-main-asset">Upload Main Asset</a>
                                                </button>
                                            </div>
                                            <div class="col-12 col-md-6 d-flex">
                                                <button class="btn btn-secondary btn-sm mb-2 text-dark">
                                                    <a href="#">Upload Sub Asset</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row ends -->
                <?php if(isset($_GET['assets']) && $_GET['assets']  == 'upload-main-asset' ) : ?>
                <!-- Form to upload new main asset -->
                <div class="row col-12 col-md-12 d-flex bg-subtle shadow">
                    <div class="header-text mb-3">
                        <h5 class="text-center">Upload new asset</h5>
                    </div>
                    <?php include 'message.php'; ?>
                    <form action="includes/assets.inc.php" method="POST" enctype="multipart/form-data"><!-- upload form starts -->
                        <div class="input-group mb-3">
                            <input type="text" name="assetname" placeholder="Name this asset" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group">Asset Category</span>
                            <select name="category" class="form-control form-control-lg fs-6">
                                <?php
                                    $category = $assets->defaultCategories();
                                    foreach($category as $cat){
                                        $catN = $cat['category_name'];
                                        $catid = $cat['category_id'];
                                ?>
                                <option value="<?php echo $catid; ?>"><?php echo $catN; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group">Asset Type</span>
                            <select name="type" class="form-control form-control-lg fs-6">
                                <?php 
                                    $types = $assets->defaultTypes();
                                    foreach($types as $type){
                                        $typeN = $type['type_name'];
                                        $typeid = $type['type_id'];
                                ?>
                                <option value="<?php echo $typeid; ?>"><?php echo $typeN; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>How many sub assets will be under this asset? </small></span>
                            <input type="text" name="subs" placeholder="Enter a number" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>Select an image for your asset</small></span>
                            <input type="file" name="asset_image" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>Select a video not more than 20MB</small></span>
                            <input type="file" name="asset_video" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <textarea name="desc" placeholder="Describe your asset" class="form-control form-control-lg fs-6"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="country" placeholder="Country" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="address" placeholder="Address" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="rooms" placeholder="Number of rooms" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="floors" placeholder="Number of floors" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="size" placeholder="Floor Size" class="form-control form-control-lg fs-6">
                        </div>
                        
                        <div class="input-group mb-3">
                            <button type="submit" name="add_main" class="btn btn-lg btn-primary w-100 fs-6">Upload</button>
                        </div>
                        <div class="row"></div>
                    </form><!-- upload form ends -->
                </div>
                <?php elseif(isset($_GET['assets']) && $_GET['assets'] == 'upload-sub-asset') : ?>
                <!-- Form to upload new sub asset -->
                <div class="row col-12 col-md-12 d-flex bg-subtle shadow">
                    <div class="header-text mb-3">
                        <h5 class="text-center">Upload new asset</h5>
                    </div>
                    <?php include 'message.php'; ?>
                    <form action="includes/assets.inc.php" method="POST" enctype="multipart/form-data"><!-- upload form starts -->
                        <div class="input-group mb-3">
                            <span class="input-group">Main Asset </span>
                            <select name="main_asset" class="form-control form-control-lg fs-6">
                                <?php
                                    $main_asset = $assets->fetchMainAssets($userid);
                                    foreach($main_asset as $main){
                                        $mainN = $main['asset_name'];
                                        $mainid = $main['asset_id'];
                                ?>
                                <option value="<?php echo $mainid; ?>"><?php echo $mainN; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="assetname" placeholder="Name this asset" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group">Asset Type</span>
                            <select name="type" class="form-control form-control-lg fs-6">
                                <?php 
                                    $types = $assets->defaultTypes();
                                    foreach($types as $type){
                                        $typeN = $type['type_name'];
                                        $typeid = $type['type_id'];
                                ?>
                                <option value="<?php echo $typeid; ?>"><?php echo $typeN; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group"><small>What floor is this asset? (if it is in a storey building) </small></span>
                            <input type="text" name="floor" placeholder="Enter a number" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>Number of rooms or sections </small></span>
                            <input type="text" name="rooms" placeholder="Enter a number" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>Room number / Section label </small></span>
                            <input type="text" name="roomnum" placeholder="Enter a number" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>Select an image for your asset</small></span>
                            <input type="file" name="asset_image" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>Select a video not more than 40MB</small></span>
                            <input type="file" name="asset_video" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <textarea name="desc" placeholder="Describe your asset" class="form-control form-control-lg fs-6"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="country" placeholder="Country" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="address" placeholder="Address" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="size" placeholder="Floor Size" class="form-control form-control-lg fs-6">
                        </div>
                            
                        <div class="input-group mb-3">
                            <button type="submit" name="add_sub" class="btn btn-lg btn-primary w-100 fs-6">Upload</button>
                        </div>
                        <div class="row"></div>
                    </form><!-- upload form ends -->
                </div>
                <?php elseif(isset($_GET['assets']) && $_GET['assets'] == 'update-main-asset') : ?>
                <div class="row col-12 col-md-12 d-flex bg-subtle shadow">
                    <div class="header-text mb-3">
                        <h5 class="text-center">Upload new asset</h5>
                    </div>
                    <?php include 'message.php'; ?>
                    <form action="includes/assets.inc.php" method="POST" enctype="multipart/form-data"><!-- edit form starts -->
                        <?php
                            $asset_id = $_GET['id'];
                            $assetData = $assets->fetchMainAsset($asset_id);
                            
                        ?>
                        <input type="text" name="asset_id" style="display:none;" value="<?php echo $asset_id; ?>">
                        <div class="input-group mb-3">
                            <input type="text" name="assetname" placeholder="Name this asset" value="<?php echo $assetData['asset_name']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group">Asset Category</span>
                            <select name="category" class="form-control form-control-lg fs-6">
                                <?php
                                    if($assetData['category_id'] != NULL){
                                        $catN = $assets->fetchCategories($assetData['category_id']);
                                        echo '<option value="'.$assetData['category_id'].'">'.$catN.'</option>';
                                    }
                                    $category = $assets->defaultCategories();
                                    foreach($category as $cat){
                                        $catN = $cat['category_name'];
                                        $catid = $cat['category_id'];
                                ?>
                                <option value="<?php echo $catid; ?>"><?php echo $catN; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group">Asset Type</span>
                            <select name="type" class="form-control form-control-lg fs-6">
                                <?php
                                    if($assetData['type_id'] != NULL){
                                        $typeN = $assets->fetchTypes($assetData['type_id']);
                                        echo '<option value="'.$assetData['type_id'].'">'.$typeN.'</option>';
                                    } 
                                    $types = $assets->defaultTypes();
                                    foreach($types as $type){
                                        $typeN = $type['type_name'];
                                        $typeid = $type['type_id'];
                                ?>
                                <option value="<?php echo $typeid; ?>"><?php echo $typeN; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>How many sub assets will be under this asset? </small></span>
                            <input type="text" name="subs" placeholder="Enter a number" value="<?php echo $assetData['number_of_subs']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>Select an image for your asset</small></span>
                            <input type="file" name="asset_image" value="<?php echo $assetData['asset_image']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>Select a video not more than 40MB</small></span>
                            <input type="file" name="asset_video" value="<?php echo $assetData['asset_video']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <textarea name="desc" placeholder="Describe your asset" value="<?php echo $assetData['asset_description']; ?>" class="form-control form-control-lg fs-6"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="country" placeholder="Country" value="<?php echo $assetData['asset_country']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="address" placeholder="Address" value="<?php echo $assetData['asset_address']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="rooms" placeholder="Number of rooms" value="<?php echo $assetData['number_of_rooms']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="floors" placeholder="Number of floors" value="<?php echo $assetData['number_of_floors']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="size" placeholder="Floor Size" value="<?php echo $assetData['floor_area']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        
                        <div class="input-group mb-3">
                            <button type="submit" name="update_main" class="btn btn-lg btn-primary w-100 fs-6">Upload</button>
                        </div>
                        <div class="row"></div>
                    </form><!-- upload form ends -->
                </div>
                <?php elseif(isset($_GET['assets']) && $_GET['assets'] == 'update-sub-asset') : ?>
                    <div class="row col-12 col-md-12 d-flex bg-subtle shadow">
                    <div class="header-text mb-3">
                        <h5 class="text-center">Upload new asset</h5>
                    </div>
                    <?php include 'message.php'; ?>
                    <form action="includes/assets.inc.php" method="POST" enctype="multipart/form-data"><!-- edit sub form starts -->
                        <?php
                            $asset_id = $_GET['id'];
                            $assetData = $assets->fetchSubAsset($asset_id);
                            
                        ?>
                        <input type="text" name="asset_id" style="display:none;" value="<?php echo $asset_id; ?>">
                        <div class="input-group mb-3">
                            <span class="input-group">Main Asset </span>
                            <select name="main_asset" class="form-control form-control-lg fs-6">
                                <?php
                                    $main_asset = $assets->fetchMainAssets($userid);
                                    if($assetData['main_asset_id'] != NULL){
                                        echo '<option value="'.$assetData['main_asset_id'].'">'.$main_asset['asset_name'].'</option>';
                                    }
                                    
                                    foreach($main_asset as $main){
                                        $mainN = $main['asset_name'];
                                        $mainid = $main['asset_id'];
                                ?>
                                <option value="<?php echo $mainid; ?>"><?php echo $mainN; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="assetname" placeholder="Name this asset" value="<?php echo $assetData['sub_name']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group">Asset Type</span>
                            <select name="type" class="form-control form-control-lg fs-6">
                                <?php 
                                    if($assetData['type_id'] != NULL){
                                        $typeN = $assets->fetchTypes($assetData['type_id']);
                                        echo '<option value="'.$assetData['type_id'].'">'.$typeN.'</option>';
                                    }
                                    $types = $assets->defaultTypes();
                                    foreach($types as $type){
                                        $typeN = $type['type_name'];
                                        $typeid = $type['type_id'];
                                ?>
                                <option value="<?php echo $typeid; ?>"><?php echo $typeN; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="input-group mb-3">
                            <span class="input-group"><small>What floor is this asset? (if it is in a storey building) </small></span>
                            <input type="text" name="floor" placeholder="Enter a number" value="<?php echo $assetData['floor']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>Number of rooms or sections </small></span>
                            <input type="text" name="rooms" placeholder="Enter a number" value="<?php echo $assetData['number_of_rooms']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>Room number / Section label </small></span>
                            <input type="text" name="roomnum" placeholder="Enter a number" value="<?php echo $assetData['room_number']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>Select an image for your asset</small></span>
                            <input type="file" name="asset_image" value="<?php echo $assetData['asset_image']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group"><small>Select a video not more than 40MB</small></span>
                            <input type="file" name="asset_video" value="<?php echo $assetData['asset_video']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <textarea name="desc" placeholder="Describe your asset" value="<?php echo $assetData['sub_description']; ?>" class="form-control form-control-lg fs-6"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="country" placeholder="Country" value="<?php echo $assetData['country']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="address" placeholder="Address" value="<?php echo $assetData['sub_address']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="size" placeholder="Floor Size" value="<?php echo $assetData['floor_size']; ?>" class="form-control form-control-lg fs-6">
                        </div>
                            
                        <div class="input-group mb-3">
                            <button type="submit" name="add_sub" class="btn btn-lg btn-primary w-100 fs-6">Upload</button>
                        </div>
                        <div class="row"></div>
                    </form><!-- upload form ends -->
                </div>
                <?php else :?>
                <!--Table Element -->
                <div class="col-12 col-md-12 d-flex border-0"><!-- Table card starts here -->
                    <div class="card border-0 flex-fill">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6 align-self-start">
                                    <h5 class="card-title">
                                        Assets
                                    </h5>
                                    <h6 class="card-subtitle text-muted">
                                        All your main assets
                                    </h6>  
                                </div>
                                <div class="col-6 align-self-end text-end">
                                    <button type="button" class="align-self-end ms-auto btn btn-secondary btn-sm">
                                        <a href="dashboard.php?assets">Listed</a>
                                    </button>
                                    <button type="button" class="align-self-end ms-auto btn btn-secondary btn-sm">
                                        <a href="dashboard.php?assets">Unlisted</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Asset Name</th>
                                            <th>Asset Type</th>
                                            <th>Asset Subs</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $assetsResult = $assets->fetchMainAssets($userid);
                                            if($assetsResult === 0) {
                                        ?>
                                        <tr>
                                            <td colspan="4">
                                                <button class="btn btn-primary">Upload your first asset</button>
                                            </td>
                                        </tr>
                                        <?php } else { 
                                            foreach($assetsResult as $asset) { ?>
                                        <tr>
                                            <td><?php echo $asset['asset_name']; ?></td>
                                            <td>
                                                <?php if($asset['category_id'] == 1 ) : ?>
                                                Commercial
                                                <?php elseif ($asset['category_id'] == 2) : ?>
                                                Residential
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php $subsCount = $asset->fetchSubAssets($userid)->rowCount(); ?>
                                                <span class="badge rounded-pill bg-secondary"><?php echo $subsCount; ?></span>
                                                <a href="#">View all</a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm">
                                                    <a href="dashboard.php?assets=update-main-asset?id=<?php $asset['asset_id']; ?>">Edit</a>
                                                </button>
                                                <button type="button" class="btn btn-info btn-sm">List</button>
                                                <button type="button" class="btn btn-secondary btn-sm">Unlist</button>
                                                <button type="button" class="btn btn-danger btn-sm">X</button>
                                            </td>
                                            
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- main assets table card ends here -->
                <!-- Sub Table Element -->
                <div class="col-12 col-md-12 d-flex border-0"><!-- Table card starts here -->
                    <div class="card border-0 flex-fill">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6 align-self-start">
                                    <h5 class="card-title">
                                        Assets
                                    </h5>
                                    <h6 class="card-subtitle text-muted">
                                        All your sub assets
                                    </h6>  
                                </div>
                                <div class="col-6 align-self-end text-end">
                                    <button type="button" class="align-self-end ms-auto btn btn-secondary btn-sm">
                                        <a href="dashboard.php?assets">Listed</a>
                                    </button>
                                    <button type="button" class="align-self-end ms-auto btn btn-secondary btn-sm">
                                        <a href="dashboard.php?assets">Unlisted</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Asset Name</th>
                                            <th>Asset Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $assetsResult = $assets->fetchSubAssets($userid);
                                            if($assetsResult === 0) {
                                        ?>
                                        <tr>
                                            <td colspan="4">
                                                <button class="btn btn-primary">Upload your first asset</button>
                                            </td>
                                        </tr>
                                        <?php } else { 
                                            foreach($assetsResult as $asset) { ?>
                                        <tr>
                                            <td><?php echo $asset['sub_name']; ?></td>
                                            <td>Asset Image here</td>
                                            <td>
                                                <?php
                                                    if($asset['listed'] == 'listed') {
                                                        echo "Listed";
                                                    } else {
                                                        echo "Unlisted";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm">
                                                    <a href="dashboard.php?assets=update-sub-asset?id=<?php $asset['sub_id']; ?>">Edit</a>
                                                </button>
                                                <button type="button" class="btn btn-info btn-sm">List</button>
                                                <button type="button" class="btn btn-secondary btn-sm">Unlist</button>
                                                <button type="button" class="btn btn-danger btn-sm">X</button>
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- table card ends here -->
                <?php endif; ?>