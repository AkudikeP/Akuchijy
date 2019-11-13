<?php 
    $i='false';
    $j='false';
    foreach($items as $item2){
       $title = explode(' ', $item2->pname);
      if(isset($title[1]) && $title[1]=='Stitching'){
      $i='true';
    }
    //echo $i;
    if($item2->order_type=="stitch with fabric"){
      //$i='false';
      //echo "in";
      $j='true';
      }} ?>   <div class="vd_title-section clearfix">
            <div class="vd_panel-header no-subtitle">
              <h1>Order Shipping Detail</h1>
            </div>
          </div>
          <div class="vd_content-section clearfix" id="printableArea">
            <div class="row">
              <div class="col-sm-12">
                <div class="panel widget light-widget">
                  <div class="panel-body" style="padding:40px;">
                  
                    <div class="mgbt-xs-20"><img alt="logo" src="<?php echo base_url();?>assets/images/logo2.png" /></div>
                    <address><abbr>Office Address :</abbr> 
                    <?php $site_address=$this->db->get('footer')->row(); 
                      echo $site_address->office_add;
                    ?>
                    <br/><abbr>Mobile Number :</abbr> 
                    <?php echo $site_address->mobile;
                    ?>
                    <br />
                    <abbr>Email :</abbr> info@ansvel.com
                    </address>
                    <br/>

                    <address>
                    
                    <?php 
                    $total=0;
                    foreach ($items as $value) {
                      $total+=$value->subtotal;
                      if($value->vendor_id !=NULL)
                      {                 
                    $info = $this->db->get_where("vendor",array("vid"=>$value->vendor_id))->row();
                    ?> 
                    <span>Vendor Detail</span></br></br>

                    <?php if(isset($info->username) && !empty($info->username)){echo $info->username;} ?><br>
                    <abbr title="Phone">P:</abbr> <?php if(isset($info->contact) && !empty($info->contact)){ echo $info->contact; } ?><br />
                    <?php if(isset($info->contact) && !empty($info->contact)){ echo $info->email; }} }?>
                    </address>
                    <hr/>
                    <br/>
                    <div class="pd-25">
                      <div class="row">
                        <div class="col-xs-6">
                          <address>
                          <strong>Bill To:</strong><br>
                          <?php $city=$this->db->get_where('cities',array('id'=>$order->bcity))->row()->name;
        $state=$this->db->get_where('states',array('id'=>$order->bstate))->row()->name; ?>
                          <?php echo $order->bname;?><br>
                          <?php echo $order->baddress;?><br>
                          <?php echo $order->blandmark.' '.$city.' '.$state.' '.$order->bpin;?><br>
                          <i class="fa fa-phone"></i> <?php echo $order->bphone;?>
                          </address>
                        </div>
                        <?php if($order->ostatus=="cancelled by user"){echo $order->ostatus;}else{ 

                           ?>
                        <div class="col-xs-3">
                          
                             <?php  echo form_open("product/order_text",array('class'=>"contact-form"));?>
                             <input type="hidden" name="pid" value="<?php echo $order->oid;?>">
                              <textarea cols="5" rows="5" name="order_text" placeholder="message to user..."><?php echo $order->order_text; ?></textarea>
                              <!--input type="submit" value="submit" name=""-->
                              <button  class="btn vd_btn vd_bg-blue" type="submit" value="Change Status">Submit</button>
                          <?php echo form_close(); ?>
                        </div>


                        <div class="col-xs-3">
                          
                             <?php  echo form_open("product/update_shipping_status",array('class'=>"contact-form"));
                          //print_r($cat);
                          ?>
                          <input type="hidden" name="pid" value="<?php echo $order->oid;?>">
                          <input type="date" name="date" required="required">
                          <input type="hidden" name="uid" value="<?php echo $order->userid;?>">
                            Order Status: 
                             <select id="ship" name="shipping_status" required>
                          <option value="">Select Status</option>
                          <?php if($i=='true' && $j=='false'){ ?>
                          <option value="Pickup From User" <?php if($order->shipping_status=='Pickup From User') echo "selected";?>>Pickup From User</option>
                          <?php } ?>
                          <option value="Ready To Dispatch" <?php if($order->shipping_status=='Ready To Dispatch') echo "selected";?>>Ready To Dispatch</option>
                          <option value="Delivered" <?php if($order->shipping_status=='Delivered') echo "selected";?>>Delivered</option>
                        </select>
                         <button  class="btn vd_btn vd_bg-blue" type="submit" value="Change Status"><i class="fa fa-print append-icon"></i>Change Status</button>
                   <?php echo form_close(); ?>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                    <table class="table table-condensed table-striped">
                      <thead>
                        <tr>
 
                          <th>Image</th>
                          <th>Title</th>
                          <th class="text-center" style="width:20px;">QTY</th>
                          <th class="text-right" style="width:120px;">UNIT PRICE</th>
                          <th class="text-right" style="width:120px;">TOTAL</th>
                          <th class="text-right" style="width:120px;">Type</th>
                          <?php if($i=='true'){ ?>
                          <th class="text-right" style="width:120px;">Tailor</th>
                          <?php } ?>
                           <?php if($i=='true' && $j=='true'){ ?>
                          <th class="text-right" style="width:120px;">Vendor's Status</th>
                          <?php } ?>
                          <th class="text-right" style="width:120px;">Status</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($items as $item){
                        //print_r($item);
                        ?>
                        <tr>

                          <td class="text-center">                      

                          
                          <?php if($item->pimg=='null'){?>
                            <img style="max-height:100px;" class="img img-responsive" src="<?php echo base_url();?>assets/images/fabrics/bag.png"> </td>
                            <?php } else {  if($i=='true'){ ?>
                            <img style="max-height:100px;" class="img img-responsive" src="<?php echo base_url();?>adminassets/<?php echo $item->pimg;?>"> </td>
                            <?php }else{ ?>
                              <img style="max-height:100px;" class="img img-responsive" src="<?php echo base_url();?>assets/images/<?php echo $item->pimg;?>"> </td>
                              <?php } } ?>

                            <td><?php echo $item->pname;?></td>
                          <td><?php echo $item->qty?></td>
                          <td class="text-right">&#8358; <?php echo $item->price.' ';?></td>
                          <td class="text-right"> <?php echo $item->subtotal;?>/-</td>
                          <td class="text-right"> <!---->

                         <?php  
                          //print_r($cat);
                          ?>
                          
                        <?php                      
                          if($item->vendor_id==NULL){
                       ?>

                         Admin's Product
                        <?php }else{  
                        echo "Vendor's&nbspProduct";
                           } ?> </td>
                          
                   <td class="text-right"> <!---->
                        <?php //echo $item->pname;
                        $title = explode(' ', $item->pname);

                        if(isset($title[1]) && $title[1]=='Stitching'){
                          $this->db->where('stid', $item->id);
                  $this->db->where("(sstatus='accepted' OR sstatus='started' OR sstatus='completed')", NULL, FALSE);
                  $tailor_ass_query = $this->db->get('tailor_assign');
                  $num=$tailor_ass_query->num_rows();
                  if($num==0)
                  {
                    //echo 'k';
                  }else{
                    $tailor_detail = $tailor_ass_query->row();
                 
                  $tailor=$this->db->get_where("tailors",array('tcity'=>$order->order_city,'id'=>$tailor_detail->tid))->row();
                  if(!empty($tailor->tname) && $tailor->tname!='')
                  {
                  echo $tailor->tname;
                  }
                  }
                  echo "</td>";
                    if(($i=='true' && $j=='true') || ($i=='false' && $j=='false')){ ?>
                          <td class="text-right" style="width:120px;"> <?php echo $item->shipping_status;?></td>
                          <?php } echo "<td>";
                  if(!isset($num) || $num==0)
                  {
                      echo "Please assign this first.";
                        }else{
                            $this->db->where('stid', $item->id);
                           $this->db->where(array('sstatus'=>'completed'));
                           $tailor_ass_query2 = $this->db->get('tailor_assign');
                          $num2=$tailor_ass_query2->num_rows();
                          if($num2>0)
                          {// echo $this->db->last_query();
                              echo "order is completed by tailor";
                           }else{
                           echo form_open("product/update_shipping_status_order_item",array('class'=>"contact-form"));?>
                          
                          <input type="date" name="date" required="required">
                          <input type="hidden" name="pid" value="<?php echo $item->oid;?>">
                          <input type="hidden" name="o_i_id" value="<?php echo $item->id;?>">
                          <input type="hidden" name="uid" value="<?php echo $order->userid;?>">

                          <select id="ship" name="shipping_status" required>
                          <option value="">Select Status</option>
                          
                          <option value="Dispatch To Tailor" <?php if($item->shipping_status=='Dispatch To Tailor') echo "selected";?>>Dispatch To Tailor</option>
                                            
                          
                          
                        </select>
                                           
                  <button class="btn vd_btn vd_bg-blue" type="submit" value="Change Status"><i class="fa fa-print append-icon"></i>Change Status</button>
                   <?php echo form_close(); 
                         } }}else{ echo $item->shipping_status; } ?>
                 </td>
                        </tr>
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="4" rowspan="3" class="bdr">Note:

                          <th class="text-right pd-10">Sub Total</th>
                          <th class="text-right pd-10">Rs <?php echo $total;?>/-</th>

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
                  <a href="<?php echo base_url();?>index.php/product/fabric_end" class="btn btn-warning" type="button">
                  <i class="fa fa-arrow-left"></i> Back To All Orders</a>
                </div></br>
                <div class="mgbt-xs-2">
                <?php
                 ?>
                      
                        <?php                        
                        foreach($items as $cat)
                        {   }?>
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
</html>