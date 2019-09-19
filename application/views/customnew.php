<style>
@font-face{font-family:'Glyphicons Halflings';src:url('../fonts/glyphicons-halflings-regular.eot');src:url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'),url('../fonts/glyphicons-halflings-regular.woff') format('woff'),url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'),url('../fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');}.glyphicon{position:relative;top:1px;display:inline-block;font-family:'Glyphicons Halflings';font-style:normal;font-weight:normal;line-height:1;-webkit-font-smoothing:antialiased;}
.glyphicon-arrow-left:before{content:"\e091";}
.glyphicon-arrow-right:before{content:"\e092";}
.glyphicon-arrow-up:before{content:"\e093";}
.glyphicon-arrow-down:before{content:"\e094";}

.imm{
	height: 250px;
}
@media (max-width:500px){
	.imgLiquid {
    width: auto;
    height: 142px !important;
}
.imm{
	height: 142px;
}
.file-sm{
  width: 50px;
  height: 50px;
}
.upload_d{
  width: 90% !important;
}

}
.sizes-example1 {
  width: auto;  !important;
  height: 400px; !important;
}
.upload_d{
  width: 50%;
}

</style>

<?php ini_set('memory_limit','-1'); ?><style>
.tab-content--wd > .tab-pane
{

	border:none !important;
}
.nav-tabs--wd > li.active > a, .nav-tabs--wd > li.active > a:hover, .nav-tabs--wd > li.active > a:focus
{
	border:none;
}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus
{
	background-color:#000;
	color:#fff;
}
.nav > li > a:hover, .nav > li > a:focus
{
	background-color:#000;
}
.nav-tabs--wd
{
	border-bottom:none;
}
</style>
<script src="<?php echo base_url();?>assets/vendor/mousewheel/jquery.mousewheel.min.js"></script>

<script type="text/javascript">

		$(document).ready(function () {
		$(".imgLiquidFill").imgLiquid({fill:true});

	});

	</script>




<script>
/* Function to show image preview */

function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    document.getElementById('img-previews').innerHTML = '';
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {
        // Only process image files.
        if (!f.type.match('image.*')) {
            continue;
        }
        $('.img-preview-wrapper').removeClass('hidden');
        var reader = new FileReader();
        reader.onload = (function (theFile) {
            return function (e) {
                // Render thumbnail.
                var figure = document.createElement('figure');
                figure.innerHTML = ['<img class="img-preview" src="', e.target.result,
                    '" title="', escape(theFile.name), '"/>'].join('');
                document.getElementById('img-previews').insertBefore(figure, null);
            };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
}


$("input[type=file]").bind('change', handleFileSelect);
function checkOffset() {
    if($('#social-float').offset().top + $('#social-float').height()
                                           >= $('#footer').offset().top - 10)
        $('#social-float').css('position', 'absolute');
    if($(document).scrollTop() + window.innerHeight < $('#footer').offset().top)
        $('#social-float').css('position', 'fixed'); // restore when you scroll up
    $('#social-float').text($(document).scrollTop() + window.innerHeight);
}
$(document).scroll(function() {
    checkOffset();
});


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	var img='';
	$('#div').on(
    'dragover',
    function(e) {
        e.preventDefault();
        e.stopPropagation();
    }
)
$('#div').on(
    'dragenter',
    function(e) {
        e.preventDefault();
        e.stopPropagation();
    }
)
$('#div').on(
    'drop',
    function(e){
        if(e.originalEvent.dataTransfer){
            if(e.originalEvent.dataTransfer.files.length) {
                e.preventDefault();
                e.stopPropagation();
                /*UPLOAD FILES HERE*/
                 if (this.disabled) return alert('File upload not supported!');
            		var F = e.originalEvent.dataTransfer.files;
            		if (F && F[0]) for (var i = 0; i < F.length; i++) readImage(F[i]);

               // upload(e.originalEvent.dataTransfer.files);
            }
        }
    }
);

	function readImage(file) {

            var reader = new FileReader();
            var image = new Image();


            reader.readAsDataURL(file);
            reader.onload = function(_file) {
                image.src = _file.target.result;              // url.createObjectURL(file);
                image.onload = function() {
                    var w = this.width,
                h = this.height,
                t = file.type,                           // ext only: // file.type.split('/')[1],
                n = file.name,
                s = ~ ~(file.size / 1024) + 'KB';
                console.log(this.src);
                 jq('#blah').attr('src', this.src);
                 jq('#blah1').attr('src', this.src);
                 jq('#dragyour').hide();
                 jq('#or').html('');

                 jq(".nextstep").removeAttr("disabled");
                 jq(".nextstep").attr("href",jq("#totattr").val());
                 jq(".nextstep").attr("alt",'blah');
                 jq(".prevstep").attr("disabled","disabled");
                  //  $('#uploadPreview').append('<img src="' + this.src + '"> ' + w + 'x' + h + ' ' + s + ' ' + t + ' ' + n + '<br>');
                };
                image.onerror = function() {
                    alert('Invalid file type: ' + file.type);
                };
            };

         }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            	//console.log(e.target.result);
            	img = e.target.result;
            	console.log(img);
            	//$( "p" ).( "<strong>Hello</strong>" );
            	//jq('#thumb2').html(img);
                jq('#blah').attr('src', img);
                jq('#blah1').attr('src', img);
            }

            reader.readAsDataURL(input.files[0]);
            //console.log(reader);
        }
    }

    jq("#imgInp").change(function(){
        readURL(this);
        jq(".nextstep").removeAttr("disabled");
        jq(".nextstep").attr("href",jq("#totattr").val());

    });

    $(".measur").click(function(){
        $(".measur").css("display", "none");
    });
});
</script>




