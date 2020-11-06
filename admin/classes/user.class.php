<?php


class User
{
    var $db;

    function User()
    {
        $this->db = new DB();
    }

    function login($username, $pass)
    {


        $data = mysql_query("SELECT password FROM `users` WHERE username='" . $username . "' LIMIT 1");
        $num_rows = mysql_num_rows($data);
        if ($num_rows > 0) {
            if (mysql_result($data, 0) == md5($pass)) {
                $time = new Times();
                mysql_query("UPDATE `users` SET last_login='" . $time->getFullTime() . "' WHERE username='" . $username . "'");
                $user_id = mysql_query("SELECT id FROM `users` WHERE username='" . $username . "' LIMIT 1");
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_id'] = mysql_result($user_id, 0);
                $_SESSION['loggedin'] = 1;
                return "1";
            } else {
                return "-1";
            }
        } else {
            return "-1";
        }
    }

    function signout()
    {
        $time = new Times();
        mysql_query("UPDATE `users` SET last_logout='" . $time->getFullTime() . "' WHERE id=" . $this->getID());
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['loggedin'] = 0;
        echo "<script>
        window.location.href='../login.php';
        </script>";
    }

    function editProfile($fname, $lname, $curPass, $newPass)
    {

        if ($curPass !== '') {
            $data = mysql_query("SELECT password FROM `users` WHERE id='" . $this->getID() . "' LIMIT 1");
            $num_rows = mysql_num_rows($data);
            if ($num_rows > 0) {
                if (mysql_result($data, 0) === md5($curPass)) {
                    mysql_query("UPDATE `users` SET (first_name, last_name, password) VALUES ('$fname', '$lname', 'md5($newPass)') WHERE id=" . $this->getID());
                    return "1";
                } else {
                    return "-1";
                }
            }
        } else {
            mysql_query("UPDATE `users` SET first_name='$fname', last_name='$lname' WHERE id=" . $this->getID());
            return "1";
        }
    }

    function getID()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['user_id'])) {
            return $_SESSION['user_id'];
        } else {
            return -1;
        }
    }

    function getIDFromEmail($email)
    {
        $results = $this->db->query("SELECT id FROM `users` WHERE email='$email' LIMIT 1");
        return mysql_fetch_row($results);

    }

    function get_name($id)
    {
        if ($id == -1) {
            $data = mysql_query("SELECT * FROM `users` WHERE id=" . $this->getID() . " LIMIT 1");
        } else {
            $data = mysql_query("SELECT * FROM `users` WHERE id=" . $id . " LIMIT 1");
        }
        $data = mysql_fetch_array($data, MYSQL_ASSOC);
        return $data['first_name'] . ' ' . $data['last_name'];
    }

    function getProfile($id)
    {
        if ($id == -1) {
            $id = $this->getID();
        }
        $result = mysql_query("SELECT * FROM `users` WHERE id=" . $id . " LIMIT 1");
        $return;

        while ($project = mysql_fetch_assoc($result)) {
            $return[] = $project;
        }

        $result = mysql_query("SELECT COUNT(id) as pcount FROM `product` WHERE created_by=" . $id);
        $return[] = mysql_fetch_assoc($result);

        if (isset($return)) {
            return $return;
        } else {
            return array();
        }
    }

    function register($fname, $lname, $email, $telephone, $address, $city)
    {
        $results = $this->db->query("SELECT * FROM `users` WHERE email='$email' LIMIT 1");
        if (mysql_num_rows($results) > 0) {
            return "-1";
        } else {
            $this->db->query("INSERT INTO `users` (fname, lastname, email, phone_number, address, city) VALUES ('$fname', '$lname', '$email', '$telephone', '$address', '$city')");
            return "1";
        }

        function checkValidCredentials($email, $password)
        {
            $results = $this->db->query("SELECT * FROM `users` WHERE email='$email' LIMIT 1");
            if (mysql_num_rows($results) > 0) {
                $result = mysql_fetch_row($results);
                if ($result["password"] == md5($password)) {
                    return 1;
                } else {
                    return -2;
                }
            } else {
                return "-1";
            }
        }


    }


    function getOldPass(){
        $result = $this->db->query("SELECT * FROM users");
        $return = array();

        while ($row = mysql_fetch_object($result)) {
            $return [] = $row;
        }
        return $return;
    }

    function updatePassword($newPass){
        return $this->db->query("UPDATE users SET password='$newPass'  WHERE username='admin'");
    }


}

/*end class*/
