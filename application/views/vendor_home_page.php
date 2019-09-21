<!DOCTYPE HTML PUBLIC>


    <html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
<meta name = "viewport" content = "user-scalable=no, width=device-width"/>

<meta name="apple-mobile-web-app-capable" content="yes"/>
<?php $url = explode('/',current_url());
$urlend = end($url);
          $data = $this->db->get('meta')->result();
          foreach ($data as $meta) {
          //echo $meta->type." ".$urlend." || ";
          //echo strlen($meta->type);echo " || ".strlen($urlend);
          if(str_replace(' ','',$meta->type)==$urlend){

            $meta_title 			= $meta->meta_title;
            $meta_keyword 	= $meta->meta_keyword;
            $meta_desc 			= $meta->meta_desc;
            $robots 					= $meta->robots;
            $googlebot 			= $meta->googlebot;
            $google_ana 			= $meta->google_ana;
            ?>
            <title><?php echo $meta_title;?></title>
            <meta name="description" content="<?php echo $meta_desc;?>"/>
            <meta name="keywords" content="<?php echo $meta_keyword;?>"/>
            <meta name="robots" content="<?php echo $robots;?>" />
            <meta name="googlebot" content="<?php echo $googlebot;?>">
            <script>
          <?php echo $google_ana;?>
          </script>
            <?php
          }
        } ?>
          <style type="text/css">

          body
          {

            overflow-x: hidden;
          }
.btn-blk{
  background-color: #000;
  color: #fff;
  padding: 5px 35px !important;
  margin: 30px 2px !important;
}

@media(max-width: 500px)
{
.btn-blk{
  display: none !important;
}
.footer
{
  display: none !important;

}

}
.btn-blk-lg{
  background-color: #2196f3;
  color: #fff;

  padding: 8px 80px !important;
  margin: 15px 5px !important;
}
.btn-blk:hover{
  background-color:#2196f3;
  color: #fff !important;
}
.btn-blk-lg:hover{
  background-color:#000;
  color: #fff !important;
}


          </style>

            <script src="<?php echo base_url(); ?>assets/js/stub.js" type="text/javascript"></script>
            <script src="/faces/a4j/g/3_3_3.Finalorg.ajax4jsf.javascript.AjaxScript?rel=1485982514000" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/js/VFRemote.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/js/SfdcCore.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/js/bootstrap.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/js/plugin.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/js/main_vendor.js" type="text/javascript"></script>
            <script src="/resource/1484942708000/Sd_Code" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/js/VFSObjectCrud.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>js/picklist2.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>js/VFState.js" type="text/javascript"></script>
            <link class="user" href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
            <link class="user" href="<?php echo base_url(); ?>assets/css/jquery.bxslider.css" rel="stylesheet" type="text/css" />
            <link class="user" href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />
            <link class="user" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/font/styleedd7.css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/font/styleedd7.css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/common-html5/quicksearch/quicksearchedd7.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/common-html5/css/layoutedd7.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/common-html5/css/responsiveedd7.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/waves/waves.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/slick/slick.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/slick/slick-theme.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap-select/bootstrap-select.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/parallax-carousel/pcarousel.min.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style-colors.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>css/magnific-popup.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/font/styleedd7.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/waves/wavesedd7.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/slick/slickedd7.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/slick/slick-themeedd7.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/bootstrap-select/bootstrap-selectedd7.css">
<link rel="StyleSheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/css/defaultedd7.css" type="text/css" />
<link rel="StyleSheet" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/welldone-3dcart/3dcartedd7.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/templates/welldone-html5/vendor/rs-plugin/css/settingsedd7.css" />


  <script src="js/jssor.slider-22.0.15.min.js" type="text/javascript" data-library="jssor.slider" data-version="22.0.15"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:-1,d:1,o:-1},{b:0,d:1000,o:1}],
              [{b:1900,d:2000,x:-379,e:{x:7}}],
              [{b:1900,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:1000,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:1900,d:1600,x:-200,o:-1,e:{x:16}}]
            ];

            var jssor_1_options = {
              $AutoPlay: true,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*responsive code end*/
        };
    </script>
    <style>
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 22 css */
        /*
        .jssora22l                  (normal)
        .jssora22r                  (normal)
        .jssora22l:hover            (normal mouseover)
        .jssora22r:hover            (normal mouseover)
        .jssora22l.jssora22ldn      (mousedown)
        .jssora22r.jssora22rdn      (mousedown)
        .jssora22l.jssora22lds      (disabled)
        .jssora22r.jssora22rds      (disabled)
        */
        .jssora22l, .jssora22r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('img/a22.png') center center no-repeat;
            overflow: hidden;
        }
        .jssora22l { background-position: -10px -31px; }
        .jssora22r { background-position: -70px -31px; }
        .jssora22l:hover { background-position: -130px -31px; }
        .jssora22r:hover { background-position: -190px -31px; }
        .jssora22l.jssora22ldn { background-position: -250px -31px; }
        .jssora22r.jssora22rdn { background-position: -310px -31px; }
        .jssora22l.jssora22lds { background-position: -10px -31px; opacity: .3; pointer-events: none; }
        .jssora22r.jssora22rds { background-position: -70px -31px; opacity: .3; pointer-events: none; }
    </style>
            <script src="js/NetworkTracking.js" type="text/javascript"></script>
            <script>try{ NetworkTracking.init('/_ui/networks/tracking/NetworkTrackingServlet', 'network', '06690000005dON6'); }catch(x){}try{ NetworkTracking.logPageView();}catch(x){}</script>
            <script type="text/javascript">
