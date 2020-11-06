<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin'] == 1) {
        echo '<script>
window.location.href = "index.php";
</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in | Easy Shop</title>
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/animate.css">
</head>
<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <div class="login_wrapper">
        <div class="animate form login_form">

            <section class="login_content">
                <h3> Easy Shop Dashboard</h3>
                <form>
<!--                    <h1>Login Form</h1>-->
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required name="username"
                               id="username"/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required name="password"
                               id="password"/>
                        <input name="login" value="ok" style="display:none;"/>
                    </div>
                    <div>
                        <a class="btn btn-default submit" onclick="validate()">Log in</a>
                    </div>
                    <div class="clearfix"></div>
<!--                    <div class="separator">-->
<!--                        <div class="clearfix"></div>-->
<!--                        <br/>-->
<!--                        <div>-->
<!---->
<!--                                            <img src="../img/logo.png" alt="" width="200px" >-->
<!--                            <p>©2016 Powered By <a target="_" href="">DSH</a></p>-->
<!--                        </div>-->
<!--                    </div>-->
                </form>
            </section>
        </div>
    </div>
</div>
<!-- jQuery 2.2.3 -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/my_notifications.js"></script>
<script src="js/bootstrap-notify.min.js"></script>
<script>
    function validate() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if (username == "") {
            error("Please enter a username", "3000", "bottom");
        } else if (password == "") {
            error("Please enter a password", "3000", "bottom");
        } else {
            $.ajax({
                type: 'POST',
                url: 'functions/ajax-user.php',
                data: $('form').serialize(),
                success: function (data) {
                    if (data == 1) {
                        success("Logged in successfully.", "900", "bottom");
                        setTimeout(ridirect, 1000);
                    } else if (data == -1) {
                        error("Username or password is incorrect.", "3000", "bottom");
                    } else {
                        alert(data);
                    }
                }
            });
        }
    }
    function ridirect() {
        window.location.href = "index.php";
    }
</script>
</body>
</html>