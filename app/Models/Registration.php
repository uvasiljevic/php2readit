<?php


namespace app\Models;

class Registration {

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function registration($firstName,$lastName,$email,$passwordmd5){

                $query="INSERT INTO users (firstName, lastName, email, password, dateCreate, roleId)
                VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP, ?)";
                return $this->db->executeInsertUpdateDeleteQuery($query, [$firstName,$lastName,$email,$passwordmd5,2]);

    }

}