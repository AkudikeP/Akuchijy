<style type="text/css">

  .career_image{
    position: relative;
   width: 100%;
   }
   .career_text{
 position: absolute;
   top: 125px;
   left:38%;

   color:#fff;
   font-size:24px;
   background-color:#000;
   }
   .our-team{
    margin-top: 20px;
   }
   .ab-icon{
    font-size: 65px;
   }
</style>
<link  rel="stylesheet" type="text/css"  media="all" href="<?php echo base_url(); ?>css/template.css" />



            </head>
    <body data-container="body" data-mage-init='{"loaderAjax": {}, "loader": { "icon": "http://demo8.cmsmart.net/m2multistore/pub/static/frontend/netbase/multistore/en_US/images/loader-2.gif"}}' class="cms-about-us cms-page-view page-layout-1column">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/design_default.css">
<link rel="stylesheet" type="text/css" media="all" href="http://demo8.cmsmart.net/m2multistore/pub/media/sun/configed_css/settings_default.css">
<script type="text/javascript">
require([
    'jquery'
], function ($) {
    $("body").addClass("layout-1170");
    $("body").addClass("wide");

});
</script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('.wrap-menu .btn-menu').on('click',function(){
      if($('.wrap-menu .vertical-menu').hasClass('show')){
        $(".wrap-menu .vertical-menu").removeClass('show');
      }else{
        $(".wrap-menu .vertical-menu").addClass('show');
      }
    });
    $('.ajaxsearch_ext .toggle-search').on('click',function(){
      if($('.ajaxsearch_ext .minisearch').hasClass('show')){
        $(".ajaxsearch_ext .minisearch").removeClass('show');
      }else{
        $(".ajaxsearch_ext .minisearch").addClass('show');
      }
    });
    var uA = navigator.userAgent;
    if(uA.indexOf('Trident') != -1 && uA.indexOf('rv:11') != -1){
      $('body').addClass('ie');
    }
    else if(navigator.userAgent.indexOf("Firefox")!=-1){
       $('body').addClass('firefox');
    }
    else if(navigator.userAgent.indexOf("Opera")!=-1){
       $('body').addClass('Opera');
    }
    else if(navigator.userAgent.indexOf("Chrome") != -1){
       $('body').addClass('chrome');
    }
    else if(navigator.userAgent.indexOf("Safari")!=-1){
      $('body').addClass('safari');
    }
  });
</script>





<div class="page-wrapper">
 <div class="career_image">
                <!--img src="<?php echo base_url(); ?>assets/images/about_baner.png"  width="100%";/-->
                <?php $contant = $this->db->get_where('banner_aboutus',array('id'=>1))->row();
                //echo ; ?>
                 <img src="<?php echo base_url();?>assets/images/<?php echo $contant->banner_image; ?>" width="100%" class="work2">

                </div>
<header class="page-header header-container type1">
    <div class="panel wrapper">

            <div class="panel header">
                <div class="header-top">
                    <div class="">





<main id="maincontent" class="page-main"><a id="contentarea" tabindex="-1"></a>
<div class="page messages"><div data-placeholder="messages"></div><div data-bind="scope: 'messages'">
    <div data-bind="foreach: { data: cookieMessages, as: 'message' }" class="messages">
        <div data-bind="attr: {
            class: 'message-' + message.type + ' ' + message.type + ' message',
            'data-ui-id': 'message-' + message.type
        }">
            <div data-bind="html: message.text"></div>
        </div>
    </div>
    <div data-bind="foreach: { data: messages().messages, as: 'message' }" class="messages">
        <div data-bind="attr: {
            class: 'message-' + message.type + ' ' + message.type + ' message',
            'data-ui-id': 'message-' + message.type
        }">
            <div data-bind="html: message.text"></div>
        </div>
    </div>
</div>
<script type="text/x-magento-init">
    {
        "*": {
            "Magento_Ui/js/core/app": {
                "components": {
                        "messages": {
                            "component": "Magento_Theme/js/view/messages"
                        }
                    }
                }
            }
    }
</script>
</div><div class="columns"><div class="column main">


<p><div class="row">
<div class="container">

  <?php
  $this->db->where('page_title Like','%About Us%');
  $contant = $this->db->get('tbl_pages')->row();
  echo $contant->page_desc; ?>
<br>
<div class="col-xs-4 col-md-4 each-icon animation-element scroll-zoom-out" align="center"><span class="ab-icon circle"><i class="fa fa-product-hunt"></i></span> <p><strong> <?php echo $contant->heading1; ?></strong> </p><span class="ab-text"><?php echo $contant->con1; ?></span></div>
<div class="col-xs-4 col-md-4 each-icon animation-element scroll-zoom-out" align="center"><span class="ab-icon circle"><i class="fa fa-shopping-cart"></i></span> <p><strong><?php echo $contant->heading2; ?></strong></p> <span class="ab-text"><?php echo $contant->con2; ?></span></div>
<div class="col-xs-4 col-md-4 each-icon animation-element scroll-zoom-out" align="center"><span class="ab-icon circle"><i class="fa fa-globe"></i></span> <p><strong> <?php echo $contant->heading3; ?> </strong></p> <span class="ab-text"><?php echo $contant->con3; ?></span></div>

