<style>
.active7
{
  background-color:#1fae66 !important;
}
</style><link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
            <?php if(isset($heading))
                  {
                      echo "<h1>".$heading."</h1>";
                    }else{
                      echo " <h1>List Of All Uniforms</h1>";
                      } ?>
             
             </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
<div class="col-md-12 pull-left">
<a href="<?php echo base_url(); ?>vendor/all_uni_approved"><button class="btn btn-primary">Excel</button></a>
      </div>
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Available Uniform</h3>
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                           <th>Product&nbspID</th>
                          <th>Date</th>
                          <th>Image</th>
                          <th>SKU</th>
                          <th>Main Category</th>
                          <th>School Name</th>
                           <th>Quantity</th>
                            <th>In Stock Quantity</th>
                          <th>Price</th>
                          <th>Discount Price</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>


                         <?php $i=1;foreach($uni as $uni){?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                           <td class="center"><?php echo 'PUMD-'.$uni->uniform_id;?></td>
                          <td class="center"><?php echo $uni->padddate; ?></td>
                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/uniform/<?php echo $uni->uniform_image;?>" /></td>
  <td class="center"><?php echo $uni->SKU; ?></td>
                        
                          <td class="center"><?php echo $uni->uni_category; ?></td>
                          <td class="center"><?php echo $uni->school_name; ?></td>
                           <td><?php echo $uni->quantity;?></td>
                           <td></i><?php  $count = $this->db->query('select sum(`qty`) as qty from `order_items` where `status` != "cancel" and `status` !="return" and `pid`='.$uni->uniform_id.' and `pname` Like "'.preg_replace('/[^A-Za-z0-9 ]/u','', strip_tags($uni->school_name)).'"')->row()->qty;
                         
                          $qty = $uni->quantity;
                          echo (int)$qty-(int)$count;?></td>
                          <td><i class="fa fa-inr"> </i><?php echo $uni->price;?></td>
                          <td><?php

            $current_date=date('Y-m-d');
           
            if(($current_date>=$uni->from_date) AND ($current_date<=$uni->to_date)){
            ?>

            <?php if($uni->offer_type=='Percentage')
              {
                $value = 100 - $uni->offer_price;
                echo $x='<i class="fa fa-inr"></i>'.round(($uni->price/100)*$value);
                
              }
              elseif($uni->offer_type=='Amount')
              {
                $value = $uni->offer_price;
                echo $x='<i class="fa fa-inr"></i>'.round($uni->price - $value);
            
              }

            }
            else
              {
                echo "-"; //echo $x=$uni->price;
              }
            ?>
            </td>
                          <td>
                          <a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/Vendor/add_uniform/<?php echo $uni->uniform_id;?>"><i class="fa fa-edit"></i></a>
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" id="<?php echo $uni->uniform_id;?>" type="button"><i class="fa fa-trash-o"></i></button></td>
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
url: '<?php echo base_url();?>index.php/Vendor/del_uniform',
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
