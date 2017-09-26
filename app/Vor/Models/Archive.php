<?php declare(strict_types=1);

namespace Vor\Models;

use Vor\Core\Database;
use PDO;

class Archive extends Model
{
    public function records(): array
    {
        $sql = "SELECT YEAR(time) as year
                FROM Article
                GROUP BY year
                ORDER BY time DESC";

        $years = $this->db->query($sql, PDO::FETCH_COLUMN);

        $sql = "SELECT MONTHNAME(time) as month,
                        DAY(time) as day, title
                FROM Article
                WHERE YEAR(time) = %d
                ORDER BY time DESC";

        $records = [];
        foreach ($years as $year) {
            $sql_per_year = sprintf($sql, $year);
            $record['year'] = $year;
            $record['data'] = $this->db->query($sql_per_year);
            $records[] = $record;
        }

        return $records;
    }

}