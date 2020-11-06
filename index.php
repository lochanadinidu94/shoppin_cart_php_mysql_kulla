<?php

session_start();

include_once 'admin/classes/db.class.php';
include_once 'admin/classes/product.class.php';

//$id = $_GET['id'];

$products = new products();
if (!empty($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    $email = null;
}

$data = $products->get_product_index();
$grocery = $products->get_grocery_index();
$HomeCareCleaning = $products->get_HomeCareCleaning_index();
$CPersonalCareToiletries = $products->get_CPersonalCareToiletries_index();
$BabyCare = $products->get_BabyCare_index();
$StationeriesSchoolItems = $products->get_StationeriesSchoolItems_index();
$FrozenChilledfoods = $products->get_FrozenChilledfoods_index();
$VegetableFruit = $products->get_VegetableFruit_index();
$ElectricElectronics = $products->get_ElectricElectronics_index();
$BillPayment = $products->get_BillPayment_index();
$Other = $products->get_Other_index();
$slider = $products->getSliderImages();
?>



<?php
/* include the database connectio class*/
//include('admin/classes/db.class.php');

date_default_timezone_set("Asia/Colombo");
date_default_timezone_get();

/* get the user ip address*/
$user_ip = $_SERVER['REMOTE_ADDR'];

/* check ip exists*/
function ip_exists($ip) {
    global $user_ip;
    $user_ip;

    $sql_ip_exists = ("SELECT ip FROM hits_ip WHERE ip='$user_ip' ");
    $results_ip_exists = mysql_query($sql_ip_exists);

    /* count matches ip*/
    $num_of_rows = mysql_num_rows($results_ip_exists);

    if ($num_of_rows == 0) {
        return false;
    } elseif ($num_of_rows >= 1) {
        return true;
    }
}

/* ip add*/
function ip_add($ip) {
    $sql_ip_add = ("INSERT INTO hits_ip (ip,date_visit,ip_count) VALUES ('$ip',now(),1) ");
    $results_ip_add = mysql_query($sql_ip_add);
}

/* ip count increese*/
function ip_count_inc($ip) {

    $sql_ip_count = ("SELECT ip_count FROM hits_ip WHERE ip='$ip' ");

    if ($results_ip_count = mysql_query($sql_ip_count)) {
        $row_ip_count = mysql_fetch_array($results_ip_count);

        $count_ip = $row_ip_count{'ip_count'};
        $count_ip_inc = $count_ip + 1;

        $sql_ip_count_update = ("UPDATE hits_ip SET ip_count='$count_ip_inc' WHERE ip='$ip' ");
        $results_ip_count_update = mysql_query($sql_ip_count_update);
    }
}

/* hits count*/
function hits_count() {
    $sql_hits_count = ("SELECT count FROM hits_count");

    if ($results_hits_count = mysql_query($sql_hits_count)) {
        $row_count = mysql_fetch_array($results_hits_count);

        $count = $row_count{'count'};
        $count_inc = $count + 1;

        /* update the database*/
        $sql_hits_count_up = ("UPDATE hits_count SET count='$count_inc' ");
        $results_hits_count_up = mysql_query($sql_hits_count_up);
    }
}

/* caling the function*/
if (ip_exists($user_ip)) {
    ip_count_inc($user_ip);
} else {
    hits_count();
    ip_add($user_ip);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="google-site-verification" content="RbIejr2Ws-v5pwWE5h6HuES7-RvWPZL7FbAtnPz0_CE" />
    
    <title>Welcome to Easy Shop</title>
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/png">

    <?php include_once 'link.php'; ?>

    <link rel="stylesheet" type="text/css" href="homeSlider/engine1/style.css"/>
    <link rel="stylesheet" href="assets/slick/slick.css">
    <link rel="stylesheet" href="assets/slick/slick-theme.css">


</head>
<body>

<?php include_once 'header.php'; ?>


<div id="wowslider-container1">
    <div class="ws_images">
        <ul>
            <?php
                foreach($slider as $row){
                    echo '
                        <li><img src="admin/functions/'.$row->src.'" alt="wowslideshow" title="slider" id="wows1_0"/></li>
                        ';
                }
            ?>

<!--            <li><img src="homeSlider/data1/images/slider.jpg" alt="wowslideshow" title="slider" id="wows1_0"/></li>-->
        </ul>
    </div>
    <div class="ws_script" style="position:absolute;left:-99%"> </div>
    <div class="ws_shadow"></div>
</div>


<?php include_once 'menu2.php'; ?>


<div class="row ">
    <a href="products.php?cat=InitialProducts"><h3 class="text-center clr1C3682">Foods & Essential Goods</h3></a>
    <h4 class="text-center clr1C3682">( ආහාර හා අත්‍යවශ්‍ය ද්‍රව්‍ය )</h4>
    <div class="container">
        <div class="productSliders ">
            <?php
            $a=0;
            foreach ($data as $row) {
                echo '
                        <div class="proPad">
                        <div class="border">
                        <div class=" padB30">
                            <div class="col-sm-12_ proBor_ bgfff">
                                <a href="product_view.php?id=' . $row->id . '">
                                <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <h3 class="pTitle">' . $row->title . '</h3>

                                <h4>Rs ' . $row->price . '/=</h4>
                                <p class="pDes">' . substr($row->description, 0, 50) . '</p>

                                <div class="input-group" style="width: 160px; margin: 0 auto;">
                                    <input type="number" class="form-control" placeholder="" value="1" name="quantity" id="quantity1'.$a.'"  min="1" required>
                                    <span class="input-group-btn">

                                    ';
                ?>
                <button class="btn crBtn btn-primary"
                        onclick="addtocart(<?php echo $row->id ?>, document.getElementById('quantity1<?php echo $a?>').value)">ADD
                    TO CART
                </button>

                <?php echo '
                                    </span>
                                </div>

                              </div>
                              </div>
                        </div>
                    </div>
                    ';
                    $a++;
            }

            ?>
        </div>
    </div>
    <br>
</div>


<div class="row bgccc">
    <a href="products.php?cat=PersonalCareToiletries"><h3 class="text-center clr1C3682">Personal Care & Toiletries</h3></a>
    <h4 class="text-center clr1C3682">( පුද්ගල පිරිසිදුකාරක හා සනීපාරක්ෂක ද්‍රව්‍ය )</h4>

    <div class="container">
        <div class="productSliders">
            <?php
            $a++;
            foreach ($CPersonalCareToiletries as $row) {
                echo '
                        <div class="proPad">
                        <div class="border">
                        <div class=" padB30">
                            <div class="col-sm-12_ proBor_ bgfff">
                                <a href="product_view.php?id=' . $row->id . '">
                                <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <h3 class="pTitle">' . $row->title . '</h3>

                                <h4>Rs ' . $row->price . '/=</h4>
                                <p class="pDes">' . substr($row->description, 0, 50) . '</p>

                                <div class="input-group" style="width: 160px; margin: 0 auto;">
                                    <input type="number" class="form-control" placeholder="" value="1" name="quantity" id="quantity3'.$a.'"  min="1" required>
                                    <span class="input-group-btn">

                                    ';
                ?>
                <button class="btn crBtn btn-primary"
                        onclick="addtocart(<?php echo $row->id ?>, document.getElementById('quantity3<?php echo $a?>').value)">ADD
                    TO CART
                </button>

                <?php echo '
                                    </span>
                                </div>

                              </div>
                              </div>
                        </div>
                    </div>
                    ';
                    $a++;
            }

            ?>
        </div>
    </div>
    <br>
</div>


<div class="row ">
    <a href="products.php?cat=BabyCare"><h3 class="text-center clr1C3682">Baby Products</h3></a>
    <h4 class="text-center clr1C3682">( ළදරු නිෂ්පාදන )</h4>

    <div class="container">
        <div class="productSliders">
            <?php
            $a = 0;
            foreach ($BabyCare as $row) {
                echo '
                        <div class="proPad">
                        <div class="border">
                        <div class=" padB30">
                            <div class="col-sm-12_ proBor_ bgfff">
                                <a href="product_view.php?id=' . $row->id . '">
                                <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <h3 class="pTitle">' . $row->title . '</h3>

                                <h4>Rs ' . $row->price . '/=</h4>
                                <p class="pDes">' . substr($row->description, 0, 50) . '</p>

                                <div class="input-group" style="width: 160px; margin: 0 auto;">
                                    <input type="number" class="form-control" placeholder="" value="1" name="quantity" id="quantity4'.$a.'" min="1" required>
                                    <span class="input-group-btn">

                                    ';
                ?>
                <button class="btn crBtn btn-primary"
                        onclick="addtocart(<?php echo $row->id ?>, document.getElementById('quantity4<?php echo $a?>').value)">ADD
                    TO CART
                </button>

                <?php echo '
                                    </span>
                                </div>

                              </div>
                              </div>
                        </div>
                    </div>
                    ';
                    $a++;
            }

            ?>
        </div>
    </div>
    <br>
</div>



<div class="row bgccc">
    <a href="products.php?cat=HomeCareCleaning"><h3 class="text-center clr1C3682">Home Care & Cleaning</h3></a>
    <h4 class="text-center clr1C3682">( ගෘහ සත්කාරක හා පිරිසිදුකාරක )</h4>
    <div class="container">
        <div class="productSliders">
            <?php
            $a = 0;
            foreach ($HomeCareCleaning as $row) {
                echo '
                        <div class="proPad">
                        <div class="border">
                        <div class=" padB30">
                            <div class="col-sm-12_ proBor_ bgfff">
                                <a href="product_view.php?id=' . $row->id . '">
                                <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <h3 class="pTitle">' . $row->title . '</h3>

                                <h4>Rs ' . $row->price . '/=</h4>
                                <p class="pDes">' . substr($row->description, 0, 50) . '</p>

                                <div class="input-group" style="width: 160px; margin: 0 auto;">
                                    <input type="number" class="form-control" placeholder="" value="1" name="quantity" id="quantity2'.$a.'"  min="1" required>
                                    <span class="input-group-btn">

                                    ';
                ?>
                <button class="btn crBtn btn-primary"
                        onclick="addtocart(<?php echo $row->id ?>, document.getElementById('quantity2<?php echo $a?>').value)">ADD
                    TO CART
                </button>

                <?php echo '
                                    </span>
                                </div>

                              </div>
                              </div>
                        </div>
                    </div>
                    ';
                    $a++;
            }

            ?>
        </div>
    </div>
    <br>
</div>









<div class="row ">
    <a href="products.php?cat=FrozenChilledfoods"><h3 class="text-center clr1C3682">Frozen & Chilled foods</h3></a>
    <h4 class="text-center clr1C3682">( සීත කල ආහාර )</h4>

    <div class="container">
        <div class="productSliders">
            <?php
            $a = 0;
            foreach ($FrozenChilledfoods as $row) {
                echo '
                        <div class="proPad">
                        <div class="border">
                        <div class=" padB30">
                            <div class="col-sm-12_ proBor_ bgfff">
                                <a href="product_view.php?id=' . $row->id . '">
                                <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <h3  class="pTitle">' . $row->title . '</h3>

                                <h4>Rs ' . $row->price . '/=</h4>
                                <p class="pDes">' . substr($row->description, 0, 50) . '</p>

                                <div class="input-group" style="width: 160px; margin: 0 auto;">
                                    <input type="number" class="form-control" placeholder="" value="1" name="quantity" id="quantity6'.$a.'"  min="1" required>
                                    <span class="input-group-btn">

                                    ';
                ?>
                <button class="btn crBtn btn-primary"
                        onclick="addtocart(<?php echo $row->id ?>, document.getElementById('quantity6<?php echo $a?>').value)">ADD
                    TO CART
                </button>

                <?php echo '
                                    </span>
                                </div>

                              </div>
                              </div>
                        </div>
                    </div>
                    ';
                    $a++;
            }

            ?>
        </div>
    </div>
    <br>
</div>


<div class="row bgccc">
    <a href="products.php?cat=StationeriesSchoolItems"><h3 class="text-center clr1C3682">Books-Stationery & School Item</h3></a>
    <h4 class="text-center clr1C3682">( පොත් ලිපි ද්‍රව්‍ය හා පාසල් උපකරණ )</h4>

    <div class="container">
        <div class="productSliders">
            <?php
            $a = 0;
            foreach ($StationeriesSchoolItems as $row) {
                echo '
                        <div class="proPad">
                        <div class="border">
                        <div class=" padB30">
                            <div class="col-sm-12_ proBor_ bgfff">
                                <a href="product_view.php?id=' . $row->id . '">
                                <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <h3 class="pTitle">' . $row->title . '</h3>

                                <h4>Rs ' . $row->price . '/=</h4>
                                <p class="pDes">' . substr($row->description, 0, 50) . '</p>

                                <div class="input-group" style="width: 160px; margin: 0 auto;">
                                    <input type="number" class="form-control" placeholder="" value="1" name="quantity" id="quantity5'.$a.'"  min="1" required>
                                    <span class="input-group-btn">

                                    ';
                ?>
                <button class="btn crBtn btn-primary"
                        onclick="addtocart(<?php echo $row->id ?>, document.getElementById('quantity5<?php echo $a?>').value)">ADD
                    TO CART
                </button>

                <?php echo '
                                    </span>
                                </div>

                              </div>
                              </div>
                        </div>
                    </div>
                    ';
                  $a++;
            }

            ?>
        </div>
    </div>
    <br>
</div>





<div class="row ">
    <a href="products.php?cat=ElectricElectronics"><h3 class="text-center clr1C3682">Electric & Electronics</h3></a>
    <h4 class="text-center clr1C3682">( විදුලි උපකරණ )</h4>

    <div class="container">
        <div class="productSliders">
            <?php
            $a = 0;
            foreach ($ElectricElectronics as $row) {
                echo '
                        <div class="proPad">
                        <div class="border">
                        <div class=" padB30">
                            <div class="col-sm-12_ proBor_ bgfff">
                                <a href="product_view.php?id=' . $row->id . '">
                                <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <h3 class="pTitle">' . $row->title . '</h3>

                                <h4>Rs ' . $row->price . '/=</h4>
                                <p class="pDes">' . substr($row->description, 0, 45) . '</p>

                                <div class="input-group" style="width: 160px; margin: 0 auto;">
                                    <input type="number" class="form-control" placeholder="" value="1" name="quantity8'.$a.'" id="quantity8'.$a.'"  min="1" required>
                                    <span class="input-group-btn">

                                    ';
                ?>
                <button class="btn crBtn btn-primary"
                        onclick="addtocart(<?php echo $row->id ?>, document.getElementById('quantity8<?php echo $a?>').value)">ADD
                    TO CART
                </button>

                <?php echo '
                                    </span>
                                </div>

                              </div>
                              </div>
                        </div>
                    </div>
                    ';
                    $a++;
            }

            ?>
        </div>
    </div>
    <br>
</div>


<div class="row bgccc">
    <a href="products.php?cat=VegetableFruit"><h3 class="text-center clr1C3682">Vegetable & Fruit</h3></a>
    <h4 class="text-center clr1C3682">( එළවළු සහ පලතුරු )</h4>

    <div class="container">
        <div class="productSliders">
            <?php
            $a = 0;
            foreach ($VegetableFruit as $row) {
                echo '
                        <div class="proPad">
                        <div class="border">
                        <div class=" padB30">
                            <div class="col-sm-12_ proBor_ bgfff">
                                <a href="product_view.php?id=' . $row->id . '">
                                <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <h3 class="pTitle">' . $row->title . '</h3>

                                <h4>Rs ' . $row->price . '/=</h4>
                                <p class="pDes">' . substr($row->description, 0, 50) . '</p>

                                <div class="input-group" style="width: 160px; margin: 0 auto;">
                                    <input type="number" class="form-control" placeholder="" value="1" name="quantity" id="quantity7'.$a.'"  min="1" required>
                                    <span class="input-group-btn">

                                    ';
                ?>
                <button class="btn crBtn btn-primary"
                        onclick="addtocart(<?php echo $row->id ?>, document.getElementById('quantity7<?php echo $a?>').value)">ADD
                    TO CART
                </button>

                <?php echo '
                                    </span>
                                </div>

                              </div>
                              </div>
                        </div>
                    </div>
                    ';
                    $a++;
            }

            ?>
        </div>
    </div>
    <br>
</div>


<div class="row ">
    <a href="products.php?cat=BillPayment"><h3 class="text-center clr1C3682">Bill Payment</h3></a>
    <h4 class="text-center clr1C3682">( බිල්පත් ගෙවීම් )</h4>

    <div class="container">
        <div class="productSliders">
            <?php
            $a = 0;
            foreach ($BillPayment as $row) {
                echo '
                        <div class="proPad">
                        <div class="border">
                        <div class=" padB30">
                            <div class="col-sm-12_ proBor_ bgfff">
                                <a href="product_view.php?id=' . $row->id . '">
                                <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <h3 class="pTitle">' . $row->title . '</h3>

                                
                                <p class="pDes">' . substr($row->description, 0, 50) . '</p>

                                <div class="input-group" style="width: 160px; margin: 0 auto;">
                                  
                                </div>

                              </div>
                              </div>
                        </div>
                    </div>
                    ';
                    $a++;
            }

            ?>
        </div>
    </div>
    <br>
</div>


<div class="row bgccc">
    <a href="products.php?cat=Other"><h3 class="text-center clr1C3682">Other</h3></a>
    <h4 class="text-center clr1C3682">( වෙනත් )</h4>

    <div class="container">
        <div class="productSliders">
            <?php
            $a = 0;
            foreach ($Other as $row) {
                echo '
                        <div class="proPad">
                        <div class="border">
                        <div class=" padB30">
                            <div class="col-sm-12_ proBor_ bgfff">
                                <a href="product_view.php?id=' . $row->id . '">
                                <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <h3 class="pTitle">' . $row->title . '</h3>

                                <h4>Rs ' . $row->price . '/=</h4>
                                <p class="pDes">' . substr($row->description, 0, 50) . '</p>

                                <div class="input-group" style="width: 160px; margin: 0 auto;">
                                    <input type="number" class="form-control" placeholder="" value="1" name="quantity" id="quantity10'.$a.'"  min="1" required>
                                    <span class="input-group-btn">

                                    ';
                ?>
                <button class="btn crBtn btn-primary"
                        onclick="addtocart(<?php echo $row->id ?>, document.getElementById('quantity10<?php echo $a?>').value)">ADD
                    TO CART
                </button>

                <?php echo '
                                    </span>
                                </div>

                              </div>
                              </div>
                        </div>
                    </div>
                    ';
                    $a++;
            }

            ?>
        </div>
    </div>
    <br>
</div>


<input type="hidden" name="email" id="email" value="<?php echo $email; ?>">


<?php include_once 'footer.php'; ?>

<script type="text/javascript" src="homeSlider/engine1/wowslider.js"></script>
<script type="text/javascript" src="homeSlider/engine1/script.js"></script>
<script type="text/javascript" src="assets/slick/slick.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('.productSliders').slick({
            dots: true,
            infinite: true,
            arrows: true,
            speed: 2000,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [

                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },

                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>


<script type="text/javascript">


    var obj;

    function checkBrowser() {
        if (window.XMLHttpRequest) {
            obj = new XMLHttpRequest();
        } else {
            obj = new ActiveXobject("Microfoft.ActiveXobject");
        }
    }

    function addtocart(pid, quantity) {

        if (document.getElementById("email").value == "") {
            window.location = 'login.php';
        } else {

            checkBrowser();
            obj.onreadystatechange = function () {

                if (obj.readyState === 4 && obj.status === 200) {
                    // alert(obj.responseText);
                }
            };

            obj.open("POST", "functions/addToCart.php", true);
            obj.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            obj.send("pid=" + pid + "&qty=" + quantity + "");
            $("#count").load("functions/countCart.php");

            alert('Successfully added to cart')
        }
    }
</script>

</body>
</html>
