<?php 
//echo $this->session->userdata('user_id');die;
  if(isset($_GET) && isset($_GET['email'])){
   // $chk2=$this->db->get_where("users",array("email"=>$_GET['email']));
    $this->session->set_userdata('user_id',$_GET['email']);
  }
  if($this->session->userdata('user_id')=='')
  {
    redirect('welcome/login');
  } 

?>
<style type="text/css">
  
.glogin
{

  background-color: #d34836;
  color: #fff;
  height: 37px;
  padding-top: 7px;
}
.flogin
{

  background-color:  #3b5998;
  color: #fff;
  height: 37px;
  padding-top: 7px;
  margin-bottom: 20px;
}
</style>
<div id="pageContent"> 

    <section class="breadcrumbs breadcrumbs-boxed">

      <div class="container">
      </div>
    </section>
    <!-- Content section -->

    <section class="content content--parallax top-null" data-image="<?php echo base_url();?>assets/images/aa.jpg" style="background-size: cover; background-repeat:no-repeat">
      <div class="container" style="padding-top:20px;">

        <div class="row">

          <div class="container"> 
        <!-- Nav tabs -->
        <div class="col-md-5" style="float:right">
        <div class="tab-content tab-content--wd">
          <div  role="tabpanel" class="tab-pane active" id="Tab4"  style="height:570px;">           
            <div class="card card--form">
                 <h4 class="text-uppercase text-left"><i class="fa fa-user-plus" ></i> &nbsp;<strong>Create New Password</strong></h4><br />
                 <label class="lb">New Password</label>
                <input type="password" name="password" id="npassword" class="input--wd input--wd--full" required="">                
                 <label class="lb">Retype Password</label>
                <input type="password" id="cpassword" name="password" class="input--wd input--wd--full" required="">
                <small class="text-danger" id="error"></small>
                <button type="submit" class="btn btn--wd2 text-uppercase wave" id="fpass12" name="signup" style="width: 100%;">Submit</button>
            </div>          
          </div>   
        </div>
      </div>
    </div>
<script>

var jq = $.noConflict();

          jq(document).ready(function(){//alert("sadf");

            jq("#fpass12").click(function(e){e.preventDefault();
            var np=jq("#npassword").val();
            var cp=jq("#cpassword").val();
            if(np=='')
            {
              jq("#error").html("Please enter password");
              return false;
            }

            else if(cp=='')
            {
              jq("#error").html("Please enter confirm password.");
              return false;
            }

            else if(np!=cp)
            {
              jq("#error").html("Password Doesnot Match");
              return false;
            }
            jq.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Welcome/changenew_pass',
               data: {cp:cp,np:np},
               success: function(response){
                if(response=='  true')
                {
                  alert('Password Changed Successfully.');
                  window.location.href = "<?php echo base_url('welcome/login');?>";
                }
                else
                {
                  console.log(response.length);
                  jq("#error").html(response);
                }
                 
                 }
               });
          });

          });

</script>

        </div>
      </div>
    </section>

    <!-- End Content section --> 


  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
