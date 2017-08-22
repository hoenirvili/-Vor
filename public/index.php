<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

use Vor\Core\App;
use Vor\Core\ErrorPage;
use Vor\Core\Config;

const INIT_PATH =  '../app/init.php';
const MAX_LENGTH_PATH = 2400;


function init(): void {
    if (!is_file(INIT_PATH) || (!file_exists(INIT_PATH)))
        throw new LogicException('Cannot load the initialize script');

    require_once(INIT_PATH);
    Config::validate();
}

function main(): void {
    try {
        init();
    } catch(LogicException $e) {
        ErrorPage::internal($e->getMessage());
    }

    $url = '';
    if ((isset($_GET['url'])) &&
        ($_GET['url'] !== null)
        && (is_string($_GET['url']))) {

        $url = trim($_GET['url']);

        if (strlen($url) > MAX_LENGTH_PATH) {
            ErrorPage::internal("Url path too large");
        }
    }

    $app = new App($url);
    try {
        $app->render();
    } catch(Exception $e) {
        ErrorPage::internal($e->getMessage());
    }
}

main();