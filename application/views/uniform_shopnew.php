<?php //echo $count;//print_r($_POST);

foreach($uni_access as $uni_accesss){
	$all_pro_ids[] = $uni_accesss['category_for_filter'];
}
//print_r($all_pro_ids);
?>

<style type="text/css">

@media (min-width: 1200px){
.four-in-row .product-preview-wrapper {
    width: 24.3% !important;
    /* max-width: 234px; */
  }
}


	.overlay_img{
    display:none;
}
.select2_active{
	color: #333333;
    background-color: #e6e6e6;
    border-color: #adadad;
}
 .style-4::-webkit-scrollbar-track
				{

					background-color:#fff;
					width:10px;
					border-radius:10px;


				}
				.boxSep{
		background-color:#ffffff;


		margin-right: 5px;

	}
	.imgLiquid{
		width: auto;
		height: 250px;
	}

				.style-4::-webkit-scrollbar
				{
					width: 5px;
					background-color: #000;

				}

				.style-4::-webkit-scrollbar-thumb
				{
					background-color: #4c4c4c;
    				width: 32px;
     				border: 0px solid #4c4c4c;
					border-radius:10px;
}


@media only screen and (max-width: 500px) {
.sizes-example1 {
	width: 100% !important;
	height:250px !important;

}
.filt
{
	display: none;
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
	height:275px;


}
@media only screen and (max-device-width: 1024px) and (min-device-width: 768px){
.sizes-example1 {
    width: 100%;
    height: 175px !important;
}
}
</style>
<div id="pageContent" class="page-content page-content--fill">
				<!-- Breadcrumb section -->
				<section class="breadcrumbs  hidden-xs">

					<div class="container">

						<ol class="breadcrumb breadcrumb--wd pull-left">
							<li><a href="<?php echo base_url();?>" style="color: #000;">Home</a></li>
							<li class="active" style="color: #000;">Uniform</li>
							<li class="active" style="color: #000;"><?php echo $this->uri->segment(2);?></li>
						</ol>
					</div>
				</section>

				<!-- Content section -->

				<section class="content">

					<div class="container no-pd-sm">

						<div class="outer open">

							<div id="leftCol">

								<div id="filtersCol" class="filters-col">

									<div class="filters-col__close" id="filtersColClose"><a href="#" class="icon icon-clear" ></a></div>







                                <div class="filters-col__collapse open">
<div class="row">
<div class="col-md-8 col-sm-8" style="
    padding-top: 10px;
"><h6>Refine Your Search</h6></div>
<div class="col-md-4 col-sm-4" style="
    padding-top: 10px;
"><a href="<?php echo base_url();?>index.php/Welcome/uniform_shop/<?php echo $this->uri->segment(2); ?>" style="font-weight: 600;">Clear All</a></div>
</div>

<div class="filters-col__select visible-xs">
										<label>Sort: </label>
										<div class="select-wrapper">
											<select class="select--wd select--wd--sm" id="mobile_sort" data-width="130">

										<option >Default</option>

										<option value="p_name">Product Name</option>

										<option value="n_name">New Product</option>

                                     <option value="price_h_to_l">Price high to low</option>
                                     <option value="price_l_to_h">Price low to high</option>
                                     <option value="r_low">Rating lowest</option>
                                     <option value="r_high">Rating highest</option>

									</select>

										</div>
										</div>
									<?php if(isset($all_pro_ids) && !empty($all_pro_ids)){
										$this->db->where_in("id",$all_pro_ids);

								$main_category=$this->db->get_where("main_categories",array("category"=>2))->result();
								if(isset($main_category) && !empty($main_category)){ ?>
								<h5 class=" text-uppercase" style="padding:12px 0px;">Categories </h5>
								<?php


								$type = $this->uri->segment(2);
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

                          }echo "</div></form>"; }} ?>


								<h5 class=" text-uppercase" style="margin-top:10px;">Price </h5>
										<div class="filters-col__collapse__content" style="width:90%;">
											<div id="priceSlider" class="price-slider"></div>
										</div>
									</div><br />
									<form id="filter" action="" method="post">
                             		<?php
										$b=array();
										foreach ($uni_access as $value) {
											//print_r($value);
										$this->db->select("filter_subcategory_fcid");
			                          $filter_check=$this->db->get_where("uniform_search",array("product_id"=>$value['uniform_id']))->result_array();
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

                      				if(!empty($parent))
                      				{
                      				$d[] = $parent->sub_category_id;
                      				}

                          }
		                        if(!empty($d)){
		                        //print_r($d);
		                        $e = array_unique($d);
		                        //print_r($e);

		                          	foreach ($e as $e) {


                          $filter=$this->db->get_where("filter",array("fid"=>$e))->row();
                         // echo $filter->fid;

                        ?>

                          <div class="filters-col__collapse open">
                            <h5 class=" text-uppercase"><?php echo $filter->filter_category;?></h5>
                            <div class="filters-col__collapse__content">
								<ul class="filter-list" style="overflow-y:scroll; height:150px; padding: 8px;">
                                <?php
                                  foreach($c as $c2){
                                  	$f=$this->db->get_where("filter_subcategory",array("main_category_id"=>2,"sub_category_id"=>$filter->fid,"fcid"=>$c2))->result_array();
                                  	//print_r($f);
                                  	if(!empty($f)){?>
                                  	<li class="checkbox-group">
                                   <input type="checkbox"  name="uniform_search<?php echo $f[0]['fcid'];?>" id="<?php echo $f[0]['filter_name'];?>" value="<?php echo $f[0]['fcid'];?>" class="filter">
                                   <label for="<?php echo $f[0]['filter_name'];?>"> <span class="check"></span> <span class="box"></span> <?php echo $f[0]['filter_name'];?> </label></li>
                                   <?php }} ?>
									</ul>
								</div>
							</div>
                          <?php  } }?>

                                </form>
                                    <script>
										$(document).ready(function(){

											$(".btn-number").click(function(){
												$(".product-category").removeClass("mark1");
												$(this).closest("div.product-category").addClass("mark1");
												var qty=$("#qty").val();
												var	pr=$("#price").val();
												});
										});
									</script>
								</div>

							</div>

							<div id="centerCol">

								<div class="products-grid products-listing products-col four-in-row" >

                                   <div class="col-md-12">
                                     <section class="content top-null">

						<div class="category-outer">
							<div class="category-slider single-slider">
								<ul>
                                  <?php
		// $this->db->order_by("cid", "desc");
		 $fcats=$this->db->get_where("uniformbanner",array("status"=>"enable"))->result();
		// print_r($fcats);
		 //exit;
		 foreach($fcats as $subcat){?>
									<li class="slider_li un-bnr"><img src="<?php echo base_url(); ?>/assets/images/uniformbanner/<?php echo $subcat->banner_image; ?>" alt="" class="bn-image" /></li>  <?php } ?>

								</ul>
							</div>

						</div>

				</section>

                        </div>

                               <div class="col-md-12"> <div class="">




								<div class="filt filters-row" >
                                <span><b>Sort By&nbsp;</b> </span>
