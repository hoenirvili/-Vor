<?php declare(strict_types=1);

// use this only in development
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once (__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'app'. DIRECTORY_SEPARATOR.'init.php');

use Vor\Core\App;
use Vor\Core\ErrorPage;
use Vor\Core\Config;


const MAX_LENGTH_URL = 2400;

function main(): string {
    try {
        Config::validate();
    } catch(Exception $e) {
        return ErrorPage::internal('Invalid configuration');
    }

    $url = '';
    if ((isset($_GET['url'])) && ($_GET['url'] !== null)
        && (is_string($_GET['url']))) {

        $url = trim($_GET['url']);
        if (strlen($url) > MAX_LENGTH_URL)
            return ErrorPage::internal('The URL passed is too large');
    }

    $app = new App($url);
    return $app->render();
}

echo main();
