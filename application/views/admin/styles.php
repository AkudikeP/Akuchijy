<div id="loading" style="background-color: #fff;top:0px;left:0px;width: 100%;height: 100vh;position: fixed;z-index:5000000"><img src="<?php echo base_url(); ?>assets/images/01-progress.gif" style="margin:22%;margin-left:47%;"></div>
<?php // ini_set('memory_limit','-1'); ?>
<style>
.active8
{
  background-color:#1fae66 !important;
}
iframe{
  border:none;
}
iframe {
 // background:url(http://project21.piresearch.in/adminassets/styles/11_keyhole33.jpg) center center no-repeat;
 }
 #loadingMessage {
    width: 100%;
    height: 100%;
    z-index: 1000;
    background: #ccc;
    top: 0px;
    left; 0px;
    position: absolute;
}
</style>

<?php
//print_r($attr);exit;


?>

<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>adminassets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css">
<style>

            .form-wizard .nav > li > a{padding: 10px; margin-right:0; text-align: left; color:#888888;}
                        .tab-right{margin-left:0px; margin-top:0px; }
            .tab-right .panel {margin-right:-30px;}
            .tab-right .vd_panel-menu {right: 28px; top: -15px;}
            .tab-right h3{border-bottom:1px solid #EEEEEE;}
            table .vd_radio label:after{top:0;}
            .container_check { position: relative; width: 117px; margin-bottom:30px; height: 118px; float: left; margin-left: 10px;
    padding: 8px;
    border: 1px solid #ded7d7; }
.checkbox_check { position: absolute; top: 5px; right: 5px; display: block; width: 18px; height: 18px; }


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
              <h1>Add Styles</h1>
              <small class="subtitle">Add Styles To Your Attributes</small>
              <div class="vd_panel-menu hidden-xs">
              <?php $c="";$default="";

        if($this->uri->segment(3)){$c=$this->uri->segment(3);
          $default=$this->uri->segment(3);
          }
          if($default=='')
          {
            $default=3;
          }
        $cat=$this->db->get("category")->result();//$default=?>

              <select class="form-control" id="mcat" required="">
                <?php
  foreach($cat as $cat){ ?>
    <option value="<?php echo $cat->cid;?>" <?php if($cat->cid==$c){echo "selected";}?>><?php echo $cat->cat_name;?></option><?php }?>
              </select>

              </div>

            </div>
          </div>


          <div class="vd_content-section clearfix" id="ecommerce-product-add">
            <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-12">
                <div class="form-wizard condensed mgbt-xs-20">
                  <ul class="nav nav-tabs nav-stacked">
                  <?php
         $i=1;foreach($attr as $att){?>
                    <li class="<?php if($i==1){echo 'active';}?>">
                    <a href="#tabinfo<?php echo $att->aid;?>" id="<?php echo $att->attr_name;?>" class="tabs_id" data-toggle="tab"> <i class="fa fa-info-circle append-icon"></i> <?php echo $att->attr_name;?> </a></li>
                    <?php $i++;}?>
                    <li>
                    <a href="#catelogue" data-toggle="tab"> <i class="fa fa-info-circle append-icon"></i> PreDefined Design Catelogue</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-12 col-md-8 col-lg-12 tab-right">
                <div class="panel widget panel-bd-left light-widget">

                  <div  class="panel-body">
                    <div class="tab-content no-bd mgbt-xs-20">
                    <?php $i=1;foreach($attr as $attr){?>
                    <div id="tabinfo<?php echo $attr->aid;?>" class="tab-pane <?php if($i==1){echo 'active';}?>">
                        <h3 class="mgtp-15 mgbt-xs-20"> <?php echo $attr->attr_name;?></h3>
                      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal addstyle" id="<?php echo $attr->aid;?>">
                      <input type="hidden" name="aid" value="<?php echo $attr->aid;?>" required/>



                      <?php //echo $attr->attr_name;
                      //echo $attr->aid;
?>

                     <?php //echo $attr->attr_name;
                     if($attr->attr_name=="Front Neckline")
                     { if($attr->aid==142){
?>
<div class="form-group">
                       <label class="col-sm-3 control-label"> Style</label>
                       <div class="col-sm-7 controls">

                       <?php
                        //$this->db->limit(5);
                        $styles_info = $this->db->get_where("style",array("attr_id"=>137))->result_array();
                        $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>1,"kurti_or_blouse"=>1))->result_array();

                       ?>

                      <select class="form-control get_selected" name="kurti_style" id="1_1_frontblousestyle" required="">
                      <option value="">Select  Style</option>
                      <?php
                      //print_r($styles_info);
                      foreach($styles_info as $styles_info){?>
                       <div class="col-sm-9 controls">
                           <option value="<?php echo $styles_info['id'];?>"><?php echo $styles_info['style'];?></option>
                           </div>
                           <?php } ?>
                           </select>



                  </div>
                   </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-7 controls">
                          <textarea cols="5" rows="3" name="description" required></textarea>
                        </div>

                  <div class="col-xs-12" id="frontblousestyle">
                   <?php
                                   foreach($styles_type as $styles_type){?>


                                          <div class="container_check">
                                            <img src="<?php echo base_url();?>adminassets/styles/resized/small/<?php echo $styles_type['image']; ?>" height="60px" style="
    margin-left: 16px;
"/>
                                            <p style="
    margin-left: 27px;
"><?php echo $styles_type['name']." <div style='
   position:absolute; top:5px; left:3px; font-size:14px;
'>".$styles_type['price']."</div>"; ?></p>
                                            <input type="checkbox" name="images_data[]" class="checkbox_check" value="<?php echo $styles_type['id']; ?>"/>


                                        </div>

                                        <?php } ?></div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Add</button><br />




                  <?php
                       }else{ ?>



                   <div class="form-group">
                       <label class="col-sm-3 control-label"> Style</label>
                       <div class="col-sm-4 controls">

                       <?php $styles_info = $this->db->get_where("style",array("attr_id"=>$attr->aid-1))->result_array();
                       $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>1,"kurti_or_blouse"=>0))->result_array();
                       ?>

                      <select class="form-control get_selected" name="kurti_style" id="1_0_frontkurtistyle" required>
                      <option value="">Select  Style</option>
                      <?php
                      foreach($styles_info as $styles_info){?>
                       <div class="col-sm-4 controls">
                           <option value="<?php echo $styles_info['id'];?>"><?php echo $styles_info['style'];?></option>
                           </div>
                           <?php } ?>
                           </select>
                          </div>
                    </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-4 controls">
                          <textarea cols="5" rows="3" name="description" required></textarea>
                        </div>



                           <div class="col-xs-12" id="frontkurtistyle">


                                   <?php
                                   foreach($styles_type as $styles_type){?>


                                          <div class="container_check">
                                            <img src="<?php echo base_url();?>adminassets/styles/resized/small/<?php echo $styles_type['image']; ?>" height="60px" style="
    margin-left: 16px;
"/>
                                            <p style="
    margin-left: 27px;
"><?php echo $styles_type['name']." <div style='
    position:absolute; top:5px; left:3px; font-size:14px;
'>".$styles_type['price']."</div>"; ?></p>
                                            <input type="checkbox" name="images_data[]" class="checkbox_check" value="<?php echo $styles_type['id']; ?>"/>


                                        </div>

                                        <?php } ?>






<br />

</div>
<button type="submit" name="submit" class="btn btn-primary">Add</button><br />

                                 </div>
                   <?php }}
                  else if($attr->attr_name=="Back Neckline")
                    {if($attr->aid==143){
                      ?>
                                              <div class="form-group">
                        <label class="col-sm-3 control-label">Kurti Style</label>
                        <div class="col-sm-4 controls">
                        <?php $front_info = $this->db->get_where("style",array("attr_id"=>137))->result_array();
                         //print_r($front_info);
                           $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>2,"kurti_or_blouse"=>1))->result_array();
                        ?>

                       <select class="form-control kurti_style_blouse" name="kurti_style" required>
                       <option value="">Select Kurti Style</option>
                       <?php
                       foreach($front_info as $front_info){
                         echo $front_info['id'];
                       // $front_info_name = $this->db->get_where("style",array("front_id"=>$front_info['id']))->result_array();
                        ?>
                        <div class="col-sm-9 controls">
                            <option value="<?php echo $front_info['id'];?>"><?php

                         echo $front_info['style'];?></option>
                            </div>
                            <?php } ?>
                            </select>
                               </div>
                                </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-4 controls">
                          <textarea cols="5" rows="3" name="description" required></textarea>
                        </div> </div>
                        <!---->
                      <div class="form-group">
                      <label class="col-sm-3 control-label"> Front Neck</label>
                      <div class="col-sm-4 controls" id="font_nack_line_blouse">



                        </div>



                        </div>
                        <div class="form-group">

                      <div class="col-sm-12 controls" >


                           <div class="col-xs-12" id="backblousestyle">

                          <?php
                          foreach($styles_type as $styles_type){?>


                                 <div class="container_check">
                                   <img src="<?php echo base_url();?>adminassets/styles/resized/small/<?php echo $styles_type['image']; ?>" height="60px" style="
    margin-left: 16px;
"/>
                                   <p style="
    margin-left: 27px;
"><?php echo $styles_type['name']." <div style='
    position:absolute; top:5px; left:3px; font-size:14px;
'>".$styles_type['price']."</div>"; ?></p>
                                   <input type="checkbox" name="images_data[]" class="checkbox_check" value="<?php echo $styles_type['id']; ?>"/>


                               </div>

                               <?php } ?>



                      </div>

                        </div>



                        </div>

                      <button type="submit" name="submit" class="btn btn-primary">Add</button>
                             <?php
                      }else{ ?>
                        <!---->
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Kurti Style</label>
                        <div class="col-sm-4 controls">
                        <?php $front_info = $this->db->get_where("style",array("attr_id"=>122))->result_array();
                         //print_r($front_info);
                           $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>2,"kurti_or_blouse"=>0))->result_array();
                        ?>

                       <select class="form-control kurti_style" id="kurti_style" name="kurti_style" required>
                       <option value="">Select Kurti Style</option>
                       <?php
                       foreach($front_info as $front_info){
                         echo $front_info['id'];
                       // $front_info_name = $this->db->get_where("style",array("front_id"=>$front_info['id']))->result_array();
                        ?>
                        <div class="col-sm-9 controls">
                            <option value="<?php echo $front_info['id'];?>"><?php

                         echo $front_info['style'];?></option>
                            </div>
                            <?php } ?>
                            </select>
                               </div>
                                </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-4 controls">
                          <textarea cols="5" rows="3" name="description" required></textarea>
                        </div> </div>
                        <!---->
                      <div class="form-group">
                      <label class="col-sm-3 control-label"> Front Neck</label>
                      <div class="col-sm-4 controls" id="font_nack_line">



                        </div>



                        </div>
                        <div class="form-group">

                      <div class="col-xs-12 controls" id="backkurtistyle">

                           <div class="col-xs-12" >

                          <?php
                          foreach($styles_type as $styles_type){?>


                                 <div class="container_check">
                                   <img src="<?php echo base_url();?>adminassets/styles/resized/small/<?php echo $styles_type['image']; ?>" height="60px" style="
    margin-left: 16px;
"/>
                                   <p style="
    margin-left: 27px;
"><?php echo $styles_type['name']." <div style=' position:absolute; top:5px; left:3px; font-size:14px;'>".$styles_type['price']."</div>"; ?></p>
                                   <input type="checkbox" name="images_data[]" class="checkbox_check" value="<?php echo $styles_type['id']; ?>"/>


                               </div>

                               <?php } ?>



                      </div>

                        </div>



                        </div>

                      <button type="submit" name="submit" class="btn btn-primary">Add</button><?php }}

                                            else if($attr->attr_name=="Sleeves")
                                            { //echo "kkk";
                                              if($attr->aid==144){
                                             ?>
                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Kurti Style</label>
                                            <div class="col-sm-7 controls">
                                            <?php $front_info = $this->db->get_where("style",array("attr_id"=>137))->result_array();
                                             //print_r($front_info);
                                               $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>3,"kurti_or_blouse"=>1))->result_array();
                                            ?>

                                            <select class="form-control kurti_style_blouse"  name="kurti_style" required>
                       <option value="">Select Kurti Style</option>
                       <?php
                       foreach($front_info as $front_info){
                         echo $front_info['id'];
                       // $front_info_name = $this->db->get_where("style",array("front_id"=>$front_info['id']))->result_array();
                        ?>
                        <div class="col-sm-9 controls">
                            <option value="<?php echo $front_info['id'];?>"><?php

                         echo $front_info['style'];?></option>
                            </div>
                            <?php } ?>
                            </select>
                               </div> </div>
                        <!---->
                      <div class="form-group">

                      <label class="col-sm-3 control-label"> Front Neck</label>
                      <div class="col-sm-4 controls" id="font_nack_line_blouse2">



                        </div>



                        </div>

                                                   <div class="form-group">
                                              <label class="col-sm-3 control-label"> back Neck</label>
                                              <div class="col-sm-4 controls" id="back_nack_line">


                                                     </div>
                                                     </div>
                                                     <div class="form-group">


                                                     </div>

                                                     <div class="col-xs-12" id="sleeveblousestyle">

                                                      <?php
                                                      foreach($styles_type as $styles_type){?>


                                                             <div class="container_check">
                                                               <img src="<?php echo base_url();?>adminassets/styles/resized/small/<?php echo $styles_type['image']; ?>" height="60px" style="
    margin-left: 16px;
"/>
                                                               <p style="
    margin-left: 27px;
"><?php echo $styles_type['name']." <div style=' position:absolute; top:5px; left:3px; font-size:14px;'>".$styles_type['price']."</div>"; ?></p>
                                                               <input type="checkbox" name="images_data[]" class="checkbox_check" value="<?php echo $styles_type['id']; ?>"/>


                                                           </div>

                                                           <?php } ?>








                                                   </div>

                                                  <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                              <?php }else{
                                              ?>

                                                <?php ?>

                                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Kurti Style</label>
                                            <div class="col-sm-4 controls">
                                            <?php $front_info = $this->db->get_where("style",array("attr_id"=>122))->result_array();
                                             //print_r($front_info);
                                               $styles_type = $this->db->get_where("front_back_sleeve",array("type"=>3,"kurti_or_blouse"=>0))->result_array();
                                            ?>

                                           <select class="form-control kurti_style" id="kurti_style" name="kurti_style" required>
                                           <option value="">Select Kurti Style</option>
                                           <?php
                                           foreach($front_info as $front_info){
                                             echo $front_info['id'];
                                           // $front_info_name = $this->db->get_where("style",array("front_id"=>$front_info['id']))->result_array();
                                            ?>
                                            <div class="col-sm-9 controls">
                                                <option value="<?php echo $front_info['id'];?>"><?php

                                             echo $front_info['style'];?></option>
                                                </div>
                                                <?php } ?>
                                              </select >
                                                   </div> </div>
                                                   <div class="form-group">
                                                  <label class="col-sm-3 control-label"> Front Neck</label>
                                                  <div class="col-sm-4 controls" id="font_nack_line2">

                                                        Select Front Kurti Style

                                                    </div> </div>

                                                   <div class="form-group">
                                              <label class="col-sm-3 control-label"> Back Neck</label>
                                              <div class="col-sm-4 controls" id="back_nack_line">


                                                     </div>
                                                     </div>
                                                     <div class="form-group">

                                                    <label class="col-sm-3 control-label">Description</label>
                                                        <div class="col-sm-4 controls">
                                                          <textarea cols="5" rows="3" name="description" required></textarea>
                                                        </div>
                                                     </div>


                                                     <div class="col-xs-12" id="sleevekurtistyle">

                                                      <?php
                                                      foreach($styles_type as $styles_type){?>


                                                             <div class="container_check">
                                                               <img src="<?php echo base_url();?>adminassets/styles/resized/small/<?php echo $styles_type['image']; ?>" height="60px" style="
    margin-left: 16px;
"/>
                                                               <p style="
    margin-left: 27px;
"><?php echo $styles_type['name']." <div style=' position:absolute; top:5px; left:3px; font-size:14px;'>".$styles_type['price']."</div>"; ?></p>
                                                               <input type="checkbox" name="images_data[]" class="checkbox_check" value="<?php echo $styles_type['id']; ?>"/>


                                                           </div>

                                                           <?php } ?>








                                                   </div>

                                                  <button type="submit" name="submit" class="btn btn-primary">Add</button><?php }}

                        else if($attr->attr_name=="Add Ons")
                      {//echo "in"; ?>
                    <!--div class="form-group">
                        <label class="col-sm-3 control-label">Add Ons Style</label>
                        <div class="col-sm-7 controls">



                       <select class="form-control" name="addon_id" required>
                       <option value="">Select Add Ons Style</option>
                       <?php
                       ?>
                        <div class="col-sm-9 controls">
                            <option value="1">Linnin</option>
                             <option value="2">Closing</option>
                              <option value="3">Other</option>
                            </div>

                            </select>
                   </div></div--><?php }else{
                    ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Style Name</label>
                        <div class="col-sm-4 controls">
                          <input  name="stylename" type="text" required placeholder="Enter Style Name">
                        </div>
                      </div>
                      <div class="form-group">
                            <label for="wholesale_price" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The wholesale price is the price you paid for the product. Do not include the tax.">Price</span> </label>
                            <div class="col-lg-4">
                              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-inr"></i> </span>
                                <input type="text" placeholder="1000" id="wholesale_price" name="styleprice" maxlength="14" required="">
                              </div>
                            </div>
                          </div>
                       <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-4 controls">
                          <textarea cols="5" rows="3" name="description" required></textarea>
                        </div>
                      </div>




                      <div class="form-group">
                      <label class="col-sm-3 control-label">Image</label>
                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Add Image</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input  type="file" name="photo">
                    </span></div>
                      <div class="col-sm-4 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </span></div>
                    </div>
                    <?php
                    } ?>


                    </form><hr/>
                      <?php $count=$this->db->get_where("style",array("attr_id"=>$attr->aid))->num_rows();
                      $page_count = $count/100;
                      //echo $page_count;
                      $varible = $this->uri->segment(3);
                       if($varible!='')
                    {
                      $segment_data = $varible;
                    }
                      else{
                        $segment_data=0;
                        } ?>
                    <iframe id="ajax_table<?php echo $attr->aid; ?>" src="<?php echo base_url();?>index.php/Product/style_table_ajax?id=<?php echo $attr->aid; ?>&name=name&segment_data=<?php echo $segment_data; ?>" width="100%" 
                    <?php if($page_count<1){echo 'height="1500px"';} else{echo 'height="7800px"';} ?> 
                    ></iframe>

                    <div id="pages">

