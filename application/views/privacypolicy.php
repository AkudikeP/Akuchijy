

		<!-- Header End -->

		<!-- Slider Start -->

		<div class="banner-inner haslayout padding-section parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/img-404.jpg">

			<div class="container">

				

			</div>

		</div>

		<!-- Slider End -->

		<!-- BreadCrumbs Start -->

		<div class="breadcrumbs haslayout">

			<div class="container">

				

				<ol class="breadcrumb">

					<li><a href="#" style="color: #000;">Home</a></li>

					<li class="active" style="color: #000;">Privacy Policy</li>

				</ol>

			</div>

		</div>

		<!-- BreadCrumbs End -->

		<!-- Main Start -->

		<div id="main" class="haslayout padding-section padding-bottom-zero">

			<!-- About Shop Start -->

			<div class="about-area haslayout padding-section margin-top-minus padding-bottom-zero">

				<div class="container">

					<div class="row">
						<div class="col-md-12">

<!--						<div class="col-md-5">

							<figure class="margin-top-minus margin-bottom-minus">

								<img src="<?php echo base_url(); ?>img/Tailor.jpg" alt="image " width="100%">

							</figure>

						</div>

						<div class="col-sm-7">

							<div class="border-left">

								<h3>About us</h3>

							</div>

							<div class="description">

								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>

								<p>exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.Ut enim ad minim veniam. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam. Quis nostrud exercitation. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

							</div>

							

						</div>
-->				
					<?php
						$abouttext = $this->db->get_where("tbl_pages where page_id =  '3'");
						$data['privacytext'] = $abouttext->result();			
						foreach($data['privacytext'] as $text)					   
					   {
					   		$pagename = $text->page_title;
							$pagedesc = $text->page_desc;
					   }
					   
					   echo $pagedesc;
					   ?>


					</div>

				</div>

			</div>
		</div>

			<!-- About Shop End -->

			<!-- Expert Start -->

			

			<!-- Expert End -->

			<!-- FAQ and Skill Start -->

			

			<!-- FAQ and Skill End -->

		</div>
<br />
		<!-- Main End -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>


<script src="<?php echo base_url();?>assets/js/custom.js"></script>

		<!-- Footer -->

		