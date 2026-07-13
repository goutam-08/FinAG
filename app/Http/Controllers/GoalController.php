<?php

namespace App\Http\Controllers;

use App\Models\Goals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Auth::user()->goals()->latest()->get();
        $categories = $goals->pluck('category')->filter()->unique()->sort()->values();
        $upcomingGoals = $goals->sortBy('target_date')->take(5);

        return view('goals', compact('goals', 'categories', 'upcomingGoals'));
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

        Auth::user()->goals()->create($validated);

        return redirect()->route('goals.index')->with('success', 'Goal Added Successfully');
    }

    public function show(Goals $goal)
    {
        abort_unless($goal->user_id === Auth::id(), 403);

        return response()->json($goal);
    }

    public function edit(Goals $goal)
    {
        abort_unless($goal->user_id === Auth::id(), 403);

        return response()->json($goal);
    }

    public function update(Request $request, Goals $goal)
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

    public function destroy(Goals $goal)
    {
        abort_unless($goal->user_id === Auth::id(), 403);

        $goal->delete();

        return redirect()->route('goals.index')->with('success', 'Deleted Successfully');
    }
}
