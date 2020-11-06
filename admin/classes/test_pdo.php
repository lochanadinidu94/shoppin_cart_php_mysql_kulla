<?php 
include_once 'db.class.php';
$db = new DB();

$db->pdo_prepare("SELECT * FROM `sugesstions`");
var_dump($db->pdo_execute())

;



?>