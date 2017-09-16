<?php declare(strict_types=1);

namespace Vor\Controllers;

class Article extends Controller{
    public function render(): string{
        if ($this->emptyParams())
            return $this->view->html('article');
    }
}
