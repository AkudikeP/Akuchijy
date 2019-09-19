        <select id="state_id" name="state" class="input--wd input--wd--full" required>
        <option value="">Select State</option>
        <?php

          foreach($field_cat as $cat){?>
          <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
          <?php }?>
       </select>
