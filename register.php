<?php
session_start();
include_once("admin/classes/db.class.php");
include_once("admin/classes/time.class.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register || EsyShop.lk</title>
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
		<div class="container">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<form class="" action="functions/register.php" method="post">
					<br>
					<h3 class="form-signin-heading">Register</h3>

					<?php
						if(!empty($_GET['error'])){
							if( $_GET['error'] == 'email'){
								echo '
								<div class="alert alert-danger">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Email already exist!</strong>
								</div>
								';
							}

							if( $_GET['error'] == 'pw'){
								echo '
								<div class="alert alert-danger">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>The two passwords do not match!</strong>
								</div>
								';
							}
						}

					?>


					<label for="inputEmail" class="sr-only">Full Name</label>
					<input type="text" id="name" name="name" class="form-control" placeholder="Full Name" required autofocus>
					<br>
					<label for="inputEmail" class="sr-only">Gender</label>
					<select name="gender" id="gender" class="form-control" title="" required>
						<option value="">Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
					<br>
					<label for="inputEmail" class="sr-only">Address</label>
					<input type="text" id="address" name="address" class="form-control" placeholder="Address" required autofocus>
					<br>
					
					<label for="inputEmail" class="sr-only">Contact No</label>
					<input type="number" id="contact" name="contact" class="form-control" placeholder="Contact No" required autofocus>
					<br>
					<label for="inputEmail" class="sr-only">Email address</label>
					<input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
					<br>
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
					<br>
					<input type="password" id="conPassword" name="conPassword" class="form-control" placeholder="Confirm Password" required>
					<br>
					<input class="btn btn-md btn-primary btn-block" type="submit" value="Register" name="register">
				</form>
			</div>
		</div>
		<div class="padT30"></div>


		<?php include_once 'footer.php'; ?>
		
		
	</body>
</html>