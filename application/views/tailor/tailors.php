<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">    
 
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Listing All Tailors</h1>
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
                  <?php echo $totalu;?>
                  </span> </div>
                  <div class="menu-text clearfix"> Registered Tailors </div>
                  </a> </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 mgbt-sm-15">
                <div class="vd_status-widget vd_bg-red  widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu --> 
                  
                  <a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="icon-bars"></i> </span> <span class="menu-value"> 10% </span> </div>
                  <div class="menu-text clearfix"> Average Gross Margin </div>
                  </a> </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 mgbt-xs-15">
                <div class="vd_status-widget vd_bg-blue widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu --> 
                  
                  <a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="fa fa-comments"></i> </span> <span class="menu-value"> 108 </span> </div>
                  <div class="menu-text clearfix"> Product Reviews </div>
                  </a> </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 mgbt-xs-15">
                <div class="vd_status-widget vd_bg-yellow widget">
                  <div class="vd_panel-menu">
                    <div class=" menu entypo-icon smaller-font" data-rel="tooltip" data-original-title="Refresh" data-action="refresh"> <i class="icon-cycle"></i> </div>
                  </div>
                  <!-- vd_panel-menu --> 
                  
                  <a href="#" class="panel-body">
                  <div class="clearfix"> <span class="menu-icon"> <i class="fa fa-power-off"></i> </span> <span class="menu-value"> 10 </span> </div>
                  <div class="menu-text clearfix"> Disabled Products </div>
                  </a> </div>
              </div>
            </div>
            <div class="row">
              
              <div class="col-md-<?php  if($this->uri->segment(3)){echo 8;}else{echo 12;}?>" id="table">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey"><button class="btn btn-info btn-xs pull-right" id="show">Add Tailor</button>
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Tailors</h3>
                    
                  </div>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Profile</th>
                          <th>Details</th>
                        
                          <th>Orders</th>
                          <th>Account Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                       
                         <?php $i=1;foreach($tailors as $user){?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td width="100px;"><img class="img img-responsive" src="<?php echo base_url();?>assets/tailors/<?php echo $user->timg;?>" /></td>
                          <td width="100px;"><?php echo $user->tname;?><br/><?php echo $user->temail;?><br/><?php echo $user->tphone;?></td>
                          <td><?php echo $this->db->get_where("tailor_assign",array("tid"=>$user->id))->num_rows();?></td>
                          <td><?php //echo $t;?></td>
                          
                          <td>
                         <a class="btn btn-xs btn-success" href="<?php echo base_url();?>index.php/product/tailors_account/<?php echo $user->id;?>"><i class="fa fa-eye"></i></a> 
                          <a class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/product/tailors/<?php echo $user->id;?>"><i class="fa fa-edit"></i></a>  
                          <button class="btn btn-xs vd_btn vd_bg-red tailor_del" id="<?php echo $user->id;?>" type="button"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                        <?php $i++;}?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <div class="col-md-4" id="tform" <?php  if(!$this->uri->segment(3)){?> style="display:none;"<?php }?>>
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Add New Tailor</h3>
                    
                  </div>
                  <div class="panel-body table-responsive">
                     <?php 
				  if($this->uri->segment(3))
					{
						$cedit=$this->db->get_where("tailors",array("id"=>$this->uri->segment(3)))->row();
						echo form_open_multipart("product/Add_tailor/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                         <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tname" type="text" value="<?php echo $cedit->tname;?>" required placeholder="Tailor Name">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="temail" type="text"  value="<?php echo $cedit->temail;?>" required placeholder="Tailor Name">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Contact</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tphone" type="text" value="<?php echo $cedit->tphone;?>" required placeholder="Tailor Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9 controls">
                        <textarea class="" name="taddress" rows="2" placeholder="Tailor Address"><?php echo $cedit->taddress;?></textarea>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tcity" type="text" required value="<?php echo $cedit->tcity;?>" placeholder="Tailor City">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tstate" type="text" required  placeholder="Tailor State">
                        </div>
                      </div>
                      <div class="form-group">
                            <label for="weight" class="control-label col-lg-3">Stitches</label>
                            <div class="col-lg-9">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="vd_checkbox checkbox-success">
                                  <?php $st=$this->db->get("category")->result();
								  $c=explode(",",$cedit->cats);
								  foreach($st as $st){?>
                                   <input type="checkbox" <?php if(in_array($st->cid,$c)){echo "checked";}?>  name="cat[]" id="checkbox-<?php echo $st->cid;?>" value="<?php echo $st->cid;?>">
                                    <label for="checkbox-<?php echo $st->cid;?>"><?php echo $st->cat_name;?> </label>
                                   <?php }?>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                      
                      <div class="form-group">
                     
                      <label class="col-sm-3 control-label">Profile Image</label>
                      
                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Change Image</span> 
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile">
                     <input type="hidden" name="oldt" value="<?php echo $cedit->timg;?>" />
                <img class="img img-responsive" src="<?php echo base_url();?>assets/tailors/<?php echo $cedit->timg;?>" />
                    </span></div>
                    	
                    </div>
                      <div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Update Tailor Details</button>
                    </span></div>
                      
                    <?php echo form_close();
					}
					else
					{
				  echo form_open_multipart("product/Add_tailor",array("class"=>"form-horizontal"));?>
                      <!--<div class="form-group">
                        <label class="col-sm-3 control-label">Main Category</label>
                        <div class="col-sm-9 controls">
                          <select class="form-control" name="mcat">
                          	<option value="">Select Main Category</option>
                           <?php foreach($cats as $cat1){?>
                           <option value="<?php echo $cat1->mid;?>"><?php echo $cat1->mcat_name;?></option>
                           <?php }?>
                          </select>
                        </div>
                      </div>-->
                      
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tname" type="text" required placeholder="Tailor Name">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="temail" type="text" required placeholder="Tailor Name">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Contact</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tphone" type="text" required placeholder="Tailor Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9 controls">
                        <textarea class="" name="taddress" rows="2" placeholder="Tailor Address"></textarea>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tcity" type="text" required placeholder="Tailor City">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9 controls">
                          <input class="" name="tstate" type="text" required placeholder="Tailor State">
                        </div>
                      </div>
                      <div class="form-group">
                            <label for="weight" class="control-label col-lg-3">Stitches</label>
                            <div class="col-lg-9">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="vd_checkbox checkbox-success">
                                  <?php $st=$this->db->get("category")->result();
								  foreach($st as $st){?>
                                   <input type="checkbox"  name="cat[]" id="checkbox-<?php echo $st->cid;?>" value="<?php echo $st->cid;?>">
                                    <label for="checkbox-<?php echo $st->cid;?>"><?php echo $st->cat_name;?> </label>
                                   <?php }?>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                      
                      <div class="form-group">
                     
                      <label class="col-sm-3 control-label">Profile Image</label>
                      
                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Image</span> 
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile" multiple>
                    </span></div>
                    	
                    </div>
                      <div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Add Tailor</button>
                    </span></div>
                    <?php echo form_close();}?>
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
                  	Copyright &copy;2016 MobileDarji All Rights Reserved 
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
					$("#show").click(function(){
						$("#table").toggleClass("col-md-8","col-md-12");
						$("#tform").toggle();
					});
						$(".tailor_del").click(function(){
							var tid=$(this).attr('id');
							$(this).closest("tr").remove();
							$.ajax({
							 type: "POST",
							 url: '<?php echo base_url();?>index.php/product/tailor_del',
							 data: {tid:tid},
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