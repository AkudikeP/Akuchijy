<?php ini_set('display_errors', 0);
if($order->cancel_read_status=='noread')
{
  $this->db->where(array('cancel_read_status'=>'noread','oid'=>$order->oid));
  $this->db->update('orders',array('cancel_read_status'=>'yes'));
}
$city=$this->db->get_where('cities',array('id'=>$order->bcity))->row();
        $state=$this->db->get_where('states',array('id'=>$order->bstate))->row(); ?>
       <div class="vd_title-section clearfix">
            <div class="vd_panel-header no-subtitle">
              <h1>Order Detail</h1>
            </div>
          </div>
          <div class="col-sm-12">
                            <div class="row">
                            <?php if($order->delete==0){ ?>

                <div class="col-sm-3">
                  <a href="<?php echo base_url();?>index.php/product/pending_orders" class="btn btn-warning" type="button">
                  <i class="fa fa-arrow-left"></i> Back To All Orders</a>
                </div>
                <div class="col-sm-3">
                  <button class="btn vd_btn vd_bg-grey" type="button" onclick="printDiv('printableArea')" value="Print Invoice"><i class="fa fa-print append-icon"></i>Print Invoice</button>
                </div>

                 <div class="col-sm-3">
                  <a class="btn vd_btn vd_bg-red del_fabric" id="<?php echo $order->oid;?>" ><i class="fa fa-trash-o append-icon"></i>Delete Order</a>
                </div>
                <div class="col-sm-3">
                  <a class="btn vd_btn vd_bg-red" href="<?php echo base_url();?>product/order_shipping_status/<?php echo $order->oid;?>"><i class="fa fa-truck append-icon"></i>Go to Shipping</a>
                </div>
                <?php } ?>
                </div>
              </div>
<!--invoic-->
<div class="vd_content-section clearfix" id="printableArea" style="display:none">

  <div class="row">



    <div class="col-sm-12">
      <div class="panel widget light-widget">
        <div class="panel-body" style="padding:40px;">
            <center class="pull-center"><h3 class="font-semibold mgbt-xs-20">INVOICE</h3></center>
          <div class="pull-right text-right">

            <table class="">
              <tr>
                <th>Invoice No </th>
                <th> : </th>
                <td> MD-<?php echo $order->oid;?></td>
              </tr>
              <tr>
                <th>Date </th>
                <th> : </th>
                <td> <?php echo date("d M Y",strtotime($order->odate));?></td>
              </tr>
            </table>
          </div>
          <div class="mgbt-xs-20"><img alt="logo" src="<?php echo base_url();?>assets/images/logo2.png" /></div>
          <div class="row">
            <div class="col-md-6 col-sm-6 pull-left" >
               <table style="width: 100%">
               <tr><th>Billing Details</th></tr>

            <tr><td><?php echo $order->bname;?></td></tr>
            <tr><td><?php echo $city->name;?></td></tr>
            <tr><td><?php echo $order->baddress." ".$order->bpin;?></td></tr>
            <tr><td><i class="fa fa-phone"></i> <?php echo $order->bphone;?></td></tr>


          </table>
            </div>

            <div class="col-md-6 col-sm-6 pull-right" >

              <table style="width: 100%">
              <tr><th>Shipping Details</th></tr>

           <tr><td><?php echo $order->bname;?></td></tr>
           <tr><td><?php echo $city->name;?></td></tr>
           <tr><td><?php echo $order->baddress." ".$order->bpin;?></td></tr>
           <tr><td><i class="fa fa-phone"></i> <?php echo $order->bphone;?></td></tr>


         </table>
            </div>

          </div>
<br>



          <table>
            <tr><td>Order ID :<?php echo '&nbspOMD-'.$order->oid;?></td></tr>
            <tr><td>Pyament via : <?php echo $order->pay_method ; ?>, Customer IP : <?php echo $order->ip ?> </tr>
              <tr><td>Expected Delivery date : <?php echo date("d M Y",strtotime($order->delivery_date)); ?></td></tr>
            <tr>
              <td><b>General Details</b></td>
            </tr>
            <tr><td>Order date : <?php echo date("d M Y",strtotime($order->odate)) ?> </td></tr>

            <tr><td>Order status : <?php echo $order->ostatus ?></td></tr>
            <tr><td>Used Coupon Code : <?php echo $order->code ?></td></tr>

          </table>
      <hr/>
