<?php declare(strict_types=1);

namespace Vor\Models;

use Vor\Core\Database;

class Model
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }
}