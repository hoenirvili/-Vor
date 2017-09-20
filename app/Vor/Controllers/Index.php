<?php declare(strict_types = 1);

namespace Vor\Controllers;

use Http\Request;
use Http\Response;
use Vor\Views\Renderer;

class Index
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

    public function show(): void
    {
        $data = [
            'name' => $this->request->getParameter('name', 'anothername'),
        ];
        $html = $this->renderer->render('index', $data);
        $this->response->setContent($html);
    }

}