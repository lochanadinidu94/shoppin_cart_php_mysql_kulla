<?php

session_start();

include_once "admin/classes/db.class.php";
include_once 'admin/classes/customer.class.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login || EsyShop.lk</title>
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

<div class="container">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <form class="form-signin" action="functions/validate.php" method="post">
            <br>
            <h2 class="form-signin-heading">Please sign in</h2>

            <?php
            if (!empty($_GET['reg'])) {
                if ($_GET['reg'] == 'pass') {
                    echo '
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                You have registered successfully!
                            </div>
                        ';
                }
            }

            if(!empty($_GET['message'])){
                if($_GET['message'] == 'error'){
                    echo '
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                Username or password invalid!
                            </div>
                        ';
                }
            }

            $pid = '';
            if(!empty($_GET['purl'])){
                $pid = $_GET['purl'];
            }

            ?>


            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required
                   autofocus>

            <br>

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

            <input type="hidden" id="pid" name="pid" value="<?php echo $pid;?>">

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" value="1"> Remember me
                </label>
            </div>
            <button class="btn btn-md btn-primary btn-block" type="submit" name="login">Sign in</button>
            <p class="text-center">-OR-</p>
            <a class="btn btn-md btn-primary btn-block" href="register.php">Sign Up</a>
        </form>
    </div>
</div>


<div class="padT30"></div>


<?php include_once 'footer.php'; ?>



<?php

if (isset($_COOKIE['email']) AND isset($_COOKIE['password'])) {
    $email = $_COOKIE['emil'];
    $password = $_COOKIE['password'];

    echo "<script>
				document.getElemntById('email'.value = '$email');
				document.getElemntById('password'.value = '$password');
			</script>";
}


?>




</body>
</html>