<?php
$data = array("r_viewed"=>date("Y-m-d"));
$this->db->where('id', $this->uri->segment(4));
$this->db->update('fabric', $data);

 $catname = $this->db->get_where('mcategory',array('mid'=>$pro->category))->row();
  $mcatname = $this->db->get_where('main_categories',array('id'=>$pro->category_for_filter))->row();
  if(!empty($mcatname)){
  $url =  str_replace("--","-",base_url().'fabric/'.$catname->mcat_name.'/'.str_replace(" ", "-",$mcatname->name).'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$pro->title))).'/'.$pro->id);
}else{
  $url =  str_replace("--","-",base_url().'fabric/'.$catname->mcat_name.'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$pro->title))).'/'.$pro->id);  
} 
?>

<style>
/*.product-preview-wrapper
{
  width:245px !important;
}*/
.sizeimg{
  width: auto !important;
  height: 350px;

}
.sizes-example1 {
  width: 200px !important;
  height: 310px !important;

}
.measurement {
  width: auto;
  height: 350px;


}

.sizes-example {
  float: none !important;
}
.zoomLens
{
  position:absolute !important;

}
.overlay_img_fill{
  cursor: pointer;
}

.price-box__new{
   color:#000;
}
.price-box__old{
   color:#aaa;
   font-size:16px;
}
.reviewratingtext{
  color:#aaa;

}
@media(max-width: 500px){
  .sizeimg{
  width: 100%;
}
}
.progress-review{
  margin: 7px 0px !important;
  height: 7px !important;
}
.text-right{
  text-align: right;
}
.no-padding{
  padding: 0px !important;
}
.c-name{
  color: #8e8b8b;
  font-size: 13px;

}
.btn-red{
  background-color:#bb0f0f !important;
  color:#fff !important;
  
}
.btn-blue{
  background-color:#138dc7 !important;
     color:#fff !important;
}
.btn-red:hover{
  background-color:#9e0808 !important;
  
  
}
</style>


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.css">


 <link rel="stylesheet" href="<?php echo base_url(); ?>css/star-rating.css" media="all" type="text/css"/>

  <script src="<?php echo base_url(); ?>js/star-rating.js" type="text/javascript"></script>

  <link href="<?php echo base_url(); ?>css/bootstrap-glyphicons.css" rel="stylesheet">
<div id="pageContent">

    <section class="breadcrumbs breadcrumbs-boxed">
      <div class="container">



      </div>
    </section>


    <section class="content" style="padding-top: 20px;">
      <div class="container">
        <div class="row product-info-outer">
          <div class="col-sm-4 col-md-4 col-lg-4 hidden-xs">
            <div class="product-main-image">
              <div class="product-main-image__item">

              <img  class="product-zoom" src='<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize800_1200/<?php echo $pro->thumb;?>' data-zoom-image="<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize800_1200/<?php echo $pro->thumb;?>"/></div>
              <div class="product-main-image__zoom"></div>
            </div>
            <div class="product-images-carousel" align="center" >
              <ul id="smallGallery">

                <li><a href="#" data-image="<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize800_1200/<?php echo $pro->thumb;?>" data-zoom-image="<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize800_1200/<?php echo $pro->thumb;?>"><img src="<?php echo base_url();?>assets/images/fabrics/resized_fabric/small/<?php echo $pro->thumb;?>" alt="" style="max-height: 100px"/></a></li>

                <?php  if($pro->front!='size.jpg' && $pro->front!='back.jpg' && $pro->front!='front.jpg' && $pro->front!='' && $pro->front!=' ') {?>
                <li><a href="#" data-image="<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize800_1200/<?php echo $pro->front;?>" data-zoom-image="<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize800_1200/<?php echo $pro->front;?>"><img src="<?php echo base_url();?>assets/images/fabrics/resized_fabric/small/<?php echo $pro->front;?>" alt="" style="max-height: 100px"/></a></li>
                <?php } ?>

                 <?php  if($pro->back!='size.jpg' && $pro->back!='back.jpg' && $pro->front!='front.jpg' && $pro->back!='' && $pro->back!=' ') {?>
                <li><a href="#" data-image="<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize800_1200/<?php echo $pro->back;?>" data-zoom-image="<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize800_1200/<?php echo $pro->back;?>"><img src="<?php echo base_url();?>assets/images/fabrics/resized_fabric/small/<?php echo $pro->back;?>" alt="" style="max-height: 100px" /></a></li>
                <?php } ?>

              </ul>
            </div>
          </div>
          <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
           <ol class="breadcrumb breadcrumb--wd pull-left" style="padding:0px;">

          <li><a href="<?php echo base_url();?>" style="color: #000;">Home</a></li>
          <?php $cat= $this->db->get_where("mcategory",array("mid"=>$cid))->row();?>
          <li><a href="<?php echo base_url();?>Welcome/shop/<?php echo $cat->mid;?>" style="color: #000;">Fabric</a></li>
          <li><a href="<?php echo base_url();?>Welcome/shop/<?php echo $cat->mid;?>" style="color: #000;"><?php echo $cat->mcat_name;?></a></li>

          <li class="active"><?php echo substr($pro->title, 0,60);
                          if(strlen($pro->title)>60){echo '...';}?></li>

        </ol>
          
          </div>
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

            <div class="product-info__title">
              <h2><?php echo $pro->title."  (".$pro->SKU.")";?></h2>

            </div>
            <?php

            $current_date=date('Y-m-d');
            //echo $current_date;die;
            if(($current_date>=$pro->from_date) AND ($current_date<=$pro->to_date)){
            ?>

            <?php if($pro->offer_type=='Percentage')
              {
                $value = 100 - $pro->offer_price;
                $x=round(($pro->price/100)*$value);
                //echo $x;
            ?>

            <!--div class="product-info__sku pull-right">&nbsp;&nbsp;<span class="label label-success"><?php echo $pro->offer_price;?>% OFF</span></div-->

            <?php
              }
              elseif($pro->offer_type=='Amount')
              {
                $value = $pro->offer_price;
                $x=round($pro->price - $value);
               // echo $x;
            ?>

             <!--div class="product-info__sku pull-right">&nbsp;&nbsp;<span class="label label-success">Rs <?php echo $pro->offer_price;?> OFF</span></div-->


            <?php
              }

            }
            else
              {
                $x=round($pro->price);
              }
            ?>

            <?php
           
            if($count_stock_remain<=0 || $count_stock_remain<=$pro->Minimum_Quantity || empty($pro->min_quan_to_buy))
              {
            ?>

            <div class="product-info__sku pull-right">&nbsp;&nbsp;<span class="label label-success">OUT OF STOCK</span></div>

            <script>
              var jq = $.noConflict();
          //alert(jq);
          jq(document).ready(function(){
            jq("#caddtocart").attr("disabled","disabled");
            jq("#<?php echo $pro->id; ?>").attr("disabled","disabled");
            jq("#notifyme_section").show();

          });

            </script>

            <?php
          }
              else
              {
            ?>

            <div class="product-info__sku pull-right">&nbsp;&nbsp;<span class="label label-success">IN STOCK</span></div>


            <?php
              }
            ?>


            <ul id="singleGallery" class="visible-xs">
              <li><img src="<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize400_600/<?php echo $pro->thumb;?>" alt="" /></li>
             

              <?php if($pro->front!='size.jpg' && $pro->front!='back.jpg' && $pro->front!='front.jpg' && $pro->front!='' && $pro->front!=' '){ ?>
              <li><img src="<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize400_600/<?php echo $pro->front;?>" alt="" /></li>
              <?php }if($pro->back!='size.jpg' && $pro->back!='front.jpg' && $pro->back!='back.jpg' && $pro->back!='' && $pro->back!=' '){  ?>
              <li><img src="<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize400_600/<?php echo $pro->back;?>" alt="" /></li>
              <?php } ?>

            </ul>
            <div class="price-box product-info__price">
            <?php

              if(($current_date>=$pro->from_date) AND ($current_date<=$pro->to_date)){
            if($pro->offer_type=='Percentage' OR $pro->offer_type=='Amount')
              {
            ?>
            <span class="price-box__new"><i class="fa fa-inr"></i> <b id="price"><?php echo $x*$pro->min_quan_to_buy;?></b></span>
              <span class="price-box__old"><i class="fa fa-inr"></i> <b id="oldprice"><?php echo $pro->price*$pro->min_quan_to_buy;?></b></span>

            <?php
              }
            }
              else

              {
            ?>
            <span class="price-box__new"><i class="fa fa-inr"></i> <b id="price"><?php echo $x*$pro->min_quan_to_buy;?></b></span>

            <?php
              }
            ?>
<?php

            $current_date=date('Y-m-d');
            //echo $current_date;die;
            if(($current_date>=$pro->from_date) AND ($current_date<=$pro->to_date)){
            ?>

            <?php if($pro->offer_type=='Percentage')
              {
                $discount_per = $pro->offer_price; 
                $value = 100 - $pro->offer_price;
                $x=round(($pro->price/100)*$value);
/*$value = (($pro->price)*($pro->offer_price))/100;
                $tax_price = round($this->input->post("wholesale_price")-$tax_price);*/
                //echo $x;
            ?>

            <span class="product-info__sku ">&nbsp;&nbsp;<span class="label label-success" style="font-size: 12px;"><?php echo $pro->offer_price;?>% OFF</span></span>

            <?php
              }
              elseif($pro->offer_type=='Amount')
              {
                $discount = $value = $pro->offer_price;
                 $x=round($pro->price - $value);
               // echo $x;
            ?>

             <span class="product-info__sku ">&nbsp;&nbsp;<span class="label label-success" style="font-size: 12px;"><i class="fa fa-inr"></i> <?php echo $pro->offer_price;?> OFF</span></span>


            <?php
              }

            }
            else
              {
                $x=$pro->price;
              }
            ?>
            </div>
            Inclusive of all taxes
             <div class="product-info__sku "><span class="label label-success" style="font-size: 12px;background-color: #358d48"><span class="overall_rating">4.2</span> &nbsp<span class="icon-star"></span></span><span class="reviewratingtext">&nbsp&nbsp <span class="rating_count">0</span> Ratings & <span class="review_count">0</span> Reviews</span></div>




<?php
$data = $this->db->get_where('fabric_search',array('product_id'=>$pro->id))->row();
if(!empty($data)){
$all_filter = $data->filter_subcategory_fcid;
$all_filter = explode(',', $all_filter);
//print_r($all_filter);
foreach ($all_filter as $value) {
  $data = $this->db->get_where('filter_subcategory',array('fcid'=>$value))->row();
  //print_r($data);
  if(isset($data) && !empty($data))
  {
  $check = $this->db->get_where('filter',array('filter_main_category'=>1,'fid'=>$data->sub_category_id))->row();
  if($check->filter_category=='Color' or $check->filter_category=='color')
  {
    $color_arr[] = $data->filter_name;
  }
    if($check->filter_category=='Size' or $check->filter_category=='size' or $check->filter_category=='width' or $check->filter_category=='Width' )
  {
    $size_arr[] = $data->filter_name;
  }
} }} ?>
            <script>var jq = $.noConflict();
          //alert(jq);

   

          jq(document).ready(function(){
            update_price();
            jq("#notifyme_section").hide();
             jq("#filter_msg").hide();
            jq("#caddtocart").click(function(){
              var val_size = '';
               var val_color = '';
              <?php if(isset($size_arr) && !empty($size_arr)){  ?>

                 //val_size = jq(".size").is("checked").val();
                 val_size = jq("input[name='r2']:checked").val();
                 //alert(val_size);
                 //alert(val_size.length);
                 //console.log(val_size);
                 if(val_size == undefined || val_size === undefined || val_size === null)
                 {
                  jq("#filter_msg").show();
                  return false;
                 }

              <?php } ?>
                <?php if(isset($color_arr) && !empty($color_arr)){  ?>

                 // val_color = jq("#color").val();
                  val_color = jq("input[name='r']:checked").val();
                  //alert(val_color);
                 if(val_color == undefined || val_color === undefined || val_color === null)
                 {
                  jq("#filter_msg").show();
                  return false;
                 }


              <?php } ?>


        var formdata=jq("#bundle").serialize();
        //alert(formdata);
          jq(this).text("Adding");

          jq(this).attr("disabled","disabled");
          var citems=parseInt(jq("#citems").text())+1;
           var count_cart=parseInt(jq("#count_cart").text())+1;
          jq("#citems").text(citems);
          jq("#count_cart").text(count_cart);

          jq.ajax({

             type: "POST",

             url: '<?php echo base_url();?>index.php/Welcome/addtocart',

             data: {"formdata":formdata,"val_size":val_size,"val_color":val_color},

             success: function(response){

              console.log(response);

               //jq("#caddtocart").removeAttr('disabled');

              jq("#caddtocart").text('Added');

               jq("#mycart").html(response);
               jq("#mycart2").html(response);
               jq("#filter_msg").hide();
               }

             });

      });
               jq(".addtostitch").click(function(){
              var val_size = '';
               var val_color = '';
              <?php if(isset($size_arr) && !empty($size_arr)){  ?>

                 //val_size = jq(".size").is("checked").val();
                 val_size = jq("input[name='r2']:checked").val();
                 //alert(val_size);
                 //alert(val_size.length);
                 //console.log(val_size);
                 if(val_size == undefined || val_size === undefined || val_size === null)
                 {
                  jq("#filter_msg").show();
                  return false;
                 }

              <?php } ?>
                <?php if(isset($color_arr) && !empty($color_arr)){  ?>

                 // val_color = jq("#color").val();
                  val_color = jq("input[name='r']:checked").val();
                  //alert(val_color);
                 if(val_color == undefined || val_color === undefined || val_color === null)
                 {
                  jq("#filter_msg").show();
                  return false;
                 }


              <?php } ?>


        var formdata=jq("#bundle").serialize();
        //alert(formdata);
          jq(this).text("Adding");

          jq(this).attr("disabled","disabled");
          var citems=parseInt(jq("#citems").text())+1;
           var count_cart=parseInt(jq("#count_cart").text())+1;
          jq("#citems").text(citems);
          jq("#count_cart").text(count_cart);

          jq.ajax({

             type: "POST",

             url: '<?php echo base_url();?>index.php/Welcome/fabric_with_stitching',

             data: {"formdata":formdata,"val_size":val_size,"val_color":val_color},

             success: function(response){

              console.log(response);
              window.location.href = response;

               //jq("#caddtocart").removeAttr('disabled');

              
               }

             });

      });

 jq(".btn-number").click(update_price);
           function update_price(){
              setTimeout(function(){

               var qty=jq("#qty").val();

              var pr="<?php echo $pro->price;?>";
/*var kkk = jq("#price").html();
var result = /(parseInt(qty)-1)*/
console.log(<?php echo $discount ?>);
<?php if(isset($discount)){ ?>
              var np=(parseFloat(qty)*parseFloat(pr))-<?php echo $discount ?>;
                var op = parseFloat(qty)*parseFloat(pr);
                 jq("#price").text(np.toFixed(2));
                 jq("#oldprice").text(op.toFixed(2));
  <?php }else if(isset($discount_per)){

    ?>
                  var np=(parseFloat(qty)*parseFloat(pr)*<?php echo $discount_per ?>)/100;
                  var np = (parseFloat(qty)*parseFloat(pr))-np;
                  var op = parseFloat(qty)*parseFloat(pr);
                   jq("#price").text(np.toFixed(2));
                 jq("#oldprice").text(op.toFixed(2));

    <?php
  }else{
    ?>
    var np = (parseFloat(qty)*parseFloat(pr));
     jq("#price").text(np.toFixed(2));
               
    <?php
  } ?>
             // console.log(parseInt(qty));//alert(pr);
             // console.log(parseInt(pr));
               

              }, 500);



            }

          });

        </script>


 <form action="" method="post" id="bundle" >

<div class="row" style="margin-top: 36px; padding:0px 10px;">
              <?php if(isset($size_arr) && !empty($size_arr)){  ?>
              <div class="col-xs-12  col-sm-12 col-md-12">
                <label> Select Fabric Width</label>
                <br>
                <!--select id ="size" class="selectpicker"  data-style="select--wd"  data-width="100%">
                <option>Select</option-->
                  <?php $k=0; foreach ($size_arr as $value) {
                    //echo $value;
                    ?>
                    <style>
 input[type=radio]#s<?php echo $k; ?> + label:before{
  height:33px;
  width:33px;
  margin-right: 2px;
  content: '<?php echo $value ?>';
  padding: 1%;
  line-height: 29px;
  text-align: center;
  display:inline-block;
  vertical-align: baseline;
  background-color: initial;
  //border:1px solid #777;
}
}</style>
                    <?php
                      echo "<input type='radio' class='radio size' name='r2' value='$value' id='s$k'><label for='s$k'></label>";
                  $k++;} ?>
                <!--/select-->
              </div>
              <?php } ?>
                <?php if(isset($color_arr) && !empty($color_arr)){  ?>
               </div>
               <div class="row" style="margin-top: 10px;">
              <div class="col-xs-12  col-sm-12 col-md-12">
                <label>Color</label>
                <br>


                <!--select id ="color" class="selectpicker"  data-style="select--wd"  data-width="100%">
                      <option>Select</option-->

                  <?php $k=0; foreach ($color_arr as $value) {
                    //echo $value;
                    ?>
                    <style>input[type=radio]#r<?php echo $k; ?> + label:before{
  border-radius:50%;
  background-color:<?php echo $value; ?>
}</style>
                    <?php
                      echo "<input type='radio' class='radio' name='r' value='$value' id='r$k'><label for='r$k'></label>";
                  $k++;} ?>
                <!--/select-->
              </div>
              </div>
              <?php } ?>







            <div class="outer">







              <div class="input-group-qty pull-left"> <span class="pull-left"> </span>



              <input type="hidden" name="fabric" value="<?php echo $pro->id;?>" />
              <input type="hidden" name="vendor_id" value="<?php echo $pro->vendor_id;?>" />
              <input type="hidden" name="url" value="<?php echo $url;?>" />


