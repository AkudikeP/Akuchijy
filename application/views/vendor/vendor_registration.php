<!DOCTYPE html>
<!--[if IE 8]>      <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>      <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html><!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Ansvel | Vendor Registration</title>
    <script>baseUrl='<?=base_url();?>';</script>

    <script type="text/javascript" src="<?php echo base_url(); ?>adminassets/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/vendor_registration.js"></script>
    <!-- Fav and touch icons -->

    <style>

.control-group {
  display: inline-block;
  vertical-align: top;
  background: #fff;
  text-align: left;
  box-shadow: 0 1px 2px rgba(0,0,0,0.1);
  padding: 30px;
  width: 200px;
  height: 210px;
  margin: 10px;
}
.control {
 display: block;
    float: left;
    position: relative;
    padding-left: 30px;
    padding-right: 14px;
    margin-bottom: 15px;
    cursor: pointer;
    font-size: 13px;
}
.control input {
  position: absolute;
  z-index: -1;
  opacity: 0;
}
.control__indicator {
  position: absolute;
  top: 2px;
  left: 0;
  height: 20px;
  width: 20px;
  background: #e6e6e6;
}
.control--radio .control__indicator {
  border-radius: 50%;
}
.control:hover input ~ .control__indicator,
.control input:focus ~ .control__indicator {
  background: #ccc;
}
.control input:checked ~ .control__indicator {
  background: #2aa1c0;
}
.control:hover input:not([disabled]):checked ~ .control__indicator,
.control input:checked:focus ~ .control__indicator {
  background: #0e647d;
}
.control input:disabled ~ .control__indicator {
  background: #e6e6e6;
  opacity: 0.6;
  pointer-events: none;
}
.control__indicator:after {
  content: '';
  position: absolute;
  display: none;
}
.control input:checked ~ .control__indicator:after {
  display: block;
}
.control--checkbox .control__indicator:after {
  left: 8px;
  top: 4px;
  width: 3px;
  height: 8px;
  border: solid #fff;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}
.control--checkbox input:disabled ~ .control__indicator:after {
  border-color: #7b7b7b;
}
.control--radio .control__indicator:after {
  left: 7px;
  top: 7px;
  height: 6px;
  width: 6px;
  border-radius: 50%;
  background: #fff;
}
.control--radio input:disabled ~ .control__indicator:after {
  background: #7b7b7b;
}

</style>
<style>
body

{
    /*background-image:url(<?php echo base_url(); ?>assets/images/tailor-tool-collection_23-2147524051.jpg) !important;*/
	background-color:rgba(0, 0, 0, 0.06);
}
.vd_content-wrapper
{
    /*background-image:url(<?php echo base_url(); ?>assets/images/tailor-tool-collection_23-2147524051.jpg) !important;*/
	background-color:rgba(0, 0, 0, 0.06);
}
</style>
        <!-- CSS -->

    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="<?php echo base_url(); ?>adminassets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>adminassets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
    <link href="<?php echo base_url(); ?>adminassets/css/font-entypo.css" rel="stylesheet" type="text/css">

    <!-- Fonts CSS -->
    <link href="<?php echo base_url(); ?>adminassets/css/fonts.css"  rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="<?php echo base_url(); ?>adminassets/plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>adminassets/plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>adminassets/plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>adminassets/plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>adminassets/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">


    <link href="<?php echo base_url(); ?>adminassets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>adminassets/plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>adminassets/plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>adminassets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>adminassets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>adminassets/plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">

  <!-- Specific CSS -->


    <!-- Theme CSS -->
    <link href="<?php echo base_url(); ?>adminassets/css/theme.min.css" rel="stylesheet" type="text/css">
    <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
    <link href="<?php echo base_url(); ?>adminassets/css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->



    <!-- Responsive CSS -->
          <link href="<?php echo base_url(); ?>adminassets/css/theme-responsive.min.css" rel="stylesheet" type="text/css">




    <!-- for specific page in style css -->

    <!-- for specific page responsive in style css -->


    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>adminassets/custom/custom.css" rel="stylesheet" type="text/css">



    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>adminassets/js/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>adminassets/js/mobile-detect.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>adminassets/js/mobile-detect-modernizr.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="js/html5shiv.js"></script>
      <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->


</head>

<body id="forms" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="forms "  data-smooth-scrolling="1" style="background-image:<?php echo base_url(); ?>assets/images/tailor-tool-collection_23-2147524051.xcf">
<div class="vd_body">
<!-- Header Start -->
 <header class="header-1" id="header">
      <div class="vd_top-menu-wrapper">
        <div class="container ">
          <div class="vd_top-nav vd_nav-width">
          <div class="vd_panel-header">
          	<div class="logo">
            	<a href="<?php echo base_url(); ?>"><h2><img alt="logo" src="<?php echo base_url(); ?>assets/images/logo/ansvel_text1.png"></h2></a>
            </div>
            <!-- logo -->



            <!-- vd_panel-menu -->
          </div>
          <!-- vd_panel-header -->

          </div>
          <div class="vd_container">
          	<div class="row">
            	<div class="col-md-9 col-sm-12 col-xs-12" style="color:#FFFFFF; padding-top:10px; text-align:center;">
            		<h2>Vendor Registration</h2>
                </div>
                <!--<div class="col-sm-7 col-xs-12">
              		<div class="vd_mega-menu-wrapper">
                    	<div class="vd_mega-menu pull-right">


                        </div>
                    </div>
                </div>-->

            </div>
          </div>
        </div>
        <!-- container -->
      </div>
      <!-- vd_primary-menu-wrapper -->

  </header>
  <!-- Header Ends -->



<div class="content">
  <div class="container">
    <!-- Middle Content Start -->
    <div class="vd_content-wrapper">
      <div class="container" style="width:90%;">
        <div class="vd_content clearfix">
          <div class="vd_content-section clearfix" style="margin-top: 50px; background-image:none;">
            <!-- row -->
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-magic"></i> </span> Ansvel | Vendor Registration</h3>
                  </div>


                  <div class="panel-body">
                      <div id="wizard-2" class="form-wizard">
                        <ul>
                          <li><a href="#tab21" data-toggle="tab" id="tab1">
                            <div class="menu-icon"> 1 </div>
                            Mobile Number Verification </a></li>
                          <li><a href="#tab22" data-toggle="tab" id="tab2">
                            <div class="menu-icon"> 2 </div>
                            OTP Verification </a></li>
                          <li><a href="#tab23" data-toggle="tab" id="tab3">
                            <div class="menu-icon"> 3 </div>
                            Personal Information </a></li>
                          <li><a href="#tab24" data-toggle="tab" id="tab4">
                            <div class="menu-icon"> 4 </div>
                            Bank Detail </a></li>
                          <li><a href="#tab25" data-toggle="tab" id="tab5">
                            <div class="menu-icon"> 5 </div>
                            Security Questions </a></li>
                        </ul>
                        <div class="progress progress-striped active">
                          <div class="progress-bar progress-bar-info" > </div>
                        </div>

					<?php
if ($this->session->userdata('contact')) {
    $contact = $this->session->userdata('contact');
    $query = $this->db->get_where('vendor', array('contact' => $contact));
    $data['abttext'] = $query->result();
    foreach ($data['abttext'] as $text) {
        $contact = $text->contact;
    }

    /*    $username = $text->username;*/
    $password = $text->password;
    $vendor_name = $text->vendor_name;
    $email = $text->email;
    $address = $text->address;
    $countryname = $text->country;
    $statename = $text->state;
    $cityname = $text->city;
    $pincode = $text->pincode;
} else {
    $contact = "";
    /*$username = "";*/
    $password = "";
    $vendor_name = "";
    $email = "";
    $address = "";
    $countryname = "";
    $statename = "";
    $cityname = "";
    $pincode = "";
}
?>

                        <div class="tab-content no-bd pd-25">
                        <div class="tab-pane" id="tab21">
                          <form name="form" id="otp-form" method="post" action="<?php echo base_url('index.php/Vendor/registration'); ?>" autocomplete="off">
                            <div class="form-group">
                              <label class="col-md-2 col-sm-3 control-label">Mobile Number</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Enter Mobile Number" id="contact" name="contact" value="<?php echo $contact; ?>" maxlength="11" onKeyPress="return isNumberKey(event)" >
                              </div>
                              <button class="btn vd_bg-green vd_white" type="submit" id="submit">Send OTP</button>
                            </div>

						<div class="form-actions-condensed wizard">
                            <div class="row mgbt-xs-0">
                              <div class="col-sm-12" align="center"> <a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a>
                              <a class="btn vd_btn next" id="nextbut">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a></div>
                            </div>
                          </div>
                           <?php echo form_close(); ?>

                            <?php if ($this->session->flashdata('message')) {?>
                              <div class="alert alert-success" style="margin-top:20px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                <span class="vd_alert-icon">
                                <i class="fa fa-exclamation-circle vd_green"></i></span>
                               <?php echo $this->session->flashdata('message'); ?>
                              </div>
                            <?php }?>
                          </div>
                          <div class="tab-pane" id="tab22">
                          <?php echo form_open("", array("class" => "form-horizontal", "id" => "chk_token", "autocomplete" => "off")); ?>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">OTP Code</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Enter OTP Number" id="token" name="token" required>
                              </div>
                            <button class="btn vd_bg-green vd_white" type="submit" id="submitbutton">Verify</button>
                            <button class="btn vd_bg-green vd_white" type="submit" id="re_send">Resend OTP</button>
                            </div>
							<div class="form-actions-condensed wizard">
                            <div class="row mgbt-xs-0">
                              <div class="col-sm-9 col-sm-offset-2">
                                <a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a>
                                <a class="btn vd_btn next" id="nextbut1">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a> </div>
                            </div>
                          </div>
                            <?php echo form_close(); ?>
                          </div>
                          <div class="tab-pane" id="tab23">
                            <?php echo form_open_multipart("", array("class" => "form-horizontal", "id" => "chk_pdetail", "autocomplete" => "off")); ?>
                            <!--div class="form-group">
                              <label class="col-sm-2 control-label">User Name</label>
                              <!--div class="col-sm-10 controls">
                                <input type="text" class="width-30  input-border-btm" name="username" id="username" value="<?php echo $username; ?>" required>
                              </div-->
                            </div-->
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Password</label>
                              <div class="col-sm-5 controls">
                                <input type="password" class="width-67  input-border-btm" name="password" autocomplete="new-password" id="password" value="<?php echo $password; ?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-2 control-label">Vendor Name</label>
                              <div class="col-sm-5 controls">
                                <input type="text" class="width-67  input-border-btm" name="vendor_name" id="vendor_name" autocomplete="firstname" value="<?php echo $vendor_name; ?>" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Email</label>
                              <div class="col-sm-5 controls">
                                <input type="text" class="width-67  input-border-btm" name="email" id="email" autocomplete="email" value="<?php echo $email; ?>">
                              </div>
							  <div id="status" style="color:#669900;"></div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Address</label>
                              <div class="col-sm-5 controls">
                                <input type="text" class="width-67  input-border-btm" name="address" id="address" autocomplete="address" value="<?php echo $address ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Country</label><div class="col-sm-5">
                              <div class="width-67  input-border-btm">
                                <select id="country" name="country" class="form-control">
                                  <option value="">Select Country</option>
                                  <?php
$country = $this->db->get("countries")->result();
foreach ($country as $country) {
    ?>
                                    <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                 <?php }?>
                                 </select>
                              </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-2 control-label">State</label> <div class="col-sm-5">
                              <div class="width-67  input-border-btm" id="states">
                                <select id="state" name="state" class="form-control">
                                  <option value="">Select State</option>
                                 </select>
                              </div>
                            </div>
                          </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">City</label>
							  <div class="col-sm-5">
                              <div class="width-67  input-border-btm" id="cities">
                              <select id="city" name="city" class="form-control">
							  	 <option value="">Select City</option>
                                 </select>
                              </div></div>
                              </div>


                            <div class="form-group">
                              <label class="col-sm-2 control-label">Postal code</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-30  input-border-btm" maxlength="6" name="pincode" id="pincode" value="<?php echo $pincode; ?>" onKeyPress="return isNumberKey(event)">
                                <span style="color: grey;">Not compulsory</span>
                              </div>
                            </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-10 controls">
                              <label class="control control--radio">Vendor
                                <input type="radio" class="width-5 input-border-btm type-vendor" name="category" value="Vendor"/>
                                <div class="control__indicator"></div>
                              </label>
                              <label class="control control--radio">Service provider
                                <input type="radio" class="width-5 input-border-btm type-service-provider" name="category" value="Service provider"/>
                                <div class="control__indicator"></div>
                              </label>
                            </div>
                          </div>
							<div class="form-group vendor-type-options">
                              <label class="col-sm-2 control-label">Vendor Type</label>
                              <div class="col-sm-10 controls">
                              <label class="control control--checkbox">Fabric
							  <input type="checkbox" class="width-5 input-border-btm vtype" name="option[]" value="Fabric"/>
							  <div class="control__indicator"></div>
							</label>
							<label class="control control--checkbox">Uniform
							  <input  type="checkbox" class="width-5  input-border-btm vtype" name="option[]" value="Uniform"/>
							  <div class="control__indicator"></div>
							</label>

							 <label class="control control--checkbox">Accessories
							  <input type="checkbox" class="width-5  input-border-btm vtype" name="option[]" value="Accessories"/>
							  <div class="control__indicator"></div>
							</label>

							 <label class="control control--checkbox">More Services
							  <input type="checkbox" class="width-5  input-border-btm vtype" name="option[]" value="More Services"/>
							  <div class="control__indicator"></div>
							</label>
										<label class="control control--checkbox">Online Boutique
							  <input type="checkbox" class="width-5  input-border-btm vtype" name="option[]" value="Online Boutique"/>
							  <div class="control__indicator"></div>
							</label>
                              </div>
							  <br>

                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Select ID Type</label>
                              <div class="col-sm-5 controls">
								<select id="id_type" name="id_type" class="form-control">
                                  <option value="">Select Type</option>
								   <option value="Passport">Passport</option>
									<option value="Voters Card">Voters Card</option>
									<option value="Drivers License">Drivers License</option>
									<option value="NIN Card">NIN Card</option>
                                 </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-2 control-label">ID Proof</label>
                              <div class="col-sm-5 controls">
                                <input type="file" name="id_proof" id="id_proof" >
                              </div>
                            </div>


							<div class="form-actions-condensed wizard">
                            <div class="row mgbt-xs-0">
                              <div class="col-sm-9 col-sm-offset-2">
							  		<a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a>
									<button class="btn vd_bg-green vd_white next nextbut3"  type="submit" id="pdetail_button" >Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></button>
							   </div>
                            </div>
                          </div>
                            <?php echo form_close(); ?>
                          </div>


                          <div class="tab-pane" id="tab24">
                          <?php echo form_open("", array("class" => "form-horizontal", "id" => "chk_bdetail")); ?>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Account Name</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="width-50  input-border-btm" name="acc_name" id="acc-name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Account Number</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="width-50  input-border-btm" name="acc_number" id="acc-number" onKeyPress="return isNumberKey(event)" maxlength="10">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Re-enter Account Number</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="width-50  input-border-btm" name="re_acc_number" id="re-acc-number" onKeyPress="return isNumberKey(event)" maxlength="20">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Select Bank Name</label>
                              <div class="col-sm-5 controls">
                                <select id="bank-name" name="bank_name" class="form-control">
                                  <option value="">Select Bank</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Sort Code</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="width-50  input-border-btm" name="sort_code" id="sort-code" onKeyPress="return isNumberKey(event)" maxlength="10">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Tax Identification Number</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="width-50  input-border-btm" name="tin" id="tin" onKeyPress="return isNumberKey(event)" maxlength="20">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Account type</label>
                              <div class="col-sm-9 controls">
                                <label class="control control--radio">Corporate
                                  <input type="radio" class="width-5 input-border-btm" name="acc_type" value="Corporate"/>
                                  <div class="control__indicator"></div>
                                </label>
                                <label class="control control--radio">Current
                                  <input type="radio" class="width-5 input-border-btm" name="acc_type" value="Current"/>
                                  <div class="control__indicator"></div>
                                </label>
                                <label class="control control--radio">Savings
                                  <input type="radio" class="width-5 input-border-btm" name="acc_type" value="Savings"/>
                                  <div class="control__indicator"></div>
                                </label>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Account class</label>
                              <div class="col-sm-9 controls">
                                <label class="control control--radio">Individual
                                  <input type="radio" class="width-5 input-border-btm" name="acc_class" value="Individual"/>
                                  <div class="control__indicator"></div>
                                </label>
                                <label class="control control--radio">Limited liability
                                  <input type="radio" class="width-5 input-border-btm" name="acc_class" value="Limited liability"/>
                                  <div class="control__indicator"></div>
                                </label>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Registered Business Name</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="width-50  input-border-btm" name="business_name" id="business-name">
                              </div>
                            </div>

							<div class="form-actions-condensed wizard">
                            <div class="row mgbt-xs-0">
                              <div class="col-sm-9 col-sm-offset-2">
							  		<a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a>
									<!--<a class="btn vd_btn next" id="nextbut">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a> -->
									<button class="btn vd_btn next nextbut4" type="submit" id="bdetail_button">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></button>

							   </div>
                            </div>
                          </div>

                            <?php echo form_close(); ?>
                          </div>
                          <div class="tab-pane" id="tab25">
                          <?php echo form_open("", array("class" => "form-horizontal", "id" => "ques")); ?>
                            <div class="form-group">
                            <div class="col-md-12">
                              <label >When was your company started?</label>
                              <input type="text" class="form-control" name="question1" id="question1" required="">
                              </div>
                              <div class="col-sm-12 controls">
                                <div class="control-value"> In what city were you born? </div>
                                <input type="text" class="form-control" name="question2" id="question2" required="">
                              </div>

                              <div class="col-sm-12 controls">
                                <div class="control-value"> What is your favorite color?</div>
                                <input type="text" class="form-control" name="question3" id="question3" required="">
                              </div>

                              <div class="col-sm-12 controls">
                                <div class="control-value">  What is your nickname?</div>
                                <input type="text" class="form-control" name="question4" id="question4" required="">
                              </div>

                              <div class="col-sm-12 controls">
                                <div class="control-value"> What is your favorite food?</div>
                                <input type="text" class="form-control" name="question5" id="question5" required="">
                              </div>
                             <br><br>
                              <div class="col-sm-12" style="padding:10px"><b>By clicking "Finish" I agree that: I have read and accepted the <a href="<?php echo base_url(); ?>vendor-home#termsandcondition" target="_blank"><u>Terms & Conditions</u></a> of sell.</b></div>
<!--                              <div class="col-sm-12 controls">
                                <input type="submit" class="btn btn-success" name="submit" id="ques_button" required="" style="margin-top:20px;">
                              </div>-->
							  <div class="form-actions-condensed wizard" align="center">
                            <div class="row mgbt-xs-0">
                              <div class="col-sm-9 col-sm-offset-2" style="margin-top:25px;" >
							  		<a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a>
									<button class="btn vd_btn vd_bg-green finish nextbut5" type="submit" id="ques_button">Finish </button>

							   </div>
                            </div>
                          </div>
                              <?php echo form_close(); ?>
                            </div>
                          </div>
                          <!--<div class="form-actions-condensed wizard">
                            <div class="row mgbt-xs-0">
                              <div class="col-sm-9 col-sm-offset-2"> <a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a> <a class="btn vd_btn next" id="nextbut">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a> <a class="btn vd_btn vd_bg-green finish" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Finish</a> </div>
                            </div>
                          </div>-->
                        </div>
                      </div>
                    <!-- </form> -->
                  </div>
                </div>
                <!-- Panel Widget -->
              </div>
              <!-- col-md-12 -->
            </div>
            <!-- row -->

          </div>
          <!-- .vd_content-section -->

        </div>
        <!-- .vd_content -->
      </div>
      <!-- .vd_container -->
    </div>
    <!-- .vd_content-wrapper -->

    <!-- Middle Content End -->

  </div>
  <!-- .container -->
</div>
<!-- .content -->

<!-- Footer Start -->

<!-- Footer END -->


</div>

<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--[if lt IE 9]>
  <script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/js/bootstrap.min.js"></script>
<script type="text/javascript" src='<?php echo base_url(); ?>adminassets/plugins/jquery-ui/jquery-ui.custom.min.js'></script>
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/js/caroufredsel.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/js/plugins.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/plugins/breakpoints/breakpoints.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/plugins/tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/plugins/blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/plugins/pnotify/js/jquery.pnotify.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/js/theme.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/custom/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>adminassets/css/jquery-confirm.css"/>
<script src="<?php echo base_url(); ?>adminassets/js/bundled.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>adminassets/js/jquery-confirm.js"></script>

<!-- Specific Page Scripts Put Here -->
<script type="text/javascript">
<?php if (!$this->session->userdata('contact')) {?>

<?php }?>
</script>

<script type="text/javascript">
$("#email").change(function(e){e.preventDefault();

    var femail=$(this).val();
    //alert(femail);
    $.ajax({

         type: "POST",

         url: '<?php echo base_url(); ?>Vendor/check_email',

         data: {femail:femail},

         success: function(response){
           //console.log(response);
          if(response.length>=4)
        {

          $.confirm({
          title: 'Alert',
          content: 'This email is already registered',
          icon: 'fa fa-question-circle',
          animation: 'scale',
          closeAnimation: 'scale',
          opacity: 0.5,
          buttons: {
            'confirm': {
                text: 'Ok',
                btnClass: 'btn-info',
                action: function () {
                    $("#email").val('');
                    }
            },
           }
          });

        }
        else
        {
        }

             },
             error: function(response){
                //console.log(response);
             }

         });

});
</script>

<script type="text/javascript" src='<?php echo base_url(); ?>adminassets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'></script>
<script>   //no need to specify the language
$(function(){
  $('#vat_gst').click(function() {
                $('#menu_id').show("fast");
        });
  $('#menu_hide').click(function() {
                $('#menu_id').hide("fast");
        });

});
</script>

<script>   //no need to specify the language
 $(function(){
  $("#re_send").click(function(e){
    $.ajax({
       url:'<?php echo base_url(); ?>index.php/Vendor/resend_otp',
       type: 'POST',
       data: $("#chk_token").serialize(),
       success: function(respond){
          console.log(respond);
           if(respond=='true')
           {
              alert("OTP send successfully.");

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
 });
});
</script>

<script>
  	var id_type = $('#id_type').val();
	var id_proof = $('#id_proof').val();
    var aaa=$('#acc_number').val();
	var aaaa =$('#re_acc_number').val();
    var bbb=$('#branch_name').val();
    var ccc=$('#bank_ifc').val();
	var ddd = $('#branch_name').val();


$(document).ready(function() {
  "use strict";

	$('#submit').attr('disabled',true);
<?php if (!$this->session->userdata('contact')) {?>
	$('#nextbut').attr('disabled',true);
<?php } else {?>
	$('#nextbut').attr('disabled',false);
<?php }?>
	$('#nextbut1').attr('disabled',true);
	$('#submitbutton').attr('disabled',true);

	$('#token').keyup(function(){
		if($(this).val().length !=6)
		{
			$('#submitbutton').attr('disabled', true);
		}
		else
		{
			$('#submitbutton').attr('disabled',false);
		}
	})

	$("#submit").click(function(e){
		$('#nextbut').attr('disabled',false);
		return true;
	})

	$("#submitbutton").click(function(e){
		$('#nextbut1').attr('disabled',false);
		return true;
	})
 });
</script>



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>					-->

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

</body>

<!-- Mirrored from www.venmond.com/demo/vendroid/forms-wizard.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Dec 2016 10:05:36 GMT -->
</html>

<script>
// Prevent alphabets in Mobile or Phone
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
<script type = "text/javascript">
function checkField(fieldname)
{
	if (/[^0-9a-bA-B\s]/gi.test(fieldname.value))
	{
		alert ("Only alphanumeric characters and spaces are valid in this field");
		fieldname.value = "";
		fieldname.focus();
		return false;
	}
}
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("select#country").change(function(){
		var country = $("#country option:selected").val();
		//alert(country);
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/Vendor/selectcontry",
			data: { country : country }
		}).done(function(data){
			$("#states").html(data);
		});
	});
});
</script>


<!--<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>-->
<script src="<?php echo base_url(); ?>mailgun/mailgun_validator.js"></script>
<script>
      // document ready
      $(function() {
        // capture all enter and do nothing
        $('#email').keypress(function(e) {
          if(e.which == 13) {
            $('#email').trigger('focusout');
            return false;
          }
        });
        // capture clicks on validate and do nothing
        $("#validate_submit").click(function() {
          return false;
        });
        // attach jquery plugin to validate address
        $('#email').mailgun_validator({
          api_key: 'pubkey-cd1f8b7511937465a0948fb5b202ba0a', // replace this with your Mailgun public API key
          in_progress: validation_in_progress,
          success: validation_success,
          error: validation_error,
        });
      });
      // while the lookup is performing
      function validation_in_progress() {
        $('#status').html("<img src='<?php echo base_url(); ?>mailgun/loading.gif' height='16'/>");
      }
      // if email successfull validated
      function validation_success(data) {
        $('#status').html(get_suggestion_str(data['is_valid'], data['did_you_mean']));
      }
      // if email is invalid
      function validation_error(error_message) {
        $('#status').html(error_message);
      }
      // suggest a valid email
      function get_suggestion_str(is_valid, alternate) {
        if (is_valid) {
          var result = '<span class="success">Address is valid.</span>';
          if (alternate) {
            result += '<span class="warning"> (Though did you mean <em>' + alternate + '</em>?)</span>';
          }
          return result
        } else if (alternate) {
          return '<span class="warning">Did you mean <em>' +  alternate + '</em>?</span>';
        } else {
          return '<span class="error">Address is invalid.</span>';
		  $("#email").focus();
        }
      }
    </script>
