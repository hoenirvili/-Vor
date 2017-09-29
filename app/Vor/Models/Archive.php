<?php declare(strict_types=1);

namespace Vor\Models;

use PDO;

class Archive extends Model
{
    public function records(): array
    {
        $sql = "SELECT YEAR(time) as year
                FROM Article
                GROUP BY year
                ORDER BY time DESC";

        $stmt = $this->db->query($sql);
        $years = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $sql = "SELECT MONTHNAME(time) as month,
                        DAY(time) as day, title
                FROM Article
                WHERE YEAR(time) = :year
                ORDER BY time DESC";

        $stmt = $this->db->prepare($sql);
        $records = [];
        foreach ($years as $year) {
            $sql_per_year = sprintf($sql, $year);
            $record['year'] = $year;
            $stmt->execute(["year"=>$year]);
            $record['data'] = $stmt->fetchAll();
            $records[] = $record;
        }

        return $records;
    }

}