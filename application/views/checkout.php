<?php //print_r($this->cart->contents());
if($_POST)
{
  //print_r($_POST);
  } ?>
     
<div id="pageContent">

    <!-- Breadcrumb section -->
    <section class="breadcrumbs breadcrumbs-boxed">



      <div class="container">



        <ol class="breadcrumb breadcrumb--wd pull-left">



          <li><a href="#">Home</a></li>



          <li class="active">My Cart</li>



        </ol>







      </div>



    </section>







    <!-- Content section -->



    <section class="content">



      <div class="container" style="margin-top:20px;">



        <div class="row product-info-outer">



          <div class="product-info col-sm-12 col-md-12 col-lg-12">

          <div class="panel panel-primary">

      <div class="panel-heading" >  <h4 class="text-uppercase text-left" style="padding: 12px 20px 0.5em;">Shipping Details</h4></div>

      <div class="card card--form">







              <!--	<h5>Hi, <?php echo $this->session->userdata("name");?></h5>-->

                <div class="row">
                              <?php
                                $this->load->helper('captcha');
                                $this->load->helper('string');
                                $rand_string = random_string('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 8);
 $vals = array(
        'word'          => $rand_string,
        'img_path'      => './assets/images/captcha/',
        'img_url'       => base_url()."assets/images/captcha/",
        'font_path'     => base_url()."assets/font/fonts/texb.ttf",
        'img_width'     => '150',
        'img_height'    => '43px',
        'expiration'    => 7200,
        'word_length'   => 8,
        'font_size'     => 16,
        'img_id'        => 'Imageid',
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 255, 255)
        )
);

$cap = create_captcha($vals);
$data = array(
        'captcha_time'  => $cap['time'],
        'ip_address'    => $this->input->ip_address(),
        'word'          => $cap['word']
);

