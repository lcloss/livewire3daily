<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ShowDashboardTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_see_you_are_logged_in(): void
    {
        // Create user for testing
        $user = User::factory()->create();

        // Authenticate as the user
        $this->actingAs($user);

        $response = $this->get('/dashboard');

        $response->assertSee('You\'re logged in!')
            ->assertStatus(200);
        // $response->assertStatus(200);
    }
}
