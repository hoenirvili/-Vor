<?php

namespace Vor\Views;

class View {
    private $file;

    public function __construct(string $name='') {
        if ($name === '')
            throw new \InvalidArgumentException (
                "View needs a valid template file name");

        $config = include(__DIR__ . '/../../config.php');
        $file = __DIR__ . '/' . $config['pages'][$name];
        if (!file_exists($file)) {
            throw new \InvalidArgumentException(
                'View file does not exist'
            );
        }

        $this->file = $file;
    }

    public function render(): void {
        require_once($this->file);
    }
}