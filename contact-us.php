<?php

session_start();
if (!empty($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    $email = null;
}

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
<div class="row">
    <div class="container padT30">
        <div class="col-sm-6 contact">
            <form role="form" method="post" class="slideanim" action="functions/email.php">
                <div class="form-group">
                    <input class="form-control" id="inputdefault" type="text" name="name" required placeholder="Name">

                </div>

                <div class="form-group">
                    <input class="form-control" id="inputdefault" type="email" name="email" required placeholder="E-mail Address">

                </div>
                <div class="form-group">
                    <input class="form-control" id="inputdefault" type="text" name="subject" required placeholder="Subject">
                </div>


                <div class="form-group">
                    <textarea class="form-control" rows="5" name="messages" required placeholder="Message"></textarea>

                </div>

                <!--
                <div class="g-recaptcha" data-theme="light" data-sitekey="6LfeZA0TAAAAAD-GgiatyZ__A4Atz49HoN_QqZVS" style="transform:scale(0.70);-webkit-transform:scale(0.70);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                -->
                <div class="t_center">
                    <button type="submit" name="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>

        <div class="col-sm-6 text-center">
            <img src="assets/img/direction-signs.png" alt="" width="32px">
            <p><h3>Office</h3><br>2019/1 <br>Pandukabhaya Mawatha,<br> Vijayapura,<br> Anuradhapura</p>

            <img src="assets/img/black-envelope.png" alt="" width="32px">
            <p><a class="clr333" href="email:esyshopsales@gmail.com">esyshopsales@gmail.com</a></p>
            <p><a class="clr333" href="email:info@esyshop.lk">info@esyshop.lk</a></p>
            
            <img src="assets/img/call-answer.png" alt="" width="32px">
            <p class="marB0"><a class="clr333" href="">+94 71 450 6000 </a></p>
            <p class="marB0"><a class="clr333" href="">+94 71 450 6001 </a></p>
            <p class="marB0"><a class="clr333" href="">+94 71 450 6002 </a></p>
        </div>
    </div>
</div>
</div>

<div class="padT30"></div>

<div class="row google-map">
    <div id="googleMap" ></div>
</div>

<?php include_once 'footer.php'; ?>
<input type="hidden" name="email" id="email" value="<?php echo $email; ?>">


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYl8FIqVjLFjX_g1brh2qFX3OHmLPsSzM&callback=initMap"
        type="text/javascript"></script>

<script>
    var myCenter=new google.maps.LatLng(8.292517, 80.413090);
    var marker;

    function initialize()
    {
        var mapProp = {
            center:myCenter,
            zoom:13,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

        var marker=new google.maps.Marker({
            position:myCenter,
            animation:google.maps.Animation.BOUNCE
        });

        marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>



</body>
</html>