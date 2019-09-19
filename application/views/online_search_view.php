<style type="text/css">
	.overlay_img{
  //  display:none;
}

@media only screen and (max-width: 500px) {
.sizes-example1 {
	width: 100% !important;
	height:250px !important;

}
}
@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
.sizes-example1 {
	width: 100%;
	height: 175px !important;
}
}
@media only screen and (max-device-width: 1350px) and (min-device-width: 1024px){
.sizes-example1 {
	height: 200px !important;
	}}

.flash-message{

    position:absolute;
    top:240px;
    width: 100%;
    left:0px;
    color:#000;
}

@media(max-width: 500px){
  .flash-message{
 top: 150px;
}
}


.sizes-example1 {
	width: 100%;
	height: 280px;


}
.sizes-example {
	float: none !important;

	margin-left: 1%;
}
 .overlay_img:hover:before {

   // content: '\2665';

}
</style>
<div id="filterproducts_child" class="topdiv">
<?php

//print_r($pros);

foreach($pros as $access){

	?>


                                    <div class="product-preview-wrapper">

										<div class="product-preview">

											<div class="product-preview__image image">
											<div class="sizes-example1">
<?php $url =  base_url().'Welcome/boutique_product/'.$cat.'/'.$access->id; ?>
<?php $catname = $this->db->get_where('mcategory',array('mid'=>$cat))->row();
$mcatname = $this->db->get_where('main_categories',array('id'=>$access->category_for_filter))->row();

if(!empty($access->url))
  {
    $title_url = $access->url;
  }else{
    $title_url = preg_replace('/[^A-Za-z0-9 -]/u','', strtolower(strip_tags(str_replace(" ", "-",$access->brand))));
  }


if(!empty($mcatname)){
$url =  str_replace("--","-",base_url().'online-boutique/'.$catname->mcat_name.'/'.str_replace(" ", "-",$mcatname->name).'/'.$title_url.'/'.$access->id);
}else{
$url =  str_replace("--","-",base_url().'online-boutique/'.$catname->mcat_name.'/'.$title_url.'/'.$access->id);
}

 ?>
                <a href="<?php echo $url; ?>">
   <?php if($access->thumb=='' || $access->thumb==' '){ ?>
               <img src="<?php echo base_url();?>assets/images/accessrics/cover.jpg" alt=""/></a>
                <?php } else { ?>
                 <img src="<?php echo base_url();?>assets/images/online_boutique/resized_online_boutique/resize400_600/<?php echo $access->thumb;?>" alt=""/></a>
                <?php } ?>



                		<?php if($this->session->userdata("userid")==''){ ?>

                <a href="<?php echo base_url() ?>Welcome/login?url=<?php echo $url; ?>"><div class="overlay_img" id="<?php echo $access->id; ?>_<?php echo $access->brand; ?>"><img src="<?php echo base_url(); ?>assets/images/heart_empty.png"></div></a>

                 <?php }else{
                 	
                 	    $pname = preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($access->brand));

                  $wishlist = $this->db->get_where('wishlist',array('p_id'=>$access->id,'p_name'=>"$pname", 'user_id'=>$this->session->userdata("userid")))->num_rows();
                  //echo $this->db->last_query();

                  if($wishlist>=1){ ?>

                   <div class="overlay_img overlay_img_fill" id="<?php echo $access->id; ?>_<?php echo $pname; ?>" ><img id="<?php echo $access->id; ?>" src="<?php echo base_url(); ?>assets/images/heart_fill.png"></div>
                  <?php }else{
                    ?>
                    <div class="overlay_img" id="<?php echo $access->id; ?>_<?php echo $pname; ?>"><img id="<?php echo $access->id; ?>" src="<?php echo base_url(); ?>assets/images/heart_empty.png"></div>
                    <?php
                    }} ?>
                </div>





											</div>
											<!--div class="flash-message alert alert-success flashalert<?php echo $access->id; ?>" ><center>Added To Wishlist</center></div>
											<div class="flash-message alert alert-success flashalert2<?php echo $access->id; ?>" ><center>Wishlist Removed</center></div-->

											<div class="product-preview__info">



												<div class="product-preview__info__title">


													<h2><a href="#"><?php echo substr($access->brand, 0,47);
													if(strlen($access->brand)>47){echo '...';}?></a></h2>

												</div>

  <?php

            $current_date=date('Y-m-d');
            if(($current_date>=$access->from_date) AND ($current_date<=$access->to_date)){
            ?>

            <?php if($access->offer_type=='Percentage')
              {
                $value = 100 - $access->offer_price;
                $x=($access->price/100)*$value;
            ?>
            <div class="product-preview__label product-preview__label--left product-preview__label--sale"><span><?php echo $access->offer_price;?>% OFF</span></div>

            <?php
              }
              elseif($access->offer_type=='Amount')
              {
                $value = $access->offer_price;
                $x=$access->price - $value;
            ?>
             <div class="product-preview__label product-preview__label--left product-preview__label--sale"><span><i class="fa fa-inr"></i><?php echo $access->offer_price;?> OFF</span></div>

            <?php
              }

            }
            else
              {
                $x=$access->price;
             } ?>
												<div class="price-box ">
            <?php
            //$current_date=date('Y-m-d');
              if(($current_date>=$access->from_date) AND ($current_date<=$access->to_date)){
            if($access->offer_type=='Percentage' OR $access->offer_type=='Amount')
              {
            ?>
              <span class="price-box__old"><i class="fa fa-inr"></i> <?php echo round($access->price);?></span>

            <span class="price-box__new"><i class="fa fa-inr"></i> <?php echo round($x);?></span>

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


											</div>

										</div>

									</div>



                                    <?php } ?>
</div>

                                    <?php $page_count=$count/20; if($page_count!=0){  ?>
		<div class="row">
<div class="col-md-12 col-sm-12 text-center">
                                <ul class="pagination">
																<li class="active"><a  class="previous but"><< Previous </a></li>
<?php
for ($i=0; $i <= $page_count; $i++) {


    ?>
                                <li class="active"><a id="<?php echo $i; ?>" class="page but"><?php echo $i+1; ?></a></li>

<?php }

?><li class="active"><a class="next but"> Next >></a></li>
                                </ul>                            </div>
</div>

<?php } ?>
  <script src="https://cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js"></script>
  <link href="https://cdn.jsdelivr.net/alertifyjs/1.8.0/css/alertify.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/alertifyjs/1.8.0/css/themes/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">
$(document).ready(function(){
$('.page:first').css("background-color","#444");
$('.page:first').addClass("not");
$('.page:first').addClass("min");
$('.page:last').addClass("max");
												$('.page:first').css("color","#fff");

	
                   $(".overlay_img").click(function(){
                        var id2 = $(this).attr('id');
                        //alert(id2);
                        if ($(this).hasClass('overlay_img_fill'))
                        {
                           $(this).removeClass("overlay_img_fill");
                          id = id2.split('_');
                            $.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/wishlist_delete',
                        data: {'pid':id[0],'pname':id[1],'type':'online'},
                         success: function(response){

                          $("#" + id[0]).attr("src", "<?php echo base_url(); ?>assets/images/heart_empty.png");
                          alertify.success('Wishlist Removed');

                          }
                         });
                          return false();
                        }

                          $(this).addClass("overlay_img_fill");
                        id = id2.split('_');

                        //alert(id[0]+"-----"+id[1]);
                        $.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/wishlist',
                        data: {'pid':id[0],'pname':id[1],'type':'online'},
                         success: function(response){

                          $("#" + id[0]).attr("src", "<?php echo base_url(); ?>assets/images/heart_fill.png");
                          
                           alertify.success('Added to Wishlist');
                          }
                         });
});

$(".next").click(function(){

	console.log('yes');
		var page_no = $('.not').attr('id');
		var max = $('.max').attr('id');
		console.log(page_no+' '+max);
		if(page_no>=max){
}else{
		page_no++;
		console.log(page_no);
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
		//alert(u+l+val+formdata+new_cat+cat);

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

	console.log('yes');
		var page_no = $('.not').attr('id');
		var max = $('.min').attr('id');
		if(page_no<=max){
}else{
		page_no--;
		console.log(page_no);
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
		//alert(u+l+val+formdata+new_cat+cat);

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
												 $('.topdiv').scrollTop(0);
												$("#filterproducts_child").html('<div id="loading" style="background-color: #fff;width: 100%;height: 2000px;"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:13%;margin-left:35%;"></div>');
												//console.log('click');
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
												//alert(u+l+val+formdata+new_cat+cat);

										$.ajax({
												 type: "POST",
												 url: '<?php echo base_url();?>index.php/Welcome/filter_child_online',
												data: {'page_no':page_no,'formdata':formdata,cat:"1",l:l,u:u,val:val,new_cat:new_cat,cat:cat},
												 success: function(response){

													$("#filterproducts_child").html(response);
													}
												}); }
});
										});
</script>
