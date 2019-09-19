<div class="banner-inner haslayout padding-section parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/img-404.jpg" style="padding:10px;">
                <div class="container">
                    <h1>Custom Design</h1>
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
            <?php $cat=$this->db->get_where("category",array("cid"=>$this->uri->segment(3)))->row();
			
			?>
            <div id="main" class="haslayout padding-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6 width">
                            <div class="product-making">
                                <div class="product-tabs">
                                    <div class="head">
                                        <div id="product-tabs" class="product-tabs">
                                            <div class="item">
                                                <a href="#top-rated">Select Fabric</a>
                                            </div>
                                            <div class="item">
                                                <a href="#design-shirt">Design Your <?php echo $cat->cat_name;?></a>
                                            </div>
                                            <div class="item">
                                                <a href="#design-trousers">Design Trousers</a>
                                            </div>
                                            <div class="item">
                                                <a href="#settings">Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="product-tab-data" class="product-tab-data">
                                        <div class="item toprated-product">
                                            <div class="row">
                                                <ul class="tab-nav" role="tablist">
                                                    <?php $fab=$this->db->get_where("fabric",array("category"=>$this->uri->segment(3)))->result();
													$j=1;foreach($fab as $fab){?>
            <li role="presentation" class="col-lg-3 col-md-4 col-sm-6 col-xs-6 tab-productfull active">
                <div class="product">
                    <a href="#productnameone<?php echo $j;?>" aria-controls="productnameone" role="tab" data-toggle="tab">
                        <div class="product-img">
          <h6 class="text-primary" style="border:1px solid #666;"><?php echo $fab->title;?> @ Rs <?php echo $fab->price;?>/-</h6>
                            <img src="<?php echo base_url();?>assets/images/fabrics/<?php echo $fab->thumb;?>" alt="image description">
                            <div class="cart-badge">
                                <span class="corner"></span>
                            </div>
                            <div class="img-hover">
                                <div class="holder">
                               
                                <i class="icon glyph-icon flaticon-plus79"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
                                                  <?php $j++;}?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="item design-shirt">
                                        <script>
											$(document).ready(function(){
												$(".styles").click(function(e){
													e.preventDefault();
													var atid=$(this).attr("href");
													var stid=$(this).attr("id");
													var ji=".acc"+stid;
													//alert(ji);
													$.ajax({
														 type: "POST",
														 url: '<?php echo base_url();?>index.php/Welcome/showcart',
														 data: {"atid":atid,"stid":stid},
														 success: function(response){
															// alert(response);
															 $(ji).html(response);
														 }
														 });
												});
											});
										</script>
                                            <form class="shirtdesign-form">
                                                <fieldset>
                                                    <div class="panel-group shirtdesign-accordion theme-accordion" id="shirtdesign-accordion">
                                   <?php $collar=$this->db->get_where("attributes",array("cat"=>$this->uri->segment(3)))->result();
                                   		$i=1;foreach($collar as $coll){?>
                                                        <div class="panel accordion-pannel">
                                                            <div class="accordion-heading">
                                                                <h4>
                                                                    <a data-toggle="collapse" data-parent="#shirtdesign-accordion" href="#collapseOne<?php echo $i;?>">
                                                                        <em><?php echo $coll->attr_name;?></em>
                                                                        <i class="indicator fa fa-angle-down pull-right"></i>
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseOne<?php echo $i;?>" class="panel-collapse collapse <?php if($i==1){echo 'in';}?>">
                                                                <div class="panel-body">
                                                                    <ul class="tab-nav" role="tablist">
                      <?php $sty=$this->db->get_where("style",array("attr_id"=>$coll->aid))->result();
                                   		foreach($sty as $sty){?>
                <li role="presentation" class="col-lg-3 col-md-4 col-sm-6 col-xs-6 pattran-half" style="background:#FFF;">
                    <a href="<?php echo $sty->id;?>" id="<?php echo $sty->attr_id;?>" aria-controls="pattranone" role="tab" data-toggle="tab" class="styles">
                        <label>
                            <em><?php echo $sty->style;?></em>
                            
                            <img src="<?php echo base_url();?>adminassets/styles/<?php echo $sty->thumb_front;?>" alt="image description">
                            
                            <h5 class="text-primary" style="    line-height: 10px;"> @ Rs <?php echo $sty->sprice;?></h5>
                            <span class="bg-checkbox">
                                <input type="radio" name="pattran" value="" checked>
                            </span>
                           
                        </label>
                        
                    </a>
                     
                </li>
                
                                                                       <?php }?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php $i++;}?>
                                                     <!--<div class="panel accordion-pannel">
                                                            <div class="accordion-heading">
                                                                <h4>
                                                                    <a data-toggle="collapse" data-parent="#shirtdesign-accordion" href="#collapseTwo">
                                                                        <em>Measurement</em>
                                                                        <i class="indicator fa fa-angle-right pull-right"></i>
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    <ul>
                                                                        <li class="col-sm-5">
                                                                            <img src="<?php echo base_url();?>assets/images/size-guide.jpg" alt="image description">
                                                                        </li>
                                                                        <li class="col-sm-7">
                                                                            <div class="size-input">
                                                                                <input type="text" class="form-control" placeholder="Neck (cm)">
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <input type="text" class="form-control" placeholder="Arm (cm)">
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <input type="text" class="form-control" placeholder="Chest (cm)">
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <input type="text" class="form-control" placeholder="Waist (cm)">
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <input type="text" class="form-control" placeholder="Hip (cm)">
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <input type="text" class="form-control" placeholder="Leg (cm)">
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel accordion-pannel">
                                                            <div class="accordion-heading">
                                                                <h4>
                                                                    <a data-toggle="collapse" data-parent="#shirtdesign-accordion" href="#collapseThree">
                                                                        <em>Fitting</em>
                                                                        <i class="indicator fa fa-angle-right pull-right"></i>
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseThree" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    <ul>
                                                                        <li class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                                                            <label>
                                                                                <em>too loose</em>
                                                                                <img src="<?php echo base_url();?>assets/images/pattran/01-too-loose.jpg" alt="image description">
                                                                                <span class="bg-checkbox">
                                                                                    <input type="radio" name="size" value="">
                                                                                </span>
                                                                            </label>
                                                                        </li>
                                                                        <li class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                                                            <label>
                                                                                <em>normal</em>
                                                                                <img src="<?php echo base_url();?>assets/images/pattran/02-normal.jpg" alt="image description">
                                                                                <span class="bg-checkbox">
                                                                                    <input type="radio" name="size" value="">
                                                                                </span>
                                                                            </label>
                                                                        </li>
                                                                        <li class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                                                            <label>
                                                                                <em>just right</em>
                                                                                <img src="<?php echo base_url();?>assets/images/pattran/03-just-right.jpg" alt="image description">
                                                                                <span class="bg-checkbox">
                                                                                    <input type="radio" name="size" value="" checked>
                                                                                </span>
                                                                            </label>
                                                                        </li>
                                                                        <li class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                                                                            <label>
                                                                                <em>too tight</em>
                                                                                <img src="<?php echo base_url();?>assets/images/pattran/04-too-tight.jpg" alt="image description">
                                                                                <span class="bg-checkbox">
                                                                                    <input type="radio" name="size" value="">
                                                                                </span>
                                                                            </label>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel accordion-pannel">
                                                            <div class="accordion-heading">
                                                                <h4>
                                                                    <a data-toggle="collapse" data-parent="#shirtdesign-accordion" href="#collapseFour">
                                                                        <em>Misc</em>
                                                                        <i class="indicator fa fa-angle-right pull-right"></i>
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseFour" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    <ul>
                                                                        <li class="col-sm-6">
                                                                            <div class="size-input">
                                                                                <select>
                                                                                    <option>Thread Color</option>
                                                                                    <option>Thread Color</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <select>
                                                                                    <option>Collar Type</option>
                                                                                    <option>Collar Type</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <select>
                                                                                    <option>Pockets</option>
                                                                                    <option>Pockets</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <select>
                                                                                    <option>Buttons</option>
                                                                                    <option>Buttons</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <select>
                                                                                    <option>Zip</option>
                                                                                    <option>Zip</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <select>
                                                                                    <option>Pocket Handkerchief</option>
                                                                                    <option>Pocket Handkerchief</option>
                                                                                </select>
                                                                            </div>
                                                                        </li>
                                                                        <li class="col-sm-6">
                                                                            <div class="size-input">
                                                                                <span class="extra-option"><strong>Extras</strong> (Optional)</span>
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <input type="text" class="form-control" placeholder="Enter Text To Print">
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <span class="or">OR</span>
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <select>
                                                                                    <option>Select Tatto/Embroidery</option>
                                                                                    <option>Select Tatto/Embroidery</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <span class="or">OR</span>
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <input type="file" data-jcf='{"buttonText": "Upload Image"}'>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel accordion-pannel">
                                                            <div class="accordion-heading">
                                                                <h4>
                                                                    <a data-toggle="collapse" data-parent="#shirtdesign-accordion" href="#collapseFive">
                                                                        <em>Finalize</em>
                                                                        <i class="indicator fa fa-angle-right pull-right"></i>
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseFive" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    <ul>
                                                                        <li class="col-sm-7 order-detail">
                                                                            <div class="size-input">
                                                                                <span class="title">Order Summary</span>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <span>Fabric: Pattern #1</span>
                                                                                    <span>Neck (cm): 27</span>
                                                                                    <span>Arm (cm): 4 3</span>
                                                                                    <span>Chest (cm): 88</span>
                                                                                    <span>Waist (cm): 78</span>
                                                                                    <span>Hip (cm): 90</span>
                                                                                    <span>Leg (cm): 32</span>
                                                                                    <span>Fitting: Just Right</span>
                                                                                    <span>Thread Color: Black</span>
                                                                                    <span>Collar Type: None</span>
                                                                                    <span>Pockets: None</span>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <span>Buttons: 3 Buttons</span>
                                                                                    <span>Zip: None</span>
                                                                                    <span>Pockets Handkerchief: None</span>
                                                                                    <span>Extras (Optional): None</span>
                                                                                    <div class="border-left"></div>
                                                                                    <strong>Order #: 60A29B</strong>
                                                                                    <strong>Grand Total: $16</strong>
                                                                                    <span>
                                                                                        <i class="fa fa-print"></i>
                                                                                        <em>Print Invoice</em>
                                                                                    </span>
                                                                                    <span>
                                                                                        <i class="fa fa-download"></i>
                                                                                        <em>Download Invoice</em>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li class="col-sm-5">
                                                                            <div class="size-input">
                                                                                <span class="title">Enter Your Detail</span>
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <input type="text" class="form-control" placeholder="Full Name">
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <input type="text" class="form-control" placeholder="Phone">
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <input type="text" class="form-control" placeholder="Email">
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <input type="text" class="form-control" placeholder="Address">
                                                                            </div>
                                                                            <div class="size-input">
                                                                                <button type="submit" class="theme-btn checkout-btn">Checkout</button>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>-->
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <div class="item">
                                            <h1>Design Trousers</h1>
                                        </div>
                                        <div class="item">
                                            <h1>Settings</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="foot">
                                    <div class="howitwork">
                                        <div class="video-box">
                                            <img src="<?php echo base_url();?>assets/images/video-placeholder.jpg" alt="image description">
                                        </div>
                                        <div class="content-box">
                                            <strong>How it works?</strong>
                                            <p>Sed ut perspiciatis unde nis iste natus error sit volupttem accum oloremq unde nis.</p>
                                        </div>
                                    </div>
                                    <div class="needhelp">
                                        <strong>need help?</strong>
                                        <p>Contact us for friendly, free help.</p>
                                        <span>Call: 001-234-5678</span>
                                        <span>Email: <a href="info%40domain.html">info@domain.com</a></span>
                                    </div>
                                    <div class="likeus">
                                        <strong>like us</strong>
                                        <ul class="social-icon">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 width">
                            <div class="product-display">
                                <div class="product-btns">
                                    <ul class="date-rotate">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-download"></i>
                                                <em>Download Now</em>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-print"></i>
                                                <em>Print Now</em>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i>
                                                <em>Share With Friends</em>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                <?php $fab1=$this->db->get_where("fabric",array("category"=>$this->uri->segment(3)))->result();
													$j=1;foreach($fab1 as $fab1){?>
                       <div role="tabpanel" class="tab-pane fade in <?php if($j==1){echo 'active';}?>" id="productnameone<?php echo $j;?>">			
                    
					<?php $ats=$this->db->get_where("attributes",array("cat"=>$this->uri->segment(3)))->result();
					foreach($ats as $ats){?>
                    <div class="acc<?php echo $ats->aid;?>" align="left">
                    
                    </div>
                    <?php }?>
                                        <div class="product-img">
                  <img class="img-swap" src="<?php echo base_url();?>assets/images/fabrics/<?php echo $fab1->front;?>" alt="image description">
                  <img class="img-swap displaynone" src="<?php echo base_url();?>assets/images/fabrics/<?php echo $fab1->back;?>" alt="image description">
                                            <div class="img-hover" id="imgho">
                                                <div class="holder">
                                                    <div class="border-center">
                                                        <h4> <strong><?php echo $fab1->title;?></strong> </h4>
                                                    </div>
                                                    <span class="rate">@ Rs. <?php echo $fab1->price;?>/-</span>
                                                    <ul class="button-box">
                                                        <li>
                                                            <a class="view-full" href="#">
                                                                <i class="fa fa-search-plus"></i>
                                                                <em>full view</em>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <span id="img-changer" class="rotate">
                                                                <i class="fa fa-rotate-left"></i>
                                                                <em>rotate</em>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php $j++;}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main End -->
            <!-- Footer -->
         