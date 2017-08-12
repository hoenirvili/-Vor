<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

const AUTOLOAD_PATH = __DIR__ . '/../app/autoload.php';

function init(): void {
    if ((!is_file(AUTOLOAD_PATH)) || (!file_exists(AUTOLOAD_PATH)))
        throw new Exception('Cannot load autoload.php');

    require_once AUTOLOAD_PATH;
}

function main(): void {
    echo isset($_GET['url']) ?? "mama";
        // $_GET['url'] = NULL;
        // var_dump($_GET['url']);
    try {
        init();
    } catch(Exception $e) {
        include_once(__DIR__ . '/templates/error.html');
        die();
    }


    if isset($_GET['url'])
        if ($_GET['url'] === "/index.php")
            include_once(__DIR__ . '/');

}

main();