<?php declare(strict_types=1);

namespace Vor\Controllers;

use Vor\Views\View As View;

class Home {
    public static function render() {
        $view = new View('index');
        $view->render();
    }
}