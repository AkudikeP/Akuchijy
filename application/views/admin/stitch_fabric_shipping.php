           
          <div class="vd_title-section clearfix">        
          </div>
          <div class="vd_content-section clearfix" id="printableArea">
            <div class="row">
              <div class="col-sm-9">
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
                    <abbr>Email :</abbr> info@mobiledarzi.com
                    </address>
                    <br/>

                    <address>
                    <hr/>
                    <br/>
                    <div class="pd-25">
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
                    
                        <div class="col-xs-3">
                         
                        </div>
                      </div>
                    </div>
                    <table class="table table-condensed table-striped">
                      <thead>
                        <tr>
                          <th>SKU</th>
                          
                          <th>Fabric</th>
                          
                          <th>Description</th>
                          <th>QTY & PRICE</th>
                          <th align="right">TOTAL</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $total=0;
                      foreach($items as $item){$pid="";
                      $total+=$item->subtotal;
				$pred=$this->db->get_where("tailor_assign",array("stid"=>$item->id))->row();
        //print_r($pred); ?>
        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->      
    </div>
  </div>
                        <tr>
                          <td class="text-center"><?php echo $item->pid."</td> <td width='100px;' class='text-center'>";

                        $is_5=0;
                        $is = $this->db->get_where('stitching_bundle',array('id'=>$item->pid))->row();
                        $is_2 = $this->db->get_where('bundle',array('bundle_no'=>$is->bundle_no,'addon_or_not'=>4))->row();
                        $is_4 = $this->db->get_where('bundle',array('bundle_no'=>$is->bundle_no,'addon_or_not'=>3))->row();
                        if(!empty($is_2))
                         {
                        $is_3 = $this->db->get_where('fabric',array('id'=>$is_2->part_ids))->result();
                      }
                         if(!empty($is_3))
                         {
                            foreach ($is_3 as $value) { ?>
                              
                          
                          <img class="img img-responsive pull-left" src="<?php echo base_url();?>assets/images/fabrics/<?php echo $value->thumb;?>"><?php echo $value->title."<br> Rs ".$value->price."/-";
                            }
                         }
                         else if(!empty($is_4))
                         {
                            $is_5 = $this->db->get_where('upload_designs',array('id'=>$is_4->part_ids))->row();
                             ?>
                              
                          
                          <img class="img img-responsive pull-left" src="<?php echo $is_5->image;?>">

                            
                         <?php echo 'Custom Design'; }
                         
                         else{
                          
                          ?>
                          <td width="100px;" class="text-center">
                          <?php if($item->pimg==null){ ?>
                          <?php }
                          else{ ?><?php } ?></td>

                          <?php echo $item->pname; } ?>
                          <td>
                          <br/>
                          <table border="1px solid"><tbody><tr  align="center"><th>Styles</th></tr>
                          <?php //print_r($item->pid);
                          $is = $this->db->get_where('stitching_bundle',array('id'=>$item->pid));
                          $is_num = $is->num_rows();
                          $is_data = $is->row();
                          
                          $f=explode(",",$item->options);
							 
							  $i=0;foreach($f as $f){if($i>2)
							  {
								$ff=explode(":",$f);
                //echo $ff[1];
                if($ff[1]!=' ')
                {//print_r($ff);
                if($ff[0]=='predesign ')
                {
                  //echo $ff[1];
                  $sty=$this->db->get_where("predesign",array("id"=>$ff[1]))->row_array();
                  //print_r($this->db->last_query());
                  echo '<tr><td>'.$ff[0].'-'.$sty['dname'].' @ '.$sty['dprice']; echo "/-</td></tr>";
                }
								else if($is_5=='0'){
                  $sty=$this->db->get_where("style",array("id"=>$ff[1]))->row_array();
                  if(empty($sty))
                  {
                    $sty=$this->db->get_where("addons",array("id"=>$ff[1]))->row_array();
                    echo '<tr><td>'.$ff[0].'-'.$sty['add_on_name'].' @ '.$sty['add_on_price']; echo "/-</td></tr>";
                  }
                  else{
                  echo '<tr><td>'.$ff[0].'-'.$sty['style'].' @ '.$sty['sprice']; echo "/-</td></tr>";
                  }
								}
              }
							   
							  }$i++;}?>
                              <tr  align="center"><th>Measurements</th></tr>
                              <?php $f=explode(",",$item->measures);
							 
							  $i=0;foreach($f as $f){
								$ff=explode(":",$f);
								//$sty=$this->db->get_where("style",array("id"=>$ff[1]))->row();
                 if($ff[1]!=' ')
                {
							  echo '<tr><td>'.$ff[0].'-'.$ff[1];echo "</td></tr>";
              }
							  $i++;}?></tbody></table></td>
                          
                          <td><?php echo $item->qty;?> @ Rs <?php echo $item->price.'/- each';?><hr/>
                         
                <?php 
                  $this->db->where('stid', $item->id);
                  $this->db->where("(sstatus='accepted' OR sstatus='started' OR sstatus='completed')", NULL, FALSE);
                  $tailor_ass_query = $this->db->get('tailor_assign');
                  $num=$tailor_ass_query->num_rows();?>
        
                 <br />
                  <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tailor Acceptence Status</button> -->
                 <span class="text-success" id="msgs<?php echo $item->id;?>"></span></td>
                          <td class="text-right"> <i class="fa fa-inr" aria-hidden="true"></i>
<?php echo $item->subtotal;?>/-
                          </td>
                          
                        </tr>
                        
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="3" rowspan="3" class="bdr">Note:
                            <p class="font-normal">Please send all of these items using wooden box package.</p></th>
                          <th class="text-right pd-10">Sub Total</th>
                          <th class="text-right pd-10"><i class="fa fa-inr" aria-hidden="true"></i>
 <?php echo $total;?>/-</th>
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
                  <a href="<?php echo base_url();?>index.php/product/stitching_end" class="btn btn-warning" type="button">
                  <i class="fa fa-arrow-left"></i> Back To All Orders</a>
                </div><hr/>
              <div class="mgbt-xs-3">
              <?php
                  echo form_open("product/update_ship_stich_status",array('class'=>"contact-form"));?>
                      
                         <?php                        
                        foreach($items as $cat)
                        {  
                          ?>
                          <input type="hidden" name="pid" value="<?php echo $cat->oid;?>">
                          <input type="hidden" name="vid" value="<?php echo $cat->vendor_id;?>">
                          <input type="hidden" name="uid" value="<?php echo $order->userid;?>">
                        <?php                      
                          if($cat->vendor_id==NULL){
                       ?>

                          <select id="ship" name="shipping_status" required>
                          <option value="">Select Status</option>
                          <option value="Dispatch To Tailor" <?php if($cat->shipping_status=='Dispatch To Tailor') echo "selected";?>>Dispatch To Tailor</option>
                          <option value="Picked From Tailor" <?php if($cat->shipping_status=='Picked From Tailor') echo "selected";?>>Picked From Tailor</option>                     
                          <option value="Ready To Dispatch" <?php if($cat->shipping_status=='Ready To Dispatch') echo "selected";?>>Ready To Dispatch</option>
                          <option value="Delivered" <?php if($cat->shipping_status=='Delivered') echo "selected";?>>Delivered</option>
                        </select>
                        <?php }else{?>  
                        <select id="ship" name="shipping_status" required>
                        <option value="<?php echo $cat->shipping_status; ?>"><?php if($cat->shipping_status=='') echo "Select Status"; ?><?php if($cat->shipping_status=='Ready To Pickup') echo "Ready To Pickup"; ?></option>
                        <option value="Picked From Vendor" <?php if($cat->shipping_status=='Picked From Vendor') echo "selected";?>>Picked From Vendor</option>                          
                          <option value="Dispatch To Tailor" <?php if($cat->shipping_status=='Dispatch To Tailor') echo "selected";?>>Dispatch To Tailor</option>
                          <option value="Picked From Tailor" <?php if($cat->shipping_status=='Picked From Tailor') echo "selected";?>>Picked From Tailor</option>                     
                          <option value="Ready To Dispatch" <?php if($cat->shipping_status=='Ready To Dispatch') echo "selected";?>>Ready To Dispatch</option>
                          <option value="Delivered" <?php if($cat->shipping_status=='Delivered') echo "selected";?>>Delivered</option>
                          </select>
                          <?php } ?>
                    
                  <button <?php if(($cat->vendor_id!=NULL) AND ($cat->shipping_status=='')) echo 'disabled';?>  class="btn vd_btn vd_bg-blue" type="submit" value="Change Status"><i class="fa fa-print append-icon"></i>Change Status</button>
                   <?php echo form_close(); }?>
                              
              </div></br>
                <hr/>
              </div>
            </div>
            <!-- row --> 
            <div class="col-sm-4 controls" id="qr_img" style="margin-left:0px;">
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

<!-- Mirrored from vendroid.venmond.com/pages-invoice.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2016 11:25:31 GMT -->
</html>