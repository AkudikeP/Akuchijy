<style type="text/css">
.table tbody > tr > td:first-child{
  background-color: #fff;
}
h1.fnt{
  font-size: 1.95em;
}

@media (max-width: 500px){
.pull-left{
  float: none !important;
}
.align-btm{
  position: relative;
  top: 85px;
  right: 0px;
}

}
.marg{
  margin-bottom: 15px;
}
.bill-a{
  text-align: left !important;
  padding:0 5px 0 0;
}

.t-pdd tbody > tr > td {
    padding: 5px !important;
}
</style>



<div id="pageContent">

    <!-- Breadcrumb section -->



    <section class="breadcrumbs breadcrumbs-boxed">



      <div class="container">



        <ol class="breadcrumb breadcrumb--wd pull-left">



          <li><a href="#">Home</a></li>


<?php
$user_info = $this->db->get_where('users',array('uid'=>$this->session->userdata('userid')))->row();
//print_r($user_info);
if(isset($cancel) && $cancel=="true"){ echo "<li class='active'>Cancel Orders</li>";}else{?>
          <li class="active">Your Orders</li>


<?php } ?>
        </ol>








      </div>



    </section>







    <!-- Content section -->



    <section class="content">



      <div class="container" style="margin-top:20px;">






        <div class="row product-info-outer">

<style media="screen">
  .order_search{
    /*margin-left:35%;*/
  }
  .inner-addon {
    position: relative;
}

/* style icon */
.inner-addon .fa {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}

/* align icon */
.left-addon .fa  {/* left:  0px;*/}
.right-addon .fa { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }
</style>

          <div class="product-info col-sm-12 col-md-12 col-lg-12">

