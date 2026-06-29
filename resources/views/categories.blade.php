@extends('layouts.app')
@section('content')
    <div class="p-2 d-flex justify-content-between align-items-center  bg-light rounded shadow-sm border-bottom">
        <div>
            <h4>Categories</h4>
            <p class="mb-0">Manage your Expense Categories</p>
            </div>
        <div><button class="btn btn-success"> + Add New Categories</button></div>
    </div>
            {{-- Categories page row content --}}
            <div class="row">

                <div class="col md-3 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="dashboard-card-row">Total
                                        Categories<i class="bi bi-download"></i>
                                    </div>
                                    <div class="card-money">{{ $totalCategories }}</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col md-3 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="dashboard-card-row">Active
                                        Categories <i class="bi bi-upload"></i>
                                    </div>
                                    <div class="card-money">{{ $activeCategories }}</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col md-3 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="dashboard-card-row">In active
                                        Categories <i class="bi bi-upload"></i>
                                    </div>
                                    <div class="card-money">{{ $inactiveCategories }}</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-lg-3 col-md-8 m-4">

                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="p-1">Add New Category</h4>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                            @if (isset($category))
                                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                @else
                                    <form action="{{ route('categories.store') }}" method="POST">
                            @endif

                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Category Name</label>

                                <input type="text" class="form-control" name="category_name"
                                    value="{{ $category->category_name ?? '' }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Category Type</label>

                                <select class="form-control" name="category_type">

                                    <option value="Income"
                                        {{ isset($category) && $category->category_type == 'Income' ? 'selected' : '' }}>
                                        Income
                                    </option>

                                    <option value="Expense"
                                        {{ isset($category) && $category->category_type == 'Expense' ? 'selected' : '' }}>
                                        Expense
                                    </option>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>

                                <select class="form-control" name="status">

                                    <option value="1"
                                        {{ isset($category) && $category->status == 1 ? 'selected' : '' }}>
                                        Active
                                    </option>

                                    <option value="0"
                                        {{ isset($category) && $category->status == 0 ? 'selected' : '' }}>
                                        Inactive
                                    </option>

                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">
                                {{ isset($category) ? 'Update Category' : 'Save Category' }}
                            </button>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 m-4">
                    <div class="card mb-4">
                        <div class="card-body ">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="p-1">Category list</h4>
                                {{-- <i class="bi bi-search"></i> <input type="search" class="form-control w-25" placeholder="Search income..."> --}}
                            </div>

                            <table class="table table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->category_name }}</td>
                                            <td>{{ $row->category_type }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>{{ $row->status === 1 ? 'Active' : 'deactive' }}</td>
                                            {{-- <td>
                                        <button class="btn btn-sm btn-success">Edit</button>
                                    </td> --}}
                                            <td>
                                                <a href="{{ route('categories.edit', $row->id) }}"
                                                    class="btn btn-sm btn-success">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>


                        </div>
                    </div>
                </div>
            </div>
        @endsection
