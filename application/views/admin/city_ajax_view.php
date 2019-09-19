<div class="form-group">
  <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> City </span> </label>
  <div class="col-lg-8">
    <div class="row mgbt-xs-0">
      <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
        <select id="city_id" name="city_name" required>
        <option value="">Select City</option>
        <?php
          foreach($city as $city){?>
          <option value="<?php echo $city['id'];?>"><?php echo $city['name'];?></option>
          <?php }?>
       </select>
      </div>
      <!-- col-lg-9 --> 
    </div>
  </div>
</div>