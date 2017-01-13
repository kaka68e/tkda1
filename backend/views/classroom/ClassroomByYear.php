<option value="">- Chọn lớp học ---</option>
<?php 
    foreach ($data as $key => $value) :
 ?>
  <option value="<?php echo $key ?>"><?php echo $value ?></option>
<?php 
    endforeach;
 ?>