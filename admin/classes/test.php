<HTML>


<body>


<?php

                                //include_once("classes/db_con.php");

                                $servername_1 = "localhost";
                                $username_1 = "esyshop_admin";
                                $password_1 = "Lg@io]Pe5U#0";
                                $dbname_1 = "esyshop_db";

        // Create connection
                                $conn_1 = mysqli_connect($servername_1, $username_1, $password_1, $dbname_1);


                                $query = $conn_1->prepare("SELECT * from allproductname"); //where userreg.Name = 'Manidu'
                                $query->execute();
                                $result_1 = $query->fetchAll();


                                ?>

                                <select name="product_title" id="product_title" class="form-control" title="" required>
                                    <option value="">Select Product</option>
                                    

                                </select>

</body>

</HTML>	