<?php



    date_default_timezone_set("Asia/Colombo");
    date_default_timezone_get();


    // get the form fields
//    $subject = 'Email from www.realestateagents.com';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $messages = $_POST['messages'];



    //$date = date('d-M-y h:i:s A');



    //var_dump($heading,$contact_number,$email,$description);

    /*
     * mailing function
     */
//    $to = 'dsameera.sense@gmail.com';
      $to = 'esyshopsales@gmail.com';



    $headers = "From: " . strip_tags($email) . "\r\n";
    $headers .= "Reply-To: " . strip_tags($email) . "\r\n";
    //$headers .= "CC: imranfdo.sense@gmail.com \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message = '

					<html xmlns="http://www.w3.org/1999/html">
<body style="margin-left: auto; margin-right: auto; margin-top: 0px;  display: block; ">

<div style="width: 100%; height: 8px; background: #5e5e5e; display: block;"></div>


<div style="width: 80%; margin-right: auto; margin-left: auto; height: 1px; background: #ccc; "></div>

<div class="hello" style="width: 70%; margin-left: auto; margin-right: auto; font-size: 20px; padding: 40px 0 0; color: #555;">
    Hi,
</div>

<div style="width: 65%; margin-right: auto; margin-left: auto; padding: 20px 0 40px; text-align: justify; font-size: 18px; color: #555;">
    You have a new email form ' . $name . '.
</div>

<div style="width: 100%; background: #eaeaea; height: auto; padding: 40px 0; text-align: center;">
    <table style="margin-left: auto; margin-right: auto; font-size: 20px; color: #555;">
        <tr>
            <td style="text-align: left">Name</td>
            <td>:</td>
            <td style="text-align: left">' . $name . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Email</td>
            <td>:</td>
            <td style="text-align: left">' . $email . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Subject</td>
            <td>:</td>
            <td style="text-align: left">' . $subject . '</td>
        </tr>

        <tr>
            <td style="text-align: left">Message</td>
            <td>:</td>
            <td style="text-align: left">' . $messages . '</td>
        </tr>


    </table>
</div>


</body>
</html>
                     ';


    mail($to, $subject, $message, $headers);

//    $customer->checkoutCart($email);




    //echo "Mail sent successfully";
    header("Location:../thank_you.php");
//        echo "<script>window.location='../checkout_thank_you.php'</script>";




?>