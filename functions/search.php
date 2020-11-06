<?php

session_start();
//
include_once "../admin/classes/db.class.php";
include_once '../admin/classes/product.class.php';


$search = $_POST['search'];

$products = new products();
$getSearch = $products->getSearchResult($search);


var_dump($getSearch);


?>





