<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
.active7
{
	background-color:#1fae66 !important;
}
.image-holder {
  max-height: 200px;
  max-width: 200px;
}
@media (min-width: 768px)
{
  .form-horizontal .control-label {
    text-align: left !important;
  }
}
.form-wizard .nav > li > a{padding: 10px; margin-right:0; text-align: left; color:#888888;}
.tab-right{margin-left:0px; margin-top:0px; }
.tab-right .panel {margin-right:-30px;}
.tab-right .vd_panel-menu {right: 28px; top: -15px;}
.tab-right h3{border-bottom:1px solid #EEEEEE;}
table .vd_radio label:after{top:0;}
@media (max-width: 767px) {
  .tab-right{margin-left:0; margin-top:0;}
  .tab-right .panel{margin-right: 0;}
}
</style>
<script type="text/javascript" src="<?=base_url();?>adminassets/js/jquery.js"></script>
<script src="<?=base_url();?>assets/js/add_designs_view.js"></script>
<script>baseUrl="<?=base_url();?>";</script>

<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Add Catalogue</h1>
              <div class="vd_panel-menu visible-xs">
                <div class="menu">
                  <div data-action="click-trigger"> <span class="menu-icon mgr-10"><i class="fa fa-bars"></i></span>Menu <i class="fa fa-angle-down"></i> </div>
                  <div data-action="click-target" class="vd_mega-menu-content width-xs-2 left-xs" style="display: none;">
                    <div class="child-menu">
                      <div class="content-list content-menu">
                        <ul class="list-wrapper pd-lr-10">
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
                    <li class="active"><a href="#tabinfo" data-toggle="tab"> <i class="fa fa-info-circle append-icon"></i> Products </a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-12 col-md-8 col-lg-12 tab-right">
                <div class="panel widget panel-bd-left light-widget">
                  <div class="panel-heading no-title"> </div>
                  <div  class="panel-body">
                    <div class="tab-content no-bd mgbt-xs-20">
                      <?php if( ! empty($success)): ?>
                          <div class="alert alert-success" style="display: inline-block;padding-right: 3rem;">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Success!</strong><hr style="margin-top: 0;">
                              <?=$success;?>
                          </div>
                      <?php endif; ?>
                      <?php if( ! empty(validation_errors()) || ! empty($errors)): ?>
                          <div class="alert alert-danger" style="display: inline-block;padding-right: 3rem;">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Error!</strong><hr style="margin-top: 0;">
                              <?=validation_errors();?>
                              <?=$errors;?>
                          </div>
                      <?php endif; ?>
                      <div id="tabinfo" class="tab-pane active">
                       <?php
					                echo form_open_multipart("Vendor/add_designs",array("class"=>"form-horizontal"));?>
                          <h3 class="mgtp-15 mgbt-xs-20">Catalogue Details</h3>
                           <div class="tx-rtt">
                           <div class="form-group">
                            <label for="name" class="control-label col-lg-2 required">
                            <span>Name </span></label>
                            <div class="col-lg-5">
                              <div class="mgbt-xs-0">
                                <input type="text" required placeholder="Name of product" name="name" id="name" maxlength="100">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-2"> <span> Category </span> </label>
                            <div class="col-lg-5">
                              <div class="mgbt-xs-0">
                                <select class="width-70" name="category" id="category" required>
                                  <option>Select</option>
                                  <option value="1">Women</option>
                                  <option value="2">Men</option>
                                  <option value="3">Kids</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-2">
                            <span>Type</span></label>
                            <div class="col-lg-5">
                              <div class="mgbt-xs-0">
                                <select class="width-70" name="type" id="type" required>
                                  <option>Select</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="design-cost" class="control-label col-lg-2"> 
                              <span>Design cost</span>
                            </label>
                            <div class="col-lg-5">
                              <div class="mgbt-xs-0">
                                <div class="input-group width-70"><span class="input-group-addon">&#8358;</span>
                                  <input placeholder="Cost of making the cloth." type="text" id="design-cost" class="numbers-only" name="design-cost" required>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="material-price" class="control-label col-lg-2"> 
                              <span>Material Price</span>
                            </label>
                            <div class="col-lg-5">
                              <div class="mgbt-xs-0">
                                <div class="input-group width-70"><span class="input-group-addon">&#8358;</span>
                                  <input placeholder="This is the price of the material alone." type="text" id="material-cost" class="numbers-only" name="material-cost" required>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="description_1" class="control-label col-lg-2"> <span> Description </span> </label>
                            <div class="col-lg-8 mgbt-xs-10 mgbt-lg-0">
                              <textarea name="desc" id="desc" data-rel="ckeditor" rows="3"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-2 file_upload_label">
                            <span> Add Images </span> </label>
                            <div class="col-lg-10">
                              <div class="col-lg-3 row col-sm-4 col-md-4">
                                <span class="btn vd_btn vd_bg-green fileinput-button">
                                  <span>Cover Image</span>
                                  <div class="image-holder"></div>
                                  <input type="file" name="cover" class="fileupload">
                                </span>
                              <div class="btn remove-btn" id="remo1">Remove</div>
                            </div>
                              <div class="col-lg-3 row col-sm-4 col-md-4"> 
                              <span class="btn vd_btn vd_bg-green fileinput-button">
                              <span>Front Side</span><div class="image-holder"></div>
                                <input type="file" name="front" class="fileupload" required>
                                </span>
                                <div id="remo2" class="btn remove-btn">Remove</div>
                                </div>
                              <div class="col-lg-3 row col-sm-4 col-md-4">
                                <span class="btn vd_btn vd_bg-green fileinput-button">
                                <span>Back Side</span><div class="image-holder"></div>
                                  <input type="file" name="back" class="fileupload" required>
                                  </span>
                                  <div id="remo3" class="btn remove-btn">Remove</div>
                              </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                            <div class="col-lg-10">
                              <div class="col-lg-3 row col-sm-4 col-md-4">
                                <span class="btn vd_btn vd_bg-green fileinput-button">
                                <span>Right side view</span><div class="image-holder"></div>
                                  <input type="file" name="right" class="fileupload">
                                  </span>
                                  <div id="remo4" class="btn remove-btn">Remove</div>
                              </div>
                              <div class="col-lg-3 row col-sm-4 col-md-4">
                                <span class="btn vd_btn vd_bg-green fileinput-button">
                                <span>Left side view</span>
                                <div class="image-holder"></div>
                                  <input type="file" name="left" class="fileupload">
                                  </span>
                                  <div id="remo5" class="btn remove-btn">Remove</div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-lg-2 file_upload_label">
                            <span>Add style guide</span></label>
                            <div class="col-lg-3 row">
                              <span class="btn vd_btn vd_bg-green fileinput-button">
                                <span>Sizing Guide Image</span>
                                <div class="image-holder"></div>
                                <input type="file" name="design-sizing-guide" class="fileupload">
                              </span>
                              <div id="remo6" class="btn remove-btn">Remove</div>
                            </div>
                          </div>
                             <br>
                           <div class="col-md-5" align="center">
                            <div>
                            <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i>Add Design</button>
                            </div>
                          </div>
                        </div>
                        <?php echo form_close();?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
</script>



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
