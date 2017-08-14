<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

const INIT_PATH = '../app/init.php';

function init(): void {
    if (!is_file(INIT_PATH) || (!file_exists(INIT_PATH)))
        throw new LogicException('Cannot load the initialize script');

    require_once(INIT_PATH);
}

function main(): void {
    try {
        init();
    } catch(LogicException $e) {
        echo $s;
    }

    require_once('../app/views/index.php');
}
main();