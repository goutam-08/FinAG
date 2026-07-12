@extends('layouts.guests.guestheader')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@endpush
@section('content')
<section class="about-hero">

    <div class="container">

        <div class="row align-items-center gy-5">

            <!-- Left -->

            <div class="col-lg-5">

                <span class="about-tag">
                    <i class="bi bi-stars"></i>
                    About FinAG
                </span>

                <h1>
                    Helping You
                    <span>Manage Money</span>
                    Smarter
                </h1>

                <p>
                    FinAG is an intelligent finance management platform
                    designed for both individuals and businesses.
                    Track expenses, manage budgets, analyze reports
                    and grow your savings with confidence.
                </p>

                <div class="hero-buttons">

                    <a href="/register" class="btn-start">
                        Get Started Free
                    </a>

                    <a href="/contact" class="btn-contact">
                        Contact Us
                    </a>

                </div>

                <div class="hero-features">

                    <div>

                        <i class="bi bi-shield-check"></i>

                        <span>100% Secure</span>

                    </div>

                    <div>

                        <i class="bi bi-bar-chart-line"></i>

                        <span>Smart Analytics</span>

                    </div>

                    <div>

                        <i class="bi bi-phone"></i>

                        <span>Responsive</span>

                    </div>

                </div>

            </div>

            <!-- Right -->

            <div class="col-lg-7 text-center">

                <div class="dashboard-preview">

                    <img src="{{ asset('') }}"
                        class="img-fluid dashboard-img">

                    <div class="floating-icon icon1">
                        <i class="bi bi-wallet2"></i>
                    </div>

                    <div class="floating-icon icon2">
                        <i class="bi bi-currency-rupee"></i>
                    </div>

                    <div class="floating-icon icon3">
                        <i class="bi bi-pie-chart-fill"></i>
                    </div>

                    <div class="floating-icon icon4">
                        <i class="bi bi-shield-lock-fill"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- ================= OUR STORY ================= -->

<section class="our-story">

    <div class="container">

        <div class="row align-items-center gy-5">

            <!-- Illustration -->

            <div class="col-lg-5">

                <img src="{{ asset('image/about-story.png') }}"
                    class="img-fluid story-img"
                    alt="Our Story">

            </div>

            <!-- Content -->

            <div class="col-lg-7">

                <span class="section-tag">
                    OUR STORY
                </span>

                <h2>
                    From an Idea to a
                    <span>Smart Finance Platform</span>
                </h2>

                <p>

                    FinAG was created with one simple goal — making
                    personal and business finance management effortless.

                    We believe everyone deserves a beautiful dashboard,
                    meaningful insights, and powerful budgeting tools
                    without complexity.

                </p>

                <!-- Timeline -->

                <div class="timeline">

                    <div class="timeline-item active">

                        <div class="timeline-circle">

                            <i class="bi bi-lightbulb"></i>

                        </div>

                        <h5>Idea</h5>

                        <small>
                            Started with a vision to simplify finance.
                        </small>

                    </div>

                    <div class="timeline-line"></div>

                    <div class="timeline-item">

                        <div class="timeline-circle">

                            <i class="bi bi-code-slash"></i>

                        </div>

                        <h5>Development</h5>

                        <small>
                            Built using Laravel & Bootstrap.
                        </small>

                    </div>

                    <div class="timeline-line"></div>

                    <div class="timeline-item">

                        <div class="timeline-circle">

                            <i class="bi bi-rocket"></i>

                        </div>

                        <h5>Launch</h5>

                        <small>
                            Ready for personal & business users.
                        </small>

                    </div>

                    <div class="timeline-line"></div>

                    <div class="timeline-item">

                        <div class="timeline-circle">

                            <i class="bi bi-graph-up-arrow"></i>

                        </div>

                        <h5>Growth</h5>

                        <small>
                            Continuously improving with new features.
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- ================= WHY CHOOSE US ================= -->

