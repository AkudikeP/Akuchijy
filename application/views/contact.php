<?php if($this->session->flashdata('contact')){?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('contact')?>
  </div>
<?php } ?>
<style>
.sidem
{
	padding-top:10px;
	padding-bottom:10px;
}
.sidem2
{
	padding-top:15px;
	padding-bottom:15px;
	border-top: 1px solid rgba(0, 0, 0, 0.12);
}
.ic-pd{
padding-right: 10px;
}
.br-r{
  border-right: 1px solid #ccc;
}
.br-l{
  border-left: 1px solid #ccc;
}
@media(max-width:765px){
  .br-r{
  border-right:none;
}
.br-l{
  border-left: none;
}
}
</style>

<link rel="stylesheet" href="<?php echo base_url() ?>css/stylesheet-pure-css.css">
		<div class="banner-inner haslayout padding-section parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/img-404.jpg">
			<div class="container">

			</div>
		</div>
		<!-- Slider End -->
		<!-- BreadCrumbs Start -->
		<div class="breadcrumbs haslayout">
			<div class="container">

				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Contact Us</li>
				</ol>
                <h1>Contact Us</h1>
			</div>
		</div>
		<!-- BreadCrumbs End -->
		<!-- BreadCrumbs Start -->
		<div class="storeslocation haslayout">
			<div id="contacus-map"></div>
		</div>
		<!-- BreadCrumbs End -->
		<!-- Main Start -->
    <div class="divider divider--md"></div>
		<div id="main" class="haslayout padding-section padding-bottom-zero">
			<div class="container">
				<div class="row">

