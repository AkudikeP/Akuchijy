
  <style>
.fff:hover
{
    color:#fff;
}
.foot{
   padding-left: 20px;
    color: #000;
    padding-right: 20px;
}
.no-pdd{
  padding: 0px !important;
}
.social-links--colorize .linkd{
  font-size: 20px !important;
}
.social-links--colorize .linkd:hover{
  color: #337ab7;
}
li{
  list-style-type: inherit;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        $('#back-to-top').tooltip('show');

});
</script>
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
                    fullScreenOffsetContainer: ".header"});  }); </script>
</div></div></section>
<div class="clear"></div>
<footer class="footer">
<div class="footer__column-links no-pd-sm">
<div class="back-to-top" id="back-to-top"> <a href="#top" class="btn btn--round btn--round--lg"><span class="icon-arrow-up"></span></a></div>
<div class="container"><div class="row"><div class="col-sm-3 col-md-2 mobile-collapse">
                    <?php $menu_link = $this->db->get_where("add_link_menu",array("status_enable"=>'enable',"id"=>'1'))->row();?>
                        <h5 class="title text-uppercase mobile-collapse__title"><?php if(isset($menu_link->link_menu_name)){echo $menu_link->link_menu_name;}?></h5>
                        <div class="v-links-list mobile-collapse__content"><ul>
                        <!-- help -->
                        <?php $mlink = $this->db->get_where("ansvel",array("status_enable"=>'enable'))->result();
                        foreach ($mlink as $mlink) { ?>
                          <li><a href="<?php if(isset($mlink->link)){echo base_url() . $mlink->link;}?>"><?php if(isset($mlink->heading)){echo $mlink->heading;}?></a></li><?php } ?></ul>
                        </div></div>
<div class="col-sm-3 col-md-2 mobile-collapse">
<?php $menu_link = $this->db->get_where("add_link_menu",array("status_enable"=>'enable',"id"=>'2'))->row(); ?>
<h5 class="title text-uppercase mobile-collapse__title"><?php if(isset($menu_link->link_menu_name)){echo $menu_link->link_menu_name;}?></h5>
<div class="v-links-list mobile-collapse__content"><ul>
<?php $slink = $this->db->get_where("service_link",array("status_enable"=>'enable'))->result(); foreach ($slink as $slink) { ?>
<li><a href="<?php if(isset($slink->service_link_address)){echo base_url() . $slink->service_link_address;}?>"><?php if(isset($slink->service_link_name)){echo $slink->service_link_name;}?></a></li>
<?php } ?></ul></div></div>
<div class="col-sm-3 col-md-2 mobile-collapse">
<?php $menu_link3 = $this->db->get_where("add_link_menu",array("status_enable"=>'enable',"id"=>'3'))->row(); ?>
<h5 class="title text-uppercase mobile-collapse__title"><?php if(isset($menu_link3->link_menu_name)){echo $menu_link3->link_menu_name;}?></h5>
<div class="v-links-list mobile-collapse__content"><ul>
<?php $ilink = $this->db->get_where("information_link",array("status_enable"=>'enable'))->result();
foreach ($ilink as $ilink) { ?><li><a href="<?php if(isset($ilink->info_link_address)){echo base_url() . $ilink->info_link_address;}?>"><?php if(isset($ilink->info_link_name)){echo $ilink->info_link_name;}?></a></li>
<?php } ?></ul></div></div>


                    <div class="col-sm-3 col-md-2 mobile-collapse">
                    <?php $menu_link4 = $this->db->get_where("add_link_menu",array("status_enable"=>'enable',"id"=>'4'))->row();

                    ?>

                        <h5 class="title text-uppercase mobile-collapse__title"><?php if(isset($menu_link4->link_menu_name)){echo $menu_link4->link_menu_name;}?></h5>
                        <div class="v-links-list mobile-collapse__content">
                            <ul>
                        <?php $clink = $this->db->get_where("customer_support_link",array("status_enable"=>'enable'))->result();
                        foreach ($clink as $clink) {


                    ?>

                                <li><a href="<?php if(isset($clink->link_address)){echo base_url() . $clink->link_address;}?>"><?php if(isset($clink->link_name)){echo $clink->link_name;}?></a></li>

                                <?php } ?>
                            </ul>
                        </div>

                    </div>

                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="hidden-sm hidden-xs">
                       <h5 class="callus">Any Query</h5>
                       <?php $info = $this->db->get("footer")->row();?>

                       <h3 style="padding: 0 0 2px;" class="callus"> Call  <?php if(isset($info->mobile)){echo $info->mobile;}?></h3>
                         </div>
                       <?php if($this->session->flashdata('message')){?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('message')?>
  </div>
<?php } ?>
<div style="margin-top:12px">
 <h5 class="callus">News letter</h5>
 <?php echo form_open("welcome/add_news_letter",array('id'=>'news','class'=>"contact-form"));?>
 <div class="col-md-10 col-sm-10 col-xs-8 no-pdd"><input type="email" required="" name="email" class="form-control" placeholder="Enter Email"/></div><div class="col-md-2 col-sm-2 col-xs-4 no-padding"><button type="submit" name="go" class="btn btn-success" style="border-radius: 0px; background-color:#000; border:none;">Subscribe</button>
