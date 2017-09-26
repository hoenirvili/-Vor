<?php declare(strict_types = 1);

namespace Vor\Controllers;

use ReflectionClass;
use Http\Request;
use Http\Response;
use Vor\Views\Renderer;
use Vor\Models\Model;

class Controller {

    protected $response;

    protected $request;

    protected $renderer;

    protected $model;

    protected $name;


    public function __construct(
        Response $response,
        Request  $request,
        Renderer $renderer,
        Model    $model)
    {
        $this->response = $response;
        $this->request  = $request;
        $this->renderer = $renderer;
        $this->model    = $model;
        $reflection = new ReflectionClass($this);
        $this->name = $reflection->getShortName();
        $this->name = strtolower($this->name);
    }
}