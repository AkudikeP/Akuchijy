<?php 
//print_r($style_update);exit;


?>


<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">  
<style>
  
            .form-wizard .nav > li > a{padding: 10px; margin-right:0; text-align: left; color:#888888;}
                        .tab-right{margin-left:-30px; margin-top:-1px; }
            .tab-right .panel {margin-right:-30px;}
            .tab-right .vd_panel-menu {right: 28px; top: -15px;}  
            .tab-right h3{border-bottom:1px solid #EEEEEE;} 
            table .vd_radio label:after{top:0;}    
   
    
    </style>
      
    <!-- for specific page responsive in style css -->
        <style>
  
            @media (max-width: 767px) {
              .tab-right{margin-left:0; margin-top:0;}
              .tab-right .panel{margin-right: 0;}

            } 
    
    </style>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Update Styles</h1>
              <small class="subtitle">Update Styles To Your Attributes</small>
              <div class="vd_panel-menu hidden-xs">
              
              <select class="form-control" id="mcat">
              
              </select>
               <!-- <div class="menu">
                  <div> <span class="menu-icon mgr-10"><i class="fa fa-search"></i></span>Preview </div>
                </div>
                <div class="menu">
                  <div> <span class="menu-icon mgr-10"><i class="fa fa-copy"></i></span>Duplicate </div>
                </div>
                <div class="menu">
                  <div> <span class="menu-icon mgr-10"><i class="fa fa-money"></i></span>Product Sales </div>
                </div>
                <div class="menu">
                  <div> <span class="menu-icon mgr-10"><i class="fa fa-trash-o"></i></span>Delete </div>
                </div>
                <div class="menu">
                  <div> <span class="menu-icon mgr-10"><i class="fa fa-support"></i></span>Help </div>
                </div>-->
              </div>
              <div class="vd_panel-menu visible-xs">
                <div class="menu">
                  <div data-action="click-trigger"> <span class="menu-icon mgr-10"><i class="fa fa-bars"></i></span>Menu <i class="fa fa-angle-down"></i> </div>
                  <div data-action="click-target" class="vd_mega-menu-content width-xs-2 left-xs" style="display: none;">
                    <div class="child-menu">
                      <div class="content-list content-menu">
                        <ul class="list-wrapper pd-lr-10">
                          <li> <a href="#">
                            <div class="menu-icon"><i class="fa fa-search"></i></div>
                            <div class="menu-text">Preview</div>
                            </a> </li>
                          <li> <a href="#">
                            <div class="menu-icon"><i class="fa fa-copy"></i></div>
                            <div class="menu-text">Duplicate</div>
                            </a> </li>
                          <li> <a href="#">
                            <div class="menu-icon"><i class="fa fa-money"></i></div>
                            <div class="menu-text">Product Sales</div>
                            </a> </li>
                          <li> <a href="#">
                            <div class="menu-icon"><i class="fa fa-trash-o"></i></div>
                            <div class="menu-text">Delete</div>
                            </a> </li>
                          <li> <a href="#">
                            <div class="menu-icon"><i class="fa fa-support"></i></div>
                            <div class="menu-text">Help</div>
                            </a> </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- menu --> 
              </div>
            </div>
          </div>
          
          <div  class="panel-body">
          <div class="vd_content-section clearfix" id="ecommerce-product-add">
           <div id="tabinfo" class="tab-pane">
                        <h3 class="mgtp-15 mgbt-xs-20"> Styles</h3>
                        <?php
                        //print_r($style_update);
                      echo form_open_multipart("Product/update_style_id/".$this->uri->segment(4),array("class"=>"form-inline"));?>
                      <input type="hidden" name="hidden_id" value="<?php echo $style_update['id']; ?>" />
                      <div class="row">
                      <div class="form-group">
                        <label class="col-sm-6 control-label">Style Name</label>
                        <div class="col-sm-6 controls">
                          <input class="form-control" name="style" type="text" required placeholder="Enter Style Name"  value="<?php echo $style_update['style']; ?>">
                        </div>
                      </div>
                      </div>
                      <div class="row">
                      <div class="form-group">
                            <label for="wholesale_price" class="control-label col-lg-6"> Price </label>
                            <div class="col-lg-6">
                              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-inr"></i> </span>
                                <input type="text" name="sprice" maxlength="14" value="<?php echo $style_update['sprice']; ?>">
                              </div>
                            </div>
                          </div>
                          </div>

                           <div class="row">
                      <div class="form-group">
                            
                            <label for="wholesale_price" class="control-label col-lg-6"> Description </label>
                            <div class="col-lg-5">
                              <textarea name="description" required class="form-control"><?php echo $style_update['description']; ?></textarea>
                            </div>
                          </div>
                          </div>



                           <div class="row">
                          </div>
                      <div class="form-group">                     
                    
                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> 
                       <div id="image-holder1"> </div>
                        <span><img src="<?php echo base_url();?>adminassets/styles/<?php echo $style_update['thumb_front']; ?>" /></span> 
                    <!-- The file input field used as target for the file upload widget -->
                    <input  type="hidden" id="fileUpload1" name="hidden_photo" value="<?php echo $style_update['thumb_front']; ?>">
                    <input  type="file" name="thumb_front">
                    
                    </span></div>

                    </div>
                      <div class="col-sm-4 controls"><br />
                       <button type="submit" name="submit" class="btn btn-primary" style="
    margin-left: 32px;
">Update Style</button>
                    </span></div>
                    </div>

                    <span class="text-danger"><?php echo $this->session->flashdata('msg'); ?></span>
                      
                    <?php echo form_close();?><hr/>                  
                      
                      </div>
</div>
<br />
</div>
</div>
<!-- .content -->

<!-- /.modal -->


<!-- /.modal -->

<!-- Footer Start -->
  <footer class="footer-1"  id="footer">      
    <div class="vd_bottom ">
        <div class="container">
            <div class="row">
              <div class=" col-xs-12">
                <div class="copyright">
                    Copyright &copy;2016 MobileDarji. All Rights Reserved 
                </div>
              </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
  </footer>
<!-- Footer END -->
  

</div>

<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script> 
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<script>
$(document).ready(function(){
          $("#fileUpload1").on('change', function () {
alert('don');
        if (typeof (FileReader) != "undefined") {

            var image_holder1 = $("#image-holder1");
            image_holder1.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                }).appendTo(image_holder1);
                $("#remo1").show();
                $("#remove_image1").hide();

            }
            image_holder1.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });

  $(".styledel").click(function(){
              var sid=$(this).attr('id');
              $(this).closest("tr").remove();
              $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/product/style_del',
               data: {sid:sid},
               success: function(response){
                 //alert(response);
               }
               });
            });
            $(".prestyledel").click(function(){
              var sid=$(this).attr('id');
              $(this).closest("tr").remove();
              $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/product/prestyle_del',
               data: {sid:sid},
               success: function(response){
                 //alert(response);
               }
               });
            });
  $("#mcat").change(function(e){
    var mcat=$(this).val();
    window.location.href="<?php echo base_url();?>index.php/Product/styles/"+mcat;
  });
  $(".addstyle").submit(function(e){e.preventDefault();
    //var formdata=$(this).serialize();
    var id=$(this).attr("id");
    //alert(id);
      //var formdata=$(this).serialize();alert(formdata);
                e.preventDefault();
                
                $.ajax({
              url: "<?php echo base_url();?>index.php/Product/add_style", // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,        // To send DOMDocument or non processed data file it is set to false
              success: function(data)   // A function to be called if request succeeds
              {
                //alert(data);
            //$("#mbox").val('');$("#file").val('');
              //$("#mypost").val('');
              $("tr.trr"+id).after(data);
              }
              });
            
    
  });
  $("#predefined").submit(function(e){e.preventDefault();
    //var formdata=$(this).serialize();
    var id=$(this).attr("id");
    //alert(id);
      //var formdata=$(this).serialize();alert(formdata);
                e.preventDefault();
                
                $.ajax({
              url: "<?php echo base_url();?>index.php/Product/add_predefined", // Url to which the request is send
              type: "POST",             // Type of request to be send, called as method
              data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              processData:false,        // To send DOMDocument or non processed data file it is set to false
              success: function(data)   // A function to be called if request succeeds
              {
                //alert(data);
            //$("#mbox").val('');$("#file").val('');
              //$("#mypost").val('');
              $(".trrlast").after(data);
              }
              });
            
    
  });
});
</script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="js/excanvas.js"></script>      
<![endif]-->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/jquery-ui/jquery-ui.custom.min.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/caroufredsel.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/plugins.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/breakpoints/breakpoints.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 

