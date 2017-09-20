<?php declare(strict_types=1);

define('ROOT', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);
define('APP', ROOT.DS.'app');
define('VOR', APP.DS. 'Vor');
define('CONTROLLERS', VOR.DS.'Controllers');
define('CORE', VOR.DS. 'Core');
define('VIEWS', VOR.DS. 'Views');
define('MODELS', VOR.DS. 'Models');
define('TEAMPLATES', VIEWS.DS. 'templates');

require_once ROOT.DS.'vendor'.DS.'autoload.php';

use Fastroute\RouteCollector;
use FastRoute\Dispatcher;
use Http\HttpRequest;
use Http\HttpResponse;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

error_reporting(E_ALL); // this should be turned off in production

$environment = 'development'; // this should 'production' in production

$whoops = new Run;
if ($environment !== 'production')
    $whoops->pushHandler(new PrettyPageHandler);
else
    $whoops->pushHandler(function($e){
        echo 'Todo: Friendly error page and send an email to the developer';
    });
$whoops->register();

$injector = require('Dependencies.php');

$request = $injector->make('Http\HttpRequest');
$response = $injector->make('Http\HttpResponse');

$routeDefinitions = function(RouteCollector $r) {
    $routes = require('routes.php');
    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
};

$dispatcher = \FastRoute\simpleDispatcher($routeDefinitions);
$method = $request->getMethod();
$path = $request->getPath();
$routeInfo = $dispatcher->dispatch($method, $path);
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        $response->setContent('404 - Page not found');
        $response->setStatusCode(404);
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $response->setContent('405 - Method not allowed');
        $response->setStatusCode(405);
        break;
    case Dispatcher::FOUND:
        $class = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];
        $object = $injector->make($class);
        $object->$method($vars);
        break;
}

foreach ($response->getHeaders() as $header)
    header($header, false);

echo $response->getContent();