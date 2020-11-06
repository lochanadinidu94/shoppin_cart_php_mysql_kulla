<?php

	$servername = "localhost";
       $username = "esyshop_admin";
        $password = "Lg@io]Pe5U#0";
        $dbname = "esyshop_db";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);



// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>