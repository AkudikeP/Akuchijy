<div id="loading" style="background-color: #fff;top:0px;left:0px;width: 100%;height: 100vh;position: fixed;z-index:5000000"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:22%;margin-left:47%;"></div><?php ini_set('memory_limit','-1'); //print_r($_GET);?>
<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>
<style type="text/css">
  .sp_btn{
    padding: 5px !important;
  }
</style>

    <link rel="stylesheet" type="text/css" href="https://craftpip.github.io/jquery-confirm/css/jquery-confirm.css"/>
    <script src="https://craftpip.github.io/jquery-confirm/demo/libs/bundled.js"></script>

  <link href="<?php echo base_url();?>adminassets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://craftpip.github.io/jquery-confirm/js/jquery-confirm.js"></script>


<script type="text/javascript">
$(document).ready(function(){
//$('#example<?php //echo $id; ?>').DataTable();
});
</script>
<div id="ajax_table_2">
<?php if($_GET['name']=='Add Ons'){ ?><table id="example<?php echo $id; ?>" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr class="nodrag nodrop trr<?php echo $id;?>">

      <th class="fixed-width-lg" style="width:80px"><span class="title_box">Image</span></th>
       <th class="fixed-width-lg"><span class="title_box"><?php echo $name; ?> </span></th>
      <th class="fixed-width-lg"><span class="title_box">Style Name</span></th>
      <th class="fixed-width-xs" style="width:20px"><span class="title_box">Price</span></th>

      <th>Action</th>
      <!-- action -->
    </tr>
  </thead>

  <tbody id="imageList"><?php
    if(isset($page_no))
  {
    $l_limit = 100*$page_no;
    $h_limit = 100;

   // echo $page_no;
   // echo $l_limit.$h_limit;
    $this->db->limit($h_limit,$l_limit);
  }
  else{
$this->db->limit(100);
}
  //echo $id;
  //$this->db->limit(50,100);
$res=$this->db->get_where("make_addon",array("addon_page_id"=>$id))->result();
//echo $this->db->last_query();
//print_r($res);
//$this->output->enable_profiler(TRUE);
//print_r($this->db->last_query());
//print_r($res);
foreach($res as $res){
  $res2=$this->db->get_where("addons",array("add_on_parent"=>$res->id))->result();
  foreach($res2 as $res2){
  ?>
<tr>



  <td><img data-rel="prettyPhoto" src="<?php echo base_url();?>adminassets/styles/resized/small/<?php echo $res2->add_on_image;?>" style='width:60px'>
    <?php  //echo $res->thumb_front;
     if($res2->add_on_image==''){
      ?>
      <img src="<?php echo base_url();?>adminassets/styles/default-thumbnail.jpg" style='width:60px' alt='product image'>
      <?php
      }?>


  </td>

<td><?php echo $res2->add_on_name;?></td>

<?php
  $res3=$this->db->get_where("make_addon",array("id"=>$res2->add_on_parent))->row();
?>


  <td><?php echo $res3->add_on_name;?></td>
  <td class="pointer text-center" id="td_1"> <?php echo $res2->add_on_price;?> </td>

  <td>

  <a data-toggle="tooltip" title="Edit" class="sp_btn btn btn-xs btn-warning edit2" id="<?php echo $res2->id;?>"><i class="fa fa-edit"></i></a>
<button data-toggle="tooltip" title="Delete" class="sp_btn btn btn-xs btn-danger addondel" id="<?php echo $res2->id;?>"><i class="fa fa-trash-o"></i></button>
<?php if($res2->status=='enable'){
echo"<button data-toggle='tooltip' title='Enable' class='sp_btn btn btn-xs btn-success addon_disable' id='$res2->id'><i class='fa fa-lightbulb-o'></i></button>";
}else{
  echo "<button data-toggle='tooltip' title='Disable' class='sp_btn btn btn-xs btn-danger addon_enable' id='$res2->id'><i class='fa fa-lightbulb-o'></i></button>";
  } ?>

</td>
</tr><?php


}}
?></tbody></table>
<?php }else { ?>
  <table id="example<?php echo $id; ?>" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr class="nodrag nodrop trr<?php echo $id;?>">

        <th class="fixed-width-lg" style="width:80px"><span class="title_box">Image</span></th>
         <th class="fixed-width-lg"><span class="title_box"><?php echo $name; ?> </span></th>
        <th class="fixed-width-lg"><span class="title_box">Style Name</span></th>
        <th class="fixed-width-xs" style="width:20px"><span class="title_box">Price</span></th>

        <th>Action</th>
        <!-- action -->
      </tr>
    </thead>

    <tbody id="imageList"><?php
      if(isset($page_no))
    {
      $l_limit = 100*$page_no;
      $h_limit = 100;

     // echo $page_no;
     // echo $l_limit.$h_limit;
      $this->db->limit($h_limit,$l_limit);
    }
    else{
  $this->db->limit(100);
  }
    //echo $id;
    //$this->db->limit(50,100);
  $res=$this->db->get_where("style",array("attr_id"=>$id))->result();
  //print_r($res);
  //$this->output->enable_profiler(TRUE);
  //print_r($this->db->last_query());
  //print_r($res);
  foreach($res as $res){ ?>
  <tr>



    <td><a data-rel="prettyPhoto" href="<?php echo base_url();?>adminassets/styles/resized/small/<?php echo $res->thumb_front;?>">
      <?php  //echo $res->thumb_front;
       if($res->thumb_front!=''){
        ?>
        <img src="<?php echo base_url();?>adminassets/styles/resized/small/<?php echo $res->thumb_front ?>" style='width:60px' alt='product image'>
        <?php
      }else{
        ?>
        <img src="<?php echo base_url();?>adminassets/styles/default-thumbnail.jpg" style='width:60px' alt='product image'>
        <?php
        }?>
     </a>

    </td>
    <?php
    if($name=="Front Neckline")
  {
  //$query = $this->db->get('style')->row();
  //$attr->aid;
  //$this->db->limit(5);
  $q = $this->db->get_where('style',array('front_id'=>$res->front_id))->row();
  //$this->db->limit(5);
  $qu = $this->db->get_where('style',array('id'=>$q->front_id))->row();
    ?>

     <td><?php if(isset($qu->style)){echo $qu->style;}?></td>

     <?php
  }
  else if($name=="Back Neckline")
  {
  //$query = $this->db->get('style')->row();
   //$this->db->limit(5);
  $q = $this->db->get_where('style',array('back_id'=>$res->back_id))->row();
  // print_r($q);
  //$this->db->limit(5);
  $que = $this->db->get_where('style',array('id'=>$q->back_id))->row();
  // print_r($que);
    ?>

     <td><?php if(!empty($que->style)){echo $que->style;}?></td>

     <?php
  }
  else if($name=="Sleeves")
  {
  //$query = $this->db->get('style')->row();
  // $this->db->limit(5);
  $q = $this->db->get_where('style',array('sleeve_id'=>$res->sleeve_id))->row();
  //$this->db->limit(5);
  $quer = $this->db->get_where('style',array('id'=>$q->sleeve_id))->row();
    ?>

     <td><?php echo $quer->style;?></td>

     <?php
  }
  else {
  ?>

  <td><?php echo $res->style;?></td>

  <?php
  }
  ?>


    <td><?php echo $res->style;?></td>
    <td class="pointer text-center" id="td_1"> <?php echo $res->sprice;?> </td>

    <td>

    <a data-toggle="tooltip" title="Edit" class="sp_btn btn btn-xs btn-warning edit" id="<?php echo $res->id;?>"><i class="fa fa-edit"></i></a>
  <button data-toggle="tooltip" title="Delete" class="sp_btn btn btn-xs btn-danger styledel" id="<?php echo $res->id;?>"><i class="fa fa-trash-o"></i></button>
  <button data-toggle="tooltip" title="Delete Image" class="sp_btn btn btn-xs btn-danger styledel_img" id="<?php echo $res->id;?>"><i class="fa fa-picture-o "></i></button>
  <?php if($res->status=='enable'){
  echo"<button data-toggle='tooltip' title='Enable' class='sp_btn btn btn-xs btn-success style_disable' id='$res->id'><i class='fa fa-lightbulb-o'></i></button>";
  }else{
    echo "<button data-toggle='tooltip' title='Disable' class='sp_btn btn btn-xs btn-danger style_enable' id='$res->id'><i class='fa fa-lightbulb-o'></i></button>";
    } ?>

  </td>
  </tr><?php


  }
  ?></tbody></table>
<?php } ?></div>