$query = $this->db->insert_string('captcha', $data);
$this->db->query($query);
?>
              	<?php 	$this->db->group_by("baddress");

						$add=$this->db->get_where("orders",array("userid"=>$this->session->userdata("userid"),"delete_for_shipping_address"=>0));

						if($add->num_rows()>0){$show="none";

							$add=$add->result();
              //print_r($add);
              $i=0;
              $value22=0;
						foreach($add as $add){
              if(!empty($add->baddress) && !empty($add->blandmark) && !empty($add->bcity) && !empty($add->bstate) && !empty($add->bpin)){
                if($i==0){
                   $value22 = $add->oid;
                  $i++;
                }
                ?>


						<div class="col-md-3 col-sm-4 preadd" data-animation="fadeInLeft" data-animation-delay="0.5s">

                            <div class="card card--icon">

                                  <div class="card--icon__cell">

                                  <a href="<?php echo $add->oid;?>"  id="<?php echo $add->bname;?>_<?php echo $add->bphone;?>_<?php echo $add->baddress; ?>_<?php echo $add->bpin; ?>_<?php echo $city->name ?>" class="icon card--icon__cell__icon icon-truck oldadd">
                                  <?php  if($i==1){
                  echo '<i class=" checked fa fa-check"></i>';
                  $i++;
                } ?>


</a>

                                    <h5 class="card--icon__cell__title text-uppercase"><?php echo $add->bname;?></h5>

                                    <small><i class="fa fa-phone"></i> <?php echo $add->bphone;?></small>
                                   <p> </p>
                                    <h6 class="centered-sm"><?php echo $add->baddress."<br>".$add->bpin;?><br/>



                                    <?php $city = $this->db->get_where('cities',array('id'=>$add->bcity))->row();
                                     echo $city->name;?></h6>
                                     
                                     <a class="pull-left" href="<?php echo $add->oid;?>" id="delete_shipping">
                                  <?php 
                  echo '<i class="fa fa-trash-o" aria-hidden="true"></i>';
                  ?>


</a>

                                  </div>

                                  <div class="card--icon__text text-center">


                                  </div>

                                </div>

                            </div>
                            <!--edit-->
                            <div class="edit<?php if(isset($add->id)){ echo $add->id; } ?>">
                                              <?php echo form_open("welcome/place_order",array('class'=>"contact-form","style"=>"display:$show;padding:2%","id"=>"address"));?>
<?php
//echo $this->session->userdata("userid");
$user_data = $this->db->get_where('users',array('uid'=>$this->session->userdata("userid")))->row();
//echo $this->db->last_query();
//print_r($user_data);
 ?>
                <label class="lb">Name*</label>

                <input type="text" id="name"  data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-allowing=" " title="Name Should Only have alphabets"  value="<?php echo $this->session->userdata("name");?>"  name="bname" class="name input--wd input--wd--full" required autocomplete="off">

                <label class="lb">Contact*</label>

                <input min="1" id="mobile" min="10" pattern="[0-9]{10}" maxlength="10" title="10 digit contact number" type="number" value="<?php echo $user_data->mobile; ?>" name="bcontact" class="mobile input--wd input--wd--full" required autocomplete="off">
                <label class="lb">Landmark*</label>

                <input type="text" value="<?php echo $user_data->landmark; ?>" name="blandmark" class="mobile input--wd input--wd--full" required autocomplete="off">

                <label class="lb">Shipping Address*</label>

                <textarea rows="3" id="baddress" name="baddress" style="min-height:50px;" type="text" class="input--wd input--wd--full" required autocomplete="off"><?php echo $user_data->address; ?></textarea>

                <label class="lb">Select State*</label>
                <?php  $this->db->distinct();
                  $this->db->select('state_name');
                  $dstate = $this->db->get('country_state_city')->result();
                  foreach ($dstate as $value) {
                    $newarr = $value->state_name;
                  }
                  //print_r($dstate); echo 'kk';
                  $this->db->where_in('id',"$newarr");
                  $states55 = $states = $this->db->get('states')->result();
                  //echo $this->db->last_query(); ?>
                <select class="input--wd input--wd--full" name="bstate" id="bstate" required autocomplete="off">

                  <option value="">Select</option>

                    <?php
                  /*  $this->db->distinct();
                    $this->db->select('state_name');
                    $dstate = $this->db->get('country_state_city')->result();
                    print_r($dstate);*/


                        foreach ($states as $value) {
                          ?>
                           <option value="<?php echo $value->id; ?>" <?php if($value->id==$user_data->state){
                            echo "Selected";
                            } ?>><?php echo $value->name; ?></option>
                          <?php
                        }
                     ?>


                </select>
                <span id="city_select">
                  <?php
                  if(!empty($user_data->city))
                  {
                  if(isset($user_data->city))
                  {
                   $user_cities = $this->db->get_where('cities',array('state_id'=>$user_data->state))->result();
                    //echo $this->db->last_query();
                  }else{
                    $states ='';
                  }

                          ?>
                          <label class="lb"> City*</label>
                          <select class="input--wd input--wd--full" name="bcity" required>
                          <option value="">Select</option>
                              <?php
                        foreach ($user_cities as $value) {
                          ?>
                           <option value="<?php echo $value->id; ?>" <?php if($value->id==$user_data->city){
                            echo "Selected";
                            } ?>><?php echo $value->name; ?></option>
                          <?php
                        }
                     ?>
                          </select>
                          
                          
                           <?php
}

                     ?>
                   </span>

                <label class="lb">Pin Code* </label>

                <input type="number" id="pin" min="1" pattern="[0-9]{6}" title="6 digit contact number" maxlength="6" value="<?php echo $user_data->pincode; ?>" name="bpin" class="pin input--wd input--wd--full" autocomplete="off" required>

                                                           <input type="hidden" name="ip" value="<?php echo $this->input->ip_address(); ?>" >

                                <label class="lb">Shipping Method* </label>



                                                                  <?php $this->db->order_by("price","asc");
                                                                 $shipping_methods =$this->db->get('shipping_methods')->result();

                                                                 foreach ($shipping_methods as $value50) {
                                                                    ?>
                                                                <div class="row">

                                                                <div class="col-md-12">
                                                                    <label class="radio">
                                                                    <input id="radio2" type="radio"  value="<?php echo $value50->id; ?>" name="ship" class="measure" required>
                                                                    <span class="outer"><span class="inner"></span></span><?php echo $value50->reason." -
                                &nbsp <i class='fa fa-inr'></i>".$value50->price; ?></label>

                                                                </div>
                                                                </div>
                                                                <?php } ?>
                                                                 
<?php
/*
echo '<br>&nbsp<i class="fa fa-refresh" aria-hidden="true"></i> &nbsp<span class="recaptcha">'.$cap['image'].'</span>';
echo '<input type="text" placeholder="captcha" class="captch input--wd" name="captcha" value="" required/>';*/
 ?>


                  <div class="row">

                                <div class="col-md-3">



                                    <label class="radio">



<input id="radio2" type="radio"  value="COD" name="pay" class="measure" required autocomplete="off" />
<span class="outer"><span class="inner"></span></span>Cash On Delivery
</label>

                                </div>
                                <div class="col-md-3">
<label class="radio">
<input id="radio4" type="radio"  value="PAYU" name="pay" class="measure" />
<span class="outer"><span class="inner"></span></span>PayU Money</label>
</div>

</div>
<?php if(isset($_SESSION['msg']))
                           {
                            echo "<span class='alert alert-danger'>".$_SESSION['msg']."</span>";
                            } ?>
<div id="RecaptchaField1"></div>

                <br/>

<button type="submit" name="submit" class="btn btn--wd text-uppercase wave placeorder">Place Order</button>

             <?php echo form_close();?>
                            </div>
                            <!--edit-->

						<?php }}
             $this->db->order_by("price","asc");
            $shipping_methods =$this->db->get('shipping_methods')->result();
						?>

                        <div class="col-md-4 col-sm-8 oldform" >

                            <div class="card card--icon">

                           <?php echo form_open("/welcome/place_order");?>

                           <input type="hidden" id="oid" name="oid" value="<?php echo $value22; ?>">
                           <input type="hidden" name="ip" value="<?php echo $this->input->ip_address(); ?>" >

<h4 style="margin-top:10px;">Shipping Method</h4>

                                  <div class="card--icon__text text-center">

                                  <?php foreach ($shipping_methods as $value49) {
                                    ?>
                                <div class="row">

                                <div class="col-md-12">
                                    <label class="radio">
                                    <input id="radio2" type="radio"  value="<?php echo $value49->id; ?>" name="ship" class="measure" required>
                                    <span class="outer"><span class="inner"></span></span><?php echo $value49->reason." -
&nbsp <i class='fa fa-inr'></i>".$value49->price; ?></label>

                                </div>
                                </div>
                                <?php } ?>
                                </div> <hr>
                                  <h4 style="margin-top:10px;">Payment Method</h4>

                                  <div class="card--icon__text text-center">

                                <div class="row">





                                <div class="col-md-12">



                                    <label class="radio">



                                    <input id="radio2" type="radio"  value="COD" name="pay" class="measure" required>



                                    <span class="outer"><span class="inner"></span></span>Cash On Delivery</label>



                                </div>







                                <div class="col-md-12">



                                    <label class="radio">



                                    <input id="radio4" type="radio"  value="PAYU" name="pay" class="measure" required>



                                    <span class="outer"><span class="inner"></span></span>PayU Money</label>



                                </div><br/><br/>
                                

<!--script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/jquery-confirm.css"/>
    <script src="<?php echo base_url();?>adminassets/js/bundled.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery-confirm.js"></script-->

<!--script type="text/javascript">
  $(document).ready(function(){
    //alert('k');
 /*   $(".mobile").keyup(validation);
    $(".name").keyup(validation);
    $(".pin").keyup(validation);
  function validation(){
 /*   console.log('called');
    var mobile=$('.mobile').val();
      var name=$('.name').val();
      var pin=$('.pin').val();
      if(pin==0)
      {
        $('.pin').val('');
      }

      var namev = new RegExp('^[a-zA-Z ]*$');
      var contactnum = new RegExp('^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$');
      var pincode = new RegExp('^[1-9][0-9]{5}$');
      if(!namev.test(name))
      {
        alert('kkk1');
        $.confirm({
                           title: 'Alert',
                            content: 'Name should not contain numbers.',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Ok',
                                    btnClass: 'btn-info',
                                    action: function () {
                                      //this.value='';

                                      // console.log(sid);
                                        }
                                },

                               }

                        });
        return false;
      }

      if(!contactnum.test(mobile))
      {alert('kkk2');
          $.confirm({
                           title: 'Alert',
                            content: 'Please check your content number.',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Ok',
                                    btnClass: 'btn-info',
                                    action: function () {
                                      //this.value='';

                                      // console.log(sid);
                                        }
                                },

                               }

                        });
        return false;
      }
      if(!pincode.test(pin))
      {alert('kkk3');
          $.confirm({
                           title: 'Alert',
                            content: 'Name should not contain numbers.',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Ok',
                                    btnClass: 'btn-info',
                                    action: function () {
                                      //this.value='';

                                      // console.log(sid);
                                        }
                                },

                               }

                        });
        return false;
      }
  }*/

});
</script-->
<?php if(isset($_SESSION['msg']))
                           {
                            echo "<span class='alert alert-danger'>".$_SESSION['msg']."</span>";
                            } ?>
 <div id="RecaptchaField2"></div>
<?php
/*
echo '<br><i class="fa fa-refresh" aria-hidden="true"></i> &nbsp<span class="recaptcha">'.$cap['image'].'</span>';
echo '<input type="text" placeholder="captcha" class="captch input--wd" name="captcha" value="" required/>';*/
 ?>
                                <div class="row" style="
    margin-top: 25px;
">

                                <div class="col-md-5 col-sm-6">

                                 <button type="submit" name="submit" class="placeorder btn btn--wd text-uppercase wave">Place Order</button></div>&nbsp;&nbsp;
                                  <div class="col-md-5 col-sm-5">

 <!--button id="another" class="btn btn--wd text-uppercase wave chk" style="
    margin-left: 56px;
">Change Address</button-->
<button class="btn btn--wd text-uppercase" type="button" id="newadd">Add New Address</button>

                                </div>
                                </div>

</div>



             <?php echo form_close();?>

                                  </div>
                                
                                </div>

                            </div>
                               
                        <?php

						}else{

						$show="";

						}?>



                </div>

                <!--button class="btn btn--wd text-uppercase" type="button" id="newadd">Add New Address</button-->

                <?php echo form_open("welcome/place_order",array('class'=>"contact-form","style"=>"display:$show;","id"=>"address"));?>
