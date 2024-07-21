<div class="row">
    <div class="col-12 col-md-6 d-flex">
        <div class="card flex-fill border-0 illustration">
            <div class="card-body p-0 d-flex flex-fill">
                <div class="row g-0 w-100">
                    <div class="col-6">
                        <div class="p-3 m-1">
                            <h4>Manage Clients</h4>
                            <p class="mb-0">Clients Dashboard</p>
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
                            Summary
                        </h4>
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <p class="mb-2">
                                            Total Clients
                                            <span class="badge rounded-pill bg-info">
                                                <?php
                                                $clientCount = $clients->fetchClientsCount($userid);
                                                echo $clientCount;
                                                ?>
                                            </span>
                                        </p>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="mb-2">
                                            Tenants
                                            <span class="badge rounded-pill bg-success">0</span>
                                        </p>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="mb-2">
                                            Buyers
                                            <span class="badge rounded-pill bg-secondary">0</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-0">
                            <span class="badge text-success me-2">
                                +9.0%
                            </span>
                            <span class="text-muted">
                                Since Last Month
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- header row ends here -->

<?php 
if (isset($_GET['clients']) && $_GET['clients'] == 'add-client') : 
?>
    <!-- form for Client addition starts here-->
    <div class="row col-12 col-md-12 d-flex bg-subtle shadow">
        <div class="header-text mb-3">
            <h5 class="text-center">Add Client</h5>
        </div>
        <?php include 'message.php'; ?>
        <form action="includes/clients.inc.php" method="POST" enctype="multipart/form-data"><!-- upload form starts -->
            <input type="text" class="form-control" value="<?php echo $userid ?>" name="ownerid" style="display:none;">
            <input type="text" class="form-control" value="<?php echo $username ?>" name="username" style="display:none;">
            <div class="input-group mb-3">
                <select name="client_type" id="client_type" class="form-control form-control-lg fs-6">
                    <option value="">Select Client Type</option>
                    <option value="Individual">Individual</option>
                    <option value="Company">Company</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="firstname" placeholder="Enter client first name" class="form-control form-control-lg fs-6">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="lastname" placeholder="Enter client last name" class="form-control form-control-lg fs-6">
            </div>
            <div class="input-group mb-3">
                <span class="input-group"><small>Add an image of your client</small></span>
                <input type="file" name="client_image" class="form-control form-control-lg fs-6">
            </div>
            <div class="input-group mb-3">
                <select name="gender" id="gender" class="form-control form-control-lg fs-6">
                    <option value="">Select Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="email" placeholder="Enter client email" class="form-control form-control-lg fs-6">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="contact" placeholder="Enter client contact" class="form-control form-control-lg fs-6">
            </div>
            <div class="input-group mb-3">
                <select name="asset_id" class="form-control form-control-lg fs-6">
                    <option value="">Select asset</option>
                    <?php
                    $main_asset = $assets->fetchMainAssets($userid);
                    foreach ($main_asset as $main) {
                        $mainN = $main['asset_name'];
                        $mainid = $main['asset_id'];
                    ?>
                        <option value="<?php echo $mainid; ?>"><?php echo $mainN; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <select name="client_status" id="client_status" class="form-control form-control-lg fs-6">
                    <option value="">Select Client Status</option>
                    <option value="tenant">Tenant</option>
                    <option value="buyer">Buyer</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="occupation" placeholder="Client occupation" class="form-control form-control-lg fs-6">
            </div>

            <div class="input-group mb-3">
                <button type="submit" name="add_client" class="btn btn-lg btn-primary w-100 fs-6">Add</button>
            </div>
        </form><!-- upload form ends -->
    </div>
    <!-- form for Client addition ends here-->

<?php
elseif (isset($_GET['clients']) && $_GET['clients'] == 'update-client') :
?>
    <!-- form for Client edit starts here-->
    <div class="row col-12 col-md-12 d-flex bg-subtle shadow">
        <div class="header-text mb-3">
            <h5 class="text-center">Edit Client Details</h5>
        </div>
        <form action="includes/clients.inc.php" method="POST" enctype="multipart/form-data"><!-- upload form starts -->
            <?php
            $clientid = $_GET['id'];
            $clientinfo = $clients->fetchClientInfo($clientid);
            ?>
            <input type="text" class="form-control" value="<?php echo $userid ?>" name="ownerid" style="display:none;">
            <div class="input-group mb-3">
                <select name="client_type" id="client_type" class="form-control form-control-lg fs-6">
                    <?php
                    if ($clientinfo[0]['client_type'] == 'Individual') {
                    ?>
                        <option value="<?php echo $clientinfo[0]['client_type']; ?>"><?php echo $clientinfo[0]['client_type']; ?></option>
                        <option value="Company">Company</option>
                    <?php
                    } elseif ($clientinfo['client_type'] == 'Company') { ?>
                        <option value="<?php echo $clientinfo[0]['client_type']; ?>"><?php echo $clientinfo[0]['client_type']; ?></option>
                        <option value="Individual">Individual</option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="firstname" placeholder="Enter client first name" value="<?php echo $clientinfo[0]['first_name']; ?>" class="form-control form-control-lg fs-6">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="lastname" placeholder="Enter client last name" value="<?php echo $clientinfo[0]['last_name']; ?>" class="form-control form-control-lg fs-6">
            </div>
            <div class="input-group mb-3">
                <span class="input-group"><small>Add an image of your client</small></span>
                <input type="file" name="client_image" value="<?php echo $clientinfo[0]['client_photo']; ?>" class="form-control form-control-lg fs-6">
            </div>
            <div class="input-group mb-3">
                <select name="gender" id="gender" class="form-control form-control-lg fs-6">
                    <?php $gender = $clientinfo[0]['gender'] ?>
                    <?php if ($gender == 'Male') : ?>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    <?php elseif ($gender == 'Female') : ?>
                        <option value="Male">Male</option>
                        <option value="Other">Other</option>
                    <?php elseif ($gender == 'Other') : ?>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    <?php else : ?>
                        <option value="Female">Female</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="email" placeholder="Enter client email" value="<?php echo $clientinfo[0]['email']; ?>" class="form-control form-control-lg fs-6">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="contact" placeholder="Enter client contact" value="<?php echo $clientinfo[0]['contact']; ?>" class="form-control form-control-lg fs-6">
            </div>
            <div class="input-group mb-3">
                <select name="asset_id" class="form-control form-control-lg fs-6">
                    <option value="">Select asset</option>
                    <?php
                    $main_asset = $assets->fetchMainAssets($userid);
                    $sub_asset = $assets->fetchSubAssets($userid);
                    foreach ($main_asset as $main) {
                        $mainN = $main['asset_name'];
                        $mainid = $main['asset_id'];
                    ?>
                        <option value="<?php echo $mainid; ?>"><?php echo $mainN; ?></option>
                    <?php }
                    foreach ($sub_asset as $sub){
                        $subN = $sub['sub_name'];
                        $subid = $sub['sub_id'];
                    ?>
                    <option value="<?php echo $subid; ?>"><?php echo $subN; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <select name="client_status" id="client_status" class="form-control form-control-lg fs-6">
                    <?php $status = $clientinfo[0]['client_status']; ?>
                    <?php if($status == 'tenant') { ?>
                    <option value="<?php echo $status; ?>">Tenant</option>
                    <option value="buyer">Buyer</option>
                    <?php }if($status == 'buyer') {?>
                    <option value="<?php echo $status; ?>">Buyer</option>
                    <option value="tenant">Tenant</option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="occupation" placeholder="Client occupation" value="<?php echo $clientinfo[0]['occupation']; ?>" class="form-control form-control-lg fs-6">
            </div>

            <div class="input-group mb-3">
                <button type="submit" name="update_client" class="btn btn-lg btn-primary w-100 fs-6">Save</button>
            </div>
            <div class="row"></div>
        </form><!-- upload form ends -->
    </div>
    <!-- form for Client edit ends here-->
<?php
else :
?>

    <!-- Table for Tenants starts here-->
    <div class="col-12 col-md-12 d-flex border-0"><!-- Table card starts here -->
        <div class="card border-0 flex-fill">
            <div class="card-header">
                <div class="row">
                    <div class="col-6 align-self-start">
                        <h5 class="card-title">
                            Tenants
                        </h5>
                        <h6 class="card-subtitle text-muted">
                            All your tenants
                        </h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Client Name</th>
                                <th>Asset</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $clientinfo = $clients->fetchClients($userid);
                            if ($clientinfo > 0) {
                                foreach ($clientinfo as $client) {
                                    $clientid = $client['client_id'];
                                    $clientname = $client['first_name'] .' '. $client['last_name'];

                                    $assetid = $client['asset_id'];
                                    if ($client['client_status'] != 'tenant') {
                                        continue;
                                    }
                                    $assetinfo = $assets->fetchMainAsset($assetid);
                                    if ($assetinfo > 0) {
                                        $assetname = $assetinfo[0]['asset_name'];
                                    } else {
                                        $assetinfo = $assets->fetchSubAsset($assetid);
                                        if ($assetinfo > 0) {
                                            $assetname = $assetinfo['sub_name'];
                                        }
                                    }
                                    $clientstate = $client['client_state'];
                                    if ($clientstate == 1) {
                                        $client_State = 'Active';
                                    } elseif ($clientstate == 0) {
                                        $client_State = 'Expired';
                                    }
                            ?>
                                    <tr>
                                        <td><?php echo $clientname; ?></td>
                                        <td><?php echo $assetname; ?></td>
                                        <td><?php echo $client_State; ?></td>
                                        <td>
                                            <button class="btn btn-small bg-warning">
                                                <a href="dashboard.php?clients=update-client&id=<?php echo $clientid; ?>">Edit</a>
                                            </button>
                                            <button class="btn btn-small bg-warning">X</button>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {

                                ?>
                                <h4 class="text-center text-muted">No Client data to show!</h4>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- table card ends here -->
    <!-- Table for Tenants ends here-->

    <!-- Table for Buyers starts here-->
    <div class="col-12 col-md-12 d-flex border-0"><!-- Table card starts here -->
        <div class="card border-0 flex-fill">
            <div class="card-header">
                <div class="row">
                    <div class="col-6 align-self-start">
                        <h5 class="card-title">
                            Buyers
                        </h5>
                        <h6 class="card-subtitle text-muted">
                            All your buyers
                        </h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Client Name</th>
                                <th>Asset</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $clientinfo = $clients->fetchClients($userid);
                            if ($clientinfo > 0) {
                                foreach ($clientinfo as $client) {
                                    $clientid = $client['client_id'];
                                    $clientname = $client['first_name'] .' '. $client['last_name'];

                                    $assetid = $client['asset_id'];
                                    if ($client['client_status'] != 'buyer') {
                                        continue;
                                    }
                                    $assetinfo = $assets->fetchMainAsset($assetid);
                                    if ($assetinfo > 0) {
                                        $assetname = $assetinfo[0]['asset_name'];
                                    } else {
                                        $assetinfo = $assets->fetchSubAsset($assetid);
                                        if ($assetinfo > 0) {
                                            $assetname = $assetinfo['sub_name'];
                                        }
                                    }
                                    $clientstate = $client['client_state'];
                                    if ($clientstate == 1) {
                                        $client_State = 'Active';
                                    } elseif ($clientstate == 0) {
                                        $client_State = 'Expired';
                                    }
                            ?>
                                    <tr>
                                        <td><?php echo $clientname; ?></td>
                                        <td><?php echo $assetname; ?></td>
                                        <td><?php echo $client_State; ?></td>
                                        <td>
                                            <button class="btn btn-small bg-warning">
                                                <a href="dashboard.php?clients=update-client&id=<?php echo $clientid; ?>">Edit</a>
                                            </button>
                                            <button class="btn btn-small bg-warning">X</button>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {

                                ?>
                                <h4 class="text-center text-muted">No Client data to show!</h4>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- table card ends here -->
    <!-- Table for Buyers ends here-->

<?php
endif;
?>