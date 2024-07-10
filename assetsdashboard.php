<?php
include "config/app.php";

include 'includes/header.inc.php';
?>

<div class="wrapper">
    <!-- include sidebar -->
    <?php include 'includes/sidebar.inc.php'; ?>
    <div class="main">
        <!-- include navbar -->
        <?php include 'includes/navbar.inc.php'; ?>
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    <h4>Assets Dashboard</h4>
                </div>
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
                                    <div class="col-6 align-self-end ms-auto">
                                        
                                        <button type="button" class="btn btn-success btn-sm"><a>Upload</a></button>
                                        <button type="button" class="btn btn-primary btn-sm"><a>View All</a></button>
                                        
                                        <img src="" class="img-fluid illustration-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Table Element -->
                <div class="col-12 col-md-12 d-flex border-0"><!-- Table cared starts here -->
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
            </div>
        </main>
        <a href="#" class="theme-toggle">
            <i class="fa-regular fa-moon"></i>
            <i class="fa-regular fa-sun"></i>
        </a>
    </div>
</div>
<!-- theme toggle effect -->
<a href="#" class="theme-toggle">
            <i class="fa-regular fa-moon"></i>
            <i class="fa-regular fa-sun"></i>
        </a>
<?php
    include("includes/footer.inc.php");
?>