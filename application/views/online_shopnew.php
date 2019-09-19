<?php //echo $count;//print_r($_POST);

foreach($access as $fab_ids){
	$all_pro_ids[] = $fab_ids['category_for_filter'];
}
//print_r($all_pro_ids);
?>
<style>
@media (min-width: 1200px){
.four-in-row .product-preview-wrapper {
    width: 24.3% !important;
    /* max-width: 234px; */
  }
}

.select2_active{
  color: #333333;
    background-color: #e6e6e6;
    border-color: #adadad;
}
@media only screen and (max-width: 500px) {

.filt
{
	display: none;
}
}

.boxSep{
		background-color:#f7f7f7;


		margin-right: 5px;

	}
	.imgLiquid{
		width: auto;
		height: 243px;
	}
	.LogSep{
		margin:10px;
	}
	.style-4::-webkit-scrollbar-track
				{
					-webkit-box-shadow: inset 0 0 0px rgba(0,0,0,0.3);
					background-color:#fff;
					width:10px;
					border-radius: 11px;

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
							<li><a href="<?php echo base_url();?>" style="color: #000;">Home</a></li>
          <?php $cat= $this->db->get_where("mcategory",array("mid"=>$this->uri->segment(3)))->row();?>
          <li><a style="color: #000;">Onlline Boutique</a></li>
          <li><a href="<?php echo base_url();?>online-boutique/<?php echo strtolower($cat->mcat_name);?>/<?php echo $cat->mid;?>" style="color: #000;"><?php echo $cat->mcat_name;?></a></li>

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
											<select class="select--wd select--wd--sm" id="mobile_sort" data-width="130">

										<option>Default</option>

										<option value="p_name">Product Name</option>

										<option value="n_name">New Product</option>

                                     <option value="price_h_to_l">Price high to low</option>
                                     <option value="price_l_to_h">Price low to high</option>
                                     <option value="r_low">Rating lowest</option>
                                     <option value="r_high">Rating highest</option>

									</select>

										</div>
									</div>
<?php if(isset($all_pro_ids)){ $this->db->where_in("id",$all_pro_ids);

								$main_category=$this->db->get_where("main_categories",array("category"=>5))->result();
								if(!empty($main_category)){ ?>
								<h5 class=" text-uppercase" style="padding:12px 0;">Categories </h5>
								<?php

								$type = $this->uri->segment(3);
								echo "<form action='' method='post' style='float:left' id='main_cat'>";
								echo"<input type='hidden' name='type' value='$type'>

                          	";
                          	echo "<div class='filter-list style-4' style='height:150px;overflow-y:scroll; width: 243px; margin-bottom:20px;'>";
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

                          }echo "</div></form>"; }} ?><br><br><br><br>

                          <h5 class=" text-uppercase" style="margin-top:10px;">Price </h5>
										<div class="filters-col__collapse__content" style="width:90%;">
											<div id="priceSlider" class="price-slider"></div>
										</div>
									</div><br />

