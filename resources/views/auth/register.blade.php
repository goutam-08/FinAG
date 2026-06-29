@extends('layouts.guest')


@section('content')
    <div class="container-fluid register-page">
        <div class="row min-vh-100">


            <!-- Left Side -->
            <div class="col-lg-6 left-panel d-none d-lg-flex">

                <div>
                    <h1>
                        Smart Tracking <br>
                        <span>Better Finances</span>
                    </h1>

                    <p class="mt-4">
                        Join thousands of users who are taking control of
                        their income, expenses and financial goals.
                    </p>

                    <div class="feature-item">
                        <i class="bi bi-graph-up-arrow"></i>
                        <div>
                            <h5>Track Income & Expenses</h5>
                            <small>Manage all transactions easily.</small>
                        </div>
                    </div>

                    <div class="feature-item">
                        <i class="bi bi-wallet2"></i>
                        <div>
                            <h5>Budget Planning</h5>
                            <small>Set monthly budgets and goals.</small>
                        </div>
                    </div>

                    <div class="feature-item">
                        <i class="bi bi-pie-chart"></i>
                        <div>
                            <h5>Smart Analytics</h5>
                            <small>Beautiful reports and insights.</small>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Side -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center">

                <div class="register-card">

                    <div class="text-center mb-4">

                        <div class="profile-circle mb-4">
                            <i class="bi bi-person-plus"></i>
                        </div>

                        <h2>Create Account</h2>

                        <p class="text-light">
                            Create your financial account
                        </p>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
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

                    </div>

                    <form action="{{ route('register.post') }}" method="POST">

                        @csrf

                        <input type="text" name="name" value="{{ old('name') }}"
                            class="form-control custom-input mb-3" placeholder="Full Name">

                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control custom-input mb-3" placeholder="Email Address">

                        <input type="tel" name="mobile_num" value="{{ old('mobile_num') }}" pattern="[0-9]{10}"
                            maxlength="10" class="form-control custom-input mb-3" placeholder="Mobile Number">

                        <input type="password" name="password" class="form-control custom-input mb-3"
                            placeholder="Password">

                        <input type="password" name="confirmed" class="form-control custom-input mb-4"
                            placeholder="Confirm Password">

                        <button type="submit" class="btn register-btn">
                            CREATE ACCOUNT
                        </button>

                        <p class="login-link mt-4">
                            Already have an account?
                            <a href="/login">Login</a>
                        </p>

                    </form>

                </div>

            </div>

        </div>


    </div>

@endsection