<?php if(isset($cancel) && $cancel=="true"){ echo "<h2 class='text-uppercase'>Cancel Orders</h2>";}else{?>
        <h2 class="text-uppercase">Your Orders</h2> <form class="" action="" method="post">

          <div class="inner-addon left-addon" align="center">
      <i class=" fa fa-search"></i>
      <input type="number" name="id" onkeydown="return FilterInput(event)" placeholder="Search all orders" class="form-control " style="width:initial;display:initial"/><input type="submit" class="btn btn-default" name="" value="Search Orders">
  </div>
  </form><br><br>
<?php } ?>
        <?php if($neworder!=0){?>

        <!--div class="alert alert-info"><h4>Order Placed Successfully.</h4></div-->

        <?php }?>

         <?php if($this->session->flashdata('msg')){?>

        <div class="alert alert-warning"><h4><?php echo $this->session->flashdata('msg');?></h4></div>

        <?php }?>

        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true" aria-expanded="false">

	<?php if(empty($orders)){?>
   <div class="col-md-9 col-sm-9 col-xs-12">  <i class="fa fa-shopping-cart fa-4x" aria-hidden="true" style="font-size:250px;"></i>
</div>
<div class="col-md-3 col-sm-3 col-xs-12 align-btm">
<a href="<?php echo base_url();?>" class="btn btn--wd text-uppercase pull-right">Shop Now</a>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
      <?php if(isset($notfound)){ ?>
        <h1 class="fnt">No Result Found. </h1>
        <?php }else{ ?>
        <h1 class="fnt">You have not ordered anything yet. </h1>
    <?php }}else{
	$i=1;foreach($orders as $order){?>
</div>
            <div class="panel panel-default">



                <!--Panel heading-->

                <div class="panel-heading" role="tab" id="headingOne">

                    <h5 class="panel-title">

        <a class="arrow-r" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne"> Order No OMD-<?php echo $order['oid'];?>&nbsp;&nbsp;&nbsp;&nbsp; <span class="label label-success"><?php if($order['shipping_status']=='Delivered'){ echo "Delivered";}else{echo $order['ostatus'];}?></span>

        &nbsp;&nbsp; <span class="label label-default"><?php if(!empty($order['order_text'])){ echo $order['order_text'];}//else{ //echo $order['ostatus'];}?></span>

        <i class="fa fa-angle-down rotate-icon pull-right"></i>

        </a>



            </h5>

                </div>



                <!--Panel body-->

                <div id="collapseOne<?php echo $i;?>"  class="panel-collapse collapse <?php if($i==1){echo 'in';}?>" role="tabpanel" aria-labelledby="headingOne">

                   <div class="row" style="padding:10px;">

                    <div class="col-md-3">

                        <style>

						.table tbody > tr > td:first-child {



						padding-left: 10px;

						padding-right: 10px;

						   }

						   .table tbody > tr > td {padding:9px;}



						</style>



                        <table class="table table-params">



                      <tbody>


                        <tr>

                          <td><strong>Order Details - </strong></td>

                          <td></td>

                        </tr>
                        <tr>

                          <td><strong>Order Date </strong></td>

                          <td><span class="label label-primary"><?php echo date("d M Y",strtotime($order['odate']));?></span></td>

                        </tr>
                        <?php if(!empty($order['code'])){ ?>
                        <tr>

                          <td><strong>Used Coupon Code</strong></td>

                          <td><?php echo $order['code'];?></td>

                        </tr>
                        <?php } ?>
                        <tr>

                          <td><strong>Order Total</strong></td>

                          <td><i class="fa fa-inr"></i> <?php echo $order['ototal'];?></td>

                        </tr>

                        <tr>

                        <td><a onclick="printDiv('printableArea<?php echo $i;?>')" class="btn btn--wd pull-left"><i class="fa fa-print" ></i> Print Invoice</a></td>
                        <?php if(true){ ?>
         <td>
         <?php
         $items=$this->db->get_where("order_items",array("oid"=>$order['oid'],'status!='=>'cancel'))->result();
         $total_price=0;
         $items2 = $items;
         foreach($items2 as $item2){
         $total_price += $item2->price*$item2->qty;$l=0;
         $all_requests += $this->db->get_where('cancel_requests',array('item_id'=>$item2->id))->num_rows();
         //echo $all_requests."<br>c";
        $all_requests2 += $this->db->get_where('return_requests',array('item_id'=>$item2->id))->num_rows();
       // echo $all_requests."<br>r";
         if($item2->order_type=='stitch' || $item2->order_type=='stitch with fabric')
         {
           $l=2;
         }
       } if($all_requests==0 && $all_requests2==0 && $l!=2 && $order['bitems']!=1 && $order['shipping_status']!='Delivered'){ if(!isset($cancel)){ ?>
          <a href="<?php echo base_url();?>index.php/welcome/cancel_order/<?php echo $order['oid'];?>" class="btn btn--wd pull-left" ><i class="fa fa-times"></i>Cancel Order</a>

      <?php }}} ?>
      </td>

                        </tr>



                      </tbody>

                    </table>

                    </div>

                    <div class="col-md-3 marg">

                    <h4 class="bill-a"><b>Billing Details - </b></h4><br>


<table class="table t-pdd">
			<tr><td>  <?php echo $user_info->name;?></tr></td>



                <tr><td> <?php echo $user_info->address;?></tr></td>

                 <tr><td> <?php echo $user_info->landmark;?></tr></td>
                 <tr><td> <?php
                  $kkk=$this->db->get_where('states',array('id'=>$user_info->state))->row();
                  $city=$this->db->get_where('cities',array('id'=>$user_info->city))->row();

                  echo $kkk->name." ".$city->name." ".$user_info->pincode;?></tr></td>
</table>
                    </div>
                     <div class="col-md-3 marg">

                    <h4 class="bill-a"><b>Shipping Details -</b></h4><br>

<table class="table t-pdd">

       <tr><td> <?php echo $order['bname'];?></tr></td>


               <tr><td> <?php echo $order['baddress'];?></tr></td>

                <tr><td> <?php echo $order['blandmark'];?></tr></td>
<?php $city=$this->db->get_where('cities',array('id'=>$order['bcity']))->row();
$stete=$this->db->get_where('states',array('id'=>$order['bcity']))->row();  ?>
                 <tr><td> <?php echo $city->name." ".$state->name." ".$order['bpin'];?></tr></td>
</table>
                    </div>
                     <div class="col-md-3 marg">

                    <h4 class="bill-a"><b>Order Summary - </b></h4><br>


<?php
$ship = $this->db->get_where('shipping_methods',array('id'=>$order['shipping_method']))->row();
      ?>
<table class="table t-pdd">
      <tr><td><strong>Item(s) Subtotal:&nbsp&nbsp&nbsp<strong></td><td><i class="fa fa-inr"></i> <?php echo $total_price; ?></td></tr>
      <tr><td><strong>Shipping:<strong></td><td><i class="fa fa-inr"></i> <?php echo $shipping_cost = $ship->price." (".$ship->reason.")";  ?></td></tr>
      <?php if(!empty($order['odis'])){ ?>
       <tr><td><strong>Discount:<strong></td><td><i class="fa fa-inr"></i> <?php echo $order['odis'] ;  ?></td></tr>
       <?php } ?>
      <tr><td><strong>Total<strong></td><td><i class="fa fa-inr"></i> <?php echo $order['ototal'] ?></td></tr>
      <tr><td><strong>Grand Total:<strong></td><td><i class="fa fa-inr"></i> <?php echo $order['ototal'] ?></td></tr>
</table>

                    </div>

                   <div class="table-responsive col-md-12" style="overflow:scroll">
                   <!---->
                             <div class="vd_content-section clearfix" id="printableArea<?php echo $i;?>" style="display: none">
            <div class="row">
              <div class="col-sm-9">
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
                          <td>MD-<?php echo $order['oid'];?></td>
                          <td><?php echo date("d M Y",strtotime($order['odate']));?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="mgbt-xs-20"><img alt="logo" src="<?php echo base_url();?>assets/images/logo2.png" /></div>
                    <span ><i>
                    <?php echo $footer->office_add; ?>
                    <!--span>795 PiTechnology, <br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">P:</abbr> (123) 456-7890<br />
                    <br />
                    info@venmond.com
                    </span-->
                    </i></span>
                    <hr/>
                    <br/>
                    <div class="pd-25">
                      <div class="row">
                        <div class="col-xs-9">
                          <i><span style="line-height: 20px">
                          <strong>Bill To:</strong><br>
                          <?php echo $order['bname'];?><br>
                          <?php echo $order['baddress'];?><br>
                          <?php echo $order['blandmark'].' '.$order['bcity'].' '.$order['bstate'].' '.$order['bpin'];?><br>
                          <i class="fa fa-phone"></i> <?php echo $order['bphone'];?>
                          </span></i>
                        </div>
                        <div class="col-xs-3">
                          <div class="text-right">
                          <strong>Total Amount:</strong><br>
                          <span class="mgtp-5 vd_green font-md"><i class="fa fa-inr"></i> <?php echo $order['ototal'];?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <table class="table table-condensed table-striped" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>SKU</th>
                          <th>DESCRIPTION</th>
                          <th class="text-center" style="width:20px;">QTY</th>
                          <th class="text-right" style="width:120px;">UNIT PRICE</th>
                          <th class="text-right" style="width:120px;">TOTAL</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $ptotal = 0;
                      foreach($items as $item){?>
                        <tr>
                          <td class="text-center"><?php echo $item->sku;?></td>
                          <td class="text-center">
                         <?php if($item->pimg=='null')
                          {
                            ?>

                            <img class="img img-responsive pull-left" style="width:50px;" src="<?php echo base_url();?>assets/images/fabrics/bag.png" alt="">
                            <?php } else{

                              $pname = explode(' ', $item->pname);
                              if($pname[1]=='Stitching')
                              {
                                ?>
                                <img class="img img-responsive pull-left" style="width:50px;" src="<?php echo base_url();?>adminassets/<?php echo $item->pimg;?>" alt="">
                                <?php
                              }else{



                              ?>

                          <img class="img img-responsive pull-left" style="width:50px;" src="<?php echo base_url();?>assets/images/<?php echo $item->pimg;?>" alt="">

                          <?php }} ?>
                          <?php echo $item->pname; $type = explode('/',$order_item->pimg);
                           if($type[0]=='accessories'){echo "PAMD-".$order_item->pid; }
                              else if($type[0]=='fabrics'){echo "PFMD-".$order_item->pid; }
                              else if($type[0]=='uniform'){echo "PUMD-".$order_item->pid; }
                              else if($type[0]=='online_boutique'){echo "POMD-".$order_item->pid; } 
                              ?></td>
                          <td><?php echo $item->qty?></td>
                          <td class="text-right"> <i class="fa fa-inr"></i><?php echo $item->price.' ';?></td>
                          <td class="text-right"> <i class="fa fa-inr"></i><?php echo $ptotal += $item->subtotal;?></td>


                        </tr>
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="3" rowspan="4" class="bdr">
                            <p class="font-normal"></p></th>
                          <th class="text-right pd-10">Sub Total</th>
                          <th class="text-right pd-10"><i class="fa fa-inr"></i> <?php echo $ptotal;?></th>
                        </tr>
                        <tr>
                          <th class="text-right  pd-10 no-bd">Discount</th>
                          <th class="text-right  pd-10 vd_red no-bd"><i class="fa fa-inr"></i> <?php echo $order['odis'];?></th>
                        </tr>
                        <tr>
                          <th class="text-right  pd-10 no-bd">Shipping Cost</th>
                          <th class="text-right  pd-10 no-bd"><i class="fa fa-inr"><?php echo $shipping_cost; ?></i></th>
                        </tr>
                        <?php if(!empty($order['odis'])){ ?>
                        <tr>
                          <th class="text-right  pd-10 no-bd">Discount</th>
                          <th class="text-right  pd-10 no-bd"><i class="fa fa-inr"><?php echo $order['odis']." (".$order['code']." )"; ?></i></th>
                        </tr>
                        <?php } ?>
                        <tr>
                          <th colspan="3"></th>
                          <th class="text-right  pd-10">Order Total</th>
                          <th class="text-right  pd-10 "><span class="vd_green font-sm font-normal"><i class="fa fa-inr"></i> <?php echo $order['ototal']+$order['odis'];?></span></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>

                </div>

              </div>

            </div>

          </div>
                   <!---->


                      <table class="table table-params">

                      <!-- <thead><tr><th colspan="6">Order Includes</th></tr></thead>-->

                       <td>Image</td><td>Options</td><td>Qty</td><td>Unit Price</td><td>Total</td></tr>

                        <tbody>

                   		<?php

							foreach($items as $item){?>

                      
                          <?php $sty_pre=''; if($item->pimg=='null')
                          {
                            ?>

                            <!--img class="img img-responsive pull-left" style="width:50px;" src="<?php echo base_url();?>assets/images/fabrics/bag.png" alt=""-->
                            <?php } else{

                             
                        $is_5=0;$total_price=0;
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

                            <tr><td> 
                          <img width="100px" class="img img-responsive pull-left" src="<?php echo base_url();?>assets/images/fabrics/<?php echo $value->thumb;?>"><br><?php echo $value->title."<br>SKU: ".$value->SKU."<td></td><td>".$is_2->qty."</td><td> <i class='fa fa-inr'></i>".round($is_2->fabric_price/$is_2->qty,2)."</td><td><h5> <i class='fa fa-inr'></i>".$is_2->fabric_price."</h5></td></tr>";
                          $item->subtotal = $item->subtotal-$is_2->fabric_price;
                          //echo "</div>";
                            }
                            $is_3='';
                         }
                         echo " <tr>

                          <td>";

                          if(!empty($is_4))
                         {
                             $is_5 = $this->db->get_where('upload_designs',array('id'=>$is_4->part_ids))->row();
                             ?>


                          <img class="img img-responsive pull-left" src="<?php echo $is_5->image;?>" width="100px">


                         <?php echo 'Custom Design';
                         $is_4='';
                           }

                         else{

                          ?>

                          <?php if($item->pimg==null){ ?>
                          <?php }
                          else{ ?><?php } ?>

                          <?php  } 
                                                  $f=explode(",",$item->options);

                $l=0;foreach($f as $fs){if($l>2)
                { 
                $ff=explode(":",$fs);
                //echo $ff[1];
                if(isset($ff[1]) && $ff[1]!=' ')
                {//print_r($ff);
                if($ff[0]=='predesign ')
                {
                  //echo $ff[1];
                  $sty_pre=$this->db->get_where("predesign",array("id"=>$ff[1]))->row_array();
echo '<img src='.base_url().'adminassets/styles/'.$sty_pre['dfront'].' width="50px">'; echo "";                //print_r($this->db->last_query());
                 // echo ''.$ff[0].' : '.$sty['dname']; echo "";
                }
               /* else if($is_5=='0'){
                  if(!empty($ff))
                  {
                  $sty=$this->db->get_where("style",array("id"=>$ff[1]))->row_array();
                }
                  if(empty($sty))
                  {
                    $sty=$this->db->get_where("addons",array("id"=>$ff[1]))->row_array();
                    if(!empty($sty))
                  {

                    echo '<img src='.base_url().'adminassets/styles/'.$sty['add_on_image'].' width="50px">'; echo "";
                  }
                  }
                  else{
                  echo '<img src='.base_url().'adminassets/styles/'.$sty['thumb_front'].' width="50px">'; echo "";
                  }
                }*/
              }

                }$l++;}

                              $pname = explode(' ', $item->pname);
                              if(empty($is_5) && empty($sty_pre)){

                              if($pname[1]=='Stitching')
                              {
                                ?>
                                <div>
                                <img class="img img-responsive pull-left" style="width:50px;" src="<?php echo base_url();?>adminassets/<?php echo $item->pimg;?>" alt="">
                                <?php
                              }else{



                              ?>
                              <div>
                          <img class="img img-responsive pull-left" style="width:50px;" src="<?php echo base_url();?>assets/images/<?php echo $item->pimg;?>" alt="">

                          <?php }}
                          } ?>

                          <?php if($item->sku!='null'){echo "SKU: ".$item->sku;} ?><br/><?php echo $item->pname;?></div></td>

                           <td>

                           <?php if($item->measures!=""){echo "Measurements<br/>";
                             //echo $item->measures;
							$os=explode(",",$item->measures);

							foreach($os as $os)

							{
                $os2 = explode(':',$os);
                if($os2[0]=='BEST_FIT'){
                  echo str_replace(":"," ", str_replace("_"," ",$os));
                }else if($os2[0]=='ASK_FOR_MEASUREMENT'){
                  echo str_replace(":"," ", str_replace("_"," ",$os));
                }else{
                //echo str_replace(":"," ", str_replace("_"," ",$os));
								echo $os."<br/>";
                }

							}

						   }?>





                           </td>

                           <td><?php echo $item->qty;?> </td>
                           <td><i class="fa fa-inr"></i><?php echo round($item->subtotal/$item->qty);?></td>

                           <td><h5><i class="fa fa-inr"></i><?php echo $item->subtotal;?></h5></td>
                           <?php $return = $this->db->get_where('cancel_requests',array('item_id'=>$item->id))->row();
                           $return2 = $this->db->get_where('return_requests',array('item_id'=>$item->id))->row();
                           //print_r($return);
                           if($order['shipping_status']=='Delivered'){
                           	if(!empty($return2) && $return2->approvedornot=='disapprove'){
                            ?>
                            <td class="alert alert-warning">Your product return request is disappoved<br> by admin for further information please<br> check your mail.</td>
                            <?php
                            }else if(!empty($return2) && $return2->approvedornot=='approve'){
                            ?>
                            <td class="alert alert-success">Your product return request is <b>appoved</b><br> by admin for further information please<br> check your mail.</td>
                            <?php
                            }else if(empty($return2)){?>

                           	<td class="text-right"> <a class="btn btn--wd pull-left"  data-toggle="modal" data-target="#myModal2<?php echo $item->id; ?>" ><i class="fa fa-times"></i> Return</a></td>
                            <?php }else{
                              ?>
                              <td class="text-right"><span class="alert alert-info">Return Request has been sent</span></td>
                              <?php
                              } ?>
                            <!--returnmodal-->
                                <!-- Modal -->
  <div class="modal fade" id="myModal2<?php echo $item->id; ?>" role="dialog">
    <div class="modal-dialog">


      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-body">

          <div class="row">
            <div class="container">

              <div class="col-xs-2 col-md-2">
                <?php if($item->pimg=='null')
                          {
                            ?>

                            <img class="img img-responsive pull-left" style="width:100px;" src="<?php echo base_url();?>assets/images/fabrics/bag.png" alt="">
                            <?php } else{

                              $pname = explode(' ', $item->pname);
                              if($pname[1]=='Stitching')
                              {
                                ?>
                                <img class="img img-responsive pull-left" style="width:100px;" src="<?php echo base_url();?>adminassets/<?php echo $item->pimg;?>" alt="">
                                <?php
                              }else{



                              ?>

                          <img class="img img-responsive pull-left" style="width:100px;" src="<?php echo base_url();?>assets/images/<?php echo $item->pimg;?>" alt="">

                          <?php }} ?>
              </div>
              <div class="col-xs-5 col-md-3">

                    <b><?php echo $item->pname;?></b>
                     <p>Why you want to return.</p><br>

                      <?php echo form_open('welcome/return_item_request'); ?>
                     <input type="hidden" name="item_id" value="<?php echo $item->id; ?>">
                     <input type="hidden" name="vid" value="<?php echo $item->vendor_id; ?>">
                     <div class="form-group">
  <label for="sel1"></label>
                <select name="reason" class="form-control reason" id="<?php echo $item->id; ?>" required>
                  <option value="">Select Reason</option>
                  <?php
                  $reasons = $this->db->get('return_reasons')->result();
                  foreach ($reasons as $value) {
                    echo "<option value='$value->id'>$value->reason</option>";
                  } ?>
                </select>

                </div>
                <div class="form-group comment" id="comment<?php echo $item->id; ?>" >
  <label for="comment">Description:</label>
  <textarea class="form-control" rows="5" name="description" nameid="comment" required></textarea>
</div>
 <button type="submit" class="btn btn-primary submit">Submit</button>
  <?php echo form_close(); ?>
              </div>

            </div>
          </div>
            <div class="row">
            <div class="container">
              <div class="col-xs-3">

              </div>
              <div class="col-xs-9">


              </div>

            </div>
          </div>

      </div>
        <div class="modal-footer" style="background-color: initial;">



          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>


      </div>

    </div>
  </div>
                            <!--returnmodal-->
                           	<?php
                           }else
                           if(!empty($return) && $return->approvedornot=='disapprove'){
                            ?>
                            <td  class="alert alert-warning">Your product cancel request is disappoved<br> by admin for further information please<br> check your mail.</td>
                            <?php
                            }else if(!empty($return) && $return->approvedornot=='approve'){
                            ?>
                            <td class="alert alert-success">Your product cancel request is <b>appoved</b><br> by admin for further information please<br> check your mail.</td>
                            <?php
                            }else if(!empty($return)){
                            ?>
                            <td class="text-right">
                            <span class="alert alert-info">Canecl Request Sent</span>
                            </td>
                            <?php
                            }else { if($item->order_type=='stitch' || $item->order_type=='stitch ' || $item->order_type=='stitch with fabric '  || $item->order_type=='stitch with fabric'){ ?>

                            <?php }else if(!isset($cancel)){
                            	?>
                            	<td class="text-right"> <a class="btn btn--wd pull-left"  data-toggle="modal" data-target="#myModal<?php echo $item->id; ?>" ><i class="fa fa-times"></i> Cancel Item</a></td>
                                  <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $item->id; ?>" role="dialog">
    <div class="modal-dialog">


      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-body">

          <div class="row">
            <div class="container">

             <div class="col-xs-4 col-md-2">
                <?php if($item->pimg=='null')
                          {
                            ?>

                            <img class="img img-responsive pull-left" style="width:100px;" src="<?php echo base_url();?>assets/images/fabrics/bag.png" alt="">
                            <?php } else{

                              $pname = explode(' ', $item->pname);
                              if($pname[1]=='Stitching')
                              {
                                ?>
                                <img class="img img-responsive pull-left" style="width:100px;" src="<?php echo base_url();?>adminassets/<?php echo $item->pimg;?>" alt="">
                                <?php
                              }else{



                              ?>

                          <img class="img img-responsive pull-left" style="width:100px;" src="<?php echo base_url();?>assets/images/<?php echo $item->pimg;?>" alt="">

                          <?php }} ?>
              </div>
              <div class="col-xs-12 col-md-3">

                    <b><?php echo $item->pname;?></b>
                     <p>Why you want to cancel?</p><br>

                      <?php echo form_open('welcome/cancel_item_request'); ?>
                     <input type="hidden" name="item_id" value="<?php echo $item->id; ?>">
                     <input type="hidden" name="vendor_id" value="<?php echo $item->vendor_id; ?>">
                     <div class="form-group">
  <label for="sel1"></label>
                <select name="reason" class="form-control reason" id="<?php echo $item->id; ?>" required>
                  <option value="">Select Reason</option>
                    <?php
                $reasons = $this->db->get('cancel_reasons')->result();
                  foreach ($reasons as $value) {
                    echo "<option value='$value->id'>$value->reason</option>";
                  } ?>
                </select>

                </div>
                <div class="form-group comment" id="comment<?php echo $item->id; ?>" >
  <label for="comment">Description:</label>
  <textarea class="form-control" rows="5" name="description" nameid="comment" required></textarea>
</div>
 <button type="submit" class="btn btn-primary submit">Submit</button>
  <?php echo form_close(); ?>
              </div>

            </div>
          </div>
            <div class="row">
            <div class="container">
              <div class="col-xs-3">

              </div>
              <div class="col-xs-9">


              </div>

            </div>
          </div>

      </div>
        <div class="modal-footer" style="background-color: initial;">



          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>


      </div>

    </div>
  </div>
                            	<?php
                            	}} ?>




                           </tr>

                            <?php }

						?>

                        </tbody>

                      </table>

                    </div>

                   </div>




                </div>

            
          <?php $i++;}}?>

      

