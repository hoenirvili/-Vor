<?php declare(strict_types=1);

namespace Vor\Controllers;

use Vor\Models\Article;
use Vor\Views\View;
use Vor\Core\ErrorPage;

class Home extends Controller {

    protected function emptyParams(): bool {
        if (!isset($this->params))
            return true;

        if (!isset($this->params['page'])) {
            return true;
        }

        return false;
    }

    public function page(int $n = 1): string {
        $articles = new Article();
        $params = $articles->page($n);
        $view = new View($params);
        return $view->html();
    }

    public function render(): string {

        if ($this->emptyParams())
            return $this->page();

        $page = $this->params['page'];
        if ((!is_string($page)) ||
            (!mb_detect_encoding($page, 'ASCII', true)) ||
            (!is_numeric($page)) ||
            (is_float($page)) ||
            (!ctype_digit($page))) {
            return ErrorPage::internal('Invalid page number');
        }

        $n = (int)$page;
        if (($n <= 0) || ($n >= PHP_INT_MAX))
            return ErrorPage::internal('Invalid page number');

       return $this->page($n);
    }
}