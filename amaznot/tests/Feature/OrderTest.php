<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    public function test_order_page_can_be_accessed()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('orders'));

        $response->assertStatus(200);
    }

    public function test_order_page_cannot_be_accessed_by_unauthed()
    {
        $response = $this->get(route('orders'));

        $response->assertRedirect(route('home'));
    }

    public function test_order_page_cannot_be_accessed_by_admin()
    {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)->get(route('orders'));

        $response->assertRedirect(route('home'));
    }
}
