<?php declare(strict_types=1);

namespace Vor\Core;

use Vor\Controllers\Home as Home;

class App {
    private $url;

    public function __construct(string $url = '') {
        $this->url = $url;
    }

    public function response() {
        if ($this->url === '') {
            Home::render();
            return;
        }
    }
}