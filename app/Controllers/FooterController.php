<?php
namespace app\Controllers;


use app\Models\Articles;

class FooterController extends Controller{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function footerArticles(){
        $articlesModel = new Articles($this->db);
        $articles = $articlesModel->getAllArticles(0,2);
        return $articles;

    }
}