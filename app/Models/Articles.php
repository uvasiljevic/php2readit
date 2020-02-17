<?php

namespace app\Models;

class Articles{

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllArticles($number1, $number2){
        return $this->db->executeQuery("SELECT a.id as id, a.dateCreate, a.title, a.text, c.categoryName, a.imgLink, a.description from articles a inner join categories c on a.categoryId = c.id ORDER BY dateCreate DESC limit $number1, $number2");
    }

    public function getOneArticle($id){
        $query = "SELECT a.id, a.title, a.text, c.categoryName, a.imgLink, a.description, c.id as categoryId from articles a inner join categories c on a.categoryId=c.id where a.id=?";
        return $this->db->executeQueryWithParamsAndOneResult($query, [$id]);

    }

    public function getArticlesForPagination(){
        $query = "SELECT * from articles";
        return $this->db->executeQuery($query);

    }

    public function getAllArticles1($id){
        if($id == 0){
            return $this->db->executeQuery("SELECT a.id as id, a.dateCreate, a.title, a.text, c.categoryName, a.imgLink, a.description from articles a inner join categories c on a.categoryId = c.id ORDER BY dateCreate DESC");
        }
        else{
            return $this->db->executeQuery("SELECT a.id as id, a.dateCreate, a.title, a.text, c.categoryName, a.imgLink, a.description from articles a inner join categories c on a.categoryId = c.id where a.categoryId = ". $id ." ORDER BY dateCreate DESC ");
        }

    }
}