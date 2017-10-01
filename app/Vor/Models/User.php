<?php declare(strict_types=1);

namespace Vor\Models;

use InvalidArgumentException;

class User extends Model
{

    public function login(string $username='',
                        string $password='',
                        string $user_agent ='',
                        bool $remember=false): array
    {
        if (($username === '') ||
            ($password === '') ||
            ($user_agent === ''))
            throw InvalidArgumentException('Invalid login parameters');

        $sql = "SELECT id, username, password FROM User Where Username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["username"=> $username]);
        $user = $stmt->fetch();
        if($user === [])
            return [];

        if (!password_verify($password, $user['password']))
            return [];

        $user_agent = hash('sha512', $user_agent);

        session_set_cookie_params(time()+600,'/','localhost', false, true);
        if (isset($_SESSION['User-Agent'])) {
            var_dump($_SESSION['User-Agent']);
            var_dump($user_agent);
            die();
            if ($user_agent !== $_SESSION['User-Agent']) {
                die();
            }
        }

        if (isset($_SESSION['User'])) {
            if ($_SESSION['User'] !== $user['username']) {
                die();
            }
        }

        $_SESSION['User-Agent'] = hash('sha512', $user_agent);
        $_SESSION['User']       = $user['username'];
        $_SESSION['Login']      = true;

        return $user;
    }

    public function cookie_expired(): bool {
        return true;
    }

}