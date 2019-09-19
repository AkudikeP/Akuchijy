<script type="text/javascript">

		$(document).ready(function () {
		$(".imgLiquidFill").imgLiquid({fill:true});

	});

	</script>

    <style>

	.boxSep{
		background-color:#ffffff;


		margin-right: 5px;

	}

	.sizes-example1 {
	width: 100%;
	height: 350px !important;

}

.sizes-example {
	float: left;

	margin-left: 1%;
}

	.LogSep{
		margin:10px;
	}
	@media (max-width:380px){

   .sizes-example1 {
  width: 100%;
  height: 220px !important;

}}
@media only screen and (max-device-width: 409px) and (min-device-width: 381px){
.sizes-example1 {
  width: 100%;
  height: 235px !important;

}}
@media only screen and (max-device-width: 500px) and (min-device-width: 410px) and (orientation: portrait){
  .sizes-example1 {
  width: 100%;
  height: 265px !important;
}}

.fib
  {
    width:336px;
  }
	}

	.tbsss:hover
	{
		color:#FFF !important;
	}


	</style>
<div id="pageContent">

<div style="padding:10px;"> </div>

    <!-- Content section -->

    <div id="main" class="haslayout padding-section products-listing">

      <div class="container">

        <div class="art-catalogue">

<center><h3 class="main_heading"><?php echo $mcat->title ?></h3></center>
<center class="sub_heading"><?php echo $mcat->description ?></center>

        <?php foreach($cat as $cat){

			$i=rand(1,9);
      $catname = $cat->mcat_name;
			?>

            <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6 " align="center">



          <div class="product-category">

                      <div class="sizes-example sizes-example1" >
                       <a href="<?php echo base_url();?>stitching/<?php echo lcfirst($cat->mcat_name);?>/<?php echo $cat->mid;?>">
                        <img src="<?php echo base_url();?>assets/images/services/<?php echo $mcat->$catname;?>" alt="" style="max-height: 330px; width: 220px;"/></a>
                      </div>

                    <div class="product-category__hover caption"></div>


                    </div>
                    <div class="text-center fabric" style="
    margin:10px;
"><br>
<h5 class="product-category__info__ribbon__title" > <?php echo $catname;?></h5>

              </div>

									</div>



        <?php }?>





        </div>

      </div>

   </div>

  </div>
   <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/2.1.0/jquery.imagesloaded.min.js"></script>
   <script src="<?php echo base_url(); ?>js/jquery-imagefill.js"></script>
  <script>

            // SIMPLE DEMO
            $('.simple-demo')
                // call image fill throttled to 30 fps (default is only 10 fps, works for most situations)
                .imagefill({throttle:1000/60})
                // add looped animation queue
                .queue(function(next) {
                    $(this).animate({height:300});
                    $(this).queue(arguments.callee);
                    next();
                });

            // GRID DEMO
            $('.grid-quarter').imagefill();
            $('.grid-demo').queue(function(next) {
                $(this).animate({width:320},4000).animate({width:640},4000);
                $(this).queue(arguments.callee);
                next();
            });

            // VARIED SIZES EXAMPLE
            $('.sizes-example').imagefill({runOnce:true});

            // Prevent FOUC
            $('.no-fouc').removeClass('no-fouc');
        </script>
          <script type="text/javascript">
            document.documentElement.className = 'no-fouc';
        </script>
   <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
        <script src="<?php echo base_url();?>assets/js/custom.js"></script>
