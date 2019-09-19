<style>
.active8
{
  background-color:#1fae66 !important;
}
</style><link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css"> 
<link href="<?php echo base_url();?>adminassets/css/datepicker.css" rel="stylesheet" type="text/css"> 
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/bootstrap-datepicker.js"></script> 
<link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet" />

<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
      
          <div class="vd_content-section clearfix">
           
            <div class="row">
              
              <div class="col-md-12" >
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Shipping Products</h3>
                  </div>
                  <div class="panel-body table-responsive" id="table">
                    <table class="table table-striped" id="data-tables1" >
                      <thead>
                        <tr>
                          <th>OrderNo</th>
                          <th>Date</th>                        
                          <th>ProductName</th>
                          <th>Cost</th>
                          <th>Change Status</th>
                        </tr>
                      </thead>
                      <tbody id="orders_sorting_table">
                            <?php $i=1;//print_r($items);
            $total = 0;

             foreach($items as $item){
               foreach ($item as $item) {

                $item2 = $this->db->get_where("order_items",array("oid"=>$item->oid,"vendor_id"=>$item->vendor_id));
                $item2_result = $item2->result();
                $item2_num = $item2->num_rows();
                //print_r($item2);
                if($item2_num>=1 ){
                  $a = array();
                  $total=0;
                
                foreach ($item2_result as $value) {

                 $a[] = $value->pname;
                 $total += $value->subtotal;
                }

                if(true){
               ?>
                        <tr class="gradeA">
                          <td>OMD-<?php echo $item->oid;?></td>
                          <td><?php
                          $order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
                          echo " $order_date->odate </td><td>";
                            if(!empty($a)){echo implode(' , ', $a);}else{echo $item->pname;}?></td>
                         
                          <td> Rs. <?php if($total!=0){echo $total;}else{ echo $item->price;}?>/-</td>
                         <td>
                          <?php if($item->shipping_status=='') {?>
                          <a href="<?php echo base_url();?>index.php/Vendor/order_shipping_status/<?php echo $item->oid;?>"><button class="btn btn-xs btn-warning"><?php if($item->shipping_status=='') echo "Ready To Pickup"; ?></button></a> 
                          <?php } else {?>
                            <a href="<?php echo base_url();?>index.php/Vendor/order_shipping_status/<?php echo $item->oid;?>"><button class="btn btn-xs btn-success"><?php echo $item->shipping_status;?></button></a>
                          <?php } ?>
                         </td>
                        </tr>
                        <?php  $a = array(); $total=0;$i++;
             }$pre_id = $item->oid;
            $total=0;}}}?>
                        
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
        jqNew('#data-tables').dataTable();
        jqNew("#data-tables1").dataTable();
    } );
</script>