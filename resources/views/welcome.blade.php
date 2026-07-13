@extends('layouts.guest')
@section('content')
    <section class="hero-section p-0">

        <div class="container">

            <div class="row align-items-center">

                <!-- LEFT CONTENT -->

                <div class="col-lg-5">

                    <div class="hero-badge">

                        <i class="bi bi-stars"></i>

                        Smart Expense Tracking Solution

                    </div>

                    <h1 class="hero-title">

                        Track. Manage.

                        <span>Grow.</span>

                    </h1>

                    <p class="hero-description">

                        Manage your personal and business expenses in one
                        powerful dashboard. Get insights, track spending,
                        and grow your savings.

                    </p>

                    <div class="hero-buttons">

                        <a href="dashboard" class="btn-get-started">

                            Get Started Free

                            <i class="bi bi-arrow-right"></i>

                        </a>

                        <a href="#" class="btn-demo">

                            Live Demo

                            <i class="bi bi-play-circle"></i>

                        </a>

                    </div>

                    <!-- FEATURES -->

                    <div class="hero-features">

                        <div class="feature-item">

                            <div class="feature-icon">

                                <i class="bi bi-shield-check"></i>

                            </div>

                            <div>

                                <h6>100% Secure</h6>

                                <p>Your data is safe</p>

                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">

                                <i class="bi bi-graph-up-arrow"></i>

                            </div>

                            <div>

                                <h6>Smart Analytics</h6>

                                <p>Insights that matter</p>

                            </div>

                        </div>

                        <div class="feature-item">

                            <div class="feature-icon">

                                <i class="bi bi-phone"></i>

                            </div>

                            <div>

                                <h6>Fully Responsive</h6>

                                <p>Works everywhere</p>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- RIGHT IMAGE -->

                <div class="col-lg-7">

                    <div class="hero-dashboard">

                        <img src="{{ asset('image/dashboard-mockup.jpeg') }}" class="img-fluid" alt="Expense Manager Dashboard">

                    </div>

                </div>

            </div>

        </div>
    </section>
    {{-- features section --}}
    <section class="features-section " for="features">

        <div class="container">

            <div class="section-header text-center">

                <span class="section-tag">FEATURES</span>

                <h2>
                    Everything you need to
                    <span>manage your finances</span>
                </h2>

                <p>
                    Powerful tools to track expenses, manage income,
                    analyze spending and grow your savings.
                </p>

            </div>

            <div class="row g-4 mt-4">

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-box">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h4>Expense Analytics</h4>
                        <p>
                            Visualize spending patterns with modern charts,
                            reports and financial insights.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-box">
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <h4>Income Tracking</h4>
                        <p>
                            Track salary, business income and manage
                            cash flow efficiently.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-box">
                            <i class="bi bi-folder"></i>
                        </div>
                        <h4>Smart Categories</h4>
                        <p>
                            Organize transactions with custom categories
                            and expense tags.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-box">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <h4>Reports & Insights</h4>
                        <p>
                            Generate detailed reports and make
                            smarter financial decisions.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-box">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Secure Data</h4>
                        <p>
                            Your financial information is protected
                            with strong security.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="icon-box">
                            <i class="bi bi-phone"></i>
                        </div>
                        <h4>Responsive Design</h4>
                        <p>
                            Access your dashboard anywhere,
                            anytime on any device.
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </section>
    {{-- dashboard preview --}}
    <section class="dashboard-preview-section">

        <div class="container">

            <div class="row align-items-center">

                <!-- LEFT CONTENT -->

                <div class="col-lg-4">

                    <span class="preview-tag">
                        DASHBOARD PREVIEW
                    </span>

                    <h2 class="preview-title">
                        See your finances
                        <span>clearly</span>
                    </h2>

                    <p class="preview-description">
                        Our intuitive dashboard gives you a complete overview
                        of your financial health at a glance.
                    </p>

                    <a href="/dashboard" class="preview-btn">
                        Explore Dashboard
                        <i class="bi bi-arrow-right"></i>
                    </a>

                    <!-- STATS -->

                    <div class="preview-stats">

                        <div class="stat-item">
                            <h3>10K+</h3>
                            <p>Transactions</p>
                        </div>

                        <div class="stat-item">
                            <h3>500+</h3>
                            <p>Users</p>
                        </div>

                        <div class="stat-item">
                            <h3>99.9%</h3>
                            <p>Secure</p>
                        </div>

                    </div>

                </div>

                <!-- RIGHT SIDE IMAGE -->

                <div class="col-lg-8">

                    <div class="dashboard-preview">

                        <img src="{{ asset('image/demo.jpeg') }}" alt="Dashboard Preview" class="img-fluid">

                        <!-- Floating Card -->

                        <div class="floating-card">

                            <i class="bi bi-graph-up-arrow"></i>

                            <div>
                                <strong>+25%</strong>
                                <span>Savings Growth</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    {{-- CTA call to action section --}}
    <section class="cta-section">

        <div class="container">

            <div class="cta-card">

                <div class="cta-left">

                    <div class="cta-icon">
                        <i class="bi bi-rocket-takeoff"></i>
                    </div>

                    <div>

                        <h2>
                            Ready to take control of your finances?
                        </h2>

                        <p>
                            Join thousands of users who are already managing
                            their expenses smarter.
                        </p>

                    </div>

                </div>

                <div class="cta-right">

                    <a href="/register" class="cta-btn">

                        Start Tracking Now

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>

        </div>

    </section>
@endsection
