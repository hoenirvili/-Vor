<?php declare(strict_types = 1);

namespace Vor\Controllers;

use Vor\Core\Error;

class Index extends Controller
{
    //TODO(hoenir): return the title article and date in date order, 6 results
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

    public function byTag(array $params): void
    {
        $name = $params['name'];
        $page_number = (int)$params['page'];
        
        $page = $this->model->byTag($page_number, $name);
        if ($page['articles'] === []) {
            $error = new Error($this->response, $this->renderer);
            $error->notfound();
            return;
        }
        
        $html = $this->renderer->render($this->name, $page);
        $this->response->setContent($html);
    }
}