Visualforce.remoting.Manager.add(new $VFRM.RemotingProviderImpl({"vf":{"vid":"06690000005dON6","xhr":false,"dev":false,"tst":false,"dbg":false,"tm":1486625422729,"ovrprm":false},"actions":{"JavaScriptSObjectBaseController":{"ms":[{"name":"describe","len":1,"ns":"java://CAAAAVojfzGQAAAAAAAAAAAAAAAAAAAAAAAAzIoJbUTx6u5TEvoHDOdz48qGEkCl2GA3yXUgOU5O6J+hELT7IlItHhULZEDLxwHPmCH5Fv4GY0K+OLjnf60VyMiD/0R8nYC3DZEQA+3tDQBsMG7//VgvRNt7O7r4G2sQ62XKeQUKanq9uXCLkq7ArUU=#uPI4D5T2nP9ZE8vNNUO3+nmR3Bk=","ver":38.0,"csrf":"VmpFPSxNakF4Tnkwd01pMHhNbFF3Tnpvek1Eb3lNaTQzTXpaYSxkODVPSVJJdjRha1ZVeExfRkZLZE5DLE4yRTVNV1pt"},{"name":"retrieve","len":3,"ns":"java://CAAAAVojfzGQAAAAAAAAAAAAAAAAAAAAAAAAzIoJbUTx6u5TEvoHDOdz48qGEkCl2GA3yXUgOU5O6J+hj3StdG3/6Sqj+bRjSd+2yqQxYZHoeUXTHZj9SIUMfgRP5XJSODXbOnj67BjiqMIZ0LxP47NYXGEfly1Ji/iNSjZG1wl8Z5NQxIjgCUFwNVY=#bjwiQeaDHnIlMevD9tbOFDJ4oFg=","ver":38.0,"csrf":"VmpFPSxNakF4Tnkwd01pMHhNbFF3Tnpvek1Eb3lNaTQzTXpaYSxrc0Q1aTdRbVdfSllQWlVVZ0p0YTNwLE1qazJOak01"},{"name":"update","len":3,"ns":"java://CAAAAVojfzGQAAAAAAAAAAAAAAAAAAAAAAAAzIoJbUTx6u5TEvoHDOdz48qGEkCl2GA3yXUgOU5O6J+hGrnLRUY5aXnS/I2aUSwuqpG4upo8jeyfVoqosGoFJFoV9fd9rN+Gst32OKAHdzkDKg/jrXAKh72xCWKCUSc5gEC01napPFoHocXRFKIIFdc=#9nO3oEtuv9vid41KLdNvAX1ZXuE=","ver":38.0,"csrf":"VmpFPSxNakF4Tnkwd01pMHhNbFF3Tnpvek1Eb3lNaTQzTXpaYSxsMVJsY0hQMUs2TWV5NkhYTmpUaHlBLFlURXpZamxt"},{"name":"delete","len":2,"ns":"java://CAAAAVojfzGQAAAAAAAAAAAAAAAAAAAAAAAAzIoJbUTx6u5TEvoHDOdz48qGEkCl2GA3yXUgOU5O6J+h6cuyPh33/5gaah6UswZ8FR6D+StoSNN21xh3P+Z9lMcuo50wfFhE9FLVuKWQJE6WRZ45eBnt7+An2nn0pSHFqJ92l9j4wwQtjy16W9LgMHM=#VINSLFJh38aKFVhPMSGftxwd6EA=","ver":38.0,"csrf":"VmpFPSxNakF4Tnkwd01pMHhNbFF3Tnpvek1Eb3lNaTQzTXpaYSxvSGVkQmVzcVVEeThyRjNqMmwwaWJrLE5qaGpaVFJs"},{"name":"create","len":2,"ns":"java://CAAAAVojfzGQAAAAAAAAAAAAAAAAAAAAAAAAzIoJbUTx6u5TEvoHDOdz48qGEkCl2GA3yXUgOU5O6J+h1ycd5+PFENZNyiuJWCfp42qQwwvwM/So2c8+gL0UM015KM3OC7vEgpL79XlAnLIVlDTO5vs7N/YHWD296xLlero08drM/K52PLKKGEWlQm4=#51q2B13vLbvX2NG7uOmdZ1UOyMA=","ver":38.0,"csrf":"VmpFPSxNakF4Tnkwd01pMHhNbFF3Tnpvek1Eb3lNaTQzTXpaYSxnOHNpSEVTZno5OFhqOEI3cU9SakRMLE5qVmpPVGhr"}],"prm":0},"sdNewLoginController":{"ms":[{"name":"isPanelAccessProvided","len":1,"ns":"","ver":34.0,"csrf":"VmpFPSxNakF4Tnkwd01pMHhNbFF3Tnpvek1Eb3lNaTQzTXpaYSxkU2E2RGJ3R2lqMUItWFFjV0JleFpLLE5HSTRPVFpo"}],"prm":0}},"service":"apexremote"}));
</script>
<meta charset="utf-8" />
            <title>Mobile Darzi</title>









            <style>

                .register_col_height{
                    min-height:0px;
                }
            </style>
        </head>

    <body>