<?php
//echo $this->session->userdata("userid");
$user_data = $this->db->get_where('users',array('uid'=>$this->session->userdata("userid")))->row();
//echo $this->db->last_query();
//print_r($user_data);
 ?>
                <label class="lb">Name*</label>

                <input type="text" data-validation="alphanumeric" title="Name Should Only have alphabets" value="<?php echo $this->session->userdata("name");?>"  name="bname" class="name input--wd input--wd--full" required>

                <label class="lb">Contact*</label>

               	<input min="1" min="10" pattern="[0-9]{10}" title="10 digit contact number" maxlength="10" type="number" value="<?php echo $user_data->mobile; ?>" name="bcontact" class="mobile input--wd input--wd--full" required>
                <label class="lb">Landmark*</label>

                <input type="text" value="<?php echo $user_data->landmark; ?>" name="blandmark" class="mobile input--wd input--wd--full" required autocomplete="off">

                <label class="lb">Shipping Address*</label>

                <textarea rows="3" name="baddress" style="min-height:50px;" type="text" class="input--wd input--wd--full" required ><?php echo $user_data->address; ?></textarea>

                <label class="lb">Select state*</label>
                <?php  $this->db->distinct();
                  $this->db->select('state_name');
                  $dstate = $this->db->get('country_state_city')->result();
                  foreach ($dstate as $value) {
                    $newarr = $value->state_name;
                  }
                  //print_r($dstate); echo 'kk';
                  $this->db->where_in('id',"$newarr");
                   $states55 = $this->db->get('states')->result();
                  //echo $this->db->last_query(); ?>
                <select class="input--wd input--wd--full" name="bstate" id="bstate" required >

                	<option value="">Select</option>

                    <?php
                    //$states = $this->db->get('states')->result();

                        foreach ($states55 as $value) {
                          ?>
                           <option value="<?php echo $value->id; ?>" <?php if($value->id==$user_data->state){
                            echo "Selected";
                            } ?>><?php echo $value->name; ?></option>
                          <?php
                        }
                     ?>


                </select>
                <span id="city_select">
                  <?php
                  if(!empty($user_data->city))
                  {
                  //echo $user_data->city;
                    if(isset($user_data->city))
                  {
                    //$states = $this->db->get_where('cities',array('id'=>$user_data->city))->row()->name;
                     $user_cities = $this->db->get_where('cities',array('state_id'=>$user_data->state))->result();
                  }else{
                    $states ='';
                  }



                          ?>

                          <label class="lb">City*</label>
                           <select class="input--wd input--wd--full" name="bcity" required>
                          <option value="">Select</option>
                              <?php
                        foreach ($user_cities as $value) {
                          ?>
                           <option value="<?php echo $value->id; ?>" <?php if($value->id==$user_data->city){
                            echo "Selected";
                            } ?>><?php echo $value->name; ?></option>
                          <?php
                        }
                     ?>
                          </select>
                          <!--input  type="text" value="<?php echo $states; ?>" class="input--wd input--wd--full" name="bcity"  readonly>
                          <input type="hidden" id="city" value="<?php echo $user_data->city; ?>" name="bcity" required-->
                           <?php }

                     ?>
                   </span>

                <label class="lb">Pin Code* </label>

                <input type="number" min="1" pattern="[0-9]{6}" maxlength="6" title="6 digit contact number" value="<?php echo $user_data->pincode; ?>" name="bpin" class="pin input--wd input--wd--full" required>


                                           <input type="hidden" name="ip" value="<?php echo $this->input->ip_address(); ?>" >

                <label class="lb">Shipping Method* </label>



                                                  <?php $this->db->order_by("price","asc");
                                                 $shipping_methods =$this->db->get('shipping_methods')->result();

                                                 foreach ($shipping_methods as $value50) {
                                                    ?>
                                                <div class="row">

                                                <div class="col-md-12">
                                                    <label class="radio">
                                                    <input id="radio2" type="radio"  value="<?php echo $value50->id; ?>" name="ship" class="measure" required>
                                                    <span class="outer"><span class="inner"></span></span><?php echo $value50->reason." -
                &nbsp <i class='fa fa-inr'></i>".$value50->price; ?></label>

                                                </div>
                                                </div>
                                                <?php } ?>



                                                <?php
