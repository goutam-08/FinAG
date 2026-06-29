<?php

namespace App\Http\Controllers; // Define the namespace for the controller

use App\Models\Category;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expense()
    {
        $userId = auth()->id();

        $data = Category::where('user_id', $userId)->where('category_type', 'Expense')->get();

        $expenseData = Income::where([
            'Cr_Dr' => 'dr',
            'user_id' => $userId,
        ])->get();

        // Total Income
        $totalExpense = Income::where([
            'Cr_Dr' => 'dr',
            'user_id' => $userId,
        ])->sum('amount');

        // Current Month Income
        $thisMonthExpense = Income::where([
            'Cr_Dr' => 'dr',
            'user_id' => $userId,
        ])
            ->whereMonth('Dr_date', Carbon::now()->month)
            ->whereYear('Dr_date', Carbon::now()->year)
            ->sum('amount');

        // Total Income Sources
        $expenseSources = Income::where([
            'Cr_Dr' => 'dr',
            'user_id' => $userId,
        ])->count();

        return view('expense', compact(
            'data',
            'expenseData',
            'totalExpense',
            'thisMonthExpense',
            'expenseSources'
        ));
    }

    public function store(Request $request) // form  ke through aya data ko $request me store hota hai
    {
        //         category_id
        // title
        // amount
        // Cr_date
        // description

        Income::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'description' => $request->description,
            'Dr_date' => $request->Dr_date,
            'Cr_Dr' => 'dr',
        ]);

        return redirect('expenses')
            ->with('success', 'expense Added Successfully');
    }

    // Income delete function

    public function delete($id)
    {
        $income = Income::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $income->delete();

        return redirect()->back()
            ->with('success', 'Expense deleted successfully');
    }

    public function edit($id)
    {
        $income = Income::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $categories = Category::where('user_id', auth()->id())->get();

        return view('edit-income', compact('expense', 'categories'));
    }
}
