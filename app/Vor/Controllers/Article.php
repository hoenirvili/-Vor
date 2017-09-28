<?php declare(strict_types = 1);

namespace Vor\Controllers;

class Article extends Controller
{
    public function show(array $params): void
    {
        $this->page(['page'=>1]);
    }

    public function page(array $params): void
    {
        $id = (int)$params['page'];
        $article = $this->model->get($id);
        $html = $this->renderer->render($this->name, $article);
        $this->response->setContent($html);
    }
}