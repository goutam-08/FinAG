console.log("Dashboard JS Loaded");
// if (window.disableDashboardDefaultCharts) {
//     return;
// }

const ctx = document.getElementById('expenseChart');

if (ctx && !Chart.getChart(ctx)) {
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            datasets: [{
                label: 'Monthly Expense',
                data: [
                    12000,
                    18000,
                    15000,
                    22000,
                    25000,
                    28000,
                    24000,
                    32000,
                    30000,
                    35000,
                    40000,
                    45000
                ],
                borderColor: '#10B981',
                backgroundColor: 'rgba(16, 185, 129, 0.15)',
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#10B981',
                pointBorderColor: '#fff',
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '₹' + value;
                        }
                    }
                }
            }
        }
    });
}

const categoryCtx = document.getElementById('categoryChart');

if (categoryCtx && !Chart.getChart(categoryCtx)) {
    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Food','Transport','Shopping','Business','Bills'],
            datasets: [{
                data: [5000,3000,7000,4000,2000],
                backgroundColor: [
                    '#10B981',
                    '#3B82F6',
                    '#FACC15',
                    '#8B5CF6',
                    '#F43F5E'
                ]
            }]
        },
        options: {
            responsive: true,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });
}

// budget page ka graph
document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById("budgetChart");

    if (!ctx) return;

    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: ["Food", "Shopping", "Transport"],
            datasets: [{
                label: "Budget",
                data: [10000, 8000, 5000]
            }]
        }
    });

});