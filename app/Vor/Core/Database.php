<?php declare(strict_types=1);

namespace Vor\Core;

use \PDO;

final class Database {

    private static $connection = null;

    public static function instance() :PDO {
            if (self::$connection !== null)
                return self::$connection;

            $config = Config::get();

            $hostname   = $config['database']['host'];
            $port       = $config['database']['port'];
            $username   = $config['database']['username'];
            $password   = $config['database']['password'];

            self::$connection = new PDO(
                "mysql:host=$hostname;port=$port;dbname=Vor;charset=utf8",
                $username, $password
            );

            return self::$connection;
    }
}