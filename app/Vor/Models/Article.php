<?php declare(strict_types=1);

namespace Vor\Models;

use Vor\Core\Database;

class Article {

    private $db;

    private $per_page = 7;

    public function __construct() {
        $db = Database::instance();
    }

    public function page(int $n = 1) :array {
        return array();
    }
}