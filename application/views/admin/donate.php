<style>
.active51
{
	background-color:#1fae66 !important;
}
</style>


<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">
<style>

						.form-wizard .nav > li > a{padding: 10px; margin-right:0; text-align: left; color:#888888;}
                        .tab-right{}
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
		<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1><?php if($this->uri->segment(3)){echo "Donate";}else{echo "Donate";}?></h1>
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
					<?php   $res = $this->db->get_where("meta",array('type'=>'donate'))->row();
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


						?>

          <div class="vd_content-section clearfix" id="ecommerce-product-add">
            <div class="row">
              <div class="col-sm-2 col-md-4 col-lg-2">
                <div class="form-wizard condensed mgbt-xs-20">
                  <ul class="nav nav-tabs nav-stacked">
                    <li class="active"><a href="#tabinfo" data-toggle="tab"> <i class="fa fa-info-circle append-icon"></i> Donate </a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-10 col-md-8 col-lg-12 tab-right">
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
										<input type="hidden" name="type" value="donate">
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
									<!--div class="form-group">
										<label for="exampleInputEmail1"> Google Analytics</label>
										<textarea class="form-control" id="google_ana" name="google_ana" placeholder="Enter  google analytics"><?php echo $google_ana ?></textarea>
									</div-->
								</div>
							</div>
							<div class="col-md-4" style="padding: 3%">
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
                <div class="panel widget panel-bd-left light-widget">
                  <div class="panel-heading no-title"> </div>
                  <div  class="panel-body">
                    <div class="tab-content no-bd mgbt-xs-20">
                      <div id="tabinfo" class="tab-pane active">
                      <?php
					   echo form_open_multipart("Product/donateupdate",array("class"=>"form-horizontal"));
						foreach($donatetext as $text)
					   {
					   		$image = $text->banner_img;
                echo $banner2 = $text->banner2;
							$donate_desc = $text->donate_desc;
							if($image == ''){ $userimg = 'default-user-image.png';}else{ $userimg = $image;}
              if($banner2 == ''){ $userimg_b = 'default-user-image.png';}else{ $userimg_b = $banner2;}

							$image1 = $text->img1;
							$image2 = $text->img2;
							$image3 = $text->img3;
							$image4 = $text->extra_img;
							if($image1 == ''){ $userimg1 = 'default-user-image.png';}else{ $userimg1 = $image1;}
							if($image2 == ''){ $userimg2 = 'default-user-image.png';}else{ $userimg2 = $image2;}
							if($image3 == ''){ $userimg3 = 'default-user-image.png';}else{ $userimg3 = $image3;}
							if($image4 == ''){ $userimg4 = 'default-user-image.png';}else{ $userimg4 = $image4;}

							$image5 = $text->otherimg1;
							$image6  = $text->otherimg2;
							$image7  = $text->otherimg3;
							$image8  = $text->otherimg4;
              $img_title1 = $text->img_title1;
              $img_title2  = $text->img_title2;
              $img_title3  = $text->img_title3;

							if($image5 == ''){ $userimg5 = 'default-user-image.png';}else{ $userimg5 = $image5;}
							if($image6 == ''){ $userimg6 = 'default-user-image.png';}else{ $userimg6 = $image6;}
							if($image7 == ''){ $userimg7 = 'default-user-image.png';}else{ $userimg7 = $image7;}
							if($image8 == ''){ $userimg8 = 'default-user-image.png';}else{ $userimg8 = $image8;}

							$othertitle1  = $text->othertitle1;
							$othertitle2  = $text->othertitle2;
							$othertitle3  = $text->othertitle3;
							$othertitle4  = $text->othertitle4;
							$othertext1  = $text->othertext1;
							$othertext2  = $text->othertext2;
							$othertext3  = $text->othertext3;
							$othertext4  = $text->othertext4;
					   }
					   ?>
                          <div class="vd_panel-menu">
                            <div>
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Update</button>

                            </div>
                          </div>
                          <h3 class="mgtp-15 mgbt-xs-20">Donate</h3>

             <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Banner Image 2 </span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                              <input type="file" name="userfile_b" id="userimage" >
                              <input type="hidden" name="userimage_b" value="<?php echo $banner2;?>" />
                              </div>
                            </div>
              <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                <img src="<?php echo base_url();?>assets/images/<?php echo $userimg_b;?>"  alt="User Image" width="150" />
                              </div>
                            </div>
                          </div>

						 <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Banner Image </span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                              <input type="file" name="userfile" id="userimage" >
                              <input type="hidden" name="userimage" value="<?php echo $image;?>" />
                              </div>
                            </div>
							<div class="col-lg-5">
                              <div class="vd_radio radio-success">
							  <img src="<?php echo base_url();?>assets/images/<?php echo $userimg;?>"  alt="User Image" width="150" />
                              </div>
                            </div>
                          </div>
						 <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Charity Image 1</span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                              <input type="file" name="userfile1" id="userimage1" >
                              <input type="hidden" name="userimage1" value="<?php echo $image1;?>" />
                              </div>
                            </div>
							<div class="col-lg-5">
                              <div class="vd_radio radio-success">
							  <img src="<?php echo base_url();?>assets/images/<?php echo $userimg1;?>"  alt="User Image" width="50" />
                              </div>
                            </div>
                          </div>
                           <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Title </span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                              <input type="text" name="img_title1" value="<?php echo $img_title1 ?>" >
                              
                              </div>
                            </div>
              
                          </div>
						<div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">Charity  Image 2</span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                              <input type="file" name="userfile2" id="userimage2" >
                              <input type="hidden" name="userimage2" value="<?php echo $image2;?>" />
                              </div>
                            </div>
							<div class="col-lg-5">
                              <div class="vd_radio radio-success">
							  <img src="<?php echo base_url();?>assets/images/<?php echo $userimg2;?>"  alt="User Image" width="50" />
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Title </span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                              <input type="text" name="img_title2" value="<?php echo $img_title2 ?>" >
                              
                              </div>
                            </div>
              
                          </div>
						<div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Charity Image 3</span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                              <input type="file" name="userfile3" id="userimage3" >
                              <input type="hidden" name="userimage3" value="<?php echo $image3;?>" />
                              </div>
                            </div>
							<div class="col-lg-5">
                              <div class="vd_radio radio-success">
							  <img src="<?php echo base_url();?>assets/images/<?php echo $userimg3;?>"  alt="User Image" width="50" />
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Title </span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                              <input type="text" name="img_title3" value="<?php echo $img_title3 ?>" >
                              
                              </div>
                            </div>
              
                          </div>

							<div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate for Charity </span></label>
                            <div class="col-lg-10">
                              <div class="vd_radio radio-success">
                            <textarea class="form-control" id="editor1" name="donate_desc" ><?php echo $donate_desc;?></textarea>
                              </div>
                            </div>
                          </div>
						<div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Extra Image </span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                               <input type="file" name="userfile4" id="userimage4" >
                              <input type="hidden" name="userimage4" value="<?php echo $image4;?>" />
                              </div>
                            </div>
							<div class="col-lg-5">
                              <div class="vd_radio radio-success">
							  <img src="<?php echo base_url();?>assets/images/<?php echo $userimg4;?>"  alt="User Image" width="150" />
                              </div>
                            </div>
                          </div>
						  <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate Image  1</span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                               <input type="file" name="userfile5" id="userimage5" >
                              <input type="hidden" name="userimage5" value="<?php echo $image5;?>" />
                              </div>
                            </div>
							<div class="col-lg-5">
                              <div class="vd_radio radio-success">
							  <img src="<?php echo base_url();?>assets/images/<?php echo $userimg5;?>"  alt="User Image" width="150" />
                              </div>
                            </div>
                          </div>
						  <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate Title  1</span></label>
                            <div class="col-lg-10">
                              <div class="vd_radio radio-success">
                               <input type="text" name="othertitle1" id="othertitle1" class="form-control" value="<?php echo $othertitle1;?>">
                              </div>
                            </div>
                          </div>
						  <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate Description  1</span></label>
                            <div class="col-lg-10">
                              <div class="vd_radio radio-success">
                               <textarea name="othertext1" id="othertext1" class="form-control"><?php echo $othertext1;?></textarea>
                              </div>
                            </div>
                          </div>

						  <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate Image  2</span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                               <input type="file" name="userfile6" id="userimage6" >
                              <input type="hidden" name="userimage6" value="<?php echo $image6;?>" />
                              </div>
                            </div>
							<div class="col-lg-5">
                              <div class="vd_radio radio-success">
							  <img src="<?php echo base_url();?>assets/images/<?php echo $userimg6;?>"  alt="User Image" width="150" />
                              </div>
                            </div>
                          </div>
						  <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate Title  2</span></label>
                            <div class="col-lg-10">
                              <div class="vd_radio radio-success">
                               <input type="text" name="othertitle2" id="othertitle2" class="form-control" value="<?php echo $othertitle2;?>">
                              </div>
                            </div>
                          </div>
						  <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate Description  2</span></label>
                            <div class="col-lg-10">
                              <div class="vd_radio radio-success">
                               <textarea name="othertext2" id="othertext2" class="form-control"><?php echo $othertext2;?></textarea>
                              </div>
                            </div>
                          </div>

						  <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate Image  3</span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                               <input type="file" name="userfile7" id="userimage7" >
                              <input type="hidden" name="userimage7" value="<?php echo $image7;?>" />
                              </div>
                            </div>
							<div class="col-lg-5">
                              <div class="vd_radio radio-success">
							  <img src="<?php echo base_url();?>assets/images/<?php echo $userimg7;?>"  alt="User Image" width="150" />
                              </div>
                            </div>
                          </div>
						  <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate Title  3</span></label>
                            <div class="col-lg-10">
                              <div class="vd_radio radio-success">
                               <input type="text" name="othertitle3" id="othertitle3" class="form-control" value="<?php echo $othertitle3;?>">
                              </div>
                            </div>
                          </div>
						  <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate Description  3</span></label>
                            <div class="col-lg-10">
                              <div class="vd_radio radio-success">
                               <textarea name="othertext3" id="othertext3" class="form-control"><?php echo $othertext3;?></textarea>
                              </div>
                            </div>
                          </div>

						  <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate Image  4</span></label>
                            <div class="col-lg-5">
                              <div class="vd_radio radio-success">
                               <input type="file" name="userfile8" id="userimage8" >
                              <input type="hidden" name="userimage8" value="<?php echo $image8;?>" />
                              </div>
                            </div>
							<div class="col-lg-5">
                              <div class="vd_radio radio-success">
							  <img src="<?php echo base_url();?>assets/images/<?php echo $userimg8;?>"  alt="User Image" width="150" />
                              </div>
                            </div>
                          </div>
						  <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate Title  4</span></label>
                            <div class="col-lg-10">
                              <div class="vd_radio radio-success">
                               <input type="text" name="othertitle4" id="othertitle4" class="form-control" value="<?php echo $othertitle4;?>">
                              </div>
                            </div>
                          </div>
						  <div class="form-group">
                            <label  class="control-label col-lg-2" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Donate Description  4</span></label>
                            <div class="col-lg-10">
                              <div class="vd_radio radio-success">
                               <textarea name="othertext4" id="othertext4" class="form-control"><?php echo $othertext4;?></textarea>
                              </div>
                            </div>
                          </div>

						<div align="right">
                         <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Update</button>
						 </div>

                        <?php echo form_close();?>
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
                  	Copyright &copy;2016 Ansvel. All Rights Reserved
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
