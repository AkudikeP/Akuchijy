<style>
.active9
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
              <h1> All Uniforms</h1>
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
                        <label for="email">Product Name:</label><br>
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

 <div class="pull-left col-md-12">
<a href="<?php echo base_url(); ?>product/excel_uniform"><button class="btn btn-primary">Excel</button></a>
<a href="<?php echo base_url(); ?>product/download_pdf_uniform"><button class="btn btn-primary">Pdf</button></a>

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
                           <th>Product&nbspID</th>
                          <th>Date</th>
                          <th>Image</th>
                          <th>SKU</th>
                          <th>Vendorname(ID)</th>
                          <th>Main Category</th>
                          <th>School Name</th>
                           <th>Quantity</th>
                            <th>In Stock Quantity</th>
                          <th>Price</th>
                          <th>Discount Price</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                       
                         <?php $i=1;foreach($uni as $uni){?>
                        <tr class="gradeA">
                          <td align="center"><?php echo $i;?></td>
                          <td class="center"><?php echo 'PUMD-'.$uni->uniform_id;?></td>
                          <td class="center"><?php echo $uni->padddate; ?></td>
                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/uniform/<?php echo $uni->uniform_image;?>" /></td>
                          <td class="center"><?php echo $uni->SKU; ?></td>
                          <td class="center"><?php echo $uni->vendor_name; ?><br><?php if(!empty($uni->vendor_id)){ echo 'VMD-'.$uni->vendor_id;}else{echo 'Admin\' product';} ?></td>
                          <td class="center"><?php echo $uni->uni_category; ?></td>
                          <td class="center"><?php echo $uni->school_name; ?></td>
                           <td><?php echo $uni->quantity;?></td>
                           <td></i><?php  $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$uni->uniform_id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($uni->school_name)).'"')->row()->qty;
                         
                          $qty = $uni->quantity;
                          echo (int)$qty-(int)$count;?></td>
                          <td><i class="fa fa-inr"> </i><?php echo $uni->price;?></td>
                          <td><?php

            $current_date=date('Y-m-d');
           
            if(($current_date>=$uni->from_date) AND ($current_date<=$uni->to_date)){
            ?>

            <?php if($uni->offer_type=='Percentage')
              {
                $value = 100 - $uni->offer_price;
                echo $x='<i class="fa fa-inr"></i>'.round(($uni->price/100)*$value);
                
              }
              elseif($uni->offer_type=='Amount')
              {
                $value = $uni->offer_price;
                echo $x='<i class="fa fa-inr"></i>'.round($uni->price - $value);
            
              }

            }
            else
              {
                echo "-"; //echo $x=$uni->price;
              }
            ?>
            </td>
                          <td>
                          <a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/product/add_uniform/<?php echo $uni->uniform_id;?>"><i class="fa fa-edit"></i></a> 
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" id="<?php echo $uni->uniform_id;?>" type="button"><i class="fa fa-trash-o"></i></button>
                          <?php if($uni->status_enable=='enable'){
                              echo"<button data-toggle='tooltip' title='Enable' class='btn btn-xs btn-success services_disable' id='$uni->uniform_id'><i class='fa fa-lightbulb-o'></i></button>";
                              }else{
                                echo "<button data-toggle='tooltip' title='Disable' class='btn btn-xs btn-danger services_enable' id='$uni->uniform_id'><i class='fa fa-lightbulb-o'></i></button>";
                                } ?>
                                </td>
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
<link rel="stylesheet" href="<?php echo base_url();?>adminassets/css/bundled.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/jquery-confirm.css"/>
    <script src="<?php echo base_url();?>adminassets/js/bundled.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery-confirm.js"></script>
<script>	

					$(document).ready(function(){ 
                                                                        $(".services_disable").click(function(){
        //alert('yes');
         var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to disable this?',
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
                                       thisvari.removeClass("btn-success");
                                       thisvari.addClass("btn-danger");
                                        $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Product/uniform_disable',
               data: {sid:sid},
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

      $(".services_enable").click(function(){
                 var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to enable this?',
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
                                       thisvari.removeClass("btn-danger");
                                       thisvari.addClass("btn-success");
                                        $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Product/uniform_enable',
               data: {sid:sid},
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
               url: '<?php echo base_url();?>index.php/product/del_uniform',
               data: {fid:sid},
               success: function(response){
                 //console.log(response);
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
						/*$(".del_fabric").click(function(){
							var fid=$(this).attr('id');
							$(this).closest("tr").remove();
							$.ajax({
							 type: "POST",
							 url: '<?php //echo base_url();?>index.php/product/del_uniform',
							 data: {fid:fid},
							 success: function(response){
								 //alert(response);
							 }
							 });
						});*/
					
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


</body>
</html>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
       var jqNew = jQuery.noConflict();
    jqNew(document).ready(function() {

        "use strict";
      
        jqNew("#data-tables1").dataTable();
    } );
</script>