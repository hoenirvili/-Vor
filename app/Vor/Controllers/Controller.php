<?php declare(strict_types=1);

namespace Vor\Controllers;

use Vor\Views\View;

class Controller {

    private $params = [];

    protected $view;

    public function __construct(array $params=[]) {
        $this->params = $params;
        $this->view = new View();
    }

    public function render(): string{
        if ($this->emptyParams())
            return $this->view->html();
    }

    protected final function emptyParams(): bool {
        return isset($this->params);
    }
}
