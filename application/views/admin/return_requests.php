<style>
.active101
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
              <h1>Listing All Return Request</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">

            <div class="row">

              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Return Request</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>User ID</th>
                          <th>Order ID</th>
                          <th>Date</th>

                          <th>Image</th>

                          <th>Title</th>
                          <th>Vendor(ID)</th>

                          <th>Price</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>


                         <?php $i=1;$isvendor = 0; foreach($fab as $fab){?>
                        <tr class="gradeA">
                        <?php $order_item = $this->db->get_where('order_items',array('id'=>$fab->item_id))->row(); ?>
                          <td class="center"><?php echo $i;?></td>
                          <td class="center"><?php echo 'UMD-'.$fab->user_id;?></td>
                          <td class="center"><?php echo $order_item->oid."&nbsp"; ?></td>
                          <td class="center"><?php echo $fab->date."&nbsp"; ?></td>


                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/<?php echo $order_item->pimg;?>" /></td>

                          <td width="200px"><?php echo $order_item->pname;?></td>
                          <td class="center"><?php echo "&nbsp"; ?><br><?php if(!empty($order_item->vendor_id)){echo 'VMD-00'.$order_item->vendor_id; $isvendor=1;}else{echo "Admin's Product";} ?></td>

                          <td><i class="fa fa-inr"></i><?php echo $order_item->price;?></td>
                          <td>

                          <?php if($isvendor==1){
                            if($fab->approvedornot=='disapprove'){ echo "disapproved"; $return_data= $this->db->get_where('return_item_request_reject',array('cancel_id'=>$fab->id))->row(); echo '<br>Reason: '.$return_data->reason; }else if($fab->approvedornot=='approve'){ 
                              ?>
                              <?php  echo form_open("product/update_shipping_status_return",array('class'=>"contact-form"));
                          //print_r($cat);
                          ?>
                          <input type="hidden" name="pid" value="<?php echo $order_item->oid;?>">
                          <input type="hidden" name="item" value="<?php echo $order_item->id;?>">
                          <input type="hidden" name="vid" value="<?php echo $order_item->vendor_id;?>">
                          <input type="date" name="date" required="required" style="padding:initial;">
                          <input type="hidden" name="uid" value="<?php echo $fab->user_id;?>">

                                <select name="shipping_status" required>
                                  <option>select</option>
                                  <option value="Pickup From User" <?php if($order_item->shipping_status=='Pickup From User'){ echo 'selected'; } ?>>Pickup From User</option>
                                  <option value="Delivered to vendor" <?php if($order_item->shipping_status=='Delivered to vendor'){ echo 'selected'; } ?>>Deliver To Vendor</option>
                                </select>
                                <button  class="btn vd_btn vd_bg-blue" type="submit" value="Change Status"><i class="fa fa-print append-icon"></i>Change Status</button>
                   <?php echo form_close(); ?>

                              <?php
                             }
                            else{//echo "<span class='alert alert-warning' style='padding:0px'>Vendor Response Pending</span>";

                            //new
                           
                          if($fab->approvedornot=='disapprove'){ echo "disapproved"; }else if($fab->approvedornot=='approve'){ echo "approved"; }else{ ?>
                          <button class="btn btn-xs btn-warning" id="edit<?php echo $fab->id; ?>" data-toggle="modal" data-target="#myModal2<?php echo $fab->id; ?>" >why no?</button> 

                           <button data-toggle='tooltip' title='Approve' class='btn btn-xs btn-danger services_enable' id="<?php echo $fab->id ?>"><i class='fa fa-lightbulb-o'></i></button>
                               
                          <?php } ?>
                              <!-- Modal -->    
  <div class="modal fade" id="myModal2<?php echo $fab->id; ?>" role="dialog">
    <div class="modal-dialog">
   
    
      <!-- Modal content-->
      <div class="modal-content">
         
        <div class="modal-body">

          <div class="row">
           <div class="container">

              <div class="col-xs-12 col-md-12">
           <h3><u>Why user want to cancel this.</u></h3>
           <p>reason : <b>" <?php  $reason = $this->db->get_where('cancel_reasons',array('id'=>$fab->reason))->row(); ?> <?php echo $reason->reason ?>"</b></p>
              <p><b>" <?php echo $fab->description; ?> "</b></p>
              </div>
          </div>
            <div class="container">

              <div class="col-xs-3 col-md-3">

                <?php if($order_item->pimg=='null')
                          { 
                            ?>
                          
                            <img class="img img-responsive pull-left" style="width:100px;" src="<?php echo base_url();?>assets/images/fabrics/bag.png" alt="">
                            <?php } else{

                              $pname = explode(' ', $order_item->pname);
                              if(!empty($pname[1]) && $pname[1]=='bundle')
                              {
                                ?>
                                <img class="img img-responsive pull-left" style="width:100px;" src="<?php echo base_url();?>adminassets/<?php echo $order_item->pimg;?>" alt="">
                                <?php
                              }else{



                              ?>

                          <img class="img img-responsive pull-left" style="width:100px;" src="<?php echo base_url();?>assets/images/<?php echo $order_item->pimg;?>" alt="">
                        
                          <?php }} ?>
              </div>
              <div class="col-xs-5 col-md-offset-1 col-md-5">
                
                    <p><b><?php echo $order_item->pname;?></b> <i class="fa fa-inr"></i><?php echo $order_item->price; ?></p>
                    
                    
                      <?php echo form_open('product/cancel_item_request_reject'); ?>
                     <input type="hidden" name="cancel_id" value="<?php echo $fab->id; ?>">
                   
                <div class="form-group comment" id="comment<?php echo $order_item->id; ?>" >
  <label for="comment">Why no to this return item:</label>
  <textarea class="form-control" rows="5" style="width: 100%" name="reason" nameid="comment" required></textarea>
</div>
 <button type="submit" class="btn btn-default submit">Submit</button>
  <?php echo form_close(); ?>
              </div>
              
            </div>
          </div>
            
          
      </div>
        <div class="modal-footer" style="background-color: initial;">
          
          

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      

      </div>
      
    </div>
  </div>
                          <!--modal-->
                         

                           
                               
                           <?php //new

                            }$isvendor=0;}else if($fab->approvedornot=='disapprove'){ echo "disapproved"; }else if($fab->approvedornot=='approve'){ ?>

                             <?php  echo form_open("product/update_shipping_status_return",array('class'=>"contact-form"));
                          //print_r($cat);
                          ?>
                          <input type="hidden" name="pid" value="<?php echo $order_item->oid;?>">
                          <input type="hidden" name="item" value="<?php echo $order_item->id;?>">

                          <input type="date" name="date" required="required" style="padding:initial;">
                          <input type="hidden" name="uid" value="<?php echo $fab->user_id;?>">

                                <select name="shipping_status" required>
                                  <option>select</option>
                                  <option value="Pickup From User" <?php if($order_item->shipping_status=='Pickup From User'){ echo 'selected'; } ?>>Pickup From User</option>

                                </select>
                                <button  class="btn vd_btn vd_bg-blue" type="submit" value="Change Status"><i class="fa fa-print append-icon"></i>Change Status</button>
                   <?php echo form_close(); ?>

                   <?php }else{ ?>
                          <button class="btn btn-xs btn-warning" id="edit<?php echo $fab->id; ?>" data-toggle="modal" data-target="#myModal2<?php echo $fab->id; ?>" >why no?</button>

                           <button data-toggle='tooltip' title='Approve' class='btn btn-xs btn-danger services_enable' id="<?php echo $fab->id ?>"><i class='fa fa-lightbulb-o'></i></button>

                          <?php } ?>
                              <!-- Modal -->
  <div class="modal fade" id="myModal2<?php echo $fab->id; ?>" role="dialog">
    <div class="modal-dialog">


      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-body">

          <div class="row">
           <div class="container">

              <div class="col-xs-12 col-md-12">
           <h3><u>Why user want to Return this.</u></h3>
              <p>reason : <b>" <?php  $reason = $this->db->get_where('return_reasons',array('id'=>$fab->reason))->row(); ?> <?php echo $reason->reason ?>"</b></p>
              <p><b>" <?php echo $fab->description; ?> "</b></p>
              </div>
          </div>
            <div class="container">

              <div class="col-xs-3 col-md-3">

                <?php if($order_item->pimg=='null')
                          {
                            ?>

                            <img class="img img-responsive pull-left" style="width:100px;" src="<?php echo base_url();?>assets/images/fabrics/bag.png" alt="">
                            <?php } else{

                              $pname = explode(' ', $order_item->pname);
                              if(!empty($pname[1]) && $pname[1]=='bundle')
                              {
                                ?>
                                <img class="img img-responsive pull-left" style="width:100px;" src="<?php echo base_url();?>adminassets/<?php echo $order_item->pimg;?>" alt="">
                                <?php
                              }else{



                              ?>

                          <img class="img img-responsive pull-left" style="width:100px;" src="<?php echo base_url();?>assets/images/<?php echo $order_item->pimg;?>" alt="">

                          <?php }} ?>
              </div>
              <div class="col-xs-5 col-md-offset-1 col-md-5">

                    <p><b><?php echo $order_item->pname;?></b> <i class="fa fa-inr"></i><?php echo $order_item->price; ?></p>


                      <?php echo form_open('product/return_item_request_reject'); ?>
                     <input type="hidden" name="cancel_id" value="<?php echo $fab->id; ?>">

                <div class="form-group comment" id="comment<?php echo $order_item->id; ?>" >
  <label for="comment">Why no to this cancel item:</label>
  <textarea class="form-control" rows="5" style="width: 100%" name="reason" nameid="comment" required></textarea>
</div>
 <button type="submit" class="btn btn-primary submit">Submit</button>
  <?php echo form_close(); ?>
              </div>

            </div>
          </div>


      </div>
        <div class="modal-footer" style="background-color: initial;">



          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>


      </div>

    </div>
  </div>
                          <!--modal-->



                                </td>
                        </tr>
                        <?php $i++;}?>

                      </tbody>
                    </table>
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
               url: '<?php echo base_url();?>index.php/product/del_fabric',
               data: {fid:sid},
               success: function(response){
                 //console.log(response);
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
               url: '<?php echo base_url();?>index.php/Product/fabric_disable',
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

                                       var sid=thisvari.attr('id');
                                       $("#edit" + sid).hide();
                                       thisvari.removeClass("btn-danger");
                                       thisvari.addClass("btn-success");
                                        $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Product/return_request_approve',
               data: {sid:sid},
               success: function(response){
                // alert(response);
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
