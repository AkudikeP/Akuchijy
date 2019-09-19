 <style>
  .mark1{border:3px solid #3373c8;
  }

  .sizes-example1 {
  width: 100%;
  height: 350px;

}

@media (max-width:500px){

   .sizes-example1 {
  width: 100%;
  height: 250px !important;

}
.hide{
  display: none;
}
}

  </style>

          <div id="main" class="haslayout padding-section products-listing" style="padding-top:20px;">

			<div class="container">

				<div class="row">

					<div class="col-lg-12 col-md-12 col-sm-12 pull-right">

						<div id="content" class="haslayout">



							<div class="products haslayout">

								<div class="row">
<center><h3 class="main_heading"><?php echo $mcat->title; ?></h3></center>
<center class="sub_heading"><?php echo $mcat->description;// print_r($mcat);?></center>

									<div class="col-md-2 col-sm-2"></div>

                                    <div class="product-preview-wrapper col-sm-4 col-xs-6" align="center">

<div class="product-category" id="ttt">
                             <div class="sizes-example sizes-example1" >
                        <a href="<?php echo base_url('uniform/Girls');?>" class="fabric" id="#" >
                         <span class="sel" style="display:none;">Selected</span>
       <img  src="<?php echo base_url();?>assets/images/services/<?php echo $mcat->Women; ?>" style="max-height: 330px; width: 220px;"/>

                        </a>
                     </div>

            <div class="product-category__info">
            </div>
              <div class="text-center fabric" style="
    margin:10px;
">
<h5 class="product-category__info__ribbon__title"> Girl </h3>

              </div>

                    </div>
									</div>


                                    <div class="col-md-2 hide"></div>

                                    <div class="product-preview-wrapper col-sm-4 col-xs-6" align="center">

<div class="product-category" id="ttt">
                                 <div class="sizes-example sizes-example1" >
                        <a href="<?php echo base_url('uniform/Boys');?>" class="fabric" id="#" >
                         <span class="sel" style="display:none;">Selected</span>
       <img  src="<?php echo base_url();?>assets/images/services/<?php echo $mcat->Men; ?>" style="max-height: 330px; width: 220px;"/>

                        </a>

                      </div>
            <div class="product-category__info">
            </div>
              <div class="text-center fabric" style="
    margin:10px;
">
<h5 class="product-category__info__ribbon__title"> Boy </h3>

              </div>

                    </div>
									</div>








								</div>

							</div>

							<nav class="them-pagination haslayout">



							</nav>

						</div>

					</div>



				</div>

			</div>

		</div>

 <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
        <script src="<?php echo base_url();?>assets/js/custom.js"></script>

            <!-- Main End -->

            <!-- Footer -->
