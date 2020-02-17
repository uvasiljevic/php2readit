<?php
namespace app\Controllers;

use app\Models\Menu;

class MenuController extends Controller{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getMenu(){
        $menuModels = new Menu($this->db);
        $menu = $menuModels->getAll();
        return $menu;
    }

    public function getHome(){
        $menuModels = new Menu($this->db);
        $home = $menuModels->getHome();
        return $home;
    }
}