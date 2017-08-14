<?php

declare(strict_types=1);

$config = [
    'database' => [
        'host'      => getenv('PHP_DB_HOST'),
        'port'      => getenv('PHP_DB_PORT'),
        'username'  => getenv('PHP_DP_USERNAME'),
        'password'  => getenv('PHP_DB_PASSWORD'),
    ],
    'pages' => [
        'about'             => 'templates/about.htm',
        'archive'           => 'templates/archive.html',
        'article'           => 'templates/article.html',
        'dashboard'         => 'templates/dashboard.html',
        'dashboard_create'  => 'templates/dashboard_createarticle.html',
        'error'             => 'templates/error.html',
        'login'             => 'templates/login.html',
    ],
];


function load_core($class) {
    include 'core/' . $class . '.php' . PHP_EOL;
}

function load_http($class) {
    include 'http/' . $class . '.php' . PHP_EOL;
}

spl_autoload_register(
    'load_core',
    'load_http'
);