<?php if($count_stock_remain>0)
  { ?>
                <input type="text" name="qty" id="qty" class="input-number input--wd input-qty pull-left" value="<?php echo $pro->min_quan_to_buy; ?>" min="<?php echo $pro->min_quan_to_buy; ?>" max="<?php if($pro->Subtract_Stock=='yes' || $pro->Subtract_Stock=='Yes'){echo $count_stock_remain; }else{ echo $pro->quantity; } ?>">
                <span class="pull-left btn-number-container">



                <button type="button" class="btn btn-number btn-number--plus" data-type="plus" data-field="quant[1]"> + </button>



                <button type="button" class="btn btn-number btn-number--minus" disabled="disabled" data-type="minus" data-field="quant[1]"> &#8211; </button>
               
                 <input type="hidden" name="mcat_id" value="<?php echo $cid;?>">
                 <input type="hidden" name="fabric_id" value="<?php echo $pro->id;?>" class="checkbox-group">
                
                 <input type="hidden" name="sku" value="<?php echo $pro->SKU;?>" class="checkbox-group">

                </span>
                <?php } ?>


                </div>

              <div class="pull-left" style="
    margin-left: 10px;
">

                <button class="btn btn--wd text-uppercase" id="caddtocart" >Add to Cart</button>
              </div>

              </form>

              <!--form class="" action="<?php echo base_url(); ?>Welcome/fabric_with_stitching/" method="post"-->
                

                <!--input type="hidden" name="mcat_id" value="<?php echo $mcat_id;?>">
                <input type="hidden" name="fabric_id" value="<?php echo $pro->id;?>" class="checkbox-group">
                 <input type="hidden" name="qty" value="<?php echo $pro->qu;?>" class="checkbox-group"-->
            &nbsp; &nbsp;&nbsp; <button class="btn btn--wd text-uppercase addtostitch" id="<?php echo $pro->id;?>">Add To Stitch</button>&nbsp&nbsp <span id="filter_msg" style="margin-top: 4px;margin-left:10%;" class='alert alert-danger' >Please select one color and size</span>
            <span id="notifyme_section"><br><br><lable class="lb pull-left" >We will let you know when in stock</lable></br>
             <input type="email" class="input--wd " id="notifyme_email" placeholder="Enter your email"><a class="btn btn--wd text-uppercase" id="notifyme">NOTIFY ME</a>
             </span>
             <!--/form-->
              <?php
              $wishlist = $this->db->get_where('wishlist',array('p_id'=>$pro->id,'p_name'=>$pro->title, 'user_id'=>$this->session->userdata("userid")))->num_rows();

             
