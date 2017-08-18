<?php

declare(strict_types=1);

namespace Vor\Core;

use Vor\Controllers\Home as Home;

final class App {
    private $url;

    public function __construct(string $url = '') {
        if ($url !== '') {
            if (!preg_match($url, "[a-z]+/"))
               throw \InvalidArgumentException("The path is not a valid url");
            }

        $this->url = $url;
    }

    public function response() {
        if ($this->url === '') {
            throw new \Exception("Error Processing Request");
            Home::render();
            return;
        }

        //TODO(hoenir): add checking code
        $lists = explode('/', $this->url);
        $controller = $lists[0];
        $method = $lists[1];
        $params = array_slice($lists, 2);
        $object = new $controller;
        call_user_method($method, $object, $params);

    }
}