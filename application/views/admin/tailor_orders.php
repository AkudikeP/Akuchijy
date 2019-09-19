<?php ob_start(); ?> <link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<style>
.active18
{
	background-color:#1fae66 !important;
}
</style>

<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/css/datepicker.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/bootstrap-datepicker.js"></script>
<link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".date").datepicker({
    onSelect: function(dateText) {
     //alert(this.value);
     //var
     $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/product/tailor_date_set',
               data: {date:this.value},
               success: function(response){
                 //alert(response);
               }
               });
    }
  }).on("change", function() {
    display("Got change event from field");
  });

  $("#orders_sorting").change(function(){

           var sid=$(this).val();
//alert(sid);
           $.ajax({
type: "POST",
url: '<?php echo base_url();?>index.php/product/tailor_orders_sorting',
data: {sid:sid},
success: function(response){
//alert(response);
$("#table").html(response);
}
});
});
});
</script>

          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
                  <h1>Listing All tailor Orders</h1><select id="orders_sorting">
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
<?php $date = $this->db->get_where('transaction_date',array('for_v_t'=>'tailor'))->row();?>
                       <input type='text' class='date' value="<?php echo $date->date; ?>">

                               </div> </div>
               </form>
               </div>
              <div class="mgbt-xs-10">
                  <a href="<?php base_url()?>excel_tailor"><button class="btn vd_btn vd_bg-green " type="button"><i class="fa fa-download append-icon"></i>Save as Excel</button></a>
                  <a href="<?php base_url()?>download_pdf_tailor"><button class="btn vd_btn vd_bg-green " type="button"><i class="fa fa-download append-icon"></i>Save as PDF</button></a>
                </div>




                </div>


            <div class="row">


              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Tailor Finance</h3>
                  </div>
                  <div class="panel-body table-responsive" id="table">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>OrderNo</th>
                          <th>Date</th>

                          <th>Name</th>
                          <th>ProductName</th>
                          <th>Cost</th>
                          <th>UserID</th>
													<th>TailorID</th>

                          <th>Status</th>
                          <th>Change Status</th>
                        </tr>
                      </thead>
                      <tbody>


                         <?php $i=1;//print_r($items);die;
						$paid=0;$due=0;
						 foreach($items as $item){
               foreach ($item as $item) {


							 if($item->scost=="paid"){$paid=$paid+$item->scost;}
							  if($item->pstatus==""){$due=$due+$item->scost;}
							 ?>
                        <tr class="gradeA">
                          <td>OMD-<?php echo $item->oid;?></td>
                          <?php $order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
                          echo "<td>$order_date->odate </td>";


                           $tailor_name = $this->db->get_where("tailors",array("id"=>$item->tid))->row();
                           //print_r($tailor_name);
                           echo "<td>";
                           echo $tailor_name->tname."</td>";
                           ?>
                          <td><?php echo $item->pname;?></td>
                          <td>Rs. <?php echo $item->scost;?>/- <?php if($item->pstatus==""){?>
                          <span class="label label-warning">Due</span>
                          <?php }else{?>
                           <span class="label label-success">Paid</span><?php }?></td>
                           <td><?php echo 'UMD-'.$order_date->userid;?></td>
                           <td><?php echo 'TMD-'.$tailor_name->id;?></td>
                          <td>
                          <?php if($item->status==""){?>
                          <span class="label label-warning">Pending</span>
                          <?php }else{?>
                           <span class="label label-success">Completed</span><?php }?>
                         </td>
                         <td>

                            <?php if($item->pstatus==''){
                              echo"<button data-toggle='tooltip' title='Payment Due' class='btn btn-xs btn-danger services_disable' id='$item->soid'><i class='fa fa-check'></i></button>";
                              }else if($item->pstatus=='completed'){
                                echo "<button data-toggle='tooltip' title='Payment Completed' class='btn btn-xs btn-success' id='$item->id'><i class='fa fa-check'></i></button>";
                                } ?>
                                 <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" id="<?php echo $item->soid;?>" type="button"><i class="fa fa-trash-o"></i></button>

                         </td>
                        </tr>
                        <?php $i++;//$gt=$gt+$total;
						 }}?>

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
    <script type="text/javascript" src="https://craftpip.github.io/jquery-confirm/js/jquery-confirm.js"></script>
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

               url: '<?php echo base_url();?>index.php/product/del_tailor_assign',
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
                                       thisvari.removeClass("btn-danger");
                                       thisvari.addClass("btn-success");
                                        $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Product/order_item_completed_tailor',
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
        
        jqNew("#data-tables1").dataTable();
       
    } );
</script>
