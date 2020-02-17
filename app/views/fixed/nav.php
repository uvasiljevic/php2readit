<?php
require_once "app/config/autoload.php";
require_once "app/config/database.php";

use app\Models\DB;
$db = new DB(SERVER, DATABASE, USERNAME, PASSWORD);
$menuControler    = new \app\Controllers\MenuController($db);
$navMenu          = $menuControler->getMenu();
?>
<body>

<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">Read<i>it</i>.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <?php
                foreach($navMenu as $nm):
                ?>
                <li class="nav-item"><a href="index.php?page=<?= $nm->link ?>" class="nav-link"><?= $nm->title ?></a></li>
                <?php
                endforeach;
                ?>
                <?php
                if(isset($_SESSION['user']) && $_SESSION['user']->roleId == 1){

                    echo '<li class="nav-item"><a href="index.php?page=singout" class="nav-link">Sing out</a></li>';
                    echo '<li class="nav-item"><a href="index.php?page=admin" class="nav-link">Admin</a></li>';
                }
                else if(isset($_SESSION['user'])){

                    echo '<li class="nav-item"><a href="index.php?page=singout" class="nav-link">Sing out</a></li>';
                }
                else{
                    echo '<li class="nav-item"><a href="index.php?page=login" class="nav-link">Sing in | up</a></li>';
                }
                ?>


            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->