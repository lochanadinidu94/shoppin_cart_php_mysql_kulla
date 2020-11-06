<?php

//	$myemail = "sameeraherathlive@gmail.com";
//	$mypass = "s";

include_once "../admin/classes/db.class.php";
include_once '../admin/classes/customer.class.php';



	if (isset($_POST['login'])) {
		
		$email = $_POST['email'];
		$password = $_POST['password'];


		$customer = new customer();
		$get_customers = $customer->get_customer_login($email);
		

		if ($email == $get_customers[0]->email AND $password == $get_customers[0]->password) {
				
				if (isset($_POST['remember'])) {
					setcookie('email', $email, time()+60*60*7);
					setcookie('password', $password, time()+60*60*7);
					
				}
				session_start();
					$_SESSION['email'] = $email;


			if(!empty($_POST['pid'])){
				$id = $_POST['pid'];
				header("location: ../product_view.php?id=$id");
			}else{
				header("location: ../index.php");
			}

		}else{
			header("location: ../login.php?message=error");
		}

	} else{
		header("location: ../login.php");
	}

 ?>