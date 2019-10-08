<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<?php error_reporting(0);
      ini_set('display_errors', 0);
      //$this->session->set_userdata("city_session",'2229');
      foreach($_SESSION as $key => $val)
{
    if ($key != 'oid' && $key != 't' && $key != 'msg_bridal' && $key != 'wish_url' && $key != 'dis' && $key != 'code' && $key != 'user_id' && $key != 'invalid' && $key != '__ci_vars' && $key != 'msg' && $key !== 'city_session' && $key !== 'userid' && $key !== 'name' && $key !== 'FBRLH_state' && $key !== 'fb_access_token' && $key !== '__ci_last_regenerate' && $key !== 'cart_contents' && $key !== 'loggedin' &&  $key !== 'login' && $key !== 'user_profile' && $key !== 'user' && $key !== 'fabric_id' && $key !== 'qty' && $key !== 'size' && $key !== 'color' && $key !== 'main_cat' && $key !== 'sku' && $key !== 'productlink')
    {      unset($_SESSION[$key]);    }
}
if($_POST && isset($_POST['keyword']))
{
  $keyword = $_POST['keyword'];
  $keys = explode('from', $keyword);
   $table = trim($keys[1]);
   $data = trim($keys[0]);

  if($table=='Online Boutique')
  {
    $id = $this->db->get_where('online_boutique',array('brand'=>$data))->row();
    $catname = $this->db->get_where('mcategory',array('mid'=>$id->main_category))->row();
    $mcatname = $this->db->get_where('main_categories',array('id'=>$id->category_for_filter))->row();
    if(!empty($mcatname)){
    $url =  base_url().'online-boutique/'.$catname->mcat_name.'/'.str_replace(" ", "-",$mcatname->name).'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$id->brand))).'/'.$id->id;
  }else{
    $url =  base_url().'online-boutique/'.$catname->mcat_name.'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$id->brand))).'/'.$id->id;
  }
    echo '<script>
    window.location = "'.$url.'";
</script>';

  }
  if($table=='Uniform')
  {/*
    $id = $this->db->get_where('uniform',array('brand'=>$data))->row();
    $catname = $this->db->get_where('mcategory',array('mid'=>$id->main_category))->row();
    $mcatname = $this->db->get_where('main_categories',array('id'=>$id->category_for_filter))->row();
    if(!empty($mcatname)){
    $url =  base_url().'online-boutique/'.$catname->mcat_name.'/'.str_replace(" ", "-",$mcatname->name).'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$id->brand))).'/'.$id->id;
  }else{
    $url =  base_url().'online-boutique/'.$catname->mcat_name.'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$id->brand))).'/'.$id->id;
  }
    echo '<script>
    window.location = "'.$url.'";
</script>';
*/
  }
    if($table=='Fabric')
  {//echo 'in';
    $id = $this->db->get_where('fabric',array('title'=>$data))->row();
    //print_r($id);exit;
    $catname = $this->db->get_where('mcategory',array('mid'=>$id->category))->row();
    $mcatname = $this->db->get_where('main_categories',array('id'=>$id->category_for_filter))->row();
    if(!empty($mcatname)){
    $url =  base_url().'fabric/'.$catname->mcat_name.'/'.str_replace(" ", "-",$mcatname->name).'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$id->title))).'/'.$id->id;
  }else{
    $url =  base_url().'fabric/'.$catname->mcat_name.'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$id->title))).'/'.$id->id;
  }
    echo '<script>
    window.location = "'.$url.'";
</script>';
  }
      if($table=='Accessories')
  {
    $id = $this->db->get_where('accessories',array('brand'=>$data))->row();

    //print_r($id);exit;
    $catname = $this->db->get_where('mcategory',array('mid'=>$id->main_category))->row();
    $mcatname = $this->db->get_where('main_categories',array('id'=>$id->category_for_filter))->row();
    if(!empty($mcatname)){
    $url =  base_url().'accessories/'.$catname->mcat_name.'/'.str_replace(" ", "-",$mcatname->name).'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$id->brand))).'/'.$id->acc_id;
  }else{
    $url =  base_url().'accessories/'.$catname->mcat_name.'/'.preg_replace('/[^A-Za-z0-9 -]/u','', strip_tags(str_replace(" ", "-",$id->brand))).'/'.$id->acc_id;
  }//echo $url; exit;
    echo '<script>
    window.location = "'.$url.'";
</script>';

  }


}

 ?>
<!doctype html>
<html class="no-js">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<style>
::-webkit-scrollbar
{width: 10px;
          background-color: #000;
           }

::-webkit-scrollbar-track        {  -webkit-box-shadow: inset 0 0 0px rgba(0,0,0,0.3);
          background-color:#fff;
          width:10px;
          }

::-webkit-scrollbar-thumb       {background-color: #4c4c4c;
    width: 32px;
     border: 0px solid #4c4c4c;
    border-radius: 0px; }
    @media (min-width: 1200px){
    .no-pdd-lg{
      padding: 0px !important;
    }
}
</style>


<meta http-equiv="X-UA-Compatible" content="IE=edge">