<div class="col-md-3 col-sm-3">

            <div class="divider divider--md"></div>
            <!--h4 class="text-uppercase">MOST VIEWED</h4-->
            <div class="divider divider--md"></div>
           
            <ul class="category-list">
               <div class="br-r">
              <?php if($this->session->userdata('userid')==''){?>
              <li><a href="<?php echo base_url() ?>welcome/login">MY Account Sign In </a></li>
              <?php }else{ ?>
              <li><a href="<?php echo base_url();?>welcome/orders">Check Order History</a></li>
              <li><a href="<?php echo base_url();?>welcome/cancel_orders">Order Cancellation</a></li>
              <?php } ?>
              <li><a href="<?php echo base_url(); ?>Welcome/faq">Shipping and Delivery FAQ</a></li>
              <!--li><a href="#"><i class="fa fa-plus ic-pd"></i>About My Order</a></li-->
              <!--li><a href="#"><i class="fa fa-plus ic-pd"></i>Shipping and Delivery</a></li-->
              <!--li><a href="#"><i class="fa fa-plus ic-pd"></i>Product and Services</a></li-->
              <!--li><a href="#"><i class="fa fa-plus ic-pd"></i>Pricing and Promos</a></li-->
                <?php if($this->session->userdata('userid')!=''){?>
              <li><a href="#"><i class="fa fa-plus ic-pd"></i>My Account</a></li>
              <?php } ?>
              <li><a href="<?php echo base_url() ?>Welcome/privacypolicy"><i class="fa fa-plus ic-pd"></i>Policies and Legal</a></li>
              <!--li><a href="#"><i class="fa fa-plus ic-pd"></i>Contact Us</a></li-->

               </div>
            </ul>
         
            <div class="divider divider--md"></div>

          </div>


					<div class="col-md-9 col-sm-9">
						<div class="border-left">
							<h2 style="padding-bottom:20px;">Contact Detail</h2>
						</div>
            <?php   $contant = $this->db->get('contactus')->row();
              echo $contant->phone; ?>



                        <h2 style="padding-top:20px; padding-bottom:20px;">Customer and Seller Assistance</h2>

                        <div class="col-md-4 col-sm-4">
                          
                          <?php   echo $contant->ca; ?>
                        
                        </div>
                          <div class="col-md-4 col-sm-4 br-l">
                             
                            <?php   echo $contant->cr; ?>
                          
                        </div>
                           <div class="col-md-4 col-sm-4 br-l">
                           
                             <?php   echo $contant->coacc; ?>
                           
                        </div>

                            <div class="row">
                          <div class="col-md-12">
                           <h2 style="padding:20px 0px 10px;">Email</h2>
                            <hr>
                           </div>
                           </div>
                          <div class="row">
                          <div class="col-md-12 col-sm-12" >

                        	<form id="contactform" class="contact-form" name="contactform" method="post" action="<?php echo base_url('welcome/contact_mail'); ?>">

                             <h5>1. Consult with our designer regarding</h5>
          <div class="example" style="padding-bottom:60px;">
          <ul class="filter-list">

                            <div class="col-md-4 col-sm-4">
                               <li>
                            <label for="Online" class="radio">
                            <input id="Online" type="radio" name="area" value="Stitching" required="">
                            <span class="outer"><span class="inner"></span></span>Stitching</label>
                          </li>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <li>
                            <label for="Retail" class="radio">
                            <input id="Retail" type="radio" name="area" value="Fabric">
                            <span class="outer"><span class="inner"></span></span>Fabric</label>
                          </li>
                        </div>
                         <div class="col-md-4 col-sm-4">
                          <li>
                            <label for="Other" class="radio">
                            <input id="Other" type="radio" name="area" value="Other">
                            <span class="outer"><span class="inner"></span></span>Other</label>
                          </li>
                        </div>

                        </ul>
                      </div>


                   <!-- <div class="example" style="padding-bottom:60px;">
      <div class="col-md-4">
        <input id="Online" type="radio" name="area" value="Online" required=""><label for="Online"><span><span></span></span>Online</label>
      </div>
      <div class="col-md-4">
        <input id="Retail" type="radio" name="area" value="Retail Store"><label for="Retail"><span><span></span></span>Retail Store</label>
      </div>
      <div class="col-md-4">
        <input id="Other" type="radio" name="area" value="Other"><label for="Other"><span><span></span></span>Other</label>
      </div>
    </div> -->



     <h5>2. Problem regarding our services:</h5>
                             <div class="example" style="padding-bottom:60px; padding-top:10px;">

                             <!-- Your Order -->
                          <div class="col-md-3 col-sm-6">
                            <h6>Your Order</h6>

                              <ul class="filter-list">
                          <li>
                            <label for="radio1" class="radio">
                            <input id="radio1" type="radio" name="order" value="Status" required="">
                            <span class="outer"><span class="inner"></span></span>Status</label>
                          </li>
                          <li>
                            <label for="radio2" class="radio">
                            <input id="radio2" type="radio" name="order" value="Special Order">
                            <span class="outer"><span class="inner"></span></span>Special Order</label>
                          </li>
                          <li>
                            <label for="radio3" class="radio">
                            <input id="radio3" type="radio" name="order" value="Returns">
                            <span class="outer"><span class="inner"></span></span>Returns</label>
                          </li>
                          <li>
                            <label for="radio4" class="radio">
                            <input id="radio4" type="radio" name="order" value="Cancellation">
                            <span class="outer"><span class="inner"></span></span>Cancellation</label>
                          </li>
                        </ul>


                              <!-- <div><input id="radio1" type="radio" name="order" value="Status" required=""><label for="radio1"><span><span></span></span>Status</label></div>
                              <div><input id="radio2" type="radio" name="order" value="Special Order"><label for="radio2"><span><span></span></span>Special Order</label></div>
                              <div><input id="radio3" type="radio" name="order" value="Returns"><label for="radio3"><span><span></span></span>Returns</label></div>
                              <div><input id="radio4" type="radio" name="order" value="Rebated"><label for="radio4"><span><span></span></span>Rebated</label></div> -->


                          </div>
                          <div class="col-md-3 col-sm-6">

                            <h6>Our Services</h6>
                           <ul class="filter-list">
                          <li>
                            <label for="radio5" class="radio">
                            <input id="radio5" type="radio" name="feedback" value="Stitching" required="">
                            <span class="outer"><span class="inner"></span></span>Stitching</label>
                          </li>
                          <li>
                            <label for="radio6" class="radio">
                            <input id="radio6" type="radio" name="feedback" value="Fabric">
                            <span class="outer"><span class="inner"></span></span>Fabric</label>
                          </li>
                          <li>
                            <label for="radio7" class="radio">
                            <input id="radio7" type="radio" name="feedback" value="Alteration">
                            <span class="outer"><span class="inner"></span></span>Alteration</label>
                          </li>
                          <li>
                            <label for="radio8" class="radio">
                            <input id="radio8" type="radio" name="feedback" value="Other">
                            <span class="outer"><span class="inner"></span></span>Other</label>
                          </li>
                        </ul>
                              <!-- <div><input id="radio5" type="radio" name="feedback" value="Website" required=""><label for="radio5"><span><span></span></span>Website</label></div>
                              <div><input id="radio6" type="radio" name="feedback" value="Retail Store"><label for="radio6"><span><span></span></span>Retail Store</label></div>
                              <div><input id="radio7" type="radio" name="feedback" value="Products"><label for="radio7"><span><span></span></span>Products</label></div>
                              <div><input id="radio8" type="radio" name="feedback" value="Other"><label for="radio8"><span><span></span></span>Other</label></div> -->

                          </div>
                          <div class="col-md-3 col-sm-6">
                            <h6>Products</h6>
                            <ul class="filter-list">
                          <li>
                            <label for="radio9" class="radio">
                            <input id="radio9" type="radio" name="product" value="Inquiry" required="">
                            <span class="outer"><span class="inner"></span></span>Inquiry</label>
                          </li>
                          <!--li>
                            <label for="radio10" class="radio">
                            <input id="radio10" type="radio" name="product" value="Parts" required="">
                            <span class="outer"><span class="inner"></span></span>Parts</label>
                          </li-->
                          <li>
                            <label for="radio11" class="radio">
                            <input id="radio11" type="radio" name="product" value="Availibility" required="">
                            <span class="outer"><span class="inner"></span></span>Availibility</label>
                          </li>

                        </ul>
                             <!--  <div><input id="radio9" type="radio" name="product" value="Inquiry" required=""><label for="radio9"><span><span></span></span>Inquiry</label></div>
                              <div><input id="radio10" type="radio" name="product" value="Parts"><label for="radio10"><span><span></span></span>Parts</label></div>
                              <div><input id="radio11" type="radio" name="product" value="Availability"><label for="radio11"><span><span></span></span>Availability</label></div>
                           -->
                          </div>
                          <!--div class="col-md-3 col-sm-6">
                            <h6>Resources</h6>
                             <ul class="filter-list">
                          <li>
                            <label for="radio12" class="radio">
                            <input id="radio12" type="radio" name="resource" value="Garden Club" required="">
                            <span class="outer"><span class="inner"></span></span>Garden Clud</label>
                          </li>
                          <li>
                            <label for="radio13" class="radio">
                            <input id="radio13" type="radio" name="resource" value="Installation" required="">
                            <span class="outer"><span class="inner"></span></span>Installatin</label>
                          </li>
                          <li>
                            <label for="radio14" class="radio">
                            <input id="radio14" type="radio" name="resource" value="Credit Cards" required="">
                            <span class="outer"><span class="inner"></span></span>Credit Cards</label>
                          </li>
                          <li>
                            <label for="radio15" class="radio">
                            <input id="radio15" type="radio" name="resource" value="Gift Cards" required="">
                            <span class="outer"><span class="inner"></span></span>Gift Cards</label>
                          </li>

                        </ul>
                              < <div><input id="radio12" type="radio" name="resource" value="Garden Club" required=""><label for="radio12"><span><span></span></span>Garden Club</label></div>
                              <div><input id="radio13" type="radio" name="resource" value="Instalation"><label for="radio13"><span><span></span></span>Instalation</label></div>
                              <div><input id="radio14" type="radio" name="resource" value="Credit Cards"><label for="radio14"><span><span></span></span>Credit Cards</label></div>
                              <div><input id="radio15" type="radio" name="resource" value="Gift Cards"><label for="radio15"><span><span></span></span>Gift Cards</label></div>
                            >
                          </div-->

          <div class="row">
            <div class="col-sm-12" style="
    margin-top: 30px;
