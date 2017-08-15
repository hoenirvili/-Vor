<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

use Vor\Core\App as App;

const INIT_PATH =  '../app/init.php';

function init(): void {
    if (!is_file(INIT_PATH) || (!file_exists(INIT_PATH)))
        throw new \LogicException('Cannot load the initialize script');

    require_once(INIT_PATH);
}

function main(): void {
    try {
        init();
    } catch(LogicException $e) {
        echo $e->getMessage();
        return;
    }

    $app = new App();
    try {
        $app->response();
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}

main();