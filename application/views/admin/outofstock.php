<style>
.active9
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
              <h1>All Out Of Stock</h1>
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
                  <div class="menu-text clearfix"> Product Out Of Stock </div>
                  </a> </div>
              </div-->
              
              
              
            </div>
            <div class="row">
              <div class="col-md-12">
              <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> Advance Search</h3>
                  </div>
                  <div class="panel-body table-responsive">
                  <form class="form-inline" action="out_of_stock" method="post">
                     <div class="col-md-12 marg">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="email">Pruduct Name:</label><br>
                        <input type="text" name="pname" class="form-control" id="email">
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
                        <label for="pwd">Vendor Name:&nbsp;</label><br>
                        <input type="text" name="vname" class="form-control" id="pwd">
                      </div>
                    </div>
                    <div class="col-md-3">
                       <div class="form-group">
                        <label for="pwd">Price:&nbsp;</label><br>
                        <input type="text" name="price" class="form-control" id="pwd">
                      </div>
                    </div>
                  </div>
                    
                     <div class="col-md-12 marg">
                    
                     <div class="col-md-3">
                       <div class="form-group">
                        <label for="pwd">Vendor ID:</label>
                        <input type="text" name="vid" class="form-control" id="pwd" placeholder="vmd-***">
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
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span> All Out Of Stock Products</h3>
                  </div>
                  <?php //print_r($new['fab2']); ?>
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables1">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Product&nbspID</th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Vendorname (ID)</th>
                          
                          <th>Category</th>
                          <th>Price</th>
                         <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                       
                         <?php $i=1;foreach($new['fab2'] as $fab){
                          $fab = $this->db->get_where('fabric',array('id'=>$fab))->row(); ?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td class="center"><?php echo 'PFMD-'.$fab->id;?></td>
                        
                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/fabrics/<?php echo $fab->thumb;?>" /></td>

                          <td><?php echo $fab->title;?></td>
                          <td><?php if(!empty($fab->vendor_id)){echo $fab->vendor_name."<br><center>VMD-".$fab->vendor_id."</center>";}?></td>
                          <td><?php if($fab->category==1) echo "Women" ;?><?php if($fab->category==2) echo "Men" ;?><?php if($fab->category==3) echo "Kids" ;?></td>
                          <td>&#8358; <?php echo $fab->price;?></td>
                          <td>
                          <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit" href="<?php echo base_url();?>index.php/product/add_fabric/<?php echo $fab->id;?>"><i class="fa fa-edit"></i></a> 
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_fabric" id="<?php echo $fab->id;?>" type="button"><i class="fa fa-trash-o"></i></button>

                           <?php if($fab->status=='approve'){
                            
                              }else{
                                echo "<button data-toggle='tooltip' title='Disable' class='btn btn-xs btn-danger services_enable' id='$fab->id'><i class='fa fa-lightbulb-o'></i></button>";
                                } ?>
                                </td>
                        </tr>
                        <?php $i++;}?>
                          <?php foreach($new['uni2'] as $uni){
                            $uni = $this->db->get_where('uniform',array('uniform_id'=>$uni))->row();?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td class="center"><?php echo 'PUMD-'.$uni->uniform_id;?></td>
                        
                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/uniform/<?php echo $uni->uniform_image;?>" /></td>

                          <td><?php echo $uni->school_name;?></td>
                           <td><?php if(!empty($uni->vendor_id)){echo $uni->vendor_name."<br><center>VMD-".$uni->vendor_id."</center>";}?></td>
                          <td><?php echo $uni->uni_category; ?></td>
                          <td>&#8358; <?php echo $uni->price;?></td>
                          <td>
                          <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit" href="<?php echo base_url();?>product/add_uniform/<?php echo $uni->uniform_id;?>"><i class="fa fa-edit"></i></a> 
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_uni" id="<?php echo $uni->uniform_id;?>" type="button"><i class="fa fa-trash-o"></i></button>

                           <?php if($uni->status=='approve'){
                             
                              }else{
                                echo "<button data-toggle='tooltip' title='Disable' class='btn btn-xs btn-danger services_enable_uni' id='$uni->uniform_id'><i class='fa fa-lightbulb-o'></i></button>";
                                } ?>
                                </td>
                        </tr>
                        <?php $i++;}?>

                          <?php foreach($new['acc2'] as $acc){
                           $acc = $this->db->get_where('accessories',array('acc_id'=>$acc))->row();?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td class="center"><?php echo 'PAMD-'.$acc->acc_id;?></td>
                        
                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/accessories/<?php echo $acc->thumb;?>" /></td>

                          <td><?php echo $acc->brand;?></td>
                           <td><?php if(!empty($acc->vendor_id)){ echo $acc->vendor_name."<br><center>VMD-".$acc->vendor_id."</center>";} ?></td>
                          <td><?php if($acc->main_category==1) echo "Women" ;?><?php if($acc->main_category==2) echo "Men" ;?><?php if($acc->main_category==3) echo "Kids" ;?></td>
                          <td>&#8358; <?php echo $acc->price;?></td>
                          <td>
                          <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit" href="<?php echo base_url();?>index.php/product/add_accessories/<?php echo $acc->acc_id;?>"><i class="fa fa-edit"></i></a> 
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_acc" id="<?php echo $acc->acc_id;?>" type="button"><i class="fa fa-trash-o"></i></button>

                           <?php if($acc->status=='approve'){
                             
                              }else{
                                echo "<button data-toggle='tooltip' title='Disable' class='btn btn-xs btn-danger services_enable_acc' id='$acc->acc_id'><i class='fa fa-lightbulb-o'></i></button>";
                                } ?>
                                </td>
                        </tr>
                        <?php $i++;}?>
                          <?php foreach($new['onb2'] as $onb){
                            $onb = $this->db->get_where('online_boutique',array('id'=>$onb))->row();?>
                        <tr class="gradeA">
                          <td class="center"><?php echo $i;?></td>
                          <td class="center"><?php echo 'POMD-'.$onb->id;?></td>
                        
                          <td width="100px;"><img style="max-width: 50%;" src="<?php echo base_url();?>assets/images/online_boutique/<?php echo $onb->thumb;?>" /></td>

                          <td><?php echo $onb->brand;?></td>
                           <td><?php if(!empty($onb->vendor_id)){ echo $onb->vendor_name."<br><center>VMD-".$onb->vendor_id."</center>"; } ?></td>
                          <td><?php if($onb->main_category==1) echo "Women" ;?><?php if($onb->main_category==2) echo "Men" ;?><?php if($onb->main_category==3) echo "Kids" ;?></td>
                          <td>&#8358; <?php echo $onb->price;?></td>
                          <td>
                          <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit" href="<?php echo base_url();?>index.php/product/add_online/<?php echo $onb->id;?>"><i class="fa fa-edit"></i></a> 
                          <button data-toggle="tooltip" title="Delete" class="btn btn-xs vd_btn vd_bg-red del_online" id="<?php echo $onb->id;?>" type="button"><i class="fa fa-trash-o"></i></button>

                           <?php if($onb->status_enable=='approve'){
                              
                              }else{
      echo "<button data-toggle='tooltip' title='Disable' class='btn btn-xs btn-danger services_enable_online' id='$onb->id'><i class='fa fa-lightbulb-o'></i></button>";
                                } ?>
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
                                $(".del_acc").click(function(){

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
               url: '<?php echo base_url();?>index.php/product/del_accessories',
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
                                 $(".del_online").click(function(){

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
               url: '<?php echo base_url();?>index.php/product/del_online',
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
                     $(".del_uni").click(function(){

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
               url: '<?php echo base_url();?>index.php/product/del_uniform',
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
                                                          

      $(".services_enable").click(function(){
                 var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to approve this?',
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
               url: '<?php echo base_url();?>index.php/Product/fabrics_approve',
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
       $(".services_enable_acc").click(function(){
        //alert('yes');
         var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to approve this?',
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
               url: '<?php echo base_url();?>index.php/Product/accessories_approve',
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

       $(".services_enable_uni").click(function(){
        //alert('yes');
         var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to approve this?',
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
               url: '<?php echo base_url();?>index.php/Product/uniform_approve',
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
              $(".services_enable_online").click(function(){
        //alert('yes');
         var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to approve this?',
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
               url: '<?php echo base_url();?>index.php/Product/online_approve',
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