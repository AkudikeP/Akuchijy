<style>
.active7
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
              <h1>Manage Categories</h1>
            </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Category </h3>
                  </div>
                  <div class="panel-body table-responsive">
                  	<?php 
					if(!$this->uri->segment(4) && $this->uri->segment(3))
					{
						$medit=$this->db->get_where("mcategory",array("mid"=>$this->uri->segment(3)))->row();
						echo form_open_multipart("product/Add_category/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-9 controls">
                        
                          <input class="width-70" value="<?php echo $medit->mcat_name;?>" name="category" type="text" required placeholder="Enter Category Name">
                          <input type="hidden" name="old" value="<?php echo $medit->mcat_image;?>" />
                          <img class="img img-responsive" src="<?php echo base_url().'assets/category/'.$medit->mcat_image;?>" style="max-height: 300px;"/>
                        </div>
                      </div>
                      
                      <div class="form-group">
                     
                      <label class="col-sm-3 control-label">Image</label>
                      
                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Image</span> 
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile" multiple>
                    </span></div>
                    	<div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
                    </span></div>
                    </div>
                      
                    <?php echo form_close();
					}
					else
					{
					echo form_open_multipart("product/Add_category/",array("class"=>"form-horizontal"));?>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-9 controls">
                          <input class="width-70" name="category" type="text" required placeholder="Enter Category Name">
                        </div>
                      </div>
                    
                      
                      <div class="form-group">
                     
                      <label class="col-sm-3 control-label">Image</label>
                      
                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Image</span> 
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile" multiple>
                    </span></div>
                    	<div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                    </span></div>
                    </div>
                      
                    <?php echo form_close();}?><hr/>
                    <table class="table table-striped" id="data-tables1">
                       
                      <thead>
                        <tr>
                          <th width="70px">S.No.</th>
                          <th width="150px">Image</th>
                          <th>Name</th>
                          <th>Action</th>
                         
                        </tr>
                      </thead>
                      
                      <tbody>
                       
                       <?php $i=1;foreach($cats as $cat){?>
                        <tr class="gradeA">
                          <td align="center"><?php echo $i;?></td>
                           <td><img width="80px" class="img img-responsive" src="<?php echo base_url().'assets/category/'.$cat->mcat_image;?>" /></td>
                          <td><?php echo $cat->mcat_name;?></td>
                          <td class="center">
                          <a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/product/Category/<?php echo $cat->mid;?>"><i class="fa fa-edit"></i></a>
                          <!-- <button class="btn btn-xs btn-danger" id="<?php echo $cat->mid;?>"><i class="fa fa-trash-o"></i></button> -->
                           <?php if($cat->status=='enable'){
                              echo"<button data-toggle='tooltip' title='Enable' class='btn btn-xs btn-success services_disable' id='$cat->mid'><i class='fa fa-lightbulb-o'></i></button>";
                              }else{
                                echo "<button data-toggle='tooltip' title='Disable' class='btn btn-xs btn-danger services_enable' id='$cat->mid'><i class='fa fa-lightbulb-o'></i></button>";
                                } ?></td>
                        </tr>
                        <?php $i++;}?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Stitch Subcategory </h3>
                  </div>
                  <div class="panel-body table-responsive">
                  <?php 
				  if($this->uri->segment(4) && $this->uri->segment(3))
					{
						$cedit=$this->db->get_where("category",array("mid"=>$this->uri->segment(3),"cid"=>$this->uri->segment(4)))->row();
						echo form_open_multipart("product/Add_mcategory/".$this->uri->segment(3).'/'.$this->uri->segment(4),array("class"=>"form-horizontal"));?>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Main Category</label>
                        <div class="col-sm-7 controls">
                          <select class="form-control" name="mcat">
                          	<option value="">Select Main Category</option>
                           <?php foreach($cats as $cat1){?>
                           <option value="<?php echo $cat1->mid;?>" <?php if($this->uri->segment(3)==$cat1->mid){echo "selected";}?>><?php echo $cat1->mcat_name;?></option>
                           <?php }?>
                          </select>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Title Category</label>
                        <div class="col-sm-9 controls">
                          <input class="width-70" name="tcategory" value="<?php echo $cedit->mtitle;?>" type="text" placeholder="Enter Title Category Name">
                        </div>
                      </div>
                      
                      
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-9 controls">
                          <input value="<?php echo $cedit->cat_name;?>" class="width-70" name="category" type="text" required placeholder="Enter Category Name">
                           <input type="hidden" name="old" value="<?php echo $cedit->cat_image;?>" />
                          <img class="img img-responsive" src="<?php echo base_url().'assets/category/'.$cedit->cat_image;?>" style="max-height: 300px;"/>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Stitching Cost</label>
                        <div class="col-sm-9 controls">
                          <input class="width-70" name="stcost" value="<?php echo $cedit->stcost;?>" type="text" placeholder="Enter Stitching Cost">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Short Description</label>
                        <div class="col-sm-9 controls">
                          <textarea name="short_des" type="text" placeholder="Short description"><?php echo $cedit->short_des;?></textarea>
                        </div>
                      </div>
                      
                      
                      
                      <div class="form-group">
                     
                      <label class="col-sm-3 control-label">Image</label>
                      
                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Image</span> 
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile" multiple>
                    </span></div>
                    	<div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
                    </span></div>
                    </div>
                      
                    <?php echo form_close();
					}
					else
					{
				  echo form_open_multipart("product/Add_mcategory",array("class"=>"form-horizontal"));?>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Main Category</label>
                        <div class="col-sm-7 controls">
                          <select class="form-control" name="mcat" required="">
                          	<option value="">Select Main Category</option>
                           <?php foreach($cats as $cat1){?>
                           <option value="<?php echo $cat1->mid;?>"><?php echo $cat1->mcat_name;?></option>
                           <?php }?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Title Category</label>
                        <div class="col-sm-9 controls">
                          <input class="width-70" name="tcategory" type="text" placeholder="Enter Title Category Name" required="">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-9 controls">
                          <input class="width-70" name="category" type="text" required placeholder="Enter Category Name">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Stitching Cost</label>
                        <div class="col-sm-9 controls">
                          <input class="width-70" name="stcost" type="text" placeholder="Enter Stitching Cost" required="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Short Description</label>
                        <div class="col-sm-9 controls">
                          <textarea name="short_des" type="text" placeholder="Short description" required=""></textarea>
                        </div>
                      </div>
                      
                        
                      
                      <div class="form-group">
                     
                      <label class="col-sm-3 control-label">Image</label>
                      
                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Image</span> 
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile" multiple>
                    </span></div>
                    	<div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                    </span></div>
                    </div>
                      
                    <?php echo form_close();}?><hr/>
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
                          <th width="70px">S.No.</th>
                          <th width="150px">Image</th>
                          <th>Category/Subcategory</th>                         
                          <th>Action</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                       
                       
                         <?php $i=1;foreach($subcats as $subcat){?>
                        <tr class="gradeA">
                          <td align="center"><?php echo $i;?></td>
                          <td><img width="80px" class="img img-responsive" src="<?php echo base_url().'assets/category/'.$subcat->cat_image;?>" /></td>
                          <td>
						  <h4><?php $mc=$this->db->get_where("mcategory",array("mid"=>$subcat->mid))->row_array();
						  		echo $mc['mcat_name'];
						  ?>              <?php echo "/ ".$subcat->mtitle;?>
              <?php echo "/ ".$subcat->cat_name;?></h4>
<br/><br/>
                          Stitching @ Rs. <?php echo $subcat->stcost;?>/-
                          
                          </td>
                          <td class="center">
                            <a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/product/Category/<?php echo $subcat->mid;?>/<?php echo $subcat->cid;?>"><i class="fa fa-edit"></i></a>
                           <button data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger catdel" id="<?php echo $subcat->cid;?>"><i class="fa fa-trash-o"></i></button>
                            <?php if($subcat->status=='enable'){
                              echo"<button data-toggle='tooltip' title='Enable' class='btn btn-xs btn-success services_disable2' id='$subcat->cid'><i class='fa fa-lightbulb-o'></i></button>";
                              }else{
                                echo "<button data-toggle='tooltip' title='Disable' class='btn btn-xs btn-danger services_enable2' id='$subcat->cid'><i class='fa fa-lightbulb-o'></i></button>";
                                } ?></td>
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


            $(".mcatdel").click(function(){
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
                                           url: '<?php echo base_url();?>index.php/Product/mcategory_del',
                                           data: {mid:sid},
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
            $(".catdel").click(function(){
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
                                           url: '<?php echo base_url();?>index.php/Product/category_del',
                                           data: {cid:sid},
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
               url: '<?php echo base_url();?>index.php/Product/mcategory_disable',
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
               url: '<?php echo base_url();?>index.php/Product/mcategory_enable',
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


                  $(".services_disable2").click(function(){
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
               url: '<?php echo base_url();?>index.php/Product/category_disable',
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

      $(".services_enable2").click(function(){
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
               url: '<?php echo base_url();?>index.php/Product/category_enable',
               data: {sid:sid},
               success: function(response){
                // alert(response);
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
				$('#data-tables').dataTable();
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