<?php
$url = explode('/',current_url());
$urlend = end($url);
//echo $url[3]." ".count($url);
if((($url[3]=='fabric' && (count($url)==7 || count($url)==8)) || ($url[3]=='uniform' && (count($url)==7 || count($url)==8)) || ($url[3]=='online-boutique' && (count($url)==7 || count($url)==8)) || ($url[3]=='accessories'&& (count($url)==7 || count($url)==8)) || ($url[3]=='more-services' && (count($url)==6 || count($url)==7))))
{
  if($url[3]=='uniform'){
    $res = $this->db->get_where('uniform',array('uniform_id'=>$urlend))->row();
  }else if($url[3]=='fabric')
  {
    $res = $this->db->get_where('fabric',array('id'=>$urlend))->row();
  }else if($url[3]=='online-boutique')
  {
    $res = $this->db->get_where('online_boutique',array('id'=>$urlend))->row();
  }
  else if($url[3]=='accessories')
  {
    $res = $this->db->get_where('accessories',array('acc_id'=>$urlend))->row();
  }
  else if($url[3]=='more-services')
  {
    $res = $this->db->get_where('more_services',array('id'=>$urlend))->row();
  }
// echo $this->db->last_query();
//  print_r($res);
  $meta_title 			= $res->meta_title1;
$meta_keyword 	= $res->meta_keyword;
$meta_desc 			= $res->meta_description;
$og_title 				= $res->og_title;
$og_description 	= $res->og_description;
$og_keyword 		= $res->og_keyword;
$og_type 				= $res->og_type;
$og_locale 			= $res->og_locale;
$og_sitename 		= $res->og_site_name;
$og_url 					= $res->og_url;
$og_image 			= $res->og_image;
$dc_source 			= $res->dc_source;
$dc_relation 			= $res->dc_relation;
$dc_title 					= $res->dc_title;
$dc_keyword 		= $res->dc_keyword;
$dc_subject 			= $res->dc_subject;
$dc_language 		= $res->dc_language;
$dc_description	= $res->dc_description;

?>
<title><?php echo $meta_title;?></title>
<meta name="description" content="<?php echo $meta_desc;?>"/>
<meta name="keywords" content="<?php echo $meta_keyword;?>"/>

<meta property="og:title" content="<?php echo $og_title;?>" />
<meta property="og:description" content="<?php echo $og_description;?>"/>
<meta property="og:keywords" content="<?php echo $og_keyword;?>"/>
<meta property="og:type" content="<?php echo $og_type;?>" />
<meta property="og:locale" content="<?php echo $og_locale;?>" />
<meta property="og:site_name" content="<?php echo $og_sitename;?>" />
<meta property="og:url" content="<?php echo $og_url;?>" />
<meta property="og:image" content="<?php echo $og_image;?>">

<meta name="dc.source" content="<?php echo $dc_source;?>">
<meta name="dc.relation" content="<?php echo $dc_relation;?>">
<meta name="dc.title" content="<?php echo $dc_title;?>">
<meta name="dc.keywords" content="<?php echo $dc_keyword;?>">
<meta name="dc.subject" content="<?php echo $dc_subject;?>">
<meta name="dc.language" content="<?php echo $dc_language;?>">
<meta name="dc.description" content="<?php echo $dc_description;?>">

<?php
}
  $res = $this->db->get("homepage_meta")->row();


 if(current_url()==base_url())
{
			//$data['alltagsinfo'] = $taglist->result();
			/*foreach($data['alltagsinfo'] as $res)
			{*/
						$meta_title 			= $res->meta_title;
						$meta_keyword 	= $res->meta_keyword;
						$meta_desc 			= $res->meta_desc;

						$robots 					= $res->robots;
						$googlebot 			= $res->googlebot;
            	$google_ana 			= $res->google_ana;
	?>
			<title><?php echo $meta_title;?></title>
			<meta name="description" content="<?php echo $meta_desc;?>"/>
			<meta name="keywords" content="<?php echo $meta_keyword;?>"/>

			<meta name="robots" content="<?php echo $robots;?>" />
			<meta name="googlebot" content="<?php echo $googlebot;?>">
      <script>
    <?php echo $google_ana;?>
    </script>
<?php
}
$data = $this->db->get('meta')->result();
foreach ($data as $meta) {
//echo $meta->type." ".$urlend." || ";
//echo strlen($meta->type);echo " || ".strlen($urlend);
if(str_replace(' ','',$meta->type)==$urlend){

  $meta_title 			= $meta->meta_title;
  $meta_keyword 	= $meta->meta_keyword;
  $meta_desc 			= $meta->meta_desc;
  $robots 					= $meta->robots;
  $googlebot 			= $meta->googlebot;
  $google_ana 			= $meta->google_ana;
  ?>
  <title><?php echo $meta_title;?></title>
  <meta name="description" content="<?php echo $meta_desc;?>"/>
  <meta name="keywords" content="<?php echo $meta_keyword;?>"/>
  <meta name="robots" content="<?php echo $robots;?>" />
  <meta name="googlebot" content="<?php echo $googlebot;?>">
  <script>
<?php echo $google_ana;?>
</script>
  <?php
}
}
 ?>

<!--link rel="canonical" href="index.html" /-->

