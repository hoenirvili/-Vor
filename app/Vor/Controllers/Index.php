<?php declare(strict_types = 1);

namespace Vor\Controllers;

use Http\Request;
use Http\Response;
use Vor\Views\Renderer;
use Vor\Models\Model;

class Index
{
    private $response;

    private $request;

    private $renderer;

    public function __construct(
        Response $response,
        Request $request,
        Renderer $renderer,
        Model $model
        )
    {
        $this->response = $response;
        $this->request = $request;
        $this->renderer = $renderer;
    }

    public function show(array $params): void
    {

        $html = $this->renderer->render('index');
        $this->response->setContent($html);
    }

    public function page(array $params): void {
        $n = (int)($params['page']);
        $articles = $this->model->page($n);
        var_dump($articles);
        die();
    }



}