$pname = preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($pro->title));
?>


             <p id="notify_msg">We will notify you when it is in stock.</p>






            </div>

            <ul class="product-links product-links--inline" style="margin-top:20px;">
            <?php if($wishlist>=1 ){
                ?>
                 <li><a class="overlay_img overlay_img_fill"  id="<?php echo $pro->id; ?>_<?php echo $pname; ?>"><span class=" icon icon-favorite"></span><span class="added">Already Added</span></a></li>

                <?php
              }else{ ?>

 <?php if($this->session->userdata("userid")==''){

  ?>

  <div class="overlay_img" id="<?php echo $pro->id; ?>_<?php echo $pro->title; ?>"></div>

 <a href="<?php echo base_url() ?>Welcome/login?url=<?php echo $url; ?>"><li><span class="icon icon-favorite"></span  >Add to Wishlist</li></a>

  <?php

   }else{
       

                  ?>
                  <li class="overlay_img" id="<?php echo $pro->id; ?>_<?php echo $pname; ?>"><a href="#"><span class="icon icon-favorite"></span><span class="added">Add to Wishlist</span></a></li>


                  <?php
                  } ?>



              <?php } ?>
              <li> <div> <a  target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url(); ?>"><button class="btn btn-primary wave waves-effect car1"><i class="fa fa-facebook"> </i> </button></a>

  <a target="_blank" class="twitter-share-button"
  href="https://twitter.com/intent/tweet?text=<?php echo current_url(); ?>">
