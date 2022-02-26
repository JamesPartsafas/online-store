<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    public function test_admin_page_can_be_accessed()
    {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)->get(route('adminpage'));

        $response->assertStatus(200);
    }

    public function test_non_authed_user_cannot_access_admin_page()
    {
        $response = $this->get(route('adminpage'));

        $response->assertRedirect(route('home'));
    }

    public function test_regular_user_cannot_access_admin_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('adminpage'));

        $response->assertRedirect(route('home'));
    }

    public function test_admin_can_add_product()
    {
        $productName = 'testName';
        $user = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)->from(route('adminpage'))->post(route('adminpage'), [
            'name' => $productName,
            'category' => 'testCategory',
            'subcategory' => 'testSubcategory',
            'price' => 100,
            'about' => "about",
            'details' => 'details',
            'weight' => 10,
            'image' => 'image'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('products', [
            'name' => $productName,
        ]);
    }
}
