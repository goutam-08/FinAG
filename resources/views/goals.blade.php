@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-4 gap-3">
            <div>
                <h2 class="fw-bold mb-1" style="color:#0f172a;">Goals</h2>
                <p class="text-muted mb-0">Plan your financial goals and track your progress.</p>
            </div>
            <button class="btn btn-success rounded-pill px-4 py-2 shadow-sm" data-bs-toggle="modal"
                data-bs-target="#goalModal">
                <i class="bi bi-plus-lg me-2"></i>Add New Goal
            </button>
        </div>

        <div class="row g-4 mb-4">
            @php
                $goalStats = [
                    'totalGoals' => $goals->count(),
                    'totalTarget' => $goals->sum('target_amount'),
                    'totalSaved' => $goals->sum('saved_amount'),
                    'overallProgress' => $goals->count()
                        ? round(
                            $goals->avg(
                                fn($goal) => $goal->target_amount > 0
                                    ? ($goal->saved_amount / $goal->target_amount) * 100
                                    : 0,
                            ),
                            1,
                        )
                        : 0,
                ];
            @endphp

            @foreach ([['title' => 'Total Goals', 'value' => $goalStats['totalGoals'], 'icon' => 'bi-bullseye', 'color' => '#16a34a', 'bg' => '#dcfce7'], ['title' => 'Total Target', 'value' => '$' . number_format($goalStats['totalTarget'], 2), 'icon' => 'bi-cash-stack', 'color' => '#2563eb', 'bg' => '#dbeafe'], ['title' => 'Total Saved', 'value' => '$' . number_format($goalStats['totalSaved'], 2), 'icon' => 'bi-piggy-bank', 'color' => '#7c3aed', 'bg' => '#ede9fe'], ['title' => 'Overall Progress', 'value' => $goalStats['overallProgress'] . '%', 'icon' => 'bi-graph-up', 'color' => '#ea580c', 'bg' => '#ffedd5']] as $card)
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="card border-0 shadow-sm h-100 goal-card">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:48px;height:48px;background:{{ $card['bg'] }};color:{{ $card['color'] }}">
                                    <i class="bi {{ $card['icon'] }} fs-5"></i>
                                </div>
                                <span class="small fw-semibold" style="color:{{ $card['color'] }}">Live</span>
                            </div>
                            <h6 class="fw-semibold text-muted mb-2">{{ $card['title'] }}</h6>
                            <h3 class="fw-bold mb-0">{{ $card['value'] }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row g-4">
            <div class="col-12 col-xl-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div
                            class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-3">
                            <div>
                                <h5 class="fw-bold mb-1">All Goals</h5>
                                <p class="text-muted mb-0">Track your progress and stay focused.</p>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <select class="form-select form-select-sm" style="width:140px;">
                                    <option>All Goals</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                    <option>Paused</option>
                                </select>
                                <select class="form-select form-select-sm" style="width:140px;">
                                    <option>All Categories</option>
                                    @foreach ($categories as $category)
                                        <option>{{ $category }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-secondary btn-sm">Filter</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Goal</th>
                                        <th>Category</th>
                                        <th>Target</th>
                                        <th>Saved</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                        <th>Target Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($goals as $goal)
                                        @php
                                            $percent =
                                                $goal->target_amount > 0
                                                    ? round(($goal->saved_amount / $goal->target_amount) * 100, 1)
                                                    : 0;
                                            $statusClass =
                                                $goal->status === 'Completed'
                                                    ? 'bg-success'
                                                    : ($goal->status === 'Paused'
                                                        ? 'bg-warning text-dark'
                                                        : 'bg-primary');
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white"
                                                        style="width:38px;height:38px;background:#16a34a;">
                                                        <i class="bi bi-bullseye"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-semibold">{{ $goal->goal_name }}</div>
                                                        <div class="small text-muted">{{ $goal->priority }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $goal->category }}</td>
                                            <td>${{ number_format($goal->target_amount, 2) }}</td>
                                            <td>${{ number_format($goal->saved_amount, 2) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress flex-grow-1" style="height:8px;">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: {{ $percent }}%"></div>
                                                    </div>
                                                    <span class="small fw-semibold">{{ $percent }}%</span>
                                                </div>
                                            </td>
                                            <td><span class="badge {{ $statusClass }}">{{ $goal->status }}</span></td>
                                            <td>{{ \Carbon\Carbon::parse($goal->target_date)->format('M d, Y') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                        data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('goals.show', $goal->id) }}">View</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('goals.edit', $goal->id) }}">Edit</a></li>
                                                        <li>
                                                            <form action="{{ route('goals.destroy', $goal->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Delete this goal?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="dropdown-item text-danger"
                                                                    type="submit">Delete</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted py-4">No goals found yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">Goals Summary</h5>
                            <span class="badge bg-success">{{ $goalStats['overallProgress'] }}%</span>
                        </div>
                        <canvas id="goalsChart" height="220"></canvas>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Upcoming Targets</h5>
                        <div class="d-grid gap-3">
                            @foreach ($upcomingGoals as $goal)
                                <div class="d-flex align-items-center justify-content-between p-3 rounded-4 border">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white"
                                            style="width:38px;height:38px;background:#2563eb;">
                                            <i class="bi bi-calendar2-event"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $goal->goal_name }}</div>
                                            <div class="small text-muted">
                                                {{ \Carbon\Carbon::parse($goal->target_date)->format('M d, Y') }}</div>
                                        </div>
                                    </div>
                                    <span
                                        class="badge {{ $goal->target_date < now()->toDateString() ? 'bg-danger' : 'bg-light text-dark' }}">
                                        {{ $goal->target_date < now()->toDateString() ? 'Overdue' : $goal->target_date->diffInDays(now()) . ' days' }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <h5 class="fw-bold mb-2">Stay Motivated</h5>
                        <p class="text-muted mb-3">Small steps every day create big financial freedom.</p>
                        <button class="btn btn-success rounded-pill px-4" data-bs-toggle="modal"
                            data-bs-target="#goalModal">Add New Goal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="goalModal" tabindex="-1" aria-labelledby="goalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-4 border-0 shadow">
                <form action="{{ route('goals.store') }}" method="POST">
                    @csrf
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" id="goalModalLabel">Add New Goal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Goal Name</label>
                                <input type="text" name="goal_name" class="form-control" placeholder="Buy House"
                                    required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Goal Category</label>
                                <select name="category" class="form-select" required>
                                    <option value="">Select</option>
                                    @foreach (['House', 'Car', 'Education', 'Vacation', 'Emergency Fund', 'Marriage', 'Business', 'Investment', 'Others'] as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Target Amount</label>
                                <input type="number" step="0.01" name="target_amount" class="form-control" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Current Saved Amount</label>
                                <input type="number" step="0.01" name="saved_amount" class="form-control" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Target Date</label>
                                <input type="date" name="target_date" class="form-control" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Goal Priority</label>
                                <select name="priority" class="form-select" required>
                                    <option value="">Select</option>
                                    <option>High</option>
                                    <option>Medium</option>
                                    <option>Low</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="">Select</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                    <option>Paused</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save Goal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('goalsChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Target', 'Saved', 'Remaining'],
                    datasets: [{
                        data: [{{ $goalStats['totalTarget'] }}, {{ $goalStats['totalSaved'] }},
                            {{ max($goalStats['totalTarget'] - $goalStats['totalSaved'], 0) }}
                        ],
                        backgroundColor: ['#2563eb', '#16a34a', '#f59e0b'],
                        borderWidth: 0,
                        hoverOffset: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });
        }
    </script>
@endsection