</div>
</div>
</div>


          </div>











        </div>



      </div>



    </section>











    <!-- End Content section -->



  </div>
  <script type="text/javascript">
  function FilterInput(event) {
var keyCode = ('which' in event) ? event.which : event.keyCode;

isNotWanted = (keyCode == 69 || keyCode == 101);
return !isNotWanted;
};

    function printDiv(printableArea) {
  //
    var printContents = document.getElementById(printableArea).innerHTML;
  //alert (printContents);
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
$(document).ready(function(){
  $(".comment").hide();
    $(".reason").change(function(){
      var id = $(this).attr('id');
      //alert(id);
        $("#comment"+ id).show();
    });
    $(".submit").click(function(){
      console.log('submti');
        var id = $(this).attr('id');
      //alert(id);
        var reason = $("#"+ id).val();
        var description = $("#comment"+ id).val();
        $.ajax({
             type: "POST",
             url: '<?php echo base_url();?>index.php/Welcome/cancel_item_request',
             data: {"reason":reason,"description":description,"item_id":id},
             success: function(response){
              console.log(response);
              /*setTimeout(function() {
       window.location.href = "<?php echo base_url();?>welcome/checkout"
      }, 1000);*/
               }
             });
    });
});
  </script>

   <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
   <script src="<?php echo base_url();?>assets/js/custom.js"></script>