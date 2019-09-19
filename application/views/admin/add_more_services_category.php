<style>
.active3
{
	background-color:#1fae66 !important;
}
</style>
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">  
<style>
	
						.form-wizard .nav > li > a{padding: 10px; margin-right:0; text-align: left; color:#888888;}
                        .tab-right{margin-left:-30px; margin-top:-1px; }
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
              <h1><?php if($this->uri->segment(3)){echo "Edit Accessories";}else{echo "More Services";}?></h1>
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
              <div class="col-sm-3 col-md-4 col-lg-3">
                <div class="form-wizard condensed mgbt-xs-20">
                  <ul class="nav nav-tabs nav-stacked">
                    <li class="active"><a href="#tabinfo" data-toggle="tab"> <i class="fa fa-info-circle append-icon"></i> Add Category </a></li>
                                     
                  </ul>
                </div>
              </div>
              <div class="col-sm-9 col-md-8 col-lg-9 tab-right">
                <div class="panel widget panel-bd-left light-widget">
                  <div class="panel-heading no-title"> </div>
                  <div  class="panel-body">
                    <div class="tab-content no-bd mgbt-xs-20">
                      <div id="tabinfo" class="tab-pane active">
                       <?php 
					   if($this->uri->segment(3)){
						   $edit=$this->db->get_where("accessories",array("acc_id"=>$this->uri->segment(3)))->row();
						   echo form_open_multipart("Product/more_services/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                             <div class="vd_panel-menu">
                            <div> 
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Update Changes</button> 
                            <a  href="<?php echo base_url();?>index.php/product/add_accessories" class="btn btn-default btn-sm">
                            <i class="fa fa-times append-icon"></i> Cancel Changes</a> 
                            </div>
                          </div>
                          <h3 class="mgtp-15 mgbt-xs-20">More Services Details</h3>
                          <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures">Main Category </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="accessories_1" name="main_category" required>
                                  <option value="">Select Main Category</option>
                                  <?php
                                   $this->db->limit(2);
                                   $cat=$this->db->get("mcategory")->result();
                                  foreach($cat as $cat){?>
                                    <option value="<?php echo $cat->mid;?>"><?php echo $cat->mcat_name;?></option>
                                    <?php }?>
                                 </select>
                                </div> 
                              </div>
                            </div>
                          </div>   
                          <div class="form-group" id="apppent_id"></div>
                          <div class="form-group" id="apppent_id2"></div>                       

                          <div class="form-group">
                            <label for="code_1" class="control-label col-lg-3 required"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product reference number (SKU-10423, etc.)"> Brand </span> </label>                        
                            <div class="col-lg-4">
                              <input type="text" value="<?php echo $edit->brand;?>" required placeholder="Brand" name="brand" class="updateCurrentText " id="code_1" >
                            </div>
                          </div>                 
                          
                          <!-- form-group -->
                          <div class="form-group">
                            <label for="weight" class="control-label col-lg-3">Color</label>
                            <div class="col-lg-9">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="vd_checkbox checkbox-success">
                                    <input type="checkbox" <?php if (strpos($edit->color, 'red')!==false) { echo 'checked';}?> name="color[]" id="checkbox-1" value="red">
                                    <label for="checkbox-1">Red </label>
                                    <input type="checkbox" <?php if (strpos($edit->color, 'aqua')!==false) { echo 'checked';}?> name="color[]" id="checkbox-6" value="aqua">
                                    <label for="checkbox-6">Aqua </label>
                                    
                                    <input type="checkbox" <?php if (strpos($edit->color, 'green')!==false) { echo 'checked';}?> name="color[]"  id="checkbox-2" value="green">
                                    <label for="checkbox-2">Green </label>
                                    <input type="checkbox"  <?php if (strpos($edit->color, 'blue')!==false) { echo 'checked';}?> name="color[]" id="checkbox-3" value="blue">
                                    <label for="checkbox-3">Blue </label>
                                    <input type="checkbox" name="color[]" <?php if (strpos($edit->color, 'pink')!==false) { echo 'checked';}?> id="checkbox-4" value="pink">
                                    <label for="checkbox-4">Pink </label>
                                    <input type="checkbox" <?php if (strpos($edit->color, 'yellow')!==false) { echo 'checked';}?> name="color[]" id="checkbox-5" value="yellow">
                                    <label for="checkbox-5">Yellow </label>
                                     <input type="checkbox" <?php if (strpos($edit->color, 'orange')!==false) { echo 'checked';}?> name="color[]" id="checkbox-7" value="yellow">
                                    <label for="checkbox-7">Orange </label>
                                     <input type="checkbox" <?php if (strpos($edit->color, 'black')!==false) { echo 'checked';}?> name="color[]" id="checkbox-8" value="black">
                                    <label for="checkbox-8">Black</label>
                                    <input type="checkbox" <?php if (strpos($edit->color, 'dark-green')!==false) { echo 'checked';}?> name="color[]" id="checkbox-9" value="dark-green">
                                    <label for="checkbox-9">Dark Green </label>
                                     <input type="checkbox" <?php if (strpos($edit->color, 'grey')!==false) { echo 'checked';}?> name="color[]" id="checkbox-10" value="grey">
                                    <label for="checkbox-10">Grey </label>
                                    
                                  </div>
                                </div>
                                
                              </div>
                              <a href="#"> <i class="fa fa-plus append-icon"></i> Add Color</a> </div>
                          </div>
                          <div class="form-group">
                            <label for="description_short_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Appears in the product list(s), and at the top of the product page."> Short description </span> </label>
                            <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">
                              <textarea   name="sdesc" id="description_short_1" data-rel="ckeditor" rows="1" ><?php echo $edit->sdesc;?></textarea>
                            </div>
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label for="description_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Appears in the body of product detail."> Description </span> </label>
                            <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">
                              <textarea  name="ldesc"  id="description_1" data-rel="ckeditor" rows="3" ><?php echo $edit->ldesc;?></textarea>
                            </div>
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label for="tags_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Each tag has to be followed by a comma. The following characters are forbidden: !&lt;;&gt;;?=+#&quot;°{}_$%"> Tags </span> </label>
                            <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">
                              <div class="row">
                                <div class="col-lg-9 mgbt-xs-10 mgbt-lg-0">
                                  <input type="text"  value="<?php echo $edit->tags;?>" name="tags"  id="tags_1" data-rel="tags-input">
                                </div>
                                <div class="col-lg-2">
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Add Images </span> </label>
                            <div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Change Cover Image</span> 
                              <!-- The file input field used as target for the file upload widget -->
                              <input type="file" name="fabricc" id="fileupload1">
                              <input type="hidden" name="oldt" value="<?php echo $edit->thumb;?>" />
                              <img class="img img-responsive" src="<?php echo base_url();?>assets/images/accessories/<?php echo $edit->thumb;?>" />
                              </span> 
                              
                            </div>
                             <div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Change Front Side</span> 
                              <!-- The file input field used as target for the file upload widget -->
                              <input type="file" name="front" id="fileupload2">                              
                              <input type="hidden" name="oldf" value="<?php echo $edit->front;?>" />
                               <img class="img img-responsive" src="<?php echo base_url();?>assets/images/accessories/<?php echo $edit->front;?>" />
                              </span> 
                              
                            </div>
                            <div class="col-lg-3"> 
            <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Change Back Side</span> 
              <!-- The file input field used as target for the file upload widget -->
              <input type="file" name="back" id="fileupload3">
              <input type="hidden" name="oldb" value="<?php echo $edit->back;?>" />
               <img class="img img-responsive" src="<?php echo base_url();?>assets/images/accessories/<?php echo $edit->back;?>" />
              </span>     
                            </div>
                             
                            
                          </div>
                          <div class="form-group">
                            <label for="wholesale_price" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The wholesale price is the price you paid for the product. Do not include the tax.">Price</span> </label>
                            <div class="col-lg-2">
                              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-inr"></i> </span>
                                <input type="number" value="<?php echo $edit->price;?>" onChange="this.value = this.value.replace(/,/g, '.');" placeholder="500" id="wholesale_price" name="wholesale_price" maxlength="4">
                              </div>
                            </div>
                          </div>
                          <!-- form-group -->
                           <?php echo form_close();
						   
						   
					   }else{
					   
					   echo form_open_multipart("Product/add_more_services_category",array("class"=>"form-horizontal"));?>
                        
                        
                          <div class="vd_panel-menu">
                            <div> 
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Add More Services</button> 
                          
                            </div>
                          </div>
                          <h3 class="mgtp-15 mgbt-xs-20"> More Services Details</h3>
                          <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures">Add Main Category </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                <input type="text" class="form-control" name="category" placeholder="Main category" />
                                
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group" id="apppent_id"></div>
                          <div class="form-group" id="apppent_id2"></div>                         
                         
                          
                          
                          <!-- form-group -->
                          
                          
                          <!-- form-group -->
                         
                          <!-- form-group -->
                          
                          
                          <!-- form-group -->
                          
                          
                          <!-- form-group -->
                          
                          
                          
                          
                          
                          <!-- form-group -->
                          
                        <?php echo form_close();}?>
                      </div>
                      <!-- #tabinfo -->
                      <div id="tabprice" class="tab-pane">
                        <div class="vd_panel-menu">
                          <div> <a class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Save Changes</a> <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-times append-icon"></i> Cancel Changes</a></div>
                        </div>
                        <h3 class="mgtp-15 mgbt-xs-20"> Product Price</h3>
                        
                      </div>
                   
                      <div id="tabasso" class="tab-pane">
                        <h3 class="mgtp-15 mgbt-xs-20"> Accessories Sub Category</h3>
                        <form class="form-horizontal">
                          <div class="vd_panel-menu">
                            <div> <a class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Save Changes</a> <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-times append-icon"></i> Cancel Changes</a></div>
                          </div>
                          <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Sub Category </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="manufac_1" name="manu_1" required>
                                    <option value="">Select Sub Category</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- form-group -->
                        </form>
                      </div>
                
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header vd_bg-blue vd_white">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title" id="myModalLabel">Cancel Changes</h4>
      </div>
      <div class="modal-body">
        <h5>Are you sure you want to cancel your changes?</h5>
      </div>
      <div class="modal-footer background-login">
        <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Yes</button>
        <button type="button" class="btn vd_btn vd_bg-green"  data-dismiss="modal">No</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->

<div class="modal fade" id="addPriceModal" tabindex="-1" role="dialog" aria-labelledby="priceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header vd_bg-blue vd_white">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title" id="priceModalLabel">Add Price for Combination</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-4 control-label">Combination</label>
            <div class="col-sm-7 controls">
              <select class="width-40" id="option-combination">
                            <option value="S - Grey">S - Grey</option>
                            <option value="S - Blue">S - Blue</option>
                            <option value="M - Grey">M - Grey</option>
              </select>
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Price</label>
            <div class="col-sm-7 controls">
              <input class="input-border-btm width-40" type="number" id="price-combination">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Enabled</label>
            <div class="col-sm-7 controls">
              <input  type="checkbox" data-rel="switch" data-wrapper-class="inverse" data-size="small" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" id="enable-combination">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer background-login">
        <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
        <button type="button" class="btn vd_btn vd_bg-green" id="add-price-btn"><i class="fa fa-plus append-icon"></i> Add Price</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
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

<script>
 $(document).ready(function(){ 

$("#accessories_1").change(function() {

    var sid = $(this).val();
    $.ajax({
        type : "POST",
        url : "<?php echo base_url();?>index.php/product/ajax_add_cat_acc",
        data : {sid:sid},
        success: function(data){
      //alert(data);
          if(data)
          $("#apppent_id").html(data);
      }
    });
});
});
</script>
<script>
  $(document).on('change','#sub_cat_acc',function(){
     var sub_id = $(this).val();
    $.ajax({
        type : "POST",
        url : "<?php echo base_url();?>index.php/product/ajax_add_subcat_acc",
        data : {sub_id:sub_id},
        success: function(data){
      //alert(data);
          if(data)
          $("#apppent_id2").html(data);
      }
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

</body>

<!-- Mirrored from vendroid.venmond.com/pages-ecommerce-product-add.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2016 11:26:07 GMT -->
</html>