<div class="container_header">
  <div class="container">
  <div class="header">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-6 logoLeft">
        <div class="logo logo-normal">
            <a href="<?php echo base_url(); ?>">
                 <img src="<?php echo base_url(); ?>assets/images/img/logo2.jpg" />
            </a>
        </div>


        <div class="threeLine">
          <ul>
            <li></li>
            <li></li>
            <li></li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6" align="right">
          <a href="<?php echo base_url(); ?>Vendor"><button type="button" class="btn btn-blk ">Login</button></a>
<a href="<?php echo base_url(); ?>vendor-registration"><button type="button" class="btn btn-blk">Register</button></a>

    </div>
  </div>
       </div>
</div><span id="j_id0:j_id25">
<div class="wrapper navigation ">
  <div class="container" id="navDiv">
    <div class="row absoluteNav">
        <div class="horizontalRule">
            <hr />
        </div>
      <div class="col-md-12">
        <nav>
            <div class="row">
              <div class="col-md-12 col-xs-12">
<?php $fcats2=$this->db->get_where("vendorposttop",array('id'=>4))->row(); ?>
              <ul class="sf-menu" id="example">
              <li class="current"><a href="/">Home</a></li>
              <li class=""><a href="#mobiledarziadvantages"><?php echo $fcats2->menu_heading1; ?></a></li>
              <li class=""><a href="#termsandcondition"><?php echo $fcats2->menu_heading2; ?></a></li>

              <li class=""><a href="<?php echo base_url(); ?>vendor-faq">FAQs</a></li>
              </ul>
                </div>
            </div>
              <div class="bottomDivWrapper">
                  <div class="horizontalRule"><hr /></div>
                     <div class="col-md-6 col-sm-12 col-xs-12">
                             <div class="row">
                                <div class="col-xs-6 col-md-6 marginBottom8">
                                    <span class="pull-left" style="font-size:16px"><a href="http://mobiledarzi.com/vendor-registration">Start Selling</a></span>
                                </div>
                                 <div class="col-xs-6 col-md-6 marginBottom8">
                                    <span class="pull-right" style="font-size:16px"><a href="http://mobiledarzi.com/vendor" > Login Now</a></span>
                                </div>
                            </div>

                     </div>
             </div>
        </nav>
      </div>
    </div>
  </div>
</div></span>
<style>

  </style>
<div style="width: 100%;text-align: center;padding-top: 5px;font-weight:bold; display:none;">From 19-05-2015 the passwords have been reset. Please use Forgot/Reset password link to reset your password.</div>
 <div class="wrapper mobBgMain  mobBgMain-background">
  <div class="container">
    <div class="row">
      <div class="col-md-12 register_col_height"><span id="j_id0:j_id30">
    <style>

