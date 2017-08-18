<?php

namespace Vor\Views;

use Vor\Core\Config;

class View {
    private $file;

    public function __construct(string $name='') {
        if ($name === '')
            throw new \InvalidArgumentException (
                "View needs a valid template file name");

        $config = Config::get();
        $this->file = $config['pages'][$name];
    }

    public function render(): void {
        require_once($this->file);
    }
}