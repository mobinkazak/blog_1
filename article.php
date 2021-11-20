<?php require_once 'init.php';
$pid=$frontend->toInt($frontend->get('pid'));

$article=$frontend->getArticle($pid);
$getCat=$frontend->getGroup($article['cat_id']);
$url=$frontend->createSeoUrl("articles/$article[id]/$article[title]/");
// if ($frontend->post('btn_comment')) {
// $name=$frontend->safeString($frontend->post('name'));
// $email=$frontend->safeString($frontend->post('email'));
// $comment=$frontend->safeString($frontend->post('comment'));
// if ($name!='' || $comment!='') {
// $frontend->insertComment($article['id'],$name,$comment,$email);
// }
// }
?>
<!DOCTYPE html>
<html lang="en">

 <!-- Basic -->
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <base href="<?php print SITE_URL; ?>">
 <link rel="canonical" href="<?php print $url; ?>">
 <!-- Mobile Metas -->
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Site Metas -->
 <title><?php print $article['title']; ?></title>
 <meta name="keywords" content="<?php print $article['seo_keywords']; ?>">
 <meta name="description" content="<?php print $article['seo_desc'] ?>">
 <meta name="author" content="">

 <!-- Site Icons -->
 <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
 <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

 <!-- Bootstrap core CSS -->
 <link href="css/bootstrap.css" rel="stylesheet">
 <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
 <!-- FontAwesome Icons core CSS -->
 <link href="css/font-awesome.min.css" rel="stylesheet">
 <!-- Custom styles for this template -->
 <link href="css/style2.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
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
  <section class="section single-wrapper">
   <div class="container">
    <div class="row">
     <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
      <?php $frontend->setAlert('1','success','نظر شما با موفقیت ارسال شد'); ?>
      <div class="page-wrapper">
       <div class="blog-title-area text-center">
        <ol class="breadcrumb hidden-xs-down">
         <li class="breadcrumb-item"><a href="<?php print SITE_URL; ?>">صفحه اصلی</a></li>
         <li class="breadcrumb-item active"><?php print $article['title'] ?></li>
        </ol>
        <span class="color-orange"><a href="<?php print SITE_URL."articles.php?cid=$getCat[id]"; ?>" title=""><?php print $getCat['title'] ?></a></span>
        <h3><?php print $article['title']; ?></h3>
        <div class="blog-meta big-meta">
         <small><?php print $frontend->persianDate($article['created_date_time'],',') ?></small>
         <!-- <small><a href="tech-author.html" title="">by Jessica</a></small> -->
         <!-- <small><a href="#" title=""><i class="fa fa-eye"></i> --><!--  <?php print $article['count_view']; ?> --><!-- </a></small> -->
         </div><!-- end meta -->
         <!-- <div class="post-sharing">
          <ul class="list-inline">
           <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
           <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
           <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
          </ul>
          </div> --><!-- end post-sharing -->
          </div><!-- end title -->
          <div class="single-post-media">
           <img src="<?php print $article['tiny_image']; ?>" alt="<?php print $article['title']; ?>" class="img-fluid">
           </div><!-- end media -->
           <div class="blog-content">
            <div class="pp">
             <h3><strong><?php print $article['short_desc']; ?></strong></h3>
             <p><?php print html_entity_decode($article['long_desc'],ENT_QUOTES,'UTF-8'); ?></p>
             </div><!-- end pp -->
             </div><!-- end content -->
             <!-- <div class="blog-title-area"> -->
              <!-- <div class="tag-cloud-single">
               <span>Tags</span>
               <small><a href="#" title="">lifestyle</a></small>
               <small><a href="#" title="">colorful</a></small>
               <small><a href="#" title="">trending</a></small>
               <small><a href="#" title="">another tag</a></small>
               </div  -->
               <!-- <div class="post-sharing text-right">
                <ul class="list-inline">
                 <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                 <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                 <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                </ul>
                </div> --><!-- end post-sharing -->
                <!-- </div> --><!-- end title -->
                <!-- <hr class="invis1">
                <div class="custombox authorbox clearfix">
                 <h4 class="small-title">درباره نویسنده</h4>
                 <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                   <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle">
                   </div>
                   <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <h4><a href="#">Jessica</a></h4>
                    <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Tech Blog!</p>
                    <div class="topsocial">
                     <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                     <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                     <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                     <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                     <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                     <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                     </div>
                     </div>
                     </div>
                     </div> -->

                     <hr class="invis1" id="cmt-list">
                     <div class="custombox clearfix">
                      <h4 class="small-title">
                      نظرات
                      </h4>
                      <div class="row">
                       <div class="col-lg-12">
                        <?php
                        $getPostsComment=$frontend->getPostsComment($article['id'],3);
                        if ($getPostsComment->num_rows>0) {
                            ?>
                        <div class="comments-list">
                            <?php
                            while ($getComment=$frontend->getRow($getPostsComment)) {
                            ?>
                            <div class="media">
                                <!-- <a class="media-left" href="#">
                                    <img src="upload/author.jpg" alt="" class="rounded-circle">
                                </a> -->
                                <div class="media-body">
                                    <h4 class="media-heading user_name ml-3 float-right"><?php print $getComment['name']; ?></h4>
                                    <small class="pl-0 clearfix"><?php print $frontend->persianDate($getComment['created_date_time']); ?></small>
                                    <p><?php print $getComment['comment'] ?></p>
                                    <!-- <a href="#" class="btn btn-primary btn-sm">Reply</a> -->
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                        </div>
                        <button id="btn_more" class="btn btn-info col-md-12" style="height: 30px;opacity:0.8;cursor: pointer;">نظرات بیشتر</button>
                    <?php }else{
                        ?>
                        <p>در این مقاله نظری ثبت نشده است</p>
                        <h6>نظرات خود را از طریق بخش <ثبت نظرات> برای ما بنویسید</h6>
                        <?php

                        } ?>

                        </div><!-- end col -->
                        </div><!-- end row -->
                        </div><!-- end custom-box -->
                        <hr class="invis1">
                        <div class="custombox clearfix">
                         <h4 class="small-title">ثبت نظرات</h4>
                         <div class="row">
                          <div class="col-lg-12">
                           <form action="" method="post" class="form-wrapper">
                            <input type="text" name="name" id="name" class="form-control" placeholder="نام و نام خانوادگی">
                            <input type="text" name="email" id="email" class="form-control" placeholder="ایمیل">
                            <input type="hidden" name="id" id="id" data-id="<?php print $article['id']; ?>" >
                            <textarea class="form-control" id="comment" name="comment" placeholder="نظرات خود را اینجا بنویسید"></textarea>
                            <button type="button" id="btn_comment" name="btn_comment" class="btn btn-primary">ارسال</button>
                            <img src="images/preloader.gif" width="120px" height="100px" id="loader" style="display: none;">
                           </form>
                          </div>
                         </div>
                        </div>
                       </div>
                       <!-- end page-wrapper -->
                      </div>
                      <!-- end col -->
                      <!-- sidebar -->
                      <?php require_once 'template/sidebar.php'; ?>
                      <!-- end sidebar -->
                      </div><!-- end row -->
                      </div><!-- end container -->
                     </section>
                     <?php require_once 'template/footer.php'; ?>

                     </div><!-- end wrapper -->
                     <script src="js/jquery-3.6.0.min.js"></script>
                     <script src="js/tether.min.js"></script>
                     <script src="js/bootstrap.min.js"></script>
                     <script src="js/custom.js"></script>
                     <script src="js/app.js"></script>
                     <script>
                         $(document).ready(function(){

                            var commentCount=3;
                            $(document).on('click','#btn_more',function(){
                                commentCount=commentCount+2;
                                $('.comments-list').load("ajax.php",{
                                    newCommentCount:commentCount,
                                    id:$('#id').attr('data-id')

                                });
                            });

                            $('#btn_comment').click(function(){
                                var name=$('#name');
                                var email=$('#email');
                                var comment=$('#comment');
                                if(name.val() == ''){
                                    name.focus();
                                    name.css('border','1px solid red');

                                }else if(comment.val()==''){
                                    comment.focus();
                                    comment.css('border','1px solid red');


                                }else{
                                  $.ajax({
                                    type:'POST',
                                    url:'ajax.php',
                                    data:{
                                      name:name.val(),
                                      email:email.val(),
                                      comment:comment.val(),
                                      id:$('#id').attr('data-id'),
                                    },
                                    beforeSend:function(){
                                      $("#loader").show();
                                    },
                                    success:function(data){
                                      $("#loader").hide();
                                      setInterval('location.reload()', 500);
                                      $('html, body').animate({scrollTop: $("#cmt-list").offset().top}, 1000);
                                    }
                                  });
                                }
                            });


                          });

                     </script>
                    </body>
                   </html>