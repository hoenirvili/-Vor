<?php

declare(strict_types=1);

namespace Vor\Core;

use Vor\Http\StatusCode;
use Vor\Core\Config;

final class ErrorPage {
    public static function render(StatusCode $status = null, string $message=null) {
        if ($status === null)
            throw new InvalidArgumentException(
                "Invalid parameeter for render method");

        $config = Config::get();
        $page = $config['pages']['error'];
        $code = $status->code();
        http_response_code($code);
        if ($message === null)
            $message = $status;
        require_once $page;
    }
}