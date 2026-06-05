@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar"> <!-- Sidebar -->
                <div>
                    <ul class="list-group sidebar">

                        <li class="list-group-item list-item"><a href="#"> <i
                                    class="bi bi-house-door m-2"></i>Dashboard</a>
                        </li>
                        <li class="list-group-item"><a href="#"><i class="bi bi-wallet2 m-2"></i>Income</a></li>
                        <li class="list-group-item"><a href="#"> <i class="bi bi-cash-stack m-2"></i>Expenses</a></li>
                        <li class="list-group-item"><a href="#"> <i class="bi bi-grid m-2"></i>Categories</a>
                        </li>
                        <li class="list-group-item"><a href="#"> <i class="bi bi-graph-up m-2"></i>Analytics</a></li>
                        <li class="list-group-item"><a href="#"> <i
                                    class="bi bi-arrow-left-right m-2"></i>Transactions</a></li>
                        <li class="list-group-item"><a href="#"> <i class="bi bi-piggy-bank m-2"></i>Budgets</a></li>
                        <li class="list-group-item"><a href="#"> <i
                                    class="bi bi-file-earmark-text m-2"></i>Reports</a></li>
                        <li class="list-group-item"><a href="#"> <i class="bi bi-bullseye m-2"></i>Goals</a></li>
                        <li class="list-group-item"><a href="#"> <i class="bi bi-calendar-event m-2"></i>Calendar</a>
                        </li>
                        <li class="list-group-item"><a href="#"> <i class="bi bi-gear m-2"></i>Settings</a></li>

                    </ul>
                    <div class="mt-4"
                        style="background-color: #0b2e3d; padding: 20px; border-radius: 5px; text-align: center;">
                        <img src="image/fml_logo.png" alt="Logo" width="50px" height="38px"><br>
                        <h6 style="color: #ffffff;">Go Premium</h6>
                        <p style="color: #ffffff;">Unlock more features <br>and advanced reports</p>
                        <button class="btn btn-success">Upgrade Now</button>

                    </div>
                </div>
            </div>
            <div class="col-md-10"> <!-- Main content area -->
                <div class="p-4 bg-light rounded shadow-sm mb-4  justify-content-between align-items-center border">
                    <span class="h5 mb-0">Dashboard</span>
                    <p>Welcome back, Goutam! </p>

                </div>
                <div class="row"> <!--  dashboard Cards row -->
                    <div class="col md-3 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="dashboard-card-row">Total balance
                                            <i class="bi bi-wallet2"></i>
                                        </div>
                                        <div class="card-money">₹500,000.00</div>
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
                                        <div class="dashboard-card-row">Total
                                            Income<i class="bi bi-download"></i>
                                        </div>
                                        <div class="card-money">₹50,000.00</div>
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
                                        <div class="dashboard-card-row">Total
                                            Expenses <i class="bi bi-upload"></i>
                                        </div>
                                        <div class="card-money">₹20,000.00</div>
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
                                        <div class="dashboard-card-row">Savings<i class="bi bi-bank2"></i>
                                        </div>
                                        <div class="card-money">₹27,000.00</div>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text m-2 ">
                                <span>+12.5%</span> from last month
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
