<?php require_once 'init.php';
?>
<!DOCTYPE html>
<html lang="en">
  <!-- Basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Site Metas -->
  <title>صفحه اصلی</title>
  <!-- Site Icons -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <!-- Bootstrap core CSS -->
  <!-- <link href="css/bootstrap-rtl.min.css" rel="stylesheet"> -->
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
    <section class="section first-section">
      <div class="container-fluid">
        <div class="masonry-blog clearfix" style="direction: rtl;">
          <?php
          $getLastArticle=$frontend->getLastArticle(2);
          while ($articles=$frontend->getRow($getLastArticle)) {
          $getCat=$frontend->getGroup($articles['cat_id']);
          $url1=$frontend->createSeoUrl("articles/$articles[id]/$articles[title]/");
          ?>
          <div class="first-slot">
            <div class="masonry-box post-media">
              <img src="<?php print $articles['tiny_image'] ?>" alt="<?php print $articles['title']; ?>" class="img-fluid">
              <div class="shadoweffect">
                <div class="shadow-desc">
                  <div class="blog-meta">
                    <span class="bg-orange"><a target="blank" href="articles.php?cid=<?php print $articles['cat_id']; ?>" title=""><?php print $getCat['title']; ?></a></span>
                    <h4><a href="<?php print $url1; ?>" title=""><?php print $articles['title']; ?></a></h4>
                    <small><a href="javascript:void(0);" title=""><?php print $frontend->persianDate($articles['created_date_time'],'/'); ?></a></small>
                    <!-- <small><a href="tech-author.html" title="">by Amanda</a></small> -->
                    </div><!-- end meta -->
                    </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                    </div><!-- end post-media -->
                    </div><!-- end first-side -->
                    <?php } ?>
                    </div><!-- end masonry -->
                  </div>
                </section>
                <div class="container">
                  <div class="col-md-12" style="direction: rtl;">
                    
                  </div>
                </div>
                <section class="section">
                  <div class="container">
                    
                    <div class="row">
                      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                          <div class="blog-list clearfix">
                            <?php
                            $getLastArticle=$frontend->getLastArticle(3);
                            if ($getLastArticle->num_rows>0) {
                              while ($articles=$frontend->getRow($getLastArticle)) {
                              $getCat=$frontend->getGroup($articles['cat_id']);
                              $url2=$frontend->createSeoUrl("articles/$articles[id]/$articles[title]/");
                              ?>
                              <div class="blog-box row">
                                <div class="col-md-4">
                                  <div class="post-media">
                                    <a href="<?php print $url2; ?>" title="<?php print $articles['title']; ?>">
                                      <img src="<?php print $articles['tiny_image']; ?>" alt="<?php print $articles['title']; ?>" class="img-fluid">
                                      <div class="hovereffect"></div>
                                    </a>
                                    </div><!-- end media -->
                                    </div><!-- end col -->
                                    
                                    <div class="blog-meta big-meta col-md-8">
                                      <h4><a href="<?php print $url2; ?>" title=""><?php print $articles['title']; ?></a></h4>
                                      <p><?php print $articles['short_desc']; ?></p>
                                      <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">
                                        <?php print $getCat['title']; ?>
                                      </a></small>
                                      <small><?php print $frontend->persianDate($articles['created_date_time'],'-') ?></small>
                                      <!-- <small><a href="tech-author.html" title="">by Matilda</a></small> -->
                                      <!-- <small><a href="javascript:void(0);" title=""><i class="fa fa-eye"></i> --> <!-- <?php print $articles['count_view']; ?> --><!-- </a></small> -->
                                    </div>
                                    <!-- end meta -->
                                  </div>
                                  <!-- end blog-box -->
                                  <hr class="invis0">
                                  <?php
                                  }
                                ?>
                                <button id="btn_more" class="btn btn-info col-md-12" style="height: 30px;opacity:0.8;cursor: pointer;">مقالات بیشتر</button>
                                <?php 
                                }else{
                                  ?>
                                  <div class="alert alert-warning">هیچ مقاله ای در حال حاضر ثبت نشده است</div>
                                  <?php
                                }
                                ?>
                                
                                
                                </div><!-- end blog-list -->
                                </div><!-- end page-wrapper -->
                                </div><!-- end col -->
                                <!-- sidebar -->
                                <?php require_once 'template/sidebar.php'; ?>
                                <!-- end sidebar -->
                                </div><!-- end row -->
                                </div><!-- end container -->
                              </section>
                              <?php require_once 'template/footer.php'; ?>
                              <div class="dmtop">Scroll to Top</div>
                              
                              </div><!-- end wrapper -->
                              <!-- Core JavaScript
                              ================================================== -->
                              <script src="js/jquery-3.6.0.min.js"></script>
                              <script src="js/tether.min.js"></script>
                              <script src="js/bootstrap.min.js"></script>
                              <script src="js/custom.js"></script>
                              <script src="js/app.js"></script>
                              
                              <script>
                              $(document).ready(function(){
                                var articleCount=3;
                                $(document).on('click','#btn_more',function(){
                                articleCount=articleCount+1;
                                  $('.blog-list').load("ajax.php",{
                                  newArticleCount:articleCount,
                                  // id:$('#id').attr('data-id')
                                  });
                                });
                              });
                              </script>
                            </body>
                          </html>