<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function reportsFunc()
    {
        $user = Auth::user();
        
        // Get all income records (Cr_Dr = 'cr' means credit/income)
        $incomes = Income::where('user_id', $user->id)
                          ->where('Cr_Dr', 'cr')
                          ->orderBy('Cr_date', 'desc')
                          ->get();
        
        // Get all expense records (Cr_Dr = 'dr' means debit/expense)
        $expenses = Income::where('user_id', $user->id)
                          ->where('Cr_Dr', 'dr')
                          ->orderBy('Dr_date', 'desc')
                          ->get();
        
        // Calculate totals
        $totalIncome = $incomes->sum('amount');
        $totalExpenses = $expenses->sum('amount');
        $netSavings = $totalIncome - $totalExpenses;
        $savingsRate = $totalIncome > 0 ? ($netSavings / $totalIncome) * 100 : 0;
        
        // Combine and sort recent transactions
        $recentTransactions = collect()
            ->merge($incomes->map(function($item) {
                $item->type = 'Income';
                $item->date = $item->Cr_date;
                return $item;
            }))
            ->merge($expenses->map(function($item) {
                $item->type = 'Expense';
                $item->date = $item->Dr_date;
                return $item;
            }))
            ->sortByDesc('date')
            ->take(10);
        
        // Get expense categories with names
        $expenseCategories = Category::where('user_id', $user->id)
                                     ->where('category_type', 'Expense')
                                     ->get()
                                     ->keyBy('id');
        
        // Get expense breakdown by category with category names
        $expenseByCategory = $expenses->groupBy('category_id')
                                      ->map(function($group) use ($expenseCategories) {
                                          $categoryId = $group[0]->category_id;
                                          $categoryName = $expenseCategories->get($categoryId)?->category_name ?? 'Unknown';
                                          return [
                                              'category_id' => $categoryId,
                                              'category_name' => $categoryName,
                                              'total' => $group->sum('amount'),
                                              'count' => $group->count()
                                          ];
                                      });
        
        return view('reports', [
            'totalIncome' => $totalIncome,
            'totalExpenses' => $totalExpenses,
            'netSavings' => $netSavings,
            'savingsRate' => $savingsRate,
            'recentTransactions' => $recentTransactions,
            'expenseByCategory' => $expenseByCategory,
            'incomes' => $incomes,
            'expenses' => $expenses
        ]);
    }
}
