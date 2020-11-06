<?php

session_start();
if (isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin'] != 1) {
        echo '<script>
    window.location.href = "login.php";
    </script>';
    }
}
$id=-1;
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

include_once("classes/db.class.php");
include_once("classes/time.class.php");
include("classes/product.class.php");
$products = new products();
$data = $products->get_product($id);
// $galData = $properties->get_property_images($id);
// var_dump($data);
?>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Properties | Realestate Agents </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="img_crop/style.css" type="text/css"/>
    <link rel="stylesheet" href="crop_eventsimg/style.css" media="screen" title="no title">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php include_once('sidebar.php'); ?>

        <!-- top navigation -->
        <?php include_once('top_bar.php'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            <?php include_once('top_titles.php'); ?>

            <!-- /top tiles -->


            <br/>


            <div class="row" style="border-radius:25px;border : 1px solid #88A10B">
                <h3 align="center">Update Produts</h3>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form method="post" name="multiple_upload_form" id="multiple_upload_form"
                          enctype="multipart/form-data" action="functions/edit_products.php">

                        <input type="hidden" value="<?php echo $data[0]->id;?>" name="id">



                        <div class="form-group">
                            <label for="" class="col-md-2">Product Category</label>
                            <div class="col-sm-8">
                                <select name="category" id="category" class="form-control" title="" required>
                                    <option value="InitialProducts" <?php if ($data[0]->category == 'InitialProducts'){echo 'selected';} ?>>Foods & Essential Goods</option>
                                    <option value="GroceryItems" <?php if ($data[0]->category == 'GroceryItems'){echo 'selected';} ?>>Grocery Items</option>
                                    <option value="HomeCareCleaning" <?php if ($data[0]->category == 'HomeCareCleaning'){echo 'selected';} ?>>Home Care & Cleaning</option>
                                    <option value="PersonalCareToiletries" <?php if ($data[0]->category == 'PersonalCareToiletries'){echo 'selected';} ?>>Personal Care & Toiletries</option>
                                    <option value="BabyCare" <?php if ($data[0]->category == 'BabyCare'){echo 'selected';} ?>>Baby Care</option>
                                    <option value="StationeriesSchoolItems" <?php if ($data[0]->category == 'StationeriesSchoolItems'){echo 'selected';} ?>>Books-Stationery & School Item</option>
                                    <option value="FrozenChilledfoods" <?php if ($data[0]->category == 'FrozenChilledfoods'){echo 'selected';} ?>>Frozen & Chilled Foods</option>
                                    <option value="VegetableFruit" <?php if ($data[0]->category == 'VegetableFruit'){echo 'selected';} ?>>Vegetable & Fruit</option>
                                    <option value="ElectricElectronics" <?php if ($data[0]->category == 'ElectricElectronics'){echo 'selected';} ?>>Electric & Electronics</option>
                                    <option value="BillPayment" <?php if ($data[0]->category == 'BillPayment'){echo 'selected';} ?>>BillPayment</option>
                                    <option value="Other" <?php if ($data[0]->category == 'Other'){echo 'selected';} ?>>Other</option>
                                </select>
                            </div>
                            <br><br>
                        </div>





                        <div class="form-group">
                            <label for="" class="col-md-2">Product type</label>
                            <div class="col-sm-8">
                                <select name="pro_type" id="pro_type" class="form-control" title="" required>
                                    <option value="">Select Type</option>
                                    <option value="Item" <?php if ($data[0]->product_type == 'Item'){echo 'selected';} ?>>Item</option>
                                    <option value="Kg" <?php if ($data[0]->product_type == 'Kg'){echo 'selected';} ?>>Kg</option>
                                    <option value="Litre" <?php if ($data[0]->product_type == 'Litre'){echo 'selected';} ?>>Litre</option>
                                    <option value="Packets" <?php if ($data[0]->product_type == 'Packets'){echo 'selected';} ?>>Packets</option>
                                    <option value="Bottles" <?php if ($data[0]->product_type == 'Bottles'){echo 'selected';} ?>>Bottles</option>
                                </select>
                            </div>
                            <br><br>
                        </div>

                        
                         <div class="form-group">
                            <label for="" class="col-md-2">Product Title</label>
                            <div class="col-sm-8">
                                <select name="product_title" id="product_title" class="form-control" title="" required>
                                    <option value="<?php echo $data[0]->title ;?>"><?php echo $data[0]->title ;?></option>
                                    
                                    <?php


                                    $servername = "localhost";
                                    $username = "esyshop_admin";
                                    $password = "Lg@io]Pe5U#0";
                                    $dbname = "esyshop_db";


                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    } 

                                    $sql = "SELECT name FROM allproductname";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                    ?>

                                        <option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
                                                                    

                                    <?php
                                        }
                                    } else {
                                        echo "0 results";
                                    }

                                    $conn->close();


                                    ?>


                                </select>
