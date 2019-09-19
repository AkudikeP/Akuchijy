<div id="pageContent"> 

    

    <!-- Breadcrumb section -->

    

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

          

          <div class="product-info col-sm-8 col-md-8 col-lg-8">
		
           <table class="table table-bordered">
				<thead><tr><!--<th>S.No.</th>--><th>Preview</th><th>Fabric</th><th>Options</th><th>Qty</th><th>Amount</th><th>Remove</th></tr></thead>
                <tbody>
                <?php $i=1;foreach($this->cart->contents() as $cart){?>
                <tr><!--<td><?php echo $i;?></td>--><td><img class="img img-responsive" src="<?php echo base_url();?>assets/images/fabrics/<?php echo $cart['img'];?>" /></td>
                <td><h4><?php echo $cart['name'];?></h4></td>
                <td><?php print_r($cart['options']);?></td>
                <td><div class="input-group-qty pull-left"> <span class="pull-left"> </span>

                <input type="text" name="qty" id="qty" class="input-number input--wd input-qty pull-left" value="1" min="1" max="100">

                <span class="pull-left btn-number-container">

                <button type="button" class="btn btn-number btn-number--plus" data-type="plus" data-field="quant[1]"> + </button>

                <button type="button" class="btn btn-number btn-number--minus" disabled="disabled" data-type="minus" data-field="quant[1]"> &#8211; </button>

                </span> </div></td>
                <td><span class="shopping-cart__total"><?php echo $cart['subtotal'];?>/-</span></td>
                <td><button class="btn btn--wd text-uppercase"><i class="fa fa-trash-o"></i></button></td></tr>
                <?php $i++;}?>
                </tbody>
                <tfoot><tr><!--<th>S.No.</th>--><th></th><th colspan="3">
                    <button class="btn btn--wd text-uppercase">Continue Shopping</button></th><th colspan="2">
                    <button class="btn btn--wd text-uppercase">Checkout</button>
                    </th></tr></tfoot>
                	<!--<tfoot><tr><!--<th>S.No.</th><th></th><th colspan="3">
                    <h4>Total <?php echo $this->cart->total_items();?> Item(s)</h4>
                   </th><th colspan="2"><span class="shopping-cart__total">Rs. <?php echo $this->cart->total();?>/-</span>
                   
                    </th></tr></tfoot>-->
                    
         	</table>
        
          </div>

          <div class="col-sm-12 col-md-4 col-lg-4">

          

            <div class="card">

              <div class="card__row"> <h4><span class="icon icon-bag-alt"></span>
              <strong>Cart Summary (<?php echo $this->cart->total_items();?>)</strong></h4></div>

              <a href="#" class="card__row card__row--icon">

              <div class="card__row--icon__icon"> <span class="icon icon-shop-label"></span></div>

              <div class="card__row--icon__text">

                <span class="shopping-cart__total">Rs. <?php echo $this->cart->total();?>/-</div>

              </a> <a href="#" class="card__row card__row--icon">

              <div class="card__row--icon__icon"> <span class="icon icon-money"></span></div>

              <div class="card__row--icon__text">

                <div class="card__row__title">Free Reward Card</div>

                Worth $10, $50, $100. <br>

              </div>

              </a> <a href="#" class="card__row card__row--icon">

              <div class="card__row--icon__icon"> <span class="icon icon-identification-alt"></span></div>

              <div class="card__row--icon__text">

                <div class="card__row__title">Join to our Club</div>

              </div>

              </a> <a class="card__row card__row--icon">

              <div class="card__row--icon__icon"> <span class="icon icon-truck"></span></div>

              <div class="card__row--icon__text">

                <div class="card__row__title">Free shipping</div>

              </div>

              </a> </div>

          </div>

          

        </div>

      </div>

    </section>

    

    

    <!-- End Content section --> 

  </div>