<?php
                      echo '<div class="dataTables_paginate paging_simple_numbers" id="example125_paginate"><span>';


                      for ($i=0; $i < $page_count; $i++) {
                      $j=$i+1;
                      //$j2=$j+1;
                      if($i<5){
                       echo "<button class='paginate_button_real2 but$j' id='".$i."o".$attr->aid."' href='$attr->attr_name'> $j </button>";
                      }
                      else{
                        echo "<button class='paginate_button_real2 but$j' id='".$i."o".$attr->aid."' href='$attr->attr_name' style='display:none;'> $j </button>";
                      }
                      }
                      echo "</span></div>";
?>
                    </div>


                      </div>
                      <?php $i++;}


            //if($this->uri->segment(3)){$pre=$this->uri->segment(3);}else{$pre=
            ?>
            <!--div id="loadingMessage">--Loading...<!/div-->


                      <div id="catelogue" class="tab-pane">
                        <h3 class="mgtp-15 mgbt-xs-20">Add Predefined Styles</h3>
                      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="predefined">
                      <input type="hidden" name="aid" value="<?php echo $default;?>" />
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Style Name</label>
                        <div class="col-sm-4 controls">
                          <input name="stylename" type="text" required placeholder="Enter Style Name">
                        </div>
                      </div>
                      <div class="form-group">
                            <label for="wholesale_price" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="The wholesale price is the price you paid for the product. Do not include the tax.">Price</span> </label>
                            <div class="col-lg-4">
                              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-inr"></i> </span>
                                <input type="number" placeholder="1000" id="wholesale_price" name="styleprice" maxlength="14" required="">
                              </div>
                            </div>
                          </div>
                      <div class="form-group">

                      <label class="col-sm-3 control-label">Image</label>

                      <div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Front Image</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input  type="file" name="photo">
                    </span>
                    </div>
                    <!--div class="col-sm-3 controls">
                       <span class="btn vd_btn vd_bg-green fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Back Image</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <!--input  type="file" name="photo1">
                    </span></div-->
                      <div class="col-sm-3 controls">
                       <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </span></div>
                    </div>

                    </form><hr/>
                          <table class="table table-dragable">
                            <thead>
                              <tr class="nodrag nodrop trrlast">

                                <th class="fixed-width-lg" style="width:80px"><span class="title_box">Front</span></th>
                                <!--th class="fixed-width-lg" style="width:80px"><span class="title_box">Back</span></th-->
                                <th class="fixed-width-lg"><span class="title_box">Style Name</span></th>
                                <th class="fixed-width-xs" style="width:20px"><span class="title_box">Price</span></th>

                                <th>Delete</th>
                                <!-- action -->
                              </tr>
                            </thead>
                            <tbody id="imageList">
                            <?php $res=$this->db->get_where("predesign",array("catid"=>$default))->result();
              foreach($res as $res){?>
                              <tr>

                                <td><a data-rel="prettyPhoto" href="<?php echo base_url();?>adminassets/styles/<?php echo $res->dfront;?>"> <img src="<?php echo base_url();?>adminassets/styles/resized/small/<?php echo $res->dfront;?>" style="width:60px" alt="product image"> </a></td>
                                <!--td><a data-rel="prettyPhoto" href="<?php echo base_url();?>adminassets/styles/<?php echo $res->dback;?>"> <img src="<?php echo base_url();?>adminassets/styles/resized/small/<?php echo $res->dback;?>" style="width:60px" alt="product image"> </a></td-->
                                <td><?php echo $res->dname;?></td>
                                <td class="pointer text-center" id="td_1"> <?php echo $res->dprice;?>/- </td>

                                <td>
                            <button class="btn btn-xs btn-danger prestyledel" id="<?php echo $res->id;?>"><i class="fa fa-trash-o"></i></button>

                            </td>
                              </tr><?php }?>

                            </tbody>
                          </table>

                      </div>
                    </div>
                    <!-- tab-content -->

                  </div>
                  <!-- panel-body -->

                  <!-- form-horizontal -->
                </div>
                <!-- Panel Widget -->
              </div>
              <!-- col-sm-12-->
            </div>
            <!-- row -->

          </div>
          <!-- .vd_content-section -->

        </div>
        <!-- .vd_content -->
      </div>
      <!-- .vd_container -->
    </div>
    <!-- .vd_content-wrapper -->

    <!-- Middle Content End -->

  </div>
  <!-- .container -->
