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
         <h4><p class="text-primary text-center" >
            At the beginning it was small scale retail shop. In the journey of 37 years its’ identity is marked as the
            Wijayawardhana Trading by supplying consumer goods. By expanding its business, Mallika Rice Mill was started
            in 1996 and was able to keep its identity as a supplier of naturally processed quality rice in competitive
            rice market. <br><br>
            In 2015 Wijayawardhana Agencies was started to distribute consumer goods joining with leading business
            entity in the country. Marking new era in the retail business, esyshop has been open as a fully
            comprehensive virtual super market.
        </p></h4>
    </div>
</div>
</div>

<div class="padT30"></div>
<?php include_once 'footer.php'; ?>
<input type="hidden" name="email" id="email" value="<?php echo $email; ?>">


</body>
</html>