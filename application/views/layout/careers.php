
	<style>
	.career_image{
		position: relative; 
   width: 100%;
   }
   .career-im{
    width: 100%;
    height: 380px;
   }
   .career_text{
 position: absolute; 
   top: 125px; 
   left:38%; 
   color:#fff;
   font-size:24px;
   background-color:#000;
   }
   .active2{
  color:#F00;
  border-bottom:1px solid #F00;
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
   .career-im{
    width: 100%;
    height: 150px;
   }
   }
    @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
.career_text{
 position: absolute; 
   top: 125px; 
   left:32%;
  
   }
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

.slt{
	width:20%;
}
.hover-squared{
	height:420px;
}
@media (max-width:500px){
.hover-squared{
	height:520px;
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
.active2{
  color:#F00;
  border-bottom:1px solid #F00;
}
.btn-filt:hover{
	color:#F00;
	border-bottom:1px solid #F00;
}
.btn-filt:active{
	color:#F00;
	border-bottom:1px solid #F00;
}
.btn-filt:focus{
	color:#F00;
	
	border-bottom:1px solid #F00;
}
.hire{
  font-size: 20px;
  font-weight: 500;
  margin-bottom: 5px;
  text-align: center;
}
.gap{
  margin-bottom:35px;
  font-size: 15px;
}
@media(max-width: 500px){
  .gap{
  margin-bottom:15px;
}
.centered-xs{
  text-align: center;
}
}
	</style>		<!-- Content section -->
    
  
<?php
$abouttext = $this->db->get_where("tbl_careerspage");
$data['careertext'] = $abouttext->result();	
foreach($data['careertext']  as $careersinfo)
{
	$image = $careersinfo->cp_bannerimg;
	if($image == ''){ $userimg = base_url().'assets/images/default-user-image.png';}else{ $userimg =  base_url().'assets/images/'.$image;}
 $image2 = $careersinfo->other_image;
  if($image2 == ''){ $userimg2 = base_url().'assets/images/default-user-image.png';}else{ $userimg2 =  base_url().'assets/images/'.$image2;}
	
	$imgtitle = $careersinfo->cp_imgtitle;
	$desc1 = $careersinfo->cp_desc1;
	$desc2 = $careersinfo->cp_desc2;
}
?>     
<section class="content" >
				<div class="career_image">
                <img class="career-im" src="<?php echo $userimg;?>"/> 
                <p class="career_text" align="center"> <?php  echo $imgtitle;?></p>
                </div>
				<section style="padding-top:20px;">
					<div class="container">
						<div class="col-md-12 gap">
							 <div class="hire">WE ARE HIRING</div>
								<div><?php  echo $desc1;?></div>
              </div>

                <div class="col-md-12 gap centered-xs">
<?php
echo form_open("Welcome/careers".$this->input->post("cat_id"),array("class"=>"form-horizontal"));{
?>
			
                       <div class="col-md-3">
                     <h5>Search for career Opportunities</h5></div>
								<div class="col-md-8">
					 <div>
                           <div class="col-md-3">
									<select class="select1 form-control" data-style="select--wd select--wd--sm" data-width="130" name="cat_id" required >
										<option value="">Select Category</option>
										<?php
                                            foreach($cats as $all)
                                            {
                                        ?>
                                        <option value="<?php echo $all->cat_id;?>"><?php echo $all->cat_name;?></option>
                                        <?php 
                                            }
                                        ?> 									
                                    </select>	
                                    </div>
                                    <div class="col-md-3">
                                    <select class="select2 form-control" data-style="select--wd select--wd--sm" data-width="130"  name="state_id" id="bstate">
										<option value="">Select State</option>
										<?php
                                            foreach($states as $all)
                                            {
                                        ?>
                                        <option value="<?php echo $all->id;?>"><?php echo $all->name;?></option>
                                        <?php 
                                            }
                                        ?> 	
									</select>							
                                 </div>
                                 <div class="col-md-3" id="city_select">
                                    <select class="select3 form-control" data-style="select--wd select--wd--sm" data-width="130"  name="city_id">
										<option value="">Select City</option>
										<?php
                                            foreach($cities as $all)
                                            {
                                        ?>
                                        <option value="<?php echo $all->id;?>"><?php echo $all->name;?></option>
                                        <?php } ?> 	
									                 </select>							
                                 </div>
                                 <div class="col-md-3">
                                    <select class="select4 form-control" data-style="select--wd select--wd--sm" data-width="130" name="job_type" >
										<option value="">Select Type</option>
										<option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
									</select>							
                                 </div>
                             </div>	
                                 </div>
                                 <div class="col-md-1">
                                 			<button class="btn btn-info" type="submit" name="search" >Search</button>
                                 			<!--<a href=""><i class="fa fa-2x fa-search"> </i></a>-->
                                 </div>
        				</div>
<?php 
echo form_close();
}
?>
<script type="text/javascript">
$(".filter-button").click(function(){
  alert('k');
   $('.filter-button').removeClass("active2");
   $(this).addClass("active2");
});​


  $("#bstate").change(function() {
    var sid = $(this).val();
    $.ajax({
        type : "POST",
        url : "<?php echo base_url('index.php/welcome/selectstat_oncarrer');?>",
        data : {sid:sid},
        success: function(data){
      //alert(data);
          if(data){
          $("#city_select").html(data);
          }
      }
    });
});
</script>
			<div class="hire">
							 CURRENT OPENINGS
						
						</div>
                        <br />
                       <div class="container">
    <?php
	if(!$this->input->post("cat_id"))
	{
	?>
    	<div>
        <button class="btn btn-filt filter-button active2" data-filter="all">All</button>
		<?php    foreach($cats as $all){?>        
        <button class="btn btn-filt filter-button" data-filter="<?php echo $all->cat_id;?>"><?php echo $all->cat_name;?></button>
		<?php } ?>
    </div>
    <br />    
    <div class="row">
    <?php    foreach($vacancy as $all){?>        
        <div class="col-md-4 filter <?php  echo $all->cat_id;?>">
       <a href="<?php echo base_url();?>careerdetails/<?php echo $all->vac_id;?>"> <div class="bx">
        <div class="pdd">
            <h5><?php  echo $all->job_title;?> </h5>
            <h6> <?php echo $all->name;?>, India </h6>
            </div>
            </div></a>
        </div>
    <?php }  }else{ ?>
    	<div>
		<?php   
		$q = $this->db->get_where('tbl_careercategory',array('cat_id'=>$this->input->post("cat_id")));
		$data['edit'] = $q->result();
		 foreach($data['edit'] as $all){?>        
        <button class="btn btn-filt filter-button" data-filter="<?php echo $all->cat_id;?>"><?php echo $all->cat_name;?></button>
		<?php } ?>
    </div>
    <br />    
    <div class="row">
    <?php    
	$q1 = $this->db->get_where('tbl_vacancy',array('cat_id'=>$this->input->post("cat_id")));
	$data['edit1'] = $q1->result();
	foreach($data['edit1'] as $alljob){
		
	$q2 = $this->db->get_where('cities',array('id'=>$alljob->city_id));
	$data['edit2'] = $q2->result();
	foreach($data['edit2'] as $city)		
     		
	?>        
        <div class="col-md-4 filter <?php  echo $alljob->cat_id;?>">
       <a href="<?php echo base_url();?>index.php/welcome/careerdetails/<?php echo $alljob->vac_id;?>"> <div class="bx">
        <div class="pdd">
            <h5><?php  echo $alljob->job_title;?> </h5>
            <h6> <?php echo $city->name;?>, India </h6>
            </div>
            </div></a>
        </div>    
    <?php } ?>
    </div>
    <?php } ?>
</div> 
</div>
 <div class="divider"> </div>
<div>
          <div class="col-md-6 team" align="center">
            
              <div> <img src="<?php echo $userimg2; ?>" alt="Our Team" class="img-responsive" />

              </div>
          <div class="product-category__hover caption"></div>
          </div>
          <div class="col-md-6 team">
            <div class="banner banner--icon hover-squared">
              <div class="banner--icon__icon"></div>
              <div class="banner--icon__text">
                <h4 class="text-uppercase text-center">We are a team.</h4>
                <div class="banner--icon__text__divider"></div>
                <div>
				<?php  echo $desc2;?>
				</div>
              </div>
              <div class="product-category__hover caption"></div>
            </div>
            
          </div>
        </div>
        </section>
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