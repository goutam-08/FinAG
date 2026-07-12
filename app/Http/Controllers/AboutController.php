<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function aboutFunc()
    {
        return view('pages.about');
    }
}