<form id="filter" action="" method="post">

									<?php
										$b=array();
										foreach ($access as $value) {
											//print_r($value);
										$this->db->select("filter_subcategory_fcid");
			                          $filter_check=$this->db->get_where("online_search",array("product_id"=>$value['id']))->result_array();
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
                      			if(isset($parent) && !empty($parent->sub_category_id)){
                          		$d[] = $parent->sub_category_id;
                          		}
                          }
		                         if(!empty($d))
		                        {
		                        //print_r($d);
		                        $e = array_unique($d);
		                        //print_r($e);

		                          	foreach ($e as $e) {


                          $filter=$this->db->get_where("filter",array("fid"=>$e))->row();
                         // echo $filter->fid;

                        ?>


                          <div class="filters-col__collapse open">
                            <h5 class="text-uppercase"><?php echo $filter->filter_category;?></h5>
                            <div class="filters-col__collapse__content">
								<ul class="filter-list style-4" style="overflow-y:scroll; height:150px;">
                                <?php
                                  foreach($c as $c2){
                                  	$f=$this->db->get_where("filter_subcategory",array("main_category_id"=>5,"sub_category_id"=>$filter->fid,"fcid"=>$c2))->result_array();
                                  	//print_r($f);
                                  	if(!empty($f)){?>
                                  	<li class="checkbox-group">
                                   <input type="checkbox"  name="online_search<?php echo $f[0]['fcid'];?>" id="<?php echo $f[0]['filter_name'];?>" value="<?php echo $f[0]['fcid'];?>" class="filter">
                                   <label for="<?php echo $f[0]['filter_name'];?>"> <span class="check"></span> <span class="box"></span> <?php echo $f[0]['filter_name'];?> </label></li>
                                   <?php }} ?>
									</ul>
								</div>
							</div>
                          <?php  }} ?>

                                </form>
                                <?php if(isset($_POST['new_cat'])){$new_cat = implode(',',$_POST['new_cat']);}else{$new_cat='0';} ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                                    <script>
										$(document).ready(function(){
											//alert('kkk');
											$(function() {
   priceslider();
});

											$(".main_cat").click(function(){
												console.log('caled');
												$("#main_cat").submit();
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
												 url: '<?php echo base_url();?>index.php/Welcome/online_search',
												 data:{formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
												 success: function(response){
													$("#filterproducts").html(response);
													}
												 });
											});

											/* $("#priceSlider").hover(priceslider);*/

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
                         url: '<?php echo base_url();?>index.php/Welcome/online_search',
                        data: {formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
                         success: function(response){

                          $("#filterproducts").html(response);
                          }
                         });

                      }

											$(document).on('change','#mobile_sort',function(){
											 var a = $('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
											 var b = $('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
											 $(".select2").removeClass("select2_active");
							 $(this).closest("div.select2").addClass("select2_active");
											 window.location.hash = $(this).val();
											 var val = $(this).val();
											 var new_cat='<?php echo $new_cat; ?>';
										//   alert(val);
										if($('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
										 a=1;
										}
										if($('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
										 b=1000000;
										}
											 var formdata=$("#filter").serialize();
											 $.ajax({
												type: "POST",
												url: '<?php echo base_url();?>index.php/Welcome/online_search',
											 data: {formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
												success: function(response){

												 $("#filterproducts").html(response);
												 }
												});
										 });

										 $(".select2").click(function(){
                        var a = $('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
                        var b = $('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
                        $(".select2").removeClass("select2_active");
        				$(this).closest("div.select2").addClass("select2_active");
                        window.location.hash = $(this).attr("href");
                        var val = $(this).attr("href");
                        var new_cat='<?php echo $new_cat; ?>';
                     //   alert(val);
										 if($('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
										 	a=1;
										 }
										 if($('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
										 	b=1000000;
										 }
                        var formdata=$("#filter").serialize();
                        $.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/online_search',
                        data: {formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
                         success: function(response){

                          $("#filterproducts").html(response);
                          }
                         });
                      });

										});
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
												var a = $j('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
												var b = $j('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
												var k= $j('.noUi-origin.noUi-connect')[0].style.left;
												var k2= $j('.noUi-origin.noUi-background')[0].style.left;
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
												        //var val = $j(".select2").val();
												        var val = window.location.hash.substr(1);
												        var new_cat='<?php echo $new_cat; ?>';

												var formdata=$j("#filter").serialize();
												console.log(formdata);
												$j.ajax({
												 type: "POST",
												 url: '<?php echo base_url();?>index.php/Welcome/online_search',
												data: {formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
												 success: function(response){

												  $j("#filterproducts").html(response);
												  }
												 });
												////


											});

											}



										});

										        </script>
									</script>
								</div>

							</div>

							<div id="centerCol">

								<div class="products-grid products-listing products-col four-in-row">

                                   <div class="col-md-12">
<?php
		 //$fcats=$this->db->get_where("uniformbanner",array('status'=>'enable'))->result();
		 ?>
         <section class="content top-null">

						<div class="category-outer">
							<div class="category-slider single-slider">
								<ul>
                                  <?php
		// $this->db->order_by("cid", "desc");
		 $fcats=$this->db->get("onlinebanner")->result();
		// print_r($fcats);
		 //exit;
		 foreach($fcats as $subcat){?>
									<li class="slider_li un-bnr"><img src="<?php echo base_url(); ?>/assets/images/shopbanner/<?php echo $subcat->accessoriesbanner; ?>" alt="" class="bn-image" /></li>  <?php } ?>

								</ul>
							</div>

						</div>

				</section>


                        </div>

                               <div class="col-md-12">

                               <div>










								<div class="filt filters-row">
                                <span><b>Sort By:</b> </span>
<div class="btn btn-default select2 select2_active" href="default">Default</div>
<div class="btn btn-default select2" href="p_name">Product Name</div>
<div class="btn btn-default select2" href="n_name">New Product</div>
<div class="btn btn-default select2" href="price_h_to_l">Price high to low</div>
<div class="btn btn-default select2" href="price_l_to_h">Price low to high</div>
<div class="btn btn-default select2" href="r_high">Rating highest</div>
<div class="btn btn-default select2" href="r_low">Rating lowest</div>
							</div>
<a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilterMobile"><span class="icon icon-filter"> Filter </span></a>



						</div>
                        </div>
                        		<div id="filterproducts">
									
</div>
								</div>


						</div>

					</div>

				</section>

			</div>

            <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
