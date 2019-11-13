<?php defined('BASEPATH') or exit('No direct script access allowed');?>

<!doctype html>
<html class="no-js">

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?=base_url();?>assets/mobilefav.png" type="image/png">
  <meta http-equiv="Expires" content="30" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
  <meta name="viewport" content="user-scalable=no, width=device-width" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <link rel="stylesheet" href="<?=base_url();?>kvendor/nouislider/nouislider.css">
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/templates/common-html5/quicksearch/quicksearchedd7.css"
    type="text/css" />
  <link rel="stylesheet" href="<?=base_url();?>assets/templates/common-html5/css/layoutedd7.css" type="text/css"
    media="all" />
  <link rel="stylesheet" href="<?=base_url();?>assets/templates/common-html5/css/responsiveedd7.css" type="text/css"
    media="screen" />
  <link rel="stylesheet" href="<?=base_url();?>kvendor/waves/waves.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url();?>kvendor/slick/slick.css">
  <link rel="stylesheet" href="<?=base_url();?>kvendor/slick/slick-theme.css">
  <link rel="stylesheet" href="<?=base_url();?>kvendor/bootstrap-select/bootstrap-select.css">
  <link rel="stylesheet" href="<?=base_url();?>kvendor/parallax-carousel/pcarousel.min.css">
  <link rel="stylesheet" href="<?=base_url();?>css/style-colors.css">
  <link rel="stylesheet" href="<?=base_url();?>css/style.css">
  <link rel="stylesheet" href="<?=base_url();?>css/magnific-popup.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/templates/welldone-html5/font/styleedd7.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/templates/welldone-html5/vendor/waves/wavesedd7.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/templates/welldone-html5/vendor/slick/slickedd7.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/templates/welldone-html5/vendor/slick/slick-themeedd7.css">
  <link rel="stylesheet"
    href="<?=base_url();?>assets/templates/welldone-html5/vendor/bootstrap-select/bootstrap-selectedd7.css">
  <link rel="StyleSheet" href="<?=base_url();?>assets/templates/welldone-html5/css/defaultedd7.css" type="text/css" />
  <link rel="StyleSheet" href="<?=base_url();?>assets/templates/welldone-html5/vendor/welldone-3dcart/3dcartedd7.css"
    type="text/css" />
  <link rel="stylesheet" type="text/css"
    href="<?=base_url();?>assets/templates/welldone-html5/vendor/rs-plugin/css/settingsedd7.css" />
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script src="<?=base_url();?>assets/templates/welldone-html5/vendor/jquery/jqueryedd7.js"></script>
  <script>const baseUrl = "<?=base_url();?>";</script>
  <script src="<?=base_url();?>assets/js/pages/header.js"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>assets/css/pages/header.css" />
</head>

