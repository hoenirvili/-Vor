<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

use Vor\Core\App;
use Vor\Http\StatusCode;
use Vor\Core\ErrorPage;
use Vor\Core\Config;

const INIT_PATH =  '../app/init.php';

function init(): void {
    if (!is_file(INIT_PATH) || (!file_exists(INIT_PATH)))
        throw new LogicException('Cannot load the initialize script');

    require_once(INIT_PATH);
    //TODO(hoenir): uncomment this in production
    //Config::validate();
}

function main(): void {
    try {
        init();
    } catch(LogicException $e) {
        ErrorPage::render(
            new StatusCode(StatusCode::INTERNAL_SERVER_ERROR),
            $e->getMessage()
        );
    }

    $url = '';
    if ((isset($_GET['url'])) &&
        ($_GET['url'] !== null)
        && (is_string($_GET['url']))) {

        $url = $_GET['url'];
    }

    $app = new App($url);
    try {
        $app->render();
    } catch(Exception $e) {
        ErrorPage::render(
            new StatusCode(StatusCode::INTERNAL_SERVER_ERROR),
            $e->getMessage()
        );
    }
}

main();