<?php

class Etat
{
    private int $id;
    private string $name;


    public function __construct()
    {
        // $this->id = $id;
        // $this->name = $name;
    }


    public function set_id($id)
    {
        $this->id = $id;
    }
    public function set_name($name)
    {
        if($name == 'pending' || $name == 'confirmé' || $name == 'terminé')
        {
            $this->name = $name;
        }
        else
        {
            echo 'ce nest pas une etat';
        }
        
    }
    public function get_id()
    {
        return $this->id;
    }
    public function get_name()
    {
        return $this->name;
    }
}