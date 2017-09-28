<?php declare(strict_types=1);

namespace Vor\Models;

class User extends Model
{

    public function login(string $username='', string $password=''): array
    {
        // TODO
        $user = $this->db->query("SELECT id, Username, password
                        FROM User WHERE ${username} = Username", Database::FETCH_SINGLE);

        return [];
    }
}