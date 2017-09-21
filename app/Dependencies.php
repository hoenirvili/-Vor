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
$options    =  array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_PERSISTENT => true);
$dsn        = "mysql:host=$hostname;port=$port;dbname=vor;charset=utf8mb4";

$injector->share('\PDO');
$injector->define('\PDO', [$dsn, $username, $password, $options]);
$injector->alias('Models\Model', 'Models\Articles');
$injector->share('Models\Articles');

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