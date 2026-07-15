<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        
        // Get all income records (Cr_Dr = 'cr')
        $incomes = Income::with('category')->where('user_id', $user->id)
                          ->where('Cr_Dr', 'cr')
                          ->orderBy('Cr_date', 'desc')
                          ->get();
        
        // Get all expense records (Cr_Dr = 'dr')
        $expenses = Income::with('category')->where('user_id', $user->id)
                          ->where('Cr_Dr', 'dr')
                          ->orderBy('Dr_date', 'asc')
                          ->get();
        
        // Calculate totals
        $totalIncome = $incomes->sum('amount');
        $totalExpenses = $expenses->sum('amount');
        $totalBalance = $totalIncome - $totalExpenses;
        $savingsRate = $totalIncome > 0 ? ($totalBalance / $totalIncome) * 100 : 0;
        
        // Combine and sort recent transactions (last 5)
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
            ->take(5);
        
        // Get expense breakdown by category with category names
        $expenseCategories = Category::where('user_id', $user->id)
                                     ->where('category_type', 'Expense')
                                     ->get()
                                     ->keyBy('id');
        
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
        
        // Calculate average monthly values
        $incomeCount = $incomes->count();
        $expenseCount = $expenses->count();
        $avgIncome = $incomeCount > 0 ? $totalIncome / $incomeCount : 0;
        $avgExpense = $expenseCount > 0 ? $totalExpenses / $expenseCount : 0;


        $monthlyExpenseData = $expenses
            ->groupBy(function ($item) {
                return \Carbon\Carbon::parse($item->Dr_date)->format('M');
            })
            ->map(function ($group) {
                return $group->sum('amount');
            });

        // Labels & Values
        $labels = $monthlyExpenseData->keys()->values();
        $values = $monthlyExpenseData->values();


        // dump($recentTransactions);
    
        
        return view('personal', [
            'totalBalance' => $totalBalance,
            'totalIncome' => $totalIncome,
            'totalExpenses' => $totalExpenses,
            'savingsRate' => $savingsRate,
            'recentTransactions' => $recentTransactions,
            'expenseByCategory' => $expenseByCategory,
            'incomes' => $incomes,
            'expenses' => $expenses,
            'avgIncome' => $avgIncome,
            'avgExpense' => $avgExpense,
            'labels' => $labels,
            'values' => $values,
        ]);
    }
}


 
