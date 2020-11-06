<?php

session_start();

if(isset($_SESSION['loggedin'])){
    if($_SESSION['loggedin']!=1){
        echo '<script>
    window.location.href = "login.php";
    </script>';
    }
}
error_reporting(0);
include_once("classes/db.class.php");
include_once("classes/time.class.php");
include_once("classes/customer.class.php");

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

    <title>All Customers | Easy Shop </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php include_once('sidebar.php'); ?>

        <!-- top navigation -->
        <?php include_once('top_bar.php'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="min-height: 0px;">
            <!-- top tiles -->
            <?php include_once('top_titles.php'); ?>

            <!-- /top tiles -->


            <br />




            <div class="row" style="border-radius:25px;border : 1px solid #993f41">
                <h3 align="center">All Customers</h3>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <?php include 'functions/fetch_customer_table.php';?>

                </div>


                <div class="col-md-1"></div>


            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include('footer.php');?>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="vendors/fastclick/lib/fastclick.js"></script>
<!-- Datatables -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="build/js/custom.min.js"></script>


<script>
    $(document).ready(function () {
        $('#all-images').dataTable();
    });

    function delImage(imid, imsrc){
        if(confirm("Are you sure to delete the image?")){
            window.location.href = "functions/del_image.php?id="+imid+"&delete="+imsrc;
        }

    }
</script>








</body>

</html>