<div id="pageContent" style="padding-bottom:0px;">



   <?php

   $this->db->group_by("mtitle");
   $this->db->where("mid",$this->uri->segment(3));
   $this->db->order_by("cid", "asc");
   $ca=$this->db->get_where("category",array('status'=>'enable'))->result();
   //echo print_r($ca);//->cat_name;
   //print_r($ca);
  // $totattr=$this->db->get_where("attributes",array("cat"=>$this->uri->segment(3)))->num_rows();?>
    <!-- Content section -->
    <style>

	.selected{
      background-color:#3373c8;
      color:#fff;
      padding:2%;
    }
	.selected2{
      background-color:#3373c8;
      color:#fff;
      padding:2%;
	  margin-top: 7px;

    }
    @media(max-width: 410px){
.sizes-example1 {
  width: auto;  !important;
  height: 140px; !important;


}
    	.boxSep{
		height: 250px !important;
}
	}

  @media only screen
and (min-device-width : 414px)
and (max-device-width : 736px)
and (orientation : portrait)
 {
  .boxSep{
    height: 300px !important;

    }

  .sizes-example1 {
  width: auto;  !important;
  height: 170px; !important;


}}
@media only screen and (min-device-width : 768px) and (max-device-width : 1023px) {
.boxSep{
    height: 360px !important;
}
}
	.boxSep{
		background-color:#ffffff;
		margin-right: 5px;
		height: 420px;

	}
	.imgLiquid{
		width: auto;
		height: 300px;
	}
	.LogSep{
		margin:10px;
	}


