<?php declare(strict_types=1);

namespace Vor\Models;

use Vor\Core\Database;
use PDO;

class Archive extends Model
{
    public function records(): array
    {
        $sql = "SELECT title, time, YEAR(time) as year
                FROM Article
                ORDER BY time DESC;";

        return $this->db->query($sql);
    }

}