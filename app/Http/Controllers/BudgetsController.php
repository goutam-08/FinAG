<?php

namespace App\Http\Controllers;

use App\Models\Budgets;
use App\Models\Category;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BudgetsController extends Controller
{
    public function budgets()
    {
        $userId = auth()->id();
        $month = request('month', Carbon::now()->month);
        $year = request('year', Carbon::now()->year);

        $categories = Category::where('user_id', $userId)
            ->where('category_type', 'Expense')
            ->get();

        $budgets = Budgets::with('category')
            ->where('user_id', $userId)
            ->where('month', $month)
            ->where('year', $year)
            ->get();

        $budgetMap = $budgets->keyBy('category_id');

        $budgetRows = [];
        $totalBudget = 0;
        $totalSpent = 0;

        foreach ($categories as $category) {
            $budget = $budgetMap->get($category->id);
            $limit = $budget ? (float) $budget->amount : 0;
            $spent = (float) Income::where('user_id', $userId)
                ->where('category_id', $category->id)
                ->where('Cr_Dr', 'dr')
                ->whereMonth('Dr_date', $month)
                ->whereYear('Dr_date', $year)
                ->sum('amount');

            $remaining = $limit - $spent;
            $usage = $limit > 0 ? round(($spent / $limit) * 100, 2) : 0;

            $totalBudget += $limit;
            $totalSpent += $spent;

            $budgetRows[] = [
                'category' => $category,
                'limit' => $limit,
                'spent' => $spent,
                'remaining' => $remaining,
                'usage' => $usage,
            ];
        }

        $remainingBudget = max($totalBudget - $totalSpent, 0);
        $averageUsage = $totalBudget > 0 ? round(($totalSpent / $totalBudget) * 100, 2) : 0;

        return view('budgets', compact(
            'budgetRows',
            'totalBudget',
            'totalSpent',
            'remainingBudget',
            'averageUsage',
            'month',
            'year',
            'categories'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer',
        ]);

        Budgets::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'month' => $request->month,
                'year' => $request->year,
            ],
            [
                'amount' => $request->amount,
            ]
        );

        return redirect()->route('budgets.index')
            ->with('success', 'Budget saved successfully');
    }
}
