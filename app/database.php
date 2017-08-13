<?php

declare(strict_types=1);

namespace Database;

class Database {

    private Database $db = null;

    function __construct(string $hostname=null, string $port = null, string $user = null, string $password = null) void {
        if isset($db)
            return;

    }
}