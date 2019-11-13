
 <!-- jsDeliver -->
 <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.lazy/1.7.4/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.lazy/1.7.4/jquery.lazy.plugins.min.js"></script>

    <!-- cdnjs -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.4/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.4/jquery.lazy.plugins.min.js"></script>

<?php //echo $count;//print_r($_POST);

foreach($fab as $fab_ids){
	$all_pro_ids[] = $fab_ids['category_for_filter'];
}
//print_r($all_pro_ids);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
		$(document).ready(function () {
		$(".imgLiquidFill").imgLiquid({fill:true});
	});
	</script>
<style>

img.lazy {
        /* optional way, set loading as background */
        background-image: url('<?=base_url();?>assets/images/01-progress.gif');
        background-repeat: no-repeat;
        background-position: 58% 49%;
    }
.select2_active{
	color: #333333;
    background-color: #e6e6e6;
    border-color: #adadad;
}
@media only screen and (max-width: 500px) {
.sizes-example1 {
	width: 100% !important;
	height:220px !important;

}
}
@media only screen and (max-device-width: 736px) and (min-device-width: 414px) and (orientation: portrait){
    .sizes-example1 {
        height: 260px !important;
    }
}
@media only screen and (min-device-width : 768px) and (max-device-width : 1023px) {
.sizes-example1 {
	width: 100%;
	height: 170px !important;
}
}
@media only screen and (max-width: 500px) {
.product-preview__info__title
{
	font-size:12px !important;
  height: 40px;
  overflow: hidden;
	}
}
.sizes-example1 {
	width: 100%;
	height: 265px;


}

