<?php
declare(strict_types=1);

namespace controllers;

class Home extends Controller {
    public static function render() {
        $view = new views\View('index.php');
        $view->render();
    }
}