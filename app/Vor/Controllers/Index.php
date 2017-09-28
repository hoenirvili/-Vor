<?php declare(strict_types = 1);

namespace Vor\Controllers;

use Vor\Core\Error;

class Index extends Controller
{
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