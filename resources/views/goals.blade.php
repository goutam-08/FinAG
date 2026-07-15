@extends('layouts.app')

@section('content')
    @php
        $goalStats = [
            'totalGoals' => $goals->count(),
            'totalTarget' => $goals->sum('target_amount'),
            'totalSaved' => $goals->sum('saved_amount'),
            'overallProgress' => $goals->count()
                ? round(
                    $goals->avg(
                        fn($goal) => $goal->target_amount > 0 ? ($goal->saved_amount / $goal->target_amount) * 100 : 0,
                    ),
                    1,
                )
                : 0,
        ];
        $successMessage = session('success');
        $errorMessage = session('error');
    @endphp

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
            @foreach ([['title' => 'Total Goals', 'value' => $goalStats['totalGoals'], 'icon' => 'bi-bullseye', 'color' => '#16a34a', 'bg' => '#dcfce7'], ['title' => 'Total Target', 'value' => '₹' . number_format($goalStats['totalTarget'], 2), 'icon' => 'bi-cash-stack', 'color' => '#2563eb', 'bg' => '#dbeafe'], ['title' => 'Total Saved', 'value' => '₹' . number_format($goalStats['totalSaved'], 2), 'icon' => 'bi-piggy-bank', 'color' => '#7c3aed', 'bg' => '#ede9fe'], ['title' => 'Overall Progress', 'value' => $goalStats['overallProgress'] . '%', 'icon' => 'bi-graph-up', 'color' => '#ea580c', 'bg' => '#ffedd5']] as $card)
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
                            class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-3">
                            <div>
                                <h5 class="fw-bold mb-1">All Goals</h5>
                                <p class="text-muted mb-0">Track your progress and stay focused.</p>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <div class="btn-group" role="group" aria-label="Goal tabs">
                                    <button type="button" class="btn btn-sm btn-success goal-tab-btn active"
                                        data-status="All Goals">All Goals</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary goal-tab-btn"
                                        data-status="In Progress">In Progress</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary goal-tab-btn"
                                        data-status="Completed">Completed</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary goal-tab-btn"
                                        data-status="Paused">Paused</button>
                                </div>
                            </div>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-12 col-md-4">
                                <input type="text" id="goalSearch" class="form-control" placeholder="Search goals...">
                            </div>
                            <div class="col-12 col-md-3">
                                <select id="goalCategoryFilter" class="form-select">
                                    <option value="All Categories">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <select id="goalPriorityFilter" class="form-select">
                                    <option value="All Priorities">All Priorities</option>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <button id="applyFiltersBtn" class="btn btn-outline-secondary w-100">Filter</button>
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
                                <tbody id="goalsTableBody">
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
                                        <tr data-goal-id="{{ $goal->id }}"
                                            data-goal-name="{{ strtolower($goal->goal_name) }}"
                                            data-category="{{ strtolower($goal->category) }}"
                                            data-priority="{{ strtolower($goal->priority) }}"
                                            data-status="{{ strtolower($goal->status) }}">
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
                                            <td>₹{{ number_format($goal->target_amount, 2) }}</td>
                                            <td>₹{{ number_format($goal->saved_amount, 2) }}</td>
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
                                                        data-bs-toggle="dropdown">Actions</button>
                                                    <ul class="dropdown-menu">
                                                        <li><button class="dropdown-item" type="button" data-action="view"
                                                                data-goal-id="{{ $goal->id }}">View</button></li>
                                                        <li><button class="dropdown-item" type="button" data-action="edit"
                                                                data-goal-id="{{ $goal->id }}">Edit</button></li>
                                                        <li><button class="dropdown-item text-danger" type="button"
                                                                data-action="delete"
                                                                data-goal-id="{{ $goal->id }}">Delete</button></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted py-4">No goals found yet.
                                            </td>
                                        </tr>
                                    @endforelse
                                    <tr id="emptyGoalsRow" class="table-light" style="display:none;">
                                        <td colspan="8" class="text-center text-muted py-4">No goals match your
                                            filters.</td>
                                    </tr>
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
                <form id="goalForm" action="{{ route('goals.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="goalMethod" value="POST">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold" id="goalModalLabel">Add New Goal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Goal Name</label>
                                <input type="text" name="goal_name" id="goalName" class="form-control"
                                    placeholder="Buy House" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Goal Category</label>
                                <select name="category" id="goalCategory" class="form-select" required>
                                    <option value="">Select</option>
                                    @foreach (['House', 'Car', 'Education', 'Vacation', 'Emergency Fund', 'Marriage', 'Business', 'Investment', 'Others'] as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Target Amount</label>
                                <input type="number" step="0.01" name="target_amount" id="goalTarget"
                                    class="form-control" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Current Saved Amount</label>
                                <input type="number" step="0.01" name="saved_amount" id="goalSaved"
                                    class="form-control" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Target Date</label>
                                <input type="date" name="target_date" id="goalDate" class="form-control" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Goal Priority</label>
                                <select name="priority" id="goalPriority" class="form-select" required>
                                    <option value="">Select</option>
                                    <option>High</option>
                                    <option>Medium</option>
                                    <option>Low</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" id="goalNotes" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Status</label>
                                <select name="status" id="goalStatus" class="form-select" required>
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

    <div class="modal fade" id="viewGoalModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="viewGoalTitle">Goal Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4" id="viewGoalBody"></div>
            </div>
        </div>
    </div>

    <form id="goalDeleteForm" method="POST" class="d-none">
        @csrf
        <input type="hidden" id="goalDeleteMethod" name="_method" value="DELETE">
        <input type="hidden" id="goalDeleteToken" name="_token" value="{{ csrf_token() }}">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function initGoalsPage() {
            const goalsChartCanvas = document.getElementById('goalsChart');
            if (goalsChartCanvas && typeof Chart !== 'undefined') {
                if (goalsChartCanvas.__chartInstance) {
                    goalsChartCanvas.__chartInstance.destroy();
                }

                goalsChartCanvas.__chartInstance = new Chart(goalsChartCanvas, {
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

            const goalShowUrl = '{{ route('goals.show', ':id') }}';
            const goalEditUrl = '{{ route('goals.edit', ':id') }}';
            const goalDestroyUrl = '{{ route('goals.destroy', ':id') }}';
            const goalModalElement = document.getElementById('goalModal');

            const goalSearchInput = document.getElementById('goalSearch');
            const goalCategoryFilter = document.getElementById('goalCategoryFilter');
            const goalPriorityFilter = document.getElementById('goalPriorityFilter');
            const goalStatusFilter = document.querySelectorAll('.goal-tab-btn');
            const goalTableBody = document.getElementById('goalsTableBody');
            const goalForm = document.getElementById('goalForm');
            const goalModalLabel = document.getElementById('goalModalLabel');
            const goalMethodInput = document.getElementById('goalMethod');
            const emptyGoalsRow = document.getElementById('emptyGoalsRow');

            let activeStatus = 'All Goals';
            let searchTimer;

            function applyFilters() {
                const searchTerm = (goalSearchInput.value || '').trim().toLowerCase();
                const categoryTerm = (goalCategoryFilter.value || 'All Categories').toLowerCase();
                const priorityTerm = (goalPriorityFilter.value || 'All Priorities').toLowerCase();
                let visibleCount = 0;

                Array.from(goalTableBody.querySelectorAll('tr[data-goal-id]')).forEach(row => {
                    const rowText = `${row.dataset.goalName} ${row.dataset.category} ${row.dataset.status}`
                        .toLowerCase();
                    const matchesSearch = !searchTerm || rowText.includes(searchTerm);
                    const matchesCategory = categoryTerm === 'all categories' || row.dataset.category ===
                        categoryTerm;
                    const matchesPriority = priorityTerm === 'all priorities' || row.dataset.priority ===
                        priorityTerm;
                    const matchesStatus = activeStatus === 'All Goals' || row.dataset.status === activeStatus
                        .toLowerCase();
                    const isVisible = matchesSearch && matchesCategory && matchesPriority && matchesStatus;

                    row.style.display = isVisible ? '' : 'none';

                    if (isVisible) {
                        visibleCount += 1;
                    }
                });

                emptyGoalsRow.style.display = visibleCount > 0 ? 'none' : 'table-row';
            }

            if (goalSearchInput) {
                goalSearchInput.addEventListener('input', () => {
                    clearTimeout(searchTimer);
                    searchTimer = setTimeout(applyFilters, 150);
                });
            }

            if (goalCategoryFilter) {
                goalCategoryFilter.addEventListener('change', applyFilters);
            }

            if (goalPriorityFilter) {
                goalPriorityFilter.addEventListener('change', applyFilters);
            }

            const applyFiltersButton = document.getElementById('applyFiltersBtn');
            if (applyFiltersButton) {
                applyFiltersButton.addEventListener('click', applyFilters);
            }

            goalStatusFilter.forEach(button => {
                button.addEventListener('click', function() {
                    activeStatus = this.dataset.status;
                    goalStatusFilter.forEach(btn => btn.classList.remove('btn-success', 'active'));
                    goalStatusFilter.forEach(btn => btn.classList.add('btn-outline-secondary'));
                    this.classList.add('btn-success', 'active');
                    this.classList.remove('btn-outline-secondary');
                    applyFilters();
                });
            });

            applyFilters();

            if (goalTableBody) {
                goalTableBody.addEventListener('click', function(event) {
                    const actionButton = event.target.closest('[data-action]');
                    if (!actionButton) return;

                    const action = actionButton.dataset.action;
                    const goalId = actionButton.dataset.goalId;

                    if (action === 'view') {
                        fetch(goalShowUrl.replace(':id', goalId), {
                                headers: {
                                    'Accept': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(goal => {
                                document.getElementById('viewGoalTitle').textContent = goal.goal_name;
                                document.getElementById('viewGoalBody').innerHTML = `
                                    <div class="row g-3">
                                        <div class="col-12 col-md-6"><strong>Category:</strong> ${goal.category}</div>
                                        <div class="col-12 col-md-6"><strong>Priority:</strong> ${goal.priority}</div>
                                        <div class="col-12 col-md-6"><strong>Target Amount:</strong> $${goal.target_amount}</div>
                                        <div class="col-12 col-md-6"><strong>Saved Amount:</strong> $${goal.saved_amount}</div>
                                        <div class="col-12 col-md-6"><strong>Target Date:</strong> ${goal.target_date}</div>
                                        <div class="col-12 col-md-6"><strong>Status:</strong> ${goal.status}</div>
                                        <div class="col-12"><strong>Progress:</strong> ${goal.progress}%</div>
                                        <div class="col-12"><strong>Created Date:</strong> ${goal.created_at}</div>
                                        <div class="col-12"><strong>Remaining Amount:</strong> $${goal.remaining_amount}</div>
                                        <div class="col-12"><strong>Remaining Days:</strong> ${goal.remaining_days}</div>
                                        <div class="col-12"><strong>Notes:</strong> ${goal.notes || 'No notes provided.'}</div>
                                    </div>`;
                                new bootstrap.Modal(document.getElementById('viewGoalModal')).show();
                            });
                    }

                    if (action === 'edit') {
                        fetch(goalEditUrl.replace(':id', goalId), {
                                headers: {
                                    'Accept': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(goal => {
                                goalModalLabel.textContent = 'Edit Goal';
                                goalMethodInput.value = 'PUT';
                                goalForm.action = goalEditUrl.replace(':id', goalId);
                                document.getElementById('goalName').value = goal.goal_name || '';
                                document.getElementById('goalCategory').value = goal.category || '';
                                document.getElementById('goalTarget').value = goal.target_amount || '';
                                document.getElementById('goalSaved').value = goal.saved_amount || '';
                                document.getElementById('goalDate').value = goal.target_date || '';
                                document.getElementById('goalPriority').value = goal.priority || '';
                                document.getElementById('goalNotes').value = goal.notes || '';
                                document.getElementById('goalStatus').value = goal.status || '';
                                new bootstrap.Modal(goalModalElement).show();
                            });
                    }

                    if (action === 'delete') {
                        Swal.fire({
                            title: 'Delete this goal?',
                            text: 'This action cannot be undone.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Delete',
                            cancelButtonText: 'Cancel'
                        }).then(result => {
                            if (!result.isConfirmed) return;

                            const deleteForm = document.getElementById('goalDeleteForm');
                            if (!deleteForm) return;

                            deleteForm.action = goalDestroyUrl.replace(':id', goalId);
                            const deleteMethodInput = document.getElementById('goalDeleteMethod');
                            const deleteTokenInput = document.getElementById('goalDeleteToken');
                            if (deleteMethodInput) {
                                deleteMethodInput.value = 'DELETE';
                            }
                            if (deleteTokenInput) {
                                deleteTokenInput.value = '{{ csrf_token() }}';
                            }
                            deleteForm.submit();
                        });
                    }
                });
            }

            const addGoalButton = document.querySelector('[data-bs-target="#goalModal"]');
            if (addGoalButton) {
                addGoalButton.addEventListener('click', function() {
                    goalModalLabel.textContent = 'Add New Goal';
                    goalMethodInput.value = 'POST';
                    goalForm.action = '{{ route('goals.store') }}';
                    goalForm.reset();
                });
            }

            @if ($successMessage)
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: @json($successMessage),
                    timer: 1800,
                    showConfirmButton: false
                });
            @endif

            @if ($errorMessage)
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: @json($errorMessage)
                });
            @endif
        }

        initGoalsPage();
    </script>
@endsection
