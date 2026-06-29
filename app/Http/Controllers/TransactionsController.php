<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $incomes = Income::where('user_id', $user->id)
            ->where('Cr_Dr', 'cr')
            ->get();

        $expenses = Income::where('user_id', $user->id)
            ->where('Cr_Dr', 'dr')
            ->get();

        $transactions = collect()
            ->merge($incomes->map(function ($item) {
                $item->type = 'Income';
                $item->date = $item->Cr_date;
                return $item;
            }))
            ->merge($expenses->map(function ($item) {
                $item->type = 'Expense';
                $item->date = $item->Dr_date;
                return $item;
            }))
            ->sortByDesc('date');

        return view('transactions', compact('transactions'));
    }
    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
