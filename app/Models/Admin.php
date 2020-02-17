<?php


namespace app\Models;


class Admin
{

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUsers(){

        $query = "SELECT id, firstName, lastName, email, dateCreate from users";
        return $this->db->executeQuery($query);

    }

    public function updateArticle($id,$title,$description,$text,$categoryId){

        $query = "UPDATE articles SET title=?, description=?, text=?, categoryId=? where id=?";
        $res = $this->db->executeInsertUpdateDeleteQuery($query,[$title,$description,$text,$categoryId,$id]);
        if($res){

            $articles = $this->db->executeQuery("SELECT * from articles a inner join categories c on a.categoryId = c.id ORDER BY dateCreate DESC limit 10");
            return $articles;

        }
    }

    public function insertArticle($title,$description,$text,$categoryId,$image_name){

        $query = "INSERT INTO articles(title, description, text, categoryId, dateCreate, imgLink) VALUES(?,?,?,?,CURRENT_TIMESTAMP,? )";
        return $this->db->executeInsertUpdateDeleteQuery($query,[$title,$description,$text,$categoryId,$image_name]);

    }

    public function deleteUser($id){

        $query = "DELETE from users where id=?";
        $res = $this->db->executeInsertUpdateDeleteQuery($query,[$id]);
        if($res){

            $users = $this->db->executeQuery("SELECT * from users");
            return $users;

        }
    }

    public function deleteArticle($id){

        $query = "DELETE from articles where id=?";
        $res = $this->db->executeInsertUpdateDeleteQuery($query,[$id]);
        if($res){

            $users = $this->db->executeQuery("SELECT * from articles a inner join categories c on a.categoryId = c.id ORDER BY dateCreate DESC limit 10");
            return $users;

        }
    }
}