<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    echo '<script>
  window.location.href = "login.php";
  </script>';
}
if (isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin'] != 1) {
        echo '<script>
  window.location.href = "login.php";
  </script>';
    }
}
include_once("classes/db.class.php");
include_once("classes/time.class.php");
include_once("classes/product.class.php");

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

    <title>Admin Dashboard | Easy Shop </title>

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
        <div class="right_col" role="main">
            <!-- top tiles -->
            <?php include_once('top_titles.php'); ?>

            <!-- /top tiles -->


            <br/>


            <div class="row" style="border-radius:25px;border : 1px solid #88A10B">

                <?php include_once "functions/get_recent_images.php"; ?>

                <div class="row">

                    <div class="col-sm-12">
                        <br>
                        <br>
                    </div>
                    <div class="col-md-9">
                        <h3 style="padding-left: 10px;">Visitors</h3>
                        <div id="myfirstchart"></div>
                    </div>

                    <br>
                    <br>
                    <div class="col-md-3">
                        <p class="text-center">
                            <strong>Recent visitors</strong>
                        </p>

                        <?php
                        include('functions/get_recent_ip_details.php');
                        $ips = new ip();
                        $data = $ips->getAverages();
                        ?>
                    </div>
                </div>


            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include('footer.php'); ?>
        <!-- /footer content -->
    </div>
</div>


<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="vendors/fastclick/lib/fastclick.js"></script>


<!-- Custom Theme Scripts -->
<script src="build/js/custom.min.js"></script>


<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>
    var myChart = new Chart({...
    })
</script>
<script>
    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        stacked: true,
        data: [
            <?php
            include_once('classes/ip.class.php');
            $ip = new ip();
            $ips = $ip->visitorsChart();
            foreach ($ips as $key => $value) {
            ?>
            {
                week: '<?php echo $key; ?>',
                visitors: <?php echo $value[1]; ?>,
                Hits: <?php echo $value[0]; ?>
            },
            <?php }
            ?>],
        xkey: "week",
        ykeys: ['visitors', 'Hits'],
        labels: ['Visitors', 'Hits'],
        resize: true,
        lineColors: ['#726900', '#88A10B']

    });
</script>


</body>

</html>
