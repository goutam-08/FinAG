@extends('layouts.guest')
@section('content')
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Left Section -->
            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center login-left">
                <div class="text-center text-white">
                    <img src="{{ asset('image/logo.png') }}" class="m-4" alt="logo" >
                    <h1 class="fw-bold mt-4">
                        Welcome to FinAG
                    </h1>
                    <p class="mt-3">
                        Manage income, expenses, budgets and goals
                        in one powerful dashboard.
                    </p>
                </div>
            </div>
            <!-- Right Section -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="login-card">
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

                    <h2 class="fw-bold mb-2">
                        Sign In
                    </h2>

                    <p class="text-muted mb-4">
                        Enter your credentials
                    </p>

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Email</label>

                            <input type="email" class="form-control" placeholder="Enter Email" name='email'>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>

                            <input type="password" class="form-control" placeholder="Enter Password" name="password">
                        </div>

                        <div class="d-flex justify-content-between mb-4">

                            <div>
                                <input type="checkbox">
                                Remember Me
                            </div>

                            {{-- <a href="#">
                                Forgot Password?
                            </a> --}}

                        </div>

                        <button class="btn btn-login w-100">
                            Login
                        </button>

                    </form>

                    <p class="text-center mt-4">

                        Don't have an account?

                        <a href="/register">
                            Register
                        </a>

                    </p>

                </div>

            </div>

        </div>
    </div>
@endsection
