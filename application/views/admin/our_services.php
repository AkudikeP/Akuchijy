<style>
.active32
{
  background-color:#1fae66 !important;
}
.vd_body{
  float: initial !important;
    width: initial !important;
    overflow: initial !important;
}
</style>

<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">  
<style>
	
						.form-wizard .nav > li > a{padding: 10px; margin-right:0; text-align: left; color:#888888;}
                        .tab-right{margin-left:-0px; margin-top:0px; }
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
              <h1><?php if($this->uri->segment(3))
			  
			  
			  {
				   $edit=$this->db->get_where("services",array("service_id"=>$this->uri->segment(3)))->row();
				  
				   echo "Edit ".$title;}else{echo "Add ".$title;}?></h1>
            </div>
          </div>
          

          <div class="vd_content-section clearfix" id="ecommerce-product-add">
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-12">
                <div class="form-wizard condensed mgbt-xs-20">
                  <ul class="nav nav-tabs nav-stacked">
                    <li class="active"><a href="#tabinfo" data-toggle="tab"> <i class="fa fa-info-circle append-icon"></i> Products </a></li>                  
                  </ul>
                </div>
              </div>

              <div class="col-sm-12 col-md-8 col-lg-12 tab-right">
               <?php 
             if($this->uri->segment(3)){
               $edit=$this->db->get_where("our_services",array("service_id"=>$this->uri->segment(3)))->row();
               echo form_open_multipart("Product/o_s_stitch/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                <div class="panel widget panel-bd-left light-widget">
                  <div class="panel-heading no-title"> </div>
                  <div  class="panel-body">
                    <div class="tab-content no-bd mgbt-xs-20">
                      <div id="tabinfo" class="tab-pane active">
                       
                             <div class="vd_panel-menu">
                            <div>  
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Update Changes</button>                            
                            <a  href="<?php echo base_url();?>index.php/product/altration" class="btn btn-default btn-sm">
                            <i class="fa fa-times append-icon"></i> Cancel Changes</a> 
                            </div>
                          </div>
                          <h3 class="mgtp-15 mgbt-xs-20"> <b class="text-info"></b> </h3>
                           <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Main Heading </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <input type="text" name="title" class="form-control" value="<?php echo $edit->title;?>" />
                                </div>
                                
                                <!-- col-lg-9 --> 
                              </div>
                            </div>
                          </div>
                         <div class="form-group">
                            <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Description </span></label>
                            <div class="col-lg-9">
                              <div class="vd_radio radio-success">
                            
                             <textarea name="description"  id="" class="form-control" rows="3"><?php echo $edit->description;?></textarea>
                              </div>
                             
                            </div>
                          </div>

                           <div class="form-group">
                            <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Type </span></label>
                            <div class="col-lg-9">
                              <?php echo $edit->type; ?>                             
                            </div>
                          </div>
                          
                           <?php $count = $this->db->get('mcategory')->result(); foreach ($count as $value) {
                       
                       ?>
                          <div class="form-group">
                            <label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Add Images </span> </label>
                            <div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span> Category <?php echo $value->mcat_name; ?> </span> 
                            <?php echo $mname = $value->mcat_name ?>
                              <!-- The file input field used as target for the file upload widget -->
                              <input type="hidden" name="old_service_<?php echo $value->mcat_name ?>" value="<?php echo $edit->$mname; ?>">
                              <input type="file" name="service_<?php echo $value->mcat_name ?>" id="fileuploadalt">
                              </span>                               
                            </div>                            
                          </div>
<?php } ?>

                          <!-- form-group -->
                           <?php echo form_close();
						   
						   
					   }else{
					   
					   /*echo form_open_multipart("Product/o_s_stitch",array("class"=>"form-horizontal"));?>
                        
                          <h3 class="mgtp-15 mgbt-xs-20"><?php echo $title; ?></h3>
                          <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures">  Main Heading </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <input type="text" name="title" class="form-control" required="" />
                                </div>
                                
                                <!-- col-lg-9 --> 
                              </div>
                            </div>
                          </div>
                         <div class="form-group">
                            <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Description </span></label>
                            <div class="col-lg-9">
                              <div class="vd_radio radio-success">                            
                             <textarea name="service_description"  id="" class="form-control" rows="3" required=""></textarea>
                              </div>                             
                            </div>
                          </div>
                            <div class="form-group">
                            <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Type </span></label>
                            <div class="col-lg-9">
                              <div class="vd_radio radio-success">                            
                                  <select name="type">
                                    <option value="">select</option>
                                    <?php 
                                    $this->db->limit(5);
                                    $data = $this->db->get('service_link')->result(); 
                                    foreach ($data as $value2) {
                                        echo "<option value='$value2->service_link_name'>$value2->service_link_name</option>";
                                    }?>
                                    

                                  </select>
                              </div>                             
                            </div>
                          </div>
                         
                          <!-- form-group -->
                      <?php $count = $this->db->get('mcategory')->result(); foreach ($count as $value) {
                       
                       ?>
                          <div class="form-group">
                            <label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Add Images </span> </label>
                            <div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span> Category <?php echo $value->mcat_name; ?> </span> 
                              <!-- The file input field used as target for the file upload widget -->
                              <input type="file" name="service_<?php echo $value->mcat_name ?>" id="fileuploadalt">
                              </span>                               
                            </div>                            
                          </div>
<?php } ?>
                            <div align="center"> 
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Add Our Service</button>                          
                            </div>
                          <!-- form-group -->
                          
                        <?php echo form_close();*/?>
                      </div>
                      <!-- #tabinfo -->
                    
                    </div>
                    <!-- tab-content --> 
                    
                  </div>
                  <!-- panel-body --> 
                  
                  <!-- form-horizontal --> 
                </div>
                <?php } ?>
                <div class="panel widget">
                 
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Text</th>
                          <th>Type</th>
                          <?php $count = $this->db->get('mcategory')->result(); foreach ($count as $value) {
                       
                       ?>
                         <th><?php echo $value->mcat_name; ?></th>
<?php } ?>
                           <th>Action</th>  
                          
                        </tr>
                      </thead>
                      <tbody>
                       
                       
                         <?php $i=1;foreach($data2 as $user){?>
                        <tr class="gradeA">
                          <td class="center" width="10px;"><?php echo $i;?></td>
                           <td ><?php echo $user->title;?></td>
                          <td ><?php echo $user->description;?></td>
                          <td><?php echo $user->type; ?></td>
                          <?php $count = $this->db->get('mcategory')->result();
                           foreach ($count as $value) {
                            $catname = $value->mcat_name;
                       ?>
                     <td><img  src="<?php echo base_url();?>assets/images/services/<?php echo $user->$catname; ?>" height="100vh"></td>
                      <?php } ?>
                        <td><a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/product/o_s_stitch/<?php echo $user->service_id;?>"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        <?php $i++;}?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
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
		$('#specific_price_table tbody').append('<tr>' + '<td>' +