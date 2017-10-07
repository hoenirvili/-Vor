<?php declare(strict_types=1);

namespace Vor\Models;

use PDO;

class Archive extends Model
{
    public function records(): array
    {
        $sql = "SELECT id, YEAR(time) as year
                FROM Article
                GROUP BY year
                ORDER BY time DESC";

        $stmt = $this->db->query($sql);
        $articles_by_years = $stmt->fetchAll();

        $sql = "SELECT MONTHNAME(time) as month,
                        DAY(time) as day, title
                FROM Article
                WHERE YEAR(time) = :year
                ORDER BY time DESC";

        $stmt = $this->db->prepare($sql);
        $records = [];
        foreach ($articles_by_years as $article) {
            $sql_per_year = sprintf($sql, $article['year']);
            $record['year'] = $article['year'];
            $record['id'] = $article['id'];
            $stmt->execute(["year"=>$article['year']]);
            $record['data'] = $stmt->fetchAll();
            $records[] = $record;
        }

        return $records;
    }

}