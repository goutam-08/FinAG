@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-10">
            <div class="budget-header">
                <div class="header-left">
                    <h2 class="page-title">Budget</h2>
                    <p class="page-subtitle">
                        Set monthly budgets for categories and track your spending
                    </p>
                </div>

                <div class="header-right">
                    <div class="month-select">
                        <i class="bi bi-calendar3"></i>
                        <form method="GET" action="{{ route('budgets.index') }}" class="d-flex align-items-center gap-2">
                            <select name="month" class="form-select" onchange="this.form.submit()">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ (int) $month === $i ? 'selected' : '' }}>
                                        {{ Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                                    </option>
                                @endfor
                            </select>
                            <select name="year" class="form-select" onchange="this.form.submit()">
                                @for ($i = now()->year - 1; $i <= now()->year + 1; $i++)
                                    <option value="{{ $i }}" {{ (int) $year === $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-lg-6">
                <div class="budget-card">
                    <div class="card-top">
                        <div class="icon-box green">
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <div>
                            <h6>Total Budget</h6>
                            <h2>₹{{ number_format($totalBudget, 0) }}</h2>
                            <p>This Month</p>
                        </div>
                    </div>
                    <div class="card-graph graph-green"></div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="budget-card">
                    <div class="card-top">
                        <div class="icon-box blue">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div>
                            <h6>Total Spent</h6>
                            <h2>₹{{ number_format($totalSpent, 0) }}</h2>
                            <p>This Month</p>
                        </div>
                    </div>
                    <div class="card-graph graph-blue"></div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="budget-card">
                    <div class="card-top">
                        <div class="icon-box purple">
                            <i class="bi bi-pie-chart-fill"></i>
                        </div>
                        <div>
                            <h6>Budget Remaining</h6>
                            <h2>₹{{ number_format($remainingBudget, 0) }}</h2>
                            <span class="text-success fw-semibold">
                                {{ $totalBudget > 0 ? round(($remainingBudget / $totalBudget) * 100, 2) : 0 }}% Budget Left
                            </span>
                        </div>
                    </div>
                    <div class="card-graph graph-purple"></div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="budget-card">
                    <div class="card-top">
                        <div class="icon-box orange">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <div>
                            <h6>Average Usage</h6>
                            <h2>{{ $averageUsage }}%</h2>
                            <p>Across all categories</p>
                        </div>
                    </div>
                    <div class="card-graph graph-orange"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <h4>Budget Overview</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table budget-table align-middle">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Budget</th>
                                    <th>Spent</th>
                                    <th>Remaining</th>
                                    <th>Usage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($budgetRows as $row)
                                    <tr>
                                        <td>
                                            <span class="category {{ strtolower($row['category']->category_name) }}">
                                                <i class="bi bi-wallet2"></i>
                                            </span>
                                            {{ $row['category']->category_name }}
                                        </td>
                                        <td>₹{{ number_format($row['limit'], 0) }}</td>
                                        <td>₹{{ number_format($row['spent'], 0) }}</td>
                                        <td class="{{ $row['remaining'] >= 0 ? 'text-success' : 'text-danger' }}">
                                            ₹{{ number_format($row['remaining'], 0) }}
                                        </td>
                                        <td width="180">
                                            <div class="progress custom-progress">
                                                <div class="progress-bar {{ $row['usage'] >= 90 ? 'bg-danger' : ($row['usage'] >= 70 ? 'bg-warning' : 'bg-success') }}"
                                                    style="width:{{ min($row['usage'], 100) }}%"></div>
                                            </div>
                                            <small>{{ $row['usage'] }}%</small>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No budget data for this month yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="dashboard-card mb-4">
                    <div class="card-header-custom">
                        <h4>Budget vs Actual</h4>
                    </div>
                    <div class="text-center">
                        <canvas id="budgetChart" height="220"></canvas>
                    </div>
                </div>

                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <h4>Set New Budget</h4>
                    </div>
                    <form method="POST" action="{{ route('budgets.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select custom-input" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Budget Limit</label>
                            <input type="number" name="amount" class="form-control custom-input" placeholder="₹ 0.00"
                                min="0" required>
                        </div>
                        <input type="hidden" name="month" value="{{ $month }}">
                        <input type="hidden" name="year" value="{{ $year }}">
                        <button class="btn btn-budget w-100">
                            <i class="bi bi-wallet2"></i>
                            Set Budget
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endsection
