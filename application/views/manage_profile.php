<?php //print_r($profile_data);
 ?>
<div id="pageContent"> 

    <section class="breadcrumbs breadcrumbs-boxed">



      <div class="container">



        <ol class="breadcrumb breadcrumb--wd pull-left">



          <li><a href="#">Home</a></li>



          <li class="active">Profile</li>



        </ol>



       



      </div>





    </section>



    



    <!-- Content section -->



    <section class="content">



      <div class="container" style="margin-top:20px;">



       

                 <div class="row">

          <div class="col-md-12">

			<div class="card ">
       <?php if($this->session->flashdata('msg_pass')){?>
  <div class="alert alert-success">      
    <?php echo $this->session->flashdata('msg_pass')?>
  </div>
<?php } ?>


             <?php  if(isset($pass) && $pass=='true'){
              echo form_open("welcome/update_pass",array('class'=>"contact-form"));?>

                 <h4 class="text-uppercase text-left"><i class="fa fa-user-plus" ></i> &nbsp;<strong><?php echo $pass; ?>Manage Password</strong></h4><br />
                  

                 <label class="lb">Old Password</label>

                <input type="password" name="old" class="input--wd input--wd--full old" required>
                <label class="lb">New Password</label>

                <input type="password" name="new" class="input--wd input--wd--full new" required="">
                <label class="lb">Confirm Password</label>

                <input type="password" name="new2" class="input--wd input--wd--full new2" required="">
                <input type="hidden" name="id" value="<?php echo $id; ?>" >
                <div id="error2"></div>
                <button type="submit" class="btn btn--wd2 text-uppercase wave signup" id="signup" name="signup" disabled="disabled" >Update </button>
                <script type="text/javascript">
/*$(document).ready(function(){
$( ".new" ).click(function() {

alert(‘Hello’);

});
});
*/
</script>

                <script type="text/javascript">
$(document).ready(function(){
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

              <?php echo form_close(); }  else {echo form_open("welcome/update_profile",array('class'=>"contact-form"));?>

                 <h4 class="text-uppercase text-left"><i class="fa fa-user-plus" ></i> &nbsp;<strong>Manage Profile</strong></h4><br />
                  

                 <label class="lb">User Name</label>

                <input type="text" name="name" value="<?php echo $profile_data->name; ?>" class="input--wd input--wd--full" required="">
                 <input type="hidden" name="id" value="<?php echo $id; ?>" >

                
                 

                  

                   <label class="lb">Mobile Number</label>

                  <input type="text" value="<?php echo $profile_data->mobile; ?>" name="contact" class="input--wd input--wd--full" required="">
                  <div><label class="lb">Gender&nbsp&nbsp&nbsp&nbsp</label>

                  <label class="radio-inline"><input type="radio" name="gender" <?php if($profile_data->gender=='m'){echo "checked"; } ?> value="m">Male</label>
                  <label class="radio-inline"><input type="radio" name="gender" <?php if($profile_data->gender=='f'){echo "checked"; } ?> value="f">Female</label>
                  <br></div><br>

                 <label class="lb">DOB</label>

                <input type="text" value="<?php echo $profile_data->dob; ?>" name="dob" class="input--wd input--wd--full" required="">

                 <label class="lb">Address</label>

                <input type="text" value="<?php echo $profile_data->address; ?>" name="address" class="input--wd input--wd--full" required="">
                 <label class="lb">Landmark</label>

                <input type="text" value="<?php echo $profile_data->landmark; ?>" name="landmark" class="input--wd input--wd--full" required="">
                  <label class="lb">City</label>

                <input type="text" value="<?php echo $profile_data->city; ?>" name="city" class="input--wd input--wd--full" required="">

                <label class="lb">State</label>

                <input type="text" value="<?php echo $profile_data->state; ?>" name="state" class="input--wd input--wd--full" required="">
                <label class="lb">Pincode</label>

                

                <input type="text" value="<?php echo $profile_data->pincode; ?>" name="pincode" class="input--wd input--wd--full" required="">
                <label class="lb">Email Id</label>

                <input type="email" name="email" value="<?php echo $profile_data->email; ?>" id="email" class="input--wd input--wd--full" required="" disabled>
                <small class="text-danger" id="error2"></small><br/>

            

                <button type="submit" class="btn btn--wd2 text-uppercase wave" id="signup" name="signup">Sign Up</button>

                

              <?php echo form_close(); } ?>

             

            </div>

        </div>

        </div>

          </div>

