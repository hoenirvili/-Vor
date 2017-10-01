<?php declare(strict_types = 1);

namespace Vor\Controllers;

use Vor\Core\Error;
use http\MissingRequestMetaVariableException;
use Vor\Core\Form;

class Login extends Controller
{
    public function show(array $params): void
    {
        $html = $this->renderer->render($this->name);
        $this->response->setContent($html);
    }

    public function enter(array $params): void
    {
        $error = new Error($this->response, $this->renderer);
        $form_data = [
            'username' => $this->request->getBodyParameter('username'),
            'password' => $this->request->getBodyParameter('password'),
            'remember' => $this->request->getBodyParameter('remember'),
            // not in the form, but I will stick them in..
            'user-agent' =>  $this->request->getUserAgent()
        ];

        $string_options = [
                Form::MAX_LENGTH => 50,
                Form::MIN_LENGTH => 1,
                Form::EMPTY => false,
                Form::ENCODING => 'ASCII',
                FORM::IS_STRING => true
        ];

        $form = new Form ($form_data, [
            'username' => $string_options,
            'password' => $string_options,
            'remember' => [Form::CHECKBOX => true],
            'user-agent' => [
                 Form::ENCODING => 'ASCII',
                 FORM::IS_STRING => true
            ]]);

        if ($form->validate())
            $error->badrequest();

        $page = 'dashboard';

        if ($form_data['remember'] === 'on')
            $form_data['remember'] = true;
        else
            $form_data['remember'] = false;

        $user = $this->model->login($form_data['username'], $form_data['password'],
                                    $form_data['user-agent'], $form_data['remember']);
        if ($user === []) {
            $page = $this->name;
            $user = [ "error" => "Username or password not found" ];
        }

        $html = $this->renderer->render($page, $user);
        $this->response->setContent($html);
    }
}