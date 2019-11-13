
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
.mgg{
  margin-bottom: 20px;
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
    width: 16px;}
ul{
  list-style-type: disc;
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
           
        
       
      <?php $data = $this->db->get_where('cancel_return_text',array('id'=>1))->row(); ?>  
      
          <div class="heading">

               <h2><b>Cancellation Policy</b></h2><br />

              <span class="subheading"></span>

            </div>  
            <div>
            <?php echo $data->canceltext; ?>
            <!--ul >

<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </li><br>

<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type spIt was popularised in the 1960s </li><br>

<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not o</li>

</ul-->    </div> <br>                
       
       <h2>Frequently asked questions </h2>                                         
  <div class="col-md-12 mgg">         
     <div id="accordion-first" class="clearfix">
     <?php $i=1; foreach ($cancel as $value) {
       
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


                        <!--div class="accordion" id="accordion1">
                       
                          <div class="accordion-group" id="div_hide">
                            <div class="accordion-heading">
                              
                              <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#acco1">
                                <i  class="fa fa-plus-square" style="padding:5px;"></i><span class="faq-pdd">How do I track my order?</span>
                              </a>

                            </div>
                            <div style="height: 0px;" id="acco1" class="accordion-body collapse">
                              <div class="accordion-inner">
                               <p>login to website www.ansvel.com to track your order Or, reach us at
Call: (+91) 9644409191 Email: care@ansvel.com WhatsApp: (+91) 9644409191</p>
                              </div>
                            </div>
                          </div> 
                                
                                  <div class="accordion-group" id="div_hide">
                            <div class="accordion-heading">
                              
                              <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#acco2">
                                <i  class="fa fa-plus-square" style="padding:5px;"></i><span class="faq-pdd">How my order will be picked and delivered back to me?</span>
                              </a>

                            </div>
                            <div style="height: 0px;" id="acco2" class="accordion-body collapse">
                              <div class="accordion-inner">
                               <p>
For booking an order with us, just log in on our website, choose from a range of fabrics (only in case you don't have one with you already), choose from a variety of cloths to be stitched and then finalize the design all by yourself. Once you finalize the order,choose a suitable place and time for allowing us to take your measurement or to take an already stitched cloth from you. Next, our tailor will be at your doorstep, take the fabric and the measurement and the stitched cloth will get delivered to you seamlessly within 10 days. </p>
                              </div>
                            </div>
                          </div>   
                        </div-->
                       
                    </div>
                 </div>
                  <!--div id="data_ques">
                      </div-->
<div class="heading">

               <h2><b>Return Policy</b></h2><br />

              <span class="subheading"></span>

            </div>  
            <div>
            <?php echo $data->returntext; ?>
            <!--ul style="list-style-type:disc;margin-left:20px;">

<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </li><br>

<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type spIt was popularised in the 1960s </li><br>

<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not o</li>

</ul-->    </div> <br>                
       
       <h2>Frequently asked questions </h2>                                         
  <div class="col-md-12 mgg">         
     <div id="accordion-first" class="clearfix">
     <?php  foreach ($return as $value) {
       
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
                              
                              <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#acc1">
                                <i  class="fa fa-plus-square" style="padding:5px;"></i><span class="faq-pdd">How do I track my order?</span>
                              </a>

                            </div>
                            <div style="height: 0px;" id="acc1" class="accordion-body collapse">
                              <div class="accordion-inner">
                               <p>login to website www.ansvel.com to track your order Or, reach us at
Call: (+91) 9644409191 Email: care@ansvel.com WhatsApp: (+91) 9644409191</p>
                              </div>
                            </div>
                          </div> 
                                
                                  <div class="accordion-group" id="div_hide">
                            <div class="accordion-heading">
                              
                              <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#acc2">
                                <i  class="fa fa-plus-square" style="padding:5px;"></i><span class="faq-pdd">How my order will be picked and delivered back to me?</span>
                              </a>

                            </div>
                            <div style="height: 0px;" id="acc2" class="accordion-body collapse">
                              <div class="accordion-inner">
                               <p>
For booking an order with us, just log in on our website, choose from a range of fabrics (only in case you don't have one with you already), choose from a variety of cloths to be stitched and then finalize the design all by yourself. Once you finalize the order,choose a suitable place and time for allowing us to take your measurement or to take an already stitched cloth from you. Next, our tailor will be at your doorstep, take the fabric and the measurement and the stitched cloth will get delivered to you seamlessly within 10 days. </p>
                              </div>
                            </div>
                          </div>   
                        </div-->
                       
                    </div>
                 </div>

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
