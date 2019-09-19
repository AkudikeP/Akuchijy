<div id="pageContent"> 
    <!-- Breadcrumb section -->
    <section class="breadcrumbs breadcrumbs-boxed">
      <div class="container">
        <ol class="breadcrumb breadcrumb--wd pull-left">
          <li><a href="#">Home</a></li>
          <li class="active">More Services / Book An Appoinment</li>
        </ol>
      </div>
    </section>
    <!-- Content section -->
    <section class="content">
    <?php
  $user_info = $this->db->get_where("users",array("uid"=>$this->session->userdata("userid")))->row_array();
  //print_r($user_info);exit;
?>

      <div class="container" style="margin-top:20px;">

        <div class="row">

		  <div class="col-sm-6 col-md-6 col-lg-6" style="text-align: center;"><img src="<?php echo base_url(); ?>assets/images/more_services/resized_more_services/resize800_1200/<?php echo $info->image;?>" height="375" width="250"/></div>

          <div class="col-sm-6 col-md-6 col-lg-6">
         <div class="row">
          <div class="col-md-12">
			<div class="card card--form">
             <?php echo form_open("welcome/user_moreservice_appo",array('class'=>"contact-form"));?>
                 <h4 class="text-uppercase text-left"><i class="fa fa-user-plus" ></i> &nbsp;<strong>Booking</strong></h4><br />
                 <label class="lb">Address</label>	
                <input type="text" name="address" class="input--wd input--wd--full" required>
                <input type="hidden" name="more_services_id" class="input--wd input--wd--full" value="<?php echo $info->id;?>">
                <input type="hidden" name="user_id" class="input--wd input--wd--full" value="<?php echo $this->session->userdata("userid");?>">
                <input type="hidden" name="user_name" class="input--wd input--wd--full" value="<?php echo $user_info['name'];?>">
                <input type="hidden" name="user_contact" class="input--wd input--wd--full" value="<?php echo $user_info['mobile'];?>">
                <input type="hidden" name="user_email" class="input--wd input--wd--full" value="<?php echo $user_info['email'];?>">
                <input type="hidden" name="subcategory" class="input--wd input--wd--full" value="<?php echo $info->subcategory;?>">
                <input type="hidden" name="price" class="input--wd input--wd--full" value="<?php echo $info->price;?>">
                <input type="hidden" name="image" class="input--wd input--wd--full" value="<?php echo $info->image;?>">

                 <label class="lb">Landmark</label>

                  <input type="text" name="landmark" id="landmark" class="input--wd input--wd--full" required>

                   <label class="lb">Appoinment Date</label>

                <input type="date" name="app_date" class="input--wd input--wd--full" required>

                 <label class="lb">Appoinment Time</label>
                 <select class="input--wd input--wd--full" data-width="60" name="app_time" required>
					<option value="9 Am">9 Am</option>
					<option value="10 Am">10 Am</option>
					<option value="11 Am">11 Am</option>
					<option value="12 PM">12 PM</option>
					<option value="1 PM">1 PM</option>
					<option value="2 PM">2 PM</option>
					<option value="3 PM">3 PM</option>
					<option value="4 PM">4 PM</option>
					<option value="5 PM">5 PM</option>
					<option value="6 PM">6 PM</option>
					<option value="7 PM">7 PM</option>					
				</select><br/>
				<?php if($this->session->flashdata('msg')){?>
				  <div class="alert alert-danger">      
				    <?php echo $this->session->flashdata('msg');?>
				  </div>
				<?php } ?>
                <button type="submit" class="btn btn--wd2 text-uppercase wave" id="signup" name="signup">Book</button>

              <?php echo form_close();?>

            </div>

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
<script src="<?php echo base_url();?>assets/js/custom.js"></script>