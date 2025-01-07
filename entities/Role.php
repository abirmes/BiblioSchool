<?php

class Role
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
        if($name == 'apprenant' || $name == 'administrateur' || $name == 'gerant')
        {
            $this->name = $name;
        }
        else
        {
            echo 'ce nest pas un role';
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