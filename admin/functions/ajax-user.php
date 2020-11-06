<?php
include_once("../classes/db.class.php");
include_once("../classes/time.class.php");
include_once("../classes/user.class.php");

$user = new User();
if (isset($_POST["login"])) {

  $username = mysql_real_escape_string($_POST['username']);
  $pass = mysql_real_escape_string($_POST['password']);
  $data = $user->login($username, $pass);
  echo $data;

} else if (isset ($_GET["logout"])) {
  $user->signout();
} 