<link rel="icon" href="<?php echo base_url() ?>assets/mobilefav.png" type="image/png">
<meta http-equiv="Expires" content="30" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
<meta name = "viewport" content = "user-scalable=no, width=device-width"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<!--link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"-->

<link rel="stylesheet" href="<?php echo base_url(); ?>kvendor/nouislider/nouislider.css">

<style>
@media (max-width: 500px){
  .modal-div{
    position: absolute;
  }
}

.modal-div{
  width: 320px;
  height: 220px;
  background: #fff;
}
.dropbtn {
   background-color: transparent;
    color: white;
    /* padding: 16px; */
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
.size-example2
{
width: 340px;
height: 340px;
}

@media(max-width:500px){

  .size-example2
{
width: 100%;
height: 10px;
}
}

.sizes-example1 {
  width: 100%;
  height: 350px;

}

.sizes-example {
  float: left;

  margin-left: 1%;
}
#username_session{
      display: none;
      }
li a{
  cursor: pointer;
}

      @media screen and (max-width: 480px) {
    #username_session{
      display: initial;
      }}
     /* .sizes-example{
        background-image:url('http://mobiledarzi.com/assets/images/logo2.jpg');
        background-size: 100%;
      }*/
</style>





<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/common-html5/quicksearch/quicksearchedd7.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/common-html5/css/layoutedd7.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/common-html5/css/responsiveedd7.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>kvendor/waves/waves.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>kvendor/slick/slick.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>kvendor/slick/slick-theme.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>kvendor/bootstrap-select/bootstrap-select.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>kvendor/parallax-carousel/pcarousel.min.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style-colors.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/magnific-popup.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/font/styleedd7.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/waves/wavesedd7.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/slick/slickedd7.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/slick/slick-themeedd7.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/bootstrap-select/bootstrap-selectedd7.css">
<link rel="StyleSheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/css/defaultedd7.css" type="text/css" />
<link rel="StyleSheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/welldone-3dcart/3dcartedd7.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/rs-plugin/css/settingsedd7.css" />
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/jquery/jqueryedd7.js"></script>
<script>
setInterval(function(){ count_cart(); }, 5000);
            var jqc = $.noConflict();

          jqc(document).ready(function(){
/*jqc('img').each(

        function(){
          if(jqc(this).attr('id')!='Imageid'){
            var variable = jqc(this).attr('src');
          //console.log(variable);
            if(variable!='#' && variable!='' && variable.length<500){
            variable = variable.split('.');
            //console.log(variable[2]);

if( variable[2]!='com/-Biz7tWEakHM/AAAAAAAAAAI/AAAAAAAAAEE/mV4_Um9s5GY/photo' && variable[2]!='googleusercontent'  && variable[2]!='fbcdn' && variable[2]!='' && variable[2]!='JPG' && variable[2]!='jpg' && variable[2]!='jpg ' && variable[2]!='png' && variable[2]!='PNG' && variable[2]!='GIF' && variable[2]!='jpeg' && variable[2]!='jpeg ' && variable[2]!='JPEG' && variable[2]!='gif')
            {
                // alert(variable[2]);
                 //console.log(variable[2]);
              jqc(this).attr('src','http://mobiledarzi.com/assets/images/fabrics/cover.jpg');
            }else{

            }}
}
        });*/


            jqc("#loading").delay(1000).hide(20);
            jqc(".emptycart").click(function(e){e.preventDefault();
              jqc.ajax({type: "POST",url: '<?php echo base_url();?>Welcome/emptycart',success: function(response){
               jqc("#mycart").html("<span class='shopping-cart__total'> <i class='fa fa-shopping-bag fa-2x'></i>Empty Cart</span>");
               }
             });
            });
            jqc(".shopping-cart__item__info__delete").click(function(e){e.preventDefault();
              jqc(".sc").addClass('open');
              var rid=jqc(this).attr("id");
              jqc.ajax({
             type: "POST",url: '<?php echo base_url();?>Welcome/removecart',data: {"rid":rid},success: function(response){
              if(response.length<2900)
              {
                 jqc("#mycart").html("<span class='shopping-cart__total'> <i class='fa fa-shopping-bag fa-2x'></i>Empty Cart</span>");
                 jqc("#mycart2").html("<span class='shopping-cart__total'> <i class='fa fa-shopping-bag fa-2x'></i>Empty Cart</span>");
              }jqc(".sc").addClass('open');jqc("#mycart").html(response);jqc("#mycart2").html(response);}});});

              jqc('a').each(

        function(){
          var hrefa = jqc(this).attr('href');
          /*var firstchr = hrefa.charAt(0);
          if(hrefa!='' && firstchr!='#' && hrefa!=undefined && firstchr=='h')
          {
            jqc(this).attr('href',hrefa.toLowerCase());
          }*/
        });
        });</script>