<div class="btn btn-default select2 select2_active" href="default">Default</div>
<div class="btn btn-default select2" href="p_name">Product Name</div>
<div class="btn btn-default select2" href="n_name">New Product</div>
<div class="btn btn-default select2" href="price_h_to_l">Price high to low</div>
<div class="btn btn-default select2" href="price_l_to_h">Price low to high</div>
<div class="btn btn-default select2" href="r_high">Rating highest</div>
<div class="btn btn-default select2" href="r_low">Rating lowest</div>
							</div>

							<a class="btn btn--wd btn--with-icon btn--sm wave" id="showFilterMobile"><span class="icon icon-filter"> Filter</span></a>


                        </div>
                        </div>
                         <?php if(isset($_POST['new_cat'])){$new_cat = implode(',',$_POST['new_cat']);}else{$new_cat='0';} ?>

								<script>

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

										jq("#filterproducts").html('<div id="loading" style="background-color: #fff;width: 100%;height: 2000px;"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:13%;margin-left:35%;"></div>');

										var a = jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
										var b = jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
										var k= jq('.noUi-origin.noUi-connect')[0].style.left;
										var k2= jq('.noUi-origin.noUi-background')[0].style.left;
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
										jq('.noUi-origin.noUi-connect')[0].style.left = (parseInt(k2)-10)+'%';
										jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html(parseInt(b)-1000);
										}else{
										jq('.noUi-origin.noUi-background')[0].style.left = (parseInt(k)+10)+'%';
										jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html(parseInt(a)+1000);
										}
										//return false;
										}
										var a = jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
										var b = jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
										if(a==0)
										{
										jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html('Min');
										}
										if(b>=9500)
										{
										jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html('10000+');
										}
										if(jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
										a=1;
										}
										if(jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
										b=1000000;
										}
										        //var val = jq(".select2").val();
										        var val = window.location.hash.substr(1);
										        var new_cat='<?php echo $new_cat; ?>';

										var formdata=jq("#filter").serialize();
										jq.ajax({
										 type: "POST",
										 url: '<?php echo base_url();?>index.php/Welcome/filter_uniform',
										data: {formdata:formdata,cat:"<?php echo $this->uri->segment(2);?>",l:a,u:b,val:val,new_cat:new_cat},
										 success: function(response){

										  jq("#filterproducts").html(response);
										  }
										 });


									});

									}



								});
								</script>
								<script>
								//alert('kkkk');
									var jq = $.noConflict();
									//alert(jq);
									jq(document).ready(function(){
										//setTimeout(function() { //jq('.slider_li').css('width','830px');jq('.slider_li img').css('width','100%'); jq('.slick-track').css('transform','translate3d(-830px, 0px, 0px)'); }, 500);
										jq(function() {
   priceslider();
});

										jq(".main_cat").click(function(){
												jq("#main_cat").submit();
											});

				jq(".filter").click(function(){
												//alert('k');
												 jq("#filterproducts").html('<div id="loading" style="background-color: #fff;width: 100%;height: 2000px;"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:13%;margin-left:35%;"></div>');

                        var a = jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
      var b = jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
     // var val = jq(".select2").val();
     var val = window.location.hash.substr(1);
      var new_cat='<?php echo $new_cat; ?>';
			if(jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
			  a=1;

			}
			if(jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
			  b=1000000;
			}
												var formdata=jq("#filter").serialize();
												//alert(formdata);
												//print_r(formdata);
												jq.ajax({
												 type: "POST",
												 url: '<?php echo base_url();?>index.php/Welcome/filter_uniform',
												data: {formdata:formdata,cat:"<?php echo $this->uri->segment(2);?>",l:a,u:b,val:val,new_cat:new_cat},
												 success: function(response){

													jq("#filterproducts").html(response);
												},
												error: function(response){
													console.log(response);
												}
												 });
											});

			/*		jq("#priceSlider").hover(priceslider);
                      jq("#priceSlider").click(priceslider);*/

                      function priceslider(){
                      	jq("#filterproducts").html('<div id="loading" style="background-color: #fff;width: 100%;height: 2000px;"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:13%;margin-left:35%;"></div>');

												var a = jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
			var b = jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
			var k= jq('.noUi-origin.noUi-connect')[0].style.left;
			var k2= jq('.noUi-origin.noUi-background')[0].style.left;
			//console.log(b-a);
			//console.log(k+' '+k2);

		//  k2
			if((b-a)<1000 || b==a){

				console.log(a+' '+b);
				console.log(parseInt(k)-10);
				if(parseInt(k)>10){
				jq('.noUi-origin.noUi-connect')[0].style.left = (parseInt(k2)-10)+'%';
				jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html(parseInt(b)-1000);
			}else{
				jq('.noUi-origin.noUi-background')[0].style.left = (parseInt(k)+10)+'%';
				jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html(parseInt(a)+1000);
			}
				//return false;
			}
			var a = jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
var b = jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
if(a==0)
{
	jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html('Min');
}
if(b>=9500)
{
	jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html('10000+');
}
if(jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
	a=1;
}
if(jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
	b=1000000;
}
                                //var val = jq(".select2").val();
                                var val = window.location.hash.substr(1);
                                var new_cat='<?php echo $new_cat; ?>';

                        var formdata=jq("#filter").serialize();
                        jq.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/filter_uniform',
                        data: {formdata:formdata,cat:"<?php echo $this->uri->segment(2);?>",l:a,u:b,val:val,new_cat:new_cat},
                         success: function(response){

                          jq("#filterproducts").html(response);
                          },
                          error: function(response){
                          	console.log(response);
                          }
                         });

                      }

											jq(document).on('change','#mobile_sort',function(){

				                         var a = jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
				                         var b = jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
				                         jq(".select2").removeClass("select2_active");
				         				jq(this).closest("div.select2").addClass("select2_active");

				                         window.location.hash = jq(this).val();
				                         var val = jq(this).val();
				 												if(jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
				 													a=1;
				 												}
				 												if(jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
				 													b=1000000;
				 												}
				                         var formdata=jq("#filter").serialize();
				                         jq.ajax({
				                          type: "POST",
				                          url: '<?php echo base_url();?>index.php/Welcome/filter_uniform',
				                         data: {formdata:formdata,cat:"<?php echo $this->uri->segment(2);?>",l:a,u:b,val:val},
				                          success: function(response){

				                           jq("#filterproducts").html(response);
				                           }
				                          });
				                       });
						 jq(".select2").click(function(){

                        var a = jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
                        var b = jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
                        jq(".select2").removeClass("select2_active");
        				jq(this).closest("div.select2").addClass("select2_active");

                        window.location.hash = jq(this).attr("href");
                        var val = jq(this).attr("href");
												if(jq('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
													a=1;
												}
												if(jq('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
													b=1000000;
												}
                        var formdata=jq("#filter").serialize();
                        jq.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/filter_uniform',
                        data: {formdata:formdata,cat:"<?php echo $this->uri->segment(2);?>",l:a,u:b,val:val},
                         success: function(response){

                          jq("#filterproducts").html(response);
                          }
                         });
                      });


						//alert("sadfff");
						<?php /*foreach($uni_access as $access)
									{ ?>

						jq("#caddtocart<?php echo $access['uniform_id'];?>").click(function(){
							//alert('clicked');

				var formdata=jq("#bundle<?php echo $access['uniform_id'];?>").serialize();

					jq(this).text("Added");

					jq(this).attr("disabled","disabled");
					var citems=parseInt(jq("#citems").text())+1;
					jq("#citems").text(citems);

					jq.ajax({

						 type: "POST",

						 url: '<?php echo base_url();?>index.php/Welcome/addtocart_uniform',

						 data: {"formdata":formdata},

						 success: function(response){

							//alert(response);

							 jq("#caddtocart").removeAttr('disabled');

							jq("#caddtocart").text('Added');

							 jq("#mycart").html(response);

							 }

						 });

			});

						jq(".btn-number<?php echo $access['uniform_id'];?>").click(function(){

							setTimeout(function(){

							 var qty=jq("#qty<?php echo $access['uniform_id'];?>").val();

							var	pr="<?php echo $access['price']; ?>";

							var np=parseInt(qty)*parseInt(pr);//alert(pr);
							var np=' '+np;
							//alert(np);

								jq("#price<?php echo $access['uniform_id'];?>").text(np);

							}, 500);

						});

					<?php } */?>
					});

