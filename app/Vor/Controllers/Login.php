<?php declare(strict_types = 1);

namespace Vor\Controllers;

use Vor\Core\Error;

class Login extends Controller
{
    public function show(array $params): void
    {
        $html = $this->renderer->render($this->name);
        $this->response->setContent($html);
    }

    private function validate_input(): array{

        $username = $this->request->getParameter('username');
        $password = $this->request->getParameter('password');
        $remember = $this->request->getParameter('remember');

        $data = [];

        if (($username === null) || ($password===null))
            return data;

        if (!(is_string($username)) || (!is_string($password)))
            return data;

        $username = trim($username);
        $password = trim($password);

        if (($username === '') || ($password === ''))
            return data;

        if ((!mb_check_encoding($username, 'ASCII')) ||
            (!mb_check_encoding($password, 'ASCII')))
            return data;

        $data['username'] = $username;
        $data['password'] = $password;
        $data['remember'] = false;


        if (($remember !== null) &&
            (is_string($remember)) &&
            (mb_check_encoding($remember,'ASCII')) &&
            (trim($remember) === 'on'))
        {
            $data['remember'] = true;
        }

        return $data;
    }

    public function enter(array $params): void
    {
        $error = new Error($this->response, $this->renderer);
        $input = $this->validate_input();
        if($input === [])
            $error->badrequest();

        $page = 'dashboard';
        $user = $this->model->login($input['username'], $input['password'], $input['remember']);
        if ($user === []) {
            $page = $this->name;
            $user = [ "error" => "Username or password not found" ];
        }

        $html = $this->renderer->render($page, $user);
        $this->response->setContent($html);
    }
}