<style>
.active3
{
	background-color:#1fae66; !important;
}
.form-horizontal .al-rtt {
text-align: left;
}
</style>

<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">  
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">  
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Manage Filter Attributes</h1>
            </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Filter Category </h3>
                  </div>
                  <div class="panel-body table-responsive">
                  	<?php 
					if(!$this->uri->segment(4) && $this->uri->segment(3))
					{
						$medit=$this->db->get_where("filter_subcategory",array("fcid"=>$this->uri->segment(3)))->row();
						echo form_open_multipart("product/Add_filter_subcategory/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
						          <div class="form-group">
                        <label class="col-sm-2 control-label al-rtt">Filter Main Category</label>
                        <div class="col-sm-5 controls">
					               <select class="form-control" name="main_category_id" id="sub_cat_filter" required>
                          <option value="">Select Main Category</option>
                           <option value="1">Fabric</option>
                           <option value="2">Uniform</option>
                           <option value="3">Accessories</option>
                           <option value="4">More Service</option>
                           <option value="5">Online Boutique</option>
                           <option value="6">Rental</option>
                          </select>
                          </div>
                      </div>
                      <div class="form-group" id="apppent_id2"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label al-rtt">Filter Name</label>
                        <div class="col-sm-5 controls">
                          <input value="<?php echo $medit->filter_name;?>" name="filter_name" type="text" required placeholder="Enter Filter Name" required>
                        </div>
                      </div>
                      
                      <div class="form-group">
                                           
                      <div class="col-sm-2 controls">
                       </div>
                    	<div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
                    </span></div>
                    </div>
                      
                    <?php echo form_close();
					}
					else
					{
					echo form_open_multipart("product/Add_filter_subcategory/",array("class"=>"form-horizontal"));?>
					<div class="form-group">
                        <label class="col-sm-2 control-label al-rtt">Filter Main Category</label>
                        <div class="col-sm-5 controls">
					<select class="form-control" name="main_category_id" id="sub_cat_filter" required>
                          	<option value="">Select Main Category</option>
                          
                           <option value="1">Fabric</option>
                           <option value="2">Uniform</option>
                           <option value="3">Accessories</option>
                           <option value="4">More Services</option>
                           <option value="5">Online Boutique</option>
                           <option value="6">Rental</option>
                           
                          </select>
                          </div>
                      </div>
                      <div class="form-group" id="apppent_id2"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label al-rtt">Filter Name</label>
                        <div class="col-sm-5 controls">
                          <input  name="filter_name" type="text" required placeholder="Enter Filter Name">
                        </div>
                      </div>
                    
                      <div class="form-group">                                          
                      <div class="col-sm-2 controls">
                       </div>
                    	<div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Add Filter</button>
                    </span></div>
                    </div>
                    <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-danger">      
                          <?php echo $this->session->flashdata('message')?>
                        </div>
                      <?php } ?>
                      
                    <?php echo form_close();}?><hr/>
                    <table class="table table-striped" id="data-tables">
                       
                      <thead>
                        <tr>
                          <th>S.No.</th>                          
                          <th>Main Category</th>
                          <th>Sub Category</th>
                          <th>Filter Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                       
                       <?php $i=1;foreach($filter_sub as $cat){?>
                        <tr class="gradeA">
                          <td><?php echo $i;?></td>                         
                          <td><?php  if($cat->main_category_id==1) echo 'Fabric';?><?php  if($cat->main_category_id==2) echo 'Uniform';?><?php  if($cat->main_category_id==3) echo 'Accessories';?><?php  if($cat->main_category_id==4) echo 'More Services';?><?php  if($cat->main_category_id==5) echo 'Online Boutique';?><?php  if($cat->main_category_id==6) echo 'Rental';?></td>
                          <?php $subc = $this->db->get_where("filter",array("fid"=>$cat->sub_category_id))->row(); 

                          ?>
                          <td><?php echo $subc->filter_category;?></td>
                          <td><?php echo $cat->filter_name;?></td>
                          <td class="center">
                          <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit" href="<?php echo base_url();?>index.php/Product/add_filter_subcat/<?php echo $cat->fcid;?>"><i class="fa fa-edit"></i></a>
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger fsubcatdel" id="<?php echo $cat->fcid;?>"><i class="fa fa-trash-o"></i></button></td>
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

  
    <link rel="stylesheet" type="text/css" href="https://craftpip.github.io/jquery-confirm/css/jquery-confirm.css"/>
    <script src="https://craftpip.github.io/jquery-confirm/demo/libs/bundled.js"></script>
    <script type="text/javascript" src="https://craftpip.github.io/jquery-confirm/js/jquery-confirm.js"></script>
 <script>	
					$(document).ready(function(){ 

            $(".fsubcatdel").click(function(){
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
                                           url: '<?php echo base_url();?>index.php/Product/fsubcatdel_del',
                                           data: {fcid:sid},
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

</script>
<script>
  $(document).on('change','#sub_cat_filter',function(){
     var sub_id = $(this).val();
    $.ajax({
        type : "POST",
        url : "<?php echo base_url();?>index.php/product/ajax_add_subcat_filter",
        data : {sub_id:sub_id},
        success: function(data){
         //alert(data);
          if(data)
          $("#apppent_id2").html(data);
      }
    });
});
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