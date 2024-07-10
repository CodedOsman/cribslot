<?php
include("config/app.php");
include("classes/dbh.class.php");
include("classes/userdash.class.php");
include("classes/dashview.class.php");
include("classes/assets.class.php");
include("classes/assetsview.class.php");
$profile_info = new DashView();
$assets = new AssetView();
$dob = $profile_info->fetchDob($_SESSION['auth_user']['user_id']);

include("includes/header.inc.php");
?>
<div class="wrapper">
    <!-- including the sidebar -->
    <?php include_once 'includes/sidebar.inc.php'; ?>
    <div class="main">
        <?php include "includes/navbar.inc.php"; ?>
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    <?php if(isset($_GET['dashboard'])) :?>
                    <h4>User Dashboard</h4>
                    <?php elseif(isset($_GET['profile']) || isset($_GET['change_password'])  ) :?>
                    <h4>Settings Dashboard</h4>
                    <?php elseif(isset($_GET['assets'])) :?>
                    <h4>Assets Dashboard</h4>
                    <?php endif; ?>
                </div>
                <?php if(isset($_GET['profile']) || isset($_GET['change_password'])) : ?>
                    <?php include_once 'profile.php'; else : ?>
                <div class="row">
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0 illustration">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="col-6">
                                        <div class="p-3 m-1">
                                            <h4>Welcome Back, <?php $profile_info->fetchName($_SESSION['auth_user']['user_id']); ?></h4>
                                            <p class="mb-0">User Dashboard, Cribslot</p>
                                        </div>
                                    </div> 
                                    <div class="col-6 align-self-end text-end">
                                        <img src="" class="img-fluid illustration-img" alt="">
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
                                                            Total Assets 
                                                            <span class="badge rounded-pill bg-info">0</span>
                                                        </p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <p class="mb-2">
                                                            Listed
                                                            <span class="badge rounded-pill bg-success">0</span>
                                                        </p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <p class="mb-2">
                                                            Not Listed
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
                </div> <!-- end or row -->
                <div class="row"><!-- row for properties and tenants -->
                    <!--Table Element -->
                    <div class="col-12 col-md-8 d-flex border-0"><!-- Table cared starts here -->
                        <div class="card border-0 flex-fill">
                            <div class="card-header">
                                <h5 class="card-title">
                                    Assets
                                </h5>
                                <h6 class="card-subtitle text-muted">
                                    All your assets
                                </h6>
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
                                            <tr>
                                                <td>First Room</td>
                                                <td>Residential</td>
                                                <td>
                                                    <span class="badge rounded-pill bg-secondary">0</span>
                                                    <a href="#">View all</a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm">List</button>
                                                    <button type="button" class="btn btn-secondary btn-sm">Unlist</button>
                                                    <button type="button" class="btn btn-danger btn-sm">X</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- table card ends here -->
                    <div class="col-12 col-md-4 d-flex border-0 ms-auto"><!-- tenants card starts here -->
                        <div class="card border-0 flex-fill">
                            <div class="card-header">
                                <h5 class="card-title">
                                    Tenants
                                </h5>
                                <h6 class="card-subtitle text-muted">
                                    Recent Tenants
                                </h6>
                            </div>
                            <div class="card-body">
                                <h5>Tenant 1</h5>
                            </div>
                        </div>
                        
                    </div><!-- tenants card ends here -->
                </div><!-- content row ends here -->
                <?php endif; ?>
            </div>
        </main>
        <!-- theme toggle effect -->
        <a href="#" class="theme-toggle">
            <i class="fa-regular fa-moon"></i>
            <i class="fa-regular fa-sun"></i>
        </a>
    <?php
        include("includes/footer.inc.php");
    ?>
