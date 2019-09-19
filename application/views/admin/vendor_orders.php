 <style>
.active18
{
	background-color:#1fae66 !important;
}
</style>
  <link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/css/datepicker.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/bootstrap-datepicker.js"></script>
<link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet" />

<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#orders_sorting").change(function(){
           var sid=$(this).val();
           $.ajax({
type: "POST",
url: '<?php echo base_url();?>index.php/product/orders_sorting',
data: {sid:sid},
success: function(response){
console.log(response);
$("#table").html(response);
}
});
});
});
</script>

          <div class="vd_title-section clearfix">
            <div class="vd_panel-header" style="float: left">
              <h1>Listing All Vendor Orders</h1><select id="orders_sorting">
                  <option value="t_order">Select</option>
                  <option value="t_order">Today Orders</option>
                  <option value="w_order">Last Week Orders</option>
                  <option value="m_order">Last Month Orders</option>
                  <option value="y_order">Last Year Orders</option>
                  <option value="all">All Orders</option>
                  </select>
             </div>
          </div>
          <div class="vd_content-section clearfix">


               <div class="row">
               <div class="col-md-12">
               <form>

                 <div class="form-group">
                        <label class="col-sm-3 control-label">Set Payment Dates</label>
                        <div class="col-sm-7 controls">
