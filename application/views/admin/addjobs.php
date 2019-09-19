<style>
.active50
{
	background-color:#1fae66 !important;
}
</style>


<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>datepickers/css/bootstrap-datetimepicker.min.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>



<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">  
<style>
	
						.form-wizard .nav > li > a{padding: 10px; margin-right:0; text-align: left; color:#888888;}
                        .tab-right{margin-left:0px; margin-top:0px; }
						.tab-right .panel {margin-right:-30px;}
						.tab-right .vd_panel-menu {right: 28px; top: -15px;}	
						.tab-right h3{border-bottom:1px solid #EEEEEE;}	
						table .vd_radio label:after{top:0;}		 
	 
	 	
		</style>
	    
    <!-- for specific page responsive in style css -->
    		<style>
	
						@media (max-width: 767px) {
							.tab-right{margin-left:0; margin-top:0;}
							.tab-right .panel{margin-right: 0;}

						}	
		
		</style>
      
        
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1><?php if($this->uri->segment(3)){echo "Edit Jobs";}else{echo "Add Jobs";}?></h1>
             <!-- <small class="subtitle">Ecommerce Pages: Add Product</small>-->
             
              <div class="vd_panel-menu visible-xs">
                <div class="menu">
                  <div data-action="click-trigger"> <span class="menu-icon mgr-10"><i class="fa fa-bars"></i></span>Menu <i class="fa fa-angle-down"></i> </div>
                  <div data-action="click-target" class="vd_mega-menu-content width-xs-2 left-xs" style="display: none;">
                    <div class="child-menu">
                      <div class="content-list content-menu">
                        <ul class="list-wrapper pd-lr-10">
                          <li> <a href="#">
                            <div class="menu-icon"><i class="fa fa-search"></i></div>
                            <div class="menu-text">Preview</div>
                            </a> </li>
                          <li> <a href="#">
                            <div class="menu-icon"><i class="fa fa-copy"></i></div>
                            <div class="menu-text">Duplicate</div>
                            </a> </li>
                          <li> <a href="#">
                            <div class="menu-icon"><i class="fa fa-money"></i></div>
                            <div class="menu-text">Product Sales</div>
                            </a> </li>
                          <li> <a href="#">
                            <div class="menu-icon"><i class="fa fa-trash-o"></i></div>
                            <div class="menu-text">Delete</div>
                            </a> </li>
                          <li> <a href="#">
                            <div class="menu-icon"><i class="fa fa-support"></i></div>
                            <div class="menu-text">Help</div>
                            </a> </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- menu --> 
              </div>
            </div>
          </div>
          

          <div class="vd_content-section clearfix" id="ecommerce-product-add">
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-12">
                <div class="form-wizard condensed mgbt-xs-20">
                  <ul class="nav nav-tabs nav-stacked">
                    <li class="active"><a href="#tabinfo" data-toggle="tab"> <i class="fa fa-info-circle append-icon"></i> Jobs </a></li>
                   
                  
                  </ul>
                </div>
              </div>
              <div class="col-sm-12 col-md-8 col-lg-12 tab-right">
                <div class="panel widget panel-bd-left light-widget">
                  <div class="panel-heading no-title"> </div>
                  <div  class="panel-body">
                    <div class="tab-content no-bd mgbt-xs-20">
                      <div id="tabinfo" class="tab-pane active">
                      <?php 
					   if($this->uri->segment(3)){
						   $edit=$this->db->get_where("tbl_vacancy",array("vac_id"=>$this->uri->segment(3)))->row();
						  // print_r ($edit);
						   //die;
						   
						    $q = $this->db->get_where('tbl_vacancy',array('vac_id'=>$this->uri->segment(3)));
							$data['edit'] = $q->result();						   
							foreach($data['edit'] as $res)
							{
								$state_id = $res->state_id;
								$city_id = $res->city_id;
								$cat_id = $res->cat_id;
								$job_type = $res->job_type;
                $allcities = $this->db->get_where("cities where state_id =  '$state_id'");
      $cities = $allcities->result();
							}						   
						   
						   
						   echo form_open_multipart("Product/editvacancy/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                           
                          <h3 class="mgtp-15 mgbt-xs-20"> <b class="text-info"></b> </h3>
                          <div class="form-group">                            
                          <div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Select Job Category</span></label>
                                <div class="col-lg-9">
                                      <div class="vd_radio radio-success">
                                            <select name="cat_id" required>
                                            <option value="">Select  Category</option>
											<?php
                                                foreach($cats as $all)
                                                {								
                                            ?>                                            
                                                 <option <?php if($all->cat_id == $cat_id) { ?> selected="selected" <?php } ?> value="<?php echo $all->cat_id;?>"><?php echo $all->cat_name;?></option>
                                            <?php } ?>
                                            </select>
                                      </div>
                                </div>
                          </div>        
                         <div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Job Type</span></label>
                            <div class="col-lg-9">
                                  <div class="vd_radio radio-success">
                                        <select name="job_type" required>
                                        <option value="">Select  Job Type</option>
                                            <option value="Full Time" <?php if($job_type == 'Full Time') { ?> selected="selected" <?php } ?> >Full Time</option>
                                            <option value="Part Time" <?php if($job_type == 'Part Time') { ?> selected="selected" <?php } ?> >Part Time</option>
                                        </select>
                                  </div>
                            </div>      
                         </div>                                                           
                          <div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Job Title</span></label>
                                <div class="col-lg-9">
                                      <div class="vd_radio radio-success">
                                            <input type="text" class="form-control" name="job_title" value="<?php echo $edit->job_title; ?>"/>
                                      </div>
                                </div>
                          </div>
                          <div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Job Description</span></label>
                                <div class="col-lg-9">
                                      <div class="vd_radio radio-success">
                                            <textarea class="form-control" name="job_desc" id="editor1" placeholder="Enter job description" ><?php echo  $edit->job_desc;?></textarea>
                                      </div>
                                </div>
                          </div> 
                          
                          <div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Expire Date</span></label>
                                <div class="col-lg-9">
                                      <div class="vd_radio radio-success">
                                              <div class='input-append' id='datetimepicker4'>
                                                <input data-format='yyyy-MM-dd' type='text'  class="form-control" value="<?php  echo $edit->expire_date;?>" name="expire_date" style="width:250px;"/>
                                                <span class='add-on'>
                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                </span>
                                              </div>
                                      
                                      </div>
                                </div>
                          </div>     
                                                   
                          <div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Select State</span></label>
                                <div class="col-lg-9">
                                      <div class="vd_radio radio-success">
                                            <select name="state_id" id="state_id" >
                                            <option value="">Select  State</option>
											<?php
                                                foreach($states as $all)
                                                {								
                                            ?>                                            
                                                <option <?php if($all->id == $state_id) { ?> selected="selected" <?php } ?> value="<?php echo $all->id;?>"><?php echo $all->name;?></option>
                                            <?php } ?>
                                            </select>
                                      </div>
                                </div>
                          </div>
                          <span id="append_city">
                            <div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Select City</span></label>
                                <div class="col-lg-9">
                                      <div class="vd_radio radio-success">
                                            <select name="city_name">
                                            <option value="">Select  City</option>
                      <?php
                                                foreach($cities as $all)
                                                {               
                                            ?>                                            
                                                 <option <?php if($all->id == $city_id) { ?> selected="selected" <?php } ?> value="<?php echo $all->id;?>"><?php echo $all->name;?></option>
                                            <?php } ?>
                                            </select>
                                      </div>
                                </div>
                          </div> 
                          </span>
                                                
                            
                          </div>
                           <div class="col-md-9" align="center">
                            <div> 
                            <button type="submit" name="testimonial" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Update Changes</button> 
                            <a  href="<?php echo base_url();?>index.php/product/addjobcat" class="btn btn-default btn-sm">
                            <i class="fa fa-times append-icon"></i> Cancel Changes</a> 
                            </div>
                          </div>
                           <?php echo form_close();
					   }
					   else
					   {
					      echo form_open_multipart("Product/addvacancy",array("class"=>"form-horizontal"));
						  ?>
                          
                          <h3 class="mgtp-15 mgbt-xs-20">Add Jobs</h3>      
                          <div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Select Job Category</span></label>
                                <div class="col-lg-9">
                                      <div class="vd_radio radio-success">
                                            <select name="cat_id" required>
                                            <option value="">Select  Category</option>
											<?php
                                                foreach($cats as $all)
                                                {								
                                            ?>                                            
                                            	<option value="<?php echo $all->cat_id;?>"><?php echo $all->cat_name;?></option>
                                            <?php } ?>
                                            </select>
                                      </div>
                                </div>
                          </div>     
                         <div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Job Type</span></label>
							<div class="col-lg-9">
                                  <div class="vd_radio radio-success">
                                        <select name="job_type" required>
                                        <option value="">Select  Job Type</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                        </select>
                                  </div>
                            </div>                                     
                       </div>                                  
                         <div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Job Title</span></label>
                                <div class="col-lg-9">
                                      <div class="vd_radio radio-success">
                                            <input type="text" class="form-control" name="job_title" placeholder="Enter job title"  required/>
                                      </div>
                                </div>
                          </div>
                         <div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Job Description</span></label>
                                <div class="col-lg-9">
                                      <div class="vd_radio radio-success">
                                            <textarea class="form-control" name="job_desc" id="editor1" placeholder="Enter job description"  required></textarea>
                                      </div>
                                </div>
                          </div>        
						<div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Expire Date</span></label>
                                <div class="col-lg-9">
                                      <div class="vd_radio radio-success">
                                              <div class='input-append' id='datetimepicker4'>
                                                <input data-format='yyyy-MM-dd' type='text'  class="form-control"  style="width:250px;" id='datetimepicker4' name="expire_date"/>
                                                <span class='add-on'>
                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                </span>
                                              </div>
                                      
                                      </div>
                                </div>
                          </div>                                                                        
                          <div class="form-group">
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Select State</span></label>
                                <div class="col-lg-9">
                                      <div class="vd_radio radio-success">
                                            <select name="state_id" id="state_id" required>
                                            <option value="">Select  State</option>
											<?php
                                                foreach($states as $all)
                                                {								
                                            ?>                                            
                                            	<option value="<?php echo $all->id;?>"><?php echo $all->name;?></option>
                                            <?php } ?>
                                            </select>
                                      </div>
                                </div>
                          </div>
                          <span id="append_city">
                            
                          </span>
                          <!-- <div class="form-group" >
                                <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Select City</span></label>
                                <div class="col-lg-9">
                                      <div class="vd_radio radio-success">
                                            <select name="city_id" required>
                                            <option value="">Select  City</option>
											<?php
                                                foreach($cities as $all)
                                                {								
                                            ?>                                            
                                            	<option value="<?php echo $all->id;?>"><?php echo $all->name;?></option>
                                            <?php } ?>
                                            </select>
                                      </div>
                                </div>
                          </div>   -->     
                          <div class="col-md-7" align="center">
                            <div> 
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Add Jobs</button> 
                            </div>
                          </div>                   
                        <?php echo form_close();}?>
                      </div>
                      <!-- #tabinfo -->
                    
                    </div>
                    <!-- tab-content --> 
                    
                  </div>
                  <!-- panel-body --> 
                  
                  <!-- form-horizontal --> 
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-sm-12--> 
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

<!-- /.modal -->


<!-- /.modal -->

<!-- Footer Start -->
  <footer class="footer-1"  id="footer">      
    <div class="vd_bottom ">
        <div class="container">
            <div class="row">
              <div class=" col-xs-12">
                <div class="copyright">
                  	Copyright &copy;2016 MobileDarji. All Rights Reserved 
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
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/tagsInput/jquery.tagsinput.min.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/daterangepicker/moment.min.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/daterangepicker/daterangepicker.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/colorpicker/colorpicker.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/ckeditor/ckeditor.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/ckeditor/adapters/jquery.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/bootstrap-wysiwyg/js/wysihtml5-0.3.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/bootstrap-wysiwyg/js/bootstrap-wysihtml5-0.0.2.js"></script>
  <script>
        $(document).on('change','#state_id',function(){
           var city_id = $(this).val();
          $.ajax({
              type : "POST",
              url : "<?php echo base_url();?>index.php/product/ajax_city",
              data : {city_id:city_id},
              success: function(data){
               //alert(data);
                if(data)
                $("#append_city").html(data);
            }
          });
      });
  </script>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'editor1', {
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '.<?php echo base_url();?>./' );
</script>
<script type="text/javascript">

$(window).load(function() 
{
	"use strict";



	//CKEDITOR.replace( $('[data-rel^="ckeditor"]') );
	$( '[data-rel^="ckeditor"]' ).ckeditor();


	$( '#imageTable tbody' ).sortable({
		placeholder: "warning",
		helper: function(e, ui) {
			ui.children().each(function() {
				$(this).width($(this).width());
				$(this).css('background','rgba(255,255,255,.6)');
			});
			return ui;
		},				
		stop: function(e, ui) {
			$( '#imageTable tbody' ).children().each(function() {
				var object=$(this);
				object.children('.pointer').html(object.index()+1);
			});

		}
		}).disableSelection();
		

	
	$('.save-btn').click(function(e) {
		var object= $(this);
		object.addClass('disabled');
        object.prepend('<i id="save-spinner" class="fa fa-spinner fa-spin append-icon"></i>');	
		object.children('.fa-save').remove();
		setTimeout(function(){
			object.children('.fa-spinner').remove();
			object.removeClass('disabled');
			object.prepend('<i class="fa fa-save append-icon"></i>');
			notification('topright', 'success', 'fa fa-check-circle vd_green', 'Save Successfully', 'Your has setting is saved successfully')			
			},2000)	 
		; 
    });
	
	$('#add-price-btn').click(function(e) {
		var option_value = $("#addPriceModal #option-combination").val();
		var price_value = $("#addPriceModal #price-combination").val();		
		var check_value = $('#addPriceModal #enable-combination').bootstrapSwitch('state') ? '<i class="fa fa-check vd_green"></i>' : '<i class="fa fa-times vd_grey"></i>';	
		var menu_value = $('#addPriceModal #enable-combination').bootstrapSwitch('state') ? 	'<a data-original-title="Disabled" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_green"> <i class="fa fa-power-off"></i> </a>' : '<a data-original-title="Enabled" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_grey"> <i class="fa fa-power-off"></i> </a>'
		$('#specific_price_table tbody').append('<tr>' + '<td>' + option_value +'</td>\
                                <td>$' + price_value + '</td>\
                                <td class="text-center">' + check_value + '</td>\
                                <td class="menu-action">' + menu_value + ' <a data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_yellow"> <i class="fa fa-pencil"></i> </a> <a data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_red"> <i class="fa fa-times"></i> </a></td>\
                              </tr>' + '</tr>');
		$('[data-toggle^="tooltip"]').tooltip();							  
							  
		$('#addPriceModal').modal('hide');							  
		
	});
	
	// count down on meta keyword/description text size
	
	function countDown($source, $target) {
		var max = $source.attr("data-maxchar");
		$target.html(max-$source.val().length);
	
		$source.keyup(function(){
			$target.html(max-$source.val().length);
		});
	}
	

	
		countDown($("#meta_title_1"), $("#meta_title_1_counter"));
		countDown($("#meta_description_1"), $("#meta_description_1_counter"));

})
</script>

<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="../blueimp.github.io/JavaScript-Load-Image/js/load-image.min.html"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="../blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */

$(function () {
    'use strict';

    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'plugins/jquery-file-upload/server/php/',
        uploadButton = $('<button/>')
            .addClass('btn vd_btn vd_bg-blue')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            }); 
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 5000000, // 5 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index, file) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
			

});
</script>
<script type="text/javascript">

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

<script type='text/javascript'>
	$(function() 
	{
	$('#datetimepicker4').datetimepicker({
	pickTime: false
	});
});
</script>      


<script type="text/javascript" src="<?php echo base_url();?>datepickers/js/bootstrap-datetimepicker.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>datepickers/js/bootstrap-datetimepicker.pt-BR.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>

</body>

<!-- Mirrored from vendroid.venmond.com/pages-ecommerce-product-add.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2016 11:26:07 GMT -->
</html>