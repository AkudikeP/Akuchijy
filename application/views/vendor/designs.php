<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
.active4
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
            <h1>Listing All Designs</h1>
        </div>
    </div>
    <div class="vd_content-section clearfix">
        <div class="row">
            <div class="col-md-12">
                <div class="panel widget">
                    <div class="panel-heading vd_bg-grey">
                        <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Available Designs</h3>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped" id="data-tables1">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Desc</th>
                                    <th>Category</th>
                                    <th>Design cost</th>
                                    <th>Material cost</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Cover</th>
                                    <th>Front</th>
                                    <th>Back</th>
                                    <th>Left</th>
                                    <th>Right</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                                <?php foreach($designs as $design):?>
                                    <tr class="gradeA">
                                        <td class="center"><?=$i;?></td>
                                        <td class="center"><?=$design->name;?></td>
                                        <td class="center"><?=$design->type;?></td>
                                        <td class="center"><?=$design->desc;?></td>
                                        <td class="center">
                                            <?php switch($design->mid)
                                            {
                                                case 1: echo 'Women'; break;
                                                case 2: echo 'Men'; break;
                                                case 3: echo 'Kids'; break;
                                            };
                                            ?>
                                        </td>
                                        <td class="center"><?=$design->design_cost;?></td>
                                        <td class="center"><?=$design->material_cost;?></td>
                                        <td class="center"><?=$design->date;?></td>
                                        <td class="center"><?=$design->status;?></td>
                                        <td class="center"><img style="width: 100px;" src="<?=base_url();?>assets/images/catalogue/<?=$design->cover;?>"></td>
                                        <td class="center"><img style="width: 100px;" src="<?=base_url();?>assets/images/catalogue/<?=$design->front;?>"></td>
                                        <td class="center"><img style="width: 100px;" src="<?=base_url();?>assets/images/catalogue/<?=$design->back;?>"></td>
                                        <td class="center"><img style="width: 100px;" src="<?=base_url();?>assets/images/catalogue/<?=$design->right;?>"></td>
                                        <td class="center"><img style="width: 100px;" src="<?=base_url();?>assets/images/catalogue/<?=$design->left;?>"></td>
                                        <td class="center">
                                            <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_design" id="<?=$design->catalog_id;?>" type="button"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                    <?php $i++;?>
                                <?php endforeach;?>
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
<!-- Javascript =============================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
<script>
    $(() => {
        $('.del_design').on('click', (e) => {
            design_id = $(e.target).attr('id');
            console.log($(e.target));
            console.log(design_id);
            $.ajax({
                type: 'POST',
                url: '<?=base_url();?>index.php/Vendor/del_design',
                data: {'design_id': design_id},
                success: (response) => {
                    alert(response);
                    if(response == 'Design has been successfully deleted.')
                    {
                        $(e.target).closest('tr').remove();
                    }
                }
            });
        });
        $('#data-tables').dataTable();
        $('#data-tables1').dataTable();
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