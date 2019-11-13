<style>
.active100
{
	background-color:#1fae66 !important;
}
</style>


<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">

          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>List Of All Tailors</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 mgbt-sm-15">
                <div class="vd_status-widget vd_bg-green widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu -->

                  <a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="fa fa-cube"></i> </span> <span class="menu-value">
                  <?php echo $totalu;?>
                  </span> </div>
                  <div class="menu-text clearfix"> Registered Tailors </div>
                  </a> </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 mgbt-sm-15">
                <div class="vd_status-widget vd_bg-red  widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu -->

                  <a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="icon-bars"></i> </span> <span class="menu-value"> 10% </span> </div>
                  <div class="menu-text clearfix"> Average Gross Margin </div>
                  </a> </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 mgbt-xs-15">
                <div class="vd_status-widget vd_bg-blue widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu -->

                  <a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="fa fa-comments"></i> </span> <span class="menu-value"> 108 </span> </div>
                  <div class="menu-text clearfix"> Product Reviews </div>
                  </a> </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 mgbt-xs-15">
                <div class="vd_status-widget vd_bg-yellow widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu -->

                  <a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="fa fa-power-off"></i> </span> <span class="menu-value"> 10 </span> </div>
                  <div class="menu-text clearfix"> Disabled Products </div>
                  </a> </div>
              </div>
            </div>
            <div class="row">
