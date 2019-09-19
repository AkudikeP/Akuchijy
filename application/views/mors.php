 <style>
	.mark1{border:3px solid #3373c8;
	}
	
	</style>
    

<div class="banner-inner haslayout padding-section parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="<?php echo base_url();?>assets/images/img-404.jpg" style="padding:10px;">

			<div class="container">
            <?php 
									$cats=$this->db->get("mcategory")->result_array();
									//print_r($c);exit;
									?>
                                    
                                 

				

			</div>

		</div>

           <!-- <div class="breadcrumbs haslayout">

                <div class="container">

                    <span class="page-title">Online Design</span>

                    <ol class="breadcrumb">

                        <li><a href="#">Home</a></li>

                        <li class="active">Online Design</li>

                    </ol>

                </div>

            </div>-->

        

          <div id="main" class="haslayout padding-section products-listing">

			<div class="container">

				<div class="row">

					<div class="col-lg-12 col-md-12 col-sm-12 pull-right">

						<div id="content" class="haslayout">

							

							<div class="products haslayout">

								<div class="row">

									 <?php foreach($cats as $cats){?>

                                    <div class="col-sm-4 col-xs-6 product">
                                   
<div class="product-category" id="ttt"> 
                                         
                        <a href="<?php echo base_url(); ?>index.php/Welcome/more_services/<?php echo $cats['mid'];?>" class="fabric" id="<?php echo $cats['mid'];?>" >
                         <span class="sel" style="display:none;">Selected</span>
       <img  src="<?php echo base_url();?>assets/category/<?php echo $cats['mcat_image'];?>" id="<?php echo $cats['mid'];?>"  />
                         
                        </a>
                     
                    
            <div class="product-category__info">
            </div>
              <div class="text-center fabric" style="
    margin:10px;
">
<h5 class="product-category__info__ribbon__title"> <?php echo $cats['mcat_name'];?> </h5>
                
              </div>
            
                    </div>
									</div>
                                      <?php }?>
                                    
                                    
                                    
                                    

									

								</div>

							</div>

							<nav class="them-pagination haslayout">

								

							</nav>

						</div>

					</div>

					

				</div>

			</div>

		</div>



            <!-- Main End -->

            <!-- Footer -->

         