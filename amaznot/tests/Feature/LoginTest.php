<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    /**
     * Test for viewable login page
    */
    public function test_login_page_returns_successfully()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    /**
     * Test for redirect for authorized user
    */
    public function test_redirect_on_authed_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('login'));

        $response->assertRedirect(route('home'));
    }

    /**
     * Test for user login
    */
    public function test_user_can_log_in()
    {
        $name = 'testUser';
        $password = '123456789';
        $user = User::factory()->create([
            'name' => $name,
            'password' => Hash::make($password)
        ]);

        $response = $this->post(route('login'), [
            'name' => $name,
            'password' => $password
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test for unauthorized access with invalid credentials
    */
    public function test_user_cannot_login_with_incorrect_info()
    {
        $name = 'testUser';
        $password = '123456789';
        User::factory()->create([
            'name' => $name,
            'password' => Hash::make($password)
        ]);

        $response = $this->from(route('login'))
                        ->post(route('login'), [
                            'name' => $name,
                            'password' => 'invalidPassword'
                        ]);

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }
}
