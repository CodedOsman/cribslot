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
                <a href="assetsdashboard.php?assets" class="sidebar-link collapsed">
                    <i class="fa-solid fa-building-user"></i>
                    Assets
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                    Clients
                </a>
                <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Tenants</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Buyers</a>
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