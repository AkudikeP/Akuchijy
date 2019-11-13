<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<?php $this->session->unset_userdata('dis');?>
<div id="mycart">
<div class="shopping-cart__settings"><a href="#"> Empty Cart</a></div>

									<div class="shopping-cart__top text-uppercase">Cart(<?php echo $this->cart->total_items();?>)</div>

									<ul>

										<?php foreach($this->cart->contents() as $cart){?>

                                        <li id="shopping-cart__item<?php echo $cart['rowid'];?>" class='shopping-cart__item'>

											<div class="shopping-cart__item__image pull-left"><a href="#">

                                           <?php if($cart['custom']==""){//echo "yes"; ?>

                                            <img src="<?php echo base_url();?>assets/images/<?php echo $cart['img'];?>" alt=""/></a>



                                            <?php }else{ //echo "no"; ?>

                                             <img src="<?php echo base_url();?>adminassets/<?php echo $cart['img']; ?>" alt=""/></a>

                                            <?php }?></div>

											<div class="shopping-cart__item__info">

												<div class="shopping-cart__item__info__title">

													<h2 class="text-uppercase"><a href="#"><?php echo substr($cart['name'], 0,20);
													if(strlen($cart['name'])>20){echo '...';}?></a></h2>

												</div>





                <div class="shopping-cart__item__info__option">Qty: <?php echo $cart['qty'];?></div>

                  <div class="shopping-cart__item__info__option">SubTotal: &#8358; <?php echo $cart['subtotal'];?></div>

                   <!-- <div class="shopping-cart__item__info__price">&#8358; <?php echo $cart['subtotal'];?>/-</div>-->



                    <div class="shopping-cart__item__info__delete" id="<?php echo $cart['rowid'];?>"><a href="#" class="icon icon-clear"></a></div>

											</div>

										</li>

										<?php }?>

									</ul>

									<div class="shopping-cart__bottom">

										<div class="pull-left"><span class="shopping-cart__total">

                                        &#8358; <?php echo $this->cart->total();?></span></div>

										<div class="pull-right">

		<a href="<?php echo base_url();?>cart" class="btn btn--wd text-uppercase" style="color: rgb(255, 255, 255); width: 99px;">Cart</a>

        <a href="<?php echo base_url();?>checkout" class="btn btn--wd text-uppercase" style="color:#fff;">Checkout</a>

										</div>

									</div>
</div>
                                    <script   src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>

                                    <script>


	   				var abc = $.noConflict();

					abc(document).ready(function(){

						//alert("af");

						abc(".shopping-cart__settings").click(function(e){
							abc.ajax({

						 type: "POST",

						 url: '<?php echo base_url();?>Welcome/emptycart',

						// data: {"rid":rid},

						 success: function(response){

							 jqc("#mycart").html("<span class='shopping-cart__total'> <i class='fa fa-shopping-bag fa-2x'></i>Empty Cart</span>");
							 jqc("#mycart2").html("<span class='shopping-cart__total'> <i class='fa fa-shopping-bag fa-2x'></i>Empty Cart</span>");

							 }

						 });
						})
						abc(".shopping-cart__item__info__delete").click(function(e){
							abc(".sc").addClass('open');
						 console.log('called');
							var rid=abc(this).attr("id");
              				console.log(rid);

							abc.ajax({

						 type: "POST",

						 url: '<?php echo base_url();?>index.php/Welcome/removecart',

						 data: {"rid":rid},

						 success: function(response){
						 	abc(".sc").addClass('open');
						 	abc("#mycart").html(response);
							  abc("#mycart2").html(response);

						 	//alert('cart'+response.length);
						 	 if(response.length<3000)
              {
              	//alert('in');
                 abc("#mycart").html("<span class='shopping-cart__total'> <i class='fa fa-shopping-bag fa-2x'></i>Empty Cart</span>");
                 abc("#mycart2").html("<span class='shopping-cart__total'> <i class='fa fa-shopping-bag fa-2x'></i>Empty Cart</span>");
              }

							  //console.log(response);
							  //console.log('yes');
							  //abc(this).parent("div").hide();
							   //alert("shopping-cart__item" + rid);
							   //abc("#shopping-cart__item" + rid).hide();


							 },
							 error: function(response)
							 {
							 	console.log(response);
							 }


						 });
						});

					});

	   </script>
