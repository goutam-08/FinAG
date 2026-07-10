@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-lg-10">
            <!-- Budget Header -->
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

                        <select class="form-select">
                            <option>June 2026</option>
                            <option>May 2026</option>
                            <option>April 2026</option>
                            <option>March 2026</option>
                        </select>
                    </div>

                    <button class="btn add-budget-btn">
                        <i class="bi bi-plus-lg"></i>
                        Add Budget
                    </button>

                </div>

            </div>
        </div>
        <!-- Budget Cards -->
        <div class="row g-4 mb-4">

            <!-- Card 1 -->
            <div class="col-xl-3 col-lg-6">

                <div class="budget-card">

                    <div class="card-top">

                        <div class="icon-box green">
                            <i class="bi bi-wallet2"></i>
                        </div>

                        <div>
                            <h6>Total Budget</h6>
                            <h2>₹60,000</h2>
                            <p>This Month</p>
                        </div>
                    </div>
                    <div class="card-graph graph-green"></div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-xl-3 col-lg-6">
                <div class="budget-card">
                    <div class="card-top">

                        <div class="icon-box blue">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>

                        <div>
                            <h6>Total Spent</h6>
                            <h2>₹45,680</h2>
                            <p>This Month</p>
                        </div>

                    </div>

                    <div class="card-graph graph-blue"></div>

                </div>

            </div>

            <!-- Card 3 -->
            <div class="col-xl-3 col-lg-6">

                <div class="budget-card">

                    <div class="card-top">

                        <div class="icon-box purple">
                            <i class="bi bi-pie-chart-fill"></i>
                        </div>

                        <div>
                            <h6>Budget Remaining</h6>
                            <h2>₹14,320</h2>
                            <span class="text-success fw-semibold">
                                23.87% Budget Left
                            </span>
                        </div>
                    </div>
                    <div class="card-graph graph-purple"></div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-xl-3 col-lg-6">

                <div class="budget-card">

                    <div class="card-top">

                        <div class="icon-box orange">
                            <i class="bi bi-bullseye"></i>
                        </div>

                        <div>
                            <h6>Average Usage</h6>
                            <h2>76.13%</h2>
                            <p>Across all categories</p>
                        </div>

                    </div>

                    <div class="card-graph graph-orange"></div>

                </div>

            </div>

        </div>
        <div class="row">

            <!-- Left Side -->
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

                                <tr>

                                    <td>
                                        <span class="category food">
                                            <i class="bi bi-cup-hot"></i>
                                        </span>

                                        Food
                                    </td>

                                    <td>₹12,000</td>

                                    <td>₹8,350</td>

                                    <td class="text-success">
                                        ₹3,650
                                    </td>

                                    <td width="180">

                                        <div class="progress custom-progress">

                                            <div class="progress-bar bg-success" style="width:70%">

                                            </div>

                                        </div>

                                        <small>69.58%</small>

                                    </td>

                                </tr>

                                <tr>

                                    <td>
                                        <span class="category transport">
                                            <i class="bi bi-car-front"></i>
                                        </span>

                                        Transport
                                    </td>

                                    <td>₹8,000</td>

                                    <td>₹6,420</td>

                                    <td class="text-success">
                                        ₹1,580
                                    </td>

                                    <td>

                                        <div class="progress custom-progress">

                                            <div class="progress-bar bg-warning" style="width:80%">

                                            </div>

                                        </div>

                                        <small>80.25%</small>

                                    </td>

                                </tr>

                                <tr>

                                    <td>
                                        <span class="category shopping">
                                            <i class="bi bi-bag"></i>
                                        </span>

                                        Shopping
                                    </td>

                                    <td>₹10,000</td>

                                    <td>₹8,900</td>

                                    <td class="text-success">
                                        ₹1,100
                                    </td>

                                    <td>

                                        <div class="progress custom-progress">

                                            <div class="progress-bar bg-danger" style="width:89%">

                                            </div>

                                        </div>

                                        <small>89%</small>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <!-- Right Side -->

            <div class="col-lg-5">

                <!-- Chart -->

                <div class="dashboard-card mb-4">

                    <div class="card-header-custom">

                        <h4>Budget vs Actual</h4>

                    </div>

                    <div class="text-center">

                        <canvas id="budgetChart" height="220">

                        </canvas>

                    </div>

                </div>

                <!-- Tips -->

                <div class="dashboard-card">

                    <div class="card-header-custom">

                        <h4>Budget Tips</h4>

                    </div>

                    <div class="tips-box success">

                        <i class="bi bi-graph-up-arrow"></i>

                        <div>

                            <h6>Great Job!</h6>
                            <p>You're doing well with your Food budget.</p>
                        </div>
                    </div>
                    <div class="tips-box warning">
                        <i class="bi bi-exclamation-triangle"></i>
                        <div>
                            <h6>Almost There</h6>
                            <p>Shopping budget is 89% used.</p>
                        </div>
                    </div>
                    <div class="tips-box primary">
                        <i class="bi bi-lightbulb"></i>
                        <div>
                            <h6>Suggestion</h6>
                            <p>You have ₹4,800 remaining in Education budget.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">

            <!-- Recent Budget Actions -->
            <div class="col-lg-7">

                <div class="dashboard-card">

                    <div class="card-header-custom d-flex justify-content-between align-items-center">

                        <h4>Recent Budget Actions</h4>

                        <a href="#" class="view-all">
                            View All Activity
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                    <div class="table-responsive">

                        <table class="table budget-table align-middle">

                            <thead>

                                <tr>

                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                    <th>Old Limit</th>
                                    <th>New Limit</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td>10 Jun 2026</td>

                                    <td>Food</td>

                                    <td>
                                        <span class="badge bg-success">
                                            Updated
                                        </span>
                                    </td>

                                    <td>₹10,000</td>

                                    <td>₹12,000</td>

                                </tr>

                                <tr>

                                    <td>09 Jun 2026</td>

                                    <td>Shopping</td>

                                    <td>
                                        <span class="badge bg-primary">
                                            Created
                                        </span>
                                    </td>

                                    <td>—</td>

                                    <td>₹8,000</td>

                                </tr>

                                <tr>

                                    <td>08 Jun 2026</td>

                                    <td>Transport</td>

                                    <td>
                                        <span class="badge bg-warning text-dark">
                                            Modified
                                        </span>
                                    </td>

                                    <td>₹6,000</td>

                                    <td>₹8,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Set Budget -->

            <div class="col-lg-5">

                <div class="dashboard-card">

                    <div class="card-header-custom">

                        <h4>Set New Budget</h4>

                    </div>

                    <form>

                        <div class="mb-3">

                            <label class="form-label">
                                Category
                            </label>

                            <select class="form-select custom-input">

                                <option>Select Category</option>

                                <option>Food</option>

                                <option>Transport</option>

                                <option>Shopping</option>

                                <option>Health</option>

                                <option>Bills</option>

                            </select>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Budget Limit
                            </label>

                            <input type="number" class="form-control custom-input" placeholder="₹ 0.00">

                        </div>

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
