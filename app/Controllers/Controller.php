<?php

namespace app\Controllers;

class Controller {
    protected $data;

    public function __construct()
    {
        $this->data["footerNav"] = [];
    }

    protected function view($fileName, $data = []){

        extract($data); // OD ASOCIJATIVNOG NIZA - PRAVI PROMENJIVE

        include "app/views/fixed/head.php";
        include "app/views/fixed/nav.php";
        include "app/views/fixed/slider.php";
        include "app/views/pages/".$fileName.".php";
        include "app/views/fixed/footer.php";
    }


}