<?php if(isset($_GET["dashboard"]) || isset($_GET['profile']) || isset($_GET['change_password']) || isset($_GET['assets']) || isset($_GET['clients'])) : ?>
  <!-- navbar for dashboard starts -->
  <nav class="navbar navbar-expand px-3 border-bottom">
    <button class="btn" id="sidebar-toggle" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse navbar">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
            <img src="<?= $profile_photo; ?>" class="avatar img-fluid rounded" alt="profile-photo"/>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a href="<?= base_url('dashboard.php?dashboard'); ?>" class="dropdown-item">Dashboard</a>
            <a href="<?= base_url('dashboard.php?profile'); ?>" class="dropdown-item">Settings</a>
            <a href="<?php base_url('includes/logout.inc.php'); ?>" class="dropdown-item">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- navbar for dashboard ends -->
<?php else : ?>
<!-- Default navbar starts -->
  <nav class="navbar navbar-expand px-3 border-bottom">
    <a href="<?php base_url('index.php'); ?>" class="navbar-brand">
      CribsLot
    </a>
    <button id="sidebar-toggle" style="display:none;"></button>
    <?php if(isset($_SESSION['authenticated'])) : ?>
      <div class="navbar-collapse navbar">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
            <?php if ($profile_photo == NULL) :?>
            <img src="assets/images/profile_picture.png" class="avatar img-fluid rounded" alt="profile-photo"/>
            <?php else :?>
            <img src="<?= $profile_photo; ?>" class="avatar img-fluid rounded" alt="profile-photo"/>
            <?php endif; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a href="<?= base_url('dashboard.php?dashboard'); ?>" class="dropdown-item">Dashboard</a>
            <a href="<?= base_url('dashboard.php?profile'); ?>" class="dropdown-item">Settings</a>
            <a href="<?php base_url('includes/logout.inc.php'); ?>" class="dropdown-item">Logout</a>
          </div>
        </li>
      </ul>
    </div>
    <?php else : ?>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a href="<?php base_url('login.php'); ?>" class="nav-link">Login</a>
      </li>
      <li class="nav-item">
        <a href="<?php base_url('signup.php'); ?>" class="nav-link">Sing Up</a>
      </li>
    </ul>
    <?php endif;?>
  </nav>
  <?php endif; ?>
<!-- Default navbar ends -->