<button class="btn btn-blue wave waves-effect car1"><i class="fa fa-twitter"> </i> </button></a>


<!-- Place this tag where you want the share button to render. -->
<a target="_blank" href="https://plus.google.com/share?url=<?php echo current_url(); ?>"><button class="btn btn-red wave waves-effect car1"><i class="fa fa-google-plus"> </i> </button></a>
</div></li>
            </ul>
<div class="flash-message alert alert-success flashalert<?php echo $pro->id; ?>" ><center>Added To Wishlist</center></div>
<div class="flash-message alert alert-success flashalert2" ><center>Already In Wishlist</center></div>

<div style="align-content: justify; padding:0px 10px;">
<?php echo substr($pro->sdesc, 0,500);
                          if(strlen($pro->sdesc)>500){echo '...';}

//print_r($size_arr);

?></div>
          </div>





        </div>



    </section>



    <section class="content content--fill">



      <div class="container">



        <!-- Nav tabs -->



        <ul class="nav nav-tabs nav-tabs--wd" role="tablist">



          <li class="active"><a href="#Tab1" aria-controls="home" role="tab" data-toggle="tab" class="text-uppercase">DESCRIPTION</a></li>



          <li><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase">Reviews</a></li>






          <li><a href="#Tab5" role="tab" data-toggle="tab" class="text-uppercase">Sizing Guide</a></li>



        </ul>







        <!-- Tab panes -->



        <div class="tab-content tab-content--wd">



          <div role="tabpanel" class="tab-pane active" id="Tab1">

      <?php $info = $this->db->get_where('fabric',array('id'=>$this->uri->segment(4)))->row() ?>

            <p><?php  echo $pro->ldesc; ?></p>

          </div>



          <div role="tabpanel" class="tab-pane" id="Tab2">

 <?php $review=$this->db->get_where("review",array("p_id"=>$pro->id,"p_name"=>$pro->title,"status"=>1))->result();
 if($this->session->userdata("userid")!=""){
    $review_my=$this->db->get_where("review",array("p_id"=>$pro->id,"p_name"=>$pro->title,"userid"=>$this->session->userdata('userid')))->result();
    //print_r($review_my);
 }

