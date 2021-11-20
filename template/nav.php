<?php defined('DB_HOST') or die;
$currentPage=basename($_SERVER['PHP_SELF']);



?>
<header class="tech-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php print SITE_URL; ?>">Blog</a>
            <div class="collapse navbar-collapse" id="navbarCollapse" dir="rtl">
                <ul class="navbar-nav">
                    <li class="nav-item <?php ($currentPage=='index.php')?print 'active3':print ''; ?>">
                        <a class=" nav-link" href="<?php print SITE_URL; ?>">صفحه اصلی</a>
                    </li>
                    <li class="<?php ($currentPage=='articles.php')?print 'active3':print ''; ?> nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                        <a class="nav-link dropdown-toggle " href="javascript:void(0);" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">مقالات</a>

                        <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">

                            <li>
                                <div class="container d-flex justify-content-center bg-orange" style="border-radius:5px;">
                                    <?php
                                    $resultMainGroups=$frontend->getGroupsList();
                                    while ($mainGroup=$frontend->getRow($resultMainGroups)) {
                                    ?>
                                    <a href="articles.php?cid=<?php print $mainGroup['id']; ?>&page=1" class="<?php ($cid==$mainGroup['id'])?print 'border_1' :print ''; ?> a_hover nav-link"><?php print $mainGroup['title']; ?></a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">تماس با ما</a>
                    </li>
                </ul>
                
            </div>
        </nav>
        </div><!-- end container-fluid -->
    </header>