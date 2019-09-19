
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>

<style>
hr{
border-top: 1px solid rgba(0, 0, 0, 0.25);
}
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
  .wdt{
    width: 33.33%;
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
           
        <?php $data = $this->db->get_where('shippingpage',array('id'=>1))->row(); ?>
       
        
      
          <div class="heading">

               <h1>Delivery time and Shipping cost</h1><br />

              <h3><?php echo $data->h1; ?></h3>

            </div>  
            <div>
            <p><?php echo $data->t1; ?></p> </div> <br>                
       
<table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col"><?php echo $data->tt1; ?></th>
                  <th scope="col" style="text-aling:right"><?php echo $data->tt2; ?></th>
                  
                </tr>
              </thead>
              <tbody>
              <?php $fab = $this->db->get('shippingpage_table1')->result(); 
              foreach ($fab as $value) {
               
              ?>
                <tr>
                  <td><?php echo $value->items; ?></td>
                  <td style="text-aling:right"><?php echo $value->shipping; ?></td>
                 
                </tr>
                <?php } ?>
              </tbody>
            </table><hr>

      

      
          <div class="heading">

               <h3><?php echo $data->h2; ?></h3>
 </div>  
            <div>
            <p><?php echo $data->t2; ?></p> </div> <br>                
       
       <h2><?php echo $data->h3; ?></h2>
<table class="table table-striped">
              <thead>
                <tr>
                  <th class="wdt"><?php echo $data->tt3; ?></th>
                  <th class="wdt" style="text-align:center"><?php echo $data->tt4; ?></th>
                  <th class="wdt" style="text-align:right"><?php echo $data->tt5; ?></th>
                </tr>
              </thead>
              <tbody>
               <?php $fab = $this->db->get('shippingpage_table2')->result(); 
              foreach ($fab as $value) {
               
              ?>
                <tr>
                  <td class="wdt"><?php echo $value->product; ?></td>
                  <td class="wdt" style="text-align:center"><?php echo $value->estimated; ?></td>
                 <td  class="wdt" style="text-align:right"><?php echo $value->urgent; ?> </td>
                </tr>
               <?php } ?>
              </tbody>
            </table><hr>
            <p><?php echo $data->t3; ?></p>
           <br><br>
 <div class="heading">

               <h3><?php echo $data->h4; ?></h3>
 </div>  
            <div>
            <p><?php echo $data->t4; ?></p> </div> <br>                

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