<?php echo form_close();?></div>
  </div>                      <!-- End Logo -->
<br />
<div class="hidden-sm hidden-xs">
<h4 style="color:#000; padding-bottom:10px; padding-top:12px;">Download Mobile App</h4>


<a target="_blank" href="#"><img src="<?php echo base_url(); ?>assets/images/Google-Play-App-Store.jpg" />
<img src="<?php echo base_url(); ?>assets/images/Download_on_the_App_Store_Badge.png" /></a>

                    </div></div>
</div>
</div>

<p style="text-align: center;color: #fff;padding-top: -7px; font-weight: 400; background-color: #3C3C3C;padding: 8px;"><?php if(isset($info->coptwrite)){ echo $info->coptwrite; }?></p>


<!--div class="row">
<div class="col-md-12 col-sm-12 foot hidden-xs" ><h6  style="color:#000; padding-top:20px;">Most Searched on Ansvel </h6> <p>
<?php
$keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->order_by('id', 'RANDOM');
            $this->db->limit(15);
            $this->db->where('r_viewed BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
      $new=$this->db->get_where('fabric',array("status"=>'approve',"status_enable"=>'enable'))->result_array();
      foreach ($new as $value) {
        ?>
        <?php echo $value['title'];?> |
        <?php
      }
      ?>
      <?php

      $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->order_by('acc_id', 'RANDOM');
            $this->db->limit(15);
            $this->db->where('r_viewed BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
      $new1=$this->db->get_where('accessories',array("status"=>'approve',"status_enable"=>'enable'))->result_array();
      foreach ($new1 as $value1) {
        ?>
        <?php echo $value1['brand'];?> |
        <?php
      }
      ?>
      <?php

$keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->order_by('id', 'RANDOM');
            $this->db->limit(15);
            $this->db->where('r_viewed BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
      $new2=$this->db->get_where('online_boutique',array("status"=>'approve',"status_enable"=>'enable'))->result_array();
      foreach ($new2 as $value2) {
        ?>
        <?php echo $value2['brand'];?> |
        <?php
      }
      ?>

</p></div>
</div>
</div-->
<!--div style="border: 1px solid #9C9A9A; margin-top: 20px; margin-bottom: 20px;"></div-->

<div class="row">
  <div class="container">
<div class="col-md-8 col-sm-12 footer social-links" ><span style="color: #000;"><b>Payment Secured By :-</b> </span> <img src="<?php echo base_url(); ?>assets/images/925739176s.png" />  <img src="<?php echo base_url(); ?>assets/images/PayUMoney-logo.jpg"  style="width: 50%;"/>  </div>

<div class="col-md-4 col-sm-12" style="color:#000;"><div class="social-links social-links--colorize social-links--large">
<br>

              <ul class="foot-rt">
              <li class="social-links__item" style="color:#000;"><h6>Social Connect</h6></li>
              <?php $link = $this->db->get_where("social",array("status_enable"=>'enable'))->result();
              //print_r($link);die;
                if(!empty($link)){
                foreach ($link as $link) {
              ?>
              <?php if($link->category=='Linkdin'){ ?>
              <li class="social-links__item"><a class="fa fa-linkedin linkd" href="<?php echo $link->social_link;?>"></a></li>
              <?php }
               if($link->category=='Facebook'){ ?>
              <li class="social-links__item"><a class="icon icon-facebook" href="<?php echo $link->social_link;?>"></a></li>
              <?php } if ($link->category=='Twitter') { ?>

                <li class="social-links__item"><a class="icon icon-twitter" href="<?php echo $link->social_link;?>"></a></li>
                <?php } if ($link->category=='Google') { ?>

                <li class="social-links__item"><a class="icon icon-google" href="<?php echo $link->social_link;?>"></a></li>
                <?php } if ($link->category=='Pinterest') { ?>

                <li class="social-links__item"><a class="icon icon-pinterest" href="<?php echo $link->social_link;?>"></a></li>
                <?php } if ($link->category=='Gmail') { ?>

                <li class="social-links__item"><a class="icon icon-mail" href="<?php echo $link->social_link;?>"></a></li>

                <?php } } }?>
              </ul>
            </div></div>
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





<!--<script src="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/doubletaptogo/doubletaptogoedd7.js"></script>-->

  <script src="https://cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js"></script>
  <link href="https://cdn.jsdelivr.net/alertifyjs/1.8.0/css/alertify.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/alertifyjs/1.8.0/css/themes/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">
    $("#news").submit(function(e){e.preventDefault();
    
                $.ajax({
              url: "<?php echo base_url(); ?>index.php/Welcome/add_news_letter", // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,        // To send DOMDocument or non processed data file it is set to false
              success: function(data)   // A function to be called if request succeeds
              {
                console.log(data);
                alertify.success(data);
           
              },
              error: function(data)
              {
               // alertify.success('Added Successfully');
              }
              });

              });
</script>

<script src="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/imagesloaded/imagesloaded.pkgd.minedd7.js"></script>



<!--<script src="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/countdown/jquery.plugin.minedd7.js"></script>-->



<!--<script src="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/countdown/jquery.countdown.minedd7.js"></script>-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/jquery.flexslider-minedd7.js"></script>
<!-- Custom -->

<script src="<?php echo base_url(); ?>assets/templates/welldone-html5/js/functionsedd7.js"></script>


<!-- Specific Page Vendor -->



<script src="<?php echo base_url(); ?>kvendor/waves/waves.min.js"></script>



<script src="<?php echo base_url(); ?>kvendor/slick/slick.min.js"></script>

<script src="<?php echo base_url(); ?>kvendor/parallax/jquery.parallax-1.1.3.js"></script>



<script src="<?php echo base_url(); ?>kvendor/waypoints/jquery.waypoints.min.js"></script>



<script src="<?php echo base_url(); ?>kvendor/waypoints/sticky.min.js"></script>



<script src="<?php echo base_url();?>assets/vendor/bootstrap-select/bootstrap-select.min.js"></script>



<!--<script src="<?php echo base_url(); ?>js/custom-layout2.js"></script>-->



<script src="<?php echo base_url();?>assets/vendor/doubletaptogo/doubletaptogo.js"></script>



<script src="<?php echo base_url();?>assets/vendor/doubletaptogo/doubletaptogo.js"></script>



<script src="<?php echo base_url();?>assets/vendor/elevatezoom/jquery.elevatezoom.js"></script>



        <script src="<?php echo base_url();?>assets/vendor/isotope/isotope.pkgd.min.js"></script>



        <script src="<?php echo base_url();?>assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>



        <script src="<?php echo base_url();?>assets/vendor/nouislider/nouislider.min.js"></script>







        <!--<script src="<?php echo base_url();?>assets/vendor/countdown/jquery.plugin.min.js"></script>-->



        <!--<script src="<?php echo base_url();?>assets/vendor/countdown/jquery.countdown.min.js"></script>-->


</body>

<script src="<?php echo base_url();?>assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>css/jquery.magnific-popup.min.js"></script>



      <!--script src="<?php echo base_url(); ?>css/jquery.mb.YTPlayer.js"></script-->



         <!--<script src="<?php echo base_url(); ?>css/main.js"></script>-->


        <!--  <script src="<?php echo base_url(); ?>css/owl.carousel.min.js"></script>-->


</html>
