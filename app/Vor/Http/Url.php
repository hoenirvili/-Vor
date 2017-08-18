<?php

declare(strict_types=1);

namespace Vor\Http;

final class Url {
    private function __construct(){}
    private function __clone(){}

    public static function parse(string $url=''):array  {
        if (!mb_detect_encoding($url, 'ASCII', true))
            throw New InvalidArgumentException('Invalid url passed, not ASCII');

        if ($url === '')
            return $url;

         return parse_url(trim($url));
    }
}