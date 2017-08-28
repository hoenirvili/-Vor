<?php

return [
    'database' => [
        'host'      => (($env = getenv('PHP_DB_HOSTNAME', true)) !== false) ? $env : '',
        'port'      => (($env = getenv('PHP_DB_PORT', true)) !== false) ? $env : '',
        'username'  => (($env = getenv('PHP_DB_USERNAME', true)) !== false) ? $env : '',
        'password'  => (($env = getenv('PHP_DB_PASSWORD', true)) !== false) ? $env : '',
    ],

    'pages' => [
        'index'             => __DIR__ . '/Vor/Views/templates/index.php',
        'about'             => __DIR__ . '/Vor/Views/templates/about.php',
        'archive'           => __DIR__ . '/Vor/Views/templates/archive.php',
        'article'           => __DIR__ . '/Vor/Views/templates/article.php',
        'dashboard'         => __DIR__ . '/Vor/Views/templates/dashboard.php',
        'dashboard_create'  => __DIR__ . '/Vor/Views/templates/dashboard_createarticle.php',
        'error'             => __DIR__ . '/Vor/Views/templates/error.php',
        'login'             => __DIR__ . '/Vor/Views/templates/login.php',
    ]
];