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
              <h1>Tell Your Friend</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
<?php   $res = $this->db->get_where("meta",array('type'=>'tell-your-friend'))->row();
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
                    <input type="hidden" name="type" value="tell-your-friend">
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
          					   echo form_open_multipart("Product/addfriendcontant",array("class"=>"form-horizontal"));?>
									<?php $fcats=$this->db->get_where("tellyourfriend",array('id'=>1))->row(); ?>
                                    <h3 class="mgtp-15 mgbt-xs-20">Add Post</h3>

                                   <div class="form-group">
                                      <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Heading </span></label>
                                      <div class="col-lg-9">
                                        <div class="vd_radio radio-success">
                                      <input type="text" value="<?php echo $fcats->h1; ?>" class="form-control" name="h1" placeholder="Insert Heading" required="" />
                                        </div>

                                      </div>
                                    </div>
                                    <div class="form-group">
                                       <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Heading2 </span></label>
                                       <div class="col-lg-9">
                                         <div class="vd_radio radio-success">
                                       <input type="text" value="<?php echo $fcats->h2; ?>" class="form-control" name="h2" placeholder="Insert Heading" required="" />
                                         </div>

                                       </div>
                                     </div>

                                     <div class="form-group">
                                        <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Heading3 </span></label>
                                        <div class="col-lg-9">
                                          <div class="vd_radio radio-success">
                                        <input type="text" value="<?php echo $fcats->h3; ?>" class="form-control" name="h3" placeholder="Insert Heading" required="" />
                                          </div>

                                        </div>
                                      </div>
                                       <div class="form-group">
                                        <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type"> Coupon code for friend </span></label>
                                        <div class="col-lg-9">
                                          <div class="vd_radio radio-success">
                                        <input type="text" value="<?php echo $fcats->coupon_code_for_friend; ?>" class="form-control" name="coupon_code_for_friend" placeholder="Coupon code for friend" required="" />
                                          </div>

                                        </div>
                                      </div>
                                       <div class="form-group">
                                        <label  class="control-label col-lg-3" ><span data-toggle="tooltip" class="label-tooltip" data-original-title="Product type">  Coupon code for own </span></label>
                                        <div class="col-lg-9">
                                          <div class="vd_radio radio-success">
                                        <input type="text" value="<?php echo $fcats->coupon_code_for_own; ?>" class="form-control" name="coupon_code_for_own" placeholder="Coupon code for own" required="" />
                                          </div>

                                        </div>
                                      </div>


                                    <div class="form-group">
                                      <label class="control-label col-lg-3 file_upload_label"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Format JPG, GIF, PNG. Filesize 8.00 MB max."> Add Images </span> </label>
                                      <div class="col-lg-3"> <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span> Cover Image</span>
                                        <!-- The file input field used as target for the file upload widget -->
                                        <input type="file" name="image" id="fileuploadalt" >
                                        <input type="hidden" name="image_hidden" value="<?php echo $fcats->image; ?>">

                                        </span>

                                      </div>
				</div>


                                 <div class="col-md-7" align="center">
                                      <div>
									  		<button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i> Add Post</button>
										</div>
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

                    <!--seo-->

                  </div>
                </div>
                <!--second-->
                <!--third-->
                <!--second-->
								<!--ck-->

								<!--ck-->


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
               url: '<?php echo base_url();?>index.php/product/brand_contant',
               data: {fid:sid},
               success: function(response){
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
 url: '<?php echo base_url();?>index.php/product/del_vendor_slide_image',
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
var editor = CKEDITOR.replace( 'editor2', {
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '.<?php echo base_url();?>./' );
var editor = CKEDITOR.replace( 'editor3', {
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
