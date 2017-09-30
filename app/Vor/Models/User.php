<?php declare(strict_types=1);

namespace Vor\Models;

use InvalidArgumentException;

class User extends Model
{

    public function login(string $username='',
                        string $password='',
                        string $ctn_type ='',
                        bool $remember=false): array
    {
        if (($username === '') ||
            ($password === '') ||
            ($ctn_type === ''))
            throw InvalidArgumentException('Invalid login parameters');

        $sql = "SELECT id, username, password FROM User Where Username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["username"=> $username]);
        $user = $stmt->fetch();
        if($user === [])
            return [];

        if (!password_verify($password, $user['password']))
            return [];


        session_start();
        session_id()
        $_SESSION['User-Agent'] = ctn_type

        return [];
    }

    public function cookie_expired(): bool {
        return true;
    }

}