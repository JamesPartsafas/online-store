<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    /**
     * Test for viewable registration page
    */
    public function test_register_page_returns_successfully()
    {
        $response = $this->get(route('register'));

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
     * Test for registration success
    */
    public function test_user_can_register()
    {
        $response = $this->post(route('register'), [
            'name' => 'testName',
            'password' => 'testPassword',
            'password_confirmation' => 'testPassword'
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticated();
    }

    /**
     * Test for password confirmation upon registration
    */
    public function test_registration_requires_password_confirmation()
    {
        $response = $this->from(route('register'))->post(route('register'), [
            'name' => 'testName',
            'password' => 'testPassword',
            'password_confirmation' => 'falseConfirmation'
        ]);

        $response->assertRedirect(route('register'));
        $this->assertGuest();
    }

    /**
     * Test for uniqueness of username
    */
    public function test_username_must_be_unique()
    {
        $name = 'testUser';
        User::factory()->create([
            'name' => $name,
            'password' => Hash::make('123456789')
        ]);

        $response = $this->from(route('register'))->post(route('register'), [
            'name' => $name,
            'password' => 'testPassword',
            'password_confirmation' => 'testPassword'
        ]);

        $response->assertRedirect(route('register'));
        $this->assertGuest();
    }
}
