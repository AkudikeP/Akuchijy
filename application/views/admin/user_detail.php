  <link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">  
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
             </div>
          </div>
          <div class="vd_content-section clearfix">
          
            <div class="row">
          

<div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>User</h1>
             </div>
          </div>
          <div class="vd_content-section clearfix">
          
            <div class="row">
                <div class="col-md-7">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>User Detail</h3>
                  </div>
                  <div class="panel-body table-responsive">
                  <?php 
                                  $this->db->group_by("country_name");
                                  $country=$this->db->get("country_state_city")->result();
                                    foreach($country as $country)
                                    {
                                      $cotry=$this->db->get_where("countries",array("id"=>$country->country_name))->row();
                                    }
                                    $this->db->group_by("state_name");
                                  $state=$this->db->get("country_state_city")->result();
                                    foreach($state as $state)
                                    {
                                      $statese=$this->db->get_where("states",array("id"=>$state->state_name))->row();
                                    }
                                    $this->db->group_by("city_name");
                                  $city=$this->db->get("country_state_city")->result();
                                    foreach($city as $city)
                                    {
                                      $cities=$this->db->get_where("cities",array("id"=>$city->city_name))->row();
                                    }
                                  ?>
                  <table>
                    <?php echo "<tr><td>Name</td><td>".$vendor->name."</td></tr><td>Email</td><td>".$vendor->email."</td></tr><td>Contact</td><td>".$vendor->mobile."</td></tr><td>Country</td><td>".$cotry->name."</td></tr><td>State</td><td>".$statese->name."</td></tr><td>City</td><td>".$cities->name."</td></tr><td>Address</td><td>".$vendor->address."</td></tr>" ?>.
                  </table>  </br> 
                    <style type="text/css">
                    table,tr,td{
                        border-collapse: border-collapse;
                        border:1px solid #fff;
                        padding: 1%;
                    }
                      td:nth-child(odd)
                      {
                        background-color: #ccc;

                      }
                    </style>  
                       
                         
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>

              <div class="col-md-5">
                <div class="row">
                  <div class="col-md-12">
                    <div class="vd_status-widget vd_bg-green widget">
  <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu --> 
         
</div>                    </div>
                  <!--col-md-12 --> 
                </div>
                <!-- .row -->
                <div class="row">
                  <div class="col-xs-6">
                    <div class="vd_status-widget vd_bg-red  widget">
    <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu --> 
                                 
                                                                  
</div>                    </div>
                  <!--col-xs-6 -->
                  <div class="col-xs-6">
                    <div class="vd_status-widget vd_bg-blue widget">
    <div class="vd_panel-menu">
  <div data-action="refresh" data-original-title="Refresh" data-rel="tooltip" class=" menu entypo-icon smaller-font"> <i class="icon-cycle"></i> </div>
</div>
<!-- vd_panel-menu --> 
                                  
   
</div>                   </div>
                  <!--col-xs-6 --> 
                </div>
                
                <!-- .row --> 
                
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