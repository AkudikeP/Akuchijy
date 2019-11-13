  <style>
	.career_image{
		position: relative; 
   width: 100%;
   }
   .career_text{
 position: absolute; 
   top: 125px; 
   left:42%; 
   right: 42%;
   
   color:#fff;
   font-size:24px;
   background-color:#000;
   }
   .port-image
{
    width: 100%;
}

.col-md-3
{
    margin-bottom:20px;
}

.each-item
{
    position:relative;
    overflow:hidden;
}

.each-item:hover .cap2, .each-item:hover .cap1
{
    left:0px;
}

.cap1
{
    position:absolute;
    width:100%;
    height:70%;
    background:rgba(255, 255, 255, 0.5);
    top:0px;
    left:-100%;
    padding:10px;
    
    transition: all .5s;
}

.cap2
{
    position:absolute;
    width:100%;
    height:30%;
    background:rgba(0, 178, 255, 0.5);
    bottom:0px;
    left:100%;
    padding:10px;
    
    transition: all .5s;
}
.bx{
	border:1px solid rgba(0, 0, 0, 0.35);
	margin-top:20px;
}
.bx:hover{
	border:1px solid rgba(0, 0, 0, 0.25);
	
}

.pdd{
	padding:15px;
}
.pdd1{
	padding:10px 5px;
}

.slt{
	width:20%;
}
.hover-squared{
	height:500px;
}
@media (max-width:500px){
.hover-squared{
	height:250px;
}
.career-im{
    width: 100%;
    height: 150px !important;
   }
   .career_text {
    position: absolute;
    top: 30%;
    left: 20%;
    right: 20%;
    color: #fff;
    font-size: 18px;
    background-color: #000;
}
}
.team{
	
	padding:0px;
	margin:0px;
}
.btn-filt{
	background-color:transparent;
	margin-right:20px;
}
.btn-filt:hover{
	color:#03C;
	
	border-bottom:1px solid #03C;
}
.btn-filt:active{
	color:#03C;
	
	border-bottom:1px solid #03C;
}
.btn-filt:focus{
	color:#03C;
	
	border-bottom:1px solid #03C;
}
.clr-red{

	color:#F00 !important;
}

.btn-red{
	background-color:#bb0f0f !important;
	color:#fff !important;
	
}
.btn-blue{
	background-color:#138dc7 !important;
     color:#fff !important;
}
.btn-red:hover{
	background-color:#9e0808 !important;
	
	
}
.car1{
  padding:4px 12px !important;
  margin: 0px 2px;
}
.lrg{
	padding:12px 75px !important;
}
.career-im{
    width: 100%;
    height: 380px;
   }
	</style>		<!-- Content section -->
    
<?php
$bimg = $this->db->get_where("tbl_careerspage", array('cp_id' => 1));			
$data['bimg'] = $bimg->result();	
foreach($data['bimg'] as $bimgs) { $bimgs->cp_detailbanner; }

foreach($jobdetails as $jobinfo)
?>     
    
<section class="content" >
				<div class="career_image">
                <!--<img src="http://pitechnologiesindore.in/toevents/fronttheme/images/location-pic-4.jpg"  width="100%"; height="300px;"/> -->
				<img class="career-im" src="<?php echo base_url();?>assets/images/<?php echo $bimgs->cp_detailbanner;?>"/> 
                <p class="career_text" align="center"> <?php echo $jobinfo->job_title;?></p>
                </div>
                <section class="breadcrumbs  hidden-xs">
					<div class="container">
						<ol class="breadcrumb breadcrumb--wd pull-left">
										<li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>careers">careers</a></li>
							<li class="active"><?php echo $jobinfo->job_title;?> </li>
						</ol>
					</div>
				</section>
