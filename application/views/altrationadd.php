<style>
@media (max-width: 900px){
	.qty1{
		width: 45%;
	}
}
</style>



<div class="banner-inner haslayout padding-section parallax-window" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="<?php echo base_url();?>assets/images/img-404.jpg" style="padding:10px;">


			<div class="container">



			</div>

		</div>


          <div id="main" class="haslayout padding-section products-listing">

			<div class="container">

				<div class="row">

					<div class="col-lg-12 col-md-12 col-sm-12 pull-right">

						<div id="content" class="haslayout">



							<div class="products haslayout">

								<div class="row">

									<?php
									$id= $this->uri->segment(4);
									$info=$this->db->get_where("altration",array("alt_id"=>$id))->row();
									//print_r($info);
									//exit;

									?>

                                    <div class="col-sm-3 col-xs-12 product">

										<div class="product-img">

				<img src="<?php echo base_url();?>assets/images/altration/<?php echo $info->image; ?> " style="
    width: 100%;
">

											<div class="price-tag">

												<div class="price-holder" align="center" style="
    padding-top: 10px;
"><h4><i class="fa fa-inr"></i> <?php echo $info->price; ?>/- </h4></div>

											</div>

										</div>

										<div class="detail">

											<span class="title"></span>



											<div class="description">

												<p></p>

											</div>

										</div>

									</div>
                                    <div class="col-md-9 col-sm-9 col-xs-12 product" align="left">
                                  <div class="row"> <div class="col-md-5 col-xs-12" align="center"> <h5><?php echo $info->subcategory;?> Alteration</h5></div><br>
                                      </div><br>
									<form action="" method="post" id="bundle_add" class="altr">
                                       <div class="row">
                                       <div class="col-md-2 col-xs-6 altr1"><span >Quantity: </span></div>
                                        <div class="col-md-6 col-xs-6"><input type="number" name="qty" class="form-control qty1" min="1" id="input1" required /></div>
                                        </div>
                                      <input type="hidden" name="fabric" value="<?php echo $info->alt_id;?>" required />
                                       <br />
                                        <div class="row">
                                         <div class="col-md-2 col-xs-6 altr1"><span>Minimum Price Per Quantity: </span></div>
                                        <div class="col-md-6 col-xs-6">

                                        <input type="text" value="<?php echo $info->price; ?>" class="form-control qty1" id="input2" required  readonly/></div>

                                        </div>
                                        <br />
                                        <div class="row">
                                         <div class="col-md-2 col-xs-6 altr1"><span>Total Price: </span></div>
                                        <div class="col-md-6 col-xs-6"><input type="text" name="total_price" value="<?php echo $info->price; ?>" class="form-control qty1" id="output" required readonly/></div>
                                        </div><br />
                                        <div class="row">
                                        <div class="col-md-2 col-xs-6 altr1"><span>Select Date/Time </span> </div>
                                        <div class="form-group">
               <div class="col-md-10 col-xs-6">
                <div class="input-group date form_datetime col-md-5" data-date="<?php echo date("Y-m-d"); ?>T10:00:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" id='date_time' size="16" type="text" name="date_time" value="" readonly>
                    <span class="input-group-addon"><span class="fa fa-times"></span></span>
					<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" /></div>
            </div>
                                        </div>
                                        <br />

                                        <br />

  <div class="row">
                                        <div class="col-md-2 col-xs-6 altr1">
                                        <span>Description:</span>

                </div>
                                        <div class="col-md-6 col-xs-6"><textarea class="form-control" id='desc' name="alt_desc" placeholder="Message" style="height:250px;" required></textarea>
                                        </div>
                                        </div><br />

                                        <div class="row">

                                        <div class="col-md-2">



                </div>
                                        <div class="col-md-12 " align="left"><button class="btn btn--wd text-uppercase" id="caddtocart_add" style="margin-left: 147px;">Add to Cart</button></div>
                                        </div>


                                        </form><br>
   <span class="alert alert-danger" style="line-height:30px;"><b>Note: </b> <span> The price will be increased according to the work. It will be disscussed at the time of pick-up or on call.<span></span><br>  

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

		<div class="divider"> </div>

            <!-- Main End -->

            <!-- Footer -->

						<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
						    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/jquery-confirm.css"/>
						    <script src="<?php echo base_url();?>adminassets/js/bundled.js"></script>
						    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery-confirm.js"></script>
						            <script>var jq = $.noConflict();
											//alert(jq);
											jq(document).ready(function(){

												jq(".sc").click(function(){

							jq(this).toggleClass('open');
						});

												jq("#input1").keyup(function () {
									            jq('#output').val(jq('#input1').val() * jq('#input2').val());
								         	});
						            jq("#input1").change(function () {
						                  jq('#output').val(jq('#input1').val() * jq('#input2').val());
						              });



												jq("#caddtocart_add").click(function(e){
													e.preventDefault();

						   if(jq("#input1").val()=="" || jq("#date_time").val()=="" || jq("#desc").val()=="" )
						   {
						   //	alert("Empty Fields!!");

						                   jq.confirm({
						                           title: 'Alert',
						                            content: 'Please Fill All Fields.',
						                            icon: 'fa fa-question-circle',
						                            animation: 'scale',
						                            closeAnimation: 'scale',
						                            opacity: 0.5,
						                            buttons: {
						                                'confirm': {
						                                    text: 'Ok',
						                                    btnClass: 'btn-info',
						                                    action: function () {

						                                      // console.log(sid);


						                                        }
						                                },

						                               }

						                        });
						   }
						   else{
						   					var formdata=jq("#bundle_add").serialize();
						   					//alert(formdata)
											jq(this).text("Adding ");

											jq(this).attr("disabled","disabled");
											var citems=parseInt(jq("#citems").text())+1;
											jq("#citems").text(citems);
											var count_cart=parseInt(jq("#count_cart").text())+1;
											jq("#count_cart").text(count_cart);

											jq.ajax({

												 type: "POST",

												 url: '<?php echo base_url();?>index.php/Welcome/addtocart_altration',

												 data: {"formdata":formdata},

												 success: function(response){

													//alert(response);

													 //jq("#caddtocart_add").removeAttr('disabled');

													jq("#caddtocart_add").text('Added');

													 jq("#mycart").html(response);
													 jq("#mycart2").html(response);

													 }

												 });
						   }




									});

									jq("#input1").keyup(function (e)
								    {
									    var $qua = jq(this).val();
									    if($qua=='0')
									    {
									    	jq.confirm({
						                           title: 'Alert',
						                            content: 'Zero Quantity not be inserted.',
						                            icon: 'fa fa-question-circle',
						                            animation: 'scale',
						                            closeAnimation: 'scale',
						                            opacity: 0.5,
						                            buttons: {
						                                'confirm': {
						                                    text: 'Ok',
						                                    btnClass: 'btn-info',
						                                    action: function () {
						                                      //this.value='';
						                                      jq("#input1").val('');
						                                      // console.log(sid);
						                                        }
						                                },

						                               }

						                        });

									    }
									});

								});

							</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>

<link href="<?php echo base_url(); ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js" charset="UTF-8"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript">


    $('.form_datetime').datetimepicker({
        //language:  'fr',
        
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
       	hoursDisabled: '0,1,2,3,4,5,6,7,8,9,20,21,22,23'

    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>

 <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
        <script src="<?php echo base_url();?>assets/js/custom.js"></script>