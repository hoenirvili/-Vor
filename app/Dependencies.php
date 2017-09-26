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

$hostname   = (($env = getenv('PHP_DB_HOSTNAME')) !== false) ? $env : '';
$port       = (($env = getenv('PHP_DB_PORT')) !== false) ? $env : '';
$username   = (($env = getenv('PHP_DB_USERNAME')) !== false) ? $env : '';
$password   = (($env = getenv('PHP_DB_PASSWORD')) !== false) ? $env : '';

$options    = [
                \PDO::ATTR_ERRMODE              => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE   => \PDO::FETCH_ASSOC,
                \PDO::ATTR_PERSISTENT           => true,
                \PDO::ATTR_EMULATE_PREPARES     => false,
            ];
$dsn        = "mysql:host=$hostname;port=$port;dbname=vor;charset=utf8";

$injector->share('PDO');
$injector->define('PDO', [
    ':dsn'      => $dsn,
    ':username' => $username,
    ':passwd'   => $password,
    ':options'  => $options
]);

$injector->share('Vor\Models\Article');
$injector->define('Vor\Controllers\Index', ['model' => 'Vor\Models\Article']);
$injector->share('Vor\Models\Archive');
$injector->define('Vor\Controllers\Archive', ['model' => 'Vor\Models\Archive']);

$templatePath = ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Vor'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'templates';

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');
$injector->alias('Vor\Views\Renderer', 'Vor\Views\Mustache');
$injector->share('Vor\Views\Mustache');
$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader($templatePath, [
            'extension' => '.html',
        ]),
    ],
]);

return $injector;