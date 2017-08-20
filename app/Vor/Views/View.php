<?php

namespace Vor\Views;

use Vor\Core\Config;

class View {
    private $pages;

    public function __construct() {
        $config = Config::get();
        $this->pages = $config['pages'];
    }

    public function render(string $name=''): void {
        if (($name === '') || ($name === null))
            $name = 'index';

        require_once($this->pages[$name]);
    }
}