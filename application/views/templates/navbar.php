<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<small class="container d-none d-sm-block text-right">
    <?=$city;?>
    <a class="link-black px-1" href="<?=base_url('vendor-home')?>">Sell</a>
    <a class="link-black px-1" href="<?=base_url('blog')?>">Blog</a>
    <a class="link-black px-1" href="<?=base_url('login')?>">Login</a>
    <a class="link-black pl-1" href="<?=base_url('wishlist')?>">Wishlist</a>
    <a class="px-1" href="<?=base_url('donate')?>">Donate</a>
</small>
<div class="w-100 text-center">
    <nav class="navbar nav-container d-none d-sm-inline-flex py-0">
        <a class="navbar-brand" href="<?=base_url()?>">
            <img src="<?=base_url()?>assets/images/logo/ansvel_text2.png" width="200"
                class="align-top" alt="Ansvel logo">
        </a>
        <form class="form-inline my-2 my-lg-0 w-lg-50" action="<?=base_url('search')?>" method="get" name="q">
            <input class="form-control rounded-0" type="search" placeholder="Search Ansvel" aria-label="Search">
            <button class="btn my-2 my-sm-0 bg-black rounded-0" type="submit"><i class="fa fa-search text-white"></i></button>
        </form>
        <li class="nav-item position-relative">
            <a class="nav-link link-black" href="<?=base_url();?>">
                <span>CART</span>
                <i class="fa fa-shopping-cart fa-2x display-5"></i>
                <span class="badge badge-black position-absolute"><?=$this->cart->total_items();?></span>
            </a>
            <div class="dropdown-menu border-top-0 rounded-0 border-bottom-primary border-bottom-2 p-0 shadow" aria-labelledby="stitching">
                <a class="dropdown-item emptycart" href="javascript:void(0)">Empty cart</a>
            </div>
        </li>
        <a class="nav-link link-black display-5 pl-3 pr-0 px-0" href="<?=base_url();?>">
            <i class="fa fa-phone"></i>
            <span class="font-weight-bold">07034176342</span>
        </a>
    </nav>
</div>
<div class="border-black border-top border-bottom d-none d-sm-inline-flex w-100">
    <nav class="navbar justify-content-start nav-container py-0 navbar-3rd">
        <li class="nav-item">
            <a class="nav-link link-black" href="<?=base_url();?>"><i class="fa fa-home"></i></a>
        </li>
        <li class="nav-item position-relative">
            <a class="nav-link link-black" href="<?=base_url();?>" id="stitching" role="button">
                Stitching&nbsp;<i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu border-top-0 rounded-0 border-bottom-primary border-bottom-2 p-0 shadow" aria-labelledby="stitching">
                <a class="dropdown-item" href="<?=base_url('men')?>">Men</a>
                <a class="dropdown-item" href="<?=base_url('women')?>">Women</a>
                <a class="dropdown-item" href="<?=base_url('kids')?>">Kids</a>
            </div>
        </li>
        <li class="nav-item position-relative">
            <a class="nav-link link-black" href="<?=base_url();?>" id="fabric" role="button">
                Fabric&nbsp;<i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu border-top-0 rounded-0 border-bottom-primary border-bottom-2 p-0 shadow" aria-labelledby="fabric">
                <a class="dropdown-item" href="<?=base_url('men')?>">Men</a>
                <a class="dropdown-item" href="<?=base_url('women')?>">Women</a>
                <a class="dropdown-item" href="<?=base_url('kids')?>">Kids</a>
            </div>
        </li>
        <li class="nav-item position-relative">
            <a class="nav-link link-black" href="<?=base_url();?>" id="uniform" role="button">
                Uniform&nbsp;<i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu border-top-0 rounded-0 border-bottom-primary border-bottom-2 p-0 shadow" aria-labelledby="uniform">
                <a class="dropdown-item" href="<?=base_url('men')?>">Boys</a>
                <a class="dropdown-item" href="<?=base_url('women')?>">Girls</a>
            </div>
        </li>
        <li class="nav-item position-relative">
            <a class="nav-link link-black" href="<?=base_url();?>" id="accessories" role="button">
                Accessories&nbsp;<i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu border-top-0 rounded-0 border-bottom-primary border-bottom-2 p-0 shadow" aria-labelledby="accessories">
                <a class="dropdown-item" href="<?=base_url('men')?>">Men</a>
                <a class="dropdown-item" href="<?=base_url('women')?>">Women</a>
                <a class="dropdown-item" href="<?=base_url('kids')?>">Kids</a>
            </div>
        </li>
        <li class="nav-item position-relative">
            <a class="nav-link link-black" href="<?=base_url();?>" id="alteration" role="button">
                Alteration&nbsp;<i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu border-top-0 rounded-0 border-bottom-primary border-bottom-2 p-0 shadow" aria-labelledby="alteration">
                <a class="dropdown-item" href="<?=base_url('men')?>">Men</a>
                <a class="dropdown-item" href="<?=base_url('women')?>">Women</a>
                <a class="dropdown-item" href="<?=base_url('kids')?>">Kids</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link link-black" href="<?=base_url();?>">Bridal</a>
        </li>
        <li class="nav-item position-relative">
            <a class="nav-link link-black" href="<?=base_url();?>" id="online-boutique" role="button">
                Online boutique&nbsp;<i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu border-top-0 rounded-0 border-bottom-primary border-bottom-2 p-0 shadow" aria-labelledby="online-boutique">
                <a class="dropdown-item" href="<?=base_url('men')?>">Men</a>
                <a class="dropdown-item" href="<?=base_url('women')?>">Women</a>
                <a class="dropdown-item" href="<?=base_url('kids')?>">Kids</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link link-black" href="<?=base_url();?>">How Ansvel works</a>
        </li>
        <li class="nav-item">
            <a class="nav-link link-black" href="<?=base_url('faq');?>">FAQ</a>
        </li>
    </nav>
