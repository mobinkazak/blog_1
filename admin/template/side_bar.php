<?php
    defined('DB_HOST') or die;
    $profile=$backend->getProfile();
    $menuHandler=$backend->menuHandler('menu-open',['edit_group.php','add_group.php','list_group.php','edit_article.php','add_article.php','list_article.php']);
    $currentPage=basename($_SERVER['PHP_SELF']);

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php print ADMIN_URL; ?>" class="brand-link">
        <img src="<?php print ADMIN_URL ?>/img/logo.png" alt="App Logo" class="brand-image img-circle elevation-3 ml-0">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php print SITE_URL.'/avatars/'.$profile['avatar']; ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="javascript:void(0);" class="d-block"><?php print $profile['first_name'].' '.$profile['last_name']; ?></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?php print ADMIN_URL; ?>" class="nav-link <?php ($currentPage=='index.php')?print 'active' :print ''; ?> ">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>داشبورد</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview <?php print $menuHandler; ?>">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-icon fa fa-pie-chart"></i>
                            <p>
                                مدیریت دسته ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php print ADMIN_URL.'add_group.php'; ?>" class="nav-link <?php 
                                ($currentPage=='add_group.php')?print 'active':print ''; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>اضافه کردن</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link <?php ($currentPage=='edit_group.php')?print 'active':print ''; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ویرایش</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php print ADMIN_URL.'list_group.php?page=1'; ?>" class="nav-link <?php ($currentPage=='list_group.php')?print 'active':print ''; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>نمایش دسته ها</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview <?php print $menuHandler; ?>">
                        <a href="javascript:void(0);" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>مدیریت مقالات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php print ADMIN_URL.'add_article.php'; ?>" class="nav-link <?php 
                                ($currentPage=='add_article.php')?print 'active':print ''; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ثبت مقالات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link <?php ($currentPage=='edit_article.php')?print 'active':print ''; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ویرایش</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php print ADMIN_URL.'list_article.php?page=1'; ?>" class="nav-link <?php ($currentPage=='list_article.php')?print 'active':print ''; ?>">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست مقالات</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>