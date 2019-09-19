<div id="pageContent"> 

    

    <!-- Breadcrumb section -->

    

    <section class="breadcrumbs breadcrumbs-boxed">

      <div class="container">

        <ol class="breadcrumb breadcrumb--wd pull-left">

          <li><a href="#">Home</a></li>

          <li class="active">My Orders</li>

        </ol>

       

      </div>

    </section>

    

    <!-- Content section -->

    <section class="content">

      <div class="container" style="margin-top:20px;">

        <div class="row product-info-outer">
			<div class="col-sm-12 col-md-9 col-lg-9">
			
          

            <div class="card card--form">
            <form action="" method="post" id="pass" class="contact-form">
                <h4 class="text-uppercase text-left">Change Password</h4>
                <label class="lb">Ols Password</label>
                <input type="password" id="opassword"  class="input--wd input--wd--full" >
                <label class="lb">New password</label>
                <input type="password" id="npassword" class="input--wd input--wd--full">
                <label class="lb">Confirm Password </label>
                <input type="password" id="cpassword" class="input--wd input--wd--full" >
                <span class="error text-danger" id="error"></span><br/>
              
                <button type="submit" class="btn btn--wd text-uppercase wave">Change Now</button>
              </form>
              <script>
	$(document).ready(function(){
		$("#pass").submit(function(e){e.preventDefault();
			var op=$("#opassword").val();
			var np=$("#npassword").val();
			var cp=$("#cpassword").val();
			if(np!=cp)
			{
				$("#error").html("Password Doesnot Match");
				return false;
			}
			$.ajax({
				 type: "POST",
				 url: '<?php echo base_url();?>index.php/Welcome/change_pass',
				 data: {op:op,cp:cp,np:np},
				 success: function(response){
					alert(response);
					 $("#error").html(response);
					 }
				 });
		});
		});
	</script>
            </div>
            </div>
          <div class="col-sm-12 col-md-3 col-lg-3">
			
          

            <div class="card">

              <div class="card__row"> <h4><span><i class="fa fa-user"></i></span>
              <strong>Quick Links</strong></h4></div>

              <a href="<?php echo base_url();?>index.php/welcome/orders" class="card__row card__row--icon">

              <div class="card__row--icon__icon"> <span class="icon icon-shop-label"></span></div>

              <div class="card__row--icon__text">

                <span class="shopping-cart__total">Order History</span></div>

              </a> <a href="<?php echo base_url();?>index.php/welcome/profile" class="card__row card__row--icon">

              <div class="card__row--icon__icon"><i class="fa fa-lock fa-3x" style="opacity:0.5;"></i></div>

              <div class="card__row--icon__text">

                <div class="card__row__title">Change Password</div>

            

              </div>

              </a> <a href="#" class="card__row card__row--icon">

              <div class="card__row--icon__icon"> <i class="fa fa-user fa-3x " style="opacity:0.5;"></i></div>

              <div class="card__row--icon__text">

                <div class="card__row__title">My Profile</div>

              </div>

              </a> <a class="card__row card__row--icon">

              <div class="card__row--icon__icon"> <i class="fa fa-heart fa-3x" style="opacity:0.5;"></i></div>

              <div class="card__row--icon__text">

                <div class="card__row__title">My Wishlist</div>

              </div>

              </a> </div>

          </div>

          

        </div>

      </div>

    </section>

    

    

    <!-- End Content section --> 

  </div>