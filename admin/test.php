<HTML>


<body>
dfghjhgfdfghjjh

<select >
<option value="">Select Product</option>

<?php


$servername = "localhost";
$username = "esyshop_admin";
$password = "Lg@io]Pe5U#0";
$dbname = "esyshop_db";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name FROM allproductname";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>


                                    <option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
                                

<?php
    }
} else {
    echo "0 results";
}

$conn->close();


?>
</select>
                                

                                

</body>

</HTML>	