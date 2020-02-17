<?php
namespace app\Models;

class Comments{

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function showComments($id){

        $query = "SELECT u.firstName, u.lastName, c.commentText, c.commDateCreate from comments c inner join articles a on c.articleId = a.id inner join users u on c.userId = u.id where c.articleId = ?";
        return $this->db->executeQueryWithParams($query,[$id]);

    }

    public function countComments($id){

        $query = "SELECT COUNT(*) as number from comments where articleId = ?";
        return $this->db->executeQueryWithParams($query,[$id]);

    }

    public function insertComment($commentText,$articleId,$userId){

            $query = "INSERT INTO comments (commentText, articleId, userId)
                VALUES (?, ?, ?)";
            $res = $this->db->executeInsertUpdateDeleteQuery($query,[$commentText,$articleId,$userId]);

            if($res){
                $query = "SELECT u.firstName, u.lastName, c.commentText, c.commDateCreate from comments c inner join articles a on c.articleId = a.id inner join users u on c.userId = u.id where c.articleId = ?";
                return $this->db->executeQueryWithParams($query,[$articleId]);


            }

    }


}