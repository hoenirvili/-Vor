<?php

declare(strict_types=1);

namespace Vor\Controllers;

class Login extends Controller{
    public function render() :void {
        if ($this->emptyParams())
            $this->view->render('login');
    }
}