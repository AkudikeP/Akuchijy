
        <select id="city_id" name="city" class="input--wd input--wd--full" required>
        <option value="">Select City</option>
        <?php
          foreach($city as $city){?>
          <option value="<?php echo $city['id'];?>"><?php echo $city['name'];?></option>
          <?php }?>
       </select>
