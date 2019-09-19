
    <style type="text/css">


.flash-message{

    position:absolute;
    top:250px;
    width: 100%;
    left:0px;
    color:#000;
}

@media(max-width: 500px){
  .flash-message{
 top: 200px;
}
}


</style>
<?php

//print_r($pros);
//echo $count;
?>

<div id="filterproducts_child">
<?php
foreach($pros as $fab){

	//foreach ($fab as $fab) {
	?>


<div class="product-preview-wrapper" >

										<div class="product-preview">

											<div class="product-preview__image">
 <div class="sizes-example1 image" >
    <?php $url =  base_url().'Welcome/uniform_product/'.$fab->uni_category.'/'.$fab->uniform_id; ?>
    <?php //$catname = $this->db->get_where('mcategory',array('mid'=>$fab->uni_category))->row();
    $mcatname = $this->db->get_where('main_categories',array('id'=>$fab->category_for_filter))->row();
    if(!empty($mcatname)){
    $url =  base_url().'uniform/'.$fab->uni_category.'/'.str_replace(" ", "-",$mcatname->name).'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$fab->school_name))).'/'.$fab->uniform_id;
  }else{
    $url =  base_url().'uniform/'.$fab->uni_category.'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$fab->school_name))).'/'.$fab->uniform_id;
  } ?>
                <a href="<?php echo $url;?>">
   <?php if($fab->uniform_image=='' || $fab->uniform_image==' '){ ?>
               <img src="<?php echo base_url();?>assets/images/fabrics/cover.jpg" alt=""/></a>
                <?php } else { ?>
                 <img src="<?php echo base_url();?>assets/images/uniform/resized_uniform/resize400_600/<?php echo $fab->uniform_image;?>" alt=""/></a>
                <?php } ?>

                  <?php if($this->session->userdata("userid")==''){ ?>

                <a href="<?php echo base_url() ?>Welcome/login?url=<?php echo $url; ?>"><div class="overlay_img" id="<?php echo $fab->uniform_id; ?>_<?php echo $fab->school_name; ?>"><img src="<?php echo base_url(); ?>assets/images/heart_empty.png"></div></a>

                 <?php }else{
                   $pname = preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($fab->school_name));
                  $wishlist = $this->db->get_where('wishlist',array('p_id'=>$fab->uniform_id,'p_name'=>"$pname", 'user_id'=>$this->session->userdata("userid")))->num_rows();

                  if($wishlist>=1){ ?>

                   <div class="overlay_img overlay_img_fill" id="<?php echo $fab->uniform_id; ?>_<?php echo $pname; ?>" ><img id="k<?php echo $fab->uniform_id; ?>" src="<?php echo base_url(); ?>assets/images/heart_fill.png"></div>
                  <?php }else{
                    ?>
                    <div class="overlay_img" id="<?php echo $fab->uniform_id; ?>_<?php echo $pname; ?>"><img id="k<?php echo $fab->uniform_id; ?>" src="<?php echo base_url(); ?>assets/images/heart_empty.png"></div>
                    <?php
                    }} ?>
