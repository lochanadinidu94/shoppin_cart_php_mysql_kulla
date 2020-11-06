<?php

include_once '../admin/classes/db.class.php';

include_once '../admin/classes/customer.class.php';



session_start();

$email = $_SESSION['email'];



$customer = new customer();

$getTotalcart = $customer->getTotalcart($email);
$getCountCart = $customer->getCountCart($email);


echo '  RS :'.$getTotalcart->totp.'.00  ';