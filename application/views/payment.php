
 <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>

<style>
.faq-pdd{
  padding: 3px;
}
.team{
	
	padding:0px;
	margin:0px;
}
.srch{
	margin-top:6px;
	padding:7px 75px;	
}
	
.accordion-inner{
	padding:10px;
	margin-left:10px;
}

#accordion-first .accordion-group {
    margin-bottom: 0px;
}

#accordion-first .accordion-heading, #accordion-first .accordion-toggle:hover, #accordion-first .accordion-heading .accordion-toggle.active {
    background: none repeat scroll 0% 0% transparent;
}
#accordion-first .accordion-heading {
    border-bottom: 0px none;
    font-size: 16px;
}

#accordion-first .accordion-heading .accordion-toggle {
    display: flex;
    cursor: pointer;
    padding: 5px 0px !important;
    color: #222;
    outline: medium none !important;
    text-decoration: none;
}

#accordion-first .accordion-heading .accordion-toggle.active em{background-color: #3373c8;}

#accordion-first .accordion-heading .accordion-toggle > em {
	background-color:#000;
    
    color: #fff;
    font-size: 14px;
    height: 16px;
    line-height: 16px;
    margin-right: 15px;
    text-align: center;
    width: 16px;
  }

table, td, th {
    border: 1px solid rgba(23, 11, 11, 0.17);
    text-align: center;
}
.table-bordered > tbody > tr > td{
  border-color: rgba(23, 11, 11, 0.17);
}
.table thead > tr, .table tbody > tr{
  border-top:1px solid  rgba(23, 11, 11, 0.17);
}
</style>

 

  <div id="pageContent"> 
    
    <!-- Breadcrumb section -->
    
   <!-- <section class="breadcrumbs  hidden-xs">
      <div class="container">
        <ol class="breadcrumb breadcrumb--wd pull-left">
          <li><a href="#">Home</a></li>
          <li class="active">Faq</li>
        </ol>
      </div>
    </section>-->
    
    <!-- Content section -->
    <section class="content">
      <div class="container">
        <div class="row">        
          <br /><br />
           
        
        <?php //print_r($fab); ?>
        
      
          <div class="heading">

							 <h2>PAYMENTS</h2><br />

							<span class="subheading"></span>

						</div>                      
                                                
  <div class="col-md-8">         
     <div id="accordion-first" class="clearfix">
     <?php $i=1; foreach ($fab as $value) {
       
     ?>
                        <div class="accordion" id="accordion<?php echo $i; ?>">
                       
                          <div class="accordion-group" id="div_hide">
                            <div class="accordion-heading">
                              
                              <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#acc<?php echo $i; ?>">
                                <i  class="fa fa-plus-square" style="padding:5px;"></i><span class="faq-pdd"><?php echo $value->question; ?></span>
                              </a>

                            </div>
                            <div style="height: 0px;" id="acc<?php echo $i; ?>" class="accordion-body collapse">
                              <div class="accordion-inner">
                               <p><?php echo $value->answer; ?></p>
                              </div>
                            </div>
                          </div> 
                                  
                        </div>
                 <?php $i++; } ?>      
                       <!--div class="accordion" id="accordion2">
                       
                          <div class="accordion-group" id="div_hide">
                            <div class="accordion-heading">
                              
                              <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#acc2">
                                <i  class="fa fa-plus-square" style="padding:5px;"></i><span class="faq-pdd">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span>
                              </a>

                            </div>
                            <div style="height: 0px;" id="acc2" class="accordion-body collapse">
                              <div class="accordion-inner">
                              <table class="table table-bordered table-striped">
             
              <tbody>
                <tr>
                  <td>Table cell</td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                </tr>
                <tr>
                  <td>Table cell</td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                </tr>
                <tr>
                  <td>Table cell</td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                </tr>
                <tr>
                  <td>Table cell</td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                </tr>
                <tr>
                  <td>Table cell</td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                </tr>
                <tr>
                  <td>Table cell</td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                </tr>
                <tr>
                  <td>Table cell</td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                  <td>Table cell </td>
                </tr>
              </tbody>
            </table>
                              </div>
                            </div>
                          </div> 
                                  
                        </div-->
                    </div>
	               </div>
                  <!--div id="data_ques">
                      </div-->


            </div>
      </div>
    </section>
  </div>
  
  <div class="divider"> </div>

  
  
  
<script>

(function($) {
 "use strict"
 
 // Accordion Toggle Items
   var iconOpen = 'fa fa-minus-square',
        iconClose = 'fa fa-plus-square';

    $(document).on('show.bs.collapse hide.bs.collapse', '.accordion', function (e) {
      //alert('clicked');
      //$(this +" i").removeClass('fa-plus-square');
      //$(this +" i").addClass('fa-minus-square');
        var $target = $(e.target)
        console.log($target);
          $target.siblings('.accordion-heading')
          .find('i').toggleClass(iconOpen + ' ' + iconClose);
          if(e.type == 'show')
              $target.prev('.accordion-heading').find('.accordion-toggle').addClass('active');
          if(e.type == 'hide')
              $(this).find('.accordion-toggle').not($target).removeClass('active');
    });
    
})(jQuery);

</script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
