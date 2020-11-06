<?php

include_once '../classes/db.class.php';
include_once '../classes/product.class.php';

$products = new products();

foreach($_FILES['images']['name'] as $key=>$val){

    $target_dir = "slider/";
    $target_file = $target_dir.generateRandomString().".jpg";
    if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_file)){
        $images_arr[] = $target_file;

        $ext = end((explode(".", $_FILES['images']['name'][$key])));
        if($ext== 'jpg'){
            $img = imagecreatefromjpeg($target_file);
            header("Content-Type: image/jpeg");
            imagejpeg($img, $target_file, 60);
        }elseif ($ext== 'png') {
            $img = imagecreatefrompng($target_file);
            header("Content-Type: image/x-png");
            imagepng($img, $target_file, 7);
        }


        $products->addSliderImage($target_file);
    }

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