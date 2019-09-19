
	<style>
	.career_image{
		position: relative;
   width: 100%;
   }
   .career_text{
 position: absolute;
   top: 125px;
   left:38%;
   background-color: #fff;
   color:#000;
   font-size:28px;

   }

.btn-m{
  background-color: #000;
  color: #fff;
  padding: 8px 60px !important;
  margin: 15px;
}
.btn-m:hover{
  color: #fff;
}
h2{
  margin-bottom: 10px;
}
.size_im{
  width: 100%;
  max-height: 380px;
}
@media(max-width: 500px){
    .career_text{
 position: absolute; 
   top: 30%; 
   left:15%;
   right: 15%; 
   color:#fff;
   font-size:18px;
   background-color:#000;
   }
   
   }
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
.career_text{
 position: absolute; 
   top: 125px; 
   left:32%;
  
   }
    }

@media (max-width:500px){
.hover-squared{
	height:250px;
}
.size_im{
   width: 100%;
  height: 150px;
}

}
.ul-rt ul{
  position: relative;
  left: 20px;
}
	</style>		



<section class="content" style="padding-bottom:50px;">

				<div class="career_image">
                <img class="size_im" src="<?php echo base_url(); ?>img/Tailor.jpg"/>
                <p class="career_text" align="center">MOBILE DARZI SIZE GUIDE </p>
                </div>
<section style="padding-top:20px;">
					<div class="container">
   <div class="col-md-12 ul-rt">
	<?php $contant = $this->db->get_where('measurementguide',array('id'=>1))->row();
	echo $contant->contant; ?>
<!--p> Mobile Darzi is a one stop solution of all your tailoring needs. We serve fashion stitched to perfection.
  Gone are the days when you had to continuously follow up with your tailor for your stitched cloth. At Mobile Darzi, we take your measurement at your doorstep and the stitched cloth is delivered back to you at your doorstep only. What's more- we offer a variety of fabric as well, in case you don't have one with yourself.</p>

<br>


  <h2> Tips for measuring youself </h2>

  <ul style="list-style:disc">
  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </li>
  <li> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</li>
  <li> Lorem Ipsum is simply dummy text of the printing and typesetting industr the industry's standard dummy text ever since the 1500s</li>
  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </li>
  <li> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</li>
</ul>
<br>
<h2> What do you need</h2>

  <ol style="list-style-type:binary">
  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </li>
  <li> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>

</ol>
<br>
<h2> How to make the measurement </h2>

  <ul style="list-style:disc">
  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s </li>
  <li> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</li>
  <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</li>
  <li> Lorem Ipsum is simply dummy text of the printing and typesetting industr the industry's standard dummy text ever since the 1500s</li>

</ul>
<br-->
</div>
<div class="col-md-12" style="margin-top:30px;">
<div class="col-md-4 col-sm-4" align="center">
<a href="<?php echo base_url() ?>measurement-info/women/1"><button class="btn btn-m"> Women </button></a>
  </div>

  <div class="col-md-4 col-sm-4" align="center">
<a href="<?php echo base_url() ?>measurement-info/men/2"><button class="btn btn-m"> Men </button></a>
  </div>

  <div class="col-md-4 col-sm-4" align="center">
<a href="<?php echo base_url() ?>measurement-info/kids/3"><button class="btn btn-m"> Kids </button></a>
  </div>


          </div>
        </div>
        </section>

</section>
 <script type="text/javascript">
            document.documentElement.className = 'no-fouc';
        </script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>
        <script src="<?php echo base_url();?>assets/js/custom.js"></script>