/*
echo '<br><i class="fa fa-refresh" aria-hidden="true"></i> &nbsp<span class="recaptcha">'.$cap['image'].'</span>';
echo '<input type="text" placeholder="captcha" class="captch input--wd" name="captcha" value="" required/>';*/
 ?>

                <div class="row">

                                <div class="col-md-3">



                                    <label class="radio">



<input id="radio2" type="radio"  value="COD" name="pay" class="measure" required />
<span class="outer"><span class="inner"></span></span>Cash On Delivery
</label>

                                </div>
                                <div class="col-md-3">
<label class="radio">
<input id="radio4" type="radio"  value="PAYU" name="pay" class="measure" />
<span class="outer"><span class="inner"></span></span>PayU Money</label>
</div>

</div>
<?php if(isset($_SESSION['msg']))
                           {
                            echo "<span class='alert alert-danger'>".$_SESSION['msg']."</span>";
                            } ?>
 <div id="RecaptchaField3"></div>


                <br/>

<button type="submit" name="submit" class="btn btn--wd text-uppercase wave placeorder">Place Order</button>

             <?php echo form_close();?>



            </div>

    </div>


          </div>

          <div class="col-sm-12 col-md-3 col-lg-3">

          </div>

        </div>



      </div>



    </section>
  <span id="capword" style="display:none"><?php echo $cap['word']; ?></span>
   <script src="<?php echo base_url();?>assets/js/custom.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>

