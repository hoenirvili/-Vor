<?php declare(strict_types=1);

namespace Vor\Controllers;

class Login extends Controller{
    public function render(): string {
        if ($this->emptyParams())
            return $this->view->html('login');
    }
}
