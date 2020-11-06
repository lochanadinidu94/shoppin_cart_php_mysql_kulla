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
                <h3 align="center">Add Image</h3>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form  method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="functions/sliderImages.php">

                        <div class="form-group col-md-8 col-md-offset-2">
                            <br><br>
                            <label>Choose Slider Images</label>
                            <input type="file" name="images[]" id="images"  accept="image/jpeg, image/x-png" required>
                            <p>(1920px * 400px)</p>
                        </div>

                        <div class="form-group col-md-12 " align="right">

                            <img src="images/loader-white5.gif" alt="" id="uploading" style="padding-right: 20px; width: 100px"><input type="button" value="Submit" class="btn btn-success" id="submit">

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
<script src="js/my_notifications.js"></script>
<script src="js/bootstrap-notify.min.js"></script>



<script type="text/javascript">
    $(document).ready(function(){
        $('#uploading').hide();
        $('#submit').on('click',function(){

            if(document.getElementById("images").value==""){
                error("Please select a category.","3000","bottom");
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