</div>
<?php

            $current_date=date('Y-m-d');
            if(($current_date>=$fab->from_date) AND ($current_date<=$fab->to_date)){
            ?>

            <?php if($fab->offer_type=='Percentage')
              {
                $value = 100 - $fab->offer_price;
                $x=($fab->price/100)*$value;
            ?>
            <div class="product-preview__label product-preview__label--left product-preview__label--sale"><span><?php echo $fab->offer_price;?>% OFF</span></div>

            <?php
              }
              elseif($fab->offer_type=='Amount')
              {
                $value = $fab->offer_price;
                $x=$fab->price - $value;
            ?>
             <div class="product-preview__label product-preview__label--left product-preview__label--sale"><span><i class="fa fa-inr"></i><?php echo $fab->offer_price;?> OFF</span></div>

            <?php
              }

            }
            else
              {
                $x=$fab->price;
              }
            ?>
            	</div>
											<div class="product-preview__info ">



												<div class="product-preview__info__title">
                          <h2>
													<a href="#"><?php echo substr($fab->school_name, 0,47);
													if(strlen($fab->school_name)>47){echo '...';}?></a>
                          </h2>

												</div>



												<!--<ul class="options-swatch options-swatch--color">

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/blue.png" width="10" height="10" alt=""/></span></a></li>

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/yellow.png" width="10" height="10" alt=""/></span></a></li>

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/green.png" width="10" height="10" alt=""/></span></a></li>

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/dark-grey.png" width="10" height="10" alt=""/></span></a></li>

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/grey.png" width="10" height="10" alt=""/></span></a></li>

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/red.png" width="10" height="10" alt=""/></span></a></li>

													<li><a href="#"><span class="swatch-label"><img src="<?php echo base_url();?>assets/images/colors/white.png" width="10" height="10" alt=""/></span></a></li>

												</ul>-->


				<div class="price-box ">
            <?php

              if(($current_date>=$fab->from_date) AND ($current_date<=$fab->to_date)){
            if($fab->offer_type=='Percentage' OR $fab->offer_type=='Amount')
              {
            ?>
            
              <span class="price-box__old"><i class="fa fa-inr"></i> <?php echo round($fab->price); ?></span>
              <span class="price-box__new"><i class="fa fa-inr"></i> <?php echo round($x); ?></span>

            <?php
              }
            }
              else

              {
            ?>
            <span class="price-box__new"><i class="fa fa-inr"></i> <?php echo round($x);?></span>

            <?php
              }
            ?></div>

												<div class="product-preview__info__description">

													<p>Nulla at mauris leo. Donec quis ex elementum, tincidunt elit quis, cursus tortor. Sed sollicitudin enim metus, ut hendrerit orci dignissim venenatis.</p>

													<p>Suspendisse consectetur odio diam, ut consequat quam aliquet at.</p>

												</div>

												<!--<div class="product-preview__info__link"><a href="#" class="compare-link"><span class="icon icon-bars"></span><span class="product-preview__info__link__text">Add to compare</span></a> <a href="#"><span class="icon icon-favorite"></span><span class="product-preview__info__link__text">Add to wishlist</span></a><a href="#" class="btn btn--wd buy-link"><span class="icon icon-ecommerce"></span><span class="product-preview__info__link__text">Add to cart</span></a></div>
-->
											</div>

										</div>

									</div>



                                    <?php }?>
                                    </div>
<?php  $count; $page_count=$count/20; if($page_count!=0){  ?>
		<div class="row">
<div class="col-md-12 text-center">
                                <ul class="pagination">
                                  <li class="active"><a  class="previous but"><< Previous </a></li>
<?php
for ($i=0; $i < $page_count; $i++) {


    ?>
                                <li class="active"><a id="<?php echo $i; ?>" class="page but<?php echo $i; ?>"><?php echo $i+1; ?></a></li>

<?php }
?><li class="active"><a class="next but">Next >></a></li>
                                </ul>                            </div>
</div>

<?php } ?>
  <script src="https://cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js"></script>
  <link href="https://cdn.jsdelivr.net/alertifyjs/1.8.0/css/alertify.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/alertifyjs/1.8.0/css/themes/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">

