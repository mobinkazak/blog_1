<?php
    defined('DB_HOST') or die;
    $profile=$backend->getProfile();
?>
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php print ADMIN_URL; ?>" class="nav-link">خانه</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">تماس</a>
        </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <img class="brand-image rounded-circle elevation-1 mt-0" style="cursor:pointer;" src="<?php print SITE_URL.'/avatars/'.$profile['avatar']; ?>" data-toggle="dropdown" alt="user_avatar">
            <!-- <a class="nav-link" data-toggle="dropdown" href="#"><b><?php //print $profile['first_name'].' '.$profile['last_name']; ?></b></a> -->
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left text-right p-1" style="width: 200px;border-radius: 6px;">
                <span class="dropdown-item dropdown-header text-center" style="border-radius: 3px;background-color:rgb(52 58 64);"><b><p class="text-white"><?php print $profile['first_name'].' '.$profile['last_name']; ?></p></b></span>
                <a href="<?php print ADMIN_URL; ?>/profile.php" class="dropdown-item">مشخصات</a>
                <div class="dropdown-divider"></div>
                <a href="?logout=1" class="dropdown-item">خروج</a>
            </div>
        </li>
    </ul>
</nav>