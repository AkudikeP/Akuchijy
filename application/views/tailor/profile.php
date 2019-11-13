 <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css"><div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Ansvel Tailor</h1>
              <!--<small class="subtitle">Form for user profile</small> --></div>
          </div>
          
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-sm-12">
                <div class="panel widget light-widget">
                  <div class="panel-heading no-title"> </div>
                  <form enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url();?>Tailor/profile_update" role="form" method="post">
                    <div  class="panel-body">
                    <!--  <h2 class="mgbt-xs-20"> Profile: <span class="font-semibold">Mariah Carayban</span> </h2>
                      <br/>-->
                      <div class="row">
                        <div class="col-sm-9">
                          <h3 class="mgbt-xs-15">Change Password</h3>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input disabled="disabled" type="temail" value="<?php echo $tailor->temail;?>"  placeholder="email@yourcompany.com">
                                </div>
                                <!-- col-xs-12 -->
                                
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Old Password</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="password" class="width-40" id="opassword"  placeholder="Old Password">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">New Password</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="password" class="width-40" id="npassword"  placeholder="New Password">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="password" id="cpassword" class="width-40"  placeholder="Confirm Password">
                                  <button id="changep" class="btn btn-success pull-right">Change Password</button>
                                </div>
                                
                                <!-- col-xs-12 --> 
                              </div><span class="error text-danger" id="error"></span>
                              <!-- row --> 
                            </div>
                            
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <hr />
                          <h3 class="mgbt-xs-15">Profile Setting</h3>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Tailor Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" required name="tname" value="<?php echo $tailor->tname;?>"  placeholder="Tailor Name">
                                </div>
                                <!-- col-xs-9 -->
                                
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>

                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Gender </span></label>
                            <div class="col-lg-9">
                              <div class="vd_radio radio-success">
                             <input type="radio"    value="male"  name="gender" <?php if($tailor->gender=="male"){echo "checked";}?>  id="feature"> 
                                <label for="feature">Male</label>
                                  <input type="radio"  value="female" name="gender" id="feature1" <?php if($tailor->gender=="female"){echo "checked";}?>>
                                <label for="feature1">Female</label>
                              </div>
                             
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Contact Number</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="tphone" value="<?php echo $tailor->tphone;?>" placeholder="mobile phone">
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="email" name="temail" placeholder="Email" value="<?php echo $tailor->temail;?>">
                                </div>
                                <!-- col-xs-9 -->
                                
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label">City</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="tcity" value="<?php echo $tailor->tcity;?>" placeholder="City">
                                </div>
                                <!-- col-xs-12 -->                                
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group --> 

                          <div class="form-group">
                            <label class="col-sm-3 control-label">State</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="tstate" value="<?php echo $tailor->tstate;?>" placeholder="State">
                                </div>
                                <!-- col-xs-12 -->                                
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Shop Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="shopname" value="<?php echo $tailor->shopname;?>" placeholder="Shop Name">
                                </div>
                                <!-- col-xs-12 -->                                
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Shop Contact Number</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="tshop_number" value="<?php echo $tailor->tshop_number;?>" placeholder="Shop Contact Number">
                                </div>
                                <!-- col-xs-12 -->                                
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Shop Address</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="tshop_address" value="<?php echo $tailor->tshop_address;?>" placeholder="Shop Address">
                                </div>
                                <!-- col-xs-12 -->                                
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Land Mark</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="landmark" value="<?php echo $tailor->landmark;?>" placeholder="Land Mark">
                                </div>
                                <!-- col-xs-12 -->                                
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Pincode</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="pincode" value="<?php echo $tailor->pincode;?>" placeholder="Pincode">
                                </div>
                                <!-- col-xs-12 -->                                
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->                          
                          <hr/>                        
                          <h3 class="mgbt-xs-15">Additional Information</h3>
                          <hr/>
                        
                          <div class="form-group">
                            <label for="weight" class="control-label col-lg-3">Specialization</label>
                            <div class="col-lg-9">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="vd_checkbox checkbox-success">
                                    <input type="checkbox" <?php if (strpos($tailor->speciliazation, 'Gents')!==false) { echo 'checked';}?> name="speciliazation[]" id="checkbox-1" value="Gents">
                                    <label for="checkbox-1">Gents </label>
                                    <input type="checkbox" <?php if (strpos($tailor->speciliazation, 'Ladies')!==false) { echo 'checked';}?> speciliazation[]" id="checkbox-6" value="Ladies">
                                    <label for="checkbox-6">Ladies </label>                                    
                                    <input type="checkbox" <?php if (strpos($tailor->speciliazation, 'Kids')!==false) { echo 'checked';}?> name="speciliazation[]"  id="checkbox-2" value="Kids">
                                    <label for="checkbox-2">Kids </label>
                                    
                                  </div>
                                </div>
                                
                              </div>
                               </div>
                          </div>

                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">Whould you prefer payment through app/intenet banking? </span></label>
                            <div class="col-lg-9">
                              <div class="vd_radio radio-success">
                             <input type="radio"    value="yes"  name="payment_type" <?php if($tailor->payment_type=="yes"){echo "checked";}?>  id="featureq"> 
                                <label for="featureq">Yes</label>
                                  <input type="radio"  value="no" name="payment_type" id="feature1q" <?php if($tailor->payment_type=="no"){echo "checked";}?>>
                                <label for="feature1q">No</label>
                              </div>
                             
                            </div>
                          </div>
                        </div>
                        <!-- col-sm-12 --> 
                      </div>
                      <!-- row --> 
                      
                    </div>
                    <!-- panel-body -->
                    <div class="pd-20">
                      <button type="submit" name="submit" class="btn vd_btn vd_bg-green col-md-offset-3"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Update Details</button>
                    </div>
                  </form>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-sm-12--> 
            </div>
            <!-- row --> 
            
          </div>
          
<!-- Footer END -->
  

</div>

<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script> 
<script>
		  $(document).ready(function(){ //alert("Adsf");

		$("#changep").click(function(e){e.preventDefault();

			var op=$("#opassword").val();

			var np=$("#npassword").val();

			var cp=$("#cpassword").val();
		
			if(op=="" || cp=="" || np=="")
			{
				$("#error").html("Please Fill all the fields.");

				return false;
			}

			if(np!=cp)

			{

				$("#error").html("Password Doesnot Match");

				return false;

			}

			$.ajax({

				 type: "POST",

				 url: '<?php echo base_url();?>Tailor/change_pass',

				 data: {op:op,cp:cp,np:np},

				 success: function(response){

					//alert(response);

					 $("#error").html(response);

					 }

				 });

		});

		});
		  </script>
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

<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/jquery-ui/jquery-ui.custom.min.js'></script>


<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/canvas-to-blob.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The File Upload processing plugin -->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload UI plugin -->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"></script>


</body>

</html>