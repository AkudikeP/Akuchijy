<style>
.active12
{
	background-color:#1fae66 !important;
}
</style>


<?php

?>

<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
            <?php if(isset($excel)){ ?>
              <h1> All Alteration Orders</h1>
              <?php }else{
                echo "<h1> All Stitching Orders</h1>";
                } ?>
             </div>
          </div>
          <div class="vd_content-section clearfix">
          <div class="row">
              <!--div class="col-lg-3 col-md-6 col-sm-6 mgbt-sm-15">
                <div class="vd_status-widget vd_bg-green widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu -->

                  <!--a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="fa fa-cube"></i> </span> <span class="menu-value">
                  <?php echo $totalpro;?>
                  </span> </div>
                  <div class="menu-text clearfix"> Stitching Order(s) </div>
                  </a> </div>
              </div-->

            </div>
            <div class="row">
 <div class="pull-left col-md-12">
 <?php if(isset($excel)){
  ?>
<a href="http://mobiledarzi.com/product/all_alt"><button class="btn btn-primary">Excel</button></a>
  <?php
  }else{ ?>
<a href="http://mobiledarzi.com/product/all_stitch"><button class="btn btn-primary">Excel</button></a>
<?php } ?>
      </div>
              <div class="col-md-12">

                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> <?php if(isset($title)){
 echo $title; }else{ echo "All Orders"; } ?></h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                           <th>S.no.</th>
                          <th>Order ID</th>
                          <th>Fabric</th>
                          <th>Order&nbspDate</th>
                          <th>Style&nbspName</th>
                          <th>Customer&nbspDetail</th>
                          <th>Price</th>
                          <th>Status</th>
                          <th>Payment</th>
                         
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>


                         <?php $i=1;foreach($stitch as $stch){

							 $fab=$this->db->get_where("orders",array("oid"=>$stch['oid']))->row_array();
               $fab2=$this->db->get_where("users",array("uid"=>$fab['userid']))->row_array();
							//print_r ($fab); exit;
               //print_r($stch);
							?>
                         <tr class="gradeA">
                          <td align="center"><?php echo $i; ?></td>
                          <td><?php echo 'OMD-'.$fab['oid'];?></td>
                          <td><?php if($stch['order_type']=='stitch'){echo 'Personal';} elseif($stch['order_type']=='stitch with fabric'){echo 'Mobile Darzi';}?></td>
                          <th><?php echo date("d M Y",strtotime($fab['odate']));?></th>
                          <td width="100px"><?php echo $stch['pname'];?>
                          </td>

                          <td><?php echo '<center>'.$fab2['name'].'<br/> UMD-'.$fab['userid'].'</center>';?>

                               </td>
                          <td><?php echo $fab['ototal'];?></td>

                           <td><span class="label label-default"><?php echo $fab['ostatus'];?></span></td>
                          <td><span class="label label-info"><?php echo $fab['pay_method'];?></span></td>
                          <td>
                          <a data-toggle="tooltip" title="View" class="btn btn-xs btn-success" href="<?php echo base_url();?>index.php/product/<?php echo $redirect_page; ?>/<?php echo $fab['oid'];?>"><i class="fa fa-eye"></i></a>
													<button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" id="<?php echo $fab['oid'];?>" type="button"><i class="fa fa-trash-o"></i></button>
													  <!-- <a class="btn btn-xs btn-success" href="<?php //echo base_url();?>index.php/product/genrate_qr/<?php //echo $stch['id'];?>">Generate Qr</a>  -->
                         </td>
                        </tr>
                        <?php $i++;}?>

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

<!-- Footer Start -->
  <footer class="footer-1"  id="footer">
    <div class="vd_bottom ">
        <div class="container">
            <div class="row">
              <div class=" col-xs-12">
                <div class="copyright">
                  	Copyright &copy;2016 MobileDarji. All Rights Reserved
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
url: '<?php echo base_url();?>index.php/product/del_order_items_admin',
data: {oid:sid},
success: function(response){
	console.log(response);
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
        jqNew("#data-tables1").dataTable();
    } );
</script>