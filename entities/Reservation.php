<?php

require_once 'Etat.php';
class Reservation
{

    private $etat;



    public function __construct()
    {
        $this->etat = new Etat();
    }
}