<?php


namespace app\Controllers;
use app\Models\Articles;
use app\Models\Admin;


class AdminController extends Controller
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getarticleForUpdate(){

        if(isset($_POST['send'])){
            $articleModel = new Articles($this->db);

            $id = $_POST['id'];

            try{

                $article = $articleModel->getOneArticle($id);
                if($article){

                    echo \json_encode($article);
                    http_response_code(200);

                }else{

                    http_response_code(400);

                }

            }catch(\PDOException $ex){
                echo $ex->getMessage();
            }
        }

    }

    public function updateArticle()
    {

        if (isset($_POST['send'])) {
            $adminModel = new Admin($this->db);

            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $text = $_POST['text'];
            $categoryId = $_POST['categoryId'];


            try {

                $update = $adminModel->updateArticle($id, $title, $description, $text, $categoryId);

                if ($update) {

                    http_response_code(200);
                    echo \json_encode($update);


                } else {

                    http_response_code(400);

                }

            } catch (\PDOException $ex) {
                echo $ex->getMessage();
            }
        }
    }

    public function insertArticle()
    {

        if (isset($_POST['btninsert'])) {
            $adminModel = new Admin($this->db);

            $title = $_POST['title'];
            $description = $_POST['description'];
            $text = $_POST['text'];
            $categoryId = $_POST['categoryId'];
            $image = $_FILES['image'];
            $image_name = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_type = $_FILES['image']['type'];
            $image_exp = explode('.', $image_name);
            $image_extension = strtolower(end($image_exp));
            $types = array('jpg', 'jpeg', 'png');
            $valid = true;
            if(!in_array($image_extension, $types)){
                $valid = false;
            }
            if(empty($title)){
                $valid = false;
            }
            if(empty($description)){
                $valid = false;
            }
            if(empty($text)){
                $valid = false;
            }
            if(empty($categoryId)){
                $valid = false;
            }


            if($valid){
                $imgToDatabase = "app/assets/images/".$image_name;
                move_uploaded_file($image_tmp, "$imgToDatabase");
                try {

                    $insert = $adminModel->insertArticle($title, $description, $text, $categoryId, $image_name);

                    if ($insert) {
                        header('Location: index.php?page=admin');
                        var_dump($insert);
                        var_dump('tu je');


                    } else {

                        http_response_code(500);

                    }

                } catch (\PDOException $ex) {
                    echo $ex->getMessage();
                }
            }
            else{
                http_response_code(400);
            }


        }
    }

    public function deleteUser()
    {

        if (isset($_POST['send'])) {
            $adminModel = new Admin($this->db);

            $id = $_POST['id'];

            try {

                $delete = $adminModel->deleteUser($id);

                if ($delete) {

                    echo \json_encode($delete);
                    http_response_code(200);

                } else {

                    http_response_code(400);

                }

            } catch (\PDOException $ex) {
                echo $ex->getMessage();
            }
        }
    }

    public function deleteArticle(){
        if (isset($_POST['send'])) {
            $adminModel = new Admin($this->db);

            $id = $_POST['id'];

            try {

                $delete = $adminModel->deleteArticle($id);

                if ($delete) {

                    echo \json_encode($delete);
                    http_response_code(200);

                } else {

                    http_response_code(500);

                }

            } catch (\PDOException $ex) {
                echo $ex->getMessage();
            }
        }
    }

}