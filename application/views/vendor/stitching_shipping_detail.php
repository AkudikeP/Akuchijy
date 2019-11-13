
 <?php $total_stitch_with_fab=0; ?>
       <div class="vd_title-section clearfix">
            <div class="vd_panel-header no-subtitle">
              <h1>Order Detail </h1>
            </div>
          </div>
          <div class="vd_content-section clearfix" id="printableArea">
            <div class="row">
              <div class="col-sm-9">
                <div class="panel widget light-widget">
                  <div class="panel-body" style="padding:40px;">
                    <div class="pull-right text-right">
                      
                    </div>
                    <div class="mgbt-xs-20"><img alt="logo" src="<?php echo base_url();?>assets/images/logo2.png" /></div>
                    <address>
                   <?php $site_address=$this->db->get('footer')->row(); 
                      echo $site_address->office_add ; ?> </br>
                  <?php 
                    echo $site_address->mobile;
                   ?> </br>
                   <span>info@ansvel.com</span>                  
                    </address>
                    <hr/>
                    <br/>
                    <div class="pd-25">
                      <div class="row">
                        <div class="col-xs-9">
                        </div>
                      </div>
                    </div>

                    <table class="table table-condensed table-striped">
                      <thead>
                        <tr>
                          <th>SKU</th>
                          <th>Product Name</th>
                          <th>Product Image</th>
                          <th class="text-center" style="width:20px;">QTY</th>
                          <th class="text-right" style="width:120px;">UNIT PRICE</th>
                          <th class="text-right" style="width:120px;">TOTAL</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php  foreach($items as $item){ ?>

                      <?php  $is = $this->db->get_where('stitching_bundle',array('id'=>$item->pid))->row();
                        if(isset($is) && !empty($is))
                         {
                        $is_2 = $this->db->get_where('bundle',array('bundle_no'=>$is->bundle_no,'addon_or_not'=>4))->row();
                      
                        if(isset($is_2) && !empty($is_2))
                         {
                        $is_3 = $this->db->get_where('fabric',array('id'=>$is_2->part_ids))->result();
                        //print_r($is_3);
                      }}
                         if(isset($is_3) && !empty($is_3))
                         {
                            foreach ($is_3 as $value) { ?>
                              
                           <tr>
                          <td class="text-center"><?php echo $value->id;?></td>
                          <td class="text-center"><?php echo $value->title;?></td>

                           <td class="text-center"> <img style="max-height:10%;" class="img img-responsive pull-left" src="<?php echo base_url();?>assets/images/fabrics/<?php echo $value->thumb;?>">
                           </td>
                            <td>1</td>
                            <td class="text-right"><i class="fa fa-inr" aria-hidden="true"></i>
 <?php echo  $value->price.'/- ';?>
                            <?php echo $total_stitch_with_fab+=$value->price; ?></td></tr>
                           <?php
                            }
                         }
                        ?>
                        <?php if($item->order_type!='stitch with fabric')
                         { ?>
                        <tr>
                          <td class="text-center"><?php echo $item->pid;?></td>
                          <td class="text-center"><?php echo $item->pname;?></td>
                          <td class="text-center">                      
                              <img style="max-height:100px;" class="img img-responsive" src="<?php echo base_url();?>assets/images/<?php echo $item->pimg;?>"> </td>

                          <td><?php echo $item->qty?></td>
                          <td class="text-right"><i class="fa fa-inr" aria-hidden="true"></i>
 <?php echo $item->price.'/- ';?></td>
                          <td class="text-right"><i class="fa fa-inr" aria-hidden="true"></i>
 <?php echo $item->subtotal;?>/-</td>
                          
                        </tr>
                        <?php }}?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="3">Note:Thank you for your business. Please send all of these items using wooden box package..</th>
                          <th class="text-right  pd-10">Order Total</th>
                          <?php 
                          $total=0;
                           $total_stitch_with_fab;
                           if($item->order_type!='stitch with fabric')
                         { 
                          foreach($items as $totals){
                            $total+=$totals->subtotal;
                            }
                          }else{
                            echo $total_stitch_with_fab; 
                          }  ?>
                          

                          <th class="text-right  pd-10 "><span class="vd_green font-sm font-normal"><i class="fa fa-inr" aria-hidden="true"></i>
<?php echo $total;?>/-</span></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- panel-body --> 
                  
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-sm-9-->
              <div class="col-sm-3">
                <div class="mgbt-xs-5">
                  <a href="<?php echo base_url();?>index.php/Vendor/shipping_detail" class="btn btn-warning" type="button">
                  <i class="fa fa-arrow-left"></i> Back To All Orders</a>
                </div>
                <div class="mgbt-xs-5">
                <?php foreach($items as $items){?>
                  <?php if($items->shipping_status=='') {?>
                    <a href="<?php echo base_url();?>index.php/Vendor/change_status/<?php echo $items->oid;?>"><button class="btn btn-xs btn-warning"><?php if($items->shipping_status=='') echo "Ready To Pickup"; ?></button></a> 
                    <?php } else {?>
                        <a href="#"><button class="btn btn-xs btn-success" disabled=""><?php echo $items->shipping_status;?></button></a>
                  <?php } return false; }?>
                </div>                           
              </div>
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


 <script type="text/javascript">
function printDiv(printableArea) {
  //
    var printContents = document.getElementById(printableArea).innerHTML;
  //alert (printContents);
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>


</body>

<!-- Mirrored from vendroid.venmond.com/pages-invoice.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2016 11:25:31 GMT -->
</html>