<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/pnotify/js/jquery.pnotify.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/theme.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/custom/custom.js"></script>
 
<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/tagsInput/jquery.tagsinput.min.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/daterangepicker/moment.min.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/daterangepicker/daterangepicker.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/colorpicker/colorpicker.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/ckeditor/ckeditor.js'></script>
<script type="text/javascript" src='<?php echo base_url();?>adminassets/plugins/ckeditor/adapters/jquery.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/bootstrap-wysiwyg/js/wysihtml5-0.3.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/bootstrap-wysiwyg/js/bootstrap-wysihtml5-0.0.2.js"></script>
<script type="text/javascript">
$(window).load(function() 
{
  "use strict";



  //CKEDITOR.replace( $('[data-rel^="ckeditor"]') );
  $( '[data-rel^="ckeditor"]' ).ckeditor();


  $( '#imageTable tbody' ).sortable({
    placeholder: "warning",
    helper: function(e, ui) {
      ui.children().each(function() {
        $(this).width($(this).width());
        $(this).css('background','rgba(255,255,255,.6)');
      });
      return ui;
    },        
    stop: function(e, ui) {
      $( '#imageTable tbody' ).children().each(function() {
        var object=$(this);
        object.children('.pointer').html(object.index()+1);
      });

    }
    }).disableSelection();
    

  
  $('.save-btn').click(function(e) {
    var object= $(this);
    object.addClass('disabled');
        object.prepend('<i id="save-spinner" class="fa fa-spinner fa-spin append-icon"></i>');  
    object.children('.fa-save').remove();
    setTimeout(function(){
      object.children('.fa-spinner').remove();
      object.removeClass('disabled');
      object.prepend('<i class="fa fa-save append-icon"></i>');
      notification('topright', 'success', 'fa fa-check-circle vd_green', 'Save Successfully', 'Your has setting is saved successfully')     
      },2000)  
    ; 
    });
  
  $('#add-price-btn').click(function(e) {
    var option_value = $("#addPriceModal #option-combination").val();
    var price_value = $("#addPriceModal #price-combination").val();   
    var check_value = $('#addPriceModal #enable-combination').bootstrapSwitch('state') ? '<i class="fa fa-check vd_green"></i>' : '<i class="fa fa-times vd_grey"></i>';  
    var menu_value = $('#addPriceModal #enable-combination').bootstrapSwitch('state') ?   '<a data-original-title="Disabled" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_green"> <i class="fa fa-power-off"></i> </a>' : '<a data-original-title="Enabled" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_grey"> <i class="fa fa-power-off"></i> </a>'
    $('#specific_price_table tbody').append('<tr>' + '<td>' + option_value +'</td>\
                                <td>$' + price_value + '</td>\
                                <td class="text-center">' + check_value + '</td>\
                                <td class="menu-action">' + menu_value + ' <a data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_yellow"> <i class="fa fa-pencil"></i> </a> <a data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_red"> <i class="fa fa-times"></i> </a></td>\
                              </tr>' + '</tr>');
    $('[data-toggle^="tooltip"]').tooltip();                
                
    $('#addPriceModal').modal('hide');                
    
  });
  
  // count down on meta keyword/description text size
  
  function countDown($source, $target) {
    var max = $source.attr("data-maxchar");
    $target.html(max-$source.val().length);
  
    $source.keyup(function(){
      $target.html(max-$source.val().length);
    });
  }
  

  
    countDown($("#meta_title_1"), $("#meta_title_1_counter"));
    countDown($("#meta_description_1"), $("#meta_description_1_counter"));

})
</script>

<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="../blueimp.github.io/JavaScript-Load-Image/js/load-image.min.html"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="../blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */

$(function () {
    'use strict';

    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'plugins/jquery-file-upload/server/php/',
        uploadButton = $('<button/>')
            .addClass('btn vd_btn vd_bg-blue')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            }); 
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 5000000, // 5 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index, file) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
    

});
</script>
<script type="text/javascript">

</script>
<!-- Specific Page Scripts END -->




<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->

<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-43329142-3']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>


</body>

<!-- Mirrored from vendroid.venmond.com/pages-ecommerce-product-add.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Sep 2016 11:26:07 GMT -->
</html>