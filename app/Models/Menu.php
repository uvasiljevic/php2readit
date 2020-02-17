<?php

namespace app\Models;

class Menu{

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll(){
        return $this->db->executeQuery("SELECT * from menu");
    }

    
}
