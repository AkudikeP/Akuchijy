
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Pending Vendor Products</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">

            <div class="row">

              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Pending Vendor Products</h3>
                  </div>
                  <div class="panel-body table-responsive">


                        <?php $this->db->select("*");
                   $this->db->from('fabric');

                 $this->db->where("status",'disapprove');
                 $this->db->order_by('id','desc');
                 $this->db->limit(1);
                 $nor=$this->db->get()->result();
                 foreach($nor as $nor){ ?>
                         <li>
                             <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/fabrics_status/<?php echo $nor->id; ?>"></div>
                                 <div class="menu-text"> VMD-<?php echo $nor->vendor_id;?> has added PFMD-<?php echo $nor->id; ?>.</a>
                                     <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor->padddate));?></span></div>
                                 </div>
                          </li>    <?php } ?>
                          <?php $this->db->select("*");
                    $this->db->from('uniform');
                  $this->db->where("status",'disapprove');
                  $this->db->order_by('uniform_id','desc');

                  $nor1=$this->db->get()->result();
                  foreach($nor1 as $nor1){ ?>
                          <li> <a href="#">
                              <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/uniform_status/<?php echo $nor1->uniform_id; ?>"></div>
                                  <div class="menu-text"> VMD-<?php echo $nor1->vendor_id;?> has added a PUMD-<?php echo $nor1->uniform_id; ?></a>
                                  <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor1->padddate));?></span></div>
                                  </div>
                          </a> </li>    <?php } ?>

                          <?php $this->db->select("*");
                    $this->db->from('accessories');
                  $this->db->where("status",'disapprove');
                  $this->db->order_by('acc_id','desc');

                  $nor2=$this->db->get()->result();
                  foreach($nor2 as $nor2){
                     ?>
                          <li> <a href="#">
                              <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/accessories_status/<?php echo $nor2->acc_id; ?>"></div>
                                  <div class="menu-text"> VMD-<?php echo $nor2->vendor_id;?> has added a PAMD-<?php echo $nor2->acc_id; ?>.</a>
                                    <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor2->padddate));?></span></div>
                                  </div>
                          </a> </li>    <?php }?>

                          <?php $this->db->select("*");
                    $this->db->from('online_boutique');
                  $this->db->where("status",'disapprove');
                  $this->db->order_by('id','desc');

                  $nor3=$this->db->get()->result();
                  foreach($nor3 as $nor3){
                    ?>
                          <li> <a href="#">
                              <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/online_status/<?php echo $nor3->id; ?>"></div>
                                  <div class="menu-text"> VMD-<?php echo $nor3->vendor_id;?> has added a POMD-<?php echo $nor3->id; ?>.</a>
                                    <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor3->padddate));?></span></div>
                                  </div>
                          </a> </li>    <?php } ?>
                           <?php $this->db->select("*");
                    $this->db->from('more_services');
                  $this->db->where("status",'disapprove');

                  $nor4=$this->db->get()->result();
                  foreach($nor4 as $nor4){
      ?>
                          <li> <a href="#">
                              <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>product/more_services_status_change/<?php echo $nor4->id; ?>"></div>
                                  <div class="menu-text">VMD-<?php echo $nor4->vendor_id;?> has added a PMMD-<?php echo $nor4->id; ?>.</a>
                                      <div class="menu-info"><span class="menu-date pull-right"><?php echo date("D d M",strtotime($nor4->padddate));?></span></div>
                                  </div>
                          </a> </li>    <?php } ?>




                    
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
               url: '<?php echo base_url();?>index.php/product/del_fabric',
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
               url: '<?php echo base_url();?>index.php/Product/fabric_disable',
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

                                       var sid=thisvari.attr('id');
                                       $("#edit" + sid).hide();
                                       thisvari.removeClass("btn-danger");
                                       thisvari.addClass("btn-success");
                                        $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Product/cancel_request_approve',
               data: {sid:sid},
               success: function(response){
                // alert(response);
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
