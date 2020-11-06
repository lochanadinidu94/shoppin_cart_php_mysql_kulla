<?php


session_start();

include_once 'admin/classes/db.class.php';
include_once 'admin/classes/product.class.php';

$id = $_GET['id'];

$products = new products();
$data = $products->get_product_wiew($id);

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

    <form action="functions/addToCart.php" method="post">

        <div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-1">
            <img src="admin/functions/<?php echo $data[0]->cvr_img; ?>" width="100%">
        </div>

        <div class="col-md-6 col-sm-7">
            <h3><?php echo $data[0]->title; ?></h3>
            <h4><?php echo $data[0]->title_sinhala; ?></h4>


            <?php

            $cat = $data[0]->category;

            if($cat  == 'BillPayment'){

            ?>

            <textarea width="100%" height="40px" name="description" placeholder="Enter Account no and other details" class="form-control"></textarea>   

            <?php
            }else{
            ?>

            <p><?php echo $data[0]->description; ?></p>

            <?php } ?>



            <?php
            if($cat  == 'BillPayment'){
            ?>

             <h4>Rs <input typen="number" width="60px" class="form-control" placeholder="00.0" name="price" required> &nbsp;&nbsp;</h4>

            <?php
            }else{
            ?>
                <h4>Rs <?php echo $data[0]->price; ?>/= &nbsp;&nbsp;( 1 <?php echo $data[0]->product_type; ?> )</h4>
            <?php } ?>

            
            <div class="input-group" style="width: 150px">
                <input type="number" class="form-control" placeholder="" value="1" name="qty" required>
                <input type="hidden" name="pid" value="<?php echo $id; ?>">
                <input type="hidden" name="title" value="<?php echo $data[0]->title; ?>">

                <?php

                if($cat == 'BillPayment'){

                ?>

                <?php
                }else{
                ?>

                <input type="hidden" name="description" value="<?php echo $data[0]->description; ?>">
                <input type="hidden" name="price" value="<?php echo $data[0]->price; ?>">

                <?php } ?>


                
                
                <input type="hidden" name="product_type" value="<?php echo $data[0]->product_type; ?>">
                <input type="hidden" name="proView" value="1">
			  	<span class="input-group-btn">

				<?php
                if (empty($_SESSION['email'])) {
                    echo '<a href="login.php?purl=' . $id . '"><button class="btn crBtn btn-primary" style="border-radius: 0 4px 4px 0;" type="button">Add to cart</button></a>';
                } else {
                    echo '<button class="btn crBtn btn-primary" type="submit" name="addCart">Add to cart</button>';
                }
                ?>

			  </span>
            </div>


            <!-- <input type="text" name="" class="form-control" style="width: 100px;">
            <button class="btn btn-success" style="float: left;">Add to cart</button> -->
        </div>
    </form>

</div>

<div class="row padT30"></div>
<?php include_once 'footer.php'; ?>

</body>
</html>
