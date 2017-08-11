<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

function init(): void {
    $autoload = __DIR__ . '/app/autoload.php';
    if ((!is_file($autoload)) || (!file_exists($autoload)))
        throw new Exception('Cannot load autoload.php');

    require_once __DIR__ . './app/autoload.php';
}



function main(): void {
    try {
        init();
    } catch(Exception $e) {
        include_once(__DIR__ . '/public/error.html');
        die();
    }

    echo "it works";
}

main();