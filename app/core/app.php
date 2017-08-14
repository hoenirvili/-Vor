<?php
declare(strict_types=1);

namespace App\Core;

class App {
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        echo "test";
    }

    public function parseUrl(): array {

        if (isset($_GET['url'])) {
            $url = explode('/',
                filter_var(rtrim($_GET['url'], '/'),
                    FILTER_SANITIZE_URL));
        }

        return $url;
    }
}