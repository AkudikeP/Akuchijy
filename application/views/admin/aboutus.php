<style>
.active51
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
              <h1>About Us</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
<?php   $res = $this->db->get_where("meta",array('type'=>'about-us'))->row();
//print_r($res);
			//$data['alltagsinfo'] = $taglist->result();
			/*foreach($data['alltagsinfo'] as $res)
			{*/
						$meta_title 			= $res->meta_title;
						$meta_keyword 	= $res->meta_keyword;
						$meta_desc 			= $res->meta_desc;

						$robots 					= $res->robots;
						$googlebot 			= $res->googlebot;
            $google_ana    = $res->google_ana;


	?>              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Meta Tags</h3>
                  </div>
                  <div class="panel-body table-responsive">
										<!--seo-->
										<form class="" action="add_meta" method="post">

										<div class="col-md-4">
		                         <div class="box-body">
									<div class="form-group">
									  <label for="exampleInputEmail1">Meta Title</label>
									  <input class="form-control" id="meta_title" value="<?php echo $meta_title ?>" value="<?php echo $meta_title ?>" name="meta_title" placeholder="Enter meta Title" value=""  />
                    <input type="hidden" name="type" value="about-us">
									</div>
								</div>
							</div>
		                   <div class="col-md-4">
		                         <div class="box-body">
									<div class="form-group">
									  <label for="exampleInputEmail1">Meta Keyword</label>
									  <textarea class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Enter meta Keyword"><?php echo $meta_keyword ?></textarea>
									</div>
								</div>
							</div>
		                   <div class="col-md-4">
		                         <div class="box-body">
									<div class="form-group">
									  <label for="exampleInputEmail1">Meta Description</label>
									  <textarea class="form-control" id="meta_desc" name="meta_desc" placeholder="Enter Meta Description"><?php echo $meta_desc ?></textarea>
									</div>
								</div>
							</div>

		                   <div class="col-md-4">
		                         <div class="box-body">
									<div class="form-group">
									  <label for="exampleInputEmail1">Robots</label>
									  <textarea class="form-control" id="robots" name="robots" placeholder="Enter Robots"><?php echo $robots ?></textarea>
									</div>
								</div>
							</div>
		                   <div class="col-md-4">
		                         <div class="box-body">
									<div class="form-group">
									  <label for="exampleInputEmail1">Googlebot</label>
									  <textarea class="form-control" id="googlebot" name="googlebot" placeholder="Enter googlebot"><?php echo $googlebot ?></textarea>
									</div>
								</div>
							</div>
		                   <div class="col-md-4">
		                         <div class="box-body">
									<div class="form-group">
									  <label for="exampleInputEmail1"> Google Analytics</label>
									  <textarea class="form-control" id="google_ana" name="google_ana" placeholder="Enter  google analytics"><?php echo $google_ana ?></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-4">
										<div class="box-body">
				 <div class="form-group">
					<input type="submit" name="" value="submit">
				 </div>
			 </div>
		 </div>
