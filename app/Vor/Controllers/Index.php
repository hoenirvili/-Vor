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

    private $model;

    public function __construct(
        Response $response,
        Request $request,
        Renderer $renderer,
        Model $model)
    {
        $this->response = $response;
        $this->request = $request;
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function show(array $params): void
    {
        $this->page(['page'=>1]);
    }

    public function page(array $params): void
    {
        $n = (int)($params['page']);
        $articles = $this->model->page($n);

        $code = 200;
        $page = 'Index';

        if ($articles === []) {
            $code = 404;
            $page = 'error';
            $articles = [
                'code'=> $code,
                'message' => 'Page not found',
            ];
        }

        $this->response->setStatusCode($code);
        $html = $this->renderer->render($page, $articles);
        $this->response->setContent($html);
    }
}