</script>
<div id="filterproducts">
	<?php foreach($uni_access as $access)
									{
//print_r($access);
									?>



                                     <div class="product-preview-wrapper">

										<div class="product-preview">

											<div class="product-preview__image">

		   <div class="sizes-example sizes-example1" >
                <a href="<?php echo base_url();?>Welcome/uniform_product/<?php echo $access['uni_category'];?>/<?php echo $access['uniform_id'];?>"><img src="<?php echo base_url();?>assets/images/uniform/<?php echo $access['uniform_image'];?>" alt=""/></a>
                <div class="overlay_img" id="<?php echo $access['uniform_id']; ?>_<?php echo $access['school_name']; ?>"><i class="fa fa-heart" aria-hidden="true"></i></div>



											</div>

											<div class="product-preview__info">


</div>
												<div class="product-preview__info__title" >
													<h2><a href="#"><?php echo substr($access['school_name'], 0,47);
													if(strlen($access['school_name'])>47){echo '...';}?></a></h2>

												</div>




											<div class="input-group-qty pull-left" >
											<?php
											$current_date=date('Y-m-d');


										                $x=$access['price'];

										            ?>


										            <div class="product-info__sku pull-right">&nbsp;&nbsp;
												<?php if($access['quantity']==0)
										              {
										            ?>

										            <!--span class="label label-success">OUT OF STOCK</span-->
										            <script>
										             // var jq = $.noConflict();
										          //alert(jq);
										          jq(document).ready(function(){
										          	//alert('jq');
										          	 jq(function() {
										          	 	//alert('jk');
        jq('.lazy').lazy();
    });
										            jq("#caddtocart<?php echo $access['uniform_id'];?>").attr("disabled","disabled");

										          });

										            </script>

										            <?php
										          }
										              else
										              {
										            ?>

										            <?php
										              }
										            ?>
										            </div>
											 </div>
<br /><br />
												<div class="price-box price-box__new" style="text-align:left;margin-top: -36px; margin-bottom: 20px;">

												<?php
												if(($current_date>=$access['from_date']) AND ($current_date<=$access['to_date'])){

												if($access['offer_type']=='Percentage' OR $access['offer_type']=='Amount')
										              {
										            ?>
										            <span class="price-box__new">&#8358; <b id="price<?php echo $access['uniform_id'];?>"><?php echo $x;?></b></span>
										              <span class="price-box__old">&#8358; <b id="price<?php echo $access['uniform_id'];?>"><?php echo $access['price'];?></b></span>
										            <?php
										              }
										             }
										              else

										              {
										            ?>
										            <span class="price-box__new">&#8358;<b id="price<?php echo $access['uniform_id'];?>"><?php echo $x;?></b></span>

										            <?php
										              }
										            ?>

												</div>

												 <div class="outer" align="center">




            </div>




											</div>

										</div>

									</div>

									<?php }?>
									</div>
									<div class="row">
                            <div class="col-md-12 text-center">
                                <?php echo $links; ?>
                            </div>
                        </div>

								</div>

							</div>

						</div>

					</div>

				</section>

			</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>


<script src="<?php echo base_url();?>assets/js/custom.js"></script>
