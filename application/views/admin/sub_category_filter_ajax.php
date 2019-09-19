<div class="form-group">
  <label class="col-sm-3 control-label">Select Filter Title</label>
  <div class="col-sm-9 controls">
   <select class="form-control" name="sub_category_id" required>
    <option value="">Select </option>
  <?php
    foreach($field_cat as $cat){?>
    <option value="<?php echo $cat['fid'];?>"><?php echo $cat['filter_category'];?></option>
    <?php }?>
    </select>
    </div>
</div>

