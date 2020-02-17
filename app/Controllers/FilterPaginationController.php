<?php


namespace app\Controllers;

use app\Models\Articles;


class FilterPaginationController extends Controller
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getPagination(){

        header("Content-Type: application/json");
        if(isset($_POST["send"])) {
            $articlesModel = new Articles($this->db);

            $number1 = $_POST['number1'];
            $number2 = $_POST['number2'];

            try{
                $articles = $articlesModel->getAllArticles($number1, $number2);

                if($articles){
                    http_response_code(200);
                    echo \json_encode($articles);

                }
                else{
                    http_response_code(500);
                }
            }catch (\PDOException $ex) {
                echo 'Error: ' . $ex->getMessage();
            }


        }

    }

    public function getFilter(){

        header("Content-Type: application/json");
        if(isset($_POST["send"])) {
            $articlesModel = new Articles($this->db);

           $id = $_POST['id'];

            try{
                $articles = $articlesModel->getAllArticles1($id);

                if($articles){

                    http_response_code(200);
                    echo \json_encode($articles);

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