.sizes-example {
	float: left;

	margin-left: 1%;
}
	@media (min-width:500px){
	.fib
	{
		width:52%;
	}
	}
	.tbsss:hover
	{
		color:#FFF !important;
	}

	</style>
	<?php $heading_data = $this->db->get('stitching_headings')->row(); ?>
    <section class="content" >

      <div class="container">
      <input type="hidden" id="totattr" value="" />
        <div class="row product-info-outer">
        <div class="panel panel-default panel-table">
          <div class="panel-body">
            <div class="tr">
              <div class="td col-md-12 text-center">
                <div class="social-links social-links--colorize social-links--dark social-links--large">
                  <h3 style="
    font-weight: 400;
    padding-bottom: 13px;" id="dyna_heading"> <?php echo $heading_data->title; ?>  </h3>
 <?php echo"<span id='simple_text'>You have to select atleast one from below.</span>"; ?>
              <!--  <section class="breadcrumbs  hidden-xs">
					<div class="container" >
						<ol class="breadcrumb breadcrumb--wd pull-left" style="padding-right:10px;padding-left:10px;">
							<li><a href="#">Home</a></li>
							<li class="active">Stitching</li>

						</ol>
					</div>
				</section>-->

                <ul class="nav nav-tabs nav-tabs--wd" role="tablist" style="display:none;" id="uls">
          <li class="active col-md-4 col-sm-4 firstd">
          <a href="<?php echo base_url();?>welcome/custom/<?php echo $this->uri->segment(3);?>"  class="text-uppercase tbsss" style="font-size:17px;">Design Yourself </a>
          </li>
          <li class="col-md-4 col-sm-4 middled"><a href="#Tab2" id="upload_design" role="tab" data-toggle="tab" class="text-uppercase tbsss" style="font-size:17px;">Upload Your Design </a></li>
          <li class="col-md-4 col-sm-4 lastd"><a href="#Tab3" id="pre_design" role="tab" data-toggle="tab" class="text-uppercase tbsss" style="font-size:17px;">Choose From Catalogue </a></li>


        </ul>
                  <div class="tab-content tab-content--wd">
          <div role="tabpanel" class="tab-pane active style-4" id="Tab1" style="box-shadow: none;">

      <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/jquery-confirm.css"/>
    <script src="<?php echo base_url();?>adminassets/js/bundled.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery-confirm.js"></script>
           	 <script>
			 var id = "";
			 function fun(a){
				id=a;

			 }

		var jq = $.noConflict();
		jq(document).ready(function(){
			jq(".nextstep").attr("disabled","disabled");
			jq(".nextstep").attr("display","none");
//jq(".prevstep").attr("display","none");
			jq("div").click(function() {

    				if ( jq(this).hasClass( "mark1" ) ) {
 							jq(".nextstep").removeAttr("disabled");
					}

				});


				jq(".footer").hide();
			//jq(".header-line").hide();
		jq(".prevstep").attr("disabled","disabled");
		jq(".prevstep").css("display","none");
			jq(".measure").click(function(){
				//alert("saf");
				if(jq(this).val()=="BEST FIT")
				{
					jq("#best").show();
					jq("#ask").hide();
					jq("#manual").hide();
				}
				if(jq(this).val()=="ASK FOR MEASUREMENT")
				{
					jq("#best").hide();
					jq("#ask").show();
					jq("#manual").hide();
				}
				if(jq(this).val()=="MANUAL MEASUREMENT")
				{
					jq("#best").hide();
					jq("#ask").hide();
					jq("#manual").show();
				}
			});
			jq("#caddtocart").click(function(){ //alert("Asdf");
				var m=jq(".measure:checked").val();
				if(m=="BEST FIT")
				{
					jq('#datetime_best_fit').each(function(){
    						var val = jq(this).val();
    						if(val=='')
    						{
    										    	jq.confirm({
                           title: 'Alert',
                            content: 'Date Time Are Required',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Ok',
                                    btnClass: 'btn-info',
                                    action: function () {
                                      //this.value='';
                                      jq("#input1").val('');
                                      // console.log(sid);
                                        }
                                },

                               }

                        });
    							return false();
    						}
						})
					var mdata="BEST FIT:"+jq("#datetime_best_fit").val();

				}
				if(m=="ASK FOR MEASUREMENT")
				{
					jq('#datetime_best_ask').each(function(){
    						var val = jq(this).val();
    						if(val=='')
    						{
    										    	jq.confirm({
                           title: 'Alert',
                            content: 'Date Time Are Required',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Ok',
                                    btnClass: 'btn-info',
                                    action: function () {
                                      //this.value='';
                                      jq("#input1").val('');
                                      // console.log(sid);
                                        }
                                },

                               }

                        });
    							return false();
    						}
						})
					var mdata="ASK FOR MEASUREMENT:"+jq("#datetime_best_ask").val();
				}
				if(m=="MANUAL MEASUREMENT")
				{
					jq('input[type=number]').each(function(){
    						var val = jq(this).val();
    						if(val=='')
    						{
    										    	jq.confirm({
                           title: 'Alert',
                            content: 'All measurements are required',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Ok',
                                    btnClass: 'btn-info',
                                    action: function () {
                                      //this.value='';
                                      jq("#input1").val('');
                                      // console.log(sid);
                                        }
                                },

                               }

                        });
    							return false();
    						}
						})
					var mdata=jq("#manual").serialize();
				}
				//alert(m);
				//return false;

        var formdata=jq("#bundle").serialize();
        var upload_desc= 'none';
					//alert(formdata);
					jq(this).text("Adding to Your Cart...");
					jq(this).attr("disabled","disabled");
					if(jq('#blah').attr('src')!='#')
					{
						var custom_image = jq('#blah').attr('src');
             var upload_desc = jq('#upload_desc').val();
            //alert('inblah');

					}
          console.log('afterblah');

					jq.ajax({
						 type: "POST",
						 url: "<?php echo base_url();?>index.php/Welcome/addtocart_bundle",
						 data: {"formdata":formdata,"mdata":mdata,"c_image":custom_image,"upload_desc":upload_desc},
						 success: function(response){
							//console.log(response);
							setTimeout(function() {
                window.location.href = "<?php echo base_url();?>checkout"
							}, 1000);
							 },
               error: function(response){
               // console.log(response);
               }

						 });

			});



			jq(".nextstep").click(function(e){
				jq("#uls").show();
				e.preventDefault();
				//alert(kkk);
        var blah = jq(".nextstep").attr("alt");
        if(blah=='blah'){
          var upload_desc = jq("#upload_desc").val();
          //alert(upload_desc.length);
          if(upload_desc.length<2)
          {
            jq.confirm({
                           title: 'Alert',
                            content: 'Description is Required',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Ok',
                                    btnClass: 'btn-info',
                                    action: function () {
                                      //this.value='';
                                      jq("#input1").val('');
                                      // console.log(sid);
                                        }
                                },

                               }

                        });
            return false;
          }else{
            var upload_desc = jq('#upload_desc').val();
            jq("#upload_desc2").html(upload_desc);
          }
        }
				var step=parseInt(jq(this).attr("href"))+1;
				var final=jq("#totattr").val();
				//alert(jq(".nextstep").attr("disabled"));
				jq(".nextstep").attr("disabled","disabled");

				//alert(step);


			if(step==0)
				{
					jq(".prevstep").css("display","none");
					var step=parseInt(jq(this).attr("href"))+2;
				}
				if(step==1)
				{
					//alert('one');
					jq(".prevstep").attr("disabled","disabled");


				}


				if(step>0 && step<2)
				{
					jq("#uls").show();
				}
				else{
				jq("#uls").hide();
				}
				//alert(step+'='+final);

				if(step>final){
					//alert(jq("#thumb2").text().length);
					//alert(jq('#blah').attr('src'));
					jq("#uls").hide();
					if(jq('#blah').attr('src')!='#'){
						jq('#dyna').hide();
						jq('#thumb2').show();
						jq('#Tab2').css('display','none');
					}

					else if (jq("#thumb2").text().length > 50) {
           // alert(jq("#thumb2").text().length);
            //alert('intrue');
     jq('#dyna').hide();
     jq('#thumb2').show();
   } else{
   	jq('#dyna').show();
   	jq('#thumb2').hide();
   }
				jq("#finalprev").show();
				jq("#dyna_heading").hide();
				jq("#simple_text").hide();

				jq("#uls").hide();
				jq("#design").hide();
				jq(".nextstep").hide();
				jq(".prevstep").attr("href",step);
				jq(".measur").css("display", "block");
				jq("#Tab1").addClass("active");
				jq("#Tab3").removeClass("active");
				jq("#Tab14").addClass("active");
				jq("#Tab5").removeClass("active");
				jq("#Tab6").removeClass("active");

				//jq(".firstd").addClass("active");
				//jq(".lastd").removeClass("active");
				return false;
				}


				else{
					jq("#finalprev").hide();
					//jq("#uls").hide();
					jq("#dyna_heading").show();
					jq("#design").show();
					jq(".prevstep").removeAttr("disabled");
					jq(".prevstep").css("display","inline");
					//jq("#uls").show();
				}
				jq("#design").html("<img style='margin-top:100px;' src='<?php echo base_url();?>assets/images/01-progress.gif'>");
				jq(this).attr("href",step);
				jq(".prevstep").attr("href",step);

				var cid=jq("#nid").val();
				jq.ajax({
				 type: "POST",
				 url: '<?php echo base_url();?>index.php/Welcome/show_fabric',
				 data: {cid:cid,step:step},
				 success: function(response){
					jq("#design").html(response);
					//console.log(response);
					 //jq("#design").html(response);
					 },
				 error: function(response){
        alert("fail");
        //console.log(response);
    }
				 });
			});

			jq(".prevstep").click(function(e){
				if(jq(this).attr("href")==0)
				{
					location.reload();
				}
				e.preventDefault();

				var step=parseInt(jq(this).attr("href"))-1;
				//alert(step);
				if(step<=0){

					//jq(".prevstep").css("display",none);
					jq(".prevstep").attr("disabled","disabled");
					return false;
					//jq(".prevstep").hide();


					}
					if(step>=0 && step<1){
					//jq("#uls").hide();
					jq(".prevstep").hide();
					}


				if(step>1 ){
					jq("#uls").hide();
					//jq(".prevstep").hide();
					}
					else{
				jq("#uls").show();
				}
				jq(".nextstep").css("display","block");
				jq(".measur").css("display","none");
				jq(".nextstep").attr("href",step);
				var final=jq("#totattr").val();
				if(step>final){
				jq("#finalprev").show();
				jq("#dyna_heading").hide();
				jq("#uls").hide();
				jq("#design").hide();
				jq(".prevstep").removeAttr("disabled");
				//jq("#Tab14").css("display","none");
				jq("#Tab14").addClass("active");
				jq("#Tab5").removeClass("disabled");
				jq("#Tab6").removeClass("disabled");
				jq("#Tab5").css("display","none");
				jq("#Tab3").css("display","none");
				//jq(".firstd").addClass("active");
				//jq(".lastd").removeClass("active");
				return false;
				}
				else{
					jq("#finalprev").hide();

					jq("#dyna_heading").show();
					jq("#design").show();
					jq(".nextstep").removeAttr("disabled");
					//jq("#uls").show();
				}

				jq("#design").html("<img style='margin-top:100px;' src='<?php echo base_url();?>assets/images/01-progress.gif'>");
				jq(this).attr("href",step);
				var cid=jq("#nid").val();
				jq.ajax({
				 type: "POST",
				 url: '<?php echo base_url();?>index.php/Welcome/show_fabric',
				 data: {cid:cid,step:step},
				 success: function(response){
					jq("#design").html(response);
					 //jq("#design").html(response);
					 }
				 });
			});
	<?php //$this->load->library('session');

	/*if(isset($_SESSION['addon'])){
		foreach($_SESSION['addon'] as $ids)
	{
		echo "var fid = $ids;
		jq('.product-category').removeClass('mark1');
			jq(this).closest('div.product-category').addClass('mark1');

			jq('#totattr').val(jq(this).attr('id'));
			jq('#nid').val(jq(this).attr('href'));
			var fid=jq(this).attr('href');
			alert(fid);
			jq.ajax({
				 type: 'POST',
				 url: '<?php echo base_url();?>index.php/Welcome/predesigns',
				 data: {'fid':fid},
				 success: function(response){
					 //alert(response);
					 jq('#predesigns').html(response);
					 }
				 });
			 jq.ajax({
			 type: 'POST',
			 url: '<?php echo base_url();?>index.php/Welcome/dynamic_fields',
			 data: {'fid':fid},
			 success: function(response){
				 //alert(response);
				 jq('#dyna').html(response);
				 }
			 });";
	} }*/?>
			jq(".fabric").click(function(e){e.preventDefault();

			jq(".product-category").removeClass("mark1");
			jq(this).closest("div.product-category").addClass("mark1");
			 jq(".selected").remove();
        	jq(".mark1").append("<div class='selected'>Selected</div>");
			jq("#totattr").val(jq(this).attr("id"));
			jq("#nid").val(jq(this).attr("href"));
			var fid=jq(this).attr("href");
			//alert(fid);
			jq.ajax({
				 type: "POST",
				 url: '<?php echo base_url();?>index.php/Welcome/predesigns',
				 data: {"fid":fid},
				 success: function(response){
					 //console.log(response);
					 jq("#predesigns").html(response);


					 }
				 });
			 jq.ajax({
			 type: "POST",
			 url: '<?php echo base_url();?>index.php/Welcome/dynamic_fields',
			 data: {"fid":fid},
			 success: function(response){
				 //console.log(response);
				 jq("#dyna").html(response);
				 }
			 });
			  jq.ajax({
			 type: "POST",
			 url: '<?php echo base_url();?>index.php/Welcome/get_measures',
			 data: {"fid":fid},
			 success: function(response){
				 //console.log(response);
				 jq("#measure_ajax").html(response);
				 }
			 });

				//var fid=jq(this).attr("href");
//				jq("#cfabric").val(fid);
//				jq.ajax({
//				 type: "POST",
//				 url: '<?php //echo base_url();?>index.php/Welcome/fimage',
//				 data: {"fid":fid},
//				 success: function(response){
//					 jq("#fimg").html(response);
//					 }
//				 });

			});
			$('#delete').click(function () {
   								//alert('kkk');
                    jq('#dragyour').hide();
                 jq('#or').html('');
				jq("#upfile1 img").attr('src', "<?php echo base_url(); ?>/adminassets/styles/100button.png");

				jq("#blah1").attr('src',"<?php echo base_url(); ?>/adminassets/styles/default_upload.png");
				jq("#blah").attr('src',"<?php echo base_url(); ?>/adminassets/styles/default_upload.png");
				jq("#upfile1 figcaption").html('Upload Your Design');
				jq("#upfile1 img").removeClass("delete");
   				});


			jq("#upload_design").click(function () {
				jq("#simple_text").hide();
			});

			jq("#pre_design").click(function () {
				jq("#simple_text").hide();
				jq(".prevstep").attr("disabled","disabled");
			});


			jq("#upfile1").click(function () {
         jq('#dragyour').hide();
                 jq('#or').html('');
                 jq(".nextstep").attr("alt",'blah');
				  //jq('#blah').attr('src', img);
				jq("#upfile1 img").attr('src', "https://image.freepik.com/free-icon/close-delete-remove-button_318-9073.jpg");

				jq("#upfile1 figcaption").html('Delete Your Design');
				jq(".prevstep").attr("disabled","disabled");
				//jq("#upfile1 figcaption").html('Remove');figcaption
				if ($('#upfile1 img').hasClass('delete')) {
   								//alert('kkk');
				jq("#upfile1 img").attr('src', "<?php echo base_url(); ?>/adminassets/styles/100button.png");

				jq("#blah1").attr('src',"<?php echo base_url(); ?>/adminassets/styles/default_upload.png");
				jq("#upfile1 figcaption").html('Upload Your Design');
				jq("#upfile1 img").removeClass("delete");
   				}
   				else{
   					 jq(".file1").trigger('click');
   					  jq("#upfile1 img").addClass("delete");
   				}

});


		});
		</script>

                 	<div class="row" id="design">
                 <?php $i=1;foreach($ca as $ca){
					 ?>

                     <h3 class="text-warning" style="
    padding-top: 10px;

    margin-bottom: 20px;
    padding-bottom:10px;
background-color: rgba(0, 0, 0, 0.06);
"><?php echo $ca->mtitle;?></h3>
                     <div class="row">
					 <?php
					 $cati=$this->db->get_where("category",array("mid"=>$this->uri->segment(3),"mtitle"=>$ca->mtitle,"status"=>'enable'));
					// $space="";
//					 switch($cati->num_rows())
//					 {
//						 case 1;
//						 $space="col-md-9";
//						 break;
//						 case 2;
//						 $space="col-md-6";
//						 break;
//						 case 3;
//						 $space="col-md-3";
//						 break;
//					 }
					 $cat=$cati->result();
					 ?>

                    <?php foreach($cat as $cat){
						$totattr=$this->db->get_where("attributes",array("cat"=>$cat->cid,"status"=>'enable'))->num_rows();
						?>

                    	<div class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6">
                                   <div class="boxSep">
		<div class="imgLiquidNoFill imgLiquid">

          <div class="product-category" >

                        <a href="<?php echo $cat->cid;?>" class="fabric" id="<?php echo $totattr;?>" onclick="fun('<?php echo $cat->cid;?>')" title="<?php echo $cat->short_des;
                          ?>">
       <img  src="<?php echo base_url();?>assets/category/<?php echo $cat->cat_image;?>">

                        </a>

                    <div class="product-category__hover caption"></div>
            <div class="product-category__info">
              <div class="product-category__info__ribbon" style="
    background-color: transparent;
    color: #000;
    font-weight: 600;
    position:relative;
    bottom: 102px;
">
                <h5 class="product-category__info__ribbon__title"><?php echo $cat->cat_name;?></h5>

              </div>
            </div>
                    </div>
                    </div>
                    </div>

									</div>
                       <!-- <div class="<?php echo $space;?>"></div>-->

                    <?php }?></div><?php $i++;}?>

                    </div>
                    <div class="row" id="finalprev" style="display:none;">
                    <ul class="nav nav-tabs nav-tabs--wd" role="tablist"  id="uls">


          <!--li class="col-md-4 lastd">
          <a href="#Tab14" role="tab" data-toggle="tab" class="text-uppercase tbsss" style="font-size:17px;"> Custom Design </a></li>
          <li class="col-md-4 middled">
          <a href="#Tab5" role="tab" data-toggle="tab" class="text-uppercase tbsss" style="font-size:17px;">Choosen fabric </a></li>
          <li class="col-md-4 lastd">
          <a href="#Tab6" role="tab" data-toggle="tab" class="text-uppercase tbsss" style="font-size:17px;"> Measurements </a></li-->

        </ul>
        <div class="tab-content tab-content--wd">
          <div role="tabpanel" class="tab-pane active " id="Tab14" style="padding:5px; box-shadow: none;">


                 <div class="col-md-12" style="padding-top:20px; ">
           <!--h4 class="text-warning" style="
    padding-bottom: 17px;
