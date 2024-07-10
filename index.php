<?php
    include('config/app.php');

    include("includes/header.inc.php");
?>
<div class="main">
    <?php include("includes/navbar.inc.php"); ?>
    <div class="py-5">
        <div class="container">
            <?php include('message.php'); ?>
            <h5>Home Page!</h5>
        </div>
    </div>
    <a href="#" class="theme-toggle">
        <i class="fa-regular fa-moon"></i>
        <i class="fa-regular fa-sun"></i>
    </a>
</div>
<?php
    include("includes/footer.inc.php");
?>