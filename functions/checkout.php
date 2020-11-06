<?php

include_once "../admin/classes/db.class.php";
include_once '../admin/classes/customer.class.php';
include_once '../admin/classes/product.class.php';

session_start();
$email = $_SESSION['email'];

$customer = new customer();
$getCheckout = $customer->getCheckout($email);

$products = new products();


if (isset($_POST['checkout_btn'])) {

    date_default_timezone_set("Asia/Colombo");
    date_default_timezone_get();

    // get the form fields
    $subject = 'Email from esyshop.lk';
    $cName = $getCheckout[0]->name;
    $gender = $getCheckout[0]->gender;
    $address = $getCheckout[0]->address;
    $telephone = $getCheckout[0]->contact;

    $totalPrice = $_POST['totalPrice'];

    $to = 'esyshopsales@gmail.com';

    $subject = 'New Order';
    $comEmail = 'info@esyshop.lk';

    $headers = "From: " . strip_tags($email) . "\r\n";
    $headers .= "Reply-To: " . strip_tags($email) . "\r\n";
    //$headers .= "CC: imranfdo.sense@gmail.com \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message = '

					<html xmlns="http://www.w3.org/1999/html">
<body style="margin-left: auto; margin-right: auto; margin-top: 0px;  display: block; ">

<div style="width: 100%; height: 8px; background: #5e5e5e; display: block;"></div>


<div style="width: 80%; margin-right: auto; margin-left: auto; height: 1px; background: #ccc; "></div>

<div class="hello" style="width: 70%; margin-left: auto; margin-right: auto; font-size: 20px; padding: 40px 0 0; color: #555;">
    
</div>

<div style="width: 65%; margin-right: auto; margin-left: auto; padding: 20px 0 40px; text-align: justify; font-size: 18px; color: #555;">
    New Order,
</div>

<div style="width: 100%; background: #eaeaea; height: auto; padding: 40px 0; text-align: center;">
    <table style="margin-left: auto; margin-right: auto; font-size: 20px; color: #555;">
        <tr>
            <td style="text-align: left">Name</td>
            <td>:</td>
            <td style="text-align: left">' . $cName . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Gender</td>
            <td>:</td>
            <td style="text-align: left">' . $gender . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Address</td>
            <td>:</td>
            <td style="text-align: left">' . $address . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Email</td>
            <td>:</td>
            <td style="text-align: left">' . $email . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Tel</td>
            <td>:</td>
            <td style="text-align: left">' . $telephone . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Total Price</td>
            <td>:</td>
            <td style="text-align: left">Rs ' . $totalPrice . '/=</td>
        </tr>


    </table>
</div>


<div style="color: #555; text-align: center; font-size: 20px; padding: 40px 0 20px;">
    Orders
</div>


<table style="margin-left: auto; margin-right: auto; font-size: 15px; color: #555;">
    <tr>
        
        <th style="text-align: left; padding: 5px; border: 1px solid #ccc;">Product Name</th>
        <th style="text-align: left; padding: 5px; border: 1px solid #ccc;">Product Description</th>
        <th style="text-align: left; padding: 5px; border: 1px solid #ccc;">Quantity</th>
        <th style="text-align: left; padding: 5px; border: 1px solid #ccc;">Unit Price</th>
        <th style="text-align: left; padding: 5px; border: 1px solid #ccc;">Date Ordered</th>
    </tr>
';

    foreach ($getCheckout as $row){
        $id = $row->pro_id;
        $name = $row->pro_name;
        $des = $row->description;
        $quantity = $row->quantity;
        $price = $row->price;
        $date_ordered = $row->date_orderd;

        $totalPrice = $_POST['totalPrice'];

        $dis_quantity = $row->dis_size;
        $dis_price = $row->dis_price;

        if($dis_quantity!=0 && $quantity >= $dis_quantity ){
            $price = $dis_price;
        }

        $tPrice = $price * $quantity;


        $message .='

            <tr>
                
                <td style="text-align: left; padding: 5px; border: 1px solid #ccc;">'.$name.'</td>
                <td style="text-align: left; padding: 5px; border: 1px solid #ccc;">'.$des.'</td>
                <td style="text-align: left; padding: 5px; border: 1px solid #ccc;">'.$quantity.'</td>
                <td style="text-align: left; padding: 5px; border: 1px solid #ccc;">Rs '.$price.'</td>
                <td style="text-align: left; padding: 5px; border: 1px solid #ccc;">'.$date_ordered.'</td>
            </tr>

        ';

        $getStock = $products->getStock($id);

        $StockSize = $getStock[0]->stock_size;
        $newStock = $StockSize - $quantity;
//        var_dump($newStock);

        $products->updateStock($id, $newStock);

    }

    $message .= '
</table>

</div>
</body>
</html>
                     ';





//    message 2

    $message2 = '

					<html xmlns="http://www.w3.org/1999/html">
<body style="margin-left: auto; margin-right: auto; margin-top: 0px;  display: block; ">

<div style="width: 100%; height: 8px; background: #5e5e5e; display: block;"></div>


<div style="width: 80%; margin-right: auto; margin-left: auto; height: 1px; background: #ccc; "></div>

<div class="hello" style="width: 70%; margin-left: auto; margin-right: auto; font-size: 20px; padding: 40px 0 0; color: #555;">
    Dear '.$cName.',
</div>

<div style="width: 65%; margin-right: auto; margin-left: auto; padding: 20px 0 40px; text-align: justify; font-size: 18px; color: #555;">
    You have new mail from '.$comEmail.'
</div>

<div style="width: 100%; background: #eaeaea; height: auto; padding: 40px 0; text-align: center;">
    <table style="margin-left: auto; margin-right: auto; font-size: 20px; color: #555;">
        <tr>
            <th colspan="3">Your Order</td>
        </tr>
        <tr>
            <td style="text-align: left">Name</td>
            <td>:</td>
            <td style="text-align: left">' . $cName . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Gender</td>
            <td>:</td>
            <td style="text-align: left">' . $gender . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Address</td>
            <td>:</td>
            <td style="text-align: left">' . $address . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Email</td>
            <td>:</td>
            <td style="text-align: left">' . $email . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Tel</td>
            <td>:</td>
            <td style="text-align: left">' . $telephone . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Total Price</td>
            <td>:</td>
            <td style="text-align: left">Rs ' . $totalPrice . '/=</td>
        </tr>


    </table>
</div>


<div style="color: #555; text-align: center; font-size: 20px; padding: 40px 0 20px;">
    Orders
</div>


<table style="margin-left: auto; margin-right: auto; font-size: 15px; color: #555;">
    <tr>
        
        <th style="text-align: left; padding: 5px; border: 1px solid #ccc;">Product Name</th>
        <th style="text-align: left; padding: 5px; border: 1px solid #ccc;">Product Description</th>
        <th style="text-align: left; padding: 5px; border: 1px solid #ccc;">Quantity</th>
        <th style="text-align: left; padding: 5px; border: 1px solid #ccc;">Unit Price</th>
        <th style="text-align: left; padding: 5px; border: 1px solid #ccc;">Date Ordered</th>
    </tr>
';

    foreach ($getCheckout as $row){
        $id = $row->pro_id;
        $name = $row->pro_name;
        $des = $row->description;
        $quantity = $row->quantity;
        $price = $row->price;
        $date_ordered = $row->date_orderd;


        $dis_quantity = $row->dis_size;
        $dis_price = $row->dis_price;

        if($quantity >= $dis_quantity ){
            $price = $dis_price;
        }

        $tPrice = $price * $quantity;


        $message2 .='

            <tr>
                <td style="text-align: left; padding: 5px; border: 1px solid #ccc;">'.$name.'</td>
                <td style="text-align: left; padding: 5px; border: 1px solid #ccc;">'.$des.'</td>
                <td style="text-align: left; padding: 5px; border: 1px solid #ccc;">'.$quantity.'</td>
                <td style="text-align: left; padding: 5px; border: 1px solid #ccc;">Rs '.$row->price.'</td>
                <td style="text-align: left; padding: 5px; border: 1px solid #ccc;">'.$date_ordered.'</td>
            </tr>

        ';

        $getStock = $products->getStock($id);

        $StockSize = $getStock[0]->stock_size;
        $newStock = $StockSize - $quantity;
//        var_dump($newStock);

        $products->updateStock($id, $newStock);

    }

    $message2 .= '
</table>

</div>
</body>
</html>
                     ';

    mail($to, $subject, $message, $headers);
    mail($email, $subject, $message2, $headers);

    $customer->checkoutCart($email);




    //echo "Mail sent successfully";
     header("Location:../thank_you.php");
//        echo "<script>window.location='../checkout_thank_you.php'</script>";


}


?>
