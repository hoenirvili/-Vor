<?php
declare(strict_types=1);

namespace Core;

use controllers;

class App {
    private $url;

    public function __construct(string $url = '') {
        if ($url === '') {
            $home = controllers\Home('index.php');
            $home->render();
            echo ' Totusi?!';
            return;
        }

        $this->url = $url;
    }

    public function response() {
            //Router($this->url)->call();
    }
}