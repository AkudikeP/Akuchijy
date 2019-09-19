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
              <h1>Measurement Guide</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
<?php   $res = $this->db->get_where("meta",array('type'=>'measurement-guide'))->row();
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
                    <input type="hidden" name="type" value="measurement-guide">
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

                            <div  class="panel-body">
                              <div class="tab-content no-bd mgbt-xs-20">
                                <div id="tabinfo" class="tab-pane active">
                                <?php
                                $contant = $this->db->get_where('measurementguide',array('id'=>1))->row();
          					   echo form_open_multipart("Product/measurementguidecontant",array("class"=>"form-horizontal"));?>


                                    
                                    <h3 class="mgtp-15 mgbt-xs-20">Update Measurement Guide</h3>
                                    <div class="form-group">

                                      <div class="col-lg-12 mgbt-xs-10 mgbt-lg-0">
                                        <textarea  name="contant"  id="editor1"  data-rel="ckeditor" rows="3" ><?php echo $contant->contant;?></textarea>
                                      </div>

                                    </div>


                                    <!-- form-group -->

                                  <?php echo form_close();?>
                                </div>
                                <!-- #tabinfo -->

                              </div>
                              <!-- tab-content -->
                             <div class="col-md-12">
                                      <div>
                                      <button type="submit" name="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn"><i class="fa fa-save append-icon"></i>Update Measurement Guide</button>

                                      </div>
                                    </div>
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
                    <!--table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Heading</th>
                          <th>Image</th>
                          <th>Contant</th>
                          <th>URL</th>
                          <th>Facebook</th>
                          <th>Twitter</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>


                         <?php
                         $fab = $this->db->get('brand_contant')->result();
                         $i=1;foreach($fab as $fab){?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td><?php echo $fab->heading;?></td>
                          <td><img src="<?php echo base_url(); ?>assets/images/<?php echo $fab->image;?>" alt=""></td>
                          <td><?php echo $fab->contant;?></td>
                          <td><?php echo $fab->url; ?></td>
                          <td><?php echo $fab->facelink; ?></td>
                          <td><?php echo $fab->twilink; ?></td>
                          <td>
                            <a data-toggle="tooltip" title="" class="btn btn-xs btn-warning" href="<?php echo base_url(); ?>product/brands/<?php echo $fab->id; ?>" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                          <button data-toggle="tooltip" title="" class="btn btn-xs vd_btn vd_bg-red del_fabric" id="<?php echo $fab->id; ?>" type="button" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                          </td>
                        </tr>
                        <?php $i++;}?>

                      </tbody>
                    </table-->
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
</body>

<!-- Mirrored from vendroid.venmond.com/listtables-data-tables.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2016 11:22:00 GMT -->
</html>
