<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    /**
     * Test for logout and redirect to home
    */
    public function test_user_can_logout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('register'));

        $response->assertRedirect(route('home'));
    }
}
