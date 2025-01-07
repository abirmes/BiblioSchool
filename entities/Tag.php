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

    
}