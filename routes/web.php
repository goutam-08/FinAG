<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UpgradeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return app(AuthController::class)->login();
})->name('login');

Route::get('/register', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return app(AuthController::class)->register();
})->name('register');

Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

Route::get('/logout', [AuthController::class, 'logout']);
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/income', [IncomeController::class, 'income']);
    Route::get('/categories', [CategoriesController::class, 'categories']);
    Route::get('/budgets', [BudgetsController::class, 'budgets']);
    Route::get('/expenses', [ExpenseController::class, 'expense']);
    Route::get('/analytics', [AnalyticsController::class, 'analytics']);
    Route::get('/goals', [AnalyticsController::class, 'goals']);
    Route::get('/upgrade', [UpgradeController::class, 'upgradeFunc']);
    Route::get('/reports', [ReportsController::class, 'reportsFunc']);
    Route::get('/settings', [SettingsController::class, 'settingsFunc']);

    // Route::get('/login', [AnalyticsController::class, 'login']);

    // post

    Route::post('categories/create', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [CategoriesController::class, 'update'])
        ->name('categories.update');
    // income route
    Route::post('income/create', [IncomeController::class, 'store'])->name('income.store');

    Route::delete('/income/delete/{id}', [IncomeController::class, 'delete'])->name('income.delete');

    Route::get('/income/edit/{id}', [IncomeController::class, 'edit'])->name('income.edit');

    Route::put('/income/update/{id}', [IncomeController::class, 'update'])->name('income.update');
    // expense route
    Route::post('expense/create', [ExpenseController::class, 'store'])->name('expense.store');
    Route::post('/profilei/update', [SettingsController::class, 'updateProfile'])->name('profile.update');

    Route::delete('/expense/delete/{id}', [ExpenseController::class, 'delete'])->name('expense.delete');

    Route::get('/expense/edit/{id}', [ExpenseController::class, 'edit'])->name('expense.edit');

    Route::put('/expense/update/{id}', [ExpenseController::class, 'update'])->name('expense.update');

    // Transaction ka route start
    Route::get('/transactions', [TransactionsController::class, 'index']);
    Route::get(
        '/transactions/{id}/edit',
        [TransactionsController::class, 'edit']
    )
        ->name('transactions.edit');

    Route::delete(
        '/transactions/{id}',
        [TransactionsController::class, 'destroy']
    )
        ->name('transactions.destroy');
});

Route::get('/home', [HomeController::class, 'homefunc']);
Route::get('/', [HomeController::class, 'homefunc']);
