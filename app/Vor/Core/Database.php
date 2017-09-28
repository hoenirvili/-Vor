<?php declare(strict_types = 1);

namespace Vor\Core;

use InvalidArgumentException;
use PDO;

class Database
{
    const FETCH_ALL     = 0x1;
    const FETCH_SINGLE  = 0x2;
    const FETCH_BUFFERED = 0x3;

    protected $pdo;

    private $err;

    private $stmt;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function query(string $query,
                        int $style = 0,
                        int $fetch = Database::FETCH_ALL): array
    {
        $stmt = $this->pdo->query($query);
        switch ($fetch) {
            case Database::FETCH_ALL:
                return $stmt->fetchAll($style);
            case Database::FETCH_SINGLE:
                return $stmt->fetch($style);
            case Database::FETCH_BUFFERED:
                $data = [];
                while (($data[] = $stmt->fetch($style))){}
                return $data;
            default:
                throw new InvalidArgumentException("Invalid fetch parameter given");
        }
    }

    public function bindInt(string $param, int $value): void
    {
        $this->stmt->bindValue($param, $value, PDO::PARAM_INT);
    }
    public function bindStr(string $param, string $value): void
    {
        $this->stmt->bindValue($param, $value, PDO::PARAM_STR);
    }

    public function bindBool(string $param, bool $value): void
    {
        $this->stmt->bindValue($param, $value, PDO::PARAM_BOOL);
    }

    public function bindNull(string $param): void
    {
        $this->stmt->bindValue($param, null, PDO::PARAM_NULL);
    }

    public function execute(): bool
    {
        return $this->stmt->execute();
    }

    public function single(): array
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(): int
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId(): string
    {
        return $this->pdo->lastInsertId();
    }
}