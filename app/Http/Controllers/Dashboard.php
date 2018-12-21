<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function page()
    {
        $login = Auth::check();
        if (!$login) {
            return redirect("dashboard/login");
        }
        return view('pages.dashboard');
    }

    public function loginPage()
    {
        return view('pages.login');
    }
    /**
     * login will try and login the user with
     * the request given
     *
     * @param Request $request
     * @return  \Illuminate\Http\RedirectResponse|
     *          \Illuminate\View\View|
     *          \Illuminate\Contracts\View\Factory
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $redirect = redirect();
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];
        $login = Auth::attempt(
            $credentials,
            $request->has('rememberme')
        );
        if (!$login) {
            view('pages.login');
        }
        return $redirect->intended('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
