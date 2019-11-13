<?php /*error_reporting(0);
            ini_set('display_errors', 0); */ ?>
<style>
.radio{
  display: inline-block;
}
.progress{
  margin-top: 0px;
  margin-bottom: 50px;
    height: 15px;
    padding-left: 0px;
}


.btn-black{
  padding: 5px 45px !important;
  background-color: #000 !important;
  color: #fff !important;

}

@media (max-width: 769px){
  .btn-lg{
    margin:20px;
  }
  .progress{
    margin: 20px 0px !important;
  }
}

.modal-header, .modal-footer {
    background-color: #fff;
    color: #000 !important;
  }
  .ma-btm{
    margin-bottom: 50px;
  }

.icc{
  font-size: 28px;

}

.tabwidth{
  width: 180px;
  text-align: center;
}

.text{
  color:#5cb85c;
  padding: 2%;
}
.text_not{
  color:#FF6600;
  padding: 2%;
}
.simple_text{
  color:#666;
}

.zoomLens
{
  position:absolute !important;
  height:72px !important;
  width:72px !important;
}
.tab-content--wd > .tab-pane
{
  background-color: #fff;
    border: none;
}
.sizes-example1 {
  width: 100%;
  height: 350px;
  padding-right: 25px;

}

.sizes-example {
  float: none !important;

  margin-left: 1%;
}


@media only screen and (max-width: 500px) {
.sizes-example1 {
  width: 200px !important;
  height:300px !important;

}
.product-preview-wrapper
{
  width:100% !important;
}
.tabwidth{
  width: 100% !important;
  text-align: center;
}
}
@media only screen and (max-device-width: 1023px) and (min-device-width: 768px){
.sizes-example1 {
    height: 200px !important;
}
}
@media only screen and (max-device-width: 1350px) and (min-device-width: 1024px){
.sizes-example1 {
    height: 275px !important;
}}
</style>

 <!-- CSS -->

    <!-- Bootstrap & FontAwesome & Entypo CSS -->

    <link href="<?php echo base_url(); ?>adminassets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
   

    <!-- Fonts CSS -->
    <link href="<?php echo base_url(); ?>adminassets/css/fonts.css"  rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>adminassets/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">


    <link href="<?php echo base_url();?>adminassets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">

  <!-- Specific CSS -->


    <!-- Theme CSS -->

    <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
    <link href="<?php echo base_url();?>adminassets/css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->



    <!-- Responsive CSS -->
          <link href="<?php echo base_url();?>adminassets/css/theme-responsive.min.css" rel="stylesheet" type="text/css">

    <!-- for specific page in style css -->

    <!-- for specific page responsive in style css -->


    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>adminassets/custom/custom.css" rel="stylesheet" type="text/css">



    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/mobile-detect.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/mobile-detect-modernizr.js"></script>

    <section class="breadcrumbs breadcrumbs-boxed">
      <div class="container">

        <ol class="breadcrumb breadcrumb--wd pull-left">

          <li><a href="#">Home</a></li>

          <li class="active">My Account</li>

        </ol>

      </div>
    </section>


    <section class="content" >

    </section>

    <section class="content content--fill">

      <div class="container">

        <!-- Nav tabs -->
        <?php  if($this->session->flashdata('item')){   $clss = "active";}else{  $clss = "";}?>

        <ul class="nav nav-tabs nav-tabs--wd" role="tablist">

             <li  class="tabwidth active <?php  echo  $clss;?>" <?php  if(!$this->session->flashdata('item')){ ?>  class="active" <?php } ?> ><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase">Personal Info</a></li>


          <li class="tabwidth" ><a href="#Tab1" aria-controls="home" role="tab" data-toggle="tab" class="text-uppercase">Security</a></li>



          <li class="tabwidth"><a href="#Tab5" role="tab" data-toggle="tab" class="text-uppercase">Social Accounts</a></li>

           <li class="tabwidth" style="padding-bottom: 20px;"><a href="#Tab6" role="tab" data-toggle="tab" class="text-uppercase">Wishlist</a></li>

        </ul>

        <!-- Tab panes -->

        <div class="tab-content tab-content--wd">



          <div role="tabpanel" class="tab-pane <?php  echo $clss;?> <?php  if(!$this->session->flashdata('item')){ ?>active<?php } ?>" id="Tab2">

