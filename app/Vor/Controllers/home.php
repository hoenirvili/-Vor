<?php declare(strict_types=1);

namespace Vor\Controllers;

use Vor\Models\Article;
use Vor\Views\View;

class Home extends Controller {

    public function render(): string {
        if ($this->emptyParams()) {
            $articles = new Article();
            $params = $articles->page(1);
            $view = new View($params);
            return $view->html();
        }
    }
}