</div>
</div>

<div class="row our-team">
  <div class="container">
<p><?php echo $contant->some_other_text; ?></p><br>
<?php
//$this->db->order_by('number','asc');
$contant = $this->db->get_where('team')->result();
//echo $contant->page_desc;
foreach ($contant as $value) {
?>

<div class="col-xs-6 col-md-3 ot-content animation-element scroll-zoom-out"><a href="#"> <img height="250px" src="<?php echo base_url();?>assets/images/<?php echo $value->image; ?>" alt="" /></a>
<div class="our-team-detail">
<p><?php echo $value->contant; ?></p>
<a href="<?php echo $value->facelink; ?>" target="_blank"><i class="fa fa-facebook"></i></a> <a href="<?php echo $value->twilink; ?>" target="_blank"><i class="fa fa-twitter"></i></a> <a href="<?php echo $value->inlink; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></div>
<div class="our-text center-nb"><strong><?php echo $value->heading; ?></strong> <span><?php echo $value->post; ?></span></div>
</div>
<?php } ?>
<!--div class="col-xs-6 col-md-3 ot-content  animation-element scroll-zoom-out"><a href="#"> <img src="<?php echo base_url();?>img/team2.jpg" alt="" /></a>
<div class="our-team-detail">
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
<a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a> <a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></div>
<div class="our-text center-nb"><strong>Chris Root</strong> <span>Managing Director</span></div>
</div>
<div class="col-xs-6 col-md-3 ot-content  animation-element scroll-zoom-out"><a href="#"> <img src="<?php echo base_url();?>img/team4.jpg" alt="" /></a>
<div class="our-team-detail">
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
<a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a> <a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></div>
<div class="our-text center-nb"><strong>Panlope Stark</strong> <span>SEO Specialist</span></div>
</div>
<div class="col-xs-6 col-md-3 ot-content  animation-element scroll-zoom-out"><a href="#"> <img src="<?php echo base_url();?>img/team3.jpg" alt="" /></a>
<div class="our-team-detail">
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
<a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a> <a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></div>
<div class="our-text center-nb"><strong>Philip Demarco</strong> <span>Business Analyst</span></div>
</div-->
</div></div>
<script type="text/javascript" xml="space">// <![CDATA[
//
//
//
equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 jQuery(container).each(function() {

   $el = jQuery(this);
   jQuery($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

jQuery(window).load(function() {
  equalheight('.our-team .ot-content');
});


jQuery(window).resize(function(){
  equalheight('.our-team .ot-content');
});



jQuery(window).load(function() {
  equalheight('.each-icon strong');
});


jQuery(window).resize(function(){
  equalheight('.each-icon strong');
});
//
//
//
// ]]></script> <div class="container-time">
<div class="page-header-time">
<h1 id="timeline">Our history</h1>
</div>
<ul class="timeline">
  <?php
  $this->db->order_by('number','asc');
  $contant = $this->db->get_where('howitworks',array('type'=>'aboutus'))->result();
  //echo $contant->page_desc;
  foreach ($contant as $value) {
?>
<li class="timeline-year-li">
<div class="timeline-year"><?php echo $value->number;?></div>
</li>
<li class="count-li">
<div class="timeline-badge"></div>
<div class="timeline-panel animation-element banner-nb-bottom">
<div class="img-text"><img src="<?php echo base_url();?>assets/images/<?php echo $value->image; ?>" alt="" /></div>
<div class="timeline-body">
<h4 class="timeline-title"><?php echo $value->heading; ?></h4>
<p><?php echo $value->contant; ?></p>
</div>
</div>
</li>
<?php } ?>
<!--li class="timeline-inverted count-li">
<div class="timeline-badge"></div>
<div class="timeline-panel  animation-element banner-nb-bottom">
<div class="img-text"><img src="<?php echo base_url();?>img/ab2.png" alt="" /></div>
<div class="timeline-body">
<h4 class="timeline-title">Mussum ipsum cacilds</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
</div>
</div>
</li>
<li class="timeline-year-li">
<div class="timeline-year">2015</div>
</li>
<li class="count-li">
<div class="timeline-badge"></div>
<div class="timeline-panel  animation-element banner-nb-bottom">
<div class="img-text"><img src="<?php echo base_url();?>img/ab3.png" alt="" /></div>
<div class="timeline-body">
<h4 class="timeline-title">Mussum ipsum cacilds</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
</div>
</div>
</li>
<li class="timeline-inverted count-li">
<div class="timeline-badge"></div>
<div class="timeline-panel  animation-element banner-nb-bottom">
<div class="img-text"><img src="<?php echo base_url();?>img/ab4.png" alt="" /></div>
<div class="timeline-body">
<h4 class="timeline-title">Mussum ipsum cacilds</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
</div>
</div>
</li>
<li class="count-li">
<div class="timeline-badge"></div>
<div class="timeline-panel  animation-element banner-nb-bottom">
<div class="img-text"><img src="<?php echo base_url();?>img/ab5.png" alt="" /></div>
<div class="timeline-body">
<h4 class="timeline-title">Mussum ipsum cacilds</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
</div>
</div>
</li>
<li class="timeline-year-li">
<div class="timeline-year">2016</div>
</li>
<li class="timeline-inverted count-li">
<div class="timeline-badge"></div>
<div class="timeline-panel  animation-element banner-nb-bottom">
<div class="img-text"><img src="<?php echo base_url();?>img/ab1.png" alt="" /></div>
<div class="timeline-body">
<h4 class="timeline-title">Mussum ipsum cacilds</h4>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
</div>
</div>
</li-->
</ul>
</div>
<script type="text/javascript" xml="space">
  jQuery(document).ready(function($) {
  var _width = $(window).width();
  var _lengthli = $( ".timeline .count-li" ).size()
  $( ".timeline .count-li" ).each(function( index ) {
      var _conditionI = index%2;
    if (_width <1200) {
        if (_conditionI == 1) {
          $(this).removeClass('timeline-inverted');
        }
    } else {
        if (_conditionI == 1) {
          $(this).addClass('timeline-inverted');
        }
    }
  });
});
 </script></p>
<p>

<script type="text/javascript">
  //Home product tab
  require([
     'jquery',
     'jquery/ui'
    ],
    function($, tabs) {
    $(document).ready(function(){
      $('#owl-demo-brand .item').click(function(){
        var check = $(this).parents(".owl-item").hasClass('checked-ab');
        if (check) {
          $(this).parents(".owl-item").addClass('checked-ab');
        } else {
          $(this).parents(".owl-item").toggleClass('checked-ab').siblings().removeClass('checked-ab');
        }
      });


      $('.bestseller-product ul.tabs li').click(function(){
        var tab_id = $(this).attr('data-tab');

        $('.bestseller-product ul.tabs li').removeClass('current');
        $('.bestseller-product .tab-content').removeClass('current');

        $(this).addClass('current');
        $(".bestseller-product #"+tab_id).addClass('current');
      })
      $('.brand-module .inner').owlCarousel({
      items: 4,
      itemsCustom: [
        [0, 2],
        [480, 4],
        [768, 4],
        [992, 6],
        [1200, 7]
      ],
      pagination: false,
      slideSpeed : 800,
      scrollPerPage: false,
      touchDrag: false,
      afterAction: function (e) {
        if(this.$owlItems.length > this.options.items){
          $('.brand-module .navslider').show();
        }else{
          $('.brand-module .navslider').hide();
        }
      }
      //scrollPerPage: true,
    });
    $('.brand-module .navslider .prev').on('click', function(e){
      e.preventDefault();
      $('.brand-module .inner').trigger('owl.prev');
    });
    $('.brand-module .navslider .next').on('click', function(e){
      e.preventDefault();
      $('.brand-module .inner').trigger('owl.next');
    });
    });
  });

    //Product owl carousel slider
    require(['jquery'], function($) {
    "use strict";
        $(document).ready(function(){
      $(".brand-module .owl-item").on("click" ,function(){
        $(this).addClass("active-1").siblings().removeClass("active-1");
        // alert($(this).children(".item").attr("data-show"));
        var dataShow = $(this).children(".item").attr("data-show");
        // alert(dataShow);
        // console.log(this);
        $(this).parents(".brand-module").find('.brand-show').filter('[data-show='+dataShow+']').addClass("data-show").siblings().removeClass("data-show");
        var _this = $(this).parents(".brand-module");
      });

      reloadBrand('http://demo8.cmsmart.net/m2multistore/brandcategory/index/loadbrand/cat/0/');

        });
    });

  function reloadBrand(url){
    require(['jquery'], function($){
      "use strict";

      $('#brand-load').show();
      $('#nb_brand_products').html("");
      $.ajax({
        url: url,
        data: {},
        type: 'post',
        dataType: 'json',

        success: function(res) {
          $('#brand-load').hide();
          $('#nb_brand_products').html(res["template"]);
        }
      });

    });
  }
</script>
<script type="text/javascript">
   jQuery(document).ready(function($) {
    var $animation_elements = $('.animation-element');
    var $window = $(window);

    function check_if_in_view() {
    var window_height = $window.height();
    var window_top_position = $window.scrollTop();
    var window_bottom_position = (window_top_position + window_height);

    $.each($animation_elements, function() {
      var $element = $(this);
      var element_height = $element.outerHeight();
      var element_top_position = $element.offset().top;
      var element_bottom_position = (element_top_position + element_height);

      //check to see if this current container is within viewport
      if ((element_top_position <= window_bottom_position)) {
      $element.addClass('in-view');
      } else {
      $element.removeClass('in-view');
      }
    });
    }

    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');
   });
</script>
</p>
<p></p>
</div></div></main></div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>

        <script src="<?php echo base_url();?>assets/js/custom.js"></script>
