<?php declare(strict_types = 1);

use Auryn\Injector;

$injector = new Injector;

$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER,
]);

$templatePath = ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Vor'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'templates';

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');
$injector->alias('Vor\Views\Renderer', 'Vor\Views\Mustache');
$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader($templatePath, [
            'extension' => '.html',
        ]),
    ],
]);

return $injector;