<?php
include "../classes/db.class.php";
include "../classes/product.class.php";
$products = new products();
if(isset($_GET['id'])){
    $id =$_GET['id'];
    $products->delAllDetails($id);
    echo '<script>
window.location.href = "../product-all.php";
</script>';
}