<?php

namespace Vor\Core;

use Http\Response;
use Vor\Views\Renderer;


class Error
{
    private $response;

    private $renderer;

    private $name = 'error';

    public function __construct(Response $response, Renderer $renderer)
    {
        $this->response = $response;
        $this->renderer = $renderer;
    }

    private function error(int $code, string $message)
    {
         $html = $this->renderer->render($this->name, [
            'code'      => $code,
            'message'   => $message
        ]);
        $this->response->setStatusCode($code);
        $this->response->setContent($html);
    }

    public function internal(): void
    {
        $this->error(505, 'Internal server error');
    }

    public function notfound(): void
    {
        $this->error(404, 'Content Not found');
    }

    public function notallowed(): void
    {
        $this->error(405, 'Method not allowed');
    }

    public function badrequest(): void
    {
        $this->error(400, 'Bad Request');
    }
}