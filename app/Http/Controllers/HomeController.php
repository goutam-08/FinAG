<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function homefunc()
    {
        return view('pages.home');
    }
}
