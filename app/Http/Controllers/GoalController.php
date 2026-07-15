<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class GoalController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if (! $user instanceof User) {
            abort(403);
        }

        $query = $user->goals()->latest();

        if ($request->filled('status') && $request->status !== 'All Goals') {
            $query->where('status', $request->status);
        }

        if ($request->filled('category') && $request->category !== 'All Categories') {
            $query->where('category', $request->category);
        }

        if ($request->filled('priority') && $request->priority !== 'All Priorities') {
            $query->where('priority', $request->priority);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('goal_name', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $goals = $query->get();
        $categories = $user->goals()->pluck('category')->filter()->unique()->sort()->values();
        $upcomingGoals = $goals->sortBy('target_date')->take(5);

        return view('goals', compact('goals', 'categories', 'upcomingGoals'));
    }

    public function create()
    {
        return view('goals');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'goal_name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'target_amount' => ['required', 'numeric', 'gt:0'],
            'saved_amount' => ['required', 'numeric', 'gte:0'],
            'target_date' => ['required', 'date', 'after_or_equal:today'],
            'priority' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ]);

        if ($validated['saved_amount'] > $validated['target_amount']) {
            throw ValidationException::withMessages([
                'saved_amount' => 'Saved amount cannot be greater than target amount.',
            ]);
        }

        $user = Auth::user();

        if (! $user instanceof User) {
            abort(403);
        }

        $user->goals()->create($validated);

        return redirect()->route('goals.index')->with('success', 'Goal Added Successfully');
    }

    public function show(Goal $goal)
    {
        abort_unless($goal->user_id === Auth::id(), 403);

        $remainingAmount = max($goal->target_amount - $goal->saved_amount, 0);
        $remainingDays = now()->startOfDay()->diffInDays($goal->target_date, false);

        return response()->json([
            'id' => $goal->id,
            'goal_name' => $goal->goal_name,
            'category' => $goal->category,
            'target_amount' => number_format($goal->target_amount, 2),
            'saved_amount' => number_format($goal->saved_amount, 2),
            'target_date' => $goal->target_date->format('Y-m-d'),
            'priority' => $goal->priority,
            'status' => $goal->status,
            'notes' => $goal->notes,
            'created_at' => $goal->created_at->format('M d, Y'),
            'progress' => $goal->target_amount > 0 ? round(($goal->saved_amount / $goal->target_amount) * 100, 1) : 0,
            'remaining_amount' => number_format($remainingAmount, 2),
            'remaining_days' => max($remainingDays, 0),
        ]);
    }

    public function edit(Goal $goal)
    {
        abort_unless($goal->user_id === Auth::id(), 403);

        return response()->json($goal);
    }

    public function update(Request $request, Goal $goal)
    {
        abort_unless($goal->user_id === Auth::id(), 403);

        $validated = $request->validate([
            'goal_name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'target_amount' => ['required', 'numeric', 'gt:0'],
            'saved_amount' => ['required', 'numeric', 'gte:0'],
            'target_date' => ['required', 'date', 'after_or_equal:today'],
            'priority' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ]);

        if ($validated['saved_amount'] > $validated['target_amount']) {
            throw ValidationException::withMessages([
                'saved_amount' => 'Saved amount cannot be greater than target amount.',
            ]);
        }

        $goal->update($validated);

        return redirect()->route('goals.index')->with('success', 'Updated Successfully');
    }

    public function destroy(Goal $goal)
    {
        abort_unless($goal->user_id === Auth::id(), 403);

        $goal->delete();

        return redirect()->route('goals.index')->with('success', 'Deleted Successfully');
    }

    public function filter(Request $request)
    {
        return $this->index($request);
    }

    public function search(Request $request)
    {
        $user = Auth::user();

        if (! $user instanceof User) {
            abort(403);
        }

        $query = $user->goals()->latest();

        if ($request->filled('status') && $request->status !== 'All Goals') {
            $query->where('status', $request->status);
        }

        if ($request->filled('category') && $request->category !== 'All Categories') {
            $query->where('category', $request->category);
        }

        if ($request->filled('priority') && $request->priority !== 'All Priorities') {
            $query->where('priority', $request->priority);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('goal_name', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $goals = $query->get()->map(function ($goal) {
            $progress = $goal->target_amount > 0 ? round(($goal->saved_amount / $goal->target_amount) * 100, 1) : 0;
            $statusClass = $goal->status === 'Completed' ? 'bg-success' : ($goal->status === 'Paused' ? 'bg-warning text-dark' : 'bg-primary');

            return [
                'id' => $goal->id,
                'goal_name' => $goal->goal_name,
                'category' => $goal->category,
                'priority' => $goal->priority,
                'target_amount' => number_format($goal->target_amount, 2),
                'saved_amount' => number_format($goal->saved_amount, 2),
                'target_date' => $goal->target_date->format('M d, Y'),
                'status' => $goal->status,
                'status_class' => $statusClass,
                'progress' => $progress,
            ];
        });

        return response()->json($goals);
    }

    public function summary()
    {
        $user = Auth::user();

        if (! $user instanceof User) {
            abort(403);
        }

        $goals = $user->goals()->get();

        return response()->json([
            'total_goals' => $goals->count(),
            'total_target' => $goals->sum('target_amount'),
            'total_saved' => $goals->sum('saved_amount'),
            'overall_progress' => $goals->count() ? round($goals->avg(fn ($goal) => $goal->target_amount > 0 ? ($goal->saved_amount / $goal->target_amount) * 100 : 0), 1) : 0,
        ]);
    }
}
