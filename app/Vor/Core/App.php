<?php declare(strict_types=1);

namespace Vor\Core;

use TreeRoute\Router;
use Vor\Http\StatusCode;
use Vor\Core\ErrorPage;

final class App {

    private $url;

    public function __construct(string $url=DS) {
        $this->url = $url;
    }

    public function render(): string {

        $router = new Router();
        $router->get('/', 'Home');
        $router->get('/{page:[0-9]+}', 'Home');
        $router->get('/index', 'Home');
        $router->get('/index/{page:[0-9]+}', 'Home');
        $router->get('/about', 'About');
        $router->get('/article', 'Article');
        $router->get('/archive', 'Archive');
        $router->get('/dashboard', 'Dashboard');
        $router->get('/login', 'Login');

        if ((!isset($_SERVER['REQUEST_METHOD'])) ||
            ($_SERVER['REQUEST_METHOD'] === null))
            return ErrorPage::internal("Invalid request method");

        $method = $_SERVER['REQUEST_METHOD'];

        $result = $router->dispatch($method, $this->url);

        if (isset($result['error'])) {
            switch ($result['error']['code']) {
            case StatusCode::NOT_FOUND:
                return ErrorPage::notfound();
            case StatusCode::METHOD_NOT_ALLOWED:
                return ErrorPage::render(new StatusCode(
                    $result['error']));
            default:
                return ErrorPage::internal();
            }
        }

        $handler    = $result['handler'];
        $params     = $result['params'];
        $class      = 'Vor\Controllers\\' . $handler;
        $controller = new $class($params);

        // render the page calling the controller
        return $controller->render($params);
    }
}
