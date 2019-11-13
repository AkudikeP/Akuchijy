
<?php //echo $count;//print_r($_POST);

foreach($more2 as $fab_ids){
	$all_pro_ids[] = $fab_ids['category_for_filter'];
}
//print_r($all_pro_ids);
?>

<style type="text/css">

.select2_active{
	color: #333333;
    background-color: #e6e6e6;
    border-color: #adadad;
}
.sizes-example1{
height: 280px;
}

@media (min-width: 1200px){
.four-in-row .product-preview-wrapper {
    width: 24.3% !important;
}
}
@media (max-width: 559px){
.products-listing.four-in-row .product-preview-wrapper {
    width: 50% !important;
    padding-left: 5px;
    padding-right: 5px;
}
}
@media only screen and (max-width: 500px) {
.sizes-example1 {
	width: 100% !important;
	height:270px !important;

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

	.filt
{
	display: none;
}
.sizes-example {
	float:none !important;

	margin-left: 1%;
}
.sizes-example {
	float: left;

	margin-left: 1%;
}

.style-4::-webkit-scrollbar-track
				{
					background-color:#fff;
					width:10px;
					/*border-radius: 11px; */
				}
				.style-4::-webkit-scrollbar
				{
					width: 5px;
					background-color: #000;
					border-radius: 11px;
				}

				.style-4::-webkit-scrollbar-thumb
				{
					background-color: #4c4c4c;
    width: 32px;
     border: 0px solid #4c4c4c;
    border-radius: 43px;
}
}
</style>
<div id="pageContent" class="page-content page-content--fill">
				<!-- Breadcrumb section -->
				<section class="breadcrumbs  hidden-xs">

					<div class="container">

						<ol class="breadcrumb breadcrumb--wd pull-left">
							<li><a href="#">Home/More Services</a></li>
						</ol>
					</div>
				</section>

				<!-- Content section -->

				<section class="content">

					<div class="container no-pd-sm">

						<div class="outer open">

							<div id="leftCol">

								<div id="filtersCol" class="filters-col">

									<div class="filters-col__close" id="filtersColClose"><a href="#" class="icon icon-clear"></a></div>





								<div class="filters-col__collapse open">
<div class="row">
<div class="col-md-8 col-sm-8" style="
    padding-top: 10px;
"><h6>Refine Your Search</h6></div>
<div class="col-md-4 col-sm-4" style="
    padding-top: 10px;
"><a href="<?php echo base_url();?>index.php/Welcome/online_boutique_shop/<?php echo $this->uri->segment(3); ?>">Clear All</a></div>
</div>
<div class="filters-col__select visible-xs">
										<label>Sort: </label>
										<div class="select-wrapper">
											<select class="select--wd select--wd--sm" data-width="130">

										<option>Default</option>

										<option value="p_name">Product Name</option>

										<option value="n_name">New Product</option>

                                     <option value="price_h_to_l">Price high to low</option>
                                     <option value="price_l_to_h">Price low to high</option>


									</select>

										</div>
									</div>
<?php if(isset($all_pro_ids)){ $this->db->where_in("id",$all_pro_ids);
$main_category=$this->db->get_where("main_categories",array("category"=>4))->result();
if(!empty($main_category)){
?>
								<h5 class=" text-uppercase" style="margin-top:10px;">Categories </h5>
								<?php
								$type = $this->uri->segment(3);
								echo "<form action='' method='post' style='float:left' id='main_cat'>";
								echo"<input type='hidden' name='type' value='$type'>

                          	";
                          foreach ($main_category as $main_category) {


                          	if(isset($_POST['new_cat']) && in_array($main_category->id, $_POST['new_cat']))
                          	{
                          	//echo "<button type='submit' class='main_cat btn btn-primary'  id='$main_category->id' disabled>".$main_category->name."</button></form>";
                          	?>
                          	<li class="checkbox-group" style="list-style-type: none;">
                                   <input type="checkbox"  name="new_cat[]" id="<?php echo $main_category->id;?>" value="<?php echo $main_category->id;?>" class="main_cat" checked>
                                   <label for="<?php echo $main_category->id;?>"> <span class="check"></span> <span class="box"></span> <?php echo $main_category->name;?> </label></li>
                                   	<?php
                          }
                          	else{
                          	//echo "<button type='submit' class='main_cat btn btn-default'  id='$main_category->id'>".$main_category->name."</button></form>";
                          	?>
                          	<li class="checkbox-group" style="list-style-type: none;">
                                   <input type="checkbox"  name="new_cat[]" id="<?php echo $main_category->id;?>" value="<?php echo $main_category->id;?>" class="main_cat">
                                   <label for="<?php echo $main_category->id;?>"> <span class="check"></span> <span class="box"></span> <?php echo $main_category->name;?> </label></li>
                                   	<?php
                          	}

                          }echo "</form>"; }}?><br><br><br><br>

                          <h5 class=" text-uppercase" style="margin-top:10px;">Price </h5>
										<div class="filters-col__collapse__content" style="width:90%;">
											<div id="priceSlider" class="price-slider"></div>
										</div>
									</div><br />

<form id="filter" action="" method="post">

								<?php
										$b=array();
										foreach ($more2 as $value) {

										$this->db->select("filter_subcategory_fcid");
			                          $filter_check=$this->db->get_where("more_services_search",array("product_id"=>$value['id']))->result_array();
			                          //print_r($filter_check);
			                          foreach ($filter_check as $filter_check) {
			                          	$a=explode(',', $filter_check['filter_subcategory_fcid']);
			                          	foreach ($a as $a) {
			                          		$b[]=$a;
			                          	}
			                          }
			                      }
			                      $c = array_unique($b);
			                      //print_r($c);

			                      foreach ($c as $c1) {

			                      		$this->db->select("sub_category_id");
			                      	$parent=$this->db->get_where("filter_subcategory",array("fcid"=>$c1))->row();
                      			if(isset($parent->sub_category_id) && !empty($parent->sub_category_id))
                      			{
                      				$d[] = $parent->sub_category_id;
                      			}

                          }
		                        //print_r($d);
		                        if(isset($d) && !empty($d)){
		                        //print_r($d);
		                        $e = array_unique($d);
		                        //print_r($e);

		                          	foreach ($e as $e) {


                          $filter=$this->db->get_where("filter",array("fid"=>$e))->row();
                          //echo $filter->fid;

                        ?>

                          <div class="filters-col__collapse open">
                            <h4 class="filters-col__collapse__title text-uppercase"><?php echo $filter->filter_category;?></h4>
                            <div class="filters-col__collapse__content">
								<ul class="filter-list style-4" style="overflow-y:scroll; height:150px;">
                                <?php
                                //print_r($c);
                                  foreach($c as $c2){
                                  	$f=$this->db->get_where("filter_subcategory",array("main_category_id"=>4,"sub_category_id"=>$filter->fid,"fcid"=>$c2))->result_array();
                                  	//print_r($f);
                                  	if(!empty($f)){?>
                                  	<li class="checkbox-group">
                                   <input type="checkbox"  name="more_services_search<?php echo $f[0]['fcid'];?>" id="<?php echo $f[0]['filter_name'];?>" value="<?php echo $f[0]['fcid'];?>" class="filter">
                                   <label for="<?php echo $f[0]['filter_name'];?>"> <span class="check"></span> <span class="box"></span> <?php echo $f[0]['filter_name'];?> </label></li>
                                   <?php }} ?>
									</ul>
								</div>
							</div>
                          <?php  } }?>


                                </form>
                                <?php if(isset($_POST['new_cat'])){$new_cat = implode(',',$_POST['new_cat']);}else{$new_cat='0';} ?>
                                    <script>
										$(document).ready(function(){
											$(".main_cat").click(function(){
												console.log('caled');
												$("#main_cat").submit();
											});
$(function() {
   priceslider();
});

											$(".filter").click(function(){
												var a = $('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
      var b = $('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
     // var val = $(".select2").val();
     var val = window.location.hash.substr(1);
      var new_cat='<?php echo $new_cat; ?>';
			if($('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
			  a=1;

			}
			if($('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
			  b=1000000;
			}
      var formdata=$("#filter").serialize();
												$.ajax({
												 type: "POST",
												 url: '<?php echo base_url();?>index.php/Welcome/filter_more',
												 data:{formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
												 success: function(response){
													$("#filterproducts").html(response);
													}
												 });
											});

											//$("#priceSlider").hover(priceslider);

                      function priceslider(){

												var a = $('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
			var b = $('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
			var k= $('.noUi-origin.noUi-connect')[0].style.left;
			var k2= $('.noUi-origin.noUi-background')[0].style.left;
			//console.log(b-a);
			//console.log(k+' '+k2);

		//  k2
			if((b-a)<1000 || b==a){

				console.log(a+' '+b);
				console.log(parseInt(k)-10);
				if(parseInt(k)>10){
				$('.noUi-origin.noUi-connect')[0].style.left = (parseInt(k2)-10)+'%';
				$('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html(parseInt(b)-1000);
			}else{
				$('.noUi-origin.noUi-background')[0].style.left = (parseInt(k)+10)+'%';
				$('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html(parseInt(a)+1000);
			}
				//return false;
			}
			var a = $('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
	var b = $('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
	if(a==0)
	{
	$('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html('Min');
	}
	if(b>=9500)
	{
	$('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html('10000+');
	}
	if($('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
	a=1;

	}
	if($('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
	b=1000000;
	}
                                //var val = $(".select2").val();
                                var val = window.location.hash.substr(1);
                                var new_cat='<?php echo $new_cat; ?>';

                        var formdata=$("#filter").serialize();
                        console.log(formdata);
                        $.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/filter_more',
                        data: {formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
                         success: function(response){

                          $("#filterproducts").html(response);
												},
												error: function(response){
													console.log(response);
												}
                         });

                      }

                       $(".select2").click(function(){
                        var a = $('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
                        var b = $('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
                          $("div").removeClass("select2_active");
                        $(".select2").removeClass("select2_active");
        				$(this).closest("div.select2").addClass("select2_active");
                        window.location.hash = $(this).attr("href");
                        var val = $(this).attr("href");
                        var new_cat='<?php echo $new_cat; ?>';
                        //alert(val);
                        var formdata=$("#filter").serialize();
                        $.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/filter_more',
                        data: {formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
                         success: function(response){

                          $("#filterproducts").html(response);
                          }
                         });
                      });



										});
									</script>
								</div>

							</div>

							<div id="centerCol">

								<div class="products-grid products-listing products-col four-in-row" >

                                   <div class="col-md-12 single-slider no-pd-sm">

                        <img src="<?php echo base_url(); ?>/assets/images/SewTara_banner.png" width="100%"  />
                        </div>

                               <div class="col-md-12"> <div class="">



								<div class="filt filters-row" >
                                <span><b>Sort By:</b> </span>
<div class="btn btn-default select2 select2_active" href="default">Default</div>
<div class="btn btn-default select2" href="p_name">Product Name</div>
<div class="btn btn-default select2" href="n_name">New Product</div>
<div class="btn btn-default select2" href="price_h_to_l">Price high to low</div>
<div class="btn btn-default select2" href="price_l_to_h">Price low to high</div>

							</div>

<a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilterMobile"><span class="icon icon-filter"> Filter </span></a>
						</div>
                        </div>
                        <div id="filterproducts">
									<?php foreach($more as $more)
									{

									?>


                                    <div class="product-preview-wrapper">
                                    <div class="filters-col__collapse open">
									<?php if($this->session->flashdata('msg')){?>
									  <div class="alert alert-danger">
									    <?php echo $this->session->flashdata('msg')?>
									  </div>
									<?php } ?>

										<div class="product-preview">



  <div class="sizes-example sizes-example1" >
                <a href="<?php echo base_url();?>index.php/Welcome/moreservice_appoinment/<?php echo $more['id'];?>"><img src="<?php echo base_url();?>assets/images/more_services/<?php echo $more['image'];?>" alt=""/></a></div>







											<div class="product-preview__info text-center">

												<div class="product-preview__info__btns"><a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a> <a href="quick-view.html" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>

												<div class="product-preview__info__title">
													<h2><a href="#"><?php echo $more['subcategory'];?></a></h2>

												</div>



												<div class="price-box"><span class="price-box__new" id="price">&#8358; <?php echo $more['price'];?>/-</span>
												</div>





												<div class="product-preview__info__description">

													<p>Nulla at mauris leo. Donec quis ex elementum, tincidunt elit quis, cursus tortor. Sed sollicitudin enim metus, ut hendrerit orci dignissim venenatis.</p>

													<p>Suspendisse consectetur odio diam, ut consequat quam aliquet at.</p>

												</div>
											</div>

										</div>

									</div>

								</div>

									<?php }?>

</div>
							</div>

						</div>

					</div>

				</section>

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
					var $j = jQuery.noConflict();
					jQuery(function($j) {



					    "use strict";



						if ($j('.price-slider').length) {



						var priceSlider = document.getElementById('priceSlider');



						noUiSlider.create(priceSlider, {

							start: [0, 5000],

							connect: true,

							step: 500,

							range: {

								'min': 0,

								'max': 10000

							}

						});

						var tipHandles = priceSlider.getElementsByClassName('noUi-handle'),

							tooltips = [];



						// Add divs to the slider handles.

						for ( var i = 0; i < tipHandles.length; i++ ){

							tooltips[i] = document.createElement('div');

							tipHandles[i].appendChild(tooltips[i]);

						}



						tooltips[0].className += 'tooltip top';

						tooltips[0].innerHTML = '<div class="tooltip-inner"><span></span><div class="tooltip-arrow"></div></div>';

						tooltips[0] = tooltips[0].getElementsByTagName('span')[0];



						tooltips[1].className += 'tooltip top';

						tooltips[1].innerHTML = '<div class="tooltip-inner"><span></span><div class="tooltip-arrow"></div></div>';

						tooltips[1] = tooltips[1].getElementsByTagName('span')[0];



						// When the slider changes, write the value to the tooltips.

						priceSlider.noUiSlider.on('update', function( values, handle ){

							tooltips[handle].innerHTML = Math.round(values[handle]);


						});

					  priceSlider.noUiSlider.on('update', function( values, handle ){

					    ////
					    $j("#filterproducts").html('<div id="loading" style="background-color: #fff;width: 100%;height: 2000px;"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:13%;margin-left:35%;"></div>');

					    var a = $j('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
					    var b = $j('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
					    var k= $j('.noUi-origin.noUi-connect')[0].style.left;
					    var k2= $j('.noUi-origin.noUi-background')[0].style.left;
					    //console.log(b-a);
					    //console.log(k+' '+k2);

					    //  k2
					    if($j('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
					    a=1;
					    }
					    if($j('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
					    b=10000;
					    }
					    if((b-a)<1000 || b==a){

					    console.log(a+' '+b);
					    console.log(parseInt(k)-10);
					    if(parseInt(k)>10){
					    $j('.noUi-origin.noUi-connect')[0].style.left = (parseInt(k2)-10)+'%';
					    $j('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html(parseInt(b)-1000);
					    }else{
					    $j('.noUi-origin.noUi-background')[0].style.left = (parseInt(k)+10)+'%';
					    $j('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html(parseInt(a)+1000);
					    }
					    //return false;
					    }
					    var a = $j('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
					    var b = $j('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
					    if(a==0)
					    {
					    $j('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html('Min');
					    }
					    if(b>=9500)
					    {
					    $j('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html('10000+');
					    }
					    if($j('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
					    a=1;
					    }
					    if($j('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
					    b=1000000;
					    }
					    //alert(a+''+b);
					            //var val = $j(".select2").val();
					            var val = window.location.hash.substr(1);
					            var new_cat='<?php echo $new_cat; ?>';

					    var formdata=$j("#filter").serialize();
					    $j.ajax({
					     type: "POST",
					     url: '<?php echo base_url();?>index.php/Welcome/filter_more',
					    data: {formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
					     success: function(response){

					      $j("#filterproducts").html(response);
					      }
					     });

					    ////


					  });

						}



					});
            document.documentElement.className = 'no-fouc';
        </script>

      
