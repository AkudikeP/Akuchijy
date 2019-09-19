<style type="text/css">
@font-face{font-family:'Glyphicons Halflings';src:url('../fonts/glyphicons-halflings-regular.eot');src:url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'),url('../fonts/glyphicons-halflings-regular.woff') format('woff'),url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'),url('../fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');}.glyphicon{position:relative;top:1px;display:inline-block;font-family:'Glyphicons Halflings';font-style:normal;font-weight:normal;line-height:1;-webkit-font-smoothing:antialiased;}
.glyphicon-arrow-left:before{content:"\e091";}
.glyphicon-arrow-right:before{content:"\e092";}
.glyphicon-arrow-up:before{content:"\e093";}
.glyphicon-arrow-down:before{content:"\e094";}
</style>
<script type="text/javascript">

		$(document).ready(function () {
		$(".imgLiquidFill").imgLiquid({fill:true});

	});

	</script>
<script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:-1,d:1,o:-1},{b:0,d:1000,o:1}],
              [{b:1900,d:2000,x:-379,e:{x:7}}],
              [{b:1900,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:1000,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:1900,d:1600,x:-200,o:-1,e:{x:16}}]
            ];

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 3000,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
    </script>
<style>
.career_image{
    position: relative; 
   width: 100%;
   }
   .career-im{
    width: 100%;
    height: 380px;
   }
   @media(max-width: 500px){
   .career-im{
    width: 100%;
    height: 150px;
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

.boxSep{
		background-color:#f7f7f7;


		margin-right: 5px;

	}
	.imgLiquid{
		width: auto;
		height: 300px;
	}
	.LogSep{
		margin:10px;
	}

.testi
	{
		height:250px; !important;
	}
}

</style>

		<?php
			$donatetext = $this->db->get_where("tbl_donate where donate_id =  '1'");
			$data['dontext'] = $donatetext->result();
			foreach($data['dontext'] as $text)
		   {
					   	$image = $text->banner_img;
              $image_b = $text->banner2;
							$donate_desc = $text->donate_desc;
							if($image == ''){ $userimg = 'default-user-image.png';}else{ $userimg = $image;}
              if($image_b == ''){ $userimg_b = 'default-user-image.png';}else{ $userimg_b = $image_b;}
							$image1 = $text->img1;
							$image2 = $text->img2;
							$image3 = $text->img3;
							$image4 = $text->extra_img;
							if($image1 == ''){ $userimg1 = 'default-user-image.png';}else{ $userimg1 = $image1;}
							if($image2 == ''){ $userimg2 = 'default-user-image.png';}else{ $userimg2 = $image2;}
							if($image3 == ''){ $userimg3 = 'default-user-image.png';}else{ $userimg3 = $image3;}
							if($image4 == ''){ $userimg4 = 'default-user-image.png';}else{ $userimg4 = $image4;}

							$image5 = $text->otherimg1;
							$image6  = $text->otherimg2;
							$image7  = $text->otherimg3;
							$image8  = $text->otherimg4;
              $img_title1 = $text->img_title1;
              $img_title2  = $text->img_title2;
              $img_title3  = $text->img_title3;


							if($image5 == ''){ $userimg5 = 'default-user-image.png';}else{ $userimg5 = $image5;}
							if($image6 == ''){ $userimg6 = 'default-user-image.png';}else{ $userimg6 = $image6;}
							if($image7 == ''){ $userimg7 = 'default-user-image.png';}else{ $userimg7 = $image7;}
							if($image8 == ''){ $userimg8 = 'default-user-image.png';}else{ $userimg8 = $image8;}

							$othertitle1  = $text->othertitle1;
							$othertitle2  = $text->othertitle2;
							$othertitle3  = $text->othertitle3;
							$othertitle4  = $text->othertitle4;
							$othertext1  = $text->othertext1;
							$othertext2  = $text->othertext2;
							$othertext3  = $text->othertext3;
							$othertext4  = $text->othertext4;
		   }
		   ?>
<div class="career_image">
                <img class="career-im" src="<?php echo base_url(); ?>assets/images/<?php echo $image;?>"/> 
                </div>
<!-- <section class="content" id="slider">
      <div class="tp-banner-container">
        <div class="tp-banner" >
          <ul>
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
              <img src="<?php echo base_url(); ?>assets/images/<?php echo $image;?>"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
            </li>
          </ul>
        </div>
    </section> -->
<section class="content" style="padding-bottom: 25px; padding-top: 25px;">
    <div class="container">
        <div class="modal quick-view zoom" id="quickView"  style="opacity: 1">
            <div class="modal-dialog">
                <div class="modal-content"> </div>
            </div>
        </div>

<section class="aboutus padding-section haslayout">
				<div class="container">
       <div class="heading" align="center">
							 <h2 align="center">Donate For Charity</h2><br />
							<span class="subheading"></span>
						</div>
           <div class="col-md-4 col-sm-4" align="center">
          <a href="javascript:void();">
            <img src="<?php echo base_url(); ?>assets/images/<?php echo $image1;?>"  style="width:72px !important;"/>
            </a>
           <p></p><h4  ></h4><p></p><p style="margin-bottom: 5px;"><?php echo $img_title1; ?></p>
         </div>
           <div class="col-md-4 col-sm-4" align="center">
            <a href="javascript:void();">
            <img src="<?php echo base_url(); ?>assets/images/<?php echo $image2;?>"  style="width:72px !important;"/>
            </a>
           <p></p><h4  ></h4><p></p><p style="margin-bottom: 5px;"><?php echo $img_title2; ?></p>
         </div><div class="col-md-4 col-sm-4" align="center">
            <a href="javascript:void();">
            <img src="<?php echo base_url(); ?>assets/images/<?php echo $image3;?>"  style="width:72px !important;"/>
            </a>
           <p></p><h4  ></h4><p></p><p style="margin-bottom: 5px;"><?php echo $img_title3; ?></p>
         </div>
        </div>
    </div>
			</section>
            </div>
</section>

<section class="content content--parallax top-null home-blog" data-image="<?php echo base_url(); ?>assets/images/<?php  echo $userimg_b ;?>" style="    background-size: cover;">

<?php  /*data-bgattach="<?php echo base_url(); ?>assets/images/bg.jpg"*/ ?>
    <div class="bg-image overlay-container" >
                    <!-- <div class="overlay dark"></div> --><!-- End .overlay -->
                    <div class="container">
                    <h2 align="center" style="padding-top:20px;">Donate For Charity</h2>
                    <div>
						<?php  echo $donate_desc;?>
					</div>
<div align="center" style="padding-bottom:20px;">
	<?php if($this->session->userdata('userid')!=''){ ?>
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#donateModal">Donate Now</a>
<?php }else{ ?>
<a href="<?php echo base_url() ?>login?url=<?php echo base_url() ?>donate" class="btn btn-success" >Donate Now</a>
	<?php } ?>
</div>
                    </div><!-- End .container -->
                </div>
</section>
    <!--section class="content content--parallax top-null"  style=" background-size: cover; background-color:#fff;">
      <div class="container" data-bgattach="#">
      <div class="heading" >

							<span class="subheading"></span>

						</div>
        <div class="col-md-12 " data-animation="fadeInUp" data-animation-delay="0.6s" style="margin-top:20px; margin-bottom:20px;">
            <div class="col-md-6"><img src="<?php echo base_url(); ?>assets/images/<?php echo $image4;?>" /></div>
             		<div class="col-md-6">
             			<div class="row">
              				<div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/<?php echo $image5;?>" /></div>
         					<div class="col-md-10"><h4><?php echo $othertitle1;?></h4><p><?php echo $othertext1;?></p></div>
         				</div>
         				<div class="row">
         					<div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/<?php echo $image6;?>" /></div>
         						<div class="col-md-10"><h4><?php echo $othertitle2;?></h4><p><?php echo $othertext2;?></p></div>
              				</div>
              				<div class="row">
         						<div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/<?php echo $image7;?>" /></div>
         							<div class="col-md-10"><h4><?php echo $othertitle3;?></h4><p><?php echo $othertext3;?></p></div>
              					</div>
              					<div class="row">
         							<div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/<?php echo $image8;?>" /></div>
         								<div class="col-md-10"><h4><?php echo $othertitle4;?></h4><p><?php echo $othertext4;?></p></div>
              						</div>
                				</div>
          				</div>


      			</div>
    </section-->
 <!-- Modal -->
  <div class="modal fade" id="donateModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h3 align="center"><strong>Donate now at Mobile Darzi</strong></h3>
        <div class="modal-body">
<?php $user_data = $this->db->get_where('users',array('uid'=>$this->session->userdata("userid")))->row(); ?>

						<?php echo form_open("Welcome/donate_login",array('class'=>"form-horizontal"));?>

  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Name:</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" value="<?php echo $this->session->userdata("name");?>" placeholder="Enter Name"  name="name" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-allowing=" " title="Name Should Only have alphabets"  required="">
    </div>
  </div>
  <div class="form-group">
     <label class="control-label col-sm-3" for="pwd">Gender:</label>
     <div class="col-sm-2">
   <label for="male" class="radio">
                            <input id="male" type="radio" name="gender" <?php if($user_data->gender=='m'){echo 'checked';} ?> value="m" required="">
                            <span class="outer"><span class="inner"></span></span>Male</label>
                          </div>
                          <div class="col-sm-3">
                            <label for="female" class="radio">
                            <input id="female" type="radio" name="gender"  <?php if($user_data->gender=='f'){echo 'checked';} ?> value="f">
                            <span class="outer"><span class="inner"></span></span>Female</label>
  </div></div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Mobile Number:</label>
    <div class="col-sm-9">
      <input type="number"  name="mobile" name="contact" pattern="[0-9]{10}" title="10 digit contact number" maxlength="10" class="form-control" value="<?php echo $user_data->mobile; ?>" placeholder="Enter Number">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Address:</label>
    <div class="col-sm-9">

			<textarea rows="3" name="baddress" style="min-height:50px;" type="text" class="form-control" required autocomplete="off"><?php echo $user_data->address; ?></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Landmark:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" value="<?php echo $user_data->landmark; ?>" id="email" placeholder="Enter landmark" name="landmark">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="email">State:</label>
    <div class="col-sm-9">
			<select class="form-control" name="bstate" id="bstate" required autocomplete="off" required="">

				<option value=""></option>

					<?php
					$states = $this->db->get('states')->result();
							foreach ($states as $value) {
								?>
								 <option value="<?php echo $value->id; ?>" <?php if($value->id==$user_data->state){
									echo "Selected";
									} ?>><?php echo $value->name; ?></option>
								<?php
							}
					 ?>


			</select>
    </div>

  </div>
	<span id="city_select">






			<?php
			$states = $this->db->get('cities')->result();
					foreach ($states as $value) {
						if($value->id==$user_data->city){
						?>

						<div class="form-group">
					    <label class="control-label col-sm-3" for="email">City:</label>
					    <div class="col-sm-9">
					      <input type="text" name="city22" class="form-control" value="<?php echo $value->name; ?>" placeholder="Enter City" required="" readonly="">
					    </div>
					  </div>
						 <?php }

					}
			 ?>



	</span>

  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Pincode:</label>
    <div class="col-sm-9">
      <input  class="form-control" type="number" min="1" pattern="[0-9]{6}" title="6 digit contact number" maxlength="6" value="<?php echo $user_data->pincode; ?>" name="bpin" placeholder="Enter pincode">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Pickup Date & Time:</label>
    <div class="col-sm-9">

			<div class="input-group date form_datetime col-md-12" data-date="<?php echo date('Y-m-d') ?>T00:20:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
					<input class="form-control" size="16" type="text" name="date_time" value="" readonly required="">
					<span class="input-group-addon"><span class="fa fa-times"></span></span>
<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
			</div>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Email:</label>
    <div class="col-sm-9">
      <input type="email" name="email" class="form-control" value="<?php echo $user_data->email; ?>" id="email" placeholder="Enter email" required="">
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-12" align="center">
      <button type="submit" class="btn btn-info">Donate</button>
    </div>
  </div>
              <?php echo form_close();?>
        </div>

      </div>

    </div>
  </div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script>
	//alert('kk');
		$.validate({
			lang: 'en'
		});
	</script>
	<link href="<?php echo base_url(); ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript">
			$('.form_datetime').datetimepicker({
					//language:  'fr',
					weekStart: 1,
					todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
					showMeridian: 1,
            hoursDisabled: '0,1,2,3,4,5,6,7,8,9,20,21,22,23'
			});
		$('.form_date').datetimepicker({
					language:  'fr',
					weekStart: 1,
					todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
			});
		$('.form_time').datetimepicker({
					language:  'fr',
					weekStart: 1,
					todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 1,
			minView: 0,
			maxView: 1,
			forceParse: 0
			});
	</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>

  <script src="js/jssor.slider-22.0.6.min.js" type="text/javascript"></script>


   <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/2.1.0/jquery.imagesloaded.min.js"></script>
   <script src="<?php echo base_url(); ?>js/jquery-imagefill.js"></script>
  <script>
	$("#bstate").change(function() {
	    var sid = $(this).val();
	    $.ajax({
	        type : "POST",
	        url : "<?php echo base_url('index.php/welcome/selectstat_donate');?>",
	        data : {sid:sid},
	        success: function(data){
	      //alert(data);
	          if(data){
	          $("#city_select").html(data);
	          }
	      }
	    });
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
        </script>
          <script type="text/javascript">
            document.documentElement.className = 'no-fouc';
        </script>




<script type="text/javascript">jssor_1_slider_init();</script>

<script src="<?php echo base_url();?>assets/js/custom.js"></script>
