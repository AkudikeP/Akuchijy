<style type="text/css">



@media(max-width: 500px){

.simg{

	padding-right:15px !important;
	
}
}
</style>

<div id="pageContent"> 


    <section class="breadcrumbs breadcrumbs-boxed">



      <div class="container">



        <ol class="breadcrumb breadcrumb--wd pull-left">



          <li><a href="#">Home</a></li>



          <li class="active">My Cart</li>



        </ol>



       



      </div>



    </section>



    



    <!-- Content section -->



    <section class="content">



      <div class="container" style="margin-top:20px;">



        <div class="row product-info-outer">

<script>var jq = $.noConflict();

					jq(document).ready(function(){
						jq("#apply").click(function(){
							var code=jq("#coupon").val();//alert(code);
							if(code=="")
							{
								jq("#cresp").html("Please Enter a Coupon Code");return false;
							}
							else{
							jq.ajax({

						 type: "POST",

						 url: '<?php echo base_url();?>Welcome/discount',

						 data: {code:code},

						 success: function(response){
								console.log(response);
							 jq("#cresp").html(response);
							//jq("#ctot").html(response.total);
							 },
							 error: function(response){
							 	console.log(response);
							 }

						 });
						 jq.ajax({

						 type: "POST",

						 url: '<?php echo base_url();?>index.php/Welcome/cart_total',

						 data: {},

						 success: function(response){
								//alert(response);
							 jq("#ctot").html(response);

							 }

						 });
						 
							}
						});
						jq("button.ajaxcartremove").click(function(){
							var rid=jq(this).attr("id");
							jq(this).closest("tr").remove();
							jq.ajax({

						 type: "POST",

						 url: '<?php echo base_url();?>index.php/Welcome/removecart',

						 data: {"rid":rid},

						 success: function(response){

							 jq("#mycart").html(response);

							 }

						 });
						 jq.ajax({

						 type: "POST",

						 url: '<?php echo base_url();?>index.php/Welcome/cart_total',

						 data: {},

						 success: function(response){
								//alert(response);
							 jq("#ctot").html(response);

							 }

						 });
						});
			
						jq(".btn-number").click(function(){
							var id=jq(this).attr("id");
							//var pr=jq('#'+id+'subtotal').text();
							var qty=jq('#'+id+'qty').val();
							//alert(qty);
							jq.ajax({
							 type: "POST",
							 url: '<?php echo base_url();?>Welcome/updatemycart',
							 data: {id:id,qty:qty},
							 success: function(response){
								 //alert(response);
								 jq('#'+id+'subtotal').text(response);
							 }
							 });
							 jq.ajax({

						 type: "POST",

						 url: '<?php echo base_url();?>index.php/Welcome/cart_total',

						 data: {},

						 success: function(response){
							jq("#ctot").html(response);
							 }

						 });
						
					});
});
				</script>

          



          <div class="product-info col-sm-12 col-md-8 col-lg-8">

			<?php if($this->cart->total_items()==0){

				?>

      <i class="fa fa-shopping-cart fa-4x" aria-hidden="true" style="font-size:250px;"></i>
      
<a href="<?php echo base_url();?>" class="btn btn--wd text-uppercase pull-right">Shop Now</a>
				<h1>Your Cart is Empty. </h1>

				   

				<?php 

				}else{?>
            <div style="overflow:scroll;">
           <table class="table table-bordered">
 
				<tr style="text-align:center"><!--<th>S.No.</th>--><th>Preview</th><th>Fabric</th><th>Qty</th><th>Amount</th><th>Remove</th></tr>

                <tbody>

                <?php $i=1;foreach($this->cart->contents() as $cart){?>

                <tr><!--<td><?php echo $i;?></td>--><td width="100px" class="simg">
                <?php if($cart['custom']==""){?>

           <img class="img img-responsive" src="<?php echo base_url();?>assets/images/<?php echo $cart['img'];?>" alt=""/></a>

                                           

                                            <?php }else{?>

                                             <img src="<?php echo base_url();?>adminassets/<?php echo $cart['img']; ?>" alt="" width="100%" /></a>

                                            <?php }?>
               <!-- <img  class="img img-responsive" src="<?php echo base_url();?>assets/images/fabrics/<?php echo $cart['img'];?>" />--></td>

                <td><h5><?php echo $cart['name'];?></h5></td>

                <td>

                <div class="input-group-qty pull-left"> <span class="pull-left"> </span>



                <input type="text" name="qty" id="<?php echo $cart['rowid'];?>qty" class="input-number input--wd input-qty pull-left" value="<?php echo $cart['qty'];?>" min="1" max="100">



                <span class="pull-left btn-number-container">



                <button href="<?php echo $cart['price'];?>" type="button" id="<?php echo $cart['rowid'];?>" class="btn btn-number btn-number--plus" data-type="plus" data-field="quant[<?php echo $cart['qty'];?>]"> + </button>



                <button href="<?php echo $cart['price'];?>" type="button" id="<?php echo $cart['rowid'];?>" class="btn btn-number btn-number--minus" data-type="minus" data-field="quant[<?php echo $cart['qty'];?>]"> &#8211; </button>



                </span> </div></td>

                <td><span class="shopping-cart__total" id="<?php echo $cart['rowid'];?>subtotal"><?php echo $cart['subtotal'];?></span></td>

                <td><button class="btn btn--wd text-uppercase ajaxcartremove" id="<?php echo $cart['rowid'];?>"><i class="fa fa-trash-o"></i></button></td></tr>

                <?php $i++;}?>

                </tbody>

                <tfoot><tr align="center"> <th> </th><!--<th>S.No.</th>--><th colspan="2">

                    <a href="<?php echo base_url();?>" class="btn btn--wd text-uppercase">Continue Shopping</a></th>


                    <th colspan="2">

                   
                    <a href="<?php echo base_url();?>index.php/welcome/checkout" class="btn btn--wd text-uppercase">Checkout</a>

                    </th></tr></tfoot>

                	<!--<tfoot><tr><!--<th>S.No.</th><th></th><th colspan="3">

                    <h4>Total <?php echo $this->cart->total_items();?> Item(s)</h4>

                   </th><th colspan="2"><span class="shopping-cart__total">Rs. <?php echo $this->cart->total();?>/-</span>

                   

                    </th></tr></tfoot>-->

                    

         	</table>

        <?php }?>
          </div>
        </div>


          <div class="col-sm-12 col-md-4 col-lg-4">



          



            <div class="card">



              <div class="card__row"> <h4><span class="icon icon-bag-alt"></span>

              <strong>Cart Summary (<?php echo $this->cart->total_items();?>)</strong></h4></div>



              <a href="#" class="card__row card__row--icon">



              <div class="card__row--icon__icon"> <span class="icon icon-shop-label"></span></div>



              <div class="card__row--icon__text">

<?php 
										if($this->session->userdata("dis")){
											$off='<hr/><strong class="text-success">Discount Offer Applied of  <i class="fa fa-inr"> '.$this->session->userdata("dis").'</i></strong>';
											$ctot= $this->cart->total()-$this->session->userdata("dis");
										}
										else{
											$off="";
											$ctot= $this->cart->total();}?>

                <span class="shopping-cart__total">&#8358; <b id="ctot"><?php echo $ctot;?></b></span>
                <?php echo $off;?>
                </div>



              </a> 
                

        
<br/><br/>
          <div class="row">

        <div class="col-md-12">
       
        <input type="text" class="input--wd input--wd--full" id="coupon" placeholder="Enter Coupon Code"/></div>
		
        </div><br />

         <div class="row">

         <div class="col-md-12" align="center"> <button type="submit" id="apply" class="btn btn--wd btn-block text-uppercase wave">Apply Coupon</button></div><br><br><br><br><center><strong class="text-warning" id="cresp"></strong></center>

       </div>
       
       
              
              </div>



          </div>



          



        </div>



      </div>



    </section>



    



    



    <!-- End Content section --> 



  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/custom.js"></script>