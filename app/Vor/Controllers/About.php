<?php declare(strict_types = 1);

namespace Vor\Controllers;

use Http\Request;
use Http\Response;
use Vor\Views\Renderer;

class About
{
    private $response;

    private $request;

    private $renderer;

    public function __construct(
        Response $response,
        Request $request,
        Renderer $renderer
        )
    {
        $this->response = $response;
        $this->request = $request;
        $this->renderer = $renderer;
    }

    public function show(array $params): void
    {
        $html = $this->renderer->render('about');
        $this->response->setContent($html);
    }


}