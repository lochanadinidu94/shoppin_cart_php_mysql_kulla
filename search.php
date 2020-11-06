<?php

session_start();
if (!empty($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    $email = null;
}

//
include_once "admin/classes/db.class.php";
include_once 'admin/classes/product.class.php';

$search = $_POST['search'];

$products = new products();
$getSearch = $products->getSearchResult($search);




//var_dump($getSearch);


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


<div class=" padT30" >

    <div class="indexProducts">
        <?php
        if (!empty($getSearch)) {
            $a = 0;
            foreach ($getSearch as $row) {
              if(!empty($row->title_sinhala)){
                $title_sinhala = '<h4>'.$row->title_sinhala.'</h4>';
              }else{
                $title_sinhala = '<h4>&nbsp;</h4>';
              }

                echo '
                    <div class="col-lg-3 col-md-3 col-sm-4 padB30">
                        <div class="col-lg-12 col-md-12 col-sm-12 proBor">
                            <div class="col-sm-12_ proBor_">
                                <a href="product_view.php?id=' . $row->id . '">
                                <img src="admin/functions/' . $row->cvr_img . '" alt="" width="100%">
                                </a>
                            </div>
                            <div class="col-sm-12 text-center">
                               
                                <h4>Rs ' . $row->price . '/=</h4>
                                <p class="pDes">'.substr($row->description,0,50).'</p>

                                <div class="input-group" style="width: 160px; margin: 0 auto;">
                                    <input type="number" value="1" class="form-control" placeholder="" name="quantity" id="quantity"  min="1" required>
                                    <span class="input-group-btn">

                                    ';
                    ?>
                    <button class="btn crBtn btn-primary"
                            onclick="addtocart(<?php echo $row->id ?>, document.getElementById('quantity').value)">ADD
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
        }



        ?>

    </div>

</div>



<div class="row padT30"></div>
<input type="hidden" name="email" id="email" value="<?php echo $email; ?>">

<?php include_once 'footer.php'; ?>



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
                    alert(obj.responseText);
                }
            };

            obj.open("POST", "functions/addToCart.php", true);
            obj.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            obj.send("pid=" + pid + "&qty=" + quantity + "");

            alert('Successfully added to cart')
        }
    }
</script>

</body>
</html>
