<?php

session_start();
//
include_once "../admin/classes/db.class.php";
include_once '../admin/classes/customer.class.php';

$email = $_SESSION['email'];

$customer = new customer();
$get_cart = $customer->get_customer_cart_last($email);
//$get_pro = $customer->get_pro_data($pid);

    foreach($get_cart as $row){
        $email = $row->email;
        $name = $row->name;
        $gender = $row->gender;
        $address = $row->address;
        $contact= $row->contact;
        $pid = $row->pro_id;
        $title = $row->pro_name;
        $des = $row->description;
        $product_type = $row->pro_type;
        $quantity = $row->quantity;
        $price = $row->price;
        $dis_quantity = $row->dis_size;
        $dis_price = $row->dis_price;
        $tprice = $row->total_price;

        $customer->addCart($email, $name, $gender, $address, $contact, $pid, $title, $des, $product_type, $quantity, $price, $tprice, $dis_quantity, $dis_price);

    }

    echo '
        <script>window.location="../cart.php"</script>
    ';



?>
