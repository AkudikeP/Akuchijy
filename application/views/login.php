<?php
if(isset($_GET['url']) && !empty($_GET['url']))
{
  $data=array("wish_url"=>$_GET['url']
      );
        $this->session->set_userdata($data);
}
 ?>

<style type="text/css">
@media(min-width: 1200px){
.flo-md{
  float: right;
}
}
.glogin{
display: block;
    line-height: 35px;
    text-align: center;
    color: white;
    font-weight: 800;
    font-size: 16px;
    border-radius: 3px;
    height: 35px;
    width: 100%;
    background-color: #e9544f;
    transition: background-color 0.4s;
    cursor: pointer;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}
.glogin:hover{
background-color: #cc413c;
}
.flogin:hover{
  background-color: #404f8e;
}
.flogin{
  display: block;
    line-height: 35px;
    text-align: center;
    font-weight: 800;
    font-size: 16px;
    border-radius: 3px;
    height: 35px;
    width: 100%;
    color: #fff;
    background-color: #5667af;
    transition: background-color 0.4s;
    cursor: pointer;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}
.orrr{
  margin: 5px 0;
}
.nav-tabs--wd > li.active > a, .nav-tabs--wd > li.active > a:hover, .nav-tabs--wd > li.active > a:focus {
    border: none;
}
.nav-tabs--wd > li > a {
    margin: 0px;
}
.wd-50{
  width: 50%;
  text-align: center;
}
@media (max-width: 500px){
  .wd-50{
  width: 100% !important;
  text-align: center;
}
}
</style>
<div id="pageContent">

    <section class="breadcrumbs breadcrumbs-boxed">

      <div class="container">
      </div>
    </section>
    <!-- Content section -->


    <section class="content content--parallax top-null" data-image="<?php echo base_url();?>assets/images/tailor.jpg" style="background-size: cover; background-repeat:no-repeat">



      <div class="container" style="padding-top:20px; height:760px;">



        <div class="row">


          <div class="container">
        <!-- Nav tabs -->
        <div class="col-md-5 flo-md">
        <ul class="nav nav-tabs nav-tabs--wd" role="tablist">
          <li class="active wd-50"><a href="#Tab1" aria-controls="home" role="tab" data-toggle="tab" class="text-uppercase" aria-expanded="true">LOGIN</a></li>
          <li class="wd-50"><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase" aria-expanded="false">REGISTER</a></li>
        </ul>


        <!-- Tab panes -->
        <div class="tab-content tab-content--wd">

          <div role="tabpanel" class="tab-pane active" id="Tab1">
             <div class="card card--form">

               <?php if($this->session->flashdata('invalid')){?>
               <div class="alert alert-danger">
                 <?php echo $this->session->flashdata('invalid')?>
               </div>
             <?php } ?>
             <?php if($this->session->flashdata('msg')){?>
             <div class="alert alert-success">
             <?php echo $this->session->flashdata('msg')?>
             </div>
             <?php } ?>

              <?php echo form_open("welcome/user_login",array('class'=>"contact-form"));


              if(!isset($_COOKIE['uname'])) {
                $uname = '';
                $upass = '';

} else {
    $uname = $_COOKIE['uname'];
    $upass = $_COOKIE['upass'];
}
?>



                <h4 class="text-uppercase text-left"> <i class="fa fa-key"></i> &nbsp;<strong>Login </strong> </h4><br />

               <label class="lb">Email Id</label><input type="email" value="<?php echo $uname; ?>" name="email" class="input--wd input--wd--full" required >



              <label class="lb">Password</label> <input type="password" value="<?php echo $upass; ?>" name="password" class="input--wd input--wd--full"  required>
              <input type="hidden" name="redirect" value="<?php if(isset($_GET['url']) && !empty($_GET['url'])){ echo $_GET['url']; }  ?>" required>



                <div class="col-md-12 col-sm-12 col-xs-12"><div class="checkbox-group" style="

    float: left;