<!--          <div    class="col-md-3">
              <div class="testimonial__author">
                <div class="testimonial__author__image">
                <a href="#">
                <?php if($profile_data->profile_image==''){ ?>

                    <img src="<?php echo base_url(); ?>assets/images/default-user-image.png" alt="" style="width: 50%;">
                <?php }else{?>
                  <img src="<?php echo base_url(); ?>assets/images/<?php echo $profile_data->profile_image;?>" alt="" style="width: 50%;">
                  <?php }?>
                </a>
                </div>
                <div class="testimonial__author__name text-uppercase">
                <?php echo form_open_multipart("welcome/update_profile_image",array('class'=>"contact-form"));?>
                  <input type="file" name="profile_image" value="" class="input--wd input--wd--full" required="">
                  <button type="submit" class="btn btn--wd5 text-uppercase wave" id="submit_id" name="submit">Change Image </button>
                <?php echo form_close();?>
                </div>
              </div>
          </div>-->

      <div class="col-md-3 col-sm-12 centered-sm">
              <div class="testimonial__author">
                <div class="testimonial__author__image">
                <a href="#">
                <?php if($profile_data->profile_image==''){ ?>

                    <img src="<?php echo base_url(); ?>assets/images/default-user-image.png" alt="" style="width: 50%;" id="blah">
                <?php }else{
                 if($profile_data->login_with=='google' || $profile_data->login_with=='facebook'){ ?>
                  <img src="<?php echo $profile_data->profile_image;?>" alt="" style="width: 50%;" id="blah">
                  <?php } else { ?>
                   <img src="<?php echo base_url(); ?>assets/images/<?php echo $profile_data->profile_image;?>" alt="" style="width: 50%;" id="blah">
                   <?php }} ?>
                </a>
                </div>
                <div class="testimonial__author__name text-uppercase">
                <?php echo form_open_multipart("welcome/update_profile_image",array('class'=>"contact-form"));?>
                <label for="imgInp" class="custom-file-upload">
    Choose File
</label>
<input id="file-upload" type="file"/>

          <input type="file" name="profile_image"  class="input--wd input--wd--full"  id="imgInp" >
                   <button type="submit" class="btn btn--wd5 text-uppercase wave btn-black" id="submit_id" name="submit">Set Photo</button>
                <?php echo form_close();?>
                </div>

              </div>
          </div>
<style >
input[type="file"] {
  display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>


          <div  class="col-md-8">
            <?php if($this->session->flashdata('msg_pass')){?>
              <div class="alert alert-success">
                <?php echo $this->session->flashdata('msg_pass')?>
            </div>
            <?php } ?>

            <?php echo form_open("welcome/update_profile",array('class'=>"contact-form"));?>

                 <h4 class="text-uppercase text-left"><i class="fa fa-user-plus" ></i> &nbsp;<strong>Manage Profile</strong></h4><br />


                 <label class="lb">Full Name</label>

                <input type="text" name="name"  data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" value="<?php echo $profile_data->name; ?>" class="input--wd input--wd--full" required="">
                 <input type="hidden" name="id" value="<?php echo $id; ?>" >

                   <label class="lb">Mobile Number</label>

                  <input type="text" value="<?php echo $profile_data->mobile; ?>" pattern="[0-9]{10}" title="10 digit contact number" maxlength="10" name="contact" class="input--wd input--wd--full" required="">
                  <div><label class="lb">Gender&nbsp&nbsp&nbsp&nbsp</label>
          
                           <!--  <label for="Online" class="radio">
                            <input id="Online" type="radio" name="area" value="Online" required="">
                            <span class="outer"><span class="inner"></span></span>Online</label> -->
                         
                  <label class="radio radio-inline"><input type="radio" name="gender" required="" <?php if($profile_data->gender=='m'){echo "checked"; } ?> value="m"><span class="outer"><span class="inner"></span></span>Male</label>
                  <label class="radio radio-inline"><input type="radio" name="gender" required="" <?php if($profile_data->gender=='f'){echo "checked"; } ?> value="f"><span class="outer"><span class="inner"></span></span>Female</label>
                  <br></div><br>

                 <label class="lb">DOB</label>

                <input type="date" value="<?php echo $profile_data->dob; ?>" name="dob" class="input--wd input--wd--full" required="">

                 <label class="lb">Address</label>

                <textarea name="address" class="input--wd input--wd--full" required=""><?php echo $profile_data->address; ?></textarea>
                 <label class="lb">Landmark</label>

                <input type="text" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9 ]+)$" value="<?php echo $profile_data->landmark; ?>" name="landmark" class="input--wd input--wd--full" required="">




                            <select id="country_id" name="country" class="input--wd input--wd--full" required>
                            <option value="">Select Country</option>
                            <?php $countries=$this->db->get("countries")->result();
                              foreach($countries as $countries){?>
                              <option value="<?php echo $countries->id;?>" <?php  if($profile_data->country==$countries->id){echo 'selected';} ?>><?php echo $countries->name;?></option>
                              <?php }?>
                           </select>

                    <span id="append_state">
                      <?php $city = $this->db->get_where('states',array('id'=>$profile_data->state))->row();
                     // echo $this->db->last_query(); ?>
                      <input type="text" value="<?php echo $city->name; ?>" class="input--wd input--wd--full" disabled="">
                       <input type="hidden" name="state" value="<?php echo $profile_data->state; ?>" >
                    </span>
                    <span id="append_city">
                      <?php $city = $this->db->get_where('cities',array('id'=>$profile_data->city))->row(); ?>
                      
                      <input type="text" value="<?php echo $city->name; ?>" class="input--wd input--wd--full" disabled="">
                      <input type="hidden" name="city" value="<?php echo $profile_data->city; ?>" >
                    </span>




