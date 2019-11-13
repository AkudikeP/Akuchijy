
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
<script>
$(document).ready(function(){
  $(".styledel").click(function(){
    var r = confirm("Are You Sure");
    if (r == true) {
       var sid=$(this).attr('id');
              console.log(sid);
              $(this).closest("tr").remove();
              $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Product/Make_addon_del',
               data: {sid:sid},
               success: function(response){
                 alert(response);
               }
               });
    } else {

    }
});
});
</script>

          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Manage Addons</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Manage Addons</h3>
                  </div>
                  <div class="panel-body table-responsive">
             <?php //print_r($addon);
             //echo "<br>"; print_r($cats); ?>
<form action="<?php echo base_url().'product/update_addon_id/'.$this->uri->segment(3); ?>" method="post" enctype="multipart/form-data">

<div class="form-group" style="margin-top:10px;">
                        <label class="col-sm-3 control-label">Categories</label>
                        <div class="col-sm-9 controls">
                       <select name="parent_id">
<?php
 foreach($cats as $cat){
  $attr = $this->db->get_where("attributes",array("aid"=>$cat->addon_page_id))->row();
  $catname = $this->db->get_where("category",array("cid"=>$attr->cat))->row();
  ?>
  <option value="<?php echo $cat->id ?>" <?php if($cat->id==$addon->add_on_parent){echo "selected"; } ?>><?php echo  $cat->add_on_name ?> from <?php echo $catname->cat_name; ?></option>
<?php } ?>
</select>
                        </div>
                      </div>
<div class="form-group" style="margin-top:10px;"><br />
                        <label class="col-sm-3 control-label">Addon Name</label>
                        <div class="col-sm-9 controls">
                      <input type="text" placeholder="addon name" name="name" value="<?php echo $addon->add_on_name; ?>" style="margin-top: 10px;">
                        </div>
                      </div>


<div class="form-group" style="margin-top:10px;"><br />
                        <label class="col-sm-3 control-label">Addon Price</label>
                        <div class="col-sm-9 controls">
                      <input type="text" placeholder="addon price" value="<?php echo $addon->add_on_price; ?>" name="price" style="
    margin-top: 10px;
">
                        </div>
                      </div>


                    <div class="form-group">


                        <div class="col-sm-3 controls">
                        </div><div class="col-sm-3 controls">
                        <img src="<?php echo base_url(); ?>/adminassets/styles/<?php echo $addon->add_on_image; ?>" alt=" ">
                      </div>
                      <div class="col-sm-3 controls" ><br />
                      <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Update Image</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile" multiple><br />
                    </span>
                       </div>
                      <div class="col-sm-4 controls"><br />
                       <button type="submit" name="submit" class="btn btn-primary">Update Addon</button>
                    </div>
                    </div>

</form>



                  </div>
                </div>
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
 <script>
          $(document).ready(function(){
            $(".attrdel").click(function(){
              var aid=$(this).attr('id');//alert(aid);
              $(this).closest("tr").remove();
              $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>product/attribute_del',
               data: {aid:aid},
               success: function(response){
                 //alert(response);
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


</body>

<!-- Mirrored from vendroid.venmond.com/listtables-data-tables.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2016 11:22:00 GMT -->
</html>
<?php //print_r($cats); ?>










<?php //print_r($cats); ?>














<?php //print_r($cats); ?>
