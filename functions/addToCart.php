
<?php

session_start();
//
include_once "../admin/classes/db.class.php";
include_once '../admin/classes/customer.class.php';



$email = $_SESSION['email'];
$pid = $_POST['pid'];
$quantity = $_POST['qty'];
//$customer = new customer();
//
//if(isset($_POST['qty'])){
//
//    $email = $_SESSION['email'];
//    $quantity = $_POST['qty'];
//    $pid = $_POST['pid'];
//
//    $customer->addCart2($email,$pid,$quantity);
//
//    echo $email,$pid,$quantity;
//}

$customer = new customer();
$get_customer = $customer->get_customer_cart($email);
$get_pro = $customer->get_pro_data($pid);

if (!empty($quantity)) {
    foreach ($get_customer as $row) {
        $name = $row->name;
        $gender = $row->gender;
        $address = $row->address;
        $contact = $row->contact;
    }

    foreach ($get_pro as $row2) {
        $title = $row2->title;

        $cat = $row2->category;

        if($cat  == 'BillPayment'){
             $des = $_POST['description'];
             $price = $_POST['price'];
        }else{
             $des = $row2->description;
             $price = $row2->price;
        }    

       
        $product_type = $row2->product_type;
        $dis_quantity = $row2->dis_size;
        $dis_price = $row2->dis_price;


    }

    if($dis_quantity!=0 && $quantity >= $dis_quantity){
        $tprice = $dis_price * $quantity;
    }else{
        $tprice = $price * $quantity;
    }



    $customer->addCart($email, $name, $gender, $address, $contact, $pid, $title, $des, $product_type, $quantity, $price, $tprice, $dis_quantity, $dis_price);

//    echo $email . '<br>' . $name . '<br>' . $gender . '<br>' . $address . '<br>' . $contact . '<br>' . $title . '<br>' . $product_type . '<br>' . $quantity . '<br>' . $price . '<br>' . $tprice;

//    header('Location: ../cart.php');
    if($_POST['proView']){
      header('Location: ../cart.php');
    }

}


?>
