<style>
.active132
{
  background-color:#1fae66 !important;
}
</style><link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">  
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">  
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Manage Cities</h1>
            </div>
          </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>Add City </h3>
                  </div>
                  <div class="panel-body table-responsive">
                  	<?php 
					if(!$this->uri->segment(4) && $this->uri->segment(3))
					{
						$medit=$this->db->get_where("country_state_city",array("csc_id"=>$this->uri->segment(3)))->row();
						echo form_open("product/Add_city_insert/".$this->uri->segment(3),array("class"=>"form-horizontal"));?>
                      <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Country </span> </label>
                            <div class="col-lg-12">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="country_id" name="country_name" required>
                                  <option value="">Select Country</option>
                                  <?php $countries=$this->db->get("countries")->result();
                                    foreach($countries as $countries){?>
                                    <option value="<?php echo $countries->id;?>"><?php echo $countries->name;?></option>
                                    <?php }?>
                                 </select>
                                </div>
                                <div  class="col-lg-5"> 
                                </div>
                                <!-- col-lg-9 --> 
                              </div>
                            </div>
                          </div>
                      
                      <div class="form-group">
                                           
                      <div class="col-sm-3 controls">
                       </div>
                    	<div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Update City</button>
                    </span></div>
                    </div>
                      
                    <?php echo form_close();
					}
					else
					{
					echo form_open("product/Add_city_insert/",array("class"=>"form-horizontal"));?>

                     <div class="form-group">
                            <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Country </span> </label>
                            <div class="col-lg-8">
                              <div class="row mgbt-xs-0">
                                <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
                                  <select id="country_id" name="country_name" required>
                                  <option value="">Select Country</option>
                                  <?php $countries=$this->db->get("countries")->result();
                                    foreach($countries as $countries){?>
                                    <option value="<?php echo $countries->id;?>"><?php echo $countries->name;?></option>
                                    <?php }?>
                                 </select>
                                </div>
                                <div  class="col-lg-5"> 
                                </div>
                                <!-- col-lg-9 --> 
                              </div>
                            </div>
                          </div>

                          <div id="append_state"></div>
                          <div id="append_city">                   
                          </div>
		               <div class="form-group">                    
                     <div class="col-sm-3 controls">
                       </div>
                    	<div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Add City</button>
                    </span></div>
                    </div>
                      
                    <?php echo form_close(); }?><?php if($this->session->flashdata('message')){?>
  <div class="alert alert-success">      
    <?php echo $this->session->flashdata('message')?>
  </div>
<?php } ?>

<hr/>

                    <table class="table table-striped" id="data-tables">
                       
                      <thead>
                        <tr>
                          <th>S.No.</th> 
                          <th>Country Name</th>                         
                          <th>State Name</th>
                          <th>City Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                       
                       <?php $i=1;foreach($city as $cat){?>
                        <tr class="gradeA">
                          <td><?php echo $i;?></td> 
                         <?php $coun=$this->db->get_where("countries",array("id"=>$cat->country_name))->row();
                         ?>
                          <td><?php echo $coun->name;?></td> 
                          <?php $stat=$this->db->get_where("states",array("id"=>$cat->state_name))->row();
                         ?>
                          <td><?php echo $stat->name;?></td>
                          <?php $cit=$this->db->get_where("cities",array("id"=>$cat->city_name))->row();
                         ?>
                          <td><?php echo $cit->name;?></td>
                          <td class="center">                          
                          <button class="btn btn-xs btn-danger city_del" id="<?php echo $cat->csc_id;?>"><i class="fa fa-trash-o"></i></button></td>
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
						$(".city_del").click(function(){
							/*var city_id=$(this).attr('id');
							$(this).closest("tr").remove();
							$.ajax({
							 type: "POST",
							 url: '<?php echo base_url();?>index.php/product/city_del',
							 data: {city_id:city_id},
							 success: function(response){
								 //alert(response);
							 }
							 });*/


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
                                           url: '<?php echo base_url();?>index.php/Product/city_del',
                                           data: {city_id:sid},
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
    <script>
        $(document).on('change','#country_id',function(){
           var sub_id = $(this).val();
          $.ajax({
              type : "POST",
              url : "<?php echo base_url();?>index.php/product/ajax_state",
              data : {sub_id:sub_id},
              success: function(data){
               //alert(data);
                if(data)
                $("#append_state").html(data);
            }
          });
      });
  </script>
  <script>
        $(document).on('change','#state_id',function(){
           var city_id = $(this).val();
          $.ajax({
              type : "POST",
              url : "<?php echo base_url();?>index.php/product/ajax_city",
              data : {city_id:city_id},
              success: function(data){
               //alert(data);
                if(data)
                $("#append_city").html(data);
            }
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