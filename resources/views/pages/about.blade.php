@extends('layouts.guest')

@section('content')
    <style>
        .about-hero {
            padding: 10px 0 90px;
            background: #f8fffc;
            overflow: hidden;
        }

        .about-tag {
            display: inline-flex;
            align-items: center;

            gap: 8px;

            background: #E8FFF4;

            color: #10B981;

            padding: 10px 18px;

            border-radius: 40px;

            font-weight: 600;

            margin-bottom: 25px;

        }

        .about-hero h1 {

            font-size: 65px;

            font-weight: 800;

            color: #081C3A;

            line-height: 1.15;

        }

        .about-hero h1 span {

            color: #10B981;

        }

        .about-hero p {

            font-size: 19px;

            color: #667085;

            margin: 30px 0;

            line-height: 1.9;

        }

        .hero-buttons {

            display: flex;

            gap: 20px;

            margin-bottom: 45px;

        }

        .btn-start {

            background: #10B981;

            color: #fff;

            text-decoration: none;

            padding: 15px 34px;

            border-radius: 12px;

            font-weight: 600;

            transition: .3s;

        }

        .btn-start:hover {

            background: #0E9F6E;

            color: #fff;

            transform: translateY(-4px);

        }

        .btn-contact {

            border: 2px solid #dbe3ec;

            color: #081C3A;

            text-decoration: none;

            padding: 15px 34px;

            border-radius: 12px;

            font-weight: 600;

            transition: .3s;

        }

        .btn-contact:hover {

            background: #081C3A;

            color: #fff;

        }

        .hero-features {

            display: flex;

            gap: 35px;

        }

        .hero-features div {

            display: flex;

            align-items: center;

            gap: 10px;

            font-weight: 600;

            color: #475467;

        }

        .hero-features i {

            color: #10B981;

            font-size: 22px;

        }

        .dashboard-preview {

            position: relative;

        }

        .dashboard-img {

            border-radius: 22px;

            box-shadow: 0 30px 70px rgba(0, 0, 0, .18);

        }

        .floating-icon {

            position: absolute;

            width: 70px;

            height: 70px;

            background: #fff;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            box-shadow: 0 15px 40px rgba(0, 0, 0, .15);

            color: #10B981;

            font-size: 28px;

            animation: float 4s ease-in-out infinite;

        }

        .icon1 {

            top: 15%;

            left: -25px;

        }

        .icon2 {

            top: 30%;

            right: -25px;

        }

        .icon3 {

            bottom: 18%;

            left: 15px;

        }

        .icon4 {

            bottom: 10%;

            right: 25px;

        }

        @keyframes float {

            0% {

                transform: translateY(0);

            }

            50% {

                transform: translateY(-12px);

            }

            100% {

                transform: translateY(0);

            }

        }

        @media(max-width:992px) {

            .about-hero {

                padding: 120px 0 60px;

            }

            .about-hero h1 {

                font-size: 46px;

            }

            .hero-features {

                flex-wrap: wrap;

                gap: 20px;

            }

        }

        /*================ OUR STORY ================*/

        .our-story {

            padding: 100px 0;

            background: #F8FAFC;

        }

        .story-img {

            border-radius: 25px;

            box-shadow: 0 20px 60px rgba(0, 0, 0, .10);

            transition: .4s;

        }

        .story-img:hover {

            transform: scale(1.03);

        }

        .section-tag {

            display: inline-block;

            background: #E9FFF4;

            color: #10B981;

            padding: 8px 18px;

            border-radius: 30px;

            font-size: 14px;

            font-weight: 700;

            margin-bottom: 20px;

            letter-spacing: 1px;

        }

        .our-story h2 {

            font-size: 46px;

            font-weight: 800;

            color: #0F172A;

            margin-bottom: 20px;

        }

        .our-story h2 span {

            color: #10B981;

        }

        .our-story p {

            font-size: 18px;

            line-height: 1.9;

            color: #667085;

            margin-bottom: 45px;

        }

        .timeline {

            display: flex;

            align-items: flex-start;

            justify-content: space-between;

            position: relative;

            gap: 15px;

            flex-wrap: wrap;

        }

        .timeline-item {

            text-align: center;

            flex: 1;

            min-width: 120px;

        }

        .timeline-circle {

            width: 70px;

            height: 70px;

            background: #fff;

            border-radius: 50%;

            margin: auto;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 28px;

            color: #10B981;

            box-shadow: 0 12px 30px rgba(0, 0, 0, .12);

            transition: .3s;

        }

        .timeline-item:hover .timeline-circle {

            background: #10B981;

            color: #fff;

            transform: translateY(-8px);

        }

        .timeline-item h5 {

            margin-top: 15px;

            font-weight: 700;

            color: #0F172A;

        }

        .timeline-item small {

            color: #6B7280;

            line-height: 1.6;

            display: block;

        }

        .timeline-line {

            height: 3px;

            background: #D1FAE5;

            flex: 0.5;

            margin-top: 34px;

        }

        .active .timeline-circle {

            background: #10B981;

            color: #fff;

        }

        @media(max-width:992px) {

            .timeline {

                flex-direction: column;

                align-items: center;

            }

            .timeline-line {

                width: 3px;

                height: 50px;

                margin: 10px 0;

            }

            .our-story h2 {

                font-size: 36px;

            }

        }

        /*==============================
                    Why Choose FinAG
                    ==============================*/

        .why-finag {

            padding: 110px 0;

            background: #F8FAFC;

        }

        .feature-card {

            background: #fff;

            border-radius: 22px;

            padding: 40px;

            text-align: center;

            transition: .35s;

            border: 1px solid #EDF2F7;

            height: 100%;

            position: relative;

            overflow: hidden;

        }

        .feature-card::before {

            content: "";

            position: absolute;

            top: 0;

            left: 0;

            width: 100%;

            height: 5px;

            background: #10B981;

            transform: scaleX(0);

            transition: .35s;

        }

        .feature-card:hover::before {

            transform: scaleX(1);

        }

        .feature-card:hover {

            transform: translateY(-12px);

            box-shadow: 0 25px 60px rgba(0, 0, 0, .12);

        }

        .feature-icon {

            width: 90px;

            height: 90px;

            margin: auto;

            border-radius: 50%;

            background: linear-gradient(135deg, #10B981, #34D399);

            color: #fff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 38px;

            margin-bottom: 25px;

            transition: .35s;

        }

        .feature-card:hover .feature-icon {

            transform: rotate(8deg) scale(1.1);

        }

        .feature-card h4 {

            font-size: 24px;

            font-weight: 700;

            color: #081C3A;

            margin-bottom: 15px;

        }

        .feature-card p {

            color: #667085;

            line-height: 1.8;

            margin: 0;

        }

        /*==========================
                    Statistics
                    ==========================*/

        .stats-section {

            padding: 110px 0;

            background: #ffffff;

        }

        .stats-card {

            background: #fff;

            border-radius: 24px;

            padding: 40px 30px;

            text-align: center;

            border: 1px solid #EAECEF;

            transition: .35s;

            height: 100%;

            position: relative;

            overflow: hidden;

        }

        .stats-card::before {

            content: "";

            position: absolute;

            top: 0;

            left: 0;

            width: 100%;

            height: 5px;

            background: #10B981;

            transform: scaleX(0);

            transition: .4s;

        }

        .stats-card:hover::before {

            transform: scaleX(1);

        }

        .stats-card:hover {

            transform: translateY(-12px);

            box-shadow: 0 25px 60px rgba(0, 0, 0, .12);

        }

        .stats-icon {

            width: 90px;

            height: 90px;

            margin: auto;

            border-radius: 50%;

            background: linear-gradient(135deg, #10B981, #34D399);

            display: flex;

            align-items: center;

            justify-content: center;

            color: #fff;

            font-size: 38px;

            margin-bottom: 25px;

            transition: .4s;

        }

        .stats-card:hover .stats-icon {

            transform: rotate(10deg) scale(1.1);

        }

        .stats-card h2 {

            font-size: 48px;

            font-weight: 800;

            color: #081C3A;

            margin-bottom: 10px;

        }

        .stats-card p {

            font-size: 17px;

            color: #667085;

            margin: 0;

        }

        /*==========================
                            Team Section
                    ===========================*/

        .team-section {

            padding: 110px 0;

            background: #F8FAFC;

        }

        .team-card {

            background: #fff;

            border-radius: 24px;

            padding: 40px 30px;

            text-align: center;

            transition: .35s;

            border: 1px solid #EAECEF;

            height: 100%;

            overflow: hidden;

        }

        .team-card:hover {

            transform: translateY(-12px);

            box-shadow: 0 30px 70px rgba(0, 0, 0, .12);

        }

        .team-img {

            width: 140px;

            height: 140px;

            margin: auto;

            border-radius: 50%;

            overflow: hidden;

            border: 6px solid #10B981;

            margin-bottom: 25px;

        }

        .team-img img {

            width: 100%;

            height: 100%;

            object-fit: cover;

            transition: .4s;

        }

        .team-card:hover img {

            transform: scale(1.08);

        }

        .team-card h4 {

            font-size: 26px;

            font-weight: 700;

            color: #081C3A;

            margin-bottom: 8px;

        }

        .team-card span {

            color: #10B981;

            font-weight: 600;

            display: block;

            margin-bottom: 18px;

        }

        .team-card p {

            color: #667085;

            line-height: 1.8;

            margin-bottom: 25px;

        }

        .team-social {

            display: flex;

            justify-content: center;

            gap: 18px;

        }

        .team-social a {

            width: 46px;

            height: 46px;

            border-radius: 50%;

            background: #F2F4F7;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #081C3A;

            text-decoration: none;

            transition: .3s;

            font-size: 18px;

        }

        .team-social a:hover {

            background: #10B981;

            color: #fff;

            transform: translateY(-5px);

        }

        /*==========================
                    Testimonials
                    ===========================*/

        .testimonial-section {

            padding: 110px 0;

            background: #fff;

        }

        .testimonial-card {

            background: #fff;

            border-radius: 22px;

            padding: 35px;

            border: 1px solid #ECEFF3;

            transition: .35s;

            height: 100%;

            box-shadow: 0 10px 35px rgba(0, 0, 0, .05);

        }

        .testimonial-card:hover {

            transform: translateY(-12px);

            box-shadow: 0 25px 55px rgba(0, 0, 0, .12);

        }

        .quote {

            font-size: 45px;

            color: #10B981;

            margin-bottom: 20px;

        }

        .testimonial-card p {

            color: #667085;

            line-height: 1.9;

            margin-bottom: 25px;

        }

        .stars {

            color: #FFC107;

            margin-bottom: 25px;

        }

        .user {

            display: flex;

            align-items: center;

            gap: 15px;

        }

        .user img {

            width: 60px;

            height: 60px;

            border-radius: 50%;

            object-fit: cover;

        }

        .user h6 {

            margin: 0;

            font-weight: 700;

            color: #081C3A;

        }

        .user small {

            color: #6B7280;

        }

        /*==========================
                    Security Section
                    ===========================*/

        .security-section {

            padding: 110px 0;

            background: #F8FAFC;

        }

        .security-img {

            max-width: 480px;

            transition: .4s;

        }

        .security-img:hover {

            transform: translateY(-10px);

        }

        .security-list {

            margin-top: 40px;

        }

        .security-item {

            display: flex;

            align-items: flex-start;

            gap: 20px;

            padding: 22px;

            background: #fff;

            border-radius: 18px;

            margin-bottom: 20px;

            transition: .35s;

            box-shadow: 0 10px 30px rgba(0, 0, 0, .05);

        }

        .security-item:hover {

            transform: translateX(10px);

            box-shadow: 0 20px 45px rgba(0, 0, 0, .10);

        }

        .security-item i {

            width: 65px;

            height: 65px;

            background: #10B981;

            color: #fff;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 16px;

            font-size: 28px;

            flex-shrink: 0;

        }

        .security-item h5 {

            font-weight: 700;

            margin-bottom: 8px;

            color: #081C3A;

        }

        .security-item p {

            margin: 0;

            color: #667085;

            line-height: 1.7;

        }

        /*==========================
                    CTA
                    ===========================*/

        .about-cta {

            padding-bottom: 120px;

            background: #fff;

        }

        .cta-box {

            background: linear-gradient(135deg, #081C3A, #0E2F5A);

            padding: 80px 40px;

            border-radius: 28px;

            text-align: center;

            color: #fff;

            position: relative;

            overflow: hidden;

        }

        .cta-box::before {

            content: "";

            position: absolute;

            width: 300px;

            height: 300px;

            background: rgba(255, 255, 255, .05);

            border-radius: 50%;

            top: -120px;

            right: -100px;

        }

        .cta-box::after {

            content: "";

            position: absolute;

            width: 250px;

            height: 250px;

            background: rgba(16, 185, 129, .12);

            border-radius: 50%;

            bottom: -120px;

            left: -80px;

        }

        .cta-box h2 {

            font-size: 48px;

            font-weight: 800;

            margin-bottom: 20px;

            position: relative;

            z-index: 2;

        }

        .cta-box p {

            font-size: 18px;

            max-width: 700px;

            margin: auto;

            margin-bottom: 35px;

            color: #D0D5DD;

            position: relative;

            z-index: 2;

        }

        .cta-btn {

            display: inline-block;

            padding: 18px 40px;

            background: #10B981;

            color: #fff;

            font-weight: 700;

            border-radius: 14px;

            text-decoration: none;

            transition: .35s;

            position: relative;

            z-index: 2;

        }

        .cta-btn:hover {

            background: #0F9D74;

            transform: translateY(-4px);

            color: #fff;

        }
    </style>
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

                        <img src="{{ asset('image/about.png') }}" class="img-fluid dashboard-img">

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

                    <img src="{{ asset('/image/ourStory.png') }}" class="img-fluid story-img" alt="Our Story">

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

                            <img src="{{ asset('image/user1.jpeg') }}" alt="">

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

                {{-- <div class="col-lg-4 col-md-6">

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

                </div> --}}

                <!-- Team Member -->

                <div class="col-lg-4 col-md-6">

                    <div class="team-card">

                        <div class="team-img">

                            <img src="{{ asset('image/team2.jpeg') }}" alt="">

                        </div>

                        <h4>Ayush Kumar</h4>

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

                            <img src="{{ asset('image/default-user.png') }}">

                            <div>

                                <h6>Om Sharma</h6>

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

                            <img src="{{ asset('image/default-user.png') }}">

                            <div>

                                <h6>Aman Raj</h6>

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

                            <img src="{{ asset('image/default-user.png') }}">

                            <div>

                                <h6>Babli Kumari</h6>

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

                    <img src="{{ asset('image/security.png') }}" class="img-fluid security-img" alt="Security">

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
