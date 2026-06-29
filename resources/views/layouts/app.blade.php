<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinAG</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
    {{-- 
    <style>
        .sidebar {
            min-height: 100vh;
        }

        /* .sidebar a {
            text-decoration: none;
            color: #333;
        } */

        .navbar {
            position: relative;
            z-index: 1050;
        }

        .dropdown-menu {
            z-index: 2000;
        }
    </style> --}}
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm  sticky-top">
        <div class="container-fluid">

            <a class="navbar-brand d-flex align-items-center" href="/dashboard">
                <img src="{{ asset('image/logo.png') }}" alt="logo" height="55">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">

                <form class="d-flex ms-auto me-3">
                    <input class="form-control h-50 w-100" type="search" placeholder="Search...">
                </form>

                <!-- Profile Dropdown -->
                <div class="dropdown">

                    <button class="btn btn-light border dropdown-toggle d-flex align-items-center" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        <img src="{{ Auth::user()->profile_img ? asset(Auth::user()->profile_img) : asset('image/default-user.png') }}"
                            style="height:20px" class="rounded-circle me-2" alt="Profile">

                        {{ Auth::user()->name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item" href="/settings">
                                <i class="bi bi-person me-2"></i>Profile
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item " href="/setting">
                                <i class="bi bi-gear me-2"></i>Settings
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item text-danger" href="/logout">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </a>
                        </li>

                    </ul>

                </div>

            </div>

        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-2 sidebar bg-light p-3">


                <ul class="list-group">

                    <li class="list-group-item {{ request()->is('dashboard') ? 'active' : '' }}">
                        <a href="/dashboard">
                            <i class="bi bi-house-door me-2"></i>Dashboard
                        </a>
                    </li>

                    <li class="list-group-item {{ request()->is('income') ? 'active' : '' }}">
                        <a href="/income">
                            <i class="bi bi-wallet2 me-2"></i>Income
                        </a>
                    </li>

                    <li class="list-group-item {{ request()->is('expenses') ? 'active' : '' }}">
                        <a href="/expenses">
                            <i class="bi bi-cash-stack me-2"></i>Expenses
                        </a>
                    </li>

                    <li class="list-group-item {{ request()->is('categories') ? 'active' : '' }}">
                        <a href="/categories">
                            <i class="bi bi-grid me-2"></i>Categories
                        </a>
                    </li>

                    <li class="list-group-item {{ request()->is('analytics') ? 'active' : '' }}">
                        <a href="/analytics">
                            <i class="bi bi-graph-up me-2"></i>Analytics
                        </a>
                    </li>

                    <li class="list-group-item {{ request()->is('transactions') ? 'active' : '' }}">
                        <a href="/transactions">
                            <i class="bi bi-arrow-left-right me-2"></i>Transactions
                        </a>
                    </li>

                    <li class="list-group-item {{ request()->is('budgets') ? 'active' : '' }}">
                        <a href="/budgets">
                            <i class="bi bi-piggy-bank me-2"></i>Budgets
                        </a>
                    </li>

                    <li class="list-group-item {{ request()->is('reports') ? 'active' : '' }}">
                        <a href="/reports">
                            <i class="bi bi-file-earmark-text me-2"></i>Reports
                        </a>
                    </li>

                    <li class="list-group-item {{ request()->is('/goals') ? 'active' : '' }}">
                        <a href="/goals">
                            <i class="bi bi-bullseye me-2"></i>Goals
                        </a>
                    </li>

                    <li class="list-group-item {{ request()->is('calendar') ? 'active' : '' }}">
                        <a href="/calendar">
                            <i class="bi bi-calendar-event me-2"></i>Calendar
                        </a>
                    </li>

                    <li class="list-group-item {{ request()->is('settings') ? 'active' : '' }} ">
                        <a href="/settings">
                            <i class="bi bi-gear me-2"></i>Settings
                        </a>
                    </li>

                </ul>

                <div class="mt-4 bg-dark text-center text-white p-3 rounded">
                    <img src="image/fml_logo.png" width="50" height="38">
                    <h6 class="mt-2">Go Premium</h6>
                    <p>Unlock more features and advanced reports</p>
                    <button class="btn btn-success">Upgrade Now</button>
                </div>
                <div class="mt-4 text-center text-muted copyright">
                    <p>&copy; 2026 YourCompany. All rights reserved.</p>

                </div>

            </div>
            <!-- Main Content -->
            {{-- @if (request()->is('settings') || request()->is('transactions') || request()->is('expense'))
                <div class="col-md-10 setting-bg">
                @else
                    <div class="col-md-10">
            @endif --}}
            <div class="col-md-10 {{ request()->is('settings*', 'transactions*', 'expense*') ? 'setting-bg' : '' }}">

                @yield('content')

            </div>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ asset('assets/js/dashboard.js') }}"></script>


</body>

</html>
