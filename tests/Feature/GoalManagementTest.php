<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GoalManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_goals_page(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('goals.index'))
            ->assertOk()
            ->assertSee('Goals');
    }

    public function test_authenticated_user_can_store_a_goal(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('goals.store'), [
                'goal_name' => 'Buy House',
                'category' => 'House',
                'target_amount' => 500000,
                'saved_amount' => 150000,
                'target_date' => now()->addMonths(12)->toDateString(),
                'priority' => 'High',
                'status' => 'In Progress',
                'notes' => 'Save every month',
            ])
            ->assertRedirect(route('goals.index'));

        $this->assertDatabaseHas('goals', [
            'goal_name' => 'Buy House',
            'user_id' => $user->id,
        ]);
    }
}
