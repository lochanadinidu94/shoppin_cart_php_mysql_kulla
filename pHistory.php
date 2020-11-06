<?php
session_start();

include_once 'admin/classes/db.class.php';
include_once 'admin/classes/customer.class.php';

$email = $_SESSION['email'];

$customer = new customer;
$getPHistory = $customer->getPHistory($email);

$get_cart = $customer->get_customer_cart_last($email);
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

<?php include_once 'menu2.php';
//var_dump($getPHistory) ?>

<div class="container">

    <h3>Your last purchase details</h3>

    <div class="table-responsive padT30">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Prouct Name</th>
                <th>Prouct Description</th>
                <th>Quantity</th>
                <th>Price (01)</th>
                <th>Date Ordered</th>
                <th style="width: 100px;"></th>
            </tr>
            </thead>
            <tbody>

                <?php

                    foreach($getPHistory as $row){
                        echo '
                               <tr>
                                <td>'.$row->pro_name.'</td>
                                <td>' . $row->description . '</td>
                                <td>'.$row->quantity.'</td>
                                <td>'.$row->price.'</td>
                                <td>'.$row->date_orderd.'</td>

                              ';
                        ?>

                                <td>
                                    <input type="hidden" name="quantity" id="quantity" value="1">
                                    <button class="btn crBtn btn-primary"
                                            onclick="addtocart(<?php echo $row->pro_id ?>, document.getElementById('quantity').value)">Re-Order
                                    </button>
                                </td>
                <?php
                        echo '
                               </tr>
                            ';
                    }

                ?>

            </tbody>

        </table>

        <div class="text-right">
            <br>
            <br>
            <form action="functions/reorderAll.php">
                <button type="submit" class="btn btn-primary">Re-Order All</button>
            </form>
        </div>

    </div>

    <div class="padT30"></div>
    <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">


</div>


<?php include_once 'footer.php'; ?>

<script type="text/javascript">


    var obj;

    function checkBrowser() {
        if (window.XMLHttpRequest) {
            obj = new XMLHttpRequest();
        } else {
            obj = new ActiveXobject("Microfoft.ActiveXobject");
        }
    }

    function addtocart(pid, quantity) {

        if (document.getElementById("email").value == "") {
            window.location = 'login.php';
        } else {

            checkBrowser();
            obj.onreadystatechange = function () {

                if (obj.readyState === 4 && obj.status === 200) {
                    // alert(obj.responseText);
                }
            };

            obj.open("POST", "functions/addToCart.php", true);
            obj.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            obj.send("pid=" + pid + "&qty=" + quantity + "");

            alert('Successfully added to cart')
        }
    }
</script>

</body>
</html>
