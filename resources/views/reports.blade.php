@extends('layouts.app')
@section('content')
    <div class="container-fluid reports-body py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-1">Reports</h3>
                <p class="text-muted mb-0">Analyze your income and expenses</p>
            </div>

            <div class="d-flex gap-2 align-items-center">
                <div class="input-group">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fa fa-calendar"></i>
                        <span class="ms-2">{{ now()->format('d M Y') }}</span>
                        <i class="fa fa-caret-down ms-2"></i>
                    </button>
                </div>
                <button class="btn btn-success">Export Report</button>
            </div>
        </div>
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card p-3 h-100">
                    <div class="small text-muted">Total Income</div>
                    <div class="h4 mt-2">₹{{ number_format($totalIncome, 2) }}</div>
                    <div class="text-success small">From {{ $incomes->count() }} income records</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3 h-100">
                    <div class="small text-muted">Total Expenses</div>
                    <div class="h4 mt-2">₹{{ number_format($totalExpenses, 2) }}</div>
                    <div class="text-danger small">From {{ $expenses->count() }} expense records</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3 h-100">
                    <div class="small text-muted">Net Savings</div>
                    <div class="h4 mt-2">₹{{ number_format($netSavings, 2) }}</div>
                    <div class="text-success small">Balance</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3 h-100">
                    <div class="small text-muted">Savings Rate</div>
                    <div class="h4 mt-2">{{ number_format($savingsRate, 2) }}%</div>
                    <div class="text-success small">of total income</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#">Overview</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Income Report</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Expense Report</a></li>
                        </ul>

                        <div class="d-flex gap-2">
                            <select class="form-select form-select-sm">
                                <option>All Categories</option>
                            </select>
                            <select class="form-select form-select-sm">
                                <option>Monthly</option>
                            </select>
                            <button class="btn btn-primary btn-sm">Apply</button>
                        </div>
                    </div>

                    <div class="chart-card mb-3">
                        <h5 class="mb-2">Income vs Expenses</h5>
                        <canvas id="incomeExpensesChart"
                            style="height:320px; background:#0f1720; border-radius:6px;"></canvas>
                    </div>

                    <div class="d-flex gap-3">
                        <div class="flex-fill card p-3">
                            <h6 class="mb-3">Recent Transactions</h6>
                            <div class="table-responsive">
                                <table class="table table-dark table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th class="text-end">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentTransactions as $transaction)
                                            <tr>
                                                <td>{{ is_string($transaction->date) ? \Carbon\Carbon::parse($transaction->date)->format('d M Y') : ($transaction->date ? $transaction->date->format('d M Y') : 'N/A') }}
                                                </td>
                                                <td>
                                                    @if ($transaction->type === 'Income')
                                                        <span class="badge bg-success">Income</span>
                                                    @else
                                                        <span class="badge bg-danger">Expense</span>
                                                    @endif
                                                </td>
                                                <td>{{ $transaction->title }}</td>
                                                <td>{{ $transaction->description ?? 'N/A' }}</td>
                                                <td
                                                    class="text-end {{ $transaction->type === 'Income' ? 'text-success' : 'text-danger' }}">
                                                    {{ $transaction->type === 'Income' ? '+' : '-' }}₹{{ number_format($transaction->amount, 2) }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted py-3">No transactions found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card p-3" style="width:320px;">
                            <h6 class="mb-3">Summary for Selected Period</h6>
                            <ul class="list-unstyled small mb-0">
                                <li class="d-flex justify-content-between py-1"><span>Total Income</span><span
                                        class="text-success">₹{{ number_format($totalIncome, 2) }}</span></li>
                                <li class="d-flex justify-content-between py-1"><span>Total Expenses</span><span
                                        class="text-danger">₹{{ number_format($totalExpenses, 2) }}</span></li>
                                <li class="d-flex justify-content-between py-1"><span>Net Savings</span><span
                                        class="text-success">₹{{ number_format($netSavings, 2) }}</span></li>
                                <li class="d-flex justify-content-between py-1"><span>Savings
                                        Rate</span><span>{{ number_format($savingsRate, 2) }}%</span>
                                </li>
                                <li class="d-flex justify-content-between py-1"><span>Average Per
                                        Transaction</span><span>₹{{ $recentTransactions->count() > 0 ? number_format($recentTransactions->avg('amount'), 2) : '0.00' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card p-3 mb-3">
                    <h5 class="mb-3">Expense by Category</h5>
                    <canvas id="expenseByCategoryChart"
                        style="height:320px; border-radius:6px; background:#0f1720;"></canvas>
                </div>

                <div class="card p-3">
                    <h6 class="mb-3">Breakdown by Category</h6>
                    <ul class="list-unstyled mb-0">
                        @forelse($expenseByCategory as $categoryId => $data)
                            <li class="d-flex justify-content-between py-1">
                                <span>
                                    <span class="badge bg-primary me-2">&nbsp;</span>
                                    {{ $data['category_name'] }}
                                </span>
                                <span>₹{{ number_format($data['total'], 2) }}
                                    ({{ round(($data['total'] / ($totalExpenses > 0 ? $totalExpenses : 1)) * 100) }}%)
                                </span>
                            </li>
                        @empty
                            <li class="text-muted text-center py-2">No expense data available</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Income vs Expenses Chart
            const incomeExpensesCanvas = document.getElementById('incomeExpensesChart');
            if (incomeExpensesCanvas) {
                const incomeExpensesCtx = incomeExpensesCanvas.getContext('2d');
                new Chart(incomeExpensesCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Income', 'Expenses'],
                        datasets: [{
                            label: 'Amount',
                            data: [{{ $totalIncome }}, {{ $totalExpenses }}],
                            backgroundColor: ['#28a745', '#dc3545'],
                            borderColor: ['#28a745', '#dc3545'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: '#999'
                                },
                                grid: {
                                    color: '#333'
                                }
                            },
                            x: {
                                ticks: {
                                    color: '#999'
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            // Expense by Category Chart
            const expenseByCategoryCanvas = document.getElementById('expenseByCategoryChart');
            if (expenseByCategoryCanvas) {
                const expenseByCategoryCtx = expenseByCategoryCanvas.getContext('2d');
                const expenseByCategory = @json($expenseByCategory);
                const categoryLabels = Object.values(expenseByCategory).map(item => item.category_name);
                const categoryValues = Object.values(expenseByCategory).map(item => item.total);

                new Chart(expenseByCategoryCtx, {
                    type: 'doughnut',
                    data: {
                        labels: categoryLabels.length > 0 ? categoryLabels : ['No Data'],
                        datasets: [{
                            label: 'Expenses',
                            data: categoryValues.length > 0 ? categoryValues : [1],
                            backgroundColor: [
                                '#28a745', '#dc3545', '#007bff', '#ffc107',
                                '#17a2b8', '#6f42c1', '#e83e8c', '#fd7e14'
                            ],
                            borderColor: '#0f1720',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    color: '#999',
                                    padding: 15
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection
