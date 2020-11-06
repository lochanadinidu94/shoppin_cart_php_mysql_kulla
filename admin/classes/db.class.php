<?php

class DB{
    var $db="esyshop_db";
    var $username="root";
    var $pass="";
    var $server="127.0.0.1";
    var $pdo_con = "";
    var $pdo_stmt = "";
    
    function DB(){
        mysqli_connect($this->server, $this->username, $this->pass) or die("Server connection unsuccessfull.");
        mysqli_select_db($this->db) or die("Database connection unsuccessfull.");
        
        $this->pdo_con = new PDO("mysql:host=".$this->server.";dbname=".$this->db, $this->username, $this->pass);
        // set the PDO error mode to exception
        $this->pdo_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    function query($query){
        return mysql_query($query);
    }
    function pdo_query($query){
        
    }
    
    function pdo_prepare($query){
        $this->pdo_stmt = $this->pdo_con->prepare($query);
    }
    
    function pdo_bindParam($name,  $variable){
        $this->pdo_stmt->bindParam(':'.$name, $variable);
    }
    
    function pdo_execute(){
        $this->pdo_stmt->execute();
        return $this->pdo_stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function resultRows($result){
        return mysql_num_rows($result);
    }

    function lastInsertId($table){
        $results = $this->query("SELECT MAX(id) FROM ".$table);
        return mysql_fetch_row($results);
    }

}

?>