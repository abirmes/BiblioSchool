<?php
require_once "shared.php";

// global $newConnection;
// $newConnection = new DBConnection();



class Categorie extends Shared
{
    protected $tableName = "categorie";

    public function __construct()
    {
        parent::__construct();
    }

    public function __toString()
    {
        return 'the categorie is : ' . $this->get_name() . ' / its description: ' . $this->get_description();
    }

    
}
$abir = new Categorie();
$abir->update( 1 , 'philosop' , 'where people minds meet');
var_dump($abir);

// $abir->bring_one(1);