<br>


<div class="">

          <label class="lb">Pincode</label>



                <input type="text" pattern="[0-9]{6}" title="6 digit contact number" maxlength="6" value="<?php echo $profile_data->pincode; ?>" name="pincode" class="input--wd input--wd--full" required="">
  </div>                    <label class="lb">Email Id</label>

                <input type="email" name="email" value="<?php echo $profile_data->email; ?>" id="email" class="input--wd input--wd--full" required="" disabled>
                <br/>



                <button type="submit" class="btn btn--wd5 text-uppercase wave btn-black" id="signup" name="signup">Update Profile</button>



              <?php echo form_close();  ?>


</div>


          </div>





          <div role="tabpanel" class="tab-pane" id="Tab1">

    <div class="row">
              <div class="col-md-12">
                <div class="">

                <?php $bar = 0; if(isset($profile_data->r_email) && !empty($profile_data->r_email)){
                  $bar+=25;
                }
               if(isset($profile_data->r_contact) && !empty($profile_data->r_contact)){
                  $bar+=25;
                }
                if(isset($profile_data->password) && !empty($profile_data->password)){
                   $bar+=25;
                 }
                 if(!empty($profile_data->question1) && !empty($profile_data->question2) && !empty($profile_data->question3) && !empty($profile_data->question4) && !empty($profile_data->question5)){
                    $bar+=25;
                  }
                  //echo $bar;?>
                  <div class="col-md-3">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-lock"></i> </span> Security Check-up  <span class="alert alert-success"><?php echo $bar.'%' ?></span></h3>
                  </div>
                </div>
                    <div class=" col-md-9 progress" style="padding-right:0px">
   <div class="progress-bar" role="progressbar" style="width: <?php echo
   $bar ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>

                   <br> <br>
                 <div class="col-md-12 ma-btm">
                 <div class="col-md-1 col-sm-12 col-xs-12" align="center">
                  <i class="fa-2x fa fa-unlock-alt"> </i>
                  </div>
                 <div class="col-md-9 col-sm-12 col-xs-12 centered-sm">
                    <h4> Password </h4>
                    <p> Set a strong password to keep your account secure </p>
                  </div>

                     <div class="col-md-2 col-sm-12 col-xs-12 center" align="center">
                      <button type="button" class="btn btn-lg btn-black" data-toggle="modal" data-target="#password">Change</button>
                     </div>
                    </div>

                         <br> <br>

                     <div class="col-md-12 ma-btm">
                 <div class="col-md-1 col-sm-12 col-xs-12" align="center">
                  <i class="fa-2x fa fa-envelope-o"> </i>
                  </div>
                 <div class="col-md-9 col-sm-12 col-xs-12 centered-sm">
                    <h4>Recovery E-Mail </h4>
                    <p> Use this email address to sign-in , reset your password or change security settings </p>
                  </div>

                     <div class="col-md-2 col-sm-12 col-xs-12" align="center">
                      <button type="button" class="btn btn-lg btn-black" data-toggle="modal" data-target="#recovery-email">Change</button>
                     </div>
                    </div>

                    <div class="col-md-12 ma-btm">
                 <div class="col-md-1 col-sm-12 col-xs-12" align="center">
                  <i class="fa-2x fa fa-mobile"> </i>
                  </div>
                 <div class="col-md-9 col-sm-12 col-xs-12 centered-sm">
                    <h4> Recovery Phone </h4>
                    <p> Set your recovery phone number </p>
                  </div>

                     <div class="col-md-2 col-sm-12 col-xs-12" align="center">
                      <button type="button" class="btn btn-lg btn-black" data-toggle="modal" data-target="#verify-phone">Change</button>
                     </div>
                    </div>



                    <div class="col-md-12 ma-btm">
                 <div class="col-md-1 col-sm-12 col-xs-12" align="center">
                  <i class="fa-2x fa fa-question"> </i>
                  </div>
                 <div class="col-md-9 col-sm-12 col-xs-12 centered-sm">
                    <h4>Security qusetions </h4>
                    <p> Use this email address to sign-in , reset your password or change security settings </p>
                  </div>

                     <div class="col-md-2 col-sm-12 col-xs-12" align="center">
                      <button type="button" class="btn btn-lg btn-black" data-toggle="modal" data-target="#security">Change</button>
                     </div>
                    </div>




                </div>
                <!-- Panel Widget -->
              </div>
              <!-- col-md-12 -->
            </div>

          </div>



 <div class="modal fade" id="password"  role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <div class="modal-body">

                 <h4 class="text-uppercase text-left"><i class="fa fa-user-plus" ></i> &nbsp;<strong>Manage Password</strong></h4><br />

