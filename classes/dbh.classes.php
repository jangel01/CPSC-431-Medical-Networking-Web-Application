<?php 

class Dbh {
    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=jason_schedulePlatform_db', $username, $password);
            return $dbh;
        } catch (PDOException $e){
            print("Error connecting to SQL Server: " . $e->getMessage() . "<br/>");
            die();
        }
    }
}