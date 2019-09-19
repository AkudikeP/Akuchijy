<style>
.active21
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
              <h1>Listing All Coupons  <button class="btn btn-info btn-xs pull-right" id="show">Add New Coupon</button></h1>
             </div>
          </div>
          <div class="vd_content-section example-icon clearfix">
            <div class="row">
              <div class="vd_pricing-table">
               	<div class="col-md-4" id="tform" <?php  if(!$this->uri->segment(3)){?> style="display:none;" <?php }?>>
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Add/Edit Coupon</h3>

                  </div>
                  <div class="panel-body table-responsive">
                     <?php
				  if($this->uri->segment(3))
					{
						$cedit=$this->db->get_where("coupons",array("id"=>$this->uri->segment(3)))->row();
						echo form_open_multipart("product/add_coupon/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Code</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="code"  value="<?php echo $cedit->code;?>" type="text" required placeholder="Coupon Code">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="title"  value="<?php echo $cedit->title;?>" type="text" required placeholder="Title">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-9 controls">
                        <select class="tailor" name="type">
                 			<option value="">Select Type</option>
                   			<option value="Percent" <?php if($cedit->distype=="Percent"){echo "selected";}?>>Percent</option>
                            <option value="Amount" <?php if($cedit->distype=="Amount"){echo "selected";}?>>Amount</option>
                      </select>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="col-sm-3 control-label">Value</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="value" value="<?php echo $cedit->disvalue;?>" type="text" required placeholder="Coupon Value">
                        </div>
                      </div>
											<div class="form-group">
											 <label class="col-sm-3 control-label">Start Date</label>
											 <div class="col-sm-9 controls">
												 <input class="" name="from_date" value="<?php echo $cedit->from_date;?>" type="date" required >
											 </div>
										 </div>
										 <div class="form-group">
											<label class="col-sm-3 control-label">End Date</label>
											<div class="col-sm-9 controls">
												<input class="" name="to_date" value="<?php echo $cedit->to_date;?>" type="date" required >
											</div>
										</div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9 controls">
                        <textarea class="" name="desc" rows="2" placeholder="Description"><?php echo $cedit->desc;?></textarea>
                        </div>
                      </div>



                      <div class="form-group">

                      <label class="col-sm-3 control-label">Image</label>

                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Image</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile">
                     <input type="hidden" name="oldt" value="<?php echo $cedit->image;?>" />
                <img class="img img-responsive" src="<?php echo base_url();?>assets/tailors/<?php echo $cedit->image;?>" />
                    </span></div>

                    </div>
                      <div class="col-sm-12 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Update Coupon</button>
                       <a href="<?php echo base_url();?>product/manage_coupons" class="btn btn-default">Cancel</a>
                    </span></div>

                    <?php echo form_close();
					}
					else
					{
				  echo form_open_multipart("product/add_coupon",array("class"=>"form-horizontal"));?>

                      <div class="form-group">
                        <label class="col-sm-3 control-label">Code</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="code" type="text" required placeholder="Coupon Code">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="title" type="text" required placeholder="Title">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-9 controls">
                        <select class="tailor" name="type">
                 			<option value="">Select Type</option>
                   			<option value="Percent">Percent</option>
                            <option value="Amount">Amount</option>
                      </select>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="col-sm-3 control-label">Value</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="value" type="text" required placeholder="Coupon Value">
                        </div>
                      </div>
											<div class="form-group">
											 <label class="col-sm-3 control-label">Start Date</label>
											 <div class="col-sm-9 controls">
												 <input class="" name="from_date" value="<?php echo $cedit->from_date;?>" type="date" required >
											 </div>
										 </div>
										 <div class="form-group">
											<label class="col-sm-3 control-label">End Date</label>
											<div class="col-sm-9 controls">
												<input class="" name="to_date" value="<?php echo $cedit->to_date;?>" type="date" required >
											</div>
										</div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9 controls">
                        <textarea class="" name="desc" rows="2" placeholder="Description"></textarea>
                        </div>
                      </div>



                      <div class="form-group">

                      <label class="col-sm-3 control-label">Image</label>

                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Image</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile" multiple>
                    </span></div>

                    </div>
                      <div class="col-sm-12 controls">
                       <button type="submit" name="submit" class="btn btn-primary btn-block">Add Coupon</button>
                    </span></div>
                    <?php echo form_close();}?>
                  </div>
                </div>
                <!-- Panel Widget -->
              </div>
               <?php foreach($coupons as $coupon){?>
                <div class="col-md-4">
                  <div class="plan">
                    <div class="plan-header vd_bg-green vd_white text-center vd_info-parent">
                      <h3 class="pd-20 mgbt-xs-0"><?php echo $coupon->code;?></h3>
                      <div class="price vd_bg-black-30"> <span class="main"><span class="font-light"><?php if($coupon->distype!="Percent"){echo "<i class='fa fa-inr'></i> ";}?></span><span class="font-bold"><?php echo $coupon->disvalue;if($coupon->distype=="Percent"){echo "%";}?></span> </span> <span class="suffix">Off</span> <span class="text"></span> </div>
                      <i class="caret-pos fa fa-caret-up vd_white"></i> </div>
                    <div class="features vd_bg-white font-sm content-list">
                      <ul class="list-wrapper">
                        <li><i class="glyphicon glyphicon-hdd mgr-10"></i> <b><?php echo $coupon->title;?></b></li>
                        <li><p style="font-size:14px;"><?php echo $coupon->desc;?></p></li>
                        <li><i class="fa fa-calender-o mgr-10"></i> <b><?php echo date("d M Y",strtotime($coupon->valid));?></b></li>
                        <li><img class="img img-responsive" src="<?php echo base_url();?>assets/tailors/<?php echo $coupon->image;?>" /></li>
                      </ul>
                      <br/>
                      <div class="pd-20 text-center">

                      <a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning" href="<?php echo base_url();?>product/manage_coupons/<?php echo $coupon->id;?>"><i class="fa fa-edit"></i></a>
                       <a data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger del_coupon" id="<?php echo $coupon->id;?>"><i class="fa fa-trash-o"></i></a>
                       <?php if($coupon->status=='enable'){
                              echo"<button data-toggle='tooltip' title='Enable' class='btn btn-xs btn-success services_disable' id='$coupon->id'><i class='fa fa-lightbulb-o'></i></button>";
                              }else{
                                echo "<button data-toggle='tooltip' title='Disable' class='btn btn-xs btn-danger services_enable' id='$coupon->id'><i class='fa fa-lightbulb-o'></i></button>";
                                } ?>
                      </div>
                    </div>
                  </div>
                </div>
               <?php }?>


              </div>
              <!-- vd_pricing-table -->

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
                                 $(".del_coupon").click(function(){

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
               url: '<?php echo base_url();?>index.php/product/coupon_del',
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
               url: '<?php echo base_url();?>index.php/Product/coupons_disable',
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
               url: '<?php echo base_url();?>index.php/Product/coupons_enable',
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

					$("#show").click(function(){
						$("#table").toggleClass("col-md-8","col-md-12");
						$("#tform").toggle();
					});
//						$(".tailor_del").click(function(){
//							var tid=$(this).attr('id');
//							$(this).closest("tr").remove();
//							$.ajax({
//							 type: "POST",
//							 url: '<?php //echo base_url();?>index.php/product/tailor_del',
//							 data: {tid:tid},
//							 success: function(response){
//								 //alert(response);
//							 }
//							 });
//						});
//
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
