<?php declare(strict_types=1);

namespace Vor\Models;

use PDO;

class Model
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}