</head><body id="asdf" class=" catalog-category-view categorypath-women-new-arrivals-html category-new-arrivals store-default" style="overflow-x:hidden;">
<div id="loading" style="background-color: #fff;top:0px;left:0px;width: 100%;height: 100%;position: fixed;z-index:5000000"><center><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style=" position:relative; top:50vh;"></center></div>
<?php if($this->session->userdata("city_session")==''){?>
<div class="modal modal--bg zoom" id="newsletterModal" data-backdrop="static" data-pause=10000 style="display: block !important;">
  <div class="modal-dialog" style="border: 2px solid rgb(255, 255, 255); border-radius:10px">
    <div class="modal-bg-image">
   <!--  <?php  $image = $this->db->get('city_popup')->row(); ?> -->
     <div class="modal-div">
     <!-- <img  src="<?php echo base_url(); ?>/adminassets/styles/<?php echo $image->image; ?>" style="background-repeat: repeat-y;" alt="" class="img-responsive"> -->
   </div>

    </div>

    <div class="modal-content">
      <div class="modal-body">
        <div class="row">

          <div class="col-lg-12  text-center">
             <h5><i class="fa fa-map-marker"></i> &nbsp; &nbsp;Enter City<?=$this->session->userdata('city_session');?></h5>



            <?php
              echo form_open("welcome/add_city_session",array("class"=>"form-horizontal"));?>
                <p>
                  <select id="city_id" class="form-control" name="city" required="">
                    <option value="">Please Select City</option>
                      <?php
                      $city=$this->db->get("country_state_city")->result();
                        foreach($city as $city)
                        {
                          $cities=$this->db->get_where("cities",array("id"=>$city->city_name))->row();
                      ?>
                        <option value="<?php echo $city->city_name;?>"><?php echo $cities->name;?></option>
                        <?php }?>
                 </select>
                </p>
                <div><br>
                  <button class="btn btn--wd  text-uppercase wave">Submit</button>
                </div>
              <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php } ?>




<!-- Modal Search -->



<div class="overlay overlay-scale">



    <button type="button" class="overlay-close"> <span class="icon icon-clear"></span> </button>



    <div id="searchBox" class="overlay__content">



        <form id="search-form" class="search-form outer" method="post" name="searchForm" action="">



            <div class="input-group input-group--wd">



    <input type="text"  class=" input--full search-text search_id" autocomplete="off" placeholder="Search" value="" name="keyword" list="browsers" id="searchlight" required="">
    <button class="btn btn--wd text-uppercase wave waves-effect" value="Go" style="

      height: 31px;



      padding: 8px;

      width: 65px;

      /* border: none; */

      border-radius: 0px;

  "><i class="fa fa-search"></i></button>


                <span id="data2"></span> </div>







        </form>

    </div>



</div>


<div id="mainContainer" class="wrapper">



    <header class="header">



        <div class="header-line hidden-xs tophead" >



            <div class="container">

<div class="col-md-12">



                <div class="pull-right mb1" style="
    text-transform:capitalize;
">

                    <div>
                        <div id="FRAME_MENU" ><!--START: FRAME_MENU-->
                        <div class="h-links-list" >

                            <ul class="mobile1">
                                <!--START: menuitems_view-->

                                <?php if($this->session->userdata("city_session")){

                                  $cities=$this->db->get_where("cities",array("id"=>$this->session->userdata("city_session")))->row();
                              ?>
                               <li style="
    padding-right: 8px;
"><a href="#" class="menu" target="#"><b><i class="fa fa-map-marker"></i> </b></a></li> <li class="user-links__item"><b><a  href="<?php echo base_url();?>welcome/unset_city"><?php echo $cities->name;?></a></b>
                                 </li>
                                <?php } ?>
                               <!-- <li><a href="#" class="menu" target="_self">Product</a></li>-->

                                <li ><a href="<?php echo base_url(); ?>vendor-home" class="menu" target="_self">Sell</a></li>

                                <li><a href="<?php echo base_url('blog');?>" class="menu" target="_self">Blog</a></li>

<?php if($this->session->userdata("userid")){?>
<div class="dropdown pull-right"> <a href="#" class="dropdown-toggle btn--links--dropdown" data-toggle="dropdown"><?php echo $this->session->userdata("name"); ?> <i class="fa fa-angle-down"></i></a>
          <ul class="dropdown-menu ul-row animated fadeIn" role="menu">


            <li class='li-col list-user-menu'>

              <ul>
                <li style="padding: 0 0px 0 0;"><a href="<?php echo base_url();?>orders" style="width: 127px;">My Orders</a></li>
                <li style="padding: 0 0px 0 0;"><a href="<?php echo base_url();?>cancel-orders" style="width: 127px;">Cancel Orders</a></li>
                <li style="padding: 0 0px 0 0;"><a href="<?php echo base_url();?>manage-profile" style="width: 127px;">My Account</a></li>
                <li style="padding: 0 0px 0 0;"><a href="<?php echo base_url();?>logout"  style="width: 127px;"><i class="fa fa-sign-out"></i> Logout</a></li>

              </ul>
            </li>
          </ul>
        </div>

        <?php }else{?>




<li class="user-links__item"><a href="<?php echo base_url();?>login">Login</a></li>


             <li class="user-links__item"><a href="<?php echo base_url();?>login">Wishlist</a></li>

<?php }?>
<li class="user-links__item"><a href="<?php echo base_url(); ?>donate" style="font-weight:600; color:#3373c8;">Donate</a></li>

                                <!--END: menuitems_view-->
                            </ul>
                        </div>
                        <!--END: FRAME_MENU--></div>
                    </div>

                </div>

