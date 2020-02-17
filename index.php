<?php
ob_start();
session_start();
//session_destroy();
require_once "app/config/autoload.php";
require_once "app/config/database.php";


use app\Controllers\PageController;
use app\Controllers\LoginController;
use app\Controllers\CommentsController;
use app\Controllers\AdminController;
use app\Controllers\FilterPaginationController;
use app\Models\DB;

$db = new DB(SERVER, DATABASE, USERNAME, PASSWORD);

$pageController = new PageController($db);
$loginController = new LoginController($db);
$commentsController = new CommentsController($db);
$adminController = new AdminController($db);
$filterPaginationController = new FilterPaginationController($db);

if(isset($_GET['page'])){
    switch($_GET['page']){
        case "home":
            $pageController->home();
            break;
        case "articles":
            $pageController->articles();
            break;
        case "about":
            $pageController->about();
            break;
        case "contact":
            $pageController->contact();
            break;
        case "article":
            $pageController->article();
            break;
        case "login":
            $pageController->login();
            break;
        case "admin":
            $pageController->admin();
            break;
        case "registration":
            $loginController->insertUser();
            break;
        case "log":
            $loginController->findUser();
            break;
        case "singout":
            $loginController->logout();
            break;
        case "insertComment":
            $commentsController->insertComment();
            break;
        case "getArticleForUpdate":
            $adminController->getarticleForUpdate();
            break;
        case "updateArticle":
            $adminController->updateArticle();
            break;
        case "insertArticle":
            $adminController->insertArticle();
            break;
        case "deleteUser":
            $adminController->deleteUser();
            break;
        case "deleteArticle":
            $adminController->deleteArticle();
            break;
        case "homePagination":
            $filterPaginationController->getPagination();
            break;
        case "filterArticles":
            $filterPaginationController->getFilter();
            break;
        case "adminPagination":
            $filterPaginationController->getPagination();
            break;
            default:
                $pageController->home();
    }
} else {
    $pageController->home();
}



?>
