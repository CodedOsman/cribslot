<?php

class Dbh{
    private $username = "root";
    private $password = "";
    private $dbname = "cribslotdb";
    private $host = "localhost";

    protected function connect(){
        try{
            $dbh = new PDO('mysql:host=' . $this->host . ';dbname='. $this->dbname, $this->username, $this->password);
            return $dbh;
        }
        catch(PDOException $e){
            error_log($e->getMessage(), 3, '../log/php_errors.log');
            die("A database error occured. Try again later.");
        }
    }
}