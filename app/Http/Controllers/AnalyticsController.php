<?php

namespace App\Http\Controllers;

class AnalyticsController extends Controller
{
    public function analytics()
    {
        return view('analytics');
    }

    public function goals()
    {
        return view('goals');
    }
}
