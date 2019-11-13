<style>
.active100
{
  background-color:#1fae66 !important;
}
</style>
<?php  $tailor_id = $this->uri->segment(3); ?>
  <link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Order And Tailor Details</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
       <?php $i=1;//print_r($orders
            $paid=0;$due=0;
             foreach($items as $item){
               if($item->scost=="paid"){$paid=$paid+$item->scost;}
                if($item->pstatus==""){$due=$due+$item->scost;}
               ?>

                        <?php $i++;//$gt=$gt+$total;
            }?>
            <div class="row">



              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-2">
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
</div>
                </div>
                  <!--col-md-12 -->

                <!-- .row -->

                  <div class="col-xs-2">
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
                  <div class="col-xs-2">
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
                  <!--col-xs-6 -->

                <!-- .row -->

                  <div class="col-xs-2">
                    <div class="vd_status-widget vd_bg-yellow widget">
    <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu -->

    <a class="panel-body"  href="#">
        <div class="clearfix">
          <!--  <span class="menu-icon">
                <i class="icon-users"></i>
            </span>-->
            <span class="menu-value">
                &#8358; <?php echo $paid;?>
            </span>
        </div>
        <div class="menu-text clearfix">
            Paid Amount
        </div>
     </a>
</div>
</div>
                  <!--col-xs-6 -->
                  <div class="col-xs-2">
                    <div class="vd_status-widget vd_bg-grey widget">
    <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu -->

    <a class="panel-body"  href="#">
        <div class="clearfix">
            <!--<span class="menu-icon">
                <i class="fa fa-tasks"></i>
            </span>-->
            <span class="menu-value">
               &#8358; <?php echo $due;?>
            </span>
        </div>
        <div class="menu-text clearfix">
            Due Amount
        </div>
     </a>
