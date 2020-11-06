<?php

session_start();

include_once "../admin/classes/db.class.php";
include_once '../admin/classes/customer.class.php';

$customer = new customer();

if(isset($_POST['update'])){

    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $dis_quantity = $_POST['dis_quantity'];
    $dis_price = $_POST['dis_price'];

    if($dis_quantity!=0 && $quantity >= $dis_quantity ){
        $tprice = $dis_price * $quantity;
        $show_price = $dis_price;
    }else{
        $tprice = $price * $quantity;
        $show_price = $price;
    }


//    $tprice = ($quantity * $price);

//    var_dump($price,$tprice,$quantity, $id);

    $customer->updateCart($tprice,$id, $quantity);

    header('Location: ../cart.php');

}

if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $customer->deleteCart($id);
    header('Location: ../cart.php');
}

?>
