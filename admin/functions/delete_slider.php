<?php
include "../classes/db.class.php";
include "../classes/product.class.php";
$products = new products();
if(isset($_GET['id'])){
    $id =$_GET['id'];
    $products->delSlider($id);
    echo '<script>
window.location.href = "../slider-all.php";
</script>';
}