
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>

<style>
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
    display: block;
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
           <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-9 team">

      <form class="navbar-form" role="search" id="form_id">
        <div class="input-group" style="width:100%">
            <input type="text" class="form-control" placeholder="Have a Question? Ask or enter a search term here." name="q" id="search_ques">
        </div>
      </form>
        </div>


        </div>




          <div class="heading" align="center">

							 <h4 align="center">FREQUENTLY ASKED QUESTIONS</h4><br />

							<span class="subheading"></span>

						</div>

  <div class="col-md-8">
     <div id="accordion-first" class="clearfix">
                        <div class="accordion" id="accordion2">
                        <?php foreach($faq as $faq)
                        {?>
                          <div class="accordion-group" id="div_hide">
                            <div class="accordion-heading">

                              <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo $faq->id;?>">
                                <i  class="fa fa-plus-square" style="padding:5px;"></i> <?php echo $faq->question;?>
                              </a>

                            </div>
                            <div style="height: 0px;" id="<?php echo $faq->id;?>" class="accordion-body collapse">
                              <div class="accordion-inner">
                               <p><?php echo $faq->answer;?></p>
                              </div>
                            </div>
                          </div>
                          <?php } ?>
                        </div>

                    </div>
	               </div>
                  <!--div id="data_ques">
                      </div-->

                      <div class="col-md-4">
<a class="twitter-timeline" data-height="600" href="https://twitter.com/MobileDarzi">Tweets by MobileDarzi</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
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

$( "#search_ques" ).keyup(function() {
  // alert('called');
  //$('#accordion2').css('display','none');
   //$('#data_ques').css('display','block');
            var fid=$('#search_ques').val();
            console.log(fid);
            $.ajax({
                 type: "POST",
                 url: '<?php echo base_url();?>index.php/Welcome/search_faq',
                 data: {"val":fid},
                 success: function(response){
                     console.log(response);
                     $("#accordion-first").html(response);
                     }
                 });
});
</script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
