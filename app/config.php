<?php
return [
    'database' => [
        'host'      => getenv('PHP_DB_HOST'),
        'port'      => getenv('PHP_DB_PORT'),
        'username'  => getenv('PHP_DP_USERNAME'),
        'password'  => getenv('PHP_DB_PASSWORD'),
    ],

    'pages' => [
        'index'             => 'templates/index.php',
        'about'             => 'templates/about.php',
        'archive'           => 'templates/archive.php',
        'article'           => 'templates/article.php',
        'dashboard'         => 'templates/dashboard.php',
        'dashboard_create'  => 'templates/dashboard_createarticle.php',
        'error'             => 'templates/error.php',
        'login'             => 'templates/login.php',
    ],
];