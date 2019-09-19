
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
            <h1>Information about customer</h1>
           </div>
        </div>
        <div class="vd_content-section clearfix">


              <div class="col-md-12">
              <div class="form-wizard condensed">

                    <div class="tab-content no-bd mgbt-xs-20">
                      <div class="tab-pane active" id="tab71">
            <div class="panel widget">

                <div class="panel-body table-responsive">

                <?php

                                    $cotry=$this->db->get_where("countries",array("id"=>$vendor->country))->row();


                                    $statese=$this->db->get_where("states",array("id"=>$vendor->state))->row();


                                    $cities=$this->db->get_where("cities",array("id"=>$vendor->city))->row();

                                ?>
                                <h4><i class="fa fa-user" aria-hidden="true"></i> Customer Details</h4>
                                <?php if($this->session->flashdata('message')){?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('message')?>
  </div>
<?php } ?>

                                <form class="" action="<?php echo base_url(); ?>product/user_detail_update" method="post">
                                  <input type="hidden" name="uid" value="<?php echo $vendor->uid; ?>">
                              <img class="img-circle" src="<?php echo base_url() ?>assets/images/<?php echo $vendor->profile_image; ?>" width="30%" style="float:right;margin:3%" alt="">
                <table>
                  <?php echo "<tr><td style='width:120px;'>Name</td><td>:</td><td><input data-validation='custom' data-validation-regexp='^([a-zA-Z ]+)$' type='text' name='name' value='".$vendor->name."'></td></tr>
                  <tr><td style='width:120px;'>Gender</td><td>:</td><td>".$vendor->gender."</td></tr>
                  <tr><td style='width:120px;'>DOB</td><td>:</td><td>".date("d M Y",strtotime($vendor->dob))."</td></tr>

                  <td>Email</td><td>:</td><td>".$vendor->email."</td></tr><td>Contact</td><td>:</td><td><input type='text' name='mobile'data-validation='custom' data-validation-regexp='^([0-9 ]+)$' maxlength='10' value='".$vendor->mobile."'></td></tr><td>Address</td><td>:</td><td><input type='text' data-validation='custom' data-validation-regexp='^([a-zA-Z0-9 ]+)$' name='address' value='".$vendor->address."'></td></tr>
                  <td>Landmark</td><td>:</td><td><input type='text' data-validation='custom' data-validation-regexp='^([a-zA-Z0-9 ]+)$' name='land' value='".$vendor->landmark."'></td></tr><td>City</td><td>:</td><td>".$cities->name."</td></tr><td>State</td><td>:</td><td>".$statese->name."</td></tr><td>Country</td><td>:</td><td>".$cotry->name ."</td></tr>
                  <tr><td style='width:120px;'>Pin</td><td>:</td><td><input type='number' name='pin' value='".$vendor->pincode."'></td></tr>
                  <tr><td style='width:120px;'>Recovery Contact</td><td>:</td><td><input type='text' data-validation='custom' data-validation-regexp='^([0-9 ]+)$' name='r_contact' value='".$vendor->r_contact."'></td></tr>
                  <tr><td style='width:120px;'>Recovery Email</td><td>:</td><td><input type='email' name='r_email' value='".$vendor->r_email."'></td></tr>"; ?>
                  <?php echo "<tr><td style='width:120px;'>Question 1</td><td>:</td><td style='width:500px;'> In what city were you born?</td></tr>
        <tr><td style='width:120px;'>Answer 1</td><td>:</td><td><input type='text' name='q1'  data-validation='custom' data-validation-regexp='^([a-zA-Z0-9 ]+)$' value='".$vendor->question1."'></td></tr>
        <tr><td>Question 2</td><td>:</td><td> What is the name of your high school name? </td></tr>
        <tr><td style='width:120px;'>Answer 2</td><td>:</td><td><input type='text' name='q2' data-validation='custom' data-validation-regexp='^([a-zA-Z0-9 ]+)$' value='".$vendor->question2."'></td></tr>
        <tr><td>Question 3</td><td>:</td><td>What is your favorite color?</td></tr>
        <tr><td>Answer 3</td><td>:</td><td><input type='text' name='q3'  data-validation='custom' data-validation-regexp='^([a-zA-Z0-9 ]+)$' value='".$vendor->question3."'></td></tr>
        <tr><td>Question 4</td><td>:</td><td> What is your nickname?</td></tr>
        <tr><td>Answer 4</td><td>:</td><td><input type='text' name='q4'  data-validation='custom' data-validation-regexp='^([a-zA-Z0-9 ]+)$' value='".$vendor->question4."'></td></tr>
        <tr><td>Question 5</td><td>:</td><td>What is your favorite food?</td></tr>
        <tr><td>Answer 5</td><td>:</td><td><input  data-validation='custom' data-validation-regexp='^([a-zA-Z0-9 ]+)$' type='text' name='q5' value='".$vendor->question5."'></td></tr>";
        ?>

                </table>
              <input type="submit" name="" value="submit">  </br>
            </form>
                  <style type="text/css">

                  td:nth-child(odd) {
    background-color: initial !important;
}

                  </style>
                  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
                  <script>
                  //alert('kk');
                  $.validate({
                    lang: 'en'
                  });
                  </script>

                </div>

                <div class="panel-body table-responsive">
                  <h4><i class="fa fa-file "></i> Orders</h4>
                  <table class="table" >
                    <thead>
                      <tr>
                        <th>S.no.</th>
                        <th>Order&nbspID</th>
                        <th>Date</th>
                        <th>User&nbspDetails(ID)</th>




                        <th>Status</th>
                        <th>Payment</th>
                          <th>Products</th>
                          <th>Total</th>
                       <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>


                       <?php
                       $orders= $this->db->get_where('orders',array('userid'=>$vendor->uid))->result();$i=1;foreach($orders as $fab){?>
                      <tr class="gradeA">
                        <td><?php echo $i;?></td>
                        <td>#<?php echo 'OMD-'.$fab->oid;?></td>
                        <td><?php echo date("d M Y",strtotime($fab->odate));?></td>
                        <td><?php echo '<center>'.$fab->name.'<br/> UMD-'.$vendor->uid.'</center>';?>

                             </td>



                        <td><?php echo $fab->ostatus?></td>
                        <td><span class="label label-info"><?php echo $fab->pay_method;?></span></td>
                        <td><?php echo $fab->bitems;?></td>
                        <td><?php echo " <i class='fa fa-inr'></i> ".$fab->ototal; ?></td>
                        <td>
                        <a data-toggle="tooltip" title="View" class="btn btn-xs btn-success" href="<?php echo base_url();?>index.php/product/order_details/<?php echo $fab->oid;?>"><i class="fa fa-eye"></i></a>
                                               </td>
                      </tr>
                      <?php $i++;}?>

                    </tbody>
                  </table>
                </div>
                <!---->

                <div class="panel-body table-responsive">
                  <h4><i class="fa fa-archive "></i> Purchased Orders</h4>
                  <table class="table " >
                    <thead>
                      <tr>
                        <th>S.no.</th>
                        <th>Product ID</th>
                        <th>Product name</th>
                        <th>Date</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>


                       <?php
                       $orders= $this->db->get_where('orders',array('userid'=>$vendor->uid))->result();

                       $i=1;foreach($orders as $fab){
                         $oitems = $this->db->get_where('order_items',array('oid'=>$fab->oid))->result();
                        // print_r($oitems);
                         foreach($oitems as $fab2){
                           if($fab2->measures=='' ){?>
                      <tr class="gradeA">
                        <td><?php echo $i;?></td>
                        <td>
                          <?php $type = explode('/',$fab2->pimg);
                           if($type[0]=='accessories'){echo "PAMD-".$fab2->pid; }
                          else if($type[0]=='fabrics'){echo "PFMD-".$fab2->pid; }
                          else if($type[0]=='uniform'){echo "PUMD-".$fab2->pid; }
                          else if($type[0]=='online_boutique'){echo "POMD-".$fab2->pid; }
                          else{echo $fab2->pid; } ?>
                        </td>
                        <td><?php echo $fab2->pname; ?></td>
                        <td><?php echo date("d M Y",strtotime($fab->odate));?></td>
                        <td><?php echo $fab2->qty; ?></td>

                      </tr>
                      <?php $i++;}}}?>

                    </tbody>
                  </table>
                </div>
                <!---->
                <!---->

                <div class="panel-body table-responsive">
                  <h4><i class="fa fa-archive "></i> Cancel Orders</h4>
                  <table class="table " >
                    <thead>
                      <tr>
                        <th>S.no.</th>
                      <th>Product ID</th>
                      <th>Product name</th>
                        <th>Date</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>


                       <?php
                       $orders= $this->db->get_where('orders',array('userid'=>$vendor->uid))->result();

                       $i=1;foreach($orders as $fab){
                         $oitems = $this->db->get_where('order_items',array('oid'=>$fab->oid))->result();
                        // print_r($oitems);
                         foreach($oitems as $fab2){
                           if($fab2->measures=='' && $fab2->status=='cancel'){?>
                      <tr class="gradeA">
                        <td><?php echo $i;?></td>
                        <td>
                          <?php $type = explode('/',$fab2->pimg);
                           if($type[0]=='accessories'){echo "PAMD-".$fab2->pid; }
                          else if($type[0]=='fabrics'){echo "PFMD-".$fab2->pid; }
                          else if($type[0]=='uniform'){echo "PUMD-".$fab2->pid; }
                          else if($type[0]=='online_boutique'){echo "POMD-".$fab2->pid; }
                          else{echo $fab2->pid; } ?>
                        </td>
                        <td><?php echo $fab2->pname; ?></td>
                        <td><?php echo date("d M Y",strtotime($fab->odate));?></td>
                        <td><?php echo $fab2->qty; ?></td>

                      </tr>
                      <?php $i++;}}}?>

                    </tbody>
                  </table>
                </div>
                <!---->

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