$review_count=$this->db->get_where("review",array("p_id"=>$pro->id,"p_name"=>$pro->title,"status"=>1))->num_rows();
?>
<script type="text/javascript">
var k = jQuery.noConflict();
k(document).ready(function(){

k(".review_count").html("<?php echo $review_count; ?>");
});
</script>










<style type="text/css">
  .rating2 > span:hover:before {
   content: "\2605";
   position: absolute;
}

.rating2 {
  unicode-bidi: bidi-override;
  direction: rtl;
  font-size: 35px;
      color: #F4ab00;
}
.rating2 > span:hover:before,
.rating2 > span:hover ~ span:before , .hovered {
   content: "\2605";
   position: absolute;
}

</style>


  <div id="rateYo"></div>
  <div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-12 col-md-5 text-center">
                        <h1 class="rating-num overall_rating">
                            0</h1>
                        <div class="rating">
                            <span class="glyphicon " id="f_1"></span>
                            <span class="glyphicon " id="f_2"></span>
                            <span class="glyphicon " id="f_3"></span>
                            <span class="glyphicon " id="f_4"></span>
                            <span class="glyphicon " id="f_5"></span>
                        </div>
                        <div>
                            <span class="glyphicon glyphicon-user"></span> <span class="rating_count">0</span> total
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-7">
                        <div class="row rating-desc">
                          <div class="col-xs-12 col-md-12">
                            <div class="col-xs-3 col-md-2 text-right no-padding">
                                5 <span>★</span>
                            </div>
                            <div class="col-xs-7 col-md-7">
                                <div class="progress progress-review">
                                    <div class="progress-bar progress-bar-success user_progress_5" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">80%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 col-md-3 no-padding c-name rating_user_count5">
                              20000
                            </div>
                          </div>

                            <!-- end 5 -->
                            <div class="col-xs-12 col-md-12">
                            <div class="col-xs-3 col-md-2 text-right no-padding">
                                4 <span>★</span>
                            </div>
                            <div class="col-xs-7 col-md-7">
                                <div class="progress progress-review">
                                    <div class="progress-bar progress-bar-success user_progress_4" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 col-md-3 no-padding c-name rating_user_count4">
                              700
                            </div>
                          </div>
                            <!-- end 4 -->
                            <div class="col-xs-12 col-md-12">
                            <div class="col-xs-3 col-md-2 text-right no-padding">
                                3 <span>★</span>
                            </div>
                            <div class="col-xs-7 col-md-7">
                                <div class="progress progress-review">
                                    <div class="progress-bar progress-bar-info user_progress_3" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 col-md-3 no-padding c-name rating_user_count3">
                              5000
                            </div>
                          </div>
                            <!-- end 3 -->
                            <div class="col-xs-12 col-md-12">
                            <div class="col-xs-3 col-md-2 text-right no-padding">
                               2 <span>★</span>
                            </div>
                            <div class="col-xs-7 col-md-7">
                                <div class="progress progress-review">
                                    <div class="progress-bar progress-bar-warning user_progress_2" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 col-md-3 no-padding c-name rating_user_count2">
                              100
                            </div>
                          </div>
                            <!-- end 2 -->
                            <div class="col-xs-12 col-md-12">
                            <div class="col-xs-3 col-md-2 text-right no-padding">
                                1 <span>★</span>
                            </div>
                            <div class="col-xs-7 col-md-7">
                                <div class="progress progress-review">
                                    <div class="progress-bar progress-bar-danger user_progress_1" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                                        <span class="sr-only">15%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 col-md-3 no-padding c-name rating_user_count1">
                              500
                            </div>
                          </div>
                            <!-- end 1 -->
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4" align="right">

