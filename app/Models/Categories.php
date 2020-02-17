<?php

namespace app\Models;

class Categories{

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCategories(){
        return $this->db->executeQuery("SELECT * from categories");
    }

}