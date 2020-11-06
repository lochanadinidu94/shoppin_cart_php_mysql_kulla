<?php

$servername = "localhost";
$username = "esyshop_admin";
$password = "Lg@io]Pe5U#0";
$dbname = "esyshop_db";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$oldPass = $_POST['pn'];

$sql = "INSERT INTO allproductname (name)
VALUES ('".$oldPass."')";

if ($conn->query($sql) === TRUE) {
    echo '<script> window.location.href = "../admin_password.php?msg1=success"; </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>