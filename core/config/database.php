<?php
class DBConnection {

    public $conn;

    function DBConnection(){

        $host = 'localhost';
        $dbname = 'biblioschool';
        $user = 'root';
        $pass = '';
        

        try {
            $this -> conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $this -> conn -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this -> conn;
        }
        catch(PDOException $e) {

            echo 'ERROR: ' . $e->getMessage();
        }

    } 

} 