</div>
            </div>
        </div>
        <div class="header-line hidden-xs">
            <div class="container no-padding">
                <div class="row" style="padding:0px;">
                <div class="col-md-2 col-sm-3 mb" ><a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>assets/images/<?php echo $res->img; ?>" class="lima"></a></div>

                <div class="col-md-6 col-sm-4" align="right">

                <form method="post" action="" style="display: flex; width:95%">

                <input type="text" id="data_search" class="search_id" list="browsers" name="keyword" class="form-control search" placeholder="Search in Ansvel" onfocus="this.placeholder = ''"autocomplete="off" style="padding-left:5px;" required="">
                <span id="data"></span>

<style type="text/css">
    #data2 .row , #data .row{
        padding: 1%;
         padding-left: 2%;
          padding-right: 2%;

    }
    #data2 .row:hover,#data .row:hover{
        background-color: #eee;

    }
     #data_search{
       width: 100%;
       color:#000;
     }
    #data{
        /*position: fixed;
        top:86px;
      //  right:41.1%;
      right:40.3%;
        z-index: 5;
        border:1px solid #ccc;
        background-color: #fff;
        color:#000;
        //width: 452px;
        width:37.2%;
        padding: 1%;
      //  display: none;*/

    }
        #data2{
        /*position: fixed;
        top:86px;
        right:-60px;
        z-index: 5;
        border:1px solid #ccc;
        background-color: #fff;
        color:#444;
        width: 452px;
        padding: 1%;
        display: none;*/

    }
    #data2 .row img, #data .row img{
     /*     width:10%;
      float:left;*/
    }
    .mb
    {
      margin-top: -29px;
    }
    @media screen and (min-width: 501px) and (max-device-width: 999px) {

    .limage
    {
     width: 120%;

    }
    .no-padding{
      padding: 0px;
      margin: 0px;
    }
  }

    .search
    {
      height: 31px;
      border-radius: 0px;
      width: 320px !important;
      display: inline-block;
    }




  }
   .search
    {
      height: 31px;
      border-radius: 0px;
      width: 452px ;
    }

</style>





  <button class="btn btn--wd text-uppercase wave waves-effect" value="Go" style="

    height: 36px;



    padding: 8px;

    width: 65px;

    /* border: none; */

    border-radius: 0px;

"><i class="fa fa-search"></i></button>



                </form>



                </div>

                <div class="col-md-1">



                <div class="header__dropdowns-container">



            <div class="header__dropdowns">



            <div class="header__cart pull-left" >



              <div class="dropdown pull-right sc">

                <b style="color:#000;">CART</b> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button" data-toggle="dropdown" style="color:#000;" ><i class="fa fa-shopping-cart fa-2x"></i><span id="citems" class="badge badge--menu"><?php echo $this->cart->total_items();?></span></a>



                <?php if($this->cart->contents()){?>

                                <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart">

                  <div class="shopping-cart__settings"><a href="javascript:void(0)" class="emptycart"> Empty Cart</a></div>

                  <div class="shopping-cart__top text-uppercase">Cart (<?php echo $this->cart->total_items();?>)</div>

                  <ul>

                    <?php foreach($this->cart->contents() as $cart){?>

                                        <li class='shopping-cart__item'>

                      <div class="shopping-cart__item__image pull-left"><a href="#">

                                           <?php if($cart['custom']==""){?>

                                            <img src="<?php echo base_url();?>assets/images/<?php echo $cart['img'];?>" alt=""/></a>



                                            <?php }else{?>

                                             <img src="<?php echo base_url();?>adminassets/<?php echo $cart['img']; ?>" alt=""/></a>

                                            <?php }?></div>

                      <div class="shopping-cart__item__info">

                        <div class="shopping-cart__item__info__title">

                         <h2 class="text-uppercase"><a href="#"><?php echo substr($cart['name'], 0,20);
                          if(strlen($cart['name'])>20){echo '...';}?></a></h2>


                        </div>





                <div class="shopping-cart__item__info__option">Qty: <?php echo $cart['qty'];?></div>

                  <div class="shopping-cart__item__info__option">SubTotal: <i class="fa fa-inr"></i> <?php echo $cart['subtotal'];?></div>

                   <!-- <div class="shopping-cart__item__info__price"><i class="fa fa-inr"></i> <?php echo $cart['subtotal'];?>/-</div>-->



                    <div class="shopping-cart__item__info__delete" id="<?php echo $cart['rowid'];?>">

                    <a href="#" class="icon icon-clear"></a></div>

                      </div>

                    </li>

                    <?php }?>

                  </ul>

                  <div class="shopping-cart__bottom">

                    <div class="pull-left"><span class="shopping-cart__total">

                                        <i class="fa fa-inr"></i> <?php
                    if($this->session->userdata("dis")){
                      echo $this->cart->total()-$this->session->userdata("dis");
                    }
                    else{
                      echo "" .$this->cart->total();}?></span></div>

                    <div class="pull-right">

      <a href="<?php echo base_url();?>cart" class="btn btn--wd text-uppercase" style="color: rgb(255, 255, 255); width: 99px;">Cart</a>

            <a href="<?php echo base_url();?>checkout" class="btn btn--wd text-uppercase" style="color:#fff;">Checkout</a>





                    </div>

                  </div>

                </div>

                                <?php }else{?>

                                <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart">



      <div class="shopping-cart__top text-uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="shopping-cart__total">

            <i class="fa fa-shopping-bag fa-2x"></i>

            Empty Cart</span></div>



                </div>

                                <?php }?>



              </div>

            </div>