</style>
    <script>
        $(function(){
           $('.registration-form').removeClass('hidden');
          initialSetup();

        });

        function initialSetup(){
            $('[id$=join_now_loader]').hide();

            $('#btn-verify-otp').on('click', function(e) {
                e.preventDefault();
                $('#sdOTP').addClass('otp_error');
            })
            $('.otp-form .changeMobileLink').on('click',function(){
                $('.otp-form').addClass('hidden');
                $('.change-number-form').removeClass('hidden');
                  $('[id$=join_now_loader]').hide();
            })

            //Select all the input with type text or password
            if(!$('input[id$="sdName"]').hasClass('sd-input')){
                 $('.registration-form input[type="text"],.registration-form input[type="password"]')
                .addClass('sd-input')
                .attr('autocomplete',"new-password")
                .attr('required',"required")
                .wrap('<div class="group"></div>')
                .before('<div class="tooltip top fade in hidden" role="tooltip" style="bottom:34px">'+
                              '<div class="tooltip-arrow"></div>'+
                              '<div class="tooltip-inner">test'+
                              '</div>'+
                          '</div><label class="sd-input"></label>')
                .after('<span class="bar"></span>' +
                    '<span class="message" ng-pattern="sdInput.ngPattern" ng-show="sdInput.message" ng-bind-html="sdInput.message"></span>' +
                    '');

            }

            if(!$('input[id$="mobileNo"]').hasClass('sd-input')){
                 $('.change-number-form input[type="text"]')
                .addClass('sd-input')
                .attr('autocomplete',"new-password")
                .attr('required',"required")
                .wrap('<div class="group"></div>')
                .before('<div class="tooltip top fade in hidden" role="tooltip" style="bottom:34px">'+
                              '<div class="tooltip-arrow"></div>'+
                              '<div class="tooltip-inner">test'+
                              '</div>'+
                          '</div><label class="sd-input"></label>')
                .after('<span class="bar"></span>' +
                    '<span class="message" ng-pattern="sdInput.ngPattern" ng-show="sdInput.message" ng-bind-html="sdInput.message"></span>' +
                    '');
            }

            if(!$('input[id$="sdOptpin"]').hasClass('sd-input')){
                 $('.otp-form input[type="text"]')
                .addClass('sd-input')
                .attr('autocomplete',"new-password")
                .attr('required',"required")
                .wrap('<div class="group"></div>')
                .before('<div class="tooltip top fade in hidden" role="tooltip" style="bottom:34px">'+
                              '<div class="tooltip-arrow"></div>'+
                              '<div class="tooltip-inner">test'+
                              '</div>'+
                          '</div><label class="sd-input"></label>')
                .after('<span class="bar"></span>' +
                    '<span class="message" ng-pattern="sdInput.ngPattern" ng-show="sdInput.message" ng-bind-html="sdInput.message"></span>');
            }


            $('.registration-form input[type="text"],.registration-form input[type="password"],.otp-form input[type="text"],.change-number-form input[type="text"]')
            .on('blur',function(){
                var $this=$(this)
                var id=$(this).attr('id').substring($(this).attr('id').lastIndexOf(":")+1,$(this).attr('id').length);
                var valid=true;

                if(id=='sdEmail'){
                     if($this.val().trim() == ''){
                        valid = false;
                        addTooltipMessage(id,"Email Id is required");
                     }else{
                        valid=validateEmail($this.val())
                        addTooltipMessage(id,"Invalid Email Id");
                     }
                }else if(id=='sdpwd'){
                    if($this.val().trim() == ''){
                        valid = false;
                        addTooltipMessage(id,"Password is required");
                     }else{
                        addTooltipMessage(id,"Password should be alphanumeric and greater than 8 characters.Example:Snapdeal123");
                        valid=validatePassword($this.val());
                     }
                }else if(id=='sdName'){
                    if($this.val().trim() == ''){
                        valid = false;
                        addTooltipMessage(id,"Company Name is required");
                     }else{
                        addTooltipMessage(id,"Invalid Company Name");
                        valid=$this.val().length!=0;
                     }
                }else if(id=='sdphone'){
                    if($this.val().trim() == ''){
                        valid = false;
                        addTooltipMessage(id,"Mobile Number is required");
                     }else{
                        addTooltipMessage(id,"Mobile must be of 10 digit");
                        valid=!isNaN($(this).val()) && $this.val().length==10
                     }
                }else if(id=='sdpincode'){
                    if($this.val().trim() == ''){
                        valid = false;
                        addTooltipMessage(id,"Pincode is required");
                     }else{
                        addTooltipMessage(id,"Invalid Pincode");
                        valid=$this.val().length==6;
                     }
                }
                else if(id=='sdpanNo'){
                     if($this.val().trim() == ''){
                        valid = false;
                        addTooltipMessage(id,"PAN Number is required");
                     }else{
                        addTooltipMessage(id,"Invalid PAN Number");
                        valid=validatePan($this.val());
                     }
                }
                else if(id=='sdVatTin'){
                     if($this.val().trim() == ''){
                        valid = false;
                        addTooltipMessage(id,"TIN/VAT Number is required");
                     }else{
                        addTooltipMessage(id,"TIN/VAT must be of 11 digit");
                        valid=$this.val().length==11;
                     }
                }

                if(!valid){
                        $(this).addClass('error-input');
                }else{
                        $(this).removeClass('error-input');
                }

                hideTooltip(id);

            })
            //show the tooltip whenever an error input get focus
            .focus(function(){
                if ($(this).hasClass('error-input')){
                    $('.tooltip').addClass('hidden');
                    $(this).removeClass('error-input');
                    $(this).siblings('.tooltip').removeClass('hidden');
                }

            });


            $('[id$=sdName]').siblings('label').text('Company Name');

            $('[id$=sdEmail]').siblings('label').text('Email Id');

            $('[id$=sdpwd]').siblings('label').text('Password ');

            $('[id$=sdphone]').siblings('label').text('Mobile Number ');

            $('[id$=sdpincode]').siblings('label').text('Pickup Pincode');

            $('[id$=sdpanNo]').siblings('label').text('Company PAN Number ');

            $('[id$=sdVatTin]').siblings('label').text('TIN/VAT Number ');

            $('[id$=sdOptpin]').siblings('label').text('One Time Password (OTP)');

        }

        //function to validate Email id
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

        //function to validate password
        //Currently only validation to password in min 8 characters
        function validatePassword(pass){
            var flag = false
            var re=/^(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9!@#$%^&*]{8,20})$/;
            return re.test(pass);
        }

        //Function to validate pincodes
        //6 charachtes only
        function validatePinCode(str){
            var re=/\d{6}/;
            return re.test(str);
        }

        //function to validate pan card
        //format CQDFD8746D
        function validatePan(pan){
            /* var re=/[a-zA-Z]{5}\d{4}[a-zA-Z]/;
            return re.test(pan); */
            var panPat = /^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;
            var code = /([C,c,P,p,H,h,F,f,A,a,T,t,B,b,L,l,J,j,G,g])/;
            var code_chk = pan.substring(3,4);

            if(pan.search(panPat) == -1)
              {
                  return false;
              }

            if(code.test(code_chk) == false)
              {
                  return false;
              }

            return true;
        }

        function validateTan(tan){
            var reg=/\d{11}/;
            return reg.test(tan);
        }


        //function to invalidate input and set message having ID
        function invalidateInput(id,msg){
            $('[id$='+id+']').addClass('error-input');
            addTooltipMessage(id,msg);
        }

        //function to add tooltip message on input ID
        function addTooltipMessage(id,msg){
            $('input[id$="'+id+'"]').siblings('.tooltip').find('.tooltip-inner').text(msg);

        }

        //function to hide tooltip on input ID
        function hideTooltip(id){
            var $input = $('input[id$='+id+']');
            $input.siblings('.tooltip').addClass('hidden');

        }

       function ValidateRegistrationForm(){

            $('input[type="text"],input[type="password"]').blur();

            if($('.error-input').length > 0){
                str_register_error = '1';
                return false;
            }else{
                $('[id$=join_now_loader]').show();
                $('[id$=frmLogin]').addClass('disabledbutton');
                str_register_error = '0';
                validateRegistration($('[Id$=sdName]').val(),$('[Id$=sdEmail]').val(),$('[Id$=sdphone]').val(),$('[Id$=sdpwd]').val(),$('[Id$=sdpincode]').val(),$('[Id$=sdVatTin]').val(), $('[Id$=sdpanNo]').val());
                return false;
            }
        }
        function CallRegisterIfValidated(){

            initialSetup();
            $('[id$=frmLogin]').removeClass('disabledbutton');
            $('[id$=join_now_loader]').hide();

            var pagemsg = $('[id$=hdnerr]').val();
            var pagemsgtext = $('[id$=hdnerrmsg]').val();

            if(pagemsg == 'EmailError')
            {
                invalidateInput('sdEmail',pagemsgtext);
                str_register_error = '1';
            }
            else if(pagemsg == 'CompetitorError')
            {
                invalidateInput('sdName',pagemsgtext);
                str_register_error = '1';
            }
            else if(pagemsg == 'MobileError')
            {
                invalidateInput('sdphone',pagemsgtext);
                str_register_error = '1';
            }
            else if(pagemsg == 'PasswordError')
            {
                invalidateInput('sdpwd',pagemsgtext);
                str_register_error = '1';
            }
            else if(pagemsg == 'PinCodeError')
            {
                invalidateInput('sdpincode',pagemsgtext);
                str_register_error = '1';
            }
            else if(pagemsg == 'PANError')
            {
              invalidateInput('sdpanNo',pagemsgtext);
              str_register_error = '1';
            }
            else if(pagemsg == 'VATError')
            {
              invalidateInput('sdVatTin',pagemsgtext);
              str_register_error = '1';
            }

            $('[id$=sdpwd]').val($('[id$=hdnPwd]').val());

            if($('[id$=hdnIsValidated]').val() == 'true')
            {
               $('.registration-form').addClass('hidden');
               $('.otp-form').removeClass('hidden');

            }
            else
            {
                if($('[id$=sdpwd]').val() == '')
                    $('[id$=sdpwd]').siblings('label').text('Password (8 characters)');
                    str_register_error = '1';
            }
        }

        function VerifyPinForm(){
            var pin = $('[Id$=sdOptpin]').val();

            if(pin == ''){
                invalidateInput('sdOptpin','OTP is required');
            }else{
                 $('[id$=join_now_loader]').show();
                 $('[id$=otpVerification]').addClass('disabledbutton');
                 verifyPIN(pin);
            }
            return false;
        }

        function onCompleteOTPVerification(){
           var pagemsg = $('[id$=otperr]').val();
           var pagemsgtext = $('[id$=otperrmsg]').val();
           $('[id$=otpVerification]').addClass('disabledbutton');

            initialSetup();

            if(pagemsg == 'otpError')
            {
                 $('[id$=join_now_loader]').hide();
                invalidateInput('sdOptpin',pagemsgtext);
                str_register_error = '1';
                $('[id$=otpVerification]').removeClass('disabledbutton');
            } else {
                Registration();
            }
        }

        function showMobileNumberForm () {
           $('[id$=sdOptpin]').removeClass('error-input');
           $('[id$=join_now_loader]').hide();
           $('.otp-form').addClass('hidden');
           $('[id$=mobileNo]').val('');
           $('[id$=mobileNo]').siblings('label').text('Mobile Number');
           $('.change-number-form').removeClass('hidden');
        }

        function showOtpNumberForm (e) {
           e.preventDefault();
           $('[id$=mobileNo]').removeClass('error-input');
           $('.otp-form').removeClass('hidden');
           $('.change-number-form').addClass('hidden');
        }


        function changeMobileNumberForm(){
              var mobile = $('[Id$=mobileNo]').val();
              if(mobile == ''){
                invalidateInput('mobileNo','Mobile Number  is required');
              }else{

                  $('[id$=changeMobileNumber]').addClass('disabledbutton');
                  changeMobileNumber($('[Id$=mobileNo]').val());
                  $('[id$=join_now_loader]').show();
              }
              return false;
        }

        function resendOTPForm(){
            $('[id$=join_now_loader]').show();
            $('[id$=sdOptpin]').removeClass('error-input');
            $('[id$=otpVerification]').addClass('disabledbutton');
              resendOTP()
              return false;
        }

        function oncompleteResendOTP() {
            initialSetup();
        }
        function CallAfterMobileChange(){
           initialSetup();
           var pagemsg = $('[id$=mobileerr]').val();
            var pagemsgtext = $('[id$=mobileerrmsg]').val();
            $('[id$=join_now_loader]').hide();


            if(pagemsg == 'MobileError')
            {
                invalidateInput('mobileNo',pagemsgtext);
                str_register_error = '1';
            } else {
                 $('.change-number-form').addClass('hidden');
               $('.otp-form').removeClass('hidden');
            }

        }

        function onRegistrationComplete(){
            var flag=false;
            console.log("registeration status flag is ",flag);
            if(!flag){
                $('.registration-form').removeClass('hidden');
                $('.otp-form').addClass('hidden');
            }
        }

    </script>
    <div id="snapdeal-register-component">
    <div class="formDivOuter registration-form hidden">

        <div class="col-md-12 col-sm-12" align="center">
            <h2 class="register-now-label">Register and start selling</h2>
            <h4> Create your seller account </h4>
            <a href="<?php echo base_url(); ?>vendor-registration"><button class="btn btn-blk-lg">Sell Now</button></a>
        </div>




    </div>
    <div class="formDivOuter otp-form hidden ">

         <div class="col-md-12 eror_back displaynone marginBottom8" id="register_error">
            <span class="back_eror_icon"> </span>
            <span id="register_error_text"></span>
        </div>
        <div class="col-md-12 col-sm-12">
            <h2>Mobile Verification</h2>
        </div>



    </div>
    <div class="formDivOuter hidden change-number-form ">
        <style>

        </style>


        <div class="col-md-12 eror_back displaynone marginBottom8" id="register_error">
            <span class="back_eror_icon"> </span>
            <span id="register_error_text"></span>
        </div>
        <div class="col-md-12 col-sm-12">
            <h2>Change Mobile Number</h2>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="msg-thanks marginBottom8">
                Please enter your new mobile number.
            </div>
        </div>


    </div>
    <div class="formDivOuter hidden registration-error-page">

        <div class="col-md-12 col-sm-12">
            <h2>Registration Error</h2>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="msg-thanks marginBottom8">
                Your e-mail ID could not be registered because of a technical constraint. Please attempt registration with another e-mail ID.
            </div>
        </div>

         <div class="col-sm-12 marginBottom8 custom_inputrow back-btn">
            <button class="sf-button-primary" onClick="window.location.href='/'">Register Again</button>
        </div>
        <style>
         .registration-error-page .msg-thanks{
             font-weight:normal;
         }
        </style>
    </div>


    </div></span>
        </div>
      </div>
    </div>
    <section class="content" id="slider">
<div id="jssor_1" style="position: relative;  width: 1300px; max-height:500px; ">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height:400px; overflow: hidden;">
  <?php  $fcats=$this->db->get("vendor_home_slider")->result();

     foreach($fcats as $subcat){ ?>
<div data-p="250.00" style="display: none;">
<img data-u="image"  src="<?php echo base_url(); ?>assets/images/<?php echo $subcat->banner_image; ?>" class="responsive" />
<div data-u="caption" data-t="0" style="position: absolute; top: 90px; left: 10px; width: 100%; height: 220px;">
</div>
</div>
<?php } ?>
          
        </div>
        <!-- Bullet Navigator -->
        
       <span data-u="arrowleft" class="jssora22l" style="top: 0px;left: 8px;width: 40px;height: 58px;margin-top: 200px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:8px;width:40px;height:58px; margin-top:200px;" data-autocenter="2"></span>   </div>
  </section>
   <style>
   .bxslider img{
       height:400px;
   }
   </style>

</div>


 <div class="container" id="home-page">


  <div class="row categoryBorder">
    <?php  
echo $fcats2->contant;
$this->db->order_by('id','asc');
     $data = $this->db->get('vendor_home_facts')->result();
      $i=1; foreach ($data as $value) {
        
      ?>
      <style type="text/css">
        .catnew<?php echo $i; ?> {
    background: url("<?php echo base_url(); ?>assets/images/<?php echo $value->banner_image; ?>") center top no-repeat !important;
}
      </style>
  <div class="catnew<?php echo $i; ?> col-md-4 col-sm-12 col-xs-12 category mb-20"> <span class="cate-cont text-capi"> <?php echo $value->line2; ?> </span><span class="cate-cont"><?php echo $value->line1; ?></span></div>
     <?php $i++;} ?>
    

  </div>
  <section id="mobiledarziadvantages">
  <div class="row">
    <div class="col-md-12 text-center">
      <h1 class="sellingOnSnapdeal"> <?php echo $fcats2->heading1; ?></h1>
    </div>
  </div>
  <?php  $this->db->order_by('id','asc'); $fcats=$this->db->get("vendorhome")->result();

   foreach($fcats as $subcat){ ?>
  <div class="row pos-rel">
  <div class="verti-line"></div>
    <div class="col-md-5 noDisplayInMob textAlineRight"> <img src="<?php echo base_url(); ?>assets/images/<?php echo $subcat->image; ?>" /> </div>
    <div class="col-md-2 middleImageSteps"> <img src="<?php echo base_url(); ?>assets/images/<?php echo $subcat->small_image; ?>" /> </div>
    <div class="col-md-5 sellingText"> <span><?php echo $subcat->heading; ?></span>
    <ul class="cus-pd">
      <?php echo $subcat->contant; ?>
    
    </ul>
     </div>
  </div>
  <?php } ?>
  
</div>
</section>


<span id="j_id0:j_id73">
    <div class="down-button-component">
    <div class="container">
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 col-xs-12">
        <div class="center-block text-container">
            <div class="business center"> <?php echo $fcats2->heading2; ?></div>
        </div>
    </div>

    <div class="col-sm-4 col-xs-12 col-sm-offset-4">
        <div class="center-block button-container">
            <a class="startDiv" href="#top">START SELLING NOW</a>
        </div>
     </div>
  </div>
</div>
    </div></span>
    <style type="text/css">
      #termsandcondition ul{
        list-style-type: disc !important;
      }
    </style>
    <section id="termsandcondition">
