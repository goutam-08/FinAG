@extends('layouts.guest')
@section('content')
    <style>
        /* --- Base Reset & Variable Definitions --- */
        :root {
            --bg-light: #f8fafc;
            --primary-green: #10b981;
            --dark-green: #059669;
            --bright-green: #34d399;
            --navy-dark: #0f172a;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
            --radius-lg: 24px;
            --radius-md: 16px;
            --shadow-sm: 0 4px 6px -1px rgb(0 0 0 / 0.05);
            --shadow-md: 0 10px 15px -3px rgb(0 0 0 / 0.05), 0 4px 6px -4px rgb(0 0 0 / 0.05);
            --shadow-glow: 0 20px 25px -5px rgba(16, 185, 129, 0.2), 0 8px 10px -6px rgba(16, 185, 129, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            background-image: radial-gradient(at 0% 0%, rgba(16, 185, 129, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(15, 23, 42, 0.03) 0px, transparent 50%);
            color: var(--text-main);
            line-height: 1.5;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .text-center {
            text-align: center;
        }

        /* --- Hero Section --- */
        .hero-section {
            padding: 80px 0 48px;
        }

        .main-heading {
            font-size: 3rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            color: var(--navy-dark);
            margin-bottom: 16px;
        }

        .subtitle {
            font-size: 1.25rem;
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto;
        }

        /* --- Pricing Grid & Cards --- */
        .pricing-section {
            padding: 32px 0;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 32px;
            align-items: center;
        }

        .pricing-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 40px;
            position: relative;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: var(--shadow-sm);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .pricing-card:hover {
            transform: translateY(-4px);
        }

        .card-header {
            margin-bottom: 32px;
        }

        .plan-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .price {
            font-size: 2.75rem;
            font-weight: 800;
            color: var(--navy-dark);
        }

        .period {
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-muted);
        }

        .features-list {
            list-style: none;
            margin-bottom: 40px;
            flex-grow: 1;
        }

        .features-list li {
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.95rem;
        }

        .features-list .include-all {
            margin-bottom: 20px;
            color: var(--navy-dark);
        }

        .check {
            color: var(--primary-green);
            font-weight: bold;
        }

        /* --- Card Custom Styles --- */
        /* Free Card */
        .free-card {
            min-height: 500px;
        }

        /* Pro Card (Highlighted) */
        .pro-card {
            border: 2px solid var(--primary-green);
            box-shadow: var(--shadow-glow);
            min-height: 540px;
            /* Slightly larger scale */
            z-index: 2;
        }

        .pro-card .badge {
            position: absolute;
            top: -16px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary-green);
            color: var(--white);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Business Card (Dark Navy) */
        .business-card {
            background: var(--navy-dark);
            color: rgba(255, 255, 255, 0.8);
            border: none;
            min-height: 500px;
        }

        .business-card .plan-name,
        .business-card .price {
            color: var(--white);
        }

        .business-card .period {
            color: rgba(255, 255, 255, 0.5);
        }

        .check-green {
            color: var(--bright-green);
            font-weight: bold;
        }

        /* --- Buttons Layout --- */
        .btn {
            width: 100%;
            padding: 14px 28px;
            border-radius: var(--radius-md);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            text-align: center;
        }

        .btn-outline-green {
            background: transparent;
            border: 2px solid var(--primary-green);
            color: var(--primary-green);
        }

        .btn-outline-green:hover {
            background: rgba(16, 185, 129, 0.05);
        }

        .btn-filled-green {
            background: var(--primary-green);
            color: var(--white);
        }

        .btn-filled-green:hover {
            background: var(--dark-green);
        }

        .btn-bright-green {
            background: var(--bright-green);
            color: var(--navy-dark);
        }

        .btn-bright-green:hover {
            background: #22c55e;
        }

        /* --- Comparison Table Section --- */
        .comparison-section {
            padding: 96px 24px;
        }

        .section-title {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 48px;
            color: var(--navy-dark);
        }

        .table-responsive {
            overflow-x: auto;
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .comparison-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 1rem;
        }

        .comparison-table th,
        .comparison-table td {
            padding: 20px 28px;
            border-bottom: 1px solid #f1f5f9;
        }

        .comparison-table th {
            background: #f8fafc;
            font-weight: 700;
            color: var(--navy-dark);
        }

        .comparison-table td:not(:first-child),
        .comparison-table th:not(:first-child) {
            text-align: center;
            width: 22%;
        }

        .icon-check {
            color: var(--primary-green);
            font-weight: bold;
            font-size: 1.2rem;
        }

        .icon-cross {
            color: #cbd5e1;
            font-size: 1rem;
        }

        /* --- Footer CTA Section --- */
        .cta-section {
            background: var(--navy-dark);
            padding: 80px 24px;
            margin-top: 40px;
            border-radius: 40px 40px 0 0;
            color: var(--white);
        }

        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 32px;
        }

        .btn-cta {
            width: auto;
            display: inline-block;
            background: var(--bright-green);
            color: var(--navy-dark);
            padding: 16px 40px;
            font-size: 1.1rem;
            border-radius: var(--radius-md);
            font-weight: 700;
            box-shadow: 0 4px 14px rgba(52, 211, 153, 0.3);
        }

        .btn-cta:hover {
            background: #22c55e;
            transform: translateY(-1px);
        }

        /* Responsive Overrides (Bootstrap-style) */
        @media (max-width: 991px) {
            .pricing-grid {
                grid-template-columns: 1fr;
                max-width: 450px;
                margin: 0 auto;
            }

            .pro-card {
                min-height: auto;
            }

            .main-heading {
                font-size: 2.25rem;
            }
        }
    </style>

    <main class="pricing-section container">
        <div class="pricing-grid">

            <div class="pricing-card free-card">
                <div class="card-header">
                    <h3 class="plan-name">Free</h3>
                    <div class="price">₹0<span class="period">/month</span></div>
                </div>
                <ul class="features-list">
                    <li><span class="check">✓</span> Personal Dashboard</li>
                    <li><span class="check">✓</span> Income & Expense Tracking</li>
                    <li><span class="check">✓</span> Budget Planner</li>
                    <li><span class="check">✓</span> Basic Reports</li>
                </ul>
                <button class="btn btn-outline-green">Get Started</button>
            </div>

            <div class="pricing-card pro-card">
                <span class="badge">Most Popular</span>
                <div class="card-header">
                    <h3 class="plan-name">Pro</h3>
                    <div class="price">₹199<span class="period">/month</span></div>
                </div>
                <ul class="features-list">
                    <li class="include-all"><strong>Everything in Free, plus:</strong></li>
                    <li><span class="check">✓</span> Unlimited Transactions</li>
                    <li><span class="check">✓</span> PDF Export</li>
                    <li><span class="check">✓</span> Advanced Analytics</li>
                    <li><span class="check">✓</span> AI Insights</li>
                </ul>
                <button class="btn btn-filled-green">Upgrade Now</button>
            </div>

            <div class="pricing-card business-card">
                <div class="card-header">
                    <h3 class="plan-name">Business</h3>
                    <div class="price">₹499<span class="period">/month</span></div>
                </div>
                <ul class="features-list">
                    <li class="include-all"><strong>Everything in Pro, plus:</strong></li>
                    <li><span class="check-green">✓</span> Team Members</li>
                    <li><span class="check-green">✓</span> Customers & Vendors</li>
                    <li><span class="check-green">✓</span> Invoice Management</li>
                    <li><span class="check-green">✓</span> Business Reports</li>
                </ul>
                <button class="btn btn-bright-green">Buy Now</button>
            </div>

        </div>
    </main>

    <section class="comparison-section container">
        <h2 class="section-title text-center">Compare Features</h2>
        <div class="table-responsive">
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>Features</th>
                        <th>Free</th>
                        <th>Pro</th>
                        <th>Business</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Personal Dashboard</td>
                        <td><span class="icon-check">✓</span></td>
                        <td><span class="icon-check">✓</span></td>
                        <td><span class="icon-check">✓</span></td>
                    </tr>
                    <tr>
                        <td>Income & Expense Tracking</td>
                        <td><span class="icon-check">✓</span></td>
                        <td><span class="icon-check">✓</span></td>
                        <td><span class="icon-check">✓</span></td>
                    </tr>
                    <tr>
                        <td>Budget Planner</td>
                        <td><span class="icon-check">✓</span></td>
                        <td><span class="icon-check">✓</span></td>
                        <td><span class="icon-check">✓</span></td>
                    </tr>
                    <tr>
                        <td>Basic Reports</td>
                        <td><span class="icon-check">✓</span></td>
                        <td><span class="icon-check">✓</span></td>
                        <td><span class="icon-check">✓</span></td>
                    </tr>
                    <tr>
                        <td>Unlimited Transactions</td>
                        <td><span class="icon-cross">✕</span></td>
                        <td><span class="icon-check">✓</span></td>
                        <td><span class="icon-check">✓</span></td>
                    </tr>
                    <tr>
                        <td>PDF Export & Advanced Analytics</td>
                        <td><span class="icon-cross">✕</span></td>
                        <td><span class="icon-check">✓</span></td>
                        <td><span class="icon-check">✓</span></td>
                    </tr>
                    <tr>
                        <td>AI Insights</td>
                        <td><span class="icon-cross">✕</span></td>
                        <td><span class="icon-check">✓</span></td>
                        <td><span class="icon-check">✓</span></td>
                    </tr>
                    <tr>
                        <td>Team Members & Invoicing</td>
                        <td><span class="icon-cross">✕</span></td>
                        <td><span class="icon-cross">✕</span></td>
                        <td><span class="icon-check">✓</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection

{{-- @include('layouts.guests.guestfooter') --}}
