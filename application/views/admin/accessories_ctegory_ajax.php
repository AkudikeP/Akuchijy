<div class="form-group">
  <label for="manufactures_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures"> Category </span> </label>
  <div class="col-lg-8">
    <div class="row mgbt-xs-0">
      <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
        <select id="sub_cat_acc" name="category" required>
        <option value="">Select Category</option>
        <?php
          foreach($field_cat as $cat){?>
          <option value="<?php echo $cat['acid'];?>"><?php echo $cat['category_name'];?></option>
          <?php }?>
       </select>
      </div>
      <!-- col-lg-9 --> 
    </div>
  </div>
</div>