</form>

										<!--seo-->

                  </div>
                </div>

                <!--second-->
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Posts</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <!--seo-->
                    <div class="vd_content-section clearfix" id="ecommerce-product-add">
                      <div class="row">

                        <div class="col-sm-12 col-md-8 col-lg-12 tab-right">
                          <div class="panel widget panel-bd-left light-widget">
                            <div class="panel-heading no-title"> </div>
                            <div  class="panel-body">
                              <div class="tab-content no-bd mgbt-xs-20">
                                <div id="tabinfo" class="tab-pane active">
                                <?php
          					   if($this->uri->segment(3)){
          						   $edit=$this->db->get_where("howitworks",array("id"=>$this->uri->segment(3)))->row();
          						  // print_r ($edit);
          						   //die;
          						   echo form_open_multipart("Product/addhowitworkscontant/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                                       <div class="vd_panel-menu">
                                      <div>
                                      <button type="submit" name="testimonial" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Update Changes</button>
                                      <a  href="<?php echo base_url();?>index.php/product/aboutus" class="btn btn-default btn-sm">
                                      <i class="fa fa-times append-icon"></i> Cancel Changes</a>
                                      </div>
                                    </div>
                                    <h3 class="mgtp-15 mgbt-xs-20"> <b class="text-info"></b> </h3>
                                    <!--div class="form-group">
                                      <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Content </span> </label>
                                      <div class="col-lg-8">
                                        <div class="row mgbt-xs-0">
                                          <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                           <input type="text" name="content" class="form-control" value="<?php echo $edit->content; ?>"/>
                                          </div>

                                          <!-- col-lg-9 >
                                        </div>
                                      </div>
                                    </div-->
                                    <h3 class="mgtp-15 mgbt-xs-20">Add Aboutus Post</h3>
                                    <div class="form-group">
                                      <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Contant </span> </label>
                                      <div class="col-lg-8">
                                        <div class="row mgbt-xs-0">
                                          <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                            <textarea name="content" class="form-control" required=""><?php echo $edit->contant; ?></textarea>
                                          </div>

                                          <!-- col-lg-9 -->
                                        </div>
                                      </div>
                                    </div>
                                   <div class="form-group">
                                      <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Heading </span></label>
                                      <div class="col-lg-9">
                                        <div class="vd_radio radio-success">
                                      <input type="text" class="form-control" name="heading" value="<?php echo $edit->heading; ?>" placeholder="Insert Heading" required="" />
                                        </div>

                                      </div>
                                    </div>
                                    <div class="form-group">
                                       <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Number </span></label>
                                       <div class="col-lg-9">
                                         <div class="vd_radio radio-success">
                                       <input type="number" class="form-control" value="<?php echo $edit->number; ?>" name="number" placeholder="" required="" />
																			  <input type="hidden" name="type" value="aboutus">
                                        <input type="hidden" name="page" value="aboutus">
																				 </div>

                                       </div>
                                     </div>


                                    <!-- form-group -->

                                    <div class="form-group">
                                      <label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Add Images </span> </label>
                                      <div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span> Cover Image</span>
                                        <input type="file" name="image" id="fileupload1">
                                        <input type="hidden" name="image" value="<?php  echo $edit->image;?>" />
                                        <img class="img img-responsive" src="<?php echo base_url(); ?>assets/images/<?php  echo $edit->image;?>" />
                                        </span>
                                        </span>

                                      </div>




                                    </div>



                                    <!-- form-group -->
                                     <?php echo form_close();


          					   }else{

          					   echo form_open_multipart("Product/addhowitworkscontant",array("class"=>"form-horizontal"));?>


                                    <div class="vd_panel-menu">
                                      <div>
                                      <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> submit</button>

                                      </div>
                                    </div>
                                    <h3 class="mgtp-15 mgbt-xs-20">Add Aboutus Post</h3>
                                    <div class="form-group">
                                      <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Contant </span> </label>
                                      <div class="col-lg-8">
                                        <div class="row mgbt-xs-0">
                                          <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                            <textarea name="content" class="form-control" required=""></textarea>
                                          </div>

                                          <!-- col-lg-9 -->
                                        </div>
                                      </div>
                                    </div>
                                   <div class="form-group">
                                      <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Heading </span></label>
                                      <div class="col-lg-9">
                                        <div class="vd_radio radio-success">
                                      <input type="text" class="form-control" name="heading" placeholder="Insert Heading" required="" />
                                        </div>

                                      </div>
                                    </div>
                                    <div class="form-group">
                                       <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Number </span></label>
                                       <div class="col-lg-9">
                                         <div class="vd_radio radio-success">
                                       <input type="number" class="form-control" name="number" placeholder="Insert Number" required="" />
																			 <input type="hidden" name="type" value="aboutus">
																			  <input type="hidden" name="page" value="aboutus">
																				 </div>

                                       </div>
                                     </div>



                                    <!-- form-group -->

                                    <div class="form-group">
                                      <label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Add Images </span> </label>
                                      <div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span> Cover Image</span>
                                        <!-- The file input field used as target for the file upload widget -->
                                        <input type="file" name="image" id="fileuploadalt" required="">
																				<input type="hidden" name="page" value="aboutus">
                                        </span>

                                      </div>
																		</div>

                                    <!-- form-group -->

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

                    <!--seo-->
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Heading</th>
                          <th>Image</th>
                          <th>Contant</th>
                          <th>Number</th>

                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>


                         <?php
                         $this->db->order_by('number','asc');
                         $fab = $this->db->get_where('howitworks',array('type'=>'aboutus'))->result();
                         $i=1;foreach($fab as $fab){?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td><?php echo $fab->heading;?></td>
                          <td><img src="<?php echo base_url(); ?>assets/images/<?php echo $fab->image;?>" alt=""></td>
                          <td><?php echo $fab->contant;?></td>
                          <td><?php echo $fab->number; ?></td>

                          <td>
                            <a data-toggle="tooltip" title="" class="btn btn-xs btn-warning" href="<?php echo base_url(); ?>product/aboutus/<?php echo $fab->id; ?>" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                          <button data-toggle="tooltip" title="" class="btn btn-xs vd_btn vd_bg-red del_fabric" id="<?php echo $fab->id; ?>" type="button" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                          </td>
                        </tr>
                        <?php $i++;}?>

                      </tbody>
                    </table>
                  </div>
                </div>
                <!--second-->
                <!--third-->
                <!--second-->
								<!--ck-->

								<!--ck-->
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Banner</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <!--seo-->
                    <div class="vd_content-section clearfix" id="ecommerce-product-add">
                      <div class="row">

                        <div class="col-sm-12 col-md-8 col-lg-12 tab-right">
                          <div class="panel widget panel-bd-left light-widget">
                            <div class="panel-heading no-title"> </div>
                            <div  class="panel-body">
                              <div class="tab-content no-bd mgbt-xs-20">
                                <div id="tabinfo" class="tab-pane active">
                                <?php


                       echo form_open_multipart("Product/update_banner_aboutus",array("class"=>"form-horizontal"));?>


                                    <div class="vd_panel-menu">
                                      <div>
                                      <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Add Slider Image</button>

                                      </div>
                                    </div>
                                    <h3 class="mgtp-15 mgbt-xs-20">Add Images</h3>


                                    <div class="form-group">
                                      <label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Add Images </span> </label>
                                      <div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Images</span>
                                        <!-- The file input field used as target for the file upload widget -->
                                        <input type="file" name="testimonial" id="fileuploadalt" required="">
                                        </span>

                                      </div>

                                    </div>

                                    <!-- form-group -->

                                  <?php echo form_close(); ?>
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

                    <!--seo-->

                  </div>
                </div>

                <!--second-->
								<div class="panel widget">
									<div class="panel-heading vd_bg-grey">
										<h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Text Contant</h3>
									</div>
									<div class="panel-body table-responsive">
										<!--seo-->
										<div class="vd_content-section clearfix" id="ecommerce-product-add">
											<div class="row">

												<div class="col-sm-12 col-md-8 col-lg-12 tab-right">
													<div class="panel widget panel-bd-left light-widget">

														<div  class="panel-body">
															<div class="tab-content no-bd mgbt-xs-20">
																<div id="tabinfo" class="tab-pane active">
																<?php


											 echo form_open_multipart("Product/aboutus_pagecontant",array("class"=>"form-horizontal"));?>


																		<div class="vd_panel-menu">
																			<div>
																			<button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Submit</button>

																			</div>
																		</div>
																		<h3 class="mgtp-15 mgbt-xs-20"></h3>


																		<div class="form-group">
																			<?php
																		  $this->db->where('page_title Like','%About Us%');
																		  $contant = $this->db->get('tbl_pages')->row();
																		 // echo $contant->page_desc; ?>
																									<div class="col-lg-12">
																										<div class="vd_radio radio-success">
																									<textarea class="form-control" id="editor1" name="page_desc" ><?php echo  $contant->page_desc;?></textarea>
																										</div>
																									</div>
																								</div>
                                      <div class="form-group">
                                     
                                                  <div class="col-lg-12">
                                                    <div class="vd_radio radio-success">
                                                  <textarea class="form-control" id="editor2" name="some_other_text" ><?php echo  $contant->some_other_text;?></textarea>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-12">
                                                    <div class="vd_radio radio-success">
                                                  <input type="text" class="form-control" name="heading1" placeholder="heading 1" value="<?php echo  $contant->heading1;?>">
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-12">
                                                    <div class="vd_radio radio-success">
                                                  <input type="text" class="form-control" name="con1" placeholder="contant 1" value="<?php echo  $contant->con1;?>">
                                                    </div>
                                                  </div>
                                                    <div class="col-lg-12">
                                                    <div class="vd_radio radio-success">
                                                  <input type="text" class="form-control" name="heading2" placeholder="heading 2" value="<?php echo  $contant->heading2;?>">
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-12">
                                                    <div class="vd_radio radio-success">
                                                  <input type="text" class="form-control" name="con2" placeholder="contant 2" value="<?php echo  $contant->con2;?>" >
                                                    </div>
                                                  </div>
                                                    <div class="col-lg-12">
                                                    <div class="vd_radio radio-success">
                                                  <input type="text" class="form-control" name="heading3" placeholder="heading 3" value="<?php echo  $contant->heading3;?>">
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-12">
                                                    <div class="vd_radio radio-success">
                                                  <input type="text" class="form-control" name="con3" placeholder="contant 3" value="<?php echo  $contant->con3;?>">
                                                    </div>
                                                  </div>
                                                </div>

																		<!-- form-group -->

																	<?php echo form_close(); ?>
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

										<!--seo-->

									</div>
								</div>
								<!--second-->

								<!--third-->
								<!--second-->
								<div class="panel widget">
									<div class="panel-heading vd_bg-grey">
										<h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Posts</h3>
									</div>
									<div class="panel-body table-responsive">
										<!--seo-->
										<div class="vd_content-section clearfix" id="ecommerce-product-add">
											<div class="row">

												<div class="col-sm-12 col-md-8 col-lg-12 tab-right">
													<div class="panel widget panel-bd-left light-widget">
														<div class="panel-heading no-title"> </div>
														<div  class="panel-body">
															<div class="tab-content no-bd mgbt-xs-20">
																<div id="tabinfo" class="tab-pane active">
																<?php
											 if($this->uri->segment(4)){
												 $edit=$this->db->get_where("team",array("id"=>$this->uri->segment(4)))->row();
												// print_r ($edit);
												 //die;
												 echo form_open_multipart("Product/addteamcontant/".$this->uri->segment(4),array("class"=>"form-horizontal"));?>
																			 <div class="vd_panel-menu">
																			<div>
																			<button type="submit" name="testimonial" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Update Changes</button>
																			<a  href="<?php echo base_url();?>index.php/product/aboutus" class="btn btn-default btn-sm">
																			<i class="fa fa-times append-icon"></i> Cancel Changes</a>
																			</div>
																		</div>
																		<h3 class="mgtp-15 mgbt-xs-20"> <b class="text-info"></b> </h3>
																		<!--div class="form-group">
																			<label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Content </span> </label>
																			<div class="col-lg-8">
																				<div class="row mgbt-xs-0">
																					<div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
																					 <input type="text" name="content" class="form-control" value="<?php echo $edit->content; ?>"/>
																					</div>

																					<!-- col-lg-9 >
																				</div>
																			</div>
																		</div-->
																		<h3 class="mgtp-15 mgbt-xs-20">Team</h3>
																		<div class="form-group">
																			<label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Contant </span> </label>
																			<div class="col-lg-8">
																				<div class="row mgbt-xs-0">
																					<div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
																						<textarea name="content" class="form-control" required=""><?php echo $edit->contant; ?></textarea>
																					</div>

																					<!-- col-lg-9 -->
																				</div>
																			</div>
																		</div>
																	 <div class="form-group">
																			<label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Name </span></label>
																			<div class="col-lg-9">
																				<div class="vd_radio radio-success">
																			<input type="text" class="form-control" name="heading" value="<?php echo $edit->heading; ?>" placeholder="Insert Heading" required="" />
																				</div>

																			</div>
																		</div>
																		<div class="form-group">
																			 <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Post </span></label>
																			 <div class="col-lg-9">
																				 <div class="vd_radio radio-success">
																			 <input type="text" class="form-control" name="post" value="<?php echo $edit->post; ?>" placeholder="Insert Post" required="" />
																				 </div>

																			 </div>
																		 </div>
																		<div class="form-group">
																			 <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Linkdin </span></label>
																			 <div class="col-lg-9">
																				 <div class="vd_radio radio-success">
																			 <input type="text" class="form-control" value="<?php echo $edit->inlink; ?>" name="inlink" placeholder="Insert URL" required="" />
																				 </div>

																			 </div>
																		 </div>
																		 <div class="form-group">
																				<label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Facebook </span></label>
																				<div class="col-lg-9">
																					<div class="vd_radio radio-success">
																				<input type="text" class="form-control" value="<?php echo $edit->facelink; ?>" name="facelink" placeholder="Facebook Link" required="" />
																					</div>

																				</div>
																			</div>
																			<div class="form-group">
																				 <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Twitter </span></label>
																				 <div class="col-lg-9">
																					 <div class="vd_radio radio-success">
																				 <input type="text" class="form-control" name="twilink" value="<?php echo $edit->twilink; ?>" placeholder="Twitter Link" required="" />
																					 </div>

																				 </div>
																			 </div>

																		<!-- form-group -->

																		<div class="form-group">
																			<label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Add Images </span> </label>
																			<div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span> Cover Image</span>
																				<input type="file" name="image" id="fileupload1">
																				<input type="hidden" name="image" value="<?php  echo $edit->image;?>" />
																				<img class="img img-responsive" src="<?php echo base_url(); ?>assets/images/<?php  echo $edit->image;?>" />
																				</span>
																				</span>

																			</div>




																		</div>



																		<!-- form-group -->
																		 <?php echo form_close();


											 }else{

											 echo form_open_multipart("Product/addteamcontant",array("class"=>"form-horizontal"));?>


																		<div class="vd_panel-menu">
																			<div>
																			<button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i>Team</button>

																			</div>
																		</div>
																		<h3 class="mgtp-15 mgbt-xs-20">Team</h3>
																		<div class="form-group">
																			<label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Contant </span> </label>
																			<div class="col-lg-8">
																				<div class="row mgbt-xs-0">
																					<div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
																						<textarea name="content" class="form-control" required=""></textarea>
																					</div>

																					<!-- col-lg-9 -->
																				</div>
																			</div>
																		</div>
																	 <div class="form-group">
																			<label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Name </span></label>
																			<div class="col-lg-9">
																				<div class="vd_radio radio-success">
																			<input type="text" class="form-control" name="heading" placeholder="Insert Heading" required="" />
																				</div>

																			</div>
																		</div>
																		<div class="form-group">
																			 <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Post </span></label>
																			 <div class="col-lg-9">
																				 <div class="vd_radio radio-success">
																			 <input type="text" class="form-control" name="post" placeholder="Insert Post" required="" />
																				 </div>

																			 </div>
																		 </div>
																		<div class="form-group">
																			 <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Likdin </span></label>
																			 <div class="col-lg-9">
																				 <div class="vd_radio radio-success">
																			 <input type="text" class="form-control" name="inlink" placeholder="Insert URL" required="" />
																				 </div>

																			 </div>
																		 </div>
																		 <div class="form-group">
																				<label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Facebook </span></label>
																				<div class="col-lg-9">
																					<div class="vd_radio radio-success">
																				<input type="text" class="form-control" name="facelink" placeholder="Facebook Link" required="" />
																					</div>

																				</div>
																			</div>
																			<div class="form-group">
																				 <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Twitter </span></label>
																				 <div class="col-lg-9">
																					 <div class="vd_radio radio-success">
																				 <input type="text" class="form-control" name="twilink" placeholder="Twitter Link" required="" />
																					 </div>

																				 </div>
																			 </div>

																		<!-- form-group -->

																		<div class="form-group">
																			<label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Add Images </span> </label>
																			<div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span> Cover Image</span>
																				<!-- The file input field used as target for the file upload widget -->
																				<input type="file" name="image" id="fileuploadalt" required="">
																				</span>

																			</div>




																		</div>

																		<!-- form-group -->

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

										<!--seo-->
										<table class="table table-striped" id="data-tables1">
											<thead>
												<tr>
													<th>S.No.</th>
													<th>Name</th>
													<th>Image</th>
													<th>Contant</th>
													<th>Post</th>
													<th>Linkdin</th>
													<th>Facebook</th>
													<th>Twitter</th>
												 <th>Action</th>
												</tr>
											</thead>
											<tbody>


												 <?php
												 $fab = $this->db->get('team')->result();
												 $i=1;foreach($fab as $fab){?>
												<tr class="gradeA">
													<td class="center"><?php echo $i;?></td>
													<td><?php echo $fab->heading;?></td>
													<td><img src="<?php echo base_url(); ?>assets/images/<?php echo $fab->image;?>" alt=""   width="20%"></td>
													<td><?php echo $fab->contant;?></td>
													<td><?php echo $fab->post;?></td>
													<td><?php echo $fab->inlink; ?></td>
													<td><?php echo $fab->facelink; ?></td>
													<td><?php echo $fab->twilink; ?></td>
													<td>
														<a data-toggle="tooltip" title="" class="btn btn-xs btn-warning" href="<?php echo base_url(); ?>product/aboutus/kk/<?php echo $fab->id; ?>" data-original-title="Edit"><i class="fa fa-edit"></i></a>
													<button data-toggle="tooltip" title="" class="btn btn-xs vd_btn vd_bg-red del_about" id="<?php echo $fab->id; ?>" type="button" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
													</td>
												</tr>
												<?php $i++;}?>

											</tbody>
										</table>
									</div>
								</div>
								<!--second-->
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
               url: '<?php echo base_url();?>index.php/product/about_brand_contant',
               data: {fid:sid},
               success: function(response){
               }
               });}},
                cancel: function () {},}});  });
                                                            $(".del_about").click(function(){

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
               url: '<?php echo base_url();?>index.php/product/about_us_post',
               data: {fid:sid},
               success: function(response){
                console.log(response);
               },error: function(response){
                console.log(response);
               }
               });}},
                cancel: function () {},}});  });
                $(".del_img").click(function(){

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
 url: '<?php echo base_url();?>index.php/product/del_brand_slide_image',
 data: {fid:sid},
 success: function(response){
 }
 });}},
  cancel: function () {},}});  });

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
               url: '<?php echo base_url();?>index.php/Product/home_disable',
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
               url: '<?php echo base_url();?>index.php/Product/home_enable',
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
var editor = CKEDITOR.replace( 'editor2', {
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '.<?php echo base_url();?>./' );
</script>
</body>

<!-- Mirrored from vendroid.venmond.com/listtables-data-tables.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2016 11:22:00 GMT -->
</html>