<table class="table table-condensed table-striped" style="width:100%;">
            <thead>
              <tr>
                  <th>Prodcut&nbspImage</th>
                <th>SKU</th>
                <th>Prodcut&nbspDescription&nbsp</th>



                <th class="text-center" >QTY</th>
                <th class="text-right">Unit Price</th>
                <th class="text-right">Amount</th>
              </tr>
            </thead>
            <tbody>
            <?php $total_price=0; foreach($items as $item){
              $check = explode('/', $item->pimg);
              //print_r($check);
              if($check[0]=='accessories')
              {
                ?>

                <?php
              }
              ?>
              <tr>
                <td>
            <?php if($item->order_type=='stitch' || $item->order_type=='stitch with fabric'){
?>
<img style="max-height:100px;" class="img img-responsive" src="<?php echo base_url();?>adminassets/<?php echo $item->pimg; ?>"> </td>
<?php
              }elseif($item->pimg=='null'){?>
              <img style="max-height:100px;" class="img img-responsive" src="<?php echo base_url();?>assets/images/fabrics/bag.png"> </td>
              <?php } else {?>
                <img style="max-height:100px;" class="img img-responsive" src="<?php echo base_url();?>assets/images/<?php echo $item->pimg;?>"> </td>
                <?php } ?>
                <td class="text-center"><?php if(isset($item->sku)&& !empty($item->sku)){echo $item->sku;} ?></td>
                <td class="text-center">

                <center><?php echo $item->pname;?><br><?php $type = explode('/',$item->pimg);
                if($type[0]=='accessories'){echo "PAMD-"; }
                    else if($type[0]=='fabrics'){echo "PFMD-"; }
                    else if($type[0]=='uniform'){echo "PUMD-"; }
                    else if($type[0]=='online_boutique'){echo "POMD-"; }
                    echo ''.$item->pid;?></center></td>



                <td><?php echo $item->qty?></td>
                <td class="text-right"> <?php  echo $item->price;?></td>
                <td class="text-right"> <?php  $total_price += $item->qty*$item->price; echo $item->qty*$item->price; ?></td>

              </tr>
              <?php }?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="4" rowspan="5" class="bdr">
                </th>
                <th class="text-right pd-10">Total(Included all taxes)</th>
                <th class="text-right pd-10"> <?php echo $total_price;?></th>
              </tr>
              <tr>
                <th class="text-right  pd-10 no-bd">Discount</th>
                <th class="text-right  pd-10  no-bd"> <?php echo $order->odis;?></th>
              </tr>
              <!--tr>
                <th class="text-right  pd-10 no-bd">Tax&nbspIncluded</th>
                <th class="text-right  pd-10  no-bd"> <?php echo $order->odis;?></th>
              </tr-->
              <tr>
              <?php $ship = $this->db->get_where('shipping_methods',array('id'=>$order->shipping_method))->row();
