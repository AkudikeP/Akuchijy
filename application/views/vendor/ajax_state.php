<div class="form-group">
  <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> State </span> </label>
  <div class="col-lg-8">
    <div class="row mgbt-xs-0">
      <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
        <select id="state_id" name="state" required>
        <option value="">Select State</option>
        <?php
          foreach($field_cat as $cat){?>
          <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
          <?php }?>
       </select>
      </div>
      <!-- col-lg-9 --> 
    </div>
  </div>
</div>