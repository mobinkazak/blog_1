<?php defined('DB_HOST') or die; 



?>
<div class="mt-2 col-lg-3 col-md-12 col-sm-12 col-xs-12">
   <form action="search.php" method="get">
      <div class="input-group input-group-sm" style="width: 100%;">
         <input value="<?php print $title; ?>" type="text" name="title" class="form-control float-right" placeholder="جستجو">
         <div class="input-group-append">
            <button type="submit" value="1" class="btn btn-default"><i class="fa fa-search"></i></button>
         </div>
      </div>
   </form>
   <div class="sidebar">
      <div class="widget mt-4">
         <h2 class="widget-title">دسته بندی ها</h2>
         <div class="blog-list-widget">
            <?php 
            $resultMainGroups=$frontend->getGroupsList();
            while ($mainGroups=$frontend->getRow($resultMainGroups)) 
            {
               $resultSubGroups=$frontend->getGroupsList($mainGroups['id']);
               $iconGroup=($resultSubGroups->num_rows>0) ? '<i class="pl-2 fa fa-plus open-menu" data-child="1" style="font-size: 14px;color:#ff6347;"></i>' : '<i class="pl-2 fa fa-minus close-menu" data-child="0" style="font-size: 14px;color:#ff6347;"></i>';
               $activeMainGroup=($c==$mainGroups['id'])? 'active': '';;

             ?>
            <div class="list-group <?php print $activeMainGroup; ?>" style="border-bottom: 1px solid #ddd;margin-top:13px;">
               <span class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="w-100 justify-content-between" style="height:35px;">
                     <p class="text-white bg-primary float-left" style="font-size: 13px;padding:0 6px ;border-radius: 5px;"><?php print $frontend->getCountArticle($mainGroups['id']) ?></p>
                     <div class="float-right">
                        <?php print $iconGroup; ?>
                     </div>
                     <a class="a-text" style="font-weight: 100;color:#444;" href="search.php?c=<?php print $mainGroups['id'].'&s='.$s.'&title='.$title; ?>" ><?php print $mainGroups['title']; ?></a>
                  </div>
                  <?php 
                  if ($resultSubGroups->num_rows > 0) {
                     while ($subGroups=$frontend->getRow($resultSubGroups)) {

                  ?>
                     <div class="my-0 px-2 p-child <?php ($s==$subGroups['id'])?print 'active2':''; ?>" <?php ($activeMainGroup != '')? print 'style="display:block;"':print ''; ?> >
                        <span href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                           <div class="w-100 justify-content-between" style="height:35px;">
                              <p class="text-white bg-orange float-left ml-2" style="margin-top:5px;font-size: 13px;padding:0 6px ;border-radius: 5px;"><?php print $frontend->getCountArticle($mainGroups['id'],$subGroups['id']) ?></p>
                              <a class="b-text" href="search.php?c=<?php print $mainGroups['id'].'&s='.$subGroups['id'].'&title='.$title; ?>" class="nav-link title-text mb-1 pr-3" style="line-height: 37px;color:#777"><?php print $subGroups['title'];  ?></a>
                           </div>
                        </span>
                     </div>


                  <?php 
                  }
               } ?>
               </span>
            </div>

            <?php 
            }

             ?>


         </div><!-- end blog-list -->
      </div>
            
            <!-- <div class="widget">
               <h2 class="widget-title">Popular Posts</h2>
               <div class="blog-list-widget">
                  <div class="list-group">
                     <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                           <img src="upload/tech_blog_08.jpg" alt="" class="img-fluid float-left">
                           <h5 class="mb-1">5 Beautiful buildings you need..</h5>
                           <small>12 Jan, 2016</small>
                        </div>
                     </a>
                     <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                           <img src="upload/tech_blog_01.jpg" alt="" class="img-fluid float-left">
                           <h5 class="mb-1">Let's make an introduction for..</h5>
                           <small>11 Jan, 2016</small>
                        </div>
                     </a>
                     <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 last-item justify-content-between">
                           <img src="upload/tech_blog_03.jpg" alt="" class="img-fluid float-left">
                           <h5 class="mb-1">Did you see the most beautiful..</h5>
                           <small>07 Jan, 2016</small>
                        </div>
                     </a>
                  </div>
                  </div>
                  </div> -->
                  
                     </div><!-- end sidebar -->
                     </div><!-- end col -->