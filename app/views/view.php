<?php


class View {
    private $file;

    public function View(string $name='') {
        if ($name === '')
            throw new InvalidArgumentException ("View needs a valid template file name");
        $this->file;
    }

    public function render(): void {
        require_once $file;
    }
}