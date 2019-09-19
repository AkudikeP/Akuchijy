<style type="text/css">

.pdd{
  padding: 40px;
}
.pdd-top{
  padding-top: 15px;
  color: #ed891c;
}
.icc{
  padding: 10px;
  color: #000;
}


</style>



<div id="pageContent">



    <section class="breadcrumbs breadcrumbs-boxed">



      <div class="container">



        <ol class="breadcrumb breadcrumb--wd pull-left">



          <li><a href="<?php echo base_url(); ?>" style="color: #000;">Home</a></li>



          <li class="active" style="color: #000;">Brands</li>



        </ol>







      </div>





    </section>




<section class="content content--fill top-null">
      <div class="container">
        <section class="aboutus padding-section haslayout">

        <div class="container">

       <div class="heading" align="center">

               <h2 align="center">Brands</h2><br />

              <span class="subheading"></span>

            </div>

        <div class="product-category-carousel mobile-special-arrows animated-arrows slick">


        <?php
      //$this->db->order_by("brand_slider", "ASC");
     $fcats=$this->db->get("brand_slider")->result();
  //  print_r($fcats);
     //exit;
     foreach($fcats as $subcat){
       //print_r($subcat->service_title);

       ?>

           <div class="col-md-3" align="center">
             <?php /* if($subcat->service_title=='Fabric'){  ?>
            <a href="<?php echo base_url()?>index.php/Welcome/fabric1">
            <?php

          }*/
            ?>
            <img src="<?php echo base_url(); ?>assets/images/<?php echo $subcat->banner_image; ?>"  style="width:100px !important;"/>
            </a>



         </div>

           <?php  }?>



            </div>


        </div>

    </div>



      </section>







        <button type="button" data-role="none" class="slick-prev" aria-label="previous" style="display: block;">Previous<span class="icon-wrap"></span></button><button type="button" data-role="none" class="slick-next" aria-label="next" style="display: block;">Next<span class="icon-wrap"></span></button></div>
<section class="content content--fill top-null">
<div class="container">
<?php  $fcats=$this->db->get("brand_contant")->result();
// print_r($fcats);
 //exit;
 foreach($fcats as $subcat){ ?>
           <div class="col-md-12">

            <div class="col-md-2">
                <img src="<?php echo base_url(); ?>assets/images/<?php echo $subcat->image; ?>">
            </div>
            <div class="col-md-10 pdd">

              <h2><?php echo $subcat->heading; ?></h2>
              <p><?php echo $subcat->contant ?></p>
              <div class="pdd-top"><a href="<?php echo $subcat->url ?>"><?php echo $subcat->url ?></a><a href="<?php echo $subcat->facelink ?>"><i class="fa fa-facebook icc"></i></a><a href="<?php echo $subcat->twilink ?>"><i class="fa fa-twitter icc"></i></a></div>

            </div>


           </div>
           <?php } ?>
           <!--div class="col-md-12">

            <div class="col-md-2">
                <img src="<?php echo base_url(); ?>assets/images/br2.png">
            </div>
            <div class="col-md-10 pdd">

              <h2>Mussum ipsum cacilds Mussum ipsum cacilds </h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s... Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...  </p>
               <div class="pdd-top">Visit abcd.com<i class="fa fa-facebook icc"></i><i class="fa fa-twitter icc"></i></div>
            </div>


           </div>
           <div class="col-md-12">

            <div class="col-md-2">
                <img src="<?php echo base_url(); ?>assets/images/br3.jpg">
            </div>
            <div class="col-md-10 pdd">

              <h2>Mussum ipsum cacilds Mussum ipsum cacilds </h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s... Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...  </p>
                 <div class="pdd-top">Visit abcd.com<i class="fa fa-facebook icc"></i><i class="fa fa-twitter icc"></i></div>
            </div>


          </div-->
         </div>


</section>




      </div>
    </section>


    <!-- Content section -->




    <!-- End Content section -->



  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
