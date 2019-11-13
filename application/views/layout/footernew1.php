
<style>
.fff:hover
{
	color:#fff;
}

</style>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/rs-plugin/js/jquery.themepunch.tools.minedd7.js?vcart=7.2.4"></script>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/rs-plugin/js/jquery.themepunch.revolution.minedd7.js?vcart=7.2.4"></script>







<script type="text/javascript">







    jQuery(document).ready(function() {















        jQuery('.tp-banner').show().revolution(



                {



                    dottedOverlay:"none",



                    delay:16000,



                    startwidth:1170,



                    startheight:700,



                    hideThumbs:200,



                    hideTimerBar:"on",







                    thumbWidth:100,



                    thumbHeight:50,



                    thumbAmount:5,







                    navigationType:"none",



                    navigationArrows:"",



                    navigationStyle:"",







                    touchenabled:"on",



                    onHoverStop:"on",







                    swipe_velocity: 0.7,



                    swipe_min_touches: 1,



                    swipe_max_touches: 1,



                    drag_block_vertical: false,







                    parallax:"mouse",



                    parallaxBgFreeze:"on",



                    parallaxLevels:[7,4,3,2,5,4,3,2,1,0],







                    keyboardNavigation:"off",







                    navigationHAlign:"center",



                    navigationVAlign:"bottom",



                    navigationHOffset:0,



                    navigationVOffset:20,







                    soloArrowLeftHalign:"left",



                    soloArrowLeftValign:"center",



                    soloArrowLeftHOffset:20,



                    soloArrowLeftVOffset:0,







                    soloArrowRightHalign:"right",



                    soloArrowRightValign:"center",



                    soloArrowRightHOffset:20,



                    soloArrowRightVOffset:0,







                    shadow:0,



                    fullWidth:"off",



                    fullScreen:"on",







                    spinner:"",







                    stopLoop:"off",



                    stopAfterLoops:-1,



                    stopAtSlide:-1,







                    shuffle:"off",







                    autoHeight:"off",



                    forceFullWidth:"off",















                    hideThumbsOnMobile:"off",



                    hideNavDelayOnMobile:1500,



                    hideBulletsOnMobile:"off",



                    hideArrowsOnMobile:"off",



                    hideThumbsUnderResolution:0,







                    hideSliderAtLimit:0,



                    hideCaptionAtLimit:0,



                    hideAllCaptionAtLilmit:0,



                    startWithSlide:0,



                    fullScreenOffsetContainer: ".header"



                });



















    });	//ready







</script>



</div>



        </div>



    </section>







  <div class="clear"></div>







    <footer class="footer">



        



        <div class="footer__column-links">



            <div class="back-to-top"> <a href="#top" class="btn btn--round btn--round--lg"><span class="icon-arrow-up"></span></a></div>



            <div class="container">



                <div class="row">



                    



                    <div class="col-sm-3 col-md-2 mobile-collapse">



                        <h5 class="title text-uppercase mobile-collapse__title">We provide</h5>



                        <div class="v-links-list mobile-collapse__content" style="margin-top: 14px;">



                            <ul >



                                <li><a href="#">Fabric</a></li>



                                <li><a href="#">Alteration</a></li>



                                <li><a href="#">Stitching</a></li>



                                <li><a href="#">Uniform </a></li>



                                <li><a href="#">Accessories</a></li>



                            </ul>



                        </div>



                    </div>



                    <div class="col-sm-3 col-md-2 mobile-collapse">



                        <h5 class="title text-uppercase mobile-collapse__title">Service</h5>



                        <div class="v-links-list mobile-collapse__content" style="margin-top: 14px;">



                            <ul>



                                <li><a href="#">Cash On delivery</a></li>



                                <li><a href="#">7 Days return</a></li>



                                <li><a href="#">Free Shipping</a></li>



                                <li><a href="#">Uniform</a></li>



                                <li><a href="#">More Services</a></li>



                            </ul>



                        </div>



                    </div>



                    <div class="col-sm-3 col-md-2 mobile-collapse">



                        <h5 class="title text-uppercase mobile-collapse__title">My account</h5>



                        <div class="v-links-list mobile-collapse__content" style="margin-top: 14px;">



                            <ul>



                                <li><a href="<?php echo base_url(); ?>vendor/vendor_registration">Vendor Registration</a></li>



                                <li><a href="<?php echo base_url(); ?>vendor">Vendor Login</a></li>



                                <li><a href="<?php echo base_url();?>index.php/welcome/login">User Registration</a></li>



                                <li><a href="<?php echo base_url();?>index.php/welcome/login">User Login</a></li>



                                <li><a href="<?php echo base_url(); ?>index.php/Welcome/faq">FAQ</a></li>



                            </ul>



                        </div>



                    </div>

                    



                    <div class="col-sm-3 col-md-3 mobile-collapse mobile-collapse--last">



                        <h5 class="title text-uppercase mobile-collapse__title">Company Info</h5>



                        <div class="v-links-list mobile-collapse__content">



                            <ul  style="margin-top: 14px;">



                                <li class="icon icon-home">7563 St. Vincent Place, Glasgow</li>



                                <li class="icon icon-telephone">321321321, 321321321</li>



                                <li class="icon icon-mail"><a href="mailto:info@mydomain.com">info@mydomain.com</a></li>



                                <li class="icon icon-skype"><a href="#">shop.test</a></li>



                            </ul>



                        </div>



                    </div>

                    <div class="col-md-3 hidden-xs hidden-sm">



                        <!--  Logo  -->



                       <h5 class="callus">Call Us On</h5>

                       <h3 style="padding: 0 0 29px;" class="callus"> 8525085119</h3>

                        <?php echo form_open('Welcome/add_news_letter/');?>
                         <h5 class="callus">News letter</h5>
                         <input type="email" name="email" class="form-control" placeholder="Enter Email" required="" />
                         <?php if($this->session->flashdata('message')){?>
                          <div class="alert alert-danger">      
                            <?php echo $this->session->flashdata('message')?>
                          </div>
                        <?php } ?>
                        <!-- End Logo -->
                        <button class="btn btn--wd text-uppercase" id="">Go</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__subscribe">
            <div class="container">
                <div class="row">
                    <!--START: FRAME_MAILLIST-->
                    <div class="col-sm-6 col-md-6 mailist-box">
                        <div class="pull-left text-uppercase" style="

    margin-top: 11px;

