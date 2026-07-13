<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeNavigationTest extends TestCase
{
    use RefreshDatabase;

    public function test_personal_users_are_redirected_to_the_dashboard_from_the_personal_home_route(): void
    {
        $user = User::factory()->create([
            'name' => 'Personal User',
            'email' => 'personal@example.com',
            'category' => 'Personal',
        ]);

        $this->actingAs($user)
            ->get(route('personal.home'))
            ->assertRedirect(route('dashboard'));
    }

    public function test_business_users_are_redirected_to_the_dashboard_from_the_business_home_route(): void
    {
        $user = User::factory()->create([
            'name' => 'Business User',
            'email' => 'business@example.com',
            'category' => 'Business',
        ]);

        $this->actingAs($user)
            ->get(route('business.home'))
            ->assertRedirect(route('dashboard'));
    }
}