<section class="why-finag">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">
                WHY FINAG
            </span>

            <h2 class="section-title">
                Why Choose <span>FinAG?</span>
            </h2>

            <p class="section-subtitle">

                Everything you need to manage your personal and business
                finances in one beautiful dashboard.

            </p>

        </div>

        <div class="row g-4">

            <!-- Card 1 -->

            <div class="col-lg-4 col-md-6">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-wallet2"></i>

                    </div>

                    <h4>Expense Tracking</h4>

                    <p>

                        Record every expense with categories
                        and detailed history.

                    </p>

                </div>

            </div>

            <!-- Card 2 -->

            <div class="col-lg-4 col-md-6">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-pie-chart-fill"></i>

                    </div>

                    <h4>Budget Planning</h4>

                    <p>

                        Create monthly budgets and control
                        unnecessary spending.

                    </p>

                </div>

            </div>

            <!-- Card 3 -->

            <div class="col-lg-4 col-md-6">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-graph-up-arrow"></i>

                    </div>

                    <h4>Advanced Analytics</h4>

                    <p>

                        Understand your financial habits
                        using beautiful reports.

                    </p>

                </div>

            </div>

            <!-- Card 4 -->

            <div class="col-lg-4 col-md-6">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-bank2"></i>

                    </div>

                    <h4>Business Finance</h4>

                    <p>

                        Easily manage income,
                        expenses and cash flow.

                    </p>

                </div>

            </div>

            <!-- Card 5 -->

            <div class="col-lg-4 col-md-6">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-shield-lock-fill"></i>

                    </div>

                    <h4>100% Secure</h4>

                    <p>

                        Your financial data stays
                        encrypted and protected.

                    </p>

                </div>

            </div>

            <!-- Card 6 -->

            <div class="col-lg-4 col-md-6">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-phone-fill"></i>

                    </div>

                    <h4>Responsive Dashboard</h4>

                    <p>

                        Access your finances anytime
                        from desktop or mobile.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>
<!--==========================
      Statistics Section
===========================-->

<section class="stats-section">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">
                OUR IMPACT
            </span>

            <h2 class="section-title">

                Trusted by Thousands of Users

            </h2>

            <p class="section-subtitle">

                FinAG helps individuals and businesses manage finances
                efficiently with powerful tools and beautiful analytics.

            </p>

        </div>

        <div class="row g-4">

            <!-- Card -->

            <div class="col-lg-3 col-md-6">

                <div class="stats-card">

                    <div class="stats-icon">

                        <i class="bi bi-people-fill"></i>

                    </div>

                    <h2>10K+</h2>

                    <p>Active Users</p>

                </div>

            </div>

            <!-- Card -->

            <div class="col-lg-3 col-md-6">

                <div class="stats-card">

                    <div class="stats-icon">

                        <i class="bi bi-currency-rupee"></i>

                    </div>

                    <h2>₹50M+</h2>

                    <p>Transactions Managed</p>

                </div>

            </div>

            <!-- Card -->

            <div class="col-lg-3 col-md-6">

                <div class="stats-card">

                    <div class="stats-icon">

                        <i class="bi bi-shield-check"></i>

                    </div>

                    <h2>99.9%</h2>

                    <p>Secure Platform</p>

                </div>

            </div>

            <!-- Card -->

            <div class="col-lg-3 col-md-6">

                <div class="stats-card">

                    <div class="stats-icon">

                        <i class="bi bi-star-fill"></i>

                    </div>

                    <h2>4.9★</h2>

                    <p>User Rating</p>

                </div>

            </div>

        </div>

    </div>

</section>
<!--==========================
        Meet Our Team
===========================-->

<section class="team-section">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">
                OUR TEAM
            </span>

            <h2 class="section-title">

                Meet The People Behind
                <span>FinAG</span>

            </h2>

            <p class="section-subtitle">

                Passionate developers and finance enthusiasts working
                together to build a smarter finance management platform.

            </p>

        </div>

        <div class="row g-4">

            <!-- Team Member -->

            <div class="col-lg-4 col-md-6">

                <div class="team-card">

                    <div class="team-img">

                        <img src="{{ asset('image/team1.jpg') }}" alt="">

                    </div>

                    <h4>Goutam Kumar</h4>

                    <span>Founder & Full Stack Developer</span>

                    <p>

                        Passionate Laravel developer building modern
                        finance management solutions.

                    </p>

                    <div class="team-social">

                        <a href="#"><i class="bi bi-linkedin"></i></a>

                        <a href="#"><i class="bi bi-github"></i></a>

                        <a href="#"><i class="bi bi-envelope-fill"></i></a>

                    </div>

                </div>

            </div>

            <!-- Team Member -->

            <div class="col-lg-4 col-md-6">

                <div class="team-card">

                    <div class="team-img">

                        <img src="{{ asset('image/team2.jpg') }}" alt="">

                    </div>

                    <h4>Rahul Sharma</h4>

                    <span>UI / UX Designer</span>

                    <p>

                        Creates beautiful, user-friendly interfaces
                        with modern design principles.

                    </p>

                    <div class="team-social">

                        <a href="#"><i class="bi bi-linkedin"></i></a>

                        <a href="#"><i class="bi bi-dribbble"></i></a>

                        <a href="#"><i class="bi bi-envelope-fill"></i></a>

                    </div>

                </div>

            </div>

            <!-- Team Member -->

            <div class="col-lg-4 col-md-6">

                <div class="team-card">

                    <div class="team-img">

                        <img src="{{ asset('image/team3.jpg') }}" alt="">

                    </div>

                    <h4>Priya Singh</h4>

                    <span>Finance Analyst</span>

                    <p>

                        Helps transform financial data into
                        meaningful insights and reports.

                    </p>

                    <div class="team-social">

                        <a href="#"><i class="bi bi-linkedin"></i></a>

                        <a href="#"><i class="bi bi-twitter-x"></i></a>

                        <a href="#"><i class="bi bi-envelope-fill"></i></a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!--==========================
      Testimonials
