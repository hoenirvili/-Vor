<?php declare(strict_types = 1);

namespace Vor\Controllers;

use phpDocumentor\Reflection\Types\Void_;


class Archive extends Controller
{
    public function show(array $params): void
    {
        $records = $this->model->records();
        $html = $this->renderer->render($this->name, $records);
        $this->response->setContent($html);
    }

    public function page(array $params): void
    {
        //TODO(hoenir): finish this
        $this->show($params);
    }
}