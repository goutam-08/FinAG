@extends('layouts.app')
@section('content')
    <div class="p-3 p-md-4 mb-4 bg-white rounded shadow-sm border-bottom">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h2 class="page-title mb-1">Expenses</h2>
                <p class="page-subtitle mb-0">Track every expense and keep your spending under control</p>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="budget-card">
                <div class="card-top">
                    <div class="icon-box red">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <div>
                        <h6>Total Expense</h6>
                        <h2>₹{{ number_format($totalExpense, 0) }}</h2>
                        <p>All time</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="budget-card">
                <div class="card-top">
                    <div class="icon-box orange">
                        <i class="bi bi-calendar2-week"></i>
                    </div>
                    <div>
                        <h6>This Month</h6>
                        <h2>₹{{ number_format($thisMonthExpense, 0) }}</h2>
                        <p>{{ now()->translatedFormat('F Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="budget-card">
                <div class="card-top">
                    <div class="icon-box purple">
                        <i class="bi bi-arrow-left-right"></i>
                    </div>
                    <div>
                        <h6>Total Transactions</h6>
                        <h2>{{ $expenseSources }}</h2>
                        <p>Recorded expenses</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="budget-card">
                <div class="card-top">
                    <div class="icon-box blue">
                        <i class="bi bi-graph-down-arrow"></i>
                    </div>
                    <div>
                        <h6>Average Expense</h6>
                        <h2>₹{{ $expenseSources > 0 ? number_format($thisMonthExpense / $expenseSources, 0) : 0 }}</h2>
                        <p>Per transaction</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h4>Add New Expense</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('expense.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select custom-input" name="category_id">
                                @foreach ($data as $row)
                                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Expense Title</label>
                            <input type="text" class="form-control custom-input" placeholder="e.g. Groceries, Fuel"
                                required name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control custom-input" placeholder="e.g. 5000" required
                                name="amount">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Debit Date</label>
                            <input type="date" class="form-control custom-input" required name="Dr_date">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description (Optional)</label>
                            <textarea class="form-control custom-input" placeholder="e.g. Weekly groceries" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-budget w-100">
                            <i class="bi bi-plus-lg"></i>
                            Save Expense
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="dashboard-card">
                <div class="card-header-custom d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h4>Expense History</h4>
                    <input type="search" id="expenseSearch" class="form-control w-25" placeholder="Search expense...">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="expenseTable" class="table budget-table align-middle">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenseData as $row)
                                    <tr>
                                        <td>{{ $row->Dr_date }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>₹{{ number_format($row->amount, 0) }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td>
                                            <a href="{{ route('expense.edit', $row->id) }}"
                                                class="btn btn-sm btn-outline-success">
                                                Edit
                                            </a>
                                            <form action="{{ route('expense.delete', $row->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const table = $('#expenseTable').DataTable({
                pageLength: 8,
                order: [
                    [0, 'desc']
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Search expense..."
                }
            });

            $('#expenseSearch').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
@endsection