</div>
<nav class="navbar navbar-expand-sm bg-black d-sm-none">
    <button class="navbar-toggler btn collapsed text-white" type="button" data-toggle="collapse" data-target=".navbar-menu" 
        aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img" focusable="false">
            <title>Menu</title>
            <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
        </svg>
    </button>
    <a class="navbar-brand show navbar-menu bg-white rounded-circle" href="<?=base_url()?>">
        <img src="<?=base_url()?>assets/images/logo/logo2.png" height="40"
            class="align-top" alt="Ansvel logo">
    </a>
    <a class="nav-link text-white show navbar-menu" href="<?=base_url();?>">
        <i class="fa fa-shopping-cart fa-2x display-5"></i>
        <span class="badge badge-black position-absolute">0</span>
    </a>
    <a class="nav-link display-5 text-white show navbar-menu" href="<?=base_url();?>">
        <i class="fa fa-phone"></i>
    </a>
    <i class="fa fa-search text-white show navbar-menu"></i>
    <a class="nav-link text-white dropdown-toggle collapse navbar-menu" href="<?=base_url();?>" id="city" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ABIA
    </a>
    <div class="dropdown-menu border-top" aria-labelledby="city" style="right: 0;top: 2.5rem;">
        <a class="dropdown-item" href="<?=base_url('men')?>">Umahia</a>
        <a class="dropdown-item" href="<?=base_url('women')?>">Lagos</a>
        <a class="dropdown-item" href="<?=base_url('kids')?>">Abuja</a>
    </div>
    <div class="collapse navbar-collapse navbar-menu" id="navbar-menu">
        <ul class="navbar-nav mt-1">
            <li class="nav-item mt-1 border-top">
                <a class="nav-link text-white" href="<?=base_url();?>"><i class="fa fa-home"></i>&nbsp;HOME</a>
            </li>
            <li class="nav-item mt-1 border-top">
                <a class="nav-link text-white dropdown-toggle" href="<?=base_url();?>" id="stitching" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?=base_url();?>img/01-stitching-png-icon.png">
                    &nbsp;STITCHING
                </a>
                <div class="dropdown-menu border-top" aria-labelledby="stitching">
                    <a class="dropdown-item" href="<?=base_url('men')?>">Men</a>
                    <a class="dropdown-item" href="<?=base_url('women')?>">Women</a>
                    <a class="dropdown-item" href="<?=base_url('kids')?>">Kids</a>
                </div>
            </li>
            <li class="nav-item mt-1 border-top">
                <a class="nav-link text-white dropdown-toggle" href="<?=base_url();?>" id="fabric" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?=base_url();?>img/02-fabric-png-icon.png">
                    &nbsp;FABRIC
                </a>
                <div class="dropdown-menu" aria-labelledby="fabric">
                    <a class="dropdown-item" href="<?=base_url('men')?>">Men</a>
                    <a class="dropdown-item" href="<?=base_url('women')?>">Women</a>
                    <a class="dropdown-item" href="<?=base_url('kids')?>">Kids</a>
                </div>
            </li>
            <li class="nav-item mt-1 border-top">
                <a class="nav-link text-white dropdown-toggle" href="<?=base_url();?>" id="uniform" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?=base_url();?>img/03-uniform-png-icon.png">
                    &nbsp;UNIFORM
                </a>
                <div class="dropdown-menu" aria-labelledby="uniform">
                    <a class="dropdown-item" href="<?=base_url('men')?>">Boys</a>
                    <a class="dropdown-item" href="<?=base_url('women')?>">Girls</a>
                </div>
            </li>
            <li class="nav-item mt-1 border-top">
                <a class="nav-link text-white dropdown-toggle" href="<?=base_url();?>" id="accessories" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?=base_url();?>img/04-accessories-png-icon.png">
                    &nbsp;ACCESSORIES
                </a>
                <div class="dropdown-menu" aria-labelledby="accessories">
                    <a class="dropdown-item" href="<?=base_url('men')?>">Men</a>
                    <a class="dropdown-item" href="<?=base_url('women')?>">Women</a>
                    <a class="dropdown-item" href="<?=base_url('kids')?>">Kids</a>
                </div>
            </li>
            <li class="nav-item mt-1 border-top">
                <a class="nav-link text-white dropdown-toggle" href="<?=base_url();?>" id="alteration" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?=base_url();?>img/05-alteration-png-icon.png">
                    &nbsp;ALTERATION
                </a>
                <div class="dropdown-menu" aria-labelledby="alteration">
                    <a class="dropdown-item" href="<?=base_url('men')?>">Men</a>
                    <a class="dropdown-item" href="<?=base_url('women')?>">Women</a>
                    <a class="dropdown-item" href="<?=base_url('kids')?>">Kids</a>
                </div>
            </li>
            <li class="nav-item mt-1 border-top">
                <a class="nav-link text-white" href="<?=base_url();?>">BRIDAL</a>
            </li>
            <li class="nav-item mt-1 border-top">
                <a class="nav-link text-white dropdown-toggle" href="<?=base_url();?>" id="online-boutique" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?=base_url();?>img/06-online-boutique-png-icon.png">
                    &nbsp;ONLINE BOUTIQUE
                </a>
                <div class="dropdown-menu" aria-labelledby="online-boutique">
                    <a class="dropdown-item" href="<?=base_url('men')?>">Men</a>
                    <a class="dropdown-item" href="<?=base_url('women')?>">Women</a>
                    <a class="dropdown-item" href="<?=base_url('kids')?>">Kids</a>
                </div>
            </li>
            <li class="nav-item mt-1 border-top">
                <a class="nav-link text-white dropdown-toggle" href="<?=base_url();?>" id="rental" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    RENTAL
                </a>
                <div class="dropdown-menu" aria-labelledby="rental">
                    <a class="dropdown-item" href="<?=base_url('men')?>">Men</a>
                    <a class="dropdown-item" href="<?=base_url('women')?>">Women</a>
                    <a class="dropdown-item" href="<?=base_url('kids')?>">Kids</a>
                </div>
            </li>
            <li class="nav-item mt-1 border-top">
                <a class="nav-link text-white" href="<?=base_url();?>">HOW ANSVEL WORKS</a>
            </li>
            <li class="nav-item mt-1 border-top">
                <a class="nav-link text-white" href="<?=base_url('faq');?>">FAQ</a>
            </li>
            <li class="nav-item mt-1 border-top">
                <a class="nav-link text-white" href="<?=base_url('faq');?>">LOGIN</a>
            </li>
        </ul>
    </div>
</nav>
<!-- <div id="loading" class="bg-white w-100 h-100 position-fixed" style="top: 0px; left: 0px; z-index: 1100;">
    <div class="text-center">
        <img src="<?=base_url('assets/images/01-progress.gif');?>" class="position-relative" style="top:50vh;">
    </div>
</div> -->