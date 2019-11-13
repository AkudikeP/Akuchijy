<?php ini_set('display_errors', 0); $total_price=0;
$f_price = 0;
 if(isset($order) && !empty($order)){ ?>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header no-subtitle">
              <h1>Order Detail</h1>
            </div>
          </div>
          <div class="vd_content-section clearfix" >
            <div class="row">
            <!-- col-sm-9-->
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

                <!--div class="col-sm-3">
                  <a class="btn vd_btn vd_bg-red del_fabric" id="<?php echo $order->oid;?>" ><i class="fa fa-trash-o append-icon"></i>Delete Order</a>
                </div-->
                <div class="col-sm-3">
                  <a class="btn vd_btn vd_bg-red" href="<?php echo base_url();?>product/order_shipping_status/<?php echo $order->oid;?>"><i class="fa fa-truck append-icon"></i>Go to Shipping</a>
                </div>
                <?php } ?>

                <hr/>
              </div>

              <div class="col-sm-12" id="printableArea">
                <div class="panel widget light-widget">
                  <div class="panel-body" style="padding:10px;">
                  <?php $city=$this->db->get_where('cities',array('id'=>$order->bcity))->row();
                        $state=$this->db->get_where('states',array('id'=>$order->bstate))->row();
                         ?>
                                       <div class="pd-25">
                      <div class="row">
                        <div class="col-xs-8">
                          <address>
                          <h4><strong>Order Detail:</strong></h4>
                          <table>
                            <tr><td>Order Id</td><td>:&nbsp&nbsp</td><td><?php echo "OMD-".$order->oid; ?></td></tr>
                            <!--tr><td>Transaction Id</td><td>:&nbsp&nbsp</td><td><?php echo "MD-".$order->trans_id; ?></td></tr-->
                            <tr><td>Order Date</td><td>:&nbsp&nbsp</td><td><?php echo $order->odate; ?></td></tr>
                            <!--tr><td>Order Time</td><td>:&nbsp&nbsp</td><td></td></tr-->
                            <tr><td>Due Delivery Date</td><td>:&nbsp&nbsp</td><td>
                            <?php echo $order->delivery_date;?></td></tr>
                            <tr><td>Delivery Address</td><td>:&nbsp&nbsp</td><td><?php echo $order->baddress ?></td></tr>
                            <tr><td>State</td><td>:&nbsp&nbsp</td><td>
                            <?php echo $state->name; ?></td></tr>
                            <tr><td>City</td><td>:&nbsp&nbsp</td><td><?php echo $city->name ?></td></tr>
                            <tr><td>Contact</td><td>:&nbsp&nbsp</td><td><?php echo $order->bphone;?></td></tr>
                            <tr><td>Used Coupon Code</td><td>:&nbsp&nbsp</td><td><?php echo $order->code;?></td></tr>
                                        

                          </table>

                          </address>
                        </div>

                        <div class="col-xs-4">
                          <div>
                          <address>
                          <h4><strong>Customer Detail:&nbsp&nbsp</strong></h4>
                          <table>
                            <tr><td>Customer Id</td><td>:&nbsp&nbsp</td><td><?php echo "CMD-".$order->userid; ?></td></tr>
                            <tr><td>Customer Name</td><td>:&nbsp&nbsp</td><td><?php echo $order->bname; ?></td></tr>
                            <tr><td>Contact</td><td>:&nbsp&nbsp</td><td><?php echo $order->bphone; ?></td></tr>
                            <tr><td>Email</td><td>:&nbsp&nbsp</td><td></td></tr>
                            <tr><td>Address</td><td>:&nbsp&nbsp</td><td>
                            <?php echo $order->baddress ?></td></tr>

                            <tr><td>State</td><td>:&nbsp&nbsp</td><td>
                            <?php echo $state->name; ?></td></tr>
                            <tr><td>City</td><td>:&nbsp&nbsp</td><td><?php echo $city->name ?></td></tr>
                            <tr><td>Landmark</td><td>:&nbsp&nbsp</td><td><?php echo $order->blandmark;?></td></tr>
                             <tr><td>Pin</td><td>:&nbsp&nbsp</td><td><?php echo $order->bpin;?></td></tr>
                             <tr><td>Customer IP</td><td>:&nbsp&nbsp</td><td><?php echo $order->ip;?></td></tr>
                          </table>
                          </address>
                          </div>
                        </div>
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
                       </tr>
                        <tbody>
                      <?php $i=1; foreach($items as $item){
                        $check = explode('/', $item->pimg);
                        //print_r($check);
                        if($check[0]=='accessories')
                        {
                          ?>

                          <?php
                        }
                        ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td>

                         <?php echo $order->odate;?></td>
                          <td><?php echo $order->delivery_date;?></td>
                          <td><?php echo $item->status_datetime;?></td>


                          <td><?php if($order->ostatus=="cancelled by user"){echo $order->ostatus;} else{echo $item->shipping_status;} ?></td>

                          <td><?php echo $item->status_changed_by; ?> </td>

                        </tr>
                        <?php $i++; }?>
                      </tbody>
                      </thead>
                      <tbody>


                      </table>

                      <?php foreach($items as $item){$pid="";
				$pred=$this->db->get_where("tailor_assign",array("stid"=>$item->id))->row();
        //print_r($pred); ?>
        <input type="hidden" class="form-control" name="qr_code" id="qr_code<?php echo $item->id; ?>" value="<?php echo $item->id; ?>">
        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tailor Status</h4>
        </div>
       <div class="row">
       <div class="col-md-12">
       <div class="col-md-3">Name</div>
       <div class="col-md-3">Assign date</div>
       <div class="col-md-3">Status</div>
       <div class="col-md-3">Re Status</div>
       </div>

       </div>
       <?php
     $id=$this->uri->segment(3);
      $this->db->select('*');
$this->db->from('tailors');
$this->db->join('tailor_assign', 'tailors.id = tailor_assign.tid');
$this->db->join('order_items', 'tailor_assign.stid = order_items.id');
$this->db->where(array('stid' => $item->id));
 $query = $this->db->get()->result_array();

 //print_r($query);
 //exit;

 foreach ($query as $query){

 ?>


       <div class="row">
       <div class="col-md-12">
       <div class="col-md-3"><?php echo $query['tname']; ?></div>
        <div class="col-md-3"><?php echo $query['adate']; ?></div>
         <div class="col-md-3"><?php echo $query['sstatus']; ?></div>
          <div class="col-md-3"> <a href="<?php echo base_url();?>Product/change_sta/<?php echo $query['soid'];  ?>/<?php echo $query['tid'];?>/<?php echo $query['stid'];?>" class="btn btn-primary btn-sm btn-block">Assigned</a></div>
       </div>

       </div>
       <?php } ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
                        <tr>
                          <td class="text-center"><?php

                        $is_5=0;
                        $is = $this->db->get_where('stitching_bundle',array('id'=>$item->pid))->row();
                        $is_0 =$is_01 = $this->db->get_where('bundle',array('bundle_no'=>$is->bundle_no,'addon_or_not'=>0))->result();
                        $is_1 = $is_11 = $this->db->get_where('bundle',array('bundle_no'=>$is->bundle_no,'addon_or_not'=>1))->result();
                        $is_2 = $this->db->get_where('bundle',array('bundle_no'=>$is->bundle_no,'addon_or_not'=>4))->row();
                        $is_4 = $this->db->get_where('bundle',array('bundle_no'=>$is->bundle_no,'addon_or_not'=>3))->row();
                        //print_r($is_4);
                        if(!empty($is_2))
                         {
                        $is_3 = $this->db->get_where('fabric',array('id'=>$is_2->part_ids))->result();
                      }
                         if(!empty($is_3))
                         {
                            foreach ($is_3 as $value) {
                            $f_price = $is_2->fabric_price; ?>
                                                <table class="table table-condensed table-striped">
                      <thead>
                        <tr>
                          <th>Fabric&nbspImage</th>
                          <th>&nbsp&nbspName (ID)</th>

                          <th>Quantity</th>

                          <th>SKU</th>
                          <!--th>SKU</th-->
                          <th>Color</th>

                          <th>Size</th>
                          
                          <th align="right">Amount</th>
                        </tr>
                      </thead>
                      <tbody>

                          <tr><td><img width="100px" class="img img-responsive pull-left" src="<?php echo base_url();?>assets/images/fabrics/<?php echo $value->thumb;?>"></td><td><?php echo $value->title."<br>(PFMD-".$value->id.")</td><td>".$is_2->qty."</td> <td>".$is_2->sku."</td> <td>".$is_2->color."</td> <td>".$is_2->size."</td><td> <i class='fa fa-inr'></i> ".$is_2->fabric_price."</td></tr>";
                            }
                         }
                         echo '                    <table class="table table-condensed table-striped">
                      <thead>
                        <tr>
                          
                          <th>&nbsp&nbspPreview</th>

                          <th>Style&nbspDescription</th>

                          <th colspan="2">Style Name</th>
                          <!--th>SKU</th-->
                          <th>Measurement</th>

                          <th>Assign&nbspTailor</th>
                          <th>QTY</th>
                          <th>Unit&nbspprice</th>
                          <th align="right">Amount</th>
                        </tr>
                      </thead>
                          
                      <tbody><tr><td style="padding:0px;">';

                          if(!empty($is_4))
                         { //echo "in";
                            $is_5 = $this->db->get_where('upload_designs',array('id'=>$is_4->part_ids))->row();
                            //echo $this->db->last_query();
                             ?>

                             <br><br>
                          <img class="img img-responsive pull-left" src="<?php echo $is_5->image;?>" width="120px">


                         <?php echo 'Upload Your Design';
                           }

                         else{

                          ?>

                          <?php if($item->pimg==null){ ?>
                          <?php }
                          else{ ?><?php } ?>

                          <?php  } ?>
                          

                          <br/>

                          <?php //print_r($item->pid);
                          $is = $this->db->get_where('stitching_bundle',array('id'=>$item->pid));
                          $is_num = $is->num_rows();
                          $is_data = $is->row();
                          //print_r($is_num);
                         /* if($is_num>0)
                          {
                            $is2 = $this->db->get_where('bundle',array('bundle_no'=>$is_data->bundle_no))->result();
                            //print_r($is2);
                            foreach($is2 as $is2)
                            {
                              if($is2->addon_or_not==0)
                              {

                                $sty=$this->db->get_where("style",array("id"=>$is2->part_ids))->row_array();
                                echo '<tr><td>Design -'.$sty['style'].' @ '.$sty['sprice']; echo "/-</td></tr>";
                              }
                              if($is2->addon_or_not==1)
                              {

                                $sty=$this->db->get_where("addons",array("id"=>$is2->part_ids))->row_array();
                                echo '<tr><td>Addon -'.$sty['add_on_name'].' @ '.$sty['add_on_price']; echo "/-</td></tr>";
                              }
                              if($is2->addon_or_not==2)
                              {

                                $sty=$this->db->get_where("predesign",array("id"=>$is2->part_ids))->row_array();
                                echo '<tr><td>Predesign -'.$sty['dname'].' @ '.$sty['dprice']; echo "/-</td></tr>";
                              }
                               if($is2->addon_or_not==3)
                              {

                                $sty=$this->db->get_where("upload_designs",array("id"=>$is2->part_ids))->row_array();
                                echo '<tr><td>Custom Designs - @ <img src='.$sty['image']; echo " width='50px'> </td></tr>";
                              }
                              if($is2->addon_or_not==4)
                              {

                                $sty=$this->db->get_where("fabric",array("id"=>$is2->part_ids))->row_array();
                                 echo '<tr><td>Fabric -'.$sty['title'].' @ '.$sty['price']; echo "/-</td></tr>";
                              }

                            }


                          }*/
                        $f=explode(",",$item->options);

                $i=0;foreach($f as $fs){if($i>2)
                {
                $ff=explode(":",$fs);
                //echo $ff[1];
                if(isset($ff[1]) && $ff[1]!=' ')
                {//print_r($ff);
                if($ff[0]=='predesign ')
                {
                  //echo $ff[1];
                  $sty=$this->db->get_where("predesign",array("id"=>$ff[1]))->row_array();
echo '<img src='.base_url().'adminassets/styles/resized/small/'.$sty['dfront'].' width="50px">';                //print_r($this->db->last_query());
                 // echo ''.$ff[0].' : '.$sty['dname']; echo "";
                }


                /*else if($is_5=='0'){
                  if(!empty($ff))
                  {
                  $sty=$this->db->get_where("style",array("id"=>$ff[1]))->row_array();
                }
                  if(empty($sty))
                  {
                    $sty=$this->db->get_where("addons",array("id"=>$ff[1]))->row_array();
                    if(!empty($sty))
                  {

                    echo '<img src='.base_url().'adminassets/styles/resized/small/'.$sty['add_on_image'].' width="50px">'; echo "";
                  }
                  }
                  else{
                  echo '<img src='.base_url().'adminassets/styles/resized/small/'.$sty['thumb_front'].' width="50px">'; echo "";
                  }
                }*/
              }

                }$i++;}

                if(!empty($is_0))
                         {
                      foreach ($is_0 as $value) {
                              $sty = $this->db->get_where('style',array('id'=>$value->part_ids))->row();
                              echo "<img src='".base_url()."adminassets/styles/resized/small/".$sty->thumb_front."' width='50px'><br>
                                              ";
                            }
                         }
                          if(!empty($is_1))
                         {
                            foreach ($is_1 as $value) {
                              $sty = $this->db->get_where('addons',array('id'=>$value->part_ids))->row();
                              echo "<img src='".base_url()."adminassets/styles/resized/small/".$sty->add_on_image."' width='50px'><br>
                                              ";
                            }
                         }


							 echo '</td><td width="200px"><table class="gray"><tbody>';
							  $i=0;foreach($f as $f){if($i>2)
							  {
								$ff=explode(":",$f);
                //echo $ff[1];
                if(isset($ff[1]) && $ff[1]!=' ')
                {//print_r($ff);
                if($ff[0]=='predesign ')
                {
                  //echo $ff[1];
                  $sty=$this->db->get_where("predesign",array("id"=>$ff[1]))->row_array();
                  //print_r($this->db->last_query());
                  echo '<tr><td><br>'.$ff[0].' : '.$sty['dname']; echo "</td></tr>";
                }
								else if($is_5=='0'){
                  if(!empty($ff))
                  {
                  $sty=$this->db->get_where("style",array("id"=>$ff[1]))->row_array();
                }
                  if(empty($sty))
                  {
                    $sty=$this->db->get_where("addons",array("id"=>$ff[1]))->row_array();
                    if(!empty($sty))
                  {
                    //echo '<tr><td><br><br>'.str_replace("_"," ",$ff[0]).' : '.$sty['add_on_name']; echo "</td></tr>";
                    $names[] = str_replace("_"," ",$ff[0]);
                  }
                  }
                  else{
                  //echo '<tr><td><br>'.str_replace("_"," ",$ff[0]).' : '.$sty['style']; echo "</td></tr>";
                  $names[] = str_replace("_"," ",$ff[0]);
                  }
								}
              }

							  }$i++;} //print_r($names);
$kl=0;
                          if(!empty($is_0))
                         {
                      foreach ($is_0 as $value) {
                              $sty = $this->db->get_where('style',array('id'=>$value->part_ids))->row();
                              echo '<tr><td style="height:50px"><br>'.$names[$kl].' : '.$sty->style; echo "</td></tr>";
                             // echo "<img src='".base_url()."adminassets/styles/resized/small/".$sty->thumb_front."' width='50px'>";
                            $kl++; }
                         }
                          if(!empty($is_1))
                         {
                            foreach ($is_1 as $value) {
                              $sty = $this->db->get_where('addons',array('id'=>$value->part_ids))->row();
                              echo '<tr><td style="height:50px"><br>'.$names[$kl].' : '.$sty->add_on_name; echo "</td></tr>";
                              /*echo "<img src='".base_url()."adminassets/styles/resized/small/".$sty->add_on_image."' width='50px'>";*/
                              $kl++; }
                         }


                ?>

                             </tbody></table>
                             <?php if(isset($is_5) && !empty($is_5->desc)){echo '<b>Description:</b>&nbsp '.$is_5->desc;} ?>
                              </td><td class="gray" colspan="2" ><?php echo $item->pname; ?></td>
                             <!--td><?php //echo $item->pid; ?></td-->
                             <td class="gray" width="150px"> <?php


                             //echo str_replace(":"," ", str_replace("_"," ",$os));
                             $f=explode(",",$item->measures);

                $i=0;foreach($f as $f){

                $ff=explode(":",$f);

                if($ff[0]=='BEST_FIT'){
                  echo str_replace(":"," ", str_replace("_"," ",$f));
                }else if($ff[0]=='ASK_FOR_MEASUREMENT'){
                  echo str_replace(":"," ", str_replace("_"," ",$f));
                }else{
                //$sty=$this->db->get_where("style",array("id"=>$ff[1]))->row();
                 if(isset($ff[1]) && $ff[1]!=' ')
                {
                echo '<table><tr><td>'.$ff[0].' : '.$ff[1];echo "</td></tr></table>";
              }
                $i++;}} ?>




              
              </td><td width="150px">


                         </td><td><?php $names=array(); echo $item->qty; ?></td>

                  <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tailor Acceptence Status</button> -->
                 <span class="text-success" id="msgs<?php echo $item->id;?>"></span></td>
                          <td class="text-right">  <?php echo $item->subtotal-$f_price; $total_price += $item->subtotal.' ';?>
                          </td>
                          <td><?php echo ($item->qty*$item->subtotal)-$f_price;?></td>
                          <td><?php if($order->delete==1){}else if($order->ostatus=="cancelled by user"){echo $order->ostatus;} else{ ?><a id="more<?php echo $item->id; ?>" class="btn more btn-primary">Assign tailors</a><?php } ?>
                         </td>

                        </tr>
                        <tr class="nextdiv" id="nextdiv<?php echo $item->id; ?>">
                           <!--td colspan="2"><div class="col-sm-4 controls" id="qr_img<?php //echo $item->id; ?>" style="width: 100%;">
          </div></td-->
                <?php
                  $this->db->where('stid', $item->id);
                  $this->db->where("(sstatus='accepted' OR sstatus='started' OR sstatus='completed')", NULL, FALSE);
                  $tailor_ass_query = $this->db->get('tailor_assign');
                  $num=$tailor_ass_query->num_rows();


            $no=1;
            $price=0;     //echo $this->db->last_query();
        if($num==0){//echo ' <h5 class="text-warning"></h5>';

        $this->db->select('cid,category,id,stcost');
        $this->db->from('category');
        $this->db->join('fabric', 'category.cid = fabric.category');
        $this->db->where("fabric.id",$item->pid);
        $cidcost=$this->db->get()->row();
        print_r($cidcost);
        if(!empty($cidcost) && !empty($pred))
        {
        $sco=$cidcost->stcost;
        if($pred){
        $pid=$pred->tid;$sco=$pred->scost;}
        }
        if($pid!=""){echo "Assigned On ".date("d M Y",strtotime($pred->adate));}
        $notification = $this->db->get('notification')->result();
        foreach ($notification as $value) {
         $noti_arr[] = $value->tid;
        }
        //print_r($noti_arr);
      ?>

                                 <form>
                </form>
                <!--form class="assigntailor" id="<?php //echo $item->id;?>" action="">
                 <select class="tailor" name="tid[]" required multiple>
                  <option value="">Select Tailor</option>
                    <?php
                    /*$tailor=$this->db->get_where("tailors",array('tcity'=>$order->order_city))->result();
          foreach($tailor as $tail){
            if(in_array($tail->temail, $noti_arr)){

                          ?>
                    <option value="<?php echo $tail->id;?>" <?php if($tail->id==$pid){echo "style='display:none'";}?>><?php echo $tail->tname;?></option>
                    <?php }}?>
                 </select><br/><br />
                 <input type="text" value="<?php if(!empty($sco)){echo $sco;} */?>" name="stcost"  placeholder="Cost" required/><br/><br />
                 <button type="submit" name="submit" class="btn btn-primary btn-sm btn-block">Assign</button>
                 </form-->
                 <?php }else{
                  $tailor_detail = $tailor_ass_query->row();
                  $price = $tailor_detail->scost;
                  $no=6;
                  echo " <td colspan='3'>ACCEPTED BY : ";
                  $tailor=$this->db->get_where("tailors",array('tcity'=>$order->order_city,'id'=>$tailor_detail->tid))->row();
                  if(!empty($tailor->tname) && $tailor->tname!='')
                  {
                  echo '<b>'.$tailor->tname."</b></td>";
                  }
                  echo " <td colspan='3' id='invoice'>"; ?><a target="_blank" href="<?php echo base_url(); ?>product/tailor_invoice?oidd=<?php echo $item->id; ?>&tid=<?php echo $tailor->id; ?>"><button class='btn btn-primary '>Invoice For Tailor</button></a></td>;

                  <?php } ?>

                  <span class="<?php echo $item->id;?>" style="display: none;"><?php if($no!=6)
                  { ?>
                  <td colspan="1">
                  <label>Category</label>
                    <select class="main_cat" id="<?php echo $item->id;?>">
                      <option value="">Select</option>
                      <option value="1">Women</option>
                      <option value="2">Men</option>
                      <option value="3">Kids</option>

                    </select>
                  </td>
                  <?php }else{ ?>


                        <tr class="nextdiv" id="price<?php echo $item->id?>" >
                          <th colspan="7" rowspan="2" class="bdr">
                            <p class="font-normal"></p></th>
                          <th class="  pd-10" colspan="2">Total For Tailor</th>
                          <th class="  pd-10">&#8358; <?php echo $price; ?></th>
                        </tr>






                  <?php } ?>
                  <td colspan="12" class="nextdiv" id="filtered_data<?php echo $item->id; ?>">
                  </td>
                  </span>
                  </tr>





                          <script type="text/javascript">
                            $(document).ready(function(){
                              $('.nextdiv').hide();
  $("#more<?php echo $item->id; ?>").click(function(){
   // console.log('k');
  $("#nextdiv<?php echo $item->id; ?>").slideToggle();
  $("#filtered_data<?php echo $item->id;?>").slideToggle();
  $("#price<?php echo $item->id;?>").slideToggle();
  $("#price2<?php echo $item->id;?>").slideToggle();
  //$('.nextdiv').slideToggle();
});

 var drp_val=$('#qr_code<?php echo $item->id; ?>').val();
  // alert(drp_val);
   if(drp_val!="")
   {
    //alert(drp_val);
    $('.btn_clk1').removeAttr('disabled');
      var data="<img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl="+encodeURIComponent(drp_val)+"' style=''/>";
      $("#qr_img<?php echo $item->id; ?>").html(data);
   }
   else
   {
     $('.btn_clk1').attr('disabled','disabled');
     $("#qr_img<?php echo $item->id; ?>").html('<h3 style="margin: 15px 77px 10px;">Please Select Any Product</h3>');
   }

    });
                          </script>
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="8" rowspan="3" class="bdr">
                            <p class="font-normal"></p></th>
                          <th class="  pd-10" colspan="2"><h4><strong>Sub Total</strong></h4></th>
                          <th class="  pd-10"><h4>&#8358; <?php echo $total_price;?></h4></th>
                        </tr>
                        <tr>
                          <th class="   pd-10 no-bd" colspan="2">Discount</th>
                          <th class="   pd-10 vd_red no-bd">&#8358; <?php echo $order->odis; ?></th>
                        </tr>
                        <!--tr>
                          <th class="   pd-10 no-bd" colspan="2">Tax <span class="gray small">(Inclusive of all taxes)</span></th>
                          <th class="   pd-10 vd_red no-bd">&#8358; 0.00</th>
                        </tr-->

                        <tr>

                        <?php $ship = $this->db->get_where('shipping_methods',array('id'=>$order->shipping_method))->row();
      ?>
                          <th class=" pd-10 no-bd" colspan="2">Shiping</th>
                          <th class=" pd-10 no-bd vd_red">&#8358; <?php echo $ship->price." (".$ship->reason.")";  ?></th>
                        </tr>
                        <tr>
                          <th colspan="8"></th>
                          <th class="   pd-10" colspan="2"><h4><strong>Total</strong></h4></th>
                          <th class="   pd-10 "><span class="vd_green font-sm font-normal"><h4>&#8358;<?php echo $order->ototal;?></h4></span></th>
                        </tr>
                      </tfoot>
                    </table>

                 <br />
                  </div>
                  <!-- panel-body -->

                </div>
                <!-- Panel Widget -->
              </div>

            </div>
            <!-- row -->

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
                  	Copyright &copy;2016 Ansvel Inc. All Rights Reserved
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

<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>adminassets/css/bundled.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/jquery-confirm.css"/>
    <script src="<?php echo base_url();?>adminassets/js/bundled.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery-confirm.js"></script>
<script>
          $(document).ready(function(){
            setInterval(function(){ count_cart(); }, 5000);
   function get_response() {
     var url = "<?php echo base_url() ?>"+"welcome/get_response_stitching_orders";
      //console.log(url);
    $.ajax({url: url, success: function(result){
      //console.log(result);
      if(result=='')
      {
        $("#citems").html('0');
         $("#count_cart").html('0');
      }else{

        $("#citems").html(result);
         $("#count_cart").html(result);
      }
      }
    }});


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
url: '<?php echo base_url();?>index.php/product/del_order_items_admin',
data: {oid:sid},
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

<script>
$(document).ready(function(){

  $(".main_cat").change(filter);
  $(".stars").change(filter);

    function filter(){

  var formdata=$('.main_cat').val();
  var oid=$(this).attr("id");
  //var formdata2=$('.stars').val();
  //alert(formdata+' '+formdata2);

    $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/product/filter',
               data: {main_cat:formdata,order_city:<?php echo $order->order_city; ?>,oid:oid},
               success: function(response){
                $("#filtered_data" + oid).html(response);
                console.log(response);
               },
               error: function(response)
               {
                console.log(response);
               }
               });
  }

  	$(".assigntailor").submit(function(e){e.preventDefault();
	var formdata=$(this).serialize();
		var oid=$(this).attr("id");
		$.ajax({
							 type: "POST",
							 url: '<?php echo base_url();?>index.php/product/tailor_assign',
							 data: {oid:oid,formdata:formdata},
							 success: function(response){
								$("#msgs"+oid).html(response);
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


 <script type="text/javascript">
function printDiv(printableArea) {
  //
    $('.more').hide();
    $('#invoice').hide();
    var printContents = document.getElementById(printableArea).innerHTML;
  //alert (printContents);
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    $('.more').show();
    $('#invoice').show();
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

<script type="text/javascript">
 $(document).ready(function(){   //alert('test');


});
</script>

</body>

</html>
<?php } ?>
