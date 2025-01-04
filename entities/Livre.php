<?php
require_once "Tag.php";
require_once "Categorie.php";

class Livre 
{
    private string $auteur;
    private string $name;
    private string $description;
    private $categorie;
    private $tag = [];

    public function __construct($name , $auteur , $description){
        $this->name = $name;
        $this->auteur = $auteur;
        $this->description = $description;
    }

    public function set_auteur($auteur)
    {
        $this->auteur = $auteur;
    }
    public function get_auteur()
    {
        return $this->auteur;
    }
    public function set_name($name)
    {
        $this->name = $name;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function set_description($description)
    {
        $this->description = $description;
    }
    public function get_description()
    {
        return $this->description;
    }


    public function add_categorie(Categorie $categorie)
    {
        $this->categorie = $categorie;
    }

    public function add_tag(Tag $tag)
    {
        $this->tag[] = $tag;
    }









}