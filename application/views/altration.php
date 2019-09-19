<style type="text/css">

    @media only screen and (max-width: 410px) {
.sizes-example1 {
    width: 100% !important;
    height:240px !important;

}
.fx{
 height: 35px;
  overflow: hidden;
}
}
@media only screen and (max-device-width: 736px) and (min-device-width: 411px) and (orientation: portrait){
    .sizes-example1 {
        height: 265px !important;
    }
    .fx{
  height: 35px;
  overflow: hidden;
}
}
@media only screen and (min-device-width : 768px) and (max-device-width : 1023px) {
   .sizes-example1 {
        height: 240px !important;
 }
 .fx{
 height: 35px;
  overflow: hidden;
}
  }

     @media only screen and (min-device-width : 1024px) and (max-device-width : 1350px) {
.sizes-example1 {
        height: 320px !important;
    }
 }

.sizes-example1 {
    width: 100%;
    height: 400px;

}

.sizes-example {
    float: none !important;

    margin-left: 1%;
}

</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    $(".product-category").click(function(){
        $(".product-category").removeClass("mark1");
		$(this).closest("div.product-category").addClass("mark1");
		//alert($('.product-category img').attr('id'));
    });
});
    </script>
<script>
("input[type=file]").bind('change', handleFileSelect);
function checkOffset() {
    if($('#social-float').offset().top + $('#social-float').height()
                                           >= $('#footer').offset().top - 10)
        $('#social-float').css('position', 'absolute');
    if($(document).scrollTop() + window.innerHeight < $('#footer').offset().top)
        $('#social-float').css('position', 'fixed'); // restore when you scroll up
    $('#social-float').text($(document).scrollTop() + window.innerHeight);
}
$(document).scroll(function() {
    checkOffset();
});




</script>
<div class="banner-inner haslayout padding-section parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="<?php echo base_url();?>assets/images/img-404.jpg" style="padding:10px;">

			<div class="container">
            <?php $c=$this->db->get_where("altration",array("c_id"=>$this->uri->segment(3)))->row_array();
			//print_r($c);exit;
									$cats=$this->db->get_where("mcategory",array("mid"=>$c['c_id']))->row_array();
									//print_r($c);exit;
									?>



				<h1 align="center" style="
    margin-top: 20px;
    margin-bottom: 20px;
">Alteration For <?php echo $cats['mcat_name'];?> </h1>

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

									 <?php foreach($alt as $alt){
                     //print_r($alt); ?>

                                    <div class="col-sm-3 col-xs-6 col-ls6 product">

<div class="product-category" id="ttt">
                                  <div class="sizes-example1">
                                    <?php  $catname = $this->db->get_where('mcategory',array('mid'=>$alt['c_id']))->row();


                                 	 $url =  base_url().'altration/'.$catname->mcat_name.'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$alt['subcategory']))).'/'.$alt['alt_id'];
                                 	  ?>

                        <a href="<?php echo $url;?>" class="fabric" id="<?php echo $alt['alt_id'];?>" >
                         <span class="sel" style="display:none;">Selected</span>
       <img  src="<?php echo base_url();?>assets/images/altration/<?php echo $alt['image'];?>" id="<?php echo $alt['alt_id'];?>"  />

                        </a></div>


            <div class="product-category__info">
            </div>
              <div class="text-center fabric" style="
    margin:10px;
">
<h5 class="product-category__info__ribbon__title fx" > <?php echo $alt['subcategory'];?> </h5>
                <h5 class="product-category__info__ribbon__title" style="
    margin-top: 5px;
">Price- <i class="fa fa-inr"></i> <?php echo $alt['price'];?> </h5>

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
    <div class="divider"> </div>
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
            <!-- Main End -->

            <!-- Footer -->
