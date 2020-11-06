<?php
include_once "../admin/classes/db.class.php";
include_once '../admin/classes/customer.class.php';

$customer = new customer();

$data = $customer->get_customer();

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conPassword = $_POST['conPassword'];

    if($email == $data[0]->email){
        header("Location: ../register.php?error=email");
    }else{
        if ($password == $conPassword) {
//            $password = md5($password);

            $customer->addCustomer($name, $email, $password, $gender, $address, $contact);


            $_SESSION['message'] = "You are now loged in";
            $_SESSION['name'] = $name;

//            var_dump($name, $email, $password, $gender, $address, $contact);
            header("Location: ../login.php?reg=pass");
        } else {
            $_SESSION['message'] = "The two passwords do not match";
            header("Location: ../register.php?error=pw");
        }
    }




}
?>