" >Final Preview For Your Stitching.</h4-->
 <h3 style="font-weight: 400; padding-bottom: 13px; display: block;margin-top:-40px;" id="dyna_heading">Final Preview</h3>



         <div class="products-widget card">
              <div class="products-widget-carousel-layout6 nav-top row" >

              <form action="" method="post" id="bundle">
              <input type="hidden" name="custom" value="custom" />
              <input type="hidden" name="fabric" id="cfabric" value="" />
              <input type="hidden" name="qty" value="1" />
              <div id="thumb2"  class="col-md-12" style="padding-top:20px;  height: 215px;" href="thumb2555">
              	<img id="blah" src="#" alt="your image" height="150%" />
                <p id="upload_desc2"></p>
              </div>

              <div id="dyna">

             </div>

             </form>

              </div></div>

            </div>


          </div>

           <div role="tabpanel" class="tab-pane" id="Tab5" style="overflow-x:scroll;min-height:500px;  max-height:500px; box-shadow: none; overflow:hidden;">
<br><br>
           <h3 style="font-weight: 400; padding-bottom: 13px; display: block;margin-top:-24px;" id="dyna_heading"><?php echo $heading_data->title6; ?></h3>
           <span><?php echo $heading_data->title7; ?></span>


          <div id="thumb"  class="col-md-12" style="padding-top:20px;  height: 215px;" align="center">
          		<?php
          		if($this->session->userdata('fabric_id')){

			    $fabric_id = $this->session->userdata('fabric_id');
				$this->db->select('*');
                $this->db->where('id', $fabric_id);
                $data = $this->db->get('fabric')->row();
				//print_r($data);
			?>
            <div class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6" align="center" style="float:none;">
                                   <div class="boxSep">
		<div class="imgLiquidNoFill imgLiquid">

          <div class="product-category" style="margin-bottom: 10px;">
			<img src="<?php echo base_url();?>assets/images/fabrics/<?php echo $data->thumb;?>" alt="">

       <br>
            
            <h5><?php echo $data->title;?></h5>
                        <?php

            $current_date=date('Y-m-d');
            if(($current_date>=$data->from_date) AND ($current_date<=$data->to_date)){
             if($data->offer_type=='Percentage')
              {
                $value = 100 - $data->offer_price;
                $x=round(($data->price/100)*$value);
                
              }
              elseif($data->offer_type=='Amount')
              {
                $value = $data->offer_price;
                $x=round($data->price - $value);
            }
          }
            else
              {
                $x=round($data->price);
              }
            ?>

           <i class="fa fa-inr"></i> <?php echo $x*$this->session->userdata('qty');?>
           </div>
            </div>
            </div>
            </div>

                  <?php  } ?>
                    </div>
            <div id="social-float">
          <!-- <a href="#Tab6" role="tab" data-toggle="tab" class="btn btn--wd text-uppercase wave waves-effect pull-right text-uppercase" style=" width: 336px;"> Next&nbsp;&nbsp;<i class="fa fa-long-arrow-right" ></i> </a>-->
           </div>

           <div class="social-float-parent" >
                       <div>
    <div >







                            <a href="#Tab6" role="tab" data-toggle="tab" class="btn btn--wd text-uppercase wave waves-effect pull-right nextbuttn" style="right: 2px;
    display: block;
    position: fixed;
    bottom: 5px;
    z-index: 5000;">Next&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>




                       </div>
                       </div>
                       </div>
          </div>

          <div role="tabpanel" class="tab-pane" id="Tab6">

          <div class="col-md-12" style="padding-top:20px;">



           <!--h4 class="text-warning">Choose Your Measurements</h4-->
           <h3 style="font-weight: 400; padding-bottom: 13px; display: block;margin-top:-40px;" id="dyna_heading">Choose Your Measurements</h3>

           <br /><br />
												<ul class="filter-list">
