    
       <style type="text/css">
.imm4
{
  height: 300px;
}
.sizes-example-p{
  width: auto;
  height: 300px;
}

@media (max-width: 500px){
  .imm4
  {
    height: 260px !important;
  }


}
  
</style>         
                 
                 <?php 
				$i=1; 
				foreach($pre as $pre){
					 //print_r($pre);
					 ?>
					
                    
					
                    	<div class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6">
        
                          <div class="">          	
          <div class="product-category" > 
                     <div class="">                 
                        <a href="<?php echo $pre->id;?>" class="fromcat">

      

       <?php if(isset($pre->dfront) && !empty($pre->dfront)){ ?>
                  <img src="<?php echo base_url();?>adminassets/styles/<?php echo $pre->dfront;?>"  alt=""/>
                  <?php }else{ ?>
                  <img src="<?php echo base_url();?>assets/images/online_boutique/cover.jpg"  alt=""/>
                  <?php } ?>


                          
                        </a>
                    </div>
                 
            <div class="product-category__hover caption"></div>
            
              <div class="product-category__info__ribbon" style="
    background-color: transparent;
    color: #000;
    font-weight: 600;
    position:relative;
   bottom: 1px;
">
                <h5 class="product-category__info__ribbon__title"><?php echo $pre->dname;?></h5>
                 <i class="fa fa-inr"></i> <?php echo $pre->dprice;?>/-</h5>
                
              </div>
            </div>
            </div>
            <div>
            </div>
                   
                    </div>
										
									</div>
                 
									
                       <!-- <div class="<?php //echo $space;?>"></div>-->
                      
                   <?php $i++;}?><script>
									jq(".fromcat").click(function(e){e.preventDefault();
										jq(".product-preview-wrapper").removeClass("mark1");
										jq(this).closest("div.product-preview-wrapper").addClass("mark1");
										//alert(jq("#totattr").val());
										jq(".nextstep").attr("href",jq("#totattr").val());
										var fid=jq(this).attr("href");//alert(fid);
										jq("div.addons").hide();
										jq.ajax({
										 type: "POST",
										 url: '<?php echo base_url();?>Welcome/book_predesign',
										 data: {"fid":fid},
										 success: function(response){
											 //alert(response);
											 jq("#thumb2").html(response);
											 }
										 });
										 //jq.ajax({
//										 type: "POST",
//										 url: '<?php //echo base_url();?>Welcome/bimage',
//										 data: {"fid":fid},
//										 success: function(response){
//											 alert(response);
//											// jq("#bimg").html(response);
//											 }
//										 });
									});
									</script>

          