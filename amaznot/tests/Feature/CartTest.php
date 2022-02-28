<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    public function test_cart_page_can_be_accessed()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('cart'));

        $response->assertStatus(200);
    }

    public function test_non_authed_user_cannot_access_cart_page()
    {
        $response = $this->get(route('cart'));

        $response->assertRedirect(route('home'));
    }

    public function test_admin_cannot_access_cart_page()
    {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)->get(route('cart'));

        $response->assertRedirect(route('home'));
    }
}
