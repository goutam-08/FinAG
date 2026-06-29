<?php

namespace App\Http\Controllers; // Define the namespace for the controller

use App\Models\Category;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

// use App\Http\Controllers\Controller;  Import the base Controller class

class IncomeController extends Controller // Define the IncomeController class that extends the base Controller
{
    // public function income()
    // {
    //     $data = Category::where('user_id', auth()->user()->id)->get();
    //     $IncomeData = Income::where(['Cr_Dr' => 'cr', 'user_id' => auth()->user()->id])->get();

    //     return view('income', compact('data', 'IncomeData'));
    // }

    public function income()
    {
        $userId = auth()->id();

        $data = Category::where('user_id', $userId)->where('category_type', 'Income')->get();

        $IncomeData = Income::where([
            'Cr_Dr' => 'cr',
            'user_id' => $userId,
        ])->get();

        // Total Income
        $totalIncome = Income::where([
            'Cr_Dr' => 'cr',
            'user_id' => $userId,
        ])->sum('amount');

        // Current Month Income
        $thisMonthIncome = Income::where([
            'Cr_Dr' => 'cr',
            'user_id' => $userId,
        ])
            ->whereMonth('Cr_date', Carbon::now()->month)
            ->whereYear('Cr_date', Carbon::now()->year)
            ->sum('amount');

        // Total Income Sources
        $incomeSources = Income::where([
            'Cr_Dr' => 'cr',
            'user_id' => $userId,
        ])->count();

        return view('income', compact(
            'data',
            'IncomeData',
            'totalIncome',
            'thisMonthIncome',
            'incomeSources'
        ));
    }

    public function store(Request $request)// form  ke through aya data ko $request me store hota hai
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
            'Cr_date' => $request->Cr_date,
            'Cr_Dr' => 'cr',
        ]);

        return redirect('income')
            ->with('success', 'income Added Successfully');

    }

    // Income delete function

    public function delete($id)
    {
        $income = Income::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $income->delete();

        return redirect()->back()
            ->with('success', 'Income deleted successfully');
    }

    public function edit($id)
    {
        $income = Income::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $categories = Category::where('user_id', auth()->id())->get();

        return view('edit-income', compact('income', 'categories'));
    }
}
