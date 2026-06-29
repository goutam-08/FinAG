@extends('layouts.app')
@section('content')
    {{-- dashboard header --}}
    <div class="p-2 d-flex justify-content-between align-items-center mb-2">
        <div>
            <h4>Transactions</h4>
            <p class="mb-0">View and manage all your financial transactions</p>
        </div>
    </div>
    <div class="row g-4 mb-4">

        <div class="col-md-3">
            <div class="stats-card income-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="card-title-custom">Total Transactions</div>
                        <h2 class="card-value">48</h2>
                        <div class="card-subtitle">All Time</div>
                    </div>

                    <div class="icon-circle bg-success">
                        <i class="bi bi-arrow-down-up"></i>
                    </div>
                </div>

                <div class="mini-chart success-line"></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stats-card income-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="card-title-custom">Total Income</div>
                        <h2 class="card-value">₹85,000</h2>
                        <div class="card-subtitle">All Time</div>
                    </div>

                    <div class="icon-circle bg-success">
                        <i class="bi bi-arrow-down"></i>
                    </div>
                </div>

                <div class="mini-chart success-line"></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stats-card expense-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="card-title-custom">Total Expenses</div>
                        <h2 class="card-value">₹45,680</h2>
                        <div class="card-subtitle">All Time</div>
                    </div>

                    <div class="icon-circle bg-danger">
                        <i class="bi bi-arrow-up-right"></i>
                    </div>
                </div>

                <div class="mini-chart danger-line"></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stats-card balance-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="card-title-custom">Net Balance</div>
                        <h2 class="card-value">₹39,320</h2>
                        <div class="card-subtitle">All Time</div>
                    </div>

                    <div class="icon-circle bg-primary">
                        <i class="bi bi-wallet2"></i>
                    </div>
                </div>

                <div class="mini-chart primary-line"></div>
            </div>
        </div>
        <div class="col-md-12">

            <div class="transaction-card">

                <!-- Filter Row -->

                <div class="row g-3 mb-4">

                    <div class="col-md-3">
                        <input type="text" class="form-control filter-input" placeholder="Search transactions...">
                    </div>

                    <div class="col-md-2">
                        <select class="form-select filter-input">
                            <option value="">All Types</option>
                            <option value="cr">Income</option>
                            <option value="dr">Expense</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <select class="form-select filter-input">
                            <option value="">All Categories</option>
                            {{-- 
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->category_name }}
                                </option>
                            @endforeach --}}

                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="row">
                            <div class="col">
                                <input type="date" class="form-control filter-input">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-success w-100">
                            <i class="bi bi-funnel"></i>
                            Filter
                        </button>
                    </div>

                </div>

                <!-- Table -->

                <div class="table-responsive">

                    <table class="table transaction-table align-middle" id="myTable">

                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ is_string($transaction->date) ? \Carbon\Carbon::parse($transaction->date)->format('d M Y') : ($transaction->date ? $transaction->date->format('d M Y') : 'N/A') }}
                                    </td>
                                    <td>{{ $transaction->description ?? $transaction->title }}</td>
                                    <td>{{ $transaction->category->category_name ?? 'N/A' }}</td>
                                    <td>
                                        @if ($transaction->type === 'Income')
                                            <span class="badge"style="background:rgb(37, 202, 97)"><i
                                                    class="bi bi-arrow-down"></i>Income</span>
                                        @else
                                            <span class="badge" style="background:rgb(223, 29, 29)"> <i
                                                    class="bi bi-arrow-up"></i>Expense</span>
                                        @endif
                                    </td>
                                    <td class="{{ $transaction->type === 'Income' ? 'text-success' : 'text-danger' }}">
                                        ₹ {{ number_format($transaction->amount, 2) }} </td>
                                    <td>
                                        @if ($transaction->Cr_Dr === 'cr')
                                            Bank Transfer
                                        @else
                                            Cash
                                        @endif
                                    </td>
                                    {{-- <td>
                                        @if ($transaction->Cr_Dr === 'cr')
                                            Bank Transfer
                                        @else
                                            Cash
                                        @endif
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="mt-3">
                    {{-- {{ $transactions->links() }} --}}
                </div>
            @endsection
