<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>All Approved</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">

              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Approve</h3>
                  </div>
                  <div class="panel-body table-responsive">

                    <?php
                 $nor=$this->db->get_where("fabric",array("vendor_notification"=>'',"vendor_id"=>$this->session->userdata('vid'),"status"=>'disapprove'))->result();
                 foreach($nor as $nor){?>
                     <li> <a href="#">
                         <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>Vendor/fabric_notification/<?php echo $nor->id; ?>"></div>
                             <div class="menu-text"> PFMD-<?php echo $nor->id;?> is pending.</a>
                               <div class="menu-info">
                                     <span class="menu-date pull-right">
                 on<?php echo date("D d M",strtotime($nor->padddate));?></span>
                               </a></div>

                             </div>
                     </a> </li>    <?php }?>

                     <?php
                      //$this->db->limit(1);
                 $nor1=$this->db->get_where("uniform",array("vendor_notification"=>'',"vendor_id"=>$this->session->userdata('vid'),"status"=>'disapprove'))->result();
                 foreach($nor1 as $nor1){?>
                     <li> <a href="#">
                         <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>Vendor/uniform_notification/<?php echo $nor1->uniform_id; ?>"></div>
                             <div class="menu-text"> PUMD-<?php echo $nor1->uniform_id;?>  is pending.</a>
                               <div class="menu-info">
                                     <span class="menu-date pull-right">
                 on<?php echo date("D d M",strtotime($nor->padddate));?></span>
                               </a></div>
                             </div>
                     </a> </li>    <?php }?>

                     <?php
                    //  $this->db->limit(1);
                 $nor2=$this->db->get_where("accessories",array("vendor_notification"=>'',"vendor_id"=>$this->session->userdata('vid'),"status"=>'disapprove'))->result();
                 foreach($nor2 as $nor2){?>
                     <li> <a href="#">
                         <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>Vendor/acc_notification/<?php echo $nor2->acc_id; ?>"></div>
                             <div class="menu-text"> PAMD-<?php echo $nor2->acc_id;?>  is pending.</a>
                               <div class="menu-info">
                                     <span class="menu-date pull-right">
                 on <?php echo date("D d M",strtotime($nor2->padddate));?></span>
                               </a></div>
                             </div>
                     </a> </li>    <?php }?>

                     <?php
                    //  $this->db->limit(1);
                 $nor3=$this->db->get_where("online_boutique",array("vendor_notification"=>'',"vendor_id"=>$this->session->userdata('vid'),"status"=>'disapprove'))->result();
                 foreach($nor3 as $nor3){?>
                     <li> <a href="#">
                         <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>Vendor/boutique_notification/<?php echo $nor3->id; ?>"></div>
                             <div class="menu-text"> POMD-<?php echo $nor3->id;?>  is pending.</a>
                               <div class="menu-info">
                                     <span class="menu-date pull-right">
                 on<?php echo date("D d M",strtotime($nor->padddate));?></span>
                               </a></div>
                             </div>
                     </a> </li>    <?php }?>
                      <?php
                       //$this->db->limit(1);
                 $nor4=$this->db->get_where("more_services",array("vendor_notification"=>'',"vendor_id"=>$this->session->userdata('vid'),"status"=>'disapprove'))->result();
                 foreach($nor4 as $nor4){?>
                     <li> <a href="#">
                         <div class="menu-icon vd_blue"><a href="<?php echo base_url();?>Vendor/service_notification/<?php echo $nor4->id; ?>"><img src="<?php echo base_url();?>assets/images/more_services/<?php echo $nor4->image;?>"></div>
                             <div class="menu-text"> PMMD-<?php echo $nor4->id;?> is pending.</a>
                               <div class="menu-info">
                                     <span class="menu-date pull-right">
                 on<?php echo date("D d M",strtotime($nor->date));?></span>
                               </a></div>
                             </div>
                     </a>    </li> <?php }?>


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
url: '<?php echo base_url();?>index.php/Vendor/del_online',
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