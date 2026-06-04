<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
