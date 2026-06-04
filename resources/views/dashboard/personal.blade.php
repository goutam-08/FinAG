@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 dash"> <!-- Sidebar -->
                <div>
                    <ul class="list-group">

                        <li class="list-group-item"><a href="#"> <i class="bi bi-house-door-fill"></i>Dashboard</a></li>
                        <li class="list-group-item"><a href="#"><i class="fal fa-home"></i>Income</a></li>
                        <li class="list-group-item"><a href="#">Expenses</a></li>
                        <li class="list-group-item"><a href="#">Categories</a></li>
                        <li class="list-group-item"><a href="#">Analytics</a></li>
                        <li class="list-group-item"><a href="#">Transactions</a></li>
                        <li class="list-group-item"><a href="#">Budgets</a></li>
                        <li class="list-group-item"><a href="#">Reports</a></li>
                        <li class="list-group-item"><a href="#">Goals</a></li>
                        <li class="list-group-item"><a href="#">Calendar</a></li>
                        <li class="list-group-item"><a href="#">Settings</a></li>

                    </ul>
                    <div class="mt-4"
                        style="background-color: #1c5974; padding: 20px; border-radius: 5px; text-align: center;">
                        <img src="image/fml_logo.png" alt="Logo" width="50px" height="38px"><br>
                        <h6>Go Premium</h6>
                        <p>Unlock more features <br>and advanced reports</p>
                        <button class="btn btn-primary">Upgrade Now</button>

                    </div>
                </div>
            </div>
            <div class="col-md-10"> <!-- Main content area -->
                <div class="p-4 bg-light rounded shadow-sm mb-4  justify-content-between align-items-center border">
                    <span class="h5 mb-0">Dashboard</span>
                    <p>Welcome back, Goutam! </p>

                </div>
                <div class="row"> <!-- Cards row -->
                    <div class="col md-3 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total balance
                                            <i class="bi bi-wallet2"></i>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">₹50,000</div>
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
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total
                                            Income<i class="bi bi-download"></i>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">₹20,000</div>
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
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total
                                            Expenses <i class="bi bi-upload"></i>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">₹50,000</div>
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
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Savings<i
                                                class="bi bi-bank2"></i>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">₹50,000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
