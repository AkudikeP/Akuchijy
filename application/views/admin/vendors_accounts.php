  <link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<?php if(isset($items))
           { ?>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Listing All Orders</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">

            <div class="row">

              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Assigned Orders</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>OrderNo</th>
                          <th>Order Item</th>
                          <th>Product Cost</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>


                         <?php $i=1;//print_r($orders
            $paid=0;$due=0;
             foreach($items as $item){
               if($item->status=="completed"){$paid=$paid+$item->price;}
                if($item->status==""){$due=$due+$item->price;}
               ?>
                        <tr class="gradeA">
                          <td>#<?php echo $item->oid;?></td>

                          <td><?php echo $item->pname;?></td>
                          <td>Rs. <?php echo $item->price;?>/- <?php if($item->status==""){?>
                          <span class="label label-warning">Due</span>
                          <?php }else{?>
                           <span class="label label-success">Paid</span><?php }?></td>
                          <td>
                          <?php if($item->status==""){?>
                          <span class="label label-warning">Pending</span>
                          <?php }else{?>
                           <span class="label label-success">Completed</span><?php }?>
                         </td>
                        </tr>
                        <?php $i++;//$gt=$gt+$total;
            }?>

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget -->
              </div>
              <?php }else{
                //print_r($vendor);
                ?>
<div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Vendor</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">

            <div class="row">
             <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <div class="vd_status-widget vd_bg-green widget">
  <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu -->

    <a class="panel-body" href="#">
            <div class="clearfix">
                <span class="menu-icon">
                    <i class="icon-network"></i>
                </span>
                <span class="menu-value">
                    <?php echo $pending+$completed;?>
                </span>
            </div>
            <div class="menu-text clearfix">
                Total Orders
            </div>
    </a>
</div>                    </div>
 <div class="col-xs-4">
                    <div class="vd_status-widget vd_bg-red  widget">
    <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu -->

    <a class="panel-body" href="#">
        <div class="clearfix">
           <!-- <span class="menu-icon">
                <i class="icon-bars"></i>
            </span>-->
            <span class="menu-value">
                <?php echo $pending;?>
            </span>
        </div>
        <div class="menu-text clearfix">
            Pending Orders
        </div>
     </a>
</div>                    </div>
                  <!--col-xs-6 -->
                  <div class="col-xs-4">
                    <div class="vd_status-widget vd_bg-blue widget">
    <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu -->

    <a class="panel-body"  href="#">
        <div class="clearfix">
            <!--<span class="menu-icon">
                <i class="fa fa-comments"></i>
            </span>-->
            <span class="menu-value">
                 <?php echo $completed;?>
            </span>
        </div>
        <div class="menu-text clearfix">
           Complete Orders
        </div>
     </a>
</div>                   </div>
                  <!--col-md-12 -->
                </div>
                <!-- .row -->
                <div class="row">

                  <!--col-xs-6 -->
                </div>

                <!-- .row -->

              </div>
                <div class="col-md-12">
                <div class="form-wizard condensed">
                      <ul class="nav nav-pills nav-justified">
                        <li class="active"><a data-toggle="tab" href="#tab71">Personal Info </a></li>
                        <li><a data-toggle="tab" href="#tab72">Bank Detail</a></li>
                        <li><a data-toggle="tab" href="#tab73">Security Questions</a></li>
                      </ul>
                      <div class="tab-content no-bd mgbt-xs-20">
                        <div class="tab-pane active" id="tab71">
							<div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Personal Info</h3>
                  </div>
                  <div class="panel-body table-responsive">
                  <?php
                                  $this->db->group_by("country_name");
                                  $country=$this->db->get("country_state_city")->result();
                                    foreach($country as $country)
                                    {
                                      $cotry=$this->db->get_where("countries",array("id"=>$country->country_name))->row();
                                    }
                                    $this->db->group_by("state_name");
                                  $state=$this->db->get("country_state_city")->result();
                                    foreach($state as $state)
                                    {
                                      $statese=$this->db->get_where("states",array("id"=>$state->state_name))->row();
                                    }
                                    $this->db->group_by("city_name");
                                  $city=$this->db->get("country_state_city")->result();
                                    foreach($city as $city)
                                    {
                                      $cities=$this->db->get_where("cities",array("id"=>$city->city_name))->row();
                                    }
                                    $cotry=$this->db->get_where("countries",array("id"=>$vendor->country))->row();
                                    $statese=$this->db->get_where("states",array("id"=>$vendor->state))->row();
                                    $cities=$this->db->get_where("cities",array("id"=>$vendor->city))->row()
                                  ?>
                                  <div class="" style="width:20%;margin:2%;float:right">
                                    <img  src="<?php echo base_url(); ?>assets/images/<?php echo $vendor->id_proof; ?>" alt="">

                                    <a class="btn vd_btn vd_bg-blue btn-sm save-btn" download href="<?php echo base_url(); ?>assets/images/<?php echo $vendor->id_proof; ?>" target="_blank"> Download  </a>

                                  </div>
                                                    <table>
                    <?php echo "<tr><td style='width:120px;'>Name</td><td>".$vendor->vendor_name."</td></tr><td>Email</td><td>".$vendor->email."</td></tr><td>Contact</td><td>".$vendor->contact."</td></tr><td>Address</td><td>".$vendor->address."</td></tr><td>City</td><td>".$cities->name."</td></tr><td>State</td><td>".$statese->name."</td></tr><td>Country</td><td>".$cotry->name ."</td></tr><td>Pin Code</td><td>".$vendor->pincode ."</td></tr><td>Option</td><td>".$vendor->option."</tr>"; ?>
                  </table>  </br>
                              <form enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url();?>Product/update_vendor_options/<?php echo $vendor->vid ?>" role="form" method="post">

                                            <div class="form-group">
                            <label class="col-sm-3 control-label">Select Your Vendor Type </label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="checkbox" id="c1" name="option[]"  value="Fabric" <?php if (strpos($vendor->option, 'Fabric')!==false) { echo 'checked';}?>>Fabric
                          <input type="checkbox" id="c2" name="option[]"  value="Uniform" <?php if (strpos($vendor->option, 'Uniform')!==false) { echo 'checked';}?>>Uniform
                          <input type="checkbox" id="c3" name="option[]"  value="Accessories" <?php if (strpos($vendor->option, 'Accessories')!==false) { echo 'checked';}?>>Accessories
                          <input type="checkbox" id="c4" name="option[]"  value="More Services" <?php if (strpos($vendor->option, 'More Services')!==false) { echo 'checked';}?>>More Services
                          <input type="checkbox" id="c5" name="option[]"  value="Online Boutique" <?php if (strpos($vendor->option, 'Online Boutique')!==false) { echo 'checked';}?>>Online Boutique
                                </div>
                                
                                <!-- col-xs-9 -->

                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Set Markup</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="number"  value="<?php echo $vendor->markup; ?>" name="markup" min="0">
                         
                                </div>
                                
                                <!-- col-xs-9 -->

                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>

                           <div class="pd-20">
                      <button type="submit" name="submit" class="btn vd_btn vd_bg-green col-md-offset-3"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Update Details</button>
                    </div>
                          </form>
                    <style type="text/css">
                    table,tr,td{
                        border-collapse: border-collapse;
                        border:1px solid #fff;
                        padding: 1%;
                    }
                      td:nth-child(odd)
                      {
                        background-color: #ccc;

                      }
                    </style>


                  </div>
                </div>
						 </div>
                        <div class="tab-pane" id="tab72">
							<div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Bank Detail</h3>
                  </div>
                  <div class="panel-body table-responsive">
                  <?php

                                  ?>
                  <table>
                    <?php echo "<tr><td style='width:150px;'>Account Holder</td><td>".$vendor->account_holder ."</td></tr><td style='width:150px;'>Account Type</td><td>".$vendor->acc_type ."</td></tr><td>Account No.</td><td>".$vendor->acc_number."</td></tr><td>Branch Name</td><td>".$vendor->branch_name."</td></tr><td>Bank IFC</td><td>".$vendor->bank_ifc."</td></tr><td>Pan No.</td><td>".$vendor->pan_number ."</td></tr><td>Vat No.</td><td>".$vendor->vat_number ."</td></tr><td>Tin No.</td><td>".$vendor->tin_number ."</td></tr><td>Deal Type</td><td>".$vendor->deal_type ."</td></tr>
                    <td>Account Type</td><td>".$vendor->acc_type ."</td></tr>

                    <td>GST Number</td><td>".$vendor->gst_number ."</td></tr>
                  "; ?>
                  </table>  </br>
                    <style type="text/css">
                    table,tr,td{
                        border-collapse: border-collapse;
                        border:1px solid #fff;
                        padding: 1%;
                    }
                      td:nth-child(odd)
                      {
                        background-color: #ccc;

                      }
                    </style>


                  </div>
                </div>
						</div>
                        <div class="tab-pane" id="tab73">
							<div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Security Questions</h3>
                  </div>
                  <div class="panel-body table-responsive">
                  <?php
                                  $this->db->group_by("country_name");
                                  $country=$this->db->get("country_state_city")->result();
                                    foreach($country as $country)
                                    {
                                      $cotry=$this->db->get_where("countries",array("id"=>$country->country_name))->row();
                                    }
                                    $this->db->group_by("state_name");
                                  $state=$this->db->get("country_state_city")->result();
                                    foreach($state as $state)
                                    {
                                      $statese=$this->db->get_where("states",array("id"=>$state->state_name))->row();
                                    }
                                    $this->db->group_by("city_name");
                                  $city=$this->db->get("country_state_city")->result();
                                    foreach($city as $city)
                                    {
                                      $cities=$this->db->get_where("cities",array("id"=>$city->city_name))->row();
                                    }
                                  ?>
                  <table>
                    <?php echo "<tr><td style='width:120px;'>Question 1</td><td style='width:500px;'>When was your company started?</td></tr>
					<tr><td style='width:120px;'>Answer 1</td><td>".$vendor->question1."</td></tr>
					<tr><td>Question 2</td><td>In what city were you born? </td></tr>
					<tr><td style='width:120px;'>Answer 2</td><td>".$vendor->question2."</td></tr>
					<tr><td>Question 3</td><td>What is your favorite color?</td></tr>
					<tr><td>Answer 3</td><td>".$vendor->question3."</td></tr>
					<tr><td>Question 4</td><td>What is your nickname?</td></tr>
					<tr><td>Answer 4</td><td>".$vendor->question4."</td></tr>
					<tr><td>Question 5</td><td>What is your favorite food?</td></tr>
					<tr><td>Answer 5</td><td>".$vendor->question5."</td></tr>";
					?>
                  </table>  </br>
                  <?php if($vendor->approve_status=='yes') echo '<span class="alert alert-success">This vendor is apprved by admin.</span>';
                        else echo '<span class="alert alert-danger">This vendor is disapprved by admin.</span>';?>
                 <a href="<?php echo base_url();?>index.php/product/approve_vendor/<?php echo $vendor->vid; ?>"> <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Approve</button> </a>

                 <a href="<?php echo base_url();?>index.php/product/disapprove_vendor/<?php echo $vendor->vid; ?>"> <button type="submit" name="submit" class="btn vd_btn vd_bg-green btn-sm save-btn"><i class="fa fa-save append-icon"></i> DisApprove</button> </a>
                    <style type="text/css">
                    table,tr,td{
                        border-collapse: border-collapse;
                        border:1px solid #fff;
                        padding: 1%;
                    }
                      td:nth-child(odd)
                      {
                        background-color: #ccc;

                      }
                    </style>


                  </div>
                </div>
						</div>

                      </div>
                    </div>

                <!--<div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Vendor Detail</h3>
                  </div>
                  <div class="panel-body table-responsive">
                  <?php
                                  $this->db->group_by("country_name");
                                  $country=$this->db->get("country_state_city")->result();
                                    foreach($country as $country)
                                    {
                                      $cotry=$this->db->get_where("countries",array("id"=>$country->country_name))->row();
                                    }
                                    $this->db->group_by("state_name");
                                  $state=$this->db->get("country_state_city")->result();
                                    foreach($state as $state)
                                    {
                                      $statese=$this->db->get_where("states",array("id"=>$state->state_name))->row();
                                    }
                                    $this->db->group_by("city_name");
                                  $city=$this->db->get("country_state_city")->result();
                                    foreach($city as $city)
                                    {
                                      $cities=$this->db->get_where("cities",array("id"=>$city->city_name))->row();
                                    }
                                  ?>
                  <table>
                    <?php echo "<tr><td style='width:120px;'>Name</td><td>".$vendor->vendor_name."</td></tr><tr><td>User Name</td><td>".$vendor->username."</td></tr><td>Email</td><td>".$vendor->email."</td></tr><td>Contact</td><td>".$vendor->contact."</td></tr><td>Phone</td><td>".$vendor->phone2."</td></tr><td>Address</td><td>".$vendor->address."</td></tr><td>City</td><td>".$cities->name."</td></tr><td>State</td><td>".$statese->name."</td></tr><td>Country</td><td>".$cotry->name ."</td></tr><td>Account Type</td><td>".$vendor->acc_type ."</td></tr><td>Account No.</td><td>".$vendor->acc_number."</td></tr><td>Branch Name</td><td>".$vendor->branch_name."</td></tr><td>Bank IFC</td><td>".$vendor->bank_ifc."</td></tr><td>Pan No.</td><td>".$vendor->pan_number ."</td></tr><td>Vat No.</td><td>".$vendor->vat_number ."</td></tr><td>Tin No.</td><td>".$vendor->tin_number ."</td></tr><td>Deal Type</td><td>".$vendor->deal_type ."</td></tr><td>Option</td><td>".$vendor->option ?>.
                  </table>  </br>
                  <?php if($vendor->approve_status=='yes') echo 'This vendor apprve by admin.';?>
                 <a href="<?php echo base_url();?>index.php/product/approve_vendor/<?php echo $vendor->vid; ?>"> <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Approve</button> </a>
                    <style type="text/css">
                    table,tr,td{
                        border-collapse: border-collapse;
                        border:1px solid #fff;
                        padding: 1%;
                    }
                      td:nth-child(odd)
                      {
                        background-color: #ccc;

                      }
                    </style>


                  </div>
                </div>-->
                <!-- Panel Widget -->
              </div>

              <?php
                } ?>


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
                    Copyright &copy;2014 Venmond Inc. All Rights Reserved
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
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
<script>
          $(document).ready(function(){
            $(".del_fabric").click(function(){
              var fid=$(this).attr('id');
              $(this).closest("tr").remove();
              $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/product/del_fabric',
               data: {fid:fid},
               success: function(response){
                 //alert(response);
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
