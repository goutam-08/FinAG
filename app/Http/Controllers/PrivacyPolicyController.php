<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function privacyPolicyFunc()
    {
        return view('pages.privacy-policy');
    }
}