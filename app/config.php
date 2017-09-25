<?php

return [
    'database' => [
        'host'      => (($env = getenv('PHP_DB_HOSTNAME')) !== false) ? $env : '',
        'port'      => (($env = getenv('PHP_DB_PORT')) !== false) ? $env : '',
        'username'  => (($env = getenv('PHP_DB_USERNAME')) !== false) ? $env : '',
        'password'  => (($env = getenv('PHP_DB_PASSWORD')) !== false) ? $env : '',
    ],
];