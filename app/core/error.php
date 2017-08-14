<?php

declare(strict_types=1);

class ErrorPage {
    public static function render(int $code=0, string $message='') {
        if (($code < 100) || ($code > 511))
            throw new UnexpectedValueException(
                "Invalid $code parameeter for render method");

        http_response_code($code);
        # we assume that the config was already been verified
        # in the index script
        $page = $config['config']['pages']['error'];
        require_once $page;
    }
}