<?php


namespace app\Models;


class Login {

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function login($email,$passwordmd5){



                $query="SELECT id, firstName, lastName, roleId from users where email=? and password=?";
                $user = $this->db->executeQueryWithParamsAndOneResult($query, [$email,$passwordmd5]);
                return $user;



    }

}