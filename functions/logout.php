<?php
	
	session_start();
	session_destroy();
	if (isset($_COOKIE['email']) AND isset($_COOKIE['password'])){
		$email = $_COOKIE['emil'];
		$password = $_COOKIE['password'];
		setcookie('email', $email, time()-1);
		setcookie('password', $password, time()-1);
	}
	
	header('Location: ../login.php');
	
?>