<body id="asdf" class=" catalog-category-view categorypath-women-new-arrivals-html category-new-arrivals store-default"
  style="overflow-x:hidden;">
  <div id="mainContainer" class="wrapper">
    <header class="header">
      <div class="header-line hidden-xs tophead">
        <div class="container">
          <div class="col-md-12">
            <div class="pull-right mb1" style="text-transform:capitalize;">
              <div>
                <div id="FRAME_MENU">
                  <div class="h-links-list">
                    <ul class="mobile1">
                      <?php if ($this->session->userdata("city_session")) {
                        $cities = $this->db->get_where("cities", array("id" => $this->session->userdata("city_session")))->row();
                      ?>
                        <li style="padding-right: 8px;">
                          <a href="#" class="menu" target="#"><b><i class="fa fa-map-marker"></i> </b>
                          </a>
                        </li>
                        <li class="user-links__item"><b>
                          <a href="<?=base_url();?>welcome/unset_city"><?=$cities->name;?></a></b>
                        </li>
                      <?php }?>
                      <li><a href="<?=base_url();?>vendor-home" class="menu" target="_self">Sell</a></li>
                      <li><a href="<?=base_url('blog');?>" class="menu" target="_self">Blog</a></li>
                      <?php if ($this->session->userdata("userid")) {?>
                      <div class="dropdown pull-right"> <a href="#" class="dropdown-toggle btn--links--dropdown"
                          data-toggle="dropdown"><?=$this->session->userdata("name");?> <i
                            class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu ul-row animated fadeIn" role="menu">
                          <li class='li-col list-user-menu'>
                            <ul>
                              <li style="padding: 0 0px 0 0;"><a href="<?=base_url();?>orders" style="width: 127px;">My
                                  Orders</a></li>
                              <li style="padding: 0 0px 0 0;"><a href="<?=base_url();?>cancel-orders"
                                  style="width: 127px;">Cancel Orders</a></li>
                              <li style="padding: 0 0px 0 0;"><a href="<?=base_url();?>manage-profile"
                                  style="width: 127px;">My Account</a></li>
                              <li style="padding: 0 0px 0 0;"><a href="<?=base_url();?>logout" style="width: 127px;"><i
                                    class="fa fa-sign-out"></i> Logout</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                      <?php } else {?>
                      <li class="user-links__item"><a href="<?=base_url();?>login">Login</a></li>
                      <li class="user-links__item"><a href="<?=base_url();?>login">Wishlist</a></li>
                      <?php }?>
                      <li class="user-links__item"><a href="<?=base_url();?>donate"
                          style="font-weight:600; color:#3373c8;">Donate</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-line hidden-xs">
        <div class="container no-padding">
          <div class="row" style="padding:0px;">
            <div class="col-md-2 col-sm-3 mb"><a href="<?=base_url();?>"><img
                  src="<?=base_url();?>assets/images/logo/ansvel_text2.png" class="lima" style="width: 200px;"></a>
            </div>
            <div class="col-md-6 col-sm-4" align="right">
              <form method="post" action="" style="display: flex; width:95%">
                <input type="text" id="data_search" class="search_id" list="browsers" name="keyword"
                  class="form-control search" placeholder="Search in Ansvel" onfocus="this.placeholder = ''"
                  autocomplete="off" style="padding-left:5px;" required="">
                <span id="data"></span>
                <button class="btn btn--wd text-uppercase wave waves-effect" value="Go" style="height: 36px;padding: 8px;width: 65px;border-radius: 0px;"><i class="fa fa-search"></i></button>
              </form>
            </div>
            <div class="col-md-1">
              <div class="header__dropdowns-container">
                <div class="header__dropdowns">
                  <div class="header__cart pull-left">
                    <div class="dropdown pull-right sc">
                      <b style="color:#000;">CART</b> <a href="#"
                        class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button"
                        data-toggle="dropdown" style="color:#000;"><i class="fa fa-shopping-cart fa-2x"></i><span
                          id="citems" class="badge badge--menu"><?=$this->cart->total_items();?></span></a>
                      <?php if ($this->cart->contents()) {?>
                      <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart">
                        <div class="shopping-cart__settings"><a href="javascript:void(0)" class="emptycart"> Empty
                            Cart</a></div>
                        <div class="shopping-cart__top text-uppercase">Cart (<?=$this->cart->total_items();?>)</div>
                        <ul>
                          <?php foreach ($this->cart->contents() as $cart) {?>
                          <li class='shopping-cart__item'>
                            <div class="shopping-cart__item__image pull-left"><a href="#">
                                <?php if ($cart['custom'] == "") {?>
                                <img src="<?=base_url();?>assets/images/<?=$cart['img'];?>" alt="" /></a>
                              <?php } else {?>
                              <img src="<?=base_url();?>adminassets/<?=$cart['img'];?>" alt="" /></a>
                              <?php }?></div>
                            <div class="shopping-cart__item__info">
                              <div class="shopping-cart__item__info__title">
                                <h2 class="text-uppercase"><a href="#">
                                  <?=substr($cart['name'], 0, 20);
                                    if (strlen($cart['name']) > 20) {echo '...';}?></a>
                                </h2>
                              </div>
                              <div class="shopping-cart__item__info__option">Qty: <?=$cart['qty'];?></div>
                              <div class="shopping-cart__item__info__option">SubTotal: &#8358;
                                <?=$cart['subtotal'];?></div>
                              <div class="shopping-cart__item__info__delete" id="<?=$cart['rowid'];?>">
                                <a href="#" class="icon icon-clear"></a></div>
                            </div>
                          </li>
                          <?php }?>
                        </ul>
                        <div class="shopping-cart__bottom">
                          <div class="pull-left"><span class="shopping-cart__total">
                              &#8358; 
                              <?php
if ($this->session->userdata("dis")) {
    echo $this->cart->total() - $this->session->userdata("dis");
} else {
    echo "" . $this->cart->total();}?></span></div>

                          <div class="pull-right">

                            <a href="<?=base_url();?>cart" class="btn btn--wd text-uppercase"
                              style="color: rgb(255, 255, 255); width: 99px;">Cart</a>

                            <a href="<?=base_url();?>checkout" class="btn btn--wd text-uppercase"
                              style="color:#fff;">Checkout</a>





                          </div>

                        </div>

                      </div>

                      <?php } else {?>

                      <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart">



                        <div class="shopping-cart__top text-uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                            class="shopping-cart__total">

                            <i class="fa fa-shopping-bag fa-2x"></i>

                            Empty Cart</span></div>



                      </div>

                      <?php }?>



                    </div>

                  </div>

                </div>

              </div>

            </div>
            <?php $info = $this->db->get("footer")->row();?>


            <div class="col-md-3">&nbsp; &nbsp;<h3
                style=" color:#000; font-weight: 600; margin-top: -25px;   text-align: center;" id="call">
                &nbsp;&nbsp;&nbsp; <i class="fa fa-phone cell"></i>
                <?php if (isset($info->mobile)) {echo $info->mobile;}?></h3>
            </div>

          </div>

        </div>

      </div>

      <nav class="navbar navbar-wd" id="navbar">
        <div class="container no-pdd-lg">
          <div class="navbar-header account">
            <div class="col-xs-2 flo-n"> <button type="button" class="navbar-toggle" id="slide-nav"> <span
                  class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button></div>
            <div class="col-xs-7" align="center"><a class="logo" href="<?=base_url();?>"
                style="float:none; display: inline-flex;">
                <img src="<?=base_url();?>assets/images/logo/logo2.png" alt="Ansvel logo"
                  style="background-color: white;border-radius: 50%;" />
                <img src="<?=base_url();?>assets/images/logo/ansvel_text1.png" alt="Ansvel logo"
                  style="width: 120px;height: auto;" />
              </a></div>
          </div>

          <div class="pull-left search-focus-fade no-pdd-lg" id="slidemenu">



            <div class="slidemenu-close visible-xs"><span class="icon icon-clear"></span></div>

            <!--START: FRAME_CATEGORY-->

            <ul class="nav navbar-nav mobile">
              <li class="account">
                <a href="<?=base_url();?>welcome/unset_city" style="color: #fff;">
                  <span class="link-name">
                    <i class="fa fa-map-marker ic" style="color: #fff;"></i>

                    <?=$cities->name;?>
                </a>
                </span>
              </li>
              <li><a href="<?=base_url();?>"><span class="link-name"><i class="fa fa-home fa-2x ic"></i> <span
                      class="account"> Home</span> </span></a></li>


              <?php
