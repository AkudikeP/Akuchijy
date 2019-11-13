<!doctype html>


<html class="no-js">




<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->



<head>



<meta http-equiv="X-UA-Compatible" content="IE=edge">



<title>Welcome to Mobile Darji </title>



<link rel="canonical" href="index.html" />



<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

<!--<link href="https://fonts.googleapis.com/css?family=Raleway:300" rel="stylesheet">
-->

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">



<style>
.dropbtn {
   background-color: transparent;
    color: white;
    /* padding: 16px; */
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>





<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/common-html5/quicksearch/quicksearchedd7.css" type="text/css" />



<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/common-html5/css/layoutedd7.css" type="text/css" media="all" />



<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/common-html5/css/responsiveedd7.css" type="text/css" media="screen" />



<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/waves/waves.css">



<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:600&subset=latin-ext" rel="stylesheet">



<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/slick/slick.css">



<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/slick/slick-theme.css">



<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap-select/bootstrap-select.css">



<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/parallax-carousel/pcarousel.min.css" >











<link rel="stylesheet" href="<?php echo base_url(); ?>css/style-colors.css">







 <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" >



        



       



        



         







        <!--- jQuery -->



        



      



 



        <!-- Queryloader -->



             



  



  



 



        <link rel="stylesheet" href="<?php echo base_url(); ?>css/magnific-popup.css">















<!-- Web Fonts  -->



<!--<link href=https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">-->



<!-- Icon Fonts  -->



<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/font/styleedd7.css">



<!-- Vendor CSS -->



<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/waves/wavesedd7.css">



<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/slick/slickedd7.css">



<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/slick/slick-themeedd7.css">



<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/bootstrap-select/bootstrap-selectedd7.css">



<!-- Custom CSS -->



<link rel="StyleSheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/css/defaultedd7.css" type="text/css" />



<link rel="StyleSheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/welldone-3dcart/3dcartedd7.css" type="text/css" />



<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->



<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/rs-plugin/css/settingsedd7.css" />



<!-- Head Libs -->







<!--[if IE]>



<link rel="stylesheet" href="assets/templates/welldone-html5/css/ie.css?vcart=7.2.4">



<![endif]-->



<!--[if lte IE 8]>



<script src="assets/templates/welldone-html5/vendor/respond/respond.js?vcart=7.2.4"></script>



<script src="assets/templates/welldone-html5/vendor/excanvas/excanvas.js?vcart=7.2.4"></script>



<![endif]-->







<!-- jQuery 1.10.1-->

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script src="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/jquery/jqueryedd7.js"></script>







<script>

	   				var jqc = $.noConflict();

					jqc(document).ready(function(){
						
						jqc(".emptycart").click(function(e){e.preventDefault();
							jqc.ajax({

						 type: "POST",

						 url: '<?php echo base_url();?>Welcome/emptycart',

						// data: {"rid":rid},

						 success: function(response){

							 jqc("#mycart").html("<h3>Cart is Empty.</h3>");

							 }

						 });
						});

	
						jqc(".shopping-cart__item__info__delete").click(function(e){e.preventDefault();

							var rid=jqc(this).attr("id");

							jqc.ajax({

						 type: "POST",

						 url: '<?php echo base_url();?>index.php/Welcome/removecart',

						 data: {"rid":rid},

						 success: function(response){

							 jqc("#mycart").html(response);

							 }

						 });

						});

					});

	   </script>

















</head><body class=" catalog-category-view categorypath-women-new-arrivals-html category-new-arrivals store-default" style="overflow-x:hidden;">







<!-- Modal Search -->



<div class="overlay overlay-scale">



    <button type="button" class="overlay-close"> <span class="icon icon-clear"></span> </button>



    <div id="searchBox" class="overlay__content">



        <form id="search-form" class="search-form outer" method="get" name="searchForm" action="#">



            <div class="input-group input-group--wd">



                <input type="text" class=" input--full search-text" placeholder="Search" name="keyword" id="searchlight">



                <span class="input-group__bar"></span> </div>



                <button class="btn btn--wd text-uppercase wave waves-effect">Search</button>



        </form>











        







    </div>



</div>



<!-- / end Modal Search -->







<div id="mainContainer" class="wrapper">



    <header class="header header--sticky">



        <div class="header-line hidden-xs tophead" >



            <div class="container">

<div class="col-md-11">



                <div class="pull-right mb1" style="
    margin-right: -67px; text-transform:uppercase;
">



                    <div>



                        <div id="FRAME_MENU" ><!--START: FRAME_MENU-->



                        <div class="h-links-list" >



                            <ul class="mobile1">



                                <!--START: menuitems_view-->



                                <li ><a href="<?php echo base_url(); ?>index.php" class="menu" target="_self">Home</a></li>



                                



                                <li><a href="#" class="menu" target="_self">Product</a></li>



                                



                                <li ><a href="#" class="menu" target="_self">Company </a></li>



                                



                                <li><a href="#" class="menu" target="_self">Blog</a></li>



                                
<?php if($this->session->userdata("userid")){?>

        

         <!--<li class="user-links__item"><p style="color:black;">Hi, <?php echo $this->session->userdata("name");?></p> </li>-->


             <li class="user-links__item"><a href="<?php echo base_url();?>index.php/welcome/orders">My Orders</a></li>

               <li class="user-links__item"><a href="<?php echo base_url();?>index.php/welcome/logout" ><i class="fa fa-sign-out"></i> Logout</a></li>
               
               

        <?php }else{?>

           
            

<li class="user-links__item"><a href="<?php echo base_url();?>index.php/welcome/login">Login</a></li>


             <li class="user-links__item"><a href="<?php echo base_url();?>index.php/welcome/login">Sign Up</a></li>

<?php }?>
<li class="user-links__item"><a href="<?php echo base_url();?>index.php/welcome/login" style="font-weight:600; color:#3373c8;">Donate</a></li>


                                



                                <!--END: menuitems_view-->



                            </ul>



                        </div>



                        <!--END: FRAME_MENU--></div>



                    </div>



                </div>

</div>



              



            </div>



        </div>



        <div class="header-line hidden-xs">



            <div class="container">



                <div class="row">



                <div class="col-md-2 mb" align="right" ><a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>assets/images/logo2.jpg" style="
    margin-top: -29px;
"></a></div>



                <div class="col-md-6 pull-left">



                <form action="" style="

    display: inline-flex; float:right;

">



                <input type="text" class="form-control mse" placeholder="Search" style="height: 31px; border-radius: 0px;width: 452px;"><button type="submit" class="btn btn--wd text-uppercase wave waves-effect" value="Go" style="

    height: 31px;

   

    padding: 8px;

    width: 65px;

    /* border: none; */

    border-radius: 0px;

"><i class="fa fa-search"></i></button>



                </form>



                </div>

                <div class="col-md-1">



                <div class="header__dropdowns-container">



            <div class="header__dropdowns">

						

						<div class="header__cart pull-left" >

							

							<div class="dropdown pull-right sc">

								<b style="color:#000;">CART</b> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button" data-toggle="dropdown" style="color:#424242;"><i class="fa fa-shopping-cart fa-2x"></i><span id="citems" class="badge badge--menu"><?php echo $this->cart->total_items();?></span></a>

								

								<?php if($this->cart->contents()){?>

                                <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart">

									<div class="shopping-cart__settings"><a href="#" class="fa fa-cart-plus emptycart"> Empty Cart</a></div>

									<div class="shopping-cart__top text-uppercase">Your Cart (<?php echo $this->cart->total_items();?>)</div>

									<ul>

										<?php foreach($this->cart->contents() as $cart){?>

                                        <li class='shopping-cart__item'>

											<div class="shopping-cart__item__image pull-left"><a href="#">

                                           <?php if($cart['custom']==""){?>

                                            <img src="<?php echo base_url();?>assets/images/fabrics/<?php echo $cart['img'];?>" alt=""/></a>

                                           

                                            <?php }else{?>

                                             <img src="<?php echo base_url();?>assets/images/fabrics/bag.png" alt=""/></a>

                                            <?php }?></div>

											<div class="shopping-cart__item__info">

												<div class="shopping-cart__item__info__title">

													<h2 class="text-uppercase"><a href="#"><?php echo $cart['name'];?></a></h2>

												</div>

                                             

                                

                <div class="shopping-cart__item__info__option">Qty: <?php echo $cart['qty'];?></div>

                  <div class="shopping-cart__item__info__option">SubTotal: &#8358; <?php echo $cart['subtotal'];?>/-</div>

                   <!-- <div class="shopping-cart__item__info__price">&#8358; <?php echo $cart['subtotal'];?>/-</div>-->

                  

                    <div class="shopping-cart__item__info__delete" id="<?php echo $cart['rowid'];?>">

                    <a href="#" class="icon icon-clear"></a></div>

											</div>

										</li>

										<?php }?>

									</ul>

									<div class="shopping-cart__bottom">

										<div class="pull-left"><span class="shopping-cart__total">

                                        &#8358; <?php 
										if($this->session->userdata("dis")){
											echo $this->cart->total()-$this->session->userdata("dis");
										}
										else{
											echo $this->cart->total();}?></span></div>

										<div class="pull-right">

			<a href="<?php echo base_url();?>welcome/cart" class="btn btn--wd text-uppercase" style="color:#fff;">Cart</a>

            <a href="<?php echo base_url();?>welcome/checkout" class="btn btn--wd text-uppercase" style="color:#fff;">Checkout</a>

           

           

										</div>

									</div>

								</div>

                                <?php }else{?>

                                <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart">

									

			<div class="shopping-cart__top text-uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="shopping-cart__total"> 

            <i class="fa fa-shopping-bag fa-2x"></i> 

            Empty Cart</span></div>

									

								</div>

                                <?php }?>

                               

							</div>

						</div>        

</div>



        </div>



         



                </div>

                <div class="col-md-3 "><h3 style="margin-top: 2%; color:#000; font-weight: 600; margin-right: 50px; text-align: center;">&nbsp;&nbsp;&nbsp; <i class="fa fa-phone" style="color:#424242; font-weight: 600;"></i> 1800299300</h3> </div>



                



                



               



                </div>



                



            </div>



        </div>



        



        <nav class="navbar navbar-wd" id="navbar">



            <div class="container">



                <div class="navbar-header">



                    <button type="button" class="navbar-toggle" id="slide-nav"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>



                    <a class="logo" href="<?php echo base_url();?>">  <img class="logo-mobile" src="<?php echo base_url(); ?>assets/images/logom.png" alt=""/>  </a>



                </div>

                



                



                <div class="pull-left search-focus-fade" id="slidemenu">



                    <div class="slidemenu-close visible-xs"><span class="icon icon-clear"></span></div>







                    <!--START: FRAME_CATEGORY-->



                    <ul class="nav navbar-nav mobile">


  <li><a href="#" class="dropdown-toggle"><span class="link-name">Stitching <i class="fa fa-angle-down"></i></span></a></li>



                        



                        <li class="al-subcategory">



                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">



                                <?php $mcat=$this->db->get("mcategory")->result();



						foreach($mcat as $mcat){?>


                                <li><a href="<?php echo base_url(); ?>index.php/Welcome/custom/<?php echo $mcat->mid; ?>"><?php echo $mcat->mcat_name; ?></a></li>



                                <?php } ?>



                                



                                



                            </ul>



                        <li>
                        
                         <li><a href="#" class="dropdown-toggle"><span class="link-name">Fabric <i class="fa fa-angle-down"></i></span></a></li>



                        



                        <li class="al-subcategory">



                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">



                                <?php $mcat=$this->db->get("mcategory")->result();



						foreach($mcat as $mcat){?>


                                <li><a href="<?php echo base_url(); ?>index.php/Welcome/shop/<?php echo $mcat->mid; ?>"><?php echo $mcat->mcat_name; ?></a></li>



                                <?php } ?>



                                



                                



                            </ul>



                        <li>
                        



                        <?php $mcat=$this->db->get("mcategory")->result();



						foreach($mcat as $mcat){



							



							 ?>



                      <!--  <li><a href="#" class="cat wave"><span class="link-name"><?php echo $mcat->mcat_name; ?></span></a></li>



                        



                        <li class="al-subcategory">



                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">



                                 <?php $subcat=$this->db->get_where("category",array("mid"=>$mcat->mid))->result();



						foreach($subcat as $subcat){?>



                                <li><a href="<?php echo base_url(); ?>index.php/Welcome/shop/<?php echo $subcat->cid; ?>"><?php echo $subcat->cat_name; ?></a></li>



                                <?php } ?>



                                



                                



                            </ul>



                        <li>-->



                        



                        <?php }?>



                       



                        



                        



                      



                        



                        



                       

    

  
                         <li ><a href="#" class="dropdown-toggle" ><span class="link-name">Uniforms<i class="fa fa-angle-down"></i></span></a>                         
                        </li>

                        <li class="al-subcategory">
                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">         
                                <li><a href="<?php echo base_url(); ?>index.php/Welcome/uniform_shop/Girls">Girls</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/Welcome/uniform_shop/Boys">Boys</a></li>                            

                            </ul>
                        </li>

                      


                        



                        <li class="al-subcategory">



                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">



                                



                            </ul>



                        </li>



                        



                        


<li><a  href="#" class="dropdown-toggle"><span class="link-name">Accessories <i class="fa fa-angle-down"></i></span></a></li>



                        



                        <li class="al-subcategory">



                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">


                            <?php
                            $this->db->limit(2);
                             $mcat=$this->db->get("mcategory")->result();



                        foreach($mcat as $mcat){?>


                                <li><a href="<?php echo base_url(); ?>index.php/Welcome/accessories_shop/<?php echo $mcat->mid; ?>"><?php echo $mcat->mcat_name; ?></a></li>



                                <?php } ?>



                                



                            </ul>



                        </li>



                        



                        



                        <li class="dropdown-toggle"><a href="#" class="dropdown-toggle"><span class="link-name">Alteration <i class="fa fa-angle-down"></i></span></a></li>

<li class="al-subcategory">

                        <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">
 <?php $mcat=$this->db->get("mcategory")->result();



						foreach($mcat as $mcat){?>


                                <li><a href="<?php echo base_url(); ?>index.php/Welcome/altration/<?php echo $mcat->mid; ?>"><?php echo $mcat->mcat_name; ?></a></li>



                                <?php } ?>



                                



                            </ul>


</li>
 <li><a href="<?php echo base_url(); ?>index.php/Welcome/bridal" class="cat wave"><span class="link-name">Bridal  </span></a></li>
                       



                        <li ><a href="#" ><span class="link-name">How It Works</span></a>
</li>





                         <li ><a href="<?php echo base_url(); ?>index.php/Welcome/faq" ><span class="link-name">Faq's</span></a>

                        </li>



                       
                        


             

			 

            

                <li class="account "><a href="<?php echo base_url();?>index.php/welcome/login"><span class="link-name">Login</span></a></li>

                <li class="account "><a href="<?php echo base_url();?>index.php/welcome/login"><span class="link-name">Sign Up</span></a></li>

                <li class="account "><a href="#"><span class="link-name">Donate</span></a></li>

             


          

             



               


                    </ul>



                    <!--END: FRAME_CATEGORY-->















                </div>

               



                <div class="header__dropdowns1">

               

        <div class="header__search pull-right"> 



<a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button search-open"

><span class="icon icon-search"></span></a> </div>

        <div class="dropdown pull-right sc">

								<b style="color:#000;"></b> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button" data-toggle="dropdown" style="color:#000;"><i class="fa fa-cart-plus fa-2x mcart" ></i><span id="citems" class="badge badge--menu mcart" ><?php echo $this->cart->total_items();?></span></a>

								

								<?php if($this->cart->contents()){?>

                                <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart">

									<div class="shopping-cart__settings"><a href="#" class="fa fa-cart-plus emptycart"> Empty Cart</a></div>

									<div class="shopping-cart__top text-uppercase">Your Cart (<?php echo $this->cart->total_items();?>)</div>

									<ul>

										<?php foreach($this->cart->contents() as $cart){?>

                                        <li class='shopping-cart__item'>

											<div class="shopping-cart__item__image pull-left"><a href="#">

                                           <?php if($cart['custom']==""){?>

                                            <img src="<?php echo base_url();?>assets/images/fabrics/<?php echo $cart['img'];?>" alt=""/></a>

                                           

                                            <?php }else{?>

                                             <img src="<?php echo base_url();?>assets/images/fabrics/bag.png" alt=""/></a>

                                            <?php }?></div>

											<div class="shopping-cart__item__info">

												<div class="shopping-cart__item__info__title">

													<h2 class="text-uppercase"><a href="#"><?php echo $cart['name'];?></a></h2>

												</div>

                                             

                                

                <div class="shopping-cart__item__info__option">Qty: <?php echo $cart['qty'];?></div>

                  <div class="shopping-cart__item__info__option">SubTotal: &#8358; <?php echo $cart['subtotal'];?>/-</div>

                   <!-- <div class="shopping-cart__item__info__price">&#8358; <?php echo $cart['subtotal'];?>/-</div>-->

                  

                    <div class="shopping-cart__item__info__delete" id="<?php echo $cart['rowid'];?>">

                    <a href="#" class="icon icon-clear"></a></div>

											</div>

										</li>

										<?php }?>

									</ul>

									<div class="shopping-cart__bottom">

										<div class="pull-left"><span class="shopping-cart__total">

                                        &#8358; <?php echo $this->cart->total();?></span></div>

										<div class="pull-right">

			<a href="<?php echo base_url();?>welcome/cart" class="btn btn--wd text-uppercase" style="color:#fff;">Cart</a>

            <a href="<?php echo base_url();?>welcome/checkout" class="btn btn--wd text-uppercase" style="color:#fff;">Checkout</a>

           

           

										</div>

									</div>

								</div>

                                <?php }else{?>

                                <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart">

									

			<div class="shopping-cart__top text-uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="shopping-cart__total"> 

            <i class="fa fa-shopping-bag fa-2x"></i> 

            Empty Cart</span></div>

									

								</div>

                                <?php }?>

                               

							</div>

        
        
        <div class="dropdown pull-right sc" style="margin-top: 10px;">

								<b style="color:#fff;"></b> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button" data-toggle="dropdown" style="color:#000;"><i class="fa fa-phone fa-2x" style="color:#fff;"></i></a>

								

								

                                <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart">

									

			<div class="shopping-cart__top text-uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="shopping-cart__total"> 

            

           Toll Free  1800299300</span></div>

									

								</div>

                               

                               

							</div>

      </div>



            </div>



        </nav>



    </header>



    