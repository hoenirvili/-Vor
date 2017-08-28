<?php declare(strict_types=1);

// use this only in dev
error_reporting(E_ALL);
ini_set('display_errors', '1');

use Vor\Core\App;
use Vor\Core\ErrorPage;
use Vor\Core\Config;
use Vor\Http\StatusCode;
const INIT_PATH = __DIR__.DIRECTORY_SEPARATOR. '..'.DIRECTORY_SEPARATOR.'app'. DIRECTORY_SEPARATOR.'init.php';
const MAX_LENGTH_URL = 2400;

function main(): StatusCode {
    require_once(INIT_PATH);
    Config::validate();

    $url = '';
    if ((isset($_GET['url'])) && ($_GET['url'] !== null)
        && (is_string($_GET['url'])))
    {
        $url = trim($_GET['url']);
        if (strlen($url) > MAX_LENGTH_URL)
            return new StatusCode(
                StatusCode::INTERNAL_SERVER_ERROR,
                'The url passed entered is too large'
            );
    }

    $app = new App($url);
    return $app->render();
}


$err = main();
$code = $err->code();

switch ($code) {
    case StatusCode::INTERNAL_SERVER_ERROR:
        ErrorPage::internal();
        break;

    case StatusCode::NOT_FOUND:
        ErrorPage::notfound();
        break;

    default:
        // nothing for now.
}