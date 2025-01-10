<?php

require_once 'Etat.php';
require_once 'Livre.php';


class Reservation
{

    private $duration;
    private $etat;
    private $livre;



    public function __construct($duration)
    {
        $this->duration = $duration;
        $this->etat = new Etat();
        $this->livre = new Livre();

    }


    public function set_duration($duration)
    {
        $this->duration = $duration;
    }
    public function get_duration()
    {
        return $this->duration;
    }
    public function set_livre($livre)
    {
        $this->livre = $livre;
    }
    public function get_livre()
    {
        return $this->livre;
    }
    public function set_etat($etat)
    {
        $this->etat = $etat;
    }
    public function get_etat()
    {
        return $this->etat;
    }
    
}