</div>

        </div>

                </div>
                <?php $info = $this->db->get("footer")->row();?>


                <div class="col-md-3">&nbsp; &nbsp;<h3 style=" color:#000; font-weight: 600; margin-top: -25px;   text-align: center;" id="call">&nbsp;&nbsp;&nbsp; <i class="fa fa-phone cell"></i> <?php if(isset($info->mobile)){echo $info->mobile;} ?></h3> </div>

                </div>

            </div>

        </div>

        <nav class="navbar navbar-wd" id="navbar">
            <div class="container no-pdd-lg">
<style>
.navbar-header .logo img {
  margin-top: auto;
  margin-bottom: auto;
}
</style>
                <div class="navbar-header account">
      <div class="col-xs-2 flo-n"> <button type="button" class="navbar-toggle" id="slide-nav"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button></div>
    <div class="col-xs-7" align="center"><a class="logo" href="<?php echo base_url();?>" style="float:none; display: inline-flex;">
      <img src="<?php echo base_url(); ?>assets/images/logo/logo2.png" alt="Ansvel logo" style="background-color: white;border-radius: 50%;"/>
      <img src="<?php echo base_url(); ?>assets/images/logo/ansvel_text1.png" alt="Ansvel logo" style="width: 120px;height: auto;"/>
            </a></div>
                </div>

                <div class="pull-left search-focus-fade no-pdd-lg" id="slidemenu">



                    <div class="slidemenu-close visible-xs"><span class="icon icon-clear"></span></div>

                    <!--START: FRAME_CATEGORY-->

<ul class="nav navbar-nav mobile">
   <li class="account">
   <a href="<?php echo base_url();?>welcome/unset_city" style="color: #fff;">
    <span class="link-name">
 <i class="fa fa-map-marker ic" style="color: #fff;"></i>

<?php echo $cities->name;?>
</a> 
</span>
</li>
<li><a href="<?php echo base_url(); ?>"><span class="link-name"><i class="fa fa-home fa-2x ic"></i> <span class="account"> Home</span>  </span></a></li>
 

<?php
    $heading = $this->db->get_where("main_heading",array("status"=>'enable'))->result();