<?php $id=$this->session->userdata("userid");?>
                 <label class="lb">Old Password</label>

                <input type="password" name="old"  id = "old" class="input--wd input--wd--full old"  required="required">
                <label class="lb">New Password</label>

                <input type="password" name="new" class="input--wd input--wd--full new"  id="new" required="required">
                <label class="lb">Confirm Password</label>

                <input type="password" name="new2" class="input--wd input--wd--full new2" id="cnf" required="required">
                <input type="hidden" name="id" value="<?php echo $id; ?>" >
                <div id="error2"></div>

                <?php if($this->session->flashdata('message')){?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('message')?>
  </div>
<?php } ?>
                <button type="submit" class="btn btn--wd2 text-uppercase wave signup" id="signup" name="signup" disabled="disabled" >Update </button>
                  <span class="successtextpass" style="display: flex;
    margin-top: 3%;"></span>


                <script>
                    $(document).on('change','#country_id',function(){
                       var sub_id = $(this).val();
                      // alert(sub_id);
                      $.ajax({
                          type : "POST",
                          url : "<?php echo base_url();?>index.php/welcome/ajax_state",
                          data : {sub_id:sub_id},
                          success: function(data){
                           //alert(data);
                            console.log(data);
                            $("#append_state").html(data);
                        },
                        error: function(data){
                          console.log(data);
                        }
                      });
                  });
              </script>
              <script>
                    $(document).on('change','#state_id',function(){
                       var city_id = $(this).val();
                      $.ajax({
                          type : "POST",
                          url : "<?php echo base_url();?>index.php/welcome/ajax_city",
                          data : {city_id:city_id},
                          success: function(data){
                           //alert(data);
                            if(data)
                            $("#append_city").html(data);
                        }
                      });
                  });
              </script>

                 <script type="text/javascript">
$(document).ready(function(){
$( ".signup" ).click(function() {
var old = $(".old").val();
var new1 = $(".new").val();
var new2 = $(".new2").val();
$.ajax({
   url:'<?php echo base_url();?>index.php/welcome/change_pass2',
   type: 'POST',
   data: {'old':old,'new1':new1,'new2':new2},
   success: function(respond){
      // $(".next").click();
    //  alert(respond.length);
       if(respond.length>4)
       {
         //$('.otp_contact').show();
        // $("#verify_phone").hide();
        // $("#verify_otp").show();
         $(".successtextpass").addClass('alert');
         $(".successtextpass").addClass('alert-success');
         $(".successtextpass").html(respond);
         $("#error2").html();
          //alert("Activation Code sent to your phone.Click On Next..");
       }
       else
       {
         alert("Please Try Again.");
       }
   },
   error: function(){
   alert("Fail");
   }
});
});
$( ".new" ).keyup(function() {
var pass = $(this).val();
var old = $(".old").val();
var pass2 = $(".new2").val();

        if(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/.test(pass)) {
           $("#error2").html("<span style='color:green'>Strong</span>");
        }else if (/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(pass)) {
            $("#error2").html("<span style='color:green'>Ok</span>");
        }
        else {
            $("#error2").html("<span style='color:orange'>Week</span>");
        }
         if(pass!='' && pass2!='' && old!='' && pass==pass2 && (/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(pass) || /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/.test(pass))) {
            console.log('done');
          $(".signup").removeAttr("disabled");
        }
        else {
            //$(".signup").prop("disabled", true);
        }
});
$( ".new2" ).keyup(function() {
var pass2 = $(this).val();
var pass = $(".new").val();
var old = $(".old").val();
        if(pass==pass2) {
           $("#error2").html("<span style='color:green'>Password Matched</span>");
        }
        else {
            $("#error2").html("<span style='color:orange'>Password Does Not Matched</span>");
        }
         if(pass!='' && pass2!='' && old!='' && pass==pass2 && (/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(pass) || /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/.test(pass))) {
            console.log('done');
          $(".signup").removeAttr("disabled");
        }
        else {
            $(".signup").prop("disabled", true);
        }
});
$( ".old" ).keyup(function() {
var pass2 = $(".new2").val();
var pass = $(".new").val();
var old = $(this).val();
        if(pass!='' && pass2!='' && old!='' && pass==pass2 && (/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(pass) || /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/.test(pass))) {
            console.log('done');
          $(".signup").removeAttr("disabled");
        }
        else {
            $(".signup").prop("disabled", true);
        }
});
});
                </script>

           <?php echo form_close(); ?>
      </div>
      <!--div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div-->
    </div>
  </div>
</div>