$heading = $this->db->get_where("main_heading", array("status" => 'enable'))->result();
foreach ($heading as $heading) {

    ?>




              <?php

    if ($heading->id == '1') {

        ?>

              <li><a href="<?=base_url();?>stitching" class="dropdown-toggle"><span class="link-name"><span
                      class="account ic"><img
                        src="<?=base_url();?>img/01-stitching-png-icon.png"></span><?=$heading->heading_name;?> <i
                      class="fa fa-angle-down"></i></span></a></li>

              <li class="al-subcategory">
                <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">
                  <?php $mcat = $this->db->get("mcategory")->result();
        foreach ($mcat as $mcat) {?>
                  <li><a
                      href="<?=base_url();?>stitching/<?=lcfirst($mcat->mcat_name);?>/<?=$mcat->mid;?>"><?=$mcat->mcat_name;?></a>
                  </li>
                  <?php }?>

                </ul>

                <?php }

    if ($heading->id == '2') {

        ?>

              <li>
              <li><a href="<?=base_url();?>fabric" class="dropdown-toggle"><span class="link-name"><span
                      class="account ic"><img
                        src="<?=base_url();?>img/02-fabric-png-icon.png"></span><?=$heading->heading_name;?> <i
                      class="fa fa-angle-down"></i></span></a></li>
              <li class="al-subcategory">
                <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">
                  <?php $mcat = $this->db->get("mcategory")->result();

        foreach ($mcat as $mcat) {?>

                  <li><a
                      href="<?=base_url();?>fabric/<?=lcfirst($mcat->mcat_name);?>/<?=$mcat->mid;?>"><?=$mcat->mcat_name;?></a>
                  </li>

                  <?php }?>
                </ul>
              <li>


                <?php $mcat = $this->db->get("mcategory")->result();

        foreach ($mcat as $mcat) {

            ?>


                <!--  <li><a href="#" class="cat wave"><span class="link-name"><?=$mcat->mcat_name;?></span></a></li>


                        <li class="al-subcategory">



                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">



                                 <?php $subcat = $this->db->get_where("category", array("mid" => $mcat->mid))->result();

            foreach ($subcat as $subcat) {?>



                                <li><a href="<?=base_url();?>Welcome/shop/<?=$subcat->cid;?>"><?=$subcat->cat_name;?></a></li>



                                <?php }?>


                            </ul>



                        <li>-->

                <?php }?>

                <?php }

    if ($heading->id == '3') {

        ?>

              <li><a href="<?=base_url();?>uniform" class="dropdown-toggle"><span class="link-name"><span
                      class="account ic"><img
                        src="<?=base_url();?>img/03-uniform-png-icon.png"></span><?=$heading->heading_name;?> <i
                      class="fa fa-angle-down"></i></span></a>
              </li>

              <li class="al-subcategory">
                <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">
                  <li><a href="<?=base_url();?>uniform/girls">Girls</a></li>
                  <li><a href="<?=base_url();?>uniform/boys">Boys</a></li>

                </ul>
              </li>


              <li class="al-subcategory">



                <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">

                </ul>



              </li>

              <?php }
    if ($heading->id == '4') {

        ?>


              <li><a href="<?=base_url();?>accessories" class="dropdown-toggle"><span class="link-name"><span
                      class="account ic"><img src="<?=base_url();?>img/04-accessories-png-icon.png"> </span>
                    <?=$heading->heading_name;?> <i class="fa fa-angle-down"></i></span></a></li>

              <li class="al-subcategory">



                <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">


                  <?php
$this->db->limit(3);
        $mcat = $this->db->get("mcategory")->result();

        foreach ($mcat as $mcat) {?>


                  <li><a
                      href="<?=base_url();?>accessories/<?=lcfirst($mcat->mcat_name);?>/<?=$mcat->mid;?>"><?=$mcat->mcat_name;?></a>
                  </li>



                  <?php }?>

                </ul>



              </li>

              <?php }

    if ($heading->id == '5') {

        ?>

              <li><a href="<?=base_url();?>altration" class="dropdown-toggle"><span class="link-name"><span
                      class="account ic"><img
                        src="<?=base_url();?>img/05-alteration-png-icon.png"></span><?=$heading->heading_name;?> <i
                      class="fa fa-angle-down"></i></span></a></li>

              <li class="al-subcategory">

                <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">
                  <?php $mcat = $this->db->get("mcategory")->result();

        foreach ($mcat as $mcat) {?>


                  <li><a
                      href="<?=base_url();?>altration/<?=lcfirst($mcat->mcat_name);?>/<?=$mcat->mid;?>"><?=$mcat->mcat_name;?></a>
                  </li>



                  <?php }?>

                </ul>


              </li>

              <?php }

    if ($heading->id == '6') {

        ?>

              <li><a href="<?=base_url();?>bridal" class="cat wave"><span class="link-name"><?=$heading->heading_name;?>
                  </span></a></li>
              <?php }

    if ($heading->id == '7') {

        ?>

              <li><a class="dropdown-toggle"><span class="link-name"><span class="account ic"><img
                        src="<?=base_url();?>img/06-online-boutique-png-icon.png"> </span><?=$heading->heading_name;?>
                    <i class="fa fa-angle-down"></i></span></a></li>



              <li class="al-subcategory">



                <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">


                  <?php
$this->db->limit(3);
        $mcat = $this->db->get("mcategory")->result();

        foreach ($mcat as $mcat) {?>


                  <li><a
                      href="<?=base_url();?>online-boutique/<?=lcfirst($mcat->mcat_name);?>/<?=$mcat->mid;?>"><?=$mcat->mcat_name;?></a>
                  </li>



                  <?php }?>

                </ul>

              </li>

              <?php }

    if ($heading->id == '8') {

        ?>


              <li><a class="dropdown-toggle"><span class="link-name"><?=$heading->heading_name;?> <i
                      class="fa fa-angle-down"></i></span></a></li>

              <li class="al-subcategory">

                <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">


                  <?php
$this->db->limit(3);
        $mcat = $this->db->get("mcategory")->result();

        ?>




                </ul>



              </li>

              <?php }

    if ($heading->id == '9') {

        ?>


              <li><a href="<?=base_url();?>how-it-works"><span class="link-name"><?=$heading->heading_name;?></span></a>
              </li>

              <?php }
    if ($heading->id == "10") {
        ?>


              <li><a href="<?=base_url();?>faq"><span class="link-name"><?=$heading->heading_name;?></span></a>

              </li>


              <?php if ($this->session->userdata("userid")) {?>

              <li id="username_session"><a href="#" class="dropdown-toggle"><span
                    class="link-name"><?=$this->session->userdata("name");?><i class="fa fa-angle-down"></i></span></a>
              </li>



              <li class="al-subcategory">



                <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">
                  <li><a href="<?=base_url();?>welcome/orders">My Orders</a></li>
                  <li><a href="<?=base_url();?>welcome/cancel_orders">Cancel Orders</a></li>
                  <li><a href="<?=base_url();?>welcome/manage_profile">My Account</a></li>
                  <li><a href="<?=base_url();?>welcome/logout"><i class="fa fa-sign-out"></i> Logout</a></li>

                </ul>

              </li>




              <?php } else {?>




              <li class="account "><a href="<?=base_url();?>welcome/login"><span class="link-name">Login</span></a></li>

              <!--  <li class="account "><a href="<?=base_url();?>welcome/login"><span class="link-name">Sign Up</span></a></li> -->
              <?php }?>



              <li class="account "><a href="<?=base_url();?>Welcome/donate"><span class="link-name">Donate</span></a>
              </li>

              <?php }?>




              <?php }?>
            </ul>

          </div>

          <div class="col-xs-3">
            <div class="header__dropdowns1">



              <div class="header__search pull-right">



                <a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button search-open"><span
                    class="icon icon-search"></span></a> </div>

              <div class="dropdown pull-right sc ab">

                <b style="color:#000;"></b> <a href="#"
                  class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button"
                  data-toggle="dropdown" style="color:#000;"><i class="fa fa-cart-plus fa-2x mcart"></i><span
                    id="count_cart" class="badge badge--menu mcart"><?=$this->cart->total_items();?></span></a>



                <?php if ($this->cart->contents()) {?>

                <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart2">

                  <div class="shopping-cart__settings"><a href="#" class="fa fa-cart-plus emptycart"> Empty Cart</a>
                  </div>

                  <div class="shopping-cart__top text-uppercase">Cart (<?=$this->cart->total_items();?>)</div>

                  <ul>

                    <?php foreach ($this->cart->contents() as $cart) {?>

                    <li class='shopping-cart__item'>

                      <div class="shopping-cart__item__image pull-left"><a href="#">

                          <?php if ($cart['custom'] == "") {?>

                          <img src="<?=base_url();?>assets/images/fabrics/<?=$cart['img'];?>" alt="" /></a>



                        <?php } else {?>

                        <img src="<?=base_url();?>assets/images/fabrics/bag.png" alt="" /></a>

                        <?php }?></div>

                      <div class="shopping-cart__item__info">

                        <div class="shopping-cart__item__info__title">

                          <h2 class="text-uppercase"><a href="#"><?=$cart['name'];?></a></h2>

                        </div>

                        <div class="shopping-cart__item__info__option">Qty: <?=$cart['qty'];?></div>

                        <div class="shopping-cart__item__info__option">SubTotal: &#8358;
                          <?=$cart['subtotal'];?>/-</div>

                        <!-- <div class="shopping-cart__item__info__price">&#8358; <?=$cart['subtotal'];?>/-</div>-->



                        <div class="shopping-cart__item__info__delete" id="<?=$cart['rowid'];?>">

                          <a href="#" class="icon icon-clear"></a></div>

                      </div>

                    </li>

                    <?php }?>

                  </ul>

                  <div class="shopping-cart__bottom">

                    <div class="pull-left"><span class="shopping-cart__total">

                        &#8358; <?=$this->cart->total();?></span></div>

                    <div class="pull-right">

                      <a href="<?=base_url();?>cart" class="btn btn--wd text-uppercase" style="color:#fff;">Cart</a>

                      <a href="<?=base_url();?>checkout" class="btn btn--wd text-uppercase"
                        style="color:#fff;">Checkout</a>





                    </div>

                  </div>

                </div>

                <?php } else {?>

                <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart2">



                  <div class="shopping-cart__top text-uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                      class="shopping-cart__total">

                      <i class="fa fa-shopping-bag fa-2x"></i>

                      Empty Cart</span></div>



                </div><?php }?></div>

              <a href="tel:9644409191" class="phonecell">
                <div class="pull-right" style="margin-top: 10px;">

                  <b style="color:#fff;"></b><a href="tel:9644409191" style="color:#000;"><i class="fa fa-phone fa-2x"
                      style="color:#fff;"></i></a>




                </div>
              </a>

            </div>
          </div>

        </div>

      </nav>

    </header>