<div class="wrapper pdbtn down_text">
<div class="container">
<div class="row">
    <div class="col-md-12 pdtop-50">
      <?php

      $this->db->where('page_title Like','%vendorhome%');
      $contant = $this->db->get('tbl_pages')->row();
      echo $contant->page_desc;
   //  print_r($fcats);
      //exit;
     ?>

    </div>
    </div>
</div>
</div>

</section>
<span id="j_id0:j_id77">
     <div class="modal fade" id="loginModalDiv" role="dialog">
  <div class="modal-dialog">


    <div class="modal-content">
      <div class="modal-body">
      <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
        <div class="formDivOuter poRelModel"><span id="j_id0:j_id77:j_id78:j_id80">
    <script>
            $( document ).ready(function() {
              $( ".textAlineRight:even" ).addClass('textAlineRight pull-right');
              $( ".middleImageSteps:even" ).addClass('upperDiv pull-right');
              $( ".sellingText:even" ).addClass('text-right bottomDiv pull-right');
                var msg = getQueryParam('msg');
                if(msg == "1")
                  $('#loginme').modal();
            });


            function getQueryParam(param) {
            location.search.substr(1)
                .split("&")
                .some(function(item) { // returns first occurence and stops
                    return item.split("=")[0] == param && (param = item.split("=")[1])
                })
            return param
            }
    </script>
   <style>
    .seperate-width{
       width:auto;
       }
    </style>
