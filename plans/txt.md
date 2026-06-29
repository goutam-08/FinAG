file and folder structure..

app/
└── Http/
└── Controllers/
├── HomeController.php
├── DashboardController.php
├── IncomeController.php
├── ExpenseController.php
├── CategoryController.php
├── TransactionController.php
├── BudgetController.php
├── GoalController.php
├── ReportController.php
└── SettingController.php

resources/
└── views/

    ├── layouts/
    │
    │   ├── website.blade.php
    │   ├── dashboard.blade.php
    │   ├── sidebar.blade.php
    │   └── footer.blade.php
    │
    ├── website/
    │
    │   ├── home.blade.php
    │   ├── pricing.blade.php
    │   ├── resources.blade.php
    │   └── company.blade.php
    │
    ├── dashboard/
    │
    │   └── index.blade.php
    │
    ├── income/
    │
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   └── edit.blade.php
    │
    ├── expense/
    │
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   └── edit.blade.php
    │
    ├── category/
    │
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   └── edit.blade.php
    │
    ├── transaction/
    │
    │   └── index.blade.php
    │
    ├── budget/
    │
    │   └── index.blade.php
    │
    ├── goals/
    │
    │   └── index.blade.php
    │
    ├── reports/
    │
    │   └── index.blade.php
    │
    └── settings/
        │
        └── index.blade.php

public/

└── assets/
│
├── css/
│ └── app.css
│
├── js/
│ └── dashboard.js
│
└── images/
├── logo.png
└── favicon.png


<div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="summary-card">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Monthly Summary</h4>

            <select class="form-select month-select">
                <option>May 2024</option>
                <option>June 2024</option>
                <option>July 2024</option>
            </select>
        </div>

        <!-- Income -->
        <div class="mb-4">
            <h6>Income</h6>

            <div class="d-flex justify-content-between align-items-center">
                <span class="amount income">₹75,000</span>
                <span class="percent">60%</span>
            </div>

            <div class="progress mt-2">
                <div class="progress-bar income-bar" style="width:60%;"></div>
            </div>
        </div>

        <!-- Expense -->
        <div class="mb-4">
            <h6>Expense</h6>

            <div class="d-flex justify-content-between align-items-center">
                <span class="amount expense">₹35,000</span>
                <span class="percent">28%</span>
            </div>

            <div class="progress mt-2">
                <div class="progress-bar expense-bar" style="width:28%;"></div>
            </div>
        </div>

        <!-- Savings -->
        <div class="mb-4">
            <h6>Savings</h6>

            <div class="d-flex justify-content-between align-items-center">
                <span class="amount savings">₹40,000</span>
                <span class="percent">32%</span>
            </div>

            <div class="progress mt-2">
                <div class="progress-bar savings-bar" style="width:32%;"></div>
            </div>
        </div>

        <!-- Savings Rate Box -->
        <div class="saving-box">
            <div class="d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="fw-bold">Savings Rate</h5>
                    <p class="mb-0 text-muted">
                        Great job! You're saving more than last month.
                    </p>
                </div>

                <div class="text-end">
                    <h2 class="fw-bold text-success">32%</h2>

                    <svg width="80" height="50" viewBox="0 0 80 50">
                        <polyline
                            points="5,40 18,28 28,35 40,20 50,25 62,10 75,2"
                            fill="none"
                            stroke="#22c55e"
                            stroke-width="3"/>

                        <polygon
                            points="75,2 70,8 78,8"
                            fill="#22c55e"/>
                    </svg>
                </div>

            </div>
        </div>

    </div>

</div>

</body>
</html>