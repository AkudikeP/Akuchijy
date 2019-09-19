<style>
.active14
{
	background-color:#1fae66 !important;
}
</style>


<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">  

          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Stitching Orders</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
          
            <div class="row">
              
              <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Stitching Orders</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>OrderNo</th>
                         
                          <th>Order Items</th>
                          <th>Payment</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                       
                         <?php $i=1;//print_r($orders
						$gt=0;$total=0; foreach($orders as $fab){?>
                        <tr class="gradeA">
                          <td>OMD-<?php echo $fab->oid;?></td>
                         
                          <td><?php $ois=$this->db->get_where("order_items",array("oid"=>$fab->oid));
						  echo $ois->num_rows(); 
						  $or=$ois->result();
              $total=0;
						  foreach($or as $or){$total=$total+$or->subtotal;}
						  ?> Items</td>
                          <td>Rs. <?php echo $or->subtotal;?>/-</td>
                          <td>
                          <a data-toggle="tooltip" title="View" class="btn btn-xs btn-success" href="<?php echo base_url();?>product/order_details/<?php echo $fab->oid;?>"><i class="fa fa-eye"></i></a> 
                         </td>
                        </tr>
                        <?php $i++;$gt=$gt+$or->subtotal;}?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              
              <div class="col-md-5">
                <div class="row">
                  <div class="col-md-12">
                    <div class="vd_status-widget vd_bg-green widget">
	<div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu --> 
                                
    <a class="panel-body" href="#">
            <div class="clearfix">
                <span class="menu-icon">
                    <i class="icon-network"></i>
                </span>
                <span class="menu-value">
                   <i class="fa fa-inr"></i> <?php echo $gt;?>/- 
                </span>  
            </div>   
            <div class="menu-text clearfix">
                Total Earnings
            </div>                                                               
    </a>        
</div>                    </div>
                  <!--col-md-12 --> 
                </div>
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-6">
                    <div class="vd_status-widget vd_bg-red  widget">
    <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu --> 
                                 
    <a class="panel-body" href="#">                                
        <div class="clearfix">
            <span class="menu-icon">
                <i class="icon-bars"></i>
            </span>
            <span class="menu-value">
                <?php echo $totalpro;?>
            </span>  
        </div>   
        <div class="menu-text clearfix">
            Stitch Orders
        </div>  
     </a>                                                                
</div>                    </div>
                  <!--col-xs-6 -->
                <?php /* ?>  <div class="col-xs-6">
                    <div class="vd_status-widget vd_bg-blue widget">
    <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu --> 
                                  
    <a class="panel-body"  href="#">                                  
        <div class="clearfix">
            <span class="menu-icon">
                <i class="fa fa-comments"></i>
            </span>
            <span class="menu-value">
                14
            </span>  
        </div>   
        <div class="menu-text clearfix">
            New Reviews
        </div>
     </a>                                                                  
</div>                   </div>
                  <!--col-xs-6 --> 
                </div>
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-6">
                    <div class="vd_status-widget vd_bg-yellow widget">
    <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu --> 
                                  
    <a class="panel-body"  href="#">                                
        <div class="clearfix">
            <span class="menu-icon">
                <i class="icon-users"></i>
            </span>
            <span class="menu-value">
                250
            </span>  
        </div>   
        <div class="menu-text clearfix">
            New Users
        </div>  
     </a>                                                                
</div>                    </div>
                  <!--col-xs-6 -->
                  <div class="col-xs-6">
                    <div class="vd_status-widget vd_bg-grey widget">
    <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu --> 
                                   
    <a class="panel-body"  href="#">                                  
        <div class="clearfix">
            <span class="menu-icon">
                <i class="fa fa-tasks"></i>
            </span>
            <span class="menu-value">
                3
            </span>  
        </div>   
        <div class="menu-text clearfix">
            New Tasks
        </div>
     </a>                                                                  
</div>                   </div>
                  <!--col-md-xs-6 --> 
                </div>
                <?php */ ?>
                <!-- .row --> 
                
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
<!--   <footer class="footer-1"  id="footer">      
    <div class="vd_bottom ">
        <div class="container">
            <div class="row">
              <div class=" col-xs-12">
                <div class="copyright">
                  	Copyright &copy;2014 Venmond Inc. All Rights Reserved 
                </div>
              </div>
            </div><!-- row -->
       <!--  </div><!-- container -->
  <!--   </div>
  </footer>  -->
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


</html>