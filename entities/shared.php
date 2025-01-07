<?php
require_once "../core/config/database.php";



class Shared
{
    protected int $id;
    protected string $name;
    protected string $description;
    protected $tableName;
    protected $db;


    public function __construct($name , $description)
    {
        $this->db = new DBConnection();
        $this->name = $name;
        $this->description = $description;

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



    public function create()
    {
                $query = 'INSERT INTO '. $this->tableName  . 'VALUES (NULL, :categorie , :description);';
                $stmt = $this->db->getConnexion()->prepare($query);
                $stmt->bindParam('categorie', $this->name);
                $stmt->bindParam('description', $this->description);
                $stmt->execute();
                $this->id = $this->db->getConnexion()->lastInsertId();
            
    }
    

    public function bring_all()
    {
        $query = 'select * from '. $this->tableName  . '';
        $stmt = $this->db->getConnexion()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function bring_one()
    {
        $query = 'SELECT * FROM '. $this->tableName  . 'WHERE id = :id;';
        $stmt = $this->db->getConnexion()->prepare($query);
        $stmt->bindParam('id', $this->id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;

    }
    public function bring_one_by_name($name)
    {
        $query = 'SELECT * FROM '. $this->tableName  . 'WHERE name = :name;';
        $stmt = $this->db->getConnexion()->prepare($query);
        $stmt->bindParam('name', $name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;

    }


    public function update()
    {
        try {
            $query = 'UPDATE '. $this->tableName  . ' SET `categorie` = :categorie , `description` = :description WHERE `id` = :id;';
            $stmt = $this->db->getConnexion()->prepare($query);
            $stmt->bindParam('categorie', $this->name);
            $stmt->bindParam('description', $this->description);
            $stmt->bindParam('id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Message: ' . $e->getMessage());
        }
    }

    public function delete()
    {
        try {
            $query = 'DELETE FROM '. $this->tableName  . ' WHERE `id` = :id;';
            $stmt = $this->db->getConnexion()->prepare($query);
            $stmt->bindParam('id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Message: ' . $e->getMessage());
        }
    }
    function save() {
    if ($this->id == null) {
        $this->create($this->name , $this->description);
    } else if ($this->id != null) {
        $this->update();
    }
}

}