<?php $date = $this->db->get_where('transaction_date',array('for_v_t'=>'vendor'))->row();?>
                       <input type='text' class='date' value="<?php echo $date->date; ?>">

                               </div> </div>
               </form>




                </div>
                 <div class="col-md-12">
                  <a href="<?php base_url()?>excel"><button class="btn vd_btn vd_bg-green " type="button"><i class="fa fa-download append-icon"></i>Save as Excel</button></a>
                  <a href="<?php base_url()?>download_pdf"><button class="btn vd_btn vd_bg-green " type="button"><i class="fa fa-download append-icon"></i>Save as PDF</button></a>
                </div>
                </div>

                <!-- .row -->



            <div class="row">

              <div class="col-md-12" >
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Vendor Finance</h3>
                  </div>
                  <div class="panel-body table-responsive" id="table">
                    <table class="table table-striped" id="data-tables1" >
                      <thead>
                        <tr>
                          <th>OrderNo</th>
                          <th>Date</th>
                          <th>VendorID</th>
                          <th>ProductID</th>
                          <th>Cost</th>
                           <th>PayAmount</th>
                          <th>UserID</th>

                          <th>Status</th>
                          <th>Change Status</th>
                        </tr>
                      </thead>
                      <tbody id="orders_sorting_table">


                         <?php $i=1;//print_r($items);
						$paid=0;$due=0;$total = 0;

						 foreach($items as $item){
               foreach ($item as $item) {
                $item2 = $this->db->get_where("order_items",array("oid"=>$item->oid,"vendor_id"=>$item->vendor_id));
                $item2_result = $item2->result();
                $item2_num = $item2->num_rows();
                //print_r($item2);
                if($item2_num>1 ){
                  $a = array();
                  $total=0;

                foreach ($item2_result as $value) {
 $type = explode('/',$value->pimg);
                  //$value->pid;
                 if($type[0]=='accessories'){$a[] = "PAMD-".$value->pid; }
                 else if($type[0]=='fabrics'){$a[] = "PFMD-".$value->pid; }
                 else if($type[0]=='uniform'){$a[] = "PUMD-".$value->pid; }
                 else if($type[0]=='online_boutique'){$a[] = "POMD-".$value->pid; }

                 $total += $value->subtotal;
                }

                if(!empty($a) && count($a)>1){
							 ?>
                        <tr class="gradeA">
                          <td>OMD-<?php echo $item->oid;?></td>
                          <td><?php
                          $order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
                          echo " $order_date->odate </td><td>";

                           $vendor_name = $this->db->get_where("vendor",array("vid"=>$item->vendor_id))->row();
                           //print_r($vendor_name);

                           echo 'VMD-'.$vendor_name->vid."</td><td>";
                            if(!empty($a)){echo implode(' , ', $a);}else{$type = explode('/',$value->pimg);
                                             //$value->pid;
                                            if($type[0]=='accessories'){echo "PAMD-".$value->pid; }
                                            else if($type[0]=='fabrics'){echo "PFMD-".$value->pid; }
                                            else if($type[0]=='uniform'){echo "PUMD-".$value->pid; }
                                            else if($type[0]=='online_boutique'){echo "POMD-".$value->pid; }}?></td>

                          <td>Rs. <?php if($total!=0){echo $total;}else{ echo $item->subtotal;}?>/- <?php if($item->status==""){?>
                          <span class="label label-warning">Due</span>
                          <?php }else{?>
                           <span class="label label-success">Paid</span><?php }?></td>
                             <td><?php $tax_price = (($item->subtotal)*($vendor_name->markup))/100;
      $tax_price = round(($item->subtotal)-$tax_price); echo "Rs. ".$tax_price." /-"; ?></td>


                          <td><?php




                            echo "UMD-".$order_date->userid;?></td><td>
                            <?php

?>
                          <?php if($item->status==""){?>
                          <span class="label label-warning">Pending</span>
                          <?php }else{?>
                           <span class="label label-success">Completed</span><?php }?>
                         </td>
                         <td>

                            <?php if($item->status==''){
                              echo"<button data-toggle='tooltip' title='Payment Due' class='btn btn-xs btn-danger services_disable' href='$item->vendor_id' id='$item->oid'><i class='fa fa-check'></i></button>";
                              }else if($item->status=='completed'){
                                echo "<button data-toggle='tooltip' title='Payment Completed' class='btn btn-xs btn-success' id='$item->oid'><i class='fa fa-check'></i></button>";
                                } ?>
                                <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" href='<?php echo $item->vendor_id;?>' id="<?php echo $item->oid;?>" type="button"><i class="fa fa-trash-o"></i></button>

                         </td>
                        </tr>
                        <?php  $a = array(); $total=0;$i++;//$gt=$gt+$total;
						 }$pre_id = $item->oid;
						$total=0;}else{
						 	?>
						 	<tr class="gradeA">
                          <td>OMD-<?php echo $item->oid;?></td>
                          <td><?php
                          $order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
                          echo " $order_date->odate </td><td>";

                           $vendor_name = $this->db->get_where("vendor",array("vid"=>$item->vendor_id))->row();
                           //print_r($vendor_name);

                           echo 'VMD-'.$vendor_name->vid."</td><td>";
                            if(!empty($a)){print_r($a);}else{$type = explode('/',$item->pimg);
                                             //$value->pid;
                                            if($type[0]=='accessories'){echo "PAMD-".$item->pid; }
                                            else if($type[0]=='fabrics'){echo "PFMD-".$item->pid; }
                                            else if($type[0]=='uniform'){echo "PUMD-".$item->pid; }
                                            else if($type[0]=='online_boutique'){echo "POMD-".$item->pid; }}?></td>

                          <td>Rs. <?php if($total!=0){echo $total;}else{ echo $item->subtotal;}?>/- </td>
                           <td><?php $tax_price = (($item->subtotal)*($vendor_name->markup))/100;
      $tax_price = round(($item->subtotal)-$tax_price); echo "Rs. ".$tax_price." /-"; ?>
        <?php if($item->status==""){?>
                          <span class="label label-warning">Due</span>
                          <?php }else{?>
                           <span class="label label-success">Paid</span><?php }?>

      </td>

                          <td><?php

                            echo "UMD-".$order_date->userid;?></td><td>
                            <?php

?>
                          <?php if($item->status==""){?>
                          <span class="label label-warning">Pending</span>
                          <?php }else{?>
                           <span class="label label-success">Completed</span><?php }?>
                         </td>
                         <td>

                            <?php if($item->status==''){
                              echo"<button data-toggle='tooltip' title='Payment Due' class='btn btn-xs btn-danger services_disable' href='$item->vendor_id' id='$item->oid'><i class='fa fa-check'></i></button>";
                              }else if($item->status=='completed'){
                                echo "<button data-toggle='tooltip' title='Payment Completed' class='btn btn-xs btn-success' id='$item->oid'><i class='fa fa-check'></i></button>";
                                } ?>
                                <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" href="<?php echo $item->vendor_id;?>" id="<?php echo $item->oid;?>" type="button"><i class="fa fa-trash-o"></i></button>

                         </td>
                        </tr>
                        <?php
						 	}}}?>

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget -->
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


    <link rel="stylesheet" type="text/css" href="https://craftpip.github.io/jquery-confirm/css/jquery-confirm.css"/>
    <script src="https://craftpip.github.io/jquery-confirm/demo/libs/bundled.js"></script>
    <script type="text/javascript" src="https://craftpip.github.io/jquery-confirm/js/jquery-confirm.js"></script><script>
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
                                       var sid2=thisvari.attr('href');
                                       console.log(sid);
              thisvari.closest("tr").remove();
              $.ajax({
               type: "POST",

               url: '<?php echo base_url();?>index.php/product/del_order_items',
               data: {oid:sid,vid:sid2},
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
                            content: 'Payment Done?',
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
                                       var sid2=thisvari.attr('href');
                                       thisvari.removeClass("btn-success");
                                       thisvari.addClass("btn-danger");
                                        $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Product/order_item_completed',
               data: {oid:sid,vid:sid2},
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


            $(".date").datepicker({
    onSelect: function(dateText) {
     //alert(this.value);
     //var
     $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/product/vendor_date_set',
               data: {date:this.value},
               success: function(response){
                 alert(response);
               }
               });
    }
  }).on("change", function() {
    display("Got change event from field");
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
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/pnotify/js/jquery.pnotify.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/theme.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/custom/custom.js"></script>

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
</html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
       var jqNew = jQuery.noConflict();
    jqNew(document).ready(function() {

        "use strict";
        
        jqNew("#data-tables1").dataTable({
          "order": [[ 0, "desc" ]]
        });
       
    } );
</script>
