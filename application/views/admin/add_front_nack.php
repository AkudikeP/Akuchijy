<style>
.active6
{
	background-color:#1fae66 !important;
}
.grey-bk{
  background-color: #ccc;
  padding: 5px;
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
              <h1>Manage Designs</h1>
            </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Manage Kurti Designs</h3>
                  </div>
                  <div class="panel-body table-responsive">
                  	<?php
					if(!$this->uri->segment(4) && $this->uri->segment(3))
					{
						$medit=$this->db->get_where("front_back_sleeve",array("id"=>$this->uri->segment(3)))->row();
						echo form_open_multipart("product/add_front_nack_input/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                      
          <div class="form-group">
            <label class="col-sm-1 control-label al-rtt">Type</label>
            <div class="col-sm-7 controls">


              <input type="hidden" name="old" value="" />
              <select class="width-70" name="type" required="">
                <option >Select</option>
                <option value="1" <?php if($medit->type==1){echo "selected"; } ?>>Front Neck</option>
                <option value="2" <?php if($medit->type==2){echo "selected"; } ?>>Back Neck</option>
                <option value="3" <?php if($medit->type==3){echo "selected"; } ?>>Sleeves</option>
              </select>

            </div>
          </div>

                      <div class="form-group">
                        <label class="col-sm-1 control-label al-rtt">Name</label>
                        <div class="col-sm-7 controls">

                          <input class="width-70" value="<?php echo $medit->name; ?>" name="name" type="text" required placeholder="Enter Name">
                          

                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-1 control-label al-rtt">Price</label>
                        <div class="col-sm-7 controls">

                          <input class="width-70" value="<?php echo $medit->price; ?>" name="price" type="number" required placeholder="Enter Price">
                          <input type="hidden" name="old" value="<?php echo $medit->image; ?>" />
                          <input type="hidden" name="kurti_or_blouse" value="0">
                           <input type="hidden" name="redirect" value="add_front_nack">

                        </div>
                      </div>

                      <div class="form-group">

                      <label class="col-sm-1 control-label al-rtt">Image</label>

                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Image</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile" multiple>


                    </span></div>
                      <div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Update Design</button>
                    </span></div>
                    </div>

                    <?php echo form_close();
					}
					else
					{
					echo form_open_multipart("product/add_front_nack_input/",array("class"=>"form-horizontal"));?>

          <div class="form-group">
            <label class="col-sm-1 control-label al-rtt">Type</label>
            <div class="col-sm-7 controls">


              <input type="hidden" name="old" value="" />
              <select class="width-70" name="type" required="">
                <option >Select</option>
                <option value="1">Front Neck</option>
                <option value="2">Back Neck</option>
                <option value="3">Sleeves</option>
              </select>

            </div>
          </div>

                      <div class="form-group">
                        <label class="col-sm-1 control-label al-rtt">Name</label>
                        <div class="col-sm-7 controls">

                          <input class="width-70" value="" name="name" type="text" required placeholder="Enter Name">
                          <input type="hidden" name="old" value="" />

                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-1 control-label al-rtt">Price</label>
                        <div class="col-sm-7 controls">

                          <input class="width-70" value="" name="price" type="number" required placeholder="Enter Price">
                          <input type="hidden" name="old" value="" />
                          <input type="hidden" name="kurti_or_blouse" value="0">
                           <input type="hidden" name="redirect" value="add_front_nack">

                        </div>
                      </div>

                      <div class="form-group">

                      <label class="col-sm-1 control-label al-rtt">Image</label>

                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Image</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="cfile" multiple>

                    </span></div>
                    	<div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </span></div>
                    </div>

                    <?php echo form_close();}?><hr/>

                    <table class="table table-striped" id="data-tables1">

                      <thead>
                        <tr>
													<th>S.no.</th>
                          <th>Image</th>
                          <th>Name</th>
													<th>Price</th>
                          <th>Action</th>

                        </tr>
                      </thead>

                      <tbody>
												<center><h3 class="grey-bk">Front Neck</h3></center>
                       <?php $i=1;foreach($all as $all_front){
												if($all_front->type==1){?>
                         <tr class="gradeA">
								 			<td><?php echo $i;?></td>
                           <td width="150px"><img class="img img-responsive" src="<?php echo base_url().'adminassets/styles/resized/small/'.$all_front->image;?>" /></td>
                          <td><?php echo $all_front->name;?></td>
													<td><?php echo $all_front->price;?></td>
                          <td class="center">
                          <a data-toggle="tooltip" title="Edit" class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/product/add_front_nack/<?php echo $all_front->id;?>"><i class="fa fa-edit"></i></a>
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger mcatdel" id="<?php echo $all_front->id;?>"><i class="fa fa-trash-o"></i></button>
                           </td>
                        </tr>
                        <?php $i++;}}?>
                      </tbody>

											                    <table class="table table-striped" id="data-tables2" >

											                      <thead>
											                        <tr>
																								<th>S.no.</th>
											                          <th>Image</th>
											                          <th>Name</th>
																								<th>Price</th>
											                          <th>Action</th>

											                        </tr>
											                      </thead>
											<tbody>
												<center><h3 class="grey-bk">Back Nack</h3></center>
											 <?php $i=1;foreach($all as $all_front){
												if($all_front->type==2){?>
												 <tr class="gradeA">
<td><?php echo $i;?></td>
													 <td width="150px"><img class="img img-responsive" src="<?php echo base_url().'adminassets/styles/resized/small/'.$all_front->image;?>" /></td>
													<td><?php echo $all_front->name;?></td>
													<td><?php echo $all_front->price;?></td>
													 <td class="center">
                          <a class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/product/add_front_nack/<?php echo $all_front->id;?>"><i class="fa fa-edit"></i></a>
                          <button class="btn btn-xs btn-danger mcatdel" id="<?php echo $all_front->id;?>"><i class="fa fa-trash-o"></i></button>
                           </td>
												</tr>
												<?php $i++;}}?>
											</tbody>

											                    <table class="table table-striped" id="data-tables3">

											                      <thead>
											                        <tr>
																								<th>S.no.</th>
											                          <th>Image</th>
											                          <th>Name</th>
																								<th>Price</th>
											                          <th>Action</th>

											                        </tr>
											                      </thead>
											<tbody>
												<center><h3 class="grey-bk">Sleeves</h3></center>
											 <?php $i=1;foreach($all as $all_front){
												if($all_front->type==3){?>
												 <tr class="gradeA">
<td><?php echo $i;?></td>
													 <td width="150px"><img class="img img-responsive" src="<?php echo base_url().'adminassets/styles/resized/small/'.$all_front->image;?>" /></td>
													<td><?php echo $all_front->name;?></td>
													<td><?php echo $all_front->price;?></td>
													 <td class="center">
                          <a class="btn btn-xs btn-warning" href="<?php echo base_url();?>index.php/product/add_front_nack/<?php echo $all_front->id;?>"><i class="fa fa-edit"></i></a>
                          <button class="btn btn-xs btn-danger mcatdel" id="<?php echo $all_front->id;?>"><i class="fa fa-trash-o"></i></button>
                           </td>
												</tr>
												<?php $i++;}}?>
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
                                           url: '<?php echo base_url();?>index.php/Product/design_del',
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
        jqNew('#data-tables2').dataTable();
        jqNew('#data-tables3').dataTable();
    } );
</script>