?>
                <th class="text-right  pd-10 no-bd">Shiping</th>
                <th class="text-right  pd-10 no-bd"><?php echo $ship->price." (".$ship->reason.")";  ?></th>
              </tr>
              <tr>
                                         <th class="text-right  pd-10">Total</th>
                <th class="text-right  pd-10 "><span class="vd_green font-sm font-normal"> <?php echo $order->ototal;//-$order->odis;?></span></th>
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
<!--inovice-->
          <div class="vd_content-section clearfix">
            <div class="row">



              <div class="col-sm-12">
                <div class="panel widget light-widget">
                  <div class="panel-body" style="padding:40px;">
                    <!--div class="pull-right text-right">
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
                    </div-->
                    <!--div class="mgbt-xs-20"><img alt="logo" src="<?php echo base_url();?>assets/images/logo2.png" /></div>
                    <address>
                    795 PiTechnology, <br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">P:</abbr> (123) 456-7890<br />
                    <br />
                    info@venmond.com
                    </address-->
                    <table>
                      <tr><td>Order Id </td><td> : </td><td><?php echo '&nbsp&nbspOMD'.$order->oid;?></td></tr>
                      <tr><td>Invoice No </td><td> : </td><td> <?php  echo '&nbsp&nbspMD-'.$order->oid;?></td></tr>
                      <tr><td>Order Date </td><td> : </td><td><?php echo '&nbsp&nbsp'.date("d M Y",strtotime($order->odate));?></td></tr>
                      <!--tr><td>Time </td><td> : </td><td></td></tr-->
                      <tr><td>Due Delivery Date </td><td> : </td><td><?php echo '&nbsp&nbsp'.date("d M Y",strtotime($order->delivery_date));?></td></tr>
                      <tr><td>Customer IP Address</td><td> : </td><td><?php echo '&nbsp&nbsp'.$order->ip;?></td></tr>
                      <tr><td>Used Coupon Code</td><td> : </td><td><?php echo '&nbsp&nbsp'.$order->code;?></td></tr>
                    </table>
                    <hr/>
                    <div class="row">
                      <div class="col-sm-6">
                       
                         <table>
                         <tr><th><h4><strong>Bill To</strong></h4></th></tr>
                         <?php $userdata = $this->db->get_where('users',array('uid'=>$order->userid))->row(); ?>
                          <?php $city=$this->db->get_where('cities',array('id'=>$userdata->city))->row();
                              $state=$this->db->get_where('states',array('id'=>$userdata->state))->row(); ?>
                      <tr><td>Customer ID </td><td> : </td><td><?php echo '&nbsp&nbspCMD'.$order->userid;?></td></tr>
                      <tr><td>Customer Name </td><td> : </td><td><?php echo '&nbsp&nbsp'.$userdata->name;?></td></tr>
                      <tr><td>Contact </td><td> : </td><td><?php echo '&nbsp&nbsp'.$userdata->mobile;?></td></tr>
                      <tr><td>Email ID </td><td> : </td><td><?php echo '&nbsp&nbsp'.$userdata->email;?></td></tr>
                      <tr><td>Address </td><td> : </td><td><?php echo '&nbsp&nbsp'.$userdata->address;?></td></tr>
                      <tr><td>State </td><td> : </td><td><?php echo '&nbsp&nbsp'.$state->name;?></td></tr>
                      <tr><td>City </td><td> : </td><td><?php echo '&nbsp&nbsp'.$city->name;?></td></tr>
                      <tr><td>Landmark </td><td> : </td><td><?php echo '&nbsp&nbsp'.$userdata->landmark;?></td></tr>
                      <tr><td>Pin </td><td> : </td><td><?php echo '&nbsp&nbsp'.$userdata->pincode;?></td></tr>

                    </table>
                      </div>

                      <div class="col-sm-6">

                         <table>
                         <?php $city=$this->db->get_where('cities',array('id'=>$order->bcity))->row();
                              $state=$this->db->get_where('states',array('id'=>$order->bstate))->row(); ?>
                     <tr><th><h4><strong>Shipping Detail</strong></h4></th></tr>
                      <tr><td>Name </td><td> : </td><td><?php echo '&nbsp&nbsp'.$order->bname;?></td></tr>
                      <tr><td>Contact </td><td> : </td><td><?php echo '&nbsp&nbsp'.$order->bphone;?></td></tr>

                      <tr><td>Address </td><td> : </td><td><?php echo '&nbsp&nbsp'.$order->baddress;?></td></tr>
                      <tr><td>State </td><td> : </td><td><?php echo '&nbsp&nbsp'.$state->name;?></td></tr>
                      <tr><td>City </td><td> : </td><td><?php echo '&nbsp&nbsp'.$city->name;?></td></tr>
                      <tr><td>Landmark </td><td> : </td><td><?php echo '&nbsp&nbsp'.$order->blandmark;?></td></tr>
                       <tr><td>Pin Code </td><td> : </td><td><?php echo '&nbsp&nbsp'.$order->bpin;?></td></tr>


                    </table>
                      </div>

                    </div>


                      <h4><strong>Status Detail</strong></h4>
                      <table class="table table-condensed table-striped">
                      <thead>
                       <tr>
                       <th>S.no.</th>
                       <th>Order date</th>
                       <th>Delivery Date</th>
                       <th>Modified date</th>
                       <th>Status</th>
                       <th>Change by</th>
                       <th>Vendor ID</th>
                       </tr>
                        <tbody>
                      <?php
                      $i=1;
                      foreach($items as $item){
                      $sdata = $this->db->get_where('order_status',array('oid'=>$order->oid))->result();
                      //echo $this->db->last_query();
                      foreach ($sdata as $value) {
                       ?>

                        <tr>
                          <td class="text-center"><?php echo $i; ?></td>
                          <td class="text-center">

                          <center><?php echo $order->odate;?></center></td>
                          <td><?php echo $order->delivery_date;?></td>
                          <td><?php echo date("d-m-Y",strtotime($value->status_date)) ?></td>


                          <td><?php if($order->ostatus=="cancelled by user"){echo $order->ostatus;}else{echo $value->shipping_status;} ?></td>

                          <td><?php echo $value->status_changed_by; ?> </td>
                          <td><?php if(isset($item->vendor_id)&& !empty($item->vendor_id)){echo 'VMD-'.$item->vendor_id;} ?></td>

                        </tr>

                       <?php $i++;
                      }
                    }
                       /*$i=1; foreach($items as $item){
                        $check = explode('/', $item->pimg);
                        //print_r($check);
                        if($check[0]=='accessories')
                        {
                          ?>

                          <?php
                        }
                        ?>
                        <tr>
                          <td class="text-center"><?php echo $i; ?></td>
                          <td class="text-center">

                          <center><?php echo $order->odate;?></center></td>
                          <td><?php echo $order->delivery_date;?></td>
                          <td><?php echo $item->status_datetime;?></td>


                          <td><?php if($order->ostatus=="cancelled by user"){echo $order->ostatus;}else{echo $item->shipping_status;} ?></td>

                          <td><?php echo $item->status_changed_by; ?> </td>
                          <td><?php if(isset($item->vendor_id)&& !empty($item->vendor_id)){echo 'VMD-'.$item->vendor_id;} ?></td>

                        </tr>
                        <?php $i++; }*/?>
                      </tbody>
                      </thead>
                      <tbody>


                      </table>


                    <br/>
                    <!--div class="pd-25">
                      <div class="row">
                        <div class="col-xs-9">
                          <address>
                          <strong>Bill To:</strong><br>
                          <?php echo $order->bname;?><br>
                          <?php echo $order->baddress;?><br>
                          <?php echo $order->blandmark.' '.$order->bcity.' '.$order->bstate.' '.$order->bpin;?><br>
                          <i class="fa fa-phone"></i> <?php echo $order->bphone;?>
                          </address>
                        </div>
                       <!-- <div class="col-xs-4">
                          <address>
                          <strong>Ship To:</strong><br>
                          John Doe<br>
                          795 Folsom Ave, Suite 600<br/>
                          San Francisco, CA 94107<br>
                          </address>
                        </div>-->
                       <!-- <div class="col-xs-2">
                          <address>
                          <strong>Due Date:</strong><br>
                          24 July 2013
                          </address>
                        </div>>
                        <div class="col-xs-3">
                          <div class="text-right">
                          <strong>Total Amount:</strong><br>
                          <span class="mgtp-5 vd_green font-md">Rs. <?php echo $order->ototal;?>/-</span>
                          </div>
                        </div>
                      </div>
                    </div-->
                    <h4><strong>Product Detail</strong></h4>
                    <table class="table table-condensed table-striped" style="margin-left: -41px;">
                      <thead>
                        <tr>
                          <!--th>SKU</th-->
                          <th>Prodcut&nbspName&nbsp(ID)</th>
                          <th>Prodcut&nbspImage</th>
                          <th>Prodcut&nbspType</th>

                          <th>Main&nbspCategory</th>
                          <th>Size</th>
                          <th>Color</th>
                          <th>Vendor&nbspID</th>
                          <th>Description</th>
                          <th>Datetime</th>

                          <th class="text-center" style="width:20px;">QTY</th>
                          <th class="text-right" style="width:120px;">UNIT PRICE</th>
                          <th class="text-right" style="width:120px;">TOTAL</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $total_price=0; foreach($items as $item){
                        $check = explode('/', $item->pimg);
                        //print_r($check);
                        if($check[0]=='accessories')
                        {
                          ?>

                          <?php
                        }
                        ?>
                        <tr>
                          <!--td class="text-center"><?php if(isset($item->sku)&& !empty($item->sku)){echo $item->sku;} ?></td-->
                          <td class="text-center">

                          <center><?php echo $item->pname;?><br><?php $type = explode('/',$item->pimg);
                          if($type[0]=='accessories'){echo "PAMD-"; }
                              else if($type[0]=='fabrics'){echo "PFMD- ".$item->pid; }
                              else if($type[0]=='uniform'){echo "PUMD- ".$item->pid; }
                              else if($type[0]=='online_boutique'){echo "POMD- ".$item->pid; }
                                else if($type[0]=='altration'){echo "PALMD- ".$item->pid; }
                              ?></center></td><td>
                          <?php if($item->order_type=='stitch' || $item->order_type=='stitch with fabric'){
?>
 <img style="max-height:100px;" class="img img-responsive" src="<?php echo base_url();?>adminassets/<?php echo $item->pimg; ?>"> </td>
<?php
                            }elseif($item->pimg=='null'){?>
                            <img style="max-height:100px;" class="img img-responsive" src="<?php echo base_url();?>assets/images/fabrics/bag.png"> </td>
                            <?php } else {?>
                              <img style="max-height:100px;" class="img img-responsive" src="<?php echo base_url();?>assets/images/<?php echo $item->pimg;?>"> </td>
                              <?php } ?>

                          <td><?php echo $check[0]; ?></td>

                           <td><?php if(isset($item->main_cat)&& !empty($item->main_cat)){if($item->main_cat=='1' || $item->main_cat=='2' || $item->main_cat=='3'){$catname = $this->db->get_where('mcategory',array('mid'=>$item->main_cat))->row();
                           echo $catname->mcat_name;}else{echo $item->main_cat;} } ?></td>

                           <td><?php if(isset($item->size)&& !empty($item->size)){echo $item->size;} ?></td>
                           <td><?php if(isset($item->color)&& !empty($item->color)){echo $item->color;} ?></td>
                           <td><?php if(isset($item->vendor_id)&& !empty($item->vendor_id)){echo 'VMD-'.$item->vendor_id;} ?></td>
                           <td><?php if(isset($item->altration_desc)&& !empty($item->altration_desc)){echo $item->altration_desc;} ?></td>
                           <td><?php if(isset($item->altration_datetime)&& !empty($item->altration_datetime)){echo $item->altration_datetime;} ?></td>


                          <td><?php echo $item->qty?></td>
                          
                          <td class="text-right"> <?php  echo $item->price;?></td>
                          <td class="text-right"> <?php  $total_price += $item->qty*$item->price; echo $item->qty*$item->price; if(isset($item->measures) && !empty($item->measures)){ echo '<a href="'.base_url().'product/stitching_order_detail/'.$item->oid.'" class="btn more btn-primary">Detail</a>';}?></td>

                        </tr>
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="10" rowspan="5" class="bdr">
                          </th>
                          <th class="text-right pd-10"><h4><strong> Sub Total (Included all taxes)</strong></h4></th>
                          <th class="text-right pd-10"> <?php echo $total_price;?></th>
                        </tr>
                        <tr>
                          <th class="text-right  pd-10 no-bd">Discount</th>
                          <th class="text-right  pd-10  no-bd"> <?php echo $order->odis;?></th>
                        </tr>
                        <!--tr>
                          <th class="text-right  pd-10 no-bd">Tax&nbspIncluded</th>
                          <th class="text-right  pd-10  no-bd"> <?php echo $order->odis;?></th>
                        </tr-->
                        <tr>
                        <?php $ship = $this->db->get_where('shipping_methods',array('id'=>$order->shipping_method))->row();
      ?>
                          <th class="text-right  pd-10 no-bd">Shiping</th>
                          <th class="text-right  pd-10 no-bd"><?php echo $ship->price." (".$ship->reason.")";  ?></th>
                        </tr>
                        <tr>
                                                   <th class="text-right  pd-10"><h4><strong>Total</strong></h4></th>
                          <th class="text-right  pd-10 "><span class="vd_green font-sm font-normal"> <?php echo $order->ototal;//-$order->odis;?></span></th>
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
                  	Copyright &copy;2016 Ansvel. All Rights Reserved
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
<link rel="stylesheet" href="<?php echo base_url();?>adminassets/css/bundled.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/jquery-confirm.css"/>
    <script src="<?php echo base_url();?>adminassets/js/bundled.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery-confirm.js"></script>
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
url: '<?php echo base_url();?>index.php/product/del_order',
data: {fid:sid},
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
    document.title = "invoice";
    window.print();
    document.body.innerHTML = originalContents;
}
</script>


</body>
</html>