<!--                                <input type="text" value="--><?php //echo $data[0]->title ;?><!--" class="form-control" name="product_title" id="product_title" placeholder="Product Title" required>-->
                            </div>
                            <br><br>
                        </div>


                        <div class="form-group">
                            <label for="" class="col-md-2">Product Title (Eng / Sin)</label>
                            <div class="col-sm-8">
                                <input type="text" value="<?php echo $data[0]->title_sinhala; ?>" class="form-control"
                                       name="sproduct_title" id="sproduct_title" placeholder="Product Title" >
                            </div>
                            <br><br>
                        </div>


                        <div class="form-group">
                            <label for="" class="col-md-2">Product Price</label>
                            <div class="col-sm-8">
                                <input type="number" value="<?php echo $data[0]->price ;?>" class="form-control" name="price" id="price" placeholder="Product Price" >
                            </div>
                            <br><br>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2">Discount Quantity</label>
                            <div class="col-sm-8">
                                <input type="number" value="<?php echo $data[0]->dis_size ;?>" class="form-control" name="disQuantity" id="disQuantity" placeholder="Discount Quantity" >
                            </div>
                            <br><br>
                        </div>


                        <div class="form-group">
                            <label for="" class="col-md-2">Discount Price</label>
                            <div class="col-sm-8">
                                <input type="number" value="<?php echo $data[0]->dis_price ;?>" class="form-control" name="dis_price" id="dis_price" placeholder="Discount Price" >
                            </div>
                            <br><br>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2">Quantity</label>
                            <div class="col-sm-8">
                                <input type="number" value="<?php echo $data[0]->stock_size ;?>" class="form-control" name="stock" id="stock" placeholder="Quantity" >
                            </div>
                            <br><br>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2">Show in home</label>
                            <div class="col-sm-8">
                                <select name="show_home_page" id="show_home_page" class="form-control" title="" >
                                    <option value="0" <?php if ($data[0]->show_in_home == '0'){echo 'selected';} ?>>No</option>
                                    <option value="1" <?php if ($data[0]->show_in_home == '1'){echo 'selected';} ?>>Yes</option>
                                </select>
                            </div>
                            <br><br>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2">product Description</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control"  name="product_description" id="product_description" placeholder="Product Description"><?php echo $data[0]->description?></textarea>
                            </div>
                            <br><br>
                        </div>

                        <br><br>
                        <!-- CROP -->
                        <div class="col-md-12_">
                            <div class="col-md-2">
                                <label for="">Cover Photo</label>
                            </div>
                            <div class="col-md-5 " style="padding: 0 !important;">
                                <div class="container1 ">
                                    <div class="imageBox">
                                        <div class="thumbBox"></div>
                                        <div class="spinner" style="display: none">Loading...</div>
                                    </div>
                                    <div class="action">
                                        <input type="file" name="student" id="file" style="float:left; width: 250px"
                                               accept="image/jpeg" >
                                        <input type="button" id="btnCrop" class="btn btn-success btn-sm bold"
                                               value="Crop" style="float: right">&nbsp;
                                        <input type="button" id="btnZoomIn" class="bold" value="+" style="float: right">&nbsp;
                                        <input type="button" id="btnZoomOut" class="bold" value="-"
                                               style="float: right">&nbsp;
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-5" id="cropped">
                            </div>
                        </div>

                        <!-- CROP -->


                        <input type="text" style="display: none;" name="cvrImg" id="cvrImg" value=" ">
                        


                        <div class="form-group col-md-12" align="right">

                            <input type="submit" class="btn btn-success" value="Save">

                        </div>

                    </form>
                    <div id="images_preview"></div>
                </div>


                <div class="col-md-1"></div>


            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include('footer.php'); ?>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="vendors/fastclick/lib/fastclick.js"></script>
<script src="vendors/jquery/dist/jquery.form.js"></script>


<!-- Custom Theme Scripts -->
<script src="build/js/custom.min.js"></script>

<!-- CROP -->
<script src="crop_eventsimg/cropbox.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {


        var options = {
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            imgSrc: '<?php if (isset($data[0]->cvr_img)) {
                echo 'functions/' . $data[0]->cvr_img;
            } else {
                echo 'crop_eventsimg/box.png';
            }  ?>'
        }

        var cropper = $('.imageBox').cropbox(options);
        $('#file').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                options.imgSrc = e.target.result;
                cropper = $('.imageBox').cropbox(options);
            }
            reader.readAsDataURL(this.files[0]);
            this.files = [];
        })

        $('#btnCrop').on('click', function () {

            var img = cropper.getDataURL();

            document.getElementById("cropped").innerHTML = '<img src="' + img + '">';
            document.getElementById("cvrImg").value = img;


        })

        $('#btnZoomIn').on('click', function () {
            cropper.zoomIn();
        })

        $('#btnZoomOut').on('click', function () {
            cropper.zoomOut();
        })

    });
</script>
<!-- CROP -->


</body>

</html>