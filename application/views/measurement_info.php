<style type="text/css">
table, td, th {
    border: 1px solid rgba(88, 78, 78, 0.27);
    text-align: center;
}
.table-bordered > tbody > tr > td{
  border-color: rgba(23, 11, 11, 0.58);
}
.sizes-example-1{
  /*width: 400px;*/
  height: 400px;
}

.table thead > tr, .table tbody > tr{
  border-top:1px solid  rgba(23, 11, 11, 0.58);
}
.nav-tabs--wd>li>a {
    padding: 10px 7px 10px;
}
.nav-tabs--wd > li.active > a, .nav-tabs--wd > li.active > a:hover, .nav-tabs--wd > li.active > a:focus {
    padding: 10px 7px 10px;
}
.btn-bck{
height: 35px;
line-height: 0.7em;
}
</style>

  <div id="pageContent">

    <!-- Breadcrumb section -->

    <!--section class="breadcrumbs breadcrumbs-boxed">
      <div class="container">
        <ol class="breadcrumb breadcrumb--wd pull-left">
          <li><a href="#">Home</a></li>

        </ol>

      </div>
    </section-->


    <section class="content content--fill">
      <div class="container">

        <div class="container">

            <ol class="breadcrumb breadcrumb--wd pull-left" style="margin:0">
              <li><a href="<?=base_url();?>" style="color: #000;">Home</a></li>
                    <li><a href="<?php echo base_url() ?>measurement-guide" style="color: #000;">Measurement Guide</a></li>
          <li><a href="<?php echo current_url(); ?>" style="color: #000;"><?php echo ucwords($this->uri->segment(2)); ?></a></li>

            </ol>

            <div class="pull-right">
            <a href="javascript:history.back()"><button class="btn btn--wd btn-bck text-uppercase wave waves-effect">Back</button></a>
            </div>

          </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabs--wd" role="tablist">
          <?php $i=1;
          $this->db->where("mid",$this->uri->segment(3));
          $this->db->order_by("cid", "asc");
          $ca2 = $ca=$this->db->get_where("category",array('status'=>'enable'))->result();
          foreach ($ca as $value) {
  ?>

          <!--li><a href="#Tab2" role="tab" data-toggle="tab" class="text-uppercase">Blouse</a></li>
          <li><a href="#Tab3" role="tab" data-toggle="tab" class="text-uppercase">Petticoat</a></li>
          <li><a href="#Tab4" role="tab" data-toggle="tab" class="text-uppercase">Lehnga</a></li>
          <li><a href="#Tab5" role="tab" data-toggle="tab" class="text-uppercase">Fusion</a></li>
          <li><a href="#Tab5" role="tab" data-toggle="tab" class="text-uppercase">Western Dress</a></li>
          <li><a href="#Tab5" role="tab" data-toggle="tab" class="text-uppercase">Top/Shirt</a></li>
          <li><a href="#Tab5" role="tab" data-toggle="tab" class="text-uppercase">Bottom</a></li-->
          <?php if($i==1){ ?>
          <li class="active"><a href="#Tab1" aria-controls="home" role="tab" data-toggle="tab" class="text-uppercase"><?php echo $value->cat_name ?></a></li>
          <?php }else{ ?>
          <li><a href="#Tab<?php echo $i; ?>" role="tab" data-toggle="tab" class="text-uppercase"><?php echo $value->cat_name ?></a></li>
          <?php } $i++; } ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content tab-content--wd">
          <!--tabs-->
          <?php $i=1; foreach ($ca2 as $key) {

           ?>
          <div role="tabpanel" class="tab-pane <?php if($i==1){echo 'active'; } ?>" id="Tab<?php echo $i; ?>" >

            <div class="divider divider--xs"></div>
            <h5 class="text-uppercase" align="center"><strong><?php echo $key->cat_name ?> Measurement Guide</strong></h5>
            <div class="divider divider--xs"></div>
            <div class="table-responsive">
              <div class="col-md-7">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td>No.</td>
                  <td>Measurement</td>
                  <td>How to measure </td>

                </tr>
  <?php $j=1;
  $this->db->order_by('number','asc');
   $mea_tbl=$this->db->get_where("measurment_table",array("cid"=>$key->cid))->result();
  foreach ($mea_tbl as $value) {

   ?>
                    <tr>
                  <td><?php echo $j; ?></td>
                  <td><?php echo $value->name; ?></td>
                  <td><?php echo $value->how_to_measure; ?></td>

                </tr>

        <?php $j++; } ?>


              </tbody>
            </table>
            </div>
            <div class="col-md-5">
              <div class="sizes-example-1" align="center">
                <?php $mea_img=$this->db->get_where("measurementinfo_image",array("cat_id"=>$key->cid))->row(); ?>
            <img src="<?php echo base_url(); ?>assets/images/measurementinfo_image/<?php echo $mea_img->image; ?>" height="100%" style="max-width:100%;">

            </div>
            </div>
            </div>
          </div>
<?php $i++; } ?>
          <!--tabs-->
          <!--div role="tabpanel" class="tab-pane" id="Tab2">

            <div class="divider divider--xs"></div>
            <h5 class="text-uppercase" align="center"><strong>Kurti Measurement Guide</strong></h5>
            <div class="divider divider--xs"></div>
            <div class="table-responsive">
              <div class="col-md-7">
            <table class="table table-striped table-bordered">


              <tbody>
                <tr>
                  <td>No.</th>
                  <td>Measurement</th>
                  <td>How to measure </th>

                </tr>

                    <tr>
                  <td>1</td>
                  <td>Kurti Length </td>
                  <td>Measure from the front of your body, from the shoulder down to required length.</td>

                </tr>
                <tr>
                  <td>2</td>
                  <td>Shoulder </td>
                  <td>Measure from the back of your body, from the shoulder down to required length.</td>

                </tr>
                <tr>
                  <td>3</td>
                  <td>Waist Length</td>
                  <td>Measure from the back of your body, from the shoulder down to your waist</td>

                </tr>
                <tr>
                  <td>4</td>
                  <td>Shoulder </td>
                  <td>Measure from the back of your body, from the shoulder down to required length.</td>

                </tr>
                <tr>
                  <td>2</td>
                  <td>Shoulder </td>
                  <td>Measure from the back of your body, from the shoulder down to required length.</td>

                </tr>

              </tbody>
            </table>
            </div>
            <div class="col-md-5">
              <div class="sizes-example-1" align="center">
            <img src="<?php echo base_url(); ?>assets/images/kurtimeasurement.jpg" width="100%" height="100%">
            </div>
            </div>
            </div>
          </div-->
          <!--div role="tabpanel" class="tab-pane" id="Tab3">
            <h6><strong>OTHER PEOPLE MARKED THIS PRODUCT WITH THESE TAGS:</strong></h6>
            <p class="color-light">Pattern (1)</p>
            <div class="divider divider--xs"></div>
            <p class="text-uppercase">Add Your Tags:</p>
            <form action="#" class="contact-form">
              <input type="text" class="input--wd input--wd--full">
              <p class="color-light">Use spaces to separate tags. Use single quotes (') for phrases.</p>
              <div class="divider divider--xs"></div>
              <button type="submit" class="btn btn--wd text-uppercase wave">Add Tags</button>
            </form>
          </div-->
          <!--div role="tabpanel" class="tab-pane" id="Tab4">
            <h6><strong>Lorem ipsum dolor sit amet conse ctetur adipisicing elit</strong></h6>
            <div class="divider divider--xs"></div>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, sollicitudin eu, vehicula venenatis, tempor vitae, est. Praesent vitae dui. Morbi id tellus. Nullam ac nisi non eros gravida venenatis. Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem. Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi. Curabitur molestie euismod erat. Proin eros odio, mattis rutrum, pulvinar et, egestas vitae, magna. Integer semper, velit ut nisl. Nam lectus nulla, bibendum pretium, dictum a, mattis nec, dolor. Nullam id justo sed diam aliquam tincidunt. </p>
            <div class="row">
              <div class="col-sm-6">
                <ul class="simple-list">
                  <li>Lorem ipsum dolor amet</li>
                  <li>Consectetur adipiscing elit </li>
                  <li>Integer molestie lorem massa </li>
                  <li>Facilisis in pretium nisl aliquet</li>
                </ul>
                <div class="divider divider--xs visible-sm visible-xs"></div>
              </div>
              <div class="col-sm-6">
                <ul class="simple-list">
                  <li>Lorem ipsum dolor amet</li>
                  <li>Consectetur adipiscing elit </li>
                  <li>Integer molestie lorem massa </li>
                  <li>Facilisis in pretium nisl aliquet </li>
                </ul>
              </div>
            </div>
          </div-->
          <!--div role="tabpanel" class="tab-pane" id="Tab5">
            <h6 class="text-uppercase"><strong>Clothing - Single Size Conversion (Continued)</strong></h6>
            <div class="divider divider--xs"></div>
            <div class="table-responsive">
              <table class="table table-params">
                <tbody>
                  <tr>
                    <td class="text-right"><strong>UK</strong></td>
                    <td><ul class="sizes-row">
                        <li>18</li>
                        <li>20</li>
                        <li>22</li>
                        <li>24</li>
                        <li>26</li>
                      </ul></td>
                  </tr>
                  <tr>
                    <td class="text-right"><strong>European</strong></td>
                    <td><ul class="sizes-row">
                        <li>46</li>
                        <li>48</li>
                        <li>50</li>
                        <li>52</li>
                        <li>54</li>
                      </ul></td>
                  </tr>
                  <tr>
                    <td class="text-right"><strong>US</strong></td>
                    <td><ul class="sizes-row">
                        <li>14</li>
                        <li>16</li>
                        <li>18</li>
                        <li>20</li>
                        <li>22</li>
                      </ul></td>
                  </tr>
                  <tr>
                    <td class="text-right"><strong>Australia</strong></td>
                    <td><ul class="sizes-row">
                        <li>8</li>
                        <li>10</li>
                        <li>12</li>
                        <li>14</li>
                        <li>16</li>
                      </ul></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div-->
        </div>
      </div>
    </section>

    <!-- End Content section -->
  </div>
<script type="text/javascript">
$(document).ready(function(){
  $('li:first').addClass('active');
});

</script>
