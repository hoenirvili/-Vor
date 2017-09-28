<?php declare(strict_types = 1);

namespace Vor\Controllers;

class About extends Controller
{
    public function show(array $params): void
    {
        $html = $this->renderer->render($this->name);
        $this->response->setContent($html);
    }
}