</div>
<!-- .content -->

<!-- /.modal -->


<!-- /.modal -->

<!-- Footer Start -->

<!-- Footer END -->


</div>

<div >

</div>
<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>



<script type="text/javascript" src="<?php echo base_url();?>adminassets/js/jquery.js"></script>


    <link rel="stylesheet" type="text/css" href="https://craftpip.github.io/jquery-confirm/css/jquery-confirm.css"/>
    <script src="https://craftpip.github.io/jquery-confirm/demo/libs/bundled.js"></script>
    <script type="text/javascript" src="https://craftpip.github.io/jquery-confirm/js/jquery-confirm.js"></script>
 <!--script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script-->
    <!--  Alert Message -->
  <script src="https://cdn.jsdelivr.net/alertifyjs/1.8.0/alertify.min.js"></script>
  <link href="https://cdn.jsdelivr.net/alertifyjs/1.8.0/css/alertify.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/alertifyjs/1.8.0/css/themes/bootstrap.min.css" rel="stylesheet">


<script>
$(document).ready(function(){
$("#loading").delay(1000).hide(20);
  $(".checkAll").click(function(){
    if($('input:checkbox').is('[disabled=disabled]'))
    {
      //alert('ture');
    }else{
       $('input:checkbox').not(this).prop('checked', this.checked);
    }

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



$(".get_selected").change(function(){
           var sid=$(this).attr("id");
            var sid2 = sid.split("_");
           var kurti_or_blouse = sid2[1];
           var response_id = sid2[2];

           var type = sid2[0];
           var formdata=$(this).serialize();
           var formdata2 = formdata.split("=");
           var formdata_title = 'front_id';
           var formdata = formdata2[1];
           //console.log(formdata);
           //alert(type+kurti_or_blouse+response+form);
           //alert(sid);
           $.ajax({
type: "POST",
url: '<?php echo base_url();?>index.php/Product/get_selected',
data: {form_title:formdata_title,form:formdata,type:type,kurti_or_blouse:kurti_or_blouse},
success: function(response){
console.log(response);
$("#"+response_id).html(response);

}
});
});

$(".kurti_style").change(function(){
           var thisvari = $(this);
           var sid=thisvari.val();
           //alert(sid);
           $.ajax({
type: "POST",
url: '<?php echo base_url();?>index.php/Product/get_front_nack',
data: {sid:sid},
success: function(response){
console.log(response);
$("#font_nack_line").html(response);
$("#font_nack_line2").html(response);
}
});
});

$(".kurti_style_blouse").change(function(){
           var thisvari = $(this);
           var sid=thisvari.val();
          // alert(sid);
           $.ajax({
type: "POST",
url: '<?php echo base_url();?>index.php/Product/get_front_nack_blouse',
data: {sid:sid},
success: function(response){
console.log(response);
$("#font_nack_line_blouse").html(response);
$("#font_nack_line_blouse2").html(response);
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
  $("#mcat").change(function(e){
    var mcat=$(this).val();
    window.location.href="<?php echo base_url();?>index.php/Product/styles/"+mcat;
  });
  $(".addstyle").submit(function(e){e.preventDefault();
    //var formdata=$(this).serialize();
    var id=$(this).attr("id");
   // alert(id);
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
                //console.log(data);
                //alert('Updated Successfully');
                alertify.success('Added Successfully');
            //$("#mbox").val('');$("#file").val('');
              //$("#mypost").val('');

              //$("tr.trr"+id).after(data);
              },
              error: function(data)
              {
                //console.log(data);
                alertify.success('Added Successfully');
              }
              });


  });
  function openInNewTab(url) {
var win = window.open(url, '_blank');
win.focus();
}

 $('#ajax_table').ready(function () {
    $('#loadingMessage').css('display', 'none');
});
$('#ajax_table').load(function () {
    $('#loadingMessage').css('display', 'none');
});

$(".paginate_button_real2").click(function(){
    var id = $(this).attr("id");

    var id=id.split("o");
    //alert(id);
    var page_no = id[0];
    $(".paginate_button_real2").css("display","none");
    var page = page_no-1;
    $(".but"+page).css("display","inline");
    page = page_no;

    $(".but"+page).css("display","inline");
    page = parseInt(page_no)+2;
    //alert(page);
    $(".but"+page).css("display","inline");
    page = parseInt(page_no)+3;
    //alert(page);
    $(".but"+page).css("display","inline");
    page = parseInt(page_no)+4;

    $(".but"+page).css("display","inline");
    var id = id[1];
    var segment_data = <?php echo $this->uri->segment(3); ?>;
    //alert(id);
    //var page_no = id[0];
    //alert(page_no);
    var name =$(this).attr("href");
    var id_name = 'ajax_table'+id;
    //alert('#ajax_table'+id[1]);
    url = "<?php echo base_url();?>index.php/Product/style_table_ajax?id="+id+"&name="+name+"&page_no="+page_no+"&segment_data="+segment_data;
  //$(id_name).attr('src',url);

  //alert(url);

  document.getElementById(id_name).src = url;


});

    $(".tabs_id").click(function(){
    //var formdata=$(this).serialize();
    var id=$(this).attr("href");
    var name=$(this).attr("id");
    var id=id.split("o");
   // alert(id);

var segment_data = <?php echo $this->uri->segment(3); ?>;
   


    url = "<?php echo base_url();?>index.php/Product/style_table_ajax?id="+id[1]+"&name="+name+"&segment_data="+segment_data;
    //alert(url);
//  $("#ajax_table").src(url);
  //document.getElementById('ajax_table'+id[1]).src = 'https://s-media-cache-ak0.pinimg.com/originals/aa/51/bd/aa51bd72926e11f7006369f6d211a668.gif';
  document.getElementById('ajax_table'+id[1]).src = url;
//openInNewTab(url);
    //alert(id[1]);
      //var formdata=$(this).serialize();alert(formdata);
               // e.preventDefault();

                /*$.ajax({
              type: "POST",
              url: "<?php //echo base_url();?>index.php/Product/style_table_ajax",
              data: {"id":id[1],"name":name}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
              //contentType: false,       // The content type used when sending data to the server.
              cache: false,             // To unable request pages to be cached
              //processData:false,        // To send DOMDocument or non processed data file it is set to falsecache: false,             // To unable request pages to be cached
              success: function(response)   // A function to be called if request succeeds
              {
                console.log(response);
              //  alert('Updated Successfully');
            //$("#mbox").val('');$("#file").val('');
          //  var ajax_data = '<table id="imageTable" class="table table-striped table-bordered" cellspacing="0" width="100%">';
            //ajax_data +=response;
//ajax_data +='</table>';
            //console.log(ajax_data);

              $("#ajax_table").html(response);
              //$("tr.trr"+id).after(data);
              }
            });*/


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
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/dataTables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        "use strict";

        $('#imageTable').dataTable();
        $('#imageTable2').dataTable();
    } );
</script>
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
      $( '#imageTable2 tbody' ).children().each(function() {
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
<script>
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
</html>