<?php// $url =  base_url().'Welcome/product/'.$pro->category.'/'.$pro->id; ?>

            <?php if(empty($review_my)){ if($this->session->userdata('userid')==''){ ?> <a class="btn btn--wd" href="<?php echo base_url() ?>Welcome/login?url=<?php echo $url; ?>">Rate and Review product</a> <?php }else{ ?>
               <button class="btn btn--wd" data-toggle="modal" data-target="#reviewModal" style="margin-top:20px;">Rate and Review product</button>
               <?php }}else { echo '  <button class="btn btn--wd" data-toggle="modal" data-target="#reviewModal" style="margin-top:20px;">Edit Your Review</button>'; } ?>
        </div>
      </div><br><hr>
      <div class="col-md-row">
        <div class="col-md-11">

         <?php
          foreach ($review as $value) {
            $rating = $this->db->get_where('rating',array('p_id'=>$value->p_id,'p_name'=>$value->p_name,'users'=>$value->userid))->row();
          //print_r($rating);
          //  echo $this->db->last_query();
            ?>
            <div>
             <span class="label <?php if($rating->rating==5){echo 'label-success ';}
             else if($rating->rating>=2 && $rating->rating<=4){echo 'label-warning  '; }
             else if($rating->rating==1){echo 'label-danger ';}
              ?>"><?php echo $rating->rating; ?> ★</span> <strong><?php echo $value->subject; ?></strong>
              <p><?php echo $value->review; ?></p>
              <p class="c-name"><span> <?php echo $value->nike_name; ?> </span> / <span> <?php echo $value->date; ?></span></p>
           </div><hr class="reviewline1">


            <?php
          }
          if(!empty($review_my))
          {//print_r($review_my);
$rating =$this->db->get_where('rating',array('p_id'=>$review_my[0]->p_id,'p_name'=>$review_my[0]->p_name,'users'=>$review_my[0]->userid))->row();
          //  echo $this->db->last_query();
            ?>
            <div >
             <span class="label <?php if($rating->rating==5){echo 'label-success ';}
             else if($rating->rating>=2 && $rating->rating<=4){echo 'label-warning  '; }
             else if($rating->rating==1){echo 'label-danger ';}
              ?>"><?php echo $rating->rating; ?> ★</span> <strong>&nbsp&nbsp<?php echo $review_my[0]->subject; ?></strong>
              <p><?php echo $review_my[0]->review; ?></p>
              <p class="c-name"><span> <?php echo $review_my[0]->nike_name; ?> </span> / <span> <?php echo $review_my[0]->date; ?></span></p>
           </div><hr class="reviewline">
           <?php
          }
           if($review_count==0 && empty($review_my)){
           echo "<center>No Review Yet!</center>";
          }

          ?>



    </div>
