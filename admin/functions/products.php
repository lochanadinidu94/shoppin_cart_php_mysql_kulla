<?php

include_once '../classes/db.class.php';
include_once '../classes/product.class.php';

$products = new products();

if (isset($_POST['product_title'])) {
    $category = $_POST['category'];
    $pro_type = $_POST['pro_type'];
    $title = $_POST['product_title'];
    $stitle = $_POST['sproduct_title'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $show = $_POST['show_home_page'];
    $description = $_POST['product_description'];

    $disQuantity = $_POST['disQuantity'];
    $dis_price = $_POST['dis_price'];


    $data = $_POST['cvrImg'];
    list($type, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);
    $data = base64_decode($data);
    $newname = generateRandomString() . ".png";

    $target = 'products/' . $newname;

    if(file_put_contents($target, $data)){

        $img = imagecreatefrompng($target);
        imagealphablending($img, false);
        imagesavealpha($img, true);
        imagepng($img, $target, 7);
    }

    $products->addProduct($category, $pro_type, $title, $stitle, $price, $stock, $show, $description, $target, $disQuantity, $dis_price);

}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


?>