<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
		$(document).ready(function () {
		$(".imgLiquidFill").imgLiquid({fill:true});
	});
	</script>
<style>
.select2_active{
	color: #333333;
    background-color: #e6e6e6;
    border-color: #adadad;
}
@media only screen and (max-width: 500px) {
.sizes-example1 {
	width: 100% !important;
	height:180px !important;

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
	height: 350px;
	margin-bottom: 10px;


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
.single-slider
{
	display:none !important;
}

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

				<section class="content">

					<div class="container">

								<div class="products-grid products-listing products-col four-in-row">
                               <h2 style="text-align: center; margin-bottom: 20px; margin-top: 20px;">Recently Viewed Product</h2>
                                <div class="col-md-1"> </div>
                               <div class="col-md-10"> <div class="filters-row row">
                        </div>
                        <div id="filterproducts">
									<?php
									$keyword = $this->session->userdata('city_session');
									$this->db->where("city LIKE '%$keyword%'");
									$this->db->limit(5);
									$this->db->where('r_viewed BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
									$fab1=$this->db->get("fabric")->result_array();
									foreach($fab1 as $fab){
										$catname = $this->db->get_where('mcategory',array('mid'=>$fab['category']))->row();
									 $mcatname = $this->db->get_where('main_categories',array('id'=>$fab['category_for_filter']))->row();
									 if(!empty($mcatname)){
									 $url =  base_url().'fabric/'.$catname->mcat_name.'/'.str_replace(" ", "-",$mcatname->name).'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$fab['title']))).'/'.$fab['id'];
								 }else{
									 $url =  base_url().'fabric/'.$catname->mcat_name.'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$fab['title']))).'/'.$fab['id'];
								 }
								 ?>
                                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                         				<div class="sizes-example sizes-example1" >
                                            <a href="<?php echo $url;?>"><img src="<?php echo base_url();?>assets/images/fabrics/<?php echo $fab['thumb'];?>"  alt=""/></a>
                                        </div>


											<div class="product-preview__info">
												<div class="product-preview__info__title">
													<h2><a href="#"><?php echo substr($fab['title'], 0,47);
													if(strlen($fab['title'])>47){echo '...';}?></a></h2>
												</div>
												<div class="price-box"><i class="fa fa-inr"></i> <?php echo $fab['price'];?></div>

											</div>

									</div>

									<?php }?>

									<?php
									$keyword = $this->session->userdata('city_session');
									$this->db->where("city LIKE '%$keyword%'");
									$this->db->limit(5);
									$this->db->where('r_viewed BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
									$acc1=$this->db->get("accessories")->result_array();
									foreach($acc1 as $acc){
										$catname = $this->db->get_where('mcategory',array('mid'=>$acc['main_category']))->row();
									 $mcatname = $this->db->get_where('main_categories',array('id'=>$acc['category_for_filter']))->row();
									 if(!empty($mcatname)){
									 $url =  base_url().'accessories/'.$catname->mcat_name.'/'.str_replace(" ", "-",$mcatname->name).'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$acc['brand']))).'/'.$acc['acc_id'];
								 }else{
									 $url =  base_url().'accessories/'.$catname->mcat_name.'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$acc['brand']))).'/'.$acc['acc_id'];
								 }
										?>
                                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                         				<div class="sizes-example sizes-example1" >
                                            <a href="<?php echo $url;?>"><img src="<?php echo base_url();?>assets/images/accessories/<?php echo $acc['thumb'];?>"  alt=""/></a>
                                        </div>


											<div class="product-preview__info">
												<div class="product-preview__info__title">
													<h2><a href="#"><?php echo substr($acc['brand'], 0,47);
													if(strlen($acc['brand'])>47){echo '...';}?></a></h2>
												</div>
												<div class="price-box"><i class="fa fa-inr"></i> <?php echo $acc['price'];?></div>

											</div>

									</div>

									<?php }?>

									<?php
									$keyword = $this->session->userdata('city_session');
									$this->db->where("city LIKE '%$keyword%'");
									$this->db->limit(5);
									$this->db->where('r_viewed BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
									$on1=$this->db->get("online_boutique")->result_array();
									foreach($on1 as $on){
										$catname = $this->db->get_where('mcategory',array('mid'=>$on['main_category']))->row();
									 $mcatname = $this->db->get_where('main_categories',array('id'=>$on['category_for_filter']))->row();
									 if(!empty($mcatname)){
									 $url =  base_url().'online-boutique/'.$catname->mcat_name.'/'.str_replace(" ", "-",$mcatname->name).'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$on['brand']))).'/'.$on['id'];
								 }else{
									 $url =  base_url().'online-boutique/'.$catname->mcat_name.'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$on['brand']))).'/'.$on['id'];
								 }
										?>
                                 <div class="product-preview-wrapper col-md-4 col-sm-4 col-xs-6" style="max-height: 430px;">

                         				<div class="sizes-example sizes-example1" >
                                            <a href="<?php echo $url;?>"><img src="<?php echo base_url();?>assets/images/online_boutique/<?php echo $on['thumb'];?>"  alt=""/></a>
                                        </div>


											<div class="product-preview__info">
												<div class="product-preview__info__title">
													<h2><a href="#"><?php echo substr($on['brand'], 0,47);
													if(strlen($on['brand'])>47){echo '...';}?></a></h2>
												</div>
												<div class="price-box"><i class="fa fa-inr"></i> <?php echo $on['price'];?></div>

											</div>

									</div>

									<?php }?>
									<span class=" newblocks newdata_1">

									</span>
                  </div>



								</div>

							</div>


				</section>
				<div class="loading3">
					<div id="loading3" style="background-color: #fff;width: 100%;height: 100%;z-index:5000000"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style=" position:relative; top:50%; left:47%;"></div>
				<br>
				</div>
			</div>
  <input type="hidden" id="row_no" value="5">
             <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/2.1.0/jquery.imagesloaded.min.js"></script>
   <script src="<?php echo base_url(); ?>js/jquery-imagefill.js"></script>
  <script>

	$(window).scroll(function ()
	{
	if(($(document).height()-600) <= $(window).scrollTop() + $(window).height())
	{
		if($('.loading3').css('display')!='none')
		{
			$('body').css('overflow-y','hidden');
			loadmore();
		}
	}
	});

	function loadmore()
	{
		var row_num = $("#row_no").val();
		$.ajax({
		type: 'post',
		url: '<?php echo base_url(); ?>/welcome/recently_viewed_products',
		data: {
		 getresult:row_num
		},
		success: function (response) {
			console.log(response+response.length+'kkkkkk');
			if(response.length>10){
			$('.newblocks:last').after($('<span />', {
	        class: 'newdata_' + row_num + ' newblocks',
	        }));
		$('.newdata_' + row_num).html(response);
		var a = parseInt(row_num)+5;
		$("#row_no").val(a);
		$('body').css('overflow-y','initial');
}else if(response.length<10){
	$('body').css('overflow-y','initial');
	$('.loading3').css('display','none');
}
		}
	});
	}

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
