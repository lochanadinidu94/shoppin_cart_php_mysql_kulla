<?php 

	session_start();
	echo "welcome ".$_SESSION['email'];
	echo "welcome ".$_SESSION['name'] ;

	

	echo "<a href='functions/logout.php'>logout</a>";
 ?>