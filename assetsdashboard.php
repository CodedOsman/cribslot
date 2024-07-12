
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
                                                    <a href="#">Upload Main Asset</a>
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
                <!--Table Element -->
                <div class="col-12 col-md-12 d-flex border-0"><!-- Table cared starts here -->
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