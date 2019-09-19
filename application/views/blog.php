<style type="text/css">
    @media only screen and (max-width: 500px) {
.sizes-example1 {
    width: 100% !important;
    height:200px !important; 
    
}
}


.sizes-example1 {
    width: 100%;
    height: 400px;
    
}

.sizes-example {
    float: none !important;
    
    margin-left: 1%;
}
.blog-mg{
  margin-top: 150px !important;
}
 @media only screen and (min-device-width : 768px) and (max-device-width : 1023px) {
.blog-mg{
  margin-top: 10px !important;
}
  }
</style>

<section class="content">
      <div class="container"><!-- <a id="load-more" href="#">load more</a> -->
<?php $page_data = $this->db->get_where('tbl_pages',array('page_title'=>'blog'))->row(); ?>
<div class="col-md-12">
  <h2 style="padding-top: 20px; text-align: center;"><?php echo $page_data->heading1; ?></h2>
  <p style="padding-top: 5px;  text-align: center;"><?php echo $page_data->page_desc; ?></p>

</div>
           
        <div class="posts-isotope blog-mg"> 
          <!-- Post start -->
          <?php foreach ($blog_data as $blog_data) { ?>
            <div class="post post--column"> <a class="post__image" href="<?php echo base_url();?>welcome/blogview/<?php echo $blog_data['id']?>" > 
 <div class="sizes-example1">  
          <img src="<?php echo base_url(); ?>assets/images/<?php echo $blog_data['thumb'];?>" alt="">
</div>
           </a>
            <div class="post__view-btn">
              <div class="text-center"> <a class="btn btn--round" href="<?php echo base_url();?>welcome/blogview/<?php echo $blog_data['id']?>"><span class="icon icon-eye"></span></a> </div>
            </div>
            <h5 class="post__title text-uppercase"><a href="blogpost.html"><?php echo $blog_data['heading'];?></a></h5>
            <div class="post__text">
              <p><?php echo substr($blog_data['ldesc'],0,200);?>...</p>
            </div>
            <div class="post__meta"> <span class="post__meta__date pull-left"><span class="icon icon-clock"></span><?php echo $blog_data['pdate'];?></span> <span class="post__meta__author pull-right"><span class="icon icon-user-circle"></span><a href="#"><?php echo $blog_data['pby'];?></a></span> </div>
          </div>
        
            <?php } ?>  
          <!-- end post --> 
          <!-- Post start -->
         
          <!-- end post --> 
          <!-- Post start -->
         
          <!-- end post --> 
          <!-- Post start -->
         
          <!-- end post --> 
          <!-- Post start -->
         
          <!-- end post --> 
          <!-- Post start -->
         
          <!-- end post --> 
          <!-- Post start -->
         
          <!-- end post --> 
          
          <!-- Post start -->
        
          <!-- end post --> 
          <!-- Post start -->
          
          <!-- end post --> 
          
          <!-- Post start -->
         
          <!-- end post --> 
          
        </div>
        <div class="divider divider--sm"></div>
        <div class="text-center"><a class="btn btn--wd view-more" data-load="blog-more.html">view more</a></div>
         <div class="divider divider--sm"></div><div id="postPreload"></div>
      </div>
    </section>

    <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/2.1.0/jquery.imagesloaded.min.js"></script>
   <script src="<?php echo base_url(); ?>js/jquery-imagefill.js"></script>
  <script>

            // SIMPLE DEMO
            $('.simple-demo')
                // call image fill throttled to 30 fps (default is only 10 fps, works for most situations)
                .imagefill({throttle:1000/60})
                // add looped animation queue
                .queue(function(next) {
                    $(this).animate({height:300});
                    $(this).queue(arguments.callee);
                    next();
                });

            // GRID DEMO
            $('.grid-quarter').imagefill();
            $('.grid-demo').queue(function(next) {
                $(this).animate({width:320},4000).animate({width:640},4000);
                $(this).queue(arguments.callee);
                next();
            });

            // VARIED SIZES EXAMPLE
            $('.sizes-example').imagefill({runOnce:true});

            // Prevent FOUC
            $('.no-fouc').removeClass('no-fouc');
        </script>
          <script type="text/javascript">
            document.documentElement.className = 'no-fouc';
        </script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>

    <script src="<?php echo base_url();?>assets/js/custom.js"></script>