</div>
       </div>



          </div>

          <div role="tabpanel" class="tab-pane" id="Tab5">



            <div class="divider divider--xs"></div>

            <div class="table-responsive" align="center">
            <?php //echo $pro->sizing_guide; ?>
              <img src="<?php echo base_url(); ?>assets/images/fabrics/resized_fabric/resize400_600/<?php echo $pro->sizing_guide; ?>" class="sizeimg" >
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container">

        <!-- Modal -->
        <div class="modal quick-view zoom" id="quickView"  style=" opacity: 1">
          <div class="modal-dialog">
            <div class="modal-content"> </div>
          </div>
        </div>
        <!-- /.modal -->
        <h2 class="text-center text-uppercase" style="padding-top:30px; padding-bottom:30px;">Similar Product</h2>
        <div class="row product-carousel mobile-special-arrows animated-arrows product-grid four-in-row">
         <?php

         $keyword = $this->session->userdata('city_session');
        $this->db->where("city LIKE '%$keyword%'");
        $this->db->where("category",$pro->category);
        $this->db->where("id!=",$this->uri->segment(4));
        $this->db->limit(10);
        $rela=$this->db->get_where("fabric",array("status"=>'approve',"status_enable"=>'enable'))->result();
        foreach($rela as $rela){

         $catname = $this->db->get_where('mcategory',array('mid'=>$rela->category))->row();
          $mcatname = $this->db->get_where('main_categories',array('id'=>$rela->category_for_filter))->row();
          if(!empty($mcatname)){
          $url =  str_replace("--","-",base_url().'fabric/'.$catname->mcat_name.'/'.str_replace(" ", "-",$mcatname->name).'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$rela->title))).'/'.$rela->id);
        }else{
          $url =  str_replace("--","-",base_url().'fabric/'.$catname->mcat_name.'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$rela->title))).'/'.$rela->id);
        }
        ?>
          <div class="product-preview-wrapper">



<div class="sizes-example sizes-example1">
              <a href="<?php echo $url;?>"><img src="<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize400_600/<?php echo $rela->thumb;?>" data-lazy="<?php echo base_url();?>assets/images/fabrics/resized_fabric/resize400_600/<?php echo $rela->thumb;?>" alt=""/></a>
</div>

              <h5 class="margin-top"><?php echo substr($rela->title, 0,30);
                          if(strlen($rela->title)>30){echo '...';}?></h5>
                          <h5><i class="fa fa-inr"></i> <?php echo $rela->price; ?></h5>

          </div>


         <?php }?>
        </div>
      </div>

    </section>

    <!-- End Content section -->

  </div>

  <div class="modal fade" id="reviewModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        <div class="modal-body">
          <?php  if($this->session->userdata("userid")!=''){
/*$i=0;
$order_ids=$this->db->get_where("orders",array("userid"=>$this->session->userdata("userid")))->result();
//print_r($order_ids);
  foreach ($order_ids as $value) {

    $order_items=$this->db->get_where("order_items",array("oid"=>$value->oid))->result();
    foreach ($order_items as $value1) {
//echo $value1->pid.' '.$value1->pname."<br>";
if($value1->pid==$pro->id && $value1->pname==$pro->title)
{
//  echo "<br><br>";
 $i++;
}
}
}*/
$review_num=$this->db->get_where("review",array("userid"=>$this->session->userdata("userid"),'p_id'=>$pro->id,'p_name'=>$pro->title))->row();
?>



<?php if(empty($review_num)){ //print_r(); ?>
  <h2 class="rat_text">Please give rating for this product.<br></h2>
  <div class="rating2">

  <span class="test" id="f_5">&#x2606</span><span class="test" id="f_4">&#x2606</span><span class="test" id="f_3">☆</span><span class="test" id="f_2">☆</span><span class="test" id="f_1">☆</span>

  </div>

  <span id="tohide">
  <form class="contact-form" id="review">

<h6><strong>WRITE YOUR OWN REVIEW</strong></h6>
<input type="hidden" name="pid" value="<?php  echo $pro->id; ?>">
            <input type="hidden" name="pname" value="<?php  echo $pro->title; ?>">


            <label>Heading<span class="required">*</span></label>
            <input type="text" class="input--wd input--wd--full" name="subject">
            <input type="hidden"  class="input--wd input--wd--full" name="user_name" value="<?php echo $this->session->userdata('name'); ?>">

            <label>Review<span class="required">*</span></label>

            <textarea class="textarea--wd input--wd--full" name="review"></textarea>

            <div class="divider divider--xs"></div>



          </form>
           <button class="btn btn--wd text-uppercase wave" id="submit_review">Submit Review</button>

          </span>
          <span id="toshow">
            review submited successfully
          </span>
<?php
}
else{
  ?>

  <form class="contact-form" action="<?php echo base_url(); ?>welcome/update_review" method="post">

<h6><strong>EDIT YOUR OWN REVIEW</strong></h6>
<input type="hidden" name="pid" value="<?php  echo $pro->id; ?>">
            <input type="hidden" name="pname" value="<?php  echo $pro->title; ?>">


            <label>Heading<span class="required">*</span></label>
            <input type="hidden" name="id" value="<?php echo $review_num->id; ?>">
            <input type="text" class="input--wd input--wd--full" value="<?php echo $review_num->subject; ?>" name="subject">
            <input type="hidden"  class="input--wd input--wd--full" name="user_name" value="<?php echo $this->session->userdata('name'); ?>">

            <label>Review<span class="required">*</span></label>

            <textarea class="textarea--wd input--wd--full" name="review"><?php echo $review_num->review; ?></textarea>

            <div class="divider divider--xs"></div>
            <input type="hidden" name="redirect" value="<?php echo $url; ?>">



           <button class="btn btn--wd text-uppercase wave" type="submit" >Edit</button>

</form>
          <span id="toshow">
            review submited successfully
          </span>

          <?php
}}else{ echo "Please Sign Up or Login to post review and ratings."; ?>

<?php } ?>
        </div>

      </div>

    </div>
  </div>

   <script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>
    <!--  Alert Message -->
  <script src="https://cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js"></script>
  <link href="https://cdn.jsdelivr.net/alertifyjs/1.8.0/css/alertify.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/alertifyjs/1.8.0/css/themes/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">

var $search2 =jQuery.noConflict();
 $search2('li').click(function(){
   $search2('li').removeClass('open');
    $search2(this).toggleClass('open');
  });
(function($search) {
  $search2(".search_id" ).keyup(function(e) {
 console.log('called');
   $search2('#data').css('display','block');
   $search2('#data2').css('display','block');
    var code = (e.keyCode || e.which);

  //  alert(code);
    if(code == 37 || code == 38 || code == 39 || code == 40) {
        return;
    }
     if(code == 13) {
    //  alert('kk');
        $search2('#data').css('display','none');
        $search2('#data2').css('display','none');
    }
    $search2(document).click(function() {
//  alert( "ddd" );
});


            var fid=$search2(this).val();
           // console.log(fid);
            $search.ajax({
                 type: "POST",
                 url: '<?php echo base_url();?>Welcome/search',
                 data: {"val":fid},
                 success: function(response){
                     console.log(response);
                     //alert(response.length);
                     //alert(response);
                     if(response.length=='2' || response.length=='52' ||response.length=='44')
                     {
                        //alert('in');
                       $search2('#data').css('display','none');
                       $search2('#data2').css('display','none');
                     }else{
                     $search2("#data").html(response);
                      $search2("#data2").html(response);
                      }
                     },
                  error: function(response){
                     console.log(response);
                  }
                 });
});
   $search2('.search_id').blur(function() {
    $search2('#data').css('display','none');
   $search2('#data2').css('display','none');
  });
   $search2('.search_id').click(function() {
    $search2('#data').css('display','none');
   $search2('#data2').css('display','none');
  });
})(jQuery);


var k = jQuery.noConflict();
k(document).ready(function(){

  k('.flash-message').hide();

                      k(".overlay_img").click(function(){
                        var id2 = k(this).attr('id');

                        if (k(this).hasClass('overlay_img_fill'))
                        {
                           k(this).removeClass("overlay_img_fill");
                           id = id2.split('_');
                            k.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/wishlist_delete',
                        data: {'pid':id[0],'pname':id[1],'type':'fabric'},
                         success: function(response){
                          //console.log(response);
                          k(".added").html("Add to wishlist");
                          alertify.success('Removed Successfully');

                          }
                         });
                          return false;
                        }

                          k(this).addClass("overlay_img_fill");
                        id = id2.split('_');

                        //alert(id[0]+"-----"+id[1]);
                        k.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/wishlist',
                        data: {'pid':id[0],'pname':id[1],'type':'fabric'},
                         success: function(response){

                          k(".added").html("Added to wishlist");
                          alertify.success('Added Successfully');

                          }
                         });
});

                    /*  k(".overlay_img_fill").click(function(){

                                                 alertify.success('Accepted');
                      });

                      k(".overlay_img").click(function(){
                        var id = k(this).attr('id');
                        id = id.split('_');
                       // alert(id[0]+"-----"+id[1]);
                        k.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/wishlist',
                        data: {'pid':id[0],'pname':id[1],'type':'fabric'},
                         success: function(response){
                          
                         alertify.success('Added Successfully');


                          }
                         });
});*/

  //alert('kk');
   k("#toshow").hide();
   k("#tohide").hide();
   k("#notify_msg").hide();
   k("#filter_msg").hide();
  //alert('kkkddd');
   k("#notifyme").click(function(){
        var notifyme = k("#notifyme_email").val();
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if( !emailReg.test( notifyme ) || notifyme=='') {

                k("#notify_msg").show();
                k("#notify_msg").html("<span class='alert alert-danger'>Please enter valid email address</span>");
                return false;
                } else {

                }
       // alert(notifyme);
         k.ajax({
           type: "POST",
           url: '<?php echo base_url();?>index.php/Welcome/notifyme',
           data: {"value":notifyme,"pid":<?php echo $pro->id; ?>,"pname":"<?php echo $pro->title; ?>","type":"fabrics"},
           success: function(response){
            console.log(response);
              if(response=='done' || response==' done' || response=='  done')
             {
              k("#notifyme_section").hide();
               k("#notify_msg").html("<br><span class='alert alert-success'>We will notify you when it is in stock.</span>");
              k("#notify_msg").show();
             }
             },
             error: function(response)
             {
              console.log(response);
             }

           });
   });

   k(".test").click(function(){
    k(".test").hide();
    k(".rat_text").hide();
        var rating = k(this).attr('id');
        rating = rating.split('_');
        //alert(rating);
         k.ajax({
           type: "POST",
           url: '<?php echo base_url();?>index.php/Welcome/ajaxstar',
           data: {"value":rating[1],"pid":<?php echo $pro->id; ?>,"pname":"<?php echo $pro->title; ?>"},
           success: function(response){
             k('.rating2').html('You have given ' + rating[1]+ ' stars for this product.<br><br>');
             k('.rating2').css({'direction':'initial','font-size':'initial'});
             //jq("#caddtocart").removeAttr('disabled');
             //console.log(response);
             //alert(response.length);
             //jq("#caddtocart").removeAttr('disabled');
     /*for(var i=1;i<=rating[1];i++)
    {
      alert('kk');
      k("#f_" + i).before( "content","\2605" );
      k("#f_" + i).css("position","absolute" );

   }*/

             if(response=='done' || response==' done' || response=='  done')
             {
              //alert('done');
              k("#tohide").show();
             }
             }
           });
   });


  k("#submit_review").click(function(){
     var formdata=k("#review").serialize();
     k.ajax({
  type: "POST",
  url: '<?php echo base_url();?>index.php/Welcome/review',
  data: {"formdata":formdata},
  success: function(response){
  console.log(response);
    k("#tohide").hide();
    k("#toshow").show();
    k(".reviewline:last").after(response);
    k(".reviewline1:last").after(response);
    }
  });
     //alert(formdata);
  });
  k("#update_review").click(function(){
     var formdata=k("#review").serialize();
     k.ajax({
  type: "POST",
  url: '<?php echo base_url();?>index.php/Welcome/update_review',
  data: {"formdata":formdata},
  success: function(response){
  console.log(response);
    k("#tohide").hide();
    k("#toshow").show();
    }
  });
     //alert(formdata);
  });
});
</script>

