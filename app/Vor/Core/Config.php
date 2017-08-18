<?php

declare(strict_types=1);

namespace Vor\Core;

use LogicException;

final class Config {
    private static $path = __DIR__ . '/../../config.php';

    public static function get() :array{
            return include(self::$path);
    }


    private static function checkKeyValue(string $key, string $value): void {
        if ((!is_string($key) && (!mb_detect_encoding($key, 'ASCII', true))))
                throw new LogicException("The config does not contain valid ASCII strings");

            if ((!is_string($value) && (!mb_detect_encoding($value, 'ASCII', true))))
                throw new LogicException("The config does not contain valid ASCII strings");

            if (($value === '') || ($key === ''))
                throw new LogicException('Empty configuration field');
    }

    private static function checkPages(array $arr) :void {
        if(!isset($arr))
            throw new InvalidArgumentException("Invalid pages array config");

        foreach($arr as $key => $value) {
            self::checkKeyValue($key, $value);

            if (!file_exists($value))
                throw new LogicException(
                    "Invalid path, the $value does not exist for page $key"
                );

        }
    }

    private static function checkDB(array $arr) :void {
        if (!isset($arr))
            throw new InvalidArgumentException("Invalid db array config");

        foreach ($arr as $key => $value) {
            self::checkKeyValue($key, $value);

            if ($key === 'host')
                if (!filter_var($value, FILTER_VALIDATE_IP))
                    throw new LogicException("Invalid host in db configuration");

            if ($key === 'port')
                if (($value < 0) && ($value > 0xFFFF))
                    throw new LogicException("Invalid port in db configuration");
        }
    }

    public static function validate() :void {
        $config = self::get();

        if ((!isset($config['database'])) && ($config['database'] !== null))
            throw new LogicException('No database config member found');
        self::checkDB($config['database']);

        if ((!isset($config['pages'])) && ($config['pages'] !== null))
            throw new LogicException('No pages config member found');

        self::checkPages($config['pages']);
    }

}