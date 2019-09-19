    <?php  if(isset($itemsk) && ($tailortruek>0)){ ?>       
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header no-subtitle">
              <h1>Invoice</h1>
            </div>
          </div>
          <div class="vd_content-section clearfix" >
            <div class="row">
            <!-- col-sm-9-->
              <div class="col-sm-12">
                <div class="row">

              
                <div class="col-sm-3">
                  <button class="btn vd_btn vd_bg-grey" type="button" onclick="printDiv('printableArea')" value="Print Invoice"><i class="fa fa-print append-icon"></i>Print Invoice</button>
                </div>
                
               
                
                <hr/>
              </div>

              <div class="col-sm-12" id="printableArea">
                <div class="panel widget light-widget">
                  <div class="panel-body" style="padding:10px;">
                  <center><h3 class="font-semibold mgbt-xs-20">INVOICE</h3></center>
                   <div class="pull-right text-right">
                      
                      <table class="">
                        <tr>
                          <td>Invoice No. : </td>
                          <td>MD-<?php echo $datak->soid; ?>&nbsp&nbsp&nbsp&nbsp</td>
                        </tr>
                        <tr>
                          <td>Date : </td>
                          <td><?php echo date("d M Y");?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="mgbt-xs-20"><img alt="logo" src="<?php echo base_url();?>assets/images/logo2.png" /></div>

                  <?php  $city=$this->db->get_where('cities',array('id'=>$tailor_infok->tcity))->row();
                        $state=$this->db->get_where('states',array('id'=>$tailor_infok->tstate))->row();
                          ?>
                                       <div class="pd-25">
                      <div class="row">
                        <div class="col-xs-8">
                          <address>
                          <h4><strong>Tailor Detail:</strong></h4>
                    <table>
                            <tr><td>Tailor Id</td><td>:&nbsp&nbsp</td><td><?php echo "TMD-".$tailor_infok->id; ?></td></tr>
                            <tr><td>Tailor Name</td><td>:&nbsp&nbsp</td><td><?php echo $tailor_infok->tname; ?></td></tr>
                            
                            <tr><td>Shop Name</td><td>:&nbsp&nbsp</td><td><?php echo $tailor_infok->shopname; ?></td></tr>
                            <tr><td>Shop Address</td><td>:&nbsp&nbsp</td><td>
                            <?php echo $tailor_infok->tshop_address ?></td></tr>
                            
                            
                            <tr><td>City</td><td>:&nbsp&nbsp</td><td><?php echo $city->name ?></td></tr>
                            <tr><td>Landmark</td><td>:&nbsp&nbsp</td><td><?php echo $tailor_infok->landmark;?></td></tr>
                            <tr><td>Pin Code</td><td>:&nbsp&nbsp</td><td><?php echo $tailor_infok->pincode;?></td></tr>
                             <tr><td>Mobile Number</td><td>:&nbsp&nbsp</td><td><?php echo $tailor_infok->tphone; ?></td></tr>
                            <tr><td>Order No</td><td>:&nbsp&nbsp</td><td><?php echo "OMD-".$itemorderid; ?></td></tr>
                            <tr><td>Assign Date</td><td>:&nbsp&nbsp</td><td><?php echo $datak->adate; ?></td></tr>
                            <tr><td>Delivery Date</td><td>:&nbsp&nbsp</td><td><?php echo $datak->delivery_date; ?></td></tr>
                            <?php $date = $this->db->get_where('transaction_date',array('for_v_t'=>'tailor'))->row();?>

                            <tr><td>Payment Date</td><td>:&nbsp&nbsp</td><td><?php echo $date->date; ?></td></tr>
                           
                          </table>
                         
                          
                          </address>
                        </div>
                      
                        <div class="col-xs-4">
                          <div class="col-sm-4 controls" id="qr_img" style="width: 100%;">
          </div>
                        </div>
                      </div>
                    </div>
                         
                    <table class="table table-condensed table-striped">
                      <thead>
                        <tr>
                          <th>Fabric&nbspDetails</th>
                          <th width="60px;">&nbsp&nbspPreview</th>
                          
                          <th>Style&nbspDescription</th>
                          
                          <th>Style&nbspName</th>
                          <th>Measurement</th>
                         
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
					  foreach($itemsk as $item)
					  {                         
						  $pid="";
						  $pred=$this->db->get_where("tailor_assign",array("stid"=>$item->id))->row();
						//echo $this->db->last_query();
						//print_r($pred); ?>
						<input type="hidden" class="form-control" name="qr_code" id="qr_code<?php echo $item->id; ?>" value="<?php echo $item->id; ?>">
                        <tr>
                          <td class="text-center"><?php
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
                          <img width="100px" class="img img-responsive pull-left" src="<?php echo base_url();?>assets/images/fabrics/<?php echo $value->thumb;?>"><br><?php echo $value->title."<br> <i class='fa fa-inr'></i> ".$value->price."";
                            }
                         }
                         else if(!empty($is_4))
                         {
                            $is_5 = $this->db->get_where('upload_designs',array('id'=>$is_4->part_ids))->row();
                             ?>
                          <img class="img img-responsive pull-left" src="<?php echo $is_5->image;?>" width="100px">
                         <?php echo 'Custom Design';
                           }
                         
                         else{
                          
                          ?>
                          
                          <?php if($item->pimg==null){ ?>
                          <?php }
                          else{ ?><?php } ?>

                          <?php  } ?>
                          </td>

                          <td style="padding:0px;">
                          <br/>
                          
                          <?php //print_r($item->pid);
                          $is = $this->db->get_where('stitching_bundle',array('id'=>$item->pid));
                          $is_num = $is->num_rows();
                          $is_data = $is->row();
                                                  $f=explode(",",$item->options);
												  
					// MY CODE START							  
  					  $isi = $this->db->get_where('stitching_bundle',array('id'=>$item->pid))->row();
					  $is_00 =$is_01 = $this->db->get_where('bundle',array('bundle_no'=>$isi->bundle_no,'addon_or_not'=>0))->result();	
                      foreach ($is_00 as $value) 
					  {
                         $sty = $this->db->get_where('style',array('id'=>$value->part_ids))->row();
                         echo "<img src='".base_url()."adminassets/styles/resized/small/".$sty->thumb_front."' width='70px'>";
                      }									  
					  
					   $is_111 = $is_11 = $this->db->get_where('bundle',array('bundle_no'=>$isi->bundle_no,'addon_or_not'=>1))->result();					  
					   foreach ($is_111 as $value) 
					   {
						  $sty = $this->db->get_where('addons',array('id'=>$value->part_ids))->row();
						  echo "<img src='".base_url()."adminassets/styles/resized/small/".$sty->add_on_image."' width='70px'>";
						}					  
					 // END CODE 
					 

					 
					 
					 
					  
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
                  //print_r($this->db->last_query());
                  echo '<img src='.base_url().'adminassets/styles/'.$sty['dfront'].' width="70px">';
                  //echo ''.$ff[0].' : '.$sty['dname']; echo "";
                }
                else if($is_5=='0')
				{
//					  if(!empty($ff))
//					  {
//						$sty=$this->db->get_where("style",array("id"=>$ff[1]))->row_array();
//						echo $sty
//					  }
//					  if(empty($sty))
//					  {
//						  $sty=$this->db->get_where("addons",array("id"=>$ff[1]))->row_array();
//						  if(!empty($sty))
//						  {
//						   	echo '<img src='.base_url().'adminassets/styles/'.$sty['add_on_image'].' width="50px">'; echo "";
//						  }
//					  }
//					  else
//					  {
//							echo '<img src='.base_url().'adminassets/styles/'.$sty['thumb_front'].' width="50px">'; echo "";
//					  }
					  
                  }
             }
                 
                }$i++;}
							 echo '</td><td width="200px"><table class="gray"><tbody>';
							  $i=0;foreach($f as $f){if($i>2)
							  {
								$ff=explode(":",$f);
                //echo $ff[1];
                if(isset($ff[1]) && $ff[1]!=' ')
                {//print_r($ff);
                if($ff[0]=='predesign ')
                {
                  	$sty=$this->db->get_where("predesign",array("id"=>$ff[1]))->row_array();
                  	//print_r($this->db->last_query());
                  	echo '<tr><td><br>'.$ff[0].' : '.$sty['dname']; echo "</td></tr>";
                }
				else if($is_5=='0')
				{
                  if(!empty($ff))
                  {
                  		$sty=$this->db->get_where("style",array("id"=>$ff[1]))->row_array();
                   }
                  if(empty($sty))
                  {
                    $sty=$this->db->get_where("addons",array("id"=>$ff[1]))->row_array();
                    if(!empty($sty))
                  	{
                    	echo '<tr><td><br><br>'.str_replace("_"," ",$ff[0]).' : '.$sty['add_on_name']; echo "</td></tr>";
                  	}
                  }
                  else
				  {
				  	$names[] = str_replace("_"," ",$ff[0]);	
                  	//echo '<tr><td style="padding-top:12px;"><br>'.str_replace("_"," ",$ff[0]).' : '.$sty['style']; echo "</td></tr>";
                  }
			 }
         }
							   
							  }$i++;}
							  
					 $kl = 0;  
					  foreach ($is_00 as $value) 
					  {
                           $sty = $this->db->get_where('style',array('id'=>$value->part_ids))->row();
                           echo '<tr><td style="height:70px"><br>'.$names[$kl].' : '.$sty->style; echo "</td></tr>";
                             // echo "<img src='".base_url()."adminassets/styles/resized/small/".$sty->thumb_front."' width='50px'>";
                           $kl++; 
					  }	
				
					foreach ($is_111 as $value) 
					{
					  $sty = $this->db->get_where('addons',array('id'=>$value->part_ids))->row();
					  echo '<tr><td style="height:50px"><br>'.$names[$kl].' : '.$sty->add_on_name; echo "</td></tr>";
					  /*echo "<img src='".base_url()."adminassets/styles/resized/small/".$sty->add_on_image."' width='50px'>";*/
					  $kl++; 
					 }				
				
				
				?>
                              
                             </tbody></table>
							 
							 </td>
							 <td class="gray"><?php echo $item->pname; ?></td>                             
                             <td class="gray" width="150px"> <?php $f=explode(",",$item->measures);
               
                $i=0;foreach($f as $f){
                $ff=explode(":",$f);
                //$sty=$this->db->get_where("style",array("id"=>$ff[1]))->row();
                 if(isset($ff[1]) && $ff[1]!=' ')
                {
                echo '<table><tr><td>'.$ff[0].' : '.$ff[1];echo "</td></tr></table>";
              }
                $i++;}?></td>
                

                 <?php if(isset($is_5) && !empty($is_5->desc)){echo '<td>Description: '.$is_5->desc.'</td>';} ?>
                  
                 
                         
                          
                          
                          
                        </tr>
                        
                  
                  

                        

                         
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="3" rowspan="5" class="bdr">
                            <p class="font-normal"></p></th>
                          <th class="  pd-10" colspan="1">Total</th>
                          <th class="  pd-10" colspan="2"><i class="fa fa-inr"></i>&nbsp<?php echo $datak->scost; ?></th>
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
                  	Copyright &copy;2016 MobileDarji Inc. All Rights Reserved 
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
 
<!-- Specific Page Scripts Put Here -->


<!-- Specific Page Scripts END -->




<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->

 <script type="text/javascript">
  var drp_val=$('#qr_code<?php echo $item->id; ?>').val(); 
  // alert(drp_val); 
   if(drp_val!="")
   {
    //alert(drp_val); 
    $('.btn_clk1').removeAttr('disabled');
      var data="<img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl="+encodeURIComponent(drp_val)+"' style=''/>";     
      $("#qr_img").html(data);  
   }
   else
   {
     $('.btn_clk1').attr('disabled','disabled');
     $("#qr_img").html('<h3 style="margin: 15px 77px 10px;">Please Select Any Product</h3>'); 
   }

function printDiv(printableArea) {
  //
    $('.more').hide();
    var printContents = document.getElementById(printableArea).innerHTML;
  //alert (printContents);
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    $('.more').show();
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

<!-- Mirrored from vendroid.venmond.com/pages-invoice.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2016 11:25:31 GMT -->
</html>
<?php } ?>