foreach ($heading as $heading) {

 ?>




 <?php

if($heading->id=='1'){

 ?>

  <li><a href="<?php echo base_url(); ?>stitching" class="dropdown-toggle"><span class="link-name"><span class="account ic"><img src="<?php echo base_url(); ?>img/01-stitching-png-icon.png"></span><?php echo $heading->heading_name;?> <i class="fa fa-angle-down"></i></span></a></li>

                        <li class="al-subcategory">
                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">
                                <?php $mcat=$this->db->get("mcategory")->result();
            foreach($mcat as $mcat){?>
                                <li><a href="<?php echo base_url(); ?>stitching/<?php echo lcfirst($mcat->mcat_name); ?>/<?php echo $mcat->mid; ?>"><?php echo $mcat->mcat_name; ?></a></li>
                                <?php } ?>

                           </ul>

                           <?php }

                           if($heading->id=='2'){

 ?>

                        <li>
                         <li><a href="<?php echo base_url(); ?>fabric" class="dropdown-toggle"><span class="link-name"><span class="account ic"><img src="<?php echo base_url(); ?>img/02-fabric-png-icon.png"></span><?php echo $heading->heading_name;?> <i class="fa fa-angle-down"></i></span></a></li>
                        <li class="al-subcategory">
                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">
                                <?php $mcat=$this->db->get("mcategory")->result();

            foreach($mcat as $mcat){?>

                                <li><a href="<?php echo base_url(); ?>fabric/<?php echo lcfirst($mcat->mcat_name); ?>/<?php echo $mcat->mid; ?>"><?php echo $mcat->mcat_name; ?></a></li>

                                <?php } ?>
                            </ul>
                        <li>


                        <?php $mcat=$this->db->get("mcategory")->result();

            foreach($mcat as $mcat){

               ?>


                      <!--  <li><a href="#" class="cat wave"><span class="link-name"><?php echo $mcat->mcat_name; ?></span></a></li>


                        <li class="al-subcategory">



                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">



                                 <?php $subcat=$this->db->get_where("category",array("mid"=>$mcat->mid))->result();



            foreach($subcat as $subcat){?>



                                <li><a href="<?php echo base_url(); ?>Welcome/shop/<?php echo $subcat->cid; ?>"><?php echo $subcat->cat_name; ?></a></li>



                                <?php } ?>


                            </ul>



                        <li>-->

                        <?php }?>

                        <?php }

                        if($heading->id=='3'){

 ?>

                         <li ><a href="<?php echo base_url(); ?>uniform"  class="dropdown-toggle" ><span class="link-name"><span class="account ic"><img src="<?php echo base_url(); ?>img/03-uniform-png-icon.png"></span><?php echo $heading->heading_name;?> <i class="fa fa-angle-down"></i></span></a>
                        </li>

                        <li class="al-subcategory">
                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">
                                <li><a href="<?php echo base_url(); ?>uniform/girls">Girls</a></li>
                                <li><a href="<?php echo base_url(); ?>uniform/boys">Boys</a></li>

                            </ul>
                        </li>


                        <li class="al-subcategory">



                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">

                            </ul>



                        </li>

                        <?php }
                        if($heading->id=='4'){

 ?>


<li><a href="<?php echo base_url(); ?>accessories"  class="dropdown-toggle"><span class="link-name"><span class="account ic"><img src="<?php echo base_url(); ?>img/04-accessories-png-icon.png"> </span> <?php echo $heading->heading_name;?> <i class="fa fa-angle-down"></i></span></a></li>

                        <li class="al-subcategory">



                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">


                            <?php
                            $this->db->limit(3);
                             $mcat=$this->db->get("mcategory")->result();



                        foreach($mcat as $mcat){?>


                                <li><a href="<?php echo base_url(); ?>accessories/<?php echo lcfirst($mcat->mcat_name); ?>/<?php echo $mcat->mid; ?>"><?php echo $mcat->mcat_name; ?></a></li>



                                <?php } ?>

                            </ul>



                        </li>

                        <?php }

                        if($heading->id=='5'){

 ?>

                        <li><a  href="<?php echo base_url(); ?>altration" class="dropdown-toggle"><span class="link-name"><span class="account ic"><img src="<?php echo base_url(); ?>img/05-alteration-png-icon.png"></span><?php echo $heading->heading_name;?> <i class="fa fa-angle-down"></i></span></a></li>

<li class="al-subcategory">

                        <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">
 <?php $mcat=$this->db->get("mcategory")->result();



            foreach($mcat as $mcat){?>


                                <li><a href="<?php echo base_url(); ?>altration/<?php echo lcfirst($mcat->mcat_name); ?>/<?php echo $mcat->mid; ?>"><?php echo $mcat->mcat_name; ?></a></li>



                                <?php } ?>

                            </ul>


</li>

<?php }

if($heading->id=='6'){

 ?>

 <li><a href="<?php echo base_url(); ?>bridal" class="cat wave"><span class="link-name"><?php echo $heading->heading_name;?>  </span></a></li>
 <?php }

if($heading->id=='7'){

 ?>

 <li><a  class="dropdown-toggle"><span class="link-name"><span class="account ic"><img src="<?php echo base_url(); ?>img/06-online-boutique-png-icon.png"> </span><?php echo $heading->heading_name;?> <i class="fa fa-angle-down"></i></span></a></li>



                        <li class="al-subcategory">



                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">


                            <?php
                            $this->db->limit(3);
                             $mcat=$this->db->get("mcategory")->result();



                        foreach($mcat as $mcat){?>


          <li><a href="<?php echo base_url(); ?>online-boutique/<?php echo lcfirst($mcat->mcat_name); ?>/<?php echo $mcat->mid; ?>"><?php echo $mcat->mcat_name; ?></a></li>



                                <?php } ?>

                            </ul>

                        </li>

                        <?php }

                        if($heading->id=='8'){

 ?>


<li><a class="dropdown-toggle"><span class="link-name"><?php echo $heading->heading_name;?> <i class="fa fa-angle-down"></i></span></a></li>

                        <li class="al-subcategory">

                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">


                            <?php
                            $this->db->limit(3);
                             $mcat=$this->db->get("mcategory")->result();


                            ?>




                            </ul>



                        </li>

<?php }

if($heading->id=='9'){

 ?>


                        <li ><a href="<?php echo base_url(); ?>how-it-works" ><span class="link-name"><?php echo $heading->heading_name;?></span></a>
</li>

<?php }
if($heading->id=="10"){
    ?>


                         <li ><a href="<?php echo base_url(); ?>faq" ><span class="link-name"><?php echo $heading->heading_name;?></span></a>

                        </li>


                       <?php if($this->session->userdata("userid")){?>

                        <li id="username_session"><a  href="#" class="dropdown-toggle"><span class="link-name"><?php echo $this->session->userdata("name"); ?><i class="fa fa-angle-down"></i></span></a></li>



                        <li class="al-subcategory">



                            <ul class="dropdown-menu animated fadeIn 3d-sub" role="menu">
                                <li><a href="<?php echo base_url();?>welcome/orders">My Orders</a></li>
                <li><a href="<?php echo base_url();?>welcome/cancel_orders">Cancel Orders</a></li>
                <li><a href="<?php echo base_url();?>welcome/manage_profile">My Account</a></li>
                <li><a href="<?php echo base_url();?>welcome/logout" ><i class="fa fa-sign-out"></i> Logout</a></li>

                            </ul>

                        </li>




        <?php }else{?>




 <li class="account "><a href="<?php echo base_url();?>welcome/login"><span class="link-name">Login</span></a></li>

               <!--  <li class="account "><a href="<?php echo base_url();?>welcome/login"><span class="link-name">Sign Up</span></a></li> -->
<?php }?>



                <li class="account "><a href="<?php echo base_url(); ?>Welcome/donate"><span class="link-name">Donate</span></a></li>

                       <?php } ?>




<?php } ?>
                    </ul>

                </div>

