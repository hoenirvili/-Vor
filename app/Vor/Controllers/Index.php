<?php declare(strict_types = 1);

namespace Vor\Controllers;

use Http\Request;
use Http\Response;
use Vor\Views\Renderer;
use Vor\Models\Model;
use Vor\Core\Error;

class Index
{
    private $response;

    private $request;

    private $renderer;

    private $model;

    private $name = 'index';

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
        $page = $this->model->page($n);

        if ($page['articles'] === []) {
            $error = new Error($this->response, $this->renderer);
            $error->notfound();
            return;
        }

        $html = $this->renderer->render($this->name, $page);
        $this->response->setContent($html);
    }
}