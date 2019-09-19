<?php $total49=0; ?>
       <div class="vd_title-section clearfix">
            <div class="vd_panel-header no-subtitle">
              <h1>Order Detail cum Invoice</h1>
            </div>
          </div>
          <div class="vd_content-section clearfix" >
            <div class="row">
              <div class="col-sm-12">
                <div class="mgbt-xs-3 col-sm-3">
                  <a href="<?php echo base_url();?>index.php/vendor/all_orders" class="btn btn-warning" type="button">
                  <i class="fa fa-arrow-left"></i> Back To All Orders</a>
                </div>
                <div class="mgbt-xs-3 col-sm-3">
                  <button class="btn vd_btn vd_bg-grey" type="button" onclick="printDiv('printableArea')" value="Print Invoice"><i class="fa fa-print append-icon"></i>Print Invoice</button>
                </div>


                <div class="mgbt-xs-3 col-sm-3">
                 <a class="btn vd_btn vd_bg-red" href="<?php echo base_url();?>index.php/vendor/order_shipping_status/<?php echo $order->oid;?>"><i class="fa fa-truck append-icon"></i>Go to shipping</a>
               </div>
              </div>
              <div class="col-sm-12" id="printableArea">
                <div class="panel widget light-widget">
                  <div class="panel-body" style="padding:40px;">
                    <div class="pull-right text-right">
                      <h3 class="font-semibold mgbt-xs-20">INVOICE</h3>
                      <table class="table table-bordered">
                        <tr>
                          <th>Invoice No.</th>
                          <th>Date</th>
                        </tr>
                        <tr>
                          <td>MD-<?php echo $order->oid;?></td>
                          <td><?php echo date("d M Y",strtotime($order->odate));?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="mgbt-xs-20"><img alt="logo" src="<?php echo base_url();?>assets/images/logo2.png" /></div>
                    <?php $data2 = $this->db->get_where('footer',array('id'=>2))->row(); ?>
                    <address>
                      <?php echo $data2->office_add; ?>
                    <!--span>795 PiTechnology, <br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">P:</abbr> (123) 456-7890<br />
                    <br />
                    info@venmond.com<span-->
                    </address>
                    <hr/>
                    <br/>
                    <div class="pd-25">
                      <div class="row">
                        <!--div class="col-xs-9">
                          <address>
                          <strong>Bill To:</strong><br>
                          <?php echo $order->bname;?><br>
                          <?php echo $order->baddress;?><br>
                          <?php echo $order->blandmark.' '.$order->bcity.' '.$order->bstate.' '.$order->bpin;?><br>
                          <i class="fa fa-phone"></i> <?php echo $order->bphone;?>
                          </address>
                        </div-->

                        <!--div class="col-xs-3">
                          <div class="text-right">
                          <strong>Total Amount:</strong><br>
                          <span class="mgtp-5 vd_green font-md">Rs. <?php echo $order->ototal;?>/-</span>
                          </div>
                        </div-->
                      </div>
                    </div>
                    <table class="table table-condensed table-striped">
                      <thead>
                        <tr>
                          <!--th>SKU</th-->
                          <th>DESCRIPTION</th>
                          <th>Prodcut&nbspType</th>
                          <th>Main&nbspCategory</th>
                          <th>Size</th>
                          <th>Color</th>
                          <th class="text-center" style="width:20px;">QTY</th>
                          <th class="text-right" style="width:120px;">UNIT PRICE</th>
                          <th class="text-right" style="width:120px;">TOTAL</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($items as $item){?>
                        <tr>
                          <!--td class="text-center"><?php echo $item->pid;?></td-->
                          <td class="text-center">
                          <img style="width:25%;" class="img img-responsive pull-left" src="<?php echo base_url();?>assets/images/<?php echo $item->pimg;?>">
                          <?php $type = explode('/',$item->pimg);
                          if($type[0]=='accessories'){echo "PAMD-"; }
                              else if($type[0]=='fabrics'){echo "PFMD-"; }
                              else if($type[0]=='uniform'){echo "PUMD-"; }
                              else if($type[0]=='online_boutique'){echo "POMD-"; }
                              echo ''.$item->pid."<br>";?>
                              <?php echo $item->pname;?></td>
                              <td><?php echo $type[0]; ?></td>
                              <td><?php if(isset($item->main_cat)&& !empty($item->main_cat)){if($item->main_cat=='1' || $item->main_cat=='2' || $item->main_cat=='3'){$catname = $this->db->get_where('mcategory',array('mid'=>$item->main_cat))->row();
                              echo $catname->mcat_name;}else{echo $item->main_cat;} } ?></td>
                              <td><?php if(isset($item->size)&& !empty($item->size)){echo $item->size;} ?></td>
                              <td><?php if(isset($item->color)&& !empty($item->color)){echo $item->color;} ?></td>

                          <td><?php echo $item->qty?></td>
                          <td class="text-right"> <?php echo $item->price.'/- ';?></td>
                          <td class="text-right"> <?php $total49 += $item->subtotal; echo $item->subtotal;?>/-</td>

                        </tr>
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="6" rowspan="3" class="bdr">
                            <p class="font-normal"></p></th>
                          <th class="text-right pd-10">Sub Total</th>
                          <th class="text-right pd-10">Rs <?php echo $total49;?>/-</th>
                        </tr>
                        <tr>
                          <th class="text-right  pd-10 no-bd">Discount</th>
                          <th class="text-right  pd-10 vd_red no-bd">Rs <?php echo $order->odis;?>/-</th>
                        </tr>
                        <!--tr>
                          <th class="text-right  pd-10 no-bd">Shipping Cost</th>
                          <th class="text-right  pd-10 no-bd">0.0</th>
                        </tr-->
                        <tr>

                          <th class="text-right  pd-10">Order Total</th>
                          <th class="text-right  pd-10 "><span class="vd_green font-sm font-normal">Rs <?php echo $total49;//-$order->odis;?>/-</span></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- panel-body -->

                </div>
                <!-- Panel Widget -->
              </div>
              <!-- col-sm-9-->

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
                  	Copyright &copy;2016 MobileDarji. All Rights Reserved
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
