<?php //print_r($_SESSION); ?>
<style type="text/css">
.imm5
{
  height: 270px;
}
.imm6{
  height: 360px;
}
@media only screen and (max-device-width: 736px) and (min-device-width: 412px) and (orientation: portrait){
  .imm5{
    height: 300px !important;
  }
.imm6
  {
    height: 280px !important;
  }}
@media (max-width: 411px){
  .imm6
  {
    height: 245px;
  }
.imm5
  {
    height: 270px !important;
  }


}
 @media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
  .imm6{
    height: 325px !important;
  }
  .imm5
{
  height:330px;
}
  }
</style>

<?php
ini_set('memory_limit','-1');
$this->load->library('session');
     ?>


<script>
jq("#dyna_heading").html("<?php echo $attr->attr_name;?>")
  <?php
if($attr->attr_name=='Add Ons'){
  ?>
jq("#simple_text").html("Please select atleast one item from each section.")
  <?php
}else{
  ?>
jq("#simple_text").html("You have to select atleast one from below.")
  <?php
} ?>


function enablenext(){
  jq(".nextstep").removeAttr("disabled");


}


function enablenext_addon(){
  //alert('k');
  var vari = new Array();
 <?php $sty1=$this->db->get_where("make_addon",array("addon_page_id"=>$attr->aid))->result();
           $i =1;
              foreach($sty1 as $sty1){
                $sty2=$this->db->get_where("addons",array("add_on_parent"=>$sty1->id))->result();
                foreach($sty2 as $sty){?>
  vari[<?php echo $i; ?>] = jq(".product-preview-wrapper<?php echo $i; ?>").hasClass("mark_a<?php echo $i+1; ?>");
  <?php }$i++;}
  ?>//console.log(vari[1]+' '+vari[2]+' '+vari[3]+' '+vari[4]);
  //if(vari[1])
  //document.getElementById("demo").innerHTML = vari;
 //alert(vari.length);
 var j=1;

for (var i = vari.length - 1; i > 0; i--) {
  console.log(vari[i]);
  if(vari[i]==true)
  {
    j++;
    //console.log(j);
  }
  if(j==vari.length - 1)
  {
    //alert('in');
    jq(".nextstep").removeAttr("disabled");
  }
}

  <?php /*$sty1=$this->db->get_where("make_addon",array("addon_page_id"=>$attr->aid))->result();
  $j=1; echo "if(";
  foreach($sty1 as $sty1){
                $sty2=$this->db->get_where("addons",array("add_on_parent"=>$sty1->id))->result();
                foreach($sty2 as $sty){?>
  <?php echo 'vari'.$i.'&&'; ?>
  <?php }$j++;} echo "){
    alert('done');
  }"*/?>

  /*if(var1 && var2 && var3 && var4)
  {
    alert('done');
  }*/
  //alert(var1);

  //jq(".nextstep").removeAttr("disabled");
 // console.log('kkk');

}
function kkk(str)
{
//alert('session set2');
   jq(".nextstep").removeAttr("disabled");
   jq.ajax({
         type: "POST",
         url: '<?php echo base_url();?>index.php/Welcome/show_fabric',
         data: {m_id:str},
         success: function(response){
         // alert('session set');
           }
         });
}
function setsession2(str)
{
   jq(".nextstep").removeAttr("disabled");
   str = str.split('_');
   jq.ajax({
         type: "POST",
         url: '<?php echo base_url();?>index.php/Welcome/setsession',
         data: {a_id:str[1],id:str[0]},
         success: function(response){
         // console.log(response);
           }
         });
}
function setsession_addon(str)
{
   jq(".nextstep").removeAttr("disabled");
   str = str.split('_');
   jq.ajax({
         type: "POST",
         url: '<?php echo base_url();?>index.php/Welcome/setsession_addon',
         data: {id:str[1],a_id:str[0]},
         success: function(response){
          //console.log(response);
           }
         });
}

function kkk1(str)
{
   jq(".nextstep").removeAttr("disabled");
   jq.ajax({
         type: "POST",
         url: '<?php echo base_url();?>index.php/Welcome/show_fabric',
         data: {m_id1:str},
         success: function(response){

           }
         });
}

