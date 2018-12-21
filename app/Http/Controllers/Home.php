<?php

namespace App\Http\Controllers;

class Home extends Controller
{
    public function page()
    {
        return view('pages.home');
    }
}
