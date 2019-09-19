<style>
.active9
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
              <h1>List of <?php echo $title; ?></h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 mgbt-sm-15">
                <div class="vd_status-widget vd_bg-green widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu -->

                  <a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="fa fa-cube"></i> </span> <span class="menu-value">
                  <?php echo $totalpro;?>
                  </span> </div>
                  <div class="menu-text clearfix"><?php echo $title; ?> </div>
                  </a> </div>
              </div>



            </div>
            <div class="row">

              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>  <?php echo $title; ?> Products</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Product&nbspID</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Price</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>


                         <?php $i=1;foreach($new['fab2'] as $fab){
													 $fabric = $this->db->get_where('fabric',array('id'=>$fab))->row(); ?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td class="center"><?php echo 'PFMD-'.$fabric->id;?></td>

                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/fabrics/<?php echo $fabric->thumb;?>" /></td>

                          <td><?php echo $fabric->title;?></td>
                          <td><?php if($fabric->category==1) echo "Women" ;?><?php if($fabric->category==2) echo "Men" ;?><?php if($fabric->category==3) echo "Kids" ;?></td>
                          <td><i class="fa fa-inr"></i> <?php echo $fabric->price;?></td>
                          <td>
                          <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit" href="<?php echo base_url();?>index.php/vendor/add_fabric/<?php echo $fabric->id;?>"><i class="fa fa-edit"></i></a>
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" id="<?php echo $fabric->id;?>" type="button"><i class="fa fa-trash-o"></i></button>


                                </td>
                        </tr>
                        <?php $i++;}?>
                          <?php if(!empty($new['uni2'])){ foreach($new['uni2'] as $uni){

														$uniform = $this->db->get_where('uniform',array('uniform_id'=>$uni))->row(); ?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td class="center"><?php echo 'PUMD-'.$uniform->uniform_id;?></td>

                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/uniform/<?php echo $uniform->uniform_image;?>" /></td>

                          <td><?php echo $uniform->school_name;?></td>
                          <td><?php echo $uniform->uni_category; ?></td>
                          <td><i class="fa fa-inr"></i> <?php echo $uniform->price;?></td>
                          <td>
                          <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit" href="<?php echo base_url();?>vendor/add_uniform/<?php echo $uniform->uniform_id;?>"><i class="fa fa-edit"></i></a>
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_uni" id="<?php echo $uniform->uniform_id;?>" type="button"><i class="fa fa-trash-o"></i></button>


                                </td>
                        </tr>
                        <?php $i++;}} ?>

                          <?php if(!empty($new['acc2'])){ foreach($new['acc2'] as $acc){
														$acce = $this->db->get_where('accessories',array('acc_id'=>$acc))->row(); ?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td class="center"><?php echo 'PAMD-'.$acce->acc_id;?></td>

                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/accessories/<?php echo $acce->thumb;?>" /></td>

                          <td><?php echo $acce->brand;?></td>
                          <td><?php if($acce->main_category==1) echo "Women" ;?><?php if($acce->main_category==2) echo "Men" ;?><?php if($acce->main_category==3) echo "Kids" ;?></td>
                          <td><i class="fa fa-inr"></i> <?php echo $acce->price;?></td>
                          <td>
                          <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit" href="<?php echo base_url();?>index.php/vendor/add_accessories/<?php echo $acce->acc_id;?>"><i class="fa fa-edit"></i></a>
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_acc" id="<?php echo $acce->acc_id;?>" type="button"><i class="fa fa-trash-o"></i></button>


                                </td>
                        </tr>
                        <?php $i++;}} ?>
                          <?php if(!empty($new['onb2'])){ foreach($new['onb2'] as $onb){
														$online = $this->db->get_where('online_boutique',array('id'=>$onb))->row(); ?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td class="center"><?php echo 'POMD-'.$online->id;?></td>

                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/online_boutique/<?php echo $online->thumb;?>" /></td>

                          <td><?php echo $online->brand;?></td>
                          <td><?php if($online->main_category==1) echo "Women" ;?><?php if($online->main_category==2) echo "Men" ;?><?php if($online->main_category==3) echo "Kids" ;?></td>
                          <td><i class="fa fa-inr"></i> <?php echo $online->price;?></td>
                          <td>
                          <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit" href="<?php echo base_url();?>index.php/vendor/add_online/<?php echo $online->id;?>"><i class="fa fa-edit"></i></a>
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_online" id="<?php echo $online->id;?>" type="button"><i class="fa fa-trash-o"></i></button>

                                </td>
                        </tr>
                        <?php $i++;}} ?>
                         <?php /*foreach($more as $more){?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td class="center"><?php echo 'PMMD-'.$more->id;?></td>

                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/more_services/<?php echo $more->image;?>" /></td>

                          <td><?php echo $more->subcategory;?></td>
                          <td><?php if($more->category==1) echo "Women" ;?><?php if($more->category==2) echo "Men" ;?><?php if($more->category==3) echo "Kids" ;?></td>
                          <td><i class="fa fa-inr"></i> <?php echo $more->price;?></td>
                          <td>
                          <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit" href="<?php echo base_url();?>index.php/vendor/add_online/<?php echo $more->id;?>"><i class="fa fa-edit"></i></a>
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_online" id="<?php echo $more->id;?>" type="button"><i class="fa fa-trash-o"></i></button>

                                </td>
                        </tr>
                        <?php $i++;}*/?>


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
               url: '<?php echo base_url();?>index.php/vendor/del_fabric',
               data: {fid:sid},
               success: function(response){
                 //console.log(response);
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
                                $(".del_acc").click(function(){

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
               url: '<?php echo base_url();?>index.php/vendor/del_accessories',
               data: {fid:sid},
               success: function(response){
                 //console.log(response);
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
                                 $(".del_online").click(function(){

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
               url: '<?php echo base_url();?>index.php/vendor/del_online',
               data: {fid:sid},
               success: function(response){
                 //console.log(response);
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
                     $(".del_uni").click(function(){

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
               url: '<?php echo base_url();?>index.php/vendor/del_uniform',
               data: {fid:sid},
               success: function(response){
                 //console.log(response);
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
                      $(".del_more").click(function(){

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
               url: '<?php echo base_url();?>index.php/vendor/del_more_service',
               data: {fid:sid},
               success: function(response){
                 //console.log(response);
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
                            content: 'Are you sure want to approve this?',
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
               url: '<?php echo base_url();?>index.php/vendor/fabrics_approve',
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
       $(".services_enable_acc").click(function(){
        //alert('yes');
         var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to approve this?',
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
               url: '<?php echo base_url();?>index.php/vendor/accessories_approve',
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

       $(".services_enable_uni").click(function(){
        //alert('yes');
         var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to approve this?',
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
               url: '<?php echo base_url();?>index.php/vendor/uniform_approve',
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
              $(".services_enable_online").click(function(){
        //alert('yes');
         var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to approve this?',
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
               url: '<?php echo base_url();?>index.php/vendor/online_approve',
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

<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/pnotify/js/jquery.pnotify.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/theme.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/custom/custom.js"></script>
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
        jqNew('#data-tables').dataTable();
        jqNew("#data-tables1").dataTable();
    } );
</script>
