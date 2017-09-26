<?php declare(strict_types = 1);

namespace Vor\Controllers;


class Archive extends Controller
{
    public function show(array $params): void
    {
        $records = $this->model->records();
        foreach ($records as $key=>$value) {
            // var_dump($key);
            // echo "</br>";
             // echo "</br>";
            var_dump($value);
            echo "</br>";
        }
        die();
        $html = $this->renderer->render($this->name);
        $this->response->setContent($html);
    }
}