function kkk2(str)
{
   jq(".nextstep").removeAttr("disabled");
   jq.ajax({
         type: "POST",
         url: '<?php echo base_url();?>index.php/Welcome/show_fabric',
         data: {m_id2:str},
         success: function(response){

           }
         });
}
function kkk3(str)
{
   jq(".nextstep").removeAttr("disabled");
   jq.ajax({
         type: "POST",
         url: '<?php echo base_url();?>index.php/Welcome/show_fabric',
         data: {m_id3:str},
         success: function(response){

           }
         });
}

</script>

<div class="row">
<!--p id="demo"></p-->
<h4 class="text-warning" style="margin:5px;"></h4>
         <?php

         $sty=$this->db->get_where("style",array("attr_id"=>$attr->aid))->result();
//////////////////


//////////////////
        // echo $attr->attr_name;
        if($attr->attr_name=="Add Ons"){?>

            <?php
            $i = 1;
            $j = 1;
            //echo $attr->aid;
            $this->db->order_by("id", "asc");
            $sty1=$this->db->get_where("make_addon",array("addon_page_id"=>$attr->aid))->result();

?>
<?php
              foreach($sty1 as $sty1){
                //print_r($sty1);
                ?> <div class="row">
                <h3 class="text-warning"
                style="
                margin-left:25px; text-align:left;
    padding-top: 10px;

    margin-bottom: 20px;
    padding-bottom:10px;
    padding-left: 10px;
background-color: rgba(0, 0, 0, 0.06);
"
><?php echo $sty1->add_on_name ?></h3> <?php
                              $this->db->order_by("id asc");

                $sty2=$this->db->get_where("addons",array("add_on_parent"=>$sty1->id,"status"=>'enable'))->result();

                foreach($sty2 as $sty){
                  $sess = $attr->aid.$i."_".$sty->id;
                  $sess2 = 'addon'.$attr->aid.$i;
            ?>

           <div onclick='enablenext_addon();'

           <?php if(isset($_SESSION["$sess2"]) && $sty->id==$_SESSION["$sess2"]){
              echo "class='product-preview-wrapper".$i." col-md-2 col-sm-4 col-xs-6 imm5 mark_a".$i."'";
            }else{
               echo "class='product-preview-wrapper".$i." col-md-2 col-sm-4 col-xs-6 imm5 '";
              } ?>
               id="<?php echo $sty->id;?>" href="1050<?php echo $i;?>">

          <div class="product-category hover-squared">
          <?php if(isset($sty->add_on_image) && !empty($sty->add_on_image)){ ?>
                  <img src="<?php echo base_url();?>adminassets/styles/resized/large/<?php echo $sty->add_on_image;?>" width="100%" alt=""/>
                  <?php }else{ ?>
                  <img src="<?php echo base_url();?>assets/images/online_boutique/cover.jpg" width="100%" style="height:160px;" alt=""/>
                  <?php } ?></div>
                  <div class="products-widget__item__info">
                    <div class="products-widget__item__info__title">
                      <h2 class="text-uppercase" style="font-weight:600;"><?php echo $sty->add_on_name;?></h2><br />
                    </div>
                    <!--<div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>-->
                    <div class="price-box"><i class="fa fa-inr"></i> <?php echo $sty->add_on_price;?>/-</div>
                  </div>
                   <?php if(isset($_SESSION["$sess2"]) && $sty->id==$_SESSION["$sess2"]){
              echo "<div class='selected2'>Selected</div>";
            }
            ?>
                </div>

                <?php
                 $j++; }echo "</div>";$i++;}
?>

              <?php

       }



              else{
                 //print_r($_SESSION);
                  //echo $attr->attr_name;

                if($attr->attr_name=="Front Neckline"){
                  // print_r($_SESSION);
               //echo $_SESSION['m_id'];
                  //echo " i am in loop";
                  //echo $_SESSION['m_id'];
                  //print_r($_SESSION['m_id1']);
               $sty_f=$this->db->get_where("style",array("attr_id"=>$attr->aid,"front_id"=>$_SESSION['m_id']))->result();
               //print_r($sty_f);
              // echo "kkk";

               if(isset($sty_f))
                {
                  foreach($sty_f as $sty_f){
                      //echo "in for ec";
                 ?>

           <div onclick="kkk1(<?php echo $sty_f->id;?>)"
            <?php
           if(isset($_SESSION['m_id1']) && $sty_f->id==$_SESSION['m_id1']){
              echo 'class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6 imm6 mark1"';
            }else{
               echo 'class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6 imm6"';
              }  ?>

               id="<?php echo $sty_f->id;?>" href="<?php echo $attr->aid;?>"  >


          <div class="product-category ">
                  <img  src="<?php echo base_url();?>adminassets/styles/resized/large/<?php echo $sty_f->thumb_front;?>"  alt="" /></div>
                  <div class="products-widget__item__info">
                    <div class="products-widget__item__info__title">
                      <h2 class="text-uppercase" style="font-weight:600;"><?php echo $sty_f->style;?></h2><br />
                    </div>
                    <!--<div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>-->
                    <div class="price-box"><i class="fa fa-inr"></i> <?php echo $sty_f->sprice;?>/-</div>
                  </div>
                  <?php
           if(isset($_SESSION['m_id1']) && $sty_f->id==$_SESSION['m_id1']){

              echo "<div class='selected2'>Selected</div>";
            } ?>
                </div>


                <?php
                 }
                }
              }
              else if($attr->attr_name=="Back Neckline")
              { //print_r($_SESSION);
                //echo $_SESSION['m_id1'];
                //print_r($_SESSION['m_id2']);
              //  $this->db->limit(5);
                $sty_b=$this->db->get_where("style",array("attr_id"=>$attr->aid,"back_id"=>$_SESSION['m_id1']))->result();
                //print_r($sty_b);
                 if(isset($sty_b))
                {
                  foreach($sty_b as $sty_b){
                     // echo "in for ec";
                 ?>

           <div onclick="kkk2(<?php echo $sty_b->id;?>)"
           <?php
           if(isset($_SESSION['m_id2']) && $sty_b->id==$_SESSION['m_id2']){
              echo 'class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6 imm6 mark1"';
            }else{
               echo 'class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6 imm6"';
              }  ?>
             id="<?php echo $sty_b->id;?>"

            href="<?php echo $attr->aid;?>" >

          <div class="product-category hover-squared">
                  <img  src="<?php echo base_url();?>adminassets/styles/resized/large/<?php echo $sty_b->thumb_front;?>" alt=""/></div>
                  <div class="products-widget__item__info">
                    <div class="products-widget__item__info__title">
                      <h2 class="text-uppercase" style="font-weight:600;"><?php echo $sty_b->style;?></h2><br />
                    </div>
                    <!--<div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>-->
                    <div class="price-box"><i class="fa fa-inr"></i> <?php echo $sty_b->sprice;?>/-</div>
                  </div>
                  <?php
           if(isset($_SESSION['m_id2']) && $sty_b->id==$_SESSION['m_id2']){

              echo "<div class='selected2'>Selected</div>";
            } ?>

                </div>

                <?php
                 }}
              }
              else if($attr->attr_name=="Sleeves")
              {
 //print_r($_SESSION);
                //echo $_SESSION['m_id2'];
                //$this->db->limit(5);
                $sty_s=$this->db->get_where("style",array("attr_id"=>$attr->aid,"sleeve_id"=>$_SESSION['m_id2']))->result();
               // print_r($sty_s);
                  if(isset($sty_s))
                {
                  foreach($sty_s as $sty_s){
                     // echo "in for ec";
                 ?>

           <div onclick="kkk3(<?php echo $sty_s->id;?>)"
            <?php
           if(isset($_SESSION['m_id3']) && $sty_s->id==$_SESSION['m_id3']){
              echo 'class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6 imm6 mark1"';
            }else{
               echo 'class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6 imm6"';
              }  ?>

               id="<?php echo $sty_s->id;?>" href="<?php echo $attr->aid;?>" >

          <div class="product-category hover-squared">
                  <img  src="<?php echo base_url();?>adminassets/styles/resized/large/<?php echo $sty_s->thumb_front;?>"  alt=""/></div>
                  <div class="products-widget__item__info">
                    <div class="products-widget__item__info__title">
                      <h2 class="text-uppercase" style="font-weight:600;"><?php echo $sty_s->style;?></h2><br />
                    </div>
                    <!--<div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>-->
                    <div class="price-box"><i class="fa fa-inr"></i> <?php echo $sty_s->sprice;?>/-</div>
                  </div>
                     <?php
           if(isset($_SESSION['m_id3']) && $sty_s->id==$_SESSION['m_id3']){

              echo "<div class='selected2'>Selected</div>";
            } ?>
                </div>

                <?php
                 }}

              }
              else
              {
               //print_r($_SESSION['m_id']);
               // echo $attr->aid;
                $sty=$this->db->get_where("style",array("attr_id"=>$attr->aid,"status"=>'enable'))->result();


              if(isset($sty))
                {
                  foreach($sty as $sty){

                 ?>

           <div onclick='kkk("<?php echo $sty->id; ?>"); '
           <?php
           $aid = 'stitch'.$attr->aid;

           if(isset($_SESSION['m_id']) && $sty->id==$_SESSION['m_id']){
              echo 'class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6 imm6 mark1"';
            }else if(isset($_SESSION["$aid"]) && $sty->id==$_SESSION["$aid"]){
               echo 'class="product-preview-wrapper col-md-3 col-sm-4 imm6 mark1"';
              }else{
                echo 'class="product-preview-wrapper col-md-3 col-sm-4 col-xs-6 imm6"';
                }  ?>

 id="<?php echo $sty->id;?>" href="<?php echo $attr->aid;?>" >

          <div class="product-category hover-squared">
          <?php $sty_all = $sty->id.'_'.$attr->aid; ?>
                  <img  onclick='setsession2("<?php echo $sty_all; ?>");' src="<?php echo base_url();?>adminassets/styles/resized/large/<?php echo $sty->thumb_front;?>"  alt="" style="
    width: 100%;
"/></div>
                  <div class="products-widget__item__info">
                    <div class="products-widget__item__info__title">
                      <h2 class="text-uppercase" style="font-weight:600; color:#000;"><?php echo $sty->style;?></h2><br />
                    </div>
                    <!--<div class="rating"><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></div>-->
                    <div class="price-box"><i class="fa fa-inr"></i> <?php echo $sty->sprice;?>/-</div>
                  </div>
                 <?php
           if(isset($_SESSION['m_id']) && $sty->id==$_SESSION['m_id']){

              echo "<div class='selected2'>Selected</div>";
            }else if(isset($_SESSION["$aid"]) && $sty->id==$_SESSION["$aid"]){
               echo "<div class='selected2'>Selected</div>";
              } ?>
                </div>

                <?php
                 }}}}?>




    <script>
    jq("div").click(function() {

            if ( jq(this).hasClass( "mark1" ) ) {
              jq(".nextstep").removeAttr("disabled");
              //alert('kkk');
          }

        });

        jq('.mark1').each(
        function(){
         jq(".nextstep").removeAttr("disabled");
          //alert('yes');
        //jq(".product-preview-wrapper").removeClass("mark1");
        //jq(this).closest("div.product-preview-wrapper").addClass("mark1");

        //jq(".selected2").remove();
        //jq(".mark1").append("<div class='selected2'>Selected</div>");
        //jq(".product-preview-wrapper.selected").css("display","none");
        //jq(this).closest("div.product-preview-wrapper.selected").css("display","inline");
        var sid=jq(this).attr("id");//alert(sid);
        //window.history.pushState("string", "Title", +sid);
        //history.pushState(null, null, "<?php //echo base_url('index.php/Welcome/custom'); ?>"+"/"+sid);
        var ssid=jq(this).attr("href");//alert(ssid);
        var stid="#st"+ssid;
        var sstid="#sttt"+ssid;//alert(stid);
        jq("div.addons").show();
        jq(sstid).val(sid);
        jq.ajax({
         type: "POST",
         url: '<?php echo base_url();?>index.php/Welcome/access',
         data: {"sid":sid},
         success: function(response){
          //alert(response);
          //console.log(stid);
           jq(stid).html(response);

           }
         });
        });

                jq('.mark1').each(
        function(){
         jq(".nextstep").removeAttr("disabled");
          //alert('yes');
        //jq(".product-preview-wrapper").removeClass("mark1");
        //jq(this).closest("div.product-preview-wrapper").addClass("mark1");

        //jq(".selected2").remove();
        //jq(".mark1").append("<div class='selected2'>Selected</div>");
        //jq(".product-preview-wrapper.selected").css("display","none");
        //jq(this).closest("div.product-preview-wrapper.selected").css("display","inline");
        var sid=jq(this).attr("id");//alert(sid);
        //window.history.pushState("string", "Title", +sid);
        //history.pushState(null, null, "<?php //echo base_url('index.php/Welcome/custom'); ?>"+"/"+sid);
        var ssid=jq(this).attr("href");//alert(ssid);
        var stid="#st"+ssid;
        var sstid="#sttt"+ssid;//alert(stid);
        jq("div.addons").show();
        jq(sstid).val(sid);
        jq.ajax({
         type: "POST",
         url: '<?php echo base_url();?>index.php/Welcome/access',
         data: {"sid":sid},
         success: function(response){
          //alert(response);
          //console.log(stid);
           jq(stid).html(response);

           }
         });
        });

        jq(".product-preview-wrapper").click(function(e){
          e.preventDefault();
          //console.log('yes');
        jq(".product-preview-wrapper").removeClass("mark1");
        jq(this).closest("div.product-preview-wrapper").addClass("mark1");

        jq(".selected2").remove();
        jq(".mark1").append("<div class='selected2'>Selected</div>");
        //jq(".product-preview-wrapper.selected").css("display","none");
        //jq(this).closest("div.product-preview-wrapper.selected").css("display","inline");
        var sid=jq(this).attr("id");//alert(sid);
        //window.history.pushState("string", "Title", +sid);
        //history.pushState(null, null, "<?php //echo base_url('index.php/Welcome/custom'); ?>"+"/"+sid);
        //jq(".nextstep").removeAttr("disabled");
        var ssid=jq(this).attr("href");//alert(ssid);
        var stid="#st"+ssid;
        var sstid="#sttt"+ssid;//alert(stid);
        jq("div.addons").show();
        jq(sstid).val(sid);
        jq.ajax({
         type: "POST",
         url: '<?php echo base_url();?>index.php/Welcome/access',
         data: {"sid":sid},
         success: function(response){
          //alert(response);
          //console.log(stid);
           jq(stid).html(response);

           }
         });
      });
    </script>


