<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function contactFunc()
    {
        return view('pages.contact');
    }
}