<?php ?>

<script>
$("#loading").delay(1000).hide(20);
$(document).ready(function(){
$(".edit").click(function(){
  var sid=$(this).attr('id');
  //alert(sid);
  <?php if(isset($segment_data) && !empty($segment_data)){ ?>
    window.parent.location.href = "<?php echo base_url();?>product/update_styles/"+sid+"/<?php echo $segment_data; ?>";
    <?php }else{ ?>
      window.parent.location.href = "<?php echo base_url();?>product/update_styles/"+sid;
      <?php } ?>
});
$(".edit2").click(function(){
  var sid=$(this).attr('id');
  //alert(sid);
  <?php if(isset($segment_data) && !empty($segment_data)){ ?>
    window.parent.location.href = "<?php echo base_url();?>product/update_addon/"+sid+"/<?php echo $segment_data; ?>";
    <?php }else{ ?>
      window.parent.location.href = "<?php echo base_url();?>product/update_addon/"+sid;
      <?php } ?>
});
$(".styledel").click(function(){
    var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to delete this?',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Yes',
                                    btnClass: 'btn-info',
                                    action: function () {
                                      var sid=thisvari.attr('id');
                                          console.log(sid);
                                          thisvari.closest("tr").remove();
                                          $.ajax({
                                           type: "POST",
                                           url: '<?php echo base_url();?>index.php/Product/style_del',
                                           data: {sid:sid},
                                           success: function(response){
                                             //alert(response);
                                           }
                                           });
                                    }
                                },
                                cancel: function () {
                                    //$.alert('you clicked on <strong>cancel</strong>');
                                },

                            }
                        });


});

