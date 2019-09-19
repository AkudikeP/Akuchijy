 <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css"><div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>MobileDarji Vendor</h1>
              <!--<small class="subtitle">Form for user profile</small> --></div>
          </div>

          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-sm-12">
                <div class="panel widget light-widget">
                  <div class="panel-heading no-title"> </div>
                  <form enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url();?>Vendor/profile_update" role="form" method="post">
                    <div  class="panel-body">
                    <!--  <h2 class="mgbt-xs-20"> Profile: <span class="font-semibold">Mariah Carayban</span> </h2>
                      <br/>-->
                      <div class="row">
                        <div class="col-sm-3 mgbt-xs-20">
                          <!--div class="form-group">
                            <div class="col-xs-12">
                              <div class="form-img text-center mgbt-xs-15"> <img alt="example image" src="<?php echo base_url();?>assets/images/<?php echo $vendor->image;?>"> </div>
                              <span class="btn vd_btn vd_bg-green fileinput-button text-center"> <i class="glyphicon glyphicon-plus"></i> <span>Change Your Profile Image</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <!--input  type="file" name="photo">
                    </span>
                              <br/>
                              <div>
                              </div>
                            </div>
                          </div-->
                        </div>
                        <div class="col-sm-9">
                          <h3 class="mgbt-xs-15">Change Password</h3>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input disabled="disabled" type="email" value="<?php echo $vendor->email;?>"  placeholder="email@yourcompany.com">
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
                            <label class="col-sm-3 control-label">Vendor Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" required name="username" value="<?php echo $vendor->vendor_name;?>"  placeholder="full name">
                                </div>
                                <!-- col-xs-9 -->

                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Select Your Vendor Type </label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input disabled type="checkbox" id="c1" name="option[]"  value="Fabric" <?php if (strpos($vendor->option, 'Fabric')!==false) { echo 'checked';}?>>Fabric
                          <input disabled type="checkbox" id="c2" name="option[]"  value="Uniform" <?php if (strpos($vendor->option, 'Uniform')!==false) { echo 'checked';}?>>Uniform
                          <input disabled type="checkbox" id="c3" name="option[]"  value="Accessories" <?php if (strpos($vendor->option, 'Accessories')!==false) { echo 'checked';}?>>Accessories
                          <input disabled type="checkbox" id="c4" name="option[]"  value="More Services" <?php if (strpos($vendor->option, 'More Services')!==false) { echo 'checked';}?>>More Services
                          <input disabled type="checkbox" id="c5" name="option[]"  value="Online Boutique" <?php if (strpos($vendor->option, 'Online Boutique')!==false) { echo 'checked';}?>>Online Boutique
                                </div>
                                <div class="alert alert-danger col-md-12 pull-right" style="position: relative;">
                          <strong>Note:</strong> To become another category vendor please contact our sales team on 9644409191
                          </div>
                                <!-- col-xs-9 -->

                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>


                          <div class="form-group">
                            <label class="col-sm-3 control-label">Address</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <textarea rows="3" name="address"><?php echo $vendor->address;?></textarea>
                                </div>
                                <!-- col-xs-12 -->

                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Country</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <select id="" name="country" required>
                                  <option value="">Select Country</option>
                                  <?php
                                  $this->db->group_by("country_name");
                                  $country=$this->db->get("country_state_city")->result();
                                    foreach($country as $country)
                                    {
                                      $cotry=$this->db->get_where("countries",array("id"=>$country->country_name))->row();
                                  ?>
                                    <option value="<?php echo $country->country_name;?>" <?php if($vendor->country==$cotry->id){echo "selected";}?>><?php echo $cotry->name;?></option>
                                    <?php }?>
                                 </select>                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">State</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <select id="" name="state" required>
                                  <option value="">Select State</option>
                                  <?php
                                  $this->db->group_by("state_name");
                                  $state=$this->db->get("country_state_city")->result();
                                    foreach($state as $state)
                                    {
                                      $statese=$this->db->get_where("states",array("id"=>$state->state_name))->row();
                                  ?>
                                    <option value="<?php echo $state->state_name;?>" <?php if($statese->id==$vendor->state){echo "selected";}?>><?php echo $statese->name;?></option>
                                    <?php }?>
                                 </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">City</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <select id="" name="city" required>
                                  <?php
                                  $this->db->group_by("city_name");
                                  $city=$this->db->get("country_state_city")->result();
                                    foreach($city as $city)
                                    {
                                      $cities=$this->db->get_where("cities",array("id"=>$city->city_name))->row();
                                  ?>
                                    <option value="<?php echo $city->city_name;?>" <?php if($cities->id==$vendor->city){echo "selected";}?>><?php echo $cities->name;?></option>
                                    <?php }?>
                                 </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- form-group -->

                          <hr/>
                          <h3 class="mgbt-xs-15">Contact Setting</h3>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Contact Number</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="contact" value="<?php echo $vendor->contact;?>" placeholder="mobile phone">
                                </div>
                                <!-- col-xs-12 -->
                                <input type="hidden" name="oldimage" value="<?php echo $vendor->image;?>" />
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <!--div class="form-group">
                            <label class="col-sm-3 control-label">Phone 1</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="phone2" value="<?php echo $vendor->phone2;?>" placeholder="mobile phone">
                                </div>
                                <!-- col-xs-12 -->

                              <!--/div>
                              <!-- row -->
                            <!--/div>
                            <!-- col-sm-10 -->
                          <!--/div-->
                          <!-- form-group -->

                          <hr/>
                          <h3 class="mgbt-xs-15">Bank Details</h3>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Account Holder Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="account_holder" value="<?php echo $vendor->account_holder;?>" placeholder="Account Number">
                                </div>
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Account Number</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="acc_number" value="<?php echo $vendor->acc_number;?>" placeholder="Account Number">
                                </div>
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Branch Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="branch_name" value="<?php echo $vendor->branch_name;?>" placeholder="Branch Name">
                                </div>
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <!-- form-group -->

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Bank IfS Code</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" name="bank_ifc" value="<?php echo $vendor->bank_ifc;?>" placeholder="Bank Ifsc Code">
                                </div>
                                <!-- col-xs-12 -->

                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                              <label class="col-sm-3 control-label">Account Type</label>
                              <div class="col-sm-9 controls">
                                <input type="radio" class="width-5  input-border-btm" name="acc_type" value="Current" <?php if($vendor->acc_type=='Current') echo 'checked' ;?>>Current
                                <input type="radio" class="width-5  input-border-btm" name="acc_type" value="Saving" <?php if($vendor->acc_type=='Saving') echo 'checked' ;?>>Saving
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Dealing IN</label>
                              <div class="col-sm-9 controls">
                                <input type="radio" class="width-5  input-border-btm aa" name="deal_type" value="VAt-GST" id="vat_gst" <?php if($vendor->deal_type=='VAt-GST') echo 'checked' ;?>>VAT-GST
                                <input type="radio" class="width-5  input-border-btm bb" name="deal_type" value="No" id="menu_hide" <?php if($vendor->deal_type=='No') echo 'checked' ;?>>No
                              </div>
                            </div>
                            <div id="menu_id" <?php if($vendor->deal_type=='No') echo 'style="display: none' ; else echo 'style="display: block';?>">
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Pan Number</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="width-5  input-border-btm" name="pan_number" id="pan_number" value="<?php echo $vendor->pan_number;?>">
                              </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Vat Number</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="width-5  input-border-btm" name="vat_number" id="vat_number" value="<?php echo $vendor->vat_number;?>">
                              </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label">Tin Number</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="width-5  input-border-btm" name="tin_number" id="tin_number" value="<?php echo $vendor->tin_number;?>">
                              </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-3 control-label">GST Number</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="width-5  input-border-btm" name="gst_number" id="gst_number" value="<?php echo $vendor->gst_number;?>">
                              </div>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-3 control-label">Select ID Type</label>
                              <div class="col-sm-9 controls">
								<select id="id_type" name="id_type" class="form-control">
                                  <option value="">Select Type</option>
                                   <option <?php if($vendor->id_type=='Pan Card'){echo "selected";} ?> value="Pan Card">Pan Card</option>
								                   <option <?php if($vendor->id_type=='Pass Port'){echo "selected";} ?> value="Pass Port">Pass Port</option>
									                 <option <?php if($vendor->id_type=='Voter Card'){echo "selected";} ?> value="Voter Card">Voter Card</option>
									                 <option <?php if($vendor->id_type=='Driving License'){echo "selected";} ?> value="Driving License">Driving License</option>
									                 <option <?php if($vendor->id_type=='Aadhar Card'){echo "selected";} ?> value="Aadhar Card">Aadhar Card</option>
                                 </select>
                              </div>
                            </div>

                              <div class="form-group">
                                <label class="col-sm-3 control-label">ID Proof</label>
                              <div class="col-sm-9 controls">
                                <input type="file" class="width-5  input-border-btm" name="photo" id="gst_number" >
                                <input type="hidden" class="width-5  input-border-btm" name="oldimage" id="gst_number" value="<?php echo $vendor->image; ?>">
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

        $('#vat_gst').click(function() {
                $('#menu_id').show("fast");
        });
  $('#menu_hide').click(function() {
                $('#menu_id').hide("fast");
        });

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

				 url: '<?php echo base_url();?>Vendor/change_pass',

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
