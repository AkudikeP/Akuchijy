<style>
.active23
{
	background-color:#1fae66 !important;
}
</style>
<link href="<?php echo base_url();?>css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet" type="text/css">
 <!-- <link href="<?php echo base_url();?>css/theme.min.css" rel="stylesheet" type="text/css"> -->
<div class="panel widget light-widget">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">  
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css"> 
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        "use strict";
        
        $('#imageTable').dataTable();
        $('#imageTable').dataTable();
    } );
</script> 
<script>
$(document).ready(function(){
  $(".styledel").click(function(){
    var r = confirm("Are You Sure");
    if (r == true) {
       var sid=$(this).attr('id');
              console.log(sid);
              $(this).closest("tr").remove();
              $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Product/Make_addon_heading_del',
               data: {sid:sid},
               success: function(response){
                 //alert(response);
               }
               });
    } else {
        
    }
});
});
</script> 

          <div class="vd_content-section clearfix">

            <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title"> <span class="menu-icon"> <i class="fa fa-dot-circle-o"></i> </span>News Letter</h3>
                  </div>
                  <div class="panel-body table-responsive">
                  <div class="btn vd_btn vd_bg-red vd_white" id="accessories_1"><i class="fa fa-archive append-icon"></i>Compose Email</div>
                  <div class="form-group" id="apppent_id"></div>



<table id="imageTable" class="table table-dragable">
                            <thead>
                              <tr class="nodrag nodrop trr<?php //echo $attr->aid;?>">
                                
                                <th class="fixed-width-lg" style="width:150px"><span class="title_box">Id</span></th>
                                
                                <th class="fixed-width-lg"><span class="title_box">User Email </span></th>

                                <!-- action --> 
                              </tr>
                            </thead>
                            <tbody id="imageList">
                            <?php                         
                              $res=$this->db->get_where("news_letter")->result();
                              foreach($res as $res){?>
                              <tr>                      
                              <td><?php echo $res->id;?> </td>
                                <td><?php echo $res->email;?></td>
                              </tr>
                            <?php }?>
                             
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
<script>
 $(document).ready(function(){ 
$("#accessories_1").click(function() {
    var sid = $(this).val();
    $.ajax({
        type : "POST",
        url : "<?php echo base_url();?>index.php/product/ajax_compose_email",
        data : {sid:sid},
        success: function(data){
      //alert(data);
          if(data)
          $("#apppent_id").html(data);
      }
    });
});
});
</script>
 <script>	
					$(document).ready(function(){ 
						$(".attrdel").click(function(){
							var aid=$(this).attr('id');//alert(aid);
							$(this).closest("tr").remove();
							$.ajax({
							 type: "POST",
							 url: '<?php echo base_url();?>product/attribute_del',
							 data: {aid:aid},
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
<script type="text/javascript" src="<?php echo base_url();?>js/breakpoints.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/wysihtml5-0.3.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-wysihtml5-0.0.2.js"></script>

<script>

$(function () {
  "use strict";
  
  $('#message').wysihtml5();
  


    // init Isotope
    var $container = $('.isotope').isotope({
    itemSelector: '.isotope .email-item',
    layoutMode: 'vertical'
    });

    
  // User types in search box - call our search function and supply lower-case keyword as argument
  $('#filter-text').bind('keyup', function() {

    var filterValue = this.value.toLowerCase();
    isotopeFilter();

  });
  
  var filterFns = function() {     
    var kwd = $('#filter-text').val().toLowerCase();
    var re = new RegExp(kwd, "gi");
      var name = $(this).find('.filter-name').text();
      return name.match( re );      
  }
  
  function isotopeFilter(){

      $container.isotope({ filter: filterFns });  
  }
  
  
  $('#check-all').click(function() {
        $('.email-item input').prop('checked', true);
  });
  $('#uncheck-all').click(function() {
        $('.email-item input').prop('checked', false);
  }); 


    
  $('#insert-email-btn').click(function(e) {
          e.preventDefault();
      var emails='';
      emails=$('.email-item input:checked').map(function(n){  //map all the checked value to tempValue with `,` seperated
              return  this.value;
        }).get().join(' , ');
      var comma = $('#email-input').val() ? ' , ' : '';   
      if (emails)  {
        $('#email-input').val($('#email-input').val() + comma + emails);
      }
    });
    
});
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


