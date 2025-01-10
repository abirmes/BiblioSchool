<?php
require_once "Tag.php";
require_once "Categorie.php";
require_once "database.php";


class Livre
{
    private string $auteur;
    private string $name;
    private string $description;
    private $categorie;
    private $db;
    private $tag = [];

    public function __construct()
    {
        $this->db = new DBConnection();

        // $this->name = $name;
        // $this->auteur = $auteur;
        // $this->description = $description;
    }

    public function set_auteur($auteur)
    {
        $this->auteur = $auteur;
    }
    public function get_auteur()
    {
        return $this->auteur;
    }
    public function set_book_name($name)
    {
        $this->name = $name;
    }
    public function get_book_name()
    {
        return $this->name;
    }
    public function set_book_description($description)
    {
        $this->description = $description;
    }
    public function get_book_description()
    {
        return $this->description;
    }


    public function add_categorie($name, $description)
    {
        $this->categorie = new Categorie($name, $description);
    }

    public function add_tag($name, $description)
    {
        $this->tag[] = new Tag($name, $description);
    }

    public function get_book_by_tag($categorie)
    {

        $sql = 'SELECT * FROM `livre` WHERE categorie = :categorie';
        $stmt = $this->db->getConnexion()->prepare($sql);
        $stmt->bindParam(':categoie' , $categorie);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_book_by_categorie($categorie)
    {

        $sql = 'SELECT * FROM `livre` WHERE categorie = :categorie';
        $stmt = $this->db->getConnexion()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }






}
