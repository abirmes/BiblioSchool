<?php
require_once "../core/config/database.php";



class Shared
{
    protected int $id;
    protected string $name;
    protected string $description;
    protected $tableName;
    protected $db;


    public function __construct()
    {
        $this->db = new DBConnection();
    }


    public function set_id($id)
    {
        $this->id = $id;
    }
    public function set_name($name)
    {
        $this->name = $name;
    }
    public function set_description($description)
    {
        $this->description = $description;
    }



    public function get_id()
    {
        return $this->id;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function get_description()
    {
        return $this->description;
    }



    public function create($name, $description)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            try {
                $query = 'INSERT INTO '. $this->tableName  . 'VALUES (NULL, :categorie , :description);';
                $stmt = $this->db->getConnexion()->prepare($query);
                $stmt->bindParam('categorie', $name);
                $stmt->bindParam('description', $description);
                $stmt->execute();
            } catch (PDOException $e) {
                echo 'Message: ' . $e->getMessage();
            }
        }
    }

    public function bring_all()
    {
        $query = 'select * from '. $this->tableName  . '';
        $stmt = $this->db->getConnexion()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function bring_one($id)
    {
        $query = 'SELECT * FROM '. $this->tableName  . 'WHERE id = :id;';
        $stmt = $this->db->getConnexion()->prepare($query);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;

    }


    public function update( $id, $name, $description)
    {
        try {
            $query = 'UPDATE '. $this->tableName  . ' SET `categorie` = :categorie , `description` = :description WHERE `id` = :id;';
            $stmt = $this->db->getConnexion()->prepare($query);
            $stmt->bindParam('categorie', $name);
            $stmt->bindParam('description', $description);
            $stmt->bindParam('id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Message: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $query = 'DELETE FROM '. $this->tableName  . ' WHERE `id` = :id;';
            $stmt = $this->db->getConnexion()->prepare($query);
            $stmt->bindParam('id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Message: ' . $e->getMessage());
        }
    }

}