===========================-->

<section class="testimonial-section">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">
                TESTIMONIALS
            </span>

            <h2 class="section-title">

                What Our
                <span>Users Say</span>

            </h2>

            <p class="section-subtitle">

                Thousands of users trust FinAG to simplify their
                financial journey.

            </p>

        </div>

        <div class="row g-4">

            <!-- Review -->

            <div class="col-lg-4">

                <div class="testimonial-card">

                    <div class="quote">

                        <i class="bi bi-quote"></i>

                    </div>

                    <p>

                        FinAG completely changed the way I manage my
                        monthly expenses. The dashboard is simple and
                        incredibly useful.

                    </p>

                    <div class="stars">

                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>

                    </div>

                    <div class="user">

                        <img src="{{ asset('image/user1.jpg') }}">

                        <div>

                            <h6>Rahul Sharma</h6>

                            <small>Software Engineer</small>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Review -->

            <div class="col-lg-4">

                <div class="testimonial-card">

                    <div class="quote">

                        <i class="bi bi-quote"></i>

                    </div>

                    <p>

                        Budget planning has become much easier.
                        Beautiful UI and very smooth experience.

                    </p>

                    <div class="stars">

                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>

                    </div>

                    <div class="user">

                        <img src="{{ asset('image/user2.jpg') }}">

                        <div>

                            <h6>Priya Singh</h6>

                            <small>Business Owner</small>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Review -->

            <div class="col-lg-4">

                <div class="testimonial-card">

                    <div class="quote">

                        <i class="bi bi-quote"></i>

                    </div>

                    <p>

                        Finally found a finance manager that is both
                        beautiful and powerful. Highly recommended.

                    </p>

                    <div class="stars">

                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>

                    </div>

                    <div class="user">

                        <img src="{{ asset('image/user3.jpg') }}">

                        <div>

                            <h6>Aman Verma</h6>

                            <small>Freelancer</small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!--==========================
Security & Trust
===========================-->

<section class="security-section">

    <div class="container">

        <div class="row align-items-center gy-5">

            <!-- Left -->

            <div class="col-lg-6">

                <span class="section-tag">
                    SECURITY
                </span>

                <h2 class="section-title">

                    Security & Trust
                    <span>Is Our Priority</span>

                </h2>

                <p class="section-subtitle">

                    We understand that financial information is sensitive.
                    That's why FinAG is built with security, privacy,
                    and reliability at its core.

                </p>

                <div class="security-list">

                    <div class="security-item">

                        <i class="bi bi-shield-lock-fill"></i>

                        <div>

                            <h5>Secure Authentication</h5>

                            <p>Protected login with encrypted passwords.</p>

                        </div>

                    </div>

                    <div class="security-item">

                        <i class="bi bi-lock-fill"></i>

                        <div>

                            <h5>Data Privacy</h5>

                            <p>Your financial records remain private.</p>

                        </div>

                    </div>

                    <div class="security-item">

                        <i class="bi bi-cloud-check-fill"></i>

                        <div>

                            <h5>Reliable Storage</h5>

                            <p>Data stored securely with backup support.</p>

                        </div>

                    </div>

                    <div class="security-item">

                        <i class="bi bi-patch-check-fill"></i>

                        <div>

                            <h5>Trusted Platform</h5>

                            <p>Built using modern development standards.</p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Right -->

            <div class="col-lg-6 text-center">

                <img src="{{ asset('image/security.png') }}"
                     class="img-fluid security-img"
                     alt="Security">

            </div>

        </div>

    </div>

</section>

<!--==========================
          CTA
===========================-->

<section class="about-cta">

    <div class="container">

        <div class="cta-box">

            <h2>

                Ready to Take Control of Your Finances?

            </h2>

            <p>

                Join thousands of users managing their money
                smarter with FinAG.

            </p>

            <a href="/register" class="cta-btn">

                Start Free Today

            </a>

        </div>

    </div>

</section>
@endsection
