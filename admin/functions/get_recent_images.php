<div class="col-md-12">
<hr>
  <h3>Recent Products</h3>
  <?php
  include_once "classes/db.class.php";
  include_once "classes/product.class.php";
  $products =  new products();
  $Proimages = $products->getRecentProImages();
  foreach($Proimages as $row){
  ?>

  <div class="col-md-3">
    <img src="functions/<?php echo $row->cvr_img;?>" alt="" height="150px" style="max-width:100%;">
  </div>
  <?php }?>

</div>
<hr>
<br>
<br>