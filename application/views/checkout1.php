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
          <div class="panel panel-primary">
      <div class="panel-heading" >  <h4 class="text-uppercase text-left" style="padding: 12px 20px 0.5em;"><i class="fa fa-credit-card"></i>&nbsp;&nbsp;Billing & Shipping Details</h4></div>
      <div class="card card--form">
             
              <?php echo form_open("index.php/welcome/place_order",array('class'=>"contact-form"));?>
                
              	<label>Billing Name *</label>
                <input type="text" value="<?php echo $this->session->userdata("name");?>" name="bname" class="input--wd input--wd--full" >
                <label>Billing Contact *</label>
               	<input type="text"  name="bcontact" class="input--wd input--wd--full" >
                <label>Billing Address *</label>
                <textarea rows="3" name="baddress" style="min-height:50px;" type="text" class="input--wd input--wd--full" ></textarea>
                <label>Select State*</label>
                <select class="input--wd input--wd--full" name="bstate">
                	<option value=""></option>
                    <option value="36">Madhya Pradesh</option>
                </select>
                <label>City *</label>
                <input type="text" name="bcity" class="input--wd input--wd--full" >
                <label>Pin Code  *</label>
                <input type="text" name="bpin" class="input--wd input--wd--full">
                <div class="row">
                               <!-- <div class="col-md-3">

                                    <label class="radio">

                                    <input id="radio1" type="radio" name="radios" value="best" checked class="measure">

                                    <span class="outer"><span class="inner"></span></span>Best Fit/Stitch</label>

                                </div>-->

                                <div class="col-md-3">

                                    <label class="radio">

                                    <input id="radio2" type="radio"  value="COD" name="pay" class="measure">

                                    <span class="outer"><span class="inner"></span></span>Cash On Delivery</label>

                                </div>

                                

                                <div class="col-md-3">

                                    <label class="radio">

                                    <input id="radio4" type="radio"  value="PAYU" name="pay" class="measure">

                                    <span class="outer"><span class="inner"></span></span>PayU Money</label>

                                </div>
</div>
                <!--<div class="checkbox-group">
                  <input type="checkbox" id="checkBox2">
                  <label for="checkBox2"> <span class="check"></span> <span class="box"></span>Remember Me</label>
                </div>-->
                <br/>
                <button type="submit" name="submit" class="btn btn--wd text-uppercase wave">Place Order</button>
             <?php echo form_close();?>
            
            </div>
              <!--<div class="panel panel-primary">
      <div class="panel-heading" >  <h4 class="text-uppercase text-left" style="padding: 12px 20px 0.5em;"><span class="badge">2</span>&nbsp;&nbsp;Payment option</h4></div>
      
      <div class="panel-heading" >  <h4 class="text-uppercase text-left" style="padding: 12px 20px 0.5em;"><span class="badge">3</span>&nbsp;&nbsp;Sizing And Fit</h4></div>
      </div>-->
    </div>
		
        
          </div>

          <div class="col-sm-12 col-md-4 col-lg-4">

          

            <div class="card">

              <div class="card__row"> <h4><span class="icon icon-bag-alt"></span>
              <strong>Order Review (<?php echo $this->cart->total_items();?> item)</strong></h4></div>

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