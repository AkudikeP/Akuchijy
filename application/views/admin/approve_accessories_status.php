<style>
.active9
{
	background-color:#1fae66 !important;
}
</style>
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
              <h1><?php if($this->uri->segment(3)){echo "Edit Accessories";}else{echo "Add Accessories";}?></h1>
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
                    <li class="active"><a href="#tabinfo" data-toggle="tab"> <i class="fa fa-info-circle append-icon"></i> Add Category </a></li>
                    <li><a href="#tabasso" data-toggle="tab"> <i class="fa fa-money append-icon"></i> Add City </a></li>
                    <li><a href="#tabatta" data-toggle="tab"> <i class="fa fa-money append-icon"></i> Special Offer </a></li>
                    <li><a href="#tabprice" data-toggle="tab"> <i class="fa fa-money append-icon"></i> Meta </a></li>
                    <li><a href="#tabinfo1" data-toggle="tab"><i class="fa fa-money append-icon"></i>Upload Sample</a></li>

                  </ul>
                </div>
              </div>
              <div class="col-sm-12 col-md-8 col-lg-12 tab-right">
                <div class="panel widget panel-bd-left light-widget">
                  <div class="panel-heading no-title"> </div>
                  <div  class="panel-body">
                    <div class="tab-content no-bd mgbt-xs-20">
                    <?php if($this->session->flashdata('message')){?>
                      <div class="alert alert-success">
                        <?php echo $this->session->flashdata('message')?>
                      </div>
                  <?php } ?>
                      <div id="tabinfo" class="tab-pane active">
                       <?php
					   if($this->uri->segment(3)){
						   $edit=$this->db->get_where("accessories",array("acc_id"=>$this->uri->segment(3)))->row();
						   echo form_open_multipart("Product/add_accessories/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>

                          <h3 class="mgtp-15 mgbt-xs-20"> Accessories Details</h3>

                          <div class="form-group">
                            <label for="tags_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Each tag has to be followed by a comma. The following characters are forbidden: !&lt;;&gt;;?=+#&quot;°{}_$%"> Title Name </span> </label>
                            <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">
                              <div class="row">
                                <div class="col-lg-9 mgbt-xs-10 mgbt-lg-0">
                                  <input type="text"  value="<?php echo $edit->brand;?>" name="brand"  id="tags_1" data-rel="tags-input">
                                </div>
                                <div class="col-lg-2">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures">Main Category </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="accessories_1" name="main_category" required>
                                  <option value="">Select Main Category</option>
                                  <?php
                                   $this->db->limit(3);
                                   $cat=$this->db->get("mcategory")->result();

                                  foreach($cat as $cat){?>
                                    <option value="<?php echo $cat->mid;?>" <?php if($cat->mid==$edit->main_category) echo "selected";?>><?php echo $cat->mcat_name;?></option>
                                    <?php }?>
                                 </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--<div class="form-group" id="apppent_id"></div>
                          <div class="form-group" id="apppent_id2"></div> -->
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Featured </span></label>
                            <div class="col-lg-9">
                              <div class="vd_radio radio-success">
                             <input type="radio"    value="yes"  name="type_feature" <?php if($edit->featured=="yes"){echo "checked";}?>  id="feature">
                                <label for="feature">Yes</label>
                                  <input type="radio"  value="no" name="type_feature" id="feature1" <?php if($edit->featured=="no"){echo "checked";}?>>
                                <label for="feature1">No</label>
                              </div>

                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Special </span></label>
                            <div class="col-lg-9">
                              <div class="vd_radio radio-success">
                             <input type="radio"    value="yes" name="type_special" id="special" <?php if($edit->special=="yes"){echo "checked";}?>>
                                <label for="special">Yes</label>
                                  <input type="radio"  value="no" name="type_special" id="special1" <?php if($edit->special=="no"){echo "checked";}?>>
                                <label for="special1">No</label>
                              </div>

                            </div>
                          </div>

                          <?php
                          $filter_check=$this->db->get_where("accessories_search",array("product_id"=>$this->uri->segment(3)))->row();
                          $i=0;if(!empty($filter_check))
                          {

                          $filter=$this->db->get_where("filter",array("filter_main_category"=>3))->result();
                            foreach($filter as $filter){

                              ?>

                          <div class="form-group">
                            <label for="weight" class="control-label col-lg-3"><?php echo $filter->filter_category;?></label>
                            <div class="col-lg-9">
                              <div class="row">
                                <div class="col-sm-12">
                                <div class="vd_checkbox checkbox-success">
                                <?php $f=$this->db->get_where("filter_subcategory",array("main_category_id"=>3,"sub_category_id"=>$filter->fid))->result();
                                  foreach($f as $f){?>
                                   <input type="checkbox"  name="accessories_search[]" id="<?php echo $f->filter_name.$i;?>" value="<?php echo $f->fcid;?>" <?php if (strpos($filter_check->filter_subcategory_fcid, $f->fcid)!==false) { echo 'checked';}?>>
                                    <label for="<?php echo $f->filter_name.$i;?>"><?php echo $f->filter_name;?> </label>
                                    <?php }?>

                                  </div>
                                </div>
                              </div>
                              </div>
                          </div>
                          <?php } $i++;}

                          else
                          {
                            ?>


                             <?php $filter=$this->db->get_where("filter",array("filter_main_category"=>3))->result();
                            foreach($filter as $filter){?>

                          <div class="form-group">
                            <label for="weight" class="control-label col-lg-3"><?php echo $filter->filter_category;?></label>
                            <div class="col-lg-9">
                              <div class="row">
                                <div class="col-sm-12">
                                <div class="vd_checkbox checkbox-success">
                                <?php $f=$this->db->get_where("filter_subcategory",array("main_category_id"=>3,"sub_category_id"=>$filter->fid))->result();
                                  foreach($f as $f){?>
                                   <input type="checkbox"  name="accessories_search[]" id="<?php echo $f->filter_name;?>" value="<?php echo $f->fcid;?>">
                                    <label for="<?php echo $f->filter_name;?>"><?php echo $f->filter_name;?> </label>
                                    <?php }?>
                                  </div>
                                </div>
                              </div>
                              </div>
                          </div>
                          <?php }?>

                            <?php
                          }
                          ?>

                          <?php $filter2=$this->db->get_where("main_categories",array("category"=>3))->result();
                          //print_r($filter2);
                          ?>
                          <div class="form-group">
                            <label for="weight" class="control-label col-lg-3">Edit Category</label>
                            <div class="col-lg-9">
                              <div class="row">
                                <div class="col-sm-12">

                                <div class="vd_checkbox checkbox-success">

                                <select name="fabric_main_cat" id="<?php echo $value->name;?>">
                                <option value="">select</option>
                                      <?php foreach ($filter2 as $value) {?>
                                      <option value="<?php echo $value->id; ?>" <?php if($value->id==$edit->category_for_filter){echo 'selected'; } ?> ><?php echo $value->name;?></option>
                                      <?php } ?>
                                    </select>



                                  </div>

                                </div>
                              </div>
                              </div>
                          </div>

                          <div class="form-group">
                            <label for="description_short_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Appears in the product list(s), and at the top of the product page."> SKU </span> </label>
                            <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">

                              <input type="text" id="SKU" name="sku" value="<?php echo $edit->SKU; ?>">
                            </div>

                          </div>
                                                     <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Tax Class </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">

                                  <input type="number" min="0" placeholder="in percentage"  value="<?php echo $edit->Tax_Class; ?>" name="tax" required="">
                                </div>
                                <div  class="col-lg-5">
                               </div>
                                <!-- col-lg-9 -->
                              </div>
                            </div>
                          </div>

                           <div class="form-group">
                            <label for="wholesale_price" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The wholesale price is the price you paid for the product. Do not include the tax.">Price</span> </label>
                            <div class="col-lg-2">
                              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-inr"></i> </span>
                                <input type="number"  min="0"  value="<?php echo $edit->price_without_tax;?>" placeholder="500" id="wholesale_price" name="wholesale_price" required>
                              </div>
                            </div>
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                            <label for="quantity" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The wholesale price is the price you paid for the product. Do not include the tax.">Quantity</span> </label>
                            <div class="col-lg-2">
                              <div class="input-group">
                                <input type="number"  min="0"  value="<?php echo $edit->quantity;?>" placeholder="10" id="quantity" name="quantity" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="description_short_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Appears in the product list(s), and at the top of the product page."> Subtract Stock </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="" name="subtractstock" class="Subtract_Stock" required="">
                                  <option value="Yes" <?php if($edit->Subtract_Stock=='Yes'){echo "selected";} ?>>Yes</option>
                                  <option value="No" <?php if($edit->Subtract_Stock=='No'){echo "selected";} ?>>No</option>

                                 </select>
                                </div>
                                <div  class="col-lg-5">
                               </div>
                                <!-- col-lg-9 -->
                              </div>
                            </div>

                          </div>
													<div class="form-group minquan <?php if($edit->Subtract_Stock=='Yes'){echo 'not';} ?>">
													 <label for="description_short_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Appears in the product list(s), and at the top of the product page."> Minimum Quantity </span> </label>
													 <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">

														 <input type="number" id="minquantity" name="minimum" min="1" value="<?php echo $edit->Minimum_Quantity; ?>">
													 </div>

												 </div>
 						<div class="form-group">
                            <label for="description_short_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Appears in the product list(s), and at the top of the product page."> Short description </span> </label>
                            <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">
                              <textarea   name="sdesc"  class="form-control" ><?php echo $edit->sdesc;?></textarea>
                            </div>
                          </div>
                          <!-- form-group -->

                          <div class="form-group">
                            <label for="description_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Appears in the body of product detail."> Description </span> </label>
                            <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">
                              <textarea  name="ldesc"  id="editor1" class="form-control"><?php echo $edit->ldesc;?></textarea>
                            </div>
                          </div>
                          <!-- form-group -->

                          <div class="form-group">
                            <label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Add Images </span> </label>
                            <div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <span>Change Cover Image</span> <div id="image-holder1"> </div>
                              <input type="file" name="fabricc" id="fileUpload1">
                              <input type="hidden" class="fabricc_yes_no" name="fabricc_yes_no" value="" />
                              <input type="hidden" class="oldt" name="oldt" value="<?php echo $edit->thumb;?>" />
                              <?php if(isset($edit->thumb) && !empty($edit->thumb) && $edit->thumb!=' '){ ?>
                              <img class="img img-responsive" src="<?php echo base_url();?>assets/images/accessories/<?php echo $edit->thumb;?>" id="remove_image1"/>
                              <?php } ?>
                              </span>
                              <div id="remo1" class="btn">Remove</div>
                            </div>

                             <div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <span>Change Front Image</span><div id="image-holder2"> </div>
                              <input type="file" name="front" id="fileupload2">
                              <input type="hidden" class="front_yes_no" name="front_yes_no" value="" />
                              <input type="hidden" class="oldf" name="oldf" value="<?php echo $edit->front;?>" />
                              <?php if(isset($edit->front) && !empty($edit->front) && $edit->front!=' '){ ?>
                               <img class="img img-responsive" src="<?php echo base_url();?>assets/images/accessories/<?php echo $edit->front;?>" id="remove_image2"/>
                               <?php } ?>
                              </span>
                              <div id="remo2" class="btn">Remove</div>
                            </div>
                            <div class="col-lg-3">
                              <span class="btn vd_btn vd_bg-green fileinput-button"> <span>Change Back Image</span><div id="image-holder3"> </div>
                                <input type="file" name="back" id="fileupload3">
                                <input type="hidden" class="back_yes_no" name="back_yes_no" value="" />
                                <input type="hidden" class="oldb" name="oldb" value="<?php echo $edit->back;?>" />
                                <?php if(isset($edit->back) && !empty($edit->back) && $edit->back!=' '){ ?>
                                 <img class="img img-responsive" src="<?php echo base_url();?>assets/images/accessories/<?php echo $edit->back;?>" id="remove_image3" />
                                 <?php } ?>
                                </span>
                                <div id="remo3" class="btn">Remove</div>
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Sizing Guide </span> </label>

                            <div class="col-lg-3">
                              <span class="btn vd_btn vd_bg-green fileinput-button"> <span>Sizing Guide Image</span><div id="image-holder5"> </div>
                                <input type="file" name="sizing_guide" id="fileupload5">
                                <input type="hidden" class="olds" name="olds" value="<?php echo $edit->sizing_guide;?>" />
                 <input type="hidden" class="sizing_guide_yes_no" name="sizing_guide_yes_no" value="" />
                               <?php if(isset($edit->sizing_guide) && !empty($edit->sizing_guide) && $edit->sizing_guide!=' '){ ?>
                                 <img class="img img-responsive" src="<?php echo base_url();?>assets/images/accessories/<?php echo $edit->sizing_guide;?>" id="remove_image5" />
                               <?php } ?>
                                </span>
                                <div id="remo5" class="btn">Remove</div>
                            </div></div>

                            <div class="">
                            <div>
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Update Accessories</button>
                            <a  href="<?php echo base_url();?>index.php/product/clear_offer_acc/<?php echo $edit->acc_id;?>" class="btn vd_btn vd_bg-blue btn-sm save-btn">
                            Clear Offer</a>
                            <a  href="<?php echo base_url();?>index.php/product/add_accessories" class="btn vd_btn vd_bg-blue btn-sm save-btn">
                            <i class="fa fa-times append-icon"></i> Add New Accessories</a>
                            <a  href="<?php echo base_url();?>index.php/product/accessories_status_change/<?php echo $edit->acc_id; ?>" class="btn vd_btn vd_bg-blue btn-sm save-btn">
                           <i class="fa fa-check" aria-hidden="true"></i>
Approve</a>                <input type="hidden" name="pagename" value="accessories_status">
                            </div>
                          </div>
                           <?php echo form_close();
						    ?>
                 <?php if(!empty($edit->vendor_id)){
                           echo'<a class="btn vd_btn vd_bg-blue btn-sm " data-toggle="modal" data-target="#myModal">Disapprove</a>';
                           }
                             ?>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <form action="<?php echo base_url(); ?>product/disapprove" method="post">
        <input type="hidden" name="pid" value="<?php echo $edit->acc_id; ?>">
        <input type="hidden" name="pname" value="<?php echo $edit->brand; ?>">
        <input type="hidden" name="vendorid" value="<?php echo $edit->vendor_id; ?>">
        <input type="hidden" name="redirect" value="<?php echo current_url(); ?>">
        <input type="hidden" name="type" value="accessories">
        <input type="hidden" name="id" value="acc_id">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Disapprove Reason</h4>
        </div>
        <div class="modal-body">
          <textarea name="reason" style="width: 100%;height:50vh"></textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Disapprove</button>
          </form>
          <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
        </div>
      </div>

    </div>
  </div>
                <?php /* if(!empty($edit->vendor_id)){
                           echo'<a class="btn vd_btn vd_bg-blue btn-sm " data-toggle="modal" data-target="#myModal">Disapprove</a>';
                         }*/
                             ?>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <form action="<?php echo base_url(); ?>product/disapprove" method="post">
        <input type="hidden" name="pid" value="<?php echo $edit->acc_id; ?>">
        <input type="hidden" name="pname" value="<?php echo $edit->brand; ?>">
        <input type="hidden" name="vendorid" value="<?php echo $edit->vendor_id; ?>">
        <input type="hidden" name="redirect" value="<?php echo current_url(); ?>">
        <input type="hidden" name="type" value="accessories">
        <input type="hidden" name="id" value="acc_id">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Disapprove Reason</h4>
        </div>
        <div class="modal-body">
          <textarea name="reason" style="width: 100%;height:50vh"></textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Disapprove</button>
          </form>
          <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
        </div>
      </div>

    </div>
  </div>
  <?php

					   }else{

					   echo form_open_multipart("Product/add_accessories",array("class"=>"form-horizontal"));?>



                          <h3 class="mgtp-15 mgbt-xs-20"> Accessories Details</h3>
                          <div class="form-group">
                            <label for="tags_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Each tag has to be followed by a comma. The following characters are forbidden: !&lt;;&gt;;?=+#&quot;°{}_$%"> Title </span> </label>
                            <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">
                              <div class="row">
                                <div class="col-lg-9 mgbt-xs-10 mgbt-lg-0">
                                  <input type="text" value="" name="brand"  id="tags_1" data-rel="tags-input" required placeholder="Title Name">
                                </div>
                                <div class="col-lg-2">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures">Main Category </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="accessories_1" name="main_category" required>
                                  <option value="">Select Main Category</option>
                                  <?php
                                   $this->db->limit(3);
                                   $cat=$this->db->get("mcategory")->result();
								  foreach($cat as $cat){?>
                                    <option value="<?php echo $cat->mid;?>"><?php echo $cat->mcat_name;?></option>
                                    <?php }?>
                                 </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--<div class="form-group" id="apppent_id"></div>
                          <div class="form-group" id="apppent_id2"></div>

                          <div class="form-group" id="row_dim">
                            <label for="code_6" class="control-label col-lg-3 required"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product reference number (SKU-10423, etc.)"> Sub Category 1 </span> </label>
                            <div class="col-lg-4">
                              <input type="text" placeholder="Sub-Category 1" name="sub_category_shoes" class="updateCurrentText " id="code_6" >
                            </div>
                          </div> -->
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Featured </span></label>
                            <div class="col-lg-9">
                              <div class="vd_radio radio-success">
                             <input type="radio"    value="yes" name="type_feature" id="feature">
                                <label for="feature">Yes</label>
                                  <input type="radio"  value="no" name="type_feature" id="feature1" checked="">
                                <label for="feature1">No</label>
                              </div>

                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Special </span></label>
                            <div class="col-lg-9">
                              <div class="vd_radio radio-success">
                             <input type="radio"    value="yes" name="type_special" id="special">
                                <label for="special">Yes</label>
                                  <input type="radio"  value="no" name="type_special" id="special1" checked="">
                                <label for="special1">No</label>
                              </div>

                            </div>
                          </div>


                          <?php $filter=$this->db->get_where("filter",array("filter_main_category"=>3))->result();
                            foreach($filter as $filter){?>

                          <div class="form-group">
                            <label for="weight" class="control-label col-lg-3"><?php echo $filter->filter_category;?></label>
                            <div class="col-lg-9">
                              <div class="row">
                                <div class="col-sm-12">
                                <div class="vd_checkbox checkbox-success">
                                <?php $f=$this->db->get_where("filter_subcategory",array("main_category_id"=>3,"sub_category_id"=>$filter->fid))->result();
                                  foreach($f as $f){?>
                                   <input type="checkbox"  name="accessories_search[]" id="<?php echo $f->filter_name;?>" value="<?php echo $f->fcid;?>">
                                    <label for="<?php echo $f->filter_name;?>"><?php echo $f->filter_name;?> </label>
                                    <?php }?>
                                  </div>
                                </div>
                              </div>
                              </div>
                          </div>
                          <?php }?>

                          <!-- form-group -->
                          <?php $filter2=$this->db->get_where("main_categories",array("category"=>3))->result();
                          //print_r($filter2);
                          ?>
                          <div class="form-group">
                            <label for="weight" class="control-label col-lg-3">Add Category</label>
                            <div class="col-lg-9">
                              <div class="row">
                                <div class="col-sm-12">

                                <div class="vd_checkbox checkbox-success">

                                <select name="fabric_main_cat" id="<?php echo $value->name;?>">
                                <option value="">select</option>
                                      <?php foreach ($filter2 as $value) {?>
                                      <option value="<?php echo $value->id; ?>" ><?php echo $value->name;?></option>
                                      <?php } ?>
                                    </select>



                                  </div>

                                </div>
                              </div>
                              </div>
                          </div>
                                                     <div class="form-group">
                            <label for="description_short_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Appears in the product list(s), and at the top of the product page."> SKU </span> </label>
                            <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">

                              <input type="text" id="SKU" name="sku">
                            </div>

                          </div>
                           <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Tax Class </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                 <input type="number" min="0" placeholder="in percentage"  name="tax" required="">
                                </div>
                                <div  class="col-lg-5">
                               </div>
                                <!-- col-lg-9 -->
                              </div>
                            </div>
                          </div>

                            <div class="form-group">
                            <label for="wholesale_price" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The wholesale price is the price you paid for the product. Do not include the tax.">Price</span> </label>
                            <div class="col-lg-2">
                              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-inr"></i> </span>
                                <input type="number"  min="0"  onChange="this.value = this.value.replace(/,/g, '.');" placeholder="500" id="wholesale_price" name="wholesale_price">
                              </div>
                            </div>
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                            <label for="quantity" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The wholesale price is the price you paid for the product. Do not include the tax.">Quantity</span> </label>
                            <div class="col-lg-2">
                              <div class="input-group">
                                <input type="number"  min="0"  placeholder="10" id="quantity" name="quantity" required>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="description_short_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Appears in the product list(s), and at the top of the product page."> Subtract Stock </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select name="subtractstock" class="Subtract_Stock"required="">

                                  <option value="No">No</option>
																	<option value="Yes">Yes</option>

                                 </select>
                                </div>
                                <div  class="col-lg-5">
                               </div>
                                <!-- col-lg-9 -->
                              </div>
                            </div>

                          </div>
													<div class="form-group minquan ">
													 <label for="description_short_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Appears in the product list(s), and at the top of the product page."> Minimum Quantity </span> </label>
													 <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">

														 <input type="number" id="minquantity" name="minimum" min="1" >
													 </div>

												 </div>
                          <div class="form-group">
                            <label for="description_short_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Appears in the product list(s), and at the top of the product page."> Short description </span> </label>
                            <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">
                              <textarea  name="sdesc"  class="form-control"></textarea>
                            </div>
                          </div>
                          <!-- form-group -->

                          <div class="form-group">
                            <label for="description_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Appears in the body of product detail."> Description </span> </label>
                            <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">
                              <textarea name="ldesc"  id="editor1"  class="form-control"></textarea>
                            </div>
                          </div>
                          <!-- form-group -->


                          <div class="form-group">
                            <label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Add Images </span> </label>
                            <div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"><span>Change Cover Image</span><div id="image-holder1"> </div>
                            <input type="hidden" class="fabricc_yes_no" name="fabricc_yes_no" value="" />
                              <input type="file" name="fabricc" id="fileUpload1">
                              </span>
                              <div class="btn" id="remo1">Remove</div>
                            </div>
                             <div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <span>Custom Front Side</span><div id="image-holder2"></div>
                             <input type="hidden" class="front_yes_no" name="front_yes_no" value="" />
                              <input type="file" name="front" id="fileupload2">
                              </span>
                              <div id="remo2" class="btn">Remove</div>
                            </div>
                            <div class="col-lg-3">
                              <span class="btn vd_btn vd_bg-green fileinput-button"> <span>Custom Back Side</span><div id="image-holder3"></div>
                              <input type="hidden" class="back_yes_no" name="back_yes_no" value="" />
                                <input type="file" name="back" id="fileupload3">
                                </span>
                                <div id="remo3" class="btn">Remove</div>
                            </div>




                          </div>

                           <div class="form-group">
                            <label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Sizing Guide </span> </label>

                            <div class="col-lg-3">
                              <span class="btn vd_btn vd_bg-green fileinput-button"> <span>Sizing Guide Image</span><div id="image-holder5"> </div>

                    <input type="hidden" class="sizing_guide_yes_no" name="sizing_guide_yes_no" value="" />
                    <input type="file" name="sizing_guide" id="fileupload5">
                                                               </span>
                                <div id="remo5" class="btn">Remove</div>
                            </div></div>


                          <div class="">
                            <div>
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Add Accessories</button>

                            </div>
                          </div>

                        <?php echo form_close();}?>
                      </div>
                      <!-- #tabinfo -->
                       <div id="tabinfo1" class="tab-pane">
                        <div class="vd_panel-menu">
                          <div>  <a href="<?php echo base_url('excel/accessories.csv');?>" class="btn vd_btn vd_bg-blue btn-sm save-btn">Download Excel Sheet</a> </div>
                        </div>
                        <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>index.php/Excel/import_accessories_data"
                          method="post" name="upload_excel" enctype="multipart/form-data">
                         <div class="md-4">  <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Upload Data By Excel </span> </label></div>
                         <div class="md-4"> <input type="file" name="file" id="file" style="border:none;"></div>
                         <div class="md-4"><button type="submit" id="submit" name="import" class="btn vd_btn vd_bg-blue btn-sm">Upload</button></div>
                          </form> </div>

                      </div>
                      <div id="tabprice" class="tab-pane">

                      <?php
             if($this->uri->segment(3)){
               $edit=$this->db->get_where("accessories",array("acc_id"=>$this->uri->segment(3)))->row();
               echo form_open("Product/add_acc_meta/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
               <div class="vd_panel-menu">
                            <div>
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Update Meta</button>
                            <a  href="<?php echo base_url();?>index.php/product/add_accessories" class="btn vd_btn vd_bg-blue btn-sm save-btn">
                            <i class="fa fa-times append-icon"></i> Add New Accessories</a>
                            </div>
                          </div>
                          <h3 class="mgtp-15 mgbt-xs-20"> <b class="text-info">Meta</b> </h3>
                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">Title:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="meta_title1" class="form-control" id="title" placeholder="Meta Title" value="<?php echo $edit->meta_title1;?>">
                                                                    <span class="help-block">max 100 chars</span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="keywords" class="col-sm-2 control-label">Keywords:</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="meta_keyword" class="form-control"  id="keywords" placeholder="Meta Keywords" rows="8"><?php echo $edit->meta_keyword;?></textarea>
                                                                    <span class="help-block">max 1000 chars</span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="mdescription" class="col-sm-2 control-label">Description:</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="meta_description" class="form-control" id="mdescription" placeholder="Meta Description" rows="8"><?php echo $edit->meta_description;?></textarea>
                                                                    <span class="help-block">max 255 chars</span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">Google Analytics Code:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="google_analytics" class="form-control" id="google_analytics" placeholder="Google Analytics Code" value="<?php echo $edit->google_analytics;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Title:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_title" class="form-control" id="title" placeholder="OG Title" value="<?php echo $edit->og_title;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="mdescription" class="col-sm-2 control-label">OG Description:</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="og_description" class="form-control" id="og_description" placeholder="OG Description" rows="8"><?php echo $edit->og_description;?></textarea>

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Keywords:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_keyword" class="form-control" id="og_keyword" placeholder="OG Keywords" value="<?php echo $edit->og_keyword;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Locale:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_locale" class="form-control" id="og_locale" placeholder="OG Locale" value="<?php echo $edit->og_locale;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Type:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_type" class="form-control" id="og_type" placeholder="DC Type" value="<?php echo $edit->og_type;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Site Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_site_name" class="form-control" id="og_site_name" placeholder="OG Site Name" value="<?php echo $edit->og_site_name;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Url:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_url" class="form-control" id="og_url" placeholder="OG URL" value="<?php echo $edit->og_url;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Image:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_image" class="form-control" id="og_image" placeholder="OG Image" value="<?php echo $edit->og_image;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">Dc Source:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="dc_source" class="form-control" id="dc_source" placeholder="OG Source" value="<?php echo $edit->dc_source;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">DC Relation:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="dc_relation" class="form-control" id="dc_relation" placeholder="OG Relation" value="<?php echo $edit->dc_relation;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">DC Title:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="dc_title" class="form-control" id="dc_title" placeholder="DC Title" value="<?php echo $edit->dc_title;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">DC Keywords:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="dc_keywords" class="form-control" id="   dc_keywords" placeholder="DC Keywords" value="<?php echo $edit->dc_keywords;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">DC Subject:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="dc_subject" class="form-control" id="dc_subject" placeholder="DC Subject" value="<?php echo $edit->dc_subject;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">DC Language:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="dc_language" class="form-control" id="   dc_language" placeholder="DC Language" value="<?php echo $edit->dc_language;?>">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">DC Description:</label>
                                                                <div class="col-sm-10">
                                                                    <textarea maxlength="255" name="dc_description" class="form-control" id="dc_description" placeholder="DC Description" rows="8"><?php echo $edit->dc_description;?></textarea>

                                                                </div>
                                                            </div>




                          <!-- form-group -->
                           <?php echo form_close();


             }else{

             echo form_open_multipart("Product/add_acc_meta",array("class"=>"form-horizontal"));?>
              <div class="vd_panel-menu">
                            <div>
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Add Meta</button>

                            </div>
                          </div>
                          <h3 class="mgtp-15 mgbt-xs-20"> Meta Details</h3>



                          <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">Title:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="meta_title1" class="form-control" id="title" placeholder="Meta Title" value="">
                                                                    <span class="help-block">max 100 chars</span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="keywords" class="col-sm-2 control-label">Keywords:</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="meta_keyword" class="form-control"  id="keywords" placeholder="Meta Keywords" rows="8"></textarea>
                                                                    <span class="help-block">max 1000 chars</span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="mdescription" class="col-sm-2 control-label">Description:</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="meta_description" class="form-control" id="mdescription" placeholder="Meta Description" rows="8"></textarea>
                                                                    <span class="help-block">max 255 chars</span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">Google Analytics Code:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="google_analytics" class="form-control" id="google_analytics" placeholder="Google Analytics Code" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Title:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_title" class="form-control" id="title" placeholder="OG Title" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="mdescription" class="col-sm-2 control-label">OG Description:</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="og_description" class="form-control" id="og_description" placeholder="OG Description" rows="8"></textarea>

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Keywords:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_keyword" class="form-control" id="og_keyword" placeholder="OG Keywords" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Locale:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_locale" class="form-control" id="og_locale" placeholder="OG Locale" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Type:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_type" class="form-control" id="og_type" placeholder="DC Type" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Site Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_site_name" class="form-control" id="og_site_name" placeholder="OG Site Name" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Url:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_url" class="form-control" id="og_url" placeholder="OG URL" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">OG Image:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="og_image" class="form-control" id="og_image" placeholder="OG Image" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">Dc Source:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="dc_source" class="form-control" id="dc_source" placeholder="OG Source" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">DC Relation:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="dc_relation" class="form-control" id="dc_relation" placeholder="OG Relation" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">DC Title:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="dc_title" class="form-control" id="dc_title" placeholder="DC Title" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">DC Keywords:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="dc_keywords" class="form-control" id="   dc_keywords" placeholder="DC Keywords" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">DC Subject:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="dc_subject" class="form-control" id="dc_subject" placeholder="DC Subject" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">DC Language:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="dc_language" class="form-control" id="   dc_language" placeholder="DC Language" value="">

                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="title" class="col-sm-2 control-label">DC Description:</label>
                                                                <div class="col-sm-10">
                                                                    <textarea maxlength="255" name="dc_description" class="form-control" id="dc_description" placeholder="DC Description" rows="8"></textarea>

                                                                </div>
                                                            </div>

                          <!-- form-group -->

                        <?php echo form_close();}?>


                      </div>


                      <div id="tabasso" class="tab-pane">
            <?php
             if($this->uri->segment(3)){
               $edit=$this->db->get_where("accessories",array("acc_id"=>$this->uri->segment(3)))->row();
               echo form_open("Product/add_accessories_city/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                             <div class="vd_panel-menu">
                            <div>
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Update City</button>
                            <a  href="<?php echo base_url();?>index.php/product/add_accessories" class="btn vd_btn vd_bg-blue btn-sm save-btn">
                            <i class="fa fa-times append-icon"></i> Add New Accessories</a>
                            </div>
                          </div>
                          <h3 class="mgtp-15 mgbt-xs-20"> Accessories Details</h3>
                         <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Country </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="" name="country" required>
                                  <option value="">Select Country</option>
                                  <?php
                                  $this->db->group_by("country_name");
                                  $country=$this->db->get("country_state_city")->result();
                                    foreach($country as $country)
                                    {
                                      $cotry=$this->db->get_where("countries",array("id"=>$country->country_name))->row();
                                  ?>
                                    <option value="<?php echo $country->country_name;?>" <?php if($edit->country==$cotry->id){echo "selected";}?>><?php echo $cotry->name;?></option>
                                    <?php }?>
                                 </select>
                                </div>
                                <div  class="col-lg-5">
                               </div>
                                <!-- col-lg-9 -->
                              </div>
                            </div>
                          </div>

                           <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> State </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="" name="state" required>
                                  <option value="">Select State</option>
                                  <?php
                                  $this->db->group_by("state_name");
                                  $state=$this->db->get("country_state_city")->result();
                                    foreach($state as $state)
                                    {
                                      $statese=$this->db->get_where("states",array("id"=>$state->state_name))->row();
                                  ?>
                                    <option value="<?php echo $state->state_name;?>" <?php if($statese->id==$edit->state){echo "selected";}?>><?php echo $statese->name;?></option>
                                    <?php }?>
                                 </select>
                                </div>
                                <div  class="col-lg-5">
                               </div>
                                <!-- col-lg-9 -->
                              </div>
                            </div>
                          </div>

                           <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> City </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="" name="city[]" required multiple>
                                  <option value="">Select City</option>
                                  <?php
                                  $this->db->group_by("city_name");
                                  $city=$this->db->get("country_state_city")->result();
                                    foreach($city as $city)
                                    {
                                      $cities=$this->db->get_where("cities",array("id"=>$city->city_name))->row();
                                  ?>
                                    <option value="<?php echo $city->city_name;?>" <?php if($cities->id==$edit->city){echo "selected";}?>><?php echo $cities->name;?></option>
                                    <?php }?>
                                 </select>
                                </div>
                                <div  class="col-lg-5">
                               </div>
                                <!-- col-lg-9 -->
                              </div>
                            </div>
                          </div>
                           <?php echo form_close();


             }else{

             echo form_open_multipart("Product/add_accessories_city",array("class"=>"form-horizontal"));?>


                          <div class="vd_panel-menu">
                            <div>
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Add Accessories</button>

                            </div>
                          </div>
                          <h3 class="mgtp-15 mgbt-xs-20"> Accessories Details</h3>
                          <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Country </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="" name="country" required>
                                  <option value="">Select Country</option>
                                  <?php
                                  $this->db->group_by("country_name");
                                  $country=$this->db->get("country_state_city")->result();
                                    foreach($country as $country)
                                    {
                                      $cotry=$this->db->get_where("countries",array("id"=>$country->country_name))->row();
                                  ?>
                                    <option value="<?php echo $country->country_name;?>"><?php echo $cotry->name;?></option>
                                    <?php }?>
                                 </select>
                                </div>
                                <div  class="col-lg-5">
                               </div>
                                <!-- col-lg-9 -->
                              </div>
                            </div>
                          </div>

                           <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> State </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="" name="state" required>
                                  <option value="">Select State</option>
                                  <?php
                                  $this->db->group_by("state_name");
                                  $state=$this->db->get("country_state_city")->result();
                                    foreach($state as $state)
                                    {
                                      $statese=$this->db->get_where("states",array("id"=>$state->state_name))->row();
                                  ?>
                                    <option value="<?php echo $state->state_name;?>"><?php echo $statese->name;?></option>
                                    <?php }?>
                                 </select>
                                </div>
                                <div  class="col-lg-5">
                               </div>
                                <!-- col-lg-9 -->
                              </div>
                            </div>
                          </div>

                           <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> City </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="" name="city[]" required multiple>
                                  <option value="">Select City</option>
                                  <?php
                                  $this->db->group_by("city_name");
                                  $city=$this->db->get("country_state_city")->result();
                                    foreach($city as $city)
                                    {
                                      $cities=$this->db->get_where("cities",array("id"=>$city->city_name))->row();
                                  ?>
                                    <option value="<?php echo $city->city_name;?>"><?php echo $cities->name;?></option>
                                    <?php }?>
                                 </select>
                                </div>
                                <div  class="col-lg-5">
                               </div>
                                <!-- col-lg-9 -->
                              </div>
                            </div>
                          </div>

                        <?php echo form_close();}?>
                      </div>

                      <div id="tabatta" class="tab-pane">

                  <?php
             if($this->uri->segment(3)){
               $edit=$this->db->get_where("accessories",array("acc_id"=>$this->uri->segment(3)))->row();
               echo form_open("Product/add_acc_offer/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                             <div class="vd_panel-menu">
                            <div>
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Update Offer</button>
                            <a  href="<?php echo base_url();?>index.php/product/clear_offer_acc/<?php echo $edit->acc_id;?>" class="btn vd_btn vd_bg-blue btn-sm save-btn">
                            Clear Offer</a>
                            <a  href="<?php echo base_url();?>index.php/product/add_accessories" class="btn vd_btn vd_bg-blue btn-sm save-btn">
                            <i class="fa fa-times append-icon"></i> Add New Accessories</a>
                            </div>
                          </div>
                          <h3 class="mgtp-15 mgbt-xs-20"> Offer</h3>
                          <div class="form-group">
                            <label for="from_date" class="control-label col-lg-3 required">
                            <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The public name for this product. Invalid characters &lt;&gt;;=#{}">  </span> Offer From Date</label>
                            <div class="col-lg-5">
                              <div class="row mgbt-xs-0">
                                <div class="col-sm-9">
                                  <input type="date" class="date" value="<?php echo $edit->from_date;?>" required placeholder="Offer From Date" name="from_date"  id="from_date" >
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="to_date" class="control-label col-lg-3 required">
                            <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The public name for this product. Invalid characters &lt;&gt;;=#{}">  </span> Offer To Date</label>
                            <div class="col-lg-5">
                              <div class="row mgbt-xs-0">
                                <div class="col-sm-9">
                                  <input type="date" value="<?php echo $edit->to_date;?>" required placeholder="Offer To Date" name="to_date" class="date" id="to_date" >
                                </div>

                              </div>
                            </div>
                          </div>
                         <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Offer In </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="" name="offer_type" required>
                                  <option value="Percentage" <?php if($edit->offer_type=='Percentage'){echo "selected";}?>>Offer In Percentage</option>
                                    <option value="Amount" <?php if($edit->offer_type=='Amount'){echo "selected";}?>>Offer In Amount</option>
                                 </select>
                                </div>
                                <div  class="col-lg-5">
                               </div>
                                <!-- col-lg-9 -->
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="offer" class="control-label col-lg-3 required">
                            <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The public name for this product. Invalid characters &lt;&gt;;=#{}">  </span> Offer Price</label>
                            <div class="col-lg-5">
                              <div class="row mgbt-xs-0">
                                <div class="col-sm-9">
                                  <input type="text" value="<?php echo $edit->offer_price;?>" required placeholder="Offer In Percentage/Amount" name="offer_price" class="  updateCurrentText " id="offer" >
                                </div>

                              </div>
                            </div>
                          </div>
                           <?php echo form_close();


             }else{

             echo form_open("Product/add_acc_offer",array("class"=>"form-horizontal"));?>


                          <div class="vd_panel-menu">
                            <div>
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Add Offer</button>

                            </div>
                          </div>
                          <h3 class="mgtp-15 mgbt-xs-20"> Add Offer</h3>
                          <div class="form-group">
                            <label for="from_date" class="control-label col-lg-3 required">
                            <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The public name for this product. Invalid characters &lt;&gt;;=#{}">  </span> Offer From Date</label>
                            <div class="col-lg-5">
                              <div class="row mgbt-xs-0">
                                <div class="col-sm-9">
                                  <input type="date" value="" required placeholder="Offer From Date" name="from_date" class="date" id="from_date" >
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="to_date" class="control-label col-lg-3 required">
                            <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The public name for this product. Invalid characters &lt;&gt;;=#{}">  </span> Offer To Date</label>
                            <div class="col-lg-5">
                              <div class="row mgbt-xs-0">
                                <div class="col-sm-9">
                                  <input type="date" value="" required placeholder="Offer To Date" name="to_date" class="date" id="to_date" >
                                </div>

                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Offer In </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="" name="offer_type" required>
                                  <option value="">Select Offer</option>
                                    <option value="Percentage">Offer In Percentage</option>
                                    <option value="Amount">Offer In Amount</option>
                                 </select>
                                </div>
                                <div  class="col-lg-5">
                               </div>
                                <!-- col-lg-9 -->
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="offer" class="control-label col-lg-3 required">
                            <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The public name for this product. Invalid characters &lt;&gt;;=#{}">  </span> Offer Price</label>
                            <div class="col-lg-5">
                              <div class="row mgbt-xs-0">
                                <div class="col-sm-9">
                                  <input type="text" value="" required placeholder="Offer In Percentage/Amount" name="offer_price" class="  updateCurrentText " id="offer" >
                                </div>

                              </div>
                            </div>
                          </div>

                        <?php echo form_close();}?>


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
	$(".minquan").hide();
		$(".not").show();
    $("#quantity").keyup(function (e)
    {
    var $qua = $(this).val();
    if($qua=='0')
    {
      alert('Zero Product not be inserted.');
      this.value='';
    }
});
$("#wholesale_price").keyup(function (e)
{
var $qua = $(this).val();
if($qua=='0')
{
	alert('Zero Product not be inserted.');
	this.value='';
}
});
$(".Subtract_Stock").change(function ()
{
var qua = $(this).val();
if(qua=='Yes')
{
   $("#minquantity").prop('required',true);
	$(".minquan").show();
}else{
   $("#minquantity").prop('required',false);
	$(".minquan").hide();
}
});
$("#minquantity").change(function ()
{
var qua = $(this).val();
var quaa = $("#quantity").val();
//var sku = $("#SKU").val();
//alert(quaa*sku);
if(qua>(quaa))
{
	alert('mininum quantity should be less then product quantity.')
}else{

}
});
});

</script>

<!-- <script>
 $(document).ready(function(){
  $("#row_dim").hide();

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

<script>
  $(document).on('change','#man_1',function(){
        var validcode = 40;
        var validcode1 = 41;
        var code = $(this).val();
        if (code == validcode || code == validcode1) {
            $("#row_dim").show();
        } else {
            $("#row_dim").hide();
        }
    });
</script> -->

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
   // $("#remo1").hide();
   // $("#remo2").hide();
   // $("#remo3").hide();

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

        $("#fileUpload1").on('change', function () {
//alert('kkk');
        if (typeof (FileReader) != "undefined") {

            var image_holder1 = $("#image-holder1");
            image_holder1.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                }).appendTo(image_holder1);
                $("#remo1").show();
                $("#remove_image1").hide();

            }
            image_holder1.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });
        $("#fileupload2").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var image_holder2 = $("#image-holder2");
            image_holder2.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                }).appendTo(image_holder2);
                $("#remo2").show();
                $("#remove_image2").hide();
            }
            image_holder2.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });
        $("#fileupload3").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var image_holder3 = $("#image-holder3");
            image_holder3.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                }).appendTo(image_holder3);
                $("#remo3").show();
                $("#remove_image3").hide();

            }
            image_holder3.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });
         $("#fileupload5").on('change', function () {
        if (typeof (FileReader) != "undefined") {

            var image_holder5 = $("#image-holder5");
            image_holder5.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                }).appendTo(image_holder5);
                $("#remo5").show();
                $("#remove_image5").hide();

            }
            image_holder5.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });
        $("#remo1").on('click', function () {
          $("#image-holder1").hide();
          $(".fabricc_yes_no").val("no");
           $(".oldt").val(" ");
          //var kkk = $(".fabricc_yes_no").val();
          //alert(kkk);
          //alert('image removed');
          $("#remo1").hide();
          $("#remove_image1").hide();
        });
        $("#remo3").on('click', function () {

          $("#image-holder3").hide();
          $(".back_yes_no").val("no");
            $(".oldb").val(" ");
            //alert('image removed');
          $("#remo3").hide();
          $("#remove_image3").hide();
        });
        $("#remo5").on('click', function () {
          $("#image-holder5").hide();
          $(".sizing_guide_yes_no").val("no");
            $(".olds").val(" ");
            //alert('image removed');
          $("#remo5").hide();
          $("#remove_image5").hide();
        });
        $("#remo2").on('click', function () {

          $("#image-holder2").hide();
          $(".front_yes_no").val("no");
            $(".oldf").val(" ");
            //alert('image removed');
          $("#remo2").hide();
          $("#remove_image2").hide();
        });


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

<script>
  $(document).ready(function(){
    $("#quantity").keyup(function (e)
    {
    var $qua = $(this).val();
    if($qua=='0')
    {
      alert('Zero Product not be inserted.');
      this.value='';
    }
});
});

</script>

</body>

<!-- Mirrored from vendroid.venmond.com/pages-ecommerce-product-add.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2016 11:26:07 GMT -->
</html>