<?php
$total_rat=$count_user_5=$count_user_4=$count_user_3=$count_user_2=$count_user_1=$rating2=0;
$rating = $this->db->get_where('rating',array('p_id'=>$pro->id,'p_name'=>$pro->title));
      $rat_num =$rating->num_rows();
      $rat_data =$rating->result();
 if(!empty($rat_data) and $rat_num>0)
      {
      foreach ($rat_data as $value) {
        if($value->rating==5){
          $count_user_5++;
        }else if($value->rating==4){
          $count_user_4++;
        }else if($value->rating==3){
          $count_user_3++;
        }else if($value->rating==2){
          $count_user_2++;
        }else if($value->rating==1){
          $count_user_1++;
        }

        $total_rat += $value->rating;
      }
      //echo "abc";
      $rating2 = $total_rat/$rat_num;
      $this->db->where('id',$pro->id);
      $this->db->update('fabric',array('overall_rating'=>$rating2));
      //echo $rating;
    }
     else{
      $rating2 =0;
    }
//echo "rating".$rating; ?>
 <style type="text/css"><?php

 for($i=1;$i<=$rating;$i++)
    {?>

   .rat_<?php echo $i; ?>:before{
  content: '\e619';


}



   <?php } ?>
   </style>
<?
    $rating = $this->db->get_where('rating',array('p_id'=>$pro->id,'p_name'=>$pro->title,'users'=>$this->session->userdata("userid")));
      $rat_data =$rating->row();
 if(!empty($rat_data))
      {
      $rating = $rat_data->rating;
      
    }
     else{
      $rating =0;
    }

?>
   <script type="text/javascript">
k(document).ready(function(){
  <?php

for($i=1;$i<=$rating2;$i++)
{?>
k("#f_<?php echo $i ?>").addClass('glyphicon-star');
<?php }
for($i=floor($rating2)+1;$i<=5;$i++)
{?>
k("#f_<?php echo $i ?>").addClass('glyphicon-star-empty');
<?php } ?>
<?php echo 'k(".user_progress_5").css("width","'.(($count_user_5/$rat_num)*100).'%")';  ?>

<?php echo 'k(".user_progress_4").css("width","'.(($count_user_4/$rat_num)*100).'%")';  ?>

<?php echo 'k(".user_progress_3").css("width","'.(($count_user_3/$rat_num)*100).'%")';  ?>

<?php echo 'k(".user_progress_2").css("width","'.(($count_user_2/$rat_num)*100).'%")';  ?>

<?php echo 'k(".user_progress_1").css("width","'.(($count_user_1/$rat_num)*100).'%")';  ?>



k(".overall_rating").html("<?php echo number_format((float)$rating2, 1, '.', ''); ?>");
k(".rating_count").html("<?php echo $rat_num; ?>");
k(".rating_user_count5").html("<?php echo $count_user_5; ?>");
k(".rating_user_count4").html("<?php echo $count_user_4; ?>");
k(".rating_user_count3").html("<?php echo $count_user_3; ?>");
k(".rating_user_count2").html("<?php echo $count_user_2; ?>");
k(".rating_user_count1").html("<?php echo $count_user_1; ?>");

});
</script>


   <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/custom2.js"></script>