<div class="modal fade" id="recovery-email"  role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <div class="modal-body">

                <?php
                              // echo form_open('welcome/send_mail');
                               echo form_open("",array('class'=>"contact-form",'id'=>"email_verify"));
                               /*if($profile_data->email_verified=='yes') { echo 'Your Email Id is Verified successfully.';}else{echo "Your Email Id is Not Verified.Please Verify Your Email Id.";}*/
                          ?>
                            <div class="form-group">
                              <label class="lb">Email Id</label>
                              <input type="email" name="email" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9.!@#$%^&*(){}=+ ]+)$" value="<?php echo $profile_data->r_email; ?>" id="email" class="input--wd input--wd--full" required="">
                            </div>
                            <?php if($this->session->flashdata('email_sent')){?>
                            <div class="alert alert-success">
                              <?php echo $this->session->flashdata('email_sent')?>
                            </div>
                          <?php } ?>
                          <span class="successtextemail"></span>
                            <button type="submit" class="btn btn--wd5 text-uppercase wave" id="verify" name="verify_email">Submit</button>
                            <?php echo form_close(); ?>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="verify-phone"  role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

     <div class="modal-body">
                          <?php
                               //echo form_open('welcome/send_otp_number');
                               echo form_open("",array('class'=>"contact-form",'id'=>"verify_number"));

                            /*   if($profile_data->mobile_verified=='yes') { echo 'Your Mobile Number is Verified successfully.<br>';}else{echo "Your Mobile Number is Not Verified.Please Verify Your mobile number.<br>";}*/
                          ?>
                          <br>
                          <!-- <div class="row">
                            <div class="form-group">
                              <label class="col-sm-4 col-md-4 control-label">Select Country </label>
                              <div class="col-sm-8 col-md-8 controls">
                              <select class="width-11  country_code input-border-bottom form-control">
                                <?php $code=$this->db->get("country_code")->result();
                                foreach($code as $code)
                                  {
                                    ?>

                                  <option value="91"><?php echo $code->phonecode;?>  <?php echo $code->name;?></option>

                                <?php } ?>
                                </select>
                              </div>
                            </div>
                          </div> -->
                            <div class="row">
                            <div class="form-group">

                              <label class="col-sm-4 col-md-4 control-label">Enter Phone</label>
                              <div class="col-sm-8 col-md-8 controls">


                                <input type="text" data-validation="custom" data-validation-regexp="^([0-9 ]+)$" maxlength="10" minlength="10" class="width-30  input-border-btm form-control" name="contact" placeholder="Enter Mobile Number" value="<?php echo $profile_data->r_contact; ?>" required="" >
                                <br>
                                <span class="successtext"></span><!--input type="text" class="width-30  input-border-btm form-control otp_contact" name="otp_contact" placeholder="OTP" value=""!-->
                              </div>
                            </div>
                          </div>
                            <!--button  class="btn btn--wd5 text-uppercase wave" id="verify_phone" style="float:right">Verify Number</button-->
                            <button class="btn btn--wd5 text-uppercase wave" id="verify_phone" style="float:right">Submit</button>
                            <?php echo form_close(); ?>

                          </div>
                          <br>


    </div>
  </div>
</div>


<div class="modal fade" id="security"  role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      <div class="modal-body">

                 <?php echo form_open("",array("class"=>"form-horizontal","id"=>"ques"));?>
                            <div class="form-group">
                            <div class="col-md-12">
                              <label >  In what city were you born?</label>
                              <input type="text" class="form-control" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" name="question1" value="<?php echo $profile_data->question1; ?>" id="question1" required="">
                              </div>
                              <div class="col-sm-12 controls">
                                <div class="control-value">  What is the name of your high school name? </div>
                                <input type="text" class="form-control" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" name="question2" value="<?php echo $profile_data->question2; ?>" id="question2" required="">
                              </div>

                              <div class="col-sm-12 controls">
                                <div class="control-value">  What is your favorite color?</div>
                                <input type="text" class="form-control" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" name="question3" value="<?php echo $profile_data->question3; ?>" id="question3" required="">
                              </div>

                              <div class="col-sm-12 controls">
                                <div class="control-value">What is your nickname?</div>
                                <input type="text" class="form-control" name="question4" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" value="<?php echo $profile_data->question4; ?>"  id="question4" required="">
                              </div>

                              <div class="col-sm-12 controls">
                                <div class="control-value"> What is your favorite food?</div>
                                <input type="text" class="form-control" name="question5" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" value="<?php echo $profile_data->question5; ?>" id="question5" required="">
                              </div>
                              <br><br><br>
                              <span class="successqus"></span>
                              <div class="col-sm-12 controls">

                                <input type="submit" class="btn btn-success" name="submit" id="ques_button" required="" style="margin-top:20px;">
                              </div>
                              <?php echo form_close();?>
                          </div>
      </div>

    </div>
  </div>
</div>





          <div role="tabpanel" class="tab-pane" id="Tab5" >


<?php $wish = $this->db->get_where('users',array('uid'=>$this->session->userdata("userid")))->row();
$social = $wish->login_with; ?>
<div style="float:left;width: 100%;">
<div style="float:left;padding: 2%">
<div><img  src="<?php echo base_url() ?>assets/fb.jpg" width="76"  alt="Not reviewed"></div>