jq(document).ready(function(){
	//alert('k');
  jq('.page:first').css("background-color","#444");
  jq('.page:first').css("color","#fff");
  jq('.page:first').addClass("not");
  jq('.page:first').addClass("min");
  jq('.page:last').addClass("max");

	




											jq(".overlay_img").click(function(){
												var id2 = jq(this).attr('id');
												//alert(id2);

                        if (jq(this).hasClass('overlay_img_fill'))
                        {
                           jq(this).removeClass("overlay_img_fill");
                           id = id2.split('_');
                            jq.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/wishlist_delete',
                        data: {'pid':id[0],'pname':id[1],'type':'uniform'},
                         success: function(response){
                           jq("#k" + id[0]).css('border','0px solid red');

                          jq("#k" + id[0]).attr("src", "<?php echo base_url(); ?>assets/images/heart_empty.png");
                         
                          alertify.success('Wishlist Removed');
                          }
                         });
                          return falsdsse();
                        }

                         
												id = id2.split('_');

												//alert(id[0]+"-----"+id[1]);
                        jq(this).addClass("overlay_img_fill");
												jq.ajax({
												 type: "POST",
												 url: '<?php echo base_url();?>index.php/Welcome/wishlist',
												data: {'pid':id[0],'pname':id[1],'type':'uniform'},
												 success: function(response){

												 	console.log(response);
                           jq("#k" + id[0]).css('border','0px solid red');
                          jq("#k" + id[0]).attr("src", "<?php echo base_url(); ?>assets/images/heart_fill.png");

                          alertify.success('Added to Wishlist');

													}
												 });
});
jq(".next").click(function(){

		var page_no = jq('.not').attr('id');
		var max = jq('.max').attr('id');
		if(page_no>=max){
}else{
		page_no++;
		jq(".page").removeClass("not");
		jq('.page').css("background-color","#fff");
		jq('.page').css("color","#444");
		jq("#" + page_no).css("background-color","#444");
		jq("#" + page_no).css("color","#fff");
		jq("#" + page_no).addClass("not");
		var u = <?php echo $u; ?>;
				var l = <?php echo $l; ?>;
				var val = '<?php echo $val; ?>';
		var formdata='<?php echo $unique_kk2; ?>';
		var new_cat = '<?php echo $cat2; ?>';
		var cat = '<?php echo $cat; ?>';
jq.ajax({
		 type: "POST",
		 url: '<?php echo base_url();?>index.php/Welcome/filter_child_uniform',
		data: {'page_no':page_no,'formdata':formdata,cat:"1",l:l,u:u,val:val,new_cat:new_cat,cat:cat},
		 success: function(response){
			  jq('.topdiv').scrollTop(0);
			jq("#filterproducts_child").html(response);
    }
		}); }
});
jq(".previous").click(function(){

		var page_no = jq('.not').attr('id');
		var max = jq('.min').attr('id');
		if(page_no<=max){
}else{
		page_no--;
		jq(".page").removeClass("not");
		jq('.page').css("background-color","#fff");
		jq('.page').css("color","#444");
		jq("#" + page_no).css("background-color","#444");
		jq("#" + page_no).css("color","#fff");
		jq("#" + page_no).addClass("not");
		var u = <?php echo $u; ?>;
				var l = <?php echo $l; ?>;
				var val = '<?php echo $val; ?>';
		var formdata='<?php echo $unique_kk2; ?>';
		var new_cat = '<?php echo $cat2; ?>';
		var cat = '<?php echo $cat; ?>';
jq.ajax({
		 type: "POST",
		 url: '<?php echo base_url();?>index.php/Welcome/filter_child_uniform',
		data: {'page_no':page_no,'formdata':formdata,cat:"1",l:l,u:u,val:val,new_cat:new_cat,cat:cat},
		 success: function(response){
			 jq('.topdiv').scrollTop(0);
			jq("#filterproducts_child").html(response);
			}
		});
		}
});

											jq(".page").click(function(){

												//console.log('click');
                        if ( $(this).hasClass( "not" ) ) {

            					}else{
                        jq("#filterproducts_child").html('<div id="loading" style="background-color: #fff;width: 100%;height: 2000px;"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:13%;margin-left:35%;"></div>');

												var page_no = jq(this).attr('id');
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


										jq.ajax({
												 type: "POST",
												 url: '<?php echo base_url();?>index.php/Welcome/filter_child_uniform',
												data: {'page_no':page_no,'formdata':formdata,l:l,u:u,val:val,new_cat:new_cat,cat:cat},
												 success: function(response){

													jq("#filterproducts_child").html(response);
                        },
                        error: function(response){
                          console.log(response);
                        }
                      }); }
});
										});
</script>