$(".addon_disable").click(function(){
  //alert('yes');
   var thisvari = $(this);
$.confirm({
                      title: 'Confirmation',
                      content: 'Are you sure want to disable this?',
                      icon: 'fa fa-question-circle',
                      animation: 'scale',
                      closeAnimation: 'scale',
                      opacity: 0.5,
                      buttons: {
                          'confirm': {
                              text: 'Yes',
                              btnClass: 'btn-info',
                              action: function () {
                                 var sid=thisvari.attr('id');
                                 thisvari.removeClass("btn-success");
                                 thisvari.addClass("btn-danger");
                                  $.ajax({
         type: "POST",
         url: '<?php echo base_url();?>index.php/Product/addons_disable',
         data: {sid:sid},
         success: function(response){
           //alert(response);
         }
         });

                              }
                          },
                          cancel: function () {
                              //$.alert('you clicked on <strong>cancel</strong>');
                          },

                      }
                  });

});

$(".addon_enable").click(function(){
           var thisvari = $(this);
$.confirm({
                      title: 'Confirmation',
                      content: 'Are you sure want to enable this?',
                      icon: 'fa fa-question-circle',
                      animation: 'scale',
                      closeAnimation: 'scale',
                      opacity: 0.5,
                      buttons: {
                          'confirm': {
                              text: 'Yes',
                              btnClass: 'btn-info',
                              action: function () {
                                 var sid=thisvari.attr('id');
                                 thisvari.removeClass("btn-danger");
                                 thisvari.addClass("btn-success");
                                  $.ajax({
         type: "POST",
         url: '<?php echo base_url();?>index.php/Product/addons_enable',
         data: {sid:sid},
         success: function(response){
           //alert(response);
         }
         });

                              }
                          },
                          cancel: function () {
                              //$.alert('you clicked on <strong>cancel</strong>');
                          },

                      }
                  });
});
    $(".style_disable").click(function(){
        //alert('yes');
         var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to disable this?',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Yes',
                                    btnClass: 'btn-info',
                                    action: function () {
                                       var sid=thisvari.attr('id');
                                       thisvari.removeClass("btn-success");
                                       thisvari.addClass("btn-danger");
                                        $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Product/style_disable',
               data: {sid:sid},
               success: function(response){
                 //alert(response);
               }
               });

                                    }
                                },
                                cancel: function () {
                                    //$.alert('you clicked on <strong>cancel</strong>');
                                },

                            }
                        });

});

      $(".style_enable").click(function(){
                 var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to enable this?',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Yes',
                                    btnClass: 'btn-info',
                                    action: function () {
                                       var sid=thisvari.attr('id');
                                       thisvari.removeClass("btn-danger");
                                       thisvari.addClass("btn-success");
                                        $.ajax({
               type: "POST",
               url: '<?php echo base_url();?>index.php/Product/style_enable',
               data: {sid:sid},
               success: function(response){
                 //alert(response);
               }
               });

                                    }
                                },
                                cancel: function () {
                                    //$.alert('you clicked on <strong>cancel</strong>');
                                },

                            }
                        });
});

