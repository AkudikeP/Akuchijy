<style>
.active22
{
	background-color:#1fae66 !important;
}
</style>


<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">  
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">  
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Uniform Added By Vendors</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 mgbt-sm-15">
                <div class="vd_status-widget vd_bg-green widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu --> 
                  
                  <a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="fa fa-cube"></i> </span> <span class="menu-value">
                  <?php echo $totalpro;?>
                  </span> </div>
                  <div class="menu-text clearfix"> Items in Stock </div>
                  </a> </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 mgbt-sm-15">
                <div class="vd_status-widget vd_bg-red  widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu --> 
                  
                  <a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="icon-bars"></i> </span> <span class="menu-value"> 10% </span> </div>
                  <div class="menu-text clearfix"> Average Gross Margin </div>
                  </a> </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 mgbt-xs-15">
                <div class="vd_status-widget vd_bg-blue widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu --> 
                  
                  <a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="fa fa-comments"></i> </span> <span class="menu-value"> 108 </span> </div>
                  <div class="menu-text clearfix"> Product Reviews </div>
                  </a> </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 mgbt-xs-15">
                <div class="vd_status-widget vd_bg-yellow widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu --> 
                  
                  <a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="fa fa-power-off"></i> </span> <span class="menu-value"> 10 </span> </div>
                  <div class="menu-text clearfix"> Disabled Products </div>
                  </a> </div>
              </div>
            </div>
            <div class="row">
                                    <div class="col-md-12">
              <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Advance Search</h3>
                  </div>
                  <div class="panel-body table-responsive">
                  <form action="" method="post">
                     <div class="col-md-12 marg">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="email">Pruduct Name:</label><br>
                        <input type="text" name="pname" class="form-control" id="email">
                      </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                        <label for="pwd">Product ID:</label><br>
                        <input type="text" name="pid" class="form-control" id="pwd">
                      </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                        <label for="pwd">Date:</label><br>
                        <input type="date" name="pdate" class="form-control" id="pwd">
                      </div>
                    </div>
                     <div class="col-md-3">
                       <div class="form-group">
                        <label for="pwd">Vendor Name:&nbsp;</label><br>
                        <input type="text" name="vname" class="form-control" id="pwd">
                      </div>
                    </div>
                  </div>
                    
                     <div class="col-md-12 marg">
                    
                     <div class="col-md-3">
                       <div class="form-group">
                        <label for="pwd">Vendor ID:</label>
                        <input type="text" name="vid" class="form-control" id="pwd">
                      </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                        <label for="pwd">Main Category:</label><br>
                        <select name="pcate" class="form-control">
                        <option value="">select</option>
                        <option value="Boys">Boys</option>
                        <option value="Girls">Girls</option>
                        </select>
                        
                      </div>
                    </div>

                     <div class="col-md-3">
                      
                      <div class="form-group">
                        <label for="pwd">Quantity:&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</label><br>
                        <input type="number" name="pquan" class="form-control" id="pwd">
                      </div>
                      </div>


                       <div class="col-md-3">
                       <br>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div> 
                   
                    </form>
                  </div>
              </div>
              </div>

              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Available Uniform</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                       <thead>
                        <tr>
                          <th>S.No.</th>
                          
                          <th>Date</th>
                          <th>Product ID</th>
                          
                          <th>Image</th>
                           <th>Title</th>
                           <th>Quantity</th>
                          <th>Vendor Name</th>
                          <th>Price</th>

                         
                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                         <?php $i=1;foreach($fab as $uni){?>
                        <tr class="gradeA">
                          <td align="center"><?php echo $i;?></td>
                          <td class="center"><?php echo $uni->padddate;?></td>
                          <td class="center"><?php echo 'PUMD-'.$uni->uniform_id;?></td>
                         
                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/uniform/<?php echo $uni->uniform_image;?>" /></td>
                          <td><?php echo $uni->school_name;?></td>
                          <td><?php echo $uni->quantity;?></td>
                          <td>
                           <?php echo $uni->vendor_name."&nbsp"; ?><br><?php if(!empty($uni->vendor_id)){echo 'VMD-'.$uni->vendor_id;}else{echo 'Admin\' product';} ?>
                           </td>
                          <td><i class="fa fa-inr"></i><?php echo $uni->price;?></td>
                          <td>
                          <a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/Product/uniform_status/<?php echo $uni->uniform_id;?>"><i class="fa fa-edit"></i></a> 
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" id="<?php echo $uni->uniform_id;?>" type="button"><i class="fa fa-trash-o"></i></button></td>
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

<link rel="stylesheet" href="https://craftpip.github.io/jquery-confirm/demo/libs/bundled.css">
    <link rel="stylesheet" type="text/css" href="https://craftpip.github.io/jquery-confirm/css/jquery-confirm.css"/>
    <script src="https://craftpip.github.io/jquery-confirm/demo/libs/bundled.js"></script>
    <script type="text/javascript" src="https://craftpip.github.io/jquery-confirm/js/jquery-confirm.js"></script>

<script>	
					$(document).ready(function(){ 
						/*$(".del_fabric").click(function(){
							var fid=$(this).attr('id');
							$(this).closest("tr").remove();
							$.ajax({
							 type: "POST",
							 url: '<?php echo base_url();?>index.php/Vendor/del_uniform',
							 data: {fid:fid},
							 success: function(response){
								 //alert(response);
							 }
							 });
						});*/
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
                                          //console.log(sid);
                                          thisvari.closest("tr").remove();
                                          $.ajax({
                                           type: "POST",
                                           url: '<?php echo base_url();?>index.php/Product/del_uniform',
                                           data: {fid:sid},
                                           success: function(response){
                                             //alert(response);
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