<div>
      <?php if($social=='facebook'){ ?><div class="text"><span class="simple_text">Connected</span></div>
      <?php }else{ ?><div class="text_not"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>
 <span class="simple_text">Connect</span></div>
      <?php } ?>

</div>
</div>

<div style="float:left;padding: 2%">
<div><img  src="<?php echo base_url() ?>assets/google.jpg" width="76"  alt="Not reviewed"></div>

<div>
      <?php if($social=='google'){ ?><div class="text"><span class="simple_text">Connected</span></div>
      <?php }else{ ?><div class="text_not"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>
 <span class="simple_text">Connect</div>
      <?php } ?>

</div>
</div>
  </div>


          </div>
          <div role="tabpanel" class="tab-pane" id="Tab6">


<section class="content content--fill content-fill-3d " style="padding-top: 20px !important;">

    <div class="">

       <div class="col-md-12"> <h2 class="text-center text-uppercase" style=" padding-bottom:15px;
    margin-bottom: 10px;
">Wishlist</h2> </div>
<?php $wish = $this->db->get_where('wishlist',array('user_id'=>$this->session->userdata("userid")))->result();
   foreach ($wish as $value) {
        if($value->type=='fabric'){
          $wish_fab = $this->db->get_where('fabric',array('id'=>$value->p_id))->row();
          if(isset($wish_fab->id) && !empty($wish_fab->id)){
          $wish_data['id']= $wish_fab->id;
          $wish_data['image']= 'fabrics/'.$wish_fab->thumb;
          $wish_data['title']= $wish_fab->title;
          $wish_data['price']= $wish_fab->price;
          $wish_data['type']= '';
          }
          }
          else if($value->type=='accessories'){
            //echo "kkkk".$value->p_id;
          $wish_fab = $this->db->get_where('accessories',array('acc_id'=>$value->p_id))->row();
          $wish_data['id']= $wish_fab->acc_id;
          $wish_data['image']= 'accessories/'.$wish_fab->thumb;
          $wish_data['title']= $wish_fab->brand;
          $wish_data['price']= $wish_fab->price;
          $wish_data['type']= '_accessories';
          }
          else if($value->type=='online'){
           // echo "in yes".$value->p_id;
          $wish_fab = $this->db->get_where('online_boutique',array('id'=>$value->p_id))->row();
          $wish_data['id']= $wish_fab->id;
          $wish_data['image']= 'online_boutique/'.$wish_fab->thumb;
          $wish_data['title']= $wish_fab->brand;
          $wish_data['price']= $wish_fab->price;
          $wish_data['type']= '_boutique';
          }
           else if($value->type=='uniform'){
            //echo "in ydsfsdfdfdses".$value->p_id;
          $wish_fab = $this->db->get_where('uniform',array('uniform_id'=>$value->p_id))->row();
          $wish_data['id']= $wish_fab->uniform_id;
          $wish_data['image']= 'uniform/'.$wish_fab->uniform_image;
          $wish_data['title']= $wish_fab->school_name;
          $wish_data['price']= $wish_fab->price;
          $wish_data['type']= '_uniform';
          }


          if(!empty($wish_fab)){
            ?>
            <div class="col-md-3 col-sm-3">
            <div class="product-preview-wrapper wish<?php echo $value->id; ?>" align="center">

                    <div class="product-preview">

                      <div class="product-preview__image">
 <div class="sizes-example sizes-example1">

                <img src="<?php echo base_url(); ?>assets/images/<?php echo $wish_data['image']; ?>" alt=""></a>

</div>
                      </div>
                      <div class="product-preview__info text-center">
                        <div class="product-preview__info__title">
                          <h2><a href="#"><?php echo substr($wish_data['title'], 0,15);
                          if(strlen($wish_data['title'])>15){echo '...';}?>

                          </a></h2>
                        </div>
                        <div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>
  <div class="price-box "><span class="price-box__new">&#8358; <?php echo $wish_data['price']; ?></span> </div>
  <div class="overlay2 btn btn-default" id="<?php echo $value->id; ?>">Remove</div><div id="caddtocart<?php echo $wish_data['id'];?>" class=" btn btn-default" href="<?php echo $wish_data['type']; ?>" ><i class="fa fa-shopping-cart"></i>Add To Cart</div>
                      </div>

                    </div>
       </div>
                  </div>
                  <form action="" method="post" id="bundle<?php echo $wish_data['id'];?>">
              <input type="hidden" name="fabric" value="<?php echo $wish_data['id'];?>" />
              <input type="hidden" name="qty" value="1" />
              </form>
              <script type="text/javascript">

                  //alert(jq);
                  $(document).ready(function(){
                $("#caddtocart<?php echo $wish_data['id']; ?>").click(function(){
              //alert('clicked');

        var formdata=$("#bundle<?php echo $wish_data['id']; ?>").serialize();

          $(this).text("Added");

          $(this).attr("disabled","disabled");


          $.ajax({

             type: "POST",

             url: '<?php echo base_url();?>index.php/Welcome/addtocart<?php echo $wish_data['type']; ?>',

             data: {"formdata":formdata},

             success: function(response){

              //alert(response);

               $("#caddtocart").removeAttr('disabled');

              $("#caddtocart").text('Added');

               $("#mycart").html(response);

               }

             });

      });
});
              </script>
            <?php
            }  ?>





<?php }?>
    </div>