<!--script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script-->
<script>
 var CaptchaCallback = function() {
          grecaptcha.render('RecaptchaField3', {'sitekey' : '6LdSFiAUAAAAADtjMA25J_jEd5B2SydreeahrSgn'});

        grecaptcha.render('RecaptchaField1', {'sitekey' : '6LdSFiAUAAAAADtjMA25J_jEd5B2SydreeahrSgn'});
        grecaptcha.render('RecaptchaField2', {'sitekey' : '6LdSFiAUAAAAADtjMA25J_jEd5B2SydreeahrSgn'});
    };
var k = jQuery.noConflict();
	k(document).ready(function(){
 //alert('k2');
 k(".fa-refresh").click(function(){
  // alert('k');
k.ajax({

  type: "POST",
  url: '<?php echo base_url();?>welcome/recaptcha',
  success: function(response){
   //console.log(response);

       var response_data = response.split('___');
       k('.recaptcha').html(response_data[0]);
       k('#capword').html(response_data[1]);
      },
      error: function(response){
      //   console.log(response);
      }

  });

});

k("#bstate").change(function() {
    var sid = k(this).val();
    k.ajax({
        type : "POST",
        url : "<?php echo base_url('index.php/welcome/selectstat_oncheckout');?>",
        data : {sid:sid},
        success: function(data){
      //alert(data);
          if(data){
          k("#city_select").html(data);
          }
      }
    });
});
/*k(".captch").keyup(function(){

      var id=k(this).val();
var word = k('#capword').html();
    //  console.log(word);

      if(id==word)
      {
          k('.placeorder').prop("disabled", false);
      }
          });*/

		k(".preadd").click(function(){
/*
			k("#newadd").hide();

			k(".preadd").hide();

			k(this).show();
      //alert('ok');

			k("#payshow").show();
*/
		});

		k("#another").click(function(e){e.preventDefault();

			k(".preadd").show();

			k("#payshow").hide();

			k("#newadd").show();

		});

		k("#newadd").click(function(){


		//	alert(k(this).text()==");

		k("#payshow").hide();

			if(k(this).text()=="Add New Address")

			{

				k(this).text("Choose Existing Address");

			}else{



				k(this).text("Add New Address");

			}
      k(".oldform").toggle();
			k(".preadd").toggle();

			k("#address").slideToggle();

		});

		k(".oldadd").click(function(e){e.preventDefault();

      var id=k(this).attr("href");
      var data=k(this).attr("id");
      var data2 = data.split('_');//alert(data2);
      k("#oid").val(id);
 console.log(id);
 k(".preadd").hide();
 k(".oldform").toggle();
 //k(".preadd").toggle();

 k("#address").slideToggle();
k("#name").val(data2[0]);
k("#mobile").val(data2[1]);
k("#baddress").val(data2[2]);
k("#pin").val(data2[3]);
k("#city").val(data2[4]);

    });
        k("#delete_shipping").click(function(e){e.preventDefault();

      var sid=k(this).attr("href");
      
 console.log(sid);
k.ajax({
        type : "POST",
        url : "<?php echo base_url('index.php/welcome/delete_shipping_add');?>",
        data : {sid:sid},
        success: function(data){
      //alert(data);
         
      },error: function(data){
        console.log(data);
      }
    });

    });

    /*



    $(".oldadd").click(function(e){e.preventDefault();

			var id=$(this).attr("href");

			$("#oid").val(id);



		});*/

	});

</script>

  </div>
<script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script>