<div class="pull-left col-md-12">
<a href="<?php echo base_url(); ?>product/all_tailors"><button class="btn btn-primary">Excel</button></a>
      </div>
      
              <div class="col-md-<?php  if($this->uri->segment(3)){echo 8;}else{echo 12;}?>" id="table">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey"><button class="btn btn-info btn-xs pull-right" id="show">Add Tailor</button>
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Tailors</h3>

                  </div>
                  

                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>ID</th>
                          <th>Registration&nbspDate</th>
                          <th>Details</th>

                          <th>Orders</th>
                          <th>Account Status</th>
                          <th style="width: 100px">&nbsp&nbsp&nbspAction&nbsp&nbsp&nbsp</th>
                        </tr>
                      </thead>
                      <tbody>


                         <?php $i=1;foreach($tailors as $user){?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td class="center"><?php echo 'TMD00'.$user->id;?></td>
                          <td class="center"><center><?php echo $user->tdate;?></center></td>

                          <td width="100px;"><?php echo $user->tname;?><br/><?php echo $user->temail;?><br/><?php echo $user->tphone;?>
                          <br/><span class="rating3" id="s<?php echo $i; ?>">

<span class="test" id="f_5">&#x2606</span><span class="test" id="f_4">&#x2606</span><span class="test" id="f_3">☆</span><span class="test" id="f_2">☆</span><span class="test" id="f_1">☆</span>

</span>
<?php $total_rat=0;
$rating = $this->db->get_where('tailor_rating',array('tid'=>$user->id));
      $rat_num =$rating->num_rows();
      $rat_data =$rating->result();
 if(!empty($rat_data) and $rat_num>0)
      {
      foreach ($rat_data as $value) {
        $total_rat += $value->rating;
      }
      //echo "abc";
      $rating = $total_rat/$rat_num;
      //echo $rating;
    }
     else{
      $rating =0;
    }
//echo "rating".$rating; ?>
 <style type="text/css"><?php

 for($j=1;$j<=$rating;$j++)
    {?>

   #s<?php echo $i; ?> #f_<?php echo $j; ?>:before{
   content: '\2605';
  position: absolute;


}



   <?php } ?>
   </style>

   </td>
                          <td ><?php
                          $where = "(sstatus='Accpted' OR sstatus='Started' OR sstatus='Completed')";
                          $this->db->where($where);
                          echo $this->db->get_where("tailor_assign",array('tid'=>$user->id))->num_rows();
                          //echo $this->db->last_query();?></td>
                          <td><?php echo $user->status;?></td>

                          <td class="center">
                         <a data-toggle="tooltip" title="View" class="btn btn-xs btn-success" href="<?php echo base_url();?>index.php/product/tailors_account/<?php echo $user->id;?>"><i class="fa fa-eye"></i></a><a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/product/tailors/<?php echo $user->id;?>"><i class="fa fa-edit"></i></a><button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red tailor_del" id="<?php echo $user->id;?>" type="button"><i class="fa fa-trash-o"></i></button><?php if($user->status=='enable'){echo"<button data-toggle='tooltip' title='Enable' class='btn btn-xs btn-success services_disable' id='$user->id'><i class='fa fa-lightbulb-o'></i></button>";}else{echo "<button data-toggle='tooltip' title='Disable' class='btn btn-xs btn-danger services_enable' id='$user->id'><i class='fa fa-lightbulb-o'></i></button>";}?></td>
                        </tr>
                        <?php $i++;}?>

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget -->
              </div>
              <div class="col-md-4" id="tform" <?php  if(!$this->uri->segment(3)){?> style="display:none;"<?php }?>>
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Add New Tailor</h3>

                  </div>
                  <div class="panel-body table-responsive">
                     <?php
				  if($this->uri->segment(3))
					{
						$cedit=$this->db->get_where("tailors",array("id"=>$this->uri->segment(3)))->row();
						/*echo form_open_multipart("product/Add_tailor/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                         <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tname" type="text" value="<?php echo $cedit->tname;?>" required placeholder="Tailor Name">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="temail" type="text"  value="<?php echo $cedit->temail;?>" required placeholder="Tailor Name">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Contact</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tphone" type="text" value="<?php echo $cedit->tphone;?>" required placeholder="Tailor Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9 controls">
                        <textarea class="" name="taddress" rows="2" placeholder="Tailor Address"><?php echo $cedit->taddress;?></textarea>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Citykk</label>
                        <div class="col-sm-9 controls">

													<input class="" name="tcity" type="text" required value="<?php echo $cedit->tcity;?>" placeholder="Tailor City">
                        </div>

                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tstate" type="text" required  placeholder="Tailor State">
                        </div>
                      </div>
                      <div class="form-group">
                            <label for="weight" class="control-label col-lg-3">Stitches</label>
                            <div class="col-lg-9">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="vd_checkbox checkbox-success">
                                  <?php $st=$this->db->get("category")->result();
								  $c=explode(",",$cedit->cats);
								  foreach($st as $st){?>
                                   <input type="checkbox" <?php if(in_array($st->cid,$c)){echo "checked";}?>  name="cat[]" id="checkbox-<?php echo $st->cid;?>" value="<?php echo $st->cid;?>">
                                    <label for="checkbox-<?php echo $st->cid;?>"><?php echo $st->cat_name;?> </label>
                                   <?php }?>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

                      <div class="form-group">

                      <label class="col-sm-3 control-label">Profile Image</label>

                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Change Image</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile">
                     <input type="hidden" name="oldt" value="<?php echo $cedit->timg;?>" />
                <img class="img img-responsive" src="<?php echo base_url();?>assets/tailors/<?php echo $cedit->timg;?>" />
                    </span></div>

                    </div>
                      <div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Update Tailor Details</button>
                    </span></div>

                    <?php echo form_close();*/

                              echo form_open_multipart("product/Add_tailor/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                    

                      <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9 controls">
                          <input class="" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$"  required="required" maxlength="20" name="tname" type="text" value="<?php echo $cedit->tname;?>" required placeholder="Name">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="temail" value="<?php echo $cedit->temail;?>" data-validation="email" type="email" required placeholder="Email">
                        </div>
                      </div>
                     
                    
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Contact</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tphone"  value="<?php echo $cedit->tphone;?>" pattern="[0-9]{10}" title="10 digit contact number" maxlength="10" type="text" required placeholder="Contact">
                        </div>
                      </div>
                      <!--new-->
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Account Number</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="acc_no" value="<?php echo $cedit->acc_no;?>" type="text" required placeholder="Account Number" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Account Holder Name</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="acc_holder_name" type="text" value="<?php echo $cedit->acc_holder_name;?>" required placeholder="Account Holder Name" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Bank Name </label>
                        <div class="col-sm-9 controls">
                          <input class="" name="bank_name" type="text" value="<?php echo $cedit->bank_name;?>" required placeholder="Bank Name" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Branch Name</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="branch_name" type="text" value="<?php echo $cedit->branch_name;?>" required placeholder="Branch Name" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">IFSC Code</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="ifsc_code" type="text" required value="<?php echo $cedit->ifsc_code;?>" placeholder="IFSC Code" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Branch Code</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="branch_code" type="text" value="<?php echo $cedit->branch_code;?>" required placeholder="Branch Code" >
                        </div>
                      </div>

                      <!--new-->
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9 controls">
                        <textarea class="" name="taddress" rows="2" placeholder="Tailor Address" required=""><?php echo $cedit->taddress;?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-9 controls">
                        <input type="radio" name="gender" value="male" <?php if($cedit->gender=='male'){ echo "checked"; } ?> required="">&nbspmale
                        <input type="radio" name="gender" value="female" <?php if($cedit->gender=='female'){ echo "checked"; } ?> required="">&nbspfemale
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-3 control-label">Shop Name</label>
                        <div class="col-sm-9 controls">
                        <input type="text" data-validation="custom" value="<?php echo $cedit->shopname;?>" data-validation-regexp="^([a-zA-Z ]+)$" required name="shopname" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Shop Number</label>
                        <div class="col-sm-9 controls">
                        <input type="text" name="shopnumber" data-validation="custom" value="<?php echo $cedit->tshop_number;?>" data-validation-regexp="^([a-zA-Z0-9 ]+)$" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Shop Landkmark</label>
                        <div class="col-sm-9 controls">
                        <input type="text" data-validation="custom" value="<?php echo $cedit->landmark;?>" data-validation-regexp="^([a-zA-Z ]+)$" name="shopland" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Shop Address</label>
                        <div class="col-sm-9 controls">

                          <textarea class="" name="shopaddress" rows="2" placeholder="Shop Address"><?php echo $cedit->tshop_address;?></textarea>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9 controls">

                          <select class="input--wd input--wd--full" name="tstate" id="bstate" value="<?php echo $cedit->tstate;?>" required autocomplete="off">

                            <option value="">select</option>

                              <?php
                              $states = $this->db->get('states')->result();
                                  foreach ($states as $value) {
                                    ?>
                                     <option value="<?php echo $value->id; ?>" <?php if($value->id==$cedit->tstate){
                                      echo "Selected";
                                      } ?>><?php echo $value->name; ?></option>
                                    <?php
                                  }
                               ?>


                          </select>

                        </div>
                      </div>
                       <div class="form-group">



                          <span id="city_select">
                          <input type="hidden" value="<?php echo $cedit->tcity;?>" name="shopland" value="">
                          </span>

                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Pin Code</label>
                        <div class="col-sm-9 controls">
                        <input type="number" pattern="[0-9]{6}" value="<?php echo $cedit->pincode;?>" title="6 digits pin code" maxlength="6" name="pin" value="" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Specilization</label>
                        <div class="col-sm-9 controls">
                        <?php $sp_check = explode(',',$cedit->speciliazation); ?>
<input type="checkbox" name="sp[]" <?php if (in_array("Ladies", $sp_check)){echo "checked";} ?> value="Ladies">&nbspLadies<br>
                        <input type="checkbox" name="sp[]" <?php if (in_array("Gents", $sp_check)){echo "checked";} ?> value="Gents">&nbspGents<br>
                        <input type="checkbox" name="sp[]" <?php if (in_array("Kids", $sp_check)){echo "checked";} ?> value="Kids">&nbspKids<br>
                        </div>
                      </div>
                       <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Would you prefer payment through app/internet banking?   </span></label>
                             <div class="col-sm-9 controls">
                        <input type="radio" name="payment_type" value="yes" <?php if($cedit->payment_type=='yes'){ echo "checked"; } ?> required="">&nbspYes
                        <input type="radio" name="payment_type" value="no" <?php if($cedit->payment_type=='no'){ echo "checked"; } ?> required="">&nbspNo
                        </div>
                          </div>



                      <div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Update Tailor</button>
                    </span></div>
                    <?php echo form_close();


					}
					else
					{
				  echo form_open_multipart("product/Add_tailor",array("class"=>"form-horizontal"));?>
                      <!--<div class="form-group">
                        <label class="col-sm-3 control-label">Main Category</label>
                        <div class="col-sm-9 controls">
                          <select class="form-control" name="mcat">
                          	<option value="">Select Main Category</option>
                           <?php foreach($cats as $cat1){?>
                           <option value="<?php echo $cat1->mid;?>"><?php echo $cat1->mcat_name;?></option>
                           <?php }?>
                          </select>
                        </div>
                      </div>-->

                      <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9 controls">
                          <input class="" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$"  required="required" maxlength="20" name="tname" type="text" placeholder="Name">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="temail" data-validation="email" type="email" required placeholder="Email">
                        </div>
                      </div>
											<div class="form-group">
											 <label class="col-sm-3 control-label">Password</label>
											 <div class="col-sm-9 controls">
												 <input class="" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" required>
											 </div>
										 </div>
										 <div class="form-group">
											<label class="col-sm-3 control-label">Retype Password</label>
											<div class="col-sm-9 controls">
												<input class="" name="repassword" id="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" required>
											</div>
										</div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Contact</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tphone" pattern="[0-9]{10}" title="10 digit contact number" maxlength="10" type="text" required placeholder="Contact">
                        </div>
                      </div>
                      <!--new-->
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Account Number</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="acc_no" type="text" required placeholder="Account Number" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Account Holder Name</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="acc_holder_name" type="text" required placeholder="Account Holder Name" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Bank Name </label>
                        <div class="col-sm-9 controls">
                          <input class="" name="bank_name" type="text" required placeholder="Bank Name" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Branch Name</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="branch_name" type="text" required placeholder="Branch Name" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">IFSC Code</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="ifsc_code" type="text" required placeholder="IFSC Code" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Branch Code</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="branch_code" type="text" required placeholder="Branch Code" >
                        </div>
                      </div>

                      <!--new-->
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9 controls">
                        <textarea class="" name="taddress" rows="2" placeholder="Tailor Address" required=""></textarea>
                        </div>
                      </div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Gender</label>
												<div class="col-sm-9 controls">
												<input type="radio" name="gender" value="male" required="">&nbspmale
												<input type="radio" name="gender" value="female" required="">&nbspfemale
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">Shop Name</label>
												<div class="col-sm-9 controls">
												<input type="text" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" required name="shopname" value="">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Shop Number</label>
												<div class="col-sm-9 controls">
												<input type="text" name="shopnumber" data-validation="custom" data-validation-regexp="^([a-zA-Z0-9 ]+)$" value="">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Shop Landkmark</label>
												<div class="col-sm-9 controls">
												<input type="text" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" name="shopland" value="">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Shop Address</label>
												<div class="col-sm-9 controls">

												  <textarea class="" name="shopaddress" rows="2" placeholder="Shop Address"></textarea>
												</div>
											</div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9 controls">

													<select class="input--wd input--wd--full" name="tstate" id="bstate" required autocomplete="off">

														<option value="">select</option>

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
                       <div class="form-group">



													<span id="city_select">

													</span>

                      </div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Pin Code</label>
												<div class="col-sm-9 controls">
												<input type="number" pattern="[0-9]{6}" title="6 digits pin code" maxlength="6" name="pin" value="" required="">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Specilization</label>
												<div class="col-sm-9 controls">
												<input type="checkbox" name="sp[]" value="Ladies">&nbspLadies<br>
												<input type="checkbox" name="sp[]" value="Gents">&nbspGents<br>
												<input type="checkbox" name="sp[]" value="Kids">&nbspKids<br>
												</div>
											</div>
                       <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Would you prefer payment through app/internet banking?   </span></label>
                             <div class="col-sm-9 controls">
                        <input type="radio" name="payment_type" value="yes" required="">&nbspYes
                        <input type="radio" name="payment_type" value="no" required="">&nbspNo
                        </div>
                          </div>



                      <div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Add Tailor</button>
                    </span></div>
                    <?php echo form_close();}?>
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
  <footer class="footer-1"  id="footer">
    <div class="vd_bottom ">
        <div class="container">
            <div class="row">
              <div class=" col-xs-12">
                <div class="copyright">
                  	Copyright &copy;2016 Ansvel All Rights Reserved
                </div>
              </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
  </footer>
<!-- Footer END -->


</div>

<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
//alert('kk');
	$.validate({
		lang: 'en'
	});
</script>


<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>adminassets/css/bundled.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/jquery-confirm.css"/>
    <script src="<?php echo base_url();?>adminassets/js/bundled.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery-confirm.js"></script>
<script>
					$(document).ready(function(){
						$("#password").change(pass_match);
						$("#confirm_password").keyup(pass_match);

						function pass_match(){
							console.log('yes alive');
						var pass1 = jq("#password").val();
						var pass2 = jq("#confirm_password").val();
						if(pass1==pass2)
						{
								jq("#signup").removeAttr("disabled");
								jq("#error").html("");
						}else{
								jq("#signup").attr("disabled","disabled");
									jq("#error").html("Password Does not matches.");
						}

						}

						$("#bstate").change(function() {
						    var sid = $(this).val();
						    $.ajax({
						        type : "POST",
						        url : "<?php echo base_url('index.php/product/selectstat_oncheckout');?>",
						        data : {sid:sid},
						        success: function(data){
						      //alert(data);
						          if(data){
						          $("#city_select").html(data);
						          }
						      }
						    });
						});

					$("#show").click(function(){
						$("#table").toggleClass("col-md-8","col-md-12");
						$("#tform").toggle();
					});

                                 $(".tailor_del").click(function(){

               var thisvari = $(this);
                   $.confirm({
                           title: 'Confirmation',
                            content: 'Are you sure want to delete this?',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Yes',
                                    btnClass: 'btn-info',
                                    action: function () {
                                       var sid=thisvari.attr('id');
                                       console.log(sid);
              thisvari.closest("tr").remove();
              $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/product/tailor_del',
               data: {sid:sid},
               success: function(response){
                 console.log(response);
               }
               });
                                        }
                                },
                                cancel: function () {
                                    //$.alert('you clicked on <strong>cancel</strong>');
                                },
                               }

                        });


            });
                              $(".services_disable").click(function(){
        //alert('yes');
         var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to disable this?',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Yes',
                                    btnClass: 'btn-info',
                                    action: function () {
                                       var sid=thisvari.attr('id');
                                       thisvari.removeClass("btn-success");
                                       thisvari.addClass("btn-danger");
                                        $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Product/tailor_disable',
               data: {sid:sid},
               success: function(response){
                 //alert(response);
               }
               });

                                    }
                                },
                                cancel: function () {
                                    //$.alert('you clicked on <strong>cancel</strong>');
                                },

                            }
                        });

});

      $(".services_enable").click(function(){
                 var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to enable this?',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Yes',
                                    btnClass: 'btn-info',
                                    action: function () {
                                       var sid=thisvari.attr('id');
                                       thisvari.removeClass("btn-danger");
                                       thisvari.addClass("btn-success");
                                        $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Product/tailor_enable',
               data: {sid:sid},
               success: function(response){
                 //alert(response);
               }
               });

                                    }
                                },
                                cancel: function () {
                                    //$.alert('you clicked on <strong>cancel</strong>');
                                },

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

<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
				"use strict";

				$('#data-tables').dataTable();
				$('#data-tables1').dataTable();
		} );
</script>

<!-- Specific Page Scripts END -->




<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->

<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-43329142-3']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>


</body>

<!-- Mirrored from vendroid.venmond.com/listtables-data-tables.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2016 11:22:00 GMT -->
</html>
