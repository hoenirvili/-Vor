<?php declare(strict_types=1);

namespace Vor\Controllers;

use Vor\Model\Articles();

class Home extends Controller {
    
    public function render(): string {
        if ($this->emptyParams()) {
            $articles = new Articles()
            $articles->page(1);
        }
    }
}
