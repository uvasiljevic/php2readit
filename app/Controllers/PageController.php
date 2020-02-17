<?php

namespace app\Controllers;


use app\Models\Articles;
use app\Models\Categories;
use app\Models\Comments;
use app\Models\Admin;

class PageController extends Controller {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function home(){

        $articlesModel = new Articles($this->db);
        $articles = $articlesModel->getAllArticles(0,6);
        $allArticles = $articlesModel->getArticlesForPagination();

        $this->view("home", [
            "title" => "ReadIT | HOME PAGE",
            "articles" => $articles,
            "allArticles" => $allArticles
        ]);
    }

    public function articles(){
        $articlesModel = new Articles($this->db);
        $categoriesModel = new Categories($this->db);

        $articles = $articlesModel->getAllArticles1(0);
        $categories = $categoriesModel->getCategories();
        $allArticles = $articlesModel->getArticlesForPagination();

        $this->view("articles", [
            "title" => "ReadIT | ARTICLES PAGE",
            "articles" => $articles,
            "categories" => $categories,
            "allArticles" => $allArticles
        ]);
    }

    public function article(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $articleModel = new Articles($this->db);
            $commentsModel = new Comments($this->db);

            $article = $articleModel->getOneArticle($id);

            $articles = $articleModel->getAllArticles(0,3);

            $comments = $commentsModel->showComments($id);

            $countComments = $commentsModel->countComments($id);

            $this->data["title"] = "ReadIT | ARTICLE PAGE";
            $this->data["article"] = $article;
            $this->data['recentArticles'] = $articles;
            $this->data['comments'] = $comments;
            $this->data['countComments'] = $countComments;



            $this->view('article', $this->data);

        }
        else{
            header('Location: index.php');
        }
    }

    public function login() {
        $this->view("login",[
            "title" => "ReadIT | SING UP PAGE"
        ]);
    }

    public function about() {
        $this->view("about",[
        "title" => "ReadIT | ABOUT PAGE"
        ]);
    }

    public function contact() {
        $this->view("contact",[
            "title" => "ReadIT | CONTACT PAGE"
        ]);
    }

    public function admin() {
        $adminModel = new Admin($this->db);
        $articlesModel = new Articles($this->db);
        $categoryModel = new Categories($this->db);
        $users = $adminModel->getUsers();
        $articles = $articlesModel->getAllArticles(0,10);
        $categories = $categoryModel->getCategories();
        $allArticles = $articlesModel->getArticlesForPagination();

        $this->view("admin", [
            "users"=>$users,
            "articles"=>$articles,
            "categories"=>$categories,
            "allArticles"=>$allArticles,
            "title" => "ReadIT | ADMIN PAGE"
        ]);
    }

}