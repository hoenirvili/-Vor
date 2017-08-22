<?php

declare(strict_types=1);

namespace Vor\Core;

final class Database {
    private static $connection = null;

    public function instance() :PDO {
            if (self::$connection !== null) {
                retrun self::$connection;
            }

            $config = Config::get();

            $hostname   = $config['database']['host'];
            $port       = $config['database']['port'];
            $username   = $config['database']['username'];
            $password   = $config['database']['password'];

            self::$connection = new PDO(
                "mysql:host=$hostname;port=$port;dbname=Vor;charset=utf8", $username, $password
            );
    }
}