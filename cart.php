<?php
include_once 'admin/classes/db.class.php';
include_once 'admin/classes/customer.class.php';

session_start();
$email = $_SESSION['email'];

$customer = new customer();
//$data = $products->get_product_wiew($id);

$getCart = $customer->getCart($email);
$totalPrice = $customer->totalPrice($email);

//foreach($totalPrice as $row1){
//    $totPrice = $row1->total_price;
//}
// var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Easy Shop</title>
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/png">
    <?php include_once 'link.php'; ?>

    <link rel="stylesheet" type="text/css" href="homeSlider/engine1/style.css"/>
    <link rel="stylesheet" href="assets/slick/slick.css">
    <link rel="stylesheet" href="assets/slick/slick-theme.css">


</head>
<body>

<?php include_once 'header.php'; ?>
<br>
<?php include_once 'menu2.php'; ?>


<div class="container padT30">




    <?php

    setlocale(LC_MONETARY,"en_LKR");

    if(!empty($getCart)){
        echo '
            <div class="row text-right">
                <h3>
                    ';
                    foreach ($totalPrice as $row) {
                        echo "Rs " .money_format( " %i",$row->tPrice) ;
                    }
            echo '
                </h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Checkout</button>

            </div>
        ';
    }

    ?>





    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form action="functions/checkout.php" method="post">
                    <div class="modal-header">
                        <button type="button" class="close " data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Checkout</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to proceed checkout?</p>
                        <?php
                            $total = $totalPrice[0]->tPrice;
                         ?>
                         <input type="hidden" name="totalPrice" value="<?php echo $total ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="checkout_btn" class="btn btn-primary">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <div class="table-responsive padT30">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Prouct Name</th>
                <th>Prouct Description</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Amount</th>
                <th width="125px">Action</th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach ($getCart as $row) {

                $id = $row->id;
                $price = $row->price;
                $quantity = $row->quantity;
                $tb = $price * $quantity;

                $dis_quantity = $row->dis_size;
                $dis_price = $row->dis_price;

                if($dis_quantity!=0 && $quantity >= $dis_quantity ){
                    $tprice = $dis_price * $quantity;
                    $show_price = $dis_price;
                }else{
                    $tprice = $price * $quantity;
                    $show_price = $price;
                }




                echo '
                            <form action="functions/cart_update.php" method="post">
                                <tr>
                                    <td>' . $row->pro_name . '</td>
                                    <td>' . $row->description . '</td>
                                    <td><input type="number" class="form-control" placeholder="" name="quantity" value="' . $row->quantity . '" required style="width: 100px; text-align: left;"></td>
                                    <td>' .money_format( " %i", $show_price) . '</td>
                                    <td>' .money_format( " %i", $tb ). '</td>
                                    <td>
                                        <input name="id" type="hidden" value="' . $id . '">
                                        <input name="price" type="hidden" value="' . $price . '">
                                        <input name="dis_quantity" type="hidden" value="' . $dis_quantity . '">
                                        <input name="dis_price" type="hidden" value="' . $dis_price . '">

                                        <button name="update" class="btn btn-primary btn-sm">Update </button>
                                        <button name="delete" class="btn btn-danger btn-sm">Remove</button>
                                    </td>
                                </tr>
                            </form>
                        ';
            }

            ?>


            </tbody>
        </table>
    </div>
</div>

<div class="row padT30"></div>
<?php include_once 'footer.php'; ?>

</body>
</html>
