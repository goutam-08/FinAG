<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BudgetsTest extends TestCase
{
    use RefreshDatabase;

    public function test_budgets_page_displays_user_budget_data(): void
    {
        $user = User::factory()->create();

        $category = Category::create([
            'user_id' => $user->id,
            'category_name' => 'Food',
            'category_type' => 'Expense',
            'status' => 1,
        ]);

        $this->actingAs($user);

        $this->post('/budgets', [
            'category_id' => $category->id,
            'amount' => 5000,
            'month' => now()->month,
            'year' => now()->year,
        ]);

        $response = $this->get('/budgets');

        $response->assertOk();
        $response->assertSee('Budget Overview');
        $response->assertSee('Food');
        $response->assertSee('5,000');
    }
}
