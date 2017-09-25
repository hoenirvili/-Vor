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
use Vor\Core\Error;

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

// callback for creating all the routes in routes.php
$routeDefinitions = function(RouteCollector $r) {
    $routes = require('routes.php');
    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
};
// create the dispatches from our previous callback
$dispatcher = \FastRoute\simpleDispatcher($routeDefinitions);

$method = $request->getMethod();
$path = $request->getPath();
$routeInfo = $dispatcher->dispatch($method, $path);

$renderer = $injector->make('Vor\Views\Mustache');

$error = new Error($response, $renderer);

switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        $error->notfound();
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $error->notallowed();
        break;
    case Dispatcher::FOUND:
        $class = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $params = $routeInfo[2];
        // this will instantiate the $class
        // and add inject his dependencies
        $object = $injector->make($class);
        // call the method for the route
        $object->$method($params);
        break;
}


// prepare all headers and output the response
foreach ($response->getHeaders() as $header)
    header($header, false);
echo $response->getContent();