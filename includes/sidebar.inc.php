<aside id="sidebar">
    <!-- Content for sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="index.php">CribsLot</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Admin Elements
            </li>
            <li class="sidebar-nav">
                <a href="dashboard.php?dashboard" class="sidebar-link">
                    <i class="fa-solid fa-list"></i>
                    Dashboard 
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#assets" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="fa-solid fa-building-user"></i>
                    Assets
                </a>
                <ul id="assets" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="dashboard.php?assets=upload-main-asset" class="sidebar-link">Upload Main Asset</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="dashboard.php?assets=upload-sub-asset" class="sidebar-link">Upload Sub Asset</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="dashboard.php?assets" class="sidebar-link">View All Asset</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#clients" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                    Clients
                </a>
                <ul id="clients" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="dashboard.php?clients=add-tenant" class="sidebar-link">Add Client</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="dashboard.php?clients" class="sidebar-link">Manage Clients</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-file-lines"></i>
                    Lease Agreements
                </a>
            </li>
        </ul>
    </div>
</aside>