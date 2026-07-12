<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FinAG</title>

    <link rel="stylesheet" href="{{ asset('assets/css/guest.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
      @stack('styles')
</head>

<body>
    <section>
        <nav class="navbar navbar-expand-lg custom-navbar  fixed-top">
            <div class="container">

                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img src="{{ asset('image/logo.png') }}" alt="logo" height="55">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">

                    <ul class="navbar-nav mx-auto">

                        <li class="nav-item">
                            <a class="nav-link active" href="/">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="#features" id="feature">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pricing">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                    </ul>
                    <div class="d-flex gap-3">
                        @if (Auth::check())
                            <div class="dropdown">
                                <button class="btn btn-light border dropdown-toggle d-flex align-items-center"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        @else
                            <a href="/login" class="btn-login">
                                Login
                            </a>
                            <a href="/register" class="btn-register">
                                Register
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </section>
    @yield('content')
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>

</html>
