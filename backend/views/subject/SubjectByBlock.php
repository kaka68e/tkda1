<option value="">--- Chọn môn học ---</option>
<?php 
    foreach ($data as $key => $value) :
 ?>
  <option value="<?php echo $key ?>">Mã:<?php echo $key.' - '.$value ?></option>
<?php 
    endforeach;
 ?>