<?php for ($i=1; $i < 11; $i++) {
  ?>
    <script>
        jq(".product-preview-wrapper<?php echo $i;?>").click(function(e){e.preventDefault();
           e.preventDefault();
          //console.log('yes');

        jq(".product-preview-wrapper<?php echo $i;?>").removeClass("mark_a<?php echo $i+1;?>");
        jq(this).closest("div.product-preview-wrapper<?php echo $i;?>").addClass("mark_a<?php echo $i+1;?>");

        jq(".product-preview-wrapper<?php echo $i;?> .selected2").remove();
        jq(".mark_a<?php echo $i+1;?>").append("<div class='selected2'>Selected</div>");


        var sid<?php echo $i;?>=jq(this).attr("id");//alert(sid1);
        //window.history.pushState("string", "Title", +sid);
        //history.pushState(null, null, "<?php echo base_url('index.php/Welcome/custom'); ?>"+"/"+sid);
        var ssid<?php echo $i;?>=jq(this).attr("href");//alert(ssid1);
        var stid<?php echo $i;?>="#st"+ssid<?php echo $i;?>;
        var sstid<?php echo $i;?>="#sttt"+ssid<?php echo $i;?>;//alert(stid);
        jq("div.addons").show();
        jq(sstid<?php echo $i;?>).val(sid<?php echo $i;?>);
        jq.ajax({
         type: "POST",
         url: '<?php echo base_url();?>index.php/Welcome/access_for_addons',
         data: {"sid":sid<?php echo $i;?>},
         success: function(response){
          //alert(response);
           jq(stid<?php echo $i;?>).html(response);
           //alert(stid);

           }
         });
      });
    </script>
     <style type="text/css">
      .mark_a<?php echo $i+1;?>{


      }
      </style>
  <?php } ?>
  <style type="text/css">

    .selected{
      background-color:#3373c8;
      color:#fff;
      padding:2%;
      //width: 25%;
      //margin:20%;
      //position: relative;

    }
  </style>