<div class="row">
                                <li class="col-md-4">

                                    <label class="radio">

                                    <input id="radio1" type="radio" name="radios" value="BEST FIT" checked class="measure">

                                    <span class="outer"><span class="inner"></span></span>Best Fit/Stitch</label>

                                </li>

                                <li class="col-md-4">

                                    <label class="radio">

                                    <input id="radio2" type="radio"  value="ASK FOR MEASUREMENT" name="radios" class="measure">

                                    <span class="outer"><span class="inner"></span></span>Ask for Measurement</label>

                                </li>



                                <li class="col-md-4">

                                    <label class="radio">

                                    <input id="radio3" type="radio"  value="MANUAL MEASUREMENT" name="radios" class="measure">

                                    <span class="outer"><span class="inner"></span></span>Manual Measurement</label>

                                </li>

</div>
												</ul>




            <style>
			.form-control{border-radius:0px; margin-bottom:5px;}
			</style>
            <br/>
            <div id="best" class="contact-form"><h5 ><?php echo $heading_data->title3; ?></h5>
<div class="form-group">
               <div class="row" align="center" style="
    margin-top:15px;
">
                <div class="input-group date form_datetime col-md-5 col-sm-6 col-xs-12" data-date="<?php echo date('Y-m-d'); ?>T00:00:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" id="datetime_best_fit" value="" readonly>
                    <span class="input-group-addon"><span class="fa fa-times"></span></span>
					<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" /></div>
            </div></div>

            <br/><form action="#" class="contact-form" id="manual" style="display:none;">
            <h5><?php echo $heading_data->title5; ?></h5><br />
            <div class="row">

            <span id="measure_ajax">


               </span>
            </div>

            </form>
            <form action="#" class="contact-form" id="ask" style="display:none;">
            <h5><?php echo $heading_data->title4; ?></h5>
            <div class="form-group">
             <div class="row" align="center" style="
    margin-top: 15px;
