<style type="text/css">
@font-face{font-family:'Glyphicons Halflings';src:url('../fonts/glyphicons-halflings-regular.eot');src:url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'),url('../fonts/glyphicons-halflings-regular.woff') format('woff'),url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'),url('../fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');}.glyphicon{position:relative;top:1px;display:inline-block;font-family:'Glyphicons Halflings';font-style:normal;font-weight:normal;line-height:1;-webkit-font-smoothing:antialiased;}
.glyphicon-arrow-left:before{content:"\e091";}
.glyphicon-arrow-right:before{content:"\e092";}
.glyphicon-arrow-up:before{content:"\e093";}
.glyphicon-arrow-down:before{content:"\e094";}
</style>
<style type="text/css">
  @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
.sizes-example1 {
  width: 100%;
  height: 200px !important;
}
}

@media only screen and (max-width: 500px) {
.sizes-example1 {
  width: 100% !important;
  height:250px !important;

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


</style>
<div id="pageContent">
    <!-- Breadcrumb section -->
    <section class="breadcrumbs breadcrumbs-boxed">
      <div class="container">
        <ol class="breadcrumb breadcrumb--wd pull-left">
          <li><a href="#">Home</a></li>
          <li class="active">Bridal / Book An Appoinment</li>
        </ol>
      </div>
    </section>
    <!-- Content section -->
    <section class="content">

      <div class="container" style="margin-top:20px;">

        <div class="row">


          <div class="col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
         <div class="row">
          <div class="col-md-12">
			<div class="card card--form">
             <?php echo form_open("welcome/user_appoinment",array('class'=>"contact-form"));?>
             <?php
             $name=$email=$contact=$address='';
if($this->session->userdata("userid")!='')
{
$user_data = $this->db->get_where('users',array('uid'=>$this->session->userdata("userid")))->row();
$name = $user_data->name;
$email = $user_data->email;
$contact = $user_data->contact;
$address = $user_data->address;


}
 ?>
 <center><?php if($this->session->flashdata('msg_bridal')){?>
   <div class="alert alert-success">
     <?php echo $this->session->flashdata('msg_bridal');?>
   </div>
 <?php } ?></center>
                 <h2 class="text-uppercase text-left"><strong>Our designer will contact you soon at your preferred date and time</strong></h2><br>
                 <h4 class="text-uppercase text-left"><strong>Simply enter your details, click the book button below and we'll connect you with one of our consultants. Thank you.</strong></h4><br>
                 <br />
                <label class="lb">Name*</label>
                <input type="text" name="name" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" value="<?php echo $name; ?>" class="input--wd input--wd--full" required>
                <label class="lb">Email ID*</label>
                <input type="text" name="email" data-validation="email" value="<?php echo $email; ?>" class="input--wd input--wd--full" required>
                <label class="lb">Contact No*</label>
                <input type="text" name="contact" data-validation-regexp="^([0-9]+)$" pattern="[0-9]{10}" title="10 digit contact number" maxlength="10" value="<?php echo $contact; ?>" class="input--wd input--wd--full" required>
                <?php  $keyword = $this->session->userdata('city_session');
                $city = $this->db->get_where('cities',array('id'=>$keyword))->row();?>
                <label class="lb">City*</label>
                <input type="text" name="city" value="<?php echo $city->name; ?>" class="input--wd input--wd--full"  required="" readonly="">


                <label class="lb">Address*</label>
                <input type="text" name="address" value="<?php echo $address; ?>" class="input--wd input--wd--full" required>

                <div class="col-xs-12 col-md-4 no-padding">
             <label class="lb">Preferred Appointment Date*</label> </div>

                  <div class="col-xs-12 col-md-8 no-padding" style="margin-bottom:10px;">  <div class="input-group date form_datetime" data-date="<?php echo date("Y-m-d"); ?>T10:00:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                        <input class="form-control" size="16" type="text" name="date_time" value="" readonly required>
                        <span class="input-group-addon"><span class="fa fa-times"></span></span>
                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>

                </div></div> <br>

                <!--<input type="date" name="app_date" class="input--wd input--wd--full" required>

                 <label class="lb">Preferred Time*</label>
                 <select class="input--wd input--wd--full" data-width="60" name="app_time" required>
					<option value="9 Am">9 Am</option>
					<option value="10 Am">10 Am</option>
					<option value="11 Am">11 Am</option>
					<option value="12 PM">12 PM</option>
					<option value="1 PM">1 PM</option>
					<option value="2 PM">2 PM</option>
					<option value="3 PM">3 PM</option>
					<option value="4 PM">4 PM</option>
					<option value="5 PM">5 PM</option>
					<option value="6 PM">6 PM</option>
					<option value="7 PM">7 PM</option>
				</select><br/>-->
<br>
        <label class="lb">Description*</label>

                  <textarea name="query" class="input--wd input--wd--full" required style="height: 100px;"> </textarea>
                  <span class="pull-left">*all fields are mandatory</span>

                <button type="submit" class="btn btn--wd2 text-uppercase wave pull-right" id="signup" name="signup" style="margin-right: initial;">Book</button>

              <?php echo form_close();?>

            </div>

        </div>

        </div>

          </div>

        </div>

      </div>

    </section>

    <!-- End Content section -->

  </div>
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>

  <link href="<?php echo base_url(); ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js" charset="UTF-8"></script>

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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  <script>
  /*$('.dropdown').click(function(){
     $(this).toggleClass('open');
   });
   $('.hovernav').hover(function(){
      $(this).toggleClass('open');
    });*/

  //alert('kk');
    $.validate({
      lang: 'en'
    });
  </script>

<script>
