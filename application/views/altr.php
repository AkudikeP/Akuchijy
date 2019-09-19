 <style>
	.mark1{border:3px solid #3373c8;
	}
	.sizes-example1 {
	width: 100%;
	height: 350px !important;

}

@media (max-width:412px){

   .sizes-example1 {
  width: 100%;
  height: 240px !important;

}}
@media only screen and (max-device-width: 736px) and (min-device-width: 410px) and (orientation: portrait){
  .sizes-example1 {
  width: 100%;
  height: 265px !important;
}}


	</style>


<div class="banner-inner haslayout padding-section parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="<?php echo base_url();?>assets/images/img-404.jpg" style="padding:10px;">

			<div class="container">
            <?php

									//print_r($c);exit;
									?>





			</div>

		</div>

           <!-- <div class="breadcrumbs haslayout">

                <div class="container">

                    <span class="page-title">Online Design</span>

                    <ol class="breadcrumb">

                        <li><a href="#">Home</a></li>

                        <li class="active">Online Design</li>

                    </ol>

                </div>

            </div>-->



          <div id="main" class="haslayout padding-section products-listing">

			<div class="container">

				<div class="row">

					<div class="col-lg-12 col-md-12 col-sm-12 pull-right">

						<div id="content" class="haslayout">



							<div class="products haslayout">

								<div class="row">
<center><h3 class="main_heading"><?php echo $mcat->title ?></h3></center>
<center class="sub_heading"><?php echo $mcat->description ?></center>
									 <?php foreach($cat as $cat){
									 	$catname = $cat->mcat_name; ?>

                                    <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" align="center">

<div class="product-category" id="ttt">
                           <div class="sizes-example sizes-example1" >
                        <a href="<?php echo base_url(); ?>altration/<?php echo $cat->mcat_name;?>/<?php echo $cat->mid;?>" class="fabric" id="<?php echo $cat->mid;?>" >

       <img  src="<?php echo base_url();?>assets/images/services/<?php echo $mcat->$catname;?>" id="<?php echo $cat->mid;?>" style="max-height: 330px; width: 220px;"/>

                        </a>

                    </div>
            <div class="product-category__info">
            </div>
              <div class="text-center fabric" style="
    margin:10px;
">
<h5 class="product-category__info__ribbon__title"> <?php echo $catname;?> </h5>

              </div>

                    </div>
									</div>
                                      <?php }?>







								</div>

							</div>

							<nav class="them-pagination haslayout">



							</nav>

						</div>

					</div>



				</div>

			</div>

		</div>



            <!-- Main End -->

            <!-- Footer -->
