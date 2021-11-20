<?php defined('DB_HOST') or die; 
$where=" WHERE status='1' ";
?>
<footer class="footer" dir="rtl">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="widget">
                            <div class="footer-text text-right">
                                <a href="<?php print SITE_URL; ?>">AppName</a>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore, sint. Ut in, harum possimus mollitia fuga, odit dolore libero rerum alias. Reprehenderit aut aspernatur magnam deleniti porro, libero culpa accusantium?</p>
                                <div class="social">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>

                                <hr class="invis">

                                <!-- <div class="newsletter-widget text-left">
                                    <form class="form-inline">
                                        <input type="text" class="form-control" placeholder="Enter your email address">
                                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    </form>
                                </div> end newsletter -->
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <!-- <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">دسته بندی های محبوب</h2>
                            <div class="link-widget">
                                <ul> -->
                                    <?php 
                                    // $getCategories=$frontend->getGroupsList();
                                    // $getcat2=$getCat['title'];
                                    // while($getCat=$frontend->getRow($getCategories)) {
                                        
                                        ?>
                                        <!-- <li><a href="#"> --><!-- <?php print $getCat['title']; ?> --><!-- </a></li> -->

                                        <?php

                                    // }

                                    ?>
                                    <!-- 
                                </ul>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <!-- <h2 class="widget-title">Copyrights</h2> -->
                            <div class="link-widget">
                                <ul>
                                    <li><a href="#">درباره ما</a></li>
                                    <li><a href="#">تبلیغات</a></li>
                                    <li><a href="#">برای ما بنویسید</a></li>
                                    <li><a href="#">علامت تجاری</a></li>
                                    <li><a href="#">مجوز و راهنما</a></li>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <div class="copyright">Copyright 2021 &copy;</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->