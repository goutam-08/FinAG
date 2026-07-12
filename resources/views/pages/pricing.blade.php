<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinAG - Simple & Transparent Pricing</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/pricing.css') }}">
</head>

<body>

    <header class="hero-section">
        <div class="container text-center">
            <h1 class="main-heading">Simple & Transparent Pricing</h1>
            <p class="subtitle">Choose the perfect plan for your personal or business finances.</p>
        </div>
    </header>

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

    <footer class="cta-section">
        <div class="container text-center">
            <h2>Ready to take control of your finances?</h2>
            <button class="btn btn-cta">Start Free Today</button>
        </div>
    </footer>

</body>

</html>
