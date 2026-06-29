@extends('layouts.app')

@section('content')
    {{-- dashboard header --}}
    <div class="p-2 d-flex justify-content-between align-items-center mb-2">
        <div>
            <h4>Dashboard</h4>
            <p class="mb-0">Welcome back, {{ Auth::user()->name }}!</p>
        </div>
        <div>{{ now()->format('d M Y') }}</div>
    </div>
    <!--  dashboard Cards row -->
    {{-- <div class="row ">

        <div class="col-md-3 mb-4">
            <div class="card rounded shadow ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="dashboard-card-row">Total balance
                                <i class="bi bi-wallet2"></i>
                            </div>
                            <div class="D-total-balance-card">₹{{ number_format($totalBalance, 2) }}</div>
                        </div>
                        <p class="card-text m-2 ">
                            <span>+12.5%</span> from last month
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card rounded shadow ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="dashboard-card-row">Total
                                Income<i class="bi bi-download"></i>
                            </div>
                            <div class="D-total-income-card">₹{{ number_format($totalIncome, 2) }}</div>
                        </div>
                        <p class="card-text m-2 ">
                            <span>+12.5%</span> from last month
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card rounded shadow ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="dashboard-card-row">Total
                                Expenses <i class="bi bi-upload"></i>
                            </div>
                            <div class="D-total-expense-card">₹{{ number_format($totalExpenses, 2) }}</div>
                        </div>
                        <p class="card-text m-2 ">
                            <span>+12.5%</span> from last month
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card rounded shadow ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="dashboard-card-row">Savings<i class="bi bi-bank2"></i>
                            </div>
                            <div class="D-savings-card">₹{{ number_format($totalBalance, 2) }}</div>
                        </div>
                    </div>
                    <p class="card-text m-2 ">
                        <span>+15.00%</span> from last month
                    </p>
                </div>

            </div>
        </div>
    </div> --}}
    <div class="row g-4">

        <!-- Total Balance -->
        <div class="col-lg-3 col-md-6">
            <div class="summary-card">
                <div class="card-header-custom">
                    <div>
                        <h6>Total Balance</h6>
                        <h2 class="amount balance">
                            ₹{{ number_format($totalBalance, 2) }}
                        </h2>
                    </div>

                    <div class="icon-box success">
                        <i class="bi bi-wallet2"></i>
                    </div>
                </div>

                <p class="growth-text">
                    <span>+12.5%</span> from last month ↗
                </p>
            </div>
        </div>

        <!-- Income -->
        <div class="col-lg-3 col-md-6">
            <div class="summary-card">
                <div class="card-header-custom">
                    <div>
                        <h6>Total Income</h6>
                        <h2 class="amount income">
                            ₹{{ number_format($totalIncome, 2) }}
                        </h2>
                    </div>

                    <div class="icon-box success">
                        <i class="bi bi-download"></i>
                    </div>
                </div>

                <p class="growth-text">
                    <span>+8.3%</span> from last month ↗
                </p>
            </div>
        </div>

        <!-- Expense -->
        <div class="col-lg-3 col-md-6">
            <div class="summary-card">
                <div class="card-header-custom">
                    <div>
                        <h6>Total Expense</h6>
                        <h2 class="amount expense">
                            ₹{{ number_format($totalExpenses, 2) }}
                        </h2>
                    </div>

                    <div class="icon-box danger">
                        <i class="bi bi-upload"></i>
                    </div>
                </div>

                <p class="growth-text">
                    <span>+5.7%</span> from last month ↗
                </p>
            </div>
        </div>

        <!-- Savings -->
        <div class="col-lg-3 col-md-6">
            <div class="summary-card">
                <div class="card-header-custom">
                    <div>
                        <h6>Savings</h6>
                        <h2 class="amount savings">
                            ₹{{ number_format($totalBalance, 2) }}
                        </h2>
                    </div>

                    <div class="icon-box primary">
                        <i class="bi bi-bank2"></i>
                    </div>
                </div>

                <p class="growth-text">
                    <span>+15.2%</span> from last month ↗
                </p>
            </div>
        </div>

    </div>
    {{-- dashboard Cards row end --}}
    <div class="row g-2"> <!-- Charts row -->
        <div class="col-md-6 mb-4 shadow-sm  border rounded p-3 mb-4">
            <!-- Line Chart Card -->
            <div class="card  border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between ">
                        <h5>Monthly Expense Trend</h5>

                        <select class="form-select w-auto">
                            <option>This Month</option>
                            <option>Jan</option>
                            <option>Feb</option>
                            <option>Mar</option>
                            <option>Apr</option>
                            <option>May</option>
                            <option>Jun</option>
                            <option>Jul</option>
                            <option>Aug</option>
                            <option>Sep</option>
                            <option>Oct</option>
                            <option>Nov</option>
                            <option>Dec</option>
                        </select>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="expenseChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 shadow-sm  border rounded p-3 mb-4">
            <!-- Doughnut Chart Card -->
            <div class="card border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5> Expense by Category</h5>

                        <select class="form-select w-auto">
                            <option>This Month</option>
                            <option>Jan</option>
                            <option>Feb</option>
                            <option>Mar</option>
                            <option>Apr</option>
                            <option>May</option>
                            <option>Jun</option>
                            <option>Jul</option>
                            <option>Aug</option>
                            <option>Sep</option>
                            <option>Oct</option>
                            <option>Nov</option>
                            <option>Dec</option>

                        </select>
                    </div>
                    @if ($expenseByCategory->count() > 0)
                        <div class='row justify-content-center'>
                            <div class="col-7 chart-wrapper">
                                <canvas id="expenseCategoryChart"></canvas>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            No expense data available. Start adding expenses to see the breakdown by category.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row g-2"><!-- Recent Transactions row -->
        <div class="col-md-8 mb-2 shadow-sm  border rounded p-3">
            <div class="">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5>Recent Transactions</h5>
                        <a href="/transactions" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <table class="table table-hover mt-3" id="myTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentTransactions as $transaction)
                                <tr>
                                    <td>{{ is_string($transaction->date) ? \Carbon\Carbon::parse($transaction->date)->format('d M Y') : ($transaction->date ? $transaction->date->format('d M Y') : 'N/A') }}
                                    </td>
                                    <td>{{ $transaction->description ?? $transaction->title }}</td>
                                    <td>{{ $transaction->category->category_name ?? 'N/A' }}</td>
                                    <td>
                                        @if ($transaction->type === 'Income')
                                            <span class="badge bg-success">Income</span>
                                        @else
                                            <span class="badge bg-danger">Expense</span>
                                        @endif
                                    </td>
                                    <td class="{{ $transaction->type === 'Income' ? 'text-success' : 'text-danger' }}">
                                        ₹{{ number_format($transaction->amount, 2) }} </td>
                                    <td>
                                        @if ($transaction->Cr_Dr === 'cr')
                                            Bank Transfer
                                        @else
                                            Cash
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        {{-- main dashboard monthly summery wala card --}}
        <div class=" col-4 rounded-shadow bg-light d-flex justify-content-center align-items-center  ">
            <div class="card dashboard-card dashboard-monthly-summ-card">
                <!-- Header Section (Title + Dropdown) -->
                <div class="d-flex justify-content-between align-items-center ">
                    <p class="heading-text ">Monthly Summary</p>
                    <select class="form-select  w-auto">
                        <option>May 2026</option>
                        <option>June 2026</option>
                        <option>June 2026</option>
                        <option>June 2026</option>
                        <option>June 2026</option>
                        <option>June 2026</option>
                        <option>June 2026</option>
                        <option>June 2026</option>
                        <option>June 2026</option>
                        <option>June 2026</option>
                        <option>June 2026</option>

                    </select>
                </div>

                <!-- Row 1: Income -->
                <div class="mb-3">
                    <div class="metric-label">Income</div>
                    <div class="d-flex align-items-center">
                        <div class="metric-amount text-income">₹{{ number_format($totalIncome, 0) }}</div>
                        <div class="custom-progress-container mx-2">
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: {{ $totalIncome > 0 ? 100 : 0 }}%">
                                </div>
                            </div>
                        </div>
                        <div class="percentage-text">{{ $totalIncome > 0 ? 100 : 0 }}%</div>
                    </div>
                </div>

                <!-- Row 2: Expense -->
                <div class="mb-3">
                    <div class="metric-label">Expense</div>
                    <div class="d-flex align-items-center">
                        <div class="metric-amount text-expense">₹{{ number_format($totalExpenses, 0) }}</div>
                        <div class="custom-progress-container mx-2">
                            <div class="progress">
                                <div class="progress-bar bg-danger"
                                    style="width: {{ $totalIncome > 0 ? ($totalExpenses / $totalIncome) * 100 : 0 }}%">
                                </div>
                            </div>
                        </div>
                        <div class="percentage-text">
                            {{ round($totalIncome > 0 ? ($totalExpenses / $totalIncome) * 100 : 0) }}%</div>
                    </div>
                </div>

                <!-- Row 3: Savings -->
                <div class="mb-4">
                    <div class="metric-label">Savings</div>
                    <div class="d-flex align-items-center">
                        <div class="metric-amount text-savings">₹{{ number_format($totalBalance, 0) }}</div>
                        <div class="custom-progress-container mx-2">
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: {{ round($savingsRate) }}%"></div>
                            </div>
                        </div>
                        <div class="percentage-text">{{ round($savingsRate) }}%</div>
                    </div>
                </div>

                <!-- Bottom Nested Card: Savings Rate Component -->
                <div class="card savings-card">
                    <div class="card-body p-0 d-flex justify-content-between align-items-center">

                        <!-- Left Side Text -->
                        <div class="me-2">
                            <h4 class="card-title-text mb-2">Savings Rate</h4>
                            <p class="card-desc-text mb-0">
                                @if ($savingsRate >= 50)
                                    Excellent! You're saving {{ round($savingsRate) }}% of your income!
                                @elseif($savingsRate >= 30)
                                    Good! You're saving {{ round($savingsRate) }}% of your income.
                                @elseif($savingsRate > 0)
                                    Keep improving! You're saving {{ round($savingsRate) }}% of your income.
                                @else
                                    Add income to start tracking savings.
                                @endif
                            </p>
                        </div>

                        <!-- Right Side Percentage & Trend Graph -->
                        <div class="text-end d-flex flex-column align-items-end">
                            <div class="savings-percentage mb-2">{{ round($savingsRate) }}%</div>

                            <svg class="graph-svg" viewBox="0 0 100 50" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 45 L20 35 L35 40 L50 25 L65 32 L80 22 L95 10 L95 50 L5 50 Z" fill="#d1f2e5"
                                    opacity="0.6" />
                                <path d="M5 45 L20 35 L35 40 L50 25 L65 32 L80 22 L95 10" stroke="#10b981"
                                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M88 10 H95 V17" stroke="#10b981" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>

                    </div>
                </div>
                <!-- Savings Rate Card End -->

            </div>
        </div>
    </div>

    {{-- {{ dump($values) }} --}}
    <script>
        let expenseChart = null;
        let expenseCategoryChart = null;

        document.addEventListener('DOMContentLoaded', function() {
            initializeCharts();
        });

        function initializeCharts() {
            // Destroy existing charts
            if (expenseChart) {
                expenseChart.destroy();
                expenseChart = null;
            }
            if (expenseCategoryChart) {
                expenseCategoryChart.destroy();
                expenseCategoryChart = null;
            }

            // Expense Trend Chart
            const expenseChartCanvas = document.getElementById('expenseChart');
            if (expenseChartCanvas) {
                const expenseCtx = expenseChartCanvas.getContext('2d');
                expenseChart = new Chart(expenseCtx, {




                    type: 'line',
                    data: {
                        labels: @json($labels),
                        datasets: [{
                            cutout: "70%",
                            hoverOffset: 15,
                            label: 'Expenses',
                            data: @json($values),
                            borderColor: '#10B981',
                            backgroundColor: 'rgba(16,185,129,.12',
                            pointBorderColor: '#fff',
                            borderWidth: 3,
                            pointRadius: 5,
                            pointHoverRadius: 8,
                            tension: 0.3,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        animation: {
                            duration: 1800,
                            easing: 'easeOutQuart'
                        },
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
                                    color: 'rgba(148,163,184,.15)'
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
            const expenseCategoryCanvas = document.getElementById('expenseCategoryChart');
            if (expenseCategoryCanvas) {
                const expenseCategoryCtx = expenseCategoryCanvas.getContext('2d');
                const expenseByCategory = @json($expenseByCategory);

                console.log('Expense by Category Data:', expenseByCategory);

                const categoryLabels = Array.isArray(expenseByCategory) ?
                    expenseByCategory.map(item => item.category_name || 'Unknown') :
                    Object.values(expenseByCategory).map(item => item.category_name || 'Unknown');

                const categoryValues = Array.isArray(expenseByCategory) ?
                    expenseByCategory.map(item => item.total || 0) :
                    Object.values(expenseByCategory).map(item => item.total || 0);

                console.log('Labels:', categoryLabels);
                console.log('Values:', categoryValues);

                expenseCategoryChart = new Chart(expenseCategoryCtx, {
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
                            borderColor: '#fff',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: {
                            animateRotate: true,
                            animateScale: true,
                            duration: 1800,
                            easing: 'easeOutQuart'
                        },
                        plugins: {
                            legend: {
                                position: 'right',
                                labels: {
                                    color: '#999',
                                    padding: 15,
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        if (categoryValues.length === 0) return 'No data';
                                        const label = context.label || '';
                                        const value = context.parsed || 0;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = total > 0 ? ((value / total) * 100).toFixed(
                                            0) : 0;
                                        return label + ': ₹' + value.toLocaleString('en-IN', {
                                                minimumFractionDigits: 2
                                            }) + ' (' +
                                            percentage + '%)';
                                    }
                                }
                            }
                        }
                    }
                });
            }
        }
    </script>
@endsection
