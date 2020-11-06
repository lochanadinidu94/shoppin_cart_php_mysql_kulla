<?php

session_start();

if (isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin'] != 1) {
        echo '<script>
    window.location.href = "login.php";
    </script>';
    }
}
include_once("classes/db.class.php");
include_once("classes/time.class.php");
//include("classes/user.class.php");
//$user = new User();
?>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Property | Easy Shop </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="img_crop/style.css" type="text/css"/>
    <link rel="stylesheet" href="crop_eventsimg/style.css" media="screen" title="no title">
    <link rel="stylesheet" href="../assets/css/animate.css">
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
                <h3 align="center">Add Product</h3>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form  method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="functions/products.php">

                        <div class="form-group">
                            <label for="" class="col-md-2">Product Category</label>
                            <div class="col-sm-8">
                                <select name="category" id="category" class="form-control" title="" required>
                                    <option value="">Select Category</option>
                                    <option value="InitialProducts">Foods & Essential Goods</option>
                                    <option value="GroceryItems">Grocery Items</option>
                                    <option value="HomeCareCleaning">Home Care & Cleaning</option>
                                    <option value="PersonalCareToiletries">Personal Care & Toiletries</option>
                                    <option value="BabyCare">Baby Care</option>
                                    <option value="StationeriesSchoolItems">Books-Stationery & School Item </option>
                                    <option value="FrozenChilledfoods">Frozen & Chilled Foods</option>
                                    <option value="VegetableFruit">Vegetable & Fruit</option>
                                    <option value="ElectricElectronics">Electric & Electronics</option>
                                    <option value="BillPayment">BillPayment</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <br><br>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2">Product Title</label>
                            <div class="col-sm-8">

                               

                                <select name="product_title" id="product_title" class="form-control" title="" required>
                                    <option value="">Select Product</option>
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

<!--                                <input type="text" class="form-control" name="product_title" id="product_title" placeholder="Product Title" required>-->
                            </div>
                            <br><br>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2">Product Title (Eng / Sin)</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sproduct_title" id="sproduct_title" placeholder="Product Title" >
                            </div>
                            <br><br>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2">Quantity</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="stock" id="stock" placeholder="Quantity" >
                            </div>
                            <br><br>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2">Unit</label>
                            <div class="col-sm-8">
                                <select name="pro_type" id="pro_type" class="form-control" title="" required>
                                    <option value="">Select Type</option>
                                    <option value="Item">Item</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Litre">Litre</option>
                                    <option value="Packets">Packets</option>
                                    <option value="Bottles">Bottles</option>
                                </select>
                            </div>
                            <br><br>
                        </div>


                        <div class="form-group">
                            <label for="" class="col-md-2">Product Price</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="price" id="price" placeholder="Product Price" >
                            </div>
                            <br><br>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2">Discount Quantity</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="disQuantity" id="disQuantity" placeholder="Discount Quantity" >
                            </div>
                            <br><br>
                        </div>


                        <div class="form-group">
                            <label for="" class="col-md-2">Discount Price</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="dis_price" id="dis_price" placeholder="Discount Price" >
                            </div>
                            <br><br>
                        </div>


                        <div class="form-group">
                            <label for="" class="col-md-2">Show in home</label>
                            <div class="col-sm-8">
                                <select name="show_home_page" id="show_home_page" class="form-control" title="" >
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <br><br>
                        </div>

                        


                        <div class="form-group">
                            <label for="" class="col-md-2">Product Description</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" name="product_description" id="product_description" placeholder="Product Description"></textarea>
                            </div>
                            <br><br>
                        </div>




                        <br><br>
                        <!-- CROP -->
                        <div class="col-md-12_">
                            <div class="col-md-2">
                                <label for="">Cover Photo</label>
                            </div>
                            <div class="col-md-5" style="padding: 0 !important;">
                                <div class="container1 ">
                                    <div class="imageBox">
                                        <div class="thumbBox"></div>
                                        <div class="spinner" style="display: none">Loading...</div>
                                    </div>
                                    <div class="action">
                                        <input type="file" name="student" id="file" style="float:left; width: 250px"
                                               accept="image/jpeg" required>
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


                        <!-- <div class="form-group col-md-8 col-md-offset-2">
                            <br><br>
                            <label>Choose Album Images</label>
                            <input type="file" name="images[]" id="images" multiple accept="image/jpeg, image/x-png" required>

                        </div> -->


                        <div class="form-group col-md-12 " align="right">

                            <img src="images/loader-white5.gif" alt="" id="uploading" style="padding-right: 20px; width: 100px"><input type="button" value="Submit" class="btn btn-success" id="submit">

                        </div>
                        <input type="text" style="display: none;" name="cvrImg" id="cvrImg" value=" ">

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
<script src="js/my_notifications.js"></script>
<script src="js/bootstrap-notify.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {


        var options = {
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            imgSrc: 'crop_eventsimg/box.png'
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


<script type="text/javascript">
    $(document).ready(function(){
        $('#uploading').hide();
        $('#submit').on('click',function(){

            if(document.getElementById("category").value==""){
                error("Please select a category.","3000","bottom");
                return false;
            }else if(document.getElementById("pro_type").value==""){
                error("Please select a type.","3000","bottom");
                return false;
            }else if(document.getElementById("product_title").value==""){
                error("Please add a title","3000","bottom");
                return false;
            }
            else {

                $('#multiple_upload_form').ajaxForm({
                    // display the uploaded images

                    beforeSubmit: function (e) {
                        $('#uploading').show();
                    },
                    success: function (data) {
                        console.log(data);
                        $('#uploading').hide();
                        success("Uploaded Successfully.", "2000", "bottom");
                        document.getElementById('multiple_upload_form').reset();
                        document.getElementById('cropped').innerHTML = "";
                        document.getElementById('cvrImg').value = "";
                        window.location.reload();
                    },
                    error: function (e) {
                    }
                }).submit();

            }
        });
    });
</script>


</body>

</html>