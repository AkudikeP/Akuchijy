  <link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">  

<div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Enquiry</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
          
            <div class="row">
                <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Enquiry Detail</h3>
                  </div>
                  <div class="panel-body table-responsive">
                  <?php 
					   foreach($msgtext as $enqinfo)
					   {
					   		$enq_interest 			=  $enqinfo->enq_interest;
							$enq_order 				=  $enqinfo->enq_order;
							$enq_feedback 		=  $enqinfo->enq_feedback;
							$enq_product 			=  $enqinfo->enq_product;
							$enq_resource 		=  $enqinfo->enq_resource;	
							$enq_fullname 		=  $enqinfo->enq_fullname;
							$enq_email 				=  $enqinfo->enq_email;
							$enq_phone 			=  $enqinfo->enq_phone;
							$enq_address 		=  $enqinfo->enq_address;
							$enq_city 					=  $enqinfo->enq_city;
							$enq_state 				=  $enqinfo->enq_state;
							$enq_pincode 			=  $enqinfo->enq_pincode;
							$enq_subject 			=  $enqinfo->enq_subject;
							$enq_message 		=  $enqinfo->enq_message;
							$enq_postdate 		=  $enqinfo->enq_postdate;
					   }
                    ?>
                  <table width="100%">
				  
					<tr>
						<td style="width:150px;">Full Name</td><td><?php echo $enq_fullname;?></td>
					</tr>
					<tr>
						<td style="width:150px;">Email</td><td><?php echo $enq_email;?></td>
					</tr>
					<tr>
						<td style="width:150px;">Contact No.</td><td><?php echo $enq_phone;?></td>
					</tr>
					<tr>
						<td style="width:150px;">Address</td><td><?php echo $enq_address;?></td>
					</tr>
					<tr>
						<td style="width:150px;">Interest</td><td><?php echo $enq_interest;?></td>
					</tr>
					<tr>
						<td style="width:150px;">Your Order</td><td><?php echo $enq_order;?></td>
					</tr>																													  
					<tr>
						<td style="width:150px;">Your Feedback</td><td><?php echo $enq_feedback?></td>
					</tr>
					<tr>
						<td style="width:150px;">Resources</td><td><?php echo $enq_resource?></td>
					</tr>
					<tr>
						<td style="width:150px;">Subject</td><td><?php echo $enq_subject?></td>
					</tr>	
					<tr>
						<td style="width:150px;">Message</td><td><?php echo $enq_message?></td>
					</tr>																																												  					
				  
                  </table>  </br>
                 <a href="<?php echo base_url();?>index.php/product/contactenquiry"> <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm "><i class="fa fa-save append-icon"></i> Back</button> </a> 
                    <style type="text/css">
                    table,tr,td{
                        border-collapse: border-collapse;
                        border:1px solid #fff;
                        padding: 1%;
                    }
                      td:nth-child(odd)
                      {
                        background-color: #ccc;

                      }
                    </style>  
                       
                         
                  </div>
                </div>
                <!-- Panel Widget --> 
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
                    Copyright &copy;2014 Venmond Inc. All Rights Reserved 
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