$(".addondel").click(function(){
      var thisvari = $(this);
   $.confirm({
                          title: 'Confirmation',
                          content: 'Are you sure want to delete this?',
                          icon: 'fa fa-question-circle',
                          animation: 'scale',
                          closeAnimation: 'scale',
                          opacity: 0.5,
                          buttons: {
                              'confirm': {
                                  text: 'Yes',
                                  btnClass: 'btn-info',
                                  action: function () {
                                    var sid=thisvari.attr('id');
                                        //console.log(sid);
                                        thisvari.closest("tr").remove();
                                        $.ajax({
                                         type: "POST",
                                         url: '<?php echo base_url();?>index.php/Product/Make_addon_del',
                                         data: {sid:sid},
                                         success: function(response){
                                           //alert(response);
                                         }
                                         });
                                  }
                              },
                              cancel: function () {
                                  //$.alert('you clicked on <strong>cancel</strong>');
                              },

                          }
                      });


});

  $(".styledel_img").click(function(){
        var thisvari = $(this);
     $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to delete this Image?',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Yes',
                                    btnClass: 'btn-info',
                                    action: function () {
                                      var sid=thisvari.attr('id');
                                                console.log(sid);
                                                thisvari.closest("tr td:first-child").html('kkk');
                                                $.ajax({
                                                 type: "POST",
                                                 url: '<?php echo base_url();?>index.php/Product/style_del_img',
                                                 data: {sid:sid},
                                                 success: function(response){
                                                   //alert(response);
                                                 }
                                                 });
                                    }
                                },
                                cancel: function () {
                                    //$.alert('you clicked on <strong>cancel</strong>');
                                },

                            }
                        });

});


            $(".prestyledel").click(function(){

                      var thisvari = $(this);
                  $.confirm({
                            title: 'Confirmation',
                            content: 'Are you sure want to delete this?',
                            icon: 'fa fa-question-circle',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            opacity: 0.5,
                            buttons: {
                                'confirm': {
                                    text: 'Yes',
                                    btnClass: 'btn-info',
                                    action: function () {
                                      var sid=thisvari.attr('id');
                                                console.log(sid);
                                                thisvari.closest("tr").remove();
                                                $.ajax({
                                                 type: "POST",
                                                 url: '<?php echo base_url();?>index.php/Product/prestyle_del',
                                                 data: {sid:sid},
                                                 success: function(response){
                                                   //alert(response);
                                                 }
                                                 });
                                    }
                                },
                                cancel: function () {
                                    //$.alert('you clicked on <strong>cancel</strong>');
                                },

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