">


               <div class="col-md-12 col-xs-12" align="center">
                <div class="input-group date form_datetime col-md-5 col-sm-6 col-xs-12" data-date="<?php echo date('Y-m-d'); ?>T00:00:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" id="datetime_best_ask" value="" readonly>
                    <span class="input-group-addon"><span class="fa fa-times"></span></span>
					<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" /></div>
            </div>

            </div>

            </form>

                 <div class="container" align="center">

           <button id="caddtocart" class="btn btn--wd text-uppercase">Add Bundle to Cart <span class="icon icon-bag-alt"></span></button>
         </div>


          </div>

          </div>



        </div>






          </div>
          </div>

           <div role="tabpanel" class="tab-pane" id="Tab2" style="margin:50px;min-height:500px;  max-height:500px;">




             <form id="form1" runat="server">
             <!--figure id="upfile1" style="cursor:pointer;width:50px;float:right">
      				 <img src="<?php // echo base_url(); ?>/adminassets/styles/100button.png" style="width: 100%" />
       				 <figcaption>Upload Your Design</figcaption>
         </figure-->
		<input type="file" id="imgInp"  class="file1" style="display:none" />
		<center>You can upload images from your computer, tablet or phone.<br></br><div id="div">
		<img id="blah1" src="<?php echo base_url(); ?>/adminassets/styles/default_upload.png" alt="your image" width="50%" />
		</div><h3 id="dragyour" style="color:#ccc;"><b>Drag your reference design here</b></h3>
		<p id="or">-- or --</p>
		<span>
    <span id="upfile1" class="btn btn-success">Upload your design</span>
    <span class="btn btn-success" id="delete">Cancel</span></span>
    <br>
    <p>Acceptable File Format</p><br>
    <div class="col-md-12">
      <img class="file-sm" src="<?php echo base_url(); ?>assets/images/jpg.png">
       <img class="file-sm" src="<?php echo base_url(); ?>assets/images/png.png">
         <img class="file-sm" src="<?php echo base_url(); ?>assets/images/jpeg.png">
         <img class="file-sm" src="<?php echo base_url(); ?>assets/images/gif.png">

    </div>
	<div class="upload_d">
		<label class="lb">Description*</label>

                <textarea rows="3" value="" id="upload_desc" name="upload_desc" style="min-height:50px;border:1px solid #aaa" type="text" class="input--wd input--wd--full" required ></textarea>
        </div>
		</center>
        <p class="note" style="font-weight: 600;">
        	Note : For any queries or suggetions please contact us on 9644409191
        </p>



    </form>
    <br><br><br>


          </div>

          <div role="tabpanel" class="tab-pane" id="Tab3">

             <h4 style="padding-bottom: 20px;"><?php echo $heading_data->title2; ?></h4>
												<div class="row" id="predesigns">

                                                </div>

          </div>



        </div>
                  <!--<div class="row">
                   <div class="col-md-4">Choose From Catelogue</div>
                  	<div class="col-md-4">Upload Your Design</div>

                    <div class="col-md-4">Design Yourself</div>
                  </div>-->



                    </div>


                       <div class="social-float-parent" >
                       <div>
    <div id="social-float">
                        	<a href="-1"  class="btn btn--wd text-uppercase wave waves-effect pull-left prevstep backbutton"><i class="fa fa-long-arrow-left" ></i>&nbsp;&nbsp;Back</a>

                            <input type="hidden" name="nid" value="" id="nid" />

                            <a id="nextstep" href="-1"  class="btn btn--wd text-uppercase wave waves-effect pull-right nextstep nextbuttn" style="
    margin-right: -41px;