">
 <h5>3. Please provide your information: (*indicates required field)</h5>
 <br>
			<div class="col-md-6 col-sm-6">
           <label><h6>First name</h6></label>
             <input type="text" class="input--wd input--wd--full" name="fname" required="">
              </div>
              <div class="col-md-6 col-sm-6">
               <label><h6>Last name</h6></label>
                <input type="text" class="input--wd input--wd--full" name="lname" required="">
              </div>
              <div class="col-md-6 col-sm-6">
              <label><h6>Your Email</h6></label>
                <input type="email" class="input--wd input--wd--full" name="email" required="">
              </div>
              <div class="col-md-6 col-sm-6">
              <label><h6>Phone</h6></label>
                <input type="text" class="input--wd input--wd--full" name="phone" required="">
              </div>
              <div class="col-md-6 col-sm-6" style="height:86px">
               <label><h6>Your Address</h6></label>
                <textarea class="input--wd input--wd--full" name="address" required=""></textarea><grammarly-btn><div style="z-index: 2; opacity: 1;" class="_9b5ef6-textarea_btn _9b5ef6-not_focused" data-grammarly-reactid=".0"><div class="_9b5ef6-transform_wrap" data-grammarly-reactid=".0.0"><div title="Protected by Grammarly" class="_9b5ef6-status" data-grammarly-reactid=".0.0.0">&nbsp;</div></div></div></grammarly-btn>
              </div>
              <div class="col-md-6 col-sm-6">
              <label><h6>City</h6></label>
                <input type="text" class="input--wd input--wd--full" name="city" required="">
              </div>
              <div class="col-md-6 col-sm-6">
              <label><h6>State</h6></label>
                <input type="text" class="input--wd input--wd--full" name="state" required="">
              </div>
              <div class="col-md-6 col-sm-6">
              <label><h6>Zip code</h6></label>
                <input type="text" class="input--wd input--wd--full" name="pincode" required="">
              </div>
              <div class="col-md-12 col-sm-12">
              <label><h6>Subject</h6></label>
                <input type="text" class="input--wd input--wd--full" name="subject" required="">
              </div>
              <div class="col-md-12 col-sm-12">
               <label><h6>Your Message</h6></label>
                <textarea class="input--wd input--wd--full" name="message" required="" style="height:100px;"></textarea><grammarly-btn><div style="z-index: 2; opacity: 1;" class="_9b5ef6-textarea_btn _9b5ef6-not_focused" data-grammarly-reactid=".0"><div class="_9b5ef6-transform_wrap" data-grammarly-reactid=".0.0"><div title="Protected by Grammarly" class="_9b5ef6-status" data-grammarly-reactid=".0.0.0">&nbsp;</div></div></div></grammarly-btn>
              </div>
              <button style="float:right" type="submit" id="submit" class="btn btn--wd text-uppercase wave waves-effect">Send Message</button>
            </div>


          </div>
        </form>


                            </div></div></div>
				</div>
			</div>
		</div>

     <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
		<!-- Main End -->
		<!-- Footer -->
