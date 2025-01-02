<?php
require_once "../core/config/database.php";
// global $newConnection;
// $newConnection = new DBConnection();



class Etat
{
    private int $id;
    private string $name;
    private string $description;
    private $db;


    public function __construct()
    {
        $this->db = (new DBConnection())->DBConnection();
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


    public function __toString()
    {
        return 'the Etat is : ' . $this->get_name() . ' / its description: ' . $this->get_description();
    }

    public function create($name, $description)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            try {
                $query = 'INSERT INTO `Etat` VALUES (NULL, :Etat , :description);';
                $stmt = $this->db->prepare($query);
                $stmt->bindParam('Etat', $name);
                $stmt->bindParam('description', $description);
                $stmt->execute();
            } catch (PDOException $e) {
                echo 'Message: ' . $e->getMessage();
            }
        }
    }

    public function bring_all()
    {
        $query = 'select * from `Etat`';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function bring_one($id)
    {
        $query = 'SELECT * FROM `Etat` WHERE id = :id;';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function update($id, $name, $description)
    {
        try {
            $query = 'UPDATE `Etat` SET `Etat` = :Etat , `description` = :description WHERE `id` = :id;';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('Etat', $name);
            $stmt->bindParam('description', $description);
            $stmt->bindParam('id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $query = 'DELETE FROM `Etat` WHERE `id` = :id;';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam('id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }
}
// $abir = new Etat();
$abir->update(1 , 'philosophy' , 'where people minds meet');
//  $abir->bring_one(1);
