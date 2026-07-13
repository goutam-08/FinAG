<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homefunc()
    {
        return view('pages.home');
    }

    public function personalHome()
    {
        return view('pages.home');
    }

    public function businessHome()
    {
        return view('pages.home');
    }
}
