<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<title><?=$title;?></title>
<section>
    <h5 class="tb-text-center tb-py-2 tb-bg-primary">New and Exclusive! Debut of Ansvel's Couture! 
        <a href="#" class="tb-text-white">Register for early access.</a>
    </h5>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>assets/lib/bootstrap/dist/css/ansvel-bootstrap.css" />
    <div class="tb-container-fluid tb-position-relative">
        <img src="<?=base_url();?>assets/images/profile_images/<?=$designer['image'];?>"
        class="tb-d-block tb-position-absolute tb-rounded-circle"
        style="max-width: 150px;bottom: -50px;right: calc(50% - 75px);border: 5px solid #fff">
        <img src="<?=base_url();?>assets/images/profile_images/<?=$designer['banner'];?>" class="tb-d-block tb-mx-auto" style="max-height: 400px;">
    </div>
</section>
<section style="margin-top: 7.5rem;margin-bottom: 7.5rem;">
    <div class="tb-container">
        <div class="tb-row">
            <div class="tb-col-md-3">
                <div style="line-height: 1em; font-size: 120%; letter-spacing:1px; font-family: 'Lato', sans-serif !important;">
                    <?=$designer['vendor_name'];?><br><br>
                    Registered <?=substr($designer['reg_date'], 0, 4);?>.<br><br>
                    <?=$designer['location'];?>
                </div>
            </div>
            <div class="tb-col-md-9">
                <h1 class="tb-mx-auto tb-mb-4">About <?=$designer['vendor_name'];?></h1>
                <div class="tb-text-justify" style="line-height: 1.5em; font-size: 140%; letter-spacing:1px; font-family: 'Lato', sans-serif !important;">
                    <?=$designer['bio'];?>
                </div>
            </div>
        </div>
    </div>
</section>
<section style="margin-bottom: 7.5rem;">
    <div class="tb-container">
    <h1 class="tb-mx-auto tb-mb-4">Designs by <?=$designer['vendor_name'];?></h1>
        <div class="tb-row">
            <?php foreach($designs as $design):?>
                <div class="tb-col-6 tb-col-md-4 tb-col-lg-3">
                    <img src="<?=base_url();?>assets/images/catalogue/<?=$design['front'];?>" class="tb-d-block tb-w-100">
                </div>   
            <?php endforeach;?>
        </div>
    </div>
</section>
<script type="text/javascript" src="<?=base_url();?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script>