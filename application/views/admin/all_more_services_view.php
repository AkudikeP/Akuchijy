
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
              <h1>Listing All More Services</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
          
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
                       <br>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div> 
                   
                    </form>
                  </div>
              </div>
              </div>
              <div class="pull-left col-md-12">
<a href="<?php echo base_url(); ?>product/excel_more"><button class="btn btn-primary">Excel</button></a>
<a href="<?php echo base_url(); ?>product/download_pdf_more"><button class="btn btn-primary">Pdf</button></a>

      </div> 
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Available More Services</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Date</th>
                          <th>Product&nbspID</th>
                          <th>Image</th>
                          
                          <th>Title</th>
                          <th>Vendorname(ID)</th>
                          <th>Price</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                       
                         <?php $i=1;foreach($fab as $fab){?>
                        <tr class="gradeA">
                          <td align="center"><?php echo $i;?></td>
                          <td class="center"></td>
                          <td class="center"><?php echo '&nbspPMMD-'.$fab->id;?></td>
                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/more_services/resized_more_services/small/<?php echo $fab->image;?>" /></td>
                         
                          <td width="200px;"><?php echo $fab->subcategory;?></td>
                          <td class="center"><?php echo $fab->vendor_name."&nbsp"; ?><?php if(!empty($fab->vendor_id)){echo 'VMD-'.$fab->vendor_id;}else{echo 'Admin\' product';} ?></td>
                          <td><i class="fa fa-inr"></i><?php echo $fab->price;?></td>
                          </td>
                          <td>
                          <a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/product/more_services/<?php echo $fab->id;?>"><i class="fa fa-edit"></i></a> 
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_more_service" id="<?php echo $fab->id;?>" type="button"><i class="fa fa-trash-o"></i></button>
                          <?php if($fab->status_enable=='enable'){
                              echo"<button data-toggle='tooltip' title='Enable' class='btn btn-xs btn-success services_disable' id='$fab->id'><i class='fa fa-lightbulb-o'></i></button>";
                              }else{
                                echo "<button data-toggle='tooltip' title='Disable' class='btn btn-xs btn-danger services_enable' id='$fab->id'><i class='fa fa-lightbulb-o'></i></button>";
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
<link rel="stylesheet" href="https://craftpip.github.io/jquery-confirm/demo/libs/bundled.css">
    <link rel="stylesheet" type="text/css" href="https://craftpip.github.io/jquery-confirm/css/jquery-confirm.css"/>
    <script src="https://craftpip.github.io/jquery-confirm/demo/libs/bundled.js"></script>
    <script type="text/javascript" src="https://craftpip.github.io/jquery-confirm/js/jquery-confirm.js"></script>

<script>	
					$(document).ready(function(){ 
						

                     $(".del_more_service").click(function(){
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
                                           url: '<?php echo base_url();?>index.php/Product/del_more_service',
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
               url: '<?php echo base_url();?>index.php/Product/more_services_disable',
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
               url: '<?php echo base_url();?>index.php/Product/more_services_enable',
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