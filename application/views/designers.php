<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<title><?=$title;?></title>
<section>
<h5 class="tb-text-center tb-py-2 tb-bg-primary">New and Exclusive! Debut of Ansvel's Couture! 
    <a href="#" class="tb-text-white">Register for early access.</a>
</h5>
<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url();?>assets/lib/bootstrap/dist/css/ansvel-bootstrap.css" />
<div class="tb-container tb-mt-4 text-center">
    <h1 class="tb-text-center" style="font-size: 2.615em;">DESIGNERS</h1>
    <div class="tb-row tb-my-5">
        <?php foreach($designers as $designer): ?>
            <div class="tb-col-md-6">
                <a href="<?=base_url();?>designers/<?=$designer->url;?>">
                    <img src="<?=base_url();?>assets/images/profile_images/<?=$designer->banner;?>" class="tb-d-block tb-w-100">
                    <div class="tb-font-weight-bold tb-my-5 tb-text-primary" style="line-height: 1.5em; font-size: 140%; text-align:center; letter-spacing:1.5px; font-family: 'Lato', sans-serif !important;">
                        <?=$designer->vendor_name;?>
                    </div>
                </a>
                <div class="tb-text-justify" style="line-height: 1.5em; font-size: 140%; letter-spacing:1px; font-family: 'Lato', sans-serif !important;">
                    <?=$designer->bio;?> <a href="<?=base_url();?>designers/<?=$designer->url;?>" class="tb-text-primary">See my store..</a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
</section>
<script type="text/javascript" src="<?=base_url();?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script>