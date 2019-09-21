<style>
.active12
{
	background-color:#1fae66 !important;
}
</style>

<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
            <?php if(isset($delete) && !isset($complete)){ ?>
              <h1>List Of All Archive Orders</h1>
              <?php }else if(!isset($delete) && isset($complete)){ echo "<h1>List Of All Completed Orders</h1>"; }else if(isset($expired)) {
                echo "<h1>List Of All Expired Orders</h1>";} else {
                echo "<h1>List Of All Pending Orders</h1>";
                } ?>

             </div>
          </div>
          <div class="vd_content-section clearfix">
          <div class="row">
              
            </div>
            <div class="row">
							<div class="col-md-12">
							<div class="panel widget">
									<div class="panel-heading vd_bg-grey">
										<h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Advance Search</h3>
									</div>
									<div class="panel-body table-responsive">
									<form action="" method="post">
										 <div class="col-md-12 marg">
										<div class="col-md-3">
											<div class="form-group">
												<label for="email">Order ID:</label><br>
												<input type="text" name="oid" class="form-control" id="email">
											</div>
										</div>

										 <div class="col-md-3">
											<div class="form-group">
												<label for="pwd">Date:</label><br>
												<input type="date" name="pdate" class="form-control" id="pwd">
											</div>
										</div>
										<div class="col-md-3">

										 <div class="form-group">
											 <label for="pwd">Quantity:&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</label><br>
											 <input type="number" name="pquan" class="form-control" id="pwd">
										 </div>
										 </div>

									</div>

										 <div class="col-md-12 marg">
											 <div class="col-md-3">
											 <div class="form-group">
												 <label for="pwd">User ID:</label><br>
												 <input type="text" min="1" name="uid" class="form-control" id="pwd">
											 </div>
										 </div>

                     <?php if(!isset($delete)){ ?>
										 <div class="col-md-3">
											<div class="form-group">
												<label for="pwd">Status:</label><br>
												<select name="status" class="form-control">
													<option value="">select</option>
												<option value="In Process">In Process</option>
												<option value="cancelled by user">cancelled by user</option>
												<option value="Delivered">Delivered</option>
											</select>

											</div>
										</div>
                    <?php } ?>
										<div class="col-md-3">
										 <div class="form-group">
											 <label for="pwd">Pay Method:</label><br>
											 <select name="paym" class="form-control">
												 <option value="">select</option>
											 <option value="COD">COD</option>
											 <option value="PAYU">PAYU</option>

										 </select>

										 </div>
									 </div>




											 <div class="col-md-3">
											 <br>
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</div>

										</form>
									</div>
							</div>
							</div>
              <?php if(!isset($delete) && !isset($complete)){ ?>
              <div class="col-md-12 pull-left">
<a href="<?php echo base_url(); ?>product/all_orders"><button class="btn btn-primary">Excel</button></a>
      </div>
      <?php } ?>
       <?php if(!isset($delete) && isset($complete)){ ?>
              <div class="col-md-12 pull-left">
<a href="<?php echo base_url(); ?>product/all_complete_orders"><button class="btn btn-primary">Excel</button></a>
      </div>
      <?php } ?>
              <div class="col-md-12">

                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> <?php if(isset($delete) && !isset($complete)){ ?>
              All Archive Orders
              <?php }else if(!isset($delete) && isset($complete)){ echo "All Completed Orders"; }else if(isset($expired)) {
                echo "All Expired Orders";} else {
                echo "All Pending Orders";
                } ?></h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>S.no.</th>
                          <th>Order&nbspID</th>
                          <th>Date</th>
                          <th>User&nbspDetails(ID)</th>
                          <th>City</th>



                          <th>Order&nbspDetail</th>
                          <th>Status</th>
                          <th>Payment</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>


                         <?php $i=1;foreach($orders as $fab){?>
                        <tr class="gradeA">
                          <td align="center"><?php echo $i;?></td>
                          <td>OMD-<?php echo $fab->oid;?></td>
                          <td><?php echo date("d M Y",strtotime($fab->odate));?></td>
                          <td><?php echo ''.$fab->name.'<br/> UMD00'.$fab->uid.'';?>

                               </td>
                          <td><?php echo $this->db->get_where('cities',array('id'=>$fab->bcity))->row()->name; ?></td>

                          <td><?php echo $fab->bitems." item(s) of <i class='fa fa-inr'></i> ".$fab->ototal;?></td>
                          <td><?php echo $fab->ostatus?></td>
                          <td><span class="label label-info"><?php echo $fab->pay_method;?></span></td>
                          <td>
                          <a data-toggle="tooltip" title="View" class="btn btn-xs btn-success" href="<?php echo base_url();?>index.php/product/order_details/<?php echo $fab->oid;?>"><i class="fa fa-eye"></i></a>
                          <?php if(!isset($delete)){ ?>
													<button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" id="<?php echo $fab->oid;?>" type="button"><i class="fa fa-trash-o"></i></button>
                          <?php } ?>
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

</div>

<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

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
url: '<?php echo base_url();?>index.php/product/del_order',
data: {fid:sid},
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
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/jquery.dataTables.min.js"></script>
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
