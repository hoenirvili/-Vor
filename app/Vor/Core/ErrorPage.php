<?php declare(strict_types=1);

namespace Vor\Core;

use Vor\Http\StatusCode;
use Vor\Core\Config;
use Vor\Views\View;

final class ErrorPage {
    public static function render(StatusCode $status = null,
                                string $message=null): void {

        if ($status === null)
            throw new \InvalidArgumentException(
                "Invalid parameter for render method");

        $code = $status->code();
        http_response_code($code);
        if ($message === null)
            $message = $status;

        $view = new View([
            'code'      => $code,
            'message'   => $message
        ]);

        $view->render('error');
    }

    public static function internal(string $message=null): void {
         self::render(
            new StatusCode(StatusCode::INTERNAL_SERVER_ERROR),
            $message
        );
    }

    public static function notfound(string $message=null): void {
        self::render(
            new StatusCode(StatusCode::NOT_FOUND),
            $message
        );
    }
}