</span>
          <div class="clr"></div>
        </div>
      </div>
      </div>
      </div>
      </div></span><span id="j_id0:j_id97">







          
         


    <script>
        setInterval(function()
        {
            showFloatingText();
        }, 5000);
    </script>

    <script>
      $( document ).ready(function() {

         $('.bxslider').bxSlider({
         //pagerCustom: '#bx-pager',
         auto:true,
         controls:false,
         pause: 6000,
         adaptiveHeight:false,
     slideWidth:1360,
         preloadImages: 'all',
         onSliderLoad: function(){
             $(".wrapper .bxslider li img").css("visibility", "visible");
              }
         });

        var str_register_error = '';


        });

    </script>
  </span>
 <footer class="footer">
        <div class="footer__column-links">



            <div class="back-to-top" id="back-to-top"> <a href="#top" class="btn btn--round btn--round--lg"><span class="icon-arrow-up"></span></a></div>



            <div class="container">



                <div class="row">

                    <div class="col-sm-3 col-md-2 mobile-collapse">
                    <?php $menu_link = $this->db->get_where("add_link_menu",array("status_enable"=>'enable',"id"=>'1'))->row();

                    ?>

                        <h5 class="title mobile-collapse__title"><?php if(isset($menu_link->link_menu_name)){echo $menu_link->link_menu_name;}?></h5>
                        <div class="v-links-list mobile-collapse__content" style="margin-top: 14px;">
                            <ul>
                        <?php $mlink = $this->db->get_where("mobiledarzi",array("status_enable"=>'enable'))->result();
                        foreach ($mlink as $mlink) {


                    ?>

                                <li><a href="<?php if(isset($mlink->link)){echo $mlink->link;}?>"><?php if(isset($mlink->heading)){echo $mlink->heading;}?></a></li>

                                <?php } ?>
                            </ul>
                        </div>

                    </div>

                    <div class="col-sm-3 col-md-2 mobile-collapse">
                    <?php $menu_link = $this->db->get_where("add_link_menu",array("status_enable"=>'enable',"id"=>'2'))->row();

                    ?>

                        <h5 class="title mobile-collapse__title"><?php if(isset($menu_link->link_menu_name)){echo $menu_link->link_menu_name;}?></h5>
                        <div class="v-links-list mobile-collapse__content" style="margin-top: 14px;">
                            <ul>
                        <?php $slink = $this->db->get_where("service_link",array("status_enable"=>'enable'))->result();
                        foreach ($slink as $slink) {


                    ?>

                                <li><a href="<?php if(isset($slink->service_link_address)){echo $slink->service_link_address;}?>"><?php if(isset($slink->service_link_name)){echo $slink->service_link_name;}?></a></li>

                                <?php } ?>
                            </ul>
                        </div>

                    </div>

                    <div class="col-sm-3 col-md-2 mobile-collapse">
                    <?php $menu_link3 = $this->db->get_where("add_link_menu",array("status_enable"=>'enable',"id"=>'3'))->row();

                    ?>

                        <h5 class="title mobile-collapse__title"><?php if(isset($menu_link3->link_menu_name)){echo $menu_link3->link_menu_name;}?></h5>
                        <div class="v-links-list mobile-collapse__content" style="margin-top: 14px;">
                            <ul>
                        <?php $ilink = $this->db->get_where("information_link",array("status_enable"=>'enable'))->result();
                        foreach ($ilink as $ilink) {


                    ?>

                                <li><a href="<?php if(isset($ilink->info_link_address)){echo $ilink->info_link_address;}?>"><?php if(isset($ilink->info_link_name)){echo $ilink->info_link_name;}?></a></li>

                                <?php } ?>
                            </ul>
                        </div>

                    </div>


                    <div class="col-sm-3 col-md-2 mobile-collapse">
                    <?php $menu_link4 = $this->db->get_where("add_link_menu",array("status_enable"=>'enable',"id"=>'4'))->row();

                    ?>

                        <h5 class="title mobile-collapse__title"><?php if(isset($menu_link4->link_menu_name)){echo $menu_link4->link_menu_name;}?></h5>
                        <div class="v-links-list mobile-collapse__content" style="margin-top: 14px;">
                            <ul>
                        <?php $clink = $this->db->get_where("customer_support_link",array("status_enable"=>'enable'))->result();
                        foreach ($clink as $clink) {


                    ?>

                                <li><a href="<?php if(isset($clink->link_address)){echo $clink->link_address;}?>"><?php if(isset($clink->link_name)){echo $clink->link_name;}?></a></li>

                                <?php } ?>
                            </ul>
                        </div>

                    </div>

                    <div class="col-md-3 hidden-xs hidden-sm">

                       <h5 class="callus">Any Query</h5>
                       <?php $info = $this->db->get("footer")->row();?>

                       <h3 style="padding: 0 0 13px;" class="callus"> Call  <?php if(isset($info->mobile)){echo $info->mobile;}?></h3>

                       <?php if($this->session->flashdata('message')){?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('message')?>
  </div>
<?php } ?>
 <h5 class="callus">News letter</h5>
 <?php echo form_open("welcome/add_news_letter",array('class'=>"contact-form"));?>
 <div class="col-md-10"><input type="email" required="" name="email" class="form-control" placeholder="Enter Email"  style="margin-left: -16px;"/></div><div class="col-md-2" style="
    margin-left: -51px;
