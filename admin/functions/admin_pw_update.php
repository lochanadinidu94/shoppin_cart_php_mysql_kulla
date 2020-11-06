<?php

include_once '../classes/db.class.php';
include_once '../classes/user.class.php';

$user = new User();
$getOldPass = $user->getOldPass();

$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];
$conPass = $_POST['conPass'];


if(md5($oldPass) == $getOldPass[0]->password){
    if($newPass == $conPass){
        $pass = md5($newPass);
        $updatePass = $user->updatePassword($pass);
        echo '<script> window.location.href = "../admin_password.php?msg=success"; </script>';
    }else{
        echo '<script> window.location.href = "../admin_password.php?msg=passMatchError"; </script>';
    }
}else{
    echo '<script> window.location.href = "../admin_password.php?msg=oldPassError"; </script>';
}





?>