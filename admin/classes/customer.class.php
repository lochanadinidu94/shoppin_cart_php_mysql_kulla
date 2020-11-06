<?php

class customer
{


    var $db;

    function customer()
    {
        $this->db = new DB();
    }

    function addCustomer($name, $email, $password, $gender, $address, $contact)
    {
        return $this->db->query("INSERT INTO `customer` ( `name`, `email`, `password`, `gender`, `address`, `contact`) VALUES ('$name', '$email', '$password', '$gender', '$address', '$contact')");
    }

    function get_customer()
    {

        $result = $this->db->query("SELECT * FROM customer WHERE status =1 ORDER BY id DESC");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_customer_cart($email)
    {

        $result = $this->db->query("SELECT * FROM customer WHERE status =1 AND email='$email'");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_customer_cart_last($email)
    {

        $result = $this->db->query("SELECT * FROM cart WHERE checkout =0 AND email='$email' ORDER BY id DESC LIMIT 20");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_customer_login($email)
    {

        $result = $this->db->query("SELECT * FROM customer WHERE status =1 AND email='$email'");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_pro_data($pid){
        $result = $this->db->query("SELECT * FROM products WHERE status =1 AND id='$pid'");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function getCart($email)
    {

        $result = $this->db->query("SELECT * FROM cart WHERE checkout =1 AND email='$email'");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function addCart($email, $name, $gender, $address, $contact, $pid, $title, $des, $product_type, $quantity, $price, $tprice, $dis_quantity, $dis_price)
    {
        return $this->db->query("INSERT INTO `cart` ( `email`, `name`, `gender`, `address`, `contact`,`pro_id`, `pro_name`, `description`, `pro_type`, `quantity`, `price`, `total_price`, `dis_size`, `dis_price`) VALUES ('$email','$name', '$gender', '$address', '$contact', '$pid', '$title', '$des', '$product_type', '$quantity', '$price', '$tprice', '$dis_quantity', '$dis_price')");
    }

    function updateCart($tprice,$id, $quantity){
        return $this->db->query("UPDATE cart SET quantity='$quantity', total_price='$tprice' WHERE id=$id");
    }

    function totalPrice($email){
        $result = $this->db->query("SELECT SUM(total_price) as tPrice FROM cart WHERE email='$email' AND checkout=1");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function deleteCart($id){
        return $this->db->query("DELETE  FROM cart WHERE id='$id'");
    }

    function addCart2($email,$pid,$quantity){
        return $this->db->query("INSERT INTO `cart_email` ( `email`, `pid`, `qty`) VALUES ('$email','$pid', '$quantity')");
    }


    function getCheckout($email)
    {

        $result = $this->db->query("SELECT * FROM cart WHERE checkout =1 AND email='$email'");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }


    function checkoutCart($email){
        return $this->db->query("UPDATE cart SET checkout=0  WHERE email='$email'");
    }

    function getPHistory($email)
    {
        $result = $this->db->query("SELECT * FROM cart WHERE checkout=0 AND email='$email' ORDER BY id DESC LIMIT 20");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }


    function get_customers()
    {

        $result = $this->db->query("SELECT * FROM customer WHERE status =1 ORDER BY id DESC");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function get_orders($email)
    {

        $result = $this->db->query("SELECT * FROM cart WHERE email='$email' ORDER BY id DESC");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function getCountCart($email){
        $result = $this->db->query("SELECT COUNT(*) as cartCount FROM cart WHERE checkout=1 AND email='$email'");
        return mysql_fetch_object($result);
    }

    function getTotalcart($email){
        $result = $this->db->query("SELECT SUM(total_price) as totp FROM cart WHERE checkout=1 AND email='$email'");
        return mysql_fetch_object($result);
    }



}

?>