">

                  <input type="checkbox" id="checkBox2" name="rememberme">

                  <label for="checkBox2" class="lb"> <span class="check"></span> <span class="box"></span>Remember Me</label>
                  </div>
                  <h6 style="font-size: 13px;float: right;margin-top: 3px;"><a href="#Tab3" role="tab" data-toggle="tab" class="text-uppercase" aria-expanded="false">Forgot Password ?</a></h6>

                </div>

                <br/>

               <div align="center"> <button type="submit" class="btn btn--wd2 text-uppercase wave" style="width: 100%;margin-top: 20px;">Sign In</button> </div>

              </form>

             <center>
             <h5>Login Using</h5>
        <?php


 ?>

 <a href="<?php echo $login_url;?>"><div class="glogin"><i class="fa fa-google-plus"></i> &nbsp;Google </div></a> <div class="orrr">Or </div>
<a href="<?php echo $fb_login_url;?>"><div class="flogin"><i class="fa fa-facebook"></i> &nbsp;  Facebook</div></a>
</center>

            </div>
          </div>




          <div role="tabpanel" class="tab-pane" id="Tab2"  style="height:660px;">

            <div class="card card--form">
<?php   $this->load->helper('captcha');
  $this->load->helper('string');
  $rand_string = random_string('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 8);
$vals = array(
'word'          => $rand_string,
'img_path'      => './assets/images/captcha/',
'img_url'       => base_url()."assets/images/captcha/",
'font_path'     => base_url()."assets/font/fonts/texb.ttf",
'img_width'     => '150',
'img_height'    => '50',
'expiration'    => 7200,
'word_length'   => 8,
'font_size'     => 50,
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

             <?php echo form_open("welcome/user_signup",array('class'=>"contact-form"));?>

                 <h4 class="text-uppercase text-left"><i class="fa fa-user-plus" ></i> &nbsp;<strong> Register</strong></h4><br />


                 <label class="lb">Full Name</label>

                <input type="text" name="name" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-allowing=" " title="Name Should Only have alphabets" class="input--wd input--wd--full" required="required" maxlength="20">

                 <label class="lb">Email</label>

                  <input type="email"  data-validation="email" name="email" id="email" class="input--wd input--wd--full" required="" autocomplete="off">



                   <label class="lb">Contact</label>

                <input type="text" name="contact" pattern="[0-9]{10}" title="10 digit contact number" maxlength="10" id="mobile" class="input--wd input--wd--full" required="" autocomplete="off">

                 <label class="lb">Password</label>

                <input type="password" id="password" pattern="{4,}" title="Must contain at least 4 or more characters" name="password" class="input--wd input--wd--full" required="">


                 <label class="lb">Retype Password</label>

                <input type="password" id="confirm_password" pattern="{4,}" title="Must contain at least 4 or more characters" name="password" class="input--wd input--wd--full" required="">
              <div class="checkbox">
  <label class="lb"><input type="checkbox" required="" value="">I agree to the <a href="<?php echo base_url() ?>terms-and-condition" target="_blank" style="color:#007BB8">terms & conditions</a></label>
</div>
                <small class="text-danger" id="error"></small>


  <?php echo '<br><i class="fa fa-refresh" aria-hidden="true"></i> &nbsp<span id="recaptcha">'.$cap['image'].'</span>';
  echo '<input type="text" placeholder="captcha" class="captch input--wd" id="inputcaptcha" name="captcha" value="" required="">'; ?>


                <button type="submit" class="btn btn--wd2 text-uppercase wave" id="signup" name="signup" style="width: 100%;">Sign Up</button>



              <?php echo form_close();?>



            </div>

          </div>


          <div role="tabpanel" class="tab-pane" id="Tab3"  style="height:670px;">
            <div class="card card--form">
                 <h4 class="text-uppercase text-left"><i class="fa fa-user-plus" ></i> &nbsp;<strong> Forgot Password</strong></h4><br />
                 <label class="lb">Email</label>
                  <input type="email" name="email" id="femail" class="input--wd input--wd--full" required="" autocomplete="off">
                <small id="errorforgot"  style="
    padding: 3%;
    display: block;
"></small><br/>
                <button type="submit" class="btn btn--wd2 text-uppercase wave" id="fpass" name="signup" style="width: 100%;">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <span id="capword" style="display:none"><?php echo $cap['word']; ?></span>

 <!--  <div class="col-sm-12 col-md-6 col-lg-6"> <div class="row">

      <div class="col-md-12">





        </div>

        </div>


       </div> -->



         <!--  <div class="col-sm-12 col-md-6 col-lg-6">


         <div class="row">

          <div class="col-md-12">



        </div>

        </div>

          </div> -->
          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
          <script src="http://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.js"></script>
          <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.css">
          


          <script>
          //alert('kk');
            $.validate({
              lang: 'en'
            });
            $(document).ready(function () {
    //$('input[title]').qtip();  
    //console.log('k'); 
    
});
          </script>

<script>


var jq = $.noConflict();

          jq(document).ready(function(){//alert("sadf");
            jq('input[title]').qtip({
    content: jq(':focus').prop('title'),
    show: 'focus',
    hide: 'blur'
}); 
          $(".captch").keyup(function(){

                var id=$(this).val();
                var word = $('#capword').html();
                //console.log(id);
                if(id.length>7){
                if(id==word)
                {
                  jq("#signup").removeAttr("disabled");
              }else{
                  jq("#error").html("Captcha Does not matches.");
                  jq("#signup").attr("disabled","disabled");
              }
}else{
  jq("#error").html("");
}
                    });

          $("#password").change(pass_match);
          $("#confirm_password").keyup(pass_match);

          function pass_match(){
           
          var pass1 = jq("#password").val();
          var pass2 = jq("#confirm_password").val();
          if(pass2.length>3){
          if(pass1==pass2)
          {
              jq("#signup").removeAttr("disabled");
              jq("#error").html("");
          }else{
              jq("#signup").attr("disabled","disabled");
                jq("#error").html("Password Does not matches.");
          }}else{
  jq("#error").html("");
}

          }

         





            jq("#email").change(function(){

            var email=jq(this).val();
            jq.ajax({

             type: "POST",

             url: '<?php echo base_url();?>Welcome/email_chk',

             data: {"email":email},

             success: function(response){
              console.log(response);
              var r=response;
              //alert(r.length);
              //console.log(r);
              if(r.length==0){
                jq("#signup").removeAttr("disabled");}

              else
              {
                  jq("#signup").attr("disabled","disabled");
                  jq("#email").val('');
              }
              jq("#error").html(response);

               }

             });

      });
                jq("#mobile").change(function(){

            var mobile=jq(this).val();
            jq.ajax({

             type: "POST",

             url: '<?php echo base_url();?>Welcome/mobile_chk',

             data: {"mobile":mobile},

             success: function(response){
console.log(response);
              var r=response;
              //alert(r.length);
              if(r.length==0)

              {
                                      jq("#signup").removeAttr("disabled");

              }

              else
              {
                jq("#signup").attr("disabled","disabled");
                jq("#mobile").val('');

              }
              jq("#error").html(response);

               }

             });

      });
                jq("#fpass").click(function(e){e.preventDefault();

            var femail=jq("#femail").val();
            jq.ajax({

                 type: "POST",

                 url: '<?php echo base_url();?>welcome/forget_password',

                 data: {femail:femail},

                 success: function(response){
                   console.log(response.length);
                   console.log(response);
                    if(response=="  true")
                    {
                      jq("#errorforgot").html('<span class="alert alert-success">Link has been sent on your email id.</span>');
                    }
                    else
                    {
                      //alert('This Email Id Incorrect.');
                      jq("#errorforgot").html('<span class="alert alert-danger">This Email Id Incorrect.</span>');
                    }

                     },
                     error: function(response){
                        console.log(response);
                     }

                 });

        });
        jq(".fa-refresh").click(function(){
    jq.ajax({

         type: "POST",
         url: '<?php echo base_url();?>welcome/recaptcha',
         success: function(response){
          console.log(response);

              var response_data = response.split('___');
              jq('#recaptcha').html(response_data[0]);
              jq('#capword').html(response_data[1]);
             },
             error: function(response){
                console.log(response);
             }

         });

});


          });

</script>

        </div>



      </div>



    </section>

    <!-- End Content section -->


  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
