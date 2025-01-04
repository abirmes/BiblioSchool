<?php
class DBConnection {

    private $conn;

    public function __construct(){

        $host = 'localhost';
        $dbname = 'biblioschool';
        $user = 'root';
        $pass = '';
        

        try {
            $this -> conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $this -> conn -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // return $this -> conn;
        }
        catch(PDOException $e) {

            echo 'ERROR: ' . $e->getMessage();
        }

    } 

    public function getConnexion() {
        return $this->conn;
    }

} 