<div class="col-xs-3">
                <div class="header__dropdowns1">



        <div class="header__search pull-right">



<a href="#" class="btn dropdown-toggle btn--links--dropdown header__dropdowns__button search-open"

><span class="icon icon-search"></span></a> </div>

        <div class="dropdown pull-right sc ab">

                <b style="color:#000;"></b> <a href="#" class="btn dropdown-toggle btn--links--dropdown header__cart__button header__dropdowns__button" data-toggle="dropdown" style="color:#000;"><i class="fa fa-cart-plus fa-2x mcart" ></i><span id="count_cart" class="badge badge--menu mcart" ><?php echo $this->cart->total_items();?></span></a>



                <?php if($this->cart->contents()){?>

                                <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart2">

                  <div class="shopping-cart__settings"><a href="#" class="fa fa-cart-plus emptycart"> Empty Cart</a></div>

                  <div class="shopping-cart__top text-uppercase">Cart (<?php echo $this->cart->total_items();?>)</div>

                  <ul>

                    <?php foreach($this->cart->contents() as $cart){?>

                                        <li class='shopping-cart__item'>

                      <div class="shopping-cart__item__image pull-left"><a href="#">

                                           <?php if($cart['custom']==""){?>

                                            <img src="<?php echo base_url();?>assets/images/fabrics/<?php echo $cart['img'];?>" alt=""/></a>



                                            <?php }else{?>

                                             <img src="<?php echo base_url();?>assets/images/fabrics/bag.png" alt=""/></a>

                                            <?php }?></div>

                      <div class="shopping-cart__item__info">

                        <div class="shopping-cart__item__info__title">

                          <h2 class="text-uppercase"><a href="#"><?php echo $cart['name'];?></a></h2>

                        </div>

                <div class="shopping-cart__item__info__option">Qty: <?php echo $cart['qty'];?></div>

                  <div class="shopping-cart__item__info__option">SubTotal: <i class="fa fa-inr"></i> <?php echo $cart['subtotal'];?>/-</div>

                   <!-- <div class="shopping-cart__item__info__price"><i class="fa fa-inr"></i> <?php echo $cart['subtotal'];?>/-</div>-->



                    <div class="shopping-cart__item__info__delete" id="<?php echo $cart['rowid'];?>">

                    <a href="#" class="icon icon-clear"></a></div>

                      </div>

                    </li>

                    <?php }?>

                  </ul>

                  <div class="shopping-cart__bottom">

                    <div class="pull-left"><span class="shopping-cart__total">

                                        <i class="fa fa-inr"></i> <?php echo $this->cart->total();?></span></div>

                    <div class="pull-right">

      <a href="<?php echo base_url();?>cart" class="btn btn--wd text-uppercase" style="color:#fff;">Cart</a>

            <a href="<?php echo base_url();?>checkout" class="btn btn--wd text-uppercase" style="color:#fff;">Checkout</a>





                    </div>

                  </div>

                </div>

                                <?php }else{?>

                                <div class="dropdown-menu animated fadeIn shopping-cart" role="menu" id="mycart2">



      <div class="shopping-cart__top text-uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="shopping-cart__total">

            <i class="fa fa-shopping-bag fa-2x"></i>

            Empty Cart</span></div>



                </div><?php }?></div>

   <a href="tel:9644409191" class="phonecell" ><div class="pull-right" style="margin-top: 10px;">

                <b style="color:#fff;"></b><a href="tel:9644409191" style="color:#000;"><i class="fa fa-phone fa-2x" style="color:#fff;"></i></a>




              </div></a> 

      </div></div>

            </div>

        </nav>

    </header>

<script type="text/javascript">
  //var iii = $.noConflict();
$(document).ready(function(){


 $('li').click(function(){
   $('li').removeClass('open');
    $(this).toggleClass('open');
  });
var $search2 =jQuery.noConflict();
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




$(window).scroll(function() {
    $('#data').fadeOut('medium');
     $('#data2').fadeOut('medium');
});
$(window).scroll(function() {
    $('#data').fadeOut('medium');
     $('#data2').fadeOut('medium');
});
$('.hovernav').hover(function() {
    //console.log('hover');
    $('.hovernav').find('i').not(".fa-home").removeClass('fa-angle-up');
    $('.hovernav').find('i').not(".fa-home").addClass('fa-angle-down');
    $(this).find('i').not(".fa-home").removeClass('fa-angle-down');
    $(this).find('i').not(".fa-home").addClass('fa-angle-up');
    //$(this).css('background-color','#444');
});


});
</script><script>
$('#newsletterModal').modal({
    backdrop: 'static',
    keyboard: false  // to prevent closing with Esc button (if you want this too)
});


   function count_cart() {
     var url = "<?php echo base_url() ?>"+"welcome/count_cart";
      //console.log(url);
    $.ajax({url: url, success: function(result){
      //console.log(result);
      if(result=='')
      {
        $("#citems").html('0');
         $("#count_cart").html('0');
      }else{

        $("#citems").html(result);
         $("#count_cart").html(result);
      }
      }
    }});
}

</script>