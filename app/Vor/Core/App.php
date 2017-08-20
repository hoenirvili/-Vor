<?php

declare(strict_types=1);

namespace Vor\Core;

use TreeRoute\Router;
use Vor\Http\StatusCode;
use Vor\Core\ErrorPage;

final class App {
    private $url;

    public function __construct(string $url='/') {
        $this->url = $url;
    }

    public function render(): void {
        $router = new Router();
        $router->get('/',           'Home');
        $router->get('/index',      'Home');
        $router->get('/about',      'About');
        $router->get('/article',    'Article');
        $router->get('/archive',    'Archive');
        $router->get('/dashboard',  'Dashboard');
        $router->get('/login',      'Login');

        if ((!isset($_SERVER['REQUEST_METHOD'])) ||
            ($_SERVER['REQUEST_METHOD'] === null))
            throw new LogicException("Error Processing Request");

        $method = $_SERVER['REQUEST_METHOD'];

        $result = $router->dispatch($method, $this->url);

        if (!isset($result['error'])) {
            $handler    = $result['handler'];
            $params     = $result['params'];
            $class      = 'Vor\Controllers\\' . $handler;
            $controller = new $class($params);

            $controller->render($params);
        } else {

            switch ($result['error']['code']) {
            case StatusCode::NOT_FOUND:
                ErrorPage::render(new StatusCode(
                    StatusCode::NOT_FOUND));
                break;
            default:
                ErrorPage::render(new StatusCode(
                    StatusCode::INTERNAL_SERVER_ERROR));
            }

        }
    }
}