"><a href="#" class="fff">Stitching </a>&nbsp;&nbsp; <a href="#" class="fff"> Fabric</a>&nbsp;&nbsp;<a href="#" class="fff"> Bridal </a>&nbsp;&nbsp;<a href="#" class="fff">Accessories </a>&nbsp;&nbsp; <a href="#" class="fff">Alteration </a>&nbsp;&nbsp; <a href="#" class="fff"> How It Works </a> &nbsp;&nbsp; <a href="#" class="fff">Faq's </a>&nbsp;&nbsp; <a href="#" class="fff"> Uniforms</a></div>



                    </div>
<div class="col-md-3">
<div class="pull-left text-uppercase" style="

    margin-top: 11px;

">
All rights reserved. ©
Ansvel
</div>
</div>


                    <!--END: FRAME_MAILLIST-->



                    <div class="col-sm-3 col-md-3 mailist-box">



                        <div class="social-links social-links--colorize social-links--large">



                            <ul>



                                <li class="social-links__item"><a class="icon icon-facebook" href="#"></a></li>



                                <li class="social-links__item"><a class="icon icon-twitter" href="#"></a></li>



                                <li class="social-links__item"><a class="icon icon-google" href="#"></a></li>



                                <li class="social-links__item"><a class="icon icon-pinterest" href="#"></a></li>



                                <li class="social-links__item"><a class="icon icon-mail" href="#"></a></li>



                            </ul>



                        </div>



                    </div>



                </div>



            </div>



        </div>

<div class="footer__subscribe">



            <div class="container">



                <div class="row">



                    <!--START: FRAME_MAILLIST-->



                    <div class="col-sm-7 col-md-12 mailist-box">



                        <div class="text-uppercase" style="

    margin-top: 11px;

" align="center">  </div>



                    </div>



                    <!--END: FRAME_MAILLIST-->


                </div>



            </div>



        </div>

        



    </footer>



</div>



 



<div class="stats">



  <!--START: 3dcart stats--> 



 



  <!--END: 3dcart stats--> 



</div>











<!-- Vendor -->







<!-- Specific Page Vendor -->























        <script src="<?php echo base_url();?>assets/vendor/bootstrap/bootstrap.min.js"></script> 



<script src="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/doubletaptogo/doubletaptogoedd7.js"></script>



<script src="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/imagesloaded/imagesloaded.pkgd.minedd7.js"></script>



<script src="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/countdown/jquery.plugin.minedd7.js"></script>



<script src="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/countdown/jquery.countdown.minedd7.js"></script>







<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/jquery.flexslider-minedd7.js"></script>







<!-- Custom -->







<script src="<?php echo base_url(); ?>assets/templates/welldone-html5/js/functionsedd7.js"></script>







<!-- Specific Page Vendor --> 



<script src="<?php echo base_url(); ?>vendor/waves/waves.min.js"></script> 



<script src="<?php echo base_url(); ?>vendor/slick/slick.min.js"></script> 







<script src="<?php echo base_url(); ?>vendor/parallax/jquery.parallax-1.1.3.js"></script> 



<script src="<?php echo base_url(); ?>vendor/waypoints/jquery.waypoints.min.js"></script> 



<script src="<?php echo base_url(); ?>vendor/waypoints/sticky.min.js"></script> 



<script src="<?php echo base_url();?>assets/vendor/bootstrap-select/bootstrap-select.min.js"></script> 



<script src="<?php echo base_url(); ?>js/custom-layout2.js"></script> 



<script src="<?php echo base_url();?>assets/vendor/doubletaptogo/doubletaptogo.js"></script> 



<script src="<?php echo base_url();?>assets/vendor/doubletaptogo/doubletaptogo.js"></script> 



<script src="<?php echo base_url();?>assets/vendor/elevatezoom/jquery.elevatezoom.js"></script> 



		<script src="<?php echo base_url();?>assets/vendor/isotope/isotope.pkgd.min.js"></script> 



		<script src="<?php echo base_url();?>assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script> 



		<script src="<?php echo base_url();?>assets/vendor/nouislider/nouislider.min.js"></script> 



		



		<script src="<?php echo base_url();?>assets/vendor/countdown/jquery.plugin.min.js"></script> 



		<script src="<?php echo base_url();?>assets/vendor/countdown/jquery.countdown.min.js"></script> 



        



        



		<!-- Custom --> 





        







<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 







		<!-- Parallax carousel / JS -->



        




<!-- Mirrored from sandbox-etheme753-com.3dcartstores.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Sep 2016 13:20:12 GMT -->


</html>



