<style>
.active4
{
  background-color:#1fae66 !important;
}
</style><link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">  
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">  
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Listing All Fabrics</h1>
            </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Available Fabrics</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          

                         <th>S.No.</th>
                          <th>Date</th>
                          <th>Product&nbspID</th>
                          <th>Image</th>
                          <th>SKU</th>
                          <th>Title</th>
                          <th>Main Category</th>
                          <th>Quantity</th>
                          <th>In Stock Quantity</th>
                          <th>Price</th>
                          <th>Discount Price</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                       
                         <?php $i=1;foreach($fab as $fab){?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td class="center"><?php echo $fab->padddate."&nbsp";?></td>
                           <td class="center"><?php echo '&nbspPFMD-'.$fab->id;?></td>
                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/fabrics/<?php echo $fab->thumb;?>" /></td>
                          <td><?php echo $fab->SKU; ?></td>
                          <td><?php echo $fab->title; ?></td>
                          <td><?php if($fab->category==1) echo "Women" ;?><?php if($fab->category==2) echo "Men" ;?><?php if($fab->category==3) echo "Kids" ;?></td>
                          <td></i><?php echo $fab->quantity;?></td>
                          <td></i><?php  $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$fab->id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($fab->title)).'"')->row()->qty;
                        
                          $qty = $fab->quantity;
                          echo (int)$qty-(int)$count;?></td>
                          <td>Rs. <?php echo $fab->price;?>/-</td>
                          <td><?php

            $current_date=date('Y-m-d'); 
            if(($current_date>=$fab->from_date) AND ($current_date<=$fab->to_date)){
            ?>
            <?php if($fab->offer_type=='Percentage')
              {
                $value = 100 - $fab->offer_price;
                echo $x='<i class="fa fa-inr"></i>'.round(($fab->price/100)*$value);  
              }
              elseif($fab->offer_type=='Amount')
              {
                $value = $fab->offer_price;
                echo $x='<i class="fa fa-inr"></i>'.round($fab->price - $value);
              }
            }
            else
              {
                echo "-"; //echo $x=$fab->price;
              }
            ?>
            </td>
                          <td>
                          <a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/Vendor/add_fabric/<?php echo $fab->id;?>"><i class="fa fa-edit"></i></a> 
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" id="<?php echo $fab->id;?>" type="button"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                        <?php $i++;}?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
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
<script>	
					$(document).ready(function(){ 
						$(".del_fabric").click(function(){
							var fid=$(this).attr('id');
							$(this).closest("tr").remove();
							$.ajax({
							 type: "POST",
							 url: '<?php echo base_url();?>index.php/Vendor/del_fabric',
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

<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
				"use strict";
				
				$('#data-tables').dataTable();
				$('#data-tables1').dataTable();
		} );
</script>

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


</body>

<!-- Mirrored from vendroid.venmond.com/listtables-data-tables.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2016 11:22:00 GMT -->
</html>