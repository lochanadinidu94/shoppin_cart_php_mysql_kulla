<?php

session_start();
if (!empty($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    $email = null;
}


include_once 'admin/classes/db.class.php';
include_once 'admin/classes/product.class.php';
$category = $_GET['cat'];
$products = new products();
$perPage = 12;
$data = $products->getProductsPage(0, $perPage, $category);
$totalPros = $products->getTotPrductsCount($category)->iCount;
$maxpages = ceil($totalPros / $perPage);
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

<?php

$enname = "";
$snname = "";

$inname = $_GET['cat'];

if ($inname == 'InitialProducts') {
    $enname = 'Foods & Essential Goods';
    $snname = '( ආහාර හා අත්‍යවශ්‍ය ද්‍රව්‍ය )';

}elseif ($inname == 'HomeCareCleaning') {
    $enname = 'Home Care & Cleaning';
    $snname = '( ගෘහ සත්කාරක හා පිරිසිදුකාරක )';

}elseif ($inname == 'PersonalCareToiletries') {
    $enname = 'Personal Care & Toiletries';
    $snname = '( පුද්ගල පිරිසිදුකාරක හා සනීපාරක්ෂක ද්‍රව්‍ය )';

}elseif ($inname == 'BabyCare') {
    $enname = 'Baby Products';
    $snname = '( ළදරු නිෂ්පාදන )';

}elseif ($inname == 'StationeriesSchoolItems') {
    $enname = 'Books-Stationery & School Item';
    $snname = '( පොත් ලිපි ද්‍රව්‍ය හා පාසල් උපකරණ )';

}elseif ($inname == 'FrozenChilledfoods') {
    $enname = 'Frozen & Chilled foods';
    $snname = '( සීත කල ආහාර )';

}elseif ($inname == 'VegetableFruit') {
    $enname = 'Vegetable & Fruit';
    $snname = '( එළවළු සහ පලතුරු )';

}elseif ($inname == 'ElectricElectronics') {
    $enname = 'Electric & Electronics';
    $snname = '( විදුලි උපකරණ )';

}elseif ($inname == 'BillPayment') {
    $enname = 'Bill Payment';
    $snname = '( බිල්පත් ගෙවීම් )';

}elseif ($inname == 'Other') {
    $enname = 'Other';
    $snname = '( වෙනත් )';
}

?>


<h3 class="text-center clr1C3682"><?php echo "$enname"; ?></h3>
<h4 class="text-center clr1C3682"><?php echo "$snname"; ?></h4>

<div class="row">
    <div class="row padT30" id="pro_content">
        <div class="indexProducts">
            <?php
            if (!empty($data)) {
                $a = 0;
                foreach ($data as $row) {
                    if(!empty($row->title_sinhala)){
                      $title_sinhala = '<h4>'.$row->title_sinhala.'</h4>';
                    }else{
                      $title_sinhala = '<h4>&nbsp;</h4>';
                    }
                    
                    if($inname == 'BillPayment'){
                        echo '
                            <div class="col-lg-3 col-md-3 col-sm-4 padB30">
                                <div class="col-lg-12 col-md-12 col-sm-12 proBor">
                                    <div class="col-sm-12_ proBor_">
                                        <a href="product_view.php?id=' . $row->id . '">
                                        <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                        </a>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <div class="minHPro">
                                            <h3 class="pTitle">' . $row->title . '</h3>
                                            '.$title_sinhala.'
                                            <p class="pDes">'.substr($row->description,0,40).'</p>
                                        </div>
                                    </div>    
                                </div>
                            </div>    
                        ';
                    }else{
                        echo '
                            <div class="col-lg-3 col-md-3 col-sm-4 padB30">
                            <div class="col-lg-12 col-md-12 col-sm-12 proBor">
                                <div class="col-sm-12_ proBor_">
                                    <a href="product_view.php?id=' . $row->id . '">
                                    <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                    </a>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <div class="minHPro">
                                        <h3 class="pTitle">' . $row->title . '</h3>
                                        '.$title_sinhala.'
                                        <h4>Rs ' . $row->price . '/=</h4>
                                        <p class="pDes">'.substr($row->description,0,40).'</p>
                                    </div>

                                    <div class="input-group" style="width: 160px; margin: 0 auto;">
                                        <input type="number" class="form-control" placeholder="" value="1" name="quantity" id="quantity'.$a.'"  min="1" required>
                                        <span class="input-group-btn">

                                        ';
                        ?>
                            <button class="btn crBtn btn-primary"
                                    onclick="addtocart(<?php echo $row->id ?>, document.getElementById('quantity<?php echo $a?>').value)">ADD
                                TOCART
                            </button>

                            <?php echo '
                                            </span>
                                        </div>

                                      </div>
                                </div>
                                </div>
                        ';
                    }

                    
                $a++;
                }
            }


            echo '<div class="col-sm-12 text-center"> <br>';
            for ($i = 0; $i < $maxpages; $i++) {
                if ($i == 0) {
                    echo ' <button class="btn btn-warning" onclick=""> ' . ($i + 1) . '</button> ';
                } else {
                    echo ' <button class="btn btn1" onclick="loadPros(\'' . $i . '\')"> ' . ($i + 1) . '</button> ';
                }
            }
            echo '</div >';
            ?>

        </div>
    </div>
</div>
</div>

<div class="padT30"></div>
<?php include_once 'footer.php'; ?>
<input type="hidden" name="email" id="email" value="<?php echo $email; ?>">

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

            alert('Successfully added to cart')
        }
    }
</script>


<script type="text/javascript">
    function loadPros(val) {
        $.ajax({
            url: 'functions/ajax_get_pros.php',
            data: {
                page: val, perPage: '<?php echo $perPage ?>', cat: '<?php echo $category ?>'
            },
            type: "post",
            success: function (data) {
                console.log(data);
                document.getElementById("pro_content").innerHTML = data;
                $(".pro_content_in").responsiveSlides({
                    auto: true,             // Boolean: Animate automatically, true or false
                    speed: 500,            // Integer: Speed of the transition, in milliseconds
                    timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
                });
            }
        });
    }
</script>



</body>
</html>