"><button type="submit" name="go" class="btn btn-success" style="
    border-radius: 0px; background-color:#000; border:none;
">Subscribe</button>
<?php echo form_close();?></div>
                        <!-- End Logo -->
<br />
<h4 style="color:#000; padding-bottom:10px; padding-top:12px;">Download Mobile App</h4>


<img src="<?php echo base_url(); ?>assets/images/Google-Play-App-Store.jpg" />
<img src="<?php echo base_url(); ?>assets/images/Download_on_the_App_Store_Badge.png" />

                    </div>
</div>
</div>

<p style="text-align: center;color: #fff;padding-top: -7px;background-color: #3C3C3C;padding: 8px;"><?php if(isset($info->copyright)){ echo $info->copyright; }?></p>


<!--div class="container">
<!--div class="row">
<div class="col-md-12 col-sm-12 foot" ><h6  style="color:#000; padding-top:20px;">Most Searched on Mobile Darzi </h6> <p>
<?php
$keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->order_by('id', 'RANDOM');
            $this->db->limit(15);
            $this->db->where('r_viewed BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
      $new=$this->db->get_where('fabric',array("status"=>'approve',"status_enable"=>'enable'))->result_array();
      foreach ($new as $value) {
        ?>
        <?php echo $value['title'];?> |
        <?php
      }
      ?>
      <?php

      $keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->order_by('acc_id', 'RANDOM');
            $this->db->limit(15);
            $this->db->where('r_viewed BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
      $new1=$this->db->get_where('accessories',array("status"=>'approve',"status_enable"=>'enable'))->result_array();
      foreach ($new1 as $value1) {
        ?>
        <?php echo $value1['brand'];?> |
        <?php
      }
      ?>
      <?php

$keyword = $this->session->userdata('city_session');
            $this->db->where("city LIKE '%$keyword%'");
            $this->db->order_by('id', 'RANDOM');
            $this->db->limit(15);
            $this->db->where('r_viewed BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()');
      $new2=$this->db->get_where('online_boutique',array("status"=>'approve',"status_enable"=>'enable'))->result_array();
      foreach ($new2 as $value2) {
        ?>
        <?php echo $value2['brand'];?> |
        <?php
      }
      ?>

</p></div>
</div>
</div-->
<!--div style="border: 1px solid #9C9A9A;  margin-bottom: 20px;"></div-->
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-12" ><span style="color: #000;"><b>Payment Secured By :-</b> </span> <img src="<?php echo base_url(); ?>assets/images/925739176s.png" />  <img src="<?php echo base_url(); ?>assets/images/PayUMoney-logo.jpg" />  </div>


<div class="col-md-4 col-sm-12" style="color:#000;"><div class="social-links social-links--colorize social-links--large">

              <ul style="margin-top: 12px;margin-left: -2px;">
              <li class="social-links__item" style="color:#000;"><h6>Social Connect</h6></li>
              <?php $link = $this->db->get_where("social",array("status_enable"=>'enable'))->result();
             // print_r($link);
                if(!empty($link)){
                foreach ($link as $link) {
                 
              ?>
              <?php if($link->category=='Facebook'){ 
                ?>
              <li class="social-links__item"><a class="icon icon-facebook" href="<?php echo $link->social_link;?>"></a></li>
              <?php } if ($link->category=='Twitter') { ?>

                <li class="social-links__item"><a class="icon icon-twitter" href="<?php echo $link->social_link;?>"></a></li>
                <?php } if ($link->category=='Google') { ?>

                <li class="social-links__item"><a class="icon icon-google" href="<?php echo $link->social_link;?>"></a></li>
                <?php } if ($link->category=='Pinterest') { ?>

                <li class="social-links__item"><a class="icon icon-pinterest" href="<?php echo $link->social_link;?>"></a></li>
                <?php } if ($link->category=='Gmail') { ?>

                <li class="social-links__item"><a class="icon icon-mail" href="<?php echo $link->social_link;?>"></a></li>

                <?php } } }?>
              </ul>
            </div></div>

            </div>

   </div>



            </div>



        </div>

    <script type="text/javascript">jssor_1_slider_init();</script>

    </footer>

    </body>

    </html>

