<style>
.active2
{
	background-color:#1fae66 !important;
}
</style>
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">
     <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>

<link rel="stylesheet" href="https://craftpip.github.io/jquery-confirm/demo/libs/bundled.css">
    <link rel="stylesheet" type="text/css" href="https://craftpip.github.io/jquery-confirm/css/jquery-confirm.css"/>
    <script src="https://craftpip.github.io/jquery-confirm/demo/libs/bundled.js"></script>
    <script type="text/javascript" src="https://craftpip.github.io/jquery-confirm/js/jquery-confirm.js"></script>

<script>
$(document).ready(function(){
  $(".styledel").click(function(){
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
                                          //console.log(sid);
                                          thisvari.closest("tr").remove();
                                          $.ajax({
                                           type: "POST",
                                           url: '<?php echo base_url();?>index.php/Product/Make_addon_del',
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

          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Make Add-Ons</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Make Add-Ons</h3>
                  </div>
                  <div class="panel-body table-responsive">

<form action="<?php echo base_url().'product/add_addons'; ?>" method="post" enctype="multipart/form-data">

<div class="row">
                        <label class="col-sm-2 control-label">Categories</label>
                        <div class="col-sm-5 controls">
                       <select name="parent_id" required="">
<?php foreach($cats as $cat){
  $attr = $this->db->get_where("attributes",array("aid"=>$cat->addon_page_id))->row();
  $catname = $this->db->get_where("category",array("cid"=>$attr->cat))->row();
  ?>
  <option value="<?php echo $cat->id ?>"><?php echo  $cat->add_on_name ?> from <?php echo $catname->cat_name; ?></option>
<?php } ?>
</select>
                        </div>
                      </div>
<div class="row">
                        <label class="col-sm-2 control-label">Addon Name</label>
                        <div class="col-sm-5 controls">
                      <input type="text" placeholder="addon name" name="name" required="">

                        </div>
                      </div>


<div class="row">
                        <label class="col-sm-2 control-label">Addon Price</label>
                        <div class="col-sm-5 controls">
                      <input type="text" placeholder="addon price" name="price" required="">
                        </div>
                      </div>


                    <div class="row">


                      <div class="col-sm-2 controls">
                      </div>
                      <div class="col-sm-3 controls" >
                      <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Image</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile" multiple>
                    </span>
                       </div>
                      <div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Add Addon</button>
                    </div>
                    </div>

</form>
<hr>
<table id="data-tables1" class="table table-dragable">
                            <thead>
                              <tr class="nodrag nodrop trr<?php //echo $attr->aid;?>">
                                  <th class="fixed-width-lg" style="width:150px"><span class="title_box">S.no.</span></th>
                                <th class="fixed-width-lg" style="width:150px"><span class="title_box">Category</span></th>
                                <th class="fixed-width-lg" style="width:150px"><span class="title_box">Addon Title</span></th>

                                <th class="fixed-width-lg"><span class="title_box">Addon Name </span></th>
                                <th class="fixed-width-lg"><span class="title_box">Addon Price </span></th>


                                <th>Action</th>
                                <!-- action -->
                              </tr>
                            </thead>
                            <tbody id="imageList">
                            <?php

                              $this->db->order_by("id asc");
                              $res=$this->db->get_where("addons")->result();
              $i=1; foreach($res as $res){?>
                              <tr>

																<td><?php echo $i; ?></td>
                              <td><?php
                              //echo $res->add_on_parent;
                              $res2=$this->db->get_where("make_addon",array("id"=>$res->add_on_parent))->row();

                              $res3=$this->db->get_where("attributes",array("aid"=>$res2->addon_page_id))->row();
                              //echo $res3->cat;
                              $res4=$this->db->get_where("category",array("cid"=>$res3->cat))->row();
                              echo $res4->cat_name ."</td><td>";
                              echo $res2->add_on_name;



   ?>
 </td>




                                <td><?php echo $res->add_on_name;?></td>
                                 <td><?php echo $res->add_on_price;?></td>


                                <td>
                                <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit" href="<?php echo base_url();?>product/update_addon/<?php echo $res->id;?>"><i class="fa fa-edit"></i></a>
                            <button data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger styledel" id="<?php echo $res->id;?>"><i class="fa fa-trash-o"></i>
                            </button>
                            <?php if($res->status=='enable'){
                              echo"<button data-toggle='tooltip' title='Disable' class='btn btn-xs btn-success services_disable' id='$res->id'><i class='fa fa-lightbulb-o'></i></button>";
                              }else{
                                echo "<button data-toggle='tooltip' title='Enable' class='btn btn-xs btn-danger services_enable' id='$res->id'><i class='fa fa-lightbulb-o'></i></button>";
                                } ?>

                            </td>
													</tr><?php $i++; }?>

                            </tbody>
                          </table>


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

</div>

<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== -->
<!-- Placed at the end of the document so the pages load faster -->

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
               url: '<?php echo base_url();?>index.php/Product/addons_disable',
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
               url: '<?php echo base_url();?>index.php/Product/addons_enable',
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

        $('#imageTable').dataTable();
        $('#imageTable').dataTable();
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
</html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
       var jqNew = jQuery.noConflict();
    jqNew(document).ready(function() {

        "use strict";
        jqNew("#data-tables1").dataTable();
    } );
</script>