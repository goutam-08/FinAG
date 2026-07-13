@extends('layouts.guests.guestheader')
@section('content')
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
                        +91 9876543210
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