</section>



          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container">

        <!-- Modal -->

        <!-- /.modal -->


      </div>

    </section>

    <!-- End Content section -->

  </div>




<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/bootstrap.min.js"></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/jquery-ui/jquery-ui.custom.min.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/caroufredsel.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/plugins.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/breakpoints/breakpoints.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/pnotify/js/jquery.pnotify.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/theme.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/custom/custom.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<!-- Specific Page Scripts Put Here -->

<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.dropdown').click(function(){
     $(this).toggleClass('open');
   });
  //alert('kk');
  //console.log('kkk');


                      $(".overlay2").click(function(){
                        var id = $(this).attr('id');
                        //alert(id);
                        //alert(id[0]+"-----"+id[1]);
                        $.ajax({
                         type: "POST",
                         url: '<?php echo base_url();?>index.php/Welcome/wishlist_cancel',
                        data: {'id':id},
                         success: function(response){

                         //alert(response);

                         $(".wish" + id).parent().css('display','none');
                        }
                      });
                    });
                    });
                        </script>

<script>   //no need to specify the language
 $(function(){
  $("#verify").click(function(e){
    if($(".form-error").html()=='' || $(".form-error").html()==undefined){
    $.ajax({
       url:'<?php echo base_url();?>index.php/welcome/change_r_mail',
       type: 'POST',
       data: $("#email_verify").serialize(),
       success: function(respond){
        console.log(respond);
          // $(".next").click();
           if(respond.length>4)
           {
             $(".successtextemail").addClass('alert');
             $(".successtextemail").addClass('alert-success');
             $(".successtextemail").html("Your Recovery Email changed successfully.");
           }
           else
           {
             alert("Please Try Again.");
           }
       },
       error: function(){
       alert("Fail");
       }
   });
   e.preventDefault(); // could also use: return false;
 }
 });
});
</script>


<script>   //no need to specify the language
 $(function(){
   ////$('.otp_contact').hide();
  // $("#verify_otp").hide();
  $("#verify_phone").click(function(e){
    if($(".form-error").html()=='' || $(".form-error").html()==undefined){

    $.ajax({
       url:'<?php echo base_url();?>index.php/welcome/change_r_contact',
       type: 'POST',
       data: $("#verify_number").serialize(),
       success: function(respond){
          // $(".next").click();
        //  alert(respond.length);
           if(respond.length>4)
           {
             //$('.otp_contact').show();
            // $("#verify_phone").hide();
            // $("#verify_otp").show();
             $(".successtext").addClass('alert');
             $(".successtext").addClass('alert-success');
             $(".successtext").html("Your Recovery Mobile number changed successfully.");
              //alert("Activation Code sent to your phone.Click On Next..");
           }
           else
           {
             alert("Please Try Again.");
           }
       },
       error: function(){
       alert("Fail");
       }
   });
   e.preventDefault(); // could also use: return false;
 }
 });
});
</script>

<script>   //no need to specify the language
 $(function(){
  $("#verify_otp").click(function(e){
    $.ajax({
       url:'<?php echo base_url();?>index.php/welcome/verify_otp',
       type: 'POST',
       data: $("#verify_number").serialize(),
       success: function(respond){
          // $(".next").click();
           if(respond.length>4)
           {
              //alert("OTP code verify successfully.Click On Next...");
              $(this).hide();
              $("#verify_number").hide();
              $(".successtext").addClass('alert');
              $(".successtext").addClass('alert-success');
              $(".successtext").html("Your Mobile number verified successfully.");
           }
           else
           {
             alert("OTP Code Wrong.");
           }
       },
       error: function(){
       alert("Fail");
       }
   });
   e.preventDefault(); // could also use: return false;
 });
});
</script>


