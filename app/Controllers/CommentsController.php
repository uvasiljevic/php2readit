<?php

namespace app\Controllers;

use app\Models\Comments;

class CommentsController extends Controller{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertComment(){

        header("Content-Type: application/json");
        if(isset($_POST["send"])) {
            $commentsModel = new Comments($this->db);

            $commentText = $_POST['comment'];
            $articleId = $_POST['id'];
            $userId = $_SESSION['user']->id;
            try{
                $comments = $commentsModel->insertComment($commentText, $articleId, $userId);

                if($comments){
                    echo \json_encode($comments);
                    http_response_code(201);
                }
                else{
                    http_response_code(500);
                }
            }catch (\PDOException $ex) {
                echo 'Error: ' . $ex->getMessage();
            }


        }





    }



}