<style type="text/css">
@media only screen and (max-device-width: 1024px) and (min-device-width: 768px){
.sizes-example1 {
    height: 175px !important;
}
}
@media only screen and (max-device-width: 1350px) and (min-device-width: 1024px){
.sizes-example1 {
    height: 200px !important;
    }}
	@media only screen and (max-width: 500px) {
.sizes-example1 {
	width: 100% !important;
	height:250px !important;

}
}
@media only screen and (max-width: 500px) {
.product-preview__info__title
{
	font-size:12px !important;
	}
}
.sizes-example1 {
	width: 100%;
}
@media only screen and (max-width: 500px) {
.sizes-example {
	float:none !important;
    margin-left: 1%;
}
.sizes-example {
	float: left;
    margin-left: 1%;
}
}
@media (min-width: 768px) and (max-width: 1020px) {
  .four-in-row .product-preview-wrapper {
    width: 32.333% !important;
  }
}
</style>

<div id="filterproducts_child">
<?php

//print_r($pros);

foreach($pros as $fab){


	?>

<div class="product-preview-wrapper">

										<div class="product-preview">



  <div class="sizes-example sizes-example1 " >
	<?php
	$mcatname = $this->db->get_where('main_categories',array('id'=>$fab->category_for_filter))->row();
	if(!empty($mcatname)){
	$url =  base_url().'more-services/'.str_replace(" ", "-",$mcatname->name).'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$fab->subcategory))).'/'.$fab->id;
 }else{
	$url =  base_url().'more-services/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$fab->subcategory))).'/'.$fab->id;
 } ?>

               <a href="<?php echo $url;?>">
                <?php if($fab->image=='' || $fab->image==' '){ ?>
               <img src="<?php echo base_url();?>assets/images/accessories/cover.jpg"  alt=""/></a>
                <?php } else { ?>
                 <img src="<?php echo base_url();?>assets/images/more_services/resized_more_services/resize400_600/<?php echo $fab->image;?>" width="100%" alt=""/></a>
                <?php } ?>

                 <?php if($this->session->userdata("userid")==''){ ?> <a href="<?php echo base_url() ?>Welcome/login"><div class="overlay_img" id="<?php echo $fab->id; ?>_<?php echo $fab->subcategory; ?>"></div></a> <?php }else{
                	?>
                	 <div class="overlay_img" id="<?php echo $fab->id; ?>_<?php echo $fab->subcategory; ?>"></div>
                	<?php
                	} ?>

</div>



											</div>

											<div class="product-preview__info">

												<div class="product-preview__info__btns"><a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a> <a href="quick-view.html" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>

												<div class="product-preview__info__title">


													<h2><a href="#"><?php echo substr($fab->subcategory, 0,47);
													if(strlen($fab->subcategory)>47){echo '...';}?></a></h2>

												</div>

												<div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>

												<!--<ul class="options-swatch options-swatch--color">

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/blue.png" width="10" height="10" alt=""/></span></a></li>

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/yellow.png" width="10" height="10" alt=""/></span></a></li>

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/green.png" width="10" height="10" alt=""/></span></a></li>

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/dark-grey.png" width="10" height="10" alt=""/></span></a></li>

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/grey.png" width="10" height="10" alt=""/></span></a></li>

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/red.png" width="10" height="10" alt=""/></span></a></li>

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/white.png" width="10" height="10" alt=""/></span></a></li>

												</ul>-->

												<div class="price-box "><span class="price-box__new">&#8358; <?php echo $fab->price;?></span> <!--<span class="price-box__old">$84.00</span>--></div>

												<div class="product-preview__info__description">

													<p>Nulla at mauris leo. Donec quis ex elementum, tincidunt elit quis, cursus tortor. Sed sollicitudin enim metus, ut hendrerit orci dignissim venenatis.</p>

													<p>Suspendisse consectetur odio diam, ut consequat quam aliquet at.</p>

												</div>
											</div>

										</div>





                                    <?php  }?>
                                    </div></div>
                                    <?php $page_count=$count/20; if($page_count!=0){  ?>
		<div class="row">
<div class="col-md-12 text-center">
                                <ul class="pagination"><li class="active"><a  class="previous but"><< Previous</a></li>
<?php
for ($i=0; $i < $page_count; $i++) {


    ?>
                                <li class="active"><a id="<?php echo $i; ?>" class="page but<?php echo $i; ?>"><?php echo $i+1; ?></a></li>

<?php }
?><li class="active"><a class="next but">Next >></a></li>
                                </ul>                            </div>
</div>

<?php } ?>
<script type="text/javascript">
$(document).ready(function(){
	//alert('kk');
	//console.log('kkk');

	$('.page:first').css("background-color","#444");
	$('.page:first').css("color","#fff");
												$('.page:first').addClass("not");
                        $('.page:first').addClass("min");
                        $('.page:last').addClass("max");

												$(".next").click(function(){

														var page_no = $('.not').attr('id');
														var max = $('.max').attr('id');
														if(page_no>=max){
												}else{
														page_no++;
														$(".page").removeClass("not");
														$('.page').css("background-color","#fff");
														$('.page').css("color","#444");
														$("#" + page_no).css("background-color","#444");
														$("#" + page_no).css("color","#fff");
														$("#" + page_no).addClass("not");
														var u = <?php echo $u; ?>;
																var l = <?php echo $l; ?>;
																var val = '<?php echo $val; ?>';
														var formdata='<?php echo $unique_kk2; ?>';
														var new_cat = '<?php echo $cat2; ?>';
														var cat = '<?php echo $cat; ?>';
												$.ajax({
														 type: "POST",
														 url: '<?php echo base_url();?>index.php/Welcome/filter_child_online',
														data: {'page_no':page_no,'formdata':formdata,cat:"1",l:l,u:u,val:val,new_cat:new_cat,cat:cat},
														 success: function(response){
															  $('.topdiv').scrollTop(0);
															$("#filterproducts_child").html(response);
															}
														}); }
												});
												$(".previous").click(function(){

														var page_no = $('.not').attr('id');
														var max = $('.min').attr('id');
														if(page_no<=max){
												}else{
														page_no--;
														$(".page").removeClass("not");
														$('.page').css("background-color","#fff");
														$('.page').css("color","#444");
														$("#" + page_no).css("background-color","#444");
														$("#" + page_no).css("color","#fff");
														$("#" + page_no).addClass("not");
														var u = <?php echo $u; ?>;
																var l = <?php echo $l; ?>;
																var val = '<?php echo $val; ?>';
														var formdata='<?php echo $unique_kk2; ?>';
														var new_cat = '<?php echo $cat2; ?>';
														var cat = '<?php echo $cat; ?>';
												$.ajax({
														 type: "POST",
														 url: '<?php echo base_url();?>index.php/Welcome/filter_child_online',
														data: {'page_no':page_no,'formdata':formdata,cat:"1",l:l,u:u,val:val,new_cat:new_cat,cat:cat},
														 success: function(response){
															 $('.topdiv').scrollTop(0);
															$("#filterproducts_child").html(response);
															}
														});
														}
												});

												$(".page").click(function(){

													if ( $(this).hasClass( "not" ) ) {

												}else{
													$("#filterproducts_child").html('<div id="loading" style="background-color: #fff;width: 100%;height: 2000px;"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:13%;margin-left:35%;"></div>');

													var page_no = $(this).attr('id');
													$(".page").removeClass("not");
													$('.page').css("background-color","#fff");
													$('.page').css("color","#444");
													$(this).css("background-color","#444");
													$(this).css("color","#fff");
													$(this).addClass("not");

													var u = <?php echo $u; ?>;
															var l = <?php echo $l; ?>;
															var val = '<?php echo $val; ?>';
													var formdata='<?php echo $unique_kk2; ?>';
													var new_cat = '<?php echo $cat2; ?>';
													var cat = '<?php echo $cat; ?>';


											$.ajax({
													 type: "POST",
													 url: '<?php echo base_url();?>index.php/Welcome/filter_child_more',
													data: {'page_no':page_no,'formdata':formdata,cat:"1",l:l,u:u,val:val,new_cat:new_cat,cat:cat},
													 success: function(response){

														$("#filterproducts_child").html(response);
														}
													 });
													 }
	});

										});
</script>


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
