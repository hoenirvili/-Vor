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

    $url = '';
    if (isset($_GET['url'])) {
        if (($_GET['url'] !== null) && ($_GET['url'] !== '') &&
            (is_string($_GET['url'])) && (mb_detect_encoding($url, 'ASCII', true)))
                $url = trim($_GET['url']);
    }

    $app = new App($url);
    try {
        $app->response();
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}

main();