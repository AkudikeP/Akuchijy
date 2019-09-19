<div class="form-group">
  <label for="man_1" class="control-label col-lg-3"> <span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="Product Manufactures">Sub Category </span> </label>
  <div class="col-lg-8">
    <div class="row mgbt-xs-0">
      <div class="col-lg-5  mgbt-xs-10 mgbt-lg-0">
        <select id="man_1" name="sub_category" required>
        <option value="">Select Sub Category</option>
        <?php
          foreach($field_cat as $cat){?>
          <option value="<?php echo $cat['ascid'];?>"><?php echo $cat['accessories_subcategory_name'];?></option>
          <?php }?>
       </select>
      </div>
      <!-- col-lg-9 --> 
    </div>
  </div>
</div>