@extends('layouts.app')
@section('content')
    <div class="p-2 d-flex justify-content-between align-items-center  bg-light rounded shadow-sm border-bottom">
        <div>
            <h4>Income</h4>
            <p class="mb-0">Track your income sources</p>
        </div>
        {{-- <div><button class="btn btn-success"> + Add Income</button></div> --}}
    </div>
    {{-- Income page row content --}}
    <div class="row">

        <div class="col md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="dashboard-card-row">Total
                                Income<i class="bi bi-download"></i>
                            </div>
                            <div class="card-money"> {{ $totalIncome }}</div>
                        </div>
                    </div>
                </div>
                <p class="card-text m-2 ">
                    <span>+12.5%</span> from last month
                </p>
            </div>
        </div>
        <div class="col md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="dashboard-card-row">This
                                Month <i class="bi bi-upload"></i>
                            </div>
                            <div class="card-money">{{ $thisMonthIncome }}</div>
                        </div>
                    </div>
                </div>
                <p class="card-text m-2 ">
                    <span>+12.5%</span> from last month
                </p>
            </div>
        </div>

        <div class="col md-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="dashboard-card-row">Income Sources<i class="bi bi-bank2"></i>
                            </div>
                            <div class="card-money">{{ $incomeSources }}</div>
                        </div>
                    </div>
                </div>
                <p class="card-text m-2 ">
                    <span>+12.5%</span> from last month
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-8 m-4">

            <div class="card mb-4">
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
                    <h4 class="p-1">Add New Income</h4>

                    <form action="{{ route('income.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="incomeSource" class="form-label">Category</label>
                            <select class="form-control" name="category_id">
                                @foreach ($data as $row)
                                    <option value="{{ $row->id }}">
                                        {{ $row->category_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="incomeSource" class="form-label">Income Source</label>
                            <input type="text" class="form-control" id="incomeSource"
                                placeholder="e.g. Salary, Freelance" required cursor="pointer" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount" placeholder="e.g. 5000" required
                                cursor="pointer" name="amount">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Credit Date</label>
                            <input type="date" class="form-control" id="date" required name="Cr_date">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description (Optional)</label>
                            <textarea class="form-control" id="description" placeholder="e.g. Bonus, Gift" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success align-items-center " style="width: 100%">Save
                            Income</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 m-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="p-1">Income History</h4>
                <i class="bi bi-search"></i> <input type="search" class="form-control w-25" placeholder="Search income...">
            </div>

            <div class="card mb-4">
                <div class="card-body ">

                    <table class="table table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Source</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($IncomeData as $row)
                                <tr>
                                    <td>{{ $row->Cr_date }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->amount }}</td>
                                    <td>{{ $row->description }}</td>

                                    <td>
                                        <a href="{{ route('income.edit', $row->id) }}" class="btn btn-sm btn-success">
                                            Edit
                                        </a>
                                        <form action="{{ route('income.delete', $row->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <div class="d-flex">
                        <p class="p-1">Showing 1 to 6 of 6 entries</p>
                        <div>
                            <span>left</span>
                            <span>1</span>
                            <span>right arrow</span>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
