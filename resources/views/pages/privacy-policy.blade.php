@extends('layouts.guests.guestheader')
@section('content')
    <style>
        .privacy-hero {
            padding: 90px 0;
            background: #f8fbff;
        }

        .privacy-icon {
            width: 90px;
            height: 90px;
            margin: auto;
            background: #10b981;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            box-shadow: 0 10px 30px rgba(16, 185, 129, .25);
        }

        .privacy-hero h1 {
            font-size: 52px;
            font-weight: 700;
            color: #08152f;
        }

        .privacy-hero h1 span {
            color: #10b981;
        }

        .privacy-card {
            background: #fff;
            border-radius: 18px;
            padding: 35px;
            height: 100%;
            transition: .35s;
            border: 1px solid #edf2f7;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .05);
        }

        .privacy-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(16, 185, 129, .18);
        }

        .icon-box {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .icon-box i {
            font-size: 28px;
            color: #10b981;
        }

        .privacy-card h4 {
            font-weight: 700;
            margin-bottom: 18px;
            color: #0f172a;
        }

        .privacy-card p {
            color: #64748b;
            line-height: 1.8;
        }

        .privacy-card ul {
            padding-left: 18px;
            margin: 0;
        }

        .privacy-card ul li {
            color: #64748b;
            line-height: 2;
        }

        .btn-home {
            display: inline-block;
            padding: 14px 34px;
            border-radius: 50px;
            text-decoration: none;
            background: #10b981;
            color: #fff;
            font-weight: 600;
            transition: .3s;
        }

        .btn-home:hover {
            background: #059669;
            color: #fff;
            transform: translateY(-3px);
        }

        @media(max-width:768px) {

            .privacy-hero h1 {
                font-size: 38px;
            }

            .privacy-card {
                padding: 25px;
            }

        }
    </style>
    <section class="privacy-hero py-5">
        <div class="container">

            <div class="text-center mb-5">

                <div class="privacy-icon mb-3">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>

                <h1 class="fw-bold">
                    Privacy <span>Policy</span>
                </h1>

                <p class="text-muted mt-3">
                    Your privacy is our priority. Learn how FinAG collects,
                    uses and protects your personal information.
                </p>

                <small class="text-secondary">
                    Last Updated : 12 July 2026
                </small>

            </div>

            <div class="row g-4">

                <div class="col-lg-6">

                    <div class="privacy-card">

                        <div class="icon-box bg-success-subtle">
                            <i class="bi bi-person-lines-fill"></i>
                        </div>

                        <h4>Information We Collect</h4>

                        <ul>
                            <li>Full Name</li>
                            <li>Email Address</li>
                            <li>Phone Number</li>
                            <li>Income & Expense Records</li>
                            <li>Device Information</li>
                        </ul>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="privacy-card">

                        <div class="icon-box bg-primary-subtle">
                            <i class="bi bi-shield-check"></i>
                        </div>

                        <h4>How We Use Your Data</h4>

                        <ul>
                            <li>Improve user experience</li>
                            <li>Secure your account</li>
                            <li>Generate financial reports</li>
                            <li>Provide customer support</li>
                            <li>Send important updates</li>
                        </ul>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="privacy-card">

                        <div class="icon-box bg-warning-subtle">
                            <i class="bi bi-cookie"></i>
                        </div>

                        <h4>Cookies</h4>

                        <p>
                            We use cookies to improve website performance,
                            remember your preferences and enhance your browsing
                            experience.
                        </p>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="privacy-card">

                        <div class="icon-box bg-danger-subtle">
                            <i class="bi bi-lock-fill"></i>
                        </div>

                        <h4>Data Security</h4>

                        <p>
                            Your financial data is encrypted and protected
                            using secure technologies and industry best practices.
                        </p>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="privacy-card">

                        <div class="icon-box bg-info-subtle">
                            <i class="bi bi-diagram-3-fill"></i>
                        </div>

                        <h4>Third Party Services</h4>

                        <p>
                            FinAG uses trusted third-party services such as
                            Bootstrap, Chart.js and secure hosting providers
                            to improve functionality.
                        </p>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="privacy-card">

                        <div class="icon-box bg-success-subtle">
                            <i class="bi bi-envelope-paper-fill"></i>
                        </div>

                        <h4>Contact Us</h4>

                        <p class="mb-2">
                            <i class="bi bi-envelope-fill me-2"></i>
                            support@finag.com
                        </p>

                        <p class="mb-2">
                            <i class="bi bi-telephone-fill me-2"></i>
                            +91 9304449673
                        </p>

                        <p>
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            India
                        </p>

                    </div>

                </div>
            </div>
            <div class="text-center mt-5">
                <a href="/" class="btn-home">
                    <i class="bi bi-house-door-fill"></i>
                    Back To Home
                </a>
            </div>
        </div>
    </section>
@endsection
