<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    public function test_search_page_returns_successfully()
    {
        $response = $this->get(route('search', ['query' => 'Test'])); // TestQuery

        $response->assertStatus(200);
    }

    public function test_search_page_returns_404_for_invalid_query()
    {
        $response = $this->get(route('search', ['query' => "/"]));

        $response->assertStatus(404);
    }
}
