<!DOCTYPE html>
<!--[if IE 8]>      <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>      <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html><!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Ansvel | Vendor Registration</title>
   
    
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
    <link href="<?php echo base_url();?>adminassets/css/theme.min.css" rel="stylesheet" type="text/css">
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
            	<a href="<?=base_url();?>"><h2><img alt="logo" src="<?=base_url();?>assets/images/ansvelv.png"></h2></a>
            </div>
            <!-- logo -->
            
            
                                                 
            <!-- vd_panel-menu -->
          </div>
          <!-- vd_panel-header -->
            
          </div>    
          <div class="vd_container">
          	<div class="row">
            	<div class="col-sm-9 col-xs-12" style="color:#FFFFFF; padding-top:10px; text-align:center;">
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
					if($this->session->userdata('contact'))
					{
						$contact=$this->session->userdata('contact');
					    $query = $this->db->get_where('vendor',array('contact'=>$contact));
						$data['abttext'] = $query->result();			
						foreach($data['abttext'] as $text)					   
					    $contact = $text->contact;
					   	$username = $text->username;
						$password = $text->password;
						$vendor_name = $text->vendor_name;
						$email = $text->email;
						$address = $text->address;
						$countryname = $text->country;
						$statename = $text->state;
						$cityname = $text->city;						
						$pincode = $text->pincode;			
					 }
					 else
					 {
					    $contact = "";
					   	$username = "";
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
                          <form name="form" method="post" action="<?php echo base_url('index.php/Vendor/registration');?>" onsubmit="return Validation()" autocomplete="off">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Mobile Number</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Enter Mobile Number" id="contact" name="contact" value="<?php echo $contact;?>" maxlength="10" onKeyPress="return isNumberKey(event)" >
                              </div>
                              <button class="btn vd_bg-green vd_white width-10" type="submit" id="submit" onClick="valid_nu">Send OTP</button>
                            </div>
							
						<div class="form-actions-condensed wizard">
                            <div class="row mgbt-xs-0">
                              <div class="col-sm-12" align="center"> <a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a> <a class="btn vd_btn next" id="nextbut">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a> <a class="btn vd_btn vd_bg-green finish" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Finish</a> </div>
                            </div>
                          </div>							
                           <?php echo form_close();?>

                            <?php  if($this->session->flashdata('message')){?>
                              <div class="alert alert-success" style="margin-top:20px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                <span class="vd_alert-icon">
                                <i class="fa fa-exclamation-circle vd_green"></i></span>
                               <?php echo $this->session->flashdata('message');?>
                              </div>
                            <?php }?>
                          </div>
                          <div class="tab-pane" id="tab22">
                          <?php echo form_open("",array("class"=>"form-horizontal","id"=>"chk_token","autocomplete"=>"off"));?>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">OTP Code</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Enter OTP Number" id="token" name="token" required>
                              </div>
                            <button class="btn vd_bg-green vd_white width-10" type="submit" id="submitbutton">Verify</button>
                            <button class="btn vd_bg-green vd_white width-10" type="submit" id="re_send">Resend OTP</button>
                            </div>
							<div class="form-actions-condensed wizard">
                            <div class="row mgbt-xs-0">
                              <div class="col-sm-9 col-sm-offset-2"> <a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a> <a class="btn vd_btn next" id="nextbut1">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a> </div>
                            </div>
                          </div>							
                            <?php echo form_close();?>
                          </div>
                          <div class="tab-pane" id="tab23">
                            <?php echo form_open("",array("class"=>"form-horizontal","id"=>"chk_pdetail","enctype" => "multipart/form-data","autocomplete"=>"off"));?>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">User Name</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-30  input-border-btm" name="username" id="username" value="<?php echo $username;?>" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Password</label>
                              <div class="col-sm-10 controls">
                                <input type="password" class="width-30  input-border-btm" name="password" id="password" value="<?php echo $password;?>">
                              </div>
                            </div>
							
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Vendor Name</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-30  input-border-btm" name="vendor_name" id="vendor_name" value="<?php echo $vendor_name;?>" required>
                              </div>
                            </div>							
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Email</label>
                              <div class="col-sm-5 controls">
                                <input type="text" class="width-67  input-border-btm" name="email" id="email" value="<?php echo $email;?>">
                              </div>
							  <div id="status" style="color:#669900;"></div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Address</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-30  input-border-btm" name="address" id="address" value="<?php  echo $address?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Country</label><div class="col-md-10">
                              <div class="width-20  input-border-btm">
                                <select id="country" name="country" class="form-control">
                                  <option value="">Select Country</option>
                                  <?php 
                                  $country=$this->db->get("countries")->result();
                                   foreach($country as $country)
                                   {
                                  ?>
                                    <option value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
                                 <?php }?>
                                 </select>
                              </div>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-sm-2 control-label">State</label> <div class="col-md-10">
                              <div class="width-20  input-border-btm" id="states">
                                <select id="state" name="state" class="form-control">
                                  <option value="">Select State</option>
                                 </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">City</label>
							  <div class="col-md-10" style="padding-left:25px;" ><br>
                              <div class="width-20  input-border-btm" id="cities">
                              <select id="city" name="city" class="form-control">
							  	 <option value="">Select City</option>
                                 </select>
                              </div></div>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Pincode</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-30  input-border-btm" maxlength="6" name="pincode" id="pincode" value="<?php echo $pincode;?>" onKeyPress="return isNumberKey(event)">
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label">Vendor Type</label>
                              <div class="col-sm-10 controls">
                              <label class="control control--checkbox">Fabric
							  <input type="checkbox" class="width-5  input-border-btm" name="option[]" value="Fabric" id="vtype"/>
							  <div class="control__indicator"></div>
							</label>
							<label class="control control--checkbox">Uniform
							  <input  type="checkbox" class="width-5  input-border-btm" name="option[]" value="Uniform" id="vtype"/>
							  <div class="control__indicator"></div>
							</label>
							
							 <label class="control control--checkbox">Accessories
							  <input type="checkbox" class="width-5  input-border-btm" name="option[]" value="Accessories" id="vtype"/>
							  <div class="control__indicator"></div>
							</label>
							
							 <label class="control control--checkbox">More Services
							  <input type="checkbox" class="width-5  input-border-btm" name="option[]" value="More Services" id="vtype"/>
							  <div class="control__indicator"></div>
							</label>
										<label class="control control--checkbox">Online Boutique
							  <input type="checkbox" class="width-5  input-border-btm" name="option[]" value="Online Boutique" id="vtype"/>
							  <div class="control__indicator"></div>
							</label>            
                              </div>
							  <br>
                            <!--<button class="btn vd_bg-green vd_white width-10" type="submit" id="pdetail_button" style="margin-top:20px;">Save</button>-->
                            </div>							
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Select ID Type</label>
                              <div class="col-sm-5 controls">
								<select id="id_type" name="id_type" class="form-control">
                                  <option value="">Select Type</option>
                                   <option value="Pan Card">Pan Card</option>
								   <option value="Pass Port">Pass Port</option>
									<option value="Pan Card">Voter Card</option>
									<option value="Driving License">Driving License</option>
									<option value="Aadhar Card">Aadhar Card</option>								   
                                 </select>
                              </div>
                            </div>
						  
                            <div class="form-group">
                              <label class="col-sm-2 control-label">ID Proof</label>
                              <div class="col-sm-5 controls">
                                <input type="file"  name="id_proof" id="id_proof" >
                              </div>
                            </div>							
                            

							<div class="form-actions-condensed wizard">
                            <div class="row mgbt-xs-0">
                              <div class="col-sm-9 col-sm-offset-2"> 
							  		<a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a> 
									<!--<a class="btn vd_btn next" id="nextbut">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a> -->
									<button class="btn vd_bg-green vd_white width-10 next nextbut3"  type="submit" id="pdetail_button" >Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></button>
							   </div>
                            </div>
                          </div>							
							
							
                            <?php echo form_close();?>
                          </div>
                          <div class="tab-pane" id="tab24">
                          <?php echo form_open("",array("class"=>"form-horizontal","id"=>"chk_bdetail"));?>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Account Holder Name</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-50  input-border-btm" name="acount_holder" id="acount_holder" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Account Number</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-50  input-border-btm" name="acc_number" id="acc_number" onKeyPress="return isNumberKey(event)" maxlength="16">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Re-enter Account Number</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-50  input-border-btm" name="re_acc_number" id="re_acc_number" onKeyPress="return isNumberKey(event)" maxlength="16">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-2 control-label">IFSC</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-50  input-border-btm" name="bank_ifc" id="bank_ifc" >
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Bank Branch Name</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-50  input-border-btm" name="branch_name" id="branch_name">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Account Type</label>
                              <div class="col-sm-10 controls">
                                <input type="radio" class="width-5  input-border-btm" name="acc_type" value="Current">Current
                                <input type="radio" class="width-5  input-border-btm" name="acc_type" value="Saving" checked="checked">Saving
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Dealing IN</label>
                              <div class="col-sm-10 controls">
                                <input type="radio" class="width-5  input-border-btm aa" name="deal_type" value="VAt-GST" id="vat_gst">VAT-GST
                                <input type="radio" class="width-5  input-border-btm bb" name="deal_type" value="No" id="menu_hide" checked="checked">No
                              </div>
                              </div>
                              
                              <div id="menu_id" style="display: none;">
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Pan Number</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-5  input-border-btm" name="pan_number" id="pan_number">
                              </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Vat Number</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-5  input-border-btm" name="vat_number" id="vat_number">
                              </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label">Tin Number</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-5  input-border-btm" name="tin_number" id="tin_number">
                              </div>
                              </div>
							  <div class="form-group">
                                <label class="col-sm-2 control-label">GST Number</label>
                              <div class="col-sm-10 controls">
                                <input type="text" class="width-5  input-border-btm" name="gst_number" id="gst_number">
                              </div>
                              </div>
                              </div>
                            <!--<button class="btn vd_bg-green vd_white width-10" type="submit" id="bdetail_button">Save</button>-->
							
							<div class="form-actions-condensed wizard">
                            <div class="row mgbt-xs-0">
                              <div class="col-sm-9 col-sm-offset-2"> 
							  		<a class="btn vd_btn prev" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a> 
									<!--<a class="btn vd_btn next" id="nextbut">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a> -->						
									<button class="btn vd_btn next nextbut4" type="submit" id="bdetail_button">Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></button>
									
							   </div>
                            </div>
                          </div>                            
						  
                            <?php echo form_close();?>
                          </div>
                          <div class="tab-pane" id="tab25">
                          <?php echo form_open("",array("class"=>"form-horizontal","id"=>"ques"));?>
                            <div class="form-group">
                            <div class="col-md-12">
                              <label >What was the name of your elementary / primary school?</label>
                              <input type="text" class="form-control" name="question1" id="question1" required="">
                              </div>
                              <div class="col-sm-12 controls">
                                <div class="control-value"> What is your pet's name? </div>
                                <input type="text" class="form-control" name="question2" id="question2" required="">
                              </div>
                              
                              <div class="col-sm-12 controls">
                                <div class="control-value"> In what year was your father born?</div>
                                <input type="text" class="form-control" name="question3" id="question3" required="">
                              </div>
                              
                              <div class="col-sm-12 controls">
                                <div class="control-value"> What is the last name of the teacher who gave you your first failing grade?</div>
                                <input type="text" class="form-control" name="question4" id="question4" required="">
                              </div>
                              
                              <div class="col-sm-12 controls">
                                <div class="control-value"> What was the name of your elementary / primary school?</div>
                                <input type="text" class="form-control" name="question5" id="question5" required="">
                              </div>
                              <br>
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
                              <?php echo form_close();?>
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
 
<!-- Specific Page Scripts Put Here -->
<script type="text/javascript">
<?php  if(!$this->session->userdata('contact')){?>

<?php } ?>
</script>

<script type="text/javascript">
function Validation()
{
var a = document.form.contact.value;
if(a=="")
{
alert("please Enter the Contact Number");
document.form.contact.focus();
return false;
}
if(isNaN(a))
{
alert("Enter the valid Mobile Number(Like : 9566137117)");
document.form.contact.focus();
return false;
}
if((a.length < 1) || (a.length > 10))
{
alert(" Your Mobile Number must be 1 to 10 Integers");
document.form.contact.select();
return false;
}
}
</script>


<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'></script>
<script>   //no need to specify the language
 $(function(){
  $('#vat_gst').click(function() {
                $('#menu_id').show("fast");
        });
  $('#menu_hide').click(function() {
                $('#menu_id').hide("fast");
        });
  
  $("#submitbutton").click(function(e){ 
    var a=$('#token').val(); 
    if(a=="")
    {
      alert('Please Enter OTP Number');
    }
    
    $.ajax({
       url:'<?php echo base_url();?>index.php/Vendor/chk_token',
       type: 'POST',
       data: $("#chk_token").serialize(),
       success: function(respond){
           if(respond=='true')
           {
              alert('Your mobile number is verified successfully.Please Click on next..');
           }
           else
           {
             alert("Please enter valid OTP Number.");
			 $('#nextbut1').attr('disabled',true);
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
  $("#re_send").click(function(e){    
    $.ajax({
       url:'<?php echo base_url();?>index.php/Vendor/resend_otp',
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
$(function(){
  $("#pdetail_button").click(function(e){ 

    $.ajax({
       url:'<?php echo base_url();?>index.php/Vendor/registration_insert',
       type: 'POST',
       data: $("#chk_pdetail").serialize(),
       success: function(respond){
	   
       },
       error: function(respond){
        //console.log(respond);
       //alert("Fail");         
       }
   });
   e.preventDefault(); // could also use: return false;   
   

 });
});

</script>

<script>
$(function(){
  $("#chk_bdetail").submit(function(e){ 
    e.preventDefault();
    $.ajax({
       url:'<?php echo base_url();?>index.php/Vendor/registration_bank',
       type: 'POST',
       data: new FormData(this), 
        contentType: false,       
        cache: false,             
        processData:false,
       success: function(respond){ 

       },
   });
 });
});
</script>
<script>  
$(function(){
  $("#ques_button").click(function(e){ 
    var aa=$('#question1').val(); 
    var bb=$('#question2').val(); 
    var cc=$('#question3').val();  
    var hh=$('#question4').val(); 
    var gg=$('#question5').val(); 
    if(aa=="")
    {
      alert('All question compulsory.');
      return false;
    }
    if(bb=="")
    {
      alert('All question compulsory.');
      return false;
    }
    if(cc=="")
    {
      alert('All question compulsory.');
      return false;
    }
    if(hh=="")
    {
      alert('All question compulsory.');
      return false;
    }
    if(gg=="")
    {
      alert('All question compulsory.');
      return false;
    }
    
    $.ajax({
       url:'<?php echo base_url();?>index.php/Vendor/insert_question',
       type: 'POST',
       data: $("#ques").serialize(),
       success: function(respond){

          // $(".next").click();
           if(respond=='true')
           {
              $( "#login_button" ).prop( "disabled", false );
             // alert('All Question inserted Successfully.Please go to login...');
			  alert('You will get a confirmation call from Ansvel soon, Once your account will be activated, you will able to access your account.');
              window.location.href = "<?php echo base_url('Vendor');?>";
           }
           else
           {
             alert('Please Enter all Question.');
           }
       },
       error: function(respond){
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
	
	$('.nextbut4').attr('disabled',true);

		$('#branch_name').keyup(function(){
			if($(this).val().length !=0)
				$('.nextbut4').attr('disabled', false);            
			else
				$('.nextbut4').attr('disabled',true);
		})	
	

$(document).ready(function() {
  "use strict";

	$('#submit').attr('disabled',true);
<?php  if(!$this->session->userdata('contact')){?>	
	$('#nextbut').attr('disabled',true);
<?php } else{?>
	$('#nextbut').attr('disabled',false);
<?php } ?>
	
	$('#contact').keyup(function(){
		if($(this).val().length !=10)
			$('#submit').attr('disabled', true);            
		else
			$('#submit').attr('disabled',false);
	})	
	
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

  $("#nextbut").click(function(e){    
	  var mobileno = $("#contact").val();
	  if(mobileno == "")
	  {
		alert("Please Enter Mobile Number");
		return false();
	  }
  });
  
   $(".nextbut3").click(function(e){    
    var vname =$('#vendor_name').val(); 
    var a=$('#username').val(); 
    var b=$('#email').val(); 
    var c=$('#password').val();  
	var d = $('#address').val();  
	var e = $('#country').val();  
	var f = $('#state').val();  
	var g = $('#city').val();  
    var h=$('#pincode').val();  
  	var id_type = $('#id_type').val(); 
	var id_proof = $('#id_proof').val(); 	
	
    if(a=="")
    {
      alert('Please Enter username.');
      return false();
    }
    if(c=="")
    {
      alert('Please Enter Password.');
      return false();
    }
    if(vname=="")
    {
      alert('Please Enter Vendor Name.');
      return false();
    }	
    if(b=="")
    {
      alert('Please Enter Email.');
      return false();
    }	
	
	  
	  var getArrVal = $('input[type="checkbox"][name="option[]"]:checked').map(function(){
		return this.value;
	  }).toArray();
	  
	  if(getArrVal.length)
	  {
		//execute the code
		//$('#cont').html(getArrVal.toString());
		//alert('true');
	  } else {
		$(this).prop("checked",true);
		//$('#cont').html("At least one value must be checked!");
		alert('At least one value must be checked!');
		return false();
	  };		
    if(d == "")
    {
      alert('Please Enter Address.');
      return false();
    }
    if(e == "")
    {
      alert('Please Select Country Name.');
      return false();
    }	
    if(f == "")
    {
      alert('Please Select State Name.');
      return false();
    }		
    if(g == "")
    {
      alert('Please Select City Name.');
      return false();
    }		
    if(h == "")
    {
      alert('Please Enter Pincode.');
      return false();
    }		
    if(id_type=="")
    {
      alert('Please Select ID Type.');
      return false();
    }
	if(id_proof.lastIndexOf("jpg")===id_proof.length-3 || id_proof.lastIndexOf("png")===id_proof.length-3)
	{
		return true;
	}
    else
	{
        alert("Select ID Proof jpg or png format");	
		return false();
	}	
	
		
 });  
  
   $(".nextbut4").click(function(e){      
    var aaa=$('#acc_number').val(); 
    var aaaa =$('#re_acc_number').val(); 
    var bbb=$('#acount_holder').val(); 
    var ccc=$('#bank_ifc').val();   
	var ddd = $('#branch_name').val();   


    if(aaa.length<16)
	{
        alert("Account No. 16 character long");
        return false();
    }
    if(aaaa.length<16)
	{
        alert("Confirm Account no. 16 character long");
        return false();
    }
    if(bbb.length<8)
	{
        alert("Holder Name  8 character long");
        return false();
    }		
    if(ccc.length<8)
	{
        alert("IFSC Code 8 character long");
        return false();
    }	
    if(ddd.length<8)
	{
        alert("Branch Name 8 character long");
        return false();
    }			
	
    if(aaa=="")
    {
      alert('Please Enter Account Number.');
      return false();
    }
    if(aaaa=="")
    {
      alert('Please Re-enter Account Number.');
      return false();
    }	
    if ($('#acc_number').attr('value') !== $('#re_acc_number').attr('value'))
	{
      alert('Account Number Not Matche.');
      return false();
    }	
	
    if(bbb=="")
    {
      alert('Please Enter Branch Name.');
      return false();
    }
    if(ccc=="")
    {
      alert('Please Enter IFSC code.');
      return false();
    }
 });
 });

</script>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>					-->	
<script type="text/javascript">
$(document).ready(function(){
	$('.nextbut4').click(function(evt) { 
		evt.preventDefault();
		if ($('#acc_number').val() === $('#re_acc_number').val()) 
		{
			//alert('values match');
			//evt.preventDefault();
			
		} else {
			alert('Account Number not match');
			evt.preventDefault();
			return false();
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
			url: "<?php echo base_url();?>index.php/Vendor/selectcontry",
			data: { country : country } 
		}).done(function(data){ 
			$("#states").html(data);	
		});
	});
});
</script>


<!--<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>-->
<script src="<?php echo base_url();?>mailgun/mailgun_validator.js"></script>
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
        $('#status').html("<img src='<?php  echo base_url();?>mailgun/loading.gif' height='16'/>");
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