</div>                   </div>
</div>
                  <!--col-md-xs-6 -->
                </div>
                <!-- .row -->

              </div>

              <!---detail ---->
              <div class="container">

  <ul class="nav nav-pills">
   
    <li  class="active"><a data-toggle="pill" href="#menu1">Tailor Details</a></li>
     <li><a data-toggle="pill" href="#home">All Assigned Orders</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade  ">
                       <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>OrderNo</th>
                          <th>Order Item</th>
                          <th>StitchingCost</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>


                         <?php $i=1;//print_r($orders
            $paid=0;$due=0;
             foreach($items as $item){
               if($item->scost=="paid"){$paid=$paid+$item->scost;}
                if($item->pstatus==""){$due=$due+$item->scost;}
               ?>
                        <tr class="gradeA">
                          <td>#<?php echo $item->oid;?></td>

                          <td><?php echo $item->pname;?></td>
                          <td>Rs. <?php echo $item->scost;?> <?php if($item->pstatus==""){?>
                          <span class="label label-warning">Due</span>
                          <?php }else{?>
                           <span class="label label-success">Paid</span><?php }?></td>
                          <td>
                          <?php if($item->sstatus==""){?>
                          <span class="label label-warning">Pending</span>
                          <?php }else if($item->sstatus=="Started"){?>
                           <span class="label label-success">Started</span><?php }
                           else if($item->sstatus=="Completed"){?>
                           <span class="label label-success">Completed</span>
                           &nbsp&nbsp&nbsp<span class="rating2">

<span class="test" href="<?php echo $item->oid; ?>" id="f_5">&#x2606</span><span class="test" href="<?php echo $item->oid; ?>" id="f_4">&#x2606</span><span class="test" href="<?php echo $item->oid; ?>" id="f_3">☆</span><span class="test" href="<?php echo $item->oid; ?>" id="f_2">☆</span><span class="test" href="<?php echo $item->oid; ?>" id="f_1">☆</span>

</span>
<?php }?>
                         </td>
                        </tr>
                        <?php $i++;//$gt=$gt+$total;
            }?>

                      </tbody>
                    </table>
                  </div>
    </div>
    <div id="menu1" class="tab-pane fade in active">
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
                  <form method="post" action="<?php echo base_url(); ?>product/update_tailor_account">
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Name </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="tname" value="<?php echo $tailor->tname;?>" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Email </span></label>
                            <div class="col-lg-9">
                                  <input type="text"  value="<?php echo $tailor->temail;?>" disabled required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Contact </span></label>
                            <div class="col-lg-9">
                                  <input type="text"  value="<?php echo $tailor->tphone;?>" disabled required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Address </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="address" value="<?php echo $tailor->taddress;?>"  required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  City </span></label>
                            <div class="col-lg-9">
                            <?php $city = $this->db->get_where('cities',array('id'=>$tailor->tcity))->row();  ?>
                                  <input type="text"   name="tname" value="<?php echo $city->name;?>" disabled required>
                            </div>
                          </div>
                           <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  State </span></label>
                            <div class="col-lg-9">
                            <?php $state = $this->db->get_where('states',array('id'=>$tailor->tstate))->row();  ?>
                                  <input type="text"   name="tname" value="<?php echo $state->name;?>" disabled required>
                            </div>
                          </div>

                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Gender </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="gender" value="<?php echo $tailor->gender;?>" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Shop Name </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="shopname" value="<?php echo $tailor->shopname;?>" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Shop No. </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="shopnumber" value="<?php echo $tailor->tshop_number;?>" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Shop Address </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="shopaddress" value="<?php echo $tailor->tshop_address;?>" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Landmark </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="shopland" value="<?php echo $tailor->landmark;?>" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Speciliazation </span></label>
                            <div class="col-lg-9">
                              <?php $sp = explode(',',$tailor->speciliazation); ?>

                                  <input type="checkbox" name="sp[]" value="Ladies" <?php if(in_array("Ladies", $sp)){echo "checked";} ?>>&nbspLadies<br>
          												<input type="checkbox" name="sp[]" value="Gents" <?php if(in_array("Gents", $sp)){echo "checked";} ?>>&nbspGents<br>
          												<input type="checkbox" name="sp[]" value="Kids" <?php if(in_array("Kids", $sp)){echo "checked";} ?>>&nbspKids<br>
                            </div>
                          </div>
                          <!--new-->
                           <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Account Number </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="acc_no" value="<?php echo $tailor->acc_no;?>" required>
                            </div>
                          </div>
                           <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Account Holder Name </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="acc_holder_name" value="<?php echo $tailor->acc_holder_name;?>" required>
                            </div>
                          </div>
                           <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Bank Name </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="bank_name" value="<?php echo $tailor->bank_name;?>" required>
                            </div>
                          </div>
                           <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Branch Name </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="branch_name" value="<?php echo $tailor->branch_name;?>" required>
                            </div>
                          </div>
                           <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  IFSC Code </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="ifsc_code" value="<?php echo $tailor->ifsc_code;?>" required>
                            </div>
                          </div>
                           <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Branch Code </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="branch_code" value="<?php echo $tailor->branch_code;?>">
                            </div>
                          </div>
                            <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Pincode </span></label>
                            <div class="col-lg-9">
                                  <input type="text"   name="pincode" value="<?php echo $tailor->pincode;?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span>  Would you prefer payment through app/internet banking?   </span></label>
                             <div class="col-sm-9 controls">
                        <input type="radio" name="payment_type" value="yes" <?php if($tailor->payment_type=='yes'){ echo "checked"; } ?> required="">&nbspYes
                        <input type="radio" name="payment_type" value="no" <?php if($tailor->payment_type=='no'){ echo "checked"; } ?> required="">&nbspNo
                        </div>
                          </div>

                          <!--new-->
                           <input type="hidden" name="tid" value="<?php echo $this->uri->segment(3); ?>"><button type="submit" class="btn btn-primary">Save</button> </br></form>
                           <br>
                             <label  class="control-label col-lg-3" ><span>  SubCategories </span></label>
                             <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>Category</th>
                          <th>SubCategory</th>
                          <th>Price</th>

                        </tr>
                      </thead>
                      <tbody>

                          <div class="form-group">

                            <?php $sp = explode(',', $tailor->speciliazation); //print_r($sp);
                            foreach ($sp as $value) {
                                if($value!='N')
                                {echo "<tr>";
                                  if($value=='Ladies')
                                { $data = $this->db->get_where('tailor_subcategory',array('category_id'=>1))->result();
                                //echo "Ladies";
                                  foreach ($data as $value2) {
                                     $data2 = $this->db->get_where('subcategory_search',array('tid'=>$tailor->id,'sucat_id'=>$value2->id))->row();
                                     if(!empty($data2))
                                     {
                                      ?>
                                        <td><input type="checkbox" id="<?php echo $value2->id; ?>" name="assigned_subcat<?php echo $value2->id; ?>" checked></td>

                                  <td><?php echo $value2->sub_cat_name; ?></td>

                                  <td><input type="number" id="price<?php echo $value2->id; ?>" min='1' name="price" value="<?php echo $data2->price; ?>" ></td></tr>

                                      <?php
                                     }else{
                                    ?>

                                  <td><input type="checkbox" id="<?php echo $value2->id; ?>" name="assigned_subcat<?php echo $value2->id; ?>"></td>

                                  <td><?php echo $value2->sub_cat_name; ?></td>

                                  <td><input type="number" id="price<?php echo $value2->id; ?>" min='1' name="price" value="" ></td></tr>


                            <?php
                                                              }}

                                }

                              if($value=='Gents')
                                { $data = $this->db->get_where('tailor_subcategory',array('category_id'=>2))->result();
                                //echo "Gents";
                                  foreach ($data as $value2) {
                                    $data2 = $this->db->get_where('subcategory_search',array('tid'=>$tailor->id,'sucat_id'=>$value2->id))->row();
                                     if(!empty($data2))
                                     {
                                      ?>
                                        <td><input type="checkbox" id="<?php echo $value2->id; ?>" name="assigned_subcat<?php echo $value2->id; ?>" checked></td>

                                  <td><?php echo $value2->sub_cat_name; ?></td>

                                  <td><input type="number" id="price<?php echo $value2->id; ?>" min='1' name="price" value="<?php echo $data2->price; ?>" ></td></tr>

                                      <?php
                                     }else{

                                    ?>

                                  <td><input type="checkbox" id="<?php echo $value2->id; ?>" name="assigned_subcat<?php echo $value2->id; ?>"></td>
                                  <td><?php echo $value2->sub_cat_name; ?></td>

                                  <td><input type="number" min='1' id="price<?php echo $value2->id; ?>" name="price" value="" ></td></tr>

                            <?php
                                                              }}

                                }

                              if($value=='Kids')
                                { $data = $this->db->get_where('tailor_subcategory',array('category_id'=>3))->result();
                                //echo "Kids";
                                  foreach ($data as $value2) {
                                    $data2 = $this->db->get_where('subcategory_search',array('tid'=>$tailor->id,'sucat_id'=>$value2->id))->row();
                                     if(!empty($data2))
                                     {
                                      ?>
                                        <td><input type="checkbox" id="<?php echo $value2->id; ?>" name="assigned_subcat<?php echo $value2->id; ?>" checked></td>

                                  <td><?php echo $value2->sub_cat_name; ?></td>

                                  <td><input type="number" id="price<?php echo $value2->id; ?>" min='1' name="price" value="<?php echo $data2->price; ?>" ></td></tr>

                                      <?php
                                     }else{
                                    ?>


                                 <td><input type="checkbox" id="<?php echo $value2->id; ?>" name="assigned_subcat<?php echo $value2->id; ?>"></td><td><?php echo $value2->sub_cat_name; ?></td>

                                  <td><input type="number" min='1' id="price<?php echo $value2->id; ?>" name="price" value="" ></td></tr>

                            <?php
                                                              }}

                                }
                                echo "";
                              }
                            }?>

                          </div>


                  </table>
                  <span id="response55"></span>
           <button class="btn btn-primary" id="subcat">Update SubCategory</button>

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
						   $(".test").click(function(){
                alert('yes');
        var rating = $(this).attr('id');
        var oid = $(this).attr('href');
        rating = rating.split('_');
        //alert(rating);
         $.ajax({
           type: "POST",
           url: '<?php echo base_url();?>index.php/product/ajaxstar_tailor',
           data: {value:rating[1],tid:<?php echo $tailor_id ?>,oid:oid},
           success: function(response){
              console.log(response);
             // $("#response55").html("<span class='alert alert-success'>Subcategories Updated Successfully.</span>");
             },
             error: function(response){
              //console.log(response);
             }
           });
   });

            $("#subcat").click(function(){
              //alert('yes');
              $('input:checkbox:checked').each(function () {
                   // alert('ok');
                    var id = $(this).attr('id');
                    //alert(id);
                    var price = $("#price" + id).val();
                    //console.log(price);
                    $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/product/update_subcat',
               data: {tid:<?php echo $tailor_id ?>,subid:id,price:price},
               success: function(response){
                  $("#response55").html("<span class='alert alert-success'>Subcategories Updated Successfully.</span><br>");
               },
               error: function(response){
                //console.log(response);
               }
               });
              });

              /**/
            });

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
