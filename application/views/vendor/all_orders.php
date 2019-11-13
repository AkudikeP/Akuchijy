<style>
.active3
{
  background-color:#1fae66 !important;
}
</style><link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#orders_sorting").change(function(){
 // alert('called');
         var sid=$(this).val();


         //alert(sid);
         $.ajax({
type: "POST",
url: '<?php echo base_url();?>index.php/vendor/orders_sorting',
data: {sid:sid},
success: function(response){
console.log(response);
$("#orders_sorting_table").html(response);
}
});
});

  $("#download_excel").click(function(){
 // alert('called');
         //var sid=$(this).val();


         window.location = "<?php echo base_url(); ?>/Vendor/excel";

});
      $("#download_pdf").click(function(){
 // alert('called');
         //var sid=$(this).val();


         window.location = "<?php echo base_url(); ?>/Vendor/download_pdf";

});


});
</script>





        <div class="vd_content-section clearfix">

             <div class="row">





              <!-- .row -->

            </div>
      <!-- .vd_content -->


          <div class="row">
<div class="col-md-12 pull-left">
<a href="<?=base_url();?>vendor/all_orders_excel"><button class="btn btn-primary">Excel</button></a>
      </div>

            <div class="col-md-12">
              <div class="panel widget">
                <div class="panel-heading vd_bg-grey">
                  <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>All Orders</h3>
                </div>
                <div class="panel-body table-responsive">
                  <table class="table table-striped" id="data-tables1">
                    <thead>
                      <tr>
                        <th>Sno</th>
                        <th>OrderNo</th>
                        <th>Date</th>

                        <th>Product ID</th>
                        <th>Cost</th>
                        <th>View Product Detail</th>


                      </tr>
                    </thead>
                    <tbody id="orders_sorting_table">


                       <?php $i=1;//print_r($orders
          $paid=0;$due=0;
           foreach($items as $item){


             if($item->price=="paid"){$paid=$paid+$item->price;}
              if($item->status==""){$due=$due+$item->price;}
             ?>
                      <tr class="gradeA">
                        <td><center><?php echo $i; ?></center></td>
                        <td>OMD-<?php echo $item->oid;?></td>
                        <td><?php
                        $order_date = $this->db->get_where("orders",array("oid"=>$item->oid))->row();
                        echo " $order_date->odate </td><td>";


                         //print_r($vendor_name);


                          //echo $item->pname;?>
                          <?php $type = explode('/',$item->pimg); if($type[0]=='accessories'){echo "PAMD-".$item->pid; }
                          else if($type[0]=='fabrics'){echo "PFMD-".$item->pid; }
                          else if($type[0]=='uniform'){echo "PUMD-".$item->pid; }
                          else if($type[0]=='online_boutique'){echo "POMD-".$item->pid; } ?>
                        </td>

                        <td>Rs. <?php echo $item->subtotal;?>/- <?php if($item->status==""){?>
                        <span class="label label-warning">Due</span>
                        <?php }else{?>
                         <span class="label label-success">Paid</span><?php }?>

                         </td>
                         <td><a href="<?php echo base_url();?>Vendor/product_detail/<?php echo $item->oid;?>"><button data-toggle="tooltip" title="View" class="btn btn-xs btn-success" id="view_detail"><i class="fa fa-eye"></i></button></a></td>
                        </tr>
                      <?php $i++;//$gt=$gt+$total;
           }?>

                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Panel Widget -->
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

<footer style="z-index:500" class="footer-1"  id="footer">
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
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
       var jqNew = jQuery.noConflict();
    jqNew(document).ready(function() {

        "use strict";
        jqNew("#data-tables").dataTable(); 
        jqNew("#data-tables1").dataTable();
       
    } );
</script>