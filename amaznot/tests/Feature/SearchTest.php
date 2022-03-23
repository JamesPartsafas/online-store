<?php

// Test Library Access
namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchTest extends TestCase
{
    // DataBase Migration Library
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    public function test_search_page_access()
    {
        $response = $this->get(route('search'));

        $response->assertStatus(200);
    }
}
