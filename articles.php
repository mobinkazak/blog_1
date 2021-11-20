<?php require_once 'init.php';
$getCat=$frontend->getGroup($cid);
// $articles=$frontend->getList('articles',$where,6);

$articles=$frontend->getArticlesWithCatId($cid,6);
$articleRes=$articles['result'];

if (!$cid) {
  $frontend->redirect('index.php');
}


?>
<!DOCTYPE html>
<html lang="en">
  <!-- Basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Site Metas -->
  <title>مقالات <?php print $getCat['title']; ?></title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <!-- Site Icons -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- FontAwesome Icons core CSS -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style2.css" rel="stylesheet">
  <!-- Responsive styles for this template -->
  <link href="css/responsive.css" rel="stylesheet">
  <!-- Colors for this template -->
  <link href="css/colors.css" rel="stylesheet">
  <!-- Version Tech CSS for this template -->
  <link href="css/version/tech.css" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <div id="wrapper">
    <?php require_once 'template/nav.php'; ?>
    
    <div class="page-title lb single-wrapper" dir="rtl">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 text-center">
            <h1>مقالات <?php print $getCat['title']; ?></h1>
            </div><!-- end col -->
            </div><!-- end row -->
            </div><!-- end container -->
            </div><!-- end page-title -->
            <section class="section">
              <div class="container">
                <div class="row">
                  <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                      <div class="blog-grid-system">
                        <div class="row">
                          <?php
                          if ($articleRes->num_rows==0) {
                            ?>

                            <div class="col-md-12 alert alert-warning">چیزی در مقالات
                            <span class="bg-orange text-white p-1" style="border-radius: 5px;"><?php print $getCat['title']; ?></span>
                          یافت نشد</div>

                            <?php
                          }else{
                            while ($articleRow=$frontend->getRow($articleRes)) {
                            $url1=$frontend->createSeoUrl("articles/$articleRow[id]/$articleRow[title]/");
                            ?>
                            <div class="col-md-6">
                              <div class="blog-box">
                                <div class="post-media">
                                  <a href="<?php print $url1; ?>" title="">
                                    <img src="<?php print $articleRow['tiny_image']; ?>" alt="<?php print $articleRow['title'] ?>" class="img-fluid">
                                    <div class="hovereffect">
                                      <span></span>
                                      </div><!-- end hover -->
                                    </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta big-meta">
                                      <h4><a href="<?php print $url1; ?>" title=""><?php print $articleRow['title'] ?></a></h4>
                                      <p><?php print $articleRow['short_desc'] ?></p>
                                      <small><a href="javascript:void(0);" title=""><?php print $frontend->persianDate($articleRow['created_date_time']); ?></a></small>
                                      <!-- <small><a href="tech-author.html" title="">by Jack</a></small> -->
                                      <!-- <small><a href="javascript:void(0);" title=""><i class="fa fa-eye"></i> --><!-- <?php print $articleRow['count_view']; ?> --><!-- </a></small> -->
                                      </div><!-- end meta -->
                                      </div><!-- end blog-box -->
                                      </div><!-- end col -->
                                      <?php
                                      }
                                      ?>
                                        <?php
                                        $url1="?cid=$cid";
                                        ?>
                                        <div class="mx-auto">
                                     <?php $frontend->pagination($url1,$articles['totalPage']); ?>
                                        </div>
                                        <?php
                                      }
                                        ?>
                                    </div><!-- end blog-grid-system -->
                                    </div><!-- end page-wrapper -->
                                  </div><!-- end col -->
                                </div><!-- end row -->
                                  <?php require_once 'template/sidebar.php'; ?>
                                    
                                        
                                </div><!-- end container -->
                              </section>

                                      <?php require_once 'template/footer.php'; ?>
                                      <!-- end footer -->
                                      <div class="dmtop">Scroll to Top</div>
                                      
                                      </div><!-- end wrapper -->
                                      <!-- Core JavaScript
                                      ================================================== -->
                                      <script src="js/jquery-3.6.0.min.js"></script>
                                      <script src="js/tether.min.js"></script>
                                      <script src="js/bootstrap.min.js"></script>
                                      <script src="js/custom.js"></script>
                                      <script src="js/app.js"></script>
                                      
                                    </body>
                                  </html>