<script>   //no need to specify the language
 $(function(){
  $("#ques").submit(function(e){
    //alert('k');
e.preventDefault();
//alert($(".form-error").html());
if($(".form-error").html()=='' || $(".form-error").html()==undefined){
  var aa=$('#question1').val();
    var bb=$('#question2').val();
    var cc=$('#question3').val();
    var hh=$('#question4').val();
    var gg=$('#question5').val();
    if(aa=="" || bb=="" || cc=="" || hh=="" || gg=="")
    {
      $('.successqus').addClass('alert');
      $('.successqus').addClass('alert-danger');
      $('.successqus').html('All question compulsory.');
      //alert('All question compulsory.1');
      return false;
    }
    $.ajax({
       url:'<?php echo base_url();?>index.php/welcome/insert_question',
       type: 'POST',
       data: $("#ques").serialize(),
       success: function(respond){
          // $(".next").click();
          console.log(respond.length);
           if(respond.length<8)
           {
             $('.successqus').addClass('alert');
             $('.successqus').addClass('alert-success');
             $('.successqus').html('All Question Inserted successfully...');
             //alert("All Question Inserted successfully...");
              //window.location.href = "<?php echo base_url();?>";
           }
           else
           {
             $('.successqus').addClass('alert');
             $('.successqus').addClass('alert-danger');
             $('.successqus').html('Something is Wrong.');
           }
       },
       error: function(){
       alert("Fail");
       }
   });
   //e.preventDefault(); // could also use: return false;
 }
});
});
</script>




<script type="text/javascript">
$(document).ready(function() {
  "use strict";

      $('#wizard-1').bootstrapWizard({
    'tabClass': 'nav nav-pills nav-justified',
    'nextSelector': '.wizard .next',
    'previousSelector': '.wizard .prev',
    'onTabShow' : function(){
      $('#wizard-1 .finish').hide();
      $('#wizard-1 .next').show();
      if ($('#wizard-1 .nav li:last-child').hasClass('active')){
      $('#wizard-1 .next').hide();
      $('#wizard-1 .finish').show();
      }
    },
    'onNext': function(){
      scrollTo('#wizard-1',-100);
    },
    'onPrevious': function(){
      scrollTo('#wizard-1',-100);
    }
    });


  $("#nextbut").click(function(e){
    var oldpass = $("#old").val();
    var newpass = $("#new").val();
    var cnfpass = $("#cnf").val();

      if(oldpass == "")
      {
        alert("Enter Old Password");
        return false();
      }
      if(newpass == "")
      {
        alert("Enter New Password");
        return false();
      }
      if(cnfpass == "")
      {
        alert("Enter Confirm Password");
        return false();
      }
  });



      $('#wizard-2').bootstrapWizard({
      'tabClass': 'nav nav-pills nav-justified',
      'nextSelector': '.wizard .next',
      'previousSelector': '.wizard .prev',
      'onTabShow' :  function(tab, navigation, index){
        $('#wizard-2 .finish').hide();
        $('#wizard-2 .next').show();
        if ($('#wizard-2 .nav li:last-child').hasClass('active')){
        $('#wizard-2 .next').hide();
        $('#wizard-2 .finish').show();
        }
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;
        $('#wizard-2').find('.progress-bar').css({width:$percent+'%'});
      },
      'onTabClick': function(tab, navigation, index) {
        return false;
      },
      'onNext': function(){
        scrollTo('#wizard-2',-100);
      },
      'onPrevious': function(){
        scrollTo('#wizard-2',-100);
      }
      });


  $('#wizard-3').bootstrapWizard({
    'tabClass': 'nav nav-pills nav-justified',
    'nextSelector': '.wizard .next',
    'previousSelector': '.wizard .prev',
    'onTabShow' : function(){
      $('#wizard-3 .finish').hide();
      $('#wizard-3 .next').show();
      if ($('#wizard-3 .nav li:last-child').hasClass('active')){
        $('#wizard-3 .next').hide();
        $('#wizard-3 .finish').show();
      }
    },
    'onNext': function(){
      scrollTo('#wizard-3',-100);
    },
    'onPrevious': function(){
      scrollTo('#wizard-3',-100);
    }
  });
  $('#wizard-4').bootstrapWizard({
    'tabClass': 'nav nav-tabs nav-stacked',
    'nextSelector': '.wizard .next',
    'previousSelector': '.wizard .prev',
    'onTabShow' : function(){
      $('#wizard-4 .finish').hide();
      $('#wizard-4 .next').show();
      if ($('#wizard-4 .nav li:last-child').hasClass('active')){
        $('#wizard-4 .next').hide();
        $('#wizard-4 .finish').show();
      }
    },
    'onNext': function(){
      scrollTo('#wizard-4',-100);
    },
    'onPrevious': function(){
      scrollTo('#wizard-4',-100);
    }
  });
  $('#wizard-5').bootstrapWizard({
    'tabClass': 'nav nav-tabs nav-stacked',
    'nextSelector': '.wizard .next',
    'previousSelector': '.wizard .prev',
    'onTabShow' : function(){
      $('#wizard-5 .finish').hide();
      $('#wizard-5 .next').show();
      if ($('#wizard-5 .nav li:last-child').hasClass('active')){
        $('#wizard-5 .next').hide();
        $('#wizard-5 .finish').show();
      }
    },
    'onNext': function(){
      scrollTo('#wizard-5',-100);
    },
    'onPrevious': function(){
      scrollTo('#wizard-5',-100);
    }
  });

});
</script>
<!-- Specific Page Scripts END -->

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
//alert('kk');
$.validate({
  lang: 'en'
});
</script>


<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->

<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
