<?php

declare(strict_types=1);

class Error {
    public static function render(int $code=0) {
        if (($code === 0) || ($code < 0) || ($code > 505))
            throw new UnexpectedValueException(
                "Invalid $code parameeter for render method");
    }
}