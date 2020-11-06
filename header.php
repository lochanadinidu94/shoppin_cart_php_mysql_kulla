

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));



</script>


<div class="container">
    <div class="topMainBar">
        <div class="col-sm-4">
            <div class="logo xs-center">
                <a href="index.php"><img src="assets/img/logo.png" alt=""></a>
<!--                <span class="topNumber blink"> &nbsp; <a href="tel:+94714506000">+94 71 450 6000</a></span>-->
            </div>
        </div>

        <div class="col-sm-4 xs-center">
            <a href="tel:+94714506000" class="blink"><img src="assets/img/HOTLINE%20oRANGE.png" alt="" width="100%" height="80px"></a>
        </div>

        <div class="col-sm-4 text-right xs-center">
            <ul class="topBar2">

                <li  class="xs-center">
                    <form class="navbar-form " action="search.php" method="post" role="search">
                        <div class="input-group">
                            <input type="text" name="search" required class="form-control" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button type="submit" class="btn crBtn btn-primary"><span
                                    class="glyphicon glyphicon-search"></span>
                          </span>
                        </div><!-- /input-group -->
                    </form>
                </li>

                <li class="xs-center"><a href="https://www.facebook.com/www.esyshop.lk/"><img src="assets/img/Hfb.png" alt=""></a></li>
                <!-- <li><a href="https://www.gmail.com"><img src="assets/img/Hemail.png" alt=""></a></li> -->
            </ul>
        </div>
    </div>
</div>


<div class="row">
    <div class="menu">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about-us.php">About Us</a></li>
                            <li><a href="contact-us.php">Contact Us</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">

                            <?php

                            if (empty($_SESSION['email'])) {
                                echo ' <li><a href="login.php">Login</a></li>';
                            }else{
                                echo '
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="pHistory.php">Purchase History</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="functions/logout.php">Logout</a></li>
                                            </ul>
                                        </li>
                                    ';
                            }
                            if (empty($_SESSION['email'])) {
                                echo '<li><a href="login.php">My Cart <img src="assets/img/cart.png" width="25px"></a></li>';
                            }else{
                                echo '<li><a href="cart.php">My Cart <span id="count"></span></a></li>';
                            }
                            ?>


                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
</div>



    <!--Start of Tawk.to Script-->
 <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/58a87adba9e5680aa3b43f5d/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
 </script>
<!--End of Tawk.to Script-->

<script>
    $("#count").load("functions/countCart.php");
</script>