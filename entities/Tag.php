<?php
require_once 'shared.php';

class Tag extends Shared
{
    

    public function __construct()
    {
        parent::__construct();
    }
    
    public function __toString()
    {
        return 'the tag is : ' . $this->get_name() . ' / its description: ' . $this->get_description();
    }

    public function create($name, $description)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            try {
                $query = 'INSERT INTO `tag` VALUES (NULL, :tag , :description);';
                $stmt = $this->db->getConnexion()->prepare($query);
                $stmt->bindParam('tag', $name);
                $stmt->bindParam('description', $description);
                $stmt->execute();
            } catch (PDOException $e) {
                echo 'Message: ' . $e->getMessage();
            }
        }
    }

    public function bring_all()
    {
        $query = 'select * from `tag`';
        $stmt = $this->db->getConnexion()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function bring_one($id)
    {
        $query = 'SELECT * FROM `tag` WHERE id = :id;';
        $stmt = $this->db->getConnexion()->prepare($query);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;

    }


    public function update($id, $name, $description)
    {
        try {
            $query = 'UPDATE `tag` SET `tag` = :tag , `description` = :description WHERE `id` = :id;';
            $stmt = $this->db->getConnexion()->prepare($query);
            $stmt->bindParam('tag', $name);
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
            $query = 'DELETE FROM `tag` WHERE `id` = :id;';
            $stmt = $this->db->getConnexion()->prepare($query);
            $stmt->bindParam('id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die('Message: ' . $e->getMessage());
        }
    }
}