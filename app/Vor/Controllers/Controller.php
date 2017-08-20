<?php

declare(strict_types=1);

namespace Vor\Controllers;

use Vor\Views\View As View;

class Controller {

    private $params;

    protected  $view;

    public function __construct(array $params=null) {
        $this->params = $params;
        $this->view = new View();
    }

    public function render() :void {
        if ($this->emptyParams())
            $this->view->render();
    }

    protected final function emptyParams(): bool {
        if (($this->params === null) ||
            ($this->params === []))
            return true;

        return false;
    }
}