<section style="padding-top:20px;">
					<div class="container">
                     <div class="col-md-12">
                     <div class="col-md-7">
                     <h3><?php echo $jobinfo->job_title;?></h3>
                     <h4 class="clr-red"> Job Description  </h4><br />
                     <p>
                     	<?php echo $jobinfo->job_desc;?>
                     </p>
                     <br /><br /><br />
                     <div>
                                 <?php /* if($this->session->userdata('userid')==''){ ?> 
                                 <a href="<?php echo base_url().'/login?'.current_url(); ?>"><button class="btn btn-red wave waves-effect" >Apply for this job </button></a> <?php }else{ */ ?>

                                 <button class="btn btn-red lrg wave waves-effect" data-toggle="modal" data-target="#donateModal" id="applyjob1">Apply for this job
                     </button>
                     <?php /* } */?></div>
                     </div>
                     <div class="col-md-1"> </div>
                     <div class="col-md-4" align="center">
                      <div class="divider"> </div>
                     <!-- <button class="btn btn-red lrg wave waves-effect" id="applyjob2">Apply for this job
                     </button> -->
           
					  <b>You can drop your resume at </b><br /><b>career@ansvel.com</b>
                     
                     
                     
                     <div class="bx pdd1">
                     <p> SHARE THIS JOB OPENING </p> <br />
                      <a target="_blank" href="https://www.linkedin.com/cws/share?url=<?php echo current_url(); ?>"><button class="btn btn-primary wave waves-effect car1"><i class="fa fa-linkedin"> </i> </button></a>

  <a  target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url(); ?>"><button class="btn btn-primary wave waves-effect car1"><i class="fa fa-facebook"> </i> </button></a>

  <a target="_blank" class="twitter-share-button"
  href="https://twitter.com/intent/tweet?text=<?php echo current_url(); ?>">
<button class="btn btn-blue wave waves-effect car1"><i class="fa fa-twitter"> </i> </button></a>


<!-- Place this tag where you want the share button to render. -->
<a target="_blank" href="https://plus.google.com/share?url=<?php echo current_url(); ?>"><button class="btn btn-red wave waves-effect car1"><i class="fa fa-google-plus"> </i> </button></a>

                        
                     
                     
                     
                     </div>
                     
                     
                     </div>
                     
                     </div>
                     
                     
                    
        </div>
     




			
                
                </section>
                 <!-- Modal -->
  <div class="modal fade" id="donateModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h3 align="center"><strong>Apply For Job</strong></h3>
        <div class="modal-body">
<?php //$user_data = $this->db->get_where('users',array('uid'=>$this->session->userdata("userid")))->row(); ?>

                        <?php echo form_open_multipart("Welcome/applyjob",array('class'=>"form-horizontal"));?>

<!--input type="hidden" name="jobid" value="<?php echo $this->uri->segment(3); ?>"-->
<input type="hidden" name="jobtitle" value="<?php echo $jobinfo->job_title;?>">
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Name:</label>
    <div class="col-sm-9">
       <input type="text" class="form-control" value="" placeholder="Enter Name"  name="name" data-validation="custom" data-validation-regexp="^([a-zA-Z ]+)$" data-validation-allowing=" " title="Name Should Only have alphabets"  required="">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Mobile Number:</label>
    <div class="col-sm-9">
      <input type="number"  name="mobile" name="contact" pattern="[0-9]{10}" title="10 digit contact number" maxlength="10" class="form-control" value="<?php echo $user_data->mobile; ?>" placeholder="Enter Number">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Email:</label>
    <div class="col-sm-9">
      <input type="email" name="email" class="form-control" value="" id="email" placeholder="Enter email" required="">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Description:</label>
    <div class="col-sm-9">

            <textarea rows="3" name="baddress" style="min-height:50px;" type="text" class="form-control" required autocomplete="off"></textarea>

    </div>
  </div>
      <div class="form-group">
    <label class="control-label col-sm-3" for="email">Resume :</label>
    <div class="col-sm-9">

            <input type="file" name="resume" class="" accept="application/pdf,.doc, .docx," required="">(Only DOC or PDF files are allowed)

    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-12" align="center">
      <button type="submit" class="btn btn-red wave waves-effect">Submit</button>
    </div>
  </div>
              <?php echo form_close();?>
        </div>

      </div>

    </div>
  </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
    //alert('kk');
        $.validate({
            lang: 'en'
        });
    </script>
                <!--modal-->
                <div class="divider"> </div>
                
                
                <script>
				$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });

});
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1928177030801266";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
$(document).ready(function(){
    $("#applyjob1").click(function(){
		$("#openjob").show();
    });
});

$(document).ready(function(){
    $("#applyjob2").click(function(){
		$("#openjob").show();
    });
});
</script>	