">Next&nbsp;&nbsp;<i class="fa fa-long-arrow-right"  ></i></a>
<?php if($this->session->userdata('fabric_id')){ ?>
                            <a href="#Tab5" role="tab" data-toggle="tab" class="btn btn--wd text-uppercase wave waves-effect pull-right text-uppercase measur fib" style="display:none;margin-right: -41px;" > Next&nbsp;&nbsp;<i class="fa fa-long-arrow-right"  ></i> </a>
                            <?php } else { ?>
                            <a href="#Tab6" role="tab" data-toggle="tab" class="btn btn--wd text-uppercase wave waves-effect pull-right text-uppercase measur fib" style="display:none;margin-right: -41px;" > Next&nbsp;&nbsp;<i class="fa fa-long-arrow-right" ></i> </a>
                            <?php } ?>
                       </div>
                       </div>
                       </div>

                    </div>
                </div>
              </div>


            </div>
          </div>
        </div>

        </div>
      </div>
    </section>


    <!-- End Content section -->
  </div>



	  <script type="text/javascript">




  var mayank_id="";
  function mayank(a){
	mayank_id=a;
	//alert(mayank_id);
  }
  function saluja(){
	//alert(mayank_id);
	localStorage.setItem("PMUsername",mayank_id);
  }



  </script>

   <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/2.1.0/jquery.imagesloaded.min.js"></script>
   <script src="<?php echo base_url(); ?>js/jquery-imagefill.js"></script>
  <script>

              $(document).ready(function(){

                $('[data-toggle="tooltip"]').tooltip();
});


            // SIMPLE DEMO
            $('.simple-demo')
                // call image fill throttled to 30 fps (default is only 10 fps, works for most situations)
                .imagefill({throttle:1000/60})
                // add looped animation queue
                .queue(function(next) {
                    $(this).animate({height:300});
                    $(this).queue(arguments.callee);
                    next();
                });

            // GRID DEMO
            $('.grid-quarter').imagefill();
            $('.grid-demo').queue(function(next) {
                $(this).animate({width:320},4000).animate({width:640},4000);
                $(this).queue(arguments.callee);
                next();
            });

            // VARIED SIZES EXAMPLE
            $('.sizes-example').imagefill({runOnce:true});

            // Prevent FOUC
            $('.no-fouc').removeClass('no-fouc');
        </script>
          <script type="text/javascript">
            document.documentElement.className = 'no-fouc';
        </script>




  <script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/modernizr.minedd7.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/templates/common-html5/js/utilitiesedd7.js"></script>

<script src="<?php echo base_url();?>assets/js/custom.js"></script>


<link href="<?php echo base_url(); ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js" charset="UTF-8"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
 <script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/2.1.0/jquery.imagesloaded.min.js"></script>
   <script src="<?php echo base_url(); ?>js/jquery-imagefill.js"></script>
  <script>

	$('.dropdown').click(function(){
     $(this).toggleClass('open');
   });
            // SIMPLE DEMO
            $('.simple-demo')
                // call image fill throttled to 30 fps (default is only 10 fps, works for most situations)
                .imagefill({throttle:1000/60})
                // add looped animation queue
                .queue(function(next) {
                    $(this).animate({height:300});
                    $(this).queue(arguments.callee);
                    next();
                });

            // GRID DEMO
            $('.grid-quarter').imagefill();
            $('.grid-demo').queue(function(next) {
                $(this).animate({width:320},4000).animate({width:640},4000);
                $(this).queue(arguments.callee);
                next();
            });

            // VARIED SIZES EXAMPLE
            $('.sizes-example').imagefill({runOnce:true});

            // Prevent FOUC
            $('.no-fouc').removeClass('no-fouc');
        </script>
          <script type="text/javascript">
            document.documentElement.className = 'no-fouc';
        </script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  0,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
          hoursDisabled: '0,1,2,3,4,5,6,7,8,9,20,21,22,23'
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  0,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  0,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