@media only screen and (max-width: 500px) {
.sizes-example {
	float:none !important;


}
.filt
{
	display: none;
}
.sizes-example {
	float: none !important;


}
/*.single-slider
{
	display:none !important;
}*/

}
	.LogSep{
		margin:10px;
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
.btn-default
{
	border: none !important;
    font-weight: 600 !important;
    text-decoration: underline !important;
    padding: 10px !important;
}
	</style>

<div id="pageContent" class="page-content page-content--fill">

				<!-- Breadcrumb section -->

				<section class="breadcrumbs  hidden-xs">

					<div class="container">

						<ol class="breadcrumb breadcrumb--wd pull-left">
							<li><a href="<?php echo base_url();?>" style="color: #000;">Home</a></li>
          <?php $cat= $this->db->get_where("mcategory",array("mid"=>$this->uri->segment(3)))->row();?>
          <li><a href="<?php echo base_url();?>Welcome/shop/<?php echo $cat->mid;?>" style="color: #000;">Fabric</a></li>
          <li><a href="<?php echo base_url();?>Welcome/shop/<?php echo $cat->mid;?>" style="color: #000;"><?php echo $cat->mcat_name;?></a></li>

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







<div class="row">
<div class="col-md-8 col-sm-8" style="
    padding-top: 10px;
"><h6>Refine Your Search</h6></div>
<?php $uri =  $this->uri->segment(3);
?>

<div class="col-md-4 col-sm-4" style="
    padding-top: 10px;
"><a href="<?php echo base_url();?>index.php/Welcome/shop/<?php echo $uri;?>" style="font-weight: 600;">Clear All</a></div>
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
                                     <option value="r_high">Rating lowest</option>
                                     <option value="r_low">Rating highest</option>

									</select>

										</div>
									</div>


									<?php if(isset($all_pro_ids) && !empty($all_pro_ids)){
										$this->db->where_in("id",$all_pro_ids);

								$main_category=$this->db->get_where("main_categories",array("category"=>1))->result();
								if(isset($main_category) && !empty($main_category)){ ?>
								<h5 class=" text-uppercase" style="padding:12px 0px;">Categories </h5>
								<?php


								$type = $this->uri->segment(3);
								echo "<form action='' method='post' style='float:left' id='main_cat'>";
								echo"<input type='hidden' name='type' value='$type'>

                          	";
                          	echo "<div class='filter-list style-4' style='height:150px;overflow-y:scroll; width: 243px; padding:8px 0px; margin-bottom:25px;'>";
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
                          <?php  ?>

										<div class="filters-col__collapse__content" style="width:90%;">
                                         <h5 class=" text-uppercase" >Price </h5>
											<div id="priceSlider" class="price-slider"></div>
										</div>
									<br />

									<form id="filter" action="" method="post">
<div id="get_filter">
					<?php


							$b=array();

							foreach ($fab as $value) {
							$this->db->select("filter_subcategory_fcid");
                          $filter_check=$this->db->get_where("fabric_search",array("product_id"=>$value['id']))->result_array();
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
                      			if(isset($parent->sub_category_id) && !empty($parent->sub_category_id)){
                          		$d[] = $parent->sub_category_id;    }
                          }

		                        //print_r($d);
		                        if(!empty($d))
		                        {
		                        $e = array_unique($d);
		                        //print_r($e);

		                          	foreach ($e as $e) {


                          $filter=$this->db->get_where("filter",array("fid"=>$e))->row();
                         // echo $filter->fid;

                        ?>

                          <div class="filters-col__collapse open">

                            <h5 class="text-uppercase" style="padding:12px 0px;"><span><?php echo $filter->filter_category;?></span></h5>
                            <div class="filters-col__collapse__content">
								<ul class="filter-list style-4" style="overflow-y:scroll; height:150px; min-height:0px;padding: 8px;">
								  <?php
                                  foreach($c as $c2){
                                  	$f=$this->db->get_where("filter_subcategory",array("main_category_id"=>1,"sub_category_id"=>$filter->fid,"fcid"=>$c2))->result_array();
                                  	//print_r($f);
                                  	if(!empty($f)){?>
								  <li class="checkbox-group">
                                   <input type="checkbox"  name="fabric_search<?php echo $f[0]['fcid'];?>" id="<?php echo $f[0]['filter_name'];?>" value="<?php echo $f[0]['fcid'];?>" class="filter">
                                   <label for="<?php echo $f[0]['filter_name'];?>"> <span class="check"></span> <span class="box"></span> <?php echo $f[0]['filter_name'];?> </label></li>
                                   <?php }} ?>
									</ul>
								</div>
							</div>
                          <?php  }} ?>
</div>

                                    </form>
                                    <style type="text/css">
                                    	.selected{
                                    			background-color: #ddd;
                                    			padding:1%;
                                    			border-radius: 5px;
                                    			width: 20%;
                                    	}
                                    </style>
                                    <?php if(isset($_POST['new_cat'])){$new_cat = implode(',',$_POST['new_cat']);}else{$new_cat='0';} ?>
                                    <script>
										$(document).ready(function(){


                     // setTimeout(function() { $('.slider_li').css('width','830px'); }, 500);
$(function() {
   priceslider();
});


											$(".main_cat").click(function(){
												$("#main_cat").submit();
                        							/*$(".main_cat").removeClass("selected");
        											$(this).closest("div.main_cat").addClass("selected");
        											var id = $(this).attr("id");
        											//var type = <?php //echo $this->uri->segment(3);?>;
        											 /*$.post("http://localhost/ansvel/index.php/Welcome/shop/"+type, function(data, status){
													        alert("Data: " + data + "\nStatus: " + status);
													    });*/

        											//window.history.pushState({"html":'ll'},"", 'urlPath');
        											//parent.location.hash = '22'+id;
        											//window.history.pushState("object or string", "Title", "new-url");
        											/*$.ajax({
												 type: "POST",
												 url: '<?php //echo base_url();?>index.php/Welcome/get_filter',
												data: {'id':id,'type':type},
												 success: function(response){
												 	//alert(response);
													//$("#get_filter").html(response);
													}
												 });*/

											});

											$(".filter").click(function(){
												//alert('k');
												 $("#filterproducts").html('<div id="loading" style="background-color: #fff;width: 100%;height: 2000px;"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:13%;margin-left:35%;"></div>');

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
												//alert(formdata);
												//print_r(formdata);
												$.ajax({
												 type: "POST",
												 url: '<?php echo base_url();?>index.php/Welcome/filter',
												data: {formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
												 success: function(response){

													$("#filterproducts").html(response);
													}

												 });
											});


                      $('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').bind("DOMSubtreeModified",function(){
  alert('changed');
});
/*setInterval(function(){
  console.log('in3');
  var a = $('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
  var b = $('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
  setTimeout(function(){
    console.log('in2');

  }, 2000);
  var a1 = $('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
  var b2 = $('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
  alert(a+ '' +a1);
  if(a!=a1 || b!=b1)
  {
    alert('ok');
    priceslider();
  }

}, 3000);*/

                     //$(".noUi-handle.noUi-handle-upper").hover(priceslider);
                    /*    $("#priceSlider").hover(priceslider);
                      $("#priceSlider").click(priceslider);*/

                      function priceslider(){
                      	$("#filterproducts").html('<div id="loading" style="background-color: #fff;width: 100%;height: 2000px;"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:13%;margin-left:35%;"></div>');

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
//alert(a+''+b);
                                //var val = $(".select2").val();
                                var val = window.location.hash.substr(1);
                                var new_cat='<?php echo $new_cat; ?>';

                        var formdata=$("#filter").serialize();
                        $.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/filter',
                        data: {formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
                         success: function(response){

                          $("#filterproducts").html(response);
                          }

                         });

                      }
                      $(document).on('change','#mobile_sort',function(){
                        //alert('k');
                        $("#filterproducts").html('<div id="loading" style="background-color: #fff;width: 100%;height: 2000px;"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:13%;margin-left:35%;"></div>');

                        var a = $('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
                        var b = $('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
                         $("div").removeClass("select2_active");
                        $(".select2").removeClass("select2_active");
                    $(this).closest("div.select2").addClass("select2_active");
                        window.location.hash = $(this).val();
                        var val = $(this).val();
                        var new_cat='<?php echo $new_cat; ?>';
                        //alert(val);
                        if($('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
                          a=1;

                        }
                        if($('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
                          b=1000000;
                        }
                        var formdata=$("#filter").serialize();
                        $.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/filter',
                        data: {formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
                         success: function(response){

                          $("#filterproducts").html(response);
                          }

                         });
  });
                      $(".select2").click(function(){
                      	$("#filterproducts").html('<div id="loading" style="background-color: #fff;width: 100%;height: 2000px;"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:13%;margin-left:35%;"></div>');

                        var a = $('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html();
                        var b = $('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html();
                         $("div").removeClass("select2_active");
                        $(".select2").removeClass("select2_active");
        				        $(this).closest("div.select2").addClass("select2_active");
                        window.location.hash = $(this).attr("href");
                        var val = $(this).attr("href");
                        var new_cat='<?php echo $new_cat; ?>';
                        //alert(val);
                        if($('.noUi-handle.noUi-handle-lower .tooltip.top .tooltip-inner span').html()=='Min'){
                          a=1;
                          /*alert('in');*/
                        }
                        if($('.noUi-handle.noUi-handle-upper .tooltip.top .tooltip-inner span').html()=='10000+'){
                          b=1000000;
                        }
                        var formdata=$("#filter").serialize();
                        $.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/filter',
                        data: {formdata:formdata,cat:"<?php echo $this->uri->segment(3);?>",l:a,u:b,val:val,new_cat:new_cat},
                         success: function(response){

                          $("#filterproducts").html(response);
                          }
                         });
                      });
                    /*  $(".page").click(function(){
												console.log('click');

												var page_no = $(this).attr('id');
										$.ajax({
												 type: "POST",
												 url: '<?php echo base_url();?>index.php/Welcome/shop_child',
												data: {'page_no':page_no,'formdata':formdata,cat:"1",l:l,u:u,val:val,new_cat:new_cat},
												 success: function(response){

													$("#filterproducts_child").html(response);
													}
												 });
});*/

										});
									</script>

								</div>

							</div>

							<div id="centerCol">

								<div class="products-grid products-listing products-col four-in-row">

                                   <div class="col-md-12">


                      <section class="content top-null">

	  <div class="category-outer">
							<div class="category-slider single-slider">
								<ul>
                                  <?php
		// $this->db->order_by("cid", "desc");
		 $fcats=$this->db->get_where("shopbanner",array("status"=>"enable"))->result();
		// print_r($fcats);
		 //exit;
		 foreach($fcats as $subcat){?>
									<li class="slider_li un-bnr"><img src="<?php echo base_url(); ?>assets/images/shopbanner/<?php echo $subcat->shopbanner; ?>" alt="" class="bn-image" /></li>  <?php } ?>

								</ul>
							</div>

						</div>
				</section>

                        </div>



                               <div class="col-md-12"> <div class="">
                           <div class="filt filters-row">
                                <span><b>Sort By&nbsp;</b> </span>
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
                        <div id="filterproducts">
									<?php /*foreach($fab as $fab){?>


                                 <div class="product-preview-wrapper">


                         <div class="sizes-example sizes-example1" >
                                            <a href="<?php echo base_url();?>index.php/Welcome/product/<?php echo $this->uri->segment(3);?>/<?php echo $fab['id'];?>"><img src="<?php echo base_url();?>assets/images/fabrics/<?php echo $fab['thumb'];?>"  alt=""/></a>
                                            </div>



											<div class="product-preview__info text-center">
										<div class="product-preview__info__btns"><a href="#" class="btn btn--round"><span class="icon-ecommerce"></span></a> <a href="quick-view.html" class="btn btn--round btn--dark btn-quickview" data-toggle="modal" data-target="#quickView"><span class="icon icon-eye"></span></a></div>
												<div class="product-preview__info__title">
													<h2><a href="#"><?php echo $fab['title'];?></a></h2>
												</div>
												<div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
												<div class="price-box">&#8358; <?php echo $fab['price'];?></div>
												 <div class="product-preview__label product-preview__label--left product-preview__label--new"><span>new</span></div>
              <div class="product-preview__label product-preview__label--right product-preview__label--sale"><span>sale<br>
                -10%</span></div>


											</div>

									</div>

									<?php }?>
									 <div class="row">
                            <div class="col-md-12 text-center">
                                <?php //echo $links; ?>
                            </div>
                        </div>
                        <?php $page_count=$count/2; if($page_count!=0){  ?>
		<div class="row">
<div class="col-md-12 col-sm-12 text-center">
                                <ul class="pagination">
<?php
for ($i=0; $i < $page_count; $i++) {


    ?>
                                <li class="active"><a id="<?php echo $i; ?>" class="page"><?php echo $i; ?></a></li>

<?php }
?>
                                </ul>                            </div>
</div>
<?php } */?>
                  </div>



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

var distance = $('#filtersCol').offset().bottom,
    $window = $(window);
console.log(distance);
$window.scroll(function() {
    if ( $window.scrollTop() >= distance ) {
        //alert('kkk');
    }
});
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
            // Price Slider initialize


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
     url: '<?php echo base_url();?>index.php/Welcome/filter',
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
          <script type="text/javascript">
            document.documentElement.className = 'no-fouc';
        </script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